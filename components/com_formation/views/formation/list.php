<?php
/* ── meta par slug : icon FA, label, couleur badge ──────────────────── */
$hwflMeta = [
    'strategie-performance-digitale-ia'  => ['icon' => 'fa-chess',           'label' => 'Stratégie',    'color' => '#09A1BE'],
    'claude-code-site-premium'           => ['icon' => 'fa-code',            'label' => 'Tech & Build', 'color' => '#680262'],
    'n8n-ia-automatisation-processus'    => ['icon' => 'fa-diagram-project', 'label' => 'Ops & Growth', 'color' => '#09A1BE'],
    'podcast-ia-showrunner'              => ['icon' => 'fa-microphone',      'label' => 'Créateurs',    'color' => '#680262'],
];
?>
<style>
/* ── VARIABLES & RESET ─────────────────────────────────────────────────── */
:root{--hwfl-ease:cubic-bezier(0.23,1,0.32,1);--hwfl-gold:#09A1BE;--hwfl-purple:#680262;--hwfl-border:rgba(0,0,0,.08);--hwfl-txt:#111;--hwfl-txt2:#555}

/* ── HERO SIDE — trust items dans le wm-hero ───────────────────────────── */
.hw-f-list-trust{display:flex;flex-direction:column;gap:.9rem}
.hw-f-list-trust-item{display:flex;align-items:center;gap:.75rem;padding:.85rem 1.2rem;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);border-radius:12px;font-size:.75rem;color:var(--txt2,#888);transition:border-color .25s,background .25s}
.hw-f-list-trust-item:hover{border-color:rgba(9,161,190,.25);background:rgba(9,161,190,.04)}
.hw-f-list-trust-item i{color:var(--gold,#09A1BE);font-size:.8rem;width:16px;text-align:center;flex-shrink:0}

/* ── POURQUOI HW — 4 cards ────────────────────────────────────────────── */
.hw-f-list-why{padding:7rem 0;background:#fff;border-top:1px solid var(--hwfl-border)}
.hw-f-list-why-head{margin-bottom:4rem}
.hw-f-list-why-head p{font-size:.88rem;color:var(--hwfl-txt2);line-height:1.9;font-weight:300;margin-top:1rem}
.hw-f-list-why-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:1.4rem}
.hw-f-list-why-card{background:#fff;border:1.5px solid var(--hwfl-border);border-radius:20px;padding:2rem 1.8rem;display:flex;flex-direction:column;gap:1rem;position:relative;overflow:hidden;cursor:default;will-change:transform;transition:border-color .3s var(--hwfl-ease),box-shadow .3s var(--hwfl-ease)}
.hw-f-list-why-card::after{content:'';position:absolute;inset:0;border-radius:20px;background:linear-gradient(135deg,rgba(104,2,98,.03),rgba(9,161,190,.03));opacity:0;transition:opacity .3s}
.hw-f-list-why-card:hover{border-color:rgba(9,161,190,.3);box-shadow:0 18px 44px rgba(0,0,0,.07)}
.hw-f-list-why-card:hover::after{opacity:1}
.hw-f-list-why-card-icon{width:52px;height:52px;border-radius:15px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;color:#fff;flex-shrink:0;transition:transform .45s var(--hwfl-ease)}
.hw-f-list-why-card:hover .hw-f-list-why-card-icon{transform:scale(1.08) rotate(-5deg)}
.hw-f-list-why-card-num{font-size:2.2rem;font-weight:200;letter-spacing:-.05em;line-height:1;margin-top:.2rem}
.hw-f-list-why-card-num em{font-style:normal;background:linear-gradient(135deg,#680262,#09A1BE);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.hw-f-list-why-card-title{font-weight:700;font-size:.88rem;color:var(--hwfl-txt);line-height:1.3;margin-top:.2rem}
.hw-f-list-why-card-text{font-size:.76rem;color:var(--hwfl-txt2);line-height:1.85;font-weight:300;flex:1}
.hw-f-list-why-card-cta{display:flex;align-items:center;gap:.4rem;font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--hwfl-gold);margin-top:auto;padding-top:.9rem;border-top:1px solid var(--hwfl-border);transition:gap .2s var(--hwfl-ease)}
.hw-f-list-why-card:hover .hw-f-list-why-card-cta{gap:.65rem}
.hw-f-list-why-card-cta i{font-size:.65rem;transition:transform .2s}
.hw-f-list-why-card:hover .hw-f-list-why-card-cta i{transform:translateX(2px)}
@media(max-width:1024px){.hw-f-list-why-cards{grid-template-columns:repeat(2,1fr)}}
@media(max-width:540px){.hw-f-list-why-cards{grid-template-columns:1fr}}

/* ── CATALOGUE ────────────────────────────────────────────────────────── */
.hw-f-list-catalogue{padding:7rem 0;background:#fff;border-top:1px solid var(--hwfl-border)}
.hw-f-list-intro-text{max-width:660px;font-size:.9rem;color:var(--hwfl-txt2);line-height:1.9;font-weight:300;margin-top:1.2rem}
.hw-f-list-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1.5rem;margin-top:3.5rem}
.hw-f-list-card{background:#fff;border:1px solid var(--hwfl-border);border-radius:20px;padding:2.4rem;text-decoration:none;color:inherit;display:flex;flex-direction:column;gap:.8rem;position:relative;overflow:hidden;transition:transform .35s var(--hwfl-ease),box-shadow .35s var(--hwfl-ease),border-color .35s}
.hw-f-list-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(104,2,98,.03),rgba(9,161,190,.03));opacity:0;transition:opacity .3s}
.hw-f-list-card:hover{transform:translateY(-6px);box-shadow:0 20px 50px rgba(0,0,0,.08);border-color:rgba(9,161,190,.2)}
.hw-f-list-card:hover::before{opacity:1}
.hw-f-list-card:active{transform:scale(.98)}
.hw-f-list-card-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:.4rem}
.hw-f-list-card-icon{width:48px;height:48px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:1rem}
.hw-f-list-card-badge{font-size:.55rem;letter-spacing:.25em;text-transform:uppercase;font-weight:700;padding:.3rem .8rem;border-radius:100px;border:1px solid}
.hw-f-list-card-badge.gold{color:var(--hwfl-gold);border-color:rgba(9,161,190,.25);background:rgba(9,161,190,.06)}
.hw-f-list-card-badge.purple{color:var(--hwfl-purple);border-color:rgba(104,2,98,.2);background:rgba(104,2,98,.05)}
.hw-f-list-card-title{font-family:var(--fm,sans-serif);font-weight:600;font-size:1.15rem;color:var(--hwfl-txt);line-height:1.2;margin-bottom:.2rem}
.hw-f-list-card-sub{font-size:.78rem;color:var(--hwfl-txt2);line-height:1.75;font-weight:300}
.hw-f-list-card-meta{display:flex;flex-wrap:wrap;gap:1.2rem;padding:1.2rem 0;border-top:1px solid var(--hwfl-border);margin-top:.6rem}
.hw-f-list-card-meta-item{display:flex;align-items:center;gap:.45rem;font-size:.7rem;color:var(--hwfl-txt2)}
.hw-f-list-card-meta-item i{color:var(--hwfl-gold);font-size:.7rem;width:12px;text-align:center}
.hw-f-list-card-cta{display:flex;align-items:center;gap:.5rem;font-size:.74rem;font-weight:600;color:var(--hwfl-gold);margin-top:auto;padding-top:.6rem;transition:gap .2s var(--hwfl-ease)}
.hw-f-list-card:hover .hw-f-list-card-cta{gap:.9rem}
.hw-f-list-empty{padding:4rem;text-align:center;background:#f8f8f8;border-radius:16px;border:2px dashed var(--hwfl-border)}
.hw-f-list-empty p{color:var(--hwfl-txt2);font-size:.88rem;margin:0}
@media(max-width:768px){.hw-f-list-grid{grid-template-columns:1fr}}

/* ── CE QUE VOS ÉQUIPES GAGNENT — strip expansible ───────────────────── */
.hw-f-list-gains{padding:7rem 0;background:#f8f8f8;border-top:1px solid var(--hwfl-border)}
.hw-f-list-gains-strip{display:flex;gap:1.2rem;height:500px;margin-top:3.5rem}
.hw-f-list-gain-card{flex:1;min-width:0;position:relative;overflow:hidden;border-radius:22px;background:#fff;border:1.5px solid var(--hwfl-border);cursor:pointer;transition:flex .6s cubic-bezier(0.23,1,0.32,1),border-color .35s,box-shadow .35s;will-change:flex}
.hw-f-list-gain-card.active{flex:2.6;border-color:rgba(9,161,190,.2);box-shadow:0 24px 64px rgba(0,0,0,.07)}
/* ghost number */
.hw-f-list-gain-card-num{position:absolute;top:1.5rem;left:1.6rem;font-size:4.4rem;font-weight:200;letter-spacing:-.04em;color:rgba(0,0,0,.055);line-height:1;transition:opacity .3s,transform .35s cubic-bezier(0.23,1,0.32,1);pointer-events:none;z-index:1}
.hw-f-list-gain-card.active .hw-f-list-gain-card-num{opacity:0;transform:translateY(-10px)}
/* abstract image area */
.hw-f-list-gain-card-img{position:absolute;top:0;left:0;right:0;height:55%;overflow:hidden;border-radius:22px 22px 0 0;opacity:0;transform:translateY(-8px);transition:opacity .5s cubic-bezier(0.23,1,0.32,1) .06s,transform .5s cubic-bezier(0.23,1,0.32,1) .06s;pointer-events:none}
.hw-f-list-gain-card.active .hw-f-list-gain-card-img{opacity:1;transform:translateY(0)}
.hw-f-list-gain-card-img svg{display:block;width:100%;height:100%}
.hw-f-list-gain-card-img img{
  width: 100%;
  height: 100%;
  object-fit: cover;
}
/* body */
.hw-f-list-gain-card-body{position:absolute;bottom:0;left:0;right:0;padding:1.8rem;z-index:2;background:linear-gradient(to top,#fff 68%,rgba(255,255,255,0));display:flex;flex-direction:column;gap:.5rem}
.hw-f-list-gain-card-icon{width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,rgba(104,2,98,.08),rgba(9,161,190,.1));display:flex;align-items:center;justify-content:center;font-size:.82rem;color:var(--hwfl-gold);border:1px solid rgba(9,161,190,.15);flex-shrink:0;transition:transform .4s cubic-bezier(0.23,1,0.32,1)}
.hw-f-list-gain-card.active .hw-f-list-gain-card-icon{transform:scale(1.08)}
.hw-f-list-gain-card-title{font-weight:600;font-size:.92rem;color:var(--hwfl-txt);line-height:1.3}
.hw-f-list-gain-card-text{font-size:.75rem;color:var(--hwfl-txt2);line-height:1.85;font-weight:300;max-height:0;overflow:hidden;opacity:0;transition:max-height .45s cubic-bezier(0.23,1,0.32,1) .1s,opacity .4s .12s}
.hw-f-list-gain-card.active .hw-f-list-gain-card-text{max-height:160px;opacity:1}
@media(max-width:900px){
  .hw-f-list-gains-strip{flex-direction:column;height:auto}
  .hw-f-list-gain-card{flex:none;height:120px;transition:height .55s cubic-bezier(0.23,1,0.32,1),border-color .35s,box-shadow .35s}
  .hw-f-list-gain-card.active{flex:none;height:420px}
}
@media(max-width:500px){.hw-f-list-gain-card{height:100px}.hw-f-list-gain-card.active{height:380px}}

/* ── MÉTHODE — orbit ──────────────────────────────────────────────────── */
.hw-f-list-methode{padding:7rem 0;background:#fff;border-top:1px solid var(--hwfl-border)}
.hw-f-list-methode-inner{display:flex;align-items:center;gap:3.5rem}
.hw-f-list-methode-text{flex:0 0 340px;max-width:340px}
/* robot au CENTRE, 4 cartes réparties autour avec espace */
.hw-f-list-methode-orbit{position:relative;min-height:620px;flex:1;min-width:0}
/* aura glows brand colors — fond blanc, jamais sombre */
.hw-f-list-methode-orbit::before{content:'';position:absolute;left:20%;top:0;width:60%;height:100%;background:radial-gradient(ellipse at center,rgba(9,161,190,.07) 0%,transparent 65%);pointer-events:none;z-index:0}
.hw-f-list-methode-orbit::after{content:'';position:absolute;left:20%;top:0;width:60%;height:100%;background:radial-gradient(ellipse at center,rgba(104,2,98,.05) 0%,transparent 55%);pointer-events:none;z-index:0}
/* SVG arcs & rings overlay */
.hw-f-list-methode-arcs{position:absolute;inset:0;width:100%;height:100%;pointer-events:none;z-index:1;overflow:visible}
.hw-f-list-methode-arcs path.hwflm-arc{animation:hwflm-flow 4s linear infinite}
@keyframes hwflm-flow{from{stroke-dashoffset:52}to{stroke-dashoffset:0}}
/* robot au CENTRE exact */
.hw-f-list-methode-robot{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:190px;z-index:3;display:flex;flex-direction:column;align-items:center}
.hw-f-list-methode-robot img{width:100%;height:auto;display:block;filter:drop-shadow(0 18px 44px rgba(9,161,190,.22))}
.hw-f-list-methode-robot-ph{width:160px;height:160px;border-radius:50%;border:2px dashed rgba(9,161,190,.28);background:linear-gradient(135deg,rgba(9,161,190,.07),rgba(104,2,98,.06));display:flex;align-items:center;justify-content:center;color:rgba(9,161,190,.4);font-size:2.8rem}
/* 4 cartes aux 4 coins — bien séparées du robot central */
.hw-f-list-methode-card{position:absolute;width:230px;background:rgba(255,255,255,.95);border:1.5px solid var(--hwfl-border);border-radius:18px;padding:1.6rem;backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);box-shadow:0 4px 24px rgba(0,0,0,.05);z-index:3;cursor:default;transition:border-color .25s,box-shadow .3s,transform .4s cubic-bezier(0.23,1,0.32,1)}
.hw-f-list-methode-card:hover{border-color:rgba(9,161,190,.28);box-shadow:0 18px 48px rgba(0,0,0,.09)}
.pos-tl{top:0;left:calc(50% - 280px)}
.pos-tr{top:0;right:calc(50% - 280px)}
.pos-bl{bottom:40px;left:calc(50% - 280px)}
.pos-br{bottom:40px;right:calc(50% - 280px)}
.hw-f-list-methode-card-num{display:block;font-size:.5rem;letter-spacing:.22em;font-weight:700;color:rgba(0,0,0,.22);text-transform:uppercase;margin-bottom:.7rem}
.hw-f-list-methode-card-icon{width:32px;height:32px;border-radius:9px;background:linear-gradient(135deg,rgba(104,2,98,.08),rgba(9,161,190,.1));display:flex;align-items:center;justify-content:center;font-size:.78rem;color:var(--hwfl-gold);border:1px solid rgba(9,161,190,.14);margin-bottom:.7rem}
.hw-f-list-methode-card-title{font-weight:600;font-size:.88rem;color:var(--hwfl-txt);margin-bottom:.4rem;line-height:1.3}
.hw-f-list-methode-card-text{font-size:.73rem;color:var(--hwfl-txt2);line-height:1.82;font-weight:300}
/* responsive — orbit collapses to 2×2 grid */
@media(max-width:900px){
  .hw-f-list-methode-inner{flex-direction:column;align-items:stretch;gap:0}
  .hw-f-list-methode-text{flex:none;max-width:none}
  .hw-f-list-methode-orbit{min-height:auto;display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-top:2rem}
  .hw-f-list-methode-orbit::before,.hw-f-list-methode-orbit::after{display:none}
  .hw-f-list-methode-arcs,.hw-f-list-methode-robot{display:none!important}
  .hw-f-list-methode-card,.pos-tl,.pos-tr,.pos-bl,.pos-br{position:static;width:auto}
}
@media(max-width:500px){.hw-f-list-methode-orbit{grid-template-columns:1fr}}

/* ── FORMATS & MODALITÉS ──────────────────────────────────────────────── */
.hw-f-list-formats{padding:7rem 0;background:#f8f8f8;border-top:1px solid var(--hwfl-border)}
.hw-f-list-formats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-top:3.5rem}
.hw-f-list-format-card{padding:2rem;background:#fff;border:1px solid var(--hwfl-border);border-radius:16px;transition:border-color .25s,transform .25s var(--hwfl-ease)}
.hw-f-list-format-card:hover{border-color:rgba(9,161,190,.3);transform:translateY(-2px)}
.hw-f-list-format-icon{font-size:1.6rem;color:var(--hwfl-gold);margin-bottom:1rem}
.hw-f-list-format-title{font-weight:600;font-size:.84rem;color:var(--hwfl-txt);margin-bottom:.5rem}
.hw-f-list-format-text{font-size:.74rem;color:var(--hwfl-txt2);line-height:1.75}
@media(max-width:768px){.hw-f-list-formats-grid{grid-template-columns:1fr 1fr}}
@media(max-width:420px){.hw-f-list-formats-grid{grid-template-columns:1fr}}

/* ── TECH MARQUEE ─────────────────────────────────────────────────────── */
.hw-f-list-tech{padding:5rem 0;background:#fff;border-top:1px solid var(--hwfl-border);overflow:hidden}
.hw-f-list-tech-track{display:flex;gap:1.5rem;animation:hwfl-marquee 28s linear infinite}
.hw-f-list-tech-track:hover{animation-play-state:paused}
.hw-f-list-tech-badge{display:flex;align-items:center;gap:.6rem;padding:.65rem 1.2rem;background:#f8f8f8;border:1px solid var(--hwfl-border);border-radius:100px;white-space:nowrap;font-size:.72rem;font-weight:500;color:var(--hwfl-txt2);transition:background .2s,border-color .2s}
.hw-f-list-tech-badge:hover{background:#fff;border-color:rgba(9,161,190,.3);color:var(--hwfl-txt)}
.hw-f-list-tech-badge i{font-size:.85rem;color:var(--hwfl-gold)}
@keyframes hwfl-marquee{from{transform:translateX(0)}to{transform:translateX(-50%)}}

/* ── FAQ ──────────────────────────────────────────────────────────────── */
.hw-f-list-faq{padding:7rem 0;background:#fff;border-top:1px solid var(--hwfl-border)}
.hw-f-list-faq-display{font-size:clamp(2.4rem,4.8vw,5.5rem);font-weight:200;line-height:1.05;letter-spacing:-.04em;margin-bottom:4rem}
.hw-f-list-faq-display .col-purple{color:var(--hwfl-purple)}
.hw-f-list-faq-display .col-cyan{color:var(--hwfl-gold)}
.hw-f-list-faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:0 5rem}
.hw-f-list-faq-item{border-bottom:1px solid var(--hwfl-border)}
.hw-f-list-faq-q{display:flex;align-items:center;justify-content:space-between;padding:1.6rem 0;cursor:pointer;font-size:.88rem;font-weight:500;color:var(--hwfl-txt);gap:1.2rem;user-select:none}
.hw-f-list-faq-q-btn{width:30px;height:30px;border-radius:50%;border:1.5px solid rgba(0,0,0,.15);display:flex;align-items:center;justify-content:center;font-size:1.15rem;font-weight:300;line-height:1;color:var(--hwfl-txt);flex-shrink:0;transition:border-color .25s,color .25s,transform .4s var(--hwfl-ease)}
.hw-f-list-faq-item.open .hw-f-list-faq-q-btn{border-color:var(--hwfl-gold);color:var(--hwfl-gold);transform:rotate(45deg)}
.hw-f-list-faq-a{max-height:0;overflow:hidden;transition:max-height .4s var(--hwfl-ease)}
.hw-f-list-faq-a-inner{padding:0 0 1.4rem;font-size:.8rem;color:var(--hwfl-txt2);line-height:1.9}
@media(max-width:768px){.hw-f-list-faq-grid{grid-template-columns:1fr}}

/* ── PARTENAIRES MARQUEE ──────────────────────────────────────────────── */
.hw-f-list-partners{padding:5rem 0;background:#fff;border-top:1px solid var(--hwfl-border);overflow:hidden}
.hw-f-list-partners-label{text-align:center;font-size:.58rem;letter-spacing:.3em;text-transform:uppercase;color:var(--hwfl-txt2);margin-bottom:2.5rem;opacity:.5}
.hw-f-list-partner-track{display:flex;gap:3rem;align-items:center;animation:hwfl-marquee 35s linear infinite}
.hw-f-list-partner-track:hover{animation-play-state:paused}
.hw-f-list-partner-text{font-size:.7rem;font-weight:600;letter-spacing:.1em;color:var(--hwfl-txt2);opacity:.4;white-space:nowrap;text-transform:uppercase;transition:opacity .2s}
.hw-f-list-partner-text:hover{opacity:.8}

/* ── CTA FINAL ────────────────────────────────────────────────────────── */
.hw-f-list-cta-final{padding:9rem 0;background:linear-gradient(135deg,#680262 0%,#09A1BE 100%);text-align:center}
.hw-f-list-cta-final .sec-label{color:rgba(255,255,255,.45)}
.hw-f-list-cta-final .sec-title{color:#fff}
.hw-f-list-cta-sub{font-size:.88rem;color:rgba(255,255,255,.7);max-width:600px;margin:1.5rem auto 2.5rem;line-height:1.9;font-weight:300}

/* ── REDUCED MOTION ───────────────────────────────────────────────────── */
@media(prefers-reduced-motion:reduce){
  .hw-f-list-card,.hw-f-list-gain-item,.hw-f-list-format-card,.hw-f-list-why-item{transition:none!important}
  .hw-f-list-tech-track,.hw-f-list-partner-track{animation:none!important}
}
</style>

<!-- ══ HERO ══════════════════════════════════════════════════════════════ -->


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
        <h1 class="sh-h1 rv on">Formations <em>d'Excellence</em><br>pour Dirigeants et Équipes Agiles</h1>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un devis" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander un audit technique</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
        
            <a href="<?php echo $pageReference->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir nos offres" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir les réalisations</span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div> 
            </a>
        </div>
      </div>
     
    </div>
  </div>
</section>

<!-- ══ POURQUOI HELLO WORLD ══════════════════════════════════════════════ -->
<section class="hw-f-list-why">
  <div class="container">
    <div class="hw-f-list-why-head">
      <div class="sec-label rv">Pourquoi Hello World ?</div>
      <h2 class="sec-title rv d1">Nous ne vendons<br>pas de <em>promesses</em></h2>
      <p class="rv d2">Nos formations sont conçues pour créer un impact mesurable sur vos ventes, votre productivité, votre marketing et vos opérations.</p>
    </div>
    <div class="hw-f-list-why-cards">

      <div class="hw-f-list-why-card" id="hwfl-wc1">
        <div class="hw-f-list-why-card-icon" style="background:linear-gradient(135deg,#680262,#09A1BE)">
          <i class="fal fa-chart-line-up"></i>
        </div>
        <div class="hw-f-list-why-card-num"><em>ROI</em></div>
        <div class="hw-f-list-why-card-title">Approche orientée ROI</div>
        <p class="hw-f-list-why-card-text">Chaque module est calibré pour produire un résultat mesurable dans votre contexte métier réel.</p>
        <span class="hw-f-list-why-card-cta">Notre méthode <i class="fal fa-arrow-right"></i></span>
      </div>

      <div class="hw-f-list-why-card" id="hwfl-wc2">
        <div class="hw-f-list-why-card-icon" style="background:linear-gradient(135deg,#09A1BE,#0d7a92)">
          <i class="fal fa-bolt"></i>
        </div>
        <div class="hw-f-list-why-card-num"><em>100%</em></div>
        <div class="hw-f-list-why-card-title">Programmes intensifs et applicatifs</div>
        <p class="hw-f-list-why-card-text">Nous apprenons en faisant. Chaque heure de théorie est compensée par une heure de pratique sur votre projet réel.</p>
        <span class="hw-f-list-why-card-cta">Voir les formats <i class="fal fa-arrow-right"></i></span>
      </div>

      <div class="hw-f-list-why-card" id="hwfl-wc3">
        <div class="hw-f-list-why-card-icon" style="background:linear-gradient(135deg,#8B2568,#680262)">
          <i class="fal fa-route"></i>
        </div>
        <div class="hw-f-list-why-card-num">≤ <em>15</em></div>
        <div class="hw-f-list-why-card-title">Parcours adaptés à votre maturité</div>
        <p class="hw-f-list-why-card-text">TPE, PME, grande entreprise ou indépendant : le contenu et le rythme s'adaptent à votre niveau et à votre contexte.</p>
        <span class="hw-f-list-why-card-cta">Votre profil <i class="fal fa-arrow-right"></i></span>
      </div>

      <div class="hw-f-list-why-card" id="hwfl-wc4">
        <div class="hw-f-list-why-card-icon" style="background:linear-gradient(135deg,#09A1BE,#680262)">
          <i class="fal fa-box-open"></i>
        </div>
        <div class="hw-f-list-why-card-num"><em>J+1</em></div>
        <div class="hw-f-list-why-card-title">Livrables concrets en sortie</div>
        <p class="hw-f-list-why-card-text">Frameworks, automatisations, show bibles, roadmaps : vous repartez avec quelque chose à déployer dès lundi.</p>
        <span class="hw-f-list-why-card-cta">Les livrables <i class="fal fa-arrow-right"></i></span>
      </div>

    </div>
  </div>
</section>

<!-- ══ CATALOGUE ══════════════════════════════════════════════════════════ -->
<section class="hw-f-list-catalogue" id="hwfl-catalogue">
  <div class="container">
    <div class="sec-label rv">Nos formations premium IA</div>
    <h2 class="sec-title rv d1">Choisissez le programme<br>aligné avec <em>vos objectifs</em></h2>
    <p class="hw-f-list-intro-text rv d2">Chaque programme a été conçu pour répondre à un enjeu métier clair : structurer une stratégie IA rentable, accélérer le développement d'un produit, automatiser les opérations, ou bâtir un média de marque durable.</p>

    <?php if (!empty($formations)): ?>
    <div class="hw-f-list-grid">
      <?php foreach ($formations as $idx => $f):
        $sl   = $f->getSlug() ?? '';
        $meta = isset($hwflMeta[$sl]) ? $hwflMeta[$sl] : ['icon' => 'fa-graduation-cap', 'label' => 'Formation', 'color' => '#09A1BE'];
        $isGold = $meta['color'] === '#09A1BE';
        $fduree = 'Sur demande';
        if ($f->getDateDebut() && $f->getDateFin()) {
            try {
                $d1 = new DateTime($f->getDateDebut());
                $d2 = new DateTime($f->getDateFin());
                $days = (int)$d1->diff($d2)->days + 1;
                $fduree = $days . ' ' . ($days > 1 ? 'jours' : 'jour');
            } catch (Exception $e) {}
        }
        $dateStr = $f->getDateDebut() ? date('d M Y', strtotime($f->getDateDebut())) : '';
      ?>
      <a class="hw-f-list-card rv d<?= min($idx + 1, 4); ?>" href="<?= $f->getLink(); ?>">
        <div class="hw-f-list-card-top">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,<?= $isGold ? 'rgba(9,161,190,.1)' : 'rgba(104,2,98,.08)'; ?>,<?= $isGold ? 'rgba(9,161,190,.05)' : 'rgba(104,2,98,.04)'; ?>);border:1px solid <?= $isGold ? 'rgba(9,161,190,.2)' : 'rgba(104,2,98,.18)'; ?>">
            <i class="fal <?= htmlspecialchars($meta['icon'], ENT_QUOTES, 'UTF-8'); ?>" style="color:<?= $meta['color']; ?>;font-size:.95rem"></i>
          </div>
          <span class="hw-f-list-card-badge <?= $isGold ? 'gold' : 'purple'; ?>"><?= htmlspecialchars($meta['label'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="hw-f-list-card-title"><?= htmlspecialchars($f->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="hw-f-list-card-sub"><?= htmlspecialchars(mb_strimwidth($f->getSousTitre() ?? '', 0, 120, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="hw-f-list-card-meta">
          <span class="hw-f-list-card-meta-item"><i class="fal fa-clock"></i> <?= htmlspecialchars($fduree, ENT_QUOTES, 'UTF-8'); ?></span>
          <?php if ($dateStr): ?><span class="hw-f-list-card-meta-item"><i class="fal fa-calendar"></i> <?= htmlspecialchars($dateStr, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
          <?php if ($f->getLieu()): ?><span class="hw-f-list-card-meta-item"><i class="fal fa-location-dot"></i> <?= htmlspecialchars(explode(' —', $f->getLieu())[0], ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
          <span class="hw-f-list-card-meta-item"><i class="fal fa-users"></i> Max. <?= intval($f->getNbParticipants()); ?></span>
        </div>
        <div class="hw-f-list-card-cta">Voir le programme <i class="fal fa-arrow-right"></i></div>
      </a>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="hw-f-list-empty rv">
      <p>Les formations arrivent bientôt. <strong>Exécutez le script SQL de seed</strong> (<code>seed_formations_v2.sql</code>) dans phpMyAdmin pour peupler le catalogue.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ══ CE QUE VOS ÉQUIPES GAGNENT ════════════════════════════════════════ -->
<section class="hw-f-list-gains">
  <div class="container">
    <div class="sec-label rv">Des formations conçues pour produire</div>
    <h2 class="sec-title rv d1">Un avant / après<br><em>mesurable</em></h2>
    <div class="hw-f-list-gains-strip rv d2">

      <!-- 01 — Clarté stratégique -->
      <div class="hw-f-list-gain-card">
        <div class="hw-f-list-gain-card-num">01.</div>
        <div class="hw-f-list-gain-card-img">
        <img src="<?=$siteURL ?>/images/clarte.jpg" alt="Clarté stratégique">
        </div>
        <div class="hw-f-list-gain-card-body">
          <div class="hw-f-list-gain-card-icon"><i class="fal fa-bullseye"></i></div>
          <div class="hw-f-list-gain-card-title">Clarté stratégique</div>
          <p class="hw-f-list-gain-card-text">Vous identifiez précisément où l'IA crée réellement de la valeur dans votre organisation, et où elle ne ferait que complexifier.</p>
        </div>
      </div>

      <!-- 02 — Gain de temps -->
      <div class="hw-f-list-gain-card">
        <div class="hw-f-list-gain-card-num">02.</div>
        <div class="hw-f-list-gain-card-img">
         <img src="<?=$siteURL ?>/images/temps.jpg" alt="Gain de temps">
        </div>
        <div class="hw-f-list-gain-card-body">
          <div class="hw-f-list-gain-card-icon"><i class="fal fa-timer"></i></div>
          <div class="hw-f-list-gain-card-title">Gain de temps</div>
          <p class="hw-f-list-gain-card-text">Vous remplacez des heures de travail répétitif par des systèmes plus intelligents, libérant vos équipes pour les tâches à forte valeur ajoutée.</p>
        </div>
      </div>

      <!-- 03 — Montée en autonomie -->
      <div class="hw-f-list-gain-card">
        <div class="hw-f-list-gain-card-num">03.</div>
        <div class="hw-f-list-gain-card-img">
     <img src="<?=$siteURL ?>/images/monte.jpg" alt="Montée en autonomie">
        </div>
        <div class="hw-f-list-gain-card-body">
          <div class="hw-f-list-gain-card-icon"><i class="fal fa-graduation-cap"></i></div>
          <div class="hw-f-list-gain-card-title">Montée en autonomie</div>
          <p class="hw-f-list-gain-card-text">Vos équipes apprennent à utiliser les outils avec méthode, et non à dépendre d'une mode passagère ou d'un prestataire externe.</p>
        </div>
      </div>

      <!-- 04 — Livrables activables -->
      <div class="hw-f-list-gain-card">
        <div class="hw-f-list-gain-card-num">04.</div>
        <div class="hw-f-list-gain-card-img">
     <img src="<?=$siteURL ?>/images/livrables.jpg" alt="Livrables activables">
        </div>
        <div class="hw-f-list-gain-card-body">
          <div class="hw-f-list-gain-card-icon"><i class="fal fa-box-check"></i></div>
          <div class="hw-f-list-gain-card-title">Livrables activables</div>
          <p class="hw-f-list-gain-card-text">Frameworks, systèmes, automatisations ou assets : vous repartez avec des outils directement exploitables dans votre activité.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ MÉTHODE HELLO WORLD ════════════════════════════════════════════════ -->
<section class="hw-f-list-methode">
  <div class="container">
   <div class="hw-f-list-methode-inner">
    <div class="hw-f-list-methode-text">
    <div class="sec-label rv">Notre méthode</div>
    <h2 class="sec-title rv d1">Pragmatique, premium,<br><em>orientée résultat</em></h2>
    <p style="font-size:.88rem;color:var(--hwfl-txt2);max-width:620px;margin:1.2rem 0 0;line-height:1.9;font-weight:300" class="rv d2">Nous ne formons pas à "l'IA en général". Nous partons de votre contexte, de vos objectifs et de vos contraintes métier. Notre pédagogie combine cadre stratégique, démonstrations concrètes, ateliers guidés et production de livrables utiles dès la formation.</p>
    </div>

    <div class="hw-f-list-methode-orbit">

      <!-- SVG arcs + rings — coordonnées recalculées par JS -->
      <svg class="hw-f-list-methode-arcs" viewBox="0 0 1000 580" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <defs>
          <linearGradient id="hwflm-g1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#09A1BE" stop-opacity=".55"/><stop offset="100%" stop-color="#09A1BE" stop-opacity=".05"/></linearGradient>
          <linearGradient id="hwflm-g2" x1="100%" y1="0%" x2="0%" y2="100%"><stop offset="0%" stop-color="#680262" stop-opacity=".55"/><stop offset="100%" stop-color="#680262" stop-opacity=".05"/></linearGradient>
          <linearGradient id="hwflm-g3" x1="0%" y1="100%" x2="100%" y2="0%"><stop offset="0%" stop-color="#09A1BE" stop-opacity=".55"/><stop offset="100%" stop-color="#09A1BE" stop-opacity=".05"/></linearGradient>
          <linearGradient id="hwflm-g4" x1="100%" y1="100%" x2="0%" y2="0%"><stop offset="0%" stop-color="#680262" stop-opacity=".55"/><stop offset="100%" stop-color="#680262" stop-opacity=".05"/></linearGradient>
        </defs>
        <!-- center rings -->
        <circle class="hwflm-inner-ring" cx="500" cy="290" r="82" fill="none" stroke="rgba(9,161,190,.13)" stroke-width="1.2"/>
        <circle class="hwflm-outer-ring" cx="500" cy="290" r="108" fill="none" stroke="rgba(9,161,190,.06)" stroke-width="1" stroke-dasharray="4 7"/>
        <!-- arc paths (d attr set by JS) -->
        <path class="hwflm-arc" fill="none" stroke="url(#hwflm-g1)" stroke-width="1.2" stroke-dasharray="5 8"/>
        <path class="hwflm-arc" fill="none" stroke="url(#hwflm-g2)" stroke-width="1.2" stroke-dasharray="5 8" style="animation-delay:.8s"/>
        <path class="hwflm-arc" fill="none" stroke="url(#hwflm-g3)" stroke-width="1.2" stroke-dasharray="5 8" style="animation-delay:1.6s"/>
        <path class="hwflm-arc" fill="none" stroke="url(#hwflm-g4)" stroke-width="1.2" stroke-dasharray="5 8" style="animation-delay:2.4s"/>
        <!-- nodes (cx/cy set by JS) -->
        <circle class="hwflm-node" r="4.5" fill="#09A1BE" fill-opacity=".5"/>
        <circle class="hwflm-node" r="4.5" fill="#680262" fill-opacity=".5"/>
        <circle class="hwflm-node" r="4.5" fill="#09A1BE" fill-opacity=".5"/>
        <circle class="hwflm-node" r="4.5" fill="#680262" fill-opacity=".5"/>
        <!-- node outer rings -->
        <circle class="hwflm-nring" r="9" fill="none" stroke="#09A1BE" stroke-opacity=".2" stroke-width="1"/>
        <circle class="hwflm-nring" r="9" fill="none" stroke="#680262" stroke-opacity=".2" stroke-width="1"/>
        <circle class="hwflm-nring" r="9" fill="none" stroke="#09A1BE" stroke-opacity=".2" stroke-width="1"/>
        <circle class="hwflm-nring" r="9" fill="none" stroke="#680262" stroke-opacity=".2" stroke-width="1"/>
      </svg>

      <!-- Robot centre — remplacez le <div> par <img src="votre-robot.png"> quand prêt -->
      <div class="hw-f-list-methode-robot" id="hwflm-robot">
        <div class="hw-f-list-methode-robot-ph"><i class="fal fa-robot"></i></div>
      </div>

      <!-- card 01 — haut gauche -->
      <div class="hw-f-list-methode-card pos-tl" id="hwflm-c1">
        <span class="hw-f-list-methode-card-num">01</span>
        <div class="hw-f-list-methode-card-icon"><i class="fal fa-search"></i></div>
        <div class="hw-f-list-methode-card-title">Diagnostic</div>
        <p class="hw-f-list-methode-card-text">Comprendre votre niveau de maturité, vos priorités et vos contraintes réelles avant de choisir un seul outil.</p>
      </div>

      <!-- card 02 — haut droite -->
      <div class="hw-f-list-methode-card pos-tr" id="hwflm-c2">
        <span class="hw-f-list-methode-card-num">02</span>
        <div class="hw-f-list-methode-card-icon"><i class="fal fa-compass"></i></div>
        <div class="hw-f-list-methode-card-title">Cadrage</div>
        <p class="hw-f-list-methode-card-text">Sélectionner les bons cas d'usage IA selon leur impact business réel et leur faisabilité dans votre contexte.</p>
      </div>

      <!-- card 03 — bas gauche -->
      <div class="hw-f-list-methode-card pos-bl" id="hwflm-c3">
        <span class="hw-f-list-methode-card-num">03</span>
        <div class="hw-f-list-methode-card-icon"><i class="fal fa-rocket"></i></div>
        <div class="hw-f-list-methode-card-title">Activation</div>
        <p class="hw-f-list-methode-card-text">Pratiquer sur des cas réels, avec vos données, vos outils, vos objectifs. L'apprentissage par le faire.</p>
      </div>

      <!-- card 04 — bas droite -->
      <div class="hw-f-list-methode-card pos-br" id="hwflm-c4">
        <span class="hw-f-list-methode-card-num">04</span>
        <div class="hw-f-list-methode-card-icon"><i class="fal fa-box-open"></i></div>
        <div class="hw-f-list-methode-card-title">Livrables</div>
        <p class="hw-f-list-methode-card-text">Repartir avec quelque chose d'utilisable immédiatement : pas de slides oubliées, mais des actifs actionnables.</p>
      </div>

    </div>
   </div>
  </div>
</section>

<!-- ══ FORMATS & MODALITÉS ════════════════════════════════════════════════ -->
<section class="hw-f-list-formats">
  <div class="container">
    <div class="sec-label rv">Formats & Modalités</div>
    <h2 class="sec-title rv d1">Une formation<br>adaptée à <em>votre contexte</em></h2>
    <div class="hw-f-list-formats-grid">
      <div class="hw-f-list-format-card rv d2">
        <div class="hw-f-list-format-icon"><i class="fal fa-building"></i></div>
        <div class="hw-f-list-format-title">En présentiel</div>
        <div class="hw-f-list-format-text">Pour des sessions intensives, collaboratives et hautement engageantes. L'énergie de groupe démultiplie les apprentissages.</div>
      </div>
      <div class="hw-f-list-format-card rv d3">
        <div class="hw-f-list-format-icon"><i class="fal fa-laptop"></i></div>
        <div class="hw-f-list-format-title">À distance</div>
        <div class="hw-f-list-format-text">Pour former rapidement des équipes réparties ou des profils individuels sans contrainte géographique.</div>
      </div>
      <div class="hw-f-list-format-card rv d4">
        <div class="hw-f-list-format-icon"><i class="fal fa-users-gear"></i></div>
        <div class="hw-f-list-format-title">En intra-entreprise</div>
        <div class="hw-f-list-format-text">Pour des besoins sur-mesure, alignés à vos outils, vos processus internes et la culture de votre organisation.</div>
      </div>
      <div class="hw-f-list-format-card rv d5">
        <div class="hw-f-list-format-icon"><i class="fal fa-network-wired"></i></div>
        <div class="hw-f-list-format-title">En inter-entreprises</div>
        <div class="hw-f-list-format-text">Pour les profils indépendants et les petites structures qui veulent accéder à l'expertise Hello World.</div>
      </div>
    </div>
  </div>
</section>



<!-- ══ FAQ ════════════════════════════════════════════════════════════════ -->
<section class="hw-f-list-faq">
  <div class="container">
    <div class="sec-label rv">Questions fréquentes</div>
    <h2 class="hw-f-list-faq-display rv d1"><span class="col-purple">Tout ce que vous<br>devez</span> <span class="col-cyan">savoir</span></h2>
    <div class="hw-f-list-faq-grid">

      <div class="hw-f-list-faq-item">
        <div class="hw-f-list-faq-q" role="button" aria-expanded="false">
          <span>Ces formations sont-elles adaptées aux débutants ?</span>
          <span class="hw-f-list-faq-q-btn">+</span>
        </div>
        <div class="hw-f-list-faq-a"><div class="hw-f-list-faq-a-inner">Oui. Certaines formations accueillent des profils débutants ou intermédiaires, à condition que les objectifs soient clairs. Nous adaptons la profondeur selon le public. L'audit de maturité préalable nous permet de valider l'adéquation entre votre profil et le programme choisi.</div></div>
      </div>

      <div class="hw-f-list-faq-item">
        <div class="hw-f-list-faq-q" role="button" aria-expanded="false">
          <span>Proposez-vous des formations sur-mesure pour les entreprises ?</span>
          <span class="hw-f-list-faq-q-btn">+</span>
        </div>
        <div class="hw-f-list-faq-a"><div class="hw-f-list-faq-a-inner">Oui. Nous adaptons le contenu à votre secteur, vos équipes, vos outils existants et vos enjeux métiers. Les formats intra-entreprise permettent de travailler sur vos données, vos processus et vos cas d'usage réels. Contactez-nous pour un devis personnalisé.</div></div>
      </div>

      <div class="hw-f-list-faq-item">
        <div class="hw-f-list-faq-q" role="button" aria-expanded="false">
          <span>Les participants repartent-ils avec des livrables concrets ?</span>
          <span class="hw-f-list-faq-q-btn">+</span>
        </div>
        <div class="hw-f-list-faq-a"><div class="hw-f-list-faq-a-inner">Oui. C'est un point central de notre méthode. Chaque formation inclut des livrables actionnables immédiatement : feuilles de route, workflows n8n prêts à déployer, show bibles, matrices de priorisation. Vous ne repartez pas avec des slides — vous repartez avec des outils.</div></div>
      </div>

      <div class="hw-f-list-faq-item">
        <div class="hw-f-list-faq-q" role="button" aria-expanded="false">
          <span>Peut-on privatiser une session pour une équipe ?</span>
          <span class="hw-f-list-faq-q-btn">+</span>
        </div>
        <div class="hw-f-list-faq-a"><div class="hw-f-list-faq-a-inner">Oui. Nous proposons des formats intra-entreprise en présentiel ou à distance. La session est alors dédiée à votre équipe avec un contenu adapté à vos outils, vos cas d'usage et votre niveau de maturité collective. Les tarifs intra sont disponibles sur devis.</div></div>
      </div>

    </div>
  </div>
</section>
<!-- ══ CTA FINAL ══════════════════════════════════════════════════════════ -->
<section class="hw-f-list-cta-final">
  <div class="container">
    <div class="sec-label rv">Passez à l'action</div>
    <h2 class="sec-title rv d1">De la curiosité à<br>l'<em>avantage concurrentiel</em></h2>
    <p class="hw-f-list-cta-sub rv d2">L'IA récompense les organisations qui structurent vite, testent intelligemment et déploient avec méthode. Hello World vous aide à franchir ce cap avec des formations premium, concrètes et activables.</p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint">Réserver un audit gratuit</span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
        <div class="sb-label"><span class="sb-hint">Parler à un expert Hello World</span></div>
        <div class="sb-knob"><i class="fal fa-comment-dots"></i></div>
      </a>
    </div>
  </div>
</section>
<!-- ══ TÉMOIGNAGES ════════════════════════════════════════════════════════ -->
<?php include('includes/testimonials.php'); ?>





<!-- ══ GSAP ═══════════════════════════════════════════════════════════════ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);
    var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* hero entrance */
    if (!rm) {
        gsap.timeline({ defaults: { ease: 'expo.out' } })
            .from('#hwfl-label', { y: 12, autoAlpha: 0, duration: .6 })
            .from('#hwfl-h1',    { y: 60, autoAlpha: 0, duration: 1.1, skewY: 1.8 }, '-=.3')
            .from('#hwfl-sub',   { y: 22, autoAlpha: 0, duration: .8 }, '-=.5')
            .from('#hwfl-ctas',  { y: 16, autoAlpha: 0, duration: .7 }, '-=.45')
            .from('#hwfl-trust', { y: 12, autoAlpha: 0, duration: .6 }, '-=.4');
    }

    /* scroll reveals */
    var rvEls = gsap.utils.toArray('.rv');
    if (!rm) {
        gsap.set(rvEls, { y: 38, autoAlpha: 0 });
        ScrollTrigger.batch(rvEls, {
            start: 'top 90%',
            onEnter: function (b) {
                gsap.to(b, { y: 0, autoAlpha: 1, duration: .8, ease: 'expo.out', stagger: .07 });
            }
        });
    }

    /* card press — Emil Kowalski elastic */
    document.querySelectorAll('.hw-f-list-card').forEach(function (c) {
        c.addEventListener('mousedown',  function () { gsap.to(c, { scale: .97, duration: .08 }); });
        c.addEventListener('mouseup',    function () { gsap.to(c, { scale: 1, duration: .45, ease: 'elastic.out(1,.55)' }); });
        c.addEventListener('mouseleave', function () { gsap.to(c, { scale: 1, duration: .25 }); });
    });

    /* why cards — entrée en éventail + Emil Kowalski elastic press */
    if (!rm) {
        var wc = gsap.utils.toArray('.hw-f-list-why-card');
        gsap.set(wc, { y: 40, autoAlpha: 0, scale: .96 });
        ScrollTrigger.batch(wc, {
            start: 'top 88%',
            onEnter: function (b) {
                gsap.to(b, { y: 0, autoAlpha: 1, scale: 1, duration: .75, ease: 'expo.out', stagger: .1 });
            }
        });
    }
    document.querySelectorAll('.hw-f-list-why-card').forEach(function (c) {
        c.addEventListener('mousedown',  function () { gsap.to(c, { scale: .97, duration: .1, ease: 'power2.out' }); });
        c.addEventListener('mouseup',    function () { gsap.to(c, { scale: 1, duration: .5, ease: 'elastic.out(1,.5)' }); });
        c.addEventListener('mouseleave', function () { gsap.to(c, { scale: 1, duration: .3, ease: 'power2.out' }); });
    });

    /* gains expandable cards */
    var gainCards = document.querySelectorAll('.hw-f-list-gain-card');
    if (gainCards.length) {
        function activateGainCard(card) {
            gainCards.forEach(function(c) { c.classList.remove('active'); });
            card.classList.add('active');
        }
        gainCards.forEach(function(c) {
            c.addEventListener('mouseenter', function() { activateGainCard(c); });
            c.addEventListener('mousedown',  function() { gsap.to(c, { scale:.985, duration:.08 }); });
            c.addEventListener('mouseup',    function() { gsap.to(c, { scale:1, duration:.5, ease:'elastic.out(1,.5)' }); });
            c.addEventListener('mouseleave', function() { gsap.to(c, { scale:1, duration:.25 }); });
        });
        gainCards[0].classList.add('active');
    }

    /* methode orbit — SVG arcs dynamiques + GSAP */
    (function() {
        var orbit    = document.querySelector('.hw-f-list-methode-orbit');
        var arcsSvg  = document.querySelector('.hw-f-list-methode-arcs');
        var robot    = document.getElementById('hwflm-robot');
        if (!orbit || !arcsSvg || !robot) return;
        var arcPaths = arcsSvg.querySelectorAll('path.hwflm-arc');
        var arcNodes = arcsSvg.querySelectorAll('circle.hwflm-node');
        var arcNRings= arcsSvg.querySelectorAll('circle.hwflm-nring');
        var iRing    = arcsSvg.querySelector('circle.hwflm-inner-ring');
        var oRing    = arcsSvg.querySelector('circle.hwflm-outer-ring');
        var mCards   = orbit.querySelectorAll('.hw-f-list-methode-card');

        function updateArcs() {
            if (window.innerWidth < 900) return;
            var ow = orbit.offsetWidth, oh = orbit.offsetHeight;
            arcsSvg.setAttribute('viewBox', '0 0 ' + ow + ' ' + oh);
            var oRect = orbit.getBoundingClientRect();
            var rRect = robot.getBoundingClientRect();
            var rx = rRect.left + rRect.width  / 2 - oRect.left;
            var ry = rRect.top  + rRect.height / 2 - oRect.top;
            var r1 = Math.min(ow, oh) * .09, r2 = Math.min(ow, oh) * .12;
            if (iRing) { iRing.setAttribute('cx', rx); iRing.setAttribute('cy', ry); iRing.setAttribute('r', r1); }
            if (oRing) { oRing.setAttribute('cx', rx); oRing.setAttribute('cy', ry); oRing.setAttribute('r', r2); }
            mCards.forEach(function(card, i) {
                var cRect = card.getBoundingClientRect();
                var isRight = card.classList.contains('pos-tr') || card.classList.contains('pos-br');
                var sx = isRight ? (cRect.left  - oRect.left) : (cRect.right - oRect.left);
                var sy = cRect.top + cRect.height / 2 - oRect.top;
                /* cubic bezier : part horizontal du bord de carte, arrive vertical au robot */
                var dx = rx - sx;
                var c1x = sx + dx * 0.4, c1y = sy;
                var c2x = rx - dx * 0.15, c2y = ry - (ry - sy) * 0.28;
                if (arcPaths[i]) arcPaths[i].setAttribute('d', 'M '+sx+' '+sy+' C '+c1x+' '+c1y+' '+c2x+' '+c2y+' '+rx+' '+ry);
                /* node à t=0.32 sur la courbe cubique */
                var t = 0.32, mt = 1-t;
                var nx = mt*mt*mt*sx + 3*mt*mt*t*c1x + 3*mt*t*t*c2x + t*t*t*rx;
                var ny = mt*mt*mt*sy + 3*mt*mt*t*c1y + 3*mt*t*t*c2y + t*t*t*ry;
                if (arcNodes[i])  { arcNodes[i].setAttribute('cx',  nx); arcNodes[i].setAttribute('cy',  ny); }
                if (arcNRings[i]) { arcNRings[i].setAttribute('cx', nx); arcNRings[i].setAttribute('cy', ny); }
            });
        }

        /* initial update + resize */
        updateArcs();
        window.addEventListener('resize', updateArcs);

        /* GSAP entrance */
        if (!rm) {
            var dirs = [{x:-30,y:-25},{x:30,y:-25},{x:-30,y:25},{x:30,y:25}];
            Array.from(mCards).forEach(function(c,i){ gsap.set(c,{autoAlpha:0,x:dirs[i].x,y:dirs[i].y,scale:.88}); });
            gsap.set('#hwflm-robot',{autoAlpha:0,scale:.72});
            ScrollTrigger.create({
                trigger: orbit,
                start: 'top 76%',
                once: true,
                onEnter: function() {
                    Array.from(mCards).forEach(function(c,i){
                        gsap.to(c,{autoAlpha:1,x:0,y:0,scale:1,duration:.85,delay:i*.13,ease:'expo.out'});
                    });
                    gsap.to('#hwflm-robot',{autoAlpha:1,scale:1,duration:1.15,delay:.28,ease:'elastic.out(1,.55)'});
                    setTimeout(updateArcs, 120);
                }
            });
            /* robot float loop — oscillation douce autour du centre */
            gsap.to('#hwflm-robot',{y:-10,duration:2.8,ease:'sine.inOut',repeat:-1,yoyo:true,delay:1.6});
        }
        /* elastic press on cards */
        Array.from(mCards).forEach(function(c) {
            c.addEventListener('mousedown',  function(){ gsap.to(c,{scale:.97,duration:.08}); });
            c.addEventListener('mouseup',    function(){ gsap.to(c,{scale:1,duration:.5,ease:'elastic.out(1,.5)'}); });
            c.addEventListener('mouseleave', function(){ gsap.to(c,{scale:1,duration:.25}); });
        });
    })();

    /* trust items stagger */
    if (!rm) {
        var ti = gsap.utils.toArray('.hw-f-list-trust-item');
        gsap.set(ti, { x: 20, autoAlpha: 0 });
        gsap.to(ti, { x: 0, autoAlpha: 1, duration: .65, ease: 'expo.out', stagger: .08, delay: .9 });
    }

    /* FAQ accordion */
    document.querySelectorAll('.hw-f-list-faq-q').forEach(function (q) {
        q.addEventListener('click', function () {
            var item   = q.closest('.hw-f-list-faq-item');
            var ans    = item.querySelector('.hw-f-list-faq-a');
            var inner  = item.querySelector('.hw-f-list-faq-a-inner');
            var isOpen = item.classList.contains('open');
            document.querySelectorAll('.hw-f-list-faq-item.open').forEach(function (o) {
                o.classList.remove('open');
                o.querySelector('.hw-f-list-faq-a').style.maxHeight = '0';
                o.querySelector('.hw-f-list-faq-q').setAttribute('aria-expanded', 'false');
            });
            if (!isOpen) {
                item.classList.add('open');
                ans.style.maxHeight = inner.scrollHeight + 'px';
                q.setAttribute('aria-expanded', 'true');
            }
        });
    });
})();
</script>
