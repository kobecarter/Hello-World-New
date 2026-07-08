function hwServiceReady(fn) {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fn);
    } else {
        fn();
    }
}

/* web-mobile.php — services carousel (GSAP pin + scrub) */
hwServiceReady(function () {
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
});

/* web-mobile.php — process timeline (scroll spine + orbit) */
hwServiceReady(function () {
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
});
