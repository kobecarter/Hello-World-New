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
        <h1 class="sh-h1 rv">Agence marketing <em>digital</em> Rabat</h1>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($page->getExtrait()); ?></p>
        <div class="sh-cta-row">
              <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Configurer votre agent" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Demander un audit technique</span> </div>
                  <div class="sb-knob"><i class="fal fa-bolt"></i></div>
                </a>
            
                <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Recevoir l'audit" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Voir les réalisations</span></div>
                  <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
                </a>   
        </div>
      </div>
      <div class="wm-hero-side rv d3 wm-hero-side-banner">
        <img src="<?php echo $siteURL . $banner; ?>" alt="<?php echo $page->getTitre() ?>">
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
<section class="sh-context">
  <div class="container">
    <div class="sh-context-inner">

      <div>
        <div class="sec-label">Votre agence</div>
        <h2 class="sh-ctx-title rv"><strong>Agence de commnunication </strong> à Rabat</h2>
        <div class="sh-ctx-body rv d1">
          <?php echo $page->getTexte(); ?>
        </div>
        
      </div>

      <!-- CSS ART Visual -->
      <div class="sh-ctx-visual rv d2">
        <div class="sh-ctx-blob"></div>
        <div class="sh-ctx-blob2"></div>
        <div class="sh-ctx-center"><div class="sh-ctx-cross">✦</div></div>
        <div class="sh-fcard fc1">
          <div class="sh-fcard-val">+80</div>
          <div class="sh-fcard-lbl">Marques créées</div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">350+</div>
          <div class="sh-fcard-lbl">Projets livrés</div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">+16ans</div>
          <div class="sh-fcard-lbl">D'expertise créative</div>
        </div>
        <div class="sh-fcard fc4">
          <div class="sh-fcard-val">10 Pays</div>
          <div class="sh-fcard-lbl">Studios créatifs</div>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="why-agence page-template">
        <div class="container my-4 why-choose-section">
        <div class="row">
            <div class="col-sm-12">
              <h2 class="sec-label rv">Pourquoi choisir <br><em>Hello World Agency à Rabat ?</em></h2>
              <p class="why-agence-p mb-4">Choisir la bonne <b>agence de communication digitale à Rabat</b> est une décision stratégique pour votre entreprise. Chez Hello World Agency, nous combinons expertise locale, approche sur-mesure et résultats concrets pour accompagner votre croissance digitale. Voici trois raisons de nous faire confiance :</p>
            </div>
          </div>
          <div class="row">
          <div class="col-sm-4 p-0">
          <div class="item-process">
          <div class="imgbox"><img alt="Agence Marketing Digital Rabat" src="<?php echo $siteURL; ?>images/main.webp" /></div>
          <span class="num"><img alt="Agence communication Rabat" src="<?php echo $siteURL; ?>images/inspiration2.png" /></span>
          
          <h3>Expertise locale</h3>
          
          <p>
              Nous connaissons parfaitement le marché, les comportements des consommateurs et les spécificités digitales de la région. Nos stratégies prennent en compte les tendances locales et les particularités du marché rabati, garantissant des campagnes pertinentes et efficaces.
          </p>
          </div>
          </div>
          
          <div class="col-sm-4 p-0">
          <div class="item-process active">
          <div class="imgbox"><img alt="Agence communication Rabat" src="<?php echo $siteURL; ?>images/main.webp" /></div>
          <span class="num"><img alt="Agence communication Rabat" src="<?php echo $siteURL; ?>images/expertise1.png" /></span>
          
          <h3>Stratégies personnalisées</h3>
          
          <p>
              Chaque entreprise est unique. Nous créons des <b>stratégies personnalisées en SEO</b>, <b>gestion des réseaux sociaux, publicité digitale et marketing de contenu</b>, adaptées à vos objectifs et à votre audience locale. Notre approche permet de renforcer votre visibilité et votre notoriété à Rabat et au-delà.
          </p>
          </div>
          </div>
          
          <div class="col-sm-4 p-0">
          <div class="item-process">
          <div class="imgbox"><img alt="Agence marketing Rabat" src="<?php echo $siteURL; ?>images/main.webp" /></div>
          <span class="num"><img alt="Agence marketing Rabat" src="<?php echo $siteURL; ?>images/support3.png" /></span>
          
          <h3>Accompagnement orienté résultats</h3>
          
          <p>Notre priorité est de transformer vos investissements digitaux en visibilité, engagement et conversions. Nous suivons vos performances en temps réel et ajustons nos actions pour maximiser votre retour sur investissement et atteindre vos objectifs commerciaux.</p>
          </div>
          </div>
          </div>
      </div>

    </section>
<section class="services" id="services">
  <div class="container">
    <div class="services-header">
      <div>
        <div class="sec-label rv">Notre expertise</div>
        <h2 class="sec-title rv d1">Ce que nous <em>construisons</em></h2>
      </div>
    </div>
    <div class="svc-grid rv d1" id="svcGrid3d">
      <?php $icones = array('fal fa-desktop','fal fa-robot','fal fa-wand-magic','fal fa-phone-laptop','fal fa-search','fal fa-pencil-paintbrush'); ?>
      <?php $cpt = 0; ?>
      <?php foreach($services as $service): ?>
      <div class="svc-card">
        <div class="svc-card-border"></div>
        <a href="<?php echo $service->getLink(); ?>">
        <div class="svc-num">0<?php echo $cpt+1; ?></div>
        <div class="svc-icon"><i class="<?php echo $icones[$cpt]; ?>"></i></div>
        <h3 class="svc-name"><?php echo $service->getTitre(); ?></h3>
        <p class="svc-desc"><?php echo strip_tags($service->getTexteAccueil()); ?></p>
        <span class="svc-more">En savoir plus <i class="fa fa-arrow-right fa-xs"></i></span>
        </a>
      </div>
      <?php $cpt++; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<section class="portfolio" id="work">
          <div class="container">
            <div class="sec-label rv">Selected Work</div>
            <h2 class="sec-title rv d1">Nos dernières <em>réalisations</em></h2>
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
            <div class="col-sm-12 mt-5 text-center">
                <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir plus de réalisations" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Voir plus de réalisations</span></div>
                  <div class="sb-knob"><i class="fal fa-trophy"></i></div>
                </a>
            </div>
        </div>
        </section>

<section class="trust" id="trust">
  <div class="trust-head container">
    <div class="sec-label rv">Partenaires</div>
    <h2 class="sec-title rv d1">Ils nous font <em>confiance</em></h2>
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
<section class="agencies">
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
          <div class="agency-tag">Maroc</div>
          <h3 class="agency-city">Marrakech</h3>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:<?php echo $config->getTel(); ?>"><?php echo $config->getTel(); ?></a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo $config->getEmail(); ?>"><?php echo $config->getEmail(); ?></a></li>
            <li><i class="fas fa-location-dot"></i><p><?php echo $config->getAdresse(); ?></p></li>
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
          <div class="agency-tag">Angleterre</div>
          <h3 class="agency-city">Londre</h3>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:+44524423156">+44 5 24 42 31 56</a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:contact@helloworldlabel.uk">contact@helloworldlabel.uk</a></li>
            <li><i class="fas fa-location-dot"></i><p>Hello World (London) Ltd, 3rd Floor, 86-90 Paul Street, London EC2A 4NE</p></li>
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
          <div class="agency-tag">Moyen-Orient</div>
          <h3 class="agency-city">Dubai</h3>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:+971543399752">+971 (0)54 393 9752</a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:contact@helloworldlabel.ae">contact@helloworldlabel.ae</a></li>
            <li><i class="fas fa-location-dot"></i><p>Dubai Silicon Oasis, DDP, Building A, Dubai, United Arab Emirates</p></li>
          </ul>
          <a href="<?php echo $pageContact->getLink(); ?>" class="agency-link">Prendre contact <i class="fas fa-arrow-right fa-xs"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>