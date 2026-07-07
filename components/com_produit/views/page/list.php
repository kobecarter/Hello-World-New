<style>
/* MARKETPLACE HERO */
.mkt-hero{position:relative;padding:14rem 0 8rem;background:var(--bg2);overflow:hidden;border-bottom:1px solid var(--border)}
.mkt-hero-pattern{position:absolute;inset:0;z-index:0;overflow:hidden}
.mkt-hero-pattern::before{content:'';position:absolute;inset:0;background-image:radial-gradient(circle,rgba(0,0,0,.07) 1.5px,transparent 1.5px);background-size:28px 28px}
.mkt-hero-pattern::after{content:'';position:absolute;top:-400px;right:-200px;width:800px;height:800px;background:radial-gradient(circle,rgba(139,106,34,.05) 0%,transparent 60%)}
.mkt-hero .container{position:relative;z-index:2}
.mkt-hero-inner{display:grid;grid-template-columns:1fr 340px;gap:4rem;align-items:center}
.mkt-hero-label{font-size:.6rem;letter-spacing:.46em;text-transform:uppercase;color:var(--gold);display:flex;align-items:center;gap:.9rem;margin-bottom:2rem}
.mkt-hero-label::before{content:'';width:36px;height:1px;background:var(--gold)}
.mkt-hero-title{font-family:var(--fm);font-weight:300;font-size:clamp(3rem,6.5vw,8rem);line-height:.92;letter-spacing:-.04em;color:var(--txt);margin-bottom:2.5rem}
.mkt-hero-title em{font-style:italic;color:var(--gold);font-family:var(--fd);font-weight:200}
.mkt-hero-sub{font-size:.92rem;font-weight:300;color:var(--txt2);max-width:480px;line-height:1.9;margin-bottom:3rem}
.mkt-hero-ctas{display:flex;gap:1rem;flex-wrap:wrap}
.mkt-count-box{background:var(--bg);border:1px solid var(--border);border-radius:18px;overflow:hidden}
.mkt-count-item{padding:2rem 2.4rem;border-bottom:1px solid var(--border)}
.mkt-count-item:last-child{border-bottom:none}
.mkt-count-val{font-family:var(--fd);font-weight:200;font-size:3.5rem;line-height:1;color:var(--txt);letter-spacing:-.04em}
.mkt-count-val span{color:var(--gold);font-size:.55em}
.mkt-count-lbl{font-family:var(--fm);font-size:.6rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--txt2);margin-top:.3rem}
@media(max-width:1024px){.mkt-hero-inner{grid-template-columns:1fr}.mkt-count-box{display:flex;gap:0}.mkt-count-item{flex:1;border-bottom:none;border-right:1px solid var(--border)}.mkt-count-item:last-child{border-right:none}}
@media(max-width:575px){.mkt-count-box{display:none}}

</style>

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
            <div class="sh-breadcrumb"><?php echo $page->getTitre() ?></div>
            <h1 class="sh-h1"><em>Solutions IA</em> prêtes à l'emploi</h1>
            <p class="sh-sub"><?php echo strip_tags($page->getExtrait()); ?></p>
      
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un devis" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander un devis</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
        
            <a href="#catalogue" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir nos packs" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir nos packs</span></div>
              <div class="sb-knob"><i class="fal fa-robot"></i></div>
            </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3">
        <img src="<?php echo $siteURL; ?>images/pages/<?php echo $page->getPhoto() ?>" alt="">
      </div>
    </div>
  </div>
</section>

<!-- ══ MARQUEE — visible after hero unpins ═════════════════════ -->
<div class="mq" id="mq"><div class="mq-t">
  <span class="mi"><span class="d"></span><span class="h">HW Concierge AI</span></span>
  <span class="mi"><span class="d"></span>HW WhatsApp Agent</span>
  <span class="mi"><span class="d"></span><span class="h">HW SDR Agent</span></span>
  <span class="mi"><span class="d"></span>HW Support 24/7</span>
  <span class="mi"><span class="d"></span><span class="h">HW Content Studio</span></span>
  <span class="mi"><span class="d"></span>HW Voice Caller</span>
  <span class="mi"><span class="d"></span><span class="h">HW Concierge AI</span></span>
  <span class="mi"><span class="d"></span>HW WhatsApp Agent</span>
  <span class="mi"><span class="d"></span><span class="h">HW SDR Agent</span></span>
  <span class="mi"><span class="d"></span>HW Support 24/7</span>
  <span class="mi"><span class="d"></span><span class="h">HW Content Studio</span></span>
  <span class="mi"><span class="d"></span>HW Voice Caller</span>
  <span class="mi"><span class="d"></span><span class="h">HW Concierge AI</span></span>
  <span class="mi"><span class="d"></span>HW WhatsApp Agent</span>
  <span class="mi"><span class="d"></span><span class="h">HW SDR Agent</span></span>
  <span class="mi"><span class="d"></span>HW Support 24/7</span>
</div></div>

<!-- CATALOG -->
<section class="mkt-catalog" id="catalogue">
  <div class="container">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:2rem;gap:2rem;flex-wrap:wrap">
      <div>
        <div class="sec-label">Catalogue Complet</div>
        <h2 class="sec-title rv">L'intelligence artificielle<br><em>à la carte</em></h2>
      </div>
    </div>
    <!--
    <div class="mkt-filter-bar rv">
      <button class="mkt-filter active">Tous</button>
      <button class="mkt-filter">Commercial</button>
      <button class="mkt-filter">Support</button>
      <button class="mkt-filter">Marketing</button>
      <button class="mkt-filter">Opérations</button>
      <button class="mkt-filter">Communication</button>
    </div>
    -->
    
    <div class="mkt-grid">
      <div class="mkt-card rv">
        <div class="mkt-card-top">
          <div class="mkt-card-icon"><i class="fal fa-robot"></i></div>
          <span class="mkt-card-badge popular">Populaire</span>
        </div>
        <div class="mkt-card-name">HW Concierge AI</div>
        <p class="mkt-card-desc">Assistant conversationnel multicanal — site, chat, email — formé sur votre catalogue et vos processus. Disponible 24/7, multilingue.</p>
        <div class="mkt-card-meta">
          <span class="mkt-card-deploy"><i class="fa fa-clock"></i> Déployé en 48h</span>
          <span class="mkt-card-link">En savoir plus <i class="fa fa-arrow-right fa-xs"></i></span>
        </div>
      </div>

      <div class="mkt-card rv d1">
        <div class="mkt-card-top">
          <div class="mkt-card-icon"><i class="fab fa-whatsapp"></i></div>
          <span class="mkt-card-badge popular">Populaire</span>
        </div>
        <div class="mkt-card-name">HW WhatsApp Agent</div>
        <p class="mkt-card-desc">Automatisation WhatsApp Business : confirmations de RDV, suivi de commandes, relances et support client synchronisé avec votre CRM.</p>
        <div class="mkt-card-meta">
          <span class="mkt-card-deploy"><i class="fa fa-clock"></i> Déployé en 24h</span>
          <span class="mkt-card-link">En savoir plus <i class="fa fa-arrow-right fa-xs"></i></span>
        </div>
      </div>

      <div class="mkt-card rv d2">
        <div class="mkt-card-top">
          <div class="mkt-card-icon"><i class="fal fa-chart-line"></i></div>
          <span class="mkt-card-badge new">Nouveau</span>
        </div>
        <div class="mkt-card-name">HW SDR Agent</div>
        <p class="mkt-card-desc">Agent commercial IA pour la prospection sortante : qualification de leads, envoi de séquences personnalisées et prise de rendez-vous automatique.</p>
        <div class="mkt-card-meta">
          <span class="mkt-card-deploy"><i class="fa fa-clock"></i> Déployé en 72h</span>
          <span class="mkt-card-link">En savoir plus <i class="fa fa-arrow-right fa-xs"></i></span>
        </div>
      </div>

      <div class="mkt-card rv">
        <div class="mkt-card-top">
          <div class="mkt-card-icon"><i class="fal fa-headset"></i></div>
          <span class="mkt-card-badge">Support</span>
        </div>
        <div class="mkt-card-name">HW Support 24/7</div>
        <p class="mkt-card-desc">Résolution automatique de 80% des tickets de support. Escalade intelligente, base de connaissance auto-apprenante et rapports hebdomadaires.</p>
        <div class="mkt-card-meta">
          <span class="mkt-card-deploy"><i class="fa fa-clock"></i> Déployé en 48h</span>
          <span class="mkt-card-link">En savoir plus <i class="fa fa-arrow-right fa-xs"></i></span>
        </div>
      </div>

      <div class="mkt-card rv d1">
        <div class="mkt-card-top">
          <div class="mkt-card-icon"><i class="fal fa-pen-nib"></i></div>
          <span class="mkt-card-badge">Marketing</span>
        </div>
        <div class="mkt-card-name">HW Content Studio</div>
        <p class="mkt-card-desc">Génération de contenu à l'échelle dans le ton de votre marque : articles SEO, posts réseaux sociaux, newsletters, scripts et descriptions produits.</p>
        <div class="mkt-card-meta">
          <span class="mkt-card-deploy"><i class="fa fa-clock"></i> Déployé en 24h</span>
          <span class="mkt-card-link">En savoir plus <i class="fa fa-arrow-right fa-xs"></i></span>
        </div>
      </div>

      <div class="mkt-card rv d2">
        <div class="mkt-card-top">
          <div class="mkt-card-icon"><i class="fal fa-phone-volume"></i></div>
          <span class="mkt-card-badge new">Nouveau</span>
        </div>
        <div class="mkt-card-name">HW Voice Caller</div>
        <p class="mkt-card-desc">Appels sortants automatisés en voix naturelle pour les relances, confirmations et enquêtes. Français, anglais, arabe et espagnol disponibles.</p>
        <div class="mkt-card-meta">
          <span class="mkt-card-deploy"><i class="fa fa-clock"></i> Déployé en 72h</span>
          <span class="mkt-card-link">En savoir plus <i class="fa fa-arrow-right fa-xs"></i></span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DEPLOY TIMELINE -->
<section class="mkt-deploy">
  <div class="container">
    <div class="sec-label">Processus de déploiement</div>
    <h2 class="sec-title rv">Opérationnel en <em>3 étapes</em>,<br>pas en 3 mois</h2>
    <div class="mkt-timeline rv d1">
      <div class="mkt-tl-grid">
        <div class="mkt-tl-item">
          <div class="mkt-tl-dot"></div>
          <div class="mkt-tl-step">Étape 01</div>
          <div class="mkt-tl-title">Audit & Sélection</div>
          <p class="mkt-tl-desc">Appel de découverte de 30 minutes avec nos experts pour identifier le(s) produit(s) IA les plus adaptés à vos cas d'usage et votre stack existant.</p>
          <div class="mkt-tl-time"><i class="fa fa-clock"></i> Jour 1</div>
        </div>
        <div class="mkt-tl-item">
          <div class="mkt-tl-dot"></div>
          <div class="mkt-tl-step">Étape 02</div>
          <div class="mkt-tl-title">Configuration & Intégration</div>
          <p class="mkt-tl-desc">Nos équipes configurent le produit sur vos données et l'intègrent à vos outils (CRM, base de connaissance, canal de communication) en mode no-code.</p>
          <div class="mkt-tl-time"><i class="fa fa-clock"></i> Jours 2–3</div>
        </div>
        <div class="mkt-tl-item">
          <div class="mkt-tl-dot"></div>
          <div class="mkt-tl-step">Étape 03</div>
          <div class="mkt-tl-title">Go-Live & Monitoring</div>
          <p class="mkt-tl-desc">Déploiement progressif avec tests en conditions réelles, formation de vos équipes et mise en place du monitoring. Votre agent IA est en production.</p>
          <div class="mkt-tl-time"><i class="fa fa-clock"></i> Jours 4–7</div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ══ CTA FINAL ══════════════════════════════════════════════════════════ -->
<section class="hw-f-list-cta-final cta-hw-final">
  <video class="hw-f-list-cta-final-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
    <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
  </video>
  <div class="hw-f-list-cta-final-scrim"></div>
  <div class="container">
    <div class="sec-label rv">Commencer maintenant</div>
    <h2 class="sec-title rv d1">Votre agent IA en <em>production</em><br>cette semaine</h2>
    <p class="hw-f-list-cta-sub rv d2">Audit gratuit de 30 minutes, configuration en 48h, résultats mesurables dès la première semaine.</p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint">Demander un devis</span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
        <a href="#catalogue" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir le marketplace IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Voir toutes les solutions</span></div>
          <div class="sb-knob"><i class="fal fa-shopping-basket"></i></div>
        </a>
    </div>
  </div>
</section>


<section class="faq" id="faq">
  <div class="container">
    <div class="sec-label rv">Questions fréquentes</div>
    <h2 class="sec-title rv d1">Tout ce que vous <br><em>devez savoir</em></h2>
    <div class="faq-cols rv d2">
      <div>
        <div class="faq-list">
          <?php foreach($faqs as $faq): ?>
          <div class="faq-item">
            <button class="faq-btn">
              <span class="faq-q"><?php echo $faq->getTitre(); ?></span>
              <span class="faq-ico"><i class="fa fa-plus"></i></span>
            </button>
            <div class="faq-body">
              <p class="faq-ans"><?php echo strip_tags($faq->getTexte()); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <div class="faq-list">
          <?php foreach($faqs2 as $faq): ?>
          <div class="faq-item">
            <button class="faq-btn">
              <span class="faq-q"><?php echo $faq->getTitre(); ?></span>
              <span class="faq-ico"><i class="fa fa-plus"></i></span>
            </button>
            <div class="faq-body">
              <p class="faq-ans"><?php echo strip_tags($faq->getTexte()); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>