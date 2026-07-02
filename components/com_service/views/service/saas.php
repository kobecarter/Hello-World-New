<style>
header.hdr-light:not(.scrolled) .hdr-nav a{color:rgba(247,245,242,.45)}
header.hdr-light:not(.scrolled) .hdr-nav a:hover,header.hdr-light:not(.scrolled) .hdr-nav a.active{color:rgba(247,245,242,.9)}
header.hdr-light:not(.scrolled) .logo-hw img{filter:brightness(0) invert(1) opacity(.85)}
header.hdr-light:not(.scrolled) .burger i{background:var(--bg)}
header.hdr-light:not(.scrolled) .lang-btn{border-color:rgba(247,245,242,.18);color:rgba(247,245,242,.5)}

/* SAAS HERO */
.sp-hero{position:relative;min-height:100vh;display:flex;align-items:center;background:#0a0d14;overflow:hidden}
.sp-hero-dots{position:absolute;inset:0;z-index:0;background-image:radial-gradient(circle,rgba(139,106,34,.18) 1px,transparent 1px);background-size:42px 42px;opacity:.5}
.sp-hero-glow{position:absolute;top:-200px;right:-200px;width:700px;height:700px;background:radial-gradient(circle,rgba(139,106,34,.07) 0%,transparent 65%);z-index:0}
.sp-hero-glow2{position:absolute;bottom:-100px;left:-100px;width:500px;height:500px;background:radial-gradient(circle,rgba(0,181,210,.04) 0%,transparent 65%);z-index:0}
.sp-hero .container{position:relative;z-index:2;padding-top:12rem;padding-bottom:8rem}
.sp-hero-kpi{display:flex;gap:0;border:1px solid rgba(247,245,242,.06);border-radius:14px;overflow:hidden;margin-bottom:4rem;width:fit-content}
.sp-kpi{padding:.9rem 2rem;border-right:1px solid rgba(247,245,242,.06);text-align:center}
.sp-kpi:last-child{border-right:none}
.sp-kpi-val{font-family:var(--fd);font-weight:200;font-size:1.8rem;color:#f5f3f0;line-height:1;letter-spacing:-.03em}
.sp-kpi-val span{color:var(--gold2);font-size:.6em}
.sp-kpi-lbl{font-family:var(--fm);font-size:.5rem;letter-spacing:.2em;text-transform:uppercase;color:rgba(247,245,242,.22);margin-top:.2rem}
.sp-hero-label{font-size:.6rem;letter-spacing:.46em;text-transform:uppercase;color:rgba(139,106,34,.7);display:flex;align-items:center;gap:.9rem;margin-bottom:2rem}
.sp-hero-label::before{content:'';width:36px;height:1px;background:rgba(139,106,34,.7)}
.sp-hero-title{font-family:var(--fm);font-weight:300;font-size:clamp(3.2rem,7vw,9rem);line-height:.9;letter-spacing:-.04em;color:#f5f3f0;margin-bottom:2.5rem}
.sp-hero-title em{display:block;font-style:italic;color:var(--gold2);font-family:var(--fd);font-weight:200;font-size:.75em}
.sp-hero-sub{font-size:.92rem;font-weight:300;color:rgba(247,245,242,.38);max-width:520px;line-height:1.9;margin-bottom:3.5rem}

</style>

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
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un devis" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander un devis</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
        
            <a href="#offres" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir nos offres" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir nos offres</span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div>
            </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3">
        <img src="<?php echo $siteURL; ?>images/services/<?php echo $service->getPhotoBanniere() ?>" alt="">
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

<!-- OFFERINGS -->
<section class="sp-offers" id="offres">
  <div class="container">
    <div class="sec-label">Nos Offres</div>
    <h2 class="sec-title rv">Trois façons de <em>construire</em><br>votre produit</h2>
    <div class="sp-offer-grid">
      <div class="sp-offer sp-offer-1 rv">
        <div class="sp-offer-visual">
         <img src="<?php echo $siteURL; ?>images/saas-mvp.webp" alt="MVP SaaS">
        </div>
        <div class="sp-offer-body">
          <span class="sp-offer-tag">Lancement rapide</span>
          <div class="sp-offer-title">MVP SaaS</div>
          <p class="sp-offer-desc">Validez votre concept en 6 semaines avec un produit fonctionnel prêt à être présenté à vos premiers utilisateurs et investisseurs.</p>
          <ul class="sp-offer-feats">
            <li class="sp-offer-feat">Authentification & gestion utilisateurs</li>
            <li class="sp-offer-feat">Tableau de bord & interface admin</li>
            <li class="sp-offer-feat">Paiements intégrés (Stripe)</li>
            <li class="sp-offer-feat">Architecture scalable dès le jour 1</li>
          </ul>
        </div>
      </div>

      <div class="sp-offer sp-offer-2 rv d1">
        <div class="sp-offer-visual">
         <img src="<?php echo $siteURL; ?>images/platform-metier.webp" alt="Plateformes métiers">
        </div>
        <div class="sp-offer-body">
          <span class="sp-offer-tag">Sur mesure</span>
          <div class="sp-offer-title">Plateformes métiers</div>
          <p class="sp-offer-desc">Solutions complexes multi-tenant avec workflows, automatisations et intégrations aux systèmes existants (ERP, CRM, comptabilité).</p>
          <ul class="sp-offer-feats">
            <li class="sp-offer-feat">Architecture multi-tenant</li>
            <li class="sp-offer-feat">Moteur de workflows configurable</li>
            <li class="sp-offer-feat">Intégrations ERP / CRM / Comptabilité</li>
            <li class="sp-offer-feat">API REST &amp; Webhooks documentés</li>
          </ul>
        </div>
      </div>

      <div class="sp-offer sp-offer-3 rv d2">
        <div class="sp-offer-visual">
         <img src="<?php echo $siteURL; ?>images/Dashboards_analytics.webp" alt="Dashboards analytics">
        </div>
        <div class="sp-offer-body">
          <span class="sp-offer-tag">Data Intelligence</span>
          <div class="sp-offer-title">Dashboards analytics</div>
          <p class="sp-offer-desc">Tableaux de bord temps réel, reporting avancé et alertes intelligentes. Vos KPIs accessibles depuis n'importe quel appareil, à n'importe quelle heure.</p>
          <ul class="sp-offer-feats">
            <li class="sp-offer-feat">Visualisations interactives (D3, Chart.js)</li>
            <li class="sp-offer-feat">Connecteurs (SQL, API, Google Sheets)</li>
            <li class="sp-offer-feat">Alertes email / Slack / SMS</li>
            <li class="sp-offer-feat">Export PDF & rapports automatisés</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- METHODOLOGY -->
<section class="sp-method">
  <div class="container">
    <div class="sec-label">Notre méthode</div>
    <h2 class="sec-title rv">Agile, <em>itératif</em>,<br>orienté résultat</h2>
    <div class="sp-method-grid">
      <div class="sp-step rv">
        <span class="sp-step-num">01</span>
        <div class="sp-step-title">Discovery Sprint</div>
        <p class="sp-step-desc">1 semaine pour cadrer le produit. Ateliers Product Design, user stories, architecture technique et roadmap priorisée.</p>
      </div>
      <div class="sp-step rv d1">
        <span class="sp-step-num">02</span>
        <div class="sp-step-title">MVP Sprint</div>
        <p class="sp-step-desc">4 à 6 semaines de développement en sprints de 2 semaines. Démos régulières, feedback continu et livraisons incrémentales.</p>
      </div>
      <div class="sp-step rv d2">
        <span class="sp-step-num">03</span>
        <div class="sp-step-title">Launch &amp; Scale</div>
        <p class="sp-step-desc">Déploiement cloud (AWS/GCP/Azure), monitoring, CI/CD et load testing. Infrastructure dimensionnée pour 10x votre croissance.</p>
      </div>
      <div class="sp-step rv d3">
        <span class="sp-step-num">04</span>
        <div class="sp-step-title">Product Evolution</div>
        <p class="sp-step-desc">Retainer produit mensuel : nouvelles features, A/B tests, optimisations perf et intégration des retours utilisateurs.</p>
      </div>
    </div>
  </div>
</section>

<section class="portfolio" id="work">
  <div class="container">
    <div class="sec-label rv">Cas d'utilisation</div>
    <h2 class="sec-title rv d1">Nos dernières <em>réalisations</em></h2>
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
    <div class="sec-label">Stack technique</div>
    <h2 class="sec-title rv">Technologies <em>battle-tested</em><br>à l'échelle</h2>
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

<!-- CTA -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Lancer votre produit</div>
    <h2 class="sec-title">Votre MVP prêt<br><em>en 6 semaines</em></h2>
    <p class="cta-sub">Partagez votre idée. Nous vous livrons un prototype en 48h et un MVP fonctionnel en 6 semaines.</p>
    <div class="cta-btns">
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Démarrer votre MVP" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Démarrer votre MVP</span></div>
          <div class="sb-knob"><i class="fal fa-desktop"></i></div>
        </a>
    
        <a href="#offres" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir le marketplace IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Voir le marketplace IA</span></div>
          <div class="sb-knob"><i class="fal fa-shopping-basket"></i></div>
        </a>
            
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>