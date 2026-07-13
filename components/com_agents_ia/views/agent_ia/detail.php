<?php
$agentPhoto        = $agent_ia->getPhoto()         ? "images/agents_ia/" . $agent_ia->getPhoto()         : "images/banner.jpg";
$agentPhotoBanner  = $agent_ia->getPhotoBanniere() ? "images/agents_ia/" . $agent_ia->getPhotoBanniere() : $agentPhoto;
$agentPhotoHero     = $agent_ia->getPhotoHero()     ? "images/agents_ia/" . $agent_ia->getPhotoHero()     : $agentPhoto;
$agentPhotoFullBody = $agent_ia->getPhotoFullBody() ? "images/agents_ia/" . $agent_ia->getPhotoFullBody() : $agentPhoto;

// Les blocs "photo" générés dans le Contenu principal (section capacités / cercle
// d'intégrations) référencent des jetons plutôt qu'une URL en dur, pour rester
// synchronisés avec les champs Photo Hero / Full Body / Photo principale de l'admin.
$agentTexte = str_replace(
    ['{{FULL_BODY_PHOTO}}', '{{MAIN_PHOTO}}'],
    [$siteURL . $agentPhotoFullBody, $siteURL . $agentPhoto],
    $agent_ia->getTexte()
);
?>

<!-- ===== HERO (Attention) ===== -->
<section class="wm-hero agent-ia-hero" <?= $agent_ia->getPhotoBanniere() ? 'style="background-image:url(' . $siteURL . $agentPhotoBanner . ');background-size:cover;background-position:center;"' : ''; ?>>
    <?php if (!$agent_ia->getPhotoBanniere()): ?>
    <canvas id="hero-canvas"></canvas>
    <div class="wm-hero-grid" aria-hidden="true">
        <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
            <defs><pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"><path d="M 60 0 L 0 0 0 60" fill="none" stroke="#8b6a22" stroke-width="0.5"/></pattern></defs>
            <rect width="1440" height="900" fill="url(#grid)"/>
            <line x1="0" y1="900" x2="1440" y2="0" stroke="#8b6a22" stroke-width="0.4"/>
        </svg>
    </div>
    <?php else: ?>
    <div style="position:absolute;inset:0;background:rgba(0,0,0,.52);"></div>
    <?php endif; ?>
    <div class="container">
        <div class="wm-hero-inner">
            <div>
                <div class="wm-hero-label"><?= $agent_ia->getTitre(); ?></div>
                <h1 class="sh-h1"><?php echo !empty($agent_ia->getH1()) ? $agent_ia->getH1() : $agent_ia->getTitre(); ?></h1>
                <p class="wm-hero-sub rv d1"><?= strip_tags($agent_ia->getExtrait()); ?></p>
                <div class="wm-hero-ctas rv d2">
                    <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
                        <div class="sb-label"><span class="sb-hint"><?= $lang['IA_PACK2_BTN'][$_SESSION['lang']]; ?></span></div>
                        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
                    </a>
                    <a href="#agent-content" class="sb sb-compact sb-invert" role="button">
                        <div class="sb-label"><span class="sb-hint"><?= $lang['SVC_CTA_EN_SAVOIR_PLUS'][$_SESSION['lang']]; ?></span></div>
                        <div class="sb-knob"><i class="fal fa-arrow-down"></i></div>
                    </a>
                </div>
            </div>
            <?php if (($agent_ia->getPhotoHero() || $agent_ia->getPhoto()) && !$agent_ia->getPhotoBanniere()): ?>
            <div class="agent-ia-hero-img">
                <img src="<?= $siteURL . $agentPhotoHero; ?>" alt="<?= $agent_ia->getTitre(); ?>">
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<section class="breadcrumb-sec">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $siteURL; ?>"><i class="fal fa-home"></i> <?= $lang['BREADCRUMB_HOME'][$_SESSION['lang']]; ?></a></li>
                <li class="breadcrumb-item"><a href="<?= $siteURL; ?>index.php?option=com_agents_ia"><?= $lang['MQ2_SOLUTIONS_IA'][$_SESSION['lang']]; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $agent_ia->getTitre(); ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- ===== CONTENU PRINCIPAL (Interest + Desire) ===== -->
<section class="page-template agent-ia-content" id="agent-content">
    <div class="container">
        <div class="service-content">
            <?= $agentTexte; ?>
        </div>
    </div>
</section>

<!-- ===== CTA STICKY (Action) ===== -->
<div class="agent-ia-sticky-cta">
    <video class="agent-ia-sticky-cta-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
        <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
    </video>
    <div class="container">
        <div class="sticky-cta-inner">
            <div class="sticky-cta-copy">
                <h2 class="sec-title"><?= $lang['AGENT_STICKY_CTA_PREFIX'][$_SESSION['lang']]; ?> <em><?= $agent_ia->getTitre(); ?></em> <?= $lang['AGENT_STICKY_CTA_SUFFIX'][$_SESSION['lang']]; ?></h2>
                <p class="sticky-cta-text"><?= $lang['AGENT_STICKY_CTA_TEXT'][$_SESSION['lang']]; ?></p>
            </div>
            <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
                <div class="sb-label"><span class="sb-hint"><?= $lang['AGENT_CTA_DEMARRER'][$_SESSION['lang']]; ?></span></div>
                <div class="sb-knob"><i class="fal fa-rocket"></i></div>
            </a>
        </div>
    </div>
</div>

<!-- ===== FAQ ===== -->
<?php if (!empty($faqs) || !empty($faqs2)): ?>
<section class="faq" id="faq">
  <div class="container">
    <div class="sec-label rv"><?= $lang['SVC_SECTION_FAQ_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?= $lang['SVC_SECTION_FAQ_TITLE'][$_SESSION['lang']]; ?></h2>
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
<?php endif; ?>

<!-- ===== RÉALISATIONS ===== -->
<?php if (!empty($references)): ?>
<section class="portfolio" id="work">
    <div class="container">
        <div class="sec-label rv">Selected Work</div>
        <h2 class="sec-title rv d1"><?= $lang['SVC_SECTION_REALISATIONS'][$_SESSION['lang']]; ?></h2>
        <div class="port-grid rv d2">
            <?php foreach (array_slice($references, 0, 3) as $index => $ref): ?>
            <?php $classes = ['p-meridian tall', 'p-luminis', 'p-corvus']; ?>
            <div class="port-item <?= $classes[$index]; ?>">
                <a href="<?= $ref->getLink(); ?>" class="port-bg">
                    <img src="<?= $siteURL; ?>images/references/<?= $ref->getPhoto(); ?>" alt="<?= $ref->getNomClient(); ?>">
                </a>
                <div class="port-gfx"></div>
                <div class="port-overlay"></div>
                <a href="<?= $ref->getLink(); ?>" class="port-arrow"><i class="fas fa-arrow-right"></i></a>
                <div class="port-body">
                    <span class="port-tag"><?= $ref->getSiteWeb(); ?></span>
                    <h3 class="port-title"><?= $ref->getNomClient(); ?></h3>
                    <p class="port-sub"><?= $ref->getExtrait(); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-12 mt-5 text-center">
            <a href="<?= $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
                <div class="sb-label"><span class="sb-hint"><?= $lang['SVC_CTA_VOIR_PLUS_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
                <div class="sb-knob"><i class="fal fa-trophy"></i></div>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===== TECHNOLOGIES ===== -->
<?php if (!empty($tools)): ?>
<section class="trust" id="trust">
    <div class="trust-head container text-center">
        <h2 class="sec-title rv d1"><?= $lang['SVC_SECTION_TECH_TITLE'][$_SESSION['lang']]; ?></h2>
        <p><?= $lang['SVC_SECTION_TECH_SUBTITLE'][$_SESSION['lang']]; ?></p>
    </div>
    <div class="trust-rows">
        <div class="trust-row">
            <div class="trust-inner go-l">
                <?php foreach ($tools as $tool): ?>
                <div class="trust-item">
                    <img class="img-partner" src="<?= $siteURL; ?>images/tools/<?= $tool->getPhoto(); ?>" alt="<?= $tool->getTitre(); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="trust-row">
            <div class="trust-inner go-r">
                <?php foreach ($tools as $tool): ?>
                <div class="trust-item">
                    <img class="img-partner" src="<?= $siteURL; ?>images/tools/<?= $tool->getPhoto(); ?>" alt="<?= $tool->getTitre(); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ===== TÉMOIGNAGES ===== -->
<?php if (!empty($testimonials)): ?>
<?php include('includes/testimonials.php'); ?>
<?php endif; ?>

<!-- ===== PARTENAIRES ===== -->
<?php if (!empty($partners)): ?>
<section class="trust" id="trust-partners">
    <div class="trust-head container">
        <div class="sec-label rv"><?= $lang['SVC_SECTION_PARTENAIRES_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv d1"><?= $lang['SVC_SECTION_PARTENAIRES_TITLE'][$_SESSION['lang']]; ?></h2>
    </div>
    <div class="trust-rows">
        <div class="trust-row">
            <div class="trust-inner go-l">
                <?php foreach ($partners as $partner): ?>
                <div class="trust-item">
                    <img class="img-partner" src="<?= $siteURL; ?>images/partners/<?= $partner->getPhoto(); ?>" alt="<?= $partner->getTitre(); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if (!empty($partners2)): ?>
        <div class="trust-row">
            <div class="trust-inner go-r">
                <?php foreach ($partners2 as $partner): ?>
                <div class="trust-item">
                    <img class="img-partner" src="<?= $siteURL; ?>images/partners/<?= $partner->getPhoto(); ?>" alt="<?= $partner->getTitre(); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/lenis@1.2.3/dist/lenis.min.js"></script>
<script>
(function () {
  var lenis = new Lenis({
    duration: 1.2,
    easing: function (t) { return Math.min(1, 1.001 - Math.pow(2, -10 * t)); },
    smooth: true,
    smoothTouch: false,
  });

  function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
  requestAnimationFrame(raf);

  /* Smooth-scroll anchor links inside agent content */
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var id = a.getAttribute('href').slice(1);
      var target = document.getElementById(id);
      if (target) { e.preventDefault(); lenis.scrollTo(target, { offset: -80 }); }
    });
  });

  /* Glass 3D tilt — cartes "problème", chat concierge et KPI chiffrés */
  var canTilt = window.matchMedia('(hover: hover)').matches
    && !window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (canTilt) {
    var tiltTargets = document.querySelectorAll('.aic-pain, .aic-chat, .aic-kpi-item');
    tiltTargets.forEach(function (el) {
      var max = el.classList.contains('aic-chat') ? 7 : 5;
      el.addEventListener('mousemove', function (e) {
        var r = el.getBoundingClientRect();
        var px = (e.clientX - r.left) / r.width;
        var py = (e.clientY - r.top) / r.height;
        var rx = (0.5 - py) * 2 * max;
        var ry = (px - 0.5) * 2 * max;
        el.style.transform = 'perspective(1000px) rotateX(' + rx.toFixed(2) + 'deg) rotateY(' + ry.toFixed(2) + 'deg) scale3d(1.02,1.02,1.02)';
      });
      el.addEventListener('mouseleave', function () { el.style.transform = ''; });
    });
  }
})();
</script>
