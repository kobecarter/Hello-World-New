<!-- ═══ HERO ════════════════════════════════════════ -->
<section class="ct-hero">
	<canvas id="hero-canvas"></canvas>
  <span class="ct-hero-ghost" aria-hidden="true">CONTACT</span>
  <div class="container">
    <div class="ct-hero-bread rv">
      <a href="<?php echo $siteURL; ?>">Accueil</a>
      <i class="fa fa-chevron-right"></i>
      <span>Contact</span>
    </div>
    <div class="ct-hero-inner">
      <div>
        <div class="ct-hero-label rv">Hello World Agency</div>
        <h1 class="ct-hero-title rv d1">Parlons<br><em>de votre</em> projet</h1>
      </div>
      <!-- <div class="ct-hero-right rv d2">
        <p class="ct-hero-sub">Première prise de contact sans engagement. Notre équipe analyse votre situation et revient vers vous sous 24 heures avec des recommandations concrètes.</p>
        <span class="ct-hero-badge"><i class="fa fa-shield-halved"></i> 100% gratuit · Sans engagement</span>
      </div> -->
    </div>
  </div>
</section>

<!-- ═══ AUDIT OFFERT ════════════════════════════════ -->
<section class="ct-audit">
  <div class="ct-audit-grid" aria-hidden="true"></div>
  <div class="container">
    <div class="ct-audit-inner">
      <div>
        <div class="sec-label rv">Offre exclusive</div>
        <h2 class="sec-title rv d1">Audit Stratégique <br><em>Offert</em></h2>
        
        <p class="ct-audit-desc rv d2">Nous analysons votre présence digitale, vos opportunités IA et votre positionnement concurrentiel. Un diagnostic complet, livré sous 5 jours.</p>
        <ul class="ct-audit-list rv d2">
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span>Audit de votre présence web et réseaux sociaux</li>
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span>Identification de vos 5 meilleurs cas d'usage IA</li>
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span>Analyse de vos concurrents directs</li>
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span>Roadmap digitale personnalisée sur 12 mois</li>
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span>100% gratuit, sans aucun engagement</li>
        </ul>
        <span class="ct-audit-tag rv d3"><i class="fa fa-gift"></i> Valeur estimée : 2 400 €</span>
      </div>
      <div class="rv d2">
        <div class="ct-audit-stats">
          <div class="ct-audit-stat">
            <div class="ct-stat-val">1000<span>+</span></div>
            <div class="ct-stat-lbl">Clients accompagnés</div>
          </div>
          <div class="ct-audit-stat">
            <div class="ct-stat-val">120<span>+</span></div>
            <div class="ct-stat-lbl">Projets livrés</div>
          </div>
          <div class="ct-audit-stat">
            <div class="ct-stat-val">12<span> ans</span></div>
            <div class="ct-stat-lbl">D'expertise digitale</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FORMULAIRE + CEO ════════════════════════════ -->
<section class="ct-main" id="formulaire">
  <div class="container">
    <div class="ct-main-inner">

      <!-- FORM -->
      <div class="ct-form-block">
        <div class="ct-form-head rv">
            <div class="sec-label rv">Formulaire de contact</div>
            <h2 class="sec-title rv d1">Écrivez <em>nous</em></h2>
        </div>

        <?php include("components/com_contact/views/contact/form.php"); ?>
      </div>

      <!-- CEO SIDEBAR -->
      <aside class="ct-ceo rv d2">
        <div class="ct-ceo-photo">
          <div class="ct-ceo-photo-inner">
            <span class="ct-ceo-initials">HK</span>
            <span class="ct-ceo-photo-ghost" aria-hidden="true">HW</span>
			<img src="<?php echo $siteURL; ?>images/digital_expert.webp" alt="Hamid Kennou">
          </div>
          <span class="ct-ceo-badge">Votre interlocuteur</span>
        </div>
        <div class="ct-ceo-name">Hamid Kennou</div>
        <div class="ct-ceo-role">CEO &amp; Fondateur</div>
        <p class="ct-ceo-bio"><i class="fa fa-quote-left"></i> Pour moi, le digital est avant tout une aventure humaine que je mène avec <strong>amour depuis 15 ans</strong>. Nous mettons tout notre cœur pour que votre marque ne soit pas seulement <strong>visible</strong>, mais qu’elle brille par son authenticité et devienne <strong>réellement rentable</strong>. Notre mission est de transformer votre présence en un levier de croissance solide <strong>partout au Maroc</strong>. <i class="fa fa-quote-right"></i></p>
        <div class="ct-ceo-contacts">
          <a href="mailto:<?php echo $config->getEmail(); ?>" class="ct-ceo-contact"><i class="fa fa-envelope"></i> <?php echo $config->getEmail(); ?></a>
          <a href="tel:+33600000000" class="ct-ceo-contact"><i class="fa fa-phone"></i> <?php echo $config->getTel2(); ?></a>
          <a href="<?php echo $config->getLinkedin(); ?>" target="_blank" rel="noopener" class="ct-ceo-contact"><i class="fab fa-linkedin"></i> Hamid Kennou sur LinkedIn</a>
        </div>
        <div class="ct-ceo-socials">
          <a href="<?php echo $config->getLinkedin(); ?>" class="ct-ceo-social" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="<?php echo $config->getInstagram(); ?>" class="ct-ceo-social" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="<?php echo $config->getYoutube(); ?>" class="ct-ceo-social" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          <a href="<?php echo $config->getFacebook(); ?>" class="ct-ceo-social" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
        </div>
        <div class="ct-ceo-guarantee">
          <i class="fa fa-circle-check"></i>
          <div class="ct-ceo-guarantee-text">
            <strong>Réponse garantie sous 24h</strong>
            Chaque demande est analysée et traitée par notre équipe. Aucun bot, que des humains.
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<!-- ═══ NOS BUREAUX ══════════════════════════════════ -->
<section class="ct-offices">
  <div class="container">
    <div class="sec-label">Nos Bureaux</div>
    <h2 class="sec-title rv">Présents sur <em>3 continents</em></h2>
    <div class="ct-offices-grid rv d1">

      <div class="ct-office-card">
        <div class="ct-office-city">Afrique</div>
        <div class="ct-office-name">Marrakech</div>
        <div class="ct-office-addr"><?php echo $config->getAdresse(); ?></div>
        <div class="ct-office-details">
          <a href="tel:<?php echo $config->getTel(); ?>" class="ct-office-detail"><i class="fa fa-phone"></i> <?php echo $config->getTel(); ?></a>
          <a href="mailto:<?php echo $config->getEmail(); ?>" class="ct-office-detail"><i class="fa fa-envelope"></i> <?php echo $config->getEmail(); ?></a>
        </div>
      </div>

      <div class="ct-office-card">
        <div class="ct-office-city">Europe</div>
        <div class="ct-office-name">London</div>
        <div class="ct-office-addr">1 Canada Square, Level 30<br>Canary Wharf<br>London E14 5AB, UK</div>
        <div class="ct-office-details">
          <a href="tel:+442079460100" class="ct-office-detail"><i class="fa fa-phone"></i> +44 20 7946 0100</a>
          <a href="mailto:london@helloworld-agency.com" class="ct-office-detail"><i class="fa fa-envelope"></i> london@helloworld-agency.com</a>
        </div>
      </div>

      <div class="ct-office-card">
        <div class="ct-office-city">Moyen-Orient</div>
        <div class="ct-office-name">Dubai</div>
        <div class="ct-office-addr">DIFC, Gate Avenue<br>Level 14, Office 1406<br>Dubai, UAE 117210</div>
        <div class="ct-office-details">
          <a href="tel:+97144550100" class="ct-office-detail"><i class="fa fa-phone"></i> +971 4 455 0100</a>
          <a href="mailto:dubai@helloworld-agency.com" class="ct-office-detail"><i class="fa fa-envelope"></i> contact@helloworldlabel.ae</a>
        </div>
      </div>

    </div>
  </div>
</section>


<?php include('includes/testimonials.php'); ?>


<!-- ═══ SOCIAL STRIP ════════════════════════════════ -->
<section class="ct-social-strip">
  <div class="container">
    <div class="ct-social-inner rv">
      <div class="ct-social-left">Suivez-nous sur</div>
      <div class="ct-social-links">
        <a href="<?php echo $config->getLinkedin(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        <a href="<?php echo $config->getInstagram(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="<?php echo $config->getYoutube(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-youtube"></i> YouTube</a>
        <a href="<?php echo $config->getFacebook(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
      </div>
    </div>
  </div>
</section>