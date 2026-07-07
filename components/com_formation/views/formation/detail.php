<?php
/* ── meta statique par slug ─────────────────────────────────────────── */
$hwfdMap = [
    'formation-strategie-marketing-digital-ia-maroc' => [
        'icon' => 'fa-chess', 'cat' => 'Stratégie', 'badge' => 'gold',
        'intro' => 'L\'IA ne remplace pas une stratégie. Elle l\'accélère. Cette formation vous aide à intégrer les bons usages IA dans vos fondamentaux marketing, commerciaux et organisationnels pour générer un impact mesurable.',
        'hero_cta' => 'Réserver un audit de maturité gratuit',
        'final_cta' => 'Demander le programme complet',
        'plus' => 'Nous appliquons une logique simple : "Strategy First, AI Second". Vous ne repartez pas avec une liste d\'outils à la mode, mais avec un cadre de décision robuste pour intégrer l\'IA dans votre croissance.',
        'pour_qui_items' => [
            ['label' => 'Dirigeants de TPE et PME', 'icon' => 'fa-briefcase'],
            ['label' => 'Chief Digital Officers', 'icon' => 'fa-user-tie'],
            ['label' => 'Directeurs Marketing', 'icon' => 'fa-bullhorn'],
            ['label' => 'Responsables Stratégie', 'icon' => 'fa-compass'],
            ['label' => 'Étudiants en commerce, marketing et management', 'icon' => 'fa-graduation-cap'],
        ],
        'programme_img' => 'programme-strategie.jpg',
    ],
    'formation-claude-code-developpement-web-maroc' => [
        'icon' => 'fa-code', 'cat' => 'Tech & Build', 'badge' => 'purple',
        'intro' => 'Cette formation intensive vous montre comment utiliser Claude Code comme un véritable copilote technique. En 2 jours, vous apprenez à dialoguer avec l\'agent comme avec un partenaire technique de haut niveau : cadrage du projet, génération de fonctionnalités, correction autonome de bugs, refactoring et préparation à la mise en production.',
        'hero_cta' => 'Réserver ma place',
        'final_cta' => 'Recevoir le programme du bootcamp',
        'plus' => 'Nous ne vous apprenons pas seulement à "faire générer du code". Nous vous apprenons à piloter un flux de production agentique comme un builder professionnel.',
        'pour_qui_items' => [
            ['label' => 'Entrepreneurs Tech', 'icon' => 'fa-rocket'],
            ['label' => 'Développeurs Front et Back', 'icon' => 'fa-code'],
            ['label' => 'Webdesigners', 'icon' => 'fa-palette'],
            ['label' => 'Product Builders', 'icon' => 'fa-cube'],
            ['label' => 'Étudiants en ingénierie, informatique ou produit', 'icon' => 'fa-graduation-cap'],
        ],
        'programme_img' => 'programme-claudecode.jpg',
    ],
    'formation-n8n-automatisation-ia-maroc' => [
        'icon' => 'fa-diagram-project', 'cat' => 'Ops & Automatisation', 'badge' => 'gold',
        'intro' => 'Cette formation vous aide à franchir un cap : sortir des automatisations limitées pour construire une vraie architecture d\'orchestration métier autour de n8n et de l\'IA.',
        'hero_cta' => 'Demander une session',
        'final_cta' => 'Recevoir le détail de la formation',
        'plus' => 'Nous vous aidons à penser vos automatisations comme des systèmes métier durables, pas comme une accumulation de recettes fragiles.',
        'pour_qui_items' => [
            ['label' => 'Responsables Opérations', 'icon' => 'fa-gears'],
            ['label' => 'Growth Engineers', 'icon' => 'fa-chart-line'],
            ['label' => 'Administrateurs Systèmes', 'icon' => 'fa-server'],
            ['label' => 'Product Managers', 'icon' => 'fa-clipboard-list'],
            ['label' => 'Étudiants en transformation digitale, data et systèmes', 'icon' => 'fa-graduation-cap'],
        ],
        'programme_img' => 'programme-n8n.jpg',
    ],
    'formation-podcast-ia-maroc' => [
        'icon' => 'fa-microphone', 'cat' => 'Podcast & Média', 'badge' => 'purple',
        'intro' => 'Cette formation s\'adresse à celles et ceux qui veulent lancer un podcast stratégique, différenciant et soutenable dans le temps. L\'IA y devient un producteur exécutif, un conseiller éditorial et un accélérateur de pré-production.',
        'hero_cta' => 'Réserver l\'atelier',
        'final_cta' => 'Recevoir le programme complet',
        'plus' => 'Nous utilisons l\'IA comme un partenaire éditorial et stratégique, pas comme un simple outil de montage ou de génération de texte.',
        'pour_qui_items' => [
            ['label' => 'Futurs podcasteurs', 'icon' => 'fa-microphone'],
            ['label' => 'Directeurs de la Communication', 'icon' => 'fa-comments'],
            ['label' => 'Experts métiers', 'icon' => 'fa-lightbulb'],
            ['label' => 'Créateurs de contenu', 'icon' => 'fa-pen-nib'],
            ['label' => 'Étudiants en communication, médias et journalisme', 'icon' => 'fa-graduation-cap'],
        ],
        'programme_img' => 'programme-podcast.jpg',
    ],
];
$slug = $formation ? ($formation->getSlug() ?? '') : '';
$meta = isset($hwfdMap[$slug]) ? $hwfdMap[$slug] : ['icon' => 'fa-graduation-cap', 'cat' => 'Formation', 'badge' => 'gold', 'intro' => '', 'hero_cta' => 'Réserver ma place', 'final_cta' => 'Demander le programme complet', 'plus' => '', 'pour_qui_items' => [], 'programme_img' => ''];

/* ── durée ──────────────────────────────────────────────────────────── */
$hwfdDuree = 'Sur demande';
$hwfdDateStr = '';
if ($formation && $formation->getDateDebut() && $formation->getDateFin()) {
    try {
        $d1 = new DateTime($formation->getDateDebut());
        $d2 = new DateTime($formation->getDateFin());
        $days = (int)$d1->diff($d2)->days + 1;
        $hwfdDuree = $days . ' ' . ($days > 1 ? 'jours' : 'jour');
    } catch (Exception $e) {}
}
if ($formation && $formation->getDateDebut()) {
    $hwfdDateStr = date('d M Y', strtotime($formation->getDateDebut()));
}

/* ── inscriptions / capacité (hero info cards) ─────────────────────── */
$hwfdOuvertureStr = '';
$hwfdLimiteStr    = '';
if ($formation && $formation->getDateOuvertureInscription()) {
    $hwfdOuvertureStr = date('d M Y', strtotime($formation->getDateOuvertureInscription()));
}
if ($formation && $formation->getDateLimiteInscription()) {
    $hwfdLimiteStr = date('d M Y', strtotime($formation->getDateLimiteInscription()));
}
$hwfdCapaciteStr = '';
if ($formation && intval($formation->getNbParticipants()) > 0) {
    $hwfdCapaciteStr = ($formation->getNbParticipantsMin() ? intval($formation->getNbParticipantsMin()) . ' – ' : '') . intval($formation->getNbParticipants()) . ' participants';
}

/* ── lieu / modalité : dépend du "Type de formation" choisi dans l'admin ─ */
$hwfdLieuLabel = 'Lieu';
$hwfdLieuIcon  = 'fa-location-dot';
$hwfdLieuVal   = $formation ? explode(' —', $formation->getLieu() ?? '')[0] : '';
if ($formation && $formation->getTypeFormation() === 'distance') {
    $hwfdLieuLabel = 'Modalité';
    $hwfdLieuIcon  = 'fa-wifi';
    $hwfdLieuVal   = 'En ligne';
} elseif ($formation && $formation->getTypeFormation() === 'hybride') {
    $hwfdLieuLabel = 'Modalité';
    $hwfdLieuIcon  = 'fa-shuffle';
    $hwfdLieuVal   = $hwfdLieuVal !== '' ? 'Hybride — ' . $hwfdLieuVal : 'Hybride';
}

/* ── programme : parsing des modules (<li><strong>Module N — Titre</strong> : texte</li>)
   pour le panneau diagonal, avec repli sur le HTML brut si le motif ne matche pas ──── */
$hwfdModules = [];
if ($formation && $formation->getDescription()) {
    preg_match_all('/<li>\s*<strong>(.*?)<\/strong>\s*:?\s*(.*?)<\/li>/is', $formation->getDescription(), $hwfdModMatches, PREG_SET_ORDER);
    foreach ($hwfdModMatches as $i => $mm) {
        $hwfdFullTitle = html_entity_decode(trim(strip_tags($mm[1])), ENT_QUOTES, 'UTF-8');
        /* "Module N — Titre descriptif" → label court "Module N" + titre descriptif séparé */
        $hwfdLabel = 'Module ' . ($i + 1);
        $hwfdSub   = $hwfdFullTitle;
        if (preg_match('/^(.*?)\s*[—–-]\s*(.+)$/u', $hwfdFullTitle, $hwfdSplit)) {
            $hwfdLabel = trim($hwfdSplit[1]);
            $hwfdSub   = trim($hwfdSplit[2]);
        }
        $hwfdModules[] = [
            'num'   => sprintf('%02d', $i + 1),
            'label' => $hwfdLabel,
            'title' => $hwfdSub,
            'text'  => html_entity_decode(trim(strip_tags($mm[2])), ENT_QUOTES, 'UTF-8'),
        ];
    }
}
$hwfdModuleImgMap = [
    'formation-strategie-marketing-digital-ia-maroc' => ['strategie-m1.jpg', 'strategie-m2.jpg', 'strategie-m3.jpg', 'strategie-m4.jpg'],
    'formation-claude-code-developpement-web-maroc'  => ['claudecode-m1.jpg', 'claudecode-m2.jpg', 'claudecode-m3.jpg', 'claudecode-m4.jpg'],
    'formation-n8n-automatisation-ia-maroc'          => ['n8n-m1.jpg', 'n8n-m2.jpg', 'n8n-m3.jpg', 'n8n-m4.jpg'],
    'formation-podcast-ia-maroc'                       => ['podcast-m1.jpg', 'podcast-m2.jpg', 'podcast-m3.jpg', 'podcast-m4.jpg'],
];
$hwfdModuleImgs = isset($hwfdModuleImgMap[$slug]) ? $hwfdModuleImgMap[$slug] : [];

/* ── livrables : parsing en items pour la rangée horizontale de cercles
   (nombre variable selon la formation, 3 à 5) ─────────────────────────── */
$hwfdLivrItems = [];
if ($formation && $formation->getLivrables()) {
    preg_match_all('/<li>(.*?)<\/li>/is', $formation->getLivrables(), $hwfdLivrMatches);
    foreach ($hwfdLivrMatches[1] as $li) {
        $txt = html_entity_decode(trim(strip_tags($li)), ENT_QUOTES, 'UTF-8');
        if ($txt !== '') $hwfdLivrItems[] = $txt;
    }
}
/* icône choisie selon le contenu réel du livrable (et non plus par index) */
$hwfdLivrIconRules = [
    'icon-target.png'    => ['diagnostic', 'audit', 'analys', 'maturité', 'priorisation', 'prioris', 'cible', 'objectif'],
    'icon-map.png'       => ['cartograph', 'carte', 'panorama', 'vision', 'opportunit'],
    'icon-road.png'      => ['feuille de route', 'roadmap', "plan d'action", 'parcours', 'étapes', 'trajectoire', 'déploy', 'version'],
    'icon-box.png'       => ['livrable', 'kit', 'pack', 'template', 'asset', 'bibliothèque', 'squelette', 'show bible', 'bible'],
    'icon-layers.png'    => ['architecture', 'structure', 'système', 'couche', 'niveau', 'workflow', 'méthode', 'reproductible', 'logique'],
    'icon-clipboard.png' => ['checklist', 'liste', 'process', 'guide', 'calendrier', 'planning', 'positionnement', 'concept', 'charte', 'plan'],
];
function hwfd_livr_icon($text, $prevIcon = null) {
    global $hwfdLivrIconRules;
    $t = mb_strtolower($text, 'UTF-8');
    $scores = [];
    foreach ($hwfdLivrIconRules as $icon => $keywords) {
        $score = 0;
        foreach ($keywords as $kw) {
            if (mb_strpos($t, mb_strtolower($kw, 'UTF-8')) !== false) $score += mb_strlen($kw);
        }
        $scores[$icon] = $score;
    }
    arsort($scores);
    foreach ($scores as $icon => $score) {
        if ($score > 0 && $icon !== $prevIcon) return $icon;
    }
    $top = array_key_first($scores);
    if ($scores[$top] > 0) return $top;
    return $prevIcon === 'icon-clipboard.png' ? 'icon-box.png' : 'icon-clipboard.png';
}
$hwfdLivrGradients = [
    ['#680262', '#B23A8C'],
    ['#09A1BE', '#5FD3E8'],
    ['#C2185B', '#F06292'],
];

/* ── autres formations ──────────────────────────────────────────────── */
$hwfdOthers = array_filter($formations ?? [], function($f) use ($slug) { return $f->getSlug() !== $slug; });
$hwfdOtherMeta = [
    'formation-strategie-marketing-digital-ia-maroc'  => ['icon' => 'fa-chess',           'label' => 'Stratégie',    'color' => '#09A1BE'],
    'formation-claude-code-developpement-web-maroc'   => ['icon' => 'fa-code',            'label' => 'Tech & Build', 'color' => '#680262'],
    'formation-n8n-automatisation-ia-maroc'            => ['icon' => 'fa-diagram-project', 'label' => 'Ops & Growth', 'color' => '#09A1BE'],
    'formation-podcast-ia-maroc'                        => ['icon' => 'fa-microphone',      'label' => 'Créateurs',    'color' => '#680262'],
];

/* ── nom formation pour le formulaire ──────────────────────────────── */
$hwfdTitreForm = htmlspecialchars($formation ? ($formation->getTitre() ?? '') : '', ENT_QUOTES, 'UTF-8');
?>
<style>
/* ── VARIABLES ─────────────────────────────────────────────────────────── */
:root{--hwfd-ease:cubic-bezier(0.23,1,0.32,1);--hwfd-gold:#09A1BE;--hwfd-purple:#680262;--hwfd-border:rgba(0,0,0,.08);--hwfd-txt:#111;--hwfd-txt2:#555}

/* ── BREADCRUMB ────────────────────────────────────────────────────────── */
.hw-f-det-bc{padding:1.4rem 0;background:#fff;border-bottom:1px solid var(--hwfd-border)}
.hw-f-det-bc-inner{display:flex;align-items:center;gap:.55rem;font-size:.7rem;color:var(--hwfd-txt2)}
.hw-f-det-bc-inner a{color:var(--hwfd-txt2);text-decoration:none;transition:color .2s}
.hw-f-det-bc-inner a:hover{color:var(--hwfd-gold)}
.hw-f-det-bc-sep{opacity:.3}

/* ── HERO — texte d'introduction ──────────────────────────────────────── */
.hwfd-countdown-intro{font-size:.92rem;font-weight:300;color:var(--hwfd-txt2);max-width:640px;line-height:1.85;margin:2.6rem auto 0;opacity:.85}

/* ── HERO — mise en grille (texte + colonne infos) ──────────────────────── */
.wm-hero-inner{display:grid;grid-template-columns:1fr;gap:3rem;align-items:start}

/* ── POUR QUI : liste de cartes (même langage visuel que les info-cards du
   hero) — icône carrée en dégradé + nom du profil, avec un petit anneau
   orbital qui s'anime au survol de chaque carte. ──────────────────────── */
.hw-f-det-audience{padding:7rem 0;background:#f8f8f8;border-top:1px solid var(--hwfd-border)}
.hw-f-det-audience-grid{display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:center}
.hwfd-audience-list{display:flex;flex-direction:column;gap:.8rem}
.hwfd-audience-card{display:flex;align-items:center;gap:1.1rem;padding:1.1rem 1.4rem;background:#fff;border:1px solid var(--hwfd-border);border-radius:14px;box-shadow:0 10px 30px rgba(0,0,0,.04);transition:border-color .25s,box-shadow .25s,transform .25s}
.hwfd-audience-card:hover{border-color:rgba(9,161,190,.35);box-shadow:0 14px 34px -10px rgba(9,20,40,.14);transform:translateX(4px)}
.hwfd-audience-icon{position:relative;width:44px;height:44px;border-radius:11px;background:linear-gradient(135deg,#680262,#09A1BE);display:flex;align-items:center;justify-content:center;font-size:.95rem;color:#fff;flex-shrink:0}
.hwfd-audience-orbit{position:absolute;top:-9px;right:-9px;width:22px;height:22px;border-radius:50%;border:1.5px dashed rgba(9,161,190,.5);opacity:0;transition:opacity .3s ease}
.hwfd-audience-orbit-dot{position:absolute;top:-3px;left:50%;width:6px;height:6px;border-radius:50%;background:#09A1BE;box-shadow:0 0 6px rgba(9,161,190,.7);transform:translateX(-50%)}
.hwfd-audience-card:hover .hwfd-audience-orbit{opacity:1}
.hwfd-audience-name{font-size:.84rem;color:#222;font-weight:500}
@media(max-width:900px){.hw-f-det-audience-grid{grid-template-columns:1fr}}

/* ── INTRO ─────────────────────────────────────────────────────────────── */

/* ── PROGRAMME ─────────────────────────────────────────────────────────── */
.hw-f-det-programme{padding:7rem 0;background:#f8f8f8;border-top:1px solid var(--hwfd-border)}
.hw-f-det-programme-split{display:grid;grid-template-columns:.85fr 1.15fr;gap:4rem;align-items:start;margin-top:3rem}
.hw-f-det-programme-visual{position:sticky;top:6rem;border-radius:22px;overflow:hidden;box-shadow:0 30px 70px -30px rgba(0,0,0,.25)}
.hw-f-det-programme-visual img{width:100%;height:560px;object-fit:cover;display:block}
@media(max-width:900px){.hw-f-det-programme-split{grid-template-columns:1fr}.hw-f-det-programme-visual{position:static}.hw-f-det-programme-visual img{height:320px}}
.hw-f-det-programme-body{margin-top:0}
.hw-f-det-programme-body h3{font-family:var(--fm,sans-serif);font-weight:600;font-size:.84rem;letter-spacing:.08em;text-transform:uppercase;color:var(--hwfd-gold);margin:2.5rem 0 1rem;display:flex;align-items:center;gap:.7rem}
.hw-f-det-programme-body h3:first-child{margin-top:0}
.hw-f-det-programme-body h3::before{content:'';width:20px;height:1px;background:var(--hwfd-gold)}
.hw-f-det-programme-body ul{list-style:none;display:flex;flex-direction:column;gap:.75rem}
.hw-f-det-programme-body li{display:flex;align-items:flex-start;gap:.9rem;padding:1.3rem 1.5rem;background:#fff;border:1px solid var(--hwfd-border);border-radius:13px;font-size:.82rem;color:var(--hwfd-txt2);line-height:1.75;transition:border-color .25s var(--hwfd-ease),transform .25s var(--hwfd-ease)}
.hw-f-det-programme-body li:hover{border-color:rgba(9,161,190,.3);transform:translateX(4px)}
.hw-f-det-programme-body li::before{content:'\f00c';font-family:'Font Awesome 5 Pro';font-weight:300;color:var(--hwfd-gold);font-size:.75rem;flex-shrink:0;margin-top:.15rem}
.hw-f-det-programme-body li strong{color:var(--hwfd-txt)}
.hw-f-det-programme-body p{font-size:.86rem;color:var(--hwfd-txt2);line-height:1.85}

/* ── PROGRAMME : panneaux diagonaux (hover pour ouvrir), 1 image par module ──
   La photo vit dans .hwfd-diag-panel-inner (surdimensionnée + skew inverse pour
   rester "droite" visuellement). Le texte (num/titre/description) est un calque
   INDÉPENDANT, enfant direct du panneau skewé, en largeur fixe -- jamais étiré
   en pourcentage d'un parent surdimensionné, sinon il déborde sur les panneaux
   voisins malgré l'overflow:hidden (piège rencontré en v1). */
.hwfd-prog-diag{display:flex;height:560px;margin-top:2.4rem;background:#fff;position:relative}
.hwfd-diag-panel{position:relative;flex:1;min-width:0;overflow:hidden;cursor:pointer;outline:none;
  transition:flex-grow .65s cubic-bezier(.22,1,.36,1);
  transform:skewX(-9deg);margin-left:-46px;
  box-shadow:-14px 0 26px -12px rgba(0,0,0,.5)}
.hwfd-diag-panel:first-child{margin-left:0;box-shadow:none}
.hwfd-diag-panel-inner{position:absolute;top:0;bottom:0;left:-25%;width:150%;transform:skewX(9deg)}
.hwfd-diag-panel-inner img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;filter:grayscale(75%) brightness(.7);transition:filter .7s ease,transform 6s ease}
.hwfd-diag-scrim{position:absolute;inset:0;background:linear-gradient(180deg,rgba(9,10,10,.1) 0%,rgba(9,10,10,.35) 45%,rgba(9,10,10,.92) 100%);transition:background .5s ease}
.hwfd-diag-num{position:absolute;top:2.2rem;left:4.2rem;transform:skewX(9deg);transform-origin:left top;font-family:var(--fm,sans-serif);font-weight:200;font-size:2.6rem;color:rgba(255,255,255,.3);transition:color .5s ease;white-space:nowrap}
.hwfd-diag-body{position:absolute;left:4.2rem;bottom:2.2rem;width:230px;max-width:55vw;transform:skewX(9deg);transform-origin:left bottom}
.hwfd-diag-label{font-family:var(--fm,sans-serif);font-weight:700;font-size:.72rem;letter-spacing:.1em;text-transform:uppercase;color:#fff;white-space:nowrap}
.hwfd-diag-title{font-family:var(--fm,sans-serif);font-weight:700;font-size:.9rem;letter-spacing:.02em;color:#fff;line-height:1.35;margin-top:.6rem;max-height:0;opacity:0;overflow:hidden;transition:max-height .55s ease,opacity .4s ease}
.hwfd-diag-text{font-size:.76rem;color:rgba(255,255,255,.75);line-height:1.7;margin-top:.7rem;max-height:0;opacity:0;overflow:hidden;transition:max-height .55s ease,opacity .4s ease}

.hwfd-diag-panel:hover,.hwfd-diag-panel:focus-visible{flex-grow:2.6}
.hwfd-diag-panel:hover .hwfd-diag-panel-inner img,.hwfd-diag-panel:focus-visible .hwfd-diag-panel-inner img{filter:grayscale(0%) brightness(.9);transform:scale(1.06)}
.hwfd-diag-panel:hover .hwfd-diag-scrim,.hwfd-diag-panel:focus-visible .hwfd-diag-scrim{background:linear-gradient(180deg,rgba(9,10,10,.05) 0%,rgba(9,10,10,.2) 40%,rgba(104,2,98,.88) 100%)}
.hwfd-diag-panel:hover .hwfd-diag-num,.hwfd-diag-panel:focus-visible .hwfd-diag-num{color:rgba(255,255,255,.55)}
.hwfd-diag-panel:hover .hwfd-diag-title,.hwfd-diag-panel:focus-visible .hwfd-diag-title{max-height:110px;opacity:1}
.hwfd-diag-panel:hover .hwfd-diag-text,.hwfd-diag-panel:focus-visible .hwfd-diag-text{max-height:180px;opacity:1}
.hwfd-diag-panel.touch-active{flex-grow:2.6}
.hwfd-diag-panel.touch-active .hwfd-diag-panel-inner img{filter:grayscale(0%) brightness(.9);transform:scale(1.06)}
.hwfd-diag-panel.touch-active .hwfd-diag-scrim{background:linear-gradient(180deg,rgba(9,10,10,.05) 0%,rgba(9,10,10,.2) 40%,rgba(104,2,98,.88) 100%)}
.hwfd-diag-panel.touch-active .hwfd-diag-num{color:rgba(255,255,255,.55)}
.hwfd-diag-panel.touch-active .hwfd-diag-title{max-height:110px;opacity:1}
.hwfd-diag-panel.touch-active .hwfd-diag-text{max-height:180px;opacity:1}

@media(max-width:760px){
  .hwfd-prog-diag{flex-direction:column;height:auto}
  .hwfd-diag-panel{flex:none;height:120px;transform:none;margin-left:0;box-shadow:0 -10px 20px -12px rgba(0,0,0,.4);transition:height .5s ease}
  .hwfd-diag-panel:first-child{box-shadow:none}
  .hwfd-diag-panel-inner{left:0;width:100%;transform:none}
  .hwfd-diag-num,.hwfd-diag-body{transform:none}
  .hwfd-diag-panel:hover,.hwfd-diag-panel:focus-visible,.hwfd-diag-panel.touch-active{flex:none;height:250px}
  .hwfd-diag-num{font-size:1.8rem;top:1.2rem;left:1.4rem}
  .hwfd-diag-body{left:1.4rem;width:auto;right:1.4rem;bottom:1.2rem}
}
@media(prefers-reduced-motion:reduce){.hwfd-diag-panel,.hwfd-diag-panel-inner img,.hwfd-diag-scrim,.hwfd-diag-title,.hwfd-diag-text{transition:none!important}}

/* ── LIVRABLES ─────────────────────────────────────────────────────────── */
.hw-f-det-livrables{padding:7rem 0;background:#fff;border-top:1px solid var(--hwfd-border)}
.hw-f-det-livrables-body{margin-top:2.5rem}
.hw-f-det-livrables-body ul{list-style:none;display:grid;grid-template-columns:1fr 1fr;gap:1rem}
.hw-f-det-livrables-body li{display:flex;align-items:flex-start;gap:.85rem;padding:1.5rem;background:#f8f8f8;border:1px solid var(--hwfd-border);border-radius:13px;font-size:.8rem;color:var(--hwfd-txt2);line-height:1.7;transition:border-color .25s,box-shadow .25s}
.hw-f-det-livrables-body li:hover{border-color:rgba(9,161,190,.3);box-shadow:0 6px 20px rgba(0,0,0,.05)}
.hw-f-det-livrables-body li::before{content:'\f058';font-family:'Font Awesome 5 Pro';font-weight:300;color:var(--hwfd-gold);font-size:.9rem;flex-shrink:0;margin-top:.05rem}
@media(max-width:640px){.hw-f-det-livrables-body ul{grid-template-columns:1fr}}

/* ── LIVRABLES : grands cercles à anneau dégradé, serrés les uns contre les
   autres, reliés par un trait fin, avec un trait vertical animé qui descend
   du cercle jusqu'au texte. Nombre de colonnes variable selon la formation. */
.hwfd-livr-row{display:grid;gap:.6rem;margin-top:3rem;align-items:start}
.hwfd-livr-item{display:flex;flex-direction:column;align-items:center;text-align:center;padding:0 .3rem}
.hwfd-livr-circle-wrap{position:relative;width:100%;max-width:300px;margin:0 auto}
.hwfd-livr-connector{position:absolute;top:50%;left:100%;width:calc(.6rem + 2px);height:0;border-top:1px solid #dcdce2;transform:translateY(-1px);z-index:0}
.hwfd-livr-circle-outer{position:relative;z-index:1;width:100%;aspect-ratio:1;border-radius:50%;padding:8px;box-shadow:0 22px 48px -16px rgba(9,20,40,.3);transition:box-shadow .4s ease}
.hwfd-livr-circle-inner{width:100%;height:100%;border-radius:50%;background:#fff;display:flex;align-items:center;justify-content:center;color:var(--hwfd-txt);box-shadow:inset 0 2px 10px rgba(9,20,40,.06);overflow:hidden}
.hwfd-livr-circle-inner img{width:60%;height:60%;object-fit:contain;transition:transform .4s var(--hwfd-ease)}
.hwfd-livr-item:hover .hwfd-livr-circle-outer{box-shadow:0 28px 56px -16px rgba(9,20,40,.4)}
.hwfd-livr-item:hover .hwfd-livr-circle-inner img{transform:scale(1.08)}
.hwfd-livr-orbit{position:absolute;inset:0;pointer-events:none;z-index:2}
.hwfd-livr-orbit-dot{position:absolute;top:-4px;left:50%;width:11px;height:11px;border-radius:50%;background:#fff;box-shadow:0 0 0 3px var(--c),0 2px 10px rgba(9,20,40,.35);transform:translateX(-50%)}
.hwfd-livr-vline{width:2px;height:88px;margin:0 auto;transform-origin:top;transform:scaleY(0)}
.hwfd-livr-num{font-family:var(--fm,sans-serif);font-weight:700;font-size:.78rem;letter-spacing:.14em;text-transform:uppercase;margin:1rem 0 .7rem;display:inline-flex;align-items:center;gap:.5rem}
.hwfd-livr-num::before{content:'';width:6px;height:6px;border-radius:50%;background:currentColor;flex-shrink:0}
.hwfd-livr-text p{font-size:.78rem;color:var(--hwfd-txt2);line-height:1.7;font-weight:400;margin:0;max-width:230px}
@media(max-width:900px){
  .hwfd-livr-row{grid-template-columns:1fr!important;gap:2.2rem}
  .hwfd-livr-item{flex-direction:row;text-align:left;align-items:flex-start;padding:0}
  .hwfd-livr-circle-wrap{width:96px;flex-shrink:0;margin-right:1.2rem}
  .hwfd-livr-connector{display:none}
  .hwfd-livr-vline{display:none}
  .hwfd-livr-text{flex:1}
  .hwfd-livr-num{justify-content:flex-start;margin-top:0}
  .hwfd-livr-text p{max-width:none}
}
@media(prefers-reduced-motion:reduce){.hwfd-livr-dot,.hwfd-livr-ring{transition:none!important}}

/* ── PRÉREQUIS ─────────────────────────────────────────────────────────── */
.hw-f-det-prereqs{padding:6rem 0;background:#f8f8f8;border-top:1px solid var(--hwfd-border)}
.hw-f-det-prereqs-inner{max-width:680px;margin:0 auto;text-align:center}
.hw-f-det-prereqs-text{font-size:.86rem;color:var(--hwfd-txt2);line-height:1.9;margin-top:1.4rem}

/* ── compte à rebours d'expiration (fin de formation), sous le hero ─────── */
.hw-f-det-cd-section{padding:5rem 0;background:#fff;border-top:1px solid var(--hwfd-border)}
.hwfd-countdown{width:70%;margin:0 auto;text-align:center}
@media(max-width:900px){.hwfd-countdown{width:100%}}
.hwfd-countdown-timer{display:flex;justify-content:center;align-items:center;gap:1.6rem;flex-wrap:nowrap;margin-bottom:2.4rem}
.hwfd-cd-unit{position:relative;width:184px;height:184px;flex-shrink:0;display:flex;align-items:center;justify-content:center}
.hwfd-cd-unit:not(:last-child)::after{content:'';position:absolute;top:50%;left:100%;width:1.6rem;height:1px;background:var(--hwfd-border);transform:translateY(-1px)}
.hwfd-cd-ring{position:absolute;inset:0;width:100%;height:100%;transform:rotate(-90deg)}
.hwfd-cd-track{fill:none;stroke:var(--hwfd-border);stroke-width:3}
.hwfd-cd-fill{fill:none;stroke:url(#hwfdCdGrad);stroke-width:3;stroke-linecap:round;transition:stroke-dashoffset 1s linear}
.hwfd-cd-value{font-family:var(--fm,sans-serif);font-weight:700;font-size:2.6rem;color:var(--hwfd-txt)}
.hwfd-cd-label{position:absolute;bottom:-1.7rem;left:0;right:0;font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;color:var(--hwfd-txt2);text-align:center}
.hwfd-countdown-note{font-size:.76rem;color:var(--hwfd-txt2);font-style:italic;margin-bottom:2.4rem}
.hwfd-countdown-chips{display:flex;justify-content:center;align-items:stretch;gap:.6rem;flex-wrap:nowrap;overflow-x:auto;padding-bottom:.3rem}
.hwfd-cd-chip{display:flex;align-items:center;gap:.6rem;padding:.7rem .9rem;background:#fff;border:1px solid var(--hwfd-border);border-radius:12px;text-align:left;white-space:nowrap;flex-shrink:0}
.hwfd-cd-chip-icon{width:32px;height:32px;border-radius:9px;background:linear-gradient(135deg,#680262,#09A1BE);display:flex;align-items:center;justify-content:center;color:#fff;font-size:.75rem;flex-shrink:0}
.hwfd-cd-chip-lbl{display:block;font-size:.52rem;letter-spacing:.16em;text-transform:uppercase;color:#999;font-weight:700}
.hwfd-cd-chip-val{display:block;font-size:.76rem;color:#222;font-weight:500;margin-top:.1rem}
@media(max-width:900px){.hwfd-countdown-chips{justify-content:flex-start}}
@media(max-width:640px){
  .hwfd-cd-unit{width:130px;height:130px}
  .hwfd-cd-value{font-size:1.9rem}
  .hwfd-countdown-timer{justify-content:flex-start;overflow-x:auto;padding:0 .2rem .5rem}
}

/* ── LE PLUS HW (fond vidéo) ─────────────────────────────────────────────── */
.hw-f-det-plus{position:relative;padding:8rem 0;text-align:center;overflow:hidden}
.hw-f-det-plus-inner{max-width:680px;margin:0 auto}
.hw-f-det-plus-lbl{font-size:.56rem;letter-spacing:.4em;text-transform:uppercase;color:rgba(255,255,255,.45);margin-bottom:1.5rem}
.hw-f-det-plus-title{font-weight:200;font-size:clamp(1.8rem,3.5vw,3rem);color:#fff;line-height:1.1;letter-spacing:-.03em;margin-bottom:1.5rem}
.hw-f-det-plus-text{font-size:.88rem;color:rgba(255,255,255,.75);line-height:1.95;font-weight:300}

/* ── FORMULAIRE ────────────────────────────────────────────────────────── */
.hw-f-det-form-section{padding:8rem 0;background:#fff;border-top:1px solid var(--hwfd-border)}
.hw-f-det-form-wrap{max-width:780px;margin:0 auto;padding:3rem;background:#fff;border:1px solid var(--hwfd-border);border-radius:24px;box-shadow:0 20px 60px rgba(0,0,0,.05)}
.hw-f-det-form-title{font-family:var(--fm,sans-serif);font-weight:600;font-size:1.5rem;color:var(--hwfd-txt);margin-bottom:.5rem}
.hw-f-det-form-sub{font-size:.8rem;color:var(--hwfd-txt2);line-height:1.8;margin-bottom:2.5rem}
.hw-f-det-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:1.2rem}
.hw-f-det-form-full{grid-column:1/-1}
.hw-f-det-field{display:flex;flex-direction:column;gap:.4rem}
.hw-f-det-label{font-size:.7rem;font-weight:600;letter-spacing:.04em;color:var(--hwfd-txt);text-transform:uppercase}
.hw-f-det-label span{color:#e44;font-size:.9em;margin-left:2px}
.hw-f-det-input{width:100%;padding:.85rem 1rem;border:1.5px solid var(--hwfd-border);border-radius:10px;font-size:.84rem;color:var(--hwfd-txt);background:#fff;transition:border-color .2s,box-shadow .2s;outline:none;font-family:inherit;box-sizing:border-box;appearance:none}
.hw-f-det-input:focus{border-color:var(--hwfd-gold);box-shadow:0 0 0 3px rgba(9,161,190,.12)}
.hw-f-det-input::placeholder{color:#aaa}
.hw-f-det-conditional{display:none}
.hw-f-det-conditional.visible{display:contents}
.hw-f-det-sep{grid-column:1/-1;border:none;border-top:1px solid var(--hwfd-border);margin:.5rem 0}
.hw-f-det-sep-label{grid-column:1/-1;font-size:.65rem;letter-spacing:.25em;text-transform:uppercase;color:var(--hwfd-txt2);opacity:.6;display:flex;align-items:center;gap:.8rem}
.hw-f-det-sep-label::after{content:'';flex:1;height:1px;background:var(--hwfd-border)}
.hw-f-det-consent{grid-column:1/-1;display:flex;align-items:flex-start;gap:.75rem;padding:1.2rem;background:#f8f8f8;border-radius:10px;cursor:pointer}
.hw-f-det-consent input{width:16px;height:16px;accent-color:var(--hwfd-gold);flex-shrink:0;margin-top:2px;cursor:pointer}
.hw-f-det-consent span{font-size:.73rem;color:var(--hwfd-txt2);line-height:1.7}
.hw-f-det-form-submit{grid-column:1/-1;margin-top:.5rem}
.hw-f-det-submit-btn{width:100%;padding:1.1rem;background:linear-gradient(135deg,#680262,#09A1BE);color:#fff;border:none;border-radius:12px;font-size:.84rem;font-weight:600;letter-spacing:.04em;cursor:pointer;transition:opacity .2s,transform .18s var(--hwfd-ease);font-family:inherit}
.hw-f-det-submit-btn:hover{opacity:.9;transform:translateY(-1px)}
.hw-f-det-submit-btn:active{transform:scale(.98)}
.hw-f-det-success{display:none;text-align:center;padding:3rem 2rem}
.hw-f-det-success-icon{width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,#680262,#09A1BE);display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.4rem;margin:0 auto 1.5rem}
.hw-f-det-success-title{font-weight:600;font-size:1.2rem;color:var(--hwfd-txt);margin-bottom:.6rem}
.hw-f-det-success-text{font-size:.82rem;color:var(--hwfd-txt2);line-height:1.8}
.hw-f-det-success-error{display:none;text-align:center;padding:1.2rem;margin-top:1rem;background:#fdeceb;border:1px solid #f3b9b4;border-radius:12px;font-size:.78rem;color:#b3261e}
@media(max-width:640px){.hw-f-det-form-grid{grid-template-columns:1fr}.hw-f-det-form-wrap{padding:2rem 1.2rem}}

/* ── FORMULAIRE : wizard 2 étapes ─────────────────────────────────────── */
.hw-f-det-form-wrap{perspective:1800px}
.hwfd-wizard-progress{display:flex;align-items:center;gap:.7rem;margin-bottom:2.4rem}
.hwfd-wizard-step{display:flex;align-items:center;gap:.6rem;font-size:.68rem;font-weight:600;letter-spacing:.03em;color:#bbb;transition:color .35s}
.hwfd-wizard-step.active,.hwfd-wizard-step.done{color:var(--hwfd-txt)}
.hwfd-wizard-dot{width:26px;height:26px;flex-shrink:0;border-radius:50%;border:1.5px solid var(--hwfd-border);display:flex;align-items:center;justify-content:center;font-size:.66rem;font-weight:700;color:#bbb;transition:all .35s var(--hwfd-ease)}
.hwfd-wizard-step.active .hwfd-wizard-dot{border-color:transparent;background:linear-gradient(135deg,#680262,#09A1BE);color:#fff;transform:scale(1.08)}
.hwfd-wizard-step.done .hwfd-wizard-dot{border-color:var(--hwfd-gold);background:var(--hwfd-gold);color:#fff}
.hwfd-wizard-line{flex:1;height:1.5px;background:var(--hwfd-border);position:relative;max-width:90px;overflow:hidden}
.hwfd-wizard-line::after{content:'';position:absolute;inset:0;background:linear-gradient(90deg,#680262,#09A1BE);transform:scaleX(0);transform-origin:left;transition:transform .6s var(--hwfd-ease)}
.hwfd-wizard-line.done::after{transform:scaleX(1)}
.hwfd-step-wrap{transform-style:preserve-3d}
.hwfd-step-nav{grid-column:1/-1;display:flex;gap:1rem;margin-top:.5rem}
.hwfd-btn-back{padding:1.1rem 1.6rem;background:none;border:1.5px solid var(--hwfd-border);border-radius:12px;font-size:.8rem;font-weight:600;color:var(--hwfd-txt2);cursor:pointer;transition:border-color .2s,color .2s;font-family:inherit;white-space:nowrap}
.hwfd-btn-back:hover{border-color:var(--hwfd-gold);color:var(--hwfd-gold)}
.hwfd-btn-next{flex:1;padding:1.1rem;background:linear-gradient(135deg,#680262,#09A1BE);color:#fff;border:none;border-radius:12px;font-size:.84rem;font-weight:600;letter-spacing:.04em;cursor:pointer;transition:opacity .2s,transform .18s var(--hwfd-ease);font-family:inherit}
.hwfd-btn-next:hover{opacity:.9;transform:translateY(-1px)}
.hwfd-btn-next:active{transform:scale(.98)}
.hw-f-det-input.hwfd-invalid{border-color:#e44!important;box-shadow:0 0 0 3px rgba(228,68,68,.1)!important}

/* ── AUTRES FORMATIONS (scroll horizontal coverflow, style catalogue liste) ─ */
.hw-f-det-more{border-top:1px solid var(--hwfd-border)}

/* ── CTA FINAL (fond vidéo) ────────────────────────────────────────────── */
.hw-f-det-cta-final{position:relative;padding:9rem 0;text-align:center;overflow:hidden}

/* ── REDUCED MOTION ────────────────────────────────────────────────────── */
@media(prefers-reduced-motion:reduce){
  .hw-f-det-programme-body li,.hw-f-det-livrables-body li{transition:none!important}
}
</style>

<!-- ══ BREADCRUMB ══════════════════════════════════════════════════════════ -->
<div class="hw-f-det-bc">
  <div class="container">
    <div class="hw-f-det-bc-inner">
      <a href="<?= $siteURL; ?>">Accueil</a>
      <span class="hw-f-det-bc-sep">/</span>
      <a href="<?= $page->getLink(); ?>">Formations IA</a>
      <span class="hw-f-det-bc-sep">/</span>
      <span><?= htmlspecialchars($formation->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
  </div>
</div>

<!-- ══ HERO ═══════════════════════════════════════════════════════════════ -->
<section class="wm-hero">
  <canvas id="hero-canvas"></canvas>
  <div class="wm-hero-grid" aria-hidden="true">
    <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
      <defs><pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"><path d="M 60 0 L 0 0 0 60" fill="none" stroke="#8b6a22" stroke-width="0.5"/></pattern></defs>
      <rect width="1440" height="900" fill="url(#grid)"/>
      <line x1="0" y1="900" x2="1440" y2="0" stroke="#8b6a22" stroke-width="0.4"/>
      <line x1="0" y1="600" x2="960" y2="0" stroke="#8b6a22" stroke-width="0.3"/>
    </svg>
  </div>
  <div class="container">
    <div class="wm-hero-inner">
      <div>
        <div class="wm-hero-label" id="hwfd-label"><?php echo $page->getTitre(); ?></div>
        <h1 class="sh-h1" id="hwfd-h1">
          <?php
            $h1raw = $formation->getH1() ?? $formation->getTitre() ?? '';
            $h1parts = explode(' : ', $h1raw, 2);
            if (count($h1parts) === 2) {
                echo htmlspecialchars($h1parts[0], ENT_QUOTES, 'UTF-8')
                   . ' : <em>' . htmlspecialchars($h1parts[1], ENT_QUOTES, 'UTF-8') . '</em>';
            } else {
                echo htmlspecialchars($h1raw, ENT_QUOTES, 'UTF-8');
            }
          ?>
        </h1>
        <p class="wm-hero-sub" id="hwfd-sub"><?= htmlspecialchars($formation->getSousTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="wm-hero-ctas" id="hwfd-ctas">
          <a href="#hwfd-form" class="sb sb-compact" role="button">
            <div class="sb-label"><span class="sb-hint"><?= htmlspecialchars($meta['hero_cta'], ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
          </a>
          <a href="#hwfd-programme" class="sb sb-compact sb-invert" role="button">
            <div class="sb-label"><span class="sb-hint">Voir le programme</span></div>
            <div class="sb-knob"><i class="fal fa-arrow-down"></i></div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ COMPTE À REBOURS ══════════════════════════════════════════════════ -->
<?php if ($formation->getDateFin()): ?>
<section class="hw-f-det-cd-section">
  <div class="container">
    <div class="hwfd-countdown rv d2" id="hwfdCountdown" data-end="<?= date('c', strtotime($formation->getDateFin())); ?>">
      <div class="sec-label rv" style="justify-content:center">Places limitées</div>
      <h2 class="sec-title rv d1" style="font-size:clamp(1.6rem,3vw,2.6rem)">La formation démarre <em>bientôt</em></h2>
      <div class="hwfd-countdown-timer">
        <div class="hwfd-cd-unit">
          <svg class="hwfd-cd-ring" viewBox="0 0 100 100">
            <defs><linearGradient id="hwfdCdGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#680262"/><stop offset="100%" stop-color="#09A1BE"/></linearGradient></defs>
            <circle class="hwfd-cd-track" cx="50" cy="50" r="44"/>
            <circle class="hwfd-cd-fill" id="hwfdCdDaysFill" cx="50" cy="50" r="44"/>
          </svg>
          <div class="hwfd-cd-value" id="hwfdCdDays">–</div>
          <div class="hwfd-cd-label">Jours</div>
        </div>
        <div class="hwfd-cd-unit">
          <svg class="hwfd-cd-ring" viewBox="0 0 100 100">
            <circle class="hwfd-cd-track" cx="50" cy="50" r="44"/>
            <circle class="hwfd-cd-fill" id="hwfdCdHoursFill" cx="50" cy="50" r="44"/>
          </svg>
          <div class="hwfd-cd-value" id="hwfdCdHours">–</div>
          <div class="hwfd-cd-label">Heures</div>
        </div>
        <div class="hwfd-cd-unit">
          <svg class="hwfd-cd-ring" viewBox="0 0 100 100">
            <circle class="hwfd-cd-track" cx="50" cy="50" r="44"/>
            <circle class="hwfd-cd-fill" id="hwfdCdMinsFill" cx="50" cy="50" r="44"/>
          </svg>
          <div class="hwfd-cd-value" id="hwfdCdMins">–</div>
          <div class="hwfd-cd-label">Minutes</div>
        </div>
        <div class="hwfd-cd-unit">
          <svg class="hwfd-cd-ring" viewBox="0 0 100 100">
            <circle class="hwfd-cd-track" cx="50" cy="50" r="44"/>
            <circle class="hwfd-cd-fill" id="hwfdCdSecsFill" cx="50" cy="50" r="44"/>
          </svg>
          <div class="hwfd-cd-value" id="hwfdCdSecs">–</div>
          <div class="hwfd-cd-label">Secondes</div>
        </div>
      </div>
      <p class="hwfd-countdown-note">Les inscriptions se clôturent définitivement à la fin de cette formation.</p>
      <div class="hwfd-countdown-chips">
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal fa-clock"></i></div>
          <div><span class="hwfd-cd-chip-lbl">Durée</span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdDuree, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php if ($hwfdDateStr): ?>
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal fa-calendar-check"></i></div>
          <div><span class="hwfd-cd-chip-lbl">Démarrage</span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdDateStr, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php endif; ?>
        <?php if ($hwfdLieuVal): ?>
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal <?= $hwfdLieuIcon; ?>"></i></div>
          <div><span class="hwfd-cd-chip-lbl"><?= $hwfdLieuLabel; ?></span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdLieuVal, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php endif; ?>
        <?php if ($hwfdCapaciteStr): ?>
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal fa-users"></i></div>
          <div><span class="hwfd-cd-chip-lbl">Places</span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdCapaciteStr, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php endif; ?>
        <?php if ($hwfdLimiteStr): ?>
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal fa-calendar-xmark"></i></div>
          <div><span class="hwfd-cd-chip-lbl">Clôture inscriptions</span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdLimiteStr, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($meta['intro'])): ?>
      <p class="hwfd-countdown-intro rv d3"><?= htmlspecialchars($meta['intro'], ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ POUR QUI ════════════════════════════════════════════════════════════ -->
<section class="hw-f-det-audience">
  <div class="container">
    <div class="hw-f-det-audience-grid">
      <div>
        <div class="sec-label rv">Pour qui ?</div>
        <h2 class="sec-title rv d1">Ce programme<br>s'adresse à <em>vous</em></h2>
      </div>
      <div class="hwfd-audience-list" id="hwfdAudienceList">
        <?php foreach ($meta['pour_qui_items'] as $i => $p): ?>
        <div class="hwfd-audience-card rv d<?= min($i + 2, 6); ?>">
          <div class="hwfd-audience-icon">
            <i class="fal <?= htmlspecialchars($p['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
            <div class="hwfd-audience-orbit"><span class="hwfd-audience-orbit-dot"></span></div>
          </div>
          <div class="hwfd-audience-name"><?= htmlspecialchars($p['label'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ══ PROGRAMME ══════════════════════════════════════════════════════════ -->
<?php if ($formation->getDescription()): ?>
<section class="hw-f-det-programme" id="hwfd-programme">
  <div class="container">
    <div class="sec-label rv">Programme</div>
    <h2 class="sec-title rv d1">Le programme <em>détaillé</em></h2>
  </div>

  <?php if (!empty($hwfdModules)): ?>
  <div class="hwfd-prog-diag rv d2" id="hwfdProgDiag">
    <?php foreach ($hwfdModules as $i => $mod): ?>
    <div class="hwfd-diag-panel" tabindex="0">
      <div class="hwfd-diag-panel-inner">
        <?php if (isset($hwfdModuleImgs[$i])): ?>
        <img src="<?= $siteURL; ?>images/formations/modules/<?= htmlspecialchars($hwfdModuleImgs[$i], ENT_QUOTES, 'UTF-8'); ?>" alt="" loading="lazy">
        <?php endif; ?>
      </div>
      <div class="hwfd-diag-scrim"></div>
      <div class="hwfd-diag-num"><?= $mod['num']; ?></div>
      <div class="hwfd-diag-body">
        <div class="hwfd-diag-label"><?= htmlspecialchars($mod['label'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="hwfd-diag-title"><?= htmlspecialchars($mod['title'], ENT_QUOTES, 'UTF-8'); ?></div>
        <p class="hwfd-diag-text"><?= htmlspecialchars($mod['text'], ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <?php else: ?>
  <div class="container">
    <div class="hw-f-det-programme-split">
      <?php if (!empty($meta['programme_img'])): ?>
      <div class="hw-f-det-programme-visual rv d2">
        <img src="<?= $siteURL; ?>images/formations/<?= htmlspecialchars($meta['programme_img'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($formation->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
      </div>
      <?php endif; ?>
      <div class="hw-f-det-programme-body rv d3"><?= $formation->getDescription(); ?></div>
    </div>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>

<!-- ══ LIVRABLES ══════════════════════════════════════════════════════════ -->
<?php if ($formation->getLivrables()): ?>
<section class="hw-f-det-livrables">
  <div class="container">
    <div class="sec-label rv">Ce que vous repartez avec</div>
    <h2 class="sec-title rv d1">Vos <em>livrables</em></h2>

    <?php if (!empty($hwfdLivrItems)): ?>
    <div class="hwfd-livr-row rv d2" id="hwfdLivrWave" style="grid-template-columns:repeat(<?= count($hwfdLivrItems); ?>,1fr)">
      <?php $hwfdPrevIcon = null; foreach ($hwfdLivrItems as $i => $item):
        $grad  = $hwfdLivrGradients[$i % count($hwfdLivrGradients)];
        $icon  = hwfd_livr_icon($item, $hwfdPrevIcon);
        $hwfdPrevIcon = $icon;
        $isLast = ($i === count($hwfdLivrItems) - 1);
      ?>
      <div class="hwfd-livr-item">
        <div class="hwfd-livr-circle-wrap" style="--c:<?= $grad[0]; ?>">
          <?php if (!$isLast): ?><div class="hwfd-livr-connector"></div><?php endif; ?>
          <div class="hwfd-livr-orbit"><span class="hwfd-livr-orbit-dot"></span></div>
          <div class="hwfd-livr-circle-outer" style="background:conic-gradient(from 200deg,<?= $grad[0]; ?>,<?= $grad[1]; ?>,<?= $grad[0]; ?>)">
            <div class="hwfd-livr-circle-inner"><img src="<?= $siteURL; ?>images/formations/livr-icons/<?= $icon; ?>" alt="" loading="lazy"></div>
          </div>
        </div>
        <div class="hwfd-livr-vline" style="background:linear-gradient(to bottom,<?= $grad[0]; ?>,rgba(0,0,0,.06))"></div>
        <div class="hwfd-livr-text">
          <div class="hwfd-livr-num" style="color:<?= $grad[0]; ?>">Livrable <?= sprintf('%02d', $i + 1); ?></div>
          <p><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="hw-f-det-livrables-body rv d2"><?= $formation->getLivrables(); ?></div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<!-- ══ PRÉREQUIS ═══════════════════════════════════════════════════════════ -->
<?php if ($formation->getPrerequis()): ?>
<section class="hw-f-det-prereqs">
  <div class="container">
    <div class="hw-f-det-prereqs-inner">
      <div class="sec-label rv" style="justify-content:center">Avant de vous inscrire</div>
      <h2 class="sec-title rv d1">Prérequis</h2>
      <p class="hw-f-det-prereqs-text rv d2"><?= nl2br(htmlspecialchars($formation->getPrerequis(), ENT_QUOTES, 'UTF-8')); ?></p>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ LE PLUS HELLO WORLD ════════════════════════════════════════════════ -->
<?php if ($meta['plus']): ?>
<section class="hw-f-det-plus">
  <video class="hw-f-list-cta-final-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
    <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
  </video>
  <div class="hw-f-list-cta-final-scrim"></div>
  <div class="container" style="position:relative;z-index:2">
    <div class="hw-f-det-plus-inner">
      <div class="hw-f-det-plus-lbl rv">Notre différence</div>
      <div class="hw-f-det-plus-title rv d1">Le plus Hello World</div>
      <p class="hw-f-det-plus-text rv d2"><?= htmlspecialchars($meta['plus'], ENT_QUOTES, 'UTF-8'); ?></p>
      <div class="cta-btns rv d3" style="justify-content:center;margin-top:2.2rem">
        <a href="#hwfd-form" class="sb sb-compact sb-invert" role="button">
          <div class="sb-label"><span class="sb-hint"><?= htmlspecialchars($meta['final_cta'], ENT_QUOTES, 'UTF-8'); ?></span></div>
          <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ FORMULAIRE D'INSCRIPTION / QUALIFICATION ════════════════════════════ -->
<section class="hw-f-det-form-section" id="hwfd-form">
  <div class="container">
    <div class="sec-label rv" style="text-align:center">Inscription / demande d'informations</div>
    <h2 class="sec-title rv d1" style="text-align:center">Trouvez la formation<br>la plus adaptée à <em>votre profil</em></h2>
    <p style="text-align:center;font-size:.82rem;color:var(--hwfd-txt2);max-width:560px;margin:1rem auto 3rem;line-height:1.9;font-weight:300" class="rv d2">Indiquez votre profil et vos besoins. Nous vous recontacterons avec le programme, le format et le niveau les plus pertinents pour vous.</p>

    <div class="hw-f-det-form-wrap rv d3">
      <div id="hwfd-form-content">
        <div class="hw-f-det-form-title">Demande d'inscription</div>
        <div class="hw-f-det-form-sub">Renseignez votre profil pour recevoir une recommandation personnalisée. Tous les champs marqués * sont obligatoires.</div>

        <div class="hwfd-wizard-progress">
          <div class="hwfd-wizard-step active" id="hwfd-wizard-step1"><span class="hwfd-wizard-dot">1</span><span>Votre besoin</span></div>
          <div class="hwfd-wizard-line" id="hwfd-wizard-line"></div>
          <div class="hwfd-wizard-step" id="hwfd-wizard-step2"><span class="hwfd-wizard-dot">2</span><span>Vos coordonnées</span></div>
        </div>

        <form id="hwfd-qualification-form" novalidate>
          <input type="hidden" name="formation" value="<?= $hwfdTitreForm; ?>">
          <input type="hidden" name="page_uri" value="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

          <div class="hwfd-step-wrap">
          <!-- ══ ÉTAPE 1 : besoin & contexte ══════════════════════════════ -->
          <div class="hwfd-step hw-f-det-form-grid" id="hwfd-step-1">

            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-formation">Formation souhaitée <span>*</span></label>
              <select class="hw-f-det-input" id="hwfd-formation" name="formation_souhaitee" required>
                <option value="">— Sélectionner —</option>
                <option value="strategie" <?= $slug === 'formation-strategie-marketing-digital-ia-maroc' ? 'selected' : ''; ?>>Stratégie & Performance Digitale à l'Ère de l'IA</option>
                <option value="claude-code" <?= $slug === 'formation-claude-code-developpement-web-maroc' ? 'selected' : ''; ?>>Claude Code : Développer un site à 10 000 $</option>
                <option value="n8n" <?= $slug === 'formation-n8n-automatisation-ia-maroc' ? 'selected' : ''; ?>>n8n & IA : Automatisation Avancée des Processus Métiers</option>
                <option value="podcast" <?= $slug === 'formation-podcast-ia-maroc' ? 'selected' : ''; ?>>Podcast & IA : De l'idée fondatrice à la série à succès</option>
                <option value="conseil">Je souhaite être conseillé</option>
              </select>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-format">Format souhaité</label>
              <select class="hw-f-det-input" id="hwfd-format" name="format">
                <option value="presentiel">En présentiel</option>
                <option value="distance">À distance</option>
                <option value="peu-importe">Peu importe</option>
              </select>
            </div>

            <!-- Vous êtes — champ clé -->
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-statut">Vous êtes <span>*</span></label>
              <select class="hw-f-det-input" id="hwfd-statut" name="statut" required>
                <option value="">— Sélectionner votre statut —</option>
                <option value="particulier">Particulier</option>
                <option value="freelancer">Freelancer / Indépendant</option>
                <option value="societe">Société</option>
              </select>
            </div>

            <!-- ── PARTICULIER ─────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-particulier">
              <div class="hw-f-det-sep-label">Votre profil individuel</div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-niveau">Votre niveau en IA</label>
                <select class="hw-f-det-input" id="hwfd-p-niveau" name="niveau_ia">
                  <option value="">— Sélectionner —</option>
                  <option value="debutant">Débutant — je découvre les usages</option>
                  <option value="intermediaire">Intermédiaire — j'utilise déjà quelques outils</option>
                  <option value="avance">Avancé — j'ai mis en place des workflows</option>
                  <option value="expert">Expert — je cherche à industrialiser</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-domaine">Domaine d'activité</label>
                <input class="hw-f-det-input" type="text" id="hwfd-p-domaine" name="domaine" placeholder="Ex : marketing, développement, design...">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-budget">Budget estimatif</label>
                <select class="hw-f-det-input" id="hwfd-p-budget" name="budget">
                  <option value="">— Sélectionner —</option>
                  <option value="moins-1000">Moins de 1 000 €</option>
                  <option value="1000-2500">1 000 € — 2 500 €</option>
                  <option value="2500-5000">2 500 € — 5 000 €</option>
                  <option value="plus-5000">Plus de 5 000 €</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-dispo">Disponibilité</label>
                <select class="hw-f-det-input" id="hwfd-p-dispo" name="disponibilite">
                  <option value="urgent">Urgent — dès que possible</option>
                  <option value="mois">Ce mois-ci</option>
                  <option value="trimestre">Ce trimestre</option>
                  <option value="reflexion">En réflexion</option>
                </select>
              </div>
            </div>

            <!-- ── FREELANCER ──────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-freelancer">
              <div class="hw-f-det-sep-label">Votre profil freelance</div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-metier">Métier / spécialité</label>
                <input class="hw-f-det-input" type="text" id="hwfd-f-metier" name="metier" placeholder="Ex : consultant, développeur, créateur de contenu...">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-exp">Années d'expérience</label>
                <select class="hw-f-det-input" id="hwfd-f-exp" name="annees_experience">
                  <option value="moins-2">Moins de 2 ans</option>
                  <option value="2-5">2 à 5 ans</option>
                  <option value="5-10">5 à 10 ans</option>
                  <option value="plus-10">Plus de 10 ans</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-niveau">Niveau IA</label>
                <select class="hw-f-det-input" id="hwfd-f-niveau" name="niveau_ia_freelance">
                  <option value="debutant">Débutant</option>
                  <option value="intermediaire">Intermédiaire</option>
                  <option value="avance">Avancé</option>
                  <option value="expert">Expert</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-objectif">Objectif business</label>
                <input class="hw-f-det-input" type="text" id="hwfd-f-objectif" name="objectif_business" placeholder="Ex : automatiser ma prospection, créer un podcast...">
              </div>
            </div>

            <!-- ── SOCIÉTÉ ─────────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-societe">
              <div class="hw-f-det-sep-label">Votre organisation</div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-societe">Nom de la société <span>*</span></label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-societe" name="nom_societe" placeholder="Hello World Agency">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-poste">Votre poste</label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-poste" name="poste" placeholder="Ex : Directeur Marketing, CDO...">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-taille">Taille de la société</label>
                <select class="hw-f-det-input" id="hwfd-s-taille" name="taille_societe">
                  <option value="">— Sélectionner —</option>
                  <option value="1-9">1 à 9 collaborateurs (TPE)</option>
                  <option value="10-49">10 à 49 collaborateurs (PME)</option>
                  <option value="50-249">50 à 249 collaborateurs (ETI)</option>
                  <option value="250-999">250 à 999 collaborateurs</option>
                  <option value="1000+">1 000+ collaborateurs (Grand groupe)</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-participants">Nombre de participants</label>
                <select class="hw-f-det-input" id="hwfd-s-participants" name="nb_participants">
                  <option value="1-3">1 à 3 participants</option>
                  <option value="4-10">4 à 10 participants</option>
                  <option value="11-25">11 à 25 participants</option>
                  <option value="26+">Plus de 26 participants</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s5">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-secteur">Secteur d'activité</label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-secteur" name="secteur" placeholder="Ex : e-commerce, finance, santé, industrie...">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s6">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-maturite">Maturité IA de l'entreprise</label>
                <select class="hw-f-det-input" id="hwfd-s-maturite" name="maturite_ia">
                  <option value="exploration">Exploration — nous n'avons pas encore commencé</option>
                  <option value="tests">Tests ponctuels — quelques expérimentations</option>
                  <option value="partiel">Déploiement partiel — quelques équipes utilisent l'IA</option>
                  <option value="structure">Déploiement structuré — processus en place</option>
                  <option value="industrialisation">Industrialisation / gouvernance IA</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-s7">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-contexte">Contexte et enjeux internes</label>
                <textarea class="hw-f-det-input" id="hwfd-s-contexte" name="contexte" rows="3" placeholder="Décrivez votre contexte : quels sont vos enjeux, vos blocages, vos objectifs pour cette formation ?"></textarea>
              </div>
            </div>

            <!-- ── CHAMPS COMMUNS FINAUX ───────────────────────────────── -->
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-besoin">Votre besoin principal</label>
              <select class="hw-f-det-input" id="hwfd-besoin" name="besoin">
                <option value="">— Sélectionner —</option>
                <option value="competence">Montée en compétence individuelle</option>
                <option value="equipe">Formation d'équipe</option>
                <option value="process">Transformation d'un process</option>
                <option value="strategie">Accompagnement stratégique</option>
                <option value="sais-pas">Je ne sais pas encore</option>
              </select>
            </div>
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-message">Message / précisions complémentaires</label>
              <textarea class="hw-f-det-input" id="hwfd-message" name="message" rows="4" placeholder="Partagez toute information utile pour que nous puissions vous orienter au mieux..."></textarea>
            </div>

            <div class="hwfd-step-nav">
              <button type="button" class="hwfd-btn-next" id="hwfd-next-btn">Continuer <i class="fal fa-arrow-right" style="margin-left:.5rem"></i></button>
            </div>

          </div>

          <!-- ══ ÉTAPE 2 : vos coordonnées ═══════════════════════════════ -->
          <div class="hwfd-step hw-f-det-form-grid" id="hwfd-step-2" style="display:none">

            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-prenom">Prénom <span>*</span></label>
              <input class="hw-f-det-input" type="text" id="hwfd-prenom" name="prenom" placeholder="Votre prénom" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-nom">Nom <span>*</span></label>
              <input class="hw-f-det-input" type="text" id="hwfd-nom" name="nom" placeholder="Votre nom" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-email">Email professionnel <span>*</span></label>
              <input class="hw-f-det-input" type="email" id="hwfd-email" name="email" placeholder="vous@entreprise.com" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-tel">Téléphone <span>*</span></label>
              <input class="hw-f-det-input" type="tel" id="hwfd-tel" name="telephone" placeholder="+33 6 00 00 00 00" required>
            </div>

            <div class="hw-f-det-consent">
              <input type="checkbox" id="hwfd-consent" name="consent" required>
              <span>J'accepte d'être recontacté par Hello World dans le cadre de ma demande d'inscription. Mes données sont traitées conformément à la <a href="<?= $siteURL; ?>politique-de-confidentialite/" style="color:var(--hwfd-gold)">politique de confidentialité</a> de Hello World.</span>
            </div>

            <div class="hw-f-det-success-error hw-f-det-form-full" id="hwfd-error">Une erreur est survenue lors de l'envoi. Merci de réessayer ou de nous contacter directement.</div>

            <div class="hwfd-step-nav">
              <button type="button" class="hwfd-btn-back" id="hwfd-back-btn"><i class="fal fa-arrow-left" style="margin-right:.5rem"></i> Retour</button>
              <button type="submit" class="hw-f-det-submit-btn hwfd-btn-next" id="hwfd-submit-btn" style="flex:2">
                <i class="fal fa-paper-plane" style="margin-right:.5rem"></i> Envoyer ma demande
              </button>
            </div>

          </div>
          </div>
        </form>
      </div>
      <div class="hw-f-det-success" id="hwfd-success">
        <div class="hw-f-det-success-icon"><i class="fal fa-check"></i></div>
        <div class="hw-f-det-success-title">Demande envoyée avec succès !</div>
        <div class="hw-f-det-success-text">Merci pour votre intérêt. Notre équipe reviendra vers vous sous 24 à 48 heures pour valider votre inscription et vous orienter vers le programme le plus adapté à votre profil.</div>
      </div>
    </div>
  </div>
</section>

<!-- ══ AUTRES FORMATIONS ═══════════════════════════════════════════════════ -->
<?php if (!empty($hwfdOthers)): ?>
<section class="hw-f-det-more hw-f-list-catalogue">
  <div class="container">
    <div class="sec-label rv">Nos autres programmes</div>
    <h2 class="sec-title rv d1">Découvrez aussi<br>nos <em>autres formations</em></h2>
    <div class="hw-f-list-track-hint rv d2"><i class="fal fa-arrows-left-right"></i> Faites défiler pour parcourir nos autres programmes</div>
  </div>

  <div class="hw-f-list-pin" id="hwfdMorePin">
    <div class="hw-f-list-track" id="hwfdMoreTrack">
      <div class="hw-f-list-track-spacer" id="hwfdMoreSpacerStart" aria-hidden="true"></div>
      <?php foreach ($hwfdOthers as $of):
        $osl   = $of->getSlug() ?? '';
        $ometa = isset($hwfdOtherMeta[$osl]) ? $hwfdOtherMeta[$osl] : ['icon' => 'fa-graduation-cap', 'label' => 'Formation', 'color' => '#09A1BE'];
        $oIsGold = $ometa['color'] === '#09A1BE';
        $oDuree = 'Sur demande';
        if ($of->getDateDebut() && $of->getDateFin()) {
            try {
                $od1 = new DateTime($of->getDateDebut());
                $od2 = new DateTime($of->getDateFin());
                $odays = (int)$od1->diff($od2)->days + 1;
                $oDuree = $odays . ' ' . ($odays > 1 ? 'jours' : 'jour');
            } catch (Exception $e) {}
        }
        $oDateStr = $of->getDateDebut() ? date('d M Y', strtotime($of->getDateDebut())) : '';
      ?>
      <a class="hw-f-list-card-3d" href="<?= $of->getLink(); ?>">
        <?php if ($of->getPhoto()): ?>
        <div class="hw-f-list-card-3d-photo">
          <img src="<?= $siteURL; ?>images/formations/<?= htmlspecialchars($of->getPhoto(), ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($of->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
          <span class="hw-f-list-card-badge <?= $oIsGold ? 'gold' : 'purple'; ?>"><?= htmlspecialchars($ometa['label'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <?php endif; ?>
        <div class="hw-f-list-card-3d-body">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,<?= $oIsGold ? 'rgba(9,161,190,.1)' : 'rgba(104,2,98,.08)'; ?>,<?= $oIsGold ? 'rgba(9,161,190,.05)' : 'rgba(104,2,98,.04)'; ?>);border:1px solid <?= $oIsGold ? 'rgba(9,161,190,.2)' : 'rgba(104,2,98,.18)'; ?>">
            <i class="fal <?= htmlspecialchars($ometa['icon'], ENT_QUOTES, 'UTF-8'); ?>" style="color:<?= $ometa['color']; ?>;font-size:.95rem"></i>
          </div>
          <div class="hw-f-list-card-title"><?= htmlspecialchars($of->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-sub"><?= htmlspecialchars(mb_strimwidth($of->getSousTitre() ?? '', 0, 120, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-meta">
            <span class="hw-f-list-card-meta-item"><i class="fal fa-clock"></i> <?= htmlspecialchars($oDuree, ENT_QUOTES, 'UTF-8'); ?></span>
            <?php if ($oDateStr): ?><span class="hw-f-list-card-meta-item"><i class="fal fa-calendar"></i> <?= htmlspecialchars($oDateStr, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
            <?php if ($of->getLieu()): ?><span class="hw-f-list-card-meta-item"><i class="fal fa-location-dot"></i> <?= htmlspecialchars(explode(' —', $of->getLieu())[0], ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
            <span class="hw-f-list-card-meta-item"><i class="fal fa-users"></i> Max. <?= intval($of->getNbParticipants()); ?></span>
          </div>
          <div class="hw-f-list-card-cta">Voir le programme <i class="fal fa-arrow-right"></i></div>
        </div>
      </a>
      <?php endforeach; ?>
      <div class="hw-f-list-card-3d hw-f-list-card-3d-cta">
        <div class="hw-f-list-card-3d-body" style="justify-content:center;text-align:center">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,#680262,#09A1BE);margin:0 auto 1.4rem"><i class="fal fa-comments" style="color:#fff"></i></div>
          <div class="hw-f-list-card-title">D'autres besoins ?</div>
          <div class="hw-f-list-card-sub">Parlons de votre contexte, nous vous orientons vers le bon format.</div>
          <a href="<?= $pageContact->getLink(); ?>" class="hw-f-list-card-cta" style="justify-content:center">Nous contacter <i class="fal fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="hw-f-list-track-spacer" id="hwfdMoreSpacerEnd" aria-hidden="true"></div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ PARTENAIRES — ils nous font confiance ═══════════════════════════════ -->
<?php if (!empty($partners)): ?>
<section class="trust" id="hwfd-trust-partners">
  <div class="trust-head container">
    <div class="sec-label rv">Partenaires</div>
    <h2 class="sec-title rv d1">Ils nous font <em>confiance</em></h2>
  </div>
  <div class="trust-rows">
    <div class="trust-row">
      <div class="trust-inner go-l">
        <?php foreach ($partners as $partner): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php if (!empty($partners2)): ?>
    <div class="trust-row">
      <div class="trust-inner go-r">
        <?php foreach ($partners2 as $partner): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<!-- ══ DIGITAL EXPERT — vidéos ═══════════════════════════════════════════ -->
<?php if (!empty($videos)): ?>
<section id="expert">
    <div class="container">
        <div class="sec-label rv">Digital Expert</div>
        <h2 class="sec-title rv d1"><em>Digital</em> Expert</h2>

        <div id="owl-videos" class="owl-carousel owl-theme">
            <?php foreach ($videos as $video): ?>
                <div class="item-video">
                    <div class="imgbox">
                        <a href="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                            data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                            title="<?php echo $video->getTitre(); ?>" data-fancybox><i class="fab fa-youtube"></i></a>
                        <img class="discove-img-video" width="300" height="300"
                            src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>"
                            alt="<?php echo $video->getTitre(); ?>">
                    </div>
                    <div class="textbox">
                        <h3><span><?php echo $video->getTitre(); ?></span></h3>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> <?php echo $video->getLocalisation(); ?></li>
                            <?php if ($video->getDateShooting() != ''): ?>
                                <li><i class="fa fa-calendar"></i> <?php echo normaldate($video->getDateShooting()); ?></li>
                            <?php endif; ?>
                            <li><i class="fa fa-comment"></i> <?php echo nl2br($video->getExtrait()); ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-5 text-center">
                <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Contactez un expert" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Contactez un expert</span></div>
                  <div class="sb-knob"><i class="fal fa-envelope"></i></div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ══ TECHNOLOGIES & PLATEFORMES ═════════════════════════════════════════ -->
<?php if (!empty($tools)): ?>
<section class="trust" id="hwfd-trust-tools">
  <div class="trust-head container text-center">
    <h2 class="sec-title rv d1">Les <em>technologies</em> et <em>plateformes</em><br>au service de vos projets</h2>
    <p>Nous utilisons les meilleurs outils du marché pour garantir la performance, la sécurité et la croissance de votre business.</p>
  </div>
  <div class="trust-rows">
    <div class="trust-row">
      <div class="trust-inner go-l">
        <?php foreach ($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="trust-row">
      <div class="trust-inner go-r">
        <?php foreach ($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ CTA FINAL ══════════════════════════════════════════════════════════ -->
<section class="hw-f-det-cta-final cta-hw-final">
  <video class="hw-f-list-cta-final-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
    <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
  </video>
  <div class="hw-f-list-cta-final-scrim"></div>
  <div class="container" style="position:relative;z-index:2">
    <div class="sec-label rv">Passez à l'action</div>
    <h2 class="sec-title rv d1">Prêt à intégrer l'IA<br>dans <em>votre réalité</em>&nbsp;?</h2>
    <p class="cta-sub rv d2">Places limitées. Réservez un audit de maturité gratuit pour valider que ce programme correspond à votre profil et vos objectifs.</p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="#hwfd-form" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint">Réserver ma place</span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
        <div class="sb-label"><span class="sb-hint">Parler à un expert</span></div>
        <div class="sb-knob"><i class="fal fa-comment-dots"></i></div>
      </a>
    </div>
  </div>
</section>

<!-- ══ TÉMOIGNAGES ════════════════════════════════════════════════════════ -->
<?php include('includes/testimonials.php'); ?>

<!-- ══ GSAP ═══════════════════════════════════════════════════════════════ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);
    var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* hero entrance */
    if (!rm) {
        gsap.timeline({ defaults: { ease: 'expo.out' } })
            .from('#hwfd-label', { y: 12, autoAlpha: 0, duration: .6 })
            .from('#hwfd-h1',    { y: 55, autoAlpha: 0, duration: 1.05, skewY: 1.5 }, '-=.3')
            .from('#hwfd-sub',   { y: 20, autoAlpha: 0, duration: .8 }, '-=.5')
            .from('#hwfd-ctas',  { y: 16, autoAlpha: 0, duration: .7 }, '-=.45');
    }

    /* scroll reveals */
    var rvEls = gsap.utils.toArray('.rv');
    if (!rm) {
        gsap.set(rvEls, { y: 36, autoAlpha: 0 });
        ScrollTrigger.batch(rvEls, {
            start: 'top 91%',
            onEnter: function (b) { gsap.to(b, { y: 0, autoAlpha: 1, duration: .75, ease: 'expo.out', stagger: .065 }); }
        });
    }

    /* programme / livrables li stagger (repli sans wave JS) */
    if (!rm) {
        var lis = gsap.utils.toArray('.hw-f-det-programme-body li, .hw-f-det-livrables-body li');
        gsap.set(lis, { x: -16, autoAlpha: 0 });
        ScrollTrigger.batch(lis, {
            start: 'top 92%',
            onEnter: function (b) { gsap.to(b, { x: 0, autoAlpha: 1, duration: .55, ease: 'expo.out', stagger: .05 }); }
        });
    }

    /* ── COMPTE À REBOURS : expiration à la fin de la formation, anneaux qui
       se vident au fil du temps qui passe ── */
    (function () {
        var wrap = document.getElementById('hwfdCountdown');
        if (!wrap) return;
        var end = new Date(wrap.dataset.end).getTime();
        var $days = document.getElementById('hwfdCdDays');
        var $hours = document.getElementById('hwfdCdHours');
        var $mins = document.getElementById('hwfdCdMins');
        var $secs = document.getElementById('hwfdCdSecs');
        var ringDays = document.getElementById('hwfdCdDaysFill');
        var ringHours = document.getElementById('hwfdCdHoursFill');
        var ringMins = document.getElementById('hwfdCdMinsFill');
        var ringSecs = document.getElementById('hwfdCdSecsFill');
        var R = 44, CIRC = 2 * Math.PI * R;
        [ringDays, ringHours, ringMins, ringSecs].forEach(function (r) {
            if (r) r.style.strokeDasharray = CIRC;
        });
        function setRing(ring, fraction) {
            if (!ring) return;
            var f = Math.max(0, Math.min(1, fraction));
            ring.style.strokeDashoffset = CIRC * (1 - f);
        }
        function pad(n) { return String(n).padStart(2, '0'); }
        function tick() {
            var diff = Math.max(0, end - Date.now());
            var days = Math.floor(diff / 86400000);
            var hours = Math.floor((diff % 86400000) / 3600000);
            var mins = Math.floor((diff % 3600000) / 60000);
            var secs = Math.floor((diff % 60000) / 1000);
            if ($days) $days.textContent = days;
            if ($hours) $hours.textContent = pad(hours);
            if ($mins) $mins.textContent = pad(mins);
            if ($secs) $secs.textContent = pad(secs);
            setRing(ringDays, days / 30);
            setRing(ringHours, hours / 24);
            setRing(ringMins, mins / 60);
            setRing(ringSecs, secs / 60);
            if (diff <= 0) {
                wrap.classList.add('expired');
                clearInterval(timer);
            }
        }
        tick();
        var timer = setInterval(tick, 1000);
    })();

    /* ── POUR QUI : cartes façon info-cards du hero — au survol, un petit
       anneau apparaît autour de l'icône avec un point qui orbite en continu ── */
    (function () {
        var list  = document.getElementById('hwfdAudienceList');
        var cards = list ? list.querySelectorAll('.hwfd-audience-card') : [];
        if (!list || !cards.length) return;

        Array.from(cards).forEach(function (c) {
            var orbit = c.querySelector('.hwfd-audience-orbit');
            var tween;
            if (!orbit) return;
            c.addEventListener('mouseenter', function () {
                if (!rm) {
                    if (!tween) tween = gsap.to(orbit, { rotate: 360, duration: 3.2, repeat: -1, ease: 'none', paused: true });
                    tween.play();
                }
            });
            c.addEventListener('mouseleave', function () {
                if (tween) tween.pause();
            });
        });
    })();

    /* ── LIVRABLES : rangée de cercles à anneau dégradé — entrée en 3D pop +
       connecteurs qui se dessinent, flottement idle discret après l'entrée ── */
    (function () {
        var wrap       = document.getElementById('hwfdLivrWave');
        var items      = wrap ? wrap.querySelectorAll('.hwfd-livr-item') : [];
        var circles    = wrap ? wrap.querySelectorAll('.hwfd-livr-circle-outer') : [];
        var connectors = wrap ? wrap.querySelectorAll('.hwfd-livr-connector') : [];
        var vlines     = wrap ? wrap.querySelectorAll('.hwfd-livr-vline') : [];
        var orbits     = wrap ? wrap.querySelectorAll('.hwfd-livr-orbit') : [];
        if (!wrap || !items.length) return;

        function startIdleFloat() {
            if (rm) return;
            Array.from(items).forEach(function (it, i) {
                gsap.to(it, {
                    y: '+=6', duration: 2.4 + (i % 3) * .3, yoyo: true, repeat: -1,
                    ease: 'sine.inOut', delay: i * .2
                });
            });
            Array.from(orbits).forEach(function (o, i) {
                gsap.to(o, { rotate: 360, duration: 9 + i * 1.4, repeat: -1, ease: 'none' });
            });
        }

        if (!rm) {
            gsap.set(items, { autoAlpha: 0, y: 26 });
            gsap.set(circles, { scale: .3, rotateY: -110, transformPerspective: 800 });
            gsap.set(connectors, { scaleX: 0, transformOrigin: 'left center' });
            ScrollTrigger.create({
                trigger: wrap,
                start: 'top 80%',
                once: true,
                onEnter: function () {
                    gsap.to(items, { autoAlpha: 1, y: 0, duration: .65, stagger: .16, ease: 'expo.out' });
                    gsap.to(circles, { scale: 1, rotateY: 0, duration: .75, stagger: .16, delay: .05, ease: 'back.out(1.8)' });
                    gsap.to(connectors, { scaleX: 1, duration: .55, stagger: .16, delay: .35, ease: 'power2.out' });
                    gsap.to(vlines, { scaleY: 1, duration: .5, stagger: .16, delay: .55, ease: 'power2.out' });
                    gsap.delayedCall(.35 + (items.length * .16) + .8, startIdleFloat);
                }
            });
        } else {
            gsap.set(items, { autoAlpha: 1 });
            gsap.set(vlines, { scaleY: 1 });
        }

        /* tilt 3D léger au survol de chaque cercle, suit la souris */
        if (!rm && window.matchMedia('(hover:hover)').matches) {
            Array.from(items).forEach(function (it, i) {
                var circle = circles[i];
                if (!circle) return;
                it.addEventListener('mousemove', function (e) {
                    var r = circle.getBoundingClientRect();
                    var px = (e.clientX - r.left) / r.width - .5;
                    var py = (e.clientY - r.top) / r.height - .5;
                    gsap.to(circle, { rotateY: px * 20, rotateX: -py * 16, duration: .4, ease: 'power2.out', overwrite: 'auto' });
                });
                it.addEventListener('mouseleave', function () {
                    gsap.to(circle, { rotateY: 0, rotateX: 0, duration: .6, ease: 'elastic.out(1,.6)', overwrite: 'auto' });
                });
            });
        }
    })();

    /* ── AUTRES FORMATIONS : scroll horizontal épinglé + coverflow 3D (comme la page liste) ── */
    (function () {
        var pin   = document.getElementById('hwfdMorePin');
        var track = document.getElementById('hwfdMoreTrack');
        var cards = track ? track.querySelectorAll('.hw-f-list-card-3d') : [];
        var spacerStart = document.getElementById('hwfdMoreSpacerStart');
        var spacerEnd   = document.getElementById('hwfdMoreSpacerEnd');
        if (!pin || !track || !cards.length) return;

        function sizeSpacers() {
            if (!spacerStart || !spacerEnd || window.innerWidth <= 760) return;
            var cardW = cards[0].getBoundingClientRect().width;
            var w = Math.max(0, (pin.clientWidth - cardW) / 2);
            spacerStart.style.width = w + 'px';
            spacerEnd.style.width = w + 'px';
        }
        sizeSpacers();

        function trackDistance() {
            return Math.max(0, track.scrollWidth - pin.clientWidth);
        }

        function tiltCards() {
            var pinRect = pin.getBoundingClientRect();
            var center = pinRect.left + pinRect.width / 2;
            cards.forEach(function (card) {
                var r = card.getBoundingClientRect();
                var cardCenter = r.left + r.width / 2;
                var delta = (cardCenter - center) / (pinRect.width / 2);
                delta = Math.max(-1, Math.min(1, delta));
                if (rm) { card.style.transform = ''; return; }
                var ry = delta * -30;
                var scale = 1 - Math.abs(delta) * 0.14;
                var z = -Math.abs(delta) * 130;
                card.style.transform = 'perspective(1400px) rotateY(' + ry.toFixed(2) + 'deg) translateZ(' + z.toFixed(1) + 'px) scale(' + scale.toFixed(3) + ')';
                card.style.opacity = String(1 - Math.abs(delta) * 0.35);
            });
        }

        if (!rm && window.innerWidth > 760) {
            gsap.to(track, {
                x: function () { return -trackDistance(); },
                ease: 'none',
                scrollTrigger: {
                    trigger: pin,
                    start: 'top top+=70',
                    end: function () { return '+=' + (trackDistance() + window.innerHeight * .6); },
                    scrub: .6,
                    pin: true,
                    invalidateOnRefresh: true,
                    onRefresh: sizeSpacers,
                    onUpdate: tiltCards
                }
            });
            ScrollTrigger.addEventListener('refresh', tiltCards);
            window.addEventListener('load', function () { sizeSpacers(); ScrollTrigger.refresh(); tiltCards(); });
            window.addEventListener('resize', sizeSpacers);
        } else {
            track.style.overflowX = 'auto';
            track.style.scrollSnapType = 'x mandatory';
            cards.forEach(function (c) { c.style.scrollSnapAlign = 'start'; });
        }

        cards.forEach(function (c) {
            c.addEventListener('mousedown', function () { c.style.filter = 'brightness(.97)'; });
            c.addEventListener('mouseup',   function () { c.style.filter = ''; });
            c.addEventListener('mouseleave', function () { c.style.filter = ''; });
        });
    })();

    /* ── PROGRAMME : panneaux diagonaux — tap pour ouvrir sur tactile ── */
    (function () {
        var panels = document.querySelectorAll('.hwfd-diag-panel');
        if (!panels.length) return;
        var isTouch = window.matchMedia('(hover:none)').matches;
        if (!isTouch) return;
        panels.forEach(function (p) {
            p.addEventListener('click', function (e) {
                var already = p.classList.contains('touch-active');
                panels.forEach(function (o) { o.classList.remove('touch-active'); });
                if (!already) {
                    p.classList.add('touch-active');
                    e.preventDefault();
                }
            });
        });
    })();

    /* ── FORMULAIRE : affichage conditionnel ── */
    var statut = document.getElementById('hwfd-statut');
    var groupParticulier = ['hwfd-grp-particulier','hwfd-p1','hwfd-p2','hwfd-p3','hwfd-p4'];
    var groupFreelancer  = ['hwfd-grp-freelancer','hwfd-f1','hwfd-f2','hwfd-f3','hwfd-f4'];
    var groupSociete     = ['hwfd-grp-societe','hwfd-s1','hwfd-s2','hwfd-s3','hwfd-s4','hwfd-s5','hwfd-s6','hwfd-s7'];

    function hideAll() {
        [].concat(groupParticulier, groupFreelancer, groupSociete).forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.classList.remove('visible');
        });
    }
    function showGroup(group) {
        group.forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.classList.add('visible');
        });
    }

    if (statut) {
        statut.addEventListener('change', function () {
            hideAll();
            if (statut.value === 'particulier') showGroup(groupParticulier);
            if (statut.value === 'freelancer')  showGroup(groupFreelancer);
            if (statut.value === 'societe')     showGroup(groupSociete);
        });
    }

    /* ── FORMULAIRE : wizard 2 étapes avec transition 3D ── */
    (function () {
        var step1  = document.getElementById('hwfd-step-1');
        var step2  = document.getElementById('hwfd-step-2');
        var nextBtn = document.getElementById('hwfd-next-btn');
        var backBtn = document.getElementById('hwfd-back-btn');
        var wiz1   = document.getElementById('hwfd-wizard-step1');
        var wiz2   = document.getElementById('hwfd-wizard-step2');
        var wizLine = document.getElementById('hwfd-wizard-line');
        if (!step1 || !step2) return;

        function validateStep(stepEl) {
            var valid = true;
            var firstInvalid = null;
            stepEl.querySelectorAll('[required]').forEach(function (f) {
                f.classList.remove('hwfd-invalid');
                if (!f.checkValidity()) {
                    valid = false;
                    f.classList.add('hwfd-invalid');
                    if (!firstInvalid) firstInvalid = f;
                }
            });
            if (firstInvalid) firstInvalid.focus();
            return valid;
        }

        function goToStep2() {
            if (!validateStep(step1)) return;
            wiz1.classList.remove('active'); wiz1.classList.add('done');
            wiz2.classList.add('active');
            wizLine.classList.add('done');
            if (rm) {
                step1.style.display = 'none';
                step2.style.display = 'grid';
                return;
            }
            gsap.to(step1, {
                rotateY: -90, autoAlpha: 0, duration: .5, ease: 'power2.in',
                onComplete: function () {
                    step1.style.display = 'none';
                    step2.style.display = 'grid';
                    gsap.fromTo(step2, { rotateY: 90, autoAlpha: 0 }, { rotateY: 0, autoAlpha: 1, duration: .6, ease: 'power2.out' });
                }
            });
        }

        function goToStep1() {
            wiz1.classList.add('active'); wiz1.classList.remove('done');
            wiz2.classList.remove('active');
            wizLine.classList.remove('done');
            if (rm) {
                step2.style.display = 'none';
                step1.style.display = 'grid';
                return;
            }
            gsap.to(step2, {
                rotateY: 90, autoAlpha: 0, duration: .5, ease: 'power2.in',
                onComplete: function () {
                    step2.style.display = 'none';
                    step1.style.display = 'grid';
                    gsap.fromTo(step1, { rotateY: -90, autoAlpha: 0 }, { rotateY: 0, autoAlpha: 1, duration: .6, ease: 'power2.out' });
                }
            });
        }

        if (nextBtn) nextBtn.addEventListener('click', goToStep2);
        if (backBtn) backBtn.addEventListener('click', goToStep1);
    })();

    /* ── FORMULAIRE : submit réel (email + enregistrement + HubSpot) ── */
    var form = document.getElementById('hwfd-qualification-form');
    var btn  = document.getElementById('hwfd-submit-btn');
    var errorBox = document.getElementById('hwfd-error');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var step2 = document.getElementById('hwfd-step-2');
            var invalid = false;
            step2.querySelectorAll('[required]').forEach(function (f) {
                f.classList.remove('hwfd-invalid');
                if (!f.checkValidity()) { f.classList.add('hwfd-invalid'); invalid = true; }
            });
            if (invalid) return;

            var consent = document.getElementById('hwfd-consent');
            if (!consent.checked) {
                consent.closest('.hw-f-det-consent').style.outline = '2px solid #e44';
                return;
            }
            if (errorBox) errorBox.style.display = 'none';
            var originalLabel = btn.innerHTML;
            if (btn) { btn.disabled = true; btn.innerHTML = 'Envoi en cours…'; }

            var data = new FormData(form);

            fetch(<?= json_encode($siteURL); ?> + 'components/com_formation/controleurs/formation.php?task=qualification', {
                method: 'POST',
                body: data
            })
            .then(function (r) { return r.text(); })
            .then(function (res) {
                if (res.trim() === '1' || res.trim() === '3') {
                    /* 1 = envoyé avec succès, 3 = enregistré mais mail non parti : on affiche quand même la confirmation */
                    document.getElementById('hwfd-form-content').style.display = 'none';
                    var success = document.getElementById('hwfd-success');
                    success.style.display = 'block';
                    if (!rm) {
                        gsap.fromTo(success, { y: 30, autoAlpha: 0, rotateX: -12, scale: .94 }, { y: 0, autoAlpha: 1, rotateX: 0, scale: 1, duration: .8, ease: 'back.out(1.6)' });
                        gsap.fromTo('.hw-f-det-success-icon', { scale: 0, rotate: -120 }, { scale: 1, rotate: 0, duration: .7, delay: .15, ease: 'elastic.out(1,.55)' });
                    }
                } else {
                    if (btn) { btn.disabled = false; btn.innerHTML = originalLabel; }
                    if (errorBox) errorBox.style.display = 'block';
                }
            })
            .catch(function () {
                if (btn) { btn.disabled = false; btn.innerHTML = originalLabel; }
                if (errorBox) errorBox.style.display = 'block';
            });
        });
    }
})();
</script>
