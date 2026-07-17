<!-- ═══ HERO ════════════════════════════════════════ -->
<section class="ct-hero">
	<canvas id="hero-canvas"></canvas>
  <span class="ct-hero-ghost" aria-hidden="true">CONTACT</span>
  <div class="container">
    <div class="ct-hero-bread rv">
      <a href="<?php echo $siteURL; ?>"><?php echo $lang['CT_BREAD_ACCUEIL'][$_SESSION['lang']]; ?></a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $lang['CT_BREAD_CONTACT'][$_SESSION['lang']]; ?></span>
    </div>
    <div class="ct-hero-inner">
      <div>
        <div class="ct-hero-label rv">Hello World Agency</div>
        <h1 class="ct-hero-title rv d1"><?php echo $lang['CT_HERO_TITLE'][$_SESSION['lang']]; ?></h1>
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
        <div class="sec-label rv"><?php echo $lang['CT_AUDIT_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv d1"><?php echo $lang['CT_AUDIT_TITLE'][$_SESSION['lang']]; ?></h2>

        <p class="ct-audit-desc rv d2"><?php echo $lang['CT_AUDIT_DESC'][$_SESSION['lang']]; ?></p>
        <ul class="ct-audit-list rv d2">
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span><?php echo $lang['CT_AUDIT_ITEM_1'][$_SESSION['lang']]; ?></li>
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span><?php echo $lang['CT_AUDIT_ITEM_2'][$_SESSION['lang']]; ?></li>
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span><?php echo $lang['CT_AUDIT_ITEM_3'][$_SESSION['lang']]; ?></li>
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span><?php echo $lang['CT_AUDIT_ITEM_4'][$_SESSION['lang']]; ?></li>
          <li class="ct-audit-item"><span class="ct-audit-check"><i class="fa fa-check"></i></span><?php echo $lang['CT_AUDIT_ITEM_5'][$_SESSION['lang']]; ?></li>
        </ul>
        <!-- <span class="ct-audit-tag rv d3"><i class="fa fa-gift"></i> <?php echo $lang['CT_AUDIT_VALUE'][$_SESSION['lang']]; ?></span> -->
      </div>
      <div class="rv d2">
        <div class="ct-audit-stats">
          <div class="ct-audit-stat">
            <div class="ct-stat-val">1000<span>+</span></div>
            <div class="ct-stat-lbl"><?php echo $lang['CT_STAT_CLIENTS'][$_SESSION['lang']]; ?></div>
          </div>
          <div class="ct-audit-stat">
            <div class="ct-stat-val">120<span>+</span></div>
            <div class="ct-stat-lbl"><?php echo $lang['REF_STRIP_PROJETS'][$_SESSION['lang']]; ?></div>
          </div>
          <div class="ct-audit-stat">
            <div class="ct-stat-val">16<span><?php echo $lang['CT_STAT_ANS_SUFFIX'][$_SESSION['lang']]; ?></span></div>
            <div class="ct-stat-lbl"><?php echo $lang['CT_STAT_EXPERTISE'][$_SESSION['lang']]; ?></div>
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
            <div class="sec-label rv"><?php echo $lang['CT_FORM_LABEL'][$_SESSION['lang']]; ?></div>
            <h2 class="sec-title rv d1"><?php echo $lang['CT_FORM_TITLE'][$_SESSION['lang']]; ?></h2>
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
          <span class="ct-ceo-badge"><?php echo $lang['CT_CEO_BADGE'][$_SESSION['lang']]; ?></span>
        </div>
        <div class="ct-ceo-name"><?php echo $lang['CT_CEO_NAME'][$_SESSION['lang']]; ?></div>
        <div class="ct-ceo-role"><?php echo $lang['CT_CEO_ROLE'][$_SESSION['lang']]; ?></div>
        <p class="ct-ceo-bio"><i class="fa fa-quote-left"></i> <?php echo $lang['CT_CEO_BIO'][$_SESSION['lang']]; ?> <i class="fa fa-quote-right"></i></p>
        <div class="ct-ceo-contacts">
          <a href="mailto:<?php echo $config->getEmail(); ?>" class="ct-ceo-contact"><i class="fa fa-envelope"></i> <?php echo $config->getEmail(); ?></a>
          <a href="tel:+33600000000" class="ct-ceo-contact"><i class="fa fa-phone"></i> <?php echo $config->getTel2(); ?></a>
          <a href="<?php echo $config->getLinkedin(); ?>" target="_blank" rel="noopener" class="ct-ceo-contact"><i class="fab fa-linkedin"></i> <?php echo $lang['CT_CEO_LINKEDIN'][$_SESSION['lang']]; ?></a>
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
            <strong><?php echo $lang['CT_GUARANTEE_TITLE'][$_SESSION['lang']]; ?></strong>
            <?php echo $lang['CT_GUARANTEE_TEXT'][$_SESSION['lang']]; ?>
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<!-- ═══ NOS BUREAUX ══════════════════════════════════ -->
<section class="ct-offices">
  <div class="container">
    <div class="sec-label"><?php echo $lang['CT_OFFICES_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv"><?php echo $lang['CT_OFFICES_TITLE'][$_SESSION['lang']]; ?></h2>
    <div class="ct-offices-grid rv d1">

      <div class="ct-office-card">
        <div class="ct-office-city"><?php echo $lang['CT_OFFICE_AFRIQUE'][$_SESSION['lang']]; ?></div>
        <div class="ct-office-name"><?php echo $lang['TPL_FOOTER_CITY_MARRAKECH'][$_SESSION['lang']]; ?></div>
        <div class="ct-office-addr"><?php echo $config->getAdresse(); ?></div>
        <div class="ct-office-details">
          <a href="tel:<?php echo $config->getTel(); ?>" class="ct-office-detail"><i class="fa fa-phone"></i> <?php echo $config->getTel(); ?></a>
          <a href="mailto:<?php echo $config->getEmail(); ?>" class="ct-office-detail"><i class="fa fa-envelope"></i> <?php echo $config->getEmail(); ?></a>
        </div>
      </div>

      <div class="ct-office-card">
        <div class="ct-office-city"><?php echo $lang['CT_OFFICE_EUROPE'][$_SESSION['lang']]; ?></div>
        <div class="ct-office-name"><?php echo $lang['TPL_FOOTER_CITY_LONDON'][$_SESSION['lang']]; ?></div>
        <div class="ct-office-addr">1 Canada Square, Level 30<br>Canary Wharf<br>London E14 5AB, UK</div>
        <div class="ct-office-details">
          <a href="tel:+442079460100" class="ct-office-detail"><i class="fa fa-phone"></i> +44 20 7946 0100</a>
          <a href="mailto:london@helloworld-agency.com" class="ct-office-detail"><i class="fa fa-envelope"></i> london@helloworld-agency.com</a>
        </div>
      </div>

      <div class="ct-office-card">
        <div class="ct-office-city"><?php echo $lang['CT_OFFICE_MOYEN_ORIENT'][$_SESSION['lang']]; ?></div>
        <div class="ct-office-name"><?php echo $lang['TPL_FOOTER_CITY_DUBAI'][$_SESSION['lang']]; ?></div>
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
      <div class="ct-social-left"><?php echo $lang['CT_SOCIAL_FOLLOW'][$_SESSION['lang']]; ?></div>
      <div class="ct-social-links">
        <a href="<?php echo $config->getLinkedin(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        <a href="<?php echo $config->getInstagram(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="<?php echo $config->getYoutube(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-youtube"></i> YouTube</a>
        <a href="<?php echo $config->getFacebook(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
      </div>
    </div>
  </div>
</section>