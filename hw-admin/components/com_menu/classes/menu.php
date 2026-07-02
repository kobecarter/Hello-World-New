<?php

class menu
{
    private $id;
    private $titre;

    public function __construct($id, $db)
    {
        if (isset($id)) {
            $result = $db->query("SELECT * FROM " . __prefixe_db__ . "menu WHERE id = " . $id);
            if ($db->num_rows($result) == 1) {

                $data = $db->fetch_assoc($result);
                $this->id = $data['id'];
                $this->titre = $data['titre'];
            }
        }
    }

    public function __destruct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getMenu($deep = 0, $mobile = false)
    {
        global $db, $siteURL;
        $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
					  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
					  WHERE id_menu = " . $this->id . " 
					  AND parent_id = 0
					  AND langue = '" . $_SESSION["lang"] . "' 
					  ORDER BY ordre ASC";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) > 0) {
            $result = $db->queryS($SQLselect);
            foreach ($result as $data) {
                $mi = new menu_item($data['id'], $db, $_SESSION["lang"]);
                $blank = $mi->isBlank() ? 'target="_blank"' : '';

                $classLi = ($mi->hasSousMenu()) ? 'has-sub ' : '';
                $hrefTiret = ($mi->hasSousMenu() && $mobile) ? '<i class="fa fa-angle-down"></i>' : '';
                $link = $hrefTiret && $mobile ? "#" : $mi->getLink();

                if ($mi->getType() == 'page') {
                    $classLi .= (!isset($_GET['task']) && isset($_GET['id']) && $_GET['id'] == $mi->getIdItem()) ? 'active' : '';
                }
                if($mi->getType() == 'ext' && isHome() && $mi->getLink() == $siteURL){
                    $classLi .=  'active';
                }
                ?>
            <li class="<?php echo $classLi; ?>">
                <a href="<?= $link; ?>" <?php echo $blank; ?>><?php echo $mi->getTitre(); ?> <?= $hrefTiret;?></a>
                <?php
                if ($mi->hasSousMenu() && $deep == 0) {
                    echo '<ul>';
                    $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
									  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
									  WHERE id_menu = " . $this->id . "
									  AND parent_id = " . $mi->getId() . "
									  AND langue = '" . $_SESSION["lang"] . "' 
									  ORDER BY ordre ASC";
                    $result2 = $db->queryS($SQLselect);
                    foreach ($result2 as $data2) {
                        $classLi = "";
                        $mi = new menu_item($data2['id'], $db, $_SESSION["lang"]);
                        $blank = $mi->isBlank() ? 'target="_blank"' : '';

                        if ($mi->getType() == 'page') {
                            $classLi .= (isset($_GET['id']) && $_GET['id'] == $mi->getIdItem()) ? 'active' : '';
                        }
                        ?>
                    <li class="<?php echo $classLi; ?>">
                        <a href="<?php echo $mi->getLink(); ?>" class="mi_<?php echo $mi->getId(); ?>" <?php echo $blank; ?>><?php echo $mi->getTitre(); ?></a>
                        <?php
                        if ($mi->hasSousMenu() && $deep == 0) {
                            echo '<ul>';
                            $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
												  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
												  WHERE id_menu = " . $this->id . "
												  AND parent_id = " . $mi->getId() . "
												  AND langue = '" . $_SESSION["lang"] . "' 
												  ORDER BY ordre ASC";
                            $result3 = $db->queryS($SQLselect);
                            foreach ($result3 as $data3) {
                                $classLi = "";
                                $mi = new menu_item($data3['id'], $db, $_SESSION["lang"]);
                                $blank = $mi->isBlank() ? 'target="_blank"' : '';

                                if ($mi->getType() == 'page') {
                                    $classLi .= (isset($_GET['id']) && $_GET['id'] == $mi->getIdItem()) ? 'active' : '';
                                }
                                ?>
                                <li class="<?php echo $classLi; ?>">
                                    <a href="<?php echo $mi->getLink(); ?>" <?php echo $blank; ?>><?php echo $mi->getTitre(); ?></a>
                                </li>
                                <?php
                            }
                            echo '</ul>';
                        }
                        ?>
                        </li>
                        <?php
                    }
                    echo '</ul>';
                }
                ?>
                </li>
                <?php
            }
        }
    }
    
    public function getMenuMobile($deep = 0, $mobile = false)
    {
        global $db, $siteURL;
        $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
					  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
					  WHERE id_menu = " . $this->id . " 
					  AND parent_id = 0
					  AND langue = '" . $_SESSION["lang"] . "' 
					  ORDER BY ordre ASC";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) > 0) {
            $result = $db->queryS($SQLselect);
            foreach ($result as $data) {
                $mi = new menu_item($data['id'], $db, $_SESSION["lang"]);
                $blank = $mi->isBlank() ? 'target="_blank"' : '';
                ?>

                <?php if ($mi->hasSousMenu()): ?>
                <button class="mm-acc-head" aria-expanded="false" data-acc="m-ai"><?php echo $mi->getTitre(); ?><span class="mm-acc-chev fal fa-chevron-down"></span></button>
                <?php else: ?>    
                <a href="<?= $mi->getLink(); ?>" class="mm-m-link" <?php echo $blank; ?>><?php echo $mi->getTitre(); ?></a>    
                <?php endif; ?>

                <?php
                if ($mi->hasSousMenu() && $deep == 0) {
                    echo '<div class="mm-acc-body" id="m-ai"><div class="mm-acc-inner">';
                    $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
									  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
									  WHERE id_menu = " . $this->id . "
									  AND parent_id = " . $mi->getId() . "
									  AND langue = '" . $_SESSION["lang"] . "' 
									  ORDER BY ordre ASC";
                    $result2 = $db->queryS($SQLselect);
                    foreach ($result2 as $data2) {
                        $classLi = "";
                        $mi2 = new menu_item($data2['id'], $db, $_SESSION["lang"]);
                        $blank = $mi2->isBlank() ? 'target="_blank"' : '';

                        ?>
                        <a href="<?php echo $mi2->getLink(); ?>" class="mm-acc-item" <?php echo $blank; ?>><b><?php echo $mi2->getTitre(); ?></b></a>
                        <?php

                    }
                    echo '</div></div>';
                }
            }
        }
    }

    public static function menuExist()
    {
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }


    public function findAllParentItem()
    {
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = 0 ORDER BY ordre ASC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;

    }

    public function findAllChildItem()
    {
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE id_menu = $this->id ORDER BY ordre ASC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;

    }
    
  public function getMegaMenu($deep = 0, $mobile = false)
    {
        global $db, $siteURL;
        $solutionIA = service::find(17, $_SESSION['lang']);
        $webMobile = service::find(107, $_SESSION['lang']);
        $saasProduit = service::find(1, $_SESSION['lang']);
        $brandExperience = service::find(18, $_SESSION['lang']);
        $brandSeviceChild = $brandExperience->getChildren($_SESSION["lang"],true,true);
        $webMobileChild = $webMobile->getChildren($_SESSION["lang"],true,true);
        $marketplace = getComponent("com_produit");
        $formationIa = getComponent("com_formation");
        $realisationPage = getComponent("com_reference");
        $contactPage  = getComponent("com_contact");
        $siteWebService = service::find(38, $_SESSION['lang']);
        $mobileService = service::find(39, $_SESSION['lang']);
        $secteurSante = secteur::find(1, $_SESSION['lang']);
        $secteurHotel = secteur::find(3, $_SESSION['lang']);
        $secteurImmo = secteur::find(4, $_SESSION['lang']);
        $secteurMarketing = secteur::find(6, $_SESSION['lang']);
        $secteurFinance = secteur::find(5, $_SESSION['lang']);
        $secteurRestau = secteur::find(2, $_SESSION['lang']);
        $secteurOperation = secteur::find(7, $_SESSION['lang']);
        $testimonials = temoignage::findAllGlobal($_SESSION['lang'], true, true);
        
        $validTestimonials = array_filter($testimonials, function($t){return trim(strip_tags($t->getTemoignage())) !== '';});
        $testimonial = $validTestimonials ? $validTestimonials[array_rand($validTestimonials)] : null;
        // if (!empty($testimonials)) {
        //     $testimonial = $testimonials[array_rand($testimonials)];
        // }
         $service = service::find(18, $_SESSION['lang']);
              $nosAgence = getComponent("com_agence");
         $agenceCasa = new page(32, $db, $_SESSION['lang']);
         $agenceMarra = new page(33, $db, $_SESSION['lang']);
         $agenceLondre = new page(34, $db, $_SESSION['lang']);
        //  $agenceDubai = new page(36, $db, $_SESSION['lang']);
         $agenceRabat = new page(37, $db, $_SESSION['lang']);
         $agenceTanger = new page(38, $db, $_SESSION['lang']);
         $agenceAgadir = new page(39, $db, $_SESSION['lang']);
         $agenceFes = new page(40, $db, $_SESSION['lang']);
              $agentsIaPage = getComponent("com_agents_ia");
    $menuHTML = '
<div class="mega glass-mega glass-nav" data-panel="brand">

    <div class="mega-inner">

        <div class="visual stag"
             style="--i:0"
             data-def-service="'.htmlspecialchars($brandExperience->getTitre(), ENT_QUOTES, 'UTF-8').'"
             data-def-desc="'.htmlspecialchars(strip_tags($brandExperience->getExtrait()), ENT_QUOTES, 'UTF-8').'"
             data-def-ico="palette"
             data-def-grad="grad-brand"
             data-def-img="'.$siteURL.'images/pages/branding.webp"
             data-def-quote=""
                data-def-author=""
                data-def-role=""
                data-def-cat="">
            

            <a class="vimg-link" href="'.$brandExperience->getLink().'">
                <span class="vimg-wrap grad-brand" data-vgrad>
                    <span class="vico" data-vico></span>
                    <img class="vimg" data-vimg alt="">
                </span>
            </a>

            <div class="cap">

                <span class="badge">360°</span>

                <h4 data-vtitle></h4>

                <p data-vdesc></p>

                <div class="vactions">

                    <a class="v-pill v-disc"
                       href="'.$brandExperience->getLink().'">
                        Découvrir →
                    </a>

                    <a class="v-pill v-expert"
                       href="'.$contactPage->getLink().'">
                        📞 Parler à un expert <b data-vservice></b>
                    </a>

                </div>

            </div>

        </div>

        <div class="mega-content">

            <p class="eyebrow dark stag" style="--i:1">
                '.htmlspecialchars($brandExperience->getTitre(), ENT_QUOTES, 'UTF-8').'
            </p>

            <div class="cols-2">';
            foreach($brandSeviceChild as $k => $service){
                $packs = pack::findAll($_SESSION["lang"], true, true, $service->getId());
                $validTestimonials = array_filter($testimonials, function($t){return trim(strip_tags($t->getTemoignage())) !== '';});
                $testimonial = $validTestimonials ? $validTestimonials[array_rand($validTestimonials)] : null;
                // $testimonial = $testimonials[array_rand($testimonials)];
                $packsHtmlBank = '';
                
                foreach($packs as $pack){
                    $packsHtmlBank .= '
                    <a class="pack grad-web" href="'.$service->getLink().'">
                        <img loading="lazy"
                             src="'.$siteURL.'images/packs/'.$pack->getPhoto().'"
                             alt="'.htmlspecialchars($pack->getTitre()).'">
                        <span class="pk-tag">Pack</span>
                            <span class="pk-title">'.htmlspecialchars($pack->getTitre(), ENT_QUOTES, 'UTF-8').'</span>
                    </a>';
                }
            $menuHTML .= '
        
            <a class="custom-sublink sublink stag"
               style="--i:'.($k + 2).'"
               href="'.$service->getLink().'"
        
                data-service="'.htmlspecialchars($service->getTitre(), ENT_QUOTES, 'UTF-8').'"
                data-desc=""
                data-img="'.$siteURL.'images/services/'.$service->getPhoto().'"
                data-packs="'.htmlspecialchars(base64_encode($packsHtmlBank), ENT_QUOTES).'"
                data-ico="palette"
                data-grad="grad-brand" 
                data-quote="'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'"
                data-author="'.$testimonial->getNom().'"
                data-role="'.htmlspecialchars($testimonial->getFonction(),ENT_QUOTES,'UTF-8').'">
        
                <span class="thumb grad-brand" data-thumb>
        
                    <img
                        loading="lazy"
                        src="'.$siteURL.'images/services/'.$service->getPhoto().'"
                        alt="'.htmlspecialchars($service->getTitre(), ENT_QUOTES, 'UTF-8').'">
        
                    <span class="thumb-ico"></span>
        
                </span>
        
                <span class="tx">
        
                    <span class="ttl">
                        '.$service->getTitre().'
                    </span>
        
                    <span class="desc">
                  
                    </span>
        
                </span>
        
            </a>';
        }
        $menuHTML .= '
        
                    </div>
        
                </div>
        
            </div>
              
             <div class="packs stag" style="--i:10">
          <p class="packs-title">Découvrez nos packs</p>
          <div class="packs-grid" id="packsGrid1">
          </div>
        </div> 
              
            <div class="mega-foot stag" style="--i:11">
        
                <p class="foot-title" data-foottitle></p>
        
                <div class="foot-row">
        
                    <div class="rating">
                        <span class="rating-num">Reviews Score 5,0</span>
                    <div class="stars" aria-label="Note 5 sur 5">★★★★★</div>
                    </div>
        
                    <p class="quote" data-quote>'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'</p>
        
                    <div class="who">
        
                        <span class="ava" data-ava></span>
        
                        <span class="who-txt">
                             <b data-author>'.$testimonial->getNom().'</b>
                            <span class="role" data-role>'.$testimonial->getFonction().'</span>
                        </span>
        
                    </div>
        
                </div>
        
            </div>
        
        </div>
    ';
        
        
$menuHTML .= '
    <div class="mega glass-mega glass-nav" data-panel="web">
        <div class="mega-inner">
          <div class="visual stag" style="--i:0" data-def-service="Web &amp; Mobile" data-def-desc="Des expériences digitales rapides, élégantes et évolutives." data-def-ico="globe" data-def-grad="grad-web" data-def-img="' . $siteURL . 'images/services/' . $webMobile->getPhoto() . '" data-def-quote="'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'" data-def-author="'.$testimonial->getNom().'" data-def-role="'.$testimonial->getFonction().'" data-def-cat="nos services Web &amp; Mobile">
            <a class="vimg-link" href="#"><span class="vimg-wrap grad-web" data-vgrad><span class="vico" data-vico></span><img class="vimg" data-vimg alt=""></span></a>
            <div class="cap"><span class="badge">Sur mesure</span><h4 data-vtitle></h4><p data-vdesc></p>
              <div class="vactions"><a class="v-pill v-disc" href="' . $realisationPage->getLink() . '">Voir nos réalisations →</a><a class="v-pill v-expert" href="' . $contactPage->getLink() . '">📞 Parler à un expert <b data-vservice></b></a></div></div>
          </div>
          <div class="mega-content">
            <div class="cols-3">';
          
            foreach($webMobileChild as $k => $service){
                $validTestimonials = array_filter($testimonials, function($t){return trim(strip_tags($t->getTemoignage())) !== '';});
                $testimonial = $validTestimonials ? $validTestimonials[array_rand($validTestimonials)] : null;
                if($service->getId() == 39){
                   $dateDesc = '<li>iOS natives</li><li>Android natives</li><li>Hybrides RN / Flutter</li>'; 
                }
                elseif($service->getId() == 38){
                    $dateDesc = '<li>Sites vitrines & corporate</li> <li>Développement e-commerce</li> <li>Applications web sur mesure</li><li>Intégrations CRM/ERP/API</li>'; 
                }
                elseif($service->getId() == 40){
                    $dateDesc = '<li>Audit SEO technique complet</li> <li>Optimisation Core Web Vitals</li> <li>Stratégie de mots-clés ciblés</li><li>Optimisation SEO On-Page</li>'; 
                }
                else{
                    $dateDesc = '<li>Espaces clients RGPD</li><li>Dashboards temps réel</li><li>Intégrations CRM/ERP/API</li>'; 
                }
                $packs = pack::findAll($_SESSION["lang"], true, true, $service->getId());

                $packsHtmlBank = '';
                
                foreach($packs as $pack){
                    $packsHtmlBank .= '
                    <a class="pack grad-web" href="'.$service->getLink().'">
                        <img loading="lazy"
                             src="'.$siteURL.'images/packs/'.$pack->getPhoto().'"
                             alt="'.htmlspecialchars($pack->getTitre()).'">
                        <span class="pk-tag">Pack</span>
                            <span class="pk-title">'.htmlspecialchars($pack->getTitre(), ENT_QUOTES, 'UTF-8').'</span>
                    </a>';
                }

                $menuHTML .= '
                <a class="card stag" style="--i:'.($k + 1).'"
                   href="'.$service->getLink().'"
            
                   data-service="'.htmlspecialchars($service->getTitre()).'"
                   data-img="'.$siteURL.'images/services/'.$service->getPhoto().'"
                   data-packs="'.htmlspecialchars(base64_encode($packsHtmlBank), ENT_QUOTES).'"
                   data-ico="globe"
                   data-grad="grad-web">
                    
                    <div class="card-h">
            
                        <span class="thumb grad-web">
                            <img
                                src="'.$siteURL.'images/services/'.$service->getPhoto().'"
                                alt="'.$service->getTitre().'">
                        </span>
            
                    </div>
            
                    <h3 class="card-title">
                        '.$service->getTitre().'
                    </h3>
                    <ul class="feat">
                    '. $dateDesc .'
                    </ul>
            
                </a>';
            } 
            $menuHTML .= '
          
              
          </div>
          
          </div>
        </div>
       <div class="packs stag" style="--i:4">
          <p class="packs-title">Découvrez nos packs</p>
          <div class="packs-grid" id="packsGrid">
          </div>
        </div>
        <div class="mega-foot stag" style="--i:5"><p class="foot-title" data-foottitle></p><div class="foot-row">
                <div class="rating">
                    <span class="rating-num">Reviews Score 5,0</span>
                    <div class="stars" aria-label="Note 5 sur 5">★★★★★</div>
                </div>
                <p class="quote">'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'</p>
                <div class="who">
                    <span class="ava" data-ava></span>
                    <span class="who-txt"><b data-author>'.$testimonial->getNom().'</b>
                    <span class="role" data-role>'.$testimonial->getFonction().'</span>
                    </span>
                </div>
            </div>
        </div>
      
      </div>
      
      
      
      ';
      $validTestimonials = array_filter($testimonials, function($t){return trim(strip_tags($t->getTemoignage())) !== '';});
                $testimonial = $validTestimonials ? $validTestimonials[array_rand($validTestimonials)] : null;
      $menuHTML .= '
            <!-- ===== SAAS ===== -->
      <div class="mega glass-mega glass-nav" data-panel="saas">
        <div class="mega-inner">
          <div class="visual stag" style="--i:0"
               data-def-service="SaaS &amp; Produits" data-def-desc="Du MVP au dashboard décisionnel, livré vite et bien." data-def-ico="rocket" data-def-grad="grad-saas"
               data-def-img="'.$siteURL.'images/pages/saas.webp" data-def-quote="On a lancé notre produit bien plus vite que prévu." data-def-author="" data-def-role="CEO, HelloWorld" data-def-cat="nos produits SaaS">
            <a class="vimg-link" href="#"><span class="vimg-wrap grad-saas" data-vgrad><span class="vico" data-vico></span><img class="vimg" data-vimg alt=""></span></a>
            <div class="cap"><span class="badge">Produits</span><h4 data-vtitle></h4><p data-vdesc></p>
              <div class="vactions"><a class="v-pill v-disc" href="' . $saasProduit->getLink() . '">Lancer mon produit →</a><a class="v-pill v-expert" href="' . $contactPage->getLink() . '">📞 Parler à un expert <b data-vservice></b></a></div></div>
          </div>
          <div class="mega-content"><div class="cols-3">
            <a class="card stag d-none" style="--i:1" href="' . $saasProduit->getLink() . '" data-service="MVP SaaS" data-desc="Du concept au produit en ligne, vite et bien." data-ico="rocket" data-grad="grad-saas" data-img="https://loremflickr.com/600/700/startup,team?lock=17" data-quote="MVP en ligne en 6 semaines, pile pour notre levée." data-author="" data-role="">
              <div class="card-h"><span class="thumb grad-saas" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/startup,team?lock=17" alt="" onerror="this.style.display=\'none\"><span class="thumb-ico"></span></span><span class="bignum">01</span></div>
              <h3 class="card-title">MVP SaaS</h3><ul class="feat"><li>• Prototypage rapide</li><li>• Sprints agiles</li><li>• Itération continue</li></ul></a>
            <a class="card stag" style="--i:2" href="' . $saasProduit->getLink() . '" data-service="MVP SaaS" data-desc="MVP SaaS" data-desc="Du concept au produit en ligne, vite et bien." data-ico="building" data-grad="grad-saas" data-img="https://loremflickr.com/600/700/software,office?lock=18" data-quote="MVP en ligne en 6 semaines, pile pour notre levée." data-author="" data-role="">
              <div class="card-h"><span class="thumb grad-saas" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/software,office?lock=18" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="bignum">01</span></div>
              <h3 class="card-title">MVP SaaS</h3><ul class="feat"><li>• Prototypage rapide</li><li>• Sprints agiles</li><li>• Itération continue</li></ul></a>
            <a class="card stag" style="--i:3" href="' . $saasProduit->getLink() . '" data-service="Plateformes Métiers" data-desc="Des outils internes qui font gagner du temps." data-ico="building" data-grad="grad-saas" data-img="https://loremflickr.com/600/700/software,office?lock=18" data-quote="Nos process internes ont été divisés par deux." data-author="" data-role="">
              <div class="card-h"><span class="thumb grad-saas" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/software,office?lock=18" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="bignum">02</span></div>
              <h3 class="card-title">Plateformes Métiers</h3><ul class="feat"><li>• Outils PME / ETI</li><li>• Workflows automatisés</li><li>• ERP / CRM internes</li></ul></a>
            <a class="card stag" style="--i:4" href="' . $saasProduit->getLink() . '" data-service="Dashboards &amp; Analytics" data-desc="Vos décisions enfin guidées par la donnée." data-ico="dash" data-grad="grad-saas" data-img="https://loremflickr.com/600/700/data,dashboard?lock=19" data-quote="Les décisions se prennent enfin sur de la data fiable." data-author="" data-role="">
              <div class="card-h"><span class="thumb grad-saas" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/data,dashboard?lock=19" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="bignum">03</span></div>
              <h3 class="card-title">Dashboards &amp; Analytics</h3><ul class="feat"><li>• BI &amp; KPI visuels</li><li>• Tableaux temps réel</li><li>• Reporting automatisé</li></ul></a>
          </div></div>
        </div>
        <div class="mega-foot stag" style="--i:5"><p class="foot-title" data-foottitle></p><div class="foot-row">
        <div class="rating">
        <span class="rating-num">Reviews Score 5,0</span>
        <div class="stars" aria-label="Note 5 sur 5">★★★★★</div>
        </div>
        <p class="quote" data-quote>'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'</p><div class="who"><span class="ava" data-ava></span><span class="who-txt"><b data-author>'.$testimonial->getNom().'</b><span class="role" data-role>'.$testimonial->getFonction().'</span></span></div></div></div>
      
      </div>';
      $validTestimonials = array_filter($testimonials, function($t){return trim(strip_tags($t->getTemoignage())) !== '';});
                $testimonial = $validTestimonials ? $validTestimonials[array_rand($validTestimonials)] : null;
      $menuHTML .= '

      <!-- ===== MARKETPLACE ===== -->
      <div class="mega glass-mega glass-nav" data-panel="market">
        <div class="mega-inner">
          <div class="visual stag" style="--i:0"
               data-def-service="Marketplace IA" data-def-desc="Activez un agent IA en quelques jours, pas en mois." data-def-ico="robot" data-def-grad="grad-mk"
               data-def-img="'.$siteURL.'images/pages/market-place.webp" data-def-quote="Un agent déployé en quelques jours, adopté immédiatement." data-def-author="Lina O." data-def-role="" data-def-cat="nos agents de la Marketplace">
            <a class="vimg-link" href="#"><span class="vimg-wrap grad-mk" data-vgrad><span class="vico" data-vico></span><img class="vimg" data-vimg alt=""></span></a>
            <div class="cap"><span class="badge">6 agents</span><h4 data-vtitle></h4><p data-vdesc></p>
              <div class="vactions"><a class="v-pill v-disc" href="' . $marketplace->getLink() . '">Parcourir →</a><a class="v-pill v-expert" href="' . $contactPage->getLink() . '">📞 Parler à un expert <b data-vservice></b></a></div></div>
          </div>
          <div class="mega-content">
            <p class="eyebrow dark stag" style="--i:1">Marketplace · Agents prêts à l\'emploi</p>
            <div class="cols-2">
              <a class="sublink stag d-none" style="--i:2" href="' . $marketplace->getLink() . '" data-service="HW Concierge AI" data-desc="Assistant conversationnel multicanal — site, chat, email — formé sur votre catalogue et vos processus. Disponible 24/7, multilingue." data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/agent-ia/BOARDY.webp" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/BOARDY.webp" alt="VERDE Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW Concierge AI</span><span class="desc">Multilingue (FR/AR/EN)</span></span></a>
              <a class="sublink stag" style="--i:2" href="' . $marketplace->getLink() . '" data-service="HW Concierge AI" data-desc="Assistant conversationnel multicanal site, chat, email, formé sur votre catalogue et vos processus. Disponible 24/7, multilingue." data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/agent-ia/BOARDY.webp" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/BOARDY.webp" alt="VERDE Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW Concierge AI</span><span class="desc">Multilingue (FR/AR/EN)</span></span></a>
              <a class="sublink stag" style="--i:3" href="' . $marketplace->getLink() . '" data-service="HW WhatsApp Agent" data-desc="WhatsApp Business automatisé et connecté au CRM." data-ico="whatsapp" data-grad="grad-mk" data-img="'.$siteURL.'images/agent-ia/ASTRO.webp" data-quote="Le SAV WhatsApp tourne en autonomie totale." data-author="" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/ASTRO.webp" alt="ASTRO Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW WhatsApp Agent</span><span class="desc">WhatsApp Business + CRM</span></span></a>
              <a class="sublink stag" style="--i:4" href="' . $marketplace->getLink() . '" data-service="HW SDR Agent" data-desc="Prospection commerciale et qualification automatisées." data-ico="target" data-grad="grad-mk" data-img="'.$siteURL.'images/agent-ia/TITAN.webp" data-quote="Notre pipeline n\'a jamais été aussi rempli." data-author="" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/TITAN.webp" alt="TITAN Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW SDR Agent</span><span class="desc">Prospection + qualification</span></span></a>
              <a class="sublink stag" style="--i:5" href="' . $marketplace->getLink() . '" data-service="HW Support 24/7" data-desc="Support multicanal intelligent avec escalade humaine." data-ico="headset" data-grad="grad-mk" data-img="'.$siteURL.'images/agent-ia/SOLA.webp" data-quote="Réponses instantanées, clients vraiment ravis." data-author="" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/SOLA.webp" alt="SOLA Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW Support 24/7</span><span class="desc">Multicanal avec escalade</span></span></a>
              <a class="sublink stag" style="--i:6" href="' . $marketplace->getLink() . '" data-service="HW Content Studio AI" data-desc="Génération de contenu SEO et publication automatique." data-ico="pen" data-grad="grad-mk" data-img="'.$siteURL.'images/agent-ia/PULSE.webp" data-quote="20 articles SEO par mois, sans même y penser." data-author="" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/PULSE.webp" alt="Pulse Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW Content Studio AI</span><span class="desc">SEO + publication auto</span></span></a>
              <a class="sublink stag" style="--i:7" href="' . $marketplace->getLink() . '" data-service="HW Voice Caller" data-desc="Agent vocal pour vos appels sortants automatisés." data-ico="phone" data-grad="grad-mk" data-img="'.$siteURL.'images/agent-ia/VOX.webp" data-quote="Les relances téléphoniques sont totalement automatisées." data-author="" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/VOX.webp" alt="VOX Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW Voice Caller</span><span class="desc">Appels sortants</span></span></a>
              <a class="sublink stag" style="--i:8" href="' . $marketplace->getLink() . '" data-service="Conversationnel IA" data-desc="Assistants intelligents pour vos sites web et applications." data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/agent-ia/VERDE2.webp" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/VERDE2.webp" alt="VERDE Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Conversationnel IA</span><span class="desc">Sites web et apps</span></span></a>
              
              
            </div>
          </div>
        </div>
         <div class="mega-foot stag" style="--i:8"><p class="foot-title" data-foottitle></p><div class="foot-row">
         <div class="rating">
         <span class="rating-num">Reviews Score 5,0</span>
                    <div class="stars" aria-label="Note 5 sur 5">★★★★★</div>
         </div>
         <p class="quote" data-quote>'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'</p><div class="who"><span class="ava" data-ava></span><span class="who-txt"><b data-author>'.$testimonial->getNom().'</b><span class="role" data-role>'.$testimonial->getFonction().'</span></span></div></div></div>
      
      </div>';
      $validTestimonials = array_filter($testimonials, function($t){return trim(strip_tags($t->getTemoignage())) !== '';});
      $testimonial = $validTestimonials ? $validTestimonials[array_rand($validTestimonials)] : null;
      $menuHTML .= '


      <!-- ===== FORMATIONS ===== -->
      
      <div class="mega glass-mega glass-nav" data-panel="form">
        <div class="mega-inner">
          <div class="visual stag" style="--i:0"
               data-def-service="Formations IA" data-def-desc="Montez en compétence, vous et vos équipes." data-def-ico="cap" data-def-grad="grad-form"
               data-def-img="'.$siteURL.'images/pages/formation.webp" data-def-quote="Une montée en compétence IA visible dès la première semaine." data-def-author="Patrick D." data-def-cat="nos Formations IA">
            <a class="vimg-link" href="#"><span class="vimg-wrap grad-form" data-vgrad><span class="vico" data-vico></span><img class="vimg" data-vimg alt=""></span></a>
            <div class="cap"><span class="badge">Académie</span><h4 data-vtitle></h4><p data-vdesc></p>
              <div class="vactions"><a class="v-pill v-disc" href="' . $formationIa->getLink() . '">Voir le calendrier →</a><a class="v-pill v-expert" href="' . $contactPage->getLink() . '">📞 Parler à un expert <b data-vservice></b></a></div></div>
          </div>
          <div class="mega-content">
            <a class="sublink stag" style="--i:1" href="' . $formationIa->getLink() . '" data-service="Master Class Dirigeants IA" data-desc="Stratégie IA pour décideurs et C-level — 1 jour." data-ico="cap" data-grad="grad-form" data-img="https://loremflickr.com/600/700/conference,executive?lock=27" data-quote="Mon comité de direction a enfin une vision IA claire." data-author="Patrick D." data-role="CEO, Groupe Méridien"><span class="thumb grad-form" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/conference,executive?lock=27" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Master Class Dirigeants IA <em>(1 jour)</em></span><span class="desc">Stratégie pour décideurs et C-level</span></span></a>
            <a class="sublink stag" style="--i:2" href="' . $formationIa->getLink() . '" data-service="Master Class Dirigeants" data-desc="CEO, DG, Directeurs & C-Level." data-ico="gear" data-grad="grad-form" data-img="https://loremflickr.com/600/700/coding,workshop?lock=28" data-quote="Mon équipe automatise déjà ses tâches répétitives."><span class="thumb grad-form" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/coding,workshop?lock=28" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Master Class Dirigeants <em>(1 journée)</em></span><span class="desc">CEO, DG, Directeurs & C-Level</span></span></a>
            <a class="sublink stag" style="--i:3" href="' . $formationIa->getLink() . '" data-service="Bootcamp No-Code IA" data-desc="équipes opérationnelles, chefs de projet" data-ico="press" data-grad="grad-form" data-img="https://loremflickr.com/600/700/marketing,team?lock=29" data-quote="Nos campagnes sont passées à la vitesse supérieure." ><span class="thumb grad-form" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/marketing,team?lock=29" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Bootcamp No-Code IA <em>(3 jours)</em></span><span class="desc">Equipes opérationnelles, chefs de projet</span></span></a>
            <a class="sublink stag" style="--i:4" href="' . $formationIa->getLink() . '" data-service="Formation IA Marketing" data-desc="équipes marketing, content, social media" data-ico="share" data-grad="grad-form" data-img="https://loremflickr.com/600/700/workshop,whiteboard?lock=30" data-quote="On a conçu notre premier agent en une seule journée."><span class="thumb grad-form" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/workshop,whiteboard?lock=30" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Formation IA Marketing <em>(2 jours)</em></span><span class="desc">Equipes marketing, content, social media</span></span></a>
            <a class="sublink stag" style="--i:5" href="' . $formationIa->getLink() . '" data-service="Atelier Agents IA" data-desc="Développeurs, architectes, tech leads" data-ico="star" data-grad="grad-form" data-img="https://loremflickr.com/600/700/meeting,consulting?lock=31" data-quote="Un programme taillé pile pour nos enjeux internes."><span class="thumb grad-form" data-thumb><img loading="lazy" src="https://loremflickr.com/96/96/meeting,consulting?lock=31" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Atelier Agents IA <em>(2 jours)</em></span><span class="desc">Développeurs, architectes, tech leads</span></span></a>
            <div class="tags stag" style="--i:6; padding-left:8px; margin-top:6px;"><span class="tag">n8n</span><span class="tag">Claude</span><span class="tag">ChatGPT</span><span class="tag">Make</span><span class="tag">Notion</span><span class="tag">Zapier</span></div>
          </div>
        </div>
      
        <div class="mega-foot stag" style="--i:7"><p class="foot-title" data-foottitle></p><div class="foot-row">
        <div class="rating">
        <span class="rating-num">Reviews Score 5,0</span>
        <div class="stars" aria-label="Note 5 sur 5">★★★★★</div>
        </div>
        <p class="quote" data-quote>'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'</p><div class="who"><span class="ava" data-ava></span><span class="who-txt"><b data-author>'.$testimonial->getNom().'</b><span class="role" data-role>'.$testimonial->getFonction().'</span></span></div></div></div>
      
      
      </div>';
      $validTestimonials = array_filter($testimonials, function($t){return trim(strip_tags($t->getTemoignage())) !== '';});
                $testimonial = $validTestimonials ? $validTestimonials[array_rand($validTestimonials)] : null;
      $menuHTML .= '
          <!-- ===== SOLUTIONS ===== -->
      <div class="mega glass-mega glass-nav" data-panel="solutions">
        <div class="mega-inner">
          <div class="visual stag" style="--i:0"
               data-def-service="Solutions IA" data-def-desc="Agents IA &amp; automatisations pour toute votre relation client." data-def-ico="robot" data-def-grad="grad-sol"
               data-def-img="'.$siteURL.'images/services/'.$solutionIA->getPhoto().'"
               data-def-quote="Hello World a transformé notre relation client en quelques semaines." data-def-author="" data-def-role="" data-def-cat="nos Solutions IA">
            <a class="vimg-link" href="#"><span class="vimg-wrap grad-sol" data-vgrad><span class="vico" data-vico></span><img class="vimg" data-vimg alt=""></span></a>
            <div class="cap"><span class="badge">Service IA</span><h4 data-vtitle>Solutions IA</h4><p data-vdesc></p>
              <div class="vactions"><a class="v-pill v-disc" href="' . $solutionIA->getLink() .'">Découvrir →</a><a class="v-pill v-expert" href="' . $contactPage->getLink() .'">📞 Parler à un expert <b data-vservice></b></a></div></div>
          </div>
          <div class="mega-content">
            <div class="cols-3">
              <div class="stag" style="--i:1"><p class="eyebrow dark">Agents IA</p>
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="Conversationnel IA" data-desc="Assistants intelligents pour vos sites web et applications." data-ico="chat" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/VERDE2.webp" data-quote="Notre taux de réponse a doublé en deux semaines." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/VERDE2.webp" alt="VERDE Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Conversationnel IA</span><span class="desc">Sites web et apps</span></span></a>
                
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="Concierge AI" data-desc="Assistance virtuelle sur-mesure — guide vos clients 24/7" data-ico="whatsapp" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/BOARDY.webp" data-quote="Les clients adorent répondre sur WhatsApp, et nous aussi." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/BOARDY.webp" alt="BOARDY Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Concierge AI</span><span class="desc">Assistance virtuelle sur-mesure &amp; guide vos clients 24/7</span></span></a>
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="Voice Caller" data-desc="Des assistants vocaux qui décrochent à votre place." data-ico="mic" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/VOX.webp" data-quote="L\'agent vocal gère 70% de nos appels entrants." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/VOX.webp" alt="VOX Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Voice Caller</span><span class="desc">Appels entrants/sortants automatisés</span></span></a>
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="Support 24/7" data-desc="Un service client automatisé qui ne dort jamais." data-ico="headset" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/SOLA.webp" data-quote="Plus aucun ticket en attente le matin." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/SOLA.webp" alt="SOLA Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Support 24/7</span><span class="desc">Service automatisé</span></span></a>
                
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="HW SDR Agent" data-desc="Automatisez vos ventes" data-ico="headset" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/TITAN.webp" data-quote="Plus aucun ticket en attente le matin." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/TITAN.webp" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW SDR Agent</span><span class="desc">Automatisez vos ventes</span></span></a>
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="HW Whatsapp AI" data-desc="Agents IA autonomes sur WhatsApp" data-ico="headset" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/ASTRO.webp" data-quote="Plus aucun ticket en attente le matin." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/ASTRO.webp" alt="ASTRO Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">HW Whatsapp AI</span><span class="desc">Agents IA autonomes sur WhatsApp</span></span></a>
                <a class="sublink sublink-all" href="' . $agentsIaPage->getLink() . '"'. ' data-service="Tous nos Agents IA" data-desc="D&eacute;couvrez l\'ensemble de nos agents IA."'. ' data-ico="grid" data-grad="grad-sol" data-img="'.$siteURL.'images/services/'.$solutionIA->getPhoto().'" data-quote="" data-author="" data-role="">'. '<span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/services/'.$solutionIA->getPhoto().'" alt="VERDE Agent IA" onerror="this.style.display=\'none\'"><span class="thumb-ico" style="font-size:1.4rem">&#8594;</span></span>'. '<span class="tx"><span class="ttl">Voir tous les agents IA</span><span class="desc">23 agents disponibles</span></span></a>
              </div>
              <div class="divider stag" style="--i:2"><p class="eyebrow dark">Automatisations</p>
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="CRM" data-desc="Vos leads synchronisés et vos clients suivis, sans friction." data-ico="users" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/CRM.webp" data-quote="Nos leads sont enfin synchronisés partout." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/CRM.webp" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">CRM</span><span class="desc">Leads &amp; clients</span></span></a>
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="Email" data-desc="Des campagnes ciblées et des relances automatiques." data-ico="mail" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/Email.webp" data-quote="Nos campagnes tournent toutes seules désormais." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/Email.webp" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Email</span><span class="desc">Campagnes &amp; suivis</span></span></a>
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="Prospection" data-desc="Des prospects qualifiés engagés automatiquement." data-ico="target" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/Prospection.webp" data-quote="On signe deux fois plus de RDV qualifiés." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/Prospection.webp" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Prospection</span><span class="desc">Leads qualifiés</span></span></a>
                <a class="sublink" href="' . $solutionIA->getLink() .'" data-service="Reporting" data-desc="Vos performances visibles en un coup d\'œil." data-ico="chart" data-grad="grad-sol" data-img="'.$siteURL.'images/agent-ia/Reporting.webp" data-quote="Je vois mes KPIs en un coup d\'œil chaque matin." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/agent-ia/Reporting.webp" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Reporting</span><span class="desc">Tableaux de bord</span></span></a>
              </div>
              <div class="divider stag" style="--i:3"><p class="eyebrow dark">Sectoriel</p>
                <a class="sublink" href="' . $secteurImmo->getLink() .'" data-service="Immobilier" data-desc="Des solutions pensées pour agences et promoteurs." data-ico="home" data-grad="grad-sol" data-img="'.$siteURL.'images/secteur/'.$secteurImmo->getPhoto().'" data-quote="Nos agences ont gagné un temps fou sur les visites." data-author="Nadia F." data-role="Dir., HomeKey"><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/secteur/'.$secteurImmo->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Immobilier</span><span class="desc">Agences &amp; promoteurs</span></span></a>
                <a class="sublink" href="' . $secteurHotel->getLink() .'" data-service="Hôtellerie" data-desc="Réservations et services clients pour l\'hôtellerie." data-ico="hotel" data-grad="grad-sol" data-img="'.$siteURL.'images/secteur/'.$secteurHotel->getPhoto().'" data-quote="Les réservations se gèrent sans effort, même la nuit." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/secteur/'.$secteurHotel->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Hôtellerie</span><span class="desc">Hôtellerie</span></span></a>
                <a class="sublink" href="' . $secteurMarketing->getLink() .'" data-service="Marketing" data-desc="Rapports & distribution de contenus" data-ico="bag" data-grad="grad-sol" data-img="'.$siteURL.'images/secteur/'.$secteurMarketing->getPhoto().'" data-quote="Notre panier moyen a grimpé de 18%." data-author="Clara V." data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/secteur/'.$secteurMarketing->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Marketing</span><span class="desc">Rapports &amp; distribution de contenus</span></span></a>
                <a class="sublink" href="' . $secteurSante->getLink() .'" data-service="Santé" data-desc="Des solutions fiables pour établissements médicaux." data-ico="heart" data-grad="grad-sol" data-img="'.$siteURL.'images/secteur/'.$secteurSante->getPhoto().'" data-quote="Les prises de rendez-vous patients sont enfin fluides." data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/secteur/'.$secteurSante->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Santé</span><span class="desc">optimisez le temps médical</span></span></a>
               <a class="sublink" href="' . $secteurFinance->getLink() .'" data-service="Finance" data-desc="Automatisez vos services financiers" data-ico="heart" data-grad="grad-sol" data-img="'.$siteURL.'images/secteur/'.$secteurFinance->getPhoto().'" data-quote="Assistant IA pour la finance" data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/secteur/'.$secteurFinance->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Finance</span><span class="desc">Automatisez vos services financiers</span></span></a>
               <a class="sublink" href="' . $secteurRestau->getLink() .'" data-service="Restauration" data-desc="Optimisez votre service client" data-ico="heart" data-grad="grad-sol" data-img="'.$siteURL.'images/secteur/'.$secteurSante->getPhoto().'" data-quote="Optimisez votre service client" data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/secteur/'.$secteurRestau->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Restauration</span><span class="desc">Optimisez votre service client</span></span></a>
               <a class="sublink" href="' . $secteurOperation->getLink() .'" data-service="Opérations" data-desc="Assistez vos équipes au quotidien" data-ico="heart" data-grad="grad-sol" data-img="'.$siteURL.'images/secteur/'.$secteurOperation->getPhoto().'" data-quote="Assistez vos équipes au quotidien" data-author="" data-role=""><span class="thumb grad-sol" data-thumb><img loading="lazy" src="'.$siteURL.'images/secteur/'.$secteurOperation->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">Opération</span><span class="desc">Assistez vos équipes au quotidien</span></span></a>
              
              </div>
            </div>
          </div>
        </div>
       
        
           <div class="mega-foot stag" style="--i:4"><p class="foot-title" data-foottitle></p><div class="foot-row">
           <div class="rating">
           <span class="rating-num">Reviews Score 5,0</span>
            <div class="stars" aria-label="Note 5 sur 5">★★★★★</div>
           </div>
           <p class="quote" data-quote>'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'</p><div class="who"><span class="ava" data-ava></span><span class="who-txt"><b data-author>'.$testimonial->getNom().'</b><span class="role" data-role>'.$testimonial->getFonction().'</span></span></div></div></div>
      
      
      </div>';
      $validTestimonials = array_filter($testimonials, function($t){return trim(strip_tags($t->getTemoignage())) !== '';});
      $testimonial = $validTestimonials ? $validTestimonials[array_rand($validTestimonials)] : null;
      $menuHTML .= '

      <!-- ===== MARKETPLACE ===== -->
      <div class="mega glass-mega glass-nav" data-panel="agencies">
        <div class="mega-inner">
          <div class="visual stag" style="--i:0"
               data-def-service="Nos Agences" data-def-desc="Une présence mondiale, un accompagnement de proximité et des solutions pensées pour vos ambitions internationales." data-def-ico="robot" data-def-grad="grad-mk"
               data-def-img="'.$siteURL.'images/pages/'.$agenceMarra->getPhoto().'" data-def-quote="Un agent déployé en quelques jours, adopté immédiatement." data-def-author="Lina O." data-def-role="" data-def-cat="Notre présence internationale">
            <a class="vimg-link" href="#"><span class="vimg-wrap grad-mk" data-vgrad><span class="vico" data-vico></span><img class="vimg" data-vimg alt=""></span></a>
            <div class="cap"><span class="badge">6 agents</span><h4 data-vtitle></h4><p data-vdesc></p>
              <div class="vactions"><a class="v-pill v-disc" href="' . $nosAgence->getLink() . '">Parcourir →</a><a class="v-pill v-expert" href="' . $contactPage->getLink() . '">📞 Parler à un expert <b data-vservice></b></a></div></div>
          </div>
          <div class="mega-content">
            <p class="eyebrow dark stag" style="--i:1">Nos Agences</p>
            <div class="cols-2">
            
            <a class="sublink stag" style="--i:2" href="' . $agenceCasa->getLink() . '" data-service="' . $agenceCasa->getTitre() . '" data-desc="'.htmlspecialchars(strip_tags($agenceMarra->getExtrait()), ENT_QUOTES, 'UTF-8').'" data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/pages/'.$agenceCasa->getPhoto().'" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/pages/'.$agenceCasa->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">'.$agenceCasa->getTitre().'</span></span></a>
            <a class="sublink stag" style="--i:3" href="' . $agenceMarra->getLink() . '" data-service="' . $agenceMarra->getTitre() . '" data-desc="'.htmlspecialchars(strip_tags($agenceMarra->getExtrait()), ENT_QUOTES, 'UTF-8').'" data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/pages/'.$agenceMarra->getPhoto().'" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/pages/'.$agenceMarra->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">'.$agenceMarra->getTitre().'</span></span></a>
            <a class="sublink stag" style="--i:4" href="' . $agenceLondre->getLink() . '" data-service="' . $agenceLondre->getTitre() . '" data-desc="'.htmlspecialchars(strip_tags($agenceLondre->getExtrait()), ENT_QUOTES, 'UTF-8').'" data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/pages/'.$agenceLondre->getPhoto().'" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/pages/'.$agenceLondre->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">'.$agenceLondre->getTitre().'</span></span></a>
            
          
            <a class="sublink stag" style="--i:5" href="' . $agenceTanger->getLink() . '" data-service="' . $agenceTanger->getTitre() . '" data-desc="'.htmlspecialchars(strip_tags($agenceTanger->getExtrait()), ENT_QUOTES, 'UTF-8').'" data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/pages/'.$agenceTanger->getPhoto().'" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/pages/'.$agenceTanger->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">'.$agenceTanger->getTitre().'</span></span></a>
            <a class="sublink stag" style="--i:5" href="' . $agenceRabat->getLink() . '" data-service="' . $agenceRabat->getTitre() . '" data-desc="'.htmlspecialchars(strip_tags($agenceRabat->getExtrait()), ENT_QUOTES, 'UTF-8').'" data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/pages/'.$agenceRabat->getPhoto().'" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/pages/'.$agenceRabat->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">'.$agenceRabat->getTitre().'</span></span></a>
            <a class="sublink stag" style="--i:5" href="' . $agenceFes->getLink() . '" data-service="' . $agenceFes->getTitre() . '" data-desc="'.htmlspecialchars(strip_tags($agenceFes->getExtrait()), ENT_QUOTES, 'UTF-8').'" data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/pages/'.$agenceFes->getPhoto().'" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/pages/'.$agenceFes->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">'.$agenceFes->getTitre().'</span></span></a>
            <a class="sublink stag" style="--i:5" href="' . $agenceAgadir->getLink() . '" data-service="' . $agenceAgadir->getTitre() . '" data-desc="'.htmlspecialchars(strip_tags($agenceAgadir->getExtrait()), ENT_QUOTES, 'UTF-8').'" data-ico="chat" data-grad="grad-mk" data-img="'.$siteURL.'images/pages/'.$agenceAgadir->getPhoto().'" data-quote="Déployé en 4 jours, adopté immédiatement par l\'équipe." data-author="H. Kennou" data-role=""><span class="thumb grad-mk" data-thumb><img loading="lazy" src="'.$siteURL.'images/pages/'.$agenceAgadir->getPhoto().'" alt="" onerror="this.style.display=\'none\'"><span class="thumb-ico"></span></span><span class="tx"><span class="ttl">'.$agenceAgadir->getTitre().'</span></span></a>
            
            </div>
          </div>
        </div>
         <div class="mega-foot stag" style="--i:8"><p class="foot-title" data-foottitle></p><div class="foot-row">
         <div class="rating">
         <span class="rating-num">Reviews Score 5,0</span>
                    <div class="stars" aria-label="Note 5 sur 5">★★★★★</div>
         </div>
         <p class="quote" data-quote>'.htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8').'</p><div class="who"><span class="ava" data-ava></span><span class="who-txt"><b data-author>'.$testimonial->getNom().'</b><span class="role" data-role>'.$testimonial->getFonction().'</span></span></div></div></div>
      
      </div>';

        echo $menuHTML;
    }
    public function getMegaMenuold($deep = 0, $mobile = false)
    {
        global $db, $siteURL;
        $menuHTML =  '<nav class="header__navigation">
            <ul class="header__list">';

                $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
					  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
					  WHERE id_menu = " . $this->id . " 
					  AND parent_id = 0
					  AND langue = '" . $_SESSION["lang"] . "' 
					  ORDER BY ordre ASC";
                $result = $db->query($SQLselect);
                if ($db->num_rows($result) > 0) {
                    $result = $db->queryS($SQLselect);
                    foreach ($result as $data) {
                        $mi = new menu_item($data['id'], $db, $_SESSION["lang"]);
                        $blank = $mi->isBlank() ? 'target="_blank"' : '';
                        $classLi = ($mi->hasSousMenu()) ? 'header__list-item has-submenu' : 'header__list-item ';
                        $hrefTiret = ($mi->hasSousMenu()) ? '<svg class="menu-svg" xmlns="http://www.w3.org/2000/svg" width="9" height="5" viewBox="0 0 9 5" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.612712 0.200408C0.916245 -0.081444 1.39079 -0.0638681 1.67265 0.239665L4.37305 3.14779L7.07345 0.239665C7.35531 -0.0638681 7.82986 -0.081444 8.13339 0.200408C8.43692 0.48226 8.4545 0.956809 8.17265 1.26034L4.92265 4.76034C4.78074 4.91317 4.5816 5 4.37305 5C4.1645 5 3.96536 4.91317 3.82345 4.76034L0.573455 1.26034C0.291603 0.956809 0.309179 0.48226 0.612712 0.200408Z" fill="black" />
                        </svg>' : '';
                        $link = $hrefTiret && $mobile ? "#" : $mi->getLink();

                        if ($mi->getType() == 'page') {
                            $classLi .= (!isset($_GET['task']) && isset($_GET['id']) && $_GET['id'] == $mi->getIdItem()) ? 'active' : '';
                        }
                        if($mi->getType() == 'ext' && isHome() && $mi->getLink() == $siteURL){
                            $classLi .=  'active';
                        }
                        $menuHTML .= '<li class="' . $classLi . '"><a href="' . $link . '"><span>' . $mi->getTitre() .'</span></a>  '. $hrefTiret . '';

                        if($mi->hasSousMenu() && $deep == 0) {
                            $menuHTML .= '<div class="submenu-wrapper">
                        <div class="submenu-list__wrapper">
                            <div class="submenu-list__title"></div>
                            <ul class="submenu-list">';

                            $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
                                                JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
                                                WHERE id_menu = " . $this->id . "
                                                AND parent_id = " . $mi->getId() . "
                                                AND langue = '" . $_SESSION["lang"] . "' 
                                                ORDER BY ordre ASC";
                            $result3 = $db->queryS($SQLselect);
                            
                            $cpt = 0;
                    foreach ($result3 as $data3) {
                        $mi = new menu_item($data3['id'], $db, $_SESSION["lang"]);
                        $blank = $mi->isBlank() ? 'target="_blank"' : '';
                        $cpt++;
                        $atcive = $cpt == 1 ? 'active' : '';
                        $menuHTML .= '<li class="submenu-list__item has-submenu '.$atcive.'">
                               <div class="submenu-list__item-wrapper">
                                        <div class="submenu-list__item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                                                <rect width="44" height="44" rx="10" fill="#09A1BE" fill-opacity="0.1" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 25.2969C25.866 25.2969 29 22.1629 29 18.2969C29 14.4309 25.866 11.2969 22 11.2969C18.134 11.2969 15 14.4309 15 18.2969C15 22.1629 18.134 25.2969 22 25.2969ZM17.9789 26.398C18.1885 26.1242 18.5747 26.0599 18.8621 26.2496L18.8772 26.259C18.8923 26.2683 18.9181 26.2837 18.9541 26.3039C19.0262 26.3443 19.1391 26.4035 19.29 26.4709C19.592 26.6057 20.0444 26.7721 20.6255 26.8852C21.0249 26.963 21.4852 27.0157 22 27.0157C22.7233 27.0157 23.3394 26.9117 23.8299 26.78C24.267 26.6628 24.6041 26.5235 24.8273 26.4167C24.9388 26.3633 25.0215 26.3182 25.0736 26.2882C25.0997 26.2732 25.1181 26.262 25.1286 26.2555L25.1377 26.2498C25.1373 26.25 25.1368 26.2503 25.1364 26.2506L25.1377 26.2497L25.1377 26.2498C25.4252 26.0593 25.8113 26.124 26.0211 26.398C26.2312 26.6725 26.1922 27.0631 25.9322 27.2908L25.931 27.2918L25.9249 27.2972L25.8986 27.3206C25.875 27.3418 25.8395 27.3739 25.7939 27.4158C25.7025 27.4998 25.5708 27.6232 25.4123 27.7785C25.0943 28.0898 24.6722 28.5253 24.252 29.0243C23.8298 29.5256 23.4214 30.0772 23.1214 30.6208C22.8157 31.1749 22.6561 31.6612 22.6561 32.0469C22.6561 32.4094 22.3623 32.7032 21.9998 32.7032C21.6374 32.7031 21.3436 32.4093 21.3436 32.0469C21.3436 31.6612 21.1841 31.1748 20.8785 30.6208C20.5786 30.0772 20.1701 29.5256 19.748 29.0243C19.3278 28.5253 18.9057 28.0898 18.5878 27.7785C18.4292 27.6232 18.2975 27.4998 18.2062 27.4158C18.1606 27.3739 18.1251 27.3418 18.1014 27.3206L18.0751 27.2972L18.069 27.2918L18.0677 27.2907C17.8076 27.063 17.7688 26.6725 17.9789 26.398Z" fill="#09A1BE" />
                                            </svg>
                                        </div>
                                        <a href="'.$mi->getLink().'" class="submenu-list__item-link">
                                            <span class="submenu-list__item-title">'.$mi->getTitre().'</span>
                                        </a>
                                        <svg class="second-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="#09A1BE">
                                            <path d="M0.5 6.99996H15.5M15.5 6.99996L9.66667 1.16663M15.5 6.99996L9.66667 12.8333" stroke="#09A1BE" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>';
                            // test service
                            $classe = $mi->getType();
                            if($classe == 'service'){
                                if(method_exists($classe, "find")){
                                    $s = $classe::find($mi->getIdItem(), $_SESSION["lang"]);
                                  $packs = pack::findAll($_SESSION["lang"], true, true, $s->getId());
                                } else {
                                    $s = new $classe($mi->getIdItem(),$db,$_SESSION['lang']);
                                     $packs = pack::findAll($_SESSION["lang"], true, true, $s->getId());
                                }
            
                                $menuHTML .= '<div class="submenu-content">
                                <ul class="submenu-content__list">';
                                
                                    $menuHTML .= '
                                    <li class="submenu-content__list-item">
                                        <a href="'.$s->getLink().'" class="submenu-content__link">
                                            <div class="submenu-content__link-img">
                                               <img src="' . $siteURL . 'images/services/' . $s->getPhoto() . '" alt="' . htmlspecialchars($s->getTitre()) . '">
                                            </div>
                                            <div class="submenu-content__link-title">
                                                '.$s->getTitre().'
                                            </div>
                                            <p>'.strip_tags($s->getExtrait()).'</p>
                                            <button class="new-service-readmore" href="'.$s->getLink().'">Découvrez notre expertise</button>
                                        </a>
                                    </li>';
                                    $menuHTML .= '</ul>';
                                    
                                    if (!empty($packs)) {
                                    
                                        $menuHTML .= '
                                            <h3 class="pack-titre">Découvrez nos packs</h3>
                                            <div class="mega-menu-pack">
                                        ';
                                    
                                        foreach ($packs as $pack) {
                                    
                                            $menuHTML .= '
                                                <div class="pack">
                                                <a href="'.$s->getLink().'"><img src="' . $siteURL . 'images/packs/' . $pack->getPhoto() . '" alt="' . htmlspecialchars($pack->getTitre()) . '"></a>
                                                    
                                                    <h4>' . htmlspecialchars($pack->getTitre()) . '</h4>
                                                </div>
                                            ';
                                        }
                                    
                                        $menuHTML .= '
                                            </div>
                                        ';
                                    }
                                    
                                    $menuHTML .= '
                                    </div>';


                            }elseif($classe == 'page'){
                                if(method_exists($classe, "find")){
                                    $p = $classe::find($mi->getIdItem(), $_SESSION["lang"]);
                                } else {
                                    $p = new $classe($mi->getIdItem(),$db,$_SESSION['lang']);
                                }
                                $pageAgences = array(32,33,34,37,38,39,40);
                                if(in_array($p->getId(),$pageAgences)){
                                    $menuHTML .= '<div class="submenu-content">
                                <ul class="submenu-content__list">';
                                
                                    $menuHTML .= '
                                    <li class="submenu-content__list-item">
                                        <a href="'.$p->getLink().'" class="submenu-content__link">
                                            <div class="submenu-content__link-img">
                                               <img src="' . $siteURL . 'images/pages/' . $p->getPhoto() . '" alt="' . htmlspecialchars($p->getTitre()) . '">
                                            </div>
                                            <div class="submenu-content__link-title">
                                                '.$p->getTitre().'
                                            </div>
                                            <p>'.$p->getExtrait().'</p>
                                           
                                            
                                        </a>
                                    </li>';
                                
                                $menuHTML .= '</ul>
                                    </div>';
                                }
                       
                            }
                            else{
                                    $menuHTML .= '<div class="submenu-content">
                                    <ul class="submenu-content__list">';
                                    
                                        $menuHTML .= '
                                        <li class="submenu-content__list-item">
                                            <a href="https://www.helloworldlabel.ae/" class="submenu-content__link">
                                                <div class="submenu-content__link-img">
                                                   <img src="' . $siteURL . 'images/pages/dubai_adresse.webp" alt="dubai">
                                                </div>
                                                <div class="submenu-content__link-title">
                                                    Agence Marketing Digital à Dubai
                                                </div>
                                                <p>
                                                Hello World Label est une agence de marketing digital à Dubai qui accompagne les PME, startups et grandes entreprises dans le développement de leur visibilité en ligne. Nous proposons des stratégies digitales adaptées au marché local afin d’assurer une croissance durable et mesurable.
                                                </p>
                                            </a>
                                        </li>';
                                    
                                    $menuHTML .= '</ul>
                                    </div>';
                                }
                            // test service
                            
                        $menuHTML .= '</li>';
                    }
 
                            $menuHTML .= '</ul>
                        </div>
                    </div>';
                        }

                        $menuHTML .= '</li>';
                    }
                }
   
        $menuHTML .= '</ul>
                    </nav>';

        echo $menuHTML;
    }
}

?>