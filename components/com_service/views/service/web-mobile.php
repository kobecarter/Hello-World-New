
<style>
/* WEB MOBILE HERO */
.wm-hero{position:relative;padding:10rem 0 9rem;background:var(--bg);overflow:hidden;height: 100vh;}
.wm-hero-grid{position:absolute;inset:0;z-index:0;overflow:hidden}
.wm-hero-grid svg{width:100%;height:100%;opacity:.045}
.wm-hero .container{position:relative;z-index:2}
.wm-hero-inner{display:grid;grid-template-columns:1fr 400px;gap:4rem}
.wm-hero-label{font-size:.6rem;letter-spacing:.46em;text-transform:uppercase;color:var(--gold);display:flex;align-items:center;gap:.9rem;margin-bottom:2rem}
.wm-hero-label::before{content:'';width:36px;height:1px;background:var(--gold)}
.wm-hero-title{font-family:var(--fm);font-weight:300;font-size:84px;line-height:1.1;letter-spacing:-.04em;color:var(--txt);margin-bottom:2.5rem}
.wm-hero-title em{font-style:normal;color:var(--gold);font-weight:200}
.wm-hero-sub{font-size:.92rem;font-weight:300;color:var(--txt2);max-width:480px;line-height:1.9;margin-bottom:3rem}
.wm-hero-ctas{display:flex;gap:1rem;flex-wrap:wrap}
.wm-hero-side{position:relative}
.wm-screen{background:var(--txt);border-radius:18px;overflow:hidden;aspect-ratio:9/16;max-width:200px;margin:0 auto;position:relative;box-shadow:0 40px 120px rgba(0,0,0,.18)}
.wm-screen::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(139,106,34,.12) 0%,transparent 60%)}
.wm-screen-gfx{position:absolute;inset:0;display:flex;flex-direction:column;gap:8px;padding:24px 16px}
.wm-bar{height:4px;border-radius:2px;background:rgba(247,245,242,.08)}
.wm-bar.hi{background:rgba(139,106,34,.4);width:60%}
.wm-bar.mid{width:80%}
.wm-bar.sm{width:45%}
.wm-screen-dot{width:32px;height:32px;border-radius:50%;background:rgba(139,106,34,.3);margin:8px 0}
.wm-tablet{position:absolute;right:-40px;top:60px;background:#1a1815;border-radius:12px;width:260px;aspect-ratio:4/3;box-shadow:0 24px 80px rgba(0,0,0,.22);overflow:hidden}
.wm-tablet::before{content:'';position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent,transparent 28px,rgba(139,106,34,.04) 28px,rgba(139,106,34,.04) 29px)}
@media(max-width:1024px){.wm-hero-inner{grid-template-columns:1fr}.wm-hero-side{display:none}}





/*Custom*/
.wm-card a:hover {
    /*color: none !important;*/
    text-decoration: none !important;
}
.subservice .wm-visual img{
    height: 100%;
    width: 100%;
    object-fit: cover;
}
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
        <div class="sh-breadcrumb rv"><?php echo $service->getTitre() ?></div>
          <h1 class="sh-h1 rv d1"><?php echo $service->getH1() ?></h1>
          <p class="sh-sub rv d2"><?php echo strip_tags($service->getExtrait()); ?></p>
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

<!-- SERVICES -->
<section class="wm-services hw-f-list-catalogue" id="services">
  <div class="container">
    <div class="sec-label rv">Nos Offres</div>
    <h2 class="sec-title rv d1">Quatre expertises,<br>un seul <em>interlocuteur</em></h2>
    <div class="hw-f-list-track-hint rv d2"><i class="fal fa-arrows-left-right"></i> Faites défiler pour parcourir nos <?= count($childServices); ?> expertises</div>
  </div>

  <?php if (!empty($childServices)):
    $wmIcons = ['fa-globe','fa-mobile-alt','fa-search','fa-user-shield'];
  ?>
  <div class="hw-f-list-pin" id="wmServicesPin">
    <div class="hw-f-list-track" id="wmServicesTrack">
      <div class="hw-f-list-track-spacer" id="wmServicesSpacerStart" aria-hidden="true"></div>
      <?php foreach($childServices as $index => $childService):
        $icon   = $wmIcons[$index % count($wmIcons)];
        $isGold = $index % 2 === 0;
      ?>
      <a class="hw-f-list-card-3d" href="<?= $childService->getLink(); ?>">
        <?php if ($childService->getPhoto()): ?>
        <div class="hw-f-list-card-3d-photo">
          <img src="<?= $siteURL; ?>images/services/<?= htmlspecialchars($childService->getPhoto(), ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($childService->getTitre(), ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
          <span class="hw-f-list-card-badge <?= $isGold ? 'gold' : 'purple'; ?>">Offre</span>
        </div>
        <?php endif; ?>
        <div class="hw-f-list-card-3d-body">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,<?= $isGold ? 'rgba(9,161,190,.1)' : 'rgba(104,2,98,.08)'; ?>,<?= $isGold ? 'rgba(9,161,190,.05)' : 'rgba(104,2,98,.04)'; ?>);border:1px solid <?= $isGold ? 'rgba(9,161,190,.2)' : 'rgba(104,2,98,.18)'; ?>">
            <i class="fal <?= $icon; ?>" style="color:<?= $isGold ? '#09A1BE' : '#680262'; ?>;font-size:.95rem"></i>
          </div>
          <div class="hw-f-list-card-title"><?= htmlspecialchars($childService->getTitre(), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-sub"><?= htmlspecialchars(mb_strimwidth(html_entity_decode(strip_tags($childService->getExtrait() ?? ''), ENT_QUOTES, 'UTF-8'), 0, 120, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-cta">Découvrir <i class="fal fa-arrow-right"></i></div>
        </div>
      </a>
      <?php endforeach; ?>
      <div class="hw-f-list-track-spacer" id="wmServicesSpacerEnd" aria-hidden="true"></div>
    </div>
  </div>
  <?php endif; ?>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);
    var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var pin   = document.getElementById('wmServicesPin');
    var track = document.getElementById('wmServicesTrack');
    var cards = track ? track.querySelectorAll('.hw-f-list-card-3d') : [];
    var spacerStart = document.getElementById('wmServicesSpacerStart');
    var spacerEnd   = document.getElementById('wmServicesSpacerEnd');
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
<section class="portfolio" id="work">
  <div class="container">
    <div class="sec-label rv">Cas d'utilisation</div>
    <h2 class="sec-title rv d1">Nos dernières <em>réalisations</em></h2>
    <div class="port-grid rv d2">
      <div class="port-item p-meridian tall">
        <a href="<?php echo $mr_brico->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $mr_brico->getPhoto(); ?>" alt="<?php echo $references[0]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $mr_brico->getLink(); ?>" class="port-arrow"><i class="fal fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $mr_brico->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $mr_brico->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $mr_brico->getExtrait(); ?></p>
        </div>
      </div>

      <div class="port-item p-luminis">
        <a href="<?php echo $ljs->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $ljs->getPhoto(); ?>" alt="<?php echo $ljs->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $ljs->getLink(); ?>" class="port-arrow"><i class="fal fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $ljs->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $ljs->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $ljs->getExtrait(); ?></p>
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

<!-- APPROACH -->
<section class="wm-approach">
  <div class="container">
    <div>  
        <div class="sec-label">Notre approche</div>
        <h2 class="sec-title rv">Design <em>intentionnel</em>,<br>code performant</h2>
    </div>
    <div class="wm-approach-grid">
      <div class="wm-approach-visual rv">
        <div class="wm-approach-gfx" aria-hidden="true">UX</div>
        <div class="wm-approach-badge">
          <div class="wm-badge-icon"><i class="fa fa-bolt fa-xs"></i></div>
          <div class="wm-badge-text">
            <strong>Performance garantie</strong>
            <span>Core Web Vitals &gt; 95 ou on recommence</span>
          </div>
        </div>
      </div>
      <div>
      
        <p class="wm-approach-intro rv d1">Chaque pixel est décidé. Chaque milliseconde compte. Nous ne livrons pas des sites — nous livrons des machines à convertir.</p>
        <ul class="wm-feat-list rv d2">
          <li class="wm-feat-item">
            <div class="wm-feat-ico"><i class="fas fa-mobile-alt"></i></div>
            <div class="wm-feat-info">
              <strong>Mobile-first par défaut</strong>
              <span>Design conçu pour le mobile, progressivement enrichi pour le desktop.</span>
            </div>
          </li>
          <li class="wm-feat-item">
            <div class="wm-feat-ico"><i class="fas fa-tachometer-alt"></i></div>
            <div class="wm-feat-info">
              <strong>Performance &amp; Core Web Vitals</strong>
              <span>Temps de chargement &lt;2s, LCP optimisé, zéro CLS — mesuré, garanti.</span>
            </div>
          </li>
          <li class="wm-feat-item">
            <div class="wm-feat-ico"><i class="fa fa-chart-bar"></i></div>
            <div class="wm-feat-info">
              <strong>Analytics &amp; A/B testing</strong>
              <span>Chaque décision UX validée par les données. Heatmaps, funnels et tests continus.</span>
            </div>
          </li>
          <li class="wm-feat-item">
            <div class="wm-feat-ico"><i class="fa fa-robot"></i></div>
            <div class="wm-feat-info">
              <strong>IA intégrée nativement</strong>
              <span>Personnalisation dynamique, chatbot, recommandations — l'IA augmente chaque site.</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="wm-stats">
  <div class="container">
    <div class="wm-stats-grid">
      <div class="wm-stat rv">
        <div class="wm-stat-num">120<span class="wm-stat-suf">+</span></div>
        <div class="wm-stat-lbl">Sites livrés</div>
      </div>
      <div class="wm-stat rv d1">
        <div class="wm-stat-num">97<span class="wm-stat-suf">%</span></div>
        <div class="wm-stat-lbl">Score performance moyen</div>
      </div>
      <div class="wm-stat rv d2">
        <div class="wm-stat-num">3.2<span class="wm-stat-suf">x</span></div>
        <div class="wm-stat-lbl">Amélioration conversion</div>
      </div>
      <div class="wm-stat rv d3">
        <div class="wm-stat-num">48<span class="wm-stat-suf">h</span></div>
        <div class="wm-stat-lbl">Délai de réponse max</div>
      </div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="sdtl-section" id="process">
  <div class="sdtl-orb-wrap"><div class="sdtl-orb" id="wmOrb"><div class="sdtl-orb-ring r1"></div><div class="sdtl-orb-ring r2"></div><div class="sdtl-orb-ring r3"></div><div class="sdtl-orb-ring r4"></div></div></div>
  <div class="container">
    <div class="sdtl-header">
      <div class="sec-label">Notre processus</div>
      <h2 class="sec-title rv">De la maquette au <em>go-live</em><br>en toute sérénité</h2>
      <p class="sdtl-intro rv d1">Une méthode éprouvée, pensée pour livrer vite sans jamais sacrifier la qualité. Chaque phase se termine par une validation concrète avant de passer à la suivante.</p>
    </div>
    <div class="sdtl-timeline" id="wmTimeline">
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="wmSpineFill"></div></div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Discovery &amp; Architecture</div>
            <p class="sdtl-desc">Ateliers utilisateurs, analyse concurrentielle et définition de l'architecture de l'information. Zéro pixel avant d'avoir validé la stratégie.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Ateliers de cadrage utilisateurs</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Architecture de l'information validée</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Benchmark concurrentiel</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 1 – 2</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-compass"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Discovery</div></div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword">Design</div></div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-swatchbook"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">2</div>
            <div class="sdtl-title">Design System</div>
            <p class="sdtl-desc">Maquettes haute fidélité, design system documenté, animations et micro-interactions. Validation itérative avec vos équipes.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Maquettes haute fidélité</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Design system documenté</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Prototype interactif validé</span></div>
            </div>
            <span class="sdtl-tag">SEMAINES 3 – 4</span>
          </div>
        </div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title">Développement</div>
            <p class="sdtl-desc">Code propre, documenté et testé. Sprints de 2 semaines, démos régulières et intégration continue. Vous voyez tout en temps réel.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Sprints de 2 semaines</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Démos régulières</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Intégration continue &amp; tests</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 5 – 8</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-code"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Développement</div></div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword">Launch</div></div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-rocket"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">4</div>
            <div class="sdtl-title">Launch &amp; Optimisation</div>
            <p class="sdtl-desc">Déploiement zéro downtime, monitoring 24/7 et optimisation continue basée sur les données réelles d'utilisation.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Déploiement zéro downtime</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Monitoring 24/7</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Optimisation continue post-launch</span></div>
            </div>
            <span class="sdtl-tag">SEMAINE 9+</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
(function(){
  const timeline=document.getElementById('wmTimeline');
  const spineFill=document.getElementById('wmSpineFill');
  const orb=document.getElementById('wmOrb');
  const steps=timeline ? timeline.querySelectorAll('.sdtl-step') : [];
  if(!timeline||!spineFill) return;

  function update(){
    const rect=timeline.getBoundingClientRect(), vh=window.innerHeight;
    const raw=(vh*.65-rect.top)/(rect.height+vh*.05);
    spineFill.style.height=(Math.max(0,Math.min(1,raw))*100)+'%';
    if(orb){ const sp=scrollY/Math.max(1,document.body.scrollHeight-vh); orb.style.transform=`rotateY(${(sp*720).toFixed(2)}deg) rotateX(${(sp*300).toFixed(2)}deg)`; }
  }
  let raf; window.addEventListener('scroll',()=>{if(!raf)raf=requestAnimationFrame(()=>{update();raf=null;})},{passive:true});
  update();

  const stepIO=new IntersectionObserver(entries=>{
    entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('active'); });
  },{threshold:.3,rootMargin:'0px 0px -10% 0px'});
  steps.forEach(s=>stepIO.observe(s));
})();
</script>

<!-- CTA -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Démarrer votre projet</div>
    <h2 class="sec-title">Construisons votre<br><em>prochain produit</em> ensemble</h2>
    <p class="cta-sub">Brief gratuit, estimation sous 48h. Nos équipes sont disponibles au Maroc, Londres et Dubaï.</p>
    <div class="cta-btns">
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un devis" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Demander un devis</span></div>
          <div class="sb-knob"><i class="fal fa-calculator"></i></div>
        </a>
    
        <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir SaaS &amp; Produits" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Voir SaaS &amp; Produits</span></div>
          <div class="sb-knob"><i class="fal fa-desktop"></i></div> 
        </a>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>