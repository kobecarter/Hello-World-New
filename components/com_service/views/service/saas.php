
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
        <div class="sh-breadcrumb"><?php echo $service->getTitre() ?></div>
        <h1 class="sh-h1"><?php echo $service->getH1() ?></h1>
        <p class="sh-sub"><?php echo strip_tags($service->getExtrait()); ?></p>
      
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>

            <a href="#offres" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_VOIR_OFFRES'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_VOIR_OFFRES'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div>
            </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3 wm-hero-side-banner">
        <img src="<?php echo $siteURL; ?>images/services/<?php echo $service->getPhotoHero() ?>" alt="<?php echo $service->getTitre() ?>">
      </div>
    </div>
  </div>
</section>

<!-- ══ MARQUEE — visible after hero unpins ═════════════════════ -->
<div class="mq" id="mq"><div class="mq-t">
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span><?php echo $lang['MQ2_WEB_MOBILE'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?php echo $lang['MQ2_SOLUTIONS_IA'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?php echo $lang['MQ2_SAAS_PRODUITS'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?php echo $lang['MQ2_BRAND_EXPERIENCE'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?php echo $lang['MQ2_DEPLOIEMENTS'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?php echo $lang['MQ2_ROI'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?php echo $lang['MQ2_DIGITAL_AGENCY'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span><?php echo $lang['MQ2_WEB_MOBILE'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?php echo $lang['MQ2_SOLUTIONS_IA'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?php echo $lang['MQ2_SAAS_PRODUITS'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?php echo $lang['MQ2_BRAND_EXPERIENCE'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?php echo $lang['MQ2_DEPLOIEMENTS'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?php echo $lang['MQ2_ROI'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?php echo $lang['MQ2_DIGITAL_AGENCY'][$_SESSION['lang']]; ?></span>
</div></div>

<!-- OFFERINGS -->
<section class="sp-offers" id="offres">
  <div class="container">
    <div class="sec-label"><?php echo $lang['SAAS_OFFERS_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv"><?php echo $lang['SAAS_OFFERS_TITLE'][$_SESSION['lang']]; ?></h2>
    <div class="sp-offer-grid">
      <div class="sp-offer sp-offer-1 rv">
        <div class="sp-offer-visual">
         <img src="<?php echo $siteURL; ?>images/saas-mvp.webp" alt="MVP SaaS">
        </div>
        <div class="sp-offer-body">
          <span class="sp-offer-tag"><?php echo $lang['SAAS_OFFER1_TAG'][$_SESSION['lang']]; ?></span>
          <div class="sp-offer-title"><?php echo $lang['SAAS_OFFER1_TITLE'][$_SESSION['lang']]; ?></div>
          <p class="sp-offer-desc"><?php echo $lang['SAAS_OFFER1_DESC'][$_SESSION['lang']]; ?></p>
          <ul class="sp-offer-feats">
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER1_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER1_FEAT2'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER1_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER1_FEAT4'][$_SESSION['lang']]; ?></li>
          </ul>
        </div>
      </div>

      <div class="sp-offer sp-offer-2 rv d1">
        <div class="sp-offer-visual">
         <img src="<?php echo $siteURL; ?>images/platform-metier.webp" alt="Plateformes métiers">
        </div>
        <div class="sp-offer-body">
          <span class="sp-offer-tag"><?php echo $lang['SAAS_OFFER2_TAG'][$_SESSION['lang']]; ?></span>
          <div class="sp-offer-title"><?php echo $lang['SAAS_OFFER2_TITLE'][$_SESSION['lang']]; ?></div>
          <p class="sp-offer-desc"><?php echo $lang['SAAS_OFFER2_DESC'][$_SESSION['lang']]; ?></p>
          <ul class="sp-offer-feats">
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER2_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER2_FEAT2'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER2_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER2_FEAT4'][$_SESSION['lang']]; ?></li>
          </ul>
        </div>
      </div>

      <div class="sp-offer sp-offer-3 rv d2">
        <div class="sp-offer-visual">
         <img src="<?php echo $siteURL; ?>images/Dashboards_analytics.webp" alt="Dashboards analytics">
        </div>
        <div class="sp-offer-body">
          <span class="sp-offer-tag"><?php echo $lang['SAAS_OFFER3_TAG'][$_SESSION['lang']]; ?></span>
          <div class="sp-offer-title"><?php echo $lang['SAAS_OFFER3_TITLE'][$_SESSION['lang']]; ?></div>
          <p class="sp-offer-desc"><?php echo $lang['SAAS_OFFER3_DESC'][$_SESSION['lang']]; ?></p>
          <ul class="sp-offer-feats">
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER3_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER3_FEAT2'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER3_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="sp-offer-feat"><?php echo $lang['SAAS_OFFER3_FEAT4'][$_SESSION['lang']]; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- METHODOLOGY -->
<section class="sp-method">
  <div class="container">
    <div class="sec-label"><?php echo $lang['SAAS_METHOD_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv"><?php echo $lang['SAAS_METHOD_TITLE'][$_SESSION['lang']]; ?></h2>
    <div class="sp-method-grid">
      <div class="sp-step rv">
        <span class="sp-step-num">01</span>
        <div class="sp-step-title"><?php echo $lang['SAAS_STEP1_TITLE'][$_SESSION['lang']]; ?></div>
        <p class="sp-step-desc"><?php echo $lang['SAAS_STEP1_DESC'][$_SESSION['lang']]; ?></p>
      </div>
      <div class="sp-step rv d1">
        <span class="sp-step-num">02</span>
        <div class="sp-step-title"><?php echo $lang['SAAS_STEP2_TITLE'][$_SESSION['lang']]; ?></div>
        <p class="sp-step-desc"><?php echo $lang['SAAS_STEP2_DESC'][$_SESSION['lang']]; ?></p>
      </div>
      <div class="sp-step rv d2">
        <span class="sp-step-num">03</span>
        <div class="sp-step-title"><?php echo $lang['SAAS_STEP3_TITLE'][$_SESSION['lang']]; ?></div>
        <p class="sp-step-desc"><?php echo $lang['SAAS_STEP3_DESC'][$_SESSION['lang']]; ?></p>
      </div>
      <div class="sp-step rv d3">
        <span class="sp-step-num">04</span>
        <div class="sp-step-title"><?php echo $lang['SAAS_STEP4_TITLE'][$_SESSION['lang']]; ?></div>
        <p class="sp-step-desc"><?php echo $lang['SAAS_STEP4_DESC'][$_SESSION['lang']]; ?></p>
      </div>
    </div>
  </div>
</section>

<section class="portfolio" id="work">
  <div class="container">
    <div class="sec-label rv"><?php echo $lang['SVC_SECTION_CAS_UTILISATION'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_REALISATIONS'][$_SESSION['lang']]; ?></h2>
    <div class="port-grid rv d2">
      <div class="port-item p-meridian tall">
        <a href="<?php echo $references[0]->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[0]->getPhoto(); ?>" alt="<?php echo $references[0]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $references[0]->getLink(); ?>" class="port-arrow"><i class="fal fa-arrow-right"></i></a>
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
        <a href="<?php echo $references[1]->getLink(); ?>" class="port-arrow"><i class="fal fa-arrow-right"></i></a>
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
        <a href="<?php echo $references[2]->getLink(); ?>" class="port-arrow"><i class="fal fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $references[2]->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $references[2]->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $references[2]->getExtrait(); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STACK -->
<section class="sp-stack">
  <div class="container">
    <div class="sec-label"><?php echo $lang['SAAS_STACK_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv"><?php echo $lang['SAAS_STACK_TITLE'][$_SESSION['lang']]; ?></h2>
    <div class="sp-stack-grid">
      <div class="sp-tech rv"><i class="fab fa-react sp-tech-icon"></i><span class="sp-tech-name">React</span></div>
      <div class="sp-tech rv d1"><span class="sp-tech-icon" style="font-size:1.1rem">Next.js</span><span class="sp-tech-name">Next.js</span></div>
      <div class="sp-tech rv d2"><i class="fab fa-node-js sp-tech-icon"></i><span class="sp-tech-name">Node.js</span></div>
      <div class="sp-tech rv d3"><span class="sp-tech-icon">PG</span><span class="sp-tech-name">PostgreSQL</span></div>
      <div class="sp-tech rv"><i class="fab fa-python sp-tech-icon"></i><span class="sp-tech-name">Python</span></div>
      <div class="sp-tech rv d1"><i class="fab fa-aws sp-tech-icon"></i><span class="sp-tech-name">AWS</span></div>
      <div class="sp-tech rv d2"><i class="fab fa-docker sp-tech-icon"></i><span class="sp-tech-name">Docker</span></div>
      <div class="sp-tech rv d3"><span class="sp-tech-icon">K8s</span><span class="sp-tech-name">Kubernetes</span></div>
      <div class="sp-tech rv"><span class="sp-tech-icon">TS</span><span class="sp-tech-name">TypeScript</span></div>
      <div class="sp-tech rv d1"><i class="fab fa-github sp-tech-icon"></i><span class="sp-tech-name">GitHub</span></div>
      <div class="sp-tech rv d2"><span class="sp-tech-icon" style="font-size:1rem">Redis</span><span class="sp-tech-name">Redis</span></div>
      <div class="sp-tech rv d3"><i class="fab fa-stripe sp-tech-icon"></i><span class="sp-tech-name">Stripe</span></div>
    </div>
  </div>
</section>
<!-- ══ CTA FINAL ══════════════════════════════════════════════════════════ -->
<section class="hw-f-list-cta-final cta-hw-final">
  <video class="hw-f-list-cta-final-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
    <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
  </video>
  <div class="hw-f-list-cta-final-scrim"></div>
  <div class="container">
    <div class="sec-label rv"><?php echo $lang['SAAS_CTA_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['SAAS_CTA_TITLE'][$_SESSION['lang']]; ?></h2>
    <p class="hw-f-list-cta-sub rv d2"><?php echo $lang['SAAS_CTA_SUB'][$_SESSION['lang']]; ?></p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint"><?php echo $lang['SAAS_CTA_BTN1'][$_SESSION['lang']]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
        <a href="#offres" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['SAAS_CTA_BTN2'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint"><?php echo $lang['SAAS_CTA_BTN2'][$_SESSION['lang']]; ?></span></div>
          <div class="sb-knob"><i class="fal fa-shopping-basket"></i></div>
        </a>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>