



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
        <div class="sh-breadcrumb rv"><?php echo $service->getTitre() ?></div>
          <h1 class="sh-h1 rv d1"><?php echo $service->getH1() ?></h1>
          <p class="sh-sub rv d2"><?php echo strip_tags($service->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>

            <a href="#services" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_VOIR_OFFRES'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
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

<!-- MARQUEE -->
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

<!-- SERVICES -->
<section class="wm-services hw-f-list-catalogue" id="services">
  <div class="container">
    <div class="sec-label rv"><?php echo $lang['SAAS_OFFERS_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['WM_SERVICES_TITLE'][$_SESSION['lang']]; ?></h2>
    <div class="hw-f-list-track-hint rv d2"><i class="fal fa-arrows-left-right"></i> <?php echo $lang['BRAND_SERVICES_HINT_PREFIX'][$_SESSION['lang']]; ?> <?= count($childServices); ?> <?php echo $lang['BRAND_SERVICES_HINT_SUFFIX'][$_SESSION['lang']]; ?></div>
  </div>

  <?php if (!empty($childServices)):
    $wmIcons = ['fa-globe','fa-mobile-alt','fa-search','fa-user-shield'];
  ?>
  <div class="hw-f-list-pin" id="wmServicesPin">
    <div class="hw-f-list-track" id="wmServicesTrack">
      <div class="hw-f-list-track-spacer" id="wmServicesSpacerStart" aria-hidden="true"></div>
      <?php foreach($childServices as $index => $childService):
        $icon   = $wmIcons[$index % count($wmIcons)];
        $isGold = $index % 2 === 0;
      ?>
      <a class="hw-f-list-card-3d" href="<?= $childService->getLink(); ?>">
        <?php if ($childService->getPhoto()): ?>
        <div class="hw-f-list-card-3d-photo">
          <img src="<?= $siteURL; ?>images/services/<?= htmlspecialchars($childService->getPhoto(), ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($childService->getTitre(), ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
          <span class="hw-f-list-card-badge <?= $isGold ? 'gold' : 'purple'; ?>"><?php echo $lang['WM_CARD_BADGE'][$_SESSION['lang']]; ?></span>
        </div>
        <?php endif; ?>
        <div class="hw-f-list-card-3d-body">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,<?= $isGold ? 'rgba(9,161,190,.1)' : 'rgba(104,2,98,.08)'; ?>,<?= $isGold ? 'rgba(9,161,190,.05)' : 'rgba(104,2,98,.04)'; ?>);border:1px solid <?= $isGold ? 'rgba(9,161,190,.2)' : 'rgba(104,2,98,.18)'; ?>">
            <i class="fal <?= $icon; ?>" style="color:<?= $isGold ? '#09A1BE' : '#680262'; ?>;font-size:.95rem"></i>
          </div>
          <div class="hw-f-list-card-title"><?= htmlspecialchars($childService->getTitre(), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-sub"><?= htmlspecialchars(mb_strimwidth(html_entity_decode(strip_tags($childService->getExtrait() ?? ''), ENT_QUOTES, 'UTF-8'), 0, 120, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-cta"><?php echo $lang['SVC_CTA_DECOUVRIR'][$_SESSION['lang']]; ?> <i class="fal fa-arrow-right"></i></div>
        </div>
      </a>
      <?php endforeach; ?>
      <div class="hw-f-list-track-spacer" id="wmServicesSpacerEnd" aria-hidden="true"></div>
    </div>
  </div>
  <?php endif; ?>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/service.js"></script>
<section class="portfolio" id="work">
  <div class="container">
    <div class="sec-label rv"><?php echo $lang['SVC_SECTION_CAS_UTILISATION'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_REALISATIONS'][$_SESSION['lang']]; ?></h2>
    <div class="port-grid rv d2">
      <div class="port-item p-meridian tall">
        <a href="<?php echo $mr_brico->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $mr_brico->getPhoto(); ?>" alt="<?php echo $references[0]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $mr_brico->getLink(); ?>" class="port-arrow"><i class="fal fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $mr_brico->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $mr_brico->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $mr_brico->getExtrait(); ?></p>
        </div>
      </div>

      <div class="port-item p-luminis">
        <a href="<?php echo $ljs->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $ljs->getPhoto(); ?>" alt="<?php echo $ljs->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $ljs->getLink(); ?>" class="port-arrow"><i class="fal fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $ljs->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $ljs->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $ljs->getExtrait(); ?></p>
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

<!-- APPROACH -->
<section class="wm-approach">
  <div class="container">
    <div>  
        <div class="sec-label"><?php echo $lang['WM_APPROACH_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv"><?php echo $lang['WM_APPROACH_TITLE'][$_SESSION['lang']]; ?></h2>
    </div>
    <div class="wm-approach-grid">
      <div class="wm-approach-visual rv">
        <div class="wm-approach-gfx" aria-hidden="true">UX</div>
        <div class="wm-approach-badge">
          <div class="wm-badge-icon"><i class="fa fa-bolt fa-xs"></i></div>
          <div class="wm-badge-text">
            <strong><?php echo $lang['WM_PERF_GARANTIE_TITLE'][$_SESSION['lang']]; ?></strong>
            <span><?php echo $lang['WM_PERF_GARANTIE_SUB'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
      </div>
      <div>

        <p class="wm-approach-intro rv d1"><?php echo $lang['WM_APPROACH_INTRO'][$_SESSION['lang']]; ?></p>
        <ul class="wm-feat-list rv d2">
          <li class="wm-feat-item">
            <div class="wm-feat-ico"><i class="fas fa-mobile-alt"></i></div>
            <div class="wm-feat-info">
              <strong><?php echo $lang['WM_FEAT1_TITLE'][$_SESSION['lang']]; ?></strong>
              <span><?php echo $lang['WM_FEAT1_DESC'][$_SESSION['lang']]; ?></span>
            </div>
          </li>
          <li class="wm-feat-item">
            <div class="wm-feat-ico"><i class="fas fa-tachometer-alt"></i></div>
            <div class="wm-feat-info">
              <strong><?php echo $lang['WM_FEAT2_TITLE'][$_SESSION['lang']]; ?></strong>
              <span><?php echo $lang['WM_FEAT2_DESC'][$_SESSION['lang']]; ?></span>
            </div>
          </li>
          <li class="wm-feat-item">
            <div class="wm-feat-ico"><i class="fa fa-chart-bar"></i></div>
            <div class="wm-feat-info">
              <strong><?php echo $lang['WM_FEAT3_TITLE'][$_SESSION['lang']]; ?></strong>
              <span><?php echo $lang['WM_FEAT3_DESC'][$_SESSION['lang']]; ?></span>
            </div>
          </li>
          <li class="wm-feat-item">
            <div class="wm-feat-ico"><i class="fa fa-robot"></i></div>
            <div class="wm-feat-info">
              <strong><?php echo $lang['WM_FEAT4_TITLE'][$_SESSION['lang']]; ?></strong>
              <span><?php echo $lang['WM_FEAT4_DESC'][$_SESSION['lang']]; ?></span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="wm-stats">
  <div class="container">
    <div class="wm-stats-grid">
      <div class="wm-stat rv">
        <div class="wm-stat-num">120<span class="wm-stat-suf">+</span></div>
        <div class="wm-stat-lbl"><?php echo $lang['WM_STAT1_LBL'][$_SESSION['lang']]; ?></div>
      </div>
      <div class="wm-stat rv d1">
        <div class="wm-stat-num">97<span class="wm-stat-suf">%</span></div>
        <div class="wm-stat-lbl"><?php echo $lang['WM_STAT2_LBL'][$_SESSION['lang']]; ?></div>
      </div>
      <div class="wm-stat rv d2">
        <div class="wm-stat-num">3.2<span class="wm-stat-suf">x</span></div>
        <div class="wm-stat-lbl"><?php echo $lang['WM_STAT3_LBL'][$_SESSION['lang']]; ?></div>
      </div>
      <div class="wm-stat rv d3">
        <div class="wm-stat-num">48<span class="wm-stat-suf">h</span></div>
        <div class="wm-stat-lbl"><?php echo $lang['WM_STAT4_LBL'][$_SESSION['lang']]; ?></div>
      </div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="sdtl-section" id="process">
  <div class="sdtl-orb-wrap"><div class="sdtl-orb" id="wmOrb"><div class="sdtl-orb-ring r1"></div><div class="sdtl-orb-ring r2"></div><div class="sdtl-orb-ring r3"></div><div class="sdtl-orb-ring r4"></div></div></div>
  <div class="container">
    <div class="sdtl-header">
      <div class="sec-label"><?php echo $lang['WM_PROCESS_LABEL'][$_SESSION['lang']]; ?></div>
      <h2 class="sec-title rv"><?php echo $lang['WM_PROCESS_TITLE'][$_SESSION['lang']]; ?></h2>
      <p class="sdtl-intro rv d1"><?php echo $lang['WM_PROCESS_INTRO'][$_SESSION['lang']]; ?></p>
    </div>
    <div class="sdtl-timeline" id="wmTimeline">
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="wmSpineFill"></div></div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title"><?php echo $lang['WM_STEP1_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['WM_STEP1_DESC'][$_SESSION['lang']]; ?></p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span><?php echo $lang['WM_STEP1_LI1'][$_SESSION['lang']]; ?></span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span><?php echo $lang['WM_STEP1_LI2'][$_SESSION['lang']]; ?></span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span><?php echo $lang['WM_STEP1_LI3'][$_SESSION['lang']]; ?></span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag"><?php echo $lang['WM_STEP1_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-compass"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword"><?php echo $lang['WM_KEYWORD_DISCOVERY'][$_SESSION['lang']]; ?></div></div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword"><?php echo $lang['WM_KEYWORD_DESIGN'][$_SESSION['lang']]; ?></div></div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-swatchbook"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">2</div>
            <div class="sdtl-title"><?php echo $lang['WM_STEP2_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['WM_STEP2_DESC'][$_SESSION['lang']]; ?></p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span><?php echo $lang['WM_STEP2_LI1'][$_SESSION['lang']]; ?></span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span><?php echo $lang['WM_STEP2_LI2'][$_SESSION['lang']]; ?></span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span><?php echo $lang['WM_STEP2_LI3'][$_SESSION['lang']]; ?></span></div>
            </div>
            <span class="sdtl-tag"><?php echo $lang['WM_STEP2_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title"><?php echo $lang['WM_STEP3_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['WM_STEP3_DESC'][$_SESSION['lang']]; ?></p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span><?php echo $lang['WM_STEP3_LI1'][$_SESSION['lang']]; ?></span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span><?php echo $lang['WM_STEP3_LI2'][$_SESSION['lang']]; ?></span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span><?php echo $lang['WM_STEP3_LI3'][$_SESSION['lang']]; ?></span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag"><?php echo $lang['WM_STEP3_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-code"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword"><?php echo $lang['WM_KEYWORD_DEV'][$_SESSION['lang']]; ?></div></div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword"><?php echo $lang['WM_KEYWORD_LAUNCH'][$_SESSION['lang']]; ?></div></div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-rocket"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">4</div>
            <div class="sdtl-title"><?php echo $lang['WM_STEP4_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['WM_STEP4_DESC'][$_SESSION['lang']]; ?></p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span><?php echo $lang['WM_STEP4_LI1'][$_SESSION['lang']]; ?></span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span><?php echo $lang['WM_STEP4_LI2'][$_SESSION['lang']]; ?></span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span><?php echo $lang['WM_STEP4_LI3'][$_SESSION['lang']]; ?></span></div>
            </div>
            <span class="sdtl-tag"><?php echo $lang['WM_STEP4_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
      </div>
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
    <div class="sec-label rv"><?php echo $lang['WM_CTA_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['WM_CTA_TITLE'][$_SESSION['lang']]; ?></h2>
    <p class="hw-f-list-cta-sub rv d2"><?php echo $lang['WM_CTA_SUB'][$_SESSION['lang']]; ?></p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
      <a href="<?= $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
        <div class="sb-label"><span class="sb-hint"><?php echo $lang['WM_CTA_BTN2'][$_SESSION['lang']]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-comment-dots"></i></div>
      </a>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>