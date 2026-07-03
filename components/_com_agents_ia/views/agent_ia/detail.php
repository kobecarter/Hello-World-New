<?php
$agentPhoto        = $agent_ia->getPhoto()         ? "images/agents_ia/" . $agent_ia->getPhoto()         : "images/banner.jpg";
$agentPhotoBanner  = $agent_ia->getPhotoBanniere() ? "images/agents_ia/" . $agent_ia->getPhotoBanniere() : $agentPhoto;
?>
<style>
/* ── HW CONCIERGE AI · Charte HWA · v5 ────────────────────────
   Fond : #fff / #fbfbfb  Accents : #09A1BE · #680262 · gradient
   ─────────────────────────────────────────────────────────────── */

/* ── Wrapper breakout ── */
.aic-wrapper { position:relative;left:50%;margin-left:-50vw;width:100vw; }
.agent-ia-content:has(.aic-wrapper) { padding:0!important; }
.agent-ia-content:has(.aic-wrapper) > .container { max-width:100%!important;padding:0!important; }
.agent-ia-content:has(.aic-wrapper) .service-content { padding:0!important; }

/* ── Sections / containers ── */
.aic-ds       { position:relative;padding:8rem 0;overflow:hidden;background:#fff; }
.aic-ds-off   { background:#fbfbfb; }
.aic-ds-warm  { background:#e3dfda; }
.aic-ds-brd   { border-top:1px solid rgba(0,0,0,.09);border-bottom:1px solid rgba(0,0,0,.09); }
.aic-dc { max-width:1280px;margin:0 auto;padding:0 3.5rem; }

/* ── Labels — clone .sec-label ── */
.aic-eyebrow { font-size:.62rem;letter-spacing:.44em;text-transform:uppercase;color:#09A1BE;display:flex;align-items:center;gap:.9rem;margin-bottom:1.2rem; }
.aic-eyebrow::before { content:'';width:36px;height:1px;background:#09A1BE;flex-shrink:0; }

/* ── Titres — clone .sec-title ── */
.aic-h2 { font-family:'Montserrat',sans-serif;font-weight:100;font-size:clamp(2rem,4vw,5rem);line-height:.95;color:#680262;letter-spacing:-.03em;margin-bottom:2rem; }
.aic-h2 em,.aic-grad-text { font-style:normal;background:linear-gradient(135deg,#8B2568,#4CC3D0);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }
.aic-lead { font-size:.92rem;font-weight:300;color:#6b6460;line-height:1.9;margin-bottom:2rem; }

/* ── Reveal expo-out (Emil Kowalski) ── */
.service-content .rv { opacity:0;transform:translateY(28px);transition:opacity .6s cubic-bezier(.16,1,.3,1),transform .6s cubic-bezier(.16,1,.3,1); }
.service-content .rv.on { opacity:1;transform:translateY(0); }
.aic-pain-d-stack .rv:nth-child(2) { transition-delay:.06s; }
.aic-pain-d-stack .rv:nth-child(3) { transition-delay:.12s; }
.aic-bento .rv:nth-child(2) { transition-delay:.06s; }
.aic-bento .rv:nth-child(3) { transition-delay:.12s; }
.aic-bento .rv:nth-child(4) { transition-delay:.18s; }
.aic-bento .rv:nth-child(5) { transition-delay:.24s; }
.aic-bento .rv:nth-child(6) { transition-delay:.30s; }
.aic-kpi-d-grid .rv:nth-child(2) { transition-delay:.06s; }
.aic-kpi-d-grid .rv:nth-child(3) { transition-delay:.12s; }

/* ━━ ACCROCHE ━━ */
.aic-accroche-d { text-align:center; }
.aic-accroche-bar { position:absolute;top:0;left:0;width:100%;height:3px;background:linear-gradient(90deg,#8B2568,#4CC3D0); }
.aic-accroche-d .aic-dc { position:relative; }
.aic-sector-tags { display:flex;flex-wrap:wrap;justify-content:center;gap:8px;margin-bottom:2.5rem; }
.aic-sector-tags span { font-size:.62rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#09A1BE;border:1px solid rgba(9,161,190,.3);border-radius:50px;padding:5px 14px;background:#fff; }
.aic-quote-d { font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(1.6rem,3vw,2.6rem);font-weight:400;font-style:italic;line-height:1.5;color:#680262;border:none;padding:0;margin:0 auto 1.4rem;max-width:820px; }
.aic-quote-src { font-size:.68rem;color:#6b6460;letter-spacing:.18em;text-transform:uppercase; }

/* ━━ PROBLÈME — 2 col ━━ */
.aic-problem-d-inner { display:grid;grid-template-columns:1fr 1fr;gap:6rem;align-items:start; }
.aic-pain-d-stack { display:flex;flex-direction:column;gap:1px;background:rgba(0,0,0,.09);border:1px solid rgba(0,0,0,.09);border-radius:20px;overflow:hidden;margin-top:3.6rem; }
.aic-pain-d { display:flex;align-items:flex-start;gap:1.6rem;padding:1.8rem 2.2rem;background:#fff;transition:background .3s; }
.aic-pain-d:hover { background:#fbfbfb; }
.aic-pain-d-num { font-family:'Cormorant Garamond',Georgia,serif;font-weight:200;font-size:3rem;line-height:1;color:#09A1BE;opacity:.3;flex-shrink:0;min-width:2.2rem; }
.aic-pain-d-title { font-size:.9rem;font-weight:700;color:#0d0b09;margin-bottom:.4rem; }
.aic-pain-d-body  { font-size:.82rem;font-weight:300;color:#6b6460;line-height:1.8;margin:0; }

/* ━━ PRÉSENTATION 2-col ━━ */
.aic-pres-d-inner { display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:center; }
.aic-stats-d { display:grid;grid-template-columns:repeat(3,1fr);border:1px solid rgba(0,0,0,.09);border-radius:22px;overflow:hidden;margin-top:2rem; }
.aic-stat-d { padding:2rem 1.4rem;border-right:1px solid rgba(0,0,0,.09);text-align:center; }
.aic-stat-d:last-child { border-right:none; }
.aic-stat-d-val { font-family:'Cormorant Garamond',Georgia,serif;font-weight:200;font-size:clamp(2.4rem,3.5vw,3.5rem);line-height:1;color:#0d0b09;margin-bottom:.4rem;letter-spacing:-.03em; }
.aic-stat-d-val span { color:#09A1BE; }
.aic-stat-d-lbl { font-size:.6rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:#6b6460; }

/* Chat mockup */
.aic-chat { background:#0f0e1a;border-radius:20px;overflow:hidden;box-shadow:0 28px 70px rgba(0,0,0,.18); }
.aic-chat-hdr { display:flex;align-items:center;gap:12px;padding:16px 20px;background:rgba(9,161,190,.08);border-bottom:1px solid rgba(9,161,190,.12); }
.aic-chat-ava { width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#8B2568,#4CC3D0);display:flex;align-items:center;justify-content:center;color:#fff;font-size:1rem;flex-shrink:0; }
.aic-chat-name   { font-size:.88rem;font-weight:700;color:#fff; }
.aic-chat-status { font-size:.72rem;color:rgba(255,255,255,.45);display:flex;align-items:center;gap:5px;margin-top:2px; }
.aic-dot { width:7px;height:7px;border-radius:50%;background:#22c55e;display:inline-block;animation:aic-pulse 2s infinite; }
@keyframes aic-pulse { 0%,100%{opacity:1}50%{opacity:.4} }
.aic-chat-badge { margin-left:auto;font-size:.62rem;font-weight:800;letter-spacing:.1em;background:linear-gradient(135deg,#8B2568,#4CC3D0);color:#fff;padding:3px 8px;border-radius:100px; }
.aic-chat-body { padding:20px;display:flex;flex-direction:column;gap:12px; }
.aic-msg { display:flex; }
.aic-msg span { max-width:82%;padding:10px 14px;border-radius:14px;font-size:.82rem;line-height:1.5; }
.aic-msg-bot span  { background:rgba(9,161,190,.1);color:#d8f4f8;border-radius:4px 14px 14px 14px; }
.aic-msg-user      { justify-content:flex-end; }
.aic-msg-user span { background:linear-gradient(135deg,#8B2568,#4CC3D0);color:#fff;border-radius:14px 4px 14px 14px; }
.aic-chat-inp { padding:12px 16px;background:rgba(255,255,255,.03);border-top:1px solid rgba(9,161,190,.08);display:flex;align-items:center;justify-content:space-between;color:rgba(255,255,255,.2);font-size:.8rem; }
.aic-chat-inp button { background:linear-gradient(135deg,#8B2568,#4CC3D0);border:none;color:#fff;width:32px;height:32px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:transform .15s cubic-bezier(.16,1,.3,1); }
.aic-chat-inp button:hover { transform:scale(1.12); }

/* ━━ RAG FLOW ━━ */
.aic-rag-flow { display:grid;grid-template-columns:1fr 48px 1fr 48px 1fr;align-items:center;margin-top:4rem; }
.aic-rag-node { padding:2.4rem 1.8rem;text-align:center;background:#fbfbfb;border:1px solid rgba(0,0,0,.09);border-radius:18px;transition:background .3s,box-shadow .3s; }
.aic-rag-node:hover { background:#fff;box-shadow:0 4px 24px rgba(0,0,0,.06); }
.aic-rag-node-ico { width:54px;height:54px;border-radius:50%;border:1px solid rgba(9,161,190,.36);display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;color:#09A1BE;font-size:1.3rem; }
.aic-rag-node-lbl  { font-size:.58rem;letter-spacing:.2em;text-transform:uppercase;color:#6b6460;margin-bottom:.3rem; }
.aic-rag-node-name { font-size:.95rem;font-weight:600;color:#0d0b09; }
.aic-rag-node-sub  { font-size:.73rem;color:#6b6460;margin-top:.3rem;line-height:1.5; }
.aic-rag-arrow { display:flex;align-items:center;justify-content:center;color:rgba(9,161,190,.5);font-size:1.1rem; }
.aic-rag-node-center { background:#fff;border-color:rgba(9,161,190,.3); }
.aic-rag-node-center .aic-rag-node-ico { background:linear-gradient(135deg,#8B2568,#4CC3D0);border:none;color:#fff; }

/* ━━ BENTO CAPACITÉS ━━ */
.aic-bento { display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:rgba(0,0,0,.09);border:1px solid rgba(0,0,0,.09);border-radius:22px;overflow:hidden;margin-top:3.5rem; }
.aic-bento-card { padding:2.5rem 2.2rem;position:relative;overflow:hidden;background:#fbfbfb;transition:background .35s; }
.aic-bento-card:hover { background:#fff; }
.aic-bento-card::before { content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,#8B2568,#4CC3D0,transparent);transform:scaleX(0);transform-origin:left;transition:transform .45s cubic-bezier(.16,1,.3,1); }
.aic-bento-card:hover::before { transform:scaleX(1); }
.aic-bento-rag { grid-column:1/3;grid-row:1/3;background:#fff;padding:3.5rem; }
.aic-bento-n { position:absolute;top:1.2rem;right:1.6rem;font-family:'Montserrat',sans-serif;font-size:4rem;font-weight:100;line-height:1;color:rgba(0,0,0,.04); }
.aic-bento-ico { display:flex;align-items:center;justify-content:center;width:56px;height:56px;border-radius:50%;border:1px solid rgba(9,161,190,.36);color:#09A1BE;font-size:1.3rem;margin-bottom:1.6rem;transition:border-color .35s,box-shadow .35s,transform .35s; }
.aic-bento-card:hover .aic-bento-ico { border-color:#09A1BE;box-shadow:0 0 22px rgba(9,161,190,.14);transform:translateY(-3px); }
.aic-bento-rag .aic-bento-ico { width:68px;height:68px;font-size:1.8rem;background:linear-gradient(135deg,#8B2568,#4CC3D0);border:none;color:#fff;margin-bottom:2rem; }
.aic-bento-title { font-size:.95rem;font-weight:600;color:#0d0b09;margin-bottom:.6rem; }
.aic-bento-rag .aic-bento-title { font-size:1.4rem;font-weight:300;color:#680262;margin-bottom:1rem;letter-spacing:-.02em; }
.aic-bento-desc  { font-size:.78rem;font-weight:300;color:#6b6460;line-height:1.85; }
.aic-bento-rag .aic-bento-desc { font-size:.88rem;line-height:2; }
.aic-rag-mini { display:flex;align-items:center;gap:8px;margin-top:2rem;flex-wrap:wrap; }
.aic-rag-mini-pill { display:inline-flex;align-items:center;gap:6px;padding:5px 12px;border-radius:50px;font-size:.7rem;font-weight:600;background:#fff;border:1px solid rgba(9,161,190,.3);color:#09A1BE; }
.aic-rag-mini-arrow { color:rgba(9,161,190,.5);font-size:.8rem; }

/* ━━ TABS CAS D'USAGE ━━ */
.aic-tabs-nav { display:flex;gap:4px;background:#fff;border:1px solid rgba(0,0,0,.09);border-radius:12px;padding:4px;margin-bottom:2.5rem;width:fit-content; }
.aic-tab-btn { display:flex;align-items:center;gap:8px;padding:10px 22px;border-radius:9px;font-size:.78rem;font-weight:600;letter-spacing:.03em;color:#6b6460;cursor:pointer;border:none;background:transparent;transition:color .25s,background .25s;white-space:nowrap; }
.aic-tab-btn i { font-size:.9rem; }
.aic-tab-btn.active { background:linear-gradient(135deg,#8B2568,#4CC3D0);color:#fff;box-shadow:0 2px 12px rgba(9,161,190,.15); }
.aic-tab-panel { display:none; }
.aic-tab-panel.active { display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:center; }
.aic-tab-features { display:flex;flex-direction:column;gap:1px;background:rgba(0,0,0,.09);border:1px solid rgba(0,0,0,.09);border-radius:16px;overflow:hidden;margin-top:1.5rem; }
.aic-tab-feat { display:flex;align-items:flex-start;gap:1rem;padding:1.3rem 1.5rem;background:#fff;transition:background .2s; }
.aic-tab-feat:hover { background:#fbfbfb; }
.aic-tab-feat-ico { color:#09A1BE;font-size:.95rem;flex-shrink:0;margin-top:2px; }
.aic-tab-feat-text { font-size:.82rem;font-weight:300;color:#6b6460;line-height:1.7; }
.aic-tab-feat-text strong { color:#0d0b09;font-weight:600; }
.aic-tab-visual { background:#fbfbfb;border:1px solid rgba(0,0,0,.09);border-radius:20px;padding:3.5rem 2rem;text-align:center; }
.aic-tab-visual-ico { font-size:3.5rem;color:#09A1BE;margin-bottom:1rem;line-height:1; }
.aic-tab-visual-kpi { font-family:'Cormorant Garamond',Georgia,serif;font-weight:200;font-size:clamp(4rem,6vw,6.5rem);background:linear-gradient(135deg,#8B2568,#4CC3D0);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1; }
.aic-tab-visual-lbl { font-size:.62rem;letter-spacing:.2em;text-transform:uppercase;color:#6b6460;margin-top:.6rem; }

/* ━━ KPI — clone .stats-grid ━━ */
.aic-kpi-d-grid { display:grid;grid-template-columns:repeat(3,1fr);border:1px solid rgba(0,0,0,.09);border-radius:22px;overflow:hidden;margin-top:3.5rem;background:#fff; }
.aic-kpi-d-card { padding:3.5rem 2rem;text-align:center;border-right:1px solid rgba(0,0,0,.09);transition:background .3s; }
.aic-kpi-d-card:last-child { border-right:none; }
.aic-kpi-d-card:hover { background:#fbfbfb; }
.aic-kpi-d-val { font-family:'Cormorant Garamond',Georgia,serif;font-weight:200;font-size:clamp(4rem,6vw,7rem);line-height:1;letter-spacing:-.03em;color:#0d0b09;margin-bottom:.6rem; }
.aic-kpi-d-val span { color:#09A1BE; }
.aic-kpi-d-ttl  { font-size:.62rem;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:#6b6460;margin-bottom:.5rem; }
.aic-kpi-d-body { font-size:.8rem;font-weight:300;color:#6b6460;line-height:1.7; }

/* ━━ TICKER INTÉGRATIONS ━━ */
.aic-ticker-wrap { overflow:hidden;position:relative;margin-top:4rem;padding:1.5rem 0; }
.aic-ticker-wrap::before,.aic-ticker-wrap::after { content:'';position:absolute;top:0;bottom:0;width:140px;z-index:2;pointer-events:none; }
.aic-ticker-wrap::before { left:0;background:linear-gradient(to right,#fbfbfb,transparent); }
.aic-ticker-wrap::after  { right:0;background:linear-gradient(to left,#fbfbfb,transparent); }
.aic-ticker { display:flex;width:max-content;animation:aic-ticker 30s linear infinite; }
.aic-ticker:hover { animation-play-state:paused; }
@keyframes aic-ticker { from{transform:translateX(0)}to{transform:translateX(-50%)} }
.aic-ticker-item { display:inline-flex;align-items:center;gap:8px;margin:0 6px;padding:10px 20px;background:#fff;border:1px solid rgba(0,0,0,.09);border-radius:50px;white-space:nowrap;font-size:.78rem;font-weight:600;color:#0d0b09;transition:border-color .2s,color .2s;cursor:default; }
.aic-ticker-item:hover { border-color:#09A1BE;color:#09A1BE; }
.aic-ticker-item i { color:#09A1BE; }

/* ━━ CTA FINAL ━━ */
.aic-cta-final { text-align:center;border-top:1px solid rgba(0,0,0,.09); }
.aic-cta-h2 { font-family:'Montserrat',sans-serif;font-weight:100;font-size:clamp(2.4rem,5vw,5.5rem);line-height:.95;color:#680262;letter-spacing:-.04em;margin-bottom:1.4rem; }
.aic-cta-h2 em { font-style:normal;color:#09A1BE; }
.aic-cta-sub { font-size:1rem;font-weight:300;color:#6b6460;max-width:520px;margin:0 auto 3rem; }
.aic-cta-btn { display:inline-flex;align-items:center;gap:12px;padding:18px 44px;border-radius:50px;background:linear-gradient(135deg,#8B2568,#4CC3D0);color:#fff;font-size:.86rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;text-decoration:none;border:none;cursor:pointer;box-shadow:0 8px 32px rgba(9,161,190,.2);transition:transform .3s cubic-bezier(.16,1,.3,1),box-shadow .3s; }
.aic-cta-btn:hover { transform:translateY(-3px) scale(1.02);box-shadow:0 14px 48px rgba(9,161,190,.28);color:#fff;text-decoration:none; }
.aic-cta-note { font-size:.68rem;color:#6b6460;margin-top:1.4rem;letter-spacing:.12em; }

/* ── Responsive ── */
@media(max-width:991px) {
  .aic-ds { padding:5rem 0; }
  .aic-dc { padding:0 2rem; }
  .aic-problem-d-inner { grid-template-columns:1fr;gap:3rem; }
  .aic-pain-d-stack { margin-top:0; }
  .aic-pres-d-inner { grid-template-columns:1fr;gap:3rem; }
  .aic-rag-flow { grid-template-columns:1fr;gap:0; }
  .aic-rag-arrow { transform:rotate(90deg);margin:.5rem auto; }
  .aic-bento { grid-template-columns:1fr 1fr; }
  .aic-bento-rag { grid-column:1/3;grid-row:auto; }
  .aic-tab-panel.active { grid-template-columns:1fr; }
  .aic-tab-visual { display:none; }
  .aic-kpi-d-grid { grid-template-columns:1fr; }
  .aic-kpi-d-card { border-right:none;border-bottom:1px solid rgba(0,0,0,.09); }
  .aic-kpi-d-card:last-child { border-bottom:none; }
  .aic-tabs-nav { flex-wrap:wrap;width:100%; }
}
@media(max-width:576px) {
  .aic-ds { padding:4rem 0; }
  .aic-dc { padding:0 1.5rem; }
  .aic-bento { grid-template-columns:1fr;gap:1px; }
  .aic-bento-rag { grid-column:auto;grid-row:auto; }
  .aic-tab-btn { padding:8px 14px;font-size:.72rem; }
  .aic-stats-d { grid-template-columns:1fr; }
  .aic-stat-d { border-right:none;border-bottom:1px solid rgba(0,0,0,.09); }
  .aic-stat-d:last-child { border-bottom:none; }
}
</style>

<!-- ===== HERO (Attention) ===== -->
<section class="wm-hero agent-ia-hero" <?= $agent_ia->getPhotoBanniere() ? 'style="background-image:url(' . $siteURL . $agentPhotoBanner . ');background-size:cover;background-position:center;"' : ''; ?>>
    <?php if (!$agent_ia->getPhotoBanniere()): ?>
    <canvas id="hero-canvas"></canvas>
    <div class="wm-hero-grid" aria-hidden="true">
        <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
            <defs><pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"><path d="M 60 0 L 0 0 0 60" fill="none" stroke="#8b6a22" stroke-width="0.5"/></pattern></defs>
            <rect width="1440" height="900" fill="url(#grid)"/>
            <line x1="0" y1="900" x2="1440" y2="0" stroke="#8b6a22" stroke-width="0.4"/>
        </svg>
    </div>
    <?php else: ?>
    <div style="position:absolute;inset:0;background:rgba(0,0,0,.52);"></div>
    <?php endif; ?>
    <div class="container">
        <div class="wm-hero-inner">
            <div>
                <div class="wm-hero-label"><?= $agent_ia->getTitre(); ?></div>
                <h1 class="sh-h1"><?= $agent_ia->getSousTitre() ? $agent_ia->getSousTitre() : $agent_ia->getTitre(); ?></h1>
                <p class="wm-hero-sub rv d1"><?= strip_tags($agent_ia->getExtrait()); ?></p>
                <div class="wm-hero-ctas rv d2">
                    <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
                        <div class="sb-label"><span class="sb-hint">Demander une démo</span></div>
                        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
                    </a>
                    <a href="#agent-content" class="sb sb-compact sb-invert" role="button">
                        <div class="sb-label"><span class="sb-hint">En savoir plus</span></div>
                        <div class="sb-knob"><i class="fal fa-arrow-down"></i></div>
                    </a>
                </div>
            </div>
            <?php if ($agent_ia->getPhoto() && !$agent_ia->getPhotoBanniere()): ?>
            <div class="agent-ia-hero-img">
                <img src="<?= $siteURL . $agentPhoto; ?>" alt="<?= $agent_ia->getTitre(); ?>">
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<section class="breadcrumb-sec">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a></li>
                <li class="breadcrumb-item"><a href="<?= $siteURL; ?>index.php?option=com_agents_ia">Solutions IA</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $agent_ia->getTitre(); ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- ===== CONTENU PRINCIPAL (Interest + Desire) ===== -->
<section class="page-template agent-ia-content" id="agent-content">
    <div class="container">
        <div class="service-content">
            <?= $agent_ia->getTexte(); ?>
        </div>
    </div>
</section>

<!-- ===== CTA STICKY (Action) ===== -->


<!-- ===== RÉALISATIONS ===== -->
<?php if (!empty($references)): ?>
<section class="portfolio" id="work">
    <div class="container">
        <div class="sec-label rv">Selected Work</div>
        <h2 class="sec-title rv d1">Nos dernières <em>réalisations</em></h2>
        <div class="port-grid rv d2">
            <?php foreach (array_slice($references, 0, 3) as $index => $ref): ?>
            <?php $classes = ['p-meridian tall', 'p-luminis', 'p-corvus']; ?>
            <div class="port-item <?= $classes[$index]; ?>">
                <a href="<?= $ref->getLink(); ?>" class="port-bg">
                    <img src="<?= $siteURL; ?>images/references/<?= $ref->getPhoto(); ?>" alt="<?= $ref->getNomClient(); ?>">
                </a>
                <div class="port-gfx"></div>
                <div class="port-overlay"></div>
                <a href="<?= $ref->getLink(); ?>" class="port-arrow"><i class="fas fa-arrow-right"></i></a>
                <div class="port-body">
                    <span class="port-tag"><?= $ref->getSiteWeb(); ?></span>
                    <h3 class="port-title"><?= $ref->getNomClient(); ?></h3>
                    <p class="port-sub"><?= $ref->getExtrait(); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-12 mt-5 text-center">
            <a href="<?= $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
                <div class="sb-label"><span class="sb-hint">Voir plus de réalisations</span></div>
                <div class="sb-knob"><i class="fal fa-trophy"></i></div>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===== TÉMOIGNAGES ===== -->
<?php if (!empty($testimonials)): ?>
<?php include('includes/testimonials.php'); ?>
<?php endif; ?>

<!-- ===== TECHNOLOGIES ===== -->
<?php if (!empty($tools)): ?>
<section class="trust" id="trust">
    <div class="trust-head container text-center">
        <h2 class="sec-title rv d1">Les <em>technologies</em> et <em>plateformes</em><br> au service de vos projets</h2>
        <p>Nous utilisons les meilleurs outils du marché pour garantir la performance, la sécurité et la croissance de votre business.</p>
    </div>
    <div class="trust-rows">
        <div class="trust-row">
            <div class="trust-inner go-l">
                <?php foreach ($tools as $tool): ?>
                <div class="trust-item">
                    <img class="img-partner" src="<?= $siteURL; ?>images/tools/<?= $tool->getPhoto(); ?>" alt="<?= $tool->getTitre(); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="trust-row">
            <div class="trust-inner go-r">
                <?php foreach ($tools as $tool): ?>
                <div class="trust-item">
                    <img class="img-partner" src="<?= $siteURL; ?>images/tools/<?= $tool->getPhoto(); ?>" alt="<?= $tool->getTitre(); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===== PARTENAIRES ===== -->
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

<!-- ===== CTA FINAL ===== -->


<script src="https://cdn.jsdelivr.net/npm/lenis@1.2.3/dist/lenis.min.js"></script>
<script>
(function () {
  var lenis = new Lenis({
    duration: 1.2,
    easing: function (t) { return Math.min(1, 1.001 - Math.pow(2, -10 * t)); },
    smooth: true,
    smoothTouch: false,
  });

  function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
  requestAnimationFrame(raf);

  /* Smooth-scroll anchor links inside agent content */
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var id = a.getAttribute('href').slice(1);
      var target = document.getElementById(id);
      if (target) { e.preventDefault(); lenis.scrollTo(target, { offset: -80 }); }
    });
  });
})();
</script>
