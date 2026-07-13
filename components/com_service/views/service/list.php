<?php $banner = $page->getPhoto() == "" ? "images/banner.jpg" : "images/pages/".$page->getPhoto(); ?>

<?php $banner = "images/agencies.png"; ?>
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
        <div class="wm-hero-label"><?php echo $page->getTitre() ?></div>
        <h1 class="sh-h1 rv"><?php echo $lang['SVC_LIST_H1'][$_SESSION['lang']]; ?></h1>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($page->getExtrait()); ?></p>
        <div class="sh-cta-row">
              <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_LIST_CTA_AUDIT_ARIA'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_LIST_CTA_AUDIT'][$_SESSION['lang']]; ?></span> </div>
                  <div class="sb-knob"><i class="fal fa-bolt"></i></div>
                </a>

                <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_LIST_CTA_RECEVOIR_AUDIT_ARIA'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_VOIR_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
                  <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
                </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3">
        <img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $page->getTitre() ?>">
      </div>
    </div>
  </div>
</section>
<div class="marquee">
  <div class="marquee-track">
    <span class="mq-item"><?php echo $lang['MQ_SITES_SUR_MESURE'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_APPS_IOS_ANDROID'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_PORTAILS_CLIENTS'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_UX_UI_DESIGN'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_PERFORMANCE_SEO'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_IA_INTEGREE'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_ANALYTICS'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_SITES_SUR_MESURE'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_APPS_IOS_ANDROID'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_PORTAILS_CLIENTS'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_UX_UI_DESIGN'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_PERFORMANCE_SEO'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_IA_INTEGREE'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
    <span class="mq-item"><?php echo $lang['MQ_ANALYTICS'][$_SESSION['lang']]; ?><span class="mq-dot"></span></span>
  </div>
</div>

<section class="services" id="services">
  <div class="container">
    <div class="services-header">
      <div>
        <div class="sec-label rv"><?php echo $lang['SVC_LIST_SECTION_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv d1"><?php echo $lang['SVC_LIST_SECTION_TITLE'][$_SESSION['lang']]; ?></h2>
      </div>
    </div>
    <div class="svc-grid rv d1">
      <?php $cpt = 0; ?>
      <?php foreach($services as $service): ?>
      <?php $cpt++; ?>  
      <div class="svc-card">
        <a href="#0">
        <div class="svc-num">0<?php echo $cpt; ?></div>
        <div class="svc-icon"><svg width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="1" width="14" height="22" rx="2.5"/><path d="M9 4h6"/><rect x="8" y="7" width="8" height="5" rx=".8"/><path d="M8 15h5M8 18h8"/><circle cx="12" cy="21" r=".8"/></svg></div>
        <h3 class="svc-name"><?php echo $service->getTitre(); ?></h3>
        <p class="svc-desc"><?php echo strip_tags($service->getTexteAccueil()); ?></p>
        <a href="<?php echo $service->getLink(); ?>" class="svc-more"><?php echo $lang['SVC_CTA_EN_SAVOIR_PLUS'][$_SESSION['lang']]; ?> <i class="fa fa-arrow-right fa-xs"></i></a>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

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
            <div class="col-sm-12 mt-4 text-center">
                <a href="<?php echo $pageReference->getLink(); ?>" class="btn-hw"><?php echo $lang['SVC_CTA_VOIR_PLUS_REALISATIONS'][$_SESSION['lang']]; ?></a>
            </div>
        </div>
        </section>

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


<?php include('includes/testimonials.php'); ?>

