<?php if ($_SESSION['lang'] === 'en'): ?>

<!-- ═══════ HERO CLAIR ═══════ -->
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>
  <div class="sh-hero-body">
    <div class="container">
      <div class="sh-hero-inner">
        <div>
          <div class="sh-breadcrumb">AI Solutions · Finance &amp; Trading</div>
          <h1 class="sh-h1"><?php echo !empty($secteur->getH1()) ? $secteur->getH1() : $secteur->getTitre(); ?></h1>
          <p class="sh-sub">Execute your financial strategies with algorithmic precision. Automate the processing of your complex data flows and reduce your execution latency to under 100ms.</p>
          <div class="sh-cta-row">
                <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Configure your agent" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Configure your agent</span></div>
                  <div class="sb-knob"><i class="fal fa-bolt"></i></div>
                </a>

                <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Get the audit" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Get the audit</span></div>
                  <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
                </a>
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
              <div class="sho-lbl">Finance AI</div>
            </div>
            <!-- Orbit interne r=100px -->
            <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="Telegram Signals"><i class="fab fa-telegram"></i></div></div>
            <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="MetaTrader MT5"><i class="fal fa-chart-bar"></i></div></div>
            <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Sage / Odoo"><i class="fal fa-file-invoice-dollar"></i></div></div>
            <!-- Orbit moyenne r=170px -->
            <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="cTrader API"><i class="fal fa-chart-line"></i></div></div>
            <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="Bloomberg RSS"><i class="fal fa-newspaper"></i></div></div>
            <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="CMI / Stripe"><i class="fal fa-credit-card"></i></div></div>
            <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Accounting OCR"><i class="fal fa-receipt"></i></div></div>
            <!-- Orbit externe r=222px -->
            <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="BAM Compliance"><i class="fal fa-shield-alt"></i></div></div>
            <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="P&L Dashboard"><i class="fal fa-chart-pie"></i></div></div>
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
      <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="85">0</span><span class="suf">ms</span></div><div class="sh-stat-lbl">Execution latency</div><div class="sh-stat-sub">Telegram signals to broker</div></div>
      <div class="sh-stat rv"><div class="sh-stat-val"><span class="suf">÷</span><span class="sh-counter" data-target="4">0</span></div><div class="sh-stat-lbl">Reconciliation time</div><div class="sh-stat-sub">Accelerated accounting</div></div>
      <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="98">0</span><span class="suf">%</span></div><div class="sh-stat-lbl">OCR accuracy</div><div class="sh-stat-sub">Receipt &amp; invoice extraction</div></div>
      <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="3">0</span><span class="suf">m</span></div><div class="sh-stat-lbl">Achievable ROI</div><div class="sh-stat-sub">Return on investment</div></div>
    </div>
  </div>
</section>

<!-- ══ CONTEXTE & ENJEUX ════════════════════════════════════════ -->
<section class="sh-context">
  <div class="container">
    <div class="sh-context-inner">

      <div>
        <div class="sec-label">Context &amp; Challenges</div>
        <h2 class="sh-ctx-title rv"><strong>Financial Sector</strong>Latency is enemy number one</h2>
        <div class="sh-ctx-body rv d1">
          <p>In the world of finance and trading, latency is the enemy. Whether it's processing market signals (Forex, Gold) or automating heavy internal accounting workflows, institutions demand <em>absolute security</em>, millisecond execution speed and flawless reliability.</p>
          <p>In Morocco, the Forex market via international brokers (XM, IC Markets) is booming, driven by an active Telegram community. On the corporate side, the CFO's office is under pressure to make accounting more reliable and shorten closing timelines.</p>
        </div>
        <div class="sh-pills rv d2">
          <span class="sh-pill"><i class="fa fa-bolt"></i> Sub-100ms execution</span>
          <span class="sh-pill"><i class="fa fa-shield-halved"></i> BAM compliance</span>
          <span class="sh-pill"><i class="fa fa-calculator"></i> Accounting OCR</span>
          <span class="sh-pill"><i class="fab fa-telegram"></i> Telegram integration</span>
        </div>
      </div>

      <!-- CSS ART Visual -->
      <div class="sh-ctx-visual rv d2">
        <div class="sh-ctx-blob"></div>
        <div class="sh-ctx-blob2"></div>
        <div class="sh-ctx-center"><div class="sh-ctx-cross"><i class="fal fa-chart-line"></i></div></div>
        <div class="sh-fcard fc1">
          <div class="sh-fcard-val">&lt;100ms</div>
          <div class="sh-fcard-lbl">Exec. latency</div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">24/7</div>
          <div class="sh-fcard-lbl">Monitoring</div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">98%</div>
          <div class="sh-fcard-lbl">OCR accuracy</div>
        </div>
        <div class="sh-fcard fc4">
          <div class="sh-fcard-val">÷4</div>
          <div class="sh-fcard-lbl">Reconciliation</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════ SOLUTIONS ═══════ -->
<section class="sh-solutions" id="solutions">
  <div class="container">
    <div class="sec-label">AI Solutions · Financial Automation</div>
    <h2 class="sec-title rv">Finance AI Suite<br><em>4 operational agents</em></h2>
    <div class="sol-kpi-grid rv d1">
      <div class="sol-kpi-card"><div class="sol-kpi-val">&lt;100<span style="font-size:.6em">ms</span></div><div class="sol-kpi-lbl">Execution latency</div></div>
      <div class="sol-kpi-card"><div class="sol-kpi-val">24/7</div><div class="sol-kpi-lbl">Market monitoring</div></div>
      <div class="sol-kpi-card"><div class="sol-kpi-val">98<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">OCR accuracy</div></div>
      <div class="sol-kpi-card"><div class="sol-kpi-val">0</div><div class="sol-kpi-lbl">Accounting errors</div></div>
    </div>
    <div class="sol-feature rv">
      <div class="sol-fc-text">
        <div class="sol-fc-title"><strong>Signal + Execution Agent</strong>Forex &amp; Gold processing from Telegram</div>
        <p class="sol-fc-desc">An autonomous agent that parses premium signals, extracts critical parameters (TP, SL, volume) and executes on MetaTrader or cTrader in under 100ms.</p>
        <ul class="sol-benefits">
          <li><i class="fa fa-check"></i><span><strong>Instant Telegram signal parsing</strong> — normalization into executable format, TP/SL/volume extraction</span></li>
          <li><i class="fa fa-check"></i><span><strong>Broker API routing</strong> — direct connection to MetaTrader MT4/MT5 and cTrader with real-time confirmation</span></li>
          <li><i class="fa fa-check"></i><span><strong>Market sentiment alerts</strong> — 24/7 macroeconomic monitoring, RSS aggregation and NLP to anticipate movements</span></li>
          <li><i class="fa fa-check"></i><span><strong>OCR + automatic accounting</strong> — receipts scanned, categorized and injected into Sage/Odoo with no human intervention</span></li>
          <li><i class="fa fa-check"></i><span><strong>Consolidated P&amp;L dashboard</strong> — automatic daily summary, weekly report sent to the CFO</span></li>
          <li><i class="fa fa-check"></i><span><strong>Emergency kill switch</strong> — immediate closure of all positions in 1 click, full traceability</span></li>
        </ul>
        <div class="sol-roi-box">
          <div class="sol-roi-num">2</div>
          <div class="sol-roi-text"><strong>Accounting FTEs saved for a 50-person SME.</strong><br>ROI achievable in under 3 months. 100% reliability on programmed orders.</div>
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
                    <div class="tg-hdr-status">Channel · 4,892 subscribers</div>
                  </div>
                  <div class="tg-hdr-ico">
                    <i class="fa fa-magnifying-glass"></i>
                    <i class="fa fa-ellipsis-vertical"></i>
                  </div>
                </div>
                <!-- Chat -->
                <div class="tg-chat">
                  <div class="tg-msg sys">Today · 09:14</div>

                  <!-- Signal message -->
                  <div class="tg-signal">
                    <div class="tg-signal-header">VIP Premium Signal</div>
                    <div class="tg-signal-pair">EUR/USD &nbsp;<span class="dir">BUY</span></div>
                    <div class="tg-signal-row">Entry &nbsp;<span>1.08742</span></div>
                    <div class="tg-signal-row">Take Profit &nbsp;<span style="color:#4ade80">1.09120</span></div>
                    <div class="tg-signal-row">Stop Loss &nbsp;<span style="color:#f87171">1.08300</span></div>
                    <div class="tg-signal-row">Lot &nbsp;<span>0.50</span></div>
                    <div class="tg-signal-tag">⚡ Parsing Agent HW · OK</div>
                    <span class="tg-bt">09:14</span>
                  </div>

                  <div class="tg-msg sys">Agent HW · Execution in progress…</div>

                  <!-- Execution confirmation -->
                  <div class="tg-exec">
                    <div class="tg-exec-head">Order executed · MetaTrader</div>
                    <div class="tg-exec-body">
                      EUR/USD · BUY · <strong>0.50 lot</strong><br>
                      Latency: <strong>83ms</strong><br>
                      Open P&amp;L: <strong>+$0.00</strong>
                    </div>
                    <span class="tg-bt">09:14</span>
                  </div>

                  <div class="tg-msg sys">XAU/USD · Signal received · 09:16</div>
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
                  <div class="tg-notif-st">MetaTrader · Online</div>
                </div>
              </div>
              <div class="tg-notif-msg">Execution confirmed •<br>EUR/USD BUY 0.50</div>
              <div class="tg-notif-sub">Latency: <span class="lat">83ms</span> &nbsp;·&nbsp; TP active</div>
              <div class="tg-notif-acts">
                <div class="tg-notif-act">CLOSE</div>
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
    <img id="jpImg" class="jp-img" src="<?php echo $siteURL; ?>/images/finance-journey-bg.jpg" alt="Finance AI trading room" loading="eager">
  </div>
  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Typical customer journey</div>
      <h2 class="sec-title rv">From Telegram signal<br><em>to accounting close</em></h2>
      <p class="rv d1">Two automated flows running in parallel: real-time trading and friction-free accounting. Choose your priority.</p>
      <div class="tab-nav rv d2">
        <button class="tab-btn active" data-tab="trading">Trading Flow</button>
        <button class="tab-btn" data-tab="compta">Accounting Flow</button>
        <button class="tab-btn" data-tab="reporting">CFO Reporting</button>
      </div>

      <div class="tab-pane active" id="tab-trading">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamT"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Premium Signal</div><p class="jf-desc">Signal received on a certified premium provider's VIP Telegram channel</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">AI Parsing</div><p class="jf-desc">Instant extraction of TP, SL, instrument and volume parameters</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Broker Execution</div><p class="jf-desc">Order sent to the MetaTrader/cTrader API in under 100ms</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Confirmation</div><p class="jf-desc">Execution confirmation sent back to a private Telegram channel</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Real-Time P&amp;L</div><p class="jf-desc">Immediate update of the P&amp;L dashboard with the active position</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Daily Summary</div><p class="jf-desc">Consolidated daily report automatically sent to the CFO</p></div>
        </div>
      </div>

      <div class="tab-pane" id="tab-compta">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamC"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Receipt Scan</div><p class="jf-desc">Photo of the receipt taken on mobile or invoice received by email</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">OCR &amp; Extraction</div><p class="jf-desc">Automatic extraction of amount, date, vendor and VAT</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Categorization</div><p class="jf-desc">Smart classification by cost center according to accounting rules</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Sage/Odoo Entry</div><p class="jf-desc">Automatic injection into the accounting software with no intervention</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Reconciliation</div><p class="jf-desc">Automatic bank reconciliation against the account statement</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Accelerated Close</div><p class="jf-desc">Monthly close in 2 hours instead of 2 days. Zero errors guaranteed.</p></div>
        </div>
      </div>

      <div class="tab-pane" id="tab-reporting">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamR"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">6:00 PM Collection</div><p class="jf-desc">The agent automatically collects the day's positions, P&amp;L and receipts</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Consolidation</div><p class="jf-desc">Summary of trading flows and expenses in a unified table</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">AI Analysis</div><p class="jf-desc">Identification of anomalies, trends and next-day opportunities</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">PDF Generation</div><p class="jf-desc">Executive report automatically formatted per brand guidelines</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Secure Delivery</div><p class="jf-desc">Encrypted transmission to the CFO via secure email at 7:00 AM</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Archiving</div><p class="jf-desc">BAM-compliant storage for audit and full 7-year traceability</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ INTEGRATIONS ═══════ -->
<section class="sh-integrations" id="integrations">
  <div class="container">
    <div class="sec-label">Key integrations</div>
    <h2 class="sec-title rv">Connected to your<br><em>financial ecosystem</em></h2>
    <div class="sh-int-inner">
      <div class="accordion rv d1">
        <div class="acc-item open">
          <button class="acc-trigger"><div class="acc-ico"><i class="fal fa-chart-bar"></i></div><div class="acc-lbl-wrap"><span class="acc-title">MetaTrader MT4 / MT5</span><span class="acc-sub">Real-time order execution</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Direct connection to the broker API for order execution in under 100ms. Automatic position management, trailing stop and take profit with instant confirmation in Telegram.</p></div></div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger"><div class="acc-ico"><i class="fab fa-telegram"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Telegram Bots</span><span class="acc-sub">Signal reception and notifications</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Continuous monitoring of premium channels, NLP signal parsing, automatic routing to the broker API. Real-time execution confirmation and P&L in your private channels.</p></div></div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger"><div class="acc-ico"><i class="fal fa-file-invoice-dollar"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Sage / Odoo / QuickBooks</span><span class="acc-sub">Automated OCR accounting entry</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Automatic injection of receipts and invoices via OCR with 98% accuracy. Smart categorization by cost center and bank reconciliation with no human intervention.</p></div></div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger"><div class="acc-ico"><i class="fal fa-newspaper"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Reuters / Bloomberg RSS</span><span class="acc-sub">24/7 macroeconomic monitoring</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Aggregation of financial RSS feeds, NLP market sentiment analysis, Telegram alerts ahead of major macro events (NFP, ECB, FED) to anticipate movements.</p></div></div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger"><div class="acc-ico"><i class="fal fa-credit-card"></i></div><div class="acc-lbl-wrap"><span class="acc-title">CMI / Stripe Connect</span><span class="acc-sub">Moroccan payment gateways</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button>
          <div class="acc-body"><div class="acc-content"><p>Integration of CMI (Morocco) and Stripe Connect payment gateways to track incoming and outgoing financial flows with automatic reconciliation.</p></div></div>
        </div>
      </div>
      <div class="sh-int-visual rv d2">
        <div class="sh-int-card">
          <img class="sh-int-card-img" src="<?php echo $siteURL; ?>images/finance-journey-bg.jpg" alt="Finance ecosystem">
          <div class="sh-int-card-body">
            <div class="sh-int-card-title">BAM-secured architecture</div>
            <p class="sh-int-card-desc">All our integrations comply with Bank Al-Maghrib's regulatory requirements. Sovereign hosting or private cloud based on your compliance constraints. Security audit included from phase 1.</p>
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
      <div class="sec-label">Deployment tailored to Finance</div>
      <h2 class="sec-title rv">Phased methodology<br><em>BAM-certified</em></h2>
      <p class="sdtl-intro rv d1">A structured approach designed to protect your financial flows from day one. Full validation in paper trading before any real capital commitment.</p>
    </div>
    <div class="sdtl-timeline" id="sdtlTimeline">
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Security &amp; Compliance Audit</div>
            <p class="sdtl-desc">Mapping of financial flows, identification of BAM regulatory constraints, choice of sovereign hosting or private cloud.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>BAM compliance report</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Validated secure architecture</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Financial flow mapping</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">WEEKS 1 – 2</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-shield-alt"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Compliance</div></div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword">Pilot</div></div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-flask"></i></div><div class="sdtl-node-pulse"></div></div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">2</div>
            <div class="sdtl-title">Paper Trading (4 weeks)</div>
            <p class="sdtl-desc">Full validation of the pipeline with no capital commitment. Latency and reliability testing under real market conditions.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Pipeline validated with no capital</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Latency measured and optimized</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Kill switch tested and operational</span></div>
            </div>
            <span class="sdtl-tag">WEEKS 3 – 6</span>
          </div>
        </div>
      </div>

      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title">Live Capital Production</div>
            <p class="sdtl-desc">Gradual rollout with configurable risk thresholds, 24/7 monitoring and an emergency kill switch activatable in 1 click.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Financial agents operational</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Real-time P&amp;L dashboard</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Risk management manual delivered</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">WEEKS 7 – 10</span>
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
    <div class="sec-label">Client case · Success story</div>
    <h2 class="sec-title rv">Concrete results<br><em>in independent trading</em></h2>
    <div class="case-wrap rv d1">
      <div class="case-left">
        <span class="case-tag">Case study · Trading Firm · Casablanca</span>
        <h3 class="case-headline">Independent<br>trading firm</h3>
        <p class="case-ctx"><strong>4 traders</strong> relying on 3 premium Telegram channels. Time-consuming manual accounting entry process. Average execution latency of <strong>3 minutes</strong> in manual mode.</p>
        <div class="case-problem">
          <div class="case-problem-label">Problem identified</div>
          <div class="case-problem-text">Unable to scale without automation. Frequent accounting entry errors. Signals missed during standard office hours.</div>
        </div>
        <p class="case-ctx" style="margin-bottom:0">Solution deployed: Telegram execution agent + automatic expense tracking via OCR + consolidated P&L dashboard.</p>
      </div>
      <div class="case-right">
        <div class="case-results">
          <div class="result-big"><div class="result-num">85<span style="font-size:.5em">ms</span></div><div class="result-lbl">Avg. exec. latency</div></div>
          <div class="result-big"><div class="result-num">0</div><div class="result-lbl">Accounting errors</div></div>
          <div class="result-big"><div class="result-num">100<span style="font-size:.5em">%</span></div><div class="result-lbl">Reliable orders</div></div>
          <div class="result-big"><div class="result-num">&lt;3<span style="font-size:.5em">m</span></div><div class="result-lbl">ROI achieved</div></div>
        </div>
        <blockquote class="case-quote">
          Our market responsiveness is now better than that of much larger desks. The machine executes our strategy without a shred of emotional failure.
          <span class="case-quote-author">Managing Partner, Casablanca Trading Firm</span>
        </blockquote>
      </div>
    </div>
  </div>
</section>

<!-- ═══════ CTA BAND ═══════ -->
<section class="cta-band" id="cta" style="background-image:url('<?php echo $siteURL; ?>images/finance-cta-bg.jpg')">
  <div class="container">
    <div class="sec-label">Ready to take action?</div>
    <h2 class="sec-title rv">Make your operations more reliable and <br>reduce <em>manual</em> interventions</h2>
    <p class="cta-sub">Deploy AI agents to process your signals, monitor your flows, execute actions from Telegram and automate expense tracking, with a logic of performance, traceability and oversight suited to sensitive environments.</p>
    <div class="cta-btns">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Audit your financial flows" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Request a free AI audit</span></div>
          <div class="sb-knob"><i class="fal fa-search"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Test a Telegram agent" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Audit my financial flows</span></div>
          <div class="sb-knob"><i class="fab fa-telegram"></i></div>
        </a>
    </div>
  </div>
</section>

<?php else: ?>

<!-- ═══════ HERO CLAIR ═══════ -->
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>
  <div class="sh-hero-body">
    <div class="container">
      <div class="sh-hero-inner">
        <div>
          <div class="sh-breadcrumb">Solutions IA · Finance &amp; Trading</div>
          <h1 class="sh-h1"><?php echo !empty($secteur->getH1()) ? $secteur->getH1() : $secteur->getTitre(); ?></h1>
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

<?php endif; ?>

<script src="<?php echo $siteURL; ?>assets/js/secteur.js"></script>
