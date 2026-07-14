
<!-- ═══ HERO ════════════════════════════════════════ -->
<section class="ty-hero">
  <canvas id="hero-canvas"></canvas>
  <div class="ty-hero-grid" aria-hidden="true">
    <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
      <defs><pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"><path d="M 60 0 L 0 0 0 60" fill="none" stroke="#8b6a22" stroke-width="0.5"/></pattern></defs>
      <rect width="1440" height="900" fill="url(#grid)"/>
      <line x1="0" y1="900" x2="1440" y2="0" stroke="#8b6a22" stroke-width="0.4"/>
      <line x1="720" y1="900" x2="1440" y2="200" stroke="#8b6a22" stroke-width="0.3"/>
    </svg>
  </div>
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(16rem,32vw,46rem);bottom:-3rem;right:-1rem;color:rgba(0,0,0,.025)" aria-hidden="true">OK</span>
  <div class="container">
    <div class="ty-hero-bread rv">
      <a href="<?php echo $siteURL; ?>"><?php echo $lang['CT_BREAD_ACCUEIL'][$_SESSION['lang']]; ?></a>
      <i class="fa fa-chevron-right"></i>
      <a href="<?php echo $pageContact->getLink(); ?>"><?php echo $lang['CT_CONFIRM_BREAD_CONTACT'][$_SESSION['lang']]; ?></a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $lang['CT_CONFIRM_LABEL'][$_SESSION['lang']]; ?></span>
    </div>
    <div class="ty-hero-inner">
      <div>
        <div class="ty-hero-label rv"><?php echo $lang['CT_CONFIRM_LABEL'][$_SESSION['lang']]; ?></div>
        <h1 class="ty-hero-title rv d1"><?php echo $lang['CT_CONFIRM_TITLE'][$_SESSION['lang']]; ?></h1>
        <p class="ty-hero-sub rv d2"><?php echo $lang['CT_CONFIRM_SUB'][$_SESSION['lang']]; ?></p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $siteURL; ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['CT_CONFIRM_CTA_QUOTE_ARIA'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['CT_CONFIRM_BTN_HOME'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-home"></i></div>
            </a>

            <a href="<?php echo $pageRealisation->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['CT_CONFIRM_CTA_REALISATIONS_ARIA'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['CT_CONFIRM_BTN_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div>
            </a>
        </div>
      </div>
      <div class="rv d2">
        <div class="ty-confirm-card">
          <div class="ty-confirm-icon"><i class="fa fa-check"></i></div>
          <div class="ty-confirm-title"><?php echo $lang['CT_CONFIRM_SUCCESS_TITLE'][$_SESSION['lang']]; ?></div>
          <p class="ty-confirm-desc"><?php echo $lang['CT_CONFIRM_SUCCESS_DESC'][$_SESSION['lang']]; ?></p>
          <div class="ty-confirm-sep"></div>
          <div class="ty-confirm-rows">
            <div class="ty-confirm-row"><i class="fa fa-clock"></i> <?php echo $lang['CT_GUARANTEE_TITLE'][$_SESSION['lang']]; ?></div>
            <div class="ty-confirm-row"><i class="fa fa-user-tie"></i> <?php echo $lang['CT_CONFIRM_ROW_CONTACT'][$_SESSION['lang']]; ?></div>
            <div class="ty-confirm-row"><i class="fa fa-gift"></i> <?php echo $lang['CT_CONFIRM_ROW_AUDIT'][$_SESSION['lang']]; ?></div>
            <div class="ty-confirm-row"><i class="fa fa-shield-halved"></i> <?php echo $lang['CT_CONFIRM_ROW_NOENGAGEMENT'][$_SESSION['lang']]; ?></div>
          </div>
          <div class="ty-countdown-bar"><div class="ty-countdown-fill"></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PENDANT CE TEMPS, EXPLOREZ ══════════════════ -->
<section class="ty-explore">
  <div class="container">
    <div class="sec-label"><?php echo $lang['CT_CONFIRM_EXPLORE_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv"><?php echo $lang['CT_CONFIRM_EXPLORE_TITLE'][$_SESSION['lang']]; ?></h2>
    <div class="ty-explore-grid rv d1">
      <a href="<?php echo $pageRealisation->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-images ty-exp-icon"></i>
        <div class="ty-exp-label"><?php echo $lang['CT_CONFIRM_EXP_PORTFOLIO_LABEL'][$_SESSION['lang']]; ?></div>
        <div class="ty-exp-title"><?php echo $lang['CT_CONFIRM_EXP_PORTFOLIO_TITLE'][$_SESSION['lang']]; ?></div>
        <div class="ty-exp-desc"><?php echo $lang['CT_CONFIRM_EXP_PORTFOLIO_DESC'][$_SESSION['lang']]; ?></div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageBlog->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-newspaper ty-exp-icon"></i>
        <div class="ty-exp-label"><?php echo $lang['CT_CONFIRM_EXP_BLOG_LABEL'][$_SESSION['lang']]; ?></div>
        <div class="ty-exp-title"><?php echo $lang['CT_CONFIRM_EXP_BLOG_TITLE'][$_SESSION['lang']]; ?></div>
        <div class="ty-exp-desc"><?php echo $lang['CT_CONFIRM_EXP_BLOG_DESC'][$_SESSION['lang']]; ?></div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageIA->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-robot ty-exp-icon"></i>
        <div class="ty-exp-label"><?php echo $lang['CT_CONFIRM_EXP_IA_LABEL'][$_SESSION['lang']]; ?></div>
        <div class="ty-exp-title"><?php echo $lang['CT_CONFIRM_EXP_IA_TITLE'][$_SESSION['lang']]; ?></div>
        <div class="ty-exp-desc"><?php echo $lang['CT_CONFIRM_EXP_IA_DESC'][$_SESSION['lang']]; ?></div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageFormation->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-graduation-cap ty-exp-icon"></i>
        <div class="ty-exp-label"><?php echo $lang['CT_CONFIRM_EXP_FORMATION_LABEL'][$_SESSION['lang']]; ?></div>
        <div class="ty-exp-title"><?php echo $lang['CT_CONFIRM_EXP_FORMATION_TITLE'][$_SESSION['lang']]; ?></div>
        <div class="ty-exp-desc"><?php echo $lang['CT_CONFIRM_EXP_FORMATION_DESC'][$_SESSION['lang']]; ?></div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
    </div>
  </div>
</section>

<!-- ═══ CTA ══════════════════════════════════════════ -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Hello World Agency</div>
    <h2 class="sec-title"><?php echo $lang['CT_CONFIRM_CTA_TITLE'][$_SESSION['lang']]; ?></h2>
    <p class="cta-sub"><?php echo $lang['CT_CONFIRM_CTA_SUB'][$_SESSION['lang']]; ?></p>
    <div class="cta-btns">
      <a href="<?php echo $siteURL; ?>" class="sb sb-compact" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['CT_CONFIRM_BTN_HOME'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
        <div class="sb-label"><span class="sb-hint"><?php echo $lang['CT_CONFIRM_BTN_HOME'][$_SESSION['lang']]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-home"></i></div>
      </a>

      <a href="<?php echo $pageContact->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['CT_CONFIRM_CTA_SEND_ARIA'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
        <div class="sb-label"><span class="sb-hint"><?php echo $lang['CT_CONFIRM_CTA_SEND_ARIA'][$_SESSION['lang']]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-envelope"></i></div>
      </a>
    </div>
  </div>
</section>