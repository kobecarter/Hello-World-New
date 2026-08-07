<?php
$idCurrentLang = langue::getIdLangue($_SESSION['lang']);
$isRtl = $idCurrentLang ? (new langue($idCurrentLang, $db))->isRtl() : false;
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($_SESSION['lang']); ?>" dir="<?php echo $isRtl ? 'rtl' : 'ltr'; ?>">
<head>
     <meta charset="utf-8">
	    <meta content="width=device-width, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=5"
	        name="viewport" />

	    <meta name="website" content="<?php echo $siteURL; ?>">
	    <?php getSeoMeta($_GET); ?>
	    <?php
	    // Lien du logo vers l'accueil, adapté à la langue active (/, /en/, /ar/ le cas échéant).
	    // Le français est la langue par défaut et n'a pas de préfixe dans les routes (voir .htaccess).
	    $homeURL = ($_SESSION['lang'] == langue::getDefaultLanguage()) ? $siteURL : $siteURL . $_SESSION['lang'] . '/';

	    // Sélecteur de langue : reconstruit le lien de la page courante pour chaque langue active.
	    $langFlags = array('fr' => '🇫🇷', 'en' => '🇬🇧', 'ar' => '🇲🇦', 'es' => '🇪🇸');
	    // REQUEST_URI stays percent-encoded (e.g. %D8%A7... for Arabic slugs); decode it
	    // so it matches the literal UTF-8 strings in $staticPageSlugs below.
	    $currentPath = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	    $siteBasePath = parse_url($siteURL, PHP_URL_PATH);
	    if ($siteBasePath && $siteBasePath !== '/' && strpos($currentPath, $siteBasePath) === 0) {
	        $currentPath = substr($currentPath, strlen($siteBasePath));
	    } else {
	        $currentPath = ltrim($currentPath, '/');
	    }
	    $currentPath = preg_replace('#^(fr|en|ar|es)/#', '', $currentPath);

	    // Blog, reference, produit, secteur and agent_ia detail pages each store a
	    // distinct slug per language (secteur/agent_ia Arabic slugs are transliterated,
	    // not shared with FR/EN) -- naively swapping the language prefix on the current
	    // URL produces a broken link, so these need an ID-based lookup of the actual
	    // per-language row instead. Resolved here (not by URL slug) so it can drive both
	    // the visible switcher links below and the <head> hreflang alternates.
	    $detailOption = isset($_GET['option']) ? $_GET['option'] : '';
	    $detailTask = isset($_GET['task']) ? $_GET['task'] : '';
	    $isPartialContentDetail = $detailTask === 'showDetails' && in_array($detailOption, array('com_blog', 'com_reference', 'com_produit', 'com_secteur', 'com_agents_ia', 'com_formation', 'com_service'));
	    $currentDetailId = null;
	    if ($detailOption === 'com_blog' && isset($currentPost)) $currentDetailId = $currentPost->getId();
	    elseif ($detailOption === 'com_reference' && isset($reference)) $currentDetailId = $reference->getId();
	    elseif ($detailOption === 'com_produit' && isset($produit)) $currentDetailId = $produit->getId();
	    elseif ($detailOption === 'com_secteur' && isset($secteur)) $currentDetailId = $secteur->getId();
	    elseif ($detailOption === 'com_agents_ia' && isset($agent_ia)) $currentDetailId = $agent_ia->getId();
	    elseif ($detailOption === 'com_formation' && isset($formation)) $currentDetailId = $formation->getId();
	    elseif ($detailOption === 'com_service' && isset($service)) $currentDetailId = $service->getId();

	    // Static pages (contact, à-propos, pages villes, marketplace, agents-ia hub, etc.)
	    // are all hw_page rows: their slug is computed live from the page's titre (see
	    // page::getLink()/getSeo()), and for the ones that redirect elsewhere (type
	    // 'lien': contact, about, job, agence, video, intro, client, offre...) the "id"
	    // passed on the URL is the page's own id, with "externe" recording where it
	    // points. Resolving the current page row here -- instead of a hardcoded slug
	    // table -- means renaming a page's titre in the admin is picked up automatically,
	    // with nothing else to keep in sync.
	    $currentPageObj = null;
	    if (isset($_GET['id']) && ctype_digit((string) $_GET['id'])) {
	        $pageCandidate = new page((int) $_GET['id'], $db, $_SESSION['lang']);
	        if ($pageCandidate->getId() && $pageCandidate->getTitre() != '') {
	            if ($detailOption === 'com_page') {
	                $currentPageObj = $pageCandidate;
	            } else {
	                $expectedExterne = 'index.php?option=' . $detailOption . ($detailTask !== '' ? '&task=' . $detailTask : '');
	                if (rtrim($pageCandidate->getExterne()) === $expectedExterne) {
	                    $currentPageObj = $pageCandidate;
	                }
	            }
	        }
	    }

	    $langOptions = array();
	    foreach (langue::findAll() as $idLangOpt) {
	        $lOpt = new langue($idLangOpt, $db);
	        $targetPath = $currentPath;
	        $altHref = null;
	        if ($isPartialContentDetail && $currentDetailId && $lOpt->getCode() != $_SESSION['lang']) {
	            if ($detailOption === 'com_blog') {
	                $alt = blog::find($currentDetailId, $lOpt->getCode());
	                if ($alt->getTitre()) $altHref = $alt->getLink();
	            } elseif ($detailOption === 'com_reference') {
	                $alt = reference::find($currentDetailId, $lOpt->getCode());
	                if ($alt->getTitre()) $altHref = $alt->getLink();
	            } elseif ($detailOption === 'com_produit') {
	                $alt = produit::find($currentDetailId, $lOpt->getCode());
	                if ($alt->getTitre()) $altHref = $alt->getLink();
	            } elseif ($detailOption === 'com_secteur') {
	                $alt = secteur::find($currentDetailId, $lOpt->getCode());
	                if ($alt->getTitre()) $altHref = $alt->getLink();
	            } elseif ($detailOption === 'com_agents_ia') {
	                $alt = agent_ia::find($currentDetailId, $lOpt->getCode());
	                if ($alt->getTitre()) $altHref = $alt->getLink();
	            } elseif ($detailOption === 'com_formation') {
	                $alt = formation::find($currentDetailId, $lOpt->getCode());
	                if ($alt->getTitre()) $altHref = $alt->getLink();
	            } elseif ($detailOption === 'com_service') {
	                $alt = service::find($currentDetailId, $lOpt->getCode());
	                if ($alt->getTitre()) $altHref = $alt->getLink();
	            }
	        } elseif ($currentPageObj && $lOpt->getCode() != $_SESSION['lang']) {
	            $altPage = new page($currentPageObj->getId(), $db, $lOpt->getCode());
	            if ($altPage->getTitre() != '') $altHref = $altPage->getLink();
	        }
	        // A detail/static page lacking a translation in this language has no correct
	        // URL to offer -- fall back to the naive path swap for the visible switcher
	        // (matches prior behavior for all other page types), but omit it from
	        // hreflang below rather than advertise a link that 404s.
	        $hrefMissing = ($isPartialContentDetail && $currentDetailId || $currentPageObj) && $lOpt->getCode() != $_SESSION['lang'] && !$altHref;
	        $link = $altHref ? $altHref : ($lOpt->isDefault() ? $siteURL . $targetPath : $siteURL . $lOpt->getCode() . '/' . $targetPath);
	        $langOptions[] = array(
	            'code' => $lOpt->getCode(),
	            'nom' => $lOpt->getNom(),
	            'flag' => isset($langFlags[$lOpt->getCode()]) ? $langFlags[$lOpt->getCode()] : '🌐',
	            'link' => $link,
	            'active' => ($lOpt->getCode() == $_SESSION['lang']),
	            'disabled' => false,
	            'hrefMissing' => $hrefMissing,
	        );
	    }

	    // Hreflang alternates for <head> reuse the same corrected links, but skip any
	    // detail-page language with no translation instead of advertising a 404.
	    $hreflangLinks = array();
	    foreach ($langOptions as $langOpt) {
	        if ($langOpt['hrefMissing']) continue;
	        $hreflangLinks[] = array('code' => $langOpt['code'], 'href' => $langOpt['link']);
	    }

	    // Variante pour le drawer mobile uniquement : ajoute l'arabe en placeholder
	    // (pas encore de ligne active en base / pas de routes ni de traductions),
	    // sans toucher au sélecteur desktop qui doit rester limité aux langues réelles.
	    $mobileLangOptions = $langOptions;
	    $mobileLangOptions[] = array(
	        'code' => 'ar',
	        'nom' => 'العربية',
	        'flag' => $langFlags['ar'],
	        'link' => null,
	        'active' => false,
	        'disabled' => true,
	    );
	    ?>
	    <?php foreach ($hreflangLinks as $hl): ?>
	    <link rel="alternate" hreflang="<?php echo htmlspecialchars($hl['code']); ?>" href="<?php echo htmlspecialchars($hl['href']); ?>">
	    <?php endforeach; ?>
	    <?php
	    if (count($hreflangLinks) > 1) {
	        foreach ($hreflangLinks as $hl) {
	            if ($hl['code'] == langue::getDefaultLanguage()) {
	                echo '<link rel="alternate" hreflang="x-default" href="' . htmlspecialchars($hl['href']) . '">' . "\n";
	                break;
	            }
	        }
	    }
	    ?>
	    <?php
	    // Sitewide Organization + WebSite structured data -- the site had zero
	    // Schema.org markup anywhere before this (see SEO audit). Uses the same
	    // $config object already loaded for meta tags, so no extra query.
	    $orgSchema = array(
	        '@context' => 'https://schema.org',
	        '@graph' => array(
	            array(
	                '@type' => 'Organization',
	                '@id' => $siteURL . '#organization',
	                'name' => $config->getNom(),
	                'url' => $siteURL,
	                'logo' => $siteURL . 'images/config/' . $config->getLogo(),
	                'sameAs' => array_values(array_filter(array(
	                    $config->getFacebook(),
	                    $config->getInstagram(),
	                    $config->getLinkedin(),
	                    $config->getYoutube(),
	                ))),
	                'contactPoint' => array(
	                    '@type' => 'ContactPoint',
	                    'telephone' => $config->getTel(),
	                    'email' => $config->getEmail(),
	                    'contactType' => 'customer service',
	                ),
	            ),
	            array(
	                '@type' => 'WebSite',
	                '@id' => $siteURL . '#website',
	                'url' => $siteURL,
	                'name' => $config->getNom(),
	                'publisher' => array('@id' => $siteURL . '#organization'),
	                'inLanguage' => $_SESSION['lang'],
	            ),
	        ),
	    );
	    ?>
	    <script type="application/ld+json"><?php echo json_encode($orgSchema, JSON_UNESCAPED_UNICODE); ?></script>
	    <?php if ($detailOption === 'com_service' && $detailTask === 'showDetails' && isset($service) && $service->getId()): ?>
	    <?php
	    $serviceSchema = array(
	        '@context' => 'https://schema.org',
	        '@type' => 'Service',
	        'name' => $service->getTitre(),
	        'description' => $service->getSeoDescription(),
	        'url' => $service->getLink(),
	        'provider' => array('@id' => $siteURL . '#organization'),
	        'areaServed' => array('Casablanca', 'Marrakech', 'Rabat', 'Maroc'),
	    );
	    if ($service->getPhoto()) {
	        $serviceSchema['image'] = $siteURL . 'images/services/' . $service->getPhoto();
	    }
	    ?>
	    <script type="application/ld+json"><?php echo json_encode($serviceSchema, JSON_UNESCAPED_UNICODE); ?></script>
	    <?php endif; ?>
	    <?php if ($detailOption === 'com_blog' && $detailTask === 'showDetails' && isset($currentPost) && $currentPost->getId()): ?>
	    <?php
	    $articleSchema = array(
	        '@context' => 'https://schema.org',
	        '@type' => 'Article',
	        'headline' => $currentPost->getTitre(),
	        'description' => $currentPost->getSeoDescription() ? $currentPost->getSeoDescription() : $currentPost->getExtrait(),
	        'url' => $currentPost->getLink(),
	        'publisher' => array('@id' => $siteURL . '#organization'),
	        'author' => array('@type' => 'Organization', 'name' => $config->getNom()),
	    );
	    if ($currentPost->getPhoto()) {
	        $articleSchema['image'] = $siteURL . 'images/blog/' . $currentPost->getPhoto();
	    }
	    if ($currentPost->getDateAdd() && strtotime($currentPost->getDateAdd())) {
	        $articleSchema['datePublished'] = date('c', strtotime($currentPost->getDateAdd()));
	    }
	    if ($currentPost->getLastEdit() && strtotime($currentPost->getLastEdit())) {
	        $articleSchema['dateModified'] = date('c', strtotime($currentPost->getLastEdit()));
	    }
	    ?>
	    <script type="application/ld+json"><?php echo json_encode($articleSchema, JSON_UNESCAPED_UNICODE); ?></script>
	    <?php endif; ?>
      <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-V6N5Y8QJ1M"></script>
      <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-V6N5Y8QJ1M');
      </script>
	   

	    <!-- Meta Pixel Code -->
	    <script>
	    ! function(f, b, e, v, n, t, s) {
	        if (f.fbq) return;
	        n = f.fbq = function() {
	            n.callMethod ?
	                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
	        };
	        if (!f._fbq) f._fbq = n;
	        n.push = n;
	        n.loaded = !0;
	        n.version = '2.0';
	        n.queue = [];
	        t = b.createElement(e);
	        t.async = !0;
	        t.src = v;
	        s = b.getElementsByTagName(e)[0];
	        s.parentNode.insertBefore(t, s)
	    }(window, document, 'script',
	        'https://connect.facebook.net/en_US/fbevents.js');
	    fbq('init', '1306708063569247');
	    fbq('track', 'PageView');
	    </script>
	    <noscript><img height="1" width="1" style="display:none"
	            src="https://www.facebook.com/tr?id=1306708063569247&ev=PageView&noscript=1" /></noscript>
	    <!-- End Meta Pixel Code -->

<!-- FavIcon -->
<link rel="shortcut icon" href="<?= $siteURL; ?>assets/img/favicon.ico">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,200;0,300;1,200;1,300&family=Montserrat:ital,wght@0,100;0,200;0,300;0,700;0,800;0,900;1,100;1,200;1,300&family=Raleway:wght@300;400;500;600;700;900&family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/all.min.css">
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/themify-icons.css">
<link rel="stylesheet" href="<?= $siteURL; ?>assets/css/jquery.fancybox.min.css" async defer>
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $siteURL; ?>flip-book/css/flipbook.style.css">
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/main.css?v=7.1">

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

      <!-- Event snippet for Contact (hello world) conversion page -->
	    <script>
	    if (typeof gtag === 'function') gtag('event', 'conversion', {
	        'send_to': 'AW-988470532/wIfpCLro748DEIS6q9cD'
	    });
	    </script>

	    <!-- Event snippet for Envoi de formulaire pour prospects conversion page -->
	    <script>
	    if (typeof gtag === 'function') gtag('event', 'conversion', {
	        'send_to': 'AW-988470532/gtHMCIHqpZADEIS6q9cD'
	    });
	    </script>


	    <!-- Google Tag Manager -->
	    <script>
	    (function(w, d, s, l, i) {
	        w[l] = w[l] || [];
	        w[l].push({
	            'gtm.start': new Date().getTime(),
	            event: 'gtm.js'
	        });
	        var f = d.getElementsByTagName(s)[0],
	            j = d.createElement(s),
	            dl = l != 'dataLayer' ? '&l=' + l : '';
	        j.async = true;
	        j.src =
	            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
	        f.parentNode.insertBefore(j, f);
	    })(window, document, 'script', 'dataLayer', 'GTM-KZNQF2R');
	    </script>
	    <!-- End Google Tag Manager -->
</head>
<body>
    <!-- Whatsapp btns -->
    <ul class="whatsapp-buttons">
            <?php $quotePage = getComponent("com_contact&task=quote"); ?>
	        <?php $clientPage = getComponent("com_client"); ?>
	         <li class="devis-link">
	            <a href="<?php echo $quotePage->getLink(); ?>" class="devis-clignote click custom-tooltip"
	                title="<?php echo $lang['TPL_QUOTE_BTN'][$_SESSION['lang']]; ?>" aria-label="<?php echo $lang['TPL_QUOTE_BTN'][$_SESSION['lang']]; ?>" data-id="4">
	                <i class="fa fa-calculator"></i>
	            </a>
	        </li>
	         <li class="whatsapp-link">
	             <a href="https://wa.me/212664606612?text=Bonjour" title="<?php echo $lang['TPL_WHATSAPP_MANAR'][$_SESSION['lang']]; ?>" aria-label="<?php echo $lang['TPL_WHATSAPP_MANAR'][$_SESSION['lang']]; ?>" data-id="5" data-toggle="tooltip"  
	                class="click" target="_blank" title="Whatsapp chat"><i class="fab fa-whatsapp"></i></a>
	         </li>
	         <li class="whatsapp-link">
	             <a href="https://wa.me/212675472001?text=Bjr,%20je%20suis%20int%C3%A9ress%C3%A9%20par%20l%E2%80%99un%20de%20vos%20services%20je%20souhaite%20plus%20d%E2%80%99info%20" class="click custom-tooltip" title="<?php echo $lang['TPL_WHATSAPP_HAMID'][$_SESSION['lang']]; ?>" aria-label="<?php echo $lang['TPL_WHATSAPP_HAMID'][$_SESSION['lang']]; ?>" data-id="5" data-toggle="tooltip" id="chat-bubble" target="_blank" title="Whatsapp chat">
                   <i class="fab fa-whatsapp"></i>
                   <span>1</span></a>
	         </li>
	         <li class="apple-app"><a href="https://apps.apple.com/ma/app/hello-world-agency/id1566017621?l=fr-FR" target="_blank" title="<?php echo $lang['TPL_APPSTORE_TITLE'][$_SESSION['lang']]; ?>"><i class="fab fa-apple"></i></a></li>
	        <li class="espace-client"><a href="<?php echo $clientPage->getLink(); ?>" title="Login Client"><i class="fa fa-user-circle"></i></a></li>
	     </ul>
<!-- End whatsapp btns -->
<div class="cur" id="cur"></div>
<div class="cur2" id="cur2"></div>

<?php $headerColor = (isset($_GET['option']) && $_GET['option'] == 'com_reference' && isset($_GET['task']) && $_GET['task'] == 'showDetails') ? 'hdr-light' : ''; ?>


<header class="navshell <?php echo $headerColor; ?>" id="navshell">
  <nav class="navbar glass-nav">
    <div class="nav-row">
      <a href="<?php echo $homeURL; ?>" class="logo-hw logo"><img src="<?php echo $siteURL; ?>images/config/<?php echo $config->getLogo(); ?>" alt="<?php echo $config->getNom(); ?>"></a>
      <ul class="nav-links" role="menubar">
                <?php
      // Single shared instance: the same 7 top-level rows drive both this
      // nav bar and the mega panels below, and the mobile drawer further
      // down -- managed entirely from the admin "Menu" module (menu id=3).
      $topMenu = new menu(3, $db);
      $megaPanelIds = $topMenu->findAllParentItem();
      foreach ($megaPanelIds as $panelItemId) {
          $panelItem = new menu_item($panelItemId, $db, $_SESSION['lang']);
          ?>
        <li><a href="<?php echo $panelItem->getLink(); ?>" class="navlink" data-menu="<?php echo htmlspecialchars($panelItem->getPanelKey(), ENT_QUOTES, 'UTF-8'); ?>" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($panelItem->getTitre(), ENT_QUOTES, 'UTF-8'); ?><span class="caret">▼</span></a></li>
          <?php
      }
      ?>
      </ul>
       <div class="lang-sel" id="langSel">
        <button class="lang-btn" id="langBtn" aria-label="Select language">
          <i class="fa fa-globe lang-ico"></i>
          <span id="langCur"><?php echo strtoupper($_SESSION['lang']); ?></span>
          <i class="fa fa-chevron-down lang-arr"></i>
        </button>
        <div class="lang-drop" id="langDrop">
          <?php foreach ($langOptions as $langOpt): ?>
          <a href="<?php echo $langOpt['link']; ?>" class="lang-opt<?php echo $langOpt['active'] ? ' active' : ''; ?>"><span class="flag"><?php echo $langOpt['flag']; ?></span> <?php echo htmlspecialchars($langOpt['nom'], ENT_QUOTES, 'UTF-8'); ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <button class="mm-burger" id="mmBurger" aria-label="<?php echo $lang['TPL_MENU_OUVRIR'][$_SESSION['lang']]; ?>" aria-expanded="false" aria-controls="mmDrawer">
        <span class="mm-bar-b"></span><span class="mm-bar-b"></span><span class="mm-bar-b"></span>
      </button>
      <!-- <button class="burger" id="burger" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="drawer"><span><span class="bar"></span><span class="bar"></span><span class="bar"></span></span></button> -->
    </div>
    
    
  </nav>
    <div class="mega-wrap">
    <?php
    $topMenu->getMegaMenu();
    ?>
    </div>

    <!-- MOBILE DRAWER -->
  <div class="mm-drawer" id="mmDrawer" role="dialog" aria-modal="true" aria-label="<?php echo $config->getNom(); ?>">
    <div class="mm-drawer-inner">
      <div class="mm-drawer-top">
        <a href="<?php echo $homeURL; ?>"><img src="<?php echo $siteURL; ?>images/config/<?php echo $config->getLogo(); ?>" alt="Hello World Agency" style="height:64px"></a>
        <button class="mm-close" id="mmClose" aria-label="<?php echo $lang['TPL_MENU_FERMER'][$_SESSION['lang']]; ?>"></button>
      </div>
      <?php
      $topMenu->getMenuMobile();
      $pageContact = getComponent("com_contact");
      ?>
      <div class="mm-drawer-cta">
        <a href="<?php echo $pageContact->getLink(); ?>" class="mm-contact-link"><?php echo $lang['TPL_MOBILE_MENU_CONTACT'][$_SESSION['lang']]; ?></a>
        <div class="mm-social">
          <?php if ($config->getFacebook()): ?><a href="<?php echo $config->getFacebook(); ?>" class="mm-social-link mm-social-fb" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a><?php endif; ?>
          <?php if ($config->getInstagram()): ?><a href="<?php echo $config->getInstagram(); ?>" class="mm-social-link mm-social-ig" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a><?php endif; ?>
          <?php if ($config->getLinkedin()): ?><a href="<?php echo $config->getLinkedin(); ?>" class="mm-social-link mm-social-li" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
          <?php if ($config->getYoutube()): ?><a href="<?php echo $config->getYoutube(); ?>" class="mm-social-link mm-social-yt" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a><?php endif; ?>
        </div>
        <div class="mm-lang-switch">
          <?php foreach ($mobileLangOptions as $langOpt): ?>
            <?php if (!empty($langOpt['disabled'])): ?>
            <span class="mm-lang-opt mm-lang-disabled" title="<?php echo $lang['TPL_MOBILE_LANG_SOON'][$_SESSION['lang']]; ?>"><?php echo strtoupper($langOpt['code']); ?></span>
            <?php else: ?>
            <a href="<?php echo $langOpt['link']; ?>" class="mm-lang-opt<?php echo $langOpt['active'] ? ' mm-lang-active' : ''; ?>"><?php echo strtoupper($langOpt['code']); ?></a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  
</header>

<?php echo $page_content; ?>

<footer>
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12">
	                    <h3 class="big-title"><?php echo $lang['TPL_FOOTER_RENCONTREZ_NOUS'][$_SESSION['lang']]; ?>...</h3>
	                    <div class="apps text-center">
	                        <a href="#" class="item my-2"><img width="100" height="100"
	                                src="<?php echo $siteURL; ?>images/playstore.webp" alt="Play store"></a>
	                        <a href="https://apps.apple.com/ma/app/hello-world-agency/id1566017621?l=fr-FR" class="item my-2"><img width="100" height="100"
	                                src="<?php echo $siteURL; ?>images/appstore.webp" alt="App store"></a>
	                    </div>
	                </div>
	                <div class="col-sm-6 col-md-3">
	                    <div class="item-agency">
	                            <?php
                			$marrakechPage = new page(33, $db, $_SESSION['lang']);
                			?>
	                        <h4><a href="<?php echo $marrakechPage->getLink(); ?>"><?php echo $lang['TPL_FOOTER_CITY_MARRAKECH'][$_SESSION['lang']]; ?></a></h4>

	                        <ul class="nav nav-tabs" id="myTab" role="tablist">
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link active" id="home-tab" title="Mobile" data-toggle="tab" href="#home"
	                                    role="tab" aria-controls="home" aria-selected="true"><i class="ti-mobile"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="profile-tab" title="Email" data-toggle="tab" href="#profile"
	                                    role="tab" aria-controls="profile" aria-selected="false"><i
	                                        class="ti-email"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="contact-tab" title="location" data-toggle="tab" href="#contact"
	                                    role="tab" aria-controls="contact" aria-selected="false"><i
	                                        class="ti-location-pin"></i></a>
	                            </li>
	                        </ul>
	                        <div class="tab-content" id="myTabContent">
	                            <div class="tab-pane fade show active" id="home" role="tabpanel"
	                                aria-labelledby="home-tab"><a
	                                    href="tel:<?php echo $config->getTel(); ?>"><?php echo $config->getTel(); ?></a>
	                            </div>
	                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><a
	                                    href="mailto:<?php echo $config->getEmail(); ?>"><?php echo $config->getEmail(); ?></a>
	                            </div>
	                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
	                                <?php echo $config->getAdresse(); ?></div>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-sm-6 col-md-3">
	                    <div class="item-agency">
	                        	    <?php
                			$casaPage = new page(32, $db, $_SESSION['lang']);
                			?>
	                        <h4><a href="<?php echo $casaPage->getLink(); ?>"><?php echo $lang['TPL_FOOTER_CITY_CASABLANCA'][$_SESSION['lang']]; ?></a></h4>

	                        <ul class="nav nav-tabs" id="myTab" role="tablist">
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link active" id="home-tab" title="Mobile" data-toggle="tab"
	                                    href="#tel-casa" role="tab" aria-controls="home" aria-selected="true"><i
	                                        class="ti-mobile"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="profile-tab" title="Email" data-toggle="tab" href="#mail-casa"
	                                    role="tab" aria-controls="profile" aria-selected="false"><i
	                                        class="ti-email"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="contact-tab" title="location" data-toggle="tab"
	                                    href="#adresse-casa" role="tab" aria-controls="contact" aria-selected="false"><i
	                                        class="ti-location-pin"></i></a>
	                            </li>
	                        </ul>
	                        <div class="tab-content" id="myTabContent">
	                            <div class="tab-pane fade show active" id="tel-casa" role="tabpanel"
	                                aria-labelledby="home-tab"><a
	                                    href="tel:<?php echo $config->getTel2(); ?>"><?php echo $config->getTel2(); ?></a>
	                            </div>
	                            <div class="tab-pane fade" id="mail-casa" role="tabpanel" aria-labelledby="profile-tab"><a
	                                    href="mailto:<?php echo $config->getEmail(); ?>"><?php echo $config->getEmail(); ?></a>
	                            </div>
	                            <div class="tab-pane fade" id="adresse-casa" role="tabpanel" aria-labelledby="contact-tab">
	                                70 allé phonex Ain sbaa Casablanca - Maroc</div>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-sm-6 col-md-3">
	                    <div class="item-agency">
	                          	    <?php
                			$londonPage = new page(34, $db, $_SESSION['lang']);
                			?>
	                         <h4><a href="<?php echo $londonPage->getLink(); ?>"><?php echo $lang['TPL_FOOTER_CITY_LONDON'][$_SESSION['lang']]; ?></a></h4>

	                        <ul class="nav nav-tabs" id="myTab" role="tablist">
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link active" id="home-tab" title="Mobile" data-toggle="tab"
	                                    href="#tel-londre" role="tab" aria-controls="home" aria-selected="true"><i
	                                        class="ti-mobile"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="profile-tab" title="Email" data-toggle="tab"
	                                    href="#email-londre" role="tab" aria-controls="profile" aria-selected="false"><i
	                                        class="ti-email"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="contact-tab" title="location" data-toggle="tab"
	                                    href="#adresse-londre" role="tab" aria-controls="contact" aria-selected="false"><i
	                                        class="ti-location-pin"></i></a>
	                            </li>
	                        </ul>
	                        <div class="tab-content" id="myTabContent">
	                            <div class="tab-pane fade show active" id="tel-londre" role="tabpanel"
	                                aria-labelledby="home-tab"><a href="tel:+44 5 24 42 31 56">+44 5 24 42 31 56</a></div>
	                            <div class="tab-pane fade" id="email-londre" role="tabpanel" aria-labelledby="profile-tab">
	                                <a href="mailto:contact@helloworldlabel.uk">contact@helloworldlabel.uk</a>
	                            </div>
	                            <div class="tab-pane fade" id="adresse-londre" role="tabpanel"
	                                aria-labelledby="contact-tab">Hello World (London) Ltd, 3rd Floor, 86-90 Paul Street,
	                                London<br>EC2A 4NE</div>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-sm-6 col-md-3">
	                    <div class="item-agency">
	                        <h4><?php echo $lang['TPL_FOOTER_CITY_DUBAI'][$_SESSION['lang']]; ?></h4>

	                        <ul class="nav nav-tabs" id="myTab" role="tablist">
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link active" id="home-tab" title="Mobile" data-toggle="tab"
	                                    href="#tel-dubai" role="tab" aria-controls="home" aria-selected="true"><i
	                                        class="ti-mobile"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="profile-tab" title="Email" data-toggle="tab"
	                                    href="#email-dubai" role="tab" aria-controls="profile" aria-selected="false"><i
	                                        class="ti-email"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="contact-tab" title="location" data-toggle="tab"
	                                    href="#adresse-dubai" role="tab" aria-controls="contact" aria-selected="false"><i
	                                        class="ti-location-pin"></i></a>
	                            </li>
	                        </ul>
	                        <div class="tab-content" id="myTabContent">
	                            <div class="tab-pane fade show active" id="tel-dubai" role="tabpanel"
	                                aria-labelledby="home-tab"><a href="tel:+971543399752">+971 54 339 9752</a></div>
	                            <div class="tab-pane fade" id="email-dubai" role="tabpanel" aria-labelledby="profile-tab">
	                                <a href="mailto:contact@helloworldlabel.ae">contact@helloworldlabel.ae</a>
	                            </div>
	                            <div class="tab-pane fade" id="adresse-dubai" role="tabpanel"
	                                aria-labelledby="contact-tab">Dubai Silicon Oasis, DDP, Building A, Dubai, United Arab
	                                Emirates</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </footer>
	    <section class="bottom">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12">
	                    <ul class="footer-bottom-menu">
	                        <?php
							// bottom menu
							$bottomMenu = new menu(2, $db);
							$bottomMenu->getMenu();
							?>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </section>

<button class="back-top" id="backTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
  <i class="fal fa-arrow-up"></i>
</button>

<script>
var homePage = <?php echo isHome() ? 'true' : 'false'; ?>;
var siteURL = '<?php echo $siteURL; ?>';
var apiURL = '<?php echo $apiURL; ?>';
var platURL = '<?php echo $platURL; ?>';
var task = '<?php echo isset($_GET['task']) ? $_GET['task'] : '' ?>';
var SUCCES_ENVOI = '<?= $lang['DEMANDE_ENVOI_SUCCES'][$_SESSION['lang']]; ?>';
var CHAMPS_OBLIG = '<?= $lang['REMPLIR_CHAMP_OBLIG'][$_SESSION['lang']]; ?>';
var EMAIL_EXISTE = '<?= $lang['EMAIL_EXIST_DEJA'][$_SESSION['lang']]; ?>';
var ERREUR_EXEC = '<?= $lang['ERREUR_EXEC'][$_SESSION['lang']]; ?>';
<?php
$confirmPage = new page(19, $db, $_SESSION['lang']);
$congPage = new page(31, $db, $_SESSION['lang']);
$confirmPageDevis = new page(20, $db, $_SESSION['lang']);
$confirmPageDevis = new page(20, $db, $_SESSION['lang']);
?>
var REDIRECT_LINK = '<?php echo $confirmPage->getLink(); ?>';
var REDIRECT_LINK_QUOTE = '<?php echo $confirmPageDevis->getLink(); ?>';
var REDIRECT_LINK_CONG = '<?php echo $congPage->getLink(); ?>';
</script>

<script src='<?php echo $siteURL; ?>assets/js/jquery-3.3.1.min.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/bootstrap.min.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/owl.carousel.min.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/isotope.pkg.min.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/jquery.form.js'></script>
<script src='<?php echo $siteURL; ?>flip-book/js/flipbook.min.js'></script>
	    <script src="<?php echo $siteURL; ?>assets/js/jquery.fancybox.min.js" async defer></script>
<script src='<?php echo $siteURL; ?>assets/js/main.js?v=1.4'></script>
<script>
/* CURSOR */
const cur  = document.getElementById('cur');
const cur2 = document.getElementById('cur2');
document.addEventListener('mousemove', e => {
  cur.style.left  = e.clientX + 'px';
  cur.style.top   = e.clientY + 'px';
  cur2.style.left = e.clientX + 'px';
  cur2.style.top  = e.clientY + 'px';
});
document.querySelectorAll('a,button,.svc-card,.port-item,.testi-card').forEach(el => {
  el.addEventListener('mouseenter', () => cur.style.transform = 'translate(-50%,-50%) scale(2.5)');
  el.addEventListener('mouseleave', () => cur.style.transform = 'translate(-50%,-50%) scale(1)');
});

/* HEADER + BACK-TOP */
const hdr     = document.getElementById('navshell');
const backTop = document.getElementById('backTop');
window.addEventListener('scroll', () => {
  const s = window.scrollY;
  hdr.classList.toggle('scrolled', s > 80);
  backTop.classList.toggle('show', s > 600);
}, { passive: true });

/* MEGA MENU */
(function() {
  const bar = document.getElementById('mmBar');
  const backTop = document.getElementById('backTop');
  window.addEventListener('scroll', () => {
    const s = window.scrollY;
    bar && bar.classList.toggle('mm-scrolled', s > 60);
    backTop && backTop.classList.toggle('show', s > 600);
  }, { passive: true });

  const panels = document.querySelectorAll('.mm-panel');
  const triggers = document.querySelectorAll('[data-panel]');
  let closeTimer;

  function openPanel(id) {
    clearTimeout(closeTimer);
    panels.forEach(p => { const open = p.dataset.panel === id; p.classList.toggle('mm-open', open); });
    triggers.forEach(t => { t.setAttribute('aria-expanded', t.dataset.panel === id ? 'true' : 'false'); });
  }
  function closePanels() {
    closeTimer = setTimeout(() => {
      panels.forEach(p => p.classList.remove('mm-open'));
      triggers.forEach(t => t.setAttribute('aria-expanded', 'false'));
    }, 180);
  }

  triggers.forEach(t => {
    t.addEventListener('mouseenter', () => openPanel(t.dataset.panel));
    t.addEventListener('focus', () => openPanel(t.dataset.panel));
  });
  panels.forEach(p => {
    p.addEventListener('mouseenter', () => clearTimeout(closeTimer));
    p.addEventListener('mouseleave', closePanels);
  });
  triggers.forEach(t => t.addEventListener('mouseleave', closePanels));
  document.addEventListener('click', e => {
    if (!e.target.closest('.mm-bar')) closePanels();
  });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closePanels(); });

  // Mobile drawer
  const burger = document.getElementById('mmBurger');
  const drawer = document.getElementById('mmDrawer');
  const closeBtn = document.getElementById('mmClose');
  // The drawer's ~50 thumbnails use data-src instead of src: the drawer is
  // position:fixed;inset:0 even while closed (just opacity:0/visibility:hidden),
  // so native loading="lazy" doesn't defer them -- the browser still counts
  // them as in-viewport and fetches all of them on page load. Only swap in
  // the real src once the drawer is actually opened.
  function loadDrawerImages() {
    drawer.querySelectorAll('.mm-acc-thumb[data-src]').forEach(img => {
      img.src = img.dataset.src;
      img.removeAttribute('data-src');
    });
  }
  // Locking overflow on body alone does nothing here: neither html nor body
  // sets overflow-y, so <html> is the actual scrolling element by default.
  // Both must be locked or the page keeps scrolling behind the "open" drawer.
  function openDrawer() { drawer.classList.add('mm-open'); burger.setAttribute('aria-expanded', 'true'); document.documentElement.style.overflow = 'hidden'; document.body.style.overflow = 'hidden'; loadDrawerImages(); }
  function closeDrawer() { drawer.classList.remove('mm-open'); burger.setAttribute('aria-expanded', 'false'); document.documentElement.style.overflow = ''; document.body.style.overflow = ''; }
  burger && burger.addEventListener('click', openDrawer);
  closeBtn && closeBtn.addEventListener('click', closeDrawer);
  drawer && drawer.addEventListener('click', e => { if (e.target === drawer) closeDrawer(); });

  // Mobile accordion. Each section has its own unique id (data-acc), so
  // opening one only ever closes the others -- not a shared/duplicated id.
  // max-height toggles between 0 and "none" (not a computed scrollHeight
  // pixel value): some content lists here can run to 1000+ px, and a few
  // browsers fail to settle a max-height transition at very large computed
  // values, leaving the panel stuck collapsed. "none" always renders the
  // full content immediately and reliably; the trade-off is no slide
  // animation, which is an acceptable trade for a menu that must always open.
  document.querySelectorAll('.mm-acc-head').forEach(head => {
    head.addEventListener('click', () => {
      const id = head.dataset.acc;
      const body = document.getElementById(id);
      const isOpen = head.getAttribute('aria-expanded') === 'true';
      document.querySelectorAll('.mm-acc-head').forEach(h => h.setAttribute('aria-expanded', 'false'));
      document.querySelectorAll('.mm-acc-body').forEach(b => { b.classList.remove('mm-open'); b.style.maxHeight = ''; });
      if (!isOpen) { head.setAttribute('aria-expanded', 'true'); body.classList.add('mm-open'); body.style.maxHeight = 'none'; }
    });
  });
})();

/* SCROLL REVEAL — threshold:0 + a generous bottom rootMargin so a fast
   flick/fling on mobile can't skip a thin element (.sec-label etc.)
   between two frames without it ever registering as intersecting.   */
const io = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); } });
}, { threshold: 0, rootMargin: '0px 0px 200px 0px' });
document.querySelectorAll('.rv').forEach(el => io.observe(el));

/* Safety net: a very fast fling can in theory move the page more than
   one viewport + rootMargin between two compositor frames, so an
   element's intersecting state is never sampled. This must catch BOTH
   an element already scrolled past (bottom < 0) AND one the user landed
   on/inside without the observer ever having sampled it mid-flight
   (top < innerHeight) -- the second case is what leaves a section
   sitting fully in view but still stuck at opacity:0, which reads as a
   blank/stuck section even though scrolling itself still works.      */
let rvSafetyTimer;
window.addEventListener('scroll', () => {
  clearTimeout(rvSafetyTimer);
  rvSafetyTimer = setTimeout(() => {
    document.querySelectorAll('.rv:not(.on)').forEach(el => {
      if (el.getBoundingClientRect().top < window.innerHeight) {
        el.classList.add('on');
        io.unobserve(el);
      }
    });
  }, 150);
}, { passive: true });

/* FOOTER TOP BORDER LINE */
const footEl = document.querySelector('footer');
if (footEl) {
  const footIO = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('foot-in'); footIO.unobserve(e.target); } });
  }, { threshold: 0.05 });
  footIO.observe(footEl);
}

/* STAT COUNTERS */
const statDefs = [
  { id: 's1', target: 140, suf: '<span class="bub-suf">+</span>' },
  { id: 's2', target: 98,  suf: '<span class="bub-suf">%</span>' },
  { id: 's3', target: 24,  suf: '<span class="bub-suf">+</span>' },
  { id: 's4', target: 12,  suf: '' },
];
function animateCount(el, target, suf) {
  const dur = 1800, start = performance.now();
  (function step(now) {
    const p = Math.min((now - start) / dur, 1);
    const eased = 1 - Math.pow(1 - p, 4);
    el.innerHTML = Math.floor(eased * target) + suf;
    if (p < 1) requestAnimationFrame(step);
  })(start);
}
const statsIo = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      statsIo.unobserve(e.target);
      e.target.classList.add('on');
      statDefs.forEach(d => {
        const el = e.target.querySelector('#' + d.id);
        if (el) animateCount(el, d.target, d.suf);
      });
    }
  });
}, { threshold: 0.2 });
document.querySelectorAll('.bl').forEach(el => statsIo.observe(el));

/* HERO CANVAS — flowing wave terrain */
(function() {
  const canvas = document.getElementById('hero-canvas');
  if (!canvas) return; /* not every page template has this canvas — must not block the rest of the script (fancy-title split, etc.) */
  const ctx = canvas.getContext('2d');
  let W, H, t = 0;
  const LINES = 40, SEGS = 240;
  function resize() { W = canvas.width = canvas.offsetWidth; H = canvas.height = canvas.offsetHeight; }
  function draw() {
    ctx.clearRect(0, 0, W, H);
    t += 0.0055;
    for (let l = 0; l < LINES; l++) {
      const p = l / (LINES - 1);
      const yBase = H * 0.1 + H * 0.8 * p;
      const amp   = H * 0.058 * (0.2 + p * 0.8);
      const bright = 1 - Math.abs(p - 0.42) * 1.9;
      const alpha  = Math.max(0.015, Math.min(bright * 0.115, 0.115));
      ctx.beginPath();
      for (let i = 0; i <= SEGS; i++) {
        const x = (i / SEGS) * W;
        const n = i / SEGS;
        const y = yBase
          + Math.sin(n * Math.PI * 3.6 + t * 1.75 + l * 0.34) * amp
          + Math.sin(n * Math.PI * 6.8 - t * 1.08 + l * 0.19) * amp * 0.4
          + Math.sin(n * Math.PI * 1.4 + t * 0.62 + l * 0.07) * amp * 0.2;
        i === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
      }
      ctx.strokeStyle = `rgba(13,11,9,${alpha})`;
      ctx.lineWidth = 0.65;
      ctx.stroke();
    }
    requestAnimationFrame(draw);
  }
  resize(); draw();
  window.addEventListener('resize', resize);
})();

/* FANCY TITLE — char split + wave hover */
(function(){
  function splitChars(el) {
    el.classList.add('fancy-title');
    var isRtl = document.documentElement.dir === 'rtl';
    let ci = 0;
    function proc(node) {
      if (node.nodeType === 3) {
        const frag = document.createDocumentFragment();
        if (isRtl) {
          /* Arabic needs contextual letter joining: split by word, not by char, or shaping breaks */
          node.textContent.split(/(\s+)/).forEach(function(w){
            if (w === '') return;
            if (/^\s+$/.test(w)) {
              const s = document.createElement('span');
              s.className = 'ch sp';
              s.innerHTML = '&nbsp;';
              frag.appendChild(s);
            } else {
              const s = document.createElement('span');
              s.className = 'ch';
              s.style.setProperty('--ci', ci++);
              s.textContent = w;
              frag.appendChild(s);
            }
          });
          node.parentNode.replaceChild(frag, node);
          return;
        }
        let word = document.createElement('span');
        word.className = 'chw';
        function flushWord() {
          if (word.childNodes.length) frag.appendChild(word);
          word = document.createElement('span');
          word.className = 'chw';
        }
        for (const c of node.textContent) {
          if (c === ' ' || c === ' ') {
            flushWord();
            const s = document.createElement('span');
            s.className = 'ch sp';
            s.innerHTML = '&nbsp;';
            frag.appendChild(s);
          } else {
            const s = document.createElement('span');
            s.className = 'ch';
            s.style.setProperty('--ci', ci++);
            s.textContent = c;
            word.appendChild(s);
          }
        }
        flushWord();
        node.parentNode.replaceChild(frag, node);
      } else if (node.nodeType === 1 && node.tagName !== 'BR') {
        Array.from(node.childNodes).forEach(proc);
      }
    }
    Array.from(el.childNodes).forEach(proc);
  }
  document.querySelectorAll('.hero-title, .sec-title, .port-title').forEach(function(el){
    if (el.closest('#services')) return; /* no hover-wave animation in this section */
    splitChars(el);
  });
})();

/* FAQ ACCORDION */
document.querySelectorAll('.faq-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const item = btn.closest('.faq-item');
    const body = item.querySelector('.faq-body');
    const isOpen = btn.classList.contains('open');
    // ferme tous
    document.querySelectorAll('.faq-btn.open').forEach(b => {
      b.classList.remove('open');
      b.closest('.faq-item').querySelector('.faq-body').classList.remove('open');
    });
    if (!isOpen) { btn.classList.add('open'); body.classList.add('open'); }
  });
});

/* SUBMENU — hover avec délai pour éviter la fermeture prématurée */
(function() {
  document.querySelectorAll('.has-sub').forEach(el => {
    let timer;
    el.addEventListener('mouseenter', () => {
      clearTimeout(timer);
      el.classList.add('open');
    });
    el.addEventListener('mouseleave', () => {
      timer = setTimeout(() => el.classList.remove('open'), 180);
    });
  });
  document.addEventListener('click', e => {
    if (!e.target.closest('.has-sub')) {
      document.querySelectorAll('.has-sub.open').forEach(el => el.classList.remove('open'));
    }
  });
})();

/* 3D TILT */
(function(){
  function initTilt(selector, angle, shineClass){
    document.querySelectorAll(selector).forEach(function(el){
      var shine = document.createElement('div');
      shine.className = shineClass ? 'tilt-shine ' + shineClass : 'tilt-shine';
      el.appendChild(shine);
      el.addEventListener('mouseenter', function(){
        el.style.transition = 'transform .06s linear, background .35s';
      });
      el.addEventListener('mousemove', function(e){
        var r = el.getBoundingClientRect();
        var dx = (e.clientX - r.left - r.width * .5) / (r.width * .5);
        var dy = (e.clientY - r.top - r.height * .5) / (r.height * .5);
        el.style.transform = 'perspective(900px) rotateX(' + (-dy * angle) + 'deg) rotateY(' + (dx * angle) + 'deg) translateZ(8px)';
        shine.style.setProperty('--sx', ((dx + 1) / 2 * 100) + '%');
        shine.style.setProperty('--sy', ((dy + 1) / 2 * 100) + '%');
      });
      el.addEventListener('mouseleave', function(){
        el.style.transition = 'transform .65s cubic-bezier(.34,1.56,.64,1), background .35s';
        el.style.transform = '';
      });
    });
  }
  initTilt('.ai-card', 7);
  initTilt('.svc-card', 6);
  initTilt('.srv-card', 5);
  initTilt('.port-item', 4, 'port-shine');

  var hero = document.querySelector('.hero');
  var heroInner = document.querySelector('.hero-inner');
  if (hero && heroInner) {
    hero.addEventListener('mousemove', function(e){
      var r = hero.getBoundingClientRect();
      var dx = (e.clientX - r.left - r.width * .5) / r.width;
      var dy = (e.clientY - r.top - r.height * .5) / r.height;
      heroInner.style.transition = 'transform .1s linear';
      heroInner.style.transform = 'perspective(1400px) rotateX(' + (-dy * 2.5) + 'deg) rotateY(' + (dx * 2.5) + 'deg)';
    });
    hero.addEventListener('mouseleave', function(){
      heroInner.style.transition = 'transform .9s cubic-bezier(.34,1.56,.64,1)';
      heroInner.style.transform = '';
    });
  }
})();

/* TESTIMONIALS CAROUSEL */
(function() {
  var track = document.querySelector('.testi-track');
  if (!track) return;
  var items = track.querySelectorAll('.testi-item');
  var controls = document.querySelector('.testi-controls');
  var dotsWrap = document.querySelector('.testi-dots');
  var current = 0, perPage = 3, maxIdx = 0, autoTimer, dots = [];

  function getPerPage() {
    return window.innerWidth <= 575 ? 1 : window.innerWidth <= 991 ? 2 : 3;
  }

  function buildDots() {
    perPage = getPerPage();
    maxIdx = Math.max(0, items.length - perPage);
    items.forEach(function(item) { item.style.flexBasis = (100 / perPage) + '%'; });
    dotsWrap.innerHTML = '';
    for (var i = 0; i <= maxIdx; i++) {
      var d = document.createElement('button');
      d.className = 'testi-dot' + (i === current ? ' active' : '');
      (function(idx) { d.addEventListener('click', function() { clearTimeout(autoTimer); goTo(idx); startAuto(); }); })(i);
      dotsWrap.appendChild(d);
    }
    dots = Array.from(dotsWrap.querySelectorAll('.testi-dot'));
    controls.style.display = maxIdx > 0 ? 'flex' : 'none';
  }

  function goTo(idx) {
    current = Math.max(0, Math.min(idx, maxIdx));
    track.style.transform = 'translateX(-' + (current * 100 / perPage) + '%)';
    dots.forEach(function(d, i) { d.classList.toggle('active', i === current); });
  }

  function startAuto() {
    autoTimer = setTimeout(function() { goTo(current >= maxIdx ? 0 : current + 1); startAuto(); }, 5000);
  }

  document.querySelector('.testi-prev').addEventListener('click', function() { clearTimeout(autoTimer); goTo(current - 1); startAuto(); });
  document.querySelector('.testi-next').addEventListener('click', function() { clearTimeout(autoTimer); goTo(current + 1); startAuto(); });

  var startX = 0;
  track.addEventListener('touchstart', function(e) { startX = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', function(e) {
    var dx = e.changedTouches[0].clientX - startX;
    if (Math.abs(dx) > 50) { clearTimeout(autoTimer); goTo(current + (dx < 0 ? 1 : -1)); startAuto(); }
  });

  var resizeTimer;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() { buildDots(); goTo(Math.min(current, maxIdx)); }, 150);
  });

  buildDots();
  startAuto();
})();

/* LANG SELECTOR — real links (href points to the equivalent page in that
   language, built server-side), JS here only drives the dropdown open/close;
   clicking an option navigates normally, no preventDefault. */
(function() {
  const sel = document.getElementById('langSel');
  const btn = document.getElementById('langBtn');
  if (!sel) return;
  btn.addEventListener('click', e => { e.stopPropagation(); sel.classList.toggle('open'); });
  document.addEventListener('click', () => sel.classList.remove('open'));
})();

/* PARALLAX ENGINE */
(function () {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  const isMobile = () => window.innerWidth < 900;
  const items = Array.from(document.querySelectorAll('[data-px]')).map(el => ({
    el, f: parseFloat(el.dataset.px)
  }));
  if (!items.length) return;
  let ticking = false;
  function update() {
    if (isMobile()) { items.forEach(({ el }) => { el.style.translate = ''; }); ticking = false; return; }
    const vh = window.innerHeight;
    items.forEach(({ el, f }) => {
      const r = el.getBoundingClientRect();
      const cy = r.top + r.height / 2 - vh / 2;
      el.style.translate = '0 ' + (cy * f).toFixed(2) + 'px';
    });
    ticking = false;
  }
  window.addEventListener('scroll', () => { if (!ticking) { requestAnimationFrame(update); ticking = true; } }, { passive: true });
  window.addEventListener('resize', update);
  update();
})();
</script>
<script>
// document.querySelectorAll('.custom-sublink.pop').forEach(function(el) {
//     el.remove();
// });
function decodeUtf8Base64(base64) {
    const binary = atob(base64);
    const bytes = Uint8Array.from(binary, c => c.charCodeAt(0));
    return new TextDecoder('utf-8').decode(bytes);
}

// document.querySelectorAll('.card').forEach(card => {

//     card.addEventListener('mouseenter', function() {

//         const encoded = this.dataset.packs;

//         if (!encoded) return;

//         document.getElementById('packsGrid').innerHTML =
//             decodeUtf8Base64(encoded);

//     });

// });

// const firstCard = document.querySelector('.card');

// if(firstCard){

//     document.getElementById('packsGrid').innerHTML =
//         decodeUtf8Base64(firstCard.dataset.packs);

// }



document.querySelectorAll('.card, .custom-sublink').forEach(item => {

    item.addEventListener('mouseenter', function() {

        const encoded = this.dataset.packs;
        if (!encoded) return;

        const mega = this.closest('.mega');
        const grid = mega.querySelector('.packs-grid');

        if(grid){
            grid.innerHTML = decodeUtf8Base64(encoded);
        }

    });

});


(function () {
    
    

  'use strict';

  var ICONS = {
    chat:'<path d="M5 4h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H9l-4 4v-4H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/>',
    whatsapp:'<path d="M12 3a9 9 0 0 0-7.7 13.6L3 21l4.6-1.3A9 9 0 1 0 12 3z"/><path d="M8.5 9c0 3.6 2.9 6.5 6.5 6.5"/>',
    mic:'<rect x="9" y="3" width="6" height="11" rx="3"/><path d="M5 11a7 7 0 0 0 14 0"/><path d="M12 18v3"/>',
    robot:'<rect x="4" y="8" width="16" height="11" rx="3"/><path d="M12 4v4"/><circle cx="9" cy="13.5" r="1.1"/><circle cx="15" cy="13.5" r="1.1"/>',
    headset:'<path d="M5 13a7 7 0 0 1 14 0"/><rect x="3" y="13" width="3.5" height="6" rx="1.6"/><rect x="17.5" y="13" width="3.5" height="6" rx="1.6"/><path d="M19 19a3 3 0 0 1-3 3h-2"/>',
    users:'<circle cx="9" cy="8" r="3"/><path d="M3 20a6 6 0 0 1 12 0"/><path d="M16 5.2a3 3 0 0 1 0 5.6"/><path d="M21 20a6 6 0 0 0-4.5-5.8"/>',
    mail:'<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
    target:'<circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="4"/><circle cx="12" cy="12" r="1"/>',
    chart:'<path d="M4 20V10"/><path d="M10 20V4"/><path d="M16 20v-7"/><path d="M3 20h18"/>',
    home:'<path d="M4 11l8-7 8 7"/><path d="M6 10v9h12v-9"/>',
    hotel:'<path d="M3 18v-6h12a4 4 0 0 1 4 4v2"/><path d="M3 12V7"/><circle cx="7" cy="10" r="1.5"/><path d="M3 18h18"/>',
    bag:'<path d="M6 8h12l1 12H5z"/><path d="M9 8a3 3 0 0 1 6 0"/>',
    heart:'<path d="M12 20s-7-4.5-7-9a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 4.5-7 9-7 9z"/>',
    globe:'<circle cx="12" cy="12" r="8"/><path d="M4 12h16"/><path d="M12 4a13 13 0 0 1 0 16 13 13 0 0 1 0-16z"/>',
    mobile:'<rect x="7" y="3" width="10" height="18" rx="2"/><path d="M11 18h2"/>',
    lock:'<rect x="5" y="11" width="14" height="9" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/>',
    rocket:'<path d="M12 3c3 2 5 6 5 10l-2.5 3h-5L7 13c0-4 2-8 5-10z"/><circle cx="12" cy="10" r="1.6"/><path d="M9 16l-2 4 4-1.5"/>',
    building:'<rect x="5" y="3" width="14" height="18" rx="1"/><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2"/>',
    dash:'<path d="M4 14a8 8 0 0 1 16 0"/><path d="M12 14l4-3"/><path d="M4 19h16"/>',
    palette:'<path d="M12 3a9 9 0 1 0 0 18c1.4 0 2-1 2-2s-1-2 0-3 3 0 3-2a7 7 0 0 0-7-9z"/><circle cx="8" cy="11" r="1"/><circle cx="12" cy="8" r="1"/><circle cx="16" cy="11" r="1"/>',
    camera:'<rect x="3" y="7" width="18" height="13" rx="2"/><circle cx="12" cy="13.5" r="3.5"/><path d="M8 7l1.5-2h5L16 7"/>',
    star:'<path d="M12 3l2.5 6 6 .5-4.5 4 1.5 6L12 16l-5.5 3.5 1.5-6L3.5 9.5 9.5 9z"/>',
    share:'<circle cx="6" cy="12" r="2.5"/><circle cx="17" cy="6" r="2.5"/><circle cx="17" cy="18" r="2.5"/><path d="M8.2 11l6.6-3.5M8.2 13l6.6 3.5"/>',
    event:'<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 9h18M8 3v4M16 3v4"/><path d="M8 14l2 2 4-4"/>',
    press:'<path d="M3 10v4l10 4V6z"/><path d="M13 8h4a3 3 0 0 1 0 6h-4"/><path d="M16 14v5"/>',
    printer:'<rect x="6" y="3" width="12" height="6" rx="1"/><rect x="3" y="9" width="18" height="8" rx="2"/><rect x="7" y="14" width="10" height="6" rx="1"/>',
    pin:'<path d="M12 21s7-6 7-11a7 7 0 0 0-14 0c0 5 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/>',
    cap:'<path d="M3 9l9-4 9 4-9 4z"/><path d="M7 11v5c0 1.5 10 1.5 10 0v-5"/><path d="M21 9v5"/>',
    pen:'<path d="M14 4l6 6L9 21H3v-6z"/><path d="M12 6l6 6"/>',
    phone:'<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L16 13l5 2v3a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>',
    gear:'<circle cx="12" cy="12" r="3.2"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2 2M16.4 16.4l2 2M18.4 5.6l-2 2M7.6 16.4l-2 2"/>'
  };
  function svg(id){ return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">'+(ICONS[id]||ICONS.chat)+'</svg>'; }

  // remplir les icônes de repli dans les tuiles
  Array.prototype.slice.call(document.querySelectorAll('[data-thumb]')).forEach(function(t){
    var host = t.closest('[data-ico]');
    var ico = host ? host.getAttribute('data-ico') : 'chat';
    var box = t.querySelector('.thumb-ico'); if (box) box.innerHTML = svg(ico);
  });

  var navshell = document.getElementById('navshell');
  var triggers = Array.prototype.slice.call(document.querySelectorAll('[data-menu]'));
  var panels   = Array.prototype.slice.call(document.querySelectorAll('[data-panel]'));
  var openKey = null, closeTimer = null;
  function panelFor(k){ return document.querySelector('[data-panel="' + k + '"]'); }
  function open(k){ clearTimeout(closeTimer); if (openKey===k) return;
    panels.forEach(function(p){p.classList.remove('is-open');}); triggers.forEach(function(t){t.setAttribute('aria-expanded','false');});
    var p=panelFor(k), t=triggers.filter(function(x){return x.dataset.menu===k;})[0];
    if(p)p.classList.add('is-open'); if(t)t.setAttribute('aria-expanded','true'); openKey=k; }
  function close(){ panels.forEach(function(p){p.classList.remove('is-open');}); triggers.forEach(function(t){t.setAttribute('aria-expanded','false');}); openKey=null; }
  function scheduleClose(){ clearTimeout(closeTimer); closeTimer=setTimeout(close,150); }
  triggers.forEach(function(t){ var k=t.dataset.menu;
    t.addEventListener('mouseenter',function(){open(k);});
    t.addEventListener('focus',function(){open(k);});
    t.addEventListener('click',function(e){e.preventDefault();(openKey===k)?close():open(k);}); });
  navshell.addEventListener('mouseleave',scheduleClose);
  navshell.addEventListener('mouseenter',function(){clearTimeout(closeTimer);});
  document.addEventListener('keydown',function(e){if(e.key==='Escape')close();});
  document.addEventListener('click',function(e){if(!navshell.contains(e.target))close();});

  function initials(name){ var p=name.replace(/^Dr\.\s*/,'').trim().split(' '); return ((p[0]||'')[0]||'')+((p[1]||'')[0]||''); }
  function pop(el){ if(!el)return; el.classList.remove('pop'); void el.offsetWidth; el.classList.add('pop'); }
  function clean(s){ var d=document.createElement('div'); d.innerHTML=s; return d.textContent; }

  panels.forEach(function(panel){
    var vico   = panel.querySelector('[data-vico]');
    var vgrad  = panel.querySelector('[data-vgrad]');
    var vimg   = panel.querySelector('[data-vimg]');
    var vlink  = panel.querySelector('.vimg-link');
    var vTitle = panel.querySelector('[data-vtitle]');
    var vDesc  = panel.querySelector('[data-vdesc]');
    var vServ  = panel.querySelector('[data-vservice]');
    var fTitle = panel.querySelector('[data-foottitle]');
    var fQuote = panel.querySelector('[data-quote]');
    // var fAuthor= panel.querySelector('[data-author]');
    // var fRole  = panel.querySelector('[data-role]');
    var fAva   = panel.querySelector('[data-ava]');
    var vEl    = panel.querySelector('.visual');

    if (vimg){ vimg.addEventListener('error', function(){ this.style.display='none'; });
               vimg.addEventListener('load', function(){ this.style.display=''; }); }

    var def = {
      service:vEl.dataset.defService, desc:vEl.dataset.defDesc, ico:vEl.dataset.defIco, grad:vEl.dataset.defGrad,
      img:vEl.dataset.defImg, 
      cat:vEl.dataset.defCat
    };

    function apply(d, animate){
      vgrad.className = 'vimg-wrap ' + (d.grad||'');
      vico.innerHTML = svg(d.ico);
      if (d.img){ vimg.style.display=''; vimg.src=d.img; vimg.alt=clean(d.service||''); } else { vimg.style.display='none'; vimg.removeAttribute('src'); vimg.alt=''; }
      vTitle.innerHTML = clean(d.service);
      vDesc.textContent = d.desc;
      vServ.textContent = clean(d.service);
      fTitle.textContent = <?php echo json_encode($lang['MEGA_FOOT_TITLE_PREFIX'][$_SESSION['lang']]); ?> + (d.cat ? d.cat : clean(d.service));
    //   fQuote.textContent = '\u00AB ' + d.quote + ' \u00BB';
    //   fAuthor.textContent = d.author; fRole.textContent = d.role; fAva.textContent = initials(d.author);
    //   if (animate){ pop(vlink); pop(fQuote); }
    }
    apply(def, false);

    var content = panel.querySelector('.mega-content');
    var links = Array.prototype.slice.call(panel.querySelectorAll('.sublink, .card'));
    links.forEach(function(a){
      a.addEventListener('mouseenter', function(){
        apply({service:a.dataset.service, desc:a.dataset.desc, ico:a.dataset.ico, grad:a.dataset.grad,
               img:a.dataset.img, quote:null, author:null, role:null, cat:null}, true);
      });
    });
    if (content){ content.addEventListener('mouseleave', function(){ apply(def, true); }); }
  });

   /* ---- Version mobile : volet + accordéons générés depuis les panneaux ---- */
  var burger=document.getElementById('burger'), drawer=document.getElementById('drawer'),
      drawerNav=document.getElementById('drawerNav'), closeBtn=document.getElementById('closeDrawer');
  if (burger && drawer && drawerNav){
    var html='<a class="m-link" href="#">Accueil</a>';
    triggers.forEach(function(t){
      var label=t.textContent.replace('▼','').trim();
      var panel=panelFor(t.dataset.menu);
      
      
    var items = Array.prototype.slice.call(panel.querySelectorAll('.sublink, .card'));
    var body = '';
    
    var seen = new Set();
    
    items.forEach(function(a){
    
      var href = a.getAttribute('href') || '';
      var label = (a.dataset.service || a.textContent).trim();
    
      // clé unique plus stable
      var key = href + '|' + label;
    
      if(seen.has(key)) return;
      seen.add(key);
    
      body += '<a class="acc-item" href="'+href+'">' +
              '<span class="thumb '+(a.dataset.grad||'')+'">' +
              '<span class="thumb-ico">'+svg(a.dataset.ico)+'</span>' +
              '</span>' +
              '<b>'+clean(label)+'</b>' +
              '</a>';
    });
    
    
    
      html+='<button class="acc-head" aria-expanded="false" data-acc>'+label+' <span class="chev">\u25BC</span></button><div class="acc-body"><div class="acc-inner">'+body+'</div></div>';
    });
    html+='<a class="m-link" href="https://www.helloworld-agency.com/new/nos-agences/">Nos agences</a>';
    drawerNav.innerHTML=html;

    function openD(){drawer.classList.add('open');burger.setAttribute('aria-expanded','true');document.body.style.overflow='hidden';}
    function closeD(){drawer.classList.remove('open');burger.setAttribute('aria-expanded','false');document.body.style.overflow='';}
    burger.addEventListener('click',openD);
    if(closeBtn) closeBtn.addEventListener('click',closeD);
    document.addEventListener('keydown',function(e){if(e.key==='Escape')closeD();});

    var heads=Array.prototype.slice.call(drawerNav.querySelectorAll('[data-acc]'));
    heads.forEach(function(head){
      var b=head.nextElementSibling;
      head.addEventListener('click',function(){
        var isOpen=head.getAttribute('aria-expanded')==='true';
        heads.forEach(function(h){if(h!==head){h.setAttribute('aria-expanded','false');h.nextElementSibling.style.maxHeight=null;h.nextElementSibling.classList.remove('open');}});
        if(isOpen){head.setAttribute('aria-expanded','false');b.style.maxHeight=null;b.classList.remove('open');}
        else{head.setAttribute('aria-expanded','true');b.classList.add('open');b.style.maxHeight=b.scrollHeight+'px';}
      });
    });
    window.addEventListener('resize',function(){
      drawerNav.querySelectorAll('.acc-body.open').forEach(function(b){b.style.maxHeight=b.scrollHeight+'px';});
      if(window.innerWidth>1000) closeD();
    });
  }

})();
</script>

    <!-- Start of HubSpot Embed Code -->
	       <script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/143509868.js">
	    </script>
	    <!-- End of HubSpot Embed Code -->
</body>
</html>
