function hwSecteurReady(fn) {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fn);
    } else {
        fn();
    }
}

/* Toutes les pages secteur — section "parcours" (parallax + beam 1->6 + tilt 3D glass) */
hwSecteurReady(function () {
  const section = document.getElementById('parcours');
  if(!section) return;
  const jpImg = document.getElementById('jpImg');

  /* ── Parallax : image bouge en sens inverse du scroll ±100px ── */
  function updateParallax(){
    if(!jpImg) return;
    const rect   = section.getBoundingClientRect();
    const vh     = window.innerHeight;
    const midSec = rect.top + rect.height * .5;
    const span   = vh * .5 + rect.height * .5;
    const delta  = (midSec - vh * .5) / span;       /* -1 → +1 */
    jpImg.style.transform = `translateY(${(delta * 200).toFixed(2)}px)`;
  }

  /* ── Interpolation JAUNE → VERT WhatsApp selon index step ──
     Yellow  #FFD700 = rgb(255,215,  0)
     WA Green #25D366 = rgb( 37,211,102)
     Passage par un intermédiaire sombre pour l'effet "go dark"
     Point intermédiaire (t=.5) : #128C7E = rgb(18,140,126)            */
  function stepColor(i, N){
    const t = N <= 1 ? 0 : i / (N - 1);   /* 0 = step1, 1 = step6 */
    let r, g, b;
    if(t <= .5){
      /* jaune → sombre (#128C7E) */
      const u = t * 2;
      r = Math.round(255 + (18  - 255) * u);
      g = Math.round(215 + (140 - 215) * u);
      b = Math.round(0   + (126 - 0)   * u);
    } else {
      /* sombre → WhatsApp vert */
      const u = (t - .5) * 2;
      r = Math.round(18  + (37  - 18)  * u);
      g = Math.round(140 + (211 - 140) * u);
      b = Math.round(126 + (102 - 126) * u);
    }
    return { solid:`rgb(${r},${g},${b})`, glow:`rgba(${r},${g},${b},.62)` };
  }

  /* ── Beam 1→6 — UNE SEULE FOIS, scroll-driven ── */
  function updateSteps(){
    const rect     = section.getBoundingClientRect();
    const vh       = window.innerHeight;
    const scrolled = vh - rect.top;
    const dist     = rect.height * .55;
    const pct      = Math.max(0, Math.min(1, scrolled / dist));

    const activePane = section.querySelector('.tab-pane.active');
    if(!activePane) return;
    const beam  = activePane.querySelector('.jf-beam');
    const steps = Array.from(activePane.querySelectorAll('.jf-step'));
    const N     = steps.length;

    /* Beam width + dot voyageur qui suit le même trajet jaune→sombre→vert */
    if(beam){
      beam.style.width = (pct * 100).toFixed(2) + '%';
      beam.classList.toggle('done', pct >= 1);
      /* Couleur dot = même interpolation 2 temps que stepColor */
      let dr, dg, db;
      if(pct <= .5){
        const u = pct * 2;
        dr = Math.round(255 + (18  - 255) * u);
        dg = Math.round(215 + (140 - 215) * u);
        db = Math.round(0   + (126 - 0)   * u);
      } else {
        const u = (pct - .5) * 2;
        dr = Math.round(18  + (37  - 18)  * u);
        dg = Math.round(140 + (211 - 140) * u);
        db = Math.round(126 + (102 - 126) * u);
      }
      beam.style.setProperty('--dot-color', `rgb(${dr},${dg},${db})`);
      beam.style.setProperty('--dot-glow',  `rgba(${dr},${dg},${db},.72)`);
    }

    steps.forEach((step, i) => {
      const isLit  = pct >= i / N;
      const isDone = pct >= (i + 1) / N;
      if(pct > 0) step.classList.add('jf-in');
      step.classList.toggle('jf-done',   isDone);
      step.classList.toggle('jf-active', isLit && !isDone);

      /* Injecte la couleur interpolée sur chaque step lit/done */
      if(isLit){
        const { solid, glow } = stepColor(i, N);
        step.style.setProperty('--sc',  solid);
        step.style.setProperty('--scg', glow);
      } else {
        step.style.removeProperty('--sc');
        step.style.removeProperty('--scg');
      }
    });
  }


  /* ── Scroll listener ── */
  let raf = null;
  function tick(){ updateParallax(); updateSteps(); raf = null; }
  window.addEventListener('scroll', () => { if(!raf) raf = requestAnimationFrame(tick); }, {passive:true});
  window.addEventListener('resize', () => { if(!raf) raf = requestAnimationFrame(tick); }, {passive:true});


  /* ── Reveal initial en cascade ── */
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(!e.isIntersecting) return;
      e.target.querySelectorAll('.jf-step').forEach((s, i) => setTimeout(() => s.classList.add('jf-in'), i * 110));
      io.unobserve(e.target);
    });
  }, {threshold: .06});
  const firstFlow = section.querySelector('.tab-pane.active .journey-flow');
  if(firstFlow) io.observe(firstFlow);

  /* ── 3D Glass Tilt au hover ── */
  function attachTilt(flow){
    flow.querySelectorAll('.jf-step').forEach(step => {
      let on = false;
      step.addEventListener('mouseenter', () => {
        on = true;
        step.style.transition = 'background .25s,border-color .25s,box-shadow .25s,transform .06s linear';
      });
      step.addEventListener('mousemove', e => {
        if(!on) return;
        const r  = step.getBoundingClientRect();
        const dx = ((e.clientX - r.left) / r.width  - .5) * 2;
        const dy = ((e.clientY - r.top)  / r.height - .5) * 2;
        step.style.transform = `perspective(360px) rotateX(${(-dy*8).toFixed(1)}deg) rotateY(${(dx*10).toFixed(1)}deg) translateZ(18px) scale(1.05)`;
      });
      step.addEventListener('mouseleave', () => {
        on = false;
        step.style.transition = 'opacity .55s ease,transform .5s cubic-bezier(.34,1.46,.64,1),background .35s,border-color .35s,box-shadow .35s';
        step.style.transform = 'perspective(600px) rotateX(0) translateY(0)';
      });
    });
  }
  section.querySelectorAll('.journey-flow').forEach(attachTilt);
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => requestAnimationFrame(() => {
      const f = section.querySelector('.tab-pane.active .journey-flow');
      if(f){ attachTilt(f); updateSteps(); }
    }));
  });

  updateParallax();
  updateSteps();

});

/* Toutes les pages secteur — compteurs animés (.sh-counter) */
hwSecteurReady(function () {
  const counters = document.querySelectorAll('.sh-counter');
  const cio = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(!e.isIntersecting) return;
      const el = e.target;
      const target = parseInt(el.dataset.target, 10);
      const duration = 1600;
      const start = performance.now();
      function update(now){
        const p = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - p, 3);
        el.textContent = Math.round(eased * target);
        if(p < 1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update);
      cio.unobserve(el);
    });
  }, {threshold:.5});
  counters.forEach(c => cio.observe(c));
});

/* Toutes les pages secteur — onglets (.tab-btn / .tab-pane) */
hwSecteurReady(function () {
  const btns = document.querySelectorAll('.tab-btn');
  const panes = document.querySelectorAll('.tab-pane');
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      btns.forEach(b => b.classList.remove('active'));
      panes.forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      const target = document.getElementById('tab-' + btn.dataset.tab);
      if(target){
        target.classList.add('active');
        target.querySelectorAll('.jf-step').forEach((s,i) => {
          s.classList.remove('jf-in');
          setTimeout(() => s.classList.add('jf-in'), i * 80);
        });
      }
    });
  });
});

/* Toutes les pages secteur — timeline de déploiement (spine + orbe) */
hwSecteurReady(function () {
  const timeline  = document.getElementById('sdtlTimeline');
  const spineFill = document.getElementById('sdtlSpineFill');
  const orb       = document.getElementById('sdtlOrb');
  const steps     = document.querySelectorAll('.sdtl-step');
  if(!timeline || !spineFill) return;

  let rafId = null;
  function updateTimeline(){
    const rect = timeline.getBoundingClientRect();
    const vh   = window.innerHeight;
    const raw  = (vh * 0.65 - rect.top) / (rect.height + vh * 0.05);
    const p    = Math.max(0, Math.min(1, raw));
    spineFill.style.height = (p * 100) + '%';
    if(orb){
      const sp = window.scrollY / Math.max(1, document.body.scrollHeight - vh);
      orb.style.transform =
        `rotateY(${(sp * 720).toFixed(2)}deg) rotateX(${(sp * 300).toFixed(2)}deg)`;
    }
    rafId = null;
  }
  function onScroll(){
    if(!rafId) rafId = requestAnimationFrame(updateTimeline);
  }

  const stepIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(e.isIntersecting){
        e.target.classList.add('active');
      } else {
        if(e.boundingClientRect.top > 0) e.target.classList.remove('active');
      }
    });
  }, {threshold: 0.22});
  steps.forEach(s => stepIO.observe(s));

  window.addEventListener('scroll', onScroll, {passive:true});
  window.addEventListener('resize', onScroll, {passive:true});
  updateTimeline();
});

/* Toutes les pages secteur — accordéon (.acc-item / .acc-trigger) */
hwSecteurReady(function () {
  const items = document.querySelectorAll('.acc-item');
  items.forEach(item => {
    const trigger = item.querySelector('.acc-trigger');
    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');
      items.forEach(i => i.classList.remove('open'));
      if(!isOpen) item.classList.add('open');
    });
  });
});

/* Pages secteur avec mockup téléphone WhatsApp (#waScene / #wa3dGroup) — hôtellerie, restauration */
hwSecteurReady(function () {
  const scene = document.getElementById('waScene');
  const group = document.getElementById('wa3dGroup');
  if(!scene || !group) return;

  const revIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(e.isIntersecting){ group.classList.add('wa-revealed'); revIO.unobserve(group); }
    });
  }, {threshold:.15});
  revIO.observe(group);

  const BASE_Y = -13, BASE_X = 5;

  function scrollProgress(){
    const r   = scene.getBoundingClientRect();
    const mid = r.top + r.height / 2;
    return (window.innerHeight / 2 - mid) / (window.innerHeight / 2);
  }
  function restY(){ return BASE_Y + scrollProgress() * 6; }
  function restX(){ return BASE_X - scrollProgress() * 3; }

  let hovering = false;
  scene.addEventListener('mouseenter', () => {
    hovering = true;
    group.style.transition = 'transform .1s ease';
  });
  scene.addEventListener('mouseleave', () => {
    hovering = false;
    group.style.transition = 'transform .65s cubic-bezier(.4,0,.2,1)';
    group.style.transform  = `rotateY(${restY()}deg) rotateX(${restX()}deg)`;
  });
  scene.addEventListener('mousemove', e => {
    if(!hovering) return;
    const r  = scene.getBoundingClientRect();
    const dx = ((e.clientX - r.left) / r.width  - .5) * 2;
    const dy = ((e.clientY - r.top)  / r.height - .5) * 2;
    group.style.transform = `rotateY(${BASE_Y + dx * 16}deg) rotateX(${BASE_X - dy * 9}deg) scale(1.02)`;
  });

  let raf = null;
  window.addEventListener('scroll', () => {
    if(hovering) return;
    if(!raf) raf = requestAnimationFrame(() => {
      group.style.transform = `rotateY(${restY()}deg) rotateX(${restX()}deg)`;
      raf = null;
    });
  }, {passive:true});
});

