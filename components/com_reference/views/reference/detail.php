
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
      <?php if (!empty($reference->getSiteWeb())) : ?>
        <div class="rd-meta-item">
            <div class="rd-meta-lbl">Voir le site</div>
            <div class="rd-meta-val">
                <a href="https://<?php echo $reference->getSiteWeb(); ?>" target="_blank" rel="noopener noreferrer">
                    <?php echo $reference->getSiteWeb(); ?>
                    <i class="fa fa-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>
      <?php endif; ?>
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
      <!-- <span class="rd-gal-num">01 / Dashboard</span> -->
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
        <div class="rd-split-img rv<?php echo $item->getService() == 'mobile' ? ' rd-split-img--mobile' : ''; ?>">
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
  <!-- <div class="rd-metrics">
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
  </div> -->
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

<script src="<?php echo $siteURL; ?>assets/js/reference.js"></script>

<script>
// const cur=document.getElementById('cur'),cur2=document.getElementById('cur2');
// document.addEventListener('mousemove',e=>{cur.style.left=e.clientX+'px';cur.style.top=e.clientY+'px';cur2.style.left=e.clientX+'px';cur2.style.top=e.clientY+'px';});
// document.querySelectorAll('a,button,.rd-gal-item,.rd-next').forEach(el=>{el.addEventListener('mouseenter',()=>cur.style.transform='translate(-50%,-50%) scale(2.5)');el.addEventListener('mouseleave',()=>cur.style.transform='translate(-50%,-50%) scale(1)');});
// const hdr=document.getElementById('hdr'),backTop=document.getElementById('backTop');
// window.addEventListener('scroll',()=>{hdr.classList.toggle('scrolled',window.scrollY>80);backTop.classList.toggle('show',window.scrollY>600);},{passive:true});
// const mobileNav=document.getElementById('mobileNav'),burger=document.getElementById('burger');let navOpen=false;
// function closeMobileNav(){navOpen=false;mobileNav.classList.remove('open');}
// burger.addEventListener('click',()=>{navOpen=!navOpen;mobileNav.classList.toggle('open',navOpen);});
// const io=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('on');io.unobserve(e.target);}});},{threshold:0.1});
// document.querySelectorAll('.rv').forEach(el=>io.observe(el));
// (function(){document.querySelectorAll('.has-sub').forEach(el=>{let timer;el.addEventListener('mouseenter',()=>{clearTimeout(timer);el.classList.add('open');});el.addEventListener('mouseleave',()=>{timer=setTimeout(()=>el.classList.remove('open'),180);});});document.addEventListener('click',e=>{if(!e.target.closest('.has-sub'))document.querySelectorAll('.has-sub.open').forEach(el=>el.classList.remove('open'));});})();
// (function(){const sel=document.getElementById('langSel'),btn=document.getElementById('langBtn'),cur=document.getElementById('langCur');if(!sel)return;btn.addEventListener('click',e=>{e.stopPropagation();sel.classList.toggle('open');});document.addEventListener('click',()=>sel.classList.remove('open'));sel.querySelectorAll('.lang-opt').forEach(opt=>{opt.addEventListener('click',e=>{e.preventDefault();sel.querySelectorAll('.lang-opt').forEach(o=>o.classList.remove('active'));opt.classList.add('active');cur.textContent=opt.textContent.trim().split(' ')[1].slice(0,2).toUpperCase();sel.classList.remove('open');});});})();
// (function(){function splitChars(el){el.classList.add('fancy-title');let ci=0;function proc(node){if(node.nodeType===3){const frag=document.createDocumentFragment();for(const c of node.textContent){const s=document.createElement('span');if(c===' '){s.className='ch sp';s.innerHTML='&nbsp;';}else{s.className='ch';s.style.setProperty('--ci',ci++);s.textContent=c;}frag.appendChild(s);}node.parentNode.replaceChild(frag,node);}else if(node.nodeType===1&&node.tagName!=='BR')Array.from(node.childNodes).forEach(proc);}Array.from(el.childNodes).forEach(proc);}document.querySelectorAll('.sec-title').forEach(splitChars);})();
// /* Count-up animation */
// (function(){
//   const targets=[{el:'m1',end:68,suffix:'%'},{el:'m2',end:74,suffix:'%'},{el:'m3',end:43,suffix:'%'},{el:'m4',end:4,suffix:'j.'}];
//   const metricEls=targets.map(t=>({...t,el:document.getElementById(t.el)}));
//   const io=new IntersectionObserver(entries=>{
//     entries.forEach(e=>{
//       if(e.isIntersecting){
//         const t=metricEls.find(m=>m.el===e.target);
//         if(!t)return;
//         let start=0;const dur=1600;const step=16;const steps=dur/step;
//         const timer=setInterval(()=>{
//           start+=t.end/steps;
//           const v=Math.min(Math.round(start),t.end);
//           e.target.innerHTML=v+'<span>'+t.suffix+'</span>';
//           if(v>=t.end)clearInterval(timer);
//         },step);
//         io.unobserve(e.target);
//       }
//     });
//   },{threshold:0.5});
//   metricEls.forEach(m=>io.observe(m.el));
// })();
</script>