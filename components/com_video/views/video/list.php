<?php
/*
 * Videotheque (/videotheque/). Reprise de la page du site de Dubai, adaptee a
 * helloworld-agency.com : couleurs du site, productions clients marocaines,
 * chiffres reels de la page.
 *
 * La page etait une seule liste a plat de ~35 cartes, sans aucun H2 et dans
 * l'ordre brut de la base : les episodes de la serie maison "The Digital Expert"
 * se melangeaient aux films realises pour les clients. On separe donc en deux
 * sections titrees -- les productions clients d'abord, la serie editoriale
 * ensuite -- ce qui donne enfin une hierarchie H1 > H2 > H3 a la page.
 *
 * La categorie 14 est celle de la serie "The Digital Expert" (cf.
 * components/com_video/index.php, task=categorie). Tout le reste est du travail
 * client (categorie 0 : les films tournes pour nos clients au Maroc).
 */

$vlibExpertCategory = 14;

// Dedoublonnage par identifiant YouTube : la base contient quelques lignes en
// double (meme video saisie deux fois, parfois avec un titre vide). On garde la
// premiere occurrence, mais une occurrence titree remplace toujours une
// occurrence sans titre.
$vlibById    = array();
$vlibGroupOf = array();

foreach ($videos as $vlibVideo) {

    // Repli sur la langue par defaut si cette video n'a pas encore de traduction
    // dans la langue courante, plutot que d'afficher un titre vide.
    if (trim($vlibVideo->getTitre()) == '' && $_SESSION['lang'] != langue::getDefaultLanguage()) {
        $vlibVideo = video::find($vlibVideo->getId(), langue::getDefaultLanguage());
    }

    $vlibKey = trim($vlibVideo->getVideo());
    if ($vlibKey === '') {
        continue;
    }

    if (isset($vlibById[$vlibKey]) && trim($vlibById[$vlibKey]->getTitre()) !== '') {
        continue;
    }
    if (isset($vlibById[$vlibKey]) && trim($vlibVideo->getTitre()) === '') {
        continue;
    }

    $vlibCategorie = $vlibVideo->getCategorie();
    $vlibById[$vlibKey]    = $vlibVideo;
    $vlibGroupOf[$vlibKey] = ($vlibCategorie && (int) $vlibCategorie->getId() === $vlibExpertCategory)
        ? 'expert'
        : 'clients';
}

$vlibClients = array();
$vlibExpert  = array();
foreach ($vlibById as $vlibKey => $vlibVideo) {
    if ($vlibGroupOf[$vlibKey] === 'expert') {
        $vlibExpert[$vlibKey] = $vlibVideo;
    } else {
        $vlibClients[$vlibKey] = $vlibVideo;
    }
}

// La serie editoriale est datee episode par episode (date_shooting) alors que la
// requete du controleur trie sur date_add : on remet les episodes du plus recent
// au plus ancien. Les films clients n'ont pas de date en base, on preserve donc
// l'ordre du back-office.
uasort($vlibExpert, function ($a, $b) {
    $da = trim((string) $a->getDateShooting());
    $db = trim((string) $b->getDateShooting());
    if ($da === $db) { return 0; }
    if ($da === '' || $da === '0000-00-00') { return 1; }
    if ($db === '' || $db === '0000-00-00') { return -1; }
    return strcmp($db, $da);
});

// Les deux sections, dans l'ordre demande : clients puis serie Digital Expert.
$vlibSections = array(
    array(
        'id'      => 'client-productions',
        'num'     => '01',
        'title'   => $lang['VLIB_CLIENTS_TITLE'][$_SESSION['lang']],
        'sub'     => $lang['VLIB_CLIENTS_SUB'][$_SESSION['lang']],
        'videos'  => $vlibClients,
        'gallery' => 'vlib-clients',
    ),
    array(
        'id'      => 'the-digital-expert',
        'num'     => '02',
        'title'   => $lang['VLIB_EXPERT_TITLE'][$_SESSION['lang']],
        'sub'     => $lang['VLIB_EXPERT_SUB'][$_SESSION['lang']],
        'videos'  => $vlibExpert,
        'gallery' => 'vlib-expert',
    ),
);

// Chiffres de l'en-tete. Sur le site de Dubai ce sont des chiffres de notoriete
// fournis par le client (500+ / 100+). Aucun chiffre equivalent n'a ete fourni
// pour le Maroc : on affiche donc ce que la page contient reellement, sans "+".
// Pour passer a des chiffres d'agence, les fixer ici et remettre le suffixe.
$vlibStatVideos  = count($vlibById);
$vlibStatClients = count($vlibClients);
$vlibStatSuffix  = '';

$vlibBanner    = $page->getPhoto() == '' ? 'images/banner.jpg' : 'images/pages/' . $page->getPhoto();
$vlibWatchWord = $lang['VLIB_WATCH'][$_SESSION['lang']];
?>

<style>
/* ==========================================================================
   VIDEOTHEQUE -- styles portee page uniquement (prefixe .vlib-).
   On ne touche pas a .item-video / .list-video : ces classes servent aussi au
   carrousel #expert de l'accueil et aux pages service.
   ========================================================================== */
.vlib{--vlib-ink:#0b0b0d;--vlib-line:rgba(13,11,9,.08)}

/* -- En-tete de page -- */
.vlib-hero{position:relative;background:var(--vlib-ink);color:#f7f5f2;overflow:hidden;padding:11rem 0 5.5rem}
.vlib-hero-bg{position:absolute;inset:0;z-index:0}
.vlib-hero-bg img{width:100%;height:100%;object-fit:cover;opacity:.17;filter:grayscale(1) contrast(1.1);transform:scale(1.08)}
.vlib-hero-bg::after{content:'';position:absolute;inset:0;background:radial-gradient(120% 90% at 50% 0,rgba(11,11,13,.35) 0,var(--vlib-ink) 72%)}
.vlib-hero-grid{position:absolute;inset:0;z-index:1;pointer-events:none;background-image:repeating-linear-gradient(0deg,transparent,transparent 88px,rgba(255,255,255,.022) 88px,rgba(255,255,255,.022) 89px),repeating-linear-gradient(90deg,transparent,transparent 88px,rgba(255,255,255,.022) 88px,rgba(255,255,255,.022) 89px)}
.vlib-hero .container{position:relative;z-index:2}
.vlib-hero-inner{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:4rem;align-items:flex-end}
.vlib-kicker{display:inline-flex;align-items:center;gap:.9rem;font-family:var(--fm);font-size:.6rem;font-weight:600;letter-spacing:.42em;text-transform:uppercase;color:rgba(9,161,190,.75);margin-bottom:1.8rem}
.vlib-kicker::before{content:'';width:34px;height:1px;background:rgba(9,161,190,.6)}
h1.vlib-title{font-family:var(--fd);font-weight:300;font-size:clamp(3rem,7.5vw,7.5rem);line-height:.92;letter-spacing:-.035em;color:#f7f5f2;margin:0 0 1.8rem}
.vlib-hero-sub{font-size:.95rem;font-weight:300;line-height:1.95;color:rgba(247,245,242,.45);max-width:34em}
.vlib-stats{display:flex;gap:3rem;flex-shrink:0}
.vlib-stat{text-align:center}
.vlib-stat-val{font-family:var(--fd);font-weight:200;font-size:3.4rem;line-height:1;letter-spacing:-.04em;color:#f7f5f2}
.vlib-stat-lbl{font-family:var(--fm);font-size:.55rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:rgba(247,245,242,.3);margin-top:.5rem}
.vlib-cue{position:relative;z-index:2;display:flex;align-items:center;gap:.8rem;margin-top:4.5rem;font-family:var(--fm);font-size:.55rem;font-weight:600;letter-spacing:.3em;text-transform:uppercase;color:rgba(247,245,242,.3)}
.vlib-cue-bar{position:relative;width:52px;height:1px;background:rgba(247,245,242,.14);overflow:hidden}
.vlib-cue-bar span{position:absolute;inset:0;background:var(--gold);transform-origin:left}

/* -- Fil d'Ariane -- */
.vlib-crumb{padding:1.5rem 0 0}
.vlib-crumb .breadcrumb{background:none;padding:0;margin:0;font-size:.78rem}
.vlib-crumb .breadcrumb-item,.vlib-crumb .breadcrumb-item a{color:var(--txt2)}
.vlib-crumb .breadcrumb-item.active{color:var(--txt)}

/* -- Sections -- */
.vlib-sec{padding:6.5rem 0;border-top:1px solid var(--vlib-line)}
.vlib-sec:first-of-type{border-top:none}
.vlib-sec-alt{background:var(--bg2)}
.vlib-sec-layout{display:grid;grid-template-columns:250px minmax(0,1fr);gap:4.5rem;align-items:start}
.vlib-sec-head{position:sticky;top:120px}
.vlib-sec-num{display:block;font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.3em;color:var(--gold2);margin-bottom:1.1rem}
h2.vlib-sec-title{font-family:var(--fd);font-weight:300;font-size:clamp(1.9rem,2.9vw,2.9rem);line-height:1.08;letter-spacing:-.02em;color:var(--txt);margin:0 0 1.2rem}
.vlib-sec-sub{font-size:.86rem;font-weight:300;line-height:1.9;color:var(--txt2);margin:0}
.vlib-empty{font-size:.9rem;color:var(--txt2);font-style:italic}

/* -- Grille et cartes -- */
.vlib-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:2.4rem 1.9rem}
.vlib-card{position:relative}
.vlib-poster{position:relative;display:block;border-radius:18px;overflow:hidden;background:#15151a;aspect-ratio:16/9;isolation:isolate;transform:translateZ(0)}
.vlib-poster img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:transform .9s var(--expo),filter .6s ease;will-change:transform}
.vlib-poster::after{content:'';position:absolute;inset:0;background:linear-gradient(180deg,rgba(11,11,13,0) 38%,rgba(11,11,13,.62) 100%);opacity:.85;transition:opacity .5s ease;z-index:1}
.vlib-play{position:absolute;top:50%;left:50%;z-index:2;width:58px;height:58px;margin:-29px 0 0 -29px;border-radius:50%;display:grid;place-items:center;color:#fff;font-size:19px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.35);backdrop-filter:blur(7px);-webkit-backdrop-filter:blur(7px);transition:transform .5s var(--expo),background .4s ease,border-color .4s ease,color .4s ease}
.vlib-play i{transform:translateX(1px)}
.vlib-watch{position:absolute;z-index:2;bottom:1rem;inset-inline-start:1.1rem;font-family:var(--fm);font-size:.55rem;font-weight:700;letter-spacing:.26em;text-transform:uppercase;color:rgba(255,255,255,.82);opacity:0;transform:translateY(8px);transition:opacity .45s ease,transform .45s var(--expo)}
.vlib-poster:hover img,.vlib-poster:focus-visible img{transform:scale(1.07)}
.vlib-poster:hover::after{opacity:1}
.vlib-poster:hover .vlib-play,.vlib-poster:focus-visible .vlib-play{transform:scale(1.14);background:var(--gold);border-color:var(--gold);color:var(--vlib-ink)}
.vlib-poster:hover .vlib-watch{opacity:1;transform:translateY(0)}
.vlib-poster:focus-visible{outline:2px solid var(--gold);outline-offset:3px}
.vlib-body{padding:1.15rem .15rem 0}
.vlib-serie{display:block;font-family:var(--fm);font-size:.55rem;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--gold2);margin-bottom:.5rem}
h3.vlib-card-title{font-family:var(--fm);font-size:.95rem;font-weight:600;line-height:1.45;letter-spacing:-.005em;color:var(--txt);margin:0;text-transform:none}
.vlib-meta{list-style:none;margin:.7rem 0 0;padding:0;display:flex;flex-direction:column;gap:.3rem}
.vlib-meta li{font-size:.76rem;font-weight:300;line-height:1.6;color:var(--txt2)}
.vlib-meta li i{color:var(--gold2);width:15px;margin-inline-end:.35rem;font-size:.72rem}
.vlib-meta-note{display:block;margin-top:.45rem;color:var(--txt2);opacity:.85}

/* -- RTL -- */
[dir="rtl"] .vlib-kicker{letter-spacing:0}
[dir="rtl"] .vlib-sec-num,[dir="rtl"] .vlib-watch,[dir="rtl"] .vlib-stat-lbl,[dir="rtl"] .vlib-cue{letter-spacing:0}
[dir="rtl"] .vlib-play i{transform:translateX(-1px)}

/* -- Responsive -- */
@media(max-width:1199px){.vlib-sec-layout{grid-template-columns:220px minmax(0,1fr);gap:3rem}}
@media(max-width:991px){
  .vlib-hero{padding:8.5rem 0 4rem}
  .vlib-hero-inner{grid-template-columns:1fr;gap:2.8rem;align-items:flex-start}
  .vlib-stats{gap:2.4rem}
  .vlib-cue{display:none}
  .vlib-sec{padding:4.5rem 0}
  .vlib-sec-layout{grid-template-columns:1fr;gap:2.4rem}
  .vlib-sec-head{position:static;top:auto}
}
@media(max-width:575px){
  .vlib-hero{padding:7.5rem 0 3.2rem}
  .vlib-grid{grid-template-columns:1fr;gap:2rem}
  .vlib-stat-val{font-size:2.6rem}
}
@media(prefers-reduced-motion:reduce){
  .vlib-poster img,.vlib-poster::after,.vlib-play,.vlib-watch{transition:none}
  .vlib-poster:hover img{transform:none}
}
</style>

<div class="vlib">

  <!-- ====================== EN-TETE ====================== -->
  <section class="vlib-hero">
    <div class="vlib-hero-bg" aria-hidden="true">
      <img src="<?php echo $siteURL . $vlibBanner; ?>" alt="">
    </div>
    <div class="vlib-hero-grid" aria-hidden="true"></div>
    <div class="container">
      <div class="vlib-hero-inner">
        <div>
          <span class="vlib-kicker" data-vlib-reveal><?php echo $lang['VLIB_KICKER'][$_SESSION['lang']]; ?></span>
          <h1 class="vlib-title" data-vlib-reveal><?php echo $page->getTitre(); ?></h1>
          <p class="vlib-hero-sub" data-vlib-reveal><?php echo $lang['VLIB_HERO_SUB'][$_SESSION['lang']]; ?></p>
        </div>
        <div class="vlib-stats" data-vlib-reveal>
          <div class="vlib-stat">
            <div class="vlib-stat-val" data-vlib-count="<?php echo (int) $vlibStatVideos; ?>" data-vlib-suffix="<?php echo $vlibStatSuffix; ?>"><?php echo (int) $vlibStatVideos . $vlibStatSuffix; ?></div>
            <div class="vlib-stat-lbl"><?php echo $lang['VLIB_STAT_VIDEOS'][$_SESSION['lang']]; ?></div>
          </div>
          <div class="vlib-stat">
            <div class="vlib-stat-val" data-vlib-count="<?php echo (int) $vlibStatClients; ?>" data-vlib-suffix="<?php echo $vlibStatSuffix; ?>"><?php echo (int) $vlibStatClients . $vlibStatSuffix; ?></div>
            <div class="vlib-stat-lbl"><?php echo $lang['VLIB_STAT_CLIENTS'][$_SESSION['lang']]; ?></div>
          </div>
        </div>
      </div>
      <div class="vlib-cue" aria-hidden="true">
        <span class="vlib-cue-bar"><span></span></span>
        <?php echo $lang['VLIB_SCROLL'][$_SESSION['lang']]; ?>
      </div>
    </div>
  </section>

  <div class="container vlib-crumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?php echo $lang['BREADCRUMB_HOME'][$_SESSION['lang']]; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $page->getTitre(); ?></li>
      </ol>
    </nav>
  </div>

  <?php if (trim(strip_tags($page->getTexte())) != '') : ?>
  <section class="container" style="padding-top:2.5rem">
    <div class="row"><div class="col-sm-12"><?php echo $page->getTexte(); ?></div></div>
  </section>
  <?php endif; ?>

  <!-- ====================== LES DEUX SECTIONS ====================== -->
  <?php foreach ($vlibSections as $vlibIndex => $vlibSection) : ?>
  <section class="vlib-sec<?php echo $vlibIndex % 2 ? ' vlib-sec-alt' : ''; ?>" id="<?php echo $vlibSection['id']; ?>">
    <div class="container">
      <div class="vlib-sec-layout">

        <div class="vlib-sec-head">
          <span class="vlib-sec-num" data-vlib-reveal><?php echo $vlibSection['num']; ?></span>
          <h2 class="vlib-sec-title" data-vlib-reveal><?php echo htmlspecialchars($vlibSection['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
          <p class="vlib-sec-sub" data-vlib-reveal><?php echo htmlspecialchars($vlibSection['sub'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>

        <div class="vlib-grid">
          <?php if (empty($vlibSection['videos'])) : ?>
            <p class="vlib-empty"><?php echo $lang['VLIB_EMPTY'][$_SESSION['lang']]; ?></p>
          <?php endif; ?>
          <?php foreach ($vlibSection['videos'] as $vlibKey => $video) :
              // Serie Digital Expert : en base, "titre" porte le nom de la serie et
              // "extrait" le vrai titre de l'episode ; on prend donc l'extrait comme
              // titre de carte et la serie passe en bandeau au-dessus.
              // Films clients : "titre" est le nom du client et "extrait" un texte de
              // presentation, trop long pour un titre ; on garde le titre. Certains
              // titres sont des noms de fichier ("Antika_Video2") : on retire les "_".
              $vlibSerie   = trim(preg_replace('/\s+/', ' ', str_replace('_', ' ', html_entity_decode(strip_tags($video->getTitre()), ENT_QUOTES, 'UTF-8'))));
              $vlibEpisode = ($vlibSection['id'] === 'the-digital-expert')
                  ? trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($video->getExtrait()), ENT_QUOTES, 'UTF-8')))
                  : '';
              $vlibLabel   = $vlibEpisode !== '' ? $vlibEpisode : $vlibSerie;
              if ($vlibLabel === '') { $vlibLabel = $page->getTitre(); }
              $vlibShowSerie = ($vlibSerie !== '' && $vlibSerie !== $vlibLabel);
              $vlibUrl     = 'https://www.youtube.com/watch?v=' . rawurlencode($vlibKey);
              // Quelques fiches n'ont pas de visuel en base : on retombe alors sur
              // la vignette YouTube plutot que d'afficher une image cassee.
              $vlibPoster  = trim($video->getPhoto()) !== ''
                  ? $siteURL . 'images/videos/' . rawurlencode(trim($video->getPhoto()))
                  : 'https://i.ytimg.com/vi/' . rawurlencode($vlibKey) . '/hqdefault.jpg';
          ?>
          <article class="vlib-card" data-vlib-card>
            <a class="vlib-poster"
               href="<?php echo htmlspecialchars($vlibUrl, ENT_QUOTES, 'UTF-8'); ?>"
               data-src="<?php echo htmlspecialchars($vlibUrl, ENT_QUOTES, 'UTF-8'); ?>"
               data-fancybox="<?php echo $vlibSection['gallery']; ?>"
               data-caption="<?php echo htmlspecialchars($vlibLabel, ENT_QUOTES, 'UTF-8'); ?>"
               target="_blank" rel="noopener"
               aria-label="<?php echo htmlspecialchars($vlibWatchWord . ' : ' . $vlibLabel, ENT_QUOTES, 'UTF-8'); ?>">
              <img src="<?php echo $vlibPoster; ?>"
                   alt="<?php echo htmlspecialchars($vlibLabel, ENT_QUOTES, 'UTF-8'); ?>"
                   loading="lazy" decoding="async" data-vlib-poster>
              <span class="vlib-play" aria-hidden="true"><i class="fab fa-youtube"></i></span>
              <span class="vlib-watch" aria-hidden="true"><?php echo htmlspecialchars($vlibWatchWord, ENT_QUOTES, 'UTF-8'); ?></span>
            </a>
            <div class="vlib-body">
              <?php if ($vlibShowSerie) : ?>
              <span class="vlib-serie"><?php echo htmlspecialchars($vlibSerie, ENT_QUOTES, 'UTF-8'); ?></span>
              <?php endif; ?>
              <h3 class="vlib-card-title"><?php echo htmlspecialchars($vlibLabel, ENT_QUOTES, 'UTF-8'); ?></h3>
              <?php if (trim($video->getLocalisation()) != '' || $video->getDateShooting() != '') : ?>
              <ul class="vlib-meta">
                <?php if (trim($video->getLocalisation()) != '') : ?>
                <li><i class="fa fa-map-marker"></i><?php echo htmlspecialchars($video->getLocalisation(), ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endif; ?>
                <?php if ($video->getDateShooting() != '') : ?>
                <li><i class="fa fa-calendar"></i><?php echo normaldate($video->getDateShooting()); ?></li>
                <?php endif; ?>
              </ul>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>
  <?php endforeach; ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    // Les etats de depart sont poses en JS (et non en CSS) pour que la page
    // reste entierement lisible si GSAP ne se charge pas.
    if (!window.gsap || !window.ScrollTrigger) { return; }
    gsap.registerPlugin(ScrollTrigger);

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduced) { return; }

    var hero = document.querySelectorAll('.vlib-hero [data-vlib-reveal]');
    if (hero.length) {
        gsap.fromTo(hero,
            { autoAlpha: 0, y: 26 },
            { autoAlpha: 1, y: 0, duration: 1.1, ease: 'expo.out', stagger: 0.09, delay: 0.1 });
    }

    // Compteurs de l'en-tete.
    document.querySelectorAll('[data-vlib-count]').forEach(function (el) {
        var target = parseInt(el.getAttribute('data-vlib-count'), 10) || 0;
        var state  = { n: 0 };
        var suffix = el.getAttribute('data-vlib-suffix') || '';
        el.textContent = '0' + suffix;
        var tween = gsap.to(state, {
            n: target, duration: 1.5, ease: 'expo.out', delay: 0.45,
            onUpdate: function () { el.textContent = Math.round(state.n) + suffix; },
            onComplete: function () { el.textContent = target + suffix; }
        });

        // Filet : si le ticker rAF est suspendu (onglet en arriere-plan au
        // chargement, navigateur econome), le chiffre ne doit pas rester fige
        // a une valeur intermediaire -- ce serait un faux chiffre affiche.
        // On termine le tween plutot que d'ecrire le texte : sinon il continue
        // ensuite de repasser par-dessus avec sa valeur intermediaire.
        setTimeout(function () { if (tween.progress() < 1) { tween.progress(1); } }, 2500);
    });

    var cueBar = document.querySelector('.vlib-cue-bar span');
    if (cueBar) {
        gsap.fromTo(cueBar, { scaleX: 0 },
            { scaleX: 1, duration: 1.4, ease: 'power2.inOut', repeat: -1, repeatDelay: 0.3 });
    }

    // En-tetes de section.
    document.querySelectorAll('.vlib-sec-head').forEach(function (head) {
        var bits = head.querySelectorAll('[data-vlib-reveal]');
        if (!bits.length) { return; }
        gsap.fromTo(bits,
            { autoAlpha: 0, y: 22 },
            {
                autoAlpha: 1, y: 0, duration: 0.9, ease: 'expo.out', stagger: 0.07,
                scrollTrigger: { trigger: head, start: 'top 85%', once: true }
            });
    });

    // Cartes : apparition en cascade, par rangee.
    // L'etat de depart doit etre pose AVANT la creation du batch : ScrollTrigger
    // declenche onEnter des le premier refresh pour les cartes deja visibles, et
    // un gsap.set() place apres les reduirait a nouveau a zero -- donc invisibles
    // pour de bon.
    var cards = gsap.utils.toArray('[data-vlib-card]');
    gsap.set(cards, { autoAlpha: 0, y: 34, scale: 0.975 });

    ScrollTrigger.batch(cards, {
        start: 'top 92%',
        once: true,
        onEnter: function (batch) {
            gsap.to(batch, {
                autoAlpha: 1, y: 0, scale: 1,
                duration: 0.95, ease: 'expo.out', stagger: 0.08, overwrite: true
            });
        }
    });

    // Filet de securite : si ScrollTrigger ne se declenche jamais (navigateur
    // exotique, rAF suspendu, impression), aucune carte ne doit rester masquee.
    setTimeout(function () {
        cards.forEach(function (card) {
            if (parseFloat(getComputedStyle(card).opacity) === 0) {
                gsap.set(card, { autoAlpha: 1, y: 0, scale: 1 });
            }
        });
    }, 3000);

    // Parallaxe douce du visuel a l'interieur de son cadre.
    if (window.innerWidth > 767) {
        document.querySelectorAll('[data-vlib-poster]').forEach(function (img) {
            gsap.fromTo(img, { yPercent: -4 }, {
                yPercent: 4, ease: 'none',
                scrollTrigger: { trigger: img.closest('.vlib-card'), start: 'top bottom', end: 'bottom top', scrub: true }
            });
        });

        // Bouton lecture legerement magnetique au survol.
        document.querySelectorAll('.vlib-poster').forEach(function (poster) {
            var play = poster.querySelector('.vlib-play');
            if (!play) { return; }
            poster.addEventListener('mousemove', function (e) {
                var r = poster.getBoundingClientRect();
                gsap.to(play, {
                    x: (e.clientX - (r.left + r.width / 2)) * 0.14,
                    y: (e.clientY - (r.top + r.height / 2)) * 0.14,
                    duration: 0.5, ease: 'power3.out'
                });
            });
            poster.addEventListener('mouseleave', function () {
                gsap.to(play, { x: 0, y: 0, duration: 0.6, ease: 'elastic.out(1,.5)' });
            });
        });
    }

    window.addEventListener('load', function () { ScrollTrigger.refresh(); });
})();
</script>
