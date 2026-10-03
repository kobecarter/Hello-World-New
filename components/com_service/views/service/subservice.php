<?php $banner = $service->getPhotoBanniere() == "" ? "images/banner.jpg" : "images/services/" . $service->getPhotoBanniere(); ?>

<?php 
if($service->getId()==38){
  $serviceBanner = "images/services-img/Web_Design_Development_agency.webp" ;
}
elseif($service->getId()==42){
  $serviceBanner = "images/services-img/graphic-design-au-maroc.webp" ;
}
elseif($service->getId()==39){
  $serviceBanner = "images/services-img/mobile_app_service-au-maroc.webp" ;
}
elseif($service->getId()==41){
  $serviceBanner = "images/services-img/generation-de-leads.webp" ;
}
elseif($service->getId()==45){
  $serviceBanner = "images/services-img/marketing-influece-agency.webp";
}
elseif($service->getId()==47){
  $serviceBanner = "images/services-img/copywriting.webp" ;
}
elseif($service->getId()==44 || $service->getId()==148){
  $serviceBanner = "images/services-img/photo-video.webp" ;
}
elseif($service->getId()==46){
  $serviceBanner = "images/services-img/social_media.webp" ;
}
elseif($service->getId()==40){
  $serviceBanner = "images/services-img/seo_service_au_maroc.webp" ;
}
elseif($service->getId()==43){
  $serviceBanner = "images/services-img/copywriting.webp" ;
}
elseif($service->getId()==50){
  $serviceBanner = "images/services-img/Personal_Branding_maroc.webp" ;
}
elseif($service->getId()==51){
  $serviceBanner = "images/services-img/ia.svg" ;
}
else{
   $serviceBanner = "images/services/Web_Design_Development_agency.webp" ;
}
?> 
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
    <div class="wm-hero-inner service-id-<?php echo $service->getId() ?>">
      <div>
        <div class="wm-hero-label"><?php echo $service->getTitre() ?></div>
        <h1 class="sh-h1"><?php echo $service->getH1() ?></h1>
        <?php // La liste de villes reste visible (meme style) mais sort du <h1> : elle diluait
              // le mot-cle principal et rendait tous les H1 des pages service quasi identiques. ?>
        <span class="agency-tag"><?php echo $lang['SVC_CITIES_TAG'][$_SESSION['lang']]; ?></span>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($service->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>

            <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_VOIR_OFFRES'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_VOIR_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div>
            </a>
        </div>
      </div>
      <div class="service-banner-img">
    <?php
    // 1. On récupère la photo du service actuel
    $photo = $service->getPhotoHero();
    if (empty($photo) && $service->getParent() && $service->getParent()->getId() != 0) {
        $photo = $service->getParent()->getPhotoHero();
    }
    ?>
    
    <img src="<?php echo $siteURL; ?>images/services/<?php echo $photo; ?>" 
         alt="<?php echo htmlspecialchars($service->getTitre()); ?>">
</div>
    </div>
  </div>
</section>


<!--<div class="marquee">-->
<!--  <div class="marquee-track">-->
<!--    <span class="mq-item">SITES SUR MESURE<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">APPS iOS &amp; ANDROID<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">PORTAILS CLIENTS<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">UX / UI DESIGN<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">PERFORMANCE &amp; SEO<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">IA INTÉGRÉE<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">ANALYTICS<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">SITES SUR MESURE<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">APPS iOS &amp; ANDROID<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">PORTAILS CLIENTS<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">UX / UI DESIGN<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">PERFORMANCE &amp; SEO<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">IA INTÉGRÉE<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">ANALYTICS<span class="mq-dot"></span></span>-->
<!--  </div>-->
<!--</div>-->
<section class="breadcrumb-sec">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?php echo $lang['BREADCRUMB_HOME'][$_SESSION['lang']]; ?></a></li>
				<li class="breadcrumb-item"><a href="<?php echo $page->getLink(); ?>"><?php echo $page->getTitre(); ?></a></li>
				<?php if ($service->getParent()->getId() != 0) : ?>
					<li class="breadcrumb-item"><a href="<?php echo $service->getParent()->getLink(); ?>"><?php echo $service->getParent()->getTitre(); ?></a></li>
				<?php endif; ?>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $service->getTitre(); ?></li>
			</ol>
		</nav>
	</div>
</section>
<!--========================================================
                          SERVICES
  =========================================================-->
<section class="page-template page-detail-service">
    <div class="">
        <div class="container p-0">
            <div class="row">
                <div class="col-12">
                    <ul class="ul-tags">
                        <?php foreach ($services_tags as $key => $value) : ?>
                        <li><a href="<?= $value->getLink() ?>"
                                class="a-tag <?= $service->getId() == $value->getId() ? 'active' : null ?>"><?= $value->getTitre() ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="service-content">
            <?php
            // Sur la page photo, la galerie s'intercale avant le volet
            // "Our Photo and Video Production Services". Ce volet ne vit pas
            // dans cette vue mais dans le champ texte du service, on coupe donc
            // ce texte juste avant lui. Repere verifie dans les trois langues :
            // le texte ne contient qu'un seul <div class="container-fluid p-0">
            // et c'est lui qui ouvre le volet. Si ce repere disparait un jour
            // parce que le contenu a ete reecrit en back-office, tout le texte
            // s'affiche d'un bloc et la galerie se retrouve simplement apres,
            // comme avant : rien ne casse.
            $svcTexte     = $service->getTexte();
            $svcTexteRest = '';
            if ($service->getId() == 148 || $service->getId() == 44) {
                $svcCut = strpos($svcTexte, '<div class="container-fluid p-0">');
                if ($svcCut !== false) {
                    $svcTexteRest = substr($svcTexte, $svcCut);
                    $svcTexte     = substr($svcTexte, 0, $svcCut);
                }
            }
            echo $svcTexte;
            ?>
        </div>

<?php // Galerie photo : uniquement sur la page photo (service 148 sur ce site ; la 44 est la page video)
if ($service->getId() == 148) :

/*
 * Phototheque.
 *
 * L'ancien bloc poussait les 143 photos dans le DOM d'un coup et laissait
 * Isotope (charge globalement) les positionner, ce qui faisait de cette section
 * la plus lourde de la page. Il parcourait aussi deux fois les 14 galeries, un
 * coup pour les filtres un coup pour les images.
 *
 * Ici on parcourt une seule fois, on filtre par identifiant de galerie plutot
 * que par un slug derive du titre -- ce dernier produisait des noms de classe
 * en arabe sur /ar/ -- et seules les 24 premieres photos sont affichees au
 * depart : les suivantes restent en display:none, donc le navigateur ne les
 * telecharge pas tant que le visiteur ne les demande pas.
 *
 * Les classes sont prefixees psh- exprès : .cs-isotop et .div-gallery-photo
 * servent aussi aux pages produit, agence et a la galerie influenceurs plus bas
 * dans ce meme fichier.
 */

$pshGalleryIds = array(40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53);
$pshCats  = array();
$pshItems = array();

// Une galerie non traduite retombe sur la langue par defaut plutot que de
// disparaitre : sans cela la page photo est vide dans les langues sans traduction.
$pshDefaultLang = langue::getDefaultLanguage();
foreach ($pshGalleryIds as $pshGid) {
    $pshLang = $_SESSION['lang'];
    $pshGal = galerie::find($pshGid, $pshLang);
    $pshCatTitle = $pshGal ? trim(preg_replace('/\s+/', ' ', strip_tags($pshGal->getTitre()))) : '';
    if ($pshCatTitle === '' && $pshLang != $pshDefaultLang) {
        $pshLang = $pshDefaultLang;
        $pshGal = galerie::find($pshGid, $pshLang);
        $pshCatTitle = $pshGal ? trim(preg_replace('/\s+/', ' ', strip_tags($pshGal->getTitre()))) : '';
    }
    if ($pshCatTitle === '') { continue; }
    $pshCats[$pshGid] = $pshCatTitle;
    foreach (galerie_photo::findAllByGalerie($pshLang, $pshGid) as $pshPhoto) {
        if (trim($pshPhoto->getPhoto()) === '') { continue; }
        $pshItems[] = array('cat' => $pshGid, 'photo' => $pshPhoto);
    }
}

$pshCounts = array();
foreach ($pshItems as $pshIt) {
    $pshCounts[$pshIt['cat']] = isset($pshCounts[$pshIt['cat']]) ? $pshCounts[$pshIt['cat']] + 1 : 1;
}
$pshTotal = count($pshItems);
$pshBatch = 24;
?>

<style>
/* ==========================================================================
   PHOTOTHEQUE -- portee a cette section (prefixe .psh-).
   Verre repris tel quel de la charte : meme recette que .glass-nav / .card
   (blur + saturate, --glass-border, rayon 18px, inset blanc).
   ========================================================================== */
.psh{padding:7rem 0;background:var(--bg2);border-top:1px solid var(--border);position:relative;overflow:hidden}
.psh::before{content:'';position:absolute;top:-18%;inset-inline-end:-12%;width:52vw;height:52vw;max-width:760px;max-height:760px;border-radius:50%;background:radial-gradient(circle,rgba(255,183,3,.10),rgba(255,124,70,.05) 45%,transparent 70%);pointer-events:none}
.psh > .container{position:relative;z-index:1}

/* -- Titre -- */
.psh-head{max-width:720px;margin:0 auto 3rem;text-align:center}
.psh-kicker{display:inline-flex;align-items:center;gap:.8rem;font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.34em;text-transform:uppercase;color:var(--gold2);margin-bottom:1.4rem}
.psh-kicker::before,.psh-kicker::after{content:'';width:26px;height:1px;background:linear-gradient(90deg,transparent,var(--gold2))}
.psh-kicker::after{background:linear-gradient(90deg,var(--gold2),transparent)}
h2.psh-title{font-family:var(--fd);font-weight:300;font-size:clamp(2.2rem,4.4vw,3.8rem);line-height:1.04;letter-spacing:-.025em;color:var(--txt);margin:0 0 1.2rem}
h2.psh-title em{font-style:italic;color:var(--gold2)}
.psh-sub{font-size:.9rem;font-weight:300;line-height:1.9;color:var(--txt2);margin:0}

/* -- Barre de filtres en verre -- */
.psh-bar{position:sticky;top:86px;z-index:20;margin:0 auto 2.6rem;padding:.55rem;border-radius:999px;width:max-content;max-width:100%;
  background:linear-gradient(135deg,rgba(255,255,255,.6),rgba(255,255,255,.34));
  border:1px solid var(--glass-border);
  -webkit-backdrop-filter:blur(26px) saturate(155%);backdrop-filter:blur(26px) saturate(155%);
  box-shadow:var(--shadow-card),inset 0 1px 0 rgba(255,255,255,.95)}
.psh-bar-scroll{display:flex;gap:.3rem;overflow-x:auto;scrollbar-width:none;-ms-overflow-style:none;scroll-behavior:smooth}
.psh-bar-scroll::-webkit-scrollbar{display:none}
.psh-bar.is-scrollable .psh-bar-scroll{-webkit-mask-image:linear-gradient(90deg,transparent 0,#000 26px,#000 calc(100% - 26px),transparent 100%);mask-image:linear-gradient(90deg,transparent 0,#000 26px,#000 calc(100% - 26px),transparent 100%)}
.psh-chip{flex:0 0 auto;display:inline-flex;align-items:center;gap:.45rem;border:0;background:transparent;cursor:pointer;
  font-family:var(--fm);font-size:.75rem;font-weight:500;color:var(--txt2);white-space:nowrap;
  padding:.62rem 1.05rem;border-radius:999px;transition:color .3s var(--ease),background .3s var(--ease)}
.psh-chip b{font-size:.62rem;font-weight:600;opacity:.5;font-variant-numeric:tabular-nums}
.psh-chip:hover{color:var(--txt);background:rgba(255,255,255,.55)}
.psh-chip.is-active{color:#fff;background:linear-gradient(135deg,var(--gold),var(--gold2));box-shadow:0 6px 16px -6px rgba(255,124,70,.55)}
.psh-chip.is-active b{opacity:.8}
.psh-chip:focus-visible{outline:2px solid var(--gold2);outline-offset:2px}

/* -- Grille -- */
.psh-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(232px,1fr));gap:1.1rem}
.psh-item{margin:0;position:relative;animation:pshIn .5s var(--expo) both}
.psh-item.is-out{display:none}
@keyframes pshIn{from{opacity:0;transform:translateY(14px) scale(.985)}to{opacity:1;transform:none}}
.psh-link{position:relative;display:block;border-radius:18px;overflow:hidden;aspect-ratio:4/5;background:#15151a;
  border:1px solid var(--glass-border);box-shadow:var(--shadow-card),inset 0 1px 0 rgba(255,255,255,.6)}
.psh-link img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:transform 1s var(--expo),filter .6s ease;will-change:transform}
.psh-link::after{content:'';position:absolute;inset:0;z-index:1;background:linear-gradient(180deg,rgba(11,11,13,0) 45%,rgba(11,11,13,.58) 100%);opacity:0;transition:opacity .45s ease}
.psh-link:hover img,.psh-link:focus-visible img{transform:scale(1.06)}
.psh-link:hover::after,.psh-link:focus-visible::after{opacity:1}
.psh-link:focus-visible{outline:2px solid var(--gold2);outline-offset:3px}

/* -- Pastille de categorie et loupe, en verre -- */
.psh-tag{position:absolute;z-index:2;top:.75rem;inset-inline-start:.75rem;
  font-family:var(--fm);font-size:.58rem;font-weight:600;letter-spacing:.1em;color:var(--ink);
  background:rgba(255,255,255,.6);border:1px solid var(--glass-border);padding:.3rem .7rem;border-radius:999px;
  -webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);
  opacity:0;transform:translateY(-6px);transition:opacity .4s ease,transform .4s var(--expo)}
.psh-zoom{position:absolute;z-index:2;bottom:.8rem;inset-inline-end:.8rem;width:38px;height:38px;border-radius:50%;
  display:grid;place-items:center;color:#fff;font-size:.82rem;
  background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.4);
  -webkit-backdrop-filter:blur(8px);backdrop-filter:blur(8px);
  opacity:0;transform:scale(.8);transition:opacity .4s ease,transform .45s var(--expo),background .3s ease}
.psh-link:hover .psh-tag,.psh-link:focus-visible .psh-tag{opacity:1;transform:translateY(0)}
.psh-link:hover .psh-zoom,.psh-link:focus-visible .psh-zoom{opacity:1;transform:scale(1)}
.psh-link:hover .psh-zoom{background:rgba(255,255,255,.26)}

/* -- Bouton voir plus -- */
.psh-more{margin-top:2.8rem;text-align:center}
.psh-more[hidden]{display:none}
.psh-more-btn{display:inline-flex;align-items:center;gap:.7rem;cursor:pointer;
  font-family:var(--fm);font-size:.72rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--txt);
  padding:1rem 2.1rem;border-radius:999px;
  background:linear-gradient(135deg,rgba(255,255,255,.72),rgba(255,255,255,.42));
  border:1px solid var(--glass-border);
  -webkit-backdrop-filter:blur(14px) saturate(150%);backdrop-filter:blur(14px) saturate(150%);
  box-shadow:var(--shadow-card),inset 0 1px 0 rgba(255,255,255,.95);
  transition:transform .35s var(--ease),box-shadow .35s var(--ease),background .35s var(--ease)}
.psh-more-btn:hover{transform:translateY(-3px);background:linear-gradient(135deg,rgba(255,255,255,.9),rgba(255,255,255,.6));box-shadow:var(--shadow),inset 0 1px 0 rgba(255,255,255,.95)}
.psh-more-btn i{color:var(--gold2);transition:transform .35s var(--ease)}
.psh-more-btn:hover i{transform:translateY(2px)}
.psh-more-count{font-size:.62rem;opacity:.55;letter-spacing:.1em}

[dir="rtl"] .psh-kicker,[dir="rtl"] .psh-chip,[dir="rtl"] .psh-tag,[dir="rtl"] .psh-more-btn,[dir="rtl"] .psh-more-count{letter-spacing:0}

@media(max-width:991px){
  .psh{padding:4.5rem 0}
  .psh-bar{top:72px}
  .psh-grid{grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:.8rem}
}
@media(max-width:575px){
  .psh-grid{grid-template-columns:repeat(2,1fr)}
  .psh-bar{border-radius:20px;width:100%}
}
@media(prefers-reduced-motion:reduce){
  .psh-link img,.psh-link::after,.psh-tag,.psh-zoom,.psh-more-btn{transition:none}
  .psh-item{animation:none}
  .psh-link:hover img{transform:none}
}
</style>

<section class="psh" id="photo-shoots">
  <div class="container">

    <div class="psh-head">
      <span class="psh-kicker" data-psh-reveal><?php echo $lang['PSH_KICKER'][$_SESSION['lang']]; ?></span>
      <h2 class="psh-title" data-psh-reveal><?php echo $lang['SVC_SECTION_PHOTOTHEQUE'][$_SESSION['lang']]; ?></h2>
      <p class="psh-sub" data-psh-reveal><?php echo $lang['PSH_SUB'][$_SESSION['lang']]; ?></p>
    </div>

    <div class="psh-bar" data-psh-reveal>
      <div class="psh-bar-scroll" role="tablist" aria-label="<?php echo htmlspecialchars($lang['PSH_KICKER'][$_SESSION['lang']], ENT_QUOTES, 'UTF-8'); ?>">
        <button type="button" class="psh-chip is-active" data-psh-filter="all" role="tab" aria-selected="true">
          <?php echo $lang['SVC_FILTER_ALL'][$_SESSION['lang']]; ?> <b><?php echo $pshTotal; ?></b>
        </button>
        <?php foreach ($pshCats as $pshGid => $pshCatTitle) :
            if (empty($pshCounts[$pshGid])) { continue; } ?>
        <button type="button" class="psh-chip" data-psh-filter="<?php echo (int) $pshGid; ?>" role="tab" aria-selected="false">
          <?php echo htmlspecialchars($pshCatTitle, ENT_QUOTES, 'UTF-8'); ?> <b><?php echo (int) $pshCounts[$pshGid]; ?></b>
        </button>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="psh-grid" id="pshGrid">
      <?php foreach ($pshItems as $pshIndex => $pshIt) :
          $pshPhoto = $pshIt['photo'];
          $pshCatTitle = $pshCats[$pshIt['cat']];
          $pshSrc = $siteURL . 'images/galerie/' . rawurlencode(trim($pshPhoto->getPhoto()));
          // L'ancien bloc mettait le nom du service en alt sur les 143 photos.
          // On prend le titre de la photo quand il existe, sinon la categorie.
          $pshAlt = trim(strip_tags($pshPhoto->getTitre()));
          if ($pshAlt === '') { $pshAlt = $pshCatTitle . ' - ' . trim(strip_tags($service->getTitre())); }
      ?>
      <figure class="psh-item<?php echo $pshIndex >= $pshBatch ? ' is-out' : ''; ?>" data-psh-cat="<?php echo (int) $pshIt['cat']; ?>">
        <a class="psh-link"
           href="<?php echo htmlspecialchars($pshSrc, ENT_QUOTES, 'UTF-8'); ?>"
           data-fancybox="psh-gallery"
           data-caption="<?php echo htmlspecialchars($pshAlt, ENT_QUOTES, 'UTF-8'); ?>">
          <img src="<?php echo htmlspecialchars($pshSrc, ENT_QUOTES, 'UTF-8'); ?>"
               alt="<?php echo htmlspecialchars($pshAlt, ENT_QUOTES, 'UTF-8'); ?>"
               loading="lazy" decoding="async">
          <span class="psh-tag"><?php echo htmlspecialchars($pshCatTitle, ENT_QUOTES, 'UTF-8'); ?></span>
          <span class="psh-zoom" aria-hidden="true"><i class="fa fa-search-plus"></i></span>
        </a>
      </figure>
      <?php endforeach; ?>
    </div>

    <div class="psh-more" id="pshMore"<?php echo $pshTotal <= $pshBatch ? ' hidden' : ''; ?>>
      <button type="button" class="psh-more-btn" id="pshMoreBtn">
        <?php echo $lang['PSH_LOAD_MORE'][$_SESSION['lang']]; ?>
        <span class="psh-more-count" id="pshMoreCount"></span>
        <i class="fa fa-arrow-down" aria-hidden="true"></i>
      </button>
    </div>

  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    var grid = document.getElementById('pshGrid');
    if (!grid) { return; }

    var items    = Array.prototype.slice.call(grid.querySelectorAll('.psh-item'));
    var chips    = Array.prototype.slice.call(document.querySelectorAll('[data-psh-filter]'));
    var moreWrap = document.getElementById('pshMore');
    var moreBtn  = document.getElementById('pshMoreBtn');
    var moreCnt  = document.getElementById('pshMoreCount');
    var BATCH    = <?php echo (int) $pshBatch; ?>;
    var PHOTOS   = <?php echo json_encode($lang['PSH_PHOTOS'][$_SESSION['lang']]); ?>;

    var state   = { filter: 'all', shown: BATCH };
    var hasGsap = !!(window.gsap && window.ScrollTrigger);
    if (hasGsap) { gsap.registerPlugin(ScrollTrigger); }

    function matching() {
        return state.filter === 'all'
            ? items
            : items.filter(function (el) { return el.getAttribute('data-psh-cat') === state.filter; });
    }

    // Le filtrage ne fait que basculer une classe. L'apparition est une
    // animation CSS (keyframes pshIn, fill-mode both) qui repart toute seule
    // quand une vignette revient de display:none.
    //
    // Deux versions precedentes passaient par GSAP et se cassaient toutes les
    // deux : Flip laissait les vignettes en position absolue et superposees si
    // on enchainait les filtres, et un simple tween d'opacite les laissait a
    // zero des que le ticker rAF etait suspendu. Une animation CSS ne depend
    // d'aucun ticker et son etat final est garanti par fill-mode: both.
    function apply() {
        var list    = matching();
        var visible = list.slice(0, state.shown);
        var keep    = {};
        visible.forEach(function (el) { keep[items.indexOf(el)] = true; });

        items.forEach(function (el, i) { el.classList.toggle('is-out', !keep[i]); });

        // Cascade : un simple delai, pose en style inline, donc rien a animer.
        visible.forEach(function (el, i) {
            el.style.animationDelay = (Math.min(i, 14) * 0.035) + 's';
        });

        var rest = list.length - visible.length;
        moreWrap.hidden = rest <= 0;
        if (rest > 0) { moreCnt.textContent = '(' + rest + ' ' + PHOTOS + ')'; }

    }

    // Recentrer la pastille active DANS la barre, et uniquement dans la barre.
    // scrollIntoView() remonte toute la chaine des conteneurs defilables : sur la
    // derniere pastille il faisait glisser la section entiere de 169 px vers la
    // gauche, sans moyen de revenir puisque la page masque le debordement
    // horizontal. On calcule donc la position nous-memes.
    function centerChip(chip) {
        var box = document.querySelector('.psh-bar-scroll');
        if (!box || box.scrollWidth <= box.clientWidth) { return; }
        var cr = chip.getBoundingClientRect();
        var br = box.getBoundingClientRect();
        var target = box.scrollLeft + (cr.left - br.left) - (br.width - cr.width) / 2;
        target = Math.max(0, Math.min(target, box.scrollWidth - box.clientWidth));
        if (typeof box.scrollTo === 'function') {
            box.scrollTo({ left: target, behavior: 'smooth' });
        } else {
            box.scrollLeft = target;
        }
    }

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            var f = chip.getAttribute('data-psh-filter');
            if (f === state.filter) { return; }
            chips.forEach(function (c) {
                var on = c === chip;
                c.classList.toggle('is-active', on);
                c.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            state.filter = f;
            state.shown  = BATCH;
            centerChip(chip);
            apply();
        });
    });

    if (moreBtn) {
        moreBtn.addEventListener('click', function () {
            state.shown += BATCH;
            apply();
        });
    }

    // La barre de filtres defile horizontalement quand les 14 pastilles ne
    // tiennent pas : on ne pose le degrade de bord que dans ce cas, sinon il
    // mangerait inutilement la premiere et la derniere pastille.
    var bar    = document.querySelector('.psh-bar');
    var scroll = document.querySelector('.psh-bar-scroll');
    function syncBar() {
        if (!bar || !scroll) { return; }
        bar.classList.toggle('is-scrollable', scroll.scrollWidth > scroll.clientWidth + 2);
    }
    syncBar();
    window.addEventListener('resize', syncBar);

    apply();

    // Seuls le titre et la barre sont animes en JS : ils ne portent pas le
    // contenu, et rien n'est masque par la CSS si GSAP ne se charge pas.
    if (hasGsap && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        gsap.fromTo('.psh-head [data-psh-reveal], .psh-bar',
            { autoAlpha: 0, y: 24 },
            {
                autoAlpha: 1, y: 0, duration: 0.9, ease: 'expo.out', stagger: 0.08,
                scrollTrigger: { trigger: '.psh', start: 'top 80%', once: true }
            });
    }
})();
</script>
<?php endif; ?>

<?php // Videotheque : uniquement sur la page video (service 44 sur ce site), placee comme la galerie photo juste avant "Nos services"
if ($service->getId() == 44) : ?>
<section class="videotheque">
    <div class="discover-video">
                <div class="container">
                    <div class="row">
                    <div class="col-sm-12">
                        <h2 class="sec-title rv d1 fancy-title on mb-5"><?php echo $lang['SVC_SECTION_VIDEOTHEQUE'][$_SESSION['lang']]; ?></h2>
                    </div>
                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 px-0">
                                        <?php $video = $videos_to_discover[0]; ?>
                                        <div class="item-discover-video big-item">
                                            <div class="imgbox">
                                                <a h ref="javascript:void(0)"
                                                    data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                                                    data-fancybox><i class="fab fa-youtube"></i></a>
                                                <img loading="lazy" src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>"
                                                    alt="<?php echo $video->getTitre(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <?php $cpt = 0; ?>
                                            <?php foreach ($videos_to_discover as $video) :
                                                    $cpt++;
                                                    if ($cpt == 1) continue;
                                                ?>
                                            <div class="col-sm-6 px-0">
                                                <div class="item-discover-video">
                                                    <div class="imgbox">
                                                        <a h ref="javascript:void(0)"
                                                            data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                                                            data-fancybox><i class="fab fa-youtube"></i></a>
                                                        <img loading="lazy" src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>"
                                                            alt="<?php echo $video->getTitre(); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mt-5 d-flex justify-content-center">                                        
                                        <a href="<?php echo $pageVideo->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                          <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_DISCOVER_MORE_VIDEOS'][$_SESSION['lang']]; ?></span></div>
                                          <div class="sb-knob"><i class="fal fa-play"></i></div> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
    
</section>
<?php endif; ?>

        <?php if ($svcTexteRest !== '') : ?>
        <div class="service-content">
            <?php echo $svcTexteRest; ?>
        </div>
        <?php endif; ?>

        <div class="container text-center service-cta-box">
            <a href="javascript:void(0)" class="sb sb-compact open-form-service" data-slug="<?php echo $service->getSlug(); ?>" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_CONTACTEZ_NOUS_MAINTENANT'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_CONTACTEZ_NOUS_MAINTENANT'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
            </a>
            <div class="service-form-box col-sm-8 offset-sm-2"></div>
        </div>

        <?php if (!empty($packs)) : ?>
        <section class="pack-section">
        <?php
        switch($service->getId()){
            case 38 : $parag = $lang['SVC_PACK_PARAG_38'][$_SESSION['lang']]; break;
            case 40 : $parag = $lang['SVC_PACK_PARAG_40'][$_SESSION['lang']]; break;
            case 46 : $parag = $lang['SVC_PACK_PARAG_46'][$_SESSION['lang']]; break;
            default : $parag = '';
        }
        ?>
        <?php
        switch($service->getId()){
            case 38 : $note = $lang['SVC_PACK_NOTE_38'][$_SESSION['lang']]; break;
            case 40 : $note = $lang['SVC_PACK_NOTE_40'][$_SESSION['lang']]; break;
            default : $note = $lang['SVC_PACK_NOTE_DEFAULT'][$_SESSION['lang']];
        }
        ?>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h2 class="big-title"><?php echo $lang['SVC_SECTION_DECOUVRIR_PACKS'][$_SESSION['lang']]; ?></h2>
                    <?php echo $parag; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="pack-box">
                <?php foreach ($packs as $pack) : ?>
                <div class="item-pack <?php if($pack->isPopulaire()) echo 'active'; ?>">
                    <?php if($pack->isPopulaire()) echo '<span class="popular"><i class="fa fa-trophy"></i> '.$lang['SVC_PACK_POPULAR'][$_SESSION['lang']].'</span>'; ?>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/<?php echo $pack->getPhoto(); ?>" alt="<?php echo $pack->getTitre(); ?>"></div>
                    <h4><?php echo $pack->getTitre(); ?></h4>
    
                    <div class="textbox">
                        <?php echo $pack->getDetails(); ?>
                    </div>
                    
                    <?php if ($pack->getPrix() != '') : ?>
                    <div class="price">
                        <span><?php echo $lang['SVC_PACK_A_PARTIR_DE'][$_SESSION['lang']]; ?></span><br>
                        <?php echo number_format($pack->getPrix(), 2, ',', ' '); ?> <sup>Dhs</sup>
                        <?php if($service->getId() == 40 || $service->getId() == 46) echo $lang['SVC_PACK_PAR_MOIS'][$_SESSION['lang']]; ?>
                    </div>
                    <?php endif; ?>

                    <a href="#0" class="btn-pack open-form-service" data-slug="<?php echo $service->getSlug(); ?>"><span><?php echo $lang['SVC_CTA_DEMANDER_DEVIS_GRATUIT'][$_SESSION['lang']]; ?></span></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="container">
            <?php if($service->getId())
            ?>
            <div class="note"><strong><?php echo $lang['SVC_PACK_NOTE_LABEL'][$_SESSION['lang']]; ?></strong> : <?php echo $note; ?> <div>
            
        </div>
        </section>
        <?php endif; ?>
        

</div>
</section>
<?php
// Les pages photo (44) et video (148) n affichent pas le bloc "Nos realisations" :
// elles ont leurs propres galeries dediees plus bas dans la page.
$hideWorkSection = in_array((int) $service->getId(), array(44, 148), true);
if (!$hideWorkSection) :
?>
<!-- Realisation-->
<section class="portfolio" id="work">
          <div class="container">
            <div class="sec-label rv">Selected Work</div>
            <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_REALISATIONS'][$_SESSION['lang']]; ?></h2>
            <div class="port-grid rv d2">
              <div class="port-item p-meridian tall">
                <a href="<?php echo $references[0]->getLink(); ?>" class="port-bg">
                  <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[0]->getPhoto(); ?>" alt="<?php echo $references[0]->getNomClient(); ?>">
                </a>
                <div class="port-gfx"></div>
                <div class="port-overlay"></div>
                <a href="<?php echo $references[0]->getLink(); ?>" class="port-arrow"><i class="fas fa-arrow-right"></i></a>
                <div class="port-body">
                  <span class="port-tag"><?php echo $references[0]->getSiteWeb(); ?></span>
                  <h3 class="port-title"><?php echo $references[0]->getNomClient(); ?></h3>
                  <p class="port-sub"><?php echo $references[0]->getExtrait(); ?></p>
                </div>
              </div>
        
              <div class="port-item p-luminis">
                <a href="<?php echo $references[1]->getLink(); ?>" class="port-bg">
                  <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[1]->getPhoto(); ?>" alt="<?php echo $references[1]->getNomClient(); ?>">
                </a>
                <div class="port-gfx"></div>
                <div class="port-overlay"></div>
                <a href="<?php echo $references[1]->getLink(); ?>" class="port-arrow"><i class="fas fa-arrow-right"></i></a>
                <div class="port-body">
                  <span class="port-tag"><?php echo $references[1]->getSiteWeb(); ?></span>
                  <h3 class="port-title"><?php echo $references[1]->getNomClient(); ?></h3>
                  <p class="port-sub"><?php echo $references[1]->getExtrait(); ?></p>
                </div>
              </div>
              <div class="port-item p-corvus">
                <a href="<?php echo $references[2]->getLink(); ?>" class="port-bg">
                  <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[2]->getPhoto(); ?>" alt="<?php echo $references[2]->getNomClient(); ?>">
                </a>
                <div class="port-gfx"></div>
                <div class="port-overlay"></div>
                <a href="<?php echo $references[2]->getLink(); ?>" class="port-arrow"><i class="fas fa-arrow-right"></i></a>
                <div class="port-body">
                  <span class="port-tag"><?php echo $references[2]->getSiteWeb(); ?></span>
                  <h3 class="port-title"><?php echo $references[2]->getNomClient(); ?></h3>
                  <p class="port-sub"><?php echo $references[2]->getExtrait(); ?></p>
                </div>
              </div>
            </div>
          </div>
           <div class="container">
            <div class="col-sm-12 mt-5 text-center">
                <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_VOIR_PLUS_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
                  <div class="sb-knob"><i class="fal fa-trophy"></i></div>
                </a>

                <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_PARLONS_PROJET'][$_SESSION['lang']]; ?></span></div>
                  <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
                </a>
            </div>
        </div>
        </section>
<?php endif; // fin bloc realisations ?>
</section>
<!---->

<!--Galerie photo video service-->


<?php include('includes/testimonials.php'); ?>

<section class="trust" id="trust">
  <div class="trust-head container text-center">
    <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_TECH_TITLE'][$_SESSION['lang']]; ?></h2>
    <p><?php echo $lang['SVC_SECTION_TECH_SUBTITLE'][$_SESSION['lang']]; ?></p>
  </div>
  <div class="trust-rows">

    <!-- Rangée 1 → gauche -->
    <div class="trust-row">
      <div class="trust-inner go-l">
        <?php foreach($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Rangée 2 → droite (direction opposée) -->
    <div class="trust-row">
      <div class="trust-inner go-r">
        <?php foreach($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
<?php if(isset($childServices)): ?>
<section class="service-by-cities">
                <div class="container">
                <h3 class="sec-title rv d1 fancy-title on"><?php echo $lang['SVC_SECTION_PROCHES_DE_VOUS'][$_SESSION['lang']]; ?></h3>
                <div id="owl-services-cities" class="owl-carousel owl-theme">
                <?php foreach($childServices as $subService): ?>
                <div class="item-service-city">
                    <h3><a href="<?php echo $subService->getLink(); ?>"><?php echo $subService->getTitre(); ?></a></h3>
                    <a href="<?php echo $subService->getLink(); ?>"><?php echo $lang['SVC_CTA_EN_SAVOIR_PLUS'][$_SESSION['lang']]; ?> <i class="ti-arrow-right"></i></a>
                </div>
                <?php endforeach; ?>
                </div>
                </div>
    </section>
<?php endif; ?>


<!-- Galerie influenceur -->
<?php if ($service->getId() == 45) : ?>
<section class="influencer-galerie">
   
    <div class="row">
              <div class="col-12 p-0">
                <!-- Start Portfolio -->
                <div class=" mt-5">
                    <div class="cs-portfolio_1_heading">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php $gallery_service = galerie::find(61, $_SESSION['lang']); ?>
                                    <h2 class="sec-title rv d1 fancy-title on mb-5"><?= $gallery_service->getTitre() ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24 mt-3">
                        
                        <?php
                            $photos = galerie_photo::findAllByGalerie($_SESSION['lang'], $gallery_service->getId());
                            foreach ($photos as $photo) : ?>
                        <div class="cs-isotop_item col-12 col-md-4">
                            <div class="div-gallery-photo">
                                <div class="hover-box">
                                    <?php if ($photo->getDesc1()) : ?>
                                    <h4>
                                        <?= $photo->getDesc1() ?><?php echo $lang['SVC_SUFFIX_ABONNES'][$_SESSION['lang']]; ?>
                                    </h4>
                                    <?php endif; ?>

                                    <?php if ($photo->getDesc2()) : ?>
                                    <p><?= $photo->getDesc2() ?></p>
                                    <?php endif; ?>
                                </div>
                                <img src="<?= 'https://www.helloworld-agency.com/images/galerie/' . $photo->getPhoto(); ?>" alt="<?= $photo->getTitre(); ?>" class="">
                                <a h ref="javascript:void(0)"
                                    data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>"
                                    data-fancybox="gallery-market"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="cs-height_90 cs-height_lg_40"></div>
                </div>
                <!-- End Portfolio -->
            </div>
         </div>
</section>
<?php endif; ?>
<!---->

<!---->
<section class="trust" id="trust">
      <div class="trust-head container">
        <div class="sec-label rv"><?php echo $lang['SVC_SECTION_PARTENAIRES_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_PARTENAIRES_TITLE'][$_SESSION['lang']]; ?></h2>
      </div>
      <div class="trust-rows">
    
        <!-- Rangée 1 → gauche -->
        <div class="trust-row">
          <div class="trust-inner go-l">
            <?php foreach ($partners as $partner): ?>
              <div class="trust-item">
                <img class="img-partner" src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    
        <!-- Rangée 2 → droite (direction opposée) -->
        <div class="trust-row">
          <div class="trust-inner go-r">
            <?php foreach ($partners2 as $partner): ?>
              <div class="trust-item">
                <img class="img-partner" src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    
      </div>
    </section>

<section class="faq" id="faq">
  <div class="container">
    <div class="sec-label rv"><?php echo $lang['SVC_SECTION_FAQ_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_FAQ_TITLE'][$_SESSION['lang']]; ?></h2>
    <div class="faq-cols rv d2">
      <div>
        <div class="faq-list">
          <?php foreach($faqs as $faq): ?>
          <div class="faq-item">
            <button class="faq-btn">
              <span class="faq-q"><?php echo $faq->getTitre(); ?></span>
              <span class="faq-ico"><i class="fa fa-plus"></i></span>
            </button>
            <div class="faq-body">
              <p class="faq-ans"><?php echo strip_tags($faq->getTexte()); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <div class="faq-list">
          <?php foreach($faqs2 as $faq): ?>
          <div class="faq-item">
            <button class="faq-btn">
              <span class="faq-q"><?php echo $faq->getTitre(); ?></span>
              <span class="faq-ico"><i class="fa fa-plus"></i></span>
            </button>
            <div class="faq-body">
              <p class="faq-ans"><?php echo strip_tags($faq->getTexte()); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal / Demo -->
<div class="modal fade" id="serviceModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><?php echo $btnText; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom purple" data-dismiss="modal"><span><?php echo $lang['SVC_MODAL_FERMER'][$_SESSION['lang']]; ?></span></button>
				<button type="button" class="btn btn-custom send-form"><span><?php echo $lang['SVC_MODAL_ENVOYER'][$_SESSION['lang']]; ?></span></button>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script>
    var acc = document.getElementsByClassName("accordion-faq");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            var icon = this.querySelector(".icon");

            // Toggle the panel visibility
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus"); // Change icon to "+"
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus"); // Change icon to "-"
            }
        });

    }
</script>
<script type="text/javascript">
//     $(document).ready(function() {

//         // Vérifier si le popup a déjà été affiché dans la session
//         if (!sessionStorage.getItem("popupShown")) {

//             setTimeout(function() {
//                 $("#realisation-popup").modal("show");

//                 // Marquer le popup comme affiché
//                 sessionStorage.setItem("popupShown", "true");
//             }, 3000);

//         }

//     });
</script>

<script>

// 		$(document).ready(function (){
// 			$('#picker2').dateTimePicker({
// 				dateFormat: "DD/MM/YYYY HH:mm",
// 				locale: 'fr'
// 			});
//         });


</script>

<script>
document.addEventListener('click', function(e){
	var btn = e.target.closest('.open-form-service');
	if(!btn) return;
	var order = 'slug=' + btn.getAttribute('data-slug');
	jQuery.post("<?php echo $siteURL; ?>components/com_service/controleurs/router.php?task=getForm", order, function (theResponse) {
		var box = document.querySelector(".service-form-box");
		jQuery(box).html(theResponse);
		if (window.gsap) {
			gsap.fromTo(box, {autoAlpha: 0, y: 30}, {autoAlpha: 1, y: 0, duration: .7, ease: 'power2.out'});
		} else {
			jQuery(box).slideDown();
		}
		jQuery("html, body").animate({scrollTop: jQuery(".service-form-box").offset().top - 100}, 1000);
	})
})
</script>