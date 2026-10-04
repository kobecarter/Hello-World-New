#!/usr/bin/env python3
"""
Optimise le dossier d'images "images" (et TOUS ses sous-dossiers, a tous les niveaux) avec sauvegarde.

Formats traites : JPEG, PNG, WebP, GIF fixe, AVIF. GIF animes : laisses tels quels (les redimensionner les alourdit ;
un WebP anime serait ~60 % plus leger mais change l'extension). SVG : comptes dans le recap, jamais modifies.

Regles :
  1. Copie du dossier "images" dans un dossier de travail ; l'original n'est pas touche pendant le traitement.
  2. Image de 400 Ko ou moins : on n'y touche pas.
  3. Image de plus de 400 Ko : redimensionnement selon le BESOIN (taille affichee sur le site x2 pour les ecrans
     haute densite, si elle est connue dans besoins_affichage.json ; sinon plafond 1920 px), ratio conserve,
     filtre LANCZOS. Qualite 92 (JPEG, optimize=True) / 90 (WebP) / PNG sans perte.
  4. Image de plus de 3 Mo : le resultat ne descend jamais sous 1 Mo (plancher). Le script essaie des reglages de
     moins en moins agressifs (plus grande taille, qualite plus haute) jusqu'a atteindre 1 Mo, sans depasser l'original.
  5. Garde-fou : une image tres haute (capture de page, ecran mobile) ne descend jamais sous 800 px de large.
  6. Une image n'est remplacee que si la nouvelle version est plus legere.
  7. A la fin, l'original est renomme "images_av_red", le dossier de travail devient "images", et le fichier
     rapport_optimisation_images.html montre l'avant et l'apres de chaque image.

Usage :
  pip install pillow
  python optimize_images.py                       # traite ./images
  python optimize_images.py --dir /chemin/images
  python optimize_images.py --besoins tools/besoins_affichage.json
  python optimize_images.py --dry-run
  python optimize_images.py --format webp         # JPEG/PNG > 400 Ko -> .webp (ecrit webp_mapping.csv)
"""
import argparse
import base64
import csv
import html
import io
import json
import math
import os
import shutil
import sys
from datetime import datetime
from pathlib import Path

try:
    from PIL import Image, ImageOps, UnidentifiedImageError
except ImportError:
    sys.exit("Pillow est requis :  pip install pillow")

SEUIL_OCTETS = 400 * 1024        # en dessous ou egal : on ne touche pas (reglable : --seuil-ko)
GROS_OCTETS = 3 * 1024 * 1024    # au-dessus : le resultat ne descend pas sous PLANCHER_OCTETS
PLANCHER_OCTETS = 1 * 1024 * 1024
MAX_COTE = 1920                  # plafond par defaut (largeur ou hauteur)
LARGEUR_MIN = 800                # garde-fou images tres hautes
LARGEUR_BESOIN_MIN = 1000        # un besoin mesure ne fait jamais descendre sous cette largeur
QUALITE_JPEG = 92
QUALITE_WEBP = 90
EXTENSIONS = {".jpg", ".jpeg", ".png", ".webp", ".gif", ".avif"}
VECTORIEL = {".svg"}             # vectoriel : compte mais jamais modifie
DOSSIERS_IGNORES = {"_cache"}    # miniatures generees par le site
SAUVEGARDE = "images_av_red"


def ko(n):
    return f"{n / 1024:,.0f} Ko".replace(",", " ")


def est_anime(img):
    return getattr(img, "is_animated", False) and getattr(img, "n_frames", 1) > 1


def a_transparence(img):
    if img.mode in ("RGBA", "LA"):
        return True
    return img.mode == "P" and "transparency" in img.info


def echelle(largeur, hauteur, besoin_w, plafond):
    """Facteur de reduction (<= 1) : selon le besoin d'affichage s'il est connu, puis plafond, garde-fou images hautes."""
    f = 1.0
    if besoin_w:
        f = min(f, max(besoin_w, min(largeur, LARGEUR_BESOIN_MIN)) / largeur)
    if plafond and max(largeur, hauteur) > plafond:
        g = plafond / max(largeur, hauteur)
        if hauteur > largeur and largeur * g < LARGEUR_MIN:
            g = min(1.0, plafond / largeur)      # image tres haute : on ne limite que la largeur
        f = min(f, g)
    return min(1.0, f)


def ecrire(img, format_pil, qualite_jpeg, qualite_webp, icc, tmp):
    options = {}
    if format_pil == "JPEG":
        if img.mode not in ("RGB", "L"):
            img = img.convert("RGB")
        options = {"quality": qualite_jpeg, "optimize": True, "progressive": True, "subsampling": 0}
    elif format_pil == "PNG":
        options = {"optimize": True, "compress_level": 9}
    elif format_pil == "WEBP":
        if img.mode not in ("RGB", "RGBA"):
            img = img.convert("RGBA" if a_transparence(img) else "RGB")
        options = {"quality": qualite_webp, "method": 6}
    elif format_pil == "AVIF":
        if img.mode not in ("RGB", "RGBA"):
            img = img.convert("RGBA" if a_transparence(img) else "RGB")
        options = {"quality": 80, "speed": 6}
    elif format_pil == "GIF":
        if a_transparence(img):
            raise ValueError("gif avec transparence : laisse tel quel")
        img = img.convert("RGB").quantize(colors=256, dither=Image.Dither.FLOYDSTEINBERG)
        options = {"optimize": True}
        icc = None
    if icc:
        options["icc_profile"] = icc
    img.save(tmp, format=format_pil, **options)
    return tmp.stat().st_size


def optimiser(src: Path, dst: Path, fmt_sortie: str, besoin_w, ancien):
    """Ecrit la version optimisee a cote de dst. Retourne (tmp, sortie, description)."""
    with Image.open(src) as img0:
        if est_anime(img0):
            raise ValueError("image animee : laisse telle quelle (la redimensionner image par image alourdit un GIF)")
    with Image.open(src) as img0:
        format_source = img0.format
        icc = img0.info.get("icc_profile")
        img = ImageOps.exif_transpose(img0)
        img.load()
    largeur, hauteur = img.size
    ext = src.suffix.lower()
    sortie = dst
    if fmt_sortie == "webp" and ext in (".jpg", ".jpeg", ".png"):
        sortie = dst.with_suffix(".webp")
        format_pil = "WEBP"
    elif format_source in ("JPEG", "PNG", "WEBP", "GIF", "AVIF"):
        format_pil = format_source
    else:
        raise ValueError(f"format non supporte ({format_source})")
    tmp = sortie.with_name(sortie.name + ".tmp")

    def essai(plafond, qj, qw, avec_besoin):
        f = echelle(largeur, hauteur, besoin_w if avec_besoin else None, plafond)
        im = img if f >= 1.0 else img.resize((max(1, round(largeur * f)), max(1, round(hauteur * f))), Image.Resampling.LANCZOS)
        taille = ecrire(im, format_pil, qj, qw, icc, tmp)
        return taille, im.size

    # reglages par defaut ; pour une image de plus de 3 Mo, on remonte jusqu'au plancher de 1 Mo
    candidats = [(MAX_COTE, QUALITE_JPEG, QUALITE_WEBP, True)]
    if ancien > GROS_OCTETS:
        candidats += [(MAX_COTE, 95, 95, True), (MAX_COTE, 95, 95, False), (2560, 95, 95, False),
                      (3200, 95, 95, False), (None, 95, 95, False)]
    meilleur = None
    for plafond, qj, qw, avec_besoin in candidats:
        taille, dims = essai(plafond, qj, qw, avec_besoin)
        if taille < ancien:
            copie = tmp.with_name(tmp.name + ".best")
            shutil.copyfile(tmp, copie)
            meilleur = (taille, dims, copie)
        if ancien <= GROS_OCTETS or taille >= PLANCHER_OCTETS:
            break
    tmp.unlink(missing_ok=True)
    if not meilleur:
        raise ValueError("aucun reglage plus leger que l'original")
    taille, dims, copie = meilleur
    os.replace(copie, tmp)
    redim = "%dx%d -> %dx%d" % (largeur, hauteur, dims[0], dims[1]) if dims != (largeur, hauteur) else ""
    return tmp, sortie, redim


def traiter(dossier_travail: Path, fmt_sortie: str, dry_run: bool, besoins: dict):
    stats = {"vues": 0, "ignorees_petites": 0, "optimisees": 0, "inchangees": 0, "erreurs": 0,
             "avant": 0, "apres": 0, "resultats": []}
    mapping = []
    stats["dossiers"] = {}
    def dos(rel):
        return stats["dossiers"].setdefault(rel.parent.as_posix(), dict(images=0, petites=0, optimisees=0, gardees=0, erreurs=0, svg=0, avant=0, apres=0))
    for racine, dossiers, fichiers in os.walk(dossier_travail):          # tous les sous-dossiers, a tous les niveaux
        dossiers[:] = sorted(d for d in dossiers if d not in DOSSIERS_IGNORES)
        for nom in sorted(fichiers):
            chemin = Path(racine) / nom
            rel = chemin.relative_to(dossier_travail)
            if chemin.suffix.lower() in VECTORIEL:
                dos(rel)["svg"] += 1
                stats["svg"] = stats.get("svg", 0) + 1
                continue
            if chemin.suffix.lower() not in EXTENSIONS:
                continue
            stats["vues"] += 1
            d = dos(rel)
            d["images"] += 1
            ancien = chemin.stat().st_size
            d["avant"] += ancien
            if ancien <= SEUIL_OCTETS:
                stats["ignorees_petites"] += 1
                stats["avant"] += ancien
                stats["apres"] += ancien
                d["petites"] += 1
                d["apres"] += ancien
                continue
            try:
                tmp, sortie, redim = optimiser(chemin, chemin, fmt_sortie, besoins.get(rel.as_posix()), ancien)
            except (UnidentifiedImageError, OSError, ValueError, Image.DecompressionBombError) as e:
                lourd = "GARDEE " if ("aucun reglage" in str(e) or "laisse tel quel" in str(e) or "laisse telle quelle" in str(e)) else "ERREUR "
                stats["inchangees" if lourd == "GARDEE " else "erreurs"] += 1
                d["gardees" if lourd == "GARDEE " else "erreurs"] += 1
                d["apres"] += ancien
                stats["avant"] += ancien
                stats["apres"] += ancien
                print(f"[{lourd.strip():7}] {rel} : {ko(ancien)} ({e})")
                continue
            nouveau = tmp.stat().st_size
            if nouveau >= ancien:
                tmp.unlink()
                stats["inchangees"] += 1
                d["gardees"] += 1
                d["apres"] += ancien
                stats["avant"] += ancien
                stats["apres"] += ancien
                print(f"[GARDEE]   {rel} : {ko(ancien)} (la version optimisee {ko(nouveau)} n'est pas plus legere)")
                continue
            if dry_run:
                tmp.unlink()
            else:
                if sortie != chemin:
                    chemin.unlink()
                    mapping.append((str(rel), str(sortie.relative_to(dossier_travail))))
                os.replace(tmp, sortie)
            stats["optimisees"] += 1
            d["optimisees"] += 1
            d["apres"] += nouveau
            stats["avant"] += ancien
            stats["apres"] += nouveau
            stats["resultats"].append({"rel_av": str(rel), "rel_ap": str(sortie.relative_to(dossier_travail)),
                                       "ancien": ancien, "nouveau": nouveau, "redim": redim})
            detail = f" [{redim}]" if redim else ""
            plancher = " (plancher 1 Mo)" if ancien > GROS_OCTETS and nouveau >= PLANCHER_OCTETS else ""
            print(f"[OK]       {rel} : {ko(ancien)} -> {ko(nouveau)} (-{100 * (1 - nouveau / ancien):.0f} %){detail}{plancher}")
    return stats, mapping


def recap_dossiers(stats):
    """Recapitulatif par dossier (chaque dossier et sous-dossier) : lignes de texte."""
    lignes = ["%-38s %6s %8s %7s %8s %5s %10s %10s" % ("Dossier", "images", "<=400Ko", "optim.", "gardees", "svg", "avant", "apres")]
    t = dict(images=0, petites=0, optimisees=0, gardees=0, svg=0, avant=0, apres=0)
    for nom in sorted(stats["dossiers"]):
        d = stats["dossiers"][nom]
        lignes.append("%-38s %6d %8d %7d %8d %5d %10s %10s" % ((nom if nom != "." else "(racine)")[:38], d["images"], d["petites"], d["optimisees"], d["gardees"], d["svg"], ko(d["avant"]), ko(d["apres"])))
        for k in t:
            t[k] += d[k]
    lignes.append("-" * 104)
    lignes.append("%-38s %6d %8d %7d %8d %5d %10s %10s" % ("TOTAL", t["images"], t["petites"], t["optimisees"], t["gardees"], t["svg"], ko(t["avant"]), ko(t["apres"])))
    return lignes


def tableau_dossiers_html(stats):
    lignes = []
    for nom in sorted(stats["dossiers"]):
        d = stats["dossiers"][nom]
        lignes.append("<tr><td><code>%s</code></td><td class='n'>%d</td><td class='n'>%d</td><td class='n'>%d</td><td class='n'>%d</td><td class='n'>%d</td><td class='n'>%s</td><td class='n'>%s</td></tr>"
                      % (html.escape(nom if nom != "." else "(racine)"), d["images"], d["petites"], d["optimisees"], d["gardees"], d["svg"], ko(d["avant"]), ko(d["apres"])))
    return ("<h2>Recapitulatif par dossier</h2><div class='t'><table><thead><tr><th>Dossier</th><th class='n'>Images</th><th class='n'>&le; 400 Ko</th>"
            "<th class='n'>Optimisees</th><th class='n'>Gardees</th><th class='n'>SVG</th><th class='n'>Avant</th><th class='n'>Apres</th></tr></thead><tbody>%s</tbody></table></div>" % "".join(lignes))


def apercu(chemin: Path, largeur=700, hauteur_max=520):
    """Apercu integre (data URI) : meme traitement pour l'avant et l'apres, pour que la comparaison soit juste."""
    with Image.open(chemin) as img:
        dims = img.size
        img = ImageOps.exif_transpose(img)
        if img.width > largeur:
            img = img.resize((largeur, max(1, round(img.height * largeur / img.width))), Image.Resampling.LANCZOS)
        coupe = img.height > hauteur_max
        if coupe:
            img = img.crop((0, 0, img.width, hauteur_max))
        tampon = io.BytesIO()
        if a_transparence(img):
            img.convert("RGBA").save(tampon, "WEBP", quality=85)
            mime = "image/webp"
        else:
            img.convert("RGB").save(tampon, "JPEG", quality=88, optimize=True)
            mime = "image/jpeg"
    return "data:%s;base64,%s" % (mime, base64.b64encode(tampon.getvalue()).decode()), dims, coupe


def dimensions(chemin: Path):
    try:
        with Image.open(chemin) as img:
            return "%dx%d" % img.size
    except Exception:
        return "?"


def ecrire_rapport(sortie: Path, dossier_apres: Path, dossier_avant: Path, stats, max_apercus=60, budget_mo=12):
    resultats = sorted(stats["resultats"], key=lambda r: r["ancien"] - r["nouveau"], reverse=True)
    cartes, lignes, budget, integres = [], [], budget_mo * 1024 * 1024, 0
    for r in resultats:
        av, ap = dossier_avant / r["rel_av"], dossier_apres / r["rel_ap"]
        gain = 100 * (1 - r["nouveau"] / r["ancien"])
        dav, dap = dimensions(av), dimensions(ap)
        lignes.append("<tr><td><code>%s</code></td><td class='n'>%s</td><td class='n'>%s</td><td class='n g'>-%.0f %%</td><td class='n'>%s</td><td class='n'>%s</td></tr>"
                      % (html.escape(r["rel_av"]), ko(r["ancien"]), ko(r["nouveau"]), gain, dav, dap))
        if integres >= max_apercus or budget <= 0:
            continue
        try:
            u1, _, c1 = apercu(av)
            u2, _, c2 = apercu(ap)
        except Exception:
            continue
        budget -= len(u1) + len(u2)
        integres += 1
        nom = html.escape(r["rel_av"] if r["rel_av"] == r["rel_ap"] else "%s -> %s" % (r["rel_av"], r["rel_ap"]))
        note = "<p class='note'>Image tres haute : apercu limite au haut de l'image.</p>" if (c1 or c2) else ""
        cartes.append(
            "<article class='card'><header><code>%s</code><span class='g'>-%.0f %%</span></header>"
            "<div class='duo'><figure><img src='%s' alt='Avant'><figcaption>Avant &middot; %s &middot; %s</figcaption></figure>"
            "<figure><img src='%s' alt='Apres'><figcaption>Apres &middot; %s &middot; %s</figcaption></figure></div>%s</article>"
            % (nom, gain, u1, dav, ko(r["ancien"]), u2, dap, ko(r["nouveau"]), note))
    eco = stats["avant"] - stats["apres"]
    page = """<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Rapport optimisation images</title><style>
:root{--bg:#f6f7f9;--s:#fff;--fg:#1a2230;--m:#5d6878;--l:#dde2ea;--g:#0f7a3d;--c:#eef1f6;--chk:#e6e9ef}
@media(prefers-color-scheme:dark){:root{--bg:#12161d;--s:#1a202a;--fg:#e6eaf1;--m:#9aa5b6;--l:#2b3340;--g:#5fd18a;--c:#232b37;--chk:#2a313d;color-scheme:dark}}
body{margin:0;background:var(--bg);color:var(--fg);font:15px/1.5 system-ui,sans-serif;padding:28px 16px}
.w{max-width:1000px;margin:0 auto;display:flex;flex-direction:column;gap:20px}h1{margin:0;font-size:1.7rem}.m{color:var(--m)}
.st{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:12px}.st div{background:var(--s);border:1px solid var(--l);border-radius:8px;padding:12px 14px}.st b{display:block;font-size:1.5rem}
.card{background:var(--s);border:1px solid var(--l);border-radius:8px;padding:12px;display:flex;flex-direction:column;gap:10px}
.card header{display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap}code{font:.78rem ui-monospace,Menlo,monospace;background:var(--c);padding:2px 6px;border-radius:4px;overflow-wrap:anywhere}
.g{color:var(--g);font-weight:600}.duo{display:grid;gap:12px;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr))}
figure{margin:0;min-width:0}figure img{width:100%;display:block;border-radius:6px;background:repeating-conic-gradient(var(--chk) 0 25%,transparent 0 50%) 0 0/16px 16px}
figcaption{font-size:.8rem;color:var(--m);margin-top:4px}.note{margin:0;font-size:.8rem;color:var(--m)}
.t{overflow-x:auto;background:var(--s);border:1px solid var(--l);border-radius:8px}table{border-collapse:collapse;width:100%;min-width:620px}
th,td{padding:8px 12px;text-align:left;border-bottom:1px solid var(--l)}th{font-size:.72rem;text-transform:uppercase;letter-spacing:.06em;color:var(--m)}.n{text-align:right;white-space:nowrap}
</style></head><body><div class="w"><header><h1>Rapport d'optimisation des images</h1><p class="m">__DATE__ &middot; seuil __SEUIL__ &middot; max __MAX__ px &middot; JPEG q__QJ__, WebP q__QW__, LANCZOS</p></header>
<div class="st"><div><b>__NB__</b>images optimisees</div><div><b>__AVANT__ &rarr; __APRES__</b>poids total</div><div><b>__ECO__</b>economisees</div><div><b>__PETITES__</b>laissees (&le; 400 Ko)</div><div><b>__ERR__</b>erreurs</div></div>
<p class="m">Les apercus (__INT__ sur __NB__) sont reduits a 700 px de large, de la meme facon pour l'avant et l'apres. Les fichiers complets sont dans <code>images_av_red</code> (avant) et <code>images</code> (apres).</p>
__DOSSIERS__
__CARTES__
<h2>Toutes les images modifiees</h2><div class="t"><table><thead><tr><th>Fichier</th><th class="n">Avant</th><th class="n">Apres</th><th class="n">Gain</th><th class="n">Dim. avant</th><th class="n">Dim. apres</th></tr></thead><tbody>__LIGNES__</tbody></table></div>
</div></body></html>"""
    valeurs = dict(DATE=datetime.now().strftime("%d/%m/%Y %H:%M"), SEUIL=ko(SEUIL_OCTETS), MAX=str(MAX_COTE), QJ=str(QUALITE_JPEG),
                   QW=str(QUALITE_WEBP), NB=str(len(resultats)), AVANT=ko(stats["avant"]), APRES=ko(stats["apres"]), ECO=ko(eco),
                   PETITES=str(stats["ignorees_petites"]), ERR=str(stats["erreurs"]), INT=str(integres),
                   CARTES="".join(cartes), LIGNES="".join(lignes), DOSSIERS=tableau_dossiers_html(stats))
    for cle, val in valeurs.items():
        page = page.replace("__%s__" % cle, val)
    sortie.write_text(page, encoding="utf-8")


def main():
    parser = argparse.ArgumentParser(description="Optimise un dossier d'images (et tous ses sous-dossiers) avec sauvegarde.")
    parser.add_argument("--dir", default="images", help="dossier d'images (defaut : images)")
    parser.add_argument("--format", choices=["keep", "webp"], default="keep",
                        help="keep : meme format et meme nom (defaut) ; webp : JPEG/PNG -> WebP")
    parser.add_argument("--besoins", default=None,
                        help="JSON {chemin relatif dans images : largeur utile en px} (taille affichee x2)")
    parser.add_argument("--seuil-ko", type=int, default=400,
                        help="poids en Ko en dessous duquel une image n'est pas touchee (defaut 400 ; 0 = toutes les images)")
    parser.add_argument("--dry-run", action="store_true", help="ne rien modifier, afficher seulement")
    args = parser.parse_args()

    global SEUIL_OCTETS
    SEUIL_OCTETS = args.seuil_ko * 1024
    original = Path(args.dir).resolve()
    if not original.is_dir():
        sys.exit(f"Dossier introuvable : {original}")
    besoins = {}
    chemin_besoins = Path(args.besoins) if args.besoins else Path(__file__).with_name("besoins_affichage.json")
    if chemin_besoins.is_file():
        besoins = json.loads(chemin_besoins.read_text(encoding="utf-8"))
        print(f"Besoins d'affichage charges : {len(besoins)} images ({chemin_besoins.name})")
    sauvegarde = original.parent / SAUVEGARDE
    travail = original.parent / (original.name + "__travail")
    if sauvegarde.exists() and not args.dry_run:
        sys.exit(f"{sauvegarde} existe deja : le script ne l'ecrase jamais. Renommez-le ou deplacez-le d'abord.")
    if travail.exists():
        sys.exit(f"{travail} existe deja (traitement precedent interrompu ?). Supprimez-le puis relancez.")

    print(f"Copie de {original.name} vers {travail.name} ...")
    shutil.copytree(original, travail)
    try:
        stats, mapping = traiter(travail, args.format, args.dry_run, besoins)
    except KeyboardInterrupt:
        shutil.rmtree(travail, ignore_errors=True)
        sys.exit("\nInterrompu : dossier de travail supprime, l'original n'a pas ete modifie.")

    if args.dry_run:
        shutil.rmtree(travail, ignore_errors=True)
        print("\nMode --dry-run : rien n'a ete modifie.")
    else:
        original.rename(sauvegarde)
        travail.rename(original)
        if mapping:
            with open(original.parent / "webp_mapping.csv", "w", newline="", encoding="utf-8") as f:
                csv.writer(f).writerows([("ancien", "nouveau"), *mapping])
            print(f"Correspondance ancien -> nouveau ecrite dans webp_mapping.csv ({len(mapping)} fichiers)")
    if not args.dry_run and stats["resultats"]:
        rapport_html = original.parent / "rapport_optimisation_images.html"
        ecrire_rapport(rapport_html, original, sauvegarde, stats)
        print(f"Rapport avant/apres : {rapport_html}")
    eco = stats["avant"] - stats["apres"]
    print("\n--- Recapitulatif par dossier ---")
    print("\n".join(recap_dossiers(stats)))
    print("\n--- Resume ---")
    print(f"Images vues            : {stats['vues']} (+ {stats.get('svg', 0)} SVG laisses tels quels)")
    print(f"Laissees (<= seuil)    : {stats['ignorees_petites']}")
    print(f"Optimisees             : {stats['optimisees']}")
    print(f"Gardees (pas de gain)  : {stats['inchangees']}")
    print(f"Erreurs                : {stats['erreurs']}")
    print(f"Poids total            : {ko(stats['avant'])} -> {ko(stats['apres'])} (economie {ko(eco)})")
    if not args.dry_run:
        print(f"Original conserve dans : {sauvegarde}")


if __name__ == "__main__":
    main()
