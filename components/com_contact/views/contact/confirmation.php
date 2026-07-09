
<!-- ═══ HERO ════════════════════════════════════════ -->
<section class="ty-hero">
  <div class="ty-hero-grid" aria-hidden="true">
    <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
      <defs><pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"><path d="M 60 0 L 0 0 0 60" fill="none" stroke="#8b6a22" stroke-width="0.5"/></pattern></defs>
      <rect width="1440" height="900" fill="url(#grid)"/>
      <line x1="0" y1="900" x2="1440" y2="0" stroke="#8b6a22" stroke-width="0.4"/>
      <line x1="720" y1="900" x2="1440" y2="200" stroke="#8b6a22" stroke-width="0.3"/>
    </svg>
  </div>
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(16rem,32vw,46rem);bottom:-3rem;right:-1rem;color:rgba(0,0,0,.025)" aria-hidden="true">OK</span>
  <div class="container">
    <div class="ty-hero-bread rv">
      <a href="<?php echo $siteURL; ?>">Accueil</a>
      <i class="fa fa-chevron-right"></i>
      <a href="<?php echo $pageContact->getLink(); ?>">Contact</a>
      <i class="fa fa-chevron-right"></i>
      <span>Confirmation</span>
    </div>
    <div class="ty-hero-inner">
      <div>
        <div class="ty-hero-label rv">Confirmation</div>
        <h1 class="ty-hero-title rv d1">Message <em>bien reçu</em>, merci.</h1>
        <p class="ty-hero-sub rv d2">Notre équipe a été notifiée et analyse votre demande. Vous recevrez une réponse personnalisée de notre part dans les plus brefs délais.</p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $siteURL; ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un devis" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Retour à l'accueil</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
        
            <a href="<?php echo $pageRealisation->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir nos offres" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir les réalisations</span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div> 
            </a>
        </div>
      </div>
      <div class="rv d2">
        <div class="ty-confirm-card">
          <div class="ty-confirm-icon"><i class="fa fa-check"></i></div>
          <div class="ty-confirm-title">Envoyé <em>avec succès</em></div>
          <p class="ty-confirm-desc">Votre message a été transmis à notre équipe. Nous vous répondons personnellement sous 24h ouvrées.</p>
          <div class="ty-confirm-sep"></div>
          <div class="ty-confirm-rows">
            <div class="ty-confirm-row"><i class="fa fa-clock"></i> Réponse garantie sous 24h</div>
            <div class="ty-confirm-row"><i class="fa fa-user-tie"></i> Hamid Kennou vous contacte directement</div>
            <div class="ty-confirm-row"><i class="fa fa-gift"></i> Audit stratégique gratuit inclus</div>
            <div class="ty-confirm-row"><i class="fa fa-shield-halved"></i> Aucun engagement requis</div>
          </div>
          <div class="ty-countdown-bar"><div class="ty-countdown-fill"></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PENDANT CE TEMPS, EXPLOREZ ══════════════════ -->
<section class="ty-explore">
  <div class="container">
    <div class="sec-label">À découvrir</div>
    <h2 class="sec-title rv">En attendant notre <em>réponse</em></h2>
    <div class="ty-explore-grid rv d1">
      <a href="<?php echo $pageRealisation->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-images ty-exp-icon"></i>
        <div class="ty-exp-label">Portfolio</div>
        <div class="ty-exp-title">Nos réalisations</div>
        <div class="ty-exp-desc">120+ projets web, mobile et IA livrés pour des marques ambitieuses.</div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageBlog->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-newspaper ty-exp-icon"></i>
        <div class="ty-exp-label">Insights</div>
        <div class="ty-exp-title">Notre blog</div>
        <div class="ty-exp-desc">Stratégie digitale, tendances IA et guides pratiques pour votre croissance.</div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageIA->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-robot ty-exp-icon"></i>
        <div class="ty-exp-label">Solutions IA</div>
        <div class="ty-exp-title">Nos agents IA</div>
        <div class="ty-exp-desc">Automatisez vos ventes, votre support et votre création de contenu avec l'IA.</div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageFormation->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-graduation-cap ty-exp-icon"></i>
        <div class="ty-exp-label">Formations</div>
        <div class="ty-exp-title">Formation IA</div>
        <div class="ty-exp-desc">Formez vos équipes et dirigeants aux outils IA en 2 jours, sur mesure.</div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
    </div>
  </div>
</section>

<!-- ═══ CTA ══════════════════════════════════════════ -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Hello World Agency</div>
    <h2 class="sec-title">À très bientôt<br><em>dans votre boîte mail</em></h2>
    <p class="cta-sub">En attendant, suivez-nous sur LinkedIn et Instagram pour découvrir nos dernières réalisations et tendances IA.</p>
    <div class="cta-btns">
      <a href="<?php echo $siteURL; ?>" class="btn-hw"><span>Retour à l'accueil</span> <i class="fa fa-arrow-right fa-xs"></i></a>
      <a href="<?php echo $pageContact->getLink(); ?>" class="btn-hw btn-ghost"><span>Envoyer un autre message</span></a>
    </div>
  </div>
</section>