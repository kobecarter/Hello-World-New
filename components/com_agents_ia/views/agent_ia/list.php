<?php
$agentCategories = [
    'hw-whatsapp-agent'       => 'Messagerie',
    'hw-concierge-ai'         => 'Messagerie',
    'whatsapp-campaign-agent' => 'Messagerie',
    'conversationnel'         => 'Messagerie',
    'conversational'          => 'Messagerie',
    'booking-assistant'       => 'Service Client',
    'resto-assistant'         => 'Service Client',
    'hw-voice-caller'         => 'Service Client',
    'hw-sdr-agent'            => 'Service Client',
    'hw-support-24-7'         => 'Service Client',
    'hw-content-studio'       => 'Marketing',
    'content-broadcaster'     => 'Marketing',
    'marketing-reporter'      => 'Marketing',
    'seo-tracker'             => 'Marketing',
    'trading-signal-agent'    => 'Finance',
    'trade-executor'          => 'Finance',
    'market-alert-agent'      => 'Finance',
    'expense-tracker'         => 'Finance',
    'inbox-assistant'         => 'Productivite',
    'task-summarizer'         => 'Productivite',
    'deadline-notifier'       => 'Productivite',
    'call-analyzer'           => 'Productivite',
    'project-tracker'         => 'Immobilier',
    'lead-finder'             => 'Donnees',
];

$agentIcons = [
    'Messagerie'    => 'fa-comment-dots',
    'Service Client'=> 'fa-headset',
    'Marketing'     => 'fa-bullhorn',
    'Finance'       => 'fa-chart-line',
    'Productivite'  => 'fa-tasks',
    'Immobilier'    => 'fa-building',
    'Donnees'       => 'fa-database',
];

$catLabels = [
    'Messagerie'    => $lang['AGENT_CAT_MESSAGERIE'][$_SESSION['lang']],
    'Service Client'=> $lang['AGENT_CAT_SERVICE_CLIENT'][$_SESSION['lang']],
    'Marketing'     => $lang['AGENT_CAT_MARKETING'][$_SESSION['lang']],
    'Finance'       => $lang['AGENT_CAT_FINANCE'][$_SESSION['lang']],
    'Productivite'  => $lang['AGENT_CAT_PRODUCTIVITE'][$_SESSION['lang']],
    'Immobilier'    => $lang['AGENT_CAT_IMMOBILIER'][$_SESSION['lang']],
    'Donnees'       => $lang['AGENT_CAT_DONNEES'][$_SESSION['lang']],
];

$cats = array_keys($catLabels);
?>


<!-- ── Hero ──────────────────────────────────────────── -->
<section class="wm-hero aia-hero-center">
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
        <h1 class="sh-h1 rv on"><?= $lang['AGENT_LIST_H1'][$_SESSION['lang']]; ?></h1>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($page->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?= $lang['SVC_LIST_CTA_AUDIT'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?= $lang['SVC_LIST_CTA_AUDIT'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>

            <a href="<?php echo $pageReference->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?= $lang['SVC_CTA_VOIR_REALISATIONS'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?= $lang['SVC_CTA_VOIR_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div> 
            </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3 wm-hero-side-banner">
        <img src="<?php echo $siteURL; ?>images/pages/<?php echo $page->getPhoto() ?>" alt="<?php echo $page->getTitre() ?>">
      </div>
    </div>
  </div>
</section>
<!-- ══ MARQUEE — visible after hero unpins ═════════════════════ -->
<div class="mq" id="mq"><div class="mq-t">
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span><?= $lang['MQ2_WEB_MOBILE'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?= $lang['MQ2_SOLUTIONS_IA'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?= $lang['MQ2_SAAS_PRODUITS'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?= $lang['MQ2_BRAND_EXPERIENCE'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?= $lang['MQ2_DEPLOIEMENTS'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?= $lang['MQ2_ROI'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?= $lang['MQ2_DIGITAL_AGENCY'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span><?= $lang['MQ2_WEB_MOBILE'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?= $lang['MQ2_SOLUTIONS_IA'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?= $lang['MQ2_SAAS_PRODUITS'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?= $lang['MQ2_BRAND_EXPERIENCE'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?= $lang['MQ2_DEPLOIEMENTS'][$_SESSION['lang']]; ?></span>
  <span class="mi"><span class="d"></span><span class="h"><?= $lang['MQ2_ROI'][$_SESSION['lang']]; ?></span></span>
  <span class="mi"><span class="d"></span><?= $lang['MQ2_DIGITAL_AGENCY'][$_SESSION['lang']]; ?></span>
</div></div>

<!-- ── About / descriptif — sépare le marquee du filtre ─ -->
<section class="aia-about" id="aia-about">
    <div class="aia-about-orb" aria-hidden="true"></div>
    <div class="aia-grid-wrap">
        <div class="aia-section-head aia-about-panel">
            <div class="aia-section-eyebrow rv"><?= $lang['AGENT_LIST_ABOUT_EYEBROW'][$_SESSION['lang']]; ?></div>
            <h2 class="aia-section-title rv d1"><?= $lang['AGENT_LIST_ABOUT_TITLE'][$_SESSION['lang']]; ?></h2>
            <p class="aia-about-text rv d2">
                <?= $lang['AGENT_LIST_ABOUT_TEXT'][$_SESSION['lang']]; ?>
            </p>
            <div class="aia-about-tags rv d3">
                <span class="aia-about-tag"><i class="fal fa-bolt"></i> <?= $lang['AGENT_LIST_TAG_72H'][$_SESSION['lang']]; ?></span>
                <span class="aia-about-tag"><i class="fal fa-plug"></i> <?= $lang['AGENT_LIST_TAG_CONNECTED'][$_SESSION['lang']]; ?></span>
                <span class="aia-about-tag"><i class="fal fa-language"></i> <?= $lang['AGENT_LIST_TAG_MULTILINGUAL'][$_SESSION['lang']]; ?></span>
                <span class="aia-about-tag"><i class="fal fa-code"></i> <?= $lang['AGENT_LIST_TAG_NO_CODE'][$_SESSION['lang']]; ?></span>
            </div>
        </div>
    </div>
</section>

<!-- ── Filter bar ────────────────────────────────────── -->
<nav class="aia-filter-bar" id="aia-listing" aria-label="<?= $lang['AGENT_LIST_FILTER_ARIA'][$_SESSION['lang']]; ?>">
    <div class="aia-filter-inner">
        <button class="aia-filter-btn active" data-filter="all">
            <?= $lang['SVC_FILTER_ALL'][$_SESSION['lang']]; ?> <span style="font-weight:400;opacity:.5;">(<?= count($agents_ia); ?>)</span>
        </button>
        <?php foreach ($cats as $cat): ?>
        <button class="aia-filter-btn" data-filter="<?= $cat; ?>">
            <i class="fal <?= $agentIcons[$cat] ?? 'fa-robot'; ?>" style="margin-right:5px;font-size:.85em;opacity:.7;"></i>
            <?= htmlspecialchars($catLabels[$cat], ENT_QUOTES, 'UTF-8'); ?>
        </button>
        <?php endforeach; ?>
    </div>
</nav>

<!-- ── Grid ──────────────────────────────────────────── -->
<section class="aia-section">
    <div class="aia-section-orb o1" aria-hidden="true"></div>
    <div class="aia-section-orb o2" aria-hidden="true"></div>
    <div class="aia-grid-wrap">
        <div class="aia-section-head">
            <div class="aia-section-eyebrow"><?= $lang['AGENT_LIST_SOLUTIONS_EYEBROW'][$_SESSION['lang']]; ?></div>
            <h2 class="aia-section-title">
                <?= $lang['AGENT_LIST_CHOOSE_TITLE'][$_SESSION['lang']]; ?>
                <span class="aia-count-badge" id="aia-count"><?= count($agents_ia); ?></span>
            </h2>
        </div>

        <div class="aia-grid" id="aia-grid">
            <?php if (!empty($agents_ia)): ?>
            <?php foreach ($agents_ia as $agent):
                $cat  = $agentCategories[$agent->getSlug()] ?? 'Autres';
                $icon = $agentIcons[$cat] ?? 'fa-robot';
                $lbl  = $catLabels[$cat] ?? $cat;
            ?>
            <div class="aia-card-wrap" data-category="<?= $cat; ?>">
                <a class="aia-card" href="<?= $agent->getLink(); ?>" aria-label="<?= htmlspecialchars($agent->getTitre(), ENT_QUOTES, 'UTF-8'); ?>">
                    <?php $cardPhoto = $agent->getPhotoProduit() ?: $agent->getPhoto(); ?>
                    <div class="aia-card-img">
                        <?php if ($cardPhoto): ?>
                        <img src="<?= $siteURL; ?>images/agents_ia/<?= $cardPhoto; ?>"
                             alt="<?= htmlspecialchars($agent->getTitre(), ENT_QUOTES, 'UTF-8'); ?>"
                             loading="lazy">
                        <?php else: ?>
                        <div class="aia-card-img-ph"><i class="fal fa-robot"></i></div>
                        <?php endif; ?>
                        <div class="aia-card-overlay"></div>
                        <span class="aia-card-cat">
                            <i class="fal <?= $icon; ?>" style="margin-right:4px;"></i>
                            <?= htmlspecialchars($lbl, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </div>
                    <div class="aia-card-body">
                        <h3 class="aia-card-title"><?= htmlspecialchars($agent->getTitre(), ENT_QUOTES, 'UTF-8'); ?></h3>
                        <?php if ($agent->getSousTitre()): ?>
                        <p class="aia-card-sub"><?= htmlspecialchars($agent->getSousTitre(), ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php endif; ?>
                        <?php if ($agent->getExtrait()): ?>
                        <p class="aia-card-desc"><?= mb_substr(strip_tags($agent->getExtrait()), 0, 105, 'UTF-8'); ?>...</p>
                        <?php endif; ?>
                        <div class="aia-card-footer">
                            <span class="aia-card-lbl"><?= $lang['SVC_CTA_DECOUVRIR'][$_SESSION['lang']]; ?></span>
                            <span class="aia-card-arrow"><i class="fal fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="aia-empty">
                <i class="fal fa-robot"></i>
                <?= $lang['AGENT_LIST_EMPTY'][$_SESSION['lang']]; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ── CTA final ─────────────────────────────────────── -->
<section class="aia-cta">
    <video class="aia-cta-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
        <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
    </video>
    <div class="aia-cta-scrim"></div>
    <div class="aia-cta-inner">
        <h2><?= $lang['AGENT_LIST_CTA_TITLE'][$_SESSION['lang']]; ?></h2>
        <p><?= $lang['AGENT_LIST_CTA_TEXT'][$_SESSION['lang']]; ?></p>
        <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
            <div class="sb-label"><span class="sb-hint"><?= $lang['IA_PACK3_BTN'][$_SESSION['lang']]; ?></span></div>
            <div class="sb-knob"><i class="fal fa-rocket"></i></div>
        </a>
    </div>
</section>

<!-- ── Partenaires — ils nous font confiance ────────────── -->
<?php if (!empty($partners)): ?>
<section class="trust" id="aia-trust-partners">
  <div class="trust-head container">
    <div class="sec-label rv"><?= $lang['SVC_SECTION_PARTENAIRES_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?= $lang['SVC_SECTION_PARTENAIRES_TITLE'][$_SESSION['lang']]; ?></h2>
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

<!-- ── GSAP ──────────────────────────────────────────── -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);

    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ── Hero image entrance + gentle parallax on the centered visual */
    if (!prefersReduced) {
        gsap.from('.aia-hero-center .wm-hero-side', {
            y: 40, autoAlpha: 0, scale: .96, duration: 1.1, ease: 'expo.out', delay: .35
        });
        gsap.to('.aia-hero-center .wm-hero-side', { y: -30, ease: 'none',
            scrollTrigger: { trigger: '.aia-hero-center', start: 'top top', end: 'bottom top', scrub: 1.5 }
        });
    }

    /* ── About panel reveal — utilise le système .rv sitewide (IntersectionObserver, cf. includes/template.php), */
    /* pas de ScrollTrigger ici : évite tout état bloqué à opacity 0 si le trigger est raté au chargement.        */

    /* ── Card reveal on scroll (ScrollTrigger batch — Emil: stagger 50-70ms, from y not scale(0)) */
    var wraps = gsap.utils.toArray('.aia-card-wrap');

    if (!prefersReduced) {
        gsap.set(wraps, { y: 50, autoAlpha: 0 });
        ScrollTrigger.batch(wraps, {
            start: 'top 90%',
            onEnter: function (batch) {
                gsap.to(batch, { y: 0, autoAlpha: 1, duration: .75, ease: 'expo.out', stagger: .06 });
            },
            onEnterBack: function (batch) {
                gsap.to(batch, { y: 0, autoAlpha: 1, duration: .45, stagger: .04 });
            }
        });
    }

    /* ── Section head reveal (grille uniquement — le descriptif utilise .rv, pas GSAP) */
    if (!prefersReduced) {
        gsap.from('.aia-section .aia-section-eyebrow', {
            y: 18, autoAlpha: 0, duration: .8, ease: 'expo.out',
            scrollTrigger: { trigger: '.aia-section .aia-section-head', start: 'top 87%' }
        });
        gsap.from('.aia-section .aia-section-title', {
            y: 28, autoAlpha: 0, duration: .95, ease: 'expo.out', delay: .08,
            scrollTrigger: { trigger: '.aia-section .aia-section-head', start: 'top 87%' }
        });
        gsap.from('.aia-cta h2, .aia-cta p, .aia-cta .sb', {
            y: 32, autoAlpha: 0, stagger: .1, duration: .9, ease: 'expo.out',
            scrollTrigger: { trigger: '.aia-cta', start: 'top 82%' }
        });
    }

    /* ── 3D tilt on cards (same mouse-follow pattern as .ai-card / .svc-card sitewide) */
    if (!prefersReduced && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        document.querySelectorAll('.aia-card').forEach(function (el) {
            var shine = document.createElement('div');
            shine.className = 'tilt-shine';
            el.appendChild(shine);
            el.addEventListener('mouseenter', function () {
                el.style.transition = 'transform .06s linear, box-shadow .3s, background .3s';
            });
            el.addEventListener('mousemove', function (e) {
                var r = el.getBoundingClientRect();
                var dx = (e.clientX - r.left - r.width * .5) / (r.width * .5);
                var dy = (e.clientY - r.top - r.height * .5) / (r.height * .5);
                el.style.transform = 'perspective(900px) rotateX(' + (-dy * 6) + 'deg) rotateY(' + (dx * 6) + 'deg) translateY(-5px) translateZ(8px)';
                shine.style.setProperty('--sx', ((dx + 1) / 2 * 100) + '%');
                shine.style.setProperty('--sy', ((dy + 1) / 2 * 100) + '%');
            });
            el.addEventListener('mouseleave', function () {
                el.style.transition = 'transform .65s cubic-bezier(.34,1.56,.64,1), box-shadow .3s, background .3s';
                el.style.transform = '';
            });
        });
    }

    /* ── Category filter (Emil: blur crossfade to mask state switch) */
    var filterBtns = document.querySelectorAll('.aia-filter-btn');
    var countEl    = document.getElementById('aia-count');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var filter = this.getAttribute('data-filter');

            filterBtns.forEach(function (b) { b.classList.remove('active'); });
            this.classList.add('active');

            var visible = [], hidden = [];
            wraps.forEach(function (w) {
                (filter === 'all' || w.getAttribute('data-category') === filter)
                    ? visible.push(w)
                    : hidden.push(w);
            });

            /* fade out hidden — Emil: fast exit (200ms) */
            if (hidden.length) {
                gsap.to(hidden, {
                    autoAlpha: 0, y: -14, duration: .22, ease: 'power2.in',
                    onComplete: function () {
                        hidden.forEach(function (w) {
                            w.setAttribute('data-hidden', '1');
                            w.style.display = 'none';
                        });
                    }
                });
            }

            /* show visible — Emil: deliberate enter (600ms expo-out with stagger 60ms) */
            visible.forEach(function (w) {
                w.removeAttribute('data-hidden');
                w.style.display = '';
            });
            gsap.fromTo(visible,
                { autoAlpha: 0, y: 28 },
                { autoAlpha: 1, y: 0, duration: .6, ease: 'expo.out', stagger: .06,
                  delay: hidden.length ? .18 : 0 }
            );

            if (countEl) countEl.textContent = visible.length;
            ScrollTrigger.refresh();
        });
    });
})();
</script>
