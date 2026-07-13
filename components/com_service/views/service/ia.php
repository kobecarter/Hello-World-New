
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
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['IA_HERO_CTA1'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['IA_HERO_CTA1'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-search"></i></div>
            </a>

            <a href="#services" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['IA_HERO_CTA2'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['IA_HERO_CTA2'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-suitcase"></i></div>
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
<div class="mq" id="mq">
    <div class="mq-t">
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
    </div>
</div>

<!-- ═══ INTRODUCTION CONTEXTUELLE ═══════════════════ -->
<section class="intro-ctx">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="intro-ctx-img">
          <div class="img1"><img src="<?php echo $siteURL; ?>images/bg-ia-solution.jpg" alt="" ></div>
          <div class="img2"><img src="<?php echo $siteURL; ?>images/bg-ia-solution.jpg" alt="" ></div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="intro-ctx-txt">
          <div class="sec-label"><?php echo $lang['IA_INTRO_LABEL'][$_SESSION['lang']]; ?></div>
          <h2 class="sec-title"><?php echo $lang['IA_INTRO_TITLE'][$_SESSION['lang']]; ?></h2>
          <p><?php echo $lang['IA_INTRO_P1'][$_SESSION['lang']]; ?></p>
          <p><?php echo $lang['IA_INTRO_P2'][$_SESSION['lang']]; ?></p>
          <p><?php echo $lang['IA_INTRO_P3'][$_SESSION['lang']]; ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ BLOC 1 — SECTEURS ════════════════════════════ -->
<section class="secteurs" id="secteurs">
  <div class="container">
    <div class="sect-exp-hdr">
      <div class="sec-label"><?php echo $lang['IA_SECTEURS_LABEL'][$_SESSION['lang']]; ?></div>
      <h2 class="sec-title rv"><?php echo $lang['IA_SECTEURS_TITLE'][$_SESSION['lang']]; ?></h2>
      <p class="sect-exp-sub rv d1"><?php echo $lang['IA_SECTEURS_SUB'][$_SESSION['lang']]; ?></p>
    </div>
  </div>

  <div class="sect-expand" id="sectExpand">
    <?php $cpt = 0; ?>
    <?php $icoArray = array('fal fa-stethoscope','fal fa-utensils','fal fa-hotel','fal fa-building','fal fa-chart-line','fal fa-bullhorn','fal fa-cogs'); ?>
    <?php foreach($secteurs as $secteur): ?>
    <?php $active = $cpt == 0 ? 'active' : ''; ?>  
    <!-- SANTÉ -->
    <div class="sect-exp-card <?php echo $active; ?>" data-s="sante">
      <div class="sect-exp-ov"><img src="<?php echo $siteURL; ?>images/secteur/<?php echo $secteur->getPhoto(); ?>" alt="<?php echo $secteur->getTitre(); ?>"></div>
      <div class="sect-exp-ico"><i class="<?php echo $icoArray[$cpt]; ?>"></i></div>
      <span class="sect-exp-namev"><?php echo $secteur->getTitre(); ?></span>
      <div class="sect-exp-body">
        <div class="sect-exp-tag"><?php echo $secteur->getTitre(); ?></div>
        <h3 class="sect-exp-pitch"><?php echo $secteur->getSousTitre(); ?></h3>
        <?php echo $secteur->getExtrait(); ?>
        <a href="<?php echo $secteur->getLink(); ?>" class="sect-exp-link" style="display:block;margin-top:.9rem"><?php echo $lang['IA_SECTEUR_CTA'][$_SESSION['lang']]; ?> <i class="fa fa-arrow-right fa-xs"></i></a>
      </div>
    </div>
    <?php $cpt++; ?>  
    <?php endforeach; ?>
    
    

  </div>
</section>

<!-- ═══ BLOC 2 — HW CATALOGUE ════════════════════════ -->
<section class="hw-cat" id="catalogue">
  <div class="container">
    <div class="hw-cat-top">
      <div class="sec-label"><?php echo $lang['IA_CATALOGUE_LABEL'][$_SESSION['lang']]; ?></div>
      <h2 class="sec-title rv"><?php echo $lang['IA_CATALOGUE_TITLE'][$_SESSION['lang']]; ?></h2>
      <p class="hw-cat-sub rv d1"><?php echo $lang['IA_CATALOGUE_SUB'][$_SESSION['lang']]; ?></p>
    </div>
  </div>

  <div class="hw-scroll-outer">
    <button class="hw-scroll-btn hw-prev" id="hwPrev" aria-label="<?php echo $lang['IA_CAT_PREV'][$_SESSION['lang']]; ?>"><i class="fa fa-chevron-left fa-xs"></i></button>
    <button class="hw-scroll-btn hw-next" id="hwNext" aria-label="<?php echo $lang['IA_CAT_NEXT'][$_SESSION['lang']]; ?>"><i class="fa fa-chevron-right fa-xs"></i></button>
    <div class="hw-scroll-track" id="hwTrack">

      <div class="hw-card rv"  id="hw-concierge">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/BOARDY.webp" alt="Concierge A">
        </div>
        <div class="hw-card-num">01</div>
        <div class="hw-card-body">
          <div class="hw-card-tag"><?php echo $lang['IA_CARD_TAG'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-name"><?php echo $lang['IA_CARD1_NAME'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-pitch"><?php echo $lang['IA_CARD1_PITCH'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-robot"></i></div>
          <div class="hw-card-kpi"><?php echo $lang['IA_CARD1_KPI'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

      <div class="hw-card rv d1" id="hw-whatsapp">
        <div class="hw-card-ov">
             <img src="<?= $siteURL?>images/agents-ia-services/ASTRO.webp" alt="WhatsApp Agent">
        </div>
        <div class="hw-card-num">02</div>
        <div class="hw-card-body">
          <div class="hw-card-tag"><?php echo $lang['IA_CARD_TAG'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-name"><?php echo $lang['IA_CARD2_NAME'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-pitch"><?php echo $lang['IA_CARD2_PITCH'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fab fa-whatsapp"></i></div>
          <div class="hw-card-kpi"><?php echo $lang['IA_CARD2_KPI'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

      <div class="hw-card rv d2"  id="hw-sdr">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/TITAN.webp" alt="SDR Agent">
        </div>
        <div class="hw-card-num">03</div>
        <div class="hw-card-body">
          <div class="hw-card-tag"><?php echo $lang['IA_CARD_TAG'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-name"><?php echo $lang['IA_CARD3_NAME'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-pitch"><?php echo $lang['IA_CARD3_PITCH'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-bullseye"></i></div>
          <div class="hw-card-kpi"><?php echo $lang['IA_CARD3_KPI'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

      <div class="hw-card rv d3" id="hw-support">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/SOLA.webp" alt="Support 24/7">
        </div>
        <div class="hw-card-num">04</div>
        <div class="hw-card-body">
          <div class="hw-card-tag"><?php echo $lang['IA_CARD_TAG'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-name"><?php echo $lang['IA_CARD4_NAME'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-pitch"><?php echo $lang['IA_CARD4_PITCH'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-headset"></i></div>
          <div class="hw-card-kpi"><?php echo $lang['IA_CARD4_KPI'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

      <div class="hw-card rv"  id="hw-content">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/PULSE.webp" alt="Content Studio">
        </div>
        <div class="hw-card-num">05</div>
        <div class="hw-card-body">
          <div class="hw-card-tag"><?php echo $lang['IA_CARD_TAG'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-name"><?php echo $lang['IA_CARD5_NAME'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-pitch"><?php echo $lang['IA_CARD5_PITCH'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-pen-nib"></i></div>
          <div class="hw-card-kpi"><?php echo $lang['IA_CARD5_KPI'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

      <div class="hw-card rv d1" id="hw-voice">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/VOX.webp" alt="Voice Caller">
        </div>
        <div class="hw-card-num">06</div>
        <div class="hw-card-body">
          <div class="hw-card-tag"><?php echo $lang['IA_CARD_TAG'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-name"><?php echo $lang['IA_CARD6_NAME'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-pitch"><?php echo $lang['IA_CARD6_PITCH'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-phone-volume"></i></div>
          <div class="hw-card-kpi"><?php echo $lang['IA_CARD6_KPI'][$_SESSION['lang']]; ?></div>
        </div>
      </div>
    <div class="hw-card rv d1" id="hw-voice">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/VERDE.webp" alt="Voice Caller">
        </div>
        <div class="hw-card-num">07</div>
        <div class="hw-card-body">
          <div class="hw-card-tag"><?php echo $lang['IA_CARD_TAG'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-name"><?php echo $lang['IA_CARD7_NAME'][$_SESSION['lang']]; ?></div>
          <div class="hw-card-pitch"><?php echo $lang['IA_CARD7_PITCH'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-phone-volume"></i></div>
          <div class="hw-card-kpi"><?php echo $lang['IA_CARD7_KPI'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

    </div>
  </div>

</section>

<!-- ═══ BLOC 3 — VALEUR BUSINESS ════════════════════ -->
<section class="bv-section">
  <div class="container bv-inner">

    <div class="bv-eyebrow rv"><?php echo $lang['IA_BV_EYEBROW'][$_SESSION['lang']]; ?></div>
    <h2 class="bv-heading rv"><?php echo $lang['IA_BV_HEADING'][$_SESSION['lang']]; ?></h2>

    <div class="bv-stats rv d1">

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="2" data-prefix="">2</span><span class="bv-stat-unit"><?php echo $lang['IA_BV_STAT1_UNIT'][$_SESSION['lang']]; ?></span></div>
        <div class="bv-stat-label"><?php echo $lang['IA_BV_STAT1_LBL'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-desc"><?php echo $lang['IA_BV_STAT1_DESC'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-bar"></div>
      </div>

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="99.9" data-prefix="" data-dec="1">99,9</span><span class="bv-stat-unit">%</span></div>
        <div class="bv-stat-label"><?php echo $lang['IA_BV_STAT2_LBL'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-desc"><?php echo $lang['IA_BV_STAT2_DESC'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-bar"></div>
      </div>

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="2" data-prefix="&lt;">&lt;2</span><span class="bv-stat-unit"><?php echo $lang['IA_BV_STAT3_UNIT'][$_SESSION['lang']]; ?></span></div>
        <div class="bv-stat-label"><?php echo $lang['IA_BV_STAT3_LBL'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-desc"><?php echo $lang['IA_BV_STAT3_DESC'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-bar"></div>
      </div>

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="35" data-prefix="+">+35</span><span class="bv-stat-unit">%</span></div>
        <div class="bv-stat-label"><?php echo $lang['IA_BV_STAT4_LBL'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-desc"><?php echo $lang['IA_BV_STAT4_DESC'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-bar"></div>
      </div>

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="100" data-prefix="">100</span><span class="bv-stat-unit">%</span></div>
        <div class="bv-stat-label"><?php echo $lang['IA_BV_STAT5_LBL'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-desc"><?php echo $lang['IA_BV_STAT5_DESC'][$_SESSION['lang']]; ?></div>
        <div class="bv-stat-bar"></div>
      </div>

    </div>

    <!-- Citation -->
    <div class="bv-quote rv d2">
      <div class="bv-quote-inner">
        <i class="fa fa-quote-left bv-qm bv-qm-o"></i>
        <p class="bv-quote-text"><?php echo $lang['IA_BV_QUOTE'][$_SESSION['lang']]; ?></p>
        <i class="fa fa-quote-right bv-qm bv-qm-c"></i>
      </div>
      <div class="bv-quote-source">Hello World Agency</div>
      <div class="bv-quote-sub"><?php echo $lang['IA_BV_QUOTE_SUB'][$_SESSION['lang']]; ?></div>
    </div>

  </div>
</section>

<!-- integrations HUB — 3D ORBITAL -->
<section class="integrations-hub" id="integrations">
  <div class="container">
    <div class="hub-layout">

      <!-- LEFT — text + badge pills -->
      <div class="hub-text">
        <div class="sec-label"><?php echo $lang['IA_HUB_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv"><?php echo $lang['IA_HUB_TITLE'][$_SESSION['lang']]; ?></h2>
        <p class="hub-desc rv d1"><?php echo $lang['IA_HUB_DESC'][$_SESSION['lang']]; ?></p>
        <div class="hub-badges rv d2">
          <span class="hub-badge"><i class="fab fa-slack"></i> Slack</span>
          <span class="hub-badge"><i class="fab fa-salesforce"></i> Salesforce</span>
          <span class="hub-badge"><i class="fab fa-hubspot"></i> HubSpot</span>
          <span class="hub-badge"><i class="fab fa-whatsapp"></i> WhatsApp</span>
          <span class="hub-badge"><i class="fab fa-google"></i> Google</span>
          <span class="hub-badge"><i class="fal fa-bolt"></i> Zapier</span>
          <span class="hub-badge"><i class="fab fa-stripe"></i> Stripe</span>
          <span class="hub-badge"><i class="fab fa-shopify"></i> Shopify</span>
          <span class="hub-badge"><i class="fab fa-microsoft"></i> Microsoft</span>
          <span class="hub-badge"><i class="fal fa-table-cells"></i> Airtable</span>
          <span class="hub-badge"><i class="fal fa-comments"></i> Intercom</span>
          <span class="hub-badge"><i class="fab fa-telegram"></i> Telegram</span>
        </div>
      </div>

      <!-- RIGHT — 3D orbital diagram -->
      <div class="hub-orbital rv d2">
        <div class="hub-scene">

          <!-- Decorative elliptical rings -->
          <div class="hub-ring r1"></div>
          <div class="hub-ring r2"></div>
          <div class="hub-ring r3"></div>

          <!-- Central HW AI hub -->
          <div class="hub-center">
            <span class="hw">HW</span>
            <span class="ai">AI</span>
          </div>

          <!-- ── INNER ORBIT (r=85px, 18s CW) — 3 icons at 120° ── -->
          <div class="orb o1" style="--dl:0s">
            <div class="hub-ic" data-tool="Slack"><i class="fab fa-slack"></i></div>
          </div>
          <div class="orb o1" style="--dl:-6s">
            <div class="hub-ic" data-tool="WhatsApp"><i class="fab fa-whatsapp"></i></div>
          </div>
          <div class="orb o1" style="--dl:-12s">
            <div class="hub-ic" data-tool="Google"><i class="fab fa-google"></i></div>
          </div>

          <!-- ── MIDDLE ORBIT (r=150px, 27s CCW) — 4 icons at 90° ── -->
          <div class="orb o2" style="--dl:0s">
            <div class="hub-ic" data-tool="HubSpot"><i class="fab fa-hubspot"></i></div>
          </div>
          <div class="orb o2" style="--dl:-6.75s">
            <div class="hub-ic" data-tool="Salesforce"><i class="fab fa-salesforce"></i></div>
          </div>
          <div class="orb o2" style="--dl:-13.5s">
            <div class="hub-ic" data-tool="Zapier"><i class="fal fa-bolt"></i></div>
          </div>
          <div class="orb o2" style="--dl:-20.25s">
            <div class="hub-ic" data-tool="Stripe"><i class="fab fa-stripe"></i></div>
          </div>

          <!-- ── OUTER ORBIT (r=215px, 38s CW) — 5 icons at 72° ── -->
          <div class="orb o3" style="--dl:0s">
            <div class="hub-ic" data-tool="Microsoft"><i class="fab fa-microsoft"></i></div>
          </div>
          <div class="orb o3" style="--dl:-7.6s">
            <div class="hub-ic" data-tool="Airtable"><span class="ltr">A</span></div>
          </div>
          <div class="orb o3" style="--dl:-15.2s">
            <div class="hub-ic" data-tool="Shopify"><i class="fab fa-shopify"></i></div>
          </div>
          <div class="orb o3" style="--dl:-22.8s">
            <div class="hub-ic" data-tool="Intercom"><i class="fal fa-comments"></i></div>
          </div>
          <div class="orb o3" style="--dl:-30.4s">
            <div class="hub-ic" data-tool="Telegram"><i class="fab fa-telegram"></i></div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ DÉPLOIEMENT — TIMELINE LIGHT (style solutions-ia) ════════ -->
<section class="sdtl-section" id="deploiement">

  <!-- 3D Background orb subtil -->
  <div class="sdtl-orb-wrap" aria-hidden="true">
    <div class="sdtl-orb" id="sdtlOrb">
      <div class="sdtl-orb-ring r1"></div>
      <div class="sdtl-orb-ring r2"></div>
      <div class="sdtl-orb-ring r3"></div>
      <div class="sdtl-orb-ring r4"></div>
    </div>
  </div>

  <div class="container">
    <div class="sdtl-header">
      <div class="sec-label"><?php echo $lang['IA_DEPLOY_LABEL'][$_SESSION['lang']]; ?></div>
      <h2 class="sec-title rv"><?php echo $lang['IA_DEPLOY_TITLE'][$_SESSION['lang']]; ?></h2>
      <p class="sdtl-intro rv d1"><?php echo $lang['IA_DEPLOY_INTRO'][$_SESSION['lang']]; ?></p>
    </div>

    <div class="sdtl-timeline" id="sdtlTimeline">
      <!-- Spine -->
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <!-- ── PHASE 0 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title"><?php echo $lang['IA_PHASE1_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['IA_PHASE1_DESC'][$_SESSION['lang']]; ?></p>
            <span class="sdtl-tag"><?php echo $lang['IA_PHASE1_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-search"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword"><?php echo $lang['IA_PHASE1_KEYWORD'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

      <!-- ── PHASE 1 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword"><?php echo $lang['IA_PHASE2_KEYWORD'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-chess-knight"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">2</div>
            <div class="sdtl-title"><?php echo $lang['IA_PHASE2_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['IA_PHASE2_DESC'][$_SESSION['lang']]; ?></p>
            <span class="sdtl-tag"><?php echo $lang['IA_PHASE2_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
      </div>

      <!-- ── PHASE 2 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title"><?php echo $lang['IA_PHASE3_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['IA_PHASE3_DESC'][$_SESSION['lang']]; ?></p>
            <span class="sdtl-tag"><?php echo $lang['IA_PHASE3_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-flask"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword"><?php echo $lang['IA_PHASE3_KEYWORD'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

      <!-- ── PHASE 3 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword"><?php echo $lang['IA_PHASE4_KEYWORD'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-plug"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">4</div>
            <div class="sdtl-title"><?php echo $lang['IA_PHASE4_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['IA_PHASE4_DESC'][$_SESSION['lang']]; ?></p>
            <span class="sdtl-tag"><?php echo $lang['IA_PHASE4_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
      </div>

      <!-- ── PHASE 4 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">5</div>
            <div class="sdtl-title"><?php echo $lang['IA_PHASE5_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['IA_PHASE5_DESC'][$_SESSION['lang']]; ?></p>
            <span class="sdtl-tag"><?php echo $lang['IA_PHASE5_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-graduation-cap"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword"><?php echo $lang['IA_PHASE5_KEYWORD'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

      <!-- ── PHASE 5 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword"><?php echo $lang['IA_PHASE6_KEYWORD'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-rocket"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">6</div>
            <div class="sdtl-title"><?php echo $lang['IA_PHASE6_TITLE'][$_SESSION['lang']]; ?></div>
            <p class="sdtl-desc"><?php echo $lang['IA_PHASE6_DESC'][$_SESSION['lang']]; ?></p>
            <span class="sdtl-tag"><?php echo $lang['IA_PHASE6_TAG'][$_SESSION['lang']]; ?></span>
          </div>
        </div>
      </div>

    </div><!-- /sdtl-timeline -->
  </div>
</section>


<!-- GOUVERNANCE IA — 3D FLIP ASTRONAUT -->
<section class="gouv">
  <div class="container">

    <!-- TITLE ABOVE THE RECTANGLE -->
    <div class="gouv-header">
      <div class="sec-label"><?php echo $lang['IA_GOUV_LABEL'][$_SESSION['lang']]; ?></div>
      <h2 class="sec-title rv"><?php echo $lang['IA_GOUV_TITLE'][$_SESSION['lang']]; ?></h2>
    </div>

  </div>

  <!-- THE RECTANGLE — full width, no container -->
  <div class="gouv-wrap" id="gouvWrap">

    <!-- 5 crossfading backgrounds (one per block) -->
    <div class="gouv-bgs">
      <div class="gouv-bg gb1"></div>
      <div class="gouv-bg gb2"></div>
      <div class="gouv-bg gb3"></div>
      <div class="gouv-bg gb4"></div>
      <div class="gouv-bg gb5"></div>
    </div>

    <!-- TOP BAND — only the title -->
    <div class="gouv-left">
      <span class="gouv-hint" id="gouvHint"><?php echo $lang['IA_GOUV_HINT'][$_SESSION['lang']]; ?></span>
      <div class="gouv-active" id="gouvActive">
        <div class="gouv-at" id="gouvAT"></div>
      </div>
    </div>

    <!-- RIGHT — 5 flip blocks -->
    <div class="gouv-right">
      <div class="gouv-grid">

        <!-- 01 -->
        <div class="gouv-item"
             data-num="01"
             data-title="<?php echo $lang['IA_GOUV1_TITLE'][$_SESSION['lang']]; ?>"
             data-desc="<?php echo $lang['IA_GOUV1_DATADESC'][$_SESSION['lang']]; ?>">

          <div class="gi-inner">
              <img src="<?php echo $siteURL; ?>images/RGPD.webp" alt="<?php echo $lang['IA_GOUV1_TITLE'][$_SESSION['lang']]; ?>">
            <div class="gi-front">
              <span class="gi-num">01</span>
              <div class="gi-ico"><i class="fal fa-shield-alt"></i></div>
              <div class="gi-title"><?php echo $lang['IA_GOUV1_TITLE'][$_SESSION['lang']]; ?></div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel"><?php echo $lang['IA_GOUV1_BLABEL'][$_SESSION['lang']]; ?></div>
              <div class="gi-btitle"><?php echo $lang['IA_GOUV1_TITLE'][$_SESSION['lang']]; ?></div>
              <p class="gi-bdesc"><?php echo $lang['IA_GOUV1_BDESC'][$_SESSION['lang']]; ?></p>
            </div>
          </div>
        </div>

        <!-- 02 -->
        <div class="gouv-item"
             data-num="02"
             data-title="<?php echo $lang['IA_GOUV2_TITLE'][$_SESSION['lang']]; ?>"
             data-desc="<?php echo $lang['IA_GOUV2_DATADESC'][$_SESSION['lang']]; ?>">
          <div class="gi-inner">
                <img src="<?php echo $siteURL; ?>images/Protection_des_donnees.webp" alt="<?php echo $lang['IA_GOUV2_TITLE'][$_SESSION['lang']]; ?>">
            <div class="gi-front">
              <span class="gi-num">02</span>
              <div class="gi-ico"><i class="fal fa-lock"></i></div>
              <div class="gi-title"><?php echo $lang['IA_GOUV2_TITLE'][$_SESSION['lang']]; ?></div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel"><?php echo $lang['IA_GOUV2_BLABEL'][$_SESSION['lang']]; ?></div>
              <div class="gi-btitle"><?php echo $lang['IA_GOUV2_TITLE'][$_SESSION['lang']]; ?></div>
              <p class="gi-bdesc"><?php echo $lang['IA_GOUV2_BDESC'][$_SESSION['lang']]; ?></p>
            </div>
          </div>
        </div>

        <!-- 03 -->
        <div class="gouv-item"
             data-num="03"
             data-title="<?php echo $lang['IA_GOUV3_TITLE'][$_SESSION['lang']]; ?>"
             data-desc="<?php echo $lang['IA_GOUV3_DATADESC'][$_SESSION['lang']]; ?>">
          <div class="gi-inner">
              <img src="<?php echo $siteURL; ?>images/Auditabilie.webp" alt="<?php echo $lang['IA_GOUV3_ALT'][$_SESSION['lang']]; ?>">
            <div class="gi-front">
              <span class="gi-num">03</span>
              <div class="gi-ico"><i class="fal fa-file-alt"></i></div>
              <div class="gi-title"><?php echo $lang['IA_GOUV3_TITLE'][$_SESSION['lang']]; ?></div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel"><?php echo $lang['IA_GOUV3_BLABEL'][$_SESSION['lang']]; ?></div>
              <div class="gi-btitle"><?php echo $lang['IA_GOUV3_TITLE'][$_SESSION['lang']]; ?></div>
              <p class="gi-bdesc"><?php echo $lang['IA_GOUV3_BDESC'][$_SESSION['lang']]; ?></p>
            </div>
          </div>
        </div>

        <!-- 04 — large (span 2) -->
        <div class="gouv-item r2 gouv-item-lg"
             data-num="04"
             data-title="<?php echo $lang['IA_GOUV4_TITLE'][$_SESSION['lang']]; ?>"
             data-desc="<?php echo $lang['IA_GOUV4_DATADESC'][$_SESSION['lang']]; ?>">
          <div class="gi-inner">
              <img src="<?php echo $siteURL; ?>images/controle_humain.webp" alt="<?php echo $lang['IA_GOUV4_BLABEL'][$_SESSION['lang']]; ?>">
            <div class="gi-front">
              <span class="gi-num">04</span>
              <div class="gi-ico"><i class="fal fa-users"></i></div>
              <div class="gi-title"><?php echo $lang['IA_GOUV4_TITLE'][$_SESSION['lang']]; ?></div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel"><?php echo $lang['IA_GOUV4_BLABEL'][$_SESSION['lang']]; ?></div>
              <div class="gi-btitle"><?php echo $lang['IA_GOUV4_TITLE'][$_SESSION['lang']]; ?></div>
              <p class="gi-bdesc"><?php echo $lang['IA_GOUV4_BDESC'][$_SESSION['lang']]; ?></p>
            </div>
          </div>
        </div>

        <!-- 05 -->
        <div class="gouv-item r2"
             data-num="05"
             data-title="<?php echo $lang['IA_GOUV5_TITLE'][$_SESSION['lang']]; ?>"
             data-desc="<?php echo $lang['IA_GOUV5_DATADESC'][$_SESSION['lang']]; ?>">
          <div class="gi-inner">
              <img src="<?php echo $siteURL; ?>images/cloud.webp" alt="<?php echo $lang['IA_GOUV5_TITLE'][$_SESSION['lang']]; ?>">
            <div class="gi-front">
              <span class="gi-num">05</span>
              <div class="gi-ico"><i class="fal fa-server"></i></div>
              <div class="gi-title"><?php echo $lang['IA_GOUV5_TITLE'][$_SESSION['lang']]; ?></div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel"><?php echo $lang['IA_GOUV5_BLABEL'][$_SESSION['lang']]; ?></div>
              <div class="gi-btitle"><?php echo $lang['IA_GOUV5_TITLE'][$_SESSION['lang']]; ?></div>
              <p class="gi-bdesc"><?php echo $lang['IA_GOUV5_BDESC'][$_SESSION['lang']]; ?></p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>


<section class="pack-section">
        <div class="container">
            <div class="pricing-header">
              <div class="sec-label"><?php echo $lang['IA_PRICING_LABEL'][$_SESSION['lang']]; ?></div>
              <h2 class="sec-title"><?php echo $lang['IA_PRICING_TITLE'][$_SESSION['lang']]; ?></h2>
              <p class="pricing-intro rv"><?php echo $lang['IA_PRICING_INTRO'][$_SESSION['lang']]; ?></p>
            </div>
        </div>
        <div class="container">
            <div class="pack-box">
                <div class="item-pack">
                    <span class="popular"><?php echo $lang['IA_PACK1_TAG'][$_SESSION['lang']]; ?></span>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/pilot.webp" alt="<?php echo $lang['IA_PACK1_TITLE'][$_SESSION['lang']]; ?>"></div>
                    <h4><?php echo $lang['IA_PACK1_TITLE'][$_SESSION['lang']]; ?></h4>
                    <div class="textbox">
                        <p><?php echo $lang['IA_PACK1_DESC'][$_SESSION['lang']]; ?></p>
                        <ul>
                          <li><?php echo $lang['IA_PACK1_LI1'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK1_LI2'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK1_LI3'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK1_LI4'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK1_LI5'][$_SESSION['lang']]; ?></li>
                          <li></li>
                        </ul>
                    </div>
                    <div class="price">
                        <span><?php echo $lang['SVC_PACK_A_PARTIR_DE'][$_SESSION['lang']]; ?></span><br>
                        15 000 <sup>MAD</sup>
                    </div>
                    <a href="#0" class="btn-pack open-form-service"><span><?php echo $lang['IA_PACK1_BTN'][$_SESSION['lang']]; ?></span></a>
                </div>

                <div class="item-pack active">
                    <span class="popular"><i class="fa fa-trophy"></i> <?php echo $lang['IA_PACK2_TAG'][$_SESSION['lang']]; ?></span>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/pilot.webp" alt="<?php echo $lang['IA_PACK2_TITLE'][$_SESSION['lang']]; ?>"></div>
                    <h4><?php echo $lang['IA_PACK2_TITLE'][$_SESSION['lang']]; ?></h4>
                    <div class="textbox">
                        <p><?php echo $lang['IA_PACK2_DESC'][$_SESSION['lang']]; ?></p>
                        <ul>
                          <li><?php echo $lang['IA_PACK2_LI1'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK2_LI2'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK2_LI3'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK2_LI4'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK2_LI5'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK2_LI6'][$_SESSION['lang']]; ?></li>
                          <li></li>
                        </ul>
                    </div>
                    <div class="price">
                        <span><?php echo $lang['SVC_PACK_A_PARTIR_DE'][$_SESSION['lang']]; ?></span><br>
                        45 000 - 100 000 <sup>MAD</sup>
                    </div>
                    <a href="#0" class="btn-pack open-form-service"><span><?php echo $lang['IA_PACK2_BTN'][$_SESSION['lang']]; ?></span></a>
                </div>

                <div class="item-pack">
                    <span class="popular"><?php echo $lang['IA_PACK3_TAG'][$_SESSION['lang']]; ?></span>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/pilot.webp" alt="<?php echo $lang['IA_PACK3_TITLE'][$_SESSION['lang']]; ?>"></div>
                    <h4><?php echo $lang['IA_PACK3_TITLE'][$_SESSION['lang']]; ?></h4>
                    <div class="textbox">
                        <p><?php echo $lang['IA_PACK3_DESC'][$_SESSION['lang']]; ?></p>
                        <ul>
                          <li><?php echo $lang['IA_PACK3_LI1'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK3_LI2'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK3_LI3'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK3_LI4'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK3_LI5'][$_SESSION['lang']]; ?></li>
                          <li><?php echo $lang['IA_PACK3_LI6'][$_SESSION['lang']]; ?></li>
                          <li></li>
                        </ul>
                    </div>
                    <div class="price">
                        <span><?php echo $lang['SVC_PACK_A_PARTIR_DE'][$_SESSION['lang']]; ?></span><br>
                        100 000 <sup>MAD+</sup>
                    </div>
                    <a href="#0" class="btn-pack open-form-service"><span><?php echo $lang['IA_PACK3_BTN'][$_SESSION['lang']]; ?></span></a>
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
    <div class="sec-label rv"><?php echo $lang['IA_FINAL_CTA_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['IA_FINAL_CTA_TITLE'][$_SESSION['lang']]; ?></h2>
    <p class="hw-f-list-cta-sub rv d2"><?php echo $lang['IA_FINAL_CTA_SUB'][$_SESSION['lang']]; ?></p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint"><?php echo $lang['IA_HERO_CTA1'][$_SESSION['lang']]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
      <a href="<?= $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
        <div class="sb-label"><span class="sb-hint"><?php echo $lang['IA_FINAL_CTA_BTN2'][$_SESSION['lang']]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-comment-dots"></i></div>
      </a>
    </div>
  </div>
</section>

<!-- CASE STUDIES -->
<section class="case-studies">
  <div class="container">
    <div class="sec-label"><?php echo $lang['IA_CASE_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv"><?php echo $lang['IA_CASE_TITLE'][$_SESSION['lang']]; ?></h2>

    <div class="case-grid">
      <div class="case-card rv">
        <div class="case-sector"><?php echo $lang['IA_CASE1_SECTOR'][$_SESSION['lang']]; ?></div>
        <div class="case-title"><?php echo $lang['IA_CASE1_TITLE'][$_SESSION['lang']]; ?></div>
        <p class="case-desc"><?php echo $lang['IA_CASE1_DESC'][$_SESSION['lang']]; ?></p>
        <div class="case-metrics">
          <div class="case-metric">
            <div class="case-metric-value">+45%</div>
            <div class="case-metric-label"><?php echo $lang['IA_CASE1_METRIC1_LBL'][$_SESSION['lang']]; ?></div>
          </div>
          <div class="case-metric">
            <div class="case-metric-value">-35%</div>
            <div class="case-metric-label"><?php echo $lang['IA_CASE1_METRIC2_LBL'][$_SESSION['lang']]; ?></div>
          </div>
        </div>
      </div>

      <div class="case-card rv d1">
        <div class="case-sector"><?php echo $lang['IA_CASE2_SECTOR'][$_SESSION['lang']]; ?></div>
        <div class="case-title"><?php echo $lang['IA_CASE2_TITLE'][$_SESSION['lang']]; ?></div>
        <p class="case-desc"><?php echo $lang['IA_CASE2_DESC'][$_SESSION['lang']]; ?></p>
        <div class="case-metrics">
          <div class="case-metric">
            <div class="case-metric-value">+120%</div>
            <div class="case-metric-label"><?php echo $lang['IA_CASE2_METRIC1_LBL'][$_SESSION['lang']]; ?></div>
          </div>
          <div class="case-metric">
            <div class="case-metric-value">-60%</div>
            <div class="case-metric-label"><?php echo $lang['IA_CASE2_METRIC2_LBL'][$_SESSION['lang']]; ?></div>
          </div>
        </div>
      </div>

      <div class="case-card rv d2">
        <div class="case-sector"><?php echo $lang['IA_CASE3_SECTOR'][$_SESSION['lang']]; ?></div>
        <div class="case-title"><?php echo $lang['IA_CASE3_TITLE'][$_SESSION['lang']]; ?></div>
        <p class="case-desc"><?php echo $lang['IA_CASE3_DESC'][$_SESSION['lang']]; ?></p>
        <div class="case-metrics">
          <div class="case-metric">
            <div class="case-metric-value">-42%</div>
            <div class="case-metric-label"><?php echo $lang['IA_CASE3_METRIC1_LBL'][$_SESSION['lang']]; ?></div>
          </div>
          <div class="case-metric">
            <div class="case-metric-value">+88%</div>
            <div class="case-metric-label"><?php echo $lang['IA_CASE3_METRIC2_LBL'][$_SESSION['lang']]; ?></div>
          </div>
        </div>
      </div>

      <div class="case-card rv">
        <div class="case-sector"><?php echo $lang['IA_CASE4_SECTOR'][$_SESSION['lang']]; ?></div>
        <div class="case-title"><?php echo $lang['IA_CASE4_TITLE'][$_SESSION['lang']]; ?></div>
        <p class="case-desc"><?php echo $lang['IA_CASE4_DESC'][$_SESSION['lang']]; ?></p>
        <div class="case-metrics">
          <div class="case-metric">
            <div class="case-metric-value">+65%</div>
            <div class="case-metric-label"><?php echo $lang['IA_CASE4_METRIC1_LBL'][$_SESSION['lang']]; ?></div>
          </div>
          <div class="case-metric">
            <div class="case-metric-value">+3.2pts</div>
            <div class="case-metric-label"><?php echo $lang['IA_CASE4_METRIC2_LBL'][$_SESSION['lang']]; ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
/* Secteurs expand accordion */
(function(){const cards=document.querySelectorAll('.sect-exp-card');if(!cards.length)return;cards.forEach(card=>{card.addEventListener('click',()=>{if(card.classList.contains('active'))return;cards.forEach(c=>c.classList.remove('active'));card.classList.add('active');});});})();

/* Accordion */
document.querySelectorAll('.hw-acc-head').forEach(head=>{head.addEventListener('click',()=>{const item=head.closest('.hw-acc-item');const wasOpen=item.classList.contains('open');document.querySelectorAll('.hw-acc-item.open').forEach(i=>i.classList.remove('open'));if(!wasOpen){item.classList.add('open');setTimeout(()=>item.scrollIntoView({behavior:'smooth',block:'nearest'}),50);}});});

/* HW infinite carousel */
(function(){
  const outer=document.querySelector('.hw-scroll-outer');
  const track=document.getElementById('hwTrack');
  if(!track||!outer)return;
  const originals=Array.from(track.querySelectorAll('.hw-card'));
  const n=originals.length;
  originals.forEach(c=>{const cl=c.cloneNode(true);cl.removeAttribute('id');track.appendChild(cl);});
  originals.slice().reverse().forEach(c=>{const cl=c.cloneNode(true);cl.removeAttribute('id');track.insertBefore(cl,track.firstChild);});
  track.querySelectorAll('.rv').forEach(el=>el.classList.add('on'));
  function metrics(){
    const card=track.querySelector('.hw-card');
    const gap=parseInt(getComputedStyle(track).columnGap||getComputedStyle(track).gap)||100;
    const cw=card?card.offsetWidth:300;
    return{cw,gap,step:cw+gap};
  }
  function init(){
    const{cw,gap,step}=metrics();
    const peek=Math.max(0,(outer.offsetWidth-3*cw-2*gap)/2);
    track.scrollLeft=n*step-peek;
  }
  init();
  window.addEventListener('resize',init);
  let jumping=false;
  track.addEventListener('scroll',()=>{
    if(jumping)return;
    const{step}=metrics();
    if(track.scrollLeft<2*step){jumping=true;track.scrollLeft+=n*step;setTimeout(()=>jumping=false,60);}
    else if(track.scrollLeft>(2*n-2)*step){jumping=true;track.scrollLeft-=n*step;setTimeout(()=>jumping=false,60);}
  },{passive:true});
  const prev=document.getElementById('hwPrev'),next=document.getElementById('hwNext');
  function slide(dir){const{step}=metrics();track.scrollBy({left:dir*step,behavior:'smooth'});}
  if(prev)prev.addEventListener('click',()=>slide(-1));
  if(next)next.addEventListener('click',()=>slide(1));
  let isDown=false,sx,sl;
  track.addEventListener('mousedown',e=>{isDown=true;sx=e.pageX;sl=track.scrollLeft;});
  document.addEventListener('mouseup',()=>isDown=false);
  track.addEventListener('mousemove',e=>{if(!isDown)return;e.preventDefault();track.scrollLeft=sl-(e.pageX-sx)*1.3;});
})();

/* ── SANTE DEPLOY TIMELINE — SCROLL-DRIVEN (light) ── */
(function(){
  const timeline  = document.getElementById('sdtlTimeline');
  const spineFill = document.getElementById('sdtlSpineFill');
  const orb       = document.getElementById('sdtlOrb');
  const steps     = document.querySelectorAll('.sdtl-step');
  if(!timeline || !spineFill) return;

  let rafId = null;
  function updateTimeline(){
    const rect = timeline.getBoundingClientRect();
    const vh   = window.innerHeight;
    /* Spine fill: progresse quand la section scroll dans le viewport */
    const raw  = (vh * 0.65 - rect.top) / (rect.height + vh * 0.05);
    const p    = Math.max(0, Math.min(1, raw));
    spineFill.style.height = (p * 100) + '%';
    /* Orb rotation liée au scroll global */
    if(orb){
      const sp = window.scrollY / Math.max(1, document.body.scrollHeight - vh);
      orb.style.transform =
        `rotateY(${(sp * 720).toFixed(2)}deg) rotateX(${(sp * 300).toFixed(2)}deg)`;
    }
    rafId = null;
  }
  function onScroll(){
    if(!rafId) rafId = requestAnimationFrame(updateTimeline);
  }

  /* Steps: activés à l'entrée dans le viewport (22% visible) */
  const stepIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(e.isIntersecting){
        e.target.classList.add('active');
      } else {
        /* si le step repasse en dessous (scroll up) → désactiver */
        if(e.boundingClientRect.top > 0) e.target.classList.remove('active');
      }
    });
  }, {threshold: 0.22});
  steps.forEach(s => stepIO.observe(s));

  window.addEventListener('scroll', onScroll, {passive:true});
  window.addEventListener('resize', onScroll, {passive:true});
  updateTimeline();
})();

/* GOUVERNANCE — background switch + title + gray siblings */
(function(){
  var panel  = document.getElementById('gouvActive');
  var elTitle= document.getElementById('gouvAT');
  var hint   = document.getElementById('gouvHint');
  var bgs    = Array.from(document.querySelectorAll('.gouv-bg'));
  if(!panel) return;

  var items  = Array.from(document.querySelectorAll('.gouv-item'));

  function setActiveBg(num){
    bgs.forEach(function(bg){ bg.classList.remove('active'); });
    var target = document.querySelector('.gb' + num);
    if(target) target.classList.add('active');
  }

  items.forEach(function(item){
    item.addEventListener('mouseenter', function(){
      var num = parseInt(this.dataset.num) || 1;
      /* Switch background */
      setActiveBg(num);
      /* Show block title in top band */
      elTitle.textContent = this.dataset.title || '';
      panel.classList.add('on');
      if(hint) hint.classList.add('hidden');
      /* Gray out siblings */
      items.forEach(function(other){
        if(other !== item) other.classList.add('gi-dimmed');
        else other.classList.remove('gi-dimmed');
      });
    });
    item.addEventListener('mouseleave', function(){
      /* Fade all backgrounds out */
      bgs.forEach(function(bg){ bg.classList.remove('active'); });
      panel.classList.remove('on');
      if(hint) hint.classList.remove('hidden');
      items.forEach(function(other){ other.classList.remove('gi-dimmed'); });
    });
  });
})();
</script>