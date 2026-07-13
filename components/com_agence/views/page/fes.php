<div class="agence-ville-page">
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
        <h1 class="sh-h1 rv"><?php echo $lang['AGENCE_FES_H1'][$_SESSION['lang']]; ?></h1>
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
        <div class="sec-label"><?= $lang['AGENCE_CTX_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sh-ctx-title rv"><?php echo $lang['AGENCE_FES_CTXTITLE'][$_SESSION['lang']]; ?></h2>
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
          <div class="sh-fcard-lbl"><?= $lang['AGENCE_STAT_MARQUES'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">350+</div>
          <div class="sh-fcard-lbl"><?= $lang['AGENCE_STAT_PROJETS'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">+16ans</div>
          <div class="sh-fcard-lbl"><?= $lang['AGENCE_STAT_EXPERTISE'][$_SESSION['lang']]; ?></div>
        </div>
        <div class="sh-fcard fc4">
          <div class="sh-fcard-val">10 Pays</div>
          <div class="sh-fcard-lbl"><?= $lang['AGENCE_STAT_STUDIOS'][$_SESSION['lang']]; ?></div>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="why-agence page-template">
        <div class="container my-4 why-choose-section">
        <div class="row">
            <div class="col-sm-12">
              <h2 class="sec-label rv"><?php echo $lang['AGENCE_FES_POURQUOI'][$_SESSION['lang']]; ?></h2>
              <p class="why-agence-p mb-4"><?php echo $lang['AGENCE_FES_INTRO'][$_SESSION['lang']]; ?></p>
            </div>
          </div>
          <div class="row">
          <div class="col-sm-4 p-0">
          <div class="item-process">
          <div class="imgbox"><img alt="Agence Marketing Digital Fès" src="<?php echo $siteURL; ?>images/main.webp" /></div>
          <span class="num"><img alt="Agence communication Fès" src="<?php echo $siteURL; ?>images/inspiration2.png" /></span>

          <h3><?php echo $lang['AGENCE_EXPERTISE_LBL'][$_SESSION['lang']]; ?></h3>

          <p>
              <?php echo $lang['AGENCE_FES_EXPERTISE'][$_SESSION['lang']]; ?>
          </p>
          </div>
          </div>

          <div class="col-sm-4 p-0">
          <div class="item-process active">
          <div class="imgbox"><img alt="Agence communication Fès" src="<?php echo $siteURL; ?>images/main.webp" /></div>
          <span class="num"><img alt="Agence communication Fès" src="<?php echo $siteURL; ?>images/expertise1.png" /></span>

          <h3><?php echo $lang['AGENCE_STRATEGIES_LBL'][$_SESSION['lang']]; ?></h3>

          <p>
              <?php echo $lang['AGENCE_FES_STRATEGIES'][$_SESSION['lang']]; ?>
          </p>
          </div>
          </div>

          <div class="col-sm-4 p-0">
          <div class="item-process">
          <div class="imgbox"><img alt="Agence marketing Fès" src="<?php echo $siteURL; ?>images/main.webp" /></div>
          <span class="num"><img alt="Agence marketing Fès" src="<?php echo $siteURL; ?>images/support3.png" /></span>

          <h3><?php echo $lang['AGENCE_RESULTS_LBL'][$_SESSION['lang']]; ?></h3>

          <p><?php echo $lang['AGENCE_RESULTS_TEXT'][$_SESSION['lang']]; ?></p>
          </div>
          </div>
          </div>
      </div>

    </section>
<section class="srv-section" id="services-dev">
  <div class="container">
    <div class="services-header">
      <div>
        <div class="sec-label rv"><?php echo $lang['HOME_SRV_DEV_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv d1"><?php echo $lang['HOME_SRV_CORE_TITLE'][$_SESSION['lang']]; ?></h2>
      </div>
    </div>
    <div class="srv-grid rv d2" id="srvGrid3d">

      <div id="owl-core-services" class="owl-carousel owl-theme">

      <!-- Web -->
      <?php $serviceWeb = service::find(38,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-visual">
          <div class="srv-visual-bg">
              <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceWeb->getPhotoBanniere(); ?>" alt="<?php echo $serviceWeb->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag">Web & Front-end</div>
          <div class="srv-visual-num">01</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title"><?php echo $lang['HOME_SRV_DEV_LABEL'][$_SESSION['lang']]; ?> <em>Web</em></h3>
          <p class="srv-desc"><?php echo $serviceWeb->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_WEB_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>React / Next.js & TypeScript</li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>API REST / GraphQL & back-end</li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>SEO technique & Core Web Vitals</li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_WEB_FEAT5'][$_SESSION['lang']]; ?></li>
          </ul>
            <a href="<?php echo $serviceWeb->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_SRV_WEB_CTA'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-laptop-code"></i></div>
            </a>
        </div>
      </div>

      <!-- Mobile -->
      <?php $serviceMobile = service::find(39,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-visual">
          <div class="srv-visual-bg">
            <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceMobile->getPhoto(); ?>" alt="<?php echo $serviceMobile->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag">iOS & Android</div>
          <div class="srv-visual-num">02</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title"><?php echo $lang['HOME_SRV_MOBILE_TITLE'][$_SESSION['lang']]; ?></h3>
          <p class="srv-desc"><?php echo $serviceMobile->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>iOS & Android natif / React Native</li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>UI/UX mobile-first & micro-animations</li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_MOBILE_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_MOBILE_FEAT4'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_MOBILE_FEAT5'][$_SESSION['lang']]; ?></li>
          </ul>
            <a href="<?php echo $serviceMobile->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_SRV_MOBILE_CTA'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-mobile"></i></div>
            </a>
        </div>
      </div>

      <!-- SaaS -->
      <?php $serviceSaaS = service::find(1,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-visual">
          <div class="srv-visual-bg">
            <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceSaaS->getPhoto(); ?>" alt="<?php echo $serviceSaaS->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag"><?php echo $lang['HOME_SRV_SAAS_TAG'][$_SESSION['lang']]; ?></div>
          <div class="srv-visual-num">03</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title"><?php echo $lang['HOME_SRV_SAAS_TITLE'][$_SESSION['lang']]; ?></h3>
          <p class="srv-desc"><?php echo $serviceSaaS->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT2'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT4'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT5'][$_SESSION['lang']]; ?></li>
          </ul>
            <a href="<?php echo $serviceSaaS->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_SRV_SAAS_CTA'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-desktop"></i></div>
            </a>
        </div>
      </div>

      <!-- AI -->
      <?php $serviceIA = service::find(17,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-visual">
          <div class="srv-visual-bg">
             <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceIA->getPhoto(); ?>" alt="<?php echo $serviceIA->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag"><?php echo $lang['HOME_SRV_IA_TAG'][$_SESSION['lang']]; ?></div>
          <div class="srv-visual-num">04</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title"><?php echo $lang['HOME_SRV_IA_TITLE'][$_SESSION['lang']]; ?></h3>
          <p class="srv-desc"><?php echo $serviceIA->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT2'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT4'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT5'][$_SESSION['lang']]; ?></li>
          </ul>
            <a href="<?php echo $serviceIA->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_SRV_IA_CTA'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-robot"></i></div>
            </a>
        </div>
      </div>

      </div>

    </div>
  </div>
</section>

<script>
(function(){
  var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var cards = document.querySelectorAll('#srvGrid3d .srv-card');
  if(rm || !cards.length) return;

  cards.forEach(function(card){
    card.addEventListener('mousemove', function(e){
      var r = card.getBoundingClientRect();
      var x = e.clientX - r.left, y = e.clientY - r.top;
      var px = x / r.width, py = y / r.height;
      card.style.setProperty('--mx', (px * 100) + '%');
      card.style.setProperty('--my', (py * 100) + '%');
      var rx = (py - .5) * -10;
      var ry = (px - .5) * 10;
      card.style.transition = 'box-shadow .45s cubic-bezier(0.23,1,0.32,1),border-color .45s';
      card.style.transform = 'perspective(1400px) rotateX(' + rx.toFixed(2) + 'deg) rotateY(' + ry.toFixed(2) + 'deg) translateY(-6px) scale(1.015)';
    });

    card.addEventListener('mouseleave', function(){
      card.style.transition = 'transform .55s cubic-bezier(0.23,1,0.32,1),box-shadow .45s,border-color .45s';
      card.style.transform = '';
    });
  });
})();
</script>
<section class="portfolio" id="work">
          <div class="container">
            <div class="sec-label rv">Selected Work</div>
            <h2 class="sec-title rv d1"><?php echo $lang['HOME_PORTFOLIO_TITLE'][$_SESSION['lang']]; ?></h2>
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
                <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['HOME_VOIR_REALISATIONS'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_VOIR_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
                  <div class="sb-knob"><i class="fal fa-trophy"></i></div>
                </a>
            </div>
        </div>
        </section>

<section class="trust" id="trust">
  <div class="trust-head container">
    <div class="sec-label rv"><?php echo $lang['HOME_PARTNERS_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['HOME_TRUST_TITLE'][$_SESSION['lang']]; ?></h2>
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
    <h2 class="sec-title rv d1"><?php echo $lang['HOME_AGENCIES_TITLE'][$_SESSION['lang']]; ?></h2>
  </div>
  <div class="agencies-list">

    <div class="agency-band ab-sf rv">
      <img src="<?php echo $siteURL; ?>images/marrakech.jpg" alt="London">
      <span class="agency-num">01</span>
      <div class="container">
        <div class="agency-content" data-px="0.13">
          <div class="agency-tag"><?php echo $lang['HOME_AGENCY_MAROC'][$_SESSION['lang']]; ?></div>
          <h3 class="agency-city">Marrakech</h3>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:<?php echo $config->getTel(); ?>"><?php echo $config->getTel(); ?></a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo $config->getEmail(); ?>"><?php echo $config->getEmail(); ?></a></li>
            <li><i class="fas fa-location-dot"></i><p><?php echo $config->getAdresse(); ?></p></li>
          </ul>
          <a href="<?php echo $pageContact->getLink(); ?>" class="agency-link"><?php echo $lang['HOME_PRENDRE_CONTACT'][$_SESSION['lang']]; ?> <i class="fas fa-arrow-right fa-xs"></i></a>
        </div>
      </div>
    </div>

    <div class="agency-band ab-ldn rv">
      <img src="<?php echo $siteURL; ?>images/london.webp" alt="London">
      <span class="agency-num">02</span>
      <div class="container">
        <div class="agency-content" data-px="0.13">
          <div class="agency-tag"><?php echo $lang['AGENCE_ANGLETERRE'][$_SESSION['lang']]; ?></div>
          <h3 class="agency-city"><?php echo $lang['HOME_AGENCY_LONDRE'][$_SESSION['lang']]; ?></h3>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:+44524423156">+44 5 24 42 31 56</a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:contact@helloworldlabel.uk">contact@helloworldlabel.uk</a></li>
            <li><i class="fas fa-location-dot"></i><p>Hello World (London) Ltd, 3rd Floor, 86-90 Paul Street, London EC2A 4NE</p></li>
          </ul>
          <a href="<?php echo $pageContact->getLink(); ?>" class="agency-link"><?php echo $lang['HOME_PRENDRE_CONTACT'][$_SESSION['lang']]; ?> <i class="fas fa-arrow-right fa-xs"></i></a>
        </div>
      </div>
    </div>

    <div class="agency-band ab-dxb rv">
      <img src="<?php echo $siteURL; ?>images/dubai.webp" alt="Dubai">
      <span class="agency-num">03</span>
      <div class="container">
        <div class="agency-content" data-px="0.13">
          <div class="agency-tag"><?php echo $lang['HOME_AGENCY_MOYEN_ORIENT'][$_SESSION['lang']]; ?></div>
          <h3 class="agency-city">Dubai</h3>
          <ul class="agency-details">
            <li><i class="fas fa-phone"></i><a href="tel:+971543399752">+971 (0)54 393 9752</a></li>
            <li><i class="fas fa-envelope"></i><a href="mailto:contact@helloworldlabel.ae">contact@helloworldlabel.ae</a></li>
            <li><i class="fas fa-location-dot"></i><p>Dubai Silicon Oasis, DDP, Building A, Dubai, United Arab Emirates</p></li>
          </ul>
          <a href="<?php echo $pageContact->getLink(); ?>" class="agency-link"><?php echo $lang['HOME_PRENDRE_CONTACT'][$_SESSION['lang']]; ?> <i class="fas fa-arrow-right fa-xs"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>
</div>
