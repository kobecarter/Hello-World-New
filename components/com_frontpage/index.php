<?php

@$task = $_GET['task'];
switch ($task)
{
    default :
		
		$pageContact = getComponent("com_contact");
		
		$pageDigitalExpert = new page(30, $db, $_SESSION['lang']);
		
		// Services hero
		$serviceWebMobile = service::find(107, $_SESSION["lang"]);
		if(!$serviceWebMobile->getSlug()) $serviceWebMobile = service::find(107, langue::getDefaultLanguage());
		$serviceIA = service::find(17, $_SESSION["lang"]);
		if(!$serviceIA->getSlug()) $serviceIA = service::find(17, langue::getDefaultLanguage());
		$serviceSaaS = service::find(1, $_SESSION["lang"]);
		if(!$serviceSaaS->getSlug()) $serviceSaaS = service::find(1, langue::getDefaultLanguage());
		$serviceBrandMarketing = service::find(18, $_SESSION["lang"]);
		if(!$serviceBrandMarketing->getSlug()) $serviceBrandMarketing = service::find(18, langue::getDefaultLanguage());
		
		// vidéo digital expert
		$videos = video::findAllByCategorie($_SESSION['lang'],14,true,false);

		$pageAbout = new page(4, $db, $_SESSION['lang']);
		
		// Liste des services
		$services = service::findAll($_SESSION['lang'], true, false, true);

		// Liste des services IA
		$service = service::find(17, $_SESSION["lang"]);
		$servicesIA = $service->getChildren($_SESSION["lang"],true,true);
		$pageService = getComponent("com_service");
		
		// page référence
		$pageReference = getComponent("com_reference");
		
		$references = reference::findAll($_SESSION["lang"], true, 20, true);
		shuffle($references);
		
		// Liste des partenaires
		$partnersId = partner::findAll(true,'0,10');
		$partners = array();
		foreach ($partnersId as $id_partner) {
            $p = new partner($id_partner,$db,$_SESSION['lang']);
            array_push($partners, $p);
        }

		$partnersId2 = partner::findAll(true,'10,10');
		$partners2 = array();
		foreach ($partnersId2 as $id_partner) {
            $p = new partner($id_partner,$db,$_SESSION['lang']);
            array_push($partners2, $p);
        }

		// Lien des agences par ville
		$marrakech = new page(33, $db, $_SESSION['lang']);
		$casa = new page(32, $db, $_SESSION['lang']);
		$rabat = new page(37, $db, $_SESSION['lang']);
		$tanger = new page(38, $db, $_SESSION['lang']);
		$agadir = new page(39, $db, $_SESSION['lang']);
		$fes = new page(40, $db, $_SESSION['lang']);
        
        // Liste des outils
		$toolsId = tool::findAll(true);
		$tools = array();
		foreach ($toolsId as $id_tool) {
			$t = new tool($id_tool,$db,$_SESSION['lang']);
			array_push($tools, $t);
		}
		
		// Liste des témoignages
		$testimonials = temoignage::findAll($_SESSION['lang'], true);
		
		// blog
		$blogs = blog::findAll($_SESSION['lang'], true, 1, false, "0,7");
		if(empty($blogs)){
			// Pas encore d'articles traduits dans cette langue : on retombe sur la langue par défaut.
			$blogs = blog::findAll(langue::getDefaultLanguage(), true, 1, false, "0,7");
		}

		// sous service
		$sousServices = array();
		foreach($services as $service){
		    if($service->hasChildren(true)){
		        $childServices = $service->getChildren($_SESSION["lang"],true,true);
		        foreach($childServices as $childService){
		            array_push($sousServices, $childService);
		        }
			}
		}

		$faqs = faq::findAll($_SESSION["lang"], true, false, '0,6');
		$faqs2 = faq::findAll($_SESSION["lang"], true, false, '7,6');
		
        include_once("components/com_frontpage/views/frontpage/list.php");
        break;
}