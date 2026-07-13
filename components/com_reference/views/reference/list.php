
<!-- HERO -->
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
        <div class="sh-breadcrumb rv"><?php echo $page->getTitre() ?></div>
        <h1 class="sh-h1 rv d1"><?php echo !empty($page->getH1()) ? $page->getH1() : $page->getTitre(); ?></h1>
        <p class="sh-sub rv d2"><?php echo strip_tags($page->getExtrait()); ?></p>

        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['REF_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['REF_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>

            <a href="#rlGrid" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['REF_CTA_VOIR_CAS_SIMILAIRE'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['REF_CTA_VOIR_CAS_SIMILAIRE'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-suitcase"></i></div> 
            </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3">
        <img src="<?php echo $siteURL; ?>images/pages/<?php echo $page->getPhoto() ?>" alt="">
      </div>
    </div>
  </div>
</section>

<!-- FILTER -->
<div class="rl-filter-wrap">
  <div class="container" style="padding:0">
    <div class="rl-filter-inner">
      <button class="rl-filter-btn active" data-filter="all"><?php echo $lang['REF_FILTER_TOUS'][$_SESSION['lang']]; ?></button>
      <button class="rl-filter-btn" data-filter="web">Web &amp; Mobile</button>
      <button class="rl-filter-btn" data-filter="ia"><?php echo $lang['REF_FILTER_IA'][$_SESSION['lang']]; ?></button>
      <button class="rl-filter-btn" data-filter="saas"><?php echo $lang['MQ2_SAAS_PRODUITS'][$_SESSION['lang']]; ?></button>
      <button class="rl-filter-btn" data-filter="brand">Brand Experience</button>
      <button class="rl-filter-btn" data-filter="marketplace">Marketplace</button>
    </div>
  </div>
</div>

<!-- GRID -->
<section class="rl-section">
  <div class="container">
    <div class="rl-grid" id="rlGrid">

	<?php foreach($references as $reference): ?>
      <!-- 1 — Orbital SaaS (big feature) -->
      <a href="<?php echo $reference->getLink(); ?>" class="rl-card" data-cat="web saas">
        <div class="rl-img-wrap" style="background:linear-gradient(160deg,#081428 0%,#0d2545 55%,#152d56 100%)">
			<img src="<?php echo $siteURL; ?>images/references/<?php echo $reference->getPhoto(); ?>" alt="<?php echo $reference->getNomClient(); ?>">
          <span class="rl-ghost-label"><?php echo $reference->getNomClient(); ?></span>
        </div>
        <div class="rl-card-info">
          <div class="rl-card-name"><?php echo $reference->getNomClient(); ?></div>
        </div>
        <div class="rl-overlay">
          <div class="rl-ov-tag"><?php echo $reference->getSiteWeb(); ?></div>
          <div class="rl-ov-title"><?php echo $reference->getNomClient(); ?></div>
          <p class="rl-ov-desc"><?php echo $reference->getExtrait(); ?></p>
          <span class="rl-ov-cta"><?php echo $lang['REF_CARD_VOIR_PROJET'][$_SESSION['lang']]; ?> <i class="fa fa-arrow-right fa-xs"></i></span>
        </div>
      </a>
	<?php endforeach; ?>

    </div>

    <!-- STATS STRIP -->
    <div class="rl-strip rv">
      <div class="rl-strip-item">
        <div class="rl-strip-val">900<span>+</span></div>
        <div class="rl-strip-lbl"><?php echo $lang['REF_STRIP_PROJETS'][$_SESSION['lang']]; ?></div>
      </div>
      <div class="rl-strip-item">
        <div class="rl-strip-val">16<span>ans</span></div>
        <div class="rl-strip-lbl"><?php echo $lang['REF_STRIP_EXPERTISE'][$_SESSION['lang']]; ?></div>
      </div>
      <div class="rl-strip-item">
        <div class="rl-strip-val">10<span><?php echo $lang['REF_STRIP_VILLES'][$_SESSION['lang']]; ?></span></div>
        <div class="rl-strip-lbl"><?php echo $lang['REF_STRIP_STUDIOS'][$_SESSION['lang']]; ?></div>
      </div>
      <div class="rl-strip-item">
        <div class="rl-strip-val">98<span>%</span></div>
        <div class="rl-strip-lbl"><?php echo $lang['REF_STRIP_CLIENTS'][$_SESSION['lang']]; ?></div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label"><?php echo $lang['REF_CTA_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title"><?php echo $lang['REF_CTA_TITLE'][$_SESSION['lang']]; ?></h2>
    <p class="cta-sub"><?php echo $lang['REF_CTA_SUB'][$_SESSION['lang']]; ?></p>
    <div class="cta-btns">
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['REF_CTA_DEMARRER_PROJET'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint"><?php echo $lang['REF_CTA_DEMARRER_PROJET'][$_SESSION['lang']]; ?></span></div>
          <div class="sb-knob"><i class="fal fa-suitcase"></i></div>
        </a>

        <a href="<?php echo $pageBlog->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['REF_CTA_LIRE_INSIGHTS'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint"><?php echo $lang['REF_CTA_LIRE_INSIGHTS'][$_SESSION['lang']]; ?></span></div>
          <div class="sb-knob"><i class="fal fa-eye"></i></div> 
        </a>
    </div>
  </div>
</section>