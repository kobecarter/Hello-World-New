<style>
/* Header */
.wa-hdr{background:#075E54;padding:.38rem .55rem;display:flex;align-items:center;gap:.38rem;border-bottom:1px solid rgba(0,0,0,.08)}
.wa-hdr-back{color:rgba(255,255,255,.72);font-size:.6rem}
.wa-hdr-av{width:24px;height:24px;border-radius:50%;background:#128C7E;display:flex;align-items:center;justify-content:center;font-size:.48rem;font-weight:700;color:#fff;flex-shrink:0}
.wa-hdr-info{flex:1}
.wa-hdr-name{font-size:.52rem;font-weight:700;color:#fff;line-height:1.1}
.wa-hdr-status{font-size:.4rem;color:rgba(255,255,255,.62);margin-top:.04rem}
.wa-hdr-ico{display:flex;gap:6px;align-items:center;color:rgba(255,255,255,.72);font-size:.58rem}    
</style>
<!-- ══ HERO ══════════════════════════════════════════════════════ -->
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>

  <div class="sh-hero-body">
    <div class="container">
      <div class="sh-hero-inner">

        <!-- LEFT -->
        <div class="sh-hero-left">
          <div class="sh-breadcrumb rv">Solutions IA — Secteur Hôtellerie</div>
          <h1 class="sh-h1 rv d1">
            Solutions IA pour <em>l'Hôtellerie</em> &amp; les Riads
          </h1>
          <p class="sh-sub rv d2">Offrez une expérience 5 étoiles grâce à un réceptionniste virtuel multilingue disponible 24h/24 pour vos futurs clients et résidents.</p>
          <div class="sh-cta-row rv d3">
              <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Découvrir l'IA Hôtellerie" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Découvrir l'IA Hôtellerie</span></div>
              <div class="sb-knob"><i class="fal fa-hotel"></i></div>
            </a>
        
            <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Calculer mon économie OTA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Calculer mon économie OTA</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
          </div>
          <div class="sh-badges rv d4">
            <div class="sh-badge"><div class="sh-badge-val">+20<span style="font-size:.9em">%</span></div><div class="sh-badge-lbl">Résa. directes</div></div>
            <div class="sh-badge"><div class="sh-badge-val">24/7</div><div class="sh-badge-lbl">Multilingue</div></div>
            <div class="sh-badge"><div class="sh-badge-val">-30<span style="font-size:.9em">%</span></div><div class="sh-badge-lbl">Commissions OTA</div></div>
            <div class="sh-badge"><div class="sh-badge-val">5 mois</div><div class="sh-badge-lbl">ROI atteint</div></div>
          </div>
        </div>

        <!-- RIGHT — 3D Medical Orbital -->
        <div class="sh-hero-right">
          <div class="sho-scene">
            <div class="sho-ring r1"></div>
            <div class="sho-ring r2"></div>
            <div class="sho-ring r3"></div>
            <div class="sho-core">
              <div class="sho-plus">✦</div>
              <div class="sho-lbl">Hôtel IA</div>
            </div>

            <!-- Inner orbit (r=100px) -->
            <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="PMS Opera/Mews"><i class="fal fa-building"></i></div></div>
            <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="WhatsApp"><i class="fab fa-whatsapp"></i></div></div>
            <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Booking Engine"><i class="fal fa-calendar-check"></i></div></div>

            <!-- Middle orbit (r=170px) -->
            <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="Paiement CMI"><i class="fal fa-credit-card"></i></div></div>
            <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="TripAdvisor"><i class="fal fa-star"></i></div></div>
            <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="Conciergerie IA"><i class="fal fa-concierge-bell"></i></div></div>
            <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Channel Manager"><i class="fal fa-project-diagram"></i></div></div>

            <!-- Outer orbit (r=222px) -->
            <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="Multilingue FR/EN/AR"><i class="fal fa-language"></i></div></div>
            <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="Google Reviews"><i class="fab fa-google"></i></div></div>
            <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="Late Check-out"><i class="fal fa-clock"></i></div></div>
            <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="Room Service IA"><i class="fal fa-utensils"></i></div></div>
            <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="Cloudbeds/Mews"><i class="fal fa-server"></i></div></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ══ STAT STRIP ════════════════════════════════════════════════ -->
<section class="sh-stats">
  <div class="container">
    <div class="sh-stats-grid">
      <div class="sh-stat rv">
        <div class="sh-stat-val">+<span class="sh-counter" data-target="20">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Réservations directes</div>
        <div class="sh-stat-sub">vs OTA Booking.com</div>
      </div>
      <div class="sh-stat rv d1">
        <div class="sh-stat-val" style="font-size:clamp(2rem,4vw,4rem)">24<span class="suf">/7</span></div>
        <div class="sh-stat-lbl">Disponibilité multilingue</div>
        <div class="sh-stat-sub">FR · EN · AR · ES</div>
      </div>
      <div class="sh-stat rv d2">
        <div class="sh-stat-val">+0.4<span class="suf">pts</span></div>
        <div class="sh-stat-lbl">Score Google moyen</div>
        <div class="sh-stat-sub">En 4 mois de déploiement</div>
      </div>
      <div class="sh-stat rv d3">
        <div class="sh-stat-val"><span class="sh-counter" data-target="5">0</span><span class="suf"> mois</span></div>
        <div class="sh-stat-lbl">ROI atteint</div>
        <div class="sh-stat-sub">Pour un hôtel 4 étoiles</div>
      </div>
    </div>
  </div>
</section>

<!-- ══ CONTEXTE & ENJEUX ════════════════════════════════════════ -->
<section class="sh-context">
  <div class="container">
    <div class="sh-context-inner">

      <div>
        <div class="sec-label">Contexte &amp; Enjeux</div>
        <h2 class="sh-ctx-title rv"><strong>Industrie hôtelière</strong>Réduire la dépendance<br>aux OTA au Maroc</h2>
        <div class="sh-ctx-body rv d1">
          <p>L'industrie touristique marocaine exige une réactivité immédiate pour contrer l'hégémonie des OTA (Booking, Expedia). Les établissements doivent proposer des expériences de <em>réservation directes</em> et des conciergeries virtuelles irréprochables pour maximiser leurs marges et la satisfaction client.</p>
          <p>La saisonnalité, les pics de demande multilingues (FR/EN/AR/ES) et l'exigence d'une conciergerie présente <em>24/7</em> pèsent sur les charges de personnel. L'IA conversationnelle devient un levier stratégique pour redonner aux équipes humaines le temps de soigner l'expérience en présentiel.</p>
        </div>
        <div class="sh-pills rv d2">
          <span class="sh-pill"><i class="fa fa-exclamation-triangle"></i> Dépendance OTA 75%</span>
          <span class="sh-pill"><i class="fa fa-moon"></i> Indisponibilité 24/7</span>
          <span class="sh-pill"><i class="fa fa-language"></i> Barrière multilingue</span>
          <span class="sh-pill"><i class="fa fa-percent"></i> Commissions élevées</span>
          <span class="sh-pill"><i class="fa fa-star"></i> Score Google stagnant</span>
        </div>
      </div>

      <!-- CSS ART Visual -->
      <div class="sh-ctx-visual rv d2">
        <div class="sh-ctx-blob"></div>
        <div class="sh-ctx-blob2"></div>
        <div class="sh-ctx-center"><div class="sh-ctx-cross">✦</div></div>
        <div class="sh-fcard fc1">
          <div class="sh-fcard-val">22</div>
          <div class="sh-fcard-lbl">Chambres</div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">-30%</div>
          <div class="sh-fcard-lbl">Commissions OTA</div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">4.7★</div>
          <div class="sh-fcard-lbl">Score Google</div>
        </div>
        <div class="sh-fcard fc4">
          <div class="sh-fcard-val">2 mois</div>
          <div class="sh-fcard-lbl">ROI atteint</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ SOLUTIONS IA ══════════════════════════════════════════════ -->
<section class="sh-solutions" id="solutions">
  <div class="container">
    <div class="sec-label">Solutions IA — Cœur de page</div>
    <h2 class="sec-title rv">Réceptionniste IA<br><em>multilingue 24/7</em></h2>

    <!-- KPI Grid -->
    <div class="sol-kpi-grid rv d1">
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+20<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Réservations directes</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">24/7</div>
        <div class="sol-kpi-lbl">Disponibilité</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+0.4<span style="font-size:.7em">pts</span></div>
        <div class="sol-kpi-lbl">Score Google</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">-30<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Commissions OTA</div>
      </div>
    </div>

    <!-- Feature Card -->
    <div class="sol-feature rv">
      <!-- Left: Content -->
      <div class="sol-fc-text">
        <div class="sol-fc-title"><strong>HW Concierge AI Hôtellerie</strong>Vente directe, conciergerie et upsell</div>
        <p class="sol-fc-desc">Agent complet assurant la vente de nuitées, les questions fréquentes et la conciergerie in-stay en 4 langues, connecté à votre PMS.</p>
        <ul class="sol-benefits">
          <li><i class="fa fa-check"></i><span><strong>Augmentation des réservations directes</strong> — Bypass des commissions OTA</span></li>
          <li><i class="fa fa-check"></i><span><strong>Réponse multilingue instantanée</strong> — FR, EN, AR, ES détectés automatiquement</span></li>
          <li><i class="fa fa-check"></i><span><strong>Automatisation requêtes simples</strong> — Horaires piscine, wifi, room service, taxi</span></li>
          <li><i class="fa fa-check"></i><span><strong>Upsell automatisé</strong> — Chambre supérieure, petit-déjeuner, late check-out</span></li>
          <li><i class="fa fa-check"></i><span><strong>Personnalisation client</strong> — Selon profil historique et préférences</span></li>
          <li><i class="fa fa-check"></i><span><strong>Notification housekeeping</strong> — Requêtes in-stay transmises directement au staff</span></li>
        </ul>
        <div class="sol-roi-box">
          <div class="sol-roi-num">-30%</div>
          <div class="sol-roi-text"><strong>de commissions OTA pour un hôtel 4★ de 80 chambres.</strong><br>Soit plusieurs centaines de milliers de dirhams économisés annuellement.</div>
        </div>
      </div>

      <!-- Right: WhatsApp CSS Mockup 3D -->
      <div class="sol-fc-visual">
        <div class="wa-scene" id="waScene">
          <div class="wa-glow"></div>

          <div class="wa-3d-group" id="wa3dGroup">
            <!-- WhatsApp logo badge -->
            <div class="wa-logo" aria-hidden="true">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            </div>

            <!-- Phone Frame -->
            <div class="wa-phone">
              <div class="wa-screen">
                <!-- Status bar -->
                <div class="wa-sbar">
                  <span class="wa-sbar-time">14:22</span>
                  <div class="wa-sbar-icons">
                    <i class="fa fa-signal"></i>
                    <i class="fa fa-wifi"></i>
                    <i class="fa fa-battery-three-quarters"></i>
                  </div>
                </div>
                <!-- Header -->
                <div class="wa-hdr">
                  <span class="wa-hdr-back">&#8592;</span>
                  <div class="wa-hdr-av">RJ</div>
                  <div class="wa-hdr-info">
                    <div class="wa-hdr-name">Riad Le Jardin · Marrakech</div>
                    <div class="wa-hdr-status">Concierge IA · En ligne</div>
                  </div>
                  <div class="wa-hdr-ico">
                    <i class="fa fa-video"></i>
                    <i class="fa fa-phone"></i>
                    <i class="fa fa-ellipsis-vertical"></i>
                  </div>
                </div>
                <!-- Chat -->
                <div class="wa-chat-area">
                  <div class="wa-bubble ai">Bonjour ! Welcome to Riad Le Jardin ✨ Disponible en 🇫🇷 🇬🇧 🇲🇦 🇪🇸 — Comment puis-je vous aider ?<span class="wa-bt">14:22</span></div>
                  <div class="wa-bubble pt">Bonjour, avez-vous une chambre pour 2 nuits en juin ? 🙏<span class="wa-bt">14:22</span></div>
                  <div class="wa-bubble ai">Bien sûr ! Pour 2 nuits en juin, nous avons :<br>🌹 Suite Palmeraie — 1 200 MAD/nuit<br>✨ Chambre Supérieure — 850 MAD/nuit<br>Vue jardin ou vue toits ?<span class="wa-bt">14:23</span></div>
                  <div class="wa-bubble pt">Suite Palmeraie vue jardin 🌿<span class="wa-bt">14:23</span></div>
                  <div class="wa-bubble ai">Excellent choix ! Souhaitez-vous inclure le <strong>petit-déjeuner hammam</strong> (+180 MAD/nuit) pour une expérience complète ?<span class="wa-bt">14:23</span></div>
                  <div class="wa-bubble pt">Oui parfait ✅<span class="wa-bt">14:24</span></div>
                  <div class="wa-dots-wrap"><span></span><span></span><span></span></div>
                </div>
                <!-- Input -->
                <div class="wa-irow">
                  <div class="wa-ifake">Écrire un message...</div>
                  <div class="wa-isend"><i class="fa fa-paper-plane"></i></div>
                </div>
                <!-- Android nav -->
                <div class="wa-navb">
                  <span>&#9664;</span><span>&#9711;</span><span>&#9632;</span>
                </div>
              </div>
            </div>

            <!-- Notification overlay -->
            <div class="wa-notif">
              <div class="wa-notif-hdr">
                <div class="wa-notif-av">Dr</div>
                <div>
                  <div class="wa-notif-name">Riad Le Jardin</div>
                  <div class="wa-notif-st">Agent IA · En ligne</div>
                </div>
              </div>
              <div class="wa-notif-msg">Réservation •<br>Suite Palmeraie · Juin</div>
              <div class="wa-notif-rep"><i class="fa fa-face-smile"></i> Répondre</div>
              <div class="wa-notif-acts">
                <div class="wa-notif-act">CLOSE</div>
                <div class="wa-notif-act">VIEW</div>
              </div>
            </div>

          </div><!-- /wa-3d-group -->
        </div><!-- /wa-scene -->
      </div>
    </div>

  </div>
</section>

<!-- ══ PARCOURS CLIENT — IMAGE PARALLAX + BEAM PROGRESSIF ════════ -->
<section class="sh-journey" id="parcours">

  <div class="jp-bg">
    <img id="jpImg" class="jp-img"
         src="<?php echo $siteURL; ?>images/hotel-parcours-bg.jpeg"
         alt="Riad luxe Marrakech"
         loading="eager"
         decoding="async"
         width="1584" height="672">
  </div>

  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Parcours client typique</div>
      <h2 class="sec-title rv">Expérience hôte<br><em>de A à Z</em></h2>
      <p class="rv d1">Trois canaux d'entrée, une expérience 5 étoiles. Choisissez le parcours correspondant à votre établissement.</p>

      <div class="tab-nav rv d2">
        <button class="tab-btn active" data-tab="wa">Via WhatsApp</button>
        <button class="tab-btn" data-tab="qr">Via Site Officiel</button>
        <button class="tab-btn" data-tab="web">In-Stay Conciergerie</button>
      </div>

      <!-- Tab 1: WhatsApp -->
      <div class="tab-pane active" id="tab-wa">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWa"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Demande WhatsApp</div><p class="jf-desc">Prospect demande une disponibilité via WhatsApp — réponse en moins de 2 secondes</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Proposition IA</div><p class="jf-desc">Chambres proposées avec photo, tarif direct et upsell pertinent (vue mer, demi-pension)</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Validation séjour</div><p class="jf-desc">Lien d'acompte sécurisé généré et envoyé directement dans la conversation</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Confirmation</div><p class="jf-desc">Email et SMS de confirmation avec QR code de check-in envoyés automatiquement</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Pré-arrivée</div><p class="jf-desc">Informations pratiques et services additionnels proposés avant l'arrivée</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Check-in facilité</div><p class="jf-desc">Procédures anticipées, chambre préparée selon préférences du client</p></div>
        </div>
      </div>

      <!-- Tab 2: Site Officiel -->
      <div class="tab-pane" id="tab-qr">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamQr"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Widget site</div><p class="jf-desc">Visiteur clique sur le chatbot intégré au site officiel de l'hôtel ou du riad</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Sélection chambre</div><p class="jf-desc">Disponibilités en temps réel filtrées par type et date, sans commission OTA</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Upsell services</div><p class="jf-desc">Petit-déjeuner, transfert aéroport, spa, activités suggérés selon le profil</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Réservation directe</div><p class="jf-desc">Paiement sécurisé CMI sans commission OTA — économie immédiate de 15-20%</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Confirmation</div><p class="jf-desc">Email + SMS avec QR code check-in et informations d'arrivée</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Avis post-séjour</div><p class="jf-desc">Demande Google/TripAdvisor automatique à J+1 après le départ du client</p></div>
        </div>
      </div>

      <!-- Tab 3: In-Stay -->
      <div class="tab-pane" id="tab-web">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWeb"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Requête in-stay</div><p class="jf-desc">Résident envoie une demande WhatsApp depuis sa chambre (serviettes, taxi…)</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Identification auto</div><p class="jf-desc">L'IA reconnaît le client et sa chambre automatiquement par historique</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Traitement requête</div><p class="jf-desc">Room service, housekeeping ou conciergerie notifié en temps réel</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Notification staff</div><p class="jf-desc">Équipe alertée instantanément avec numéro de chambre et détail de la demande</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Suivi client</div><p class="jf-desc">Client informé du délai d'intervention estimé via WhatsApp</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Late check-out</div><p class="jf-desc">Proposé à J-1 selon disponibilité, accepté ou refusé en 1 clic via WhatsApp</p></div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ INTÉGRATIONS — ACCORDION ════════════════════════════════ -->
<section class="sh-integrations" id="integrations">
  <div class="container">
    <div class="sec-label">Intégrations clés</div>
    <h2 class="sec-title rv">Connecté à votre<br><em>écosystème hôtelier</em></h2>

    <div class="sh-int-inner">

      <!-- Accordion -->
      <div class="accordion rv d1">

        <div class="acc-item open">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-building"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">PMS Hôteliers</span>
              <span class="acc-sub">Opera, Mews, Cloudbeds</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Connexion bidirectionnelle avec votre PMS hôtelier. Les réservations directes apparaissent instantanément dans Opera ou Mews. Les requêtes in-stay sont synchronisées avec les tâches housekeeping en temps réel, éliminant toute ressaisie manuelle.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-calendar-check"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Moteur de réservation</span>
              <span class="acc-sub">Booking Engine direct</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Intégration avec votre booking engine pour proposer des tarifs directs avantageux. Le client paie sans commission Booking.com — vous économisez 15 à 20% de commission sur chaque réservation directe, soit des centaines de milliers de dirhams annuellement.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-whatsapp"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">WhatsApp Multilingue</span>
              <span class="acc-sub">FR, EN, AR, ES natif</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>API WhatsApp officielle avec support de 4 langues détectées automatiquement. Le client écrit en anglais, l'IA répond en anglais. Taux d'ouverture 94%, réponse en moins de 2 secondes, disponible 24h/24 sans surcharge de personnel.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-credit-card"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Passerelles paiement</span>
              <span class="acc-sub">CMI, Stripe — acomptes directs</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Collecte d'acomptes de réservation directement dans la conversation WhatsApp ou le widget site. Remboursements automatiques selon conditions d'annulation. Support des cartes marocaines (CMI) et internationales (Stripe, Visa, Mastercard).</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-star"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">TripAdvisor &amp; Google</span>
              <span class="acc-sub">Avis &amp; e-réputation</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Collecte automatique d'avis TripAdvisor et Google à J+1 après le départ du client. Réponses automatisées aux avis négatifs. Un riad Marrakech a gagné +0,4 points Google en seulement 4 mois grâce à cette automatisation.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-project-diagram"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Channel Managers</span>
              <span class="acc-sub">Synchronisation tarifs &amp; disponibilités</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Connexion avec votre channel manager pour synchroniser les disponibilités en temps réel sur toutes les plateformes. L'agent IA ne propose jamais une chambre non disponible. Zéro surbooking, zéro double réservation, expérience client parfaite.</p>
            </div>
          </div>
        </div>

      </div>

      <!-- Visual Integration Hub -->
      <div class="sh-int-visual rv d2">
        <div class="sh-int-card">
          <div class="sec-label" style="margin-bottom:.8rem">Connexions actives</div>
          <div class="sh-int-orbit">
            <div class="sio-ring r1">
              <div class="sio-dot" style="top:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-calendar-check"></i></div>
              <div class="sio-dot" style="bottom:-18px;left:50%;transform:translateX(-50%)"><i class="fab fa-whatsapp"></i></div>
            </div>
            <div class="sio-ring r2">
              <div class="sio-dot" style="top:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-laptop-medical"></i></div>
              <div class="sio-dot" style="right:-18px;top:50%;transform:translateY(-50%)"><i class="fab fa-google"></i></div>
              <div class="sio-dot" style="bottom:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-credit-card"></i></div>
            </div>
            <div class="sio-ring r3">
              <div class="sio-dot" style="top:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-shield-alt"></i></div>
              <div class="sio-dot" style="right:-18px;top:50%;transform:translateY(-50%)"><i class="fal fa-sms"></i></div>
              <div class="sio-dot" style="bottom:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-qrcode"></i></div>
              <div class="sio-dot" style="left:-18px;top:50%;transform:translateY(-50%)"><i class="fal fa-bell"></i></div>
            </div>
            <div class="sio-center"><span>IA</span></div>
          </div>
          <div style="text-align:center;margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid var(--border)">
            <div style="font-family:var(--fm);font-size:.58rem;font-weight:600;letter-spacing:.15em;text-transform:uppercase;color:var(--txt2)">Intégration en quelques heures</div>
            <div style="font-family:var(--fm);font-size:.72rem;color:var(--txt);margin-top:.4rem;font-weight:300">Aucune refonte de votre système existant</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ DÉPLOIEMENT ═══════════════════════════════════════════════ -->
<!-- ══ DÉPLOIEMENT — TIMELINE LIGHT (style solutions-ia) ════════ -->
<section class="sdtl-section" id="deploiement">

  <!-- 3D Background orb subtil -->
  <div class="sdtl-orb-wrap" aria-hidden="true">
    <div class="sdtl-orb" id="sdtlOrb">
      <div class="sdtl-orb-ring r1"></div>
      <div class="sdtl-orb-ring r2"></div>
      <div class="sdtl-orb-ring r3"></div>
      <div class="sdtl-orb-ring r4"></div>
    </div>
  </div>

  <div class="container">
    <div class="sdtl-header">
      <div class="sec-label">Déploiement adapté Hôtellerie</div>
      <h2 class="sec-title rv">Déploiement hôtelier<br><em>en 3 phases clés</em></h2>
      <p class="sdtl-intro rv d1">Une méthodologie éprouvée pour déployer votre concierge IA, réduire vos commissions OTA et atteindre le ROI en 5 mois.</p>
    </div>

    <div class="sdtl-timeline" id="sdtlTimeline">
      <!-- Spine -->
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <!-- ── PHASE 0 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Audit PMS &amp; flux</div>
            <p class="sdtl-desc">Cartographie du PMS, langues supportées, processus conciergerie, outils digitaux en place. Analyse des flux OTA vs direct.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Rapport audit PMS</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Cartographie des flux</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Plan de réduction OTA</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Langues configurées</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 1 – 2</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-search"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Audit</div>
        </div>
      </div>

      <!-- ── PHASE 1 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword">Avant-saison</div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-flask"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">2</div>
            <div class="sdtl-title">Pilote avant-saison</div>
            <p class="sdtl-desc">Entraînement sur la base de connaissances hôtelière, tests multilingues, scénarios conciergerie in-stay, intégration PMS.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Concierge IA entraîné</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Tests multilingues validés</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Scénarios conciergerie</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Intégration PMS OK</span></div>
            </div>
            <span class="sdtl-tag">SEMAINES 3 – 6</span>
          </div>
        </div>
      </div>

      <!-- ── PHASE 2 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title">Go-live pleine saison</div>
            <p class="sdtl-desc">Mise en production avec supervision 24/7 pendant les 30 premiers jours, ajustement des prompts selon feedback terrain réel.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Concierge opérationnel</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Dashboard conciergerie</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Base de connaissances</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Formation réceptionnistes</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 7 – 10</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-rocket"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Pleine saison</div>
        </div>
      </div>

    </div><!-- /sdtl-timeline -->
  </div>
</section>

<!-- ══ CAS CLIENT ════════════════════════════════════════════════ -->
<section class="sh-case" id="cas-client">
  <div class="container">
    <div class="sec-label">Cas client — Étude de succès</div>
    <h2 class="sec-title rv">Résultats concrets<br><em>en hôtellerie</em></h2>

    <div class="case-wrap rv d1">

      <!-- Left: Context + Problem -->
      <div class="case-left">
        <div class="case-tag">Étude de cas · Riad haut de gamme · Marrakech</div>
        <h3 class="case-headline">Riad haut de gamme<br>22 chambres, 75% dépendance OTA</h3>
        <p class="case-ctx"><strong>Contexte :</strong> Riad avec 22 chambres, 75% des réservations via Booking.com et Expedia, score Google 4,3 étoiles. Équipe impossible de répondre 24/7 aux prospects internationaux.</p>
        <div class="case-problem">
          <div class="case-problem-label">Problème identifié</div>
          <div class="case-problem-text">75% des réservations via OTA → commissions de 18-20% par nuit. Score Google 4,3 stagnant. Équipe de réception débordée aux heures de pointe multilingues. Impossible de répondre 24/7 aux prospects internationaux.</div>
        </div>
        <div>
          <div class="case-solution-label" style="font-family:var(--fm);font-size:.55rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--txt2);margin-bottom:.45rem">Solution déployée</div>
          <div class="case-solution-text" style="font-size:.8rem;color:var(--txt2);line-height:1.8">HW Concierge AI + WhatsApp multilingue (FR/EN/AR/ES) + Booking Engine direct intégré. Formation des réceptionnistes à la supervision de l'agent IA.</div>
        </div>
      </div>

      <!-- Right: Results -->
      <div class="case-right">
        <div>
          <div class="results-title">Résultats observés après 4 mois</div>
          <div class="results-big-grid">
            <div class="result-big">
              <div class="result-big-val">41%</div>
              <div class="result-big-lbl">Réservations directes</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">+0.4<span style="font-size:.7em">pts</span></div>
              <div class="result-big-lbl">Score Google</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">180K</div>
              <div class="result-big-lbl">MAD commissions économisées</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">5<span style="font-size:.7em">mois</span></div>
              <div class="result-big-lbl">ROI atteint</div>
            </div>
          </div>
        </div>
        <div class="case-testimonial">
          <p class="ct-text">Nos clients internationaux apprécient de pouvoir réserver en français ou en anglais sans attendre. Notre équipe se concentre enfin sur l'expérience physique et la relation client en présentiel.</p>
          <div class="ct-author">— Directeur Général, Riad Marrakech</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ FINAL CTA ════════════════════════════════════════════════ -->
 <section class="cta-band" style="background: url(<?php echo $siteURL; ?>images/hotel.jpg);">
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(14rem,30vw,44rem);bottom:-2rem;right:-1rem;color:rgba(247,245,242,.022)" aria-hidden="true">Hôtel</span>
  <div class="container" style="position:relative;z-index:2">
    <div class="sec-label">Vous êtes prêt à passer à l’action ?</div>
    <h2 class="sec-title" style="text-align:center;margin-bottom:1.5rem">Boostez vos réservations directes <br>et votre qualité <em>de service</em></h2>
    <p class="cta-sub">Offrez à vos prospects et à vos clients un réceptionniste IA capable de répondre immédiatement, de gérer les demandes fréquentes, de fluidifier la relation client et de soutenir la performance commerciale de votre établissement.</p>
    <div class="cta-btns">
      <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un audit IA gratuit" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Demander un audit IA gratuit</span></div>
          <div class="sb-knob"><i class="fal fa-hotel"></i></div>
        </a>
    
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Réserver une démo hôtellerie" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Réserver une démo hôtellerie</span></div>
          <div class="sb-knob"><i class="fal fa-calculator"></i></div>
        </a>
    </div>
  </div>
</section>

<script>
/* ── ANIMATED COUNTERS ── */
(function(){
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
})();

/* ── TABS ── */
(function(){
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
        // Re-trigger 3D reveal for new tab's steps
        target.querySelectorAll('.jf-step').forEach((s,i) => {
          s.classList.remove('jf-in');
          setTimeout(() => s.classList.add('jf-in'), i * 80);
        });
        // Beam replay handled by journey IIFE
      }
    });
  });
})();


/* ── SANTE DEPLOY TIMELINE — SCROLL-DRIVEN (light) ── */
(function(){
  const timeline  = document.getElementById('sdtlTimeline');
  const spineFill = document.getElementById('sdtlSpineFill');
  const orb       = document.getElementById('sdtlOrb');
  const steps     = document.querySelectorAll('.sdtl-step');
  if(!timeline || !spineFill) return;

  let rafId = null;
  function updateTimeline(){
    const rect = timeline.getBoundingClientRect();
    const vh   = window.innerHeight;
    /* Spine fill: progresse quand la section scroll dans le viewport */
    const raw  = (vh * 0.65 - rect.top) / (rect.height + vh * 0.05);
    const p    = Math.max(0, Math.min(1, raw));
    spineFill.style.height = (p * 100) + '%';
    /* Orb rotation liée au scroll global */
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

  /* Steps: activés à l'entrée dans le viewport (22% visible) */
  const stepIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(e.isIntersecting){
        e.target.classList.add('active');
      } else {
        /* si le step repasse en dessous (scroll up) → désactiver */
        if(e.boundingClientRect.top > 0) e.target.classList.remove('active');
      }
    });
  }, {threshold: 0.22});
  steps.forEach(s => stepIO.observe(s));

  window.addEventListener('scroll', onScroll, {passive:true});
  window.addEventListener('resize', onScroll, {passive:true});
  updateTimeline();
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

/* ── ACCORDION ── */
(function(){
  const items = document.querySelectorAll('.acc-item');
  items.forEach(item => {
    const trigger = item.querySelector('.acc-trigger');
    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');
      items.forEach(i => i.classList.remove('open'));
      if(!isOpen) item.classList.add('open');
    });
  });
})();

/* ── WA CSS PHONE 3D : REVEAL + MOUSE TILT + SCROLL PARALLAX ── */
(function(){
  const scene = document.getElementById('waScene');
  const group = document.getElementById('wa3dGroup');
  if(!scene || !group) return;

  /* SCROLL REVEAL — fade + 3D entry animation */
  const revIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(e.isIntersecting){ group.classList.add('wa-revealed'); revIO.unobserve(group); }
    });
  }, {threshold:.15});
  revIO.observe(group);

  const BASE_Y = -13, BASE_X = 5;

  /* Current scroll-based resting rotation */
  function scrollProgress(){
    const r   = scene.getBoundingClientRect();
    const mid = r.top + r.height / 2;
    return (window.innerHeight / 2 - mid) / (window.innerHeight / 2);
  }
  function restY(){ return BASE_Y + scrollProgress() * 6; }
  function restX(){ return BASE_X - scrollProgress() * 3; }

  /* MOUSE TILT — responsive real-time 3D */
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
    const dx = ((e.clientX - r.left) / r.width  - .5) * 2; /* -1..+1 */
    const dy = ((e.clientY - r.top)  / r.height - .5) * 2;
    group.style.transform = `rotateY(${BASE_Y + dx * 16}deg) rotateX(${BASE_X - dy * 9}deg) scale(1.02)`;
  });

  /* SCROLL PARALLAX — continuous subtle rotation tied to scroll */
  let raf = null;
  window.addEventListener('scroll', () => {
    if(hovering) return;
    if(!raf) raf = requestAnimationFrame(() => {
      group.style.transform = `rotateY(${restY()}deg) rotateX(${restX()}deg)`;
      raf = null;
    });
  }, {passive:true});
})();
</script>