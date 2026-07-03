<style>
.sh-int-card{padding: 0;}
.sh-int-card-body{padding:2rem}
.sh-int-card-title{font-weight:600;font-size:1rem;color:var(--txt);margin-bottom:.6rem}
.sh-int-card-desc{font-size:.8rem;color:var(--txt2);line-height:1.8}

@keyframes cr-pulse{0%,100%{opacity:1}50%{opacity:.7}}
.case-right>*{position:relative;z-index:1}
.case-tag{font-size:.52rem;font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:var(--gold);margin-bottom:1.2rem;display:block}
.case-headline{font-weight:300;font-size:2.1rem;color:var(--txt);margin-bottom:1.5rem;letter-spacing:-.02em;line-height:1.1}
.case-ctx{font-size:.85rem;color:var(--txt2);line-height:1.9;margin-bottom:2rem}.case-ctx strong{color:var(--txt);font-weight:600}
.case-problem{border:1px solid rgba(9,161,190,.2);border-top:2px solid var(--gold);}
.case-problem-label{font-size:.55rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.45rem}
.case-problem-text{font-size:.8rem;color:var(--txt2);line-height:1.8}
.case-results{display:grid;grid-template-columns:repeat(2,1fr);gap:1rem}
.result-big{padding:1.4rem;background:rgba(255,255,255,.7);backdrop-filter:blur(12px);border:1px solid rgba(139,106,34,.12);border-radius:12px;transition:all .3s}
.result-big:hover{border-color:rgba(9,161,190,.3);transform:translateY(-2px)}
.result-num{font-weight:200;font-size:2.2rem;color:var(--gold);line-height:1;letter-spacing:-.04em}
.result-lbl{font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--txt2);margin-top:.25rem}
.case-quote{font-size:.82rem;font-style:italic;color:var(--txt2);line-height:1.85;padding:1.5rem 1.8rem;background:rgba(255,255,255,.6);backdrop-filter:blur(12px);border-radius:12px;position:relative}
.case-quote::before{content:'\201C';position:absolute;top:.2rem;left:.8rem;font-family:var(--fd);font-size:3.5rem;line-height:1;color:var(--gold2);opacity:.4;font-style:normal}
.case-quote-author{font-style:normal;font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);margin-top:.6rem;display:block}
@media(max-width:991px){.case-wrap{grid-template-columns:1fr}.case-right{border-left:none;border-top:1px solid var(--border)}}

/* Slack mockup */
.slk{width:360px;background:#1a1d21;border-radius:14px;overflow:hidden;box-shadow:0 32px 80px rgba(0,0,0,.4);font-family:'Cabinet Grotesk',sans-serif}
.slk-head{padding:.8rem 1.2rem;background:#111317;display:flex;align-items:center;gap:.6rem;border-bottom:1px solid rgba(255,255,255,.06)}
.slk-ico{width:28px;height:28px;background:#4a154b;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.8rem}
.slk-channel{font-size:.7rem;font-weight:700;color:rgba(255,255,255,.7);letter-spacing:.05em}
.slk-body{padding:1rem}
.slk-msg{display:flex;gap:.7rem;margin-bottom:.9rem}
.slk-avatar{width:30px;height:30px;border-radius:6px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:.65rem;font-weight:700;color:#fff}
.slk-avatar.bot{background:var(--gold)}
.slk-avatar.dg{background:#680262}
.slk-msg-content{flex:1}
.slk-msg-author{font-size:.62rem;font-weight:700;color:rgba(255,255,255,.8);margin-bottom:.2rem}
.slk-msg-author span{font-size:.52rem;color:rgba(255,255,255,.3);font-weight:300;margin-left:.4rem}
.slk-msg-text{font-size:.68rem;color:rgba(255,255,255,.65);line-height:1.55}
.slk-msg-text strong{color:var(--gold)}
.slk-alert{padding:.6rem .8rem;background:rgba(9,161,190,.12);border:1px solid rgba(9,161,190,.25);border-radius:8px;margin-top:.3rem}
.slk-alert-txt{font-size:.6rem;color:var(--gold);line-height:1.5}
.slk-dot{display:inline-block;width:6px;height:6px;border-radius:50%;background:#4ade80;animation:pulse-dot 1.5s ease-in-out infinite;vertical-align:middle;margin-right:.3rem}
@keyframes pulse-dot{0%,100%{opacity:1}50%{opacity:.4}}

.sh-ctx-visual{position:relative;display:flex;align-items:center;justify-content:center;min-height:420px}
.sh-ctx-blob{position:absolute;width:320px;height:320px;border-radius:50%;background:radial-gradient(ellipse at 40% 40%,rgba(9,161,190,.07),transparent 70%);border:1px solid rgba(9,161,190,.12);animation:ctx-spin 25s linear infinite}
.sh-ctx-blob2{position:absolute;width:240px;height:240px;border-radius:50%;border:1px dashed rgba(9,161,190,.07);animation:ctx-spin 40s linear infinite reverse}
@keyframes ctx-spin{to{transform:rotate(360deg)}}

.sh-ctx-center-wrap{position:absolute;width:110px;height:110px}
.sh-ctx-center{width:110px;height:110px;border-radius:50%;background:conic-gradient(from 0deg,var(--gold) 0deg,rgba(9,161,190,.1) 360deg);display:flex;align-items:center;justify-content:center;animation:ctx-spin 8s linear infinite}
.sh-ctx-center i{font-size:2rem;color:#fff;animation:ctx-spin 8s linear infinite reverse}
@media(max-width:991px){.sh-context-inner{grid-template-columns:1fr}.sh-ctx-visual{display:none}}

</style>
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>
  <div class="sh-hero-body"><div class="container"><div class="sh-hero-inner">
    <div>
      <div class="sh-breadcrumb">Solutions IA · Organisation &amp; Opérations</div>
      <h1 class="sh-h1">Solutions IA<br>pour <em>l'Organisation</em><br>et les Opérations</h1>
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
      <div class="sh-badges">
        <div class="sh-badge"><div class="sh-badge-val">50<span style="font-size:.6em">%</span></div><div class="sh-badge-lbl">Réunions</div></div>
        <div class="sh-badge"><div class="sh-badge-val">+35<span style="font-size:.6em">%</span></div><div class="sh-badge-lbl">Deadlines</div></div>
        <div class="sh-badge"><div class="sh-badge-val">4<span style="font-size:.6em">h</span></div><div class="sh-badge-lbl">Gagnées/mgr</div></div>
        <div class="sh-badge"><div class="sh-badge-val">5<span style="font-size:.6em">m</span></div><div class="sh-badge-lbl">ROI</div></div>
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
      <img class="sh-int-card-img" src="<?php echo $siteURL; ?>images/operations-journey-bg.jpg" alt="Bureau Casablanca">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
gsap.registerPlugin(ScrollTrigger);
const hdr=document.getElementById('hdr'),backTop=document.getElementById('backTop');
window.addEventListener('scroll',()=>{hdr.classList.toggle('scrolled',scrollY>80);backTop.classList.toggle('show',scrollY>600)},{passive:true});
const io=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('on');io.unobserve(e.target);}});},{threshold:.1});
document.querySelectorAll('.rv').forEach(el=>io.observe(el));
(function(){const canvas=document.getElementById('sh-canvas');if(!canvas)return;const ctx=canvas.getContext('2d');let W,H,t=0;const LINES=28,SEGS=200;function resize(){W=canvas.width=canvas.offsetWidth;H=canvas.height=canvas.offsetHeight;}function draw(){ctx.clearRect(0,0,W,H);t+=.004;for(let l=0;l<LINES;l++){const p=l/(LINES-1),yBase=H*.06+H*.88*p,amp=H*.03*(.2+p*.8),bright=1-Math.abs(p-.5)*1.6,alpha=Math.max(.008,Math.min(bright*.055,.055));ctx.beginPath();for(let i=0;i<=SEGS;i++){const x=(i/SEGS)*W,n=i/SEGS,y=yBase+Math.sin(n*Math.PI*4+t*1.4+l*.3)*amp+Math.sin(n*Math.PI*8-t*.9+l*.18)*amp*.35+Math.sin(n*Math.PI*2+t*.5+l*.08)*amp*.18;i===0?ctx.moveTo(x,y):ctx.lineTo(x,y);}ctx.strokeStyle=`rgba(139,106,34,${alpha})`;ctx.lineWidth=.8;ctx.stroke();}requestAnimationFrame(draw);}resize();draw();window.addEventListener('resize',resize);})();
(function(){const cio=new IntersectionObserver(entries=>{entries.forEach(e=>{if(!e.isIntersecting)return;const el=e.target,target=parseInt(el.dataset.target),start=performance.now();function update(now){const p=Math.min((now-start)/1600,1),eased=1-Math.pow(1-p,3);el.textContent=Math.round(eased*target);if(p<1)requestAnimationFrame(update);}requestAnimationFrame(update);cio.unobserve(el);});},{threshold:.5});document.querySelectorAll('.sh-counter').forEach(c=>cio.observe(c));})();
(function(){function activateTab(btn){document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));document.querySelectorAll('.tab-pane').forEach(p=>p.classList.remove('active'));btn.classList.add('active');const pane=document.getElementById('tab-'+btn.dataset.tab);if(!pane)return;pane.classList.add('active');pane.querySelectorAll('.jf-step').forEach((s,i)=>{s.classList.remove('jf-in');setTimeout(()=>s.classList.add('jf-in'),i*80);});const beam=pane.querySelector('.jf-beam');if(beam){beam.style.width='0%';setTimeout(()=>{beam.style.transition='width 1.6s ease';beam.style.width='100%';},200);setTimeout(()=>{beam.style.transition='none';},2000);}}
document.querySelectorAll('.tab-btn').forEach(btn=>btn.addEventListener('click',()=>activateTab(btn)));
const fp=document.querySelector('.tab-pane.active');if(fp){fp.querySelectorAll('.jf-step').forEach((s,i)=>setTimeout(()=>s.classList.add('jf-in'),600+i*80));const b=fp.querySelector('.jf-beam');if(b){setTimeout(()=>{b.style.transition='width 1.6s ease';b.style.width='100%';},800);}}
const jio=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){const p=document.querySelector('.tab-pane.active');if(p){p.querySelectorAll('.jf-step').forEach((s,i)=>setTimeout(()=>s.classList.add('jf-in'),i*80));const b=p.querySelector('.jf-beam');if(b){b.style.transition='width 1.6s ease';b.style.width='100%';}}jio.unobserve(e.target);}});},{threshold:.2});
const js=document.querySelector('.sh-journey');if(js)jio.observe(js);})();
document.querySelectorAll('.acc-trigger').forEach(btn=>{btn.addEventListener('click',()=>{const item=btn.closest('.acc-item'),isOpen=item.classList.contains('open');document.querySelectorAll('.acc-item.open').forEach(i=>i.classList.remove('open'));if(!isOpen)item.classList.add('open');});});
(function(){const timeline=document.getElementById('sdtlTimeline'),spineFill=document.getElementById('sdtlSpineFill'),orb=document.getElementById('sdtlOrb'),steps=document.querySelectorAll('.sdtl-step');if(!timeline||!spineFill)return;function update(){const rect=timeline.getBoundingClientRect(),vh=window.innerHeight,raw=(vh*.65-rect.top)/(rect.height+vh*.05);spineFill.style.height=(Math.max(0,Math.min(1,raw))*100)+'%';if(orb){const sp=scrollY/Math.max(1,document.body.scrollHeight-vh);orb.style.transform=`rotateY(${(sp*720).toFixed(2)}deg) rotateX(${(sp*300).toFixed(2)}deg)`;}}let raf;window.addEventListener('scroll',()=>{if(!raf)raf=requestAnimationFrame(()=>{update();raf=null;})},{passive:true});const stepIO=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('active');});},{threshold:.3,rootMargin:'0px 0px -10% 0px'});steps.forEach(s=>stepIO.observe(s));})();
gsap.to('.jp-img',{yPercent:15,ease:'none',scrollTrigger:{trigger:'.sh-journey',start:'top bottom',end:'bottom top',scrub:1}});
(function(){function splitChars(el){el.classList.add('fancy-title');let ci=0;function proc(node){if(node.nodeType===3){const frag=document.createDocumentFragment();for(const c of node.textContent){const s=document.createElement('span');if(c===' '){s.className='ch sp';s.innerHTML='&nbsp;';}else{s.className='ch';s.style.setProperty('--ci',ci++);s.textContent=c;}frag.appendChild(s);}node.parentNode.replaceChild(frag,node);}else if(node.nodeType===1&&node.tagName!=='BR')Array.from(node.childNodes).forEach(proc);}Array.from(el.childNodes).forEach(proc);}document.querySelectorAll('.sec-title').forEach(splitChars);})();


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
</script>