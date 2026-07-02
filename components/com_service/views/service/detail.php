<!-- HERO -->
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
        <div class="wm-hero-label"><?php echo $service->getTitre() ?></div>
        <h1 class="wm-hero-title rv"><?php echo $service->getH1() ?></h1>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($service->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
          <a href="<?php echo $pageContact->getLink(); ?>" class="btn-hw"><span>Demander un devis</span> <i class="fa fa-arrow-right fa-xs"></i></a>
          <a href="#services" class="btn-hw" style="border-color:var(--border);color:var(--txt2)"><span>Voir nos offres</span></a>
        </div>
      </div>
      <div class="wm-hero-side rv d3">
        <img src="<?php echo $siteURL; ?>images/services/<?php echo $service->getPhotoBanniere() ?>" alt="">
      </div>
    </div>
  </div>
</section>

<!-- PRODUCTS -->
<section class="products" id="produits">
  <div class="container">
    <div class="products-header">
      <div>
        <div class="sec-label">Nos Produits IA</div>
        <h2 class="sec-title">Six solutions <em>immédiatement</em>opérationnelles</h2>
      </div>
	</div>

    <div class="prod-grid">
      <div class="prod-card rv" id="hw-concierge">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-robot"></i></div>
        </div>
        <div class="prod-name"><strong>Concierge AI</strong>L'assistant intelligent pour vos clients</div>
        <p class="prod-desc">Un agent conversationnel multicanal qui répond, oriente et convertit 24/7 — formé sur votre catalogue, vos FAQ et vos processus métier.</p>
        <div class="prod-tags">
          <span class="prod-tag">Chat</span>
          <span class="prod-tag">E-mail</span>
          <span class="prod-tag">Multilingue</span>
        </div>
      </div>

      <div class="prod-card rv d1" id="hw-whatsapp">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fab fa-whatsapp"></i></div>
        </div>
        <div class="prod-name"><strong>WhatsApp Agent</strong>L'automatisation WhatsApp Business</div>
        <p class="prod-desc">Confirmations de RDV, suivi de commandes, relances et support client directement dans WhatsApp. Intégré à votre CRM en temps réel.</p>
        <div class="prod-tags">
          <span class="prod-tag">WhatsApp API</span>
          <span class="prod-tag">CRM sync</span>
          <span class="prod-tag">Automation</span>
        </div>
      </div>

      <div class="prod-card rv d2" id="hw-sdr">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-chart-line"></i></div>
        </div>
        <div class="prod-name"><strong>SDR Agent</strong>Le commercial IA qui ne dort jamais</div>
        <p class="prod-desc">Prospection automatisée, qualification de leads et prise de RDV sur LinkedIn, email et téléphone. Votre pipeline commercial en pilote automatique.</p>
        <div class="prod-tags">
          <span class="prod-tag">LinkedIn</span>
          <span class="prod-tag">Cold email</span>
          <span class="prod-tag">Lead scoring</span>
        </div>
      </div>

      <div class="prod-card rv" id="hw-support">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-headset"></i></div>
        </div>
        <div class="prod-name"><strong>Support 24/7</strong>Le service client qui ne s'arrête jamais</div>
        <p class="prod-desc">Résolution automatique de 80% des tickets. Escalade intelligente vers vos agents humains. Base de connaissance qui s'enrichit à chaque interaction.</p>
        <div class="prod-tags">
          <span class="prod-tag">Zendesk</span>
          <span class="prod-tag">Intercom</span>
          <span class="prod-tag">Auto-learning</span>
        </div>
      </div>

      <div class="prod-card rv d1" id="hw-content">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-pen-nib"></i></div>
        </div>
        <div class="prod-name"><strong>Content Studio</strong>La production de contenu à l'échelle</div>
        <p class="prod-desc">Articles SEO, posts réseaux sociaux, newsletters et scripts vidéo générés dans le ton de votre marque. 10x votre production, 0 compromis sur la qualité.</p>
        <div class="prod-tags">
          <span class="prod-tag">SEO</span>
          <span class="prod-tag">Social</span>
          <span class="prod-tag">Brand voice</span>
        </div>
      </div>

      <div class="prod-card rv d2" id="hw-voice">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-phone-volume"></i></div>
        </div>
        <div class="prod-name"><strong>Voice Caller</strong>Les appels sortants automatisés</div>
        <p class="prod-desc">Relances téléphoniques, confirmations de RDV et enquêtes de satisfaction en voix naturelle. Disponible en français, anglais, arabe et espagnol.</p>
        <div class="prod-tags">
          <span class="prod-tag">Voix naturelle</span>
          <span class="prod-tag">Multilingue</span>
          <span class="prod-tag">CRM ready</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="portfolio" id="work">
  <div class="container">
    <div class="sec-label rv">Cas d'utilisation</div>
    <h2 class="sec-title rv d1">Nos dernières <em>réalisations</em></h2>
    <div class="port-grid rv d2">
      <div class="port-item p-meridian tall">
        <a href="<?php echo $references[0]->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[0]->getPhoto(); ?>" alt="<?php echo $references[0]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $references[0]->getLink(); ?>" class="port-arrow"><i class="fa fa-arrow-up-right-from-square fa-xs"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $references[0]->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $references[0]->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $references[0]->getExtrait(); ?></p>
        </div>
      </div>

      <div class="port-item p-luminis">
        <a href="<?php echo $references[1]->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[1]->getPhoto(); ?>" alt="<?php echo $references[1]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $references[1]->getLink(); ?>" class="port-arrow"><i class="fa fa-arrow-up-right-from-square fa-xs"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $references[1]->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $references[1]->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $references[1]->getExtrait(); ?></p>
        </div>
      </div>
      <div class="port-item p-corvus">
        <a href="<?php echo $references[2]->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[2]->getPhoto(); ?>" alt="<?php echo $references[2]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $references[2]->getLink(); ?>" class="port-arrow"><i class="fa fa-arrow-up-right-from-square fa-xs"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $references[2]->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $references[2]->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $references[2]->getExtrait(); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="process">
  <div class="container">
    <div class="sec-label">Notre méthode</div>
    <h2 class="sec-title rv">De l'audit au <em>déploiement</em><br>en 4 semaines</h2>
    <div class="process-steps">
      <div class="step rv">
        <span class="step-num">01</span>
        <div class="step-title">Audit & Analyse</div>
        <p class="step-desc">Cartographie de vos processus, identification des cas d'usage à fort ROI et sélection des outils IA adaptés à votre stack.</p>
      </div>
      <div class="step rv d1">
        <span class="step-num">02</span>
        <div class="step-title">Configuration IA</div>
        <p class="step-desc">Formation du modèle sur vos données, personnalisation du ton et des réponses, mise en place des règles métier et des gardes-fous.</p>
      </div>
      <div class="step rv d2">
        <span class="step-num">03</span>
        <div class="step-title">Intégration</div>
        <p class="step-desc">Connexion à votre CRM, vos outils de communication et vos bases de données. Tests exhaustifs en environnement staging.</p>
      </div>
      <div class="step rv d3">
        <span class="step-num">04</span>
        <div class="step-title">Optimisation continue</div>
        <p class="step-desc">Monitoring des performances, ajustements hebdomadaires et rapports mensuels. Votre agent IA s'améliore avec chaque interaction.</p>
      </div>
    </div>
  </div>
</section>

<!-- INTEGRATIONS -->
<section class="integrations">
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

<!-- GOUVERNANCE -->
<section class="gouv">
  <div class="container">
    <div class="sec-label">Sécurité & Conformité</div>
    <h2 class="sec-title rv">Gouvernance IA <em>enterprise-grade</em></h2>
    <div class="gouv-grid">
      <div class="gouv-card rv">
        <span class="gouv-num">01</span>
        <div class="gouv-icon"><i class="fa fa-shield-halved"></i></div>
        <div class="gouv-title">Données hébergées en Europe</div>
        <p class="gouv-desc">Vos données ne quittent jamais les serveurs européens. Conformité RGPD native, chiffrement AES-256 au repos et en transit, audits réguliers.</p>
      </div>
      <div class="gouv-card rv d1">
        <span class="gouv-num">02</span>
        <div class="gouv-icon"><i class="fa fa-user-lock"></i></div>
        <div class="gouv-title">Contrôle d'accès granulaire</div>
        <p class="gouv-desc">Gestion des rôles et permissions par équipe, historique complet des accès, SSO enterprise et authentification multi-facteurs.</p>
      </div>
      <div class="gouv-card rv d2">
        <span class="gouv-num">03</span>
        <div class="gouv-icon"><i class="fa fa-circle-check"></i></div>
        <div class="gouv-title">Transparence & auditabilité</div>
        <p class="gouv-desc">Chaque décision IA est traçable et explicable. Logs complets, tableaux de bord de monitoring et rapports de conformité sur demande.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Commencer maintenant</div>
    <h2 class="sec-title">Votre premier agent IA<br><em>opérationnel en 3 semaines</em></h2>
    <p class="cta-sub">Un audit gratuit de 90 minutes avec nos experts pour identifier vos 3 meilleurs cas d'usage IA.</p>
    <div class="cta-btns">
      <a href="index.html#contact" class="btn-hw"><span>Demander un audit IA</span> <i class="fa fa-arrow-right fa-xs"></i></a>
      <a href="marketplace.html" class="btn-hw btn-ghost"><span>Voir le catalogue</span></a>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>