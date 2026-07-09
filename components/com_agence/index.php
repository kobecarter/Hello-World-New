<?php

@$task = $_GET['task'];
switch ($task)
{
    case "dubai":
        global $db;
        $page = new page(40, $db, $_SESSION["lang"]);
        $page_services = getComponent('com_service');
     
        $services = service::findAll($_SESSION["lang"],true,true,true);
    
        $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
        $ids = [27, 31, 4, 10, 41];
        $references = reference::findAllByIds($_SESSION["lang"],true,"5",true, $ids);
        $pageReference = getComponent("com_reference");
        // Lien des agences par ville
    		$marrakech = new page(33, $db, $_SESSION['lang']);
    		$casa = new page(32, $db, $_SESSION['lang']);
    		$rabat = new page(37, $db, $_SESSION['lang']);
    		$tanger = new page(38, $db, $_SESSION['lang']);
    		$agadir = new page(39, $db, $_SESSION['lang']);
    		$fes = new page(40, $db, $_SESSION['lang']);
        $pageContact = getComponent('com_contact');
        include_once("components/com_agence/views/page/dubai.php");
        break;
        case "fes":
        global $db;
        $page = new page(40, $db, $_SESSION["lang"]);
        $page_services = getComponent('com_service');
     
        $services = service::findAll($_SESSION["lang"],true,true,true);
    
        $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
        $ids = [27, 31, 4, 10, 41];
        $references = reference::findAllByIds($_SESSION["lang"],true,"5",true, $ids);
        $pageReference = getComponent("com_reference");
        // Lien des agences par ville
    		$marrakech = new page(33, $db, $_SESSION['lang']);
    		$casa = new page(32, $db, $_SESSION['lang']);
    		$rabat = new page(37, $db, $_SESSION['lang']);
    		$tanger = new page(38, $db, $_SESSION['lang']);
    		$agadir = new page(39, $db, $_SESSION['lang']);
    		$fes = new page(40, $db, $_SESSION['lang']);
        $pageContact = getComponent('com_contact');
        include_once("components/com_agence/views/page/fes.php");
        break;
        case "agadir":
        global $db;
        $page = new page(39, $db, $_SESSION["lang"]);
        $page_services = getComponent('com_service');
     
        $services = service::findAll($_SESSION["lang"],true,true,true);
    
        $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
        $ids = [27, 31, 4, 10, 41];
        $references = reference::findAllByIds($_SESSION["lang"],true,"5",true, $ids);
        $pageReference = getComponent("com_reference");
        // Lien des agences par ville
    		$marrakech = new page(33, $db, $_SESSION['lang']);
    		$casa = new page(32, $db, $_SESSION['lang']);
    		$rabat = new page(37, $db, $_SESSION['lang']);
    		$tanger = new page(38, $db, $_SESSION['lang']);
    		$agadir = new page(39, $db, $_SESSION['lang']);
    		$fes = new page(40, $db, $_SESSION['lang']);
        $pageContact = getComponent('com_contact');
        include_once("components/com_agence/views/page/agadir.php");
        break;
    case "casa":
        global $db;
        $page = new page(32, $db, $_SESSION["lang"]);
        $page_services = getComponent('com_service');
     
        $services = service::findAll($_SESSION["lang"],true,true,true);
    
        $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
        $ids = [27, 31, 4, 10, 41];
        $references = reference::findAllByIds($_SESSION["lang"],true,"5",true, $ids);
        $pageReference = getComponent("com_reference");
        // Lien des agences par ville
    		$marrakech = new page(33, $db, $_SESSION['lang']);
    		$casa = new page(32, $db, $_SESSION['lang']);
    		$rabat = new page(37, $db, $_SESSION['lang']);
    		$tanger = new page(38, $db, $_SESSION['lang']);
    		$agadir = new page(39, $db, $_SESSION['lang']);
    		$fes = new page(40, $db, $_SESSION['lang']);
        $pageContact = getComponent('com_contact');
        include_once("components/com_agence/views/page/casa.php");
        break;
        case "rabat":
        global $db;
        $page = new page(37, $db, $_SESSION["lang"]);
        $page_services = getComponent('com_service');
     
        $services = service::findAll($_SESSION["lang"],true,true,true);
    
        $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
        $ids = [27, 31, 4, 10, 41];
        $references = reference::findAllByIds($_SESSION["lang"],true,"5",true, $ids);
        // Lien des agences par ville
    		$marrakech = new page(33, $db, $_SESSION['lang']);
    		$casa = new page(32, $db, $_SESSION['lang']);
    		$rabat = new page(37, $db, $_SESSION['lang']);
    		$tanger = new page(38, $db, $_SESSION['lang']);
    		$agadir = new page(39, $db, $_SESSION['lang']);
    		$fes = new page(40, $db, $_SESSION['lang']);
        $pageContact = getComponent('com_contact');
            $pageReference = getComponent("com_reference");
        include_once("components/com_agence/views/page/rabat.php");
        break;
        case "tanger":
        global $db;
        $page = new page(38, $db, $_SESSION["lang"]);
        $page_services = getComponent('com_service');
     
        $services = service::findAll($_SESSION["lang"],true,true,true);
    
        $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
        $ids = [27, 31, 4, 10, 41];
        $references = reference::findAllByIds($_SESSION["lang"],true,"5",true, $ids);
        $pageReference = getComponent("com_reference");
        // Lien des agences par ville
    		$marrakech = new page(33, $db, $_SESSION['lang']);
    		$casa = new page(32, $db, $_SESSION['lang']);
    		$rabat = new page(37, $db, $_SESSION['lang']);
    		$tanger = new page(38, $db, $_SESSION['lang']);
    		$agadir = new page(39, $db, $_SESSION['lang']);
    		$fes = new page(40, $db, $_SESSION['lang']);
        $pageContact = getComponent('com_contact');
        include_once("components/com_agence/views/page/tanger.php");
        break;
        
        case "marrakech":
        global $db;
        $page = new page(33, $db, $_SESSION["lang"]);
        $page_services = getComponent('com_service');
     
        $services = service::findAll($_SESSION["lang"],true,true,true);
    
        $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
		
        $references = reference::findAll($_SESSION["lang"],true,"5",true);
        $pageReference = getComponent("com_reference");
        
        $pageContact = getComponent('com_contact');
        include_once("components/com_agence/views/page/marrakech.php");
        break;
        
            case "uk":
            global $db;
            $page = new page(34, $db, $_SESSION["lang"]);
            $page_services = getComponent('com_service');
         
            $services = service::findAll($_SESSION["lang"],true,true,true);
        
            $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
            $references = reference::findAll($_SESSION["lang"],true,"5",true);
            $pageReference = getComponent("com_reference");
            // Lien des agences par ville
    		$marrakech = new page(33, $db, $_SESSION['lang']);
    		$casa = new page(32, $db, $_SESSION['lang']);
    		$rabat = new page(37, $db, $_SESSION['lang']);
    		$tanger = new page(38, $db, $_SESSION['lang']);
    		$agadir = new page(39, $db, $_SESSION['lang']);
    		$fes = new page(40, $db, $_SESSION['lang']);
            $pageContact = getComponent('com_contact');
            include_once("components/com_agence/views/page/uk.php");
            break;
            case "mstoune":
            global $db;
            $page = new page(35, $db, $_SESSION["lang"]);
            $page_services = getComponent('com_service');
         
            $services = service::findAll($_SESSION["lang"],true,true,true);
        
            $testimonials = temoignage::findAll($_SESSION["lang"],true);
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
            $references = reference::findAll($_SESSION["lang"],true,"5",true);
            $pageReference = getComponent("com_reference");
          $pageContact = getComponent('com_contact');
            include_once("components/com_agence/views/page/mstoune.php");
            break;
         
		$marrakech = new page(33, $db, $_SESSION['lang']);
		$casa = new page(32, $db, $_SESSION['lang']);
		$rabat = new page(37, $db, $_SESSION['lang']);
		$tanger = new page(38, $db, $_SESSION['lang']);
		$agadir = new page(39, $db, $_SESSION['lang']);
		$fes = new page(40, $db, $_SESSION['lang']);
        	$services = service::findAll($_SESSION['lang'], true, false, true);
    default :
     
            $page = getComponent('com_agence');
            $page_services = getComponent('com_service');
            $testimonials = temoignage::findAll($_SESSION['lang'], true);
            $pageContact = getComponent("com_contact");
	        $pageReference = getComponent("com_reference");
	        	$marrakech = new page(33, $db, $_SESSION['lang']);
    		$casa = new page(32, $db, $_SESSION['lang']);
    		$rabat = new page(37, $db, $_SESSION['lang']);
    		$tanger = new page(38, $db, $_SESSION['lang']);
    		$agadir = new page(39, $db, $_SESSION['lang']);
    		$fes = new page(40, $db, $_SESSION['lang']);
            include_once("components/com_agence/views/page/list.php");
        break;
}