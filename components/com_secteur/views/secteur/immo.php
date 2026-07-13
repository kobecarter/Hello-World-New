<?php if ($_SESSION['lang'] === 'en'): ?>

<!-- ══ HERO ══════════════════════════════════════════════════════ -->
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>

  <div class="sh-hero-body">
    <div class="container">
      <div class="sh-hero-inner">

        <!-- LEFT -->
        <div class="sh-hero-left">
          <div class="sh-breadcrumb rv">AI Solutions — Real Estate Sector</div>
          <h1 class="sh-h1 rv d1">
            <?php echo !empty($secteur->getH1()) ? $secteur->getH1() : $secteur->getTitre(); ?>
          </h1>
          <p class="sh-sub rv d2">Automate your lead qualification and dominate the Moroccan real estate market with tireless virtual sales agents.</p>
          <div class="sh-cta-row rv d3">
              <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Discover Real Estate AI" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Discover Real Estate AI</span></div>
              <div class="sb-knob"><i class="fal fa-key"></i></div>
            </a>

            <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Calculate my SDR savings" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Calculate my SDR savings</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
          </div>
        </div>

        <!-- RIGHT — 3D Medical Orbital -->
        <div class="sh-hero-right">
          <div class="sho-scene">
            <div class="sho-ring r1"></div>
            <div class="sho-ring r2"></div>
            <div class="sho-ring r3"></div>
            <div class="sho-core">
              <div class="sho-plus">🏢</div>
              <div class="sho-lbl">Real Estate AI</div>
            </div>

            <!-- Inner orbit (r=100px) -->
            <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="Salesforce CRM"><i class="fab fa-salesforce"></i></div></div>
            <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="WhatsApp"><i class="fab fa-whatsapp"></i></div></div>
            <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Facebook Lead Ads"><i class="fab fa-facebook"></i></div></div>

            <!-- Middle orbit (r=170px) -->
            <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="HubSpot"><i class="fab fa-hubspot"></i></div></div>
            <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="Calendly"><i class="fal fa-calendar-check"></i></div></div>
            <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="Mubawab"><i class="fal fa-house"></i></div></div>
            <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Avito Maroc"><i class="fal fa-tag"></i></div></div>

            <!-- Outer orbit (r=222px) -->
            <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="VoIP / SIP"><i class="fal fa-phone-volume"></i></div></div>
            <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="Instagram Ads"><i class="fab fa-instagram"></i></div></div>
            <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="Qualification score"><i class="fal fa-star-half-alt"></i></div></div>
            <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="Site progress reporting"><i class="fal fa-hard-hat"></i></div></div>
            <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="Google Calendar"><i class="fab fa-google"></i></div></div>
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
        <div class="sh-stat-val">+<span class="sh-counter" data-target="30">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Site visits</div>
        <div class="sh-stat-sub">Boosted lead-to-visit conversion</div>
      </div>
      <div class="sh-stat rv d1">
        <div class="sh-stat-val" style="font-size:clamp(2rem,4vw,4rem)">&lt;1<span class="suf"> min</span></div>
        <div class="sh-stat-lbl">Lead processing</div>
        <div class="sh-stat-sub">Contacted before the competition</div>
      </div>
      <div class="sh-stat rv d2">
        <div class="sh-stat-val">+<span class="sh-counter" data-target="22">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Lead-to-sale conversion</div>
        <div class="sh-stat-sub">Precise AI qualification score</div>
      </div>
      <div class="sh-stat rv d3">
        <div class="sh-stat-val"><span class="sh-counter" data-target="4">0</span><span class="suf"> months</span></div>
        <div class="sh-stat-lbl">ROI achieved</div>
        <div class="sh-stat-sub">~360,000 MAD/year savings</div>
      </div>
    </div>
  </div>
</section>

<!-- ══ CONTEXTE & ENJEUX ════════════════════════════════════════ -->
<section class="sh-context">
  <div class="container">
    <div class="sh-context-inner">

      <div>
        <div class="sec-label">Context &amp; Challenges</div>
        <h2 class="sh-ctx-title rv"><strong>Real Estate Sector</strong>Lost leads<br>cost millions</h2>
        <div class="sh-ctx-body rv d1">
          <p>Developers and agencies in Morocco generate massive volumes of digital leads, but suffer from <em>processing times that are too slow</em>. A lead not contacted within 15 minutes loses 80% of its conversion chances. AI steps in as a virtual SDR that qualifies the prospect <em>instantly, day and night</em>.</p>
          <p>Competition is fierce in Marrakech, Casablanca, Tangier and the Atlantic coast. Buyers demand <em>total transparency</em> on construction progress and constant sales responsiveness. Developers who industrialize their sales force with AI gain a <em>structural advantage</em> over their competitors.</p>
        </div>
        <div class="sh-pills rv d2">
          <span class="sh-pill"><i class="fa fa-exclamation-triangle"></i> Leads not handled in time</span>
          <span class="sh-pill"><i class="fa fa-clock"></i> Delay > 15 min = -80% conversion</span>
          <span class="sh-pill"><i class="fa fa-ban"></i> Human SDRs overwhelmed</span>
          <span class="sh-pill"><i class="fa fa-hard-hat"></i> Manual site reporting</span>
          <span class="sh-pill"><i class="fa fa-chart-line"></i> Increased OTA competition</span>
        </div>
      </div>

      <!-- CSS ART Visual -->
      <div class="sh-ctx-visual rv d2">
        <div class="sh-ctx-blob"></div>
        <div class="sh-ctx-blob2"></div>
        <div class="sh-ctx-center"><div class="sh-ctx-cross">🏢</div></div>
        <div class="sh-fcard fc1">
          <div class="sh-fcard-val">1000</div>
          <div class="sh-fcard-lbl">Leads/month</div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">72%</div>
          <div class="sh-fcard-lbl">Qualification</div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">+45%</div>
          <div class="sh-fcard-lbl">Site visits</div>
        </div>
        <div class="sh-fcard fc4">
          <div class="sh-fcard-val">2 months</div>
          <div class="sh-fcard-lbl">ROI achieved</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ SOLUTIONS IA ══════════════════════════════════════════════ -->
<section class="sh-solutions" id="solutions">
  <div class="container">
    <div class="sec-label">AI Solutions — Core</div>
    <h2 class="sec-title rv">Real Estate AI Suite<br><em>4 specialized agents</em></h2>

    <!-- KPI Grid -->
    <div class="sol-kpi-grid rv d1">
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+30<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Site visits</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">&lt;1<span style="font-size:.7em">min</span></div>
        <div class="sol-kpi-lbl">Lead processing</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+22<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Lead-to-sale</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">4 months</div>
        <div class="sol-kpi-lbl">ROI achieved</div>
      </div>
    </div>

    <!-- Feature Card -->
    <div class="sol-feature rv">
      <!-- Left: Content -->
      <div class="sol-fc-text">
        <div class="sol-fc-title"><strong>HW Real Estate SDR Agent</strong>Instant 24/7 qualification, converted leads</div>
        <p class="sol-fc-desc">A suite of 4 AI agents handling qualification, site progress updates, competitive monitoring and automated outbound calls.</p>
        <ul class="sol-benefits">
          <li><i class="fa fa-check"></i><span><strong>Zero missed call during peak activity</strong> — 100% of incoming flows absorbed</span></li>
          <li><i class="fa fa-check"></i><span><strong>Systematic upselling</strong> — Drink/dessert suggested with every order</span></li>
          <li><i class="fa fa-check"></i><span><strong>Automated loyalty</strong> — Smart address book per client</span></li>
          <li><i class="fa fa-check"></i><span><strong>Complaint handling</strong> — First line with no human intervention</span></li>
          <li><i class="fa fa-check"></i><span><strong>Automatic dispatch</strong> — To partner drivers (Glovo, Uber Eats)</span></li>
          <li><i class="fa fa-check"></i><span><strong>Dynamic AI menu</strong> — With photos, allergens and contextual suggestions</span></li>
        </ul>
        <div class="sol-roi-box">
          <div class="sol-roi-num">360K</div>
          <div class="sol-roi-text"><strong>MAD saved/year for a mid-size developer</strong><br>Qualifying 1,000 leads/month without hiring junior sales reps.</div>
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
                  <span class="wa-sbar-time">10:22</span>
                  <div class="wa-sbar-icons">
                    <i class="fa fa-signal"></i>
                    <i class="fa fa-wifi"></i>
                    <i class="fa fa-battery-three-quarters"></i>
                  </div>
                </div>
                <!-- Header -->
                <div class="wa-hdr">
                  <span class="wa-hdr-back">&#8592;</span>
                  <div class="wa-hdr-av">HW</div>
                  <div class="wa-hdr-info">
                    <div class="wa-hdr-name">HW SDR — Marina Tanger</div>
                    <div class="wa-hdr-status">AI SDR Agent · Active</div>
                  </div>
                  <div class="wa-hdr-ico">
                    <i class="fa fa-video"></i>
                    <i class="fa fa-phone"></i>
                    <i class="fa fa-ellipsis-vertical"></i>
                  </div>
                </div>
                <!-- Chat -->
                <div class="wa-chat-area">
                  <div class="wa-bubble ai">Hello! I'm Marina Tanger's AI sales agent 🏢 You expressed interest in our apartments — may I ask you a few questions?<span class="wa-bt">10:22</span></div>
                  <div class="wa-bubble pt">Yes of course, I'm looking for an apartment in Tangier 🙏<span class="wa-bt">10:22</span></div>
                  <div class="wa-bubble ai">Perfect! What's your approximate budget?<br>🔵 <strong>Under 800K MAD</strong><br>🔵 <strong>800K – 1.5M MAD</strong><br>🔵 <strong>Over 1.5M MAD</strong><span class="wa-bt">10:23</span></div>
                  <div class="wa-bubble pt">Between 800K and 1.5M MAD ✅<span class="wa-bt">10:23</span></div>
                  <div class="wa-bubble ai">Excellent! Do you prefer a <strong>T3</strong> or a <strong>T4</strong>? And would you like a <strong>sea view</strong>?<span class="wa-bt">10:23</span></div>
                  <div class="wa-bubble pt">T3 with a sea view preferably<span class="wa-bt">10:24</span></div>
                  <div class="wa-dots-wrap"><span></span><span></span><span></span></div>
                </div>
                <!-- Input -->
                <div class="wa-irow">
                  <div class="wa-ifake">Type a message...</div>
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
                  <div class="wa-notif-name">Marina Tanger — AI SDR</div>
                  <div class="wa-notif-st">AI Agent · Online</div>
                </div>
              </div>
              <div class="wa-notif-msg">Appointment confirmed •<br>T3 Sea View Visit Fri 10am</div>
              <div class="wa-notif-rep"><i class="fa fa-face-smile"></i> Reply</div>
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
         src="<?php echo $siteURL; ?>images/real-estate-timeline-.jpg"
         alt="Premium real estate Morocco"
         loading="eager"
         decoding="async"
         width="1584" height="672">
  </div>

  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Typical customer journey</div>
      <h2 class="sec-title rv">Lead journey<br><em>from A to Z</em></h2>
      <p class="rv d1">Three acquisition channels, one unified process. Choose the journey that matches your sales strategy.</p>

      <div class="tab-nav rv d2">
        <button class="tab-btn active" data-tab="wa">Via WhatsApp</button>
        <button class="tab-btn" data-tab="qr">Via AI SDR Call</button>
        <button class="tab-btn" data-tab="web">Via Automated CRM</button>
      </div>

      <!-- Tab 1: WhatsApp -->
      <div class="tab-pane active" id="tab-wa">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWa"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Incoming lead</div><p class="jf-desc">Lead generated via Facebook/Instagram Ads for a development (e.g., Marina Tanger)</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Contact &lt;1 min</div><p class="jf-desc">The AI contacts the lead via WhatsApp within a minute with a contextualized message</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Qualification</div><p class="jf-desc">Budget, city, unit type (T3/T4), purchase timeline — score sent to the CRM</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Visit appointment</div><p class="jf-desc">The AI proposes a viewing slot and books the appointment in the sales rep's calendar</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">CRM synced</div><p class="jf-desc">HubSpot/Salesforce automatically updated with the qualification score</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Site progress reporting</div><p class="jf-desc">Buyer receives automated weekly reporting with progress photos</p></div>
        </div>
      </div>

      <!-- Tab 2: Appel SDR IA -->
      <div class="tab-pane" id="tab-qr">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamQr"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Lead detected</div><p class="jf-desc">Incoming lead via Facebook Lead Ads or website form detected in real time</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Outbound call</div><p class="jf-desc">The AI agent initiates a phone call within 60 seconds via VoIP</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Qualifying script</div><p class="jf-desc">Natural conversation to identify budget, needs and purchase urgency</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Human handoff</div><p class="jf-desc">If qualified, the call is immediately transferred to the appropriate sales rep</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Appointment scheduled</div><p class="jf-desc">Site visit booked in Calendly, SMS confirmation sent to the prospect</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">CRM summary</div><p class="jf-desc">Transcript and qualification score logged into HubSpot/Salesforce</p></div>
        </div>
      </div>

      <!-- Tab 3: CRM automatisé -->
      <div class="tab-pane" id="tab-web">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWeb"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">CRM lead</div><p class="jf-desc">Lead automatically imported from Facebook Ads, Mubawab or Avito</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">AI score</div><p class="jf-desc">The AI analyzes the profile and assigns a 0-100 qualification score</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">WhatsApp follow-up</div><p class="jf-desc">Personalized outbound campaign based on the detected development and budget</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Competitive monitoring</div><p class="jf-desc">Price comparables by area automatically scraped from Mubawab/Avito</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Site progress reporting</div><p class="jf-desc">Current buyers receive photos and project progress every Friday</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Sales dashboard</div><p class="jf-desc">Conversion KPIs updated in real time for the entire sales force</p></div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ INTÉGRATIONS — ACCORDION ════════════════════════════════ -->
<section class="sh-integrations" id="integrations">
  <div class="container">
    <div class="sec-label">Key integrations</div>
    <h2 class="sec-title rv">Connected to your<br><em>real estate ecosystem</em></h2>

    <div class="sh-int-inner">

      <!-- Accordion -->
      <div class="accordion rv d1">

        <div class="acc-item open">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-salesforce"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Salesforce / HubSpot</span>
              <span class="acc-sub">CRM — real-time qualification score</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Two-way sync with your CRM. Every qualified lead automatically receives a score, its information is enriched (budget, unit type, timeline) and a follow-up task is created for the responsible sales rep. Zero manual re-entry.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-facebook"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Facebook / Instagram Ads</span>
              <span class="acc-sub">Lead Ads connected in real time</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Direct connection to your Facebook Lead Ads and Instagram campaigns. As soon as a prospect fills out the ad form, the AI agent contacts them within a minute via WhatsApp — before the competition does. 3x conversion rate vs. manual processing.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-whatsapp"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">WhatsApp Business API</span>
              <span class="acc-sub">SDR channel &amp; site progress reporting</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Primary channel for lead qualification AND site progress reporting to buyers. 94% open rate on WhatsApp. The agent sends photos, videos and weekly updates directly to buyers via their favorite app.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-calendar-check"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Calendly / Google Calendar</span>
              <span class="acc-sub">Automated visit scheduling</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>The AI agent checks the sales rep's real-time availability and suggests suitable viewing slots. The appointment is confirmed in Calendly and synced to Google Calendar — with no human intervention. Automatic reminder sent to the prospect the day before.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-house"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Mubawab / Avito</span>
              <span class="acc-sub">Competitive scraping monitoring</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Automated collection of competitor listings on Mubawab, Avito and SeLoger Maroc. Price comparables by area and property type generated every week. Monitoring dashboard to adjust your selling prices in real time.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-phone-volume"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">VoIP / SIP — Outbound calls</span>
              <span class="acc-sub">Automated phone SDR agent</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Automated outbound calling agent for incoming leads. Natural voice in Darija or French, qualifying script tailored to each development. Handoff to a human sales rep if the lead qualifies. Full transcript logged into the CRM.</p>
            </div>
          </div>
        </div>

      </div>

      <!-- Visual Integration Hub -->
      <div class="sh-int-visual rv d2">
        <div class="sh-int-card">
          <div class="sec-label" style="margin-bottom:.8rem">Active connections</div>
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
            <div class="sio-center"><span>AI</span></div>
          </div>
          <div style="text-align:center;margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid var(--border)">
            <div style="font-family:var(--fm);font-size:.58rem;font-weight:600;letter-spacing:.15em;text-transform:uppercase;color:var(--txt2)">Integration in a few hours</div>
            <div style="font-family:var(--fm);font-size:.72rem;color:var(--txt);margin-top:.4rem;font-weight:300">No overhaul of your existing system required</div>
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
      <div class="sec-label">Deployment tailored to Real Estate</div>
      <h2 class="sec-title rv">AI SDR Deployment<br><em>in 3 phases</em></h2>
      <p class="sdtl-intro rv d1">A proven methodology to deploy your 4 AI agents across your portfolio of developments, with ROI achieved in 4 months.</p>
    </div>

    <div class="sdtl-timeline" id="sdtlTimeline">
      <!-- Spine -->
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <!-- ── PHASE 0 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Mapping &amp; CRM</div>
            <p class="sdtl-desc">Inventory of development listings, qualification rules, mapping of the existing CRM (Salesforce/HubSpot), lead sources identified.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Development listings configured</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Qualification rules defined</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>CRM mapped and connected</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Lead sources inventoried</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">WEEKS 1 – 2</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-map"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Pilot</div>
        </div>
      </div>

      <!-- ── PHASE 1 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword">Mapping</div>
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
            <div class="sdtl-title">Flagship development pilot</div>
            <p class="sdtl-desc">Training on a single residential project, A/B testing against a traditional human SDR team to validate the AI qualification rate.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>SDR agent trained</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>A/B test vs. human team</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Qualification score validated</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Site progress reporting tested</span></div>
            </div>
            <span class="sdtl-tag">WEEKS 3 – 6</span>
          </div>
        </div>
      </div>

      <!-- ── PHASE 2 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title">Multi-development rollout</div>
            <p class="sdtl-desc">Deployment across the entire portfolio, sales force training on AI collaboration, unified sales dashboard.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>4 agents deployed</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Sales dashboard</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>AI SDR manual</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Full CRM integration</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">WEEKS 7 – 10</span>
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
          <div class="sdtl-keyword">Rollout</div>
        </div>
      </div>

    </div><!-- /sdtl-timeline -->
  </div>
</section>

<!-- ══ CAS CLIENT ════════════════════════════════════════════════ -->
<section class="sh-case" id="cas-client">
  <div class="container">
    <div class="sec-label">Client case — Success story</div>
    <h2 class="sec-title rv">Concrete results<br><em>in real estate</em></h2>

    <div class="case-wrap rv d1">

      <!-- Left: Context + Problem -->
      <div class="case-left">
        <div class="case-tag">Case study · Residential Developer · Casablanca</div>
        <h3 class="case-headline">Residential developer<br>3 developments, 150 leads/month</h3>
        <p class="case-ctx"><strong>Context:</strong> Developer with 3 developments on sale, 150 incoming leads/month, an overwhelmed team of 3 junior SDRs. Initial qualification rate of 38%.</p>
        <div class="case-problem">
          <div class="case-problem-label">Problem identified</div>
          <div class="case-problem-text">Average lead processing time: 4h. 62% of leads never called back. Team of 3 junior SDRs overwhelmed by Facebook Ads volume. Ad ROI unmeasurable due to lack of CRM tracking.</div>
        </div>
        <div>
          <div class="case-solution-label" style="font-family:var(--fm);font-size:.55rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--txt2);margin-bottom:.45rem">Solution deployed</div>
          <div class="case-solution-text" style="font-size:.8rem;color:var(--txt2);line-height:1.8">HW SDR Agent + outbound WhatsApp campaigns + automated site progress reporting. Sales force trained on collaboration with AI.</div>
        </div>
      </div>

      <!-- Right: Results -->
      <div class="case-right">
        <div>
          <div class="results-title">Results observed after 4 months</div>
          <div class="results-big-grid">
            <div class="result-big">
              <div class="result-big-val">72<span style="font-size:.7em">%</span></div>
              <div class="result-big-lbl">Qualification rate</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">+45%</div>
              <div class="result-big-lbl">Site visits</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">2 FTE</div>
              <div class="result-big-lbl">SDR FTEs saved</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">4<span style="font-size:.7em">months</span></div>
              <div class="result-big-lbl">ROI achieved</div>
            </div>
          </div>
        </div>
        <div class="case-testimonial">
          <p class="ct-text">Our sales force has shifted from a volume mindset to a closing mindset. AI gave us back our best people — they focus on visits and negotiations, not on phone follow-ups.</p>
          <div class="ct-author">— Sales Director, Residential Developer, Casablanca</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ FINAL CTA ════════════════════════════════════════════════ -->
 <section class="cta-band" style="background: url(<?php echo $siteURL; ?>images/real-estate-.jpg);">
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(14rem,30vw,44rem);bottom:-2rem;right:-1rem;color:rgba(247,245,242,.022)" aria-hidden="true">Realty</span>
  <div class="container" style="position:relative;z-index:2">
    <div class="sec-label">Ready to take action?</div>
    <h2 class="sec-title" style="text-align:center;margin-bottom:1.5rem">Accelerate qualification and <br>sales <em>follow-ups</em></h2>

    <p class="cta-sub">Activate AI agents capable of processing your leads in real time, running WhatsApp campaigns, qualifying prospects by phone, and improving the visibility of your developments and construction sites for your buyers.<p>
    <div class="cta-btns">
      <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Request a free AI audit" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Request a free AI audit</span></div>
          <div class="sb-knob"><i class="fal fa-key"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Audit my real estate funnel" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Audit my real estate funnel</span></div>
          <div class="sb-knob"><i class="fal fa-calculator"></i></div>
        </a>
    </div>
  </div>
</section>

<?php else: ?>

<!-- ══ HERO ══════════════════════════════════════════════════════ -->
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>

  <div class="sh-hero-body">
    <div class="container">
      <div class="sh-hero-inner">

        <!-- LEFT -->
        <div class="sh-hero-left">
          <div class="sh-breadcrumb rv">Solutions IA — Secteur Immobilier</div>
          <h1 class="sh-h1 rv d1">
            <?php echo !empty($secteur->getH1()) ? $secteur->getH1() : $secteur->getTitre(); ?>
          </h1>
          <p class="sh-sub rv d2">Automatisez la qualification de vos leads et dominez le marché immobilier marocain avec des agents de vente virtuels infatigables.</p>
          <div class="sh-cta-row rv d3">
              <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Découvrir l'IA Immobilier" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Découvrir l'IA Immobilier</span></div>
              <div class="sb-knob"><i class="fal fa-key"></i></div>
            </a>

            <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Calculer mon économie SDR" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Calculer mon économie SDR</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
          </div>
        </div>

        <!-- RIGHT — 3D Medical Orbital -->
        <div class="sh-hero-right">
          <div class="sho-scene">
            <div class="sho-ring r1"></div>
            <div class="sho-ring r2"></div>
            <div class="sho-ring r3"></div>
            <div class="sho-core">
              <div class="sho-plus">🏢</div>
              <div class="sho-lbl">Immo IA</div>
            </div>

            <!-- Inner orbit (r=100px) -->
            <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="Salesforce CRM"><i class="fab fa-salesforce"></i></div></div>
            <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="WhatsApp"><i class="fab fa-whatsapp"></i></div></div>
            <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Facebook Lead Ads"><i class="fab fa-facebook"></i></div></div>

            <!-- Middle orbit (r=170px) -->
            <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="HubSpot"><i class="fab fa-hubspot"></i></div></div>
            <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="Calendly"><i class="fal fa-calendar-check"></i></div></div>
            <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="Mubawab"><i class="fal fa-house"></i></div></div>
            <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Avito Maroc"><i class="fal fa-tag"></i></div></div>

            <!-- Outer orbit (r=222px) -->
            <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="VoIP / SIP"><i class="fal fa-phone-volume"></i></div></div>
            <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="Instagram Ads"><i class="fab fa-instagram"></i></div></div>
            <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="Score qualification"><i class="fal fa-star-half-alt"></i></div></div>
            <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="Reporting chantier"><i class="fal fa-hard-hat"></i></div></div>
            <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="Google Agenda"><i class="fab fa-google"></i></div></div>
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
        <div class="sh-stat-val">+<span class="sh-counter" data-target="30">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Visites terrain</div>
        <div class="sh-stat-sub">Conversion lead-to-visit boostée</div>
      </div>
      <div class="sh-stat rv d1">
        <div class="sh-stat-val" style="font-size:clamp(2rem,4vw,4rem)">&lt;1<span class="suf"> min</span></div>
        <div class="sh-stat-lbl">Traitement lead</div>
        <div class="sh-stat-sub">Contacté avant la concurrence</div>
      </div>
      <div class="sh-stat rv d2">
        <div class="sh-stat-val">+<span class="sh-counter" data-target="22">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Conversion lead-to-vente</div>
        <div class="sh-stat-sub">Score qualification IA précis</div>
      </div>
      <div class="sh-stat rv d3">
        <div class="sh-stat-val"><span class="sh-counter" data-target="4">0</span><span class="suf"> mois</span></div>
        <div class="sh-stat-lbl">ROI atteint</div>
        <div class="sh-stat-sub">Économie ~360 000 MAD/an</div>
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
        <h2 class="sh-ctx-title rv"><strong>Secteur Immobilier</strong>Les leads perdus<br>coûtent des millions</h2>
        <div class="sh-ctx-body rv d1">
          <p>Les promoteurs et agences au Maroc génèrent des volumes massifs de leads digitaux, mais souffrent de <em>délais de traitement trop longs</em>. Un lead non contacté dans les 15 minutes perd 80% de ses chances de conversion. L'IA intervient comme un SDR virtuel qui qualifie le prospect <em>instantanément, de jour comme de nuit</em>.</p>
          <p>La concurrence est rude sur Marrakech, Casablanca, Tanger et la côte atlantique. Les acquéreurs exigent une <em>transparence totale</em> sur l'avancement des chantiers et une réactivité commerciale permanente. Les promoteurs qui industrialisent leur force commerciale via l'IA prennent un <em>avantage structurel</em> sur leurs concurrents.</p>
        </div>
        <div class="sh-pills rv d2">
          <span class="sh-pill"><i class="fa fa-exclamation-triangle"></i> Leads non traités à temps</span>
          <span class="sh-pill"><i class="fa fa-clock"></i> Délai > 15 min = -80% conversion</span>
          <span class="sh-pill"><i class="fa fa-ban"></i> SDR humains saturés</span>
          <span class="sh-pill"><i class="fa fa-hard-hat"></i> Reporting chantier manuel</span>
          <span class="sh-pill"><i class="fa fa-chart-line"></i> Concurrence accrue OTA</span>
        </div>
      </div>

      <!-- CSS ART Visual -->
      <div class="sh-ctx-visual rv d2">
        <div class="sh-ctx-blob"></div>
        <div class="sh-ctx-blob2"></div>
        <div class="sh-ctx-center"><div class="sh-ctx-cross">🏢</div></div>
        <div class="sh-fcard fc1">
          <div class="sh-fcard-val">1000</div>
          <div class="sh-fcard-lbl">Leads/mois</div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">72%</div>
          <div class="sh-fcard-lbl">Qualification</div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">+45%</div>
          <div class="sh-fcard-lbl">RDV terrain</div>
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
    <h2 class="sec-title rv">Suite IA Immobilier<br><em>4 agents spécialisés</em></h2>

    <!-- KPI Grid -->
    <div class="sol-kpi-grid rv d1">
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+30<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Visites terrain</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">&lt;1<span style="font-size:.7em">min</span></div>
        <div class="sol-kpi-lbl">Traitement lead</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+22<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Lead-to-vente</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">4 mois</div>
        <div class="sol-kpi-lbl">ROI atteint</div>
      </div>
    </div>

    <!-- Feature Card -->
    <div class="sol-feature rv">
      <!-- Left: Content -->
      <div class="sol-fc-text">
        <div class="sol-fc-title"><strong>HW SDR Agent Immobilier</strong>Qualification instantanée 24/7, leads convertis</div>
        <p class="sol-fc-desc">Suite de 4 agents IA en charge de la qualification, de l'information chantier, de la veille concurrentielle et des appels sortants automatisés.</p>
        <ul class="sol-benefits">
          <li><i class="fa fa-check"></i><span><strong>Zéro perte d'appel en plein service</strong> — 100% des flux entrants absorbés</span></li>
          <li><i class="fa fa-check"></i><span><strong>Upselling systématique</strong> — Boisson/dessert proposés à chaque commande</span></li>
          <li><i class="fa fa-check"></i><span><strong>Fidélisation automatisée</strong> — Carnet d'adresses intelligent par client</span></li>
          <li><i class="fa fa-check"></i><span><strong>Gestion des réclamations</strong> — Première ligne sans intervention humaine</span></li>
          <li><i class="fa fa-check"></i><span><strong>Dispatch automatique</strong> — Vers livreurs partenaires (Glovo, Uber Eats)</span></li>
          <li><i class="fa fa-check"></i><span><strong>Menu dynamique IA</strong> — Avec photos, allergènes et suggestions contextuelles</span></li>
        </ul>
        <div class="sol-roi-box">
          <div class="sol-roi-num">360K</div>
          <div class="sol-roi-text"><strong>MAD économisés/an pour un promoteur mid-size</strong><br>Qualification de 1 000 leads/mois sans recruter de commerciaux juniors.</div>
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
                  <span class="wa-sbar-time">10:22</span>
                  <div class="wa-sbar-icons">
                    <i class="fa fa-signal"></i>
                    <i class="fa fa-wifi"></i>
                    <i class="fa fa-battery-three-quarters"></i>
                  </div>
                </div>
                <!-- Header -->
                <div class="wa-hdr">
                  <span class="wa-hdr-back">&#8592;</span>
                  <div class="wa-hdr-av">HW</div>
                  <div class="wa-hdr-info">
                    <div class="wa-hdr-name">HW SDR — Marina Tanger</div>
                    <div class="wa-hdr-status">Agent SDR IA · Actif</div>
                  </div>
                  <div class="wa-hdr-ico">
                    <i class="fa fa-video"></i>
                    <i class="fa fa-phone"></i>
                    <i class="fa fa-ellipsis-vertical"></i>
                  </div>
                </div>
                <!-- Chat -->
                <div class="wa-chat-area">
                  <div class="wa-bubble ai">Bonjour ! Je suis l'agent commercial IA de Marina Tanger 🏢 Vous avez manifesté de l'intérêt pour nos appartements — puis-je vous poser quelques questions ?<span class="wa-bt">10:22</span></div>
                  <div class="wa-bubble pt">Oui bien sûr, je cherche un appartement à Tanger 🙏<span class="wa-bt">10:22</span></div>
                  <div class="wa-bubble ai">Parfait ! Quel est votre budget approximatif ?<br>🔵 <strong>Moins de 800K MAD</strong><br>🔵 <strong>800K – 1,5M MAD</strong><br>🔵 <strong>Plus de 1,5M MAD</strong><span class="wa-bt">10:23</span></div>
                  <div class="wa-bubble pt">Entre 800K et 1,5M MAD ✅<span class="wa-bt">10:23</span></div>
                  <div class="wa-bubble ai">Excellent ! Préférez-vous un <strong>T3</strong> ou un <strong>T4</strong> ? Et souhaitez-vous une <strong>vue mer</strong> ?<span class="wa-bt">10:23</span></div>
                  <div class="wa-bubble pt">T3 avec vue mer de préférence<span class="wa-bt">10:24</span></div>
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
                  <div class="wa-notif-name">Marina Tanger — SDR IA</div>
                  <div class="wa-notif-st">Agent IA · En ligne</div>
                </div>
              </div>
              <div class="wa-notif-msg">RDV confirmé •<br>Visite T3 Vue Mer Ven 10h</div>
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
         src="<?php echo $siteURL; ?>images/real-estate-timeline-.jpg"
         alt="Immobilier premium Maroc"
         loading="eager"
         decoding="async"
         width="1584" height="672">
  </div>

  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Parcours client typique</div>
      <h2 class="sec-title rv">Parcours lead<br><em>de A à Z</em></h2>
      <p class="rv d1">Trois canaux d'acquisition, un processus unifié. Choisissez le parcours correspondant à votre stratégie commerciale.</p>

      <div class="tab-nav rv d2">
        <button class="tab-btn active" data-tab="wa">Via WhatsApp</button>
        <button class="tab-btn" data-tab="qr">Via Appel SDR IA</button>
        <button class="tab-btn" data-tab="web">Via CRM automatisé</button>
      </div>

      <!-- Tab 1: WhatsApp -->
      <div class="tab-pane active" id="tab-wa">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWa"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Lead entrant</div><p class="jf-desc">Lead généré via Facebook/Instagram Ads sur un programme (ex: Marina Tanger)</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Contact &lt;1 min</div><p class="jf-desc">L'IA contacte le lead via WhatsApp dans la minute avec message contextualisé</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Qualification</div><p class="jf-desc">Budget, ville, type T3/T4, délai d'acquisition — score transmis au CRM</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">RDV visite</div><p class="jf-desc">L'IA propose un créneau de visite et fixe le RDV dans l'agenda du commercial</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">CRM synchronisé</div><p class="jf-desc">HubSpot/Salesforce mis à jour avec score de qualification automatiquement</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Reporting chantier</div><p class="jf-desc">Acquéreur reçoit reporting hebdomadaire automatisé avec photos d'avancement</p></div>
        </div>
      </div>

      <!-- Tab 2: Appel SDR IA -->
      <div class="tab-pane" id="tab-qr">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamQr"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Lead détecté</div><p class="jf-desc">Lead entrant via Facebook Lead Ads ou formulaire site détecté en temps réel</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Appel sortant</div><p class="jf-desc">L'agent IA initie un appel téléphonique dans les 60 secondes via VoIP</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Script qualifiant</div><p class="jf-desc">Conversation naturelle pour identifier budget, besoins et urgence d'achat</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Transfert humain</div><p class="jf-desc">Si qualifié, appel transféré immédiatement au commercial approprié</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">RDV planifié</div><p class="jf-desc">Visite terrain fixée dans Calendly, confirmation SMS envoyée au prospect</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Résumé CRM</div><p class="jf-desc">Transcription et score de qualification versés dans HubSpot/Salesforce</p></div>
        </div>
      </div>

      <!-- Tab 3: CRM automatisé -->
      <div class="tab-pane" id="tab-web">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWeb"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Lead CRM</div><p class="jf-desc">Lead importé automatiquement depuis Facebook Ads, Mubawab ou Avito</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Score IA</div><p class="jf-desc">L'IA analyse le profil et attribue un score de qualification 0-100</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Relance WhatsApp</div><p class="jf-desc">Campagne sortante personnalisée selon le programme et le budget détecté</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Veille concurrentielle</div><p class="jf-desc">Comparables de prix par zone scrappés automatiquement sur Mubawab/Avito</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Reporting chantier</div><p class="jf-desc">Acquéreurs actuels reçoivent photos et avancement projet chaque vendredi</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Dashboard commercial</div><p class="jf-desc">KPIs de conversion mis à jour en temps réel pour toute la force de vente</p></div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ INTÉGRATIONS — ACCORDION ════════════════════════════════ -->
<section class="sh-integrations" id="integrations">
  <div class="container">
    <div class="sec-label">Intégrations clés</div>
    <h2 class="sec-title rv">Connecté à votre<br><em>écosystème immobilier</em></h2>

    <div class="sh-int-inner">

      <!-- Accordion -->
      <div class="accordion rv d1">

        <div class="acc-item open">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-salesforce"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Salesforce / HubSpot</span>
              <span class="acc-sub">CRM — score qualification temps réel</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Synchronisation bidirectionnelle avec votre CRM. Chaque lead qualifié reçoit un score automatique, ses informations sont enrichies (budget, type, délai) et une tâche de suivi est créée pour le commercial responsable. Zéro ressaisie manuelle.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-facebook"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Facebook / Instagram Ads</span>
              <span class="acc-sub">Lead Ads connectés en temps réel</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Connexion directe à vos campagnes Facebook Lead Ads et Instagram. Dès qu'un prospect remplit le formulaire publicitaire, l'agent IA le contacte dans la minute via WhatsApp — avant que la concurrence ne le fasse. Taux de conversion x3 vs traitement manuel.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-whatsapp"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">WhatsApp Business API</span>
              <span class="acc-sub">Canal SDR &amp; reporting chantier</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Canal principal pour la qualification des leads ET le reporting chantier aux acquéreurs. Taux d'ouverture 94% sur WhatsApp. L'agent envoie photos, vidéos et mises à jour hebdomadaires directement aux acquéreurs via leur application favorite.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-calendar-check"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Calendly / Google Agenda</span>
              <span class="acc-sub">Prise de RDV visite automatisée</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>L'agent IA consulte les disponibilités du commercial en temps réel et propose des créneaux de visite adaptés. Le RDV est confirmé dans Calendly et synchronisé dans Google Agenda — sans intervention humaine. Rappel automatique J-1 envoyé au prospect.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-house"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Mubawab / Avito</span>
              <span class="acc-sub">Veille concurrentielle scraping</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Collecte automatisée des annonces concurrentielles sur Mubawab, Avito et SeLoger Maroc. Comparables de prix par zone et par type de bien générés chaque semaine. Dashboard de veille pour ajuster vos prix de vente en temps réel.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-phone-volume"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">VoIP / SIP — Appels sortants</span>
              <span class="acc-sub">Agent SDR téléphonique automatisé</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Agent d'appels sortants automatisés vers les leads entrants. Voix naturelle en darija ou français, script qualifiant adapté à chaque programme. Transfert vers commercial humain si le lead est qualifié. Transcription complète versée dans le CRM.</p>
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
      <div class="sec-label">Déploiement adapté Immobilier</div>
      <h2 class="sec-title rv">Déploiement SDR IA<br><em>en 3 phases</em></h2>
      <p class="sdtl-intro rv d1">Une méthodologie éprouvée pour déployer vos 4 agents IA sur votre portefeuille de programmes, avec ROI atteint en 4 mois.</p>
    </div>

    <div class="sdtl-timeline" id="sdtlTimeline">
      <!-- Spine -->
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <!-- ── PHASE 0 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Cartographie &amp; CRM</div>
            <p class="sdtl-desc">Inventaire des fiches programmes, règles de qualification, mapping du CRM existant (Salesforce/HubSpot), sources de leads identifiées.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Fiches programmes configurées</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Règles qualification définies</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>CRM mappé et connecté</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Sources leads inventoriées</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 1 – 2</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-map"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Pilote</div>
        </div>
      </div>

      <!-- ── PHASE 1 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword">Cartographie</div>
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
            <div class="sdtl-title">Pilote programme phare</div>
            <p class="sdtl-desc">Entraînement sur un seul projet résidentiel, A/B test avec équipe SDR humaine classique pour valider le taux de qualification IA.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Agent SDR entraîné</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>A/B test vs équipe humaine</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Score qualification validé</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Reporting chantier testé</span></div>
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
            <div class="sdtl-title">Industrialisation multi-programmes</div>
            <p class="sdtl-desc">Déploiement sur l'ensemble du portefeuille, formation de la force commerciale à la collaboration IA, dashboard commercial unifié.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>4 agents déployés</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Dashboard commercial</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Manuel SDR-IA</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Intégration CRM complète</span><i class="fa fa-circle"></i></div>
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
          <div class="sdtl-keyword">Industrialisation</div>
        </div>
      </div>

    </div><!-- /sdtl-timeline -->
  </div>
</section>

<!-- ══ CAS CLIENT ════════════════════════════════════════════════ -->
<section class="sh-case" id="cas-client">
  <div class="container">
    <div class="sec-label">Cas client — Étude de succès</div>
    <h2 class="sec-title rv">Résultats concrets<br><em>en immobilier</em></h2>

    <div class="case-wrap rv d1">

      <!-- Left: Context + Problem -->
      <div class="case-left">
        <div class="case-tag">Étude de cas · Promoteur Résidentiel · Casablanca</div>
        <h3 class="case-headline">Promoteur résidentiel<br>3 programmes, 150 leads/mois</h3>
        <p class="case-ctx"><strong>Contexte :</strong> Promoteur avec 3 programmes en commercialisation, 150 leads/mois entrants, équipe SDR de 3 juniors saturée. Taux de qualification initial de 38%.</p>
        <div class="case-problem">
          <div class="case-problem-label">Problème identifié</div>
          <div class="case-problem-text">Délai moyen de traitement lead : 4h. 62% des leads jamais rappelés. Équipe SDR de 3 juniors dépassée par les volumes Facebook Ads. ROI publicitaire non mesurable faute de suivi CRM.</div>
        </div>
        <div>
          <div class="case-solution-label" style="font-family:var(--fm);font-size:.55rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--txt2);margin-bottom:.45rem">Solution déployée</div>
          <div class="case-solution-text" style="font-size:.8rem;color:var(--txt2);line-height:1.8">HW SDR Agent + campagnes WhatsApp sortantes + reporting chantier automatisé. Formation de la force commerciale à la collaboration avec l'IA.</div>
        </div>
      </div>

      <!-- Right: Results -->
      <div class="case-right">
        <div>
          <div class="results-title">Résultats observés après 4 mois</div>
          <div class="results-big-grid">
            <div class="result-big">
              <div class="result-big-val">72<span style="font-size:.7em">%</span></div>
              <div class="result-big-lbl">Taux qualification</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">+45%</div>
              <div class="result-big-lbl">RDV terrain</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">2 ETP</div>
              <div class="result-big-lbl">SDR économisés</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">4<span style="font-size:.7em">mois</span></div>
              <div class="result-big-lbl">ROI atteint</div>
            </div>
          </div>
        </div>
        <div class="case-testimonial">
          <p class="ct-text">Notre force commerciale est passée d'une logique de volume à une logique de closing. L'IA nous a rendu nos meilleurs éléments — ils se concentrent sur les visites et les négociations, pas sur la relance téléphonique.</p>
          <div class="ct-author">— Directeur Commercial, Promoteur Résidentiel Casablanca</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ FINAL CTA ════════════════════════════════════════════════ -->
 <section class="cta-band" style="background: url(<?php echo $siteURL; ?>images/real-estate-.jpg);">
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(14rem,30vw,44rem);bottom:-2rem;right:-1rem;color:rgba(247,245,242,.022)" aria-hidden="true">Immo</span>
  <div class="container" style="position:relative;z-index:2">
    <div class="sec-label">Vous êtes prêt à passer à l’action ?</div>
    <h2 class="sec-title" style="text-align:center;margin-bottom:1.5rem">Accélérez la qualification et <br>les relances <em>commerciales</em></h2>

    <p class="cta-sub">Activez des agents IA capables de traiter vos leads en temps réel, de mener des campagnes WhatsApp, de qualifier les prospects par téléphone et d’améliorer la visibilité de vos programmes et de vos chantiers auprès de vos acquéreurs.<p>
    <div class="cta-btns">
      <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un audit IA gratuit" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Demander un audit IA gratuit</span></div>
          <div class="sb-knob"><i class="fal fa-key"></i></div>
        </a>

        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Auditer mon funnel immobilier" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Auditer mon funnel immobilier</span></div>
          <div class="sb-knob"><i class="fal fa-calculator"></i></div>
        </a>
    </div>
  </div>
</section>

<?php endif; ?>

<script src="<?php echo $siteURL; ?>assets/js/secteur.js"></script>
