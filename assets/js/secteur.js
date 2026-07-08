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
