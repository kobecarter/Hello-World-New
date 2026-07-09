
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
        <h1 class="sh-h1 rv d1">Des projets <em>concrets</em>, visibles, performants</h1>
        <p class="sh-sub rv d2"><?php echo strip_tags($page->getExtrait()); ?></p>

        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un devis" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander un devis</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
        
            <a href="#rlGrid" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir un cas similaire au vôtre" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir un cas similaire au vôtre</span></div>
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
      <button class="rl-filter-btn active" data-filter="all">Tous</button>
      <button class="rl-filter-btn" data-filter="web">Web &amp; Mobile</button>
      <button class="rl-filter-btn" data-filter="ia">Intelligence Artificielle</button>
      <button class="rl-filter-btn" data-filter="saas">SaaS &amp; Produits</button>
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
          <span class="rl-ov-cta">Voir le projet <i class="fa fa-arrow-right fa-xs"></i></span>
        </div>
      </a>
	<?php endforeach; ?>

    </div>

    <!-- STATS STRIP -->
    <div class="rl-strip rv">
      <div class="rl-strip-item">
        <div class="rl-strip-val">900<span>+</span></div>
        <div class="rl-strip-lbl">Projets livrés</div>
      </div>
      <div class="rl-strip-item">
        <div class="rl-strip-val">16<span>ans</span></div>
        <div class="rl-strip-lbl">D'expertise</div>
      </div>
      <div class="rl-strip-item">
        <div class="rl-strip-val">10<span> villes</span></div>
        <div class="rl-strip-lbl">Studios actifs</div>
      </div>
      <div class="rl-strip-item">
        <div class="rl-strip-val">98<span>%</span></div>
        <div class="rl-strip-lbl">Clients satisfaits</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Votre projet</div>
    <h2 class="sec-title">Construisons<br><em>ensemble</em></h2>
    <p class="cta-sub">Brief gratuit · Audit offert · Première réunion sous 48h.</p>
    <div class="cta-btns">
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Démarrer un projet" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Démarrer un projet</span></div>
          <div class="sb-knob"><i class="fal fa-suitcase"></i></div>
        </a>
    
        <a href="<?php echo $pageBlog->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Lire nos insights" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Lire nos insights</span></div>
          <div class="sb-knob"><i class="fal fa-eye"></i></div> 
        </a>
    </div>
  </div>
</section>