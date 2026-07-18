<?php if ($_SESSION['lang'] === 'en'): ?>

<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>
  <div class="sh-hero-body"><div class="container"><div class="sh-hero-inner">
    <div>
      <div class="sh-breadcrumb">AI Solutions · Organization &amp; Operations</div>
      <h1 class="sh-h1"><?php echo !empty($secteur->getH1()) ? $secteur->getH1() : $secteur->getTitre(); ?></h1>
      <p class="sh-sub">Connect your tools, streamline information flow and equip your teams with high-performing virtual assistants. Eliminate redundant tasks and bring order to your internal management.</p>
      <div class="sh-cta-row">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Optimize your operations" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Optimize your operations</span></div>
          <div class="sb-knob"><i class="fal fa-bolt"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Get the AI charter" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Get the AI charter</span></div>
          <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
        </a>
      </div>
    </div>
    <!-- ORBITAL OPS IA -->
    <div class="sh-hero-right">
      <div class="sho-scene">
        <div class="sho-ring r1"></div>
        <div class="sho-ring r2"></div>
        <div class="sho-ring r3"></div>
        <div class="sho-core">
          <div class="sho-plus"><i class="fa fa-network-wired" style="font-size:1rem"></i></div>
          <div class="sho-lbl">Ops AI</div>
        </div>
        <!-- Orbit interne r=100px -->
        <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="Slack Digest"><i class="fab fa-slack"></i></div></div>
        <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="Trello Projects"><i class="fab fa-trello"></i></div></div>
        <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Gmail AI Sorting"><i class="fal fa-envelope"></i></div></div>
        <!-- Orbit moyenne r=170px -->
        <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="Zoom Transcription"><i class="fal fa-video"></i></div></div>
        <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="WhatsApp Support"><i class="fab fa-whatsapp"></i></div></div>
        <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="Notion Base"><i class="fal fa-book-open"></i></div></div>
        <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Google Meet"><i class="fab fa-google"></i></div></div>
        <!-- Orbit externe r=222px -->
        <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="Jira / Asana"><div class="ltr">JR</div></div></div>
        <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="Microsoft Teams"><div class="ltr">MS</div></div></div>
        <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="3CX Telephony"><i class="fal fa-phone"></i></div></div>
        <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="HRIS Intranet"><i class="fal fa-users"></i></div></div>
        <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="Zoom Meeting Minutes"><i class="fal fa-file-alt"></i></div></div>
      </div>
    </div>
  </div></div></div>
</section>

<section class="sh-stats"><div class="container"><div class="sh-stats-grid">
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="50">0</span><span class="suf">%</span></div><div class="sh-stat-lbl">Follow-up meetings</div><div class="sh-stat-sub">Reduced thanks to AI digests</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="35">0</span><span class="suf">%</span></div><div class="sh-stat-lbl">Deadlines met</div><div class="sh-stat-sub">Increase across 12 active projects</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="4">0</span><span class="suf">h</span></div><div class="sh-stat-lbl">Saved per manager</div><div class="sh-stat-sub">Per week on average</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="5">0</span><span class="suf">m</span></div><div class="sh-stat-lbl">Achievable ROI</div><div class="sh-stat-sub">1 secretarial FTE reallocated</div></div>
</div></div></section>

<section class="sh-context"><div class="container"><div class="sh-context-inner">
  <div>
    <div class="sec-label">Context &amp; Challenges</div>
    <h2 class="sh-ctx-title rv"><strong>Operations in Morocco</strong>Information gets lost between tools</h2>
    <div class="sh-ctx-body rv d1">
      <p>Moroccan mid-caps and large accounts face information scattered across emails, Trello, Zoom and Slack. This lack of alignment causes project delays and <em>critical data loss</em>.</p>
      <p>Integrating internal AI agents acts as a digital conductor connecting all these ecosystems. Decision traceability becomes automatic, and deadlines are met without follow-up meetings.</p>
    </div>
    <div class="sh-pills rv d2">
      <span class="sh-pill"><i class="fa fa-envelope"></i> AI Gmail Sorting</span>
      <span class="sh-pill"><i class="fab fa-trello"></i> Trello Digest</span>
      <span class="sh-pill"><i class="fa fa-microphone"></i> Auto Zoom Minutes</span>
      <span class="sh-pill"><i class="fab fa-whatsapp"></i> Internal Support</span>
    </div>
  </div>
  <div class="sh-ctx-visual rv d3">
    <div class="sh-ctx-blob"></div><div class="sh-ctx-blob2"></div>
    <div class="sh-ctx-center-wrap"><div class="sh-ctx-center"><i class="fa fa-network-wired"></i></div></div>
    <div class="sh-fcard fc1"><div class="sh-fcard-val">50%</div><div class="sh-fcard-lbl">Meetings</div></div>
    <div class="sh-fcard fc2"><div class="sh-fcard-val">4h</div><div class="sh-fcard-lbl">Saved/mgr</div></div>
    <div class="sh-fcard fc3"><div class="sh-fcard-val">100%</div><div class="sh-fcard-lbl">Minutes tracked</div></div>
    <div class="sh-fcard fc4"><div class="sh-fcard-val">5m</div><div class="sh-fcard-lbl">ROI</div></div>
  </div>
</div></div></section>

<section class="sh-solutions" id="solutions"><div class="container">
  <div class="sec-label">Internal Coordination Agents</div>
  <h2 class="sec-title rv">Five agents,<br><em>a friction-free office</em></h2>
  <div class="sol-kpi-grid rv d1">
    <div class="sol-kpi-card"><div class="sol-kpi-val">50<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">Fewer meetings</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">100<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">Centralized minutes</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">4<span style="font-size:.6em">h</span></div><div class="sol-kpi-lbl">Saved/manager</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">+35<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">Deadlines met</div></div>
  </div>
  <div class="sol-feature rv">
    <div class="sol-fc-text">
      <div class="sol-fc-title"><strong>AI Coordination Suite</strong>Gmail · Trello · Slack · Zoom · WhatsApp</div>
      <p class="sol-fc-desc">Five interconnected agents that sort your emails, digest your projects, transcribe your meetings and respond to your teams in real time. Zero information lost.</p>
      <ul class="sol-benefits">
        <li><i class="fa fa-check"></i><span><strong>Gmail sorting &amp; urgent alerts</strong> — detection of critical emails (VIP clients, disputes), instant Slack notification with a draft reply</span></li>
        <li><i class="fa fa-check"></i><span><strong>Daily Trello digest</strong> — consolidated project status, today's deadlines on Slack every morning at 8am with red alerts on delays</span></li>
        <li><i class="fa fa-check"></i><span><strong>Analytical Zoom transcription</strong> — automatic minutes in 2 minutes, action items extracted and assigned, Trello cards created instantly</span></li>
        <li><i class="fa fa-check"></i><span><strong>Internal WhatsApp support</strong> — conversational HR/IT assistant available 24/7, automatic escalation for complex cases</span></li>
        <li><i class="fa fa-check"></i><span><strong>Trello activity summary</strong> — daily narrative report per board sent to management, delays identified and flagged proactively</span></li>
      </ul>
      <div class="sol-roi-box">
        <div class="sol-roi-num">1</div>
        <div class="sol-roi-text"><strong>Executive secretarial FTE saved.</strong><br>4h/week gained per manager. ROI reached in 5 months. Internal satisfaction +12 points.</div>
      </div>
    </div>
    <div class="sol-fc-visual">
      <div class="slk" style="width:320px">
        <div class="slk-head"><div class="slk-ico"><i class="fab fa-slack"></i></div><span class="slk-channel">#zoom-meeting-notes</span></div>
        <div class="slk-body">
          <div class="slk-msg"><div class="slk-avatar bot">HW</div><div class="slk-msg-content"><div class="slk-msg-author">HW Agent <span>Now</span></div><div class="slk-msg-text"><strong>Management Meeting Minutes · 4:00 PM</strong></div><div class="slk-alert"><div class="slk-alert-txt"><span class="slk-dot"></span>3 decisions made · 5 action items created · 2 Trello cards assigned</div></div></div></div>
          <div class="slk-msg" style="margin-top:.4rem"><div class="slk-avatar bot">HW</div><div class="slk-msg-content"><div class="slk-msg-author">Action items <span>automatic</span></div><div class="slk-msg-text"><strong style="color:#4ade80">@Karim</strong> — Client mockup delivery · Friday<br><strong style="color:#4ade80">@Nadia</strong> — Q3 finance report · Monday morning<br><strong style="color:#f87171">@Mouad</strong> — Urgent: contract to sign</div></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


<!-- ══ PARCOURS CLIENT — IMAGE PARALLAX + BEAM PROGRESSIF ════════ -->
<section class="sh-journey" id="parcours">

  <div class="jp-bg">
    <img id="jpImg" class="jp-img"
         src="<?php echo $siteURL; ?>images/operations-sector.jpeg"
         alt="Modern office Morocco"
         loading="eager"
         decoding="async"
         width="1584" height="672">
  </div>

  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Typical customer journey</div>
      <h2 class="sec-title rv">Customer experience<br><em>from A to Z</em></h2>
      <p class="rv d1">Three entry channels, one unified experience. Choose the journey that matches your business.</p>

      <div class="tab-nav rv d2">
        <button class="tab-btn active" data-tab="wa">Via WhatsApp</button>
        <button class="tab-btn" data-tab="qr">Via Table QR Code</button>
        <button class="tab-btn" data-tab="web">Via Delivery</button>
      </div>

      <!-- Tab 1: WhatsApp -->
      <div class="tab-pane active" id="tab-wa">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWa"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">WhatsApp message</div><p class="jf-desc">Customer sends a message to the business's WhatsApp number</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Dynamic menu</div><p class="jf-desc">The AI displays the interactive menu with photos, allergens and daily suggestions</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Automatic upsell</div><p class="jf-desc">Drinks and desserts suggested based on the customer's order</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Secure payment</div><p class="jf-desc">CMI/Stripe link generated within the WhatsApp conversation in 1 click</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Kitchen ticket</div><p class="jf-desc">Automatically sent to the POS (Clyo/Micros) with no manual re-entry</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Pickup notification</div><p class="jf-desc">Customer notified for pickup or real-time GPS delivery tracking</p></div>
        </div>
      </div>

      <!-- Tab 2: QR Code Table -->
      <div class="tab-pane" id="tab-qr">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamQr"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Table QR code</div><p class="jf-desc">Customer scans the QR code displayed on their table or at the entrance</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Digital menu</div><p class="jf-desc">Interactive menu with photos, prices and allergens appears instantly</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">In-store order</div><p class="jf-desc">Selection and customization (gluten-free, dairy-free, spicy…)</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Drink upsell</div><p class="jf-desc">Automatic drink and dessert suggestions based on the dishes ordered</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Kitchen validation</div><p class="jf-desc">Order sent instantly to the kitchen POS, with no manual re-entry</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Google review</div><p class="jf-desc">Automatic satisfaction rating request after the meal via SMS/WhatsApp</p></div>
        </div>
      </div>

      <!-- Tab 3: Livraison -->
      <div class="tab-pane" id="tab-web">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWeb"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Order received</div><p class="jf-desc">Via Glovo, Uber Eats or direct WhatsApp — centralized in a single flow</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">AI confirmation</div><p class="jf-desc">Estimated preparation time automatically communicated to the customer</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">POS preparation</div><p class="jf-desc">Order slip sent to the kitchen via POS in real time with no manual re-entry</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Driver dispatch</div><p class="jf-desc">Automatic assignment to the nearest available partner driver</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">GPS tracking</div><p class="jf-desc">Customer notified at every delivery stage with real-time position</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Loyalty &amp; reviews</div><p class="jf-desc">Satisfaction rating requested, loyalty offer sent automatically</p></div>
        </div>
      </div>

    </div>
  </div>
</section>

<!--
<section class="sh-journey" id="parcours">
  <div class="jp-bg"><img id="jpImg" class="jp-img" src="<?php echo $siteURL; ?>images/operations-journey-bg.jpg" alt="Bureau coordination moderne" loading="eager"></div>
  <div class="jp-content"><div class="container">
    <div class="sec-label">Parcours client typique</div>
    <h2 class="sec-title rv">D'une réunion Zoom<br><em>aux cartes Trello créées</em></h2>
    <p class="rv d1" style="font-size:.9rem;color:var(--txt2);max-width:580px;line-height:1.9;font-weight:300;margin-bottom:0">Trois flux automatisés qui traitent vos réunions, vos projets et vos communications internes sans intervention humaine.</p>
    <div class="tab-nav rv d2">
      <button class="tab-btn active" data-tab="zoom">Flux Réunion</button>
      <button class="tab-btn" data-tab="trello">Flux Projets</button>
      <button class="tab-btn" data-tab="support">Flux Support</button>
    </div>
    <div class="tab-pane active" id="tab-zoom"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Fin de Réunion</div><p class="jf-desc">La réunion Zoom se termine, l'enregistrement est automatiquement transmis à l'agent</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Transcription IA</div><p class="jf-desc">Transcription intégrale en 2 minutes, identification des locuteurs et des décisions</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Extraction Items</div><p class="jf-desc">Action items identifiés et attribués nominativement aux collaborateurs cités</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Cartes Trello</div><p class="jf-desc">Création automatique des cartes avec deadlines extraites de la conversation</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Notif Slack</div><p class="jf-desc">Résumé exécutif et liens d'action envoyés à chaque participant sur Slack</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Archivage Notion</div><p class="jf-desc">CR structuré archivé dans Notion, base de connaissances enrichie automatiquement</p></div>
    </div></div>
    <div class="tab-pane" id="tab-trello"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Scan 7h30</div><p class="jf-desc">L'agent analyse automatiquement tous les boards Trello et tickets Jira actifs</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Détection Retards</div><p class="jf-desc">Identification des cartes en retard ou à risque avec calcul du délai de dépassement</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Alertes Rouge</div><p class="jf-desc">Notification Slack immédiate aux responsables des tâches critiques identifiées</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Digest 8h00</div><p class="jf-desc">Récapitulatif des deadlines du jour envoyé à chaque manager sur son canal Slack</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Rapport Narratif</div><p class="jf-desc">Synthèse hebdomadaire de l'avancement par projet transmise à la direction vendredi</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Tableau de Bord</div><p class="jf-desc">Dashboard coordination mis à jour en temps réel, accessible à tous les managers</p></div>
    </div></div>
    <div class="tab-pane" id="tab-support"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Question Collaborateur</div><p class="jf-desc">Un employé envoie une question RH ou IT sur WhatsApp Business interne 24/7</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Classification IA</div><p class="jf-desc">Catégorisation automatique de la demande (RH, IT, procédure, urgence)</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Réponse Instantanée</div><p class="jf-desc">L'agent répond en moins de 30 secondes depuis la base de connaissances SIRH</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Escalade si Besoin</div><p class="jf-desc">Transfert automatique aux équipes humaines pour les cas complexes hors périmètre</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Suivi Ticket</div><p class="jf-desc">Création d'un ticket de suivi si la résolution nécessite une action manuelle</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Satisfaction Mesurée</div><p class="jf-desc">Enquête de satisfaction automatique après résolution pour amélioration continue</p></div>
    </div></div>
  </div></div>
</section>
-->

<section class="sh-integrations" id="integrations"><div class="container">
  <div class="sec-label">Key integrations</div>
  <h2 class="sec-title rv">Connected to your<br><em>organizational ecosystem</em></h2>
  <div class="sh-int-inner">
    <div class="accordion rv d1">
      <div class="acc-item open"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-google"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Google Workspace / Office 365</span><span class="acc-sub">Gmail, Drive, Calendar, Teams</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Automatic Gmail sorting with priority email detection, Calendar integration for meeting reminders, and Drive for archiving the minutes generated by the agent.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-trello"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Trello / Jira / Asana</span><span class="acc-sub">Automated project management</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Automatic card creation from Zoom meetings, two-way status synchronization, Slack alerts on overdue deadlines and a daily digest for each manager.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-slack"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Slack / Microsoft Teams</span><span class="acc-sub">Agent communication hub</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Central channel receiving all agent alerts, summaries and notifications. Each team member receives only the information relevant to their scope of action.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fa fa-video"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Zoom / Google Meet / IP Telephony</span><span class="acc-sub">Transcription and analytical extraction</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Automatic transcription via the Zoom or Google Meet API. Also compatible with IP telephony systems (3CX, Genesys) for call centers and sales teams.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-whatsapp"></i></div><div class="acc-lbl-wrap"><span class="acc-title">WhatsApp Business / Notion / HRIS</span><span class="acc-sub">Internal support and knowledge base</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Conversational support agent connected to the Notion knowledge base and the HRIS to answer HR and IT questions. Usage charter defined with HR and IT departments.</p></div></div></div>
    </div>
    <div class="sh-int-visual rv d2"><div class="sh-int-card">
      <img class="sh-int-card-img" src="<?php echo $siteURL; ?>images/secteur/<?= $secteur->getPhoto() ?>" alt="Casablanca office">
      <div class="sh-int-card-body">
        <div class="sh-int-card-title">Architecture validated by HR and IT</div>
        <p class="sh-int-card-desc">Every deployment begins with a full organizational audit with HR and IT. Governance constraints identified, API access validated and an AI usage charter defined before any technical work starts.</p>
      </div>
    </div></div>
  </div>
</div></section>

<section class="sdtl-section" id="deploiement">
  <div class="sdtl-orb-wrap"><div class="sdtl-orb" id="sdtlOrb"><div class="sdtl-orb-ring r1"></div><div class="sdtl-orb-ring r2"></div><div class="sdtl-orb-ring r3"></div><div class="sdtl-orb-ring r4"></div></div></div>
  <div class="container"><div class="sdtl-header">
    <div class="sec-label">Deployment tailored to Operations</div>
    <h2 class="sec-title rv">Phased methodology<br><em>validated by HR and IT</em></h2>
    <p class="sdtl-intro rv d1">A structured deployment starting with an organizational audit to guarantee adoption and traceability. Your pilot team validates each agent before scaling up.</p>
  </div>
  <div class="sdtl-timeline" id="sdtlTimeline">
    <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-glass">
        <div class="sdtl-num">1</div><div class="sdtl-title">Organizational Audit</div>
        <p class="sdtl-desc">Mapping of existing tools, identification of silos, validation of API access and governance constraints with HR and IT.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><span>Internal flow mapping</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>API access validated with IT</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>AI governance charter defined</span><i class="fa fa-circle"></i></div></div>
        <span class="sdtl-tag">WEEKS 1 – 2</span>
      </div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-sitemap"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Audit</div></div>
    </div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword">Pilot</div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-users"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-glass">
        <div class="sdtl-num">2</div><div class="sdtl-title">HR + Projects Pilot</div>
        <p class="sdtl-desc">Rollout to HR teams and project managers over 6 weeks. Calibration of summaries and alert thresholds based on user feedback.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><i class="fa fa-circle"></i><span>5 agents active and calibrated</span></div><div class="sdtl-li"><i class="fa fa-circle"></i><span>Alert thresholds adjusted</span></div><div class="sdtl-li"><i class="fa fa-circle"></i><span>Team feedback collected</span></div></div>
        <span class="sdtl-tag">WEEKS 3 – 6</span>
      </div></div>
    </div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-glass">
        <div class="sdtl-num">3</div><div class="sdtl-title">Multi-Team Rollout</div>
        <p class="sdtl-desc">Deployment across all departments, change management support, training for managers and executive secretaries. AI usage charter defined.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><span>AI usage charter deployed</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>100% of managers trained</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>24/7 support included for 3 months</span><i class="fa fa-circle"></i></div></div>
        <span class="sdtl-tag">WEEKS 7 – 10</span>
      </div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-building"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Scale</div></div>
    </div>
  </div></div>
</section>

<section class="sh-case" id="cas-client"><div class="container">
  <div class="sec-label">Client case · Success story</div>
  <h2 class="sec-title rv">Concrete results<br><em>at a B2B services group</em></h2>
  <div class="case-wrap rv d1">
    <div class="case-left">
      <span class="case-tag">Case study · B2B Group · Casablanca</span>
      <h3 class="case-headline">B2B services group<br>Casablanca</h3>
      <p class="case-ctx"><strong>180 employees</strong>, 12 active Trello projects, 4 management meetings per week. CEO overwhelmed by emails and follow-up reminders.</p>
      <div class="case-problem"><div class="case-problem-label">Problem identified</div><div class="case-problem-text">Decisions made in meetings were never tracked. Deadlines discovered too late. Managers spending 30% of their time on administrative follow-up tasks.</div></div>
      <p class="case-ctx" style="margin-bottom:0">Full suite of HW internal agents deployed: Slack digest, Zoom analysis, CEO Gmail sorting and internal IT support on WhatsApp for 180 employees.</p>
    </div>
    <div class="case-right" style="background-image:url('<?php echo $siteURL; ?>images/operations-case-bg.jpg')">
      <div class="case-results">
        <div class="result-big"><div class="result-num">65<span style="font-size:.5em">%</span></div><div class="result-lbl">CEO email time</div></div>
        <div class="result-big"><div class="result-num">+28<span style="font-size:.5em">%</span></div><div class="result-lbl">Deadlines met</div></div>
        <div class="result-big"><div class="result-num">+12</div><div class="result-lbl">Internal satisfaction</div></div>
        <div class="result-big"><div class="result-num">5<span style="font-size:.5em">m</span></div><div class="result-lbl">ROI achieved</div></div>
      </div>
      <blockquote class="case-quote">AI has brought order to our internal management. My managers have regained control of their schedules and their decisions are finally tracked.<span class="case-quote-author">CEO, Casablanca</span></blockquote>
    </div>
  </div>
</div></section>

<section class="cta-band" id="cta" style="background-image:url('<?php echo $siteURL; ?>images/para.jpg')">
  <div class="container">
    <div class="sec-label">Ready to take action?</div>
    <h2 class="sec-title rv">Improve coordination and <br>reduce <br><em>operational</em> friction</h2>
    <p class="cta-sub">Connect your internal tools to automate summaries, alerts, deadline tracking, conversation analysis and team assistance — to gain visibility, execution speed and operational discipline.</p>
    <div class="cta-btns">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Optimize your internal operations" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Request a free AI audit</span></div>
          <div class="sb-knob"><i class="fal fa-bolt"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Get the AI usage charter" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Optimize my internal operations</span></div>
          <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
        </a>
    </div>
  </div>
</section>

<?php elseif ($_SESSION['lang'] === 'ar'): ?>

<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>
  <div class="sh-hero-body"><div class="container"><div class="sh-hero-inner">
    <div>
      <div class="sh-breadcrumb">حلول الذكاء الاصطناعي · التنظيم والعمليات</div>
      <h1 class="sh-h1"><?php echo !empty($secteur->getH1()) ? $secteur->getH1() : $secteur->getTitre(); ?></h1>
      <p class="sh-sub">اربطوا أدواتكم، وسهّلوا تدفق المعلومات، وزوّدوا موظفيكم بمساعدين افتراضيين فعّالين. ألغوا المهام المتكررة وهدّئوا إدارتكم الداخلية.</p>
      <div class="sh-cta-row">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="حسّنوا عملياتكم" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">حسّنوا عملياتكم</span></div>
          <div class="sb-knob"><i class="fal fa-bolt"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="احصلوا على ميثاق الذكاء الاصطناعي" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">احصلوا على ميثاق الذكاء الاصطناعي</span></div>
          <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
        </a>
      </div>
    </div>
    <!-- ORBITAL OPS IA -->
    <div class="sh-hero-right">
      <div class="sho-scene">
        <div class="sho-ring r1"></div>
        <div class="sho-ring r2"></div>
        <div class="sho-ring r3"></div>
        <div class="sho-core">
          <div class="sho-plus"><i class="fa fa-network-wired" style="font-size:1rem"></i></div>
          <div class="sho-lbl">العمليات بالذكاء الاصطناعي</div>
        </div>
        <!-- Orbit interne r=100px -->
        <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="ملخص Slack"><i class="fab fa-slack"></i></div></div>
        <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="مشاريع Trello"><i class="fab fa-trello"></i></div></div>
        <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="فرز Gmail الذكي"><i class="fal fa-envelope"></i></div></div>
        <!-- Orbit moyenne r=170px -->
        <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="تفريغ نصي Zoom"><i class="fal fa-video"></i></div></div>
        <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="دعم WhatsApp"><i class="fab fa-whatsapp"></i></div></div>
        <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="قاعدة Notion"><i class="fal fa-book-open"></i></div></div>
        <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Google Meet"><i class="fab fa-google"></i></div></div>
        <!-- Orbit externe r=222px -->
        <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="Jira / Asana"><div class="ltr">JR</div></div></div>
        <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="Microsoft Teams"><div class="ltr">MS</div></div></div>
        <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="هاتفة 3CX"><i class="fal fa-phone"></i></div></div>
        <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="إنترانت SIRH"><i class="fal fa-users"></i></div></div>
        <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="محضر اجتماع Zoom"><i class="fal fa-file-alt"></i></div></div>
      </div>
    </div>
  </div></div></div>
</section>

<section class="sh-stats"><div class="container"><div class="sh-stats-grid">
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="50">0</span><span class="suf">%</span></div><div class="sh-stat-lbl">اجتماعات المتابعة</div><div class="sh-stat-sub">مخفَّضة بفضل ملخصات الذكاء الاصطناعي</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="35">0</span><span class="suf">%</span></div><div class="sh-stat-lbl">المواعيد النهائية المُحترَمة</div><div class="sh-stat-sub">ارتفاع على 12 مشروعاً نشطاً</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="4">0</span><span class="suf">h</span></div><div class="sh-stat-lbl">ساعات موفَّرة لكل مدير</div><div class="sh-stat-sub">أسبوعياً في المتوسط</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="5">0</span><span class="suf">أشهر</span></div><div class="sh-stat-lbl">عائد الاستثمار القابل للتحقيق</div><div class="sh-stat-sub">وظيفة سكرتارية بدوام كامل أُعيد توجيهها</div></div>
</div></div></section>

<section class="sh-context"><div class="container"><div class="sh-context-inner">
  <div>
    <div class="sec-label">السياق والتحديات</div>
    <h2 class="sh-ctx-title rv"><strong>العمليات في المغرب</strong>المعلومات تضيع بين الأدوات</h2>
    <div class="sh-ctx-body rv d1">
      <p>تواجه الشركات المتوسطة والكبيرة المغربية تشتت المعلومات بين البريد الإلكتروني وTrello وZoom وSlack. يؤدي هذا النقص في التنسيق إلى تأخيرات في المشاريع و<em>فقدان بيانات حرجة</em>.</p>
      <p>يعمل دمج وكلاء الذكاء الاصطناعي الداخليين كقائد أوركسترا رقمي يربط جميع هذه المنظومات. يصبح تتبع القرارات تلقائياً، وتُحتَرم المواعيد النهائية دون الحاجة لاجتماعات متابعة.</p>
    </div>
    <div class="sh-pills rv d2">
      <span class="sh-pill"><i class="fa fa-envelope"></i> فرز Gmail الذكي</span>
      <span class="sh-pill"><i class="fab fa-trello"></i> ملخص Trello</span>
      <span class="sh-pill"><i class="fa fa-microphone"></i> محضر Zoom تلقائي</span>
      <span class="sh-pill"><i class="fab fa-whatsapp"></i> دعم داخلي</span>
    </div>
  </div>
  <div class="sh-ctx-visual rv d3">
    <div class="sh-ctx-blob"></div><div class="sh-ctx-blob2"></div>
    <div class="sh-ctx-center-wrap"><div class="sh-ctx-center"><i class="fa fa-network-wired"></i></div></div>
    <div class="sh-fcard fc1"><div class="sh-fcard-val">50%</div><div class="sh-fcard-lbl">الاجتماعات</div></div>
    <div class="sh-fcard fc2"><div class="sh-fcard-val">4h</div><div class="sh-fcard-lbl">ساعات موفَّرة/مدير</div></div>
    <div class="sh-fcard fc3"><div class="sh-fcard-val">100%</div><div class="sh-fcard-lbl">محاضر موثَّقة</div></div>
    <div class="sh-fcard fc4"><div class="sh-fcard-val">5m</div><div class="sh-fcard-lbl">عائد الاستثمار</div></div>
  </div>
</div></div></section>

<section class="sh-solutions" id="solutions"><div class="container">
  <div class="sec-label">وكلاء التنسيق الداخلي</div>
  <h2 class="sec-title rv">خمسة وكلاء،<br><em>مكتب بلا احتكاك</em></h2>
  <div class="sol-kpi-grid rv d1">
    <div class="sol-kpi-card"><div class="sol-kpi-val">50<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">اجتماعات مخفَّضة</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">100<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">محاضر مركزية</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">4<span style="font-size:.6em">h</span></div><div class="sol-kpi-lbl">ساعات موفَّرة/مدير</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">+35<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">مواعيد نهائية محترمة</div></div>
  </div>
  <div class="sol-feature rv">
    <div class="sol-fc-text">
      <div class="sol-fc-title"><strong>مجموعة التنسيق بالذكاء الاصطناعي</strong>Gmail · Trello · Slack · Zoom · WhatsApp</div>
      <p class="sol-fc-desc">خمسة وكلاء مترابطين يفرزون بريدكم الإلكتروني، ويلخّصون مشاريعكم، ويفرّغون اجتماعاتكم نصياً، ويردون على فرقكم في الوقت الفعلي. صفر معلومات ضائعة.</p>
      <ul class="sol-benefits">
        <li><i class="fa fa-check"></i><span><strong>فرز Gmail وتنبيهات عاجلة</strong> — اكتشاف الرسائل الحرجة (عملاء VIP، نزاعات)، إشعار فوري على Slack مع مسودة رد</span></li>
        <li><i class="fa fa-check"></i><span><strong>ملخص Trello اليومي</strong> — حالة المشاريع موحَّدة، المواعيد النهائية لليوم على Slack كل صباح الساعة 8:00 مع تنبيهات حمراء عند التأخير</span></li>
        <li><i class="fa fa-check"></i><span><strong>تفريغ Zoom تحليلي</strong> — محضر تلقائي خلال دقيقتين، مهام مستخرَجة ومُسنَدة، بطاقات Trello تُنشَأ فوراً</span></li>
        <li><i class="fa fa-check"></i><span><strong>دعم داخلي عبر WhatsApp</strong> — مساعد موارد بشرية/تقنية معلومات تعاملي متاح على مدار الساعة، تصعيد تلقائي للحالات المعقدة</span></li>
        <li><i class="fa fa-check"></i><span><strong>ملخص نشاط Trello</strong> — تقرير سردي يومي لكل لوحة يُرسَل إلى الإدارة، تأخيرات محدَّدة ومُبلَّغ عنها استباقياً</span></li>
      </ul>
      <div class="sol-roi-box">
        <div class="sol-roi-num">1</div>
        <div class="sol-roi-text"><strong>وظيفة سكرتارية إدارية موفَّرة.</strong><br>توفير 4 ساعات أسبوعياً لكل مدير. عائد استثمار خلال 5 أشهر. رضا داخلي +12 نقطة.</div>
      </div>
    </div>
    <div class="sol-fc-visual">
      <div class="slk" style="width:320px">
        <div class="slk-head"><div class="slk-ico"><i class="fab fa-slack"></i></div><span class="slk-channel">#محضر-اجتماع-zoom</span></div>
        <div class="slk-body">
          <div class="slk-msg"><div class="slk-avatar bot">HW</div><div class="slk-msg-content"><div class="slk-msg-author">وكيل HW <span>الآن</span></div><div class="slk-msg-text"><strong>محضر اجتماع الإدارة · 16:00</strong></div><div class="slk-alert"><div class="slk-alert-txt"><span class="slk-dot"></span>3 قرارات متخذة · 5 مهام أُنشئت · بطاقتا Trello مُسنَدتان</div></div></div></div>
          <div class="slk-msg" style="margin-top:.4rem"><div class="slk-avatar bot">HW</div><div class="slk-msg-content"><div class="slk-msg-author">المهام <span>تلقائية</span></div><div class="slk-msg-text"><strong style="color:#4ade80">@كريم</strong> — تسليم نموذج العميل · الجمعة<br><strong style="color:#4ade80">@نادية</strong> — تقرير الربع الثالث للإدارة المالية · صباح الاثنين<br><strong style="color:#f87171">@مُعاذ</strong> — عاجل: عقد بانتظار التوقيع</div></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


<!-- ══ PARCOURS CLIENT — IMAGE PARALLAX + BEAM PROGRESSIF ════════ -->
<section class="sh-journey" id="parcours">
  <div class="jp-bg"><img id="jpImg" class="jp-img" src="<?php echo $siteURL; ?>images/operations-journey-bg.jpg" alt="مكتب تنسيق حديث" loading="eager"></div>
  <div class="jp-content"><div class="container">
    <div class="sec-label">المسار النموذجي للعميل</div>
    <h2 class="sec-title rv">من اجتماع عبر Zoom<br><em>إلى بطاقات Trello المُنشأة</em></h2>
    <p class="rv d1" style="font-size:.9rem;color:var(--txt2);max-width:580px;line-height:1.9;font-weight:300;margin-bottom:0">ثلاثة تدفقات مؤتمتة تعالج اجتماعاتكم ومشاريعكم واتصالاتكم الداخلية دون تدخل بشري.</p>
    <div class="tab-nav rv d2">
      <button class="tab-btn active" data-tab="zoom">تدفق الاجتماعات</button>
      <button class="tab-btn" data-tab="trello">تدفق المشاريع</button>
      <button class="tab-btn" data-tab="support">تدفق الدعم</button>
    </div>
    <div class="tab-pane active" id="tab-zoom"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">نهاية الاجتماع</div><p class="jf-desc">ينتهي اجتماع Zoom، ويُرسَل التسجيل تلقائياً إلى الوكيل</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">تفريغ بالذكاء الاصطناعي</div><p class="jf-desc">تفريغ نصي كامل خلال دقيقتين، وتحديد المتحدثين والقرارات</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">استخراج المهام</div><p class="jf-desc">تحديد المهام وإسنادها بالاسم إلى الموظفين المذكورين</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">بطاقات Trello</div><p class="jf-desc">إنشاء تلقائي للبطاقات بمواعيد نهائية مُستخرَجة من المحادثة</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">إشعار Slack</div><p class="jf-desc">ملخص تنفيذي وروابط إجراءات تُرسَل لكل مشارك على Slack</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">أرشفة في Notion</div><p class="jf-desc">محضر منظَّم مؤرشَف في Notion، وقاعدة المعرفة تُثرى تلقائياً</p></div>
    </div></div>
    <div class="tab-pane" id="tab-trello"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">فحص الساعة 7:30</div><p class="jf-desc">يحلل الوكيل تلقائياً جميع لوحات Trello وتذاكر Jira النشطة</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">اكتشاف التأخيرات</div><p class="jf-desc">تحديد البطاقات المتأخرة أو المعرَّضة للخطر مع حساب مدة التجاوز</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">تنبيهات حمراء</div><p class="jf-desc">إشعار Slack فوري للمسؤولين عن المهام الحرجة المحدَّدة</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">ملخص الساعة 8:00</div><p class="jf-desc">ملخص المواعيد النهائية لليوم يُرسَل لكل مدير على قناته في Slack</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">تقرير سردي</div><p class="jf-desc">ملخص أسبوعي لتقدم كل مشروع يُرسَل إلى الإدارة يوم الجمعة</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">لوحة التحكم</div><p class="jf-desc">لوحة تحكم التنسيق تُحدَّث في الوقت الفعلي، متاحة لجميع المدراء</p></div>
    </div></div>
    <div class="tab-pane" id="tab-support"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">سؤال موظف</div><p class="jf-desc">يرسل موظف سؤالاً متعلقاً بالموارد البشرية أو تقنية المعلومات عبر WhatsApp Business الداخلي على مدار الساعة</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">تصنيف بالذكاء الاصطناعي</div><p class="jf-desc">تصنيف تلقائي للطلب (موارد بشرية، تقنية معلومات، إجراء، حالة عاجلة)</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">رد فوري</div><p class="jf-desc">يرد الوكيل في أقل من 30 ثانية انطلاقاً من قاعدة معرفة SIRH</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">تصعيد عند الحاجة</div><p class="jf-desc">تحويل تلقائي إلى الفرق البشرية للحالات المعقدة الخارجة عن النطاق</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">متابعة التذكرة</div><p class="jf-desc">إنشاء تذكرة متابعة إذا تطلَّب الحل إجراءً يدوياً</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">قياس الرضا</div><p class="jf-desc">استبيان رضا تلقائي بعد الحل للتحسين المستمر</p></div>
    </div></div>
  </div></div>
</section>

<section class="sh-integrations" id="integrations"><div class="container">
  <div class="sec-label">التكاملات الأساسية</div>
  <h2 class="sec-title rv">متصل بمنظومتكم<br><em>التنظيمية</em></h2>
  <div class="sh-int-inner">
    <div class="accordion rv d1">
      <div class="acc-item open"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-google"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Google Workspace / Office 365</span><span class="acc-sub">Gmail وDrive وCalendar وTeams</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>فرز تلقائي لـGmail مع اكتشاف الرسائل ذات الأولوية، وتكامل مع Calendar لتذكيرات الاجتماعات، وDrive لأرشفة المحاضر التي يولّدها الوكيل.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-trello"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Trello / Jira / Asana</span><span class="acc-sub">إدارة مشاريع مؤتمتة</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>إنشاء تلقائي للبطاقات انطلاقاً من اجتماعات Zoom، ومزامنة ثنائية الاتجاه للحالات، وتنبيهات Slack عند تجاوز المواعيد النهائية، وملخص يومي لكل مدير.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-slack"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Slack / Microsoft Teams</span><span class="acc-sub">مركز اتصال الوكلاء</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>قناة مركزية لاستقبال جميع تنبيهات وملخصات وإشعارات الوكلاء. يتلقى كل موظف فقط المعلومات ذات الصلة بنطاق عمله.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fa fa-video"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Zoom / Google Meet / Téléphonie IP</span><span class="acc-sub">تفريغ نصي واستخراج تحليلي</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>تفريغ نصي تلقائي عبر واجهة برمجية لـZoom أو Google Meet. متوافق أيضاً مع أنظمة الهاتفة عبر الإنترنت (3CX، Genesys) لمراكز الاتصال والفرق التجارية.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-whatsapp"></i></div><div class="acc-lbl-wrap"><span class="acc-title">WhatsApp Business / Notion / SIRH</span><span class="acc-sub">دعم داخلي وقاعدة معرفة</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>وكيل دعم تعاملي متصل بقاعدة معرفة Notion ونظام SIRH للإجابة عن أسئلة الموارد البشرية وتقنية المعلومات. ميثاق استخدام مُحدَّد مع إدارة الموارد البشرية وإدارة نظم المعلومات.</p></div></div></div>
    </div>
    <div class="sh-int-visual rv d2"><div class="sh-int-card">
      <img class="sh-int-card-img" src="<?php echo $siteURL; ?>images/secteur/<?= $secteur->getPhoto() ?>" alt="مكتب بالدار البيضاء">
      <div class="sh-int-card-body">
        <div class="sh-int-card-title">بنية مُصادَق عليها من إدارة الموارد البشرية وإدارة نظم المعلومات</div>
        <p class="sh-int-card-desc">يبدأ كل نشر بتدقيق تنظيمي شامل مع إدارة الموارد البشرية وإدارة نظم المعلومات. تُحدَّد متطلبات الحوكمة، وتُصادَق صلاحيات الوصول للواجهات البرمجية، ويُحدَّد ميثاق استخدام الذكاء الاصطناعي قبل أي انطلاق تقني.</p>
      </div>
    </div></div>
  </div>
</div></section>

<section class="sdtl-section" id="deploiement">
  <div class="sdtl-orb-wrap"><div class="sdtl-orb" id="sdtlOrb"><div class="sdtl-orb-ring r1"></div><div class="sdtl-orb-ring r2"></div><div class="sdtl-orb-ring r3"></div><div class="sdtl-orb-ring r4"></div></div></div>
  <div class="container"><div class="sdtl-header">
    <div class="sec-label">نشر مخصص لقطاع العمليات</div>
    <h2 class="sec-title rv">منهجية على مراحل<br><em>مُصادَق عليها من إدارة الموارد البشرية وإدارة نظم المعلومات</em></h2>
    <p class="sdtl-intro rv d1">نشر منظَّم ينطلق من تدقيق تنظيمي لضمان التبني والتتبع. يصادق فريقكم التجريبي على كل وكيل قبل الانتقال إلى النطاق الواسع.</p>
  </div>
  <div class="sdtl-timeline" id="sdtlTimeline">
    <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-glass">
        <div class="sdtl-num">1</div><div class="sdtl-title">تدقيق تنظيمي</div>
        <p class="sdtl-desc">رسم خرائط الأدوات الحالية، وتحديد الصوامع المعزولة، ومصادقة صلاحيات الوصول للواجهات البرمجية ومتطلبات الحوكمة مع إدارة الموارد البشرية وإدارة نظم المعلومات.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><span>رسم خرائط التدفقات الداخلية</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>صلاحيات API مُصادَق عليها مع إدارة نظم المعلومات</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>ميثاق حوكمة الذكاء الاصطناعي محدَّد</span><i class="fa fa-circle"></i></div></div>
        <span class="sdtl-tag">الأسبوع 1 – 2</span>
      </div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-sitemap"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">تدقيق</div></div>
    </div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword">تجربة</div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-users"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-glass">
        <div class="sdtl-num">2</div><div class="sdtl-title">تجربة الموارد البشرية والمشاريع</div>
        <p class="sdtl-desc">نشر على فرق الموارد البشرية ومدراء المشاريع خلال 6 أسابيع. معايرة الملخصات وعتبات التنبيه وفق ملاحظات المستخدمين.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><i class="fa fa-circle"></i><span>5 وكلاء نشطون ومُعايَرون</span></div><div class="sdtl-li"><i class="fa fa-circle"></i><span>عتبات التنبيه مُعدَّلة</span></div><div class="sdtl-li"><i class="fa fa-circle"></i><span>ملاحظات الفرق مجمَّعة</span></div></div>
        <span class="sdtl-tag">الأسبوع 3 – 6</span>
      </div></div>
    </div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-glass">
        <div class="sdtl-num">3</div><div class="sdtl-title">تعميم على عدة فرق</div>
        <p class="sdtl-desc">نشر على جميع الأقسام، ومواكبة التغيير، وتدريب المدراء وسكرتاريات الإدارة. تحديد ميثاق استخدام الذكاء الاصطناعي.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><span>ميثاق استخدام الذكاء الاصطناعي مُنشَر</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>تدريب 100% من المدراء</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>دعم على مدار الساعة مشمول لمدة 3 أشهر</span><i class="fa fa-circle"></i></div></div>
        <span class="sdtl-tag">الأسبوع 7 – 10</span>
      </div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-building"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">التوسع</div></div>
    </div>
  </div></div>
</section>

<section class="sh-case" id="cas-client"><div class="container">
  <div class="sec-label">دراسة حالة · قصة نجاح</div>
  <h2 class="sec-title rv">نتائج ملموسة<br><em>في مجموعة خدمات B2B</em></h2>
  <div class="case-wrap rv d1">
    <div class="case-left">
      <span class="case-tag">دراسة حالة · مجموعة B2B · الدار البيضاء</span>
      <h3 class="case-headline">مجموعة خدمات<br>B2B بالدار البيضاء</h3>
      <p class="case-ctx"><strong>180 موظفاً</strong>، و12 مشروعاً نشطاً على Trello، و4 اجتماعات إدارية أسبوعياً. المدير العام مُثقَل بالرسائل الإلكترونية ومتابعات المتابعة.</p>
      <div class="case-problem"><div class="case-problem-label">المشكلة المحددة</div><div class="case-problem-text">قرارات تُتخَذ في الاجتماعات ولا تُوثَّق أبداً. مواعيد نهائية تُكتشَف متأخرة. مدراء يخصصون 30% من وقتهم لمهام المتابعة الإدارية.</div></div>
      <p class="case-ctx" style="margin-bottom:0">مجموعة كاملة من وكلاء HW الداخليين مُنشَرة: ملخص Slack، تحليل Zoom، فرز Gmail للمدير العام، ودعم تقني عبر WhatsApp لـ 180 موظفاً.</p>
    </div>
    <div class="case-right" style="background-image:url('<?php echo $siteURL; ?>images/operations-case-bg.jpg')">
      <div class="case-results">
        <div class="result-big"><div class="result-num">65<span style="font-size:.5em">%</span></div><div class="result-lbl">وقت المدير العام في الرسائل</div></div>
        <div class="result-big"><div class="result-num">+28<span style="font-size:.5em">%</span></div><div class="result-lbl">مواعيد نهائية محترمة</div></div>
        <div class="result-big"><div class="result-num">+12</div><div class="result-lbl">الرضا الداخلي</div></div>
        <div class="result-big"><div class="result-num">5<span style="font-size:.5em">m</span></div><div class="result-lbl">عائد الاستثمار المحقق</div></div>
      </div>
      <blockquote class="case-quote">هدّأ الذكاء الاصطناعي إدارتنا الداخلية. استعاد مدرائي السيطرة على أجنداتهم، وأصبحت قراراتهم موثَّقة أخيراً.<span class="case-quote-author">المدير العام، الدار البيضاء</span></blockquote>
    </div>
  </div>
</div></section>

<section class="cta-band" id="cta" style="background-image:url('<?php echo $siteURL; ?>images/para.jpg')">
  <div class="container">
    <div class="sec-label">هل أنتم مستعدون للانطلاق؟</div>
    <h2 class="sec-title rv">حسّنوا التنسيق <br>وقلّصوا الاحتكاكات <br><em>التشغيلية</em></h2>
    <p class="cta-sub">اربطوا أدواتكم الداخلية لأتمتة الملخصات، والتنبيهات، ومتابعة المواعيد النهائية، وتحليل التبادلات، ومساعدة الفرق، لكسب مزيد من الرؤية وسرعة التنفيذ والانضباط التشغيلي.</p>
    <div class="cta-btns">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="حسّنوا عملياتكم الداخلية" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">اطلبوا تدقيقاً مجانياً بالذكاء الاصطناعي</span></div>
          <div class="sb-knob"><i class="fal fa-bolt"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="احصلوا على ميثاق استخدام الذكاء الاصطناعي" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">حسّنوا عملياتي الداخلية</span></div>
          <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
        </a>
    </div>
  </div>
</section>

<?php else: ?>

<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>
  <div class="sh-hero-body"><div class="container"><div class="sh-hero-inner">
    <div>
      <div class="sh-breadcrumb">Solutions IA · Organisation &amp; Opérations</div>
      <h1 class="sh-h1"><?php echo !empty($secteur->getH1()) ? $secteur->getH1() : $secteur->getTitre(); ?></h1>
      <p class="sh-sub">Connectez vos outils, fluidifiez l'information et dotez vos collaborateurs d'assistants virtuels performants. Supprimez les tâches redondantes et pacifiez votre gestion interne.</p>
      <div class="sh-cta-row">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Optimiser vos opérations" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Optimiser vos opérations</span></div>
          <div class="sb-knob"><i class="fal fa-bolt"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Recevoir la charte IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Recevoir la charte IA</span></div>
          <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
        </a>
      </div>
    </div>
    <!-- ORBITAL OPS IA -->
    <div class="sh-hero-right">
      <div class="sho-scene">
        <div class="sho-ring r1"></div>
        <div class="sho-ring r2"></div>
        <div class="sho-ring r3"></div>
        <div class="sho-core">
          <div class="sho-plus"><i class="fa fa-network-wired" style="font-size:1rem"></i></div>
          <div class="sho-lbl">Ops IA</div>
        </div>
        <!-- Orbit interne r=100px -->
        <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="Slack Digest"><i class="fab fa-slack"></i></div></div>
        <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="Trello Projets"><i class="fab fa-trello"></i></div></div>
        <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Gmail Tri IA"><i class="fal fa-envelope"></i></div></div>
        <!-- Orbit moyenne r=170px -->
        <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="Zoom Transcription"><i class="fal fa-video"></i></div></div>
        <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="WhatsApp Support"><i class="fab fa-whatsapp"></i></div></div>
        <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="Notion Base"><i class="fal fa-book-open"></i></div></div>
        <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Google Meet"><i class="fab fa-google"></i></div></div>
        <!-- Orbit externe r=222px -->
        <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="Jira / Asana"><div class="ltr">JR</div></div></div>
        <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="Microsoft Teams"><div class="ltr">MS</div></div></div>
        <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="3CX Téléphonie"><i class="fal fa-phone"></i></div></div>
        <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="SIRH Intranet"><i class="fal fa-users"></i></div></div>
        <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="Compte-Rendu Zoom"><i class="fal fa-file-alt"></i></div></div>
      </div>
    </div>
  </div></div></div>
</section>

<section class="sh-stats"><div class="container"><div class="sh-stats-grid">
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="50">0</span><span class="suf">%</span></div><div class="sh-stat-lbl">Réunions de suivi</div><div class="sh-stat-sub">Réduites grâce aux digests IA</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="35">0</span><span class="suf">%</span></div><div class="sh-stat-lbl">Deadlines respectées</div><div class="sh-stat-sub">Hausse sur 12 projets actifs</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="4">0</span><span class="suf">h</span></div><div class="sh-stat-lbl">Gagnées par manager</div><div class="sh-stat-sub">Par semaine en moyenne</div></div>
  <div class="sh-stat rv"><div class="sh-stat-val"><span class="sh-counter" data-target="5">0</span><span class="suf">m</span></div><div class="sh-stat-lbl">ROI atteignable</div><div class="sh-stat-sub">1 ETP secrétariat réalloué</div></div>
</div></div></section>

<section class="sh-context"><div class="container"><div class="sh-context-inner">
  <div>
    <div class="sec-label">Contexte &amp; Enjeux</div>
    <h2 class="sh-ctx-title rv"><strong>Opérations au Maroc</strong>L'information se perd entre les outils</h2>
    <div class="sh-ctx-body rv d1">
      <p>Les ETI et grands comptes marocains font face à une dispersion de l'information entre emails, Trello, Zoom et Slack. Ce manque d'alignement engendre des retards projets et des <em>pertes de données critiques</em>.</p>
      <p>L'intégration d'agents IA internes agit comme un chef d'orchestre numérique reliant tous ces écosystèmes. La traçabilité des décisions devient automatique, les deadlines sont respectées sans réunion de suivi.</p>
    </div>
    <div class="sh-pills rv d2">
      <span class="sh-pill"><i class="fa fa-envelope"></i> Tri Gmail IA</span>
      <span class="sh-pill"><i class="fab fa-trello"></i> Digest Trello</span>
      <span class="sh-pill"><i class="fa fa-microphone"></i> CR Zoom auto</span>
      <span class="sh-pill"><i class="fab fa-whatsapp"></i> Support interne</span>
    </div>
  </div>
  <div class="sh-ctx-visual rv d3">
    <div class="sh-ctx-blob"></div><div class="sh-ctx-blob2"></div>
    <div class="sh-ctx-center-wrap"><div class="sh-ctx-center"><i class="fa fa-network-wired"></i></div></div>
    <div class="sh-fcard fc1"><div class="sh-fcard-val">50%</div><div class="sh-fcard-lbl">Réunions</div></div>
    <div class="sh-fcard fc2"><div class="sh-fcard-val">4h</div><div class="sh-fcard-lbl">Gagnées/mgr</div></div>
    <div class="sh-fcard fc3"><div class="sh-fcard-val">100%</div><div class="sh-fcard-lbl">CR tracés</div></div>
    <div class="sh-fcard fc4"><div class="sh-fcard-val">5m</div><div class="sh-fcard-lbl">ROI</div></div>
  </div>
</div></div></section>

<section class="sh-solutions" id="solutions"><div class="container">
  <div class="sec-label">Agents de Coordination Interne</div>
  <h2 class="sec-title rv">Cinq agents,<br><em>un bureau sans friction</em></h2>
  <div class="sol-kpi-grid rv d1">
    <div class="sol-kpi-card"><div class="sol-kpi-val">50<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">Réunions réduites</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">100<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">CR centralisés</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">4<span style="font-size:.6em">h</span></div><div class="sol-kpi-lbl">Gagnées/manager</div></div>
    <div class="sol-kpi-card"><div class="sol-kpi-val">+35<span style="font-size:.6em">%</span></div><div class="sol-kpi-lbl">Deadlines OK</div></div>
  </div>
  <div class="sol-feature rv">
    <div class="sol-fc-text">
      <div class="sol-fc-title"><strong>Suite Coordination IA</strong>Gmail · Trello · Slack · Zoom · WhatsApp</div>
      <p class="sol-fc-desc">Cinq agents interconnectés qui trient vos emails, digèrent vos projets, transcrivent vos réunions et répondent à vos équipes en temps réel. Zéro information perdue.</p>
      <ul class="sol-benefits">
        <li><i class="fa fa-check"></i><span><strong>Tri Gmail &amp; alertes urgentes</strong> — détection des mails critiques (clients VIP, litiges), notification immédiate sur Slack avec brouillon de réponse</span></li>
        <li><i class="fa fa-check"></i><span><strong>Digest Trello quotidien</strong> — état des projets consolidé, deadlines du jour sur Slack chaque matin à 8h avec alertes rouge sur les retards</span></li>
        <li><i class="fa fa-check"></i><span><strong>Transcription Zoom analytique</strong> — CR automatique en 2 minutes, action items extraits et assignés, cartes Trello créées instantanément</span></li>
        <li><i class="fa fa-check"></i><span><strong>Support interne WhatsApp</strong> — assistant RH/IT conversationnel disponible 24/7, escalade automatique pour les cas complexes</span></li>
        <li><i class="fa fa-check"></i><span><strong>Synthèse d'activité Trello</strong> — rapport narratif quotidien par board envoyé à la hiérarchie, retards identifiés et remontés proactivement</span></li>
      </ul>
      <div class="sol-roi-box">
        <div class="sol-roi-num">1</div>
        <div class="sol-roi-text"><strong>ETP secrétariat de direction économisé.</strong><br>Gain de 4h/semaine par manager. ROI atteint en 5 mois. Satisfaction interne +12 points.</div>
      </div>
    </div>
    <div class="sol-fc-visual">
      <div class="slk" style="width:320px">
        <div class="slk-head"><div class="slk-ico"><i class="fab fa-slack"></i></div><span class="slk-channel">#compte-rendu-zoom</span></div>
        <div class="slk-body">
          <div class="slk-msg"><div class="slk-avatar bot">HW</div><div class="slk-msg-content"><div class="slk-msg-author">Agent HW <span>Maintenant</span></div><div class="slk-msg-text"><strong>CR Réunion Direction · 16h00</strong></div><div class="slk-alert"><div class="slk-alert-txt"><span class="slk-dot"></span>3 décisions prises · 5 action items créés · 2 cartes Trello assignées</div></div></div></div>
          <div class="slk-msg" style="margin-top:.4rem"><div class="slk-avatar bot">HW</div><div class="slk-msg-content"><div class="slk-msg-author">Action items <span>automatiques</span></div><div class="slk-msg-text"><strong style="color:#4ade80">@Karim</strong> — Livraison maquette client · Vendredi<br><strong style="color:#4ade80">@Nadia</strong> — Rapport Q3 DAF · Lundi matin<br><strong style="color:#f87171">@Mouad</strong> — Urgent : contrat à signer</div></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


<!-- ══ PARCOURS CLIENT — IMAGE PARALLAX + BEAM PROGRESSIF ════════ -->
<section class="sh-journey" id="parcours">

  <div class="jp-bg">
    <img id="jpImg" class="jp-img"
         src="<?php echo $siteURL; ?>images/operations-sector.jpeg"
         alt="Restaurant moderne Maroc"
         loading="eager"
         decoding="async"
         width="1584" height="672">
  </div>

  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Parcours client typique</div>
      <h2 class="sec-title rv">Expérience client<br><em>de A à Z</em></h2>
      <p class="rv d1">Trois canaux d'entrée, une expérience unifiée. Choisissez le parcours correspondant à votre enseigne.</p>

      <div class="tab-nav rv d2">
        <button class="tab-btn active" data-tab="wa">Via WhatsApp</button>
        <button class="tab-btn" data-tab="qr">Via QR Code Table</button>
        <button class="tab-btn" data-tab="web">Via Livraison</button>
      </div>

      <!-- Tab 1: WhatsApp -->
      <div class="tab-pane active" id="tab-wa">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWa"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Message WhatsApp</div><p class="jf-desc">Client envoie un message au numéro WhatsApp de l'enseigne</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Menu Dynamique</div><p class="jf-desc">L'IA affiche le menu interactif avec photos, allergènes et suggestions du jour</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Upsell automatique</div><p class="jf-desc">Boissons et desserts suggérés selon la commande choisie par le client</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Paiement sécurisé</div><p class="jf-desc">Lien CMI/Stripe généré dans la conversation WhatsApp en 1 clic</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Bon cuisine</div><p class="jf-desc">Envoyé automatiquement au POS (Clyo/Micros) sans ressaisie manuelle</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Notification retrait</div><p class="jf-desc">Client notifié pour le retrait ou suivi GPS de livraison en temps réel</p></div>
        </div>
      </div>

      <!-- Tab 2: QR Code Table -->
      <div class="tab-pane" id="tab-qr">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamQr"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">QR Code table</div><p class="jf-desc">Client scanne le QR code affiché sur sa table ou à l'entrée du restaurant</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Menu digital</div><p class="jf-desc">Carte interactive avec photos, prix et allergènes s'affiche instantanément</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Commande salle</div><p class="jf-desc">Sélection et personnalisation (sans gluten, sans lactose, épicé…)</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Upsell boissons</div><p class="jf-desc">Suggestions automatiques de boissons et desserts selon les plats commandés</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Validation cuisine</div><p class="jf-desc">Commande envoyée instantanément au POS en cuisine, sans ressaisie</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Avis Google</div><p class="jf-desc">Demande de note satisfaction automatique après le repas via SMS/WhatsApp</p></div>
        </div>
      </div>

      <!-- Tab 3: Livraison -->
      <div class="tab-pane" id="tab-web">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWeb"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Commande reçue</div><p class="jf-desc">Via Glovo, Uber Eats ou WhatsApp direct — centralisé dans un flux unique</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Confirmation IA</div><p class="jf-desc">Délai de préparation estimé communiqué automatiquement au client</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Préparation POS</div><p class="jf-desc">Bon de commande transmis en cuisine via POS en temps réel sans ressaisie</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Dispatch livreur</div><p class="jf-desc">Attribution automatique au livreur partenaire disponible le plus proche</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Suivi GPS</div><p class="jf-desc">Client notifié à chaque étape de la livraison avec position en temps réel</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Fidélité &amp; avis</div><p class="jf-desc">Note satisfaction demandée, offre de fidélité envoyée automatiquement</p></div>
        </div>
      </div>

    </div>
  </div>
</section>

<!--
<section class="sh-journey" id="parcours">
  <div class="jp-bg"><img id="jpImg" class="jp-img" src="<?php echo $siteURL; ?>images/operations-journey-bg.jpg" alt="Bureau coordination moderne" loading="eager"></div>
  <div class="jp-content"><div class="container">
    <div class="sec-label">Parcours client typique</div>
    <h2 class="sec-title rv">D'une réunion Zoom<br><em>aux cartes Trello créées</em></h2>
    <p class="rv d1" style="font-size:.9rem;color:var(--txt2);max-width:580px;line-height:1.9;font-weight:300;margin-bottom:0">Trois flux automatisés qui traitent vos réunions, vos projets et vos communications internes sans intervention humaine.</p>
    <div class="tab-nav rv d2">
      <button class="tab-btn active" data-tab="zoom">Flux Réunion</button>
      <button class="tab-btn" data-tab="trello">Flux Projets</button>
      <button class="tab-btn" data-tab="support">Flux Support</button>
    </div>
    <div class="tab-pane active" id="tab-zoom"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Fin de Réunion</div><p class="jf-desc">La réunion Zoom se termine, l'enregistrement est automatiquement transmis à l'agent</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Transcription IA</div><p class="jf-desc">Transcription intégrale en 2 minutes, identification des locuteurs et des décisions</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Extraction Items</div><p class="jf-desc">Action items identifiés et attribués nominativement aux collaborateurs cités</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Cartes Trello</div><p class="jf-desc">Création automatique des cartes avec deadlines extraites de la conversation</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Notif Slack</div><p class="jf-desc">Résumé exécutif et liens d'action envoyés à chaque participant sur Slack</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Archivage Notion</div><p class="jf-desc">CR structuré archivé dans Notion, base de connaissances enrichie automatiquement</p></div>
    </div></div>
    <div class="tab-pane" id="tab-trello"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Scan 7h30</div><p class="jf-desc">L'agent analyse automatiquement tous les boards Trello et tickets Jira actifs</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Détection Retards</div><p class="jf-desc">Identification des cartes en retard ou à risque avec calcul du délai de dépassement</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Alertes Rouge</div><p class="jf-desc">Notification Slack immédiate aux responsables des tâches critiques identifiées</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Digest 8h00</div><p class="jf-desc">Récapitulatif des deadlines du jour envoyé à chaque manager sur son canal Slack</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Rapport Narratif</div><p class="jf-desc">Synthèse hebdomadaire de l'avancement par projet transmise à la direction vendredi</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Tableau de Bord</div><p class="jf-desc">Dashboard coordination mis à jour en temps réel, accessible à tous les managers</p></div>
    </div></div>
    <div class="tab-pane" id="tab-support"><div class="journey-flow">
      <div class="jf-track-wrap"><div class="jf-beam"></div></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div></div><div class="jf-title">Question Collaborateur</div><p class="jf-desc">Un employé envoie une question RH ou IT sur WhatsApp Business interne 24/7</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div></div><div class="jf-title">Classification IA</div><p class="jf-desc">Catégorisation automatique de la demande (RH, IT, procédure, urgence)</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div></div><div class="jf-title">Réponse Instantanée</div><p class="jf-desc">L'agent répond en moins de 30 secondes depuis la base de connaissances SIRH</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div></div><div class="jf-title">Escalade si Besoin</div><p class="jf-desc">Transfert automatique aux équipes humaines pour les cas complexes hors périmètre</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div></div><div class="jf-title">Suivi Ticket</div><p class="jf-desc">Création d'un ticket de suivi si la résolution nécessite une action manuelle</p></div>
      <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div></div><div class="jf-title">Satisfaction Mesurée</div><p class="jf-desc">Enquête de satisfaction automatique après résolution pour amélioration continue</p></div>
    </div></div>
  </div></div>
</section>
-->

<section class="sh-integrations" id="integrations"><div class="container">
  <div class="sec-label">Intégrations clés</div>
  <h2 class="sec-title rv">Connecté à votre<br><em>écosystème organisationnel</em></h2>
  <div class="sh-int-inner">
    <div class="accordion rv d1">
      <div class="acc-item open"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-google"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Google Workspace / Office 365</span><span class="acc-sub">Gmail, Drive, Calendar, Teams</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Tri automatique de Gmail avec détection des mails prioritaires, intégration Calendar pour les rappels de réunion et Drive pour l'archivage des comptes-rendus générés par l'agent.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-trello"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Trello / Jira / Asana</span><span class="acc-sub">Gestion de projets automatisée</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Création automatique de cartes depuis les réunions Zoom, synchronisation bidirectionnelle des statuts, alertes Slack sur les deadlines dépassées et digest quotidien pour chaque manager.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-slack"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Slack / Microsoft Teams</span><span class="acc-sub">Hub de communication des agents</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Canal central de réception de toutes les alertes, résumés et notifications des agents. Chaque collaborateur reçoit uniquement les informations pertinentes à son périmètre d'action.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fa fa-video"></i></div><div class="acc-lbl-wrap"><span class="acc-title">Zoom / Google Meet / Téléphonie IP</span><span class="acc-sub">Transcription et extraction analytique</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Transcription automatique via API Zoom ou Google Meet. Compatible également avec les systèmes de téléphonie IP (3CX, Genesys) pour les centres d'appels et les équipes commerciales.</p></div></div></div>
      <div class="acc-item"><button class="acc-trigger"><div class="acc-ico"><i class="fab fa-whatsapp"></i></div><div class="acc-lbl-wrap"><span class="acc-title">WhatsApp Business / Notion / SIRH</span><span class="acc-sub">Support interne et base de connaissances</span></div><div class="acc-arr"><i class="fa fa-chevron-down"></i></div></button><div class="acc-body"><div class="acc-content"><p>Agent de support conversationnel connecté à la base de connaissances Notion et au SIRH pour répondre aux questions RH et IT. Charte d'usage définie avec la DRH et la DSI.</p></div></div></div>
    </div>
    <div class="sh-int-visual rv d2"><div class="sh-int-card">
      <img class="sh-int-card-img" src="<?php echo $siteURL; ?>images/secteur/<?= $secteur->getPhoto() ?>" alt="Bureau Casablanca">
      <div class="sh-int-card-body">
        <div class="sh-int-card-title">Architecture validée DRH et DSI</div>
        <p class="sh-int-card-desc">Chaque déploiement commence par un audit organisationnel complet avec la DRH et la DSI. Contraintes de gouvernance identifiées, accès API validés et charte d'usage IA définie avant tout démarrage technique.</p>
      </div>
    </div></div>
  </div>
</div></section>

<section class="sdtl-section" id="deploiement">
  <div class="sdtl-orb-wrap"><div class="sdtl-orb" id="sdtlOrb"><div class="sdtl-orb-ring r1"></div><div class="sdtl-orb-ring r2"></div><div class="sdtl-orb-ring r3"></div><div class="sdtl-orb-ring r4"></div></div></div>
  <div class="container"><div class="sdtl-header">
    <div class="sec-label">Déploiement adapté Opérations</div>
    <h2 class="sec-title rv">Méthodologie en phases<br><em>validée DRH et DSI</em></h2>
    <p class="sdtl-intro rv d1">Un déploiement structuré qui part d'un audit organisationnel pour garantir adoption et traçabilité. Votre équipe pilote valide chaque agent avant passage à l'échelle.</p>
  </div>
  <div class="sdtl-timeline" id="sdtlTimeline">
    <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-glass">
        <div class="sdtl-num">1</div><div class="sdtl-title">Audit Organisationnel</div>
        <p class="sdtl-desc">Cartographie des outils existants, identification des silos, validation des accès API et des contraintes de gouvernance avec DRH et DSI.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><span>Cartographie des flux internes</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>Accès API validés avec DSI</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>Charte gouvernance IA définie</span><i class="fa fa-circle"></i></div></div>
        <span class="sdtl-tag">SEMAINES 1 – 2</span>
      </div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-sitemap"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Audit</div></div>
    </div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-keyword">Pilote</div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-users"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-glass">
        <div class="sdtl-num">2</div><div class="sdtl-title">Pilote RH + Projets</div>
        <p class="sdtl-desc">Déploiement sur les équipes RH et project managers pendant 6 semaines. Calibrage des synthèses et des seuils d'alerte selon les retours utilisateurs.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><i class="fa fa-circle"></i><span>5 agents actifs et calibrés</span></div><div class="sdtl-li"><i class="fa fa-circle"></i><span>Seuils d'alerte ajustés</span></div><div class="sdtl-li"><i class="fa fa-circle"></i><span>Feedback équipes collecté</span></div></div>
        <span class="sdtl-tag">SEMAINES 3 – 6</span>
      </div></div>
    </div>
    <div class="sdtl-step">
      <div class="sdtl-panel sdtl-panel--left"><div class="sdtl-glass">
        <div class="sdtl-num">3</div><div class="sdtl-title">Industrialisation Multi-Équipes</div>
        <p class="sdtl-desc">Déploiement à tous les départements, accompagnement au changement, formation des managers et secrétaires de direction. Charte d'usage IA définie.</p>
        <div style="margin-top:1rem"><div class="sdtl-li"><span>Charte usage IA déployée</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>Formation 100% des managers</span><i class="fa fa-circle"></i></div><div class="sdtl-li"><span>Support 24/7 inclus 3 mois</span><i class="fa fa-circle"></i></div></div>
        <span class="sdtl-tag">SEMAINES 7 – 10</span>
      </div></div>
      <div class="sdtl-node-wrap"><div class="sdtl-node"><div class="sdtl-node-ring r1"></div><div class="sdtl-node-ring r2"></div><div class="sdtl-node-ring r3"></div><div class="sdtl-node-core"><i class="fal fa-building"></i></div><div class="sdtl-node-pulse"></div></div></div>
      <div class="sdtl-panel sdtl-panel--right"><div class="sdtl-keyword">Scale</div></div>
    </div>
  </div></div>
</section>

<section class="sh-case" id="cas-client"><div class="container">
  <div class="sec-label">Cas client · Étude de succès</div>
  <h2 class="sec-title rv">Résultats concrets<br><em>en groupe de services B2B</em></h2>
  <div class="case-wrap rv d1">
    <div class="case-left">
      <span class="case-tag">Étude de cas · Groupe B2B · Casablanca</span>
      <h3 class="case-headline">Groupe de services<br>B2B Casablanca</h3>
      <p class="case-ctx"><strong>180 collaborateurs</strong>, 12 projets actifs sur Trello, 4 réunions de direction par semaine. Directeur général submergé par les emails et les relances de suivi.</p>
      <div class="case-problem"><div class="case-problem-label">Problème identifié</div><div class="case-problem-text">Décisions prises en réunion jamais tracées. Deadlines découvertes en retard. Managers consacrant 30% de leur temps à des tâches de suivi administratif.</div></div>
      <p class="case-ctx" style="margin-bottom:0">Suite complète d'agents internes HW déployée : digest Slack, analyse Zoom, tri Gmail DG et support IT WhatsApp pour 180 collaborateurs.</p>
    </div>
    <div class="case-right" style="background-image:url('<?php echo $siteURL; ?>images/operations-case-bg.jpg')">
      <div class="case-results">
        <div class="result-big"><div class="result-num">65<span style="font-size:.5em">%</span></div><div class="result-lbl">Temps DG emails</div></div>
        <div class="result-big"><div class="result-num">+28<span style="font-size:.5em">%</span></div><div class="result-lbl">Deadlines OK</div></div>
        <div class="result-big"><div class="result-num">+12</div><div class="result-lbl">Satisfaction interne</div></div>
        <div class="result-big"><div class="result-num">5<span style="font-size:.5em">m</span></div><div class="result-lbl">ROI atteint</div></div>
      </div>
      <blockquote class="case-quote">L'IA a pacifié notre gestion interne. Mes managers ont retrouvé la main sur leur agenda et leurs décisions sont enfin tracées.<span class="case-quote-author">Directeur Général, Casablanca</span></blockquote>
    </div>
  </div>
</div></section>

<section class="cta-band" id="cta" style="background-image:url('<?php echo $siteURL; ?>images/para.jpg')">
  <div class="container">
    <div class="sec-label">Vous êtes prêt à passer à l’action ?</div>
    <h2 class="sec-title rv">Améliorez la coordination et <br>réduisez les frictions <br><em>opérationnelles</em></h2>
    <p class="cta-sub">Connectez vos outils internes pour automatiser les synthèses, les alertes, les suivis de deadlines, l’analyse des échanges et l’assistance aux équipes, afin de gagner en visibilité, en rapidité d’exécution et en discipline opérationnelle.</p>
    <div class="cta-btns">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Optimiser vos opérations internes" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Demander un audit IA gratuit</span></div>
          <div class="sb-knob"><i class="fal fa-bolt"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Recevoir la charte d'usage IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Optimiser mes opérations internes</span></div>
          <div class="sb-knob"><i class="fal fa-chart-bar"></i></div>
        </a>
    </div>
  </div>
</section>

<?php endif; ?>

<script src="<?php echo $siteURL; ?>assets/js/secteur.js"></script>
