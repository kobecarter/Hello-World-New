<style>
h2{margin-top:0;margin-bottom:.5rem}
html{scroll-behavior:auto;overflow-x:hidden}
body{background:var(--w);color:var(--t);font-family:var(--sans);overflow-x:hidden}
a{text-decoration:none;color:inherit}
img,video{display:block;max-width:100%}
@media(prefers-reduced-motion:reduce){*{animation-duration:.01ms!important;transition-duration:.01ms!important}}

#prog{position:fixed;top:0;left:0;height:3px;background:var(--g);z-index:9000;transform-origin:left;transform:scaleX(0)}



@media(max-width:900px){.nav-main{display:none}}
.ni{position:relative}
.nl{display:flex;align-items:center;gap:5px;font-size:.66rem;font-weight:600;letter-spacing:.06em;text-transform:uppercase;color:var(--t2);padding:8px 14px;border-radius:8px;cursor:pointer;transition:color .2s,background .2s;white-space:nowrap;user-select:none}
.nl:hover,.ni.open .nl{color:var(--mg);background:rgba(139,37,104,.05)}
.nc-arr{font-size:.45rem;transition:transform .25s var(--expo)}
.ni.open .nc-arr{transform:rotate(180deg)}
.hcta{font-size:.66rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#fff;padding:11px 24px;border-radius:100px;background:var(--g);margin-left:12px;white-space:nowrap;transition:transform .15s,box-shadow .25s,opacity .2s}
.hcta:hover{box-shadow:0 10px 32px rgba(139,37,104,.38);opacity:.92}
.hcta:active{transform:scale(.97)}
.burger{display:none;width:36px;height:36px;border:1.5px solid rgba(0,0,0,.12);border-radius:8px;background:none;cursor:pointer;align-items:center;justify-content:center;flex-direction:column;gap:4px}
.burger span{display:block;width:16px;height:1.5px;background:var(--t)}
@media(max-width:900px){.burger{display:flex}}

.mp{position:absolute;top:calc(100%+12px);left:50%;transform:translateX(-50%);min-width:680px;padding:28px;border-radius:22px;display:none;opacity:0;pointer-events:none;background:rgba(15,14,26,.96);backdrop-filter:blur(28px);-webkit-backdrop-filter:blur(28px);border:1px solid rgba(255,255,255,.07)}
.mp-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:8px}
.mc{display:flex;gap:12px;align-items:flex-start;padding:12px;border-radius:12px;transition:background .18s;cursor:pointer}
.mc:hover{background:rgba(255,255,255,.04)}
.mc-ico{width:36px;height:36px;border-radius:10px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:1rem;background:linear-gradient(135deg,var(--mg3),var(--cy3))}
.mc-t{font-size:.7rem;font-weight:700;color:rgba(255,255,255,.85);margin-bottom:3px}
.mc-d{font-size:.6rem;color:rgba(255,255,255,.32);line-height:1.5}
.mp-ft{margin-top:18px;padding-top:14px;border-top:1px solid rgba(255,255,255,.06);display:flex;align-items:center;justify-content:space-between}
.mp-ft-l{font-size:.6rem;color:rgba(255,255,255,.22)}
.mp-ft-r{font-size:.62rem;font-weight:700;background:var(--g);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;display:flex;align-items:center;gap:5px}

/* ══ HERO ════════════════════════════════════════════════════
   White background.
   Layout: [text 28vw] | [avatar 36vw centered] | [text 28vw]
   Left zone:   0  → 32vw  →  text at left:3vw
   Avatar zone: 32vw → 68vw
   Right zone:  68vw → 100vw → text at left:calc(50%+19vw)
══════════════════════════════════════════════════════════════ */
.main-container{position:relative;height:100vh;height:100svh;overflow:hidden;background:var(--w)}

.main-container::before{
  content:'';position:absolute;inset:0;
  background:
    radial-gradient(ellipse 38% 70% at 12% 50%,rgba(139,37,104,.05),transparent),
    radial-gradient(ellipse 38% 70% at 88% 50%,rgba(76,195,208,.04),transparent);
  z-index:1;pointer-events:none;
}

/* Avatar column — always centered, video scrubbed */
.hero-avatar-panel{
  position:absolute;top:0;left:50%;
  transform:translateX(-50%);
  width:36vw;height:100%;overflow:hidden;z-index:2;
}
.hero-avatar-panel video{width:100%;height:100%;object-fit:cover;object-position:center center}

/* Fade avatar edges into white */
.hero-avatar-panel::after{
  content:'';position:absolute;inset:0;
  background:
    linear-gradient(to right,var(--w) 0%,transparent 16%,transparent 84%,var(--w) 100%),
    linear-gradient(to bottom,rgba(255,255,255,.5) 0%,transparent 10%,transparent 90%,rgba(255,255,255,.55) 100%);
  z-index:3;pointer-events:none;
}
/* Thin brand-colour accent lines at avatar edges */
.hero-avatar-panel::before{
  content:'';position:absolute;top:12%;bottom:12%;left:0;
  width:1px;background:linear-gradient(to bottom,transparent,rgba(139,37,104,.3),transparent);
  z-index:4;pointer-events:none;
}
.avatar-right-line{
  position:absolute;top:12%;bottom:12%;right:0;
  width:1px;background:linear-gradient(to bottom,transparent,rgba(76,195,208,.25),transparent);
  z-index:4;pointer-events:none;
}

/* Dots */
.svc-dots{position:absolute;right:28px;top:50%;transform:translateY(-50%);z-index:10;display:flex;flex-direction:column;gap:8px}
.svc-dot{width:4px;height:4px;border-radius:2px;background:rgba(0,0,0,.13);transition:background .35s,height .35s var(--expo)}
.svc-dot.active{background:var(--mg);height:22px}

/* Side label */
.svc-side-deco{position:absolute;left:22px;top:50%;transform:translateY(-50%) rotate(-90deg);font-family:var(--mono);font-size:.42rem;letter-spacing:.28em;text-transform:uppercase;color:rgba(0,0,0,.18);white-space:nowrap;z-index:5;pointer-events:none}

/* Slide block */
.slide-block{
  position:absolute;top:50%;left:3vw;
  transform:translateY(-50%);
  z-index:10;width:28vw;max-width:420px;
  display:flex;flex-direction:column;align-items:flex-start;text-align:left;
}
/* Right-side block stays left-aligned — text always reads left-to-right */
.slide-block[data-side="right"]{align-items:flex-start;text-align:left}
@media(max-width:900px){
  /* Avatar fills the full mobile screen */
  .hero-avatar-panel{width:100%;left:0;transform:none}

  /* Text block becomes a frosted-glass card at the bottom of the hero */
  .slide-block{
    width:auto;
    left:5vw!important;
    right:5vw;
    bottom:100px;
    top:auto;
    transform:none;
    align-items:flex-start;
    text-align:left;
    /* Glass card */
    background:rgba(255,255,255,.68);
    backdrop-filter:blur(22px) saturate(1.7);
    -webkit-backdrop-filter:blur(22px) saturate(1.7);
    border:1px solid rgba(255,255,255,.82);
    border-radius:22px;
    padding:22px 20px 18px;
    box-shadow:0 8px 40px rgba(0,0,0,.10),inset 0 1px 0 rgba(255,255,255,.9);
  }
  /* Inside the glass card, right-side layout flips back to left */
  .slide-block[data-side="right"]{align-items:flex-start;text-align:left}
  .slide-block[data-side="right"] .slide-title{flex-direction:row}
  .slide-block[data-side="right"] .slide-service::after{transform-origin:left}
  /* Tighten spacing inside card */
  .slide-title{margin-bottom:10px}
  .slide-sub{margin-bottom:9px}
  .slide-index{margin-bottom:10px}
}

/* Tagline — char animated via CSS only */
.slide-title{font-family:var(--mono);font-size:clamp(.54rem,.78vw,.7rem);font-weight:400;letter-spacing:0;text-transform:uppercase;color:rgba(0,0,0,.38);margin-bottom:14px;display:flex;align-items:center;gap:10px;line-height:1.4}
.slide-title::before{content:'';width:18px;height:1px;background:rgba(0,0,0,.18);flex-shrink:0}
.slide-title .sc{display:inline-block;opacity:0;transform:translateY(5px);animation:char-in .45s var(--expo) forwards;animation-delay:calc(var(--ci)*28ms)}
@keyframes char-in{to{opacity:1;transform:none}}

/* Service name — large gradient */
@keyframes shimmer{0%{background-position:200% center}100%{background-position:-200% center}}
.slide-service{
  font-weight:200;
  font-size:clamp(2.6rem,5vw,6.5rem);
  line-height:.9;letter-spacing:-.04em;
  background:linear-gradient(135deg,var(--mg) 0%,var(--cy) 100%);
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  margin-bottom:16px;position:relative;display:block;
}
.slide-service::before{content:attr(data-text);position:absolute;inset:0;background:linear-gradient(90deg,transparent 0%,rgba(255,255,255,.2) 40%,transparent 60%);background-size:200% 100%;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmer 3s linear infinite;pointer-events:none}
.slide-service::after{content:'';position:absolute;bottom:-5px;left:0;right:0;height:1.5px;background:linear-gradient(90deg,var(--mg),var(--cy));border-radius:1px;transform:scaleX(0);transform-origin:left;opacity:0}
.slide-block[data-side="right"] .slide-service::after{transform-origin:left}
.slide-service.hl-active::after{animation:hl-line .75s var(--expo) .04s forwards}
@keyframes hl-line{from{transform:scaleX(0);opacity:0}to{transform:scaleX(1);opacity:.55}}

/* Subtitle */
.slide-sub{font-size:clamp(1.4rem,1.4vw,1.4rem);font-weight:300;color:var(--t2);line-height:1.7;max-width:28ch;margin-bottom:26px}

/* Counter */
.slide-index{font-size:1rem;color:rgba(0,0,0,.25);display:flex;align-items:center;gap:8px;margin-bottom:22px}
.slide-index-cur{font-size:2rem;font-weight:200;letter-spacing:-.02em;color:var(--mg);line-height:1}
.slide-index-sep{color:rgba(0,0,0,.12);font-size:.55rem}

/* CTA */
.slide-link{display:inline-flex;align-items:center;gap:8px;font-family:var(--sans);font-size:.6rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--t);padding:10px 22px;border-radius:100px;border:1.5px solid rgba(0,0,0,.12);background:rgba(0,0,0,.03);transition:border-color .25s,transform .2s var(--expo),box-shadow .25s,color .2s;position:relative;overflow:hidden}
.slide-link::before{content:'';position:absolute;inset:0;background:var(--g);opacity:0;transition:opacity .3s}
.slide-link:hover{border-color:transparent;box-shadow:0 8px 32px rgba(139,37,104,.28);transform:translateY(-2px);color:#fff}
.slide-link:hover::before{opacity:1}
.slide-link:active{transform:scale(.97)}
.slide-link>*{position:relative;z-index:1}
.sl-arr{transition:transform .2s var(--expo)}
.slide-link:hover .sl-arr{transform:translateX(4px)}

/* Scroll hint */
/* Glass-pill scroll indicator — centred over the avatar column (dark video)
   so frosted-white glass reads clearly against the footage              */
.scroll-down-btn{
  position:absolute;bottom:32px;left:50%;
  transform:translateX(-50%);
  z-index:20;cursor:pointer;border:none;
  background:rgb(0 0 0 / 60%);
  backdrop-filter:blur(18px) saturate(1.7);
  -webkit-backdrop-filter:blur(18px) saturate(1.7);
  border:1px solid rgba(255,255,255,.18);
  border-radius:100px;
  padding:14px 20px 2px 16px;
  display:flex;flex-direction:column;align-items:center;gap:8px;
  box-shadow:0 4px 24px rgba(0,0,0,.14),inset 0 1px 0 rgba(255,255,255,.3);
  transition:background .25s,border-color .25s,box-shadow .25s;
}
.scroll-down-btn:hover{
  background:rgba(255,255,255,.28);
  border-color:rgba(255,255,255,.5);
  box-shadow:0 6px 32px rgba(0,0,0,.18),inset 0 1px 0 rgba(255,255,255,.4);
}
.sd-label{font-family:var(--sans);font-size:.5rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:rgb(255 255 255)}
.sd-chevron{position:relative;width:44px;height:22px}
.sd-chevron::before,.sd-chevron::after{content:'';position:absolute;top:0;margin-top:11px;width:50%;height:1.5px;background:rgb(255 255 255);border-radius:1px}
.sd-chevron::before{left:0;transform-origin:right center;transform:rotate(38deg)}
.sd-chevron::after{right:0;transform-origin:left center;transform:rotate(-38deg)}
@keyframes sd-hint{0%,30%{transform:translateX(-50%) translateY(0);opacity:.5}65%{transform:translateX(-50%) translateY(6px);opacity:.9}100%{transform:translateX(-50%) translateY(0);opacity:.5}}
.scroll-down-btn{animation:sd-hint 2.4s cubic-bezier(.37,0,.63,1) infinite}
</style>

<!-- ══ HERO ════════════════════════════════════════════════════ -->
<div class="main-container" id="main-container">

  <div class="hero-avatar-panel" id="hero-avatar-panel">
    <video id="main-video" muted playsinline preload="auto" poster="<?php echo $siteURL; ?>assets/frames/avatar_01.jpg">
      <source src="<?php echo $siteURL; ?>assets/avatar-web.mp4" type="video/mp4">
    </video>
    <div class="avatar-right-line"></div>
  </div>

  <div class="svc-dots" id="svc-dots">
    <div class="svc-dot active"></div>
    <div class="svc-dot"></div>
    <div class="svc-dot"></div>
    <div class="svc-dot"></div>
  </div>

  <div class="svc-side-deco">Hello World Agency · Digital Intelligence</div>

  <div class="slide-block" id="slide-block" data-side="left">
    <div  class="slide-title"   id="td-title">Développement digital</div>
    <div  class="slide-service" id="td-service" data-text="Web &amp; Mobile">Web &amp; Mobile</div>
    <div  class="slide-sub"     id="td-sub">Développement Site Web &amp; Mobile</div>
    <div  class="slide-index">
      <span class="slide-index-cur" id="td-index">01</span>
      <span class="slide-index-sep">—</span>
      <span>04</span>
    </div>
    <a href="<?php echo $serviceWebMobile->getLink(); ?>" id="td-link" class="sb sb-compact" data-auto-reset="true" role="slider" tabindex="0" aria-label="Découvrir" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
      <div class="sb-label"><span class="sb-hint">Découvrir</span></div>
      <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
    </a>
  </div>

  <button class="scroll-down-btn" id="scroll-down-btn" aria-label="Scroll">
    <span class="sd-label">Scroll</span>
    <div class="sd-chevron"></div>
  </button>

</div>

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


<!--
<section class="hero" id="hero">
  <canvas id="hero-canvas"></canvas>
  <span class="px-ghost" data-px="0.26" style="font-size:clamp(22rem,44vw,62rem);bottom:-6rem;right:-3rem;color:rgba(247,245,242,.016)" aria-hidden="true">01</span>
  <div class="hero-body" data-px="-0.16">
    <h1 class="hero-title">
      <span class="ht-1">L'intelligence qui</span>
      <span class="ht-2"><span class="ht-accent">propulse votre </span>croissance</span>
    </h1>
    <button class="explore-btn" onclick="document.querySelector('.marquee').scrollIntoView({behavior:'smooth'})">EXPLORE</button>
  </div>
  <div class="hero-foot">
    <a href="<?php echo $pageService->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Voir les solutions" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
      <div class="sb-label"><span class="sb-hint">Voir les solutions</span></div>
      <div class="sb-knob">
        <i class="fal fa-robot"></i>
      </div>
    </a>

    <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Demander un audit IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
      <div class="sb-label"><span class="sb-hint">Demander un audit IA</span></div>
      <div class="sb-knob">
        <i class="fal fa-search"></i>
      </div>
    </a>
  </div>
</section>
<div class="marquee">
  <div class="marquee-track">
    <span class="mq-item">iOS &amp; ANDROID APPS<span class="mq-dot"></span></span>
    <span class="mq-item">CUSTOM AI MODELS<span class="mq-dot"></span></span>
    <span class="mq-item">SAAS PLATFORMS<span class="mq-dot"></span></span>
    <span class="mq-item">AI AUTOMATION<span class="mq-dot"></span></span>
    <span class="mq-item">WEB APPLICATIONS<span class="mq-dot"></span></span>
    <span class="mq-item">DATA INTELLIGENCE<span class="mq-dot"></span></span>
    <span class="mq-item">AI AGENTS<span class="mq-dot"></span></span>
    <span class="mq-item">LLM FINE-TUNING<span class="mq-dot"></span></span>
    <span class="mq-item">iOS &amp; ANDROID APPS<span class="mq-dot"></span></span>
    <span class="mq-item">CUSTOM AI MODELS<span class="mq-dot"></span></span>
    <span class="mq-item">SAAS PLATFORMS<span class="mq-dot"></span></span>
    <span class="mq-item">AI AUTOMATION<span class="mq-dot"></span></span>
    <span class="mq-item">WEB APPLICATIONS<span class="mq-dot"></span></span>
    <span class="mq-item">DATA INTELLIGENCE<span class="mq-dot"></span></span>
    <span class="mq-item">AI AGENTS<span class="mq-dot"></span></span>
    <span class="mq-item">LLM FINE-TUNING<span class="mq-dot"></span></span>
  </div>
</div>
-->

<section class="statement">
  <span class="px-ghost" data-px="0.22" style="font-size:clamp(12rem,28vw,40rem);bottom:-1.5rem;right:-1rem;color:rgba(0,0,0,.022)" aria-hidden="true">HW</span>
  <div class="container">
    <p class="rv">
      <span class="s-muted">Au-delà du simple code, </span>nous concevons l'intelligence
      <span class="s-muted"> qui animera les produits </span><span class="s-gold">les plus importants de demain.</span>
    </p>
  </div>
</section>

<section class="srv-section" id="services-dev">
  <div class="container">
    <div class="services-header">
      <div>
        <div class="sec-label rv">Développement</div>
        <h2 class="sec-title rv d1">Nos services <em>core</em></h2>
      </div>
    </div>
    <div class="srv-grid rv d2" id="srvGrid3d">

      <div id="owl-core-services" class="owl-carousel owl-theme">

      <!-- Web -->
      <?php $serviceWeb = service::find(38,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-card-border"></div>
        <div class="srv-visual">
          <div class="srv-visual-bg">
              <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceWeb->getPhotoBanniere(); ?>" alt="<?php echo $serviceWeb->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag">Web & Front-end</div>
          <div class="srv-visual-num">01</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title">Développement <em>Web</em></h3>
          <p class="srv-desc"><?php echo $serviceWeb->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Design UI/UX sur-mesure</li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>React / Next.js & TypeScript</li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>API REST / GraphQL & back-end</li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>SEO technique & Core Web Vitals</li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Déploiement cloud & CI/CD</li>
          </ul>
            <a href="<?php echo $serviceWeb->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint">Démarrer un projet</span></div>
              <div class="sb-knob"><i class="fal fa-laptop-code"></i></div>
            </a>
        </div>
      </div>

      <!-- Mobile -->
      <?php $serviceMobile = service::find(39,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-card-border"></div>
        <div class="srv-visual">
          <div class="srv-visual-bg">
            <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceMobile->getPhoto(); ?>" alt="<?php echo $serviceMobile->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag">iOS & Android</div>
          <div class="srv-visual-num">02</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title">Applications <em>Mobile</em></h3>
          <p class="srv-desc"><?php echo $serviceMobile->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>iOS & Android natif / React Native</li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>UI/UX mobile-first & micro-animations</li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Push, mode offline & biométrie</li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Paiement in-app (Stripe / IAP)</li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Publication stores & mises à jour OTA</li>
          </ul>
            <a href="<?php echo $serviceMobile->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint">Voir les apps</span></div>
              <div class="sb-knob"><i class="fal fa-mobile"></i></div>
            </a>
        </div>
      </div>

      <!-- SaaS -->
      <?php $serviceSaaS = service::find(1,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-card-border"></div>
        <div class="srv-visual">
          <div class="srv-visual-bg">
            <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceSaaS->getPhoto(); ?>" alt="<?php echo $serviceSaaS->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag">SaaS & Plateformes</div>
          <div class="srv-visual-num">03</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title">Plateformes <em>SaaS</em></h3>
          <p class="srv-desc"><?php echo $serviceSaaS->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Architecture multi-tenant scalable</li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Auth, RBAC & onboarding guidé</li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Facturation & abonnements Stripe</li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Analytics & tableau de bord intégré</li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Monitoring, alertes & SLA garanti</li>
          </ul>
            <a href="<?php echo $serviceSaaS->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint">Construire mon SaaS</span></div>
              <div class="sb-knob"><i class="fal fa-desktop"></i></div>
            </a>
        </div>
      </div>

      <!-- AI -->
      <?php $serviceIA = service::find(17,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-card-border"></div>
        <div class="srv-visual">
          <div class="srv-visual-bg">
             <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceIA->getPhoto(); ?>" alt="<?php echo $serviceIA->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag">Agents IA</div>
          <div class="srv-visual-num">04</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title">Agents <em>IA</em></h3>
          <p class="srv-desc"><?php echo $serviceIA->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Architecture multi-tenant scalable</li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Auth, RBAC & onboarding guidé</li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Facturation & abonnements Stripe</li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Analytics & tableau de bord intégré</li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Monitoring, alertes & SLA garanti</li>
          </ul>
            <a href="<?php echo $serviceIA->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint">Construire mon agent</span></div>
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

<script>
(function(){
  var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var cards = document.querySelectorAll('#svcGrid3d .svc-card');
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

<!-- ══ POURQUOI NOUS CHOISIR ════════════════════════════════════
     Desktop: title + bullets overlaid on left white zone of image.
     Mobile:  title + description above image (white bg, centred);
              full image (natural ratio, no crop) below;
              bullets overlaid on image left zone. -->
<section id="why-us">

  <!-- Mobile-only: centred header above the image.
       Hidden on desktop — desktop uses .why-copy overlay instead. -->
  <div class="why-mobile-hd">
    <h2 class="why-h">Pourquoi<em>Hello World</em></h2>
    <p class="why-p">Nous sommes le seul partenaire qui combine expertise IA de pointe et développement produit full-stack — du prototype à la mise en production, dans les délais.</p>
  </div>

  <div class="why-img-wrap">

    <!-- Image sets container height; hit zones % of this element -->
    <img src="<?php echo $siteURL; ?>images/background-why-v2-web.jpg"
         class="why-bg-img"
         alt="Hello World Agency — équipe humaine et robots IA en collaboration"
         loading="lazy"
         width="2400" height="1593">

    <!-- Gradient fade on the left transition zone -->
    <div class="why-fade"></div>

    <!-- Desktop copy overlay — heading + paragraph hidden on mobile
         (they live in .why-mobile-hd for mobile readers) -->
    <div class="why-copy">
      <div class="sec-label rv">Hello World</div>
      <h2 class="sec-title rv d1">Pourquoi<br><em>Hello World</em></h2>

      <p class="why-p" aria-hidden="true">Nous sommes le seul partenaire qui combine expertise IA de pointe et développement produit full-stack — du prototype à la mise en production, dans les délais.</p>
      <div class="why-pts">
        <div class="why-pt">
          <span class="why-pt-k">16 ans d'expérience &amp; ~900 clients</span>
          <span class="why-pt-v">Une solidité et un savoir-faire éprouvés à travers près de 900 projets livrés avec succès pour propulser votre croissance.</span>
        </div>
        <div class="why-pt">
          <span class="why-pt-k">Expertise 360° unique</span>
          <span class="why-pt-v">Une maîtrise totale de l'ensemble de vos besoins : IA, SaaS, Brand Experience, Création Digitale et Sites Web réunis chez un seul partenaire.</span>
        </div>
        <div class="why-pt">
          <span class="why-pt-k">Agilité &amp; ROI mesurable</span>
          <span class="why-pt-v">Un déploiement en production en quelques semaines seulement et des résultats concrets visibles dès les 8 premières semaines.</span>
        </div>
        <div class="why-pt">
          <span class="why-pt-k">Équipe dédiée en direct</span>
          <span class="why-pt-v">Une communication transparente et sans intermédiaires avec des experts qui connaissent parfaitement votre domaine.</span>
        </div>
      </div>
    </div>

    <!-- Hit zones — permanent #a100f2 glow marks them as interactive.
         GSAP shows .wsh-card (black bg) on hover. -->
    <div class="why-stat-hit" data-stat="pays" aria-label="12 Pays couverts">
      <div class="wsh-card">
        <span class="wsh-num">12</span>
        <span class="wsh-lbl">Pays couverts</span>
      </div>
    </div>
    <div class="why-stat-hit" data-stat="ia" aria-label="24+ IA en production">
      <div class="wsh-card">
        <span class="wsh-num">24+</span>
        <span class="wsh-lbl">IA en production</span>
      </div>
    </div>
    <div class="why-stat-hit" data-stat="retention" aria-label="98% Rétention clients">
      <div class="wsh-card">
        <span class="wsh-num">98%</span>
        <span class="wsh-lbl">Rétention clients</span>
      </div>
    </div>
    <div class="why-stat-hit" data-stat="projets" aria-label="900+ Projets livrés">
      <div class="wsh-card">
        <span class="wsh-num">900+</span>
        <span class="wsh-lbl">Projets livrés</span>
      </div>
    </div>

  </div>
</section>

<!--
<section class="why-hw" id="why">
  <div class="container">
    <div class="why-grid">
      <div class="rv">
        <div class="sec-label why-label">Pourquoi nous choisir</div>
        <h2 class="sec-title">Pourquoi <br><em>Hello World</em></h2>
        <p class="why-intro">Nous sommes le seul partenaire qui combine expertise IA de pointe et développement produit full-stack — du prototype à la mise en production, dans les délais.</p>
        <ul class="why-list">
          <li class="why-item">
            <span class="why-ico"><i class="fa fa-check"></i></span>
            <span class="why-txt"><strong>Expertise unique</strong> — IA + mobile + web réunis en un seul partenaire dédié à vos objectifs</span>
          </li>
          <li class="why-item">
            <span class="why-ico"><i class="fa fa-check"></i></span>
            <span class="why-txt"><strong>ROI mesurable</strong> — résultats concrets et indicateurs de performance dès les 8 premières semaines</span>
          </li>
          <li class="why-item">
            <span class="why-ico"><i class="fa fa-check"></i></span>
            <span class="why-txt"><strong>Équipe dédiée</strong> — communication directe, sans intermédiaires, avec une équipe qui connaît votre domaine</span>
          </li>
          <li class="why-item">
            <span class="why-ico"><i class="fa fa-check"></i></span>
            <span class="why-txt"><strong>Agilité totale</strong> — de l'idée au premier déploiement en production en quelques semaines, pas en mois</span>
          </li>
        </ul>
      </div>
      <div data-px="-0.09">
        <div class="bubble-scene rv d2">
          <div class="bub-wrap">
            <div class="bub bub-4"></div>
            <div class="bub bub-3"></div>
            <div class="bub bub-2"></div>
            <div class="bub bub-1"></div>
          </div>
          <div class="bl bl-1">
            <span class="bub-val" id="s4">0</span>
            <div class="bub-lbl">Pays couverts</div>
          </div>
          <div class="bl bl-2">
            <span class="bub-val" id="s3">0<span class="bub-suf">+</span></span>
            <div class="bub-lbl">IA en production</div>
          </div>
          <div class="bl bl-3">
            <span class="bub-val" id="s2">0<span class="bub-suf">%</span></span>
            <div class="bub-lbl">Rétention clients</div>
          </div>
          <div class="bl bl-4">
            <span class="bub-val" id="s1">0<span class="bub-suf">+</span></span>
            <div class="bub-lbl">Projets livrés</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
-->

<section class="ai-sol" id="ai-solutions">
  <div class="container">
    <div class="services-header">
      <div>
        <div class="sec-label rv">Notre Offre IA</div>
        <h2 class="sec-title rv d1">Nos solutions <em>IA</em></h2>
      </div>
    </div>
    <div class="ai-grid rv d2">
      <?php $icones = array('fal fa-headset','fal fa-magic','fab fa-whatsapp','fal fa-concierge-bell','fal fa-phone-office','fal fa-pencil-alt'); ?>
      <?php $cpt = 0; ?>
      <?php foreach($servicesIA as $service): ?>
      <div class="ai-card">
        <a href="<?php echo $service->getLink(); ?>">
        <div class="ai-icon-wrap">
          <div class="ai-card-icon">
            <i class="<?php echo $icones[$cpt]; ?>"></i>
          </div>
        </div>
        <h3 class="ai-card-title"><?php echo $service->getTitre(); ?></h3>
        <p class="ai-card-desc"><?php echo strip_tags($service->getTexteAccueil()); ?></p>
      </a>
      </div>
      <?php $cpt++; ?>
      <?php endforeach; ?>
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
        <a href="<?php echo $references[0]->getLink(); ?>" class="port-overlay"></a>
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
        <a href="<?php echo $references[1]->getLink(); ?>" class="port-overlay"></a>
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
        <a href="<?php echo $references[2]->getLink(); ?>" class="port-overlay"></a>
        <a href="<?php echo $references[2]->getLink(); ?>" class="port-arrow"><i class="fal fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $references[2]->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $references[2]->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $references[2]->getExtrait(); ?></p>
        </div>
      </div>
    </div>
    <div class="mt-5 text-center">
        <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Voir plus de réalisations" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
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

<?php include('includes/testimonials.php'); ?>

<section id="expert">
    <div class="container">
        <div class="sec-label rv">Digital Expert</div>
        <h2 class="sec-title rv d1"><em>Digital</em> Expert</h2>

        <div id="owl-videos" class="owl-carousel owl-theme">
            <?php foreach ($videos as $video): ?>
                <div class="item-video">
                    <div class="imgbox">
                        <a href="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                            data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                            title="<?php echo $video->getTitre(); ?>" data-fancybox><i class="fab fa-youtube"></i></a>
                        <img class="discove-img-video" width="300" height="300"
                            src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>"
                            alt="<?php echo $video->getTitre(); ?>">
                    </div>
                    <div class="textbox">
                        <h3><span><?php echo $video->getTitre(); ?></span></h3>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> <?php echo $video->getLocalisation(); ?></li>
                            <?php if ($video->getDateShooting() != ''): ?>
                                <li><i class="fa fa-calendar"></i> <?php echo normaldate($video->getDateShooting()); ?></li>
                            <?php endif; ?>
                            <li><i class="fa fa-comment"></i> <?php echo nl2br($video->getExtrait()); ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-5 text-center">
                <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Contactez un expert" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Contactez un expert</span></div>
                  <div class="sb-knob"><i class="fal fa-envelope"></i></div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="insights" id="insights">
  <div class="container">

    <div class="insights-header rv">
      <div>
        <div class="sec-label">Insights &amp; Digital Expert</div>
        <h2 class="sec-title">Actualité <em>digitale</em></h2>
      </div>
    </div>

    <div class="insights-main rv d1">

      <!-- Featured episode -->
      <div class="ep-featured">
        <img src="<?php echo $siteURL; ?>images/blog/<?php echo $blogs[0]->getPhoto(); ?>" alt="<?php echo $blogs[0]->getTitre(); ?>">
        <div class="ep-top">
          <span class="ep-show"><?php echo $blogs[0]->getCategorie()->getTitre(); ?></span>
          <!-- <span class="ep-num-tag">EP. 14</span> -->
        </div>
        <h3 class="ep-title-feat"><?php echo $blogs[0]->getTitre(); ?></h3>
        <div class="ep-wave">
          
        </div>
        <div class="ep-foot">
          <span class="ep-meta-d"><?php echo normaldate2($blogs[0]->getDateAdd()); ?></span>
          <a href="<?php echo $blogs[0]->getLink(); ?>" class="ep-play"><i class="fa fa-arrow-right fa-xs"></i><span>lire plus</span></a>
        </div>
      </div>

      <!-- Feed -->
      <div class="insights-feed">
        <?php $cpt = 0; ?>
        <?php foreach($blogs as $blog): ?>
        <?php $cpt++; ?>  
        <?php if($cpt > 1 && $cpt < 5): ?>
        <a href="<?php echo $blog->getLink(); ?>" class="feed-item">
          <span class="feed-cat"><?php echo $blog->getCategorie()->getTitre(); ?></span>
          <p class="feed-title"><?php echo $blog->getTitre(); ?></p>
          <div class="feed-foot">
            <span class="feed-date"><?php echo normaldate2($blog->getDateAdd()); ?></span>
            <i class="fa fa-arrow-right fa-xs feed-arr"></i>
          </div>
        </a>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- Bottom row -->
    <div class="insights-row rv d2">
      <?php $cpt = 0; ?>
        <?php foreach($blogs as $blog): ?>
        <?php $cpt++; ?>  
        <?php if($cpt > 4 && $cpt < 8): ?>
      <article class="insight-card">
        <span class="insight-cat"><?php echo $blog->getCategorie()->getTitre(); ?></span>
        <h4 class="insight-title"><?php echo $blog->getTitre(); ?></h4>
        <div class="insight-foot">
          <span class="insight-date"><?php echo normaldate2($blog->getDateAdd()); ?></span>
          <a href="<?php echo $blog->getLink(); ?>" class="insight-read">En savoir plus <i class="fa fa-arrow-right fa-xs"></i></a>
        </div>
      </article>
      <?php endif; ?>
        <?php endforeach; ?>
    </div>

  </div>
</section>

<section class="trust" id="trust">
  <div class="trust-head container text-center">
    <h2 class="sec-title rv d1">Les <em>technologies</em> et <em>plateformes</em><br>au service de vos projets</h2>
    <p>Nous utilisons les meilleurs outils du marché pour garantir la performance, la sécurité et la croissance de votre business.</p>
  </div>
  <div class="trust-rows">

    <!-- Rangée 1 → gauche -->
    <div class="trust-row">
      <div class="trust-inner go-l">
        <?php foreach($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Rangée 2 → droite (direction opposée) -->
    <div class="trust-row">
      <div class="trust-inner go-r">
        <?php foreach($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

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

<section class="team" id="team">
  <div class="container">
    <div class="sec-label rv">Équipe fondatrice</div>
    <h2 class="sec-title rv d1">Équipe <em>fondatrice</em></h2>
    <div class="team-grid">

      <div class="team-card rv">
        <div class="team-thumb">
          <img src="<?php echo $siteURL; ?>images/team/hamid.webp" alt="Hamid K">
          <div class="team-initials">MC</div>
          <div class="team-geo"></div>
          <div class="team-overlay"></div>
        </div>
        <div class="team-info">
          <div class="team-name">Hamid K</div>
          <div class="team-role">Ceo & Founder</div>
        </div>
      </div>

      <div class="team-card rv d1">
        <div class="team-thumb">
          <img src="<?php echo $siteURL; ?>images/team/zak.webp" alt="Zakaria EL">
          <div class="team-initials">IF</div>
          <div class="team-geo"></div>
          <div class="team-overlay"></div>
        </div>
        <div class="team-info">
          <div class="team-name">Zakaria EL</div>
          <div class="team-role">Co-Founder & IT Manager</div>
        </div>
      </div>

      <div class="team-card rv d2">
        <div class="team-thumb">
          <img src="<?php echo $siteURL; ?>images/team/youssef.webp" alt="Youssef F">
          <div class="team-initials">DO</div>
          <div class="team-geo"></div>
          <div class="team-overlay"></div>
        </div>
        <div class="team-info">
          <div class="team-name">Youssef F</div>
          <div class="team-role">Directeur artistique</div>
        </div>
      </div>
      <div class="team-card rv d3">
        <div class="team-thumb">
          <img src="<?php echo $siteURL; ?>images/team/khadija.webp" alt="Khadija T">
          <div class="team-initials">NS</div>
          <div class="team-geo"></div>
          <div class="team-overlay"></div>
        </div>
        <div class="team-info">
          <div class="team-name">Khadija T</div>
          <div class="team-role">Developpeuse Web</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="brochure">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
          <div class="textbox">
            <div class="sec-label rv">Brochure</div>
            <h2 class="sec-title rv d1">Découvrez Notre <br><em>Brochure</em></h2>
            <p>Découvrez Hello World Agency, votre partenaire en marketing digital au Maroc. À travers notre brochure, explorez nos services, notre expertise et notre approche innovante. Conçue pour être claire et captivante, elle vous guidera facilement vers les solutions qui feront décoller votre projet.</p>
          </div>
      </div>
      <div class="col-sm-4">
        <div class="div-brochure-pdf">
          <a href="#0" class="btn-show-brochure"><img src="<?php echo $siteURL; ?>images/brochure.png" alt="Brochure"></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="faq" id="faq">
  <div class="container">
    <div class="sec-label rv">Questions fréquentes</div>
    <h2 class="sec-title rv d1">Tout ce que vous <em>devez savoir</em></h2>
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
              <p class="faq-ans"><?php echo $faq->getTexte(); ?></p>
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
              <p class="faq-ans"><?php echo $faq->getTexte(); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(14rem,30vw,44rem);bottom:-2rem;right:-1rem;color:rgba(247,245,242,.022)" aria-hidden="true">AI</span>
  <div class="container" style="position:relative;z-index:2">
    <div class="sec-label">Prêt à vous lancer ?</div>
    <h2 class="sec-title" style="text-align:center;margin-bottom:1.5rem">Créons quelque chose<br><em> de remarquable</em></h2>
    <p class="cta-sub">Que vous soyez une startup en phase d'amorçage ou une entreprise du Fortune 500, si vous bâtissez un projet ambitieux, nous voulons en faire partie.</p>
    
    <div class="cta-btns">
        <a href="<?php echo $pageService->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Voir les solutions" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Voir les solutions</span></div>
          <div class="sb-knob"><i class="fal fa-robot"></i></div>
        </a>

        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Demander un audit IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Demander un audit IA</span></div>
          <div class="sb-knob"><i class="fal fa-search"></i></div>
        </a>    
    </div>
  </div>
</section>

<section class="contact" id="contact">
  <div class="container">
    <div class="sec-label rv">Contactez-nous</div>
    <h2 class="sec-title rv d1">Discutons de votre <em>projet</em></h2>
    <div class="contact-grid rv d2">
      <div>
        <p class="contact-lead">Nous collaborons avec des équipes à travers le monde. Présentez-nous votre projet et nous reviendrons vers vous dans les 24 heures pour définir ensemble la première étape de notre collaboration.</p>
        <div class="c-detail">
          <div class="c-ico"><i class="fa fa-envelope"></i></div>
          <div>
            <div class="c-lbl">Email</div>
            <div class="c-val"><?php echo $config->getEmail(); ?></div>
          </div>
        </div>
        <div class="c-detail">
          <div class="c-ico"><i class="fa fa-phone"></i></div>
          <div>
            <div class="c-lbl">Phone</div>
            <div class="c-val"><?php echo $config->getTel(); ?></div>
          </div>
        </div>
        <div class="c-detail">
          <div class="c-ico"><i class="fa fa-map-marker"></i></div>
          <div>
            <div class="c-lbl">Adresse</div>
            <div class="c-val"><?php echo $config->getAdresse(); ?></div>
          </div>
        </div>
      </div>
      <form method="post" action="<?= $siteURL; ?>components/com_contact/controleurs/contact.php?task=quickContact" id="quickContactForm">
        <div class="msgbox"></div>
        <div class="form-2col">
          <div class="form-row">
            <label for="fn">Nom complet</label>
            <input type="text" name="nom" id="fn" placeholder="Nom complet">
          </div>
          <div class="form-row">
            <label for="fe">Email</label>
            <input type="email" name="email" id="email" id="fe" placeholder="you@company.com">
          </div>
        </div>
        <div class="form-2col">
          <div class="form-row">
            <label for="fc">Téléphone</label>
            <input type="text" name="phone" id="tel" placeholder="Téléphone">
          </div>
          <div class="form-row">
            <label for="fbg">Budget</label>
            <select id="fbg" name="budget">
              <option value="" disabled selected>Sélectionner…</option>
                <option>Moins de 10 000 DHs</option>
                <option>10 000 DHs – 30 000 DHs</option>
                <option>30 000 DHs – 80 000 DHs</option>
                <option>80 000 DHs – 200 000 DHs</option>
                <option>200 000 DHs et plus</option>
                <option>À définir ensemble</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <label for="fm">Project Brief</label>
          <textarea name="message" id="fm" placeholder="Présentez-nous votre projet — les solutions à développer, votre calendrier de déploiement et vos objectifs de succès."></textarea>
        </div>
        <!--
        <button type="submit" class="btn-hw" style="width:100%;justify-content:center">
          <span>Envoyer ma demande</span>
          <i class="fa fa-arrow-right"></i>
        </button>
        -->
        
        <div class="sb submit-form" role="slider" tabindex="0" aria-label="Envoyer ma demande" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-fill"></div>
          <div class="sb-label"><span class="sb-hint">Envoyer ma demande</span></div>
          <div class="sb-knob"><i class="fa fa-paper-plane"></i></div>
        </div>
        
      </form>
    </div>
  </div>
</section>

<?php if(isset($sousServices)): ?>
<section class="service-by-cities">
    <div class="container">
      <h2 class="sec-title rv d1 text-center"><em>Proches</em> de vous, où que vous soyez au Maroc</h2>

    <div id="owl-services-cities" class="owl-carousel owl-theme">
    <?php foreach($sousServices as $subService): ?>
    <div class="item-service-city">
        <h3><a href="<?php echo $subService->getLink(); ?>"><?php echo $subService->getTitre(); ?></a></h3>
        <a href="<?php echo $subService->getLink(); ?>">En savoir plus <i class="ti-arrow-right"></i></a>
    </div>
    <?php endforeach; ?>
    </div>
    </div>
</section>
<?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollToPlugin.min.js" defer></script>
<script>
/* deferred: HTML parsing (and image/video downloads) no longer stall on
   the cdnjs round-trip -- this whole block now runs once all deferred
   scripts above have loaded, right before DOMContentLoaded fires. */
document.addEventListener('DOMContentLoaded', function() {
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

/* Prevent iOS address-bar resize from breaking pin geometry */
ScrollTrigger.config({ ignoreMobileResize: true, limitCallbacks: true });

/* Normalise scroll — only needed to stabilise the pinned hero scrub,
   which itself only runs on desktop (see isMobile check below). On
   touch devices this replaces native scrolling with a transform-based
   proxy that breaks position:fixed elements (burger menu, header) and
   can leave the page stuck once you scroll past the hero, so it must
   stay desktop-only.                                                  */
if (!window.matchMedia('(pointer:coarse)').matches) {
  ScrollTrigger.normalizeScroll(true);
}

const clamp = gsap.utils.clamp;
const toArr = gsap.utils.toArray;

/* ════════════════════════════════════════════════════════════
   HERO — 4 services, white bg, avatar centered.

   WHY THE PREVIOUS APPROACH BROKE ON SCROLL-BACK:
   ─────────────────────────────────────────────────
   The old code used tl.add(() => setContent(svc), position) inside
   a scrubbed GSAP timeline. GSAP fires those callbacks whenever the
   playhead CROSSES that position — in EITHER direction.
   Scrolling backward from slide 3 to slide 2 crosses the FORWARD
   callback for slide 3, so setContent(services[2]) fires instead
   of setContent(services[1]). Wrong content every time.

   THE FIX:
   ─────────────────────────────────────────────────
   No timeline at all. A single ScrollTrigger (pin + scrub for video)
   drives onUpdate. The active slide index is computed from
   self.progress every frame. When the index changes — in either
   direction — transitionTo() is called. gsap.killTweensOf() prevents
   competing tweens. Content is always set from the correct index.
════════════════════════════════════════════════════════════ */
(function(){

  const services = [
    { idx:'01', service:'Web & Mobile',     tagline:'Développement digital',    sub:'Développement Site Web & Mobile',             side:'left',  href:'<?php echo $serviceWebMobile->getLink(); ?>' },
    { idx:'02', service:'Solutions IA',     tagline:'Intelligence artificielle', sub:'Solutions IA & Agents par métier et secteur', side:'right', href:'<?php echo $serviceIA->getLink(); ?>' },
    { idx:'03', service:'SaaS & Produits',  tagline:'Plateformes robustes',     sub:'Des plateformes SaaS robustes',               side:'left',  href:'<?php echo $serviceSaaS->getLink(); ?>' },
    { idx:'04', service:'Brand Experience', tagline:'Marketing digital',        sub:'Digital Marketing Agency',                    side:'right', href:'<?php echo $serviceBrandMarketing->getLink(); ?>' },
  ];

  /* Text-block left positions — never overlap the 36vw avatar */
  const POS = {
    left:  '3vw',
    right: 'calc(50% + 19vw)'
  };

  const elTitle   = document.getElementById('td-title');
  const elService = document.getElementById('td-service');
  const elSub     = document.getElementById('td-sub');
  const elIndex   = document.getElementById('td-index');
  const elLink    = document.getElementById('td-link');
  const elBlock   = document.getElementById('slide-block');
  const dots      = document.querySelectorAll('.svc-dot');
  const mainVid   = document.getElementById('main-video');

  /* All text elements as a single array for tween targeting */
  const textEls = [elTitle, elService, elSub, elIndex];

  let currentIdx = 0;

  function triggerHL(){
    elService.classList.remove('hl-active');
    void elService.offsetWidth;
    elService.classList.add('hl-active');
  }

  function animateTagline(text){
    elTitle.innerHTML = '';
    [...text].forEach((ch, i) => {
      const s = document.createElement('span');
      s.className = 'sc';
      s.style.setProperty('--ci', i);
      s.textContent = ch === ' ' ? ' ' : ch;
      elTitle.appendChild(s);
    });
  }

  function setContent(svc){
    animateTagline(svc.tagline);
    elService.textContent = svc.service;
    elService.setAttribute('data-text', svc.service);
    elSub.textContent     = svc.sub;
    elIndex.textContent   = svc.idx;
    elLink.href           = svc.href;
    elBlock.dataset.side  = svc.side;
    triggerHL();
  }

  function transitionTo(idx){
    currentIdx = idx;
    const svc  = services[idx];
    gsap.set(textEls, { opacity:0 });
    setContent(svc);
    gsap.set(elBlock, { left: POS[svc.side] });
    gsap.fromTo(textEls,
      { opacity:0, y:10 },
      { opacity:1, y:0, duration:0.32, ease:'expo.out', stagger:0.04, overwrite:true }
    );
  }

  /* ── Initial state ── */
  gsap.set(elBlock, { left: POS[services[0].side] });
  setContent(services[0]);
  gsap.set(textEls, { opacity:1, y:0 });

  const isMobile = window.matchMedia('(pointer:coarse)').matches;

  if (isMobile) {
    /* ── Mobile / iOS Safari fix ───────────────────────────────────
       On iOS, GSAP pin + ScrollTrigger + video currentTime scrubbing
       are all unreliable: scroll events are throttled during momentum
       scroll, position:fixed breaks during active touch, and iOS
       silently ignores rapid currentTime changes.

       Solution: skip the pin entirely on touch devices.
       Autoplay the video (muted + playsinline already set) and
       rotate slides on a timer so the hero stays animated.
    ──────────────────────────────────────────────────────────────── */
    mainVid.play().catch(() => {});

    let mobileIdx = 0;
    setInterval(() => {
      mobileIdx = (mobileIdx + 1) % services.length;
      dots.forEach((d, i) => d.classList.toggle('active', i === mobileIdx));
      transitionTo(mobileIdx);
    }, 3500);

    document.getElementById('scroll-down-btn').addEventListener('click', () => {
      const mq = document.getElementById('mq');
      if (mq) mq.scrollIntoView({ behavior: 'smooth' });
    });

    return; /* skip desktop ScrollTrigger */
  }

  /* ── Desktop: pin + video scrub ── */
  mainVid.pause();
  mainVid.currentTime = 0;

  let pendingIdx   = -1;
  let pendingCount = 0;

  ScrollTrigger.create({
    trigger: '#main-container',
    start:   'top top',
    end:     `+=${services.length * 950}`,
    pin:     true,
    anticipatePin: 1,
    scrub: 0.6,
    onUpdate(self){
      if(mainVid.readyState >= 2 && mainVid.duration)
        mainVid.currentTime = clamp(0, 4.5, self.progress * 4.5);

      const idx = Math.min(services.length - 1, Math.floor(self.progress * services.length));

      dots.forEach((d, i) => d.classList.toggle('active', i === idx));

      if(idx !== currentIdx){
        if(idx === pendingIdx){
          pendingCount++;
          if(pendingCount >= 2){
            pendingIdx   = -1;
            pendingCount = 0;
            transitionTo(idx);
          }
        } else {
          pendingIdx   = idx;
          pendingCount = 1;
        }
      } else {
        pendingIdx   = -1;
        pendingCount = 0;
      }
    }
  });

  document.getElementById('scroll-down-btn').addEventListener('click', () => {
    const mq = document.getElementById('mq');
    if(mq) gsap.to(window, { scrollTo:{ y:mq, offsetY:0 }, duration:1.1, ease:'expo.inOut' });
  });

})();

/* ══ PROGRESS BAR ════════════════════════════════════════════
   #prog has no markup in the current template (left over from an
   earlier header design) -- guard so scroll doesn't throw on every
   tick until/unless the bar element is reintroduced.              */
const prog = document.getElementById('prog');
if (prog) window.addEventListener('scroll', () => {
  prog.style.transform = `scaleX(${scrollY / (document.body.scrollHeight - innerHeight)})`;
}, { passive:true });

/* ══ HEADER SCROLLED STATE ══════════════════════════════════ */
ScrollTrigger.create({
  start:'top -60', end:99999,
  toggleClass:{ targets:'#navshell', className:'scrolled' }
});

/* ══ POURQUOI — Scroll entrance ══════════════════════════════ */
(function(){
  if(!document.getElementById('why-us')) return;

  ScrollTrigger.create({
    trigger: '#why-us',
    start: 'top 72%',
    once: true,
    onEnter() {
      gsap.from('.why-h',  { y: 36, autoAlpha: 0, duration: 1,   ease: 'expo.out' });
      gsap.from('.why-p',  { y: 22, autoAlpha: 0, duration: .9,  ease: 'expo.out', delay: .1 });
      gsap.from('.why-pt', { x:-20, autoAlpha: 0, stagger: .08, duration: .8, ease: 'expo.out', delay: .2 });
    }
  });
})();

/* ══ MOBILE ACCORDION — why-pts ══════════════════════════════
   Only active at ≤860px. One item open at a time.
   GSAP animates height 0 ↔ auto so no hardcoded pixel values.
   matchMedia listener resets properly on viewport change.      */
(function(){
  const pts = document.querySelectorAll('.why-pt');
  if (!pts.length) return;

  const mm = window.matchMedia('(max-width: 860px)');
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* Close one item */
  function closeItem(pt) {
    pt.classList.remove('is-open');
    gsap.to(pt.querySelector('.why-pt-v'), {
      height: 0, opacity: 0,
      duration: reduced ? 0 : 0.26,
      ease: 'expo.in',
      overwrite: true
    });
  }

  /* Open one item (closes nothing — caller decides) */
  function openItem(pt) {
    pt.classList.add('is-open');
    gsap.to(pt.querySelector('.why-pt-v'), {
      height: 'auto', opacity: 1,
      duration: reduced ? 0 : 0.38,
      ease: 'expo.out',
      overwrite: true
    });
  }

  /* Init: collapse all values, wire click */
  function initAccordion() {
    pts.forEach(pt => {
      const val = pt.querySelector('.why-pt-v');
      pt.classList.remove('is-open');
      gsap.set(val, { height: 0, opacity: 0, overflow: 'hidden' });

      /* bind only once */
      if (!pt.dataset.accBound) {
        pt.dataset.accBound = '1';
        pt.querySelector('.why-pt-k').addEventListener('click', () => {
          if (!mm.matches) return;
          const opening = !pt.classList.contains('is-open');
          /* Close all */
          pts.forEach(p => { if (p.classList.contains('is-open')) closeItem(p); });
          /* Open if it was closed */
          if (opening) openItem(pt);
        });
      }
    });
  }

  /* Reset: restore full visible state for desktop */
  function resetAccordion() {
    pts.forEach(pt => {
      pt.classList.remove('is-open');
      gsap.set(pt.querySelector('.why-pt-v'), {
        height: 'auto', opacity: 1, overflow: 'visible', clearProps: 'overflow'
      });
    });
  }

  if (mm.matches) initAccordion();
  mm.addEventListener('change', e => e.matches ? initAccordion() : resetAccordion());
})();

/* ══ STAT HIT ZONES — GSAP hover → black content card ════════
   Each .why-stat-hit has a .wsh-card child (opacity:0 at rest).
   mouseenter: fade+slide card in. mouseleave: fade+slide out.
   killTweensOf() on every event prevents competing tweens.     */
(function(){
  const hits = document.querySelectorAll('.why-stat-hit');
  if(!hits.length) return;

  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  hits.forEach(el => {
    const card = el.querySelector('.wsh-card');
    if(!card) return;

    /* Centre the card horizontally — must match the CSS left:50% */
    gsap.set(card, { xPercent: -50, opacity: 0, y: 8 });

    el.addEventListener('mouseenter', () => {
      gsap.killTweensOf(card);
      gsap.to(card, {
        opacity: 1,
        y: 0,
        duration: reduced ? 0 : 0.38,
        ease: 'expo.out',
        overwrite: true
      });
    });

    el.addEventListener('mouseleave', () => {
      gsap.killTweensOf(card);
      gsap.to(card, {
        opacity: 0,
        y: 6,
        duration: reduced ? 0 : 0.28,
        ease: 'expo.in',
        overwrite: true
      });
    });
  });
})();
});
</script>