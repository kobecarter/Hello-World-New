<style>
header.hdr-light:not(.scrolled) .hdr-nav a{color:rgba(247,245,242,.45)}
header.hdr-light:not(.scrolled) .hdr-nav a:hover,header.hdr-light:not(.scrolled) .hdr-nav a.active{color:rgba(247,245,242,.9)}
header.hdr-light:not(.scrolled) .logo-hw img{filter:brightness(0) invert(1) opacity(.85)}
header.hdr-light:not(.scrolled) .burger i{background:var(--bg)}
header.hdr-light:not(.scrolled) .lang-btn{border-color:rgba(247,245,242,.18);color:rgba(247,245,242,.5)}

/* FULL-VIEWPORT HERO */
.rd-hero{position:relative;min-height:100vh;display:flex;flex-direction:column;justify-content:flex-end;overflow:hidden;background:#081428}
.rd-hero-bg{position:absolute;inset:0;}
.rd-hero-bg img{height:100%;width:100%;object-fit:cover;}
.rd-hero-bg::after{content:""; height:100%; width: 100%; background:linear-gradient(0deg,rgba(0,0,0,.9) 0%,rgba(0,0,0,.5) 50%,rgba(0,0,0,0) 100%); position:absolute; bottom:0; left:0;}
.rd-hero-bg::before{content:""; height:30%; width: 100%; background:linear-gradient(180deg,rgba(0,0,0,.8) 0%,rgba(0,0,0,.5) 50%,rgba(0,0,0,0) 100%); position:absolute; top:0; left:0;}
.rd-hero-noise{position:absolute;inset:0;background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.04'/%3E%3C/svg%3E");opacity:.4}
.rd-hero-ghost{position:absolute;bottom:-5rem;left:-1rem;font-family:var(--fm);font-weight:900;font-size:clamp(16rem,35vw,52rem);line-height:1;letter-spacing:-.06em;color:rgba(255,255,255,.02);pointer-events:none;user-select:none;white-space:nowrap}
.rd-hero-inner{position:relative;z-index:2;padding:0 0 5rem}
.rd-hero-breadcrumb{display:flex;align-items:center;gap:.7rem;font-family:var(--fm);font-size:.6rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(247,245,242,1);margin-bottom:3rem}
.rd-hero-breadcrumb a{color:inherit;text-decoration:none;transition:color .2s}
.rd-hero-breadcrumb a:hover{color:rgba(247,245,242,.7)}
.rd-hero-breadcrumb i{font-size:.45rem}
.rd-hero-tags{display:flex;gap:.6rem;margin-bottom:1.5rem;flex-wrap:wrap}
.rd-hero-tag{font-family:var(--fm);font-size:.54rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;padding:.25rem .8rem;border:1px solid rgba(247,245,242,.15);color:rgba(247,245,242,.45)}
.rd-hero-title{font-family:var(--fm);font-weight:300;font-size:clamp(3.5rem,9vw,12rem);line-height:.9;letter-spacing:-.04em;color:rgba(247,245,242,.92);margin-bottom:1.5rem}
.rd-hero-title em{font-style:italic;color:var(--gold2);font-family:var(--fd);font-weight:200}
.rd-hero-subtitle{font-family:var(--fm);font-size:.9rem;font-weight:300;color:rgba(247,245,242,.8);max-width:540px;line-height:1.8}
.rd-hero-scroll{position:absolute;bottom:3rem;right:4rem;display:flex;flex-direction:column;align-items:center;gap:.6rem;z-index:2}
.rd-hero-scroll span{font-family:var(--fm);font-size:.52rem;letter-spacing:.28em;text-transform:uppercase;color:rgba(247,245,242,.2);writing-mode:vertical-lr}
.rd-hero-scroll-line{width:1px;height:60px;background:linear-gradient(to bottom,rgba(247,245,242,.15),transparent);animation:scrollLine 2s ease-in-out infinite}
@keyframes scrollLine{0%{transform:scaleY(0);transform-origin:top}50%{transform:scaleY(1);transform-origin:top}51%{transform-origin:bottom}100%{transform:scaleY(0);transform-origin:bottom}}

/* CONTENT */
.rd-content{background:var(--bg)}

/* FULL-WIDTH IMAGE */
.rd-fullimg{position:relative;overflow:hidden;aspect-ratio:21/9}
@media(max-width:767px){.rd-fullimg{aspect-ratio:4/3}}
.rd-fullimg-inner{width:100%;height:100%;transition:transform .85s cubic-bezier(.16,1,.3,1)}
.rd-fullimg-inner img{height:100%;width: 100%;object-fit:cover;}
.rd-fullimg:hover .rd-fullimg-inner{transform:scale(1.03)}
.rd-fullimg-caption{position:absolute;bottom:0;left:0;right:0;padding:1.2rem 2rem;background:linear-gradient(to top,rgba(0,0,0,.5) 0%,transparent 100%);font-family:var(--fm);font-size:.65rem;letter-spacing:.1em;text-transform:uppercase;color:rgba(247,245,242,1)}

/* PULL QUOTE */
.rd-quote{padding:6rem 0;background:var(--txt);position:relative;overflow:hidden}
.rd-quote::before{content:'\201C';position:absolute;top:-3rem;left:2rem;font-family:var(--fd);font-size:22rem;font-weight:200;line-height:1;color:rgba(247,245,242,.03);pointer-events:none}
.rd-quote-inner{max-width:800px;margin:0 auto;text-align:center;position:relative;z-index:1}
.rd-quote-text{font-family:var(--fd);font-weight:200;font-size:clamp(1.6rem,3.2vw,3.2rem);line-height:1.3;color:rgba(247,245,242,.75);letter-spacing:-.02em;margin-bottom:2.5rem;font-style:italic}
.rd-quote-attr{font-family:var(--fm);font-size:.65rem;letter-spacing:.2em;text-transform:uppercase;color:rgba(139,106,34,.6)}

/* GALLERY GRID */
.rd-gallery{display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid var(--border)}
.rd-gal-item{border-right:1px solid var(--border);border-bottom:1px solid var(--border);aspect-ratio:4/3;overflow:hidden;position:relative;cursor:zoom-in}
.rd-gal-item:nth-child(3n){border-right:none}
.rd-gal-item:hover .rd-gal-inner{transform:scale(1.08)}
.rd-gal-inner{width:100%;height:100%;transition:transform .8s cubic-bezier(.16,1,.3,1)}
.rd-gal-num{position:absolute;top:.8rem;left:1rem;font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.18em;color:rgba(247,245,242,.3);z-index:1}
@media(max-width:767px){.rd-gallery{grid-template-columns:repeat(2,1fr)}.rd-gal-item:nth-child(3n){border-right:1px solid var(--border)}.rd-gal-item:nth-child(2n){border-right:none}}
@media(max-width:575px){.rd-gallery{grid-template-columns:1fr}.rd-gal-item{border-right:none!important}}


/* NEXT PROJECT */
.rd-next{position:relative;overflow:hidden;display:block;text-decoration:none;color:inherit;border-radius: 30px 30px 0 0;margin-top: -30px;}
.rd-next-bg{height:300px;background:linear-gradient(135deg,#1a0808 0%,#2e1010 60%,#3d1818 100%);position:relative;overflow:hidden;display:flex;align-items:flex-end;transition:background .5s}
.rd-next-bg::before{content:'NEXT';position:absolute;right:-0.1em;bottom:-.15em;font-family:var(--fm);font-weight:900;font-size:clamp(14rem,28vw,36rem);line-height:1;letter-spacing:-.06em;color:rgba(255,255,255,.03);pointer-events:none;user-select:none}
.rd-next-inner{position:relative;z-index:1;padding:3.5rem 4rem;display:flex;align-items:flex-end;justify-content:space-between;width:100%;top: -60px;}
.rd-next-label{font-family:var(--fm);font-size:.58rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:rgba(247,245,242,.3);margin-bottom:.8rem}
.rd-next-title{font-weight:200;font-size:clamp(2.5rem,6vw,8rem);line-height:.92;letter-spacing:-.03em;color:rgba(247,245,242,.85)}
.rd-next-title em{font-style:italic;color:var(--gold2)}
.rd-next-arr{width:64px;height:64px;border:1px solid rgba(247,245,242,.15);display:flex;align-items:center;justify-content:center;color:rgba(247,245,242,.4);font-size:1.1rem;flex-shrink:0;transition:all .35s;border-radius: 15px;}
.rd-next:hover .rd-next-arr{background:var(--gold);border-color:var(--gold);color:var(--bg);transform:translateX(6px)}
</style>

<!-- HERO -->
<section class="rd-hero">
  <div class="rd-hero-bg" aria-hidden="true">
	<img src="<?php echo $siteURL; ?>images/references/<?php echo $reference->getPhoto(); ?>" alt="<?php echo $reference->getNomClient(); ?>">
  </div>
  <div class="rd-hero-noise" aria-hidden="true"></div>
  <span class="rd-hero-ghost" aria-hidden="true">Orbital</span>
  <div class="container rd-hero-inner">
    <div class="rd-hero-breadcrumb rv">
      <a href="<?php echo $siteURL; ?>">Accueil</a>
      <i class="fa fa-chevron-right"></i>
	  <a href="<?php echo $page->getLink(); ?>"><?php echo $page->getTitre(); ?></a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $reference->getNomClient(); ?></span>
    </div>
    <!-- <div class="rd-hero-tags rv d1">
      <span class="rd-hero-tag">Web &amp; Mobile</span>
      <span class="rd-hero-tag">SaaS</span>
      <span class="rd-hero-tag">Design System</span>
      <span class="rd-hero-tag">2025</span>
    </div> -->
    <h1 class="rd-hero-title rv d2"><?php echo $reference->getNomClient(); ?></h1>
    <p class="rd-hero-subtitle rv d3"><?php echo $reference->getExtrait(); ?></p>
  </div>
  <div class="rd-hero-scroll" aria-hidden="true">
    <span>Scroll</span>
    <div class="rd-hero-scroll-line"></div>
  </div>
</section>

<!-- META STRIP -->
<div class="rd-meta">
  <div class="container" style="padding:0">
    <div class="rd-meta-inner">
      <div class="rd-meta-item">
        <div class="rd-meta-lbl">Client</div>
        <div class="rd-meta-val"><?php echo $reference->getNomClient(); ?></div>
      </div>
      <div class="rd-meta-item">
        <div class="rd-meta-lbl">Secteur</div>
        <div class="rd-meta-val"><?php echo $reference->getSecteur(); ?></div>
      </div>
      <div class="rd-meta-item">
        <div class="rd-meta-lbl">Durée</div>
        <div class="rd-meta-val"><?php echo $reference->getDuree(); ?></div>
      </div>
      <div class="rd-meta-item">
        <div class="rd-meta-lbl">Services</div>
        <div class="rd-meta-val" style="font-size:1rem;"><?php echo $reference->getService(); ?></div>
      </div>
      <div class="rd-meta-item">
        <div class="rd-meta-lbl">Voir le site</div>
        <div class="rd-meta-val">
          <a href="<?php echo 'https://' . $reference->getSiteWeb(); ?>" target="_blank"><?php echo $reference->getSiteWeb(); ?> <i class="fa fa-arrow-up-right-from-square"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- INTRO -->
<section class="rd-content">
  <div class="rd-intro">
    <div class="container">
      <div class="rd-intro-inner">
        <div>
          <h2 class="rd-intro-title rv">Secteur d'<em>activité</em></h2>
          <p class="rd-intro-lead rv d1"><?php echo strip_tags($reference->getSecteurActivite()); ?></p>
        </div>
        <div>
          <div class="rd-intro-body rv d2">
			<?php echo $reference->getHistoriqueCollaboration(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FULL IMAGE 1 -->
  <div class="rd-fullimg">
    <div class="rd-fullimg-inner" style="background:linear-gradient(160deg,#081428 0%,#0d2545 55%,#162d56 100%)">
		<img src="<?php echo $siteURL; ?>images/references/<?php echo $reference->getPhoto(); ?>" alt="<?php echo $reference->getNomClient(); ?>">
	</div>
    <div class="rd-fullimg-caption">Interface principale — dashboard analytics redesigné</div>
  </div>

  <?php foreach($items as $item): ?>
  <?php if($item->getService() == 'shooting'): // Shooting Photo ?>
  <!-- GALLERY -->
  <div class="rd-gallery">
	<?php
	$photos = galerie_photo::findAllByGalerie($_SESSION['lang'], $item->getGalerie()->getId());
	foreach($photos as $photo) {
		?>
    <div class="rd-gal-item rv">
      <div class="rd-gal-inner" style="background:linear-gradient(135deg,#081428 0%,#0d2545 100%)">
		<img src="<?php echo $siteURL; ?>images/galerie/<?php echo $photo->getPhoto(); ?>" alt="<?php echo $photo->getTitre(); ?>"/>
	  </div>
      <span class="rd-gal-num">01 / Dashboard</span>
    </div>
	<?php
	}
	?>
  </div>
  <?php else: ?>		
  <!-- SPLIT SECTION -->
  <div class="rd-split">
    <div class="container">
      <div class="rd-split-inner">
        <div class="rd-split-img rv">
          <div class="rd-split-img-inner" style="background:linear-gradient(135deg,#06080e 0%,#0e1525 60%,#14213a 100%)">
			<img src="<?= $siteURL; ?>images/references/<?= $item->getPhoto(); ?>" alt="" />
		  </div>
        </div>
        <div>
          <div class="rd-split-label rv d1"><?php echo $item->getSousTitre(); ?></div>
          <h3 class="rd-split-heading rv d1"><?php echo $item->getTitre(); ?></h3>
          <div class="rd-split-text rv d2">
            <p><?php echo nl2br($item->getDescription()); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php endforeach; ?>

  <!-- PULL QUOTE -->
  <!-- <div class="rd-quote">
    <div class="container">
      <div class="rd-quote-inner rv">
        <p class="rd-quote-text">Hello World Agency n'a pas juste redesigné notre interface — ils ont transformé la façon dont nos clients vivent notre produit. La différence est mesurable, immédiate, et durable.</p>
        <div class="rd-quote-attr">Marcus Chen — CPO, Orbital Inc.</div>
      </div>
    </div>
  </div> -->

  <!-- METRICS -->
  <div class="rd-metrics">
    <div class="container">
      <div class="sec-label">Résultats</div>
      <h2 class="sec-title rv">Des métriques qui <em>parlent</em></h2>
      <div class="rd-metrics-grid rv d1">
        <div class="rd-metric">
          <div class="rd-metric-val" id="m1">0<span>%</span></div>
          <div class="rd-metric-lbl">Rétention</div>
          <div class="rd-metric-desc">+68 pts en 3 mois</div>
        </div>
        <div class="rd-metric">
          <div class="rd-metric-val" id="m2">0<span>%</span></div>
          <div class="rd-metric-lbl">NPS Score</div>
          <div class="rd-metric-desc">De 18 à 74</div>
        </div>
        <div class="rd-metric">
          <div class="rd-metric-val" id="m3">0<span>%</span></div>
          <div class="rd-metric-lbl">Support calls</div>
          <div class="rd-metric-desc">Réduction des tickets</div>
        </div>
        <div class="rd-metric">
          <div class="rd-metric-val" id="m4">0<span>sem.</span></div>
          <div class="rd-metric-lbl">Time-to-value</div>
          <div class="rd-metric-desc">De 3 sem. à 4 jours</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- NEXT PROJECT -->
<a href="<?php echo $reference->getNext()->getLink(); ?>" class="rd-next">
  <div class="rd-next-bg">
    <div class="rd-next-inner">
      <div>
        <div class="rd-next-label">Projet suivant</div>
        <div class="rd-next-title"><?php echo $reference->getNext()->getNomClient(); ?></div>
      </div>
      <div class="rd-next-arr"><i class="fa fa-arrow-right"></i></div>
    </div>
  </div>
</a>

<button class="back-top" id="backTop" onclick="window.scrollTo({top:0,behavior:'smooth'})"><i class="fa fa-arrow-up"></i></button>

<script>
/* Count-up animation */
(function(){
  const targets=[{el:'m1',end:68,suffix:'%'},{el:'m2',end:74,suffix:'%'},{el:'m3',end:43,suffix:'%'},{el:'m4',end:4,suffix:'j.'}];
  const metricEls=targets.map(t=>({...t,el:document.getElementById(t.el)}));
  const io=new IntersectionObserver(entries=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        const t=metricEls.find(m=>m.el===e.target);
        if(!t)return;
        let start=0;const dur=1600;const step=16;const steps=dur/step;
        const timer=setInterval(()=>{
          start+=t.end/steps;
          const v=Math.min(Math.round(start),t.end);
          e.target.innerHTML=v+'<span>'+t.suffix+'</span>';
          if(v>=t.end)clearInterval(timer);
        },step);
        io.unobserve(e.target);
      }
    });
  },{threshold:0.5});
  metricEls.forEach(m=>io.observe(m.el));
})();
</script>