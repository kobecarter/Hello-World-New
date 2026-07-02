
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
        <h1 class="sh-h1 rv on">Nos <em>agences</em></h1>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($page->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un devis" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander un audit technique</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
        
            <a href="<?php echo $pageReference->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir nos offres" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir les réalisations</span></div>
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
  <span class="mi"><span class="d"></span>Web &amp; Mobile</span>
  <span class="mi"><span class="d"></span><span class="h">Solutions IA</span></span>
  <span class="mi"><span class="d"></span>SaaS &amp; Produits</span>
  <span class="mi"><span class="d"></span><span class="h">Brand Experience</span></span>
  <span class="mi"><span class="d"></span>140+ Déploiements</span>
  <span class="mi"><span class="d"></span><span class="h">ROI dès 7 semaines</span></span>
  <span class="mi"><span class="d"></span>Digital Marketing Agency</span>
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span>Web &amp; Mobile</span>
  <span class="mi"><span class="d"></span><span class="h">Solutions IA</span></span>
  <span class="mi"><span class="d"></span>SaaS &amp; Produits</span>
  <span class="mi"><span class="d"></span><span class="h">Brand Experience</span></span>
  <span class="mi"><span class="d"></span>140+ Déploiements</span>
  <span class="mi"><span class="d"></span><span class="h">ROI dès 7 semaines</span></span>
  <span class="mi"><span class="d"></span>Digital Marketing Agency</span>
</div></div>
<section class="agencies" id="agencies">
  <div class="container">
    <div class="sec-label rv">International</div>
    <h2 class="sec-title rv d1">Nos <em>agences</em></h2>
  </div>
  <div class="agencies-list">

    <div class="agency-band ab-sf rv">
      <img src="<?php echo $siteURL; ?>images/marrakech.jpg" alt="London">
      <span class="agency-num">01</span>
      <div class="container">
        <div class="agency-content" data-px="0.13">
          <h3 class="agency-city">Maroc</h3>
          <div class="agency-tag">
            <a href="<?php echo $marrakech->getLink(); ?>">Marrakech</a> - 
            <a href="<?php echo $casa->getLink(); ?>">Casablanca</a> - 
            <a href="<?php echo $rabat->getLink(); ?>">Rabat</a> - 
            <a href="<?php echo $tanger->getLink(); ?>">Tanger</a> - 
            <a href="<?php echo $agadir->getLink(); ?>">Agadir</a> - 
            <a href="<?php echo $fes->getLink(); ?>">Fès</a>
          </div>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:<?php echo $config->getTel(); ?>"><?php echo $config->getTel(); ?></a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo $config->getEmail(); ?>"><?php echo $config->getEmail(); ?></a></li>
            <li><i class="fas fa-map-marker"></i><p><?php echo $config->getAdresse(); ?></p></li>
          </ul>
          <a href="<?php echo $pageContact->getLink(); ?>" class="agency-link">Prendre contact <i class="fas fa-arrow-right fa-xs"></i></a>
        </div>
      </div>
    </div>

    <div class="agency-band ab-ldn rv">
      <img src="<?php echo $siteURL; ?>images/london.webp" alt="London">
      <span class="agency-num">02</span>
      <div class="container">
        <div class="agency-content" data-px="0.13">
          <h3 class="agency-city">Europe</h3>
          <div class="agency-tag">Londre</div>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:+44524423156">+44 5 24 42 31 56</a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:contact@helloworldlabel.uk">contact@helloworldlabel.uk</a></li>
            <li><i class="fas fa-map-marker"></i><p>Hello World (London) Ltd, 3rd Floor, 86-90 Paul Street, London EC2A 4NE</p></li>
          </ul>
          <a href="<?php echo $pageContact->getLink(); ?>" class="agency-link">Prendre contact <i class="fas fa-arrow-right fa-xs"></i></a>
        </div>
      </div>
    </div>

    <div class="agency-band ab-dxb rv">
      <img src="<?php echo $siteURL; ?>images/dubai.webp" alt="Dubai">
      <span class="agency-num">03</span>
      <div class="container">
        <div class="agency-content" data-px="0.13">
          
          <h3 class="agency-city">Moyen-Orient</h3>
          <div class="agency-tag">Dubai</div>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:+971543399752">+971 (0)54 393 9752</a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:contact@helloworldlabel.ae">contact@helloworldlabel.ae</a></li>
            <li><i class="fas fa-map-marker"></i><p>Dubai Silicon Oasis, DDP, Building A, Dubai, United Arab Emirates</p></li>
          </ul>
          <a href="<?php echo $pageContact->getLink(); ?>" class="agency-link">Prendre contact <i class="fas fa-arrow-right fa-xs"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>