<!-- ══ HERO ══════════════════════════════════════════════════════ -->
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>

  <div class="sh-hero-body">
    <div class="container">
      <div class="sh-hero-inner">

        <!-- LEFT -->
        <div class="sh-hero-left">
          <div class="sh-breadcrumb rv">Solutions IA — Secteur Restauration</div>
          <h1 class="sh-h1 rv d1">
           <?php echo !empty($secteur->getH1()) ? $secteur->getH1() : $secteur->getTitre(); ?>
          </h1>
          <p class="sh-sub rv d2">Automatisez vos prises de commandes et fidélisez votre clientèle avec un service irréprochable, même en plein coup de feu.</p>
          <div class="sh-cta-row rv d3">
              <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander une démo Restaurant" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander une démo Restaurant</span></div>
              <div class="sb-knob"><i class="fal fa-utensils-alt"></i></div>
            </a>
        
            <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Tester un menu IA en live" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Tester un menu IA en live</span></div>
              <div class="sb-knob"><i class="fal fa-search"></i></div>
            </a>
          </div>
          <div class="sh-badges rv d4">
            <div class="sh-badge"><div class="sh-badge-val">+15<span style="font-size:.9em">%</span></div><div class="sh-badge-lbl">Panier moyen</div></div>
            <div class="sh-badge"><div class="sh-badge-val">100%</div><div class="sh-badge-lbl">Cmd. traitées</div></div>
            <div class="sh-badge"><div class="sh-badge-val">+35<span style="font-size:.9em">%</span></div><div class="sh-badge-lbl">Conversion</div></div>
            <div class="sh-badge"><div class="sh-badge-val">2 mois</div><div class="sh-badge-lbl">ROI atteint</div></div>
          </div>
        </div>

        <!-- RIGHT — 3D Medical Orbital -->
        <div class="sh-hero-right">
          <div class="sho-scene">
            <div class="sho-ring r1"></div>
            <div class="sho-ring r2"></div>
            <div class="sho-ring r3"></div>
            <div class="sho-core">
              <div class="sho-plus">🍽</div>
              <div class="sho-lbl">Resto IA</div>
            </div>

            <!-- Inner orbit (r=100px) -->
            <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="POS Clyo"><i class="fal fa-cash-register"></i></div></div>
            <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="WhatsApp"><i class="fab fa-whatsapp"></i></div></div>
            <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Google My Business"><i class="fab fa-google"></i></div></div>

            <!-- Middle orbit (r=170px) -->
            <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="Paiement CMI"><i class="fal fa-credit-card"></i></div></div>
            <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="Glovo"><i class="fal fa-motorcycle"></i></div></div>
            <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="Menu IA"><i class="fal fa-utensils"></i></div></div>
            <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Uber Eats"><i class="fal fa-shopping-bag"></i></div></div>

            <!-- Outer orbit (r=222px) -->
            <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="Lightspeed"><i class="fal fa-bolt"></i></div></div>
            <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="QR Code Table"><i class="fal fa-qrcode"></i></div></div>
            <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="Programme Fidélité"><i class="fal fa-star"></i></div></div>
            <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="Analytics ventes"><i class="fal fa-chart-line"></i></div></div>
            <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="n8n / Make"><i class="fal fa-project-diagram"></i></div></div>
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
        <div class="sh-stat-val">+<span class="sh-counter" data-target="15">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Panier moyen augmenté</div>
        <div class="sh-stat-sub">Upsell systématique boisson/dessert</div>
      </div>
      <div class="sh-stat rv d1">
        <div class="sh-stat-val"><span class="sh-counter" data-target="100">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Commandes traitées</div>
        <div class="sh-stat-sub">Sans standardiste humain</div>
      </div>
      <div class="sh-stat rv d2">
        <div class="sh-stat-val">+<span class="sh-counter" data-target="35">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Taux de conversion</div>
        <div class="sh-stat-sub">Commandes converties vs perdues</div>
      </div>
      <div class="sh-stat rv d3">
        <div class="sh-stat-val"><span class="sh-counter" data-target="7">0</span><span class="suf"> sem</span></div>
        <div class="sh-stat-lbl">ROI atteint</div>
        <div class="sh-stat-sub">Par rapport à l'investissement</div>
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
        <h2 class="sh-ctx-title rv"><strong>Secteur Restauration</strong>Défis des pics<br>d'activité au Maroc</h2>
        <div class="sh-ctx-body rv d1">
          <p>La restauration urbaine au Maroc fait face à d'importants défis lors des pics d'activité : <em>lignes téléphoniques occupées</em>, erreurs de commande et perte de chiffre d'affaires. Une IA transactionnelle permet d'absorber <em>100% des flux entrants</em> sans recruter de standardistes supplémentaires, tout en incitant à la vente additionnelle.</p>
          <p>Les clients marocains commandent désormais majoritairement via WhatsApp et plateformes de livraison. Les enseignes qui ne proposent pas un service conversationnel fluide <em>perdent des parts de marché</em> au profit de concurrents mieux outillés. L'IA devient un standard pour absorber les volumes sans dégrader la qualité.</p>
        </div>
        <div class="sh-pills rv d2">
          <span class="sh-pill"><i class="fa fa-exclamation-triangle"></i> Pics d'activité</span>
          <span class="sh-pill"><i class="fa fa-phone-slash"></i> Appels perdus midi/soir</span>
          <span class="sh-pill"><i class="fa fa-ban"></i> Erreurs de commande</span>
          <span class="sh-pill"><i class="fa fa-motorcycle"></i> Livraison non gérée</span>
          <span class="sh-pill"><i class="fa fa-chart-line"></i> CA en baisse heures de pointe</span>
        </div>
      </div>

      <!-- CSS ART Visual -->
      <div class="sh-ctx-visual rv d2">
        <div class="sh-ctx-blob"></div>
        <div class="sh-ctx-blob2"></div>
        <div class="sh-ctx-center"><div class="sh-ctx-cross">🍽</div></div>
        <div class="sh-fcard fc1">
          <div class="sh-fcard-val">1200</div>
          <div class="sh-fcard-lbl">Cmd/mois</div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">+18%</div>
          <div class="sh-fcard-lbl">Panier moyen</div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">78%</div>
          <div class="sh-fcard-lbl">Automatisé</div>
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
    <h2 class="sec-title rv">Bot transactionnel<br><em>commandes &amp; livraison</em></h2>

    <!-- KPI Grid -->
    <div class="sol-kpi-grid rv d1">
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+15<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Panier moyen</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+35<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Taux de conversion</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">2 mois</div>
        <div class="sol-kpi-lbl">ROI atteint</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">100<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Commandes auto</div>
      </div>
    </div>

    <!-- Feature Card -->
    <div class="sol-feature rv">
      <!-- Left: Content -->
      <div class="sol-fc-text">
        <div class="sol-fc-title"><strong>Agent Commande Restaurant</strong>Zéro perte d'appel, upsell systématique</div>
        <p class="sol-fc-desc">Bot conversationnel transactionnel gérant les commandes à emporter, la livraison et les réservations de tables, avec menu dynamique IA et upsell intégré.</p>
        <ul class="sol-benefits">
          <li><i class="fa fa-check"></i><span><strong>Zéro perte d'appel en plein service</strong> — 100% des flux entrants absorbés</span></li>
          <li><i class="fa fa-check"></i><span><strong>Upselling systématique</strong> — Boisson/dessert proposés à chaque commande</span></li>
          <li><i class="fa fa-check"></i><span><strong>Fidélisation automatisée</strong> — Carnet d'adresses intelligent par client</span></li>
          <li><i class="fa fa-check"></i><span><strong>Gestion des réclamations</strong> — Première ligne sans intervention humaine</span></li>
          <li><i class="fa fa-check"></i><span><strong>Dispatch automatique</strong> — Vers livreurs partenaires (Glovo, Uber Eats)</span></li>
          <li><i class="fa fa-check"></i><span><strong>Menu dynamique IA</strong> — Avec photos, allergènes et suggestions contextuelles</span></li>
        </ul>
        <div class="sol-roi-box">
          <div class="sol-roi-num">2 ETP</div>
          <div class="sol-roi-text"><strong>économie dans une franchise à 5 points de vente.</strong><br>100% des commandes WhatsApp traitées sans intervention humaine.</div>
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
                  <span class="wa-sbar-time">12:45</span>
                  <div class="wa-sbar-icons">
                    <i class="fa fa-signal"></i>
                    <i class="fa fa-wifi"></i>
                    <i class="fa fa-battery-three-quarters"></i>
                  </div>
                </div>
                <!-- Header -->
                <div class="wa-hdr">
                  <span class="wa-hdr-back">&#8592;</span>
                  <div class="wa-hdr-av">RM</div>
                  <div class="wa-hdr-info">
                    <div class="wa-hdr-name">Restaurant Le Medina</div>
                    <div class="wa-hdr-status">Agent IA · En ligne</div>
                  </div>
                  <div class="wa-hdr-ico">
                    <i class="fa fa-video"></i>
                    <i class="fa fa-phone"></i>
                    <i class="fa fa-ellipsis-vertical"></i>
                  </div>
                </div>
                <!-- Chat -->
                <div class="wa-chat-area">
                  <div class="wa-bubble ai">Bonjour ! Bienvenue chez Le Medina 🍽️ Souhaitez-vous commander, réserver ou suivre votre livraison ?<span class="wa-bt">12:43</span></div>
                  <div class="wa-bubble pt">Commander à emporter s'il vous plaît 🙏<span class="wa-bt">12:44</span></div>
                  <div class="wa-bubble ai">Super ! Voici notre menu du jour :<br>🥘 Tajine Agneau — 85 MAD<br>🍗 Poulet Chermoula — 75 MAD<br>🐟 Poisson Grillé — 95 MAD<br>Que désirez-vous ?<span class="wa-bt">12:44</span></div>
                  <div class="wa-bubble pt">Tajine Agneau ✅<span class="wa-bt">12:44</span></div>
                  <div class="wa-bubble ai">Excellent choix ! Puis-je vous suggérer un <strong>jus d'orange frais</strong> (25 MAD) ou une <strong>eau minérale</strong> (10 MAD) ?<span class="wa-bt">12:44</span></div>
                  <div class="wa-bubble pt">Jus d'orange merci 🍊<span class="wa-bt">12:45</span></div>
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
                  <div class="wa-notif-name">Restaurant Le Medina</div>
                  <div class="wa-notif-st">Agent IA · En ligne</div>
                </div>
              </div>
              <div class="wa-notif-msg">Commande prête •<br>Tajine + Jus Orange</div>
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
         src="<?php echo $siteURL; ?>images/restaurant-parcours-bg.jpeg"
         alt="Restaurant moderne Maroc"
         loading="eager"
         decoding="async"
         width="1584" height="672">
  </div>

  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Parcours client typique</div>
      <h2 class="sec-title rv">Expérience client<br><em>de A à Z</em></h2>
      <p style="font-size:.9rem;color:var(--bg);max-width:580px;line-height:1.9;font-weight:300;margin-bottom:0" class="rv d1">Trois canaux d'entrée, une expérience unifiée. Choisissez le parcours correspondant à votre enseigne.</p>

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

<!-- ══ INTÉGRATIONS — ACCORDION ════════════════════════════════ -->
<section class="sh-integrations" id="integrations">
  <div class="container">
    <div class="sec-label">Intégrations clés</div>
    <h2 class="sec-title rv">Connecté à votre<br><em>écosystème restaurant</em></h2>

    <div class="sh-int-inner">

      <!-- Accordion -->
      <div class="accordion rv d1">

        <div class="acc-item open">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-cash-register"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Systèmes POS</span>
              <span class="acc-sub">Clyo, Micros, Lightspeed</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Synchronisation des commandes en temps réel avec votre caisse. Les commandes reçues via l'agent IA sont transmises directement en cuisine sans ressaisie, éliminant les erreurs et les délais. Compatible avec les principaux POS utilisés au Maroc (Clyo, Micros, Lightspeed).</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-credit-card"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Plateformes de paiement</span>
              <span class="acc-sub">CMI, Stripe — liens sécurisés</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Génération de liens de paiement sécurisés directement dans la conversation WhatsApp. Acomptes de réservation, règlement à la commande, remboursements automatiques en cas d'annulation. Support des cartes marocaines (CMI) et internationales (Stripe).</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-whatsapp"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">WhatsApp Business API</span>
              <span class="acc-sub">Canal principal de commande</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>API officielle Meta pour conversations natives dans WhatsApp. Taux d'ouverture moyen 94% vs 21% pour l'email. Modèles de messages pré-approuvés, analytics de conversion, conformité RGPD totale. Vos clients commandent dans l'app qu'ils utilisent déjà chaque jour.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-motorcycle"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Plateformes livraison</span>
              <span class="acc-sub">Glovo, Uber Eats via agrégateur</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Intégration via agrégateur pour centraliser toutes les commandes livraison dans un seul flux de travail. Dispatch automatique au livreur disponible, suivi GPS partagé avec le client, confirmation automatique à chaque étape.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-google"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Google My Business</span>
              <span class="acc-sub">Avis &amp; visibilité locale</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Collecte automatique d'avis Google après chaque commande ou livraison réussie. Amélioration continue du score Google, réponses automatisées aux avis négatifs. Meilleure visibilité locale et référencement Google Maps pour attirer de nouveaux clients.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-project-diagram"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">n8n / Make</span>
              <span class="acc-sub">Workflows automation</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Orchestration de tous les flux automatisés : relances paniers abandonnés, campagnes fidélité SMS, reporting hebdomadaire automatique pour le gérant, alertes stock faible. Console de monitoring centralisée pour les franchises multi-sites.</p>
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
              <div class="sio-dot" style="top:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-cash-register"></i></div>
              <div class="sio-dot" style="bottom:-18px;left:50%;transform:translateX(-50%)"><i class="fab fa-whatsapp"></i></div>
            </div>
            <div class="sio-ring r2">
              <div class="sio-dot" style="top:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-utensils"></i></div>
              <div class="sio-dot" style="right:-18px;top:50%;transform:translateY(-50%)"><i class="fal fa-motorcycle"></i></div>
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
      <div class="sec-label">Déploiement adapté Restauration</div>
      <h2 class="sec-title rv">Déploiement multi-sites<br><em>en 3 phases</em></h2>
      <p class="sdtl-intro rv d1">Une méthodologie éprouvée pour déployer votre bot de commande sur un ou plusieurs points de vente, avec ROI atteint en 7 semaines.</p>
    </div>

    <div class="sdtl-timeline" id="sdtlTimeline">
      <!-- Spine -->
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <!-- ── PHASE 0 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Pilote 1 point de vente</div>
            <p class="sdtl-desc">Cadrage du menu conversationnel, format de commande adapté, intégration POS et paiement, formation du manager de salle à la supervision.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Workflow n8n configuré</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Menu conversationnel IA</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Intégration POS testée</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Formation équipe</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 1 – 4</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-store"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Test réel</div>
        </div>
      </div>

      <!-- ── PHASE 1 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword">Pilote</div>
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
            <div class="sdtl-title">Test en conditions réelles</div>
            <p class="sdtl-desc">4 semaines en pic d'activité (vendredi soir, midi semaine) pour valider fiabilité, temps de réponse et taux de conversion réels.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Rapport de fiabilité</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Ajustements menu IA</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Taux conversion validé</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Optimisations upsell</span></div>
            </div>
            <span class="sdtl-tag">SEMAINES 5 – 6</span>
          </div>
        </div>
      </div>

      <!-- ── PHASE 2 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title">Déploiement multi-sites</div>
            <p class="sdtl-desc">Réplication sur l'ensemble du réseau, harmonisation des menus, monitoring centralisé, console de supervision pour les managers.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Console monitoring</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Manuel hôte digital</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Tous sites déployés</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Dashboard temps réel</span><i class="fa fa-circle"></i></div>
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
          <div class="sdtl-keyword">Multi-sites</div>
        </div>
      </div>

    </div><!-- /sdtl-timeline -->
  </div>
</section>

<!-- ══ CAS CLIENT ════════════════════════════════════════════════ -->
<section class="sh-case" id="cas-client">
  <div class="container">
    <div class="sec-label">Cas client — Étude de succès</div>
    <h2 class="sec-title rv">Résultats concrets<br><em>en restauration</em></h2>

    <div class="case-wrap rv d1">

      <!-- Left: Context + Problem -->
      <div class="case-left">
        <div class="case-tag">Étude de cas · Franchise Restauration · Casablanca</div>
        <h3 class="case-headline">Franchise restauration rapide<br>8 points de vente, 1 200 cmd/mois</h3>
        <p class="case-ctx"><strong>Contexte :</strong> Franchise avec 8 points de vente traitant 1 200 commandes par mois. Files d'attente téléphoniques saturées à 13h, 3 standardistes débordés, commandes perdues aux heures de pointe.</p>
        <div class="case-problem">
          <div class="case-problem-label">Problème identifié</div>
          <div class="case-problem-text">23% des appels non décrochés entre 12h–14h. Standardistes occupés à 100% pendant le service. Panier moyen stagnant sans upsell systématique. Perte estimée à 18 000 MAD/mois de CA non réalisé.</div>
        </div>
        <div>
          <div class="case-solution-label" style="font-family:var(--fm);font-size:.55rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--txt2);margin-bottom:.45rem">Solution déployée</div>
          <div class="case-solution-text" style="font-size:.8rem;color:var(--txt2);line-height:1.8">HW WhatsApp Agent + menu dynamique conversationnel + intégration POS Clyo. Formation des managers à la supervision de l'agent IA sur 5 points de vente pilotes.</div>
        </div>
      </div>

      <!-- Right: Results -->
      <div class="case-right">
        <div>
          <div class="results-title">Résultats observés après 7 semaines</div>
          <div class="results-big-grid">
            <div class="result-big">
              <div class="result-big-val">+18<span style="font-size:.7em">%</span></div>
              <div class="result-big-lbl">Panier moyen</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">78%</div>
              <div class="result-big-lbl">Commandes auto</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">1.5 ETP</div>
              <div class="result-big-lbl">Économisé / site</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">7<span style="font-size:.7em">sem</span></div>
              <div class="result-big-lbl">ROI atteint</div>
            </div>
          </div>
        </div>
        <div class="case-testimonial">
          <p class="ct-text">Nos équipes ne perdent plus aucune commande en période de rush. Le bot propose automatiquement les desserts et boissons — notre panier moyen a bondi en quelques semaines.</p>
          <div class="ct-author">— Direction, Franchise Restauration Casablanca</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ FINAL CTA ════════════════════════════════════════════════ -->
 <section class="cta-band" style="background: url(<?php echo $siteURL; ?>images/restaurant.jpg);">
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(14rem,30vw,44rem);bottom:-2rem;right:-1rem;color:rgba(247,245,242,.022)" aria-hidden="true">Santé</span>
  <div class="container" style="position:relative;z-index:2">
    <div class="sec-label">Vous êtes prêt à passer à l’action ?</div>
    <h2 class="sec-title" style="text-align:center;margin-bottom:1.5rem">Restaurant : accélérez vos <br>commandes sans alourdir <br><em>vos équipes</em></h2>
    <p class="cta-sub">Déployez un agent IA capable de gérer les prises de commande, les réservations et les demandes clients sur WhatsApp, même pendant les heures de pointe, tout en soutenant vos objectifs de vente et de fidélisation.</p>
    <div class="cta-btns">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un audit Restauration" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="sb-label"><span class="sb-hint">Demander un audit IA gratuit</span></div>
            <div class="sb-knob"><i class="fal fa-utensils-alt"></i></div>
        </a>

        <a href="mailto:<?php echo $config->getEmail(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Tester un menu IA en live" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="sb-label"><span class="sb-hint">Tester une démo restaurant</span></div>
            <div class="sb-knob"><i class="fal fa-download"></i></div>
        </a>
    </div>
  </div>
</section>

<script src="<?php echo $siteURL; ?>assets/js/secteur.js"></script>
