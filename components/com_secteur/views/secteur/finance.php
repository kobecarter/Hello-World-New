<style>
/* ═══════════════════════════════════════════════════════
   DESIGN TOKENS — identique sante.html helloworld-agency
═══════════════════════════════════════════════════════ */

/* ── SECTION COMMONS ── */
.rv{opacity:0;transform:translateY(28px);transition:opacity .7s ease,transform .7s ease}
.rv.on{opacity:1;transform:none}
.rv.d1{transition-delay:.1s}.rv.d2{transition-delay:.2s}.rv.d3{transition-delay:.3s}.rv.d4{transition-delay:.4s}


/* ── Telegram Phone 3D Mockup ── */
.tg-scene{position:relative;display:flex;align-items:center;justify-content:center;width:100%;min-height:420px;perspective:1400px}
.tg-glow{position:absolute;inset:5%;background:radial-gradient(ellipse at 40% 60%,rgba(41,182,246,.12),rgba(9,161,190,.08) 50%,transparent 70%);filter:blur(28px);z-index:0;pointer-events:none;animation:tg-glow-pulse 4s ease-in-out infinite}
@keyframes tg-glow-pulse{0%,100%{opacity:.7}50%{opacity:1}}
.tg-3d-group{position:relative;transform-style:preserve-3d;transform:rotateY(-13deg) rotateX(5deg);will-change:transform;animation:tg3d-in 1s cubic-bezier(.22,.81,.36,1) forwards}
@keyframes tg3d-in{from{opacity:0;transform:rotateY(-22deg) rotateX(11deg) translateY(55px) scale(.88)}to{opacity:1;transform:rotateY(-13deg) rotateX(5deg) translateY(0) scale(1)}}
.tg-phone{width:210px;border-radius:36px;background:linear-gradient(165deg,#2d2d2d 0%,#111 100%);padding:8px;position:relative;z-index:2;box-shadow:-18px 26px 60px rgba(0,0,0,.42),-6px 8px 22px rgba(0,0,0,.24),0 2px 4px rgba(0,0,0,.18),inset 0 1px 0 rgba(255,255,255,.13),inset 0 -1px 0 rgba(0,0,0,.55)}
.tg-phone::before{content:'';position:absolute;inset:0;border-radius:36px;background:linear-gradient(130deg,rgba(255,255,255,.09) 0%,transparent 40%);pointer-events:none;z-index:5}
.tg-screen{border-radius:29px;overflow:hidden;font-family:var(--fm)}
.tg-sbar{background:#1c2340;padding:.24rem .65rem .18rem;display:flex;justify-content:space-between;align-items:center}
.tg-sbar-time{font-size:.47rem;font-weight:700;color:#fff}
.tg-sbar-icons{display:flex;gap:4px;align-items:center;color:#fff;font-size:.42rem}
.tg-hdr{background:#1c2340;padding:.38rem .55rem;display:flex;align-items:center;gap:.38rem;border-bottom:1px solid rgba(255,255,255,.06)}
.tg-hdr-back{color:rgba(255,255,255,.55);font-size:.65rem}
.tg-hdr-av{width:26px;height:26px;border-radius:50%;background:linear-gradient(135deg,#2AABEE,#1a8fd1);display:flex;align-items:center;justify-content:center;font-size:.55rem;color:#fff;flex-shrink:0}
.tg-hdr-info{flex:1}
.tg-hdr-name{font-size:.52rem;font-weight:700;color:#fff;line-height:1.1}
.tg-hdr-status{font-size:.4rem;color:rgba(255,255,255,.5);margin-top:.04rem}
.tg-hdr-ico{display:flex;gap:6px;color:rgba(255,255,255,.55);font-size:.55rem}
.tg-chat{background:#0e1621;padding:.5rem .45rem;display:flex;flex-direction:column;gap:.3rem;min-height:280px}
.tg-msg{padding:.38rem .5rem;border-radius:8px;font-size:.44rem;line-height:1.5;max-width:88%}
.tg-msg.sys{background:#1c2c40;align-self:center;font-size:.38rem;color:rgba(255,255,255,.35);border-radius:8px;padding:.22rem .55rem;text-align:center;max-width:100%}
.tg-msg.ch{background:#1c2b3a;align-self:flex-start;border-bottom-left-radius:2px;color:rgba(255,255,255,.85)}
.tg-msg.ch .tg-ch-name{font-size:.4rem;font-weight:700;color:#2AABEE;margin-bottom:.2rem}
.tg-signal{background:#0d2137;border:1px solid rgba(41,182,246,.25);border-radius:8px;padding:.5rem .6rem;margin:.2rem 0;align-self:flex-start;max-width:94%}
.tg-signal-header{font-size:.42rem;font-weight:700;color:#2AABEE;letter-spacing:.05em;margin-bottom:.35rem;display:flex;align-items:center;gap:.3rem}
.tg-signal-header::before{content:'📡';font-size:.5rem}
.tg-signal-pair{font-size:.7rem;font-weight:800;color:#fff;margin-bottom:.25rem}
.tg-signal-pair .dir{color:#4ade80;font-size:.65rem}
.tg-signal-row{font-size:.42rem;color:rgba(255,255,255,.65);display:flex;gap:.5rem;margin-bottom:.1rem}
.tg-signal-row span{color:rgba(255,255,255,.9);font-weight:600}
.tg-signal-tag{font-size:.38rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:rgba(41,182,246,.7);margin-top:.3rem}
.tg-exec{background:#0a1f0d;border:1px solid rgba(74,222,128,.3);border-radius:8px;padding:.45rem .55rem;align-self:flex-start;max-width:92%;margin:.2rem 0}
.tg-exec-head{font-size:.4rem;font-weight:700;color:#4ade80;letter-spacing:.08em;margin-bottom:.2rem;display:flex;align-items:center;gap:.25rem}
.tg-exec-head::before{content:'✅';font-size:.45rem}
.tg-exec-body{font-size:.42rem;color:rgba(255,255,255,.75);line-height:1.55}
.tg-exec-body strong{color:#4ade80}
.tg-bt{font-size:.36rem;color:rgba(255,255,255,.25);display:block;margin-top:.15rem;text-align:right}
.tg-irow{background:#151e2d;padding:.35rem .45rem;display:flex;align-items:center;gap:.3rem;border-top:1px solid rgba(255,255,255,.05)}
.tg-ifake{flex:1;background:#1c2b3a;border-radius:16px;padding:.28rem .5rem;font-size:.42rem;color:rgba(255,255,255,.25)}
.tg-isend{width:22px;height:22px;border-radius:50%;background:#2AABEE;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.44rem;flex-shrink:0}
.tg-navb{background:#111;padding:.26rem .5rem;display:flex;justify-content:space-around;align-items:center}
.tg-navb span{font-size:.6rem;color:rgba(255,255,255,.35);display:block}
/* Notification popup */
.tg-notif{position:absolute;right:-110px;top:42%;transform:translate3d(0,-50%,28px);width:190px;border-radius:13px;overflow:hidden;background:#fff;box-shadow:0 18px 44px rgba(0,0,0,.2),0 4px 12px rgba(0,0,0,.1),0 0 0 1px rgba(0,0,0,.06);z-index:10;animation:tg-notif-float 4.5s ease-in-out infinite .6s}
@keyframes tg-notif-float{0%,100%{transform:translate3d(0,-50%,28px) translateY(0)}50%{transform:translate3d(0,-50%,28px) translateY(-7px)}}
.tg-notif-hdr{background:#1c2340;padding:.46rem .65rem;display:flex;align-items:center;gap:.4rem}
.tg-notif-av{width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#2AABEE,#1a8fd1);display:flex;align-items:center;justify-content:center;font-size:.5rem;color:#fff;flex-shrink:0}
.tg-notif-name{font-size:.5rem;font-weight:700;color:#fff;line-height:1.1}
.tg-notif-st{font-size:.38rem;color:rgba(255,255,255,.55);margin-top:.03rem}
.tg-notif-msg{padding:.6rem .65rem .4rem;font-size:.58rem;font-weight:700;color:#111;line-height:1.4;border-bottom:1px solid #f0f0f0}
.tg-notif-sub{padding:.35rem .65rem;font-size:.46rem;color:#666;border-bottom:1px solid #f0f0f0;display:flex;align-items:center;gap:.3rem}
.tg-notif-sub .lat{font-weight:700;color:#4ade80}
.tg-notif-acts{display:flex}
.tg-notif-act{flex:1;padding:.38rem;text-align:center;font-size:.48rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#666;cursor:pointer}
.tg-notif-act:hover{background:#f5f5f5;color:#2AABEE}
.tg-notif-act+.tg-notif-act{border-left:1px solid #f0f0f0}
/* Telegram logo badge */
.tg-logo{position:absolute;top:-14px;right:-28px;width:50px;height:50px;background:linear-gradient(135deg,#2AABEE,#1a8fd1);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.5rem;box-shadow:0 6px 20px rgba(41,182,246,.45),0 0 0 3px #fff;z-index:15;animation:tg-logo-bob 4s ease-in-out infinite}
@keyframes tg-logo-bob{0%,100%{transform:translateY(0) rotate(-5deg)}50%{transform:translateY(-5px) rotate(5deg)}}

/* ── TRADING TERMINAL MOCKUP (CSS) ── */
.trm{width:360px;background:#0a0e17;border-radius:14px;overflow:hidden;box-shadow:0 32px 80px rgba(0,0,0,.35);font-family:'Cabinet Grotesk',monospace}
.trm-bar{padding:.6rem 1rem;background:#111827;display:flex;align-items:center;gap:.5rem;border-bottom:1px solid rgba(255,255,255,.06)}
.trm-dot{width:10px;height:10px;border-radius:50%}
.trm-dot.r{background:#ff5f57}.trm-dot.y{background:#ffbd2e}.trm-dot.g{background:#28c940}
.trm-title{font-size:.58rem;color:rgba(255,255,255,.3);letter-spacing:.15em;text-transform:uppercase;margin-left:.5rem}
.trm-body{padding:1.2rem}
.trm-pair{display:flex;justify-content:space-between;align-items:center;padding:.5rem 0;border-bottom:1px solid rgba(255,255,255,.05)}
.trm-pair-name{font-size:.7rem;font-weight:700;color:rgba(255,255,255,.7);letter-spacing:.08em}
.trm-pair-price{font-size:.85rem;font-weight:400;color:#4ade80;font-family:monospace}
.trm-pair-change{font-size:.6rem;color:rgba(74,222,128,.7)}
.trm-pair.down .trm-pair-price,.trm-pair.down .trm-pair-change{color:#f87171}
.trm-chart{margin-top:1rem;height:80px;position:relative;overflow:hidden}
.trm-chart-line{position:absolute;inset:0}
.trm-signal{margin-top:1rem;padding:.8rem;background:rgba(9,161,190,.12);border:1px solid rgba(9,161,190,.3);border-radius:8px}
.trm-signal-head{font-size:.55rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--sc);margin-bottom:.4rem}
.trm-signal-body{font-size:.65rem;color:rgba(255,255,255,.6);line-height:1.6;font-family:monospace}
.trm-signal span{color:#4ade80}
.trm-exec{margin-top:.6rem;display:flex;gap:.4rem}
.trm-exec-btn{flex:1;padding:.5rem;border-radius:6px;font-size:.58rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;text-align:center;cursor:default}
.trm-exec-btn.buy{background:rgba(74,222,128,.2);color:#4ade80;border:1px solid rgba(74,222,128,.3)}
.trm-exec-btn.sell{background:rgba(248,113,113,.2);color:#f87171;border:1px solid rgba(248,113,113,.3)}
.trm-bot-badge{margin-top:.8rem;display:flex;align-items:center;gap:.5rem;padding:.5rem .8rem;background:rgba(255,255,255,.04);border-radius:8px}
.trm-bot-dot{width:7px;height:7px;border-radius:50%;background:var(--sc);animation:pulse-dot 1.5s ease-in-out infinite}
@keyframes pulse-dot{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.8)}}
.trm-bot-txt{font-size:.58rem;color:rgba(255,255,255,.4);letter-spacing:.08em}

.sh-int-visual{position:sticky;top:7rem}
.sh-int-card{box-shadow:0 20px 60px rgba(0,0,0,.08);padding: 0;}
.sh-int-card-img{width:100%;height:220px;object-fit:cover;filter:grayscale(20%) brightness(.95)}
.sh-int-card-body{padding:2rem}
.sh-int-card-title{font-weight:600;font-size:1rem;color:var(--txt);margin-bottom:.6rem}
.sh-int-card-desc{font-size:.8rem;color:var(--txt2);line-height:1.8}
@media(max-width:991px){.sh-int-inner{grid-template-columns:1fr}.sh-int-visual{position:static}}

/* ── CASE STUDY ── */
.sh-case{padding:8rem 0;background:var(--bg2);border-bottom:1px solid var(--border)}
.case-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0;border:1px solid var(--border);border-radius:24px;overflow:hidden;margin-top:4rem}
.case-left{padding:4.5rem 4rem;background:var(--bg)}
.case-right{padding:4.5rem 4rem;border-left:1px solid var(--border);display:flex;flex-direction:column;justify-content:space-between;gap:2rem;position:relative;overflow:hidden}
.case-right::before{content:'';position:absolute;inset:0;z-index:0;background:linear-gradient(135deg,rgba(255,252,246,.82),rgba(250,246,238,.75) 50%,rgba(247,244,236,.7) 100%)}
.case-right::after{content:'';position:absolute;inset:0;z-index:0;background:radial-gradient(ellipse at 80% 10%,rgba(255,255,255,.35),transparent 55%);animation:cr-pulse 5s ease-in-out infinite}
@keyframes cr-pulse{0%,100%{opacity:1}50%{opacity:.7}}
.case-right>*{position:relative;z-index:1}
.case-tag{font-size:.52rem;font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:var(--gold);margin-bottom:1.2rem;display:block}
.case-headline{font-weight:300;font-size:2.1rem;color:var(--txt);margin-bottom:1.5rem;letter-spacing:-.02em;line-height:1.1}
.case-ctx{font-size:.85rem;color:var(--txt2);line-height:1.9;margin-bottom:2rem}
.case-ctx strong{color:var(--txt);font-weight:600}
.case-problem{background:rgba(139,106,34,.05);border:1px solid rgba(139,106,34,.18);border-top:2px solid var(--gold);border-radius:8px;padding:1.4rem 1.6rem;margin-bottom:1.5rem}
.case-problem-label{font-size:.55rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.45rem}
.case-problem-text{font-size:.8rem;color:var(--txt2);line-height:1.8}
.case-results{display:grid;grid-template-columns:repeat(2,1fr);gap:1rem}
.result-big{padding:1.4rem;background:rgba(255,255,255,.7);backdrop-filter:blur(12px);border:1px solid rgba(139,106,34,.12);border-radius:12px;transition:all .3s}
.result-big:hover{border-color:rgba(9,161,190,.3);transform:translateY(-2px)}
.result-num{font-weight:200;font-size:2.2rem;color:var(--sc);line-height:1;letter-spacing:-.04em}
.result-lbl{font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--txt2);margin-top:.25rem}
.case-quote{font-size:.82rem;font-style:italic;color:var(--txt2);line-height:1.85;padding:1.5rem 1.8rem;background:rgba(255,255,255,.6);backdrop-filter:blur(12px);border-radius:12px;position:relative}
.case-quote::before{content:'\201C';position:absolute;top:.2rem;left:.8rem;font-family:var(--fd);font-size:3.5rem;line-height:1;color:var(--gold2);opacity:.4;font-style:normal}
.case-quote-author{font-style:normal;font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);margin-top:.6rem;display:block}
@media(max-width:991px){.case-wrap{grid-template-columns:1fr}.case-right{border-left:none;border-top:1px solid var(--border)}}

</style>
<!-- ═══════ HERO CLAIR ═══════ -->
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>
  <div class="sh-hero-body">
    <div class="container">
      <div class="sh-hero-inner">
        <div>
          <div class="sh-breadcrumb">Solutions IA · Finance &amp; Trading</div>
          <h1 class="sh-h1">Solutions IA<br>pour <em>la Finance</em><br>et le Trading</h1>
          <p class="sh-sub">Exécutez vos stratégies financières avec une précision algorithmique. Automatisez le traitement de vos flux de données complexes et réduisez votre latence d'exécution à moins de 100ms.</p>
          <div class="sh-cta-row">
                <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Configurer votre agent" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Configurer votre agent</span></div>
                  <div class="sb-knob"><i class="fal fa-bolt"></i></div>
                </a>
            
                <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Recevoir l'audit" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Recevoir l'audit</span></div>
                  <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
                </a> 
          </div>
          <div class="sh-badges">
            <div class="sh-badge"><div class="sh-badge-val">&lt;100<span style="font-size:.6em">ms</span></div><div class="sh-badge-lbl">Latence exec.</div></div>
            <div class="sh-badge"><div class="sh-badge-val">100<span style="font-size:.6em">%</span></div><div class="sh-badge-lbl">Fiabilité ordres</div></div>
            <div class="sh-badge"><div class="sh-badge-val">98<span style="font-size:.6em">%</span></div><div class="sh-badge-lbl">Précision OCR</div></div>
            <div class="sh-badge"><div class="sh-badge-val">2<span style="font-size:.6em">ETP</span></div><div class="sh-badge-lbl">Économisés</div></div>
          </div>
        </div>
        <!-- ORBITAL FINANCE IA -->
        <div class="sh-hero-right">
          <div class="sho-scene">
            <div class="sho-ring r1"></div>
            <div class="sho-ring r2"></div>
            <div class="sho-ring r3"></div>
            <div class="sho-core">
              <div class="sho-plus">₿</div>
              <div class="sho-lbl">Finance IA</div>
            </div>
            <!-- Orbit interne r=100px -->
            <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="Telegram Signaux"><i class="fab fa-telegram"></i></div></div>
            <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="MetaTrader MT5"><i class="fal fa-chart-bar"></i></div></div>
            <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Sage / Odoo"><i class="fal fa-file-invoice-dollar"></i></div></div>
            <!-- Orbit moyenne r=170px -->
            <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="cTrader API"><i class="fal fa-chart-line"></i></div></div>
            <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="Bloomberg RSS"><i class="fal fa-newspaper"></i></div></div>
            <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="CMI / Stripe"><i class="fal fa-credit-card"></i></div></div>
            <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="OCR Comptable"><i class="fal fa-receipt"></i></div></div>
            <!-- Orbit externe r=222px -->
            <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="Conformité BAM"><i class="fal fa-shield-alt"></i></div></div>
            <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="Dashboard P&L"><i class="fal fa-chart-pie"></i></div></div>
            <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="Kill Switch"><i class="fal fa-power-off"></i></div></div>
            <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="QuickBooks"><div class="ltr">QB</div></div></div>
            <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="Forex EUR/USD"><div class="ltr">FX</div></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ STATS ═══════ -->
<section class="sh-stats">
  <div class="container">
    <div class="sh-stats-grid">
      <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="85">0</span><span class="suf">ms</span></div><div class="sh-stat-lbl">Latence d'exécution</div><div class="sh-stat-sub">Signaux Telegram vers broker</div></div>
      <div class="sh-stat rv"><div class="sh-stat-val"><span class="suf">÷</span><span class="sh-counter" data-target="4">0</span></div><div class="sh-stat-lbl">Temps de conciliation</div><div class="sh-stat-sub">Comptabilité accélérée</div></div>
      <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="98">0</span><span class="suf">%</span></div><div class="sh-stat-lbl">Précision OCR</div><div class="sh-stat-sub">Extraction reçus &amp; factures</div></div>
      <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="3">0</span><span class="suf">m</span></div><div class="sh-stat-lbl">ROI atteignable</div><div class="sh-stat-sub">Retour sur investissement</div></div>
    </div>
  </div>
</section>

<!-- ══ CONTEXTE & ENJEUX ════════════════════════════════════════ -->
<section class="sh-context">
  <div class="container">
    <div class="sh-context-inner">

      <div>
        <div class="sec-label">Contexte &amp; Enjeux</div>
        <h2 class="sh-ctx-title rv"><strong>Secteur Financier</strong>La latence est l'ennemi numéro un</h2>
        <div class="sh-ctx-body rv d1">
          <p>Dans l'univers financier et du trading, la latence est l'ennemi. Qu'il s'agisse de traiter des signaux sur les marchés (Forex, Or) ou d'automatiser des flux comptables internes lourds, les institutions exigent <em>sécurité absolue</em>, vitesse d'exécution en millisecondes et fiabilité sans faille.</p>
          <p>Au Maroc, le marché Forex via brokers internationaux (XM, IC Markets) est en plein essor, porté par une communauté Telegram active. Côté entreprise, la DAF est sous pression pour fiabiliser la comptabilisation et réduire les délais de clôture.</p>
        </div>
        <div class="sh-pills rv d2">
          <span class="sh-pill"><i class="fa fa-bolt"></i> Exécution sub-100ms</span>
          <span class="sh-pill"><i class="fa fa-shield-halved"></i> Conformité BAM</span>
          <span class="sh-pill"><i class="fa fa-calculator"></i> OCR comptable</span>
          <span class="sh-pill"><i class="fab fa-telegram"></i> Intégration Telegram</span>
        </div>
      </div>

      <!-- CSS ART Visual -->
      <div class="sh-ctx-visual rv d2">
        <div class="sh-ctx-blob"></div>
        <div class="sh-ctx-blob2"></div>
        <div class="sh-ctx-center"><div class="sh-ctx-cross"><i class="fal fa-chart-line"></i></div></div>
        <div class="sh-fcard fc1">
          <div class="sh-fcard-val">&lt;100ms</div>
          <div class="sh-fcard-lbl">Latence exec.</div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">24/7</div>
          <div class="sh-fcard-lbl">Surveillance</div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">98%</div>
          <div class="sh-fcard-lbl">OCR précision</div>
        </div>
        <div class="sh-fcard fc4">
          <div class="sh-fcard-val">÷4</div>
          <div class="sh-fcard-lbl">Conciliation</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════ SOLUTIONS ═══════ -->
<section class="sh-solutions" id="solutions">
  <div class="container">
    <div class="sec-label">Solutions IA · Automatisation Financière</div>
    <h2 class="sec-title rv">Suite Finance IA<br><em>4 agents opérationnels</em></h2>
    <div class="sol-kpi-grid rv d1">
      <div class="sol-kpi-card"><div class="sol-kpi-val">&lt;100<span style="font-size:.6em">ms</span></div><div class="sol-kpi-lbl">Latence d'exécution</div></div>
      <div class="sol-kpi-card"><div class="sol-kpi-val">24/7</div><div class="sol-kpi-lbl">Surveillance marchés</div></div>
      <div class="sol-kpi-card"><div class="sol-kpi-val">98<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">Précision OCR</div></div>
      <div class="sol-kpi-card"><div class="sol-kpi-val">0</div><div class="sol-kpi-lbl">Erreur comptable</div></div>
    </div>
    <div class="sol-feature rv">
      <div class="sol-fc-text">
        <div class="sol-fc-title"><strong>Agent Signal + Exécution</strong>Traitement Forex &amp; Or depuis Telegram</div>
        <p class="sol-fc-desc">Agent autonome qui parse les signaux premium, extrait les paramètres critiques (TP, SL, volume) et exécute sur MetaTrader ou cTrader en moins de 100ms.</p>
        <ul class="sol-benefits">
          <li><i class="fa fa-check"></i><span><strong>Parsing instantané des signaux Telegram</strong> — normalisation en format exécutable, extraction TP/SL/volume</span></li>
          <li><i class="fa fa-check"></i><span><strong>Routage API broker</strong> — connexion directe MetaTrader MT4/MT5 et cTrader avec confirmation temps réel</span></li>
          <li><i class="fa fa-check"></i><span><strong>Alertes sentiment marché</strong> — veille macroéconomique 24/7, agrégation RSS et NLP pour anticiper les mouvements</span></li>
          <li><i class="fa fa-check"></i><span><strong>OCR + comptabilité automatique</strong> — reçus scannés, catégorisés et injectés dans Sage/Odoo sans intervention humaine</span></li>
          <li><i class="fa fa-check"></i><span><strong>Dashboard P&amp;L consolidé</strong> — bilan quotidien automatique, rapport hebdomadaire transmis au DAF</span></li>
          <li><i class="fa fa-check"></i><span><strong>Kill switch d'urgence</strong> — arrêt immédiat de toutes les positions en 1 clic, traçabilité complète</span></li>
        </ul>
        <div class="sol-roi-box">
          <div class="sol-roi-num">2</div>
          <div class="sol-roi-text"><strong>ETP comptables économisés pour une PME de 50 personnes.</strong><br>ROI atteignable en moins de 3 mois. Fiabilité 100% sur les ordres programmés.</div>
        </div>
      </div>
      <!-- Telegram Signal Phone 3D — identique WhatsApp sante.html -->
      <div class="sol-fc-visual">
        <div class="tg-scene">
          <div class="tg-glow"></div>
          <div class="tg-3d-group">

            <!-- Telegram logo badge -->
            <div class="tg-logo"><i class="fab fa-telegram"></i></div>

            <!-- Phone Frame -->
            <div class="tg-phone">
              <div class="tg-screen">
                <!-- Status bar -->
                <div class="tg-sbar">
                  <span class="tg-sbar-time">09:17</span>
                  <div class="tg-sbar-icons">
                    <i class="fa fa-signal"></i>
                    <i class="fa fa-wifi"></i>
                    <i class="fa fa-battery-three-quarters"></i>
                  </div>
                </div>
                <!-- Header -->
                <div class="tg-hdr">
                  <span class="tg-hdr-back">&#8592;</span>
                  <div class="tg-hdr-av"><i class="fab fa-telegram" style="font-size:.6rem"></i></div>
                  <div class="tg-hdr-info">
                    <div class="tg-hdr-name">Forex Premium Signals</div>
                    <div class="tg-hdr-status">Canal · 4 892 abonnés</div>
                  </div>
                  <div class="tg-hdr-ico">
                    <i class="fa fa-magnifying-glass"></i>
                    <i class="fa fa-ellipsis-vertical"></i>
                  </div>
                </div>
                <!-- Chat -->
                <div class="tg-chat">
                  <div class="tg-msg sys">Aujourd'hui · 09:14</div>

                  <!-- Signal message -->
                  <div class="tg-signal">
                    <div class="tg-signal-header">Signal Premium VIP</div>
                    <div class="tg-signal-pair">EUR/USD &nbsp;<span class="dir">BUY</span></div>
                    <div class="tg-signal-row">Entry &nbsp;<span>1.08742</span></div>
                    <div class="tg-signal-row">Take Profit &nbsp;<span style="color:#4ade80">1.09120</span></div>
                    <div class="tg-signal-row">Stop Loss &nbsp;<span style="color:#f87171">1.08300</span></div>
                    <div class="tg-signal-row">Lot &nbsp;<span>0.50</span></div>
                    <div class="tg-signal-tag">⚡ Parsing Agent HW · OK</div>
                    <span class="tg-bt">09:14</span>
                  </div>

                  <div class="tg-msg sys">Agent HW · Exécution en cours…</div>

                  <!-- Execution confirmation -->
                  <div class="tg-exec">
                    <div class="tg-exec-head">Ordre exécuté · MetaTrader</div>
                    <div class="tg-exec-body">
                      EUR/USD · BUY · <strong>0.50 lot</strong><br>
                      Latence : <strong>83ms</strong><br>
                      P&amp;L ouvert : <strong>+$0.00</strong>
                    </div>
                    <span class="tg-bt">09:14</span>
                  </div>

                  <div class="tg-msg sys">XAU/USD · Signal reçu · 09:16</div>
                </div>
                <!-- Input -->
                <div class="tg-irow">
                  <div class="tg-ifake">Message…</div>
                  <div class="tg-isend"><i class="fa fa-paper-plane"></i></div>
                </div>
                <!-- Android nav -->
                <div class="tg-navb"><span>&#9664;</span><span>&#9711;</span><span>&#9632;</span></div>
              </div>
            </div>

            <!-- Notification overlay -->
            <div class="tg-notif">
              <div class="tg-notif-hdr">
                <div class="tg-notif-av"><i class="fab fa-telegram" style="font-size:.5rem"></i></div>
                <div>
                  <div class="tg-notif-name">Agent HW · P&amp;L Live</div>
                  <div class="tg-notif-st">MetaTrader · En ligne</div>
                </div>
              </div>
              <div class="tg-notif-msg">Exécution confirmée •<br>EUR/USD BUY 0.50</div>
              <div class="tg-notif-sub">Latence : <span class="lat">83ms</span> &nbsp;·&nbsp; TP actif</div>
              <div class="tg-notif-acts">
                <div class="tg-notif-act">FERMER</div>
                <div class="tg-notif-act">P&amp;L</div>
              </div>
            </div>

          </div><!-- /tg-3d-group -->
        </div><!-- /tg-scene -->
      </div>
    </div>
  </div>
</section>

<!-- ═══════ JOURNEY / TIMELINE ═══════ -->
<section class="sh-journey" id="parcours">
  <div class="jp-bg">
    <img id="jpImg" class="jp-img" src="<?php echo $siteURL; ?>/images/finance-journey-bg.jpg" alt="Trading room Finance IA" loading="eager">
  </div>
  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Parcours client typique</div>
      <h2 class="sec-title rv">Du signal Telegram<br><em>à la clôture comptable</em></h2>
      <p class="rv d1">Deux flux automatisés en parallèle : trading en temps réel et comptabilité sans friction. Choisissez votre priorité.</p>
      <div class="tab-nav rv d2">
        <button class="tab-btn active" data-tab="trading">Flux Trading</button>
        <button class="tab-btn" data-tab="compta">Flux Comptable</button>
        <button class="tab-btn" data-tab="reporting">Reporting DAF</button>
      </div>

      <div class="tab-pane active" id="tab-trading">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamT"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Signal Premium</div><p class="jf-desc">Signal reçu sur canal Telegram VIP d'un fournisseur premium certifié</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Parsing IA</div><p class="jf-desc">Extraction instantanée des paramètres TP, SL, instrument et volume</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Exécution Broker</div><p class="jf-desc">Ordre envoyé à l'API MetaTrader/cTrader en moins de 100ms</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Confirmation</div><p class="jf-desc">Confirmation d'exécution renvoyée sur canal Telegram privé</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">P&amp;L Temps Réel</div><p class="jf-desc">Mise à jour immédiate du dashboard P&amp;L avec position active</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Bilan Quotidien</div><p class="jf-desc">Rapport journalier consolidé transmis automatiquement au DAF</p></div>
        </div>
      </div>

      <div class="tab-pane" id="tab-compta">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamC"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Scan Reçu</div><p class="jf-desc">Photo du reçu prise sur mobile ou facture reçue par email</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">OCR &amp; Extraction</div><p class="jf-desc">Extraction automatique du montant, date, fournisseur et TVA</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Catégorisation</div><p class="jf-desc">Classement intelligent par centre de coût selon les règles comptables</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Saisie Sage/Odoo</div><p class="jf-desc">Injection automatique dans le logiciel comptable sans intervention</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Rapprochement</div><p class="jf-desc">Rapprochement bancaire automatique avec relevé de compte</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Clôture Accélérée</div><p class="jf-desc">Clôture mensuelle en 2h au lieu de 2 jours. Zéro erreur garantie.</p></div>
        </div>
      </div>

      <div class="tab-pane" id="tab-reporting">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamR"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Collecte 18h00</div><p class="jf-desc">L'agent collecte automatiquement positions, P&amp;L et reçus du jour</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Consolidation</div><p class="jf-desc">Synthèse des flux de trading et des dépenses dans un tableau unifié</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Analyse IA</div><p class="jf-desc">Identification des anomalies, tendances et opportunités du lendemain</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Génération PDF</div><p class="jf-desc">Rapport exécutif mis en forme automatiquement selon la charte</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Envoi Sécurisé</div><p class="jf-desc">Transmission chiffrée au DAF par email sécurisé à 7h00 du matin</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Archivage</div><p class="jf-desc">Stockage conforme BAM pour audit et traçabilité complète 7 ans</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ INTEGRATIONS ═══════ -->
<section class="sh-integrations" id="integrations">
  <div class="container">
    <div class="sec-label">Intégrations clés</div>
    <h2 class="sec-title rv">Connecté à votre<br><em>écosystème financier</em></h2>
    <div class="sh-int-inner">
      <div class="accordion rv d1">
        <div class="acc-item open">
          <button class="acc-trigger"><div class="acc-ico"><i class="fal fa-chart-bar"></i></div><div class="acc-lbl-wrap"><span class="acc-title">MetaTrader MT4 / MT5</span><span class="acc-sub">Exécution des ordres en temps réel</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Connexion directe à l'API broker pour l'exécution des ordres en moins de 100ms. Gestion des positions, trailing stop et take profit automatiques avec confirmation instantanée dans Telegram.</p></div></div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger"><div class="acc-ico"><i class="fab fa-telegram"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Telegram Bots</span><span class="acc-sub">Réception signaux et notifications</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Écoute permanente des canaux premium, parsing NLP des signaux, routage automatique vers l'API broker. Confirmation d'exécution et P&L en temps réel dans vos canaux privés.</p></div></div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger"><div class="acc-ico"><i class="fal fa-file-invoice-dollar"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Sage / Odoo / QuickBooks</span><span class="acc-sub">Saisie comptable automatisée OCR</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Injection automatique des reçus et factures via OCR à 98% de précision. Catégorisation intelligente par centre de coût et rapprochement bancaire sans intervention humaine.</p></div></div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger"><div class="acc-ico"><i class="fal fa-newspaper"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Reuters / Bloomberg RSS</span><span class="acc-sub">Veille macroéconomique 24/7</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Agrégation des flux RSS financiers, analyse NLP du sentiment de marché, alertes Telegram avant les événements macro majeurs (NFP, BCE, FED) pour anticiper les mouvements.</p></div></div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger"><div class="acc-ico"><i class="fal fa-credit-card"></i></div><div class="acc-lbl-wrap"><span class="acc-title">CMI / Stripe Connect</span><span class="acc-sub">Passerelles de paiement marocaines</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Intégration des passerelles de paiement CMI (Maroc) et Stripe Connect pour le suivi des flux financiers entrants et sortants avec réconciliation automatique.</p></div></div>
        </div>
      </div>
      <div class="sh-int-visual rv d2">
        <div class="sh-int-card">
          <img class="sh-int-card-img" src="<?php echo $siteURL; ?>images/finance-journey-bg.jpg" alt="Écosystème Finance">
          <div class="sh-int-card-body">
            <div class="sh-int-card-title">Architecture sécurisée BAM</div>
            <p class="sh-int-card-desc">Toutes nos intégrations respectent les exigences réglementaires de Bank Al-Maghrib. Hébergement souverain ou cloud privé selon vos contraintes de conformité. Audit de sécurité inclus dès la phase 1.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ SDTL DEPLOYMENT TIMELINE ═══════ -->
<section class="sdtl-section" id="deploiement">
  <div class="sdtl-orb-wrap"><div class="sdtl-orb" id="sdtlOrb"><div class="sdtl-orb-ring r1"></div><div class="sdtl-orb-ring r2"></div><div class="sdtl-orb-ring r3"></div><div class="sdtl-orb-ring r4"></div></div></div>
  <div class="container">
    <div class="sdtl-header">
      <div class="sec-label">Déploiement adapté Finance</div>
      <h2 class="sec-title rv">Méthodologie en phases<br><em>certifiée BAM</em></h2>
      <p class="sdtl-intro rv d1">Une approche structurée conçue pour protéger vos flux financiers dès le premier jour. Validation complète en paper trading avant tout engagement de capital réel.</p>
    </div>
    <div class="sdtl-timeline" id="sdtlTimeline">
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Audit Sécurité &amp; Conformité</div>
            <p class="sdtl-desc">Cartographie des flux financiers, identification des contraintes réglementaires BAM, choix hébergement souverain ou cloud privé.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Rapport conformité BAM</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Architecture sécurisée validée</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Cartographie des flux financiers</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 1 – 2</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-shield-alt"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Conformité</div></div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword">Pilote</div></div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-flask"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">2</div>
            <div class="sdtl-title">Paper Trading (4 semaines)</div>
            <p class="sdtl-desc">Validation complète de la chaîne sans engagement de capital. Tests de latence et de fiabilité en conditions réelles de marché.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Chaîne validée sans capital</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Latence mesurée et optimisée</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Kill switch testé et opérationnel</span></div>
            </div>
            <span class="sdtl-tag">SEMAINES 3 – 6</span>
          </div>
        </div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title">Production Capital Réel</div>
            <p class="sdtl-desc">Déploiement progressif avec seuils de risque paramétrables, monitoring 24/7 et kill switch d'urgence activable en 1 clic.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Agents financiers opérationnels</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Dashboard P&amp;L temps réel</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Manuel risk management livré</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 7 – 10</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-rocket"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Production</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ CASE STUDY ═══════ -->
<section class="sh-case" id="cas-client">
  <div class="container">
    <div class="sec-label">Cas client · Étude de succès</div>
    <h2 class="sec-title rv">Résultats concrets<br><em>en trading indépendant</em></h2>
    <div class="case-wrap rv d1">
      <div class="case-left">
        <span class="case-tag">Étude de cas · Cabinet Trading · Casablanca</span>
        <h3 class="case-headline">Cabinet de trading<br>indépendant</h3>
        <p class="case-ctx"><strong>4 traders</strong> dépendants de 3 canaux Telegram premium. Processus de saisie comptable manuel chronophage. Latence d'exécution moyenne de <strong>3 minutes</strong> en mode manuel.</p>
        <div class="case-problem">
          <div class="case-problem-label">Problème identifié</div>
          <div class="case-problem-text">Impossibilité de scaler sans automatisation. Erreurs fréquentes de saisie comptable. Signaux manqués pendant les heures de bureau classiques.</div>
        </div>
        <p class="case-ctx" style="margin-bottom:0">Solution déployée : Agent Telegram d'exécution + suivi automatique des dépenses via OCR + dashboard P&L consolidé.</p>
      </div>
      <div class="case-right">
        <div class="case-results">
          <div class="result-big"><div class="result-num">85<span style="font-size:.5em">ms</span></div><div class="result-lbl">Latence moy. exec.</div></div>
          <div class="result-big"><div class="result-num">0</div><div class="result-lbl">Erreurs comptables</div></div>
          <div class="result-big"><div class="result-num">100<span style="font-size:.5em">%</span></div><div class="result-lbl">Ordres fiables</div></div>
          <div class="result-big"><div class="result-num">&lt;3<span style="font-size:.5em">m</span></div><div class="result-lbl">ROI atteint</div></div>
        </div>
        <blockquote class="case-quote">
          Notre réactivité sur le marché est désormais supérieure à celle de desks beaucoup plus gros. La machine exécute notre stratégie sans la moindre défaillance émotionnelle.
          <span class="case-quote-author">Gérant, Cabinet Trading Casablanca</span>
        </blockquote>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ CTA BAND ═══════ -->
<section class="cta-band" id="cta" style="background-image:url('<?php echo $siteURL; ?>images/finance-cta-bg.jpg')">
  <div class="container">
    <div class="sec-label">Vous êtes prêt à passer à l’action ?</div>
    <h2 class="sec-title rv">Fiabilisez vos opérations et <br>réduisez les interventions <em>manuelles</em></h2>
    <p class="cta-sub">Déployez des agents IA pour traiter vos signaux, surveiller vos flux, exécuter des actions depuis Telegram et automatiser le suivi des dépenses, avec une logique de performance, de traçabilité et de supervision adaptée aux environnements sensibles.</p>
    <div class="cta-btns">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Auditer vos flux financiers" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Demander un audit IA gratuit</span></div>
          <div class="sb-knob"><i class="fal fa-search"></i></div>
        </a>
    
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Tester un agent Telegram" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Auditer mes flux financiers</span></div>
          <div class="sb-knob"><i class="fab fa-telegram"></i></div>
        </a>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
/* ── Animated Counters ── */
(function(){
  const cio = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(!e.isIntersecting) return;
      const el = e.target, target = parseInt(el.dataset.target), start = performance.now();
      function update(now){
        const p = Math.min((now-start)/1600,1), eased = 1-Math.pow(1-p,3);
        el.textContent = Math.round(eased*target);
        if(p<1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update); cio.unobserve(el);
    });
  },{threshold:.5});
  document.querySelectorAll('.sh-counter').forEach(c => cio.observe(c));
})();

/* ── Accordion ── */
document.querySelectorAll('.acc-trigger').forEach(btn=>{
  btn.addEventListener('click',()=>{
    const item=btn.closest('.acc-item');
    const isOpen=item.classList.contains('open');
    document.querySelectorAll('.acc-item.open').forEach(i=>i.classList.remove('open'));
    if(!isOpen) item.classList.add('open');
  });
});

/* ── Tabs + Journey Beam ── */
(function(){
  function activateTab(btn){
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');
    const pane = document.getElementById('tab-'+btn.dataset.tab);
    if(!pane) return;
    pane.classList.add('active');
    pane.querySelectorAll('.jf-step').forEach((s,i) => {
      s.classList.remove('jf-in');
      setTimeout(() => s.classList.add('jf-in'), i*80);
    });
    const beam = pane.querySelector('.jf-beam');
    if(beam){ beam.style.width='0%'; setTimeout(()=>{beam.style.transition='width 1.6s ease';beam.style.width='100%';},200); setTimeout(()=>{beam.style.transition='none';},2000); }
  }
  document.querySelectorAll('.tab-btn').forEach(btn => btn.addEventListener('click',()=>activateTab(btn)));
  /* initial */
  const firstPane = document.querySelector('.tab-pane.active');
  if(firstPane){
    firstPane.querySelectorAll('.jf-step').forEach((s,i)=>setTimeout(()=>s.classList.add('jf-in'),600+i*80));
    const b=firstPane.querySelector('.jf-beam');
    if(b){setTimeout(()=>{b.style.transition='width 1.6s ease';b.style.width='100%';},800);}
  }
  /* Journey IO */
  const jio = new IntersectionObserver(entries=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        const pane=document.querySelector('.tab-pane.active');
        if(pane){ pane.querySelectorAll('.jf-step').forEach((s,i)=>setTimeout(()=>s.classList.add('jf-in'),i*80)); const b=pane.querySelector('.jf-beam'); if(b){b.style.transition='width 1.6s ease';b.style.width='100%';} }
        jio.unobserve(e.target);
      }
    });
  },{threshold:.2});
  const jSection=document.querySelector('.sh-journey');
  if(jSection) jio.observe(jSection);
})();

/* ── SDTL Scroll-Driven Spine + Steps ── */
(function(){
  const timeline=document.getElementById('sdtlTimeline');
  const spineFill=document.getElementById('sdtlSpineFill');
  const orb=document.getElementById('sdtlOrb');
  const steps=document.querySelectorAll('.sdtl-step');
  if(!timeline||!spineFill) return;

  function update(){
    const rect=timeline.getBoundingClientRect(), vh=window.innerHeight;
    const raw=(vh*.65-rect.top)/(rect.height+vh*.05);
    spineFill.style.height=(Math.max(0,Math.min(1,raw))*100)+'%';
    if(orb){ const sp=scrollY/Math.max(1,document.body.scrollHeight-vh); orb.style.transform=`rotateY(${(sp*720).toFixed(2)}deg) rotateX(${(sp*300).toFixed(2)}deg)`; }
  }
  let raf; window.addEventListener('scroll',()=>{if(!raf)raf=requestAnimationFrame(()=>{update();raf=null;})},{passive:true});

  const stepIO=new IntersectionObserver(entries=>{
    entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('active'); });
  },{threshold:.3,rootMargin:'0px 0px -10% 0px'});
  steps.forEach(s=>stepIO.observe(s));
})();


/* ══ JOURNEY — PARALLAX cabinet.jpeg + BEAM 1→6 + 3D GLASS HOVER ══ */
(function(){
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
})();

  /* ── GSAP Parallax Journey BG ── */
//gsap.to('.jp-img',{yPercent:15,ease:'none',scrollTrigger:{trigger:'.sh-journey',start:'top bottom',end:'bottom top',scrub:1}});
</script>