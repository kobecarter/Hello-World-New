<style>
/* FORMATIONS HERO */
.fm-hero{position:relative;padding:14rem 0 9rem;background:var(--bg);overflow:hidden;border-bottom:1px solid var(--border)}
.fm-hero-accent{position:absolute;top:0;right:0;width:50%;height:100%;background:linear-gradient(to left,var(--bg2) 0%,transparent 100%);z-index:0}
.fm-hero-line{position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(to right,transparent,var(--gold) 50%,transparent);opacity:.15;z-index:0}
.fm-hero .container{position:relative;z-index:2}
.fm-hero-inner{display:grid;grid-template-columns:1fr 420px;gap:5rem;align-items:center}
.fm-hero-label{font-size:.6rem;letter-spacing:.46em;text-transform:uppercase;color:var(--gold);display:flex;align-items:center;gap:.9rem;margin-bottom:2rem}
.fm-hero-label::before{content:'';width:36px;height:1px;background:var(--gold)}
.fm-hero-title{font-family:var(--fm);font-weight:300;font-size:clamp(3rem,6.5vw,8rem);line-height:.92;letter-spacing:-.04em;color:var(--txt);margin-bottom:2.5rem}
.fm-hero-title em{display:block;font-style:italic;color:var(--gold);font-family:var(--fd);font-weight:200}
.fm-hero-sub{font-size:.92rem;font-weight:300;color:var(--txt2);max-width:480px;line-height:1.9;margin-bottom:3rem}
.fm-hero-ctas{display:flex;gap:1rem;flex-wrap:wrap}
.fm-host-card{background:var(--txt);border-radius:18px;overflow:hidden;padding:2.5rem}
.fm-host-av{width:72px;height:72px;border-radius:50%;background:linear-gradient(135deg,rgba(139,106,34,.3),rgba(201,169,110,.1));border:2px solid rgba(139,106,34,.35);display:flex;align-items:center;justify-content:center;font-family:var(--fd);font-size:2rem;color:var(--gold2);font-weight:200;margin-bottom:1.5rem}
.fm-host-name{font-family:var(--fd);font-weight:200;font-size:1.6rem;color:#f5f3f0;margin-bottom:.3rem}
.fm-host-role{font-size:.58rem;letter-spacing:.2em;text-transform:uppercase;color:rgba(139,106,34,.6);margin-bottom:1.5rem}
.fm-host-bio{font-family:var(--fm);font-size:.75rem;font-weight:300;color:rgba(247,245,242,.35);line-height:1.85;margin-bottom:2rem}
.fm-host-badges{display:flex;gap:.5rem;flex-wrap:wrap}
.fm-host-badge{font-size:.5rem;letter-spacing:.16em;text-transform:uppercase;padding:.24rem .7rem;border:1px solid rgba(247,245,242,.08);color:rgba(247,245,242,.3);font-family:var(--fm);font-weight:600}
@media(max-width:1024px){.fm-hero-inner{grid-template-columns:1fr}.fm-host-card{display:none}}


/*Custom*/
.integrations.integrations-white{background: #fff !important;border-top:none;}
.int-item{background: var(--bg);}
</style>

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
        <div class="sh-breadcrumb"><?php echo $page->getTitre() ?></div>
        <h1 class="sh-h1">Formations <em>IA</em> pour <em>dirigeants</em> et <em>équipes</em></h1>
        <p class="sh-sub"><?php echo strip_tags($page->getExtrait()); ?></p>

        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Programmer une session" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Programmer une session</span></div>
              <div class="sb-knob"><i class="fal fa-calendar"></i></div>
            </a>
        
            <a href="#services" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir nos offres" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir nos offres</span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div>
            </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3">
        <img src="<?php echo $siteURL; ?>images/pages/<?php echo $page->getPhoto() ?>" alt="<?php echo $page->getTitre() ?>">
      </div>
    </div>
  </div>
</section>
<!-- ══ MARQUEE — visible after hero unpins ═════════════════════ -->
<div class="mq" id="mq"><div class="mq-t">
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span>Web &amp; Mobile</span>
  <span class="mi"><span class="d"></span><span class="h">Solutions IA</span></span>
  <span class="mi"><span class="d"></span>SaaS &amp; Produits</span>
  <span class="mi"><span class="d"></span><span class="h">Brand Experience</span></span>
  <span class="mi"><span class="d"></span>140+ Déploiements</span>
  <span class="mi"><span class="d"></span><span class="h">ROI dès 7 semaines</span></span>
  <span class="mi"><span class="d"></span>Digital Marketing Agency</span>
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span>Web &amp; Mobile</span>
  <span class="mi"><span class="d"></span><span class="h">Solutions IA</span></span>
  <span class="mi"><span class="d"></span>SaaS &amp; Produits</span>
  <span class="mi"><span class="d"></span><span class="h">Brand Experience</span></span>
  <span class="mi"><span class="d"></span>140+ Déploiements</span>
  <span class="mi"><span class="d"></span><span class="h">ROI dès 7 semaines</span></span>
  <span class="mi"><span class="d"></span>Digital Marketing Agency</span>
</div></div>

<!-- FORMATIONS -->
<section class="fm-formations" id="formations">
  <div class="container">
    <div class="sec-label">Nos Programmes</div>
    <h2 class="sec-title rv">Quatre programmes pour <br><em>transformer</em> vos équipes</h2>
    <div class="fm-grid">
      <div class="fm-card rv">
        <div class="fm-card-head">
          <div class="fm-card-bg-num">01</div>
          <span class="fm-card-tag gold">Dirigeants</span>
          <div class="fm-card-title">Master Class Dirigeants</div>
          <div class="fm-card-audience"><i class="fa fa-user-tie"></i> CEO, DG, Directeurs &amp; C-Level</div>
        </div>
        <div class="fm-card-body">
          <p class="fm-card-desc">Une journée intensive pour comprendre les enjeux stratégiques de l'IA, identifier vos opportunités de transformation et construire une roadmap IA pour votre organisation.</p>
          <div class="fm-card-details">
            <div class="fm-detail"><i class="fa fa-clock"></i> 1 journée</div>
            <div class="fm-detail"><i class="fa fa-users"></i> 5–15 personnes</div>
            <div class="fm-detail"><i class="fa fa-location-dot"></i> Présentiel</div>
            <div class="fm-detail"><i class="fa fa-certificate"></i> Certificat HW</div>
          </div>
          <ul class="fm-card-modules">
            <li class="fm-module">L'état de l'IA en 2026 — ce qui change vraiment</li>
            <li class="fm-module">Identifier vos 5 meilleurs cas d'usage IA</li>
            <li class="fm-module">Construire votre roadmap de transformation</li>
            <li class="fm-module">Gouvernance, risques et éthique de l'IA</li>
          </ul>
        </div>
      </div>

      <div class="fm-card rv d1">
        <div class="fm-card-head">
          <div class="fm-card-bg-num">02</div>
          <span class="fm-card-tag blue">No-Code</span>
          <div class="fm-card-title">Bootcamp No-Code IA</div>
          <div class="fm-card-audience"><i class="fa fa-users"></i> Équipes opérationnelles, chefs de projet</div>
        </div>
        <div class="fm-card-body">
          <p class="fm-card-desc">3 jours pour apprendre à construire des automatisations, des agents IA et des workflows sans écrire une ligne de code. Sortez avec vos premiers outils IA opérationnels.</p>
          <div class="fm-card-details">
            <div class="fm-detail"><i class="fa fa-clock"></i> 3 jours</div>
            <div class="fm-detail"><i class="fa fa-users"></i> 8–20 personnes</div>
            <div class="fm-detail"><i class="fa fa-location-dot"></i> Présentiel / Distanciel</div>
            <div class="fm-detail"><i class="fa fa-certificate"></i> Certificat HW</div>
          </div>
          <ul class="fm-card-modules">
            <li class="fm-module">Make, Zapier &amp; n8n — automatisation avancée</li>
            <li class="fm-module">Construire un chatbot avec Claude &amp; OpenAI</li>
            <li class="fm-module">Créer un agent IA no-code en atelier</li>
            <li class="fm-module">Déploiement &amp; maintenance en autonomie</li>
          </ul>
        </div>
      </div>

      <div class="fm-card rv">
        <div class="fm-card-head">
          <div class="fm-card-bg-num">03</div>
          <span class="fm-card-tag gold">Marketing</span>
          <div class="fm-card-title">Formation IA Marketing</div>
          <div class="fm-card-audience"><i class="fa fa-chart-bar"></i> Équipes marketing, content, social media</div>
        </div>
        <div class="fm-card-body">
          <p class="fm-card-desc">2 jours pour maîtriser les outils IA de création de contenu, de copywriting, d'analyse de données et d'automatisation des campagnes marketing.</p>
          <div class="fm-card-details">
            <div class="fm-detail"><i class="fa fa-clock"></i> 2 jours</div>
            <div class="fm-detail"><i class="fa fa-users"></i> 5–15 personnes</div>
            <div class="fm-detail"><i class="fa fa-location-dot"></i> Hybride</div>
            <div class="fm-detail"><i class="fa fa-certificate"></i> Certificat HW</div>
          </div>
          <ul class="fm-card-modules">
            <li class="fm-module">Prompt engineering avancé pour le marketing</li>
            <li class="fm-module">Création de contenu SEO &amp; social avec l'IA</li>
            <li class="fm-module">Analyse de données &amp; reporting automatisé</li>
            <li class="fm-module">Stratégie de personnalisation IA</li>
          </ul>
        </div>
      </div>

      <div class="fm-card rv d1">
        <div class="fm-card-head">
          <div class="fm-card-bg-num">04</div>
          <span class="fm-card-tag blue">Technique</span>
          <div class="fm-card-title">Atelier Agents IA</div>
          <div class="fm-card-audience"><i class="fa fa-code"></i> Développeurs, architectes, tech leads</div>
        </div>
        <div class="fm-card-body">
          <p class="fm-card-desc">Atelier technique intensif de 2 jours pour construire des agents IA personnalisés avec les dernières APIs LLM. RAG, function calling et déploiement production.</p>
          <div class="fm-card-details">
            <div class="fm-detail"><i class="fa fa-clock"></i> 2 jours</div>
            <div class="fm-detail"><i class="fa fa-users"></i> 4–10 personnes</div>
            <div class="fm-detail"><i class="fa fa-location-dot"></i> Présentiel</div>
            <div class="fm-detail"><i class="fa fa-certificate"></i> Certificat HW</div>
          </div>
          <ul class="fm-card-modules">
            <li class="fm-module">Architecture agents IA &amp; orchestration</li>
            <li class="fm-module">RAG — Retrieval Augmented Generation</li>
            <li class="fm-module">Function calling &amp; tool use avancé</li>
            <li class="fm-module">Évaluation, monitoring &amp; mise en production</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FORMATS -->
<section class="fm-formats">
  <div class="container">
    <div class="sec-label">Modalités</div>
    <h2 class="sec-title rv">Trois <em>formats</em> adaptés<br>à vos contraintes</h2>
    <div class="fm-fmt-grid">
      <div class="fm-fmt rv">
        <div class="fm-fmt-icon"><i class="fal fa-building"></i></div>
        <div class="fm-fmt-title">Présentiel</div>
        <p class="fm-fmt-desc">Dans vos locaux ou dans nos espaces à San Francisco, Londres ou Dubaï. Le format le plus impactant pour les sessions transformationnelles.</p>
        <ul class="fm-fmt-list">
          <li class="fm-fmt-feat">Matériel pédagogique inclus</li>
          <li class="fm-fmt-feat">Mise en pratique immédiate</li>
          <li class="fm-fmt-feat">Networking entre participants</li>
          <li class="fm-fmt-feat">Déjeuner &amp; pauses inclus</li>
        </ul>
      </div>
      <div class="fm-fmt rv d1">
        <div class="fm-fmt-icon"><i class="fal fa-video"></i></div>
        <div class="fm-fmt-title">Distanciel</div>
        <p class="fm-fmt-desc">Sessions live en visioconférence avec accès aux enregistrements 6 mois. Idéal pour les équipes dispersées géographiquement.</p>
        <ul class="fm-fmt-list">
          <li class="fm-fmt-feat">Accès illimité aux replays</li>
          <li class="fm-fmt-feat">Plateforme collaborative dédiée</li>
          <li class="fm-fmt-feat">Support Slack post-formation</li>
          <li class="fm-fmt-feat">Sessions de Q&amp;R hebdomadaires</li>
        </ul>
      </div>
      <div class="fm-fmt rv d2">
        <div class="fm-fmt-icon"><i class="fal fa-arrows"></i></div>
        <div class="fm-fmt-title">Hybride</div>
        <p class="fm-fmt-desc">Apprentissage asynchrone en ligne combiné à des sessions présentiel intensives. Le meilleur des deux mondes pour maximiser la rétention.</p>
        <ul class="fm-fmt-list">
          <li class="fm-fmt-feat">Modules e-learning à votre rythme</li>
          <li class="fm-fmt-feat">2 journées intensives en présentiel</li>
          <li class="fm-fmt-feat">Coaching individuel inclus</li>
          <li class="fm-fmt-feat">Suivi sur 3 mois post-formation</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- POUR QUI -->
<section class="fm-audience">
  <div class="container">
    <div class="sec-label">Pour qui</div>
    <h2 class="sec-title rv">Formations conçues<br>pour <em>votre réalité</em> métier</h2>
    <div class="fm-aud-grid">
      <div class="fm-aud-card rv">
        <div class="fm-aud-num">01</div>
        <div class="fm-aud-icon"><i class="fal fa-user-tie"></i></div>
        <div class="fm-aud-title">Dirigeants &amp; Décideurs</div>
        <div class="fm-aud-sub">Master Class · 1 jour</div>
        <p class="fm-aud-desc">CEOs, DGs, DAFs et directeurs qui veulent comprendre les enjeux stratégiques de l'IA et piloter la transformation de leur organisation avec confiance.</p>
      </div>
      <div class="fm-aud-card rv d1">
        <div class="fm-aud-num">02</div>
        <div class="fm-aud-icon"><i class="fal fa-users"></i></div>
        <div class="fm-aud-title">Équipes Opérationnelles</div>
        <div class="fm-aud-sub">Bootcamp No-Code · 3 jours</div>
        <p class="fm-aud-desc">Chefs de projet, opérationnels et managers qui veulent automatiser leurs tâches répétitives et exploiter l'IA au quotidien sans expertise technique.</p>
      </div>
      <div class="fm-aud-card rv d2">
        <div class="fm-aud-num">03</div>
        <div class="fm-aud-icon"><i class="fal fa-code"></i></div>
        <div class="fm-aud-title">Équipes Techniques</div>
        <div class="fm-aud-sub">Atelier Agents IA · 2 jours</div>
        <p class="fm-aud-desc">Développeurs et architectes qui veulent maîtriser les dernières techniques — RAG, agents, fine-tuning — pour construire des produits IA en production.</p>
      </div>
    </div>
  </div>
</section>

<!-- INTEGRATIONS -->
<section class="integrations integrations-white">
  <div class="container">
    <div class="sec-label">Intégrations natives</div>
    <h2 class="sec-title rv">Connecté à <em>vos outils</em></h2>
    <div class="int-grid">
      <div class="int-item rv"><i class="fab fa-slack int-icon"></i><span class="int-name">Slack</span></div>
      <div class="int-item rv d1"><i class="fab fa-salesforce int-icon"></i><span class="int-name">Salesforce</span></div>
      <div class="int-item rv d2"><i class="fab fa-hubspot int-icon"></i><span class="int-name">HubSpot</span></div>
      <div class="int-item rv d3"><i class="fab fa-whatsapp int-icon"></i><span class="int-name">WhatsApp</span></div>
      <div class="int-item rv"><i class="fab fa-notion int-icon" style="font-family:var(--fm);font-weight:700;font-size:1.2rem;letter-spacing:0">N</i><span class="int-name">Notion</span></div>
      <div class="int-item rv d1"><i class="fab fa-google int-icon"></i><span class="int-name">Google</span></div>
      <div class="int-item rv d2"><i class="fa fa-bolt int-icon"></i><span class="int-name">Zapier</span></div>
      <div class="int-item rv d3"><i class="fab fa-stripe int-icon"></i><span class="int-name">Stripe</span></div>
      <div class="int-item rv"><i class="fab fa-shopify int-icon"></i><span class="int-name">Shopify</span></div>
      <div class="int-item rv d1"><i class="fab fa-microsoft int-icon"></i><span class="int-name">Microsoft</span></div>
      <div class="int-item rv d2"><i class="fa fa-database int-icon"></i><span class="int-name">Airtable</span></div>
      <div class="int-item rv d3"><i class="fab fa-intercom int-icon" style="font-family:var(--fm);font-weight:700;font-size:1.1rem;letter-spacing:0">I</i><span class="int-name">Intercom</span></div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Réserver votre formation</div>
    <h2 class="sec-title">Transformez vos équipes<br><em>dès ce trimestre</em></h2>
    <p class="cta-sub">Programme intra-entreprise ou inter-entreprises. Audit de vos besoins en formation offert.</p>
    <div class="cta-btns">
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un programme" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Demander un programme</span></div>
          <div class="sb-knob"><i class="fal fa-calculator"></i></div>
        </a>
    
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Organiser une session entreprise" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Organiser une session entreprise</span></div>
          <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
        </a>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<?php include('includes/testimonials.php'); ?>