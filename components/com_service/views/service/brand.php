
<?php $pageContact = getComponent("com_contact"); ?>
<style>
header.hdr-light:not(.scrolled) .hdr-nav a{color:rgba(247,245,242,.45)}
header.hdr-light:not(.scrolled) .hdr-nav a:hover,header.hdr-light:not(.scrolled) .hdr-nav a.active{color:rgba(247,245,242,.9)}
header.hdr-light:not(.scrolled) .logo-hw img{filter:brightness(0) invert(1) opacity(.85)}
header.hdr-light:not(.scrolled) .burger i{background:var(--bg)}
header.hdr-light:not(.scrolled) .lang-btn{border-color:rgba(247,245,242,.18);color:rgba(247,245,242,.5)}

/* BRAND HERO — full black editorial */
.be-hero{position:relative;min-height:100vh;display:flex;align-items:flex-end;background:#000;overflow:hidden}
.be-hero-grid{position:absolute;inset:0;z-index:0}
.be-hero-grid::before{content:'';position:absolute;inset:0;background-image:repeating-linear-gradient(0deg,transparent,transparent 88px,rgba(255,255,255,.018) 88px,rgba(255,255,255,.018) 89px),repeating-linear-gradient(90deg,transparent,transparent 88px,rgba(255,255,255,.018) 88px,rgba(255,255,255,.018) 89px)}
.be-hero-diag{position:absolute;top:0;right:0;width:50%;height:100%;background:linear-gradient(135deg,transparent 40%,rgba(139,106,34,.04) 100%);z-index:0}
.be-hero-circle{position:absolute;bottom:-300px;left:-200px;width:700px;height:700px;border-radius:50%;border:1px solid rgba(139,106,34,.06);z-index:0}
.be-hero-circle::before{content:'';position:absolute;inset:80px;border-radius:50%;border:1px solid rgba(139,106,34,.04)}
.be-hero .container{position:relative;z-index:2;padding-bottom:8rem}
.be-hero-inner{display:grid;grid-template-columns:1fr auto;gap:4rem;align-items:flex-end;padding-top:14rem}
.be-hero-label{font-size:.6rem;letter-spacing:.48em;text-transform:uppercase;color:rgba(139,106,34,.6);display:flex;align-items:center;gap:.9rem;margin-bottom:2rem}
.be-hero-label::before{content:'';width:36px;height:1px;background:rgba(139,106,34,.6)}
.be-hero-title{font-family:var(--fm);font-weight:300;font-size:clamp(4rem,9vw,12rem);line-height:.88;letter-spacing:-.04em;color:#f5f3f0;margin-bottom:2.5rem}
.be-hero-title em{display:block;font-style:italic;color:transparent;-webkit-text-stroke:1px rgba(201,169,110,.5);font-family:var(--fd);font-weight:200;font-size:.85em}
.be-hero-sub{font-size:.92rem;font-weight:300;color:rgba(247,245,242,.35);max-width:500px;line-height:1.9;margin-bottom:3.5rem}
.be-hero-right{text-align:right;flex-shrink:0}
.be-hero-stat{border-top:1px solid rgba(247,245,242,.07);padding:1.4rem 0}
.be-hero-stat:first-child{border-top:none}
.be-stat-val{font-family:var(--fd);font-weight:200;font-size:3rem;line-height:1;color:#f5f3f0;letter-spacing:-.04em}
.be-stat-val span{color:var(--gold2);font-size:.55em}
.be-stat-lbl{font-family:var(--fm);font-size:.55rem;letter-spacing:.2em;text-transform:uppercase;color:rgba(247,245,242,.22)}
@media(max-width:991px){.be-hero-inner{grid-template-columns:1fr}.be-hero-right{display:none}}


.portfolio{background:var(--bg2);}
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
        
            <a href="#services" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir nos offres" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
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

<!-- MARQUEE -->
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

<!-- REFERENCES -->
<section class="be-refs" id="chiffres">
  <div class="container">
    <div class="sec-label rv">Nos Références</div>
    <h2 class="sec-title rv d1">Des <em>résultats</em><br>qui parlent</h2>
    <div class="be-refs-grid rv d2" id="beRefsGrid">
      <div class="be-ref-card">
        <div class="be-ref-icon"><i class="fal fa-swatchbook"></i></div>
        <div class="be-ref-num"><span class="be-ref-count" data-count="80">0</span><span class="be-ref-suffix">+</span></div>
        <div class="be-ref-lbl">Marques créées</div>
      </div>
      <div class="be-ref-card">
        <div class="be-ref-icon"><i class="fal fa-boxes"></i></div>
        <div class="be-ref-num"><span class="be-ref-count" data-count="350">0</span><span class="be-ref-suffix">+</span></div>
        <div class="be-ref-lbl">Projets livrés</div>
      </div>
      <div class="be-ref-card">
        <div class="be-ref-icon"><i class="fal fa-medal"></i></div>
        <div class="be-ref-num"><span class="be-ref-count" data-count="12">0</span><span class="be-ref-suffix">ans</span></div>
        <div class="be-ref-lbl">D'expertise créative</div>
      </div>
      <div class="be-ref-card">
        <div class="be-ref-icon"><i class="fal fa-globe"></i></div>
        <div class="be-ref-num"><span class="be-ref-count" data-count="3">0</span><span class="be-ref-suffix"> pays</span></div>
        <div class="be-ref-lbl">Studios créatifs</div>
      </div>
    </div>
  </div>
</section>

<script>
(function(){
  var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var nums = document.querySelectorAll('#beRefsGrid .be-ref-count');
  if(!nums.length) return;
  function animateCount(el){
    var target = parseInt(el.getAttribute('data-count'), 10) || 0;
    if(rm){ el.textContent = target; return; }
    var start = null, duration = 1400;
    function step(ts){
      if(!start) start = ts;
      var p = Math.min(1, (ts - start) / duration);
      var eased = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.round(eased * target);
      if(p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if(e.isIntersecting){
        nums.forEach(animateCount);
        io.disconnect();
      }
    });
  }, {threshold:.35});
  io.observe(document.getElementById('beRefsGrid'));
})();
</script>

<!-- SERVICES -->
<section class="be-services hw-f-list-catalogue" id="services">
  <div class="container">
    <div class="sec-label rv">Nos Services</div>
    <h2 class="sec-title rv d1">Des expertises ciblées pour<br><em> une marque inoubliable</em></h2>
    <div class="hw-f-list-track-hint rv d2"><i class="fal fa-arrows-left-right"></i> Faites défiler pour parcourir nos <?= count($childServices); ?> expertises</div>
  </div>

  <?php if (!empty($childServices)):
    $beIcons = ['fa-palette','fa-user-tie','fa-trademark','fa-user-plus','fa-film','fa-camera','fa-bullhorn','fa-pen-fancy','fa-calendar-check','fa-chart-line','fa-rocket'];
  ?>
  <div class="hw-f-list-pin" id="beServicesPin">
    <div class="hw-f-list-track" id="beServicesTrack">
      <div class="hw-f-list-track-spacer" id="beServicesSpacerStart" aria-hidden="true"></div>
      <?php foreach($childServices as $index => $childService):
        $icon   = $beIcons[$index % count($beIcons)];
        $isGold = $index % 2 === 0;
      ?>
      <a class="hw-f-list-card-3d" href="<?= $childService->getLink(); ?>">
        <?php if ($childService->getPhoto()): ?>
        <div class="hw-f-list-card-3d-photo">
          <img src="<?= $siteURL; ?>images/services/<?= htmlspecialchars($childService->getPhoto(), ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($childService->getTitre(), ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
          <span class="hw-f-list-card-badge <?= $isGold ? 'gold' : 'purple'; ?>">Expertise</span>
        </div>
        <?php endif; ?>
        <div class="hw-f-list-card-3d-body">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,<?= $isGold ? 'rgba(9,161,190,.1)' : 'rgba(104,2,98,.08)'; ?>,<?= $isGold ? 'rgba(9,161,190,.05)' : 'rgba(104,2,98,.04)'; ?>);border:1px solid <?= $isGold ? 'rgba(9,161,190,.2)' : 'rgba(104,2,98,.18)'; ?>">
            <i class="fal <?= $icon; ?>" style="color:<?= $isGold ? '#09A1BE' : '#680262'; ?>;font-size:.95rem"></i>
          </div>
          <div class="hw-f-list-card-title"><?= htmlspecialchars($childService->getTitre(), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-sub"><?= htmlspecialchars(mb_strimwidth(html_entity_decode(strip_tags($childService->getTexteAccueil() ?? ''), ENT_QUOTES, 'UTF-8'), 0, 120, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-cta">Découvrir <i class="fal fa-arrow-right"></i></div>
        </div>
      </a>
      <?php endforeach; ?>
      <div class="hw-f-list-track-spacer" id="beServicesSpacerEnd" aria-hidden="true"></div>
    </div>
  </div>
  <?php endif; ?>

  <div class="container">
    <div class="cta-btns mt-5 mb-5">
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
          <div class="sb-label"><span class="sb-hint">Parler de votre projet</span></div>
          <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
        </a>
    </div>
  </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);
    var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var pin   = document.getElementById('beServicesPin');
    var track = document.getElementById('beServicesTrack');
    var cards = track ? track.querySelectorAll('.hw-f-list-card-3d') : [];
    var spacerStart = document.getElementById('beServicesSpacerStart');
    var spacerEnd   = document.getElementById('beServicesSpacerEnd');
    if (!pin || !track || !cards.length) return;

    function sizeSpacers() {
        if (!spacerStart || !spacerEnd || window.innerWidth <= 760) return;
        var cardW = cards[0].getBoundingClientRect().width;
        var w = Math.max(0, (pin.clientWidth - cardW) / 2);
        spacerStart.style.width = w + 'px';
        spacerEnd.style.width = w + 'px';
    }
    sizeSpacers();

    function trackDistance() {
        return Math.max(0, track.scrollWidth - pin.clientWidth);
    }

    function tiltCards() {
        var pinRect = pin.getBoundingClientRect();
        var center = pinRect.left + pinRect.width / 2;
        cards.forEach(function (card) {
            var r = card.getBoundingClientRect();
            var cardCenter = r.left + r.width / 2;
            var delta = (cardCenter - center) / (pinRect.width / 2);
            delta = Math.max(-1, Math.min(1, delta));
            if (rm) { card.style.transform = ''; return; }
            var ry = delta * -30;
            var scale = 1 - Math.abs(delta) * 0.14;
            var z = -Math.abs(delta) * 130;
            card.style.transform = 'perspective(1400px) rotateY(' + ry.toFixed(2) + 'deg) translateZ(' + z.toFixed(1) + 'px) scale(' + scale.toFixed(3) + ')';
            card.style.opacity = String(1 - Math.abs(delta) * 0.35);
        });
    }

    if (!rm && window.innerWidth > 760) {
        gsap.to(track, {
            x: function () { return -trackDistance(); },
            ease: 'none',
            scrollTrigger: {
                trigger: pin,
                start: 'top top+=70',
                end: function () { return '+=' + (trackDistance() + window.innerHeight * .6); },
                scrub: .6,
                pin: true,
                invalidateOnRefresh: true,
                onRefresh: sizeSpacers,
                onUpdate: tiltCards
            }
        });
        ScrollTrigger.addEventListener('refresh', tiltCards);
        window.addEventListener('load', function () { sizeSpacers(); ScrollTrigger.refresh(); tiltCards(); });
        window.addEventListener('resize', sizeSpacers);
    } else {
        track.style.overflowX = 'auto';
        track.style.scrollSnapType = 'x mandatory';
        cards.forEach(function (c) { c.style.scrollSnapAlign = 'start'; });
    }

    cards.forEach(function (c) {
        c.addEventListener('mousedown', function () { c.style.filter = 'brightness(.97)'; });
        c.addEventListener('mouseup',   function () { c.style.filter = ''; });
        c.addEventListener('mouseleave', function () { c.style.filter = ''; });
    });

    setTimeout(function () { ScrollTrigger.refresh(); }, 400);
})();
</script>

<!-- PROCESS CRÉATIF -->
<section class="be-process">
  <div class="container">
    <div class="sec-label rv">Processus créatif</div>
    <h2 class="sec-title rv d1">Du brief au <em>lancement</em><br>sans compromis</h2>
    <div class="be-proc-grid-3d rv d2" id="beProcGrid">
      <div class="be-proc-card" data-tilt>
        <div class="be-proc-card-shine"></div>
        <div class="be-proc-card-num">01</div>
        <div class="be-proc-card-icon"><i class="fal fa-compass"></i></div>
        <div class="be-proc-title">Exploration et immersion</div>
        <p class="be-proc-desc">Ateliers de découverte, analyse de votre marché, de vos concurrents et de vos clients. Nous commençons par comprendre avant de créer. Brief créatif validé ensemble avant tout engagement.</p>
      </div>
      <div class="be-proc-card" data-tilt>
        <div class="be-proc-card-shine"></div>
        <div class="be-proc-card-num">02</div>
        <div class="be-proc-card-icon"><i class="fal fa-palette"></i></div>
        <div class="be-proc-title">Création &amp; Conception</div>
        <p class="be-proc-desc">Notre équipe créative développe 3 directions créatives distinctes. Maquettes, moodboards, samples de contenu — vous choisissez et nous affinons jusqu'à la perfection.</p>
      </div>
      <div class="be-proc-card" data-tilt>
        <div class="be-proc-card-shine"></div>
        <div class="be-proc-card-num">03</div>
        <div class="be-proc-card-icon"><i class="fal fa-video"></i></div>
        <div class="be-proc-title">Production &amp; Réalisation</div>
        <p class="be-proc-desc">Tournages, design final, production de contenus et déclinaisons sur tous les supports. Chaque livrable est soumis à 3 niveaux de validation interne avant de vous être présenté.</p>
      </div>
      <div class="be-proc-card" data-tilt>
        <div class="be-proc-card-shine"></div>
        <div class="be-proc-card-num">04</div>
        <div class="be-proc-card-icon"><i class="fal fa-rocket"></i></div>
        <div class="be-proc-title">Déploiement &amp; Activation</div>
        <p class="be-proc-desc">Lancement de la marque, formation de vos équipes aux guidelines, mise en place des outils de content ops et suivi des performances sur 3 mois pour ajuster.</p>
      </div>
    </div>
  </div>
</section>

<script>
(function(){
  var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var cards = document.querySelectorAll('#beProcGrid .be-proc-card');
  if(rm || !cards.length) return;

  cards.forEach(function(card){
    card.style.transition = 'box-shadow .45s cubic-bezier(0.23,1,0.32,1),border-color .45s';

    card.addEventListener('mousemove', function(e){
      var r = card.getBoundingClientRect();
      var x = e.clientX - r.left, y = e.clientY - r.top;
      var px = x / r.width, py = y / r.height;
      card.style.setProperty('--mx', (px * 100) + '%');
      card.style.setProperty('--my', (py * 100) + '%');
      var rx = (py - .5) * -14;
      var ry = (px - .5) * 14;
      card.style.transition = 'box-shadow .45s cubic-bezier(0.23,1,0.32,1),border-color .45s';
      card.style.transform = 'perspective(1600px) rotateX(' + rx.toFixed(2) + 'deg) rotateY(' + ry.toFixed(2) + 'deg) translateY(-6px) scale(1.02)';
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
   <div class="container">
            <div class="col-sm-12 mt-5 text-center">
                <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir plus de réalisations" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Voir plus de réalisations</span></div>
                  <div class="sb-knob"><i class="fal fa-trophy"></i></div>
                </a>
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
    <div class="sec-label rv">Construire votre marque</div>
    <h2 class="sec-title rv d1">Votre marque mérite<br><em>d'être remarquée</em></h2>
    <p class="hw-f-list-cta-sub rv d2">Brief gratuit et diagnostic de marque offert. Nos studios sont à San Francisco, Londres et Dubaï.</p>
    <div class="cta-btns rv d3" style="justify-content:center">
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Parler de votre projet" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Parler de votre projet</span></div>
          <div class="sb-knob"><i class="fal fa-phone"></i></div>
        </a>
        <a href="#services" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir les nos services" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Voir les nos services</span></div>
          <div class="sb-knob"><i class="fal fa-suitcase"></i></div>
        </a>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>