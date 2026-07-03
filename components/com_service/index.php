<?php

@$task = $_GET['task'];
switch ($task)
{
    /*case "showDetails":
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            $page = getComponent("com_service");
			$id = $_GET["id"];
            $service = service::find($id, $_SESSION["lang"]);
			$packs = pack::findAll($_SESSION["lang"], true, true, $id);
			// Videos to discover
			$pageVideo = getComponent("com_video");
			$videos_to_discover = video::findAllRand($_SESSION["lang"],true,"5",true,14);
			if($service->hasChildren(true)){
				$childServices = $service->getChildren($_SESSION["lang"],true,true);
				include_once("components/com_service/views/service/detail.php");
			}
			else{
				// Liste des partenaires
				$partnersId = partner::findAll(true);
				$partners = array();
				foreach ($partnersId as $id_partner) {
					$p = new partner($id_partner,$db,$_SESSION['lang']);
					array_push($partners, $p);
				}
				include_once("components/com_service/views/service/subservice.php");
			}
			
        }
        break;*/
        case "showDetails":
            if(isset($_GET["slug"]) && !empty($_GET["slug"])){
                $page = getComponent("com_service");
                $pageContact = getComponent("com_contact");
				$pageReference = getComponent("com_reference");
    			$slug = $_GET["slug"];
    			$services = service::findAll($_SESSION["lang"],true,true,true);
    			
    		    $parentIds = ['18', '17', '1', '107'];
                $services_tags = [];
                
                foreach ($parentIds as $parentId) {
                    $service = service::find($parentId, $_SESSION["lang"]);
                
                    if ($service) {
                        $childServices = $service->getChildren($_SESSION["lang"], true, true);
                
                        if (!empty($childServices)) {
                            $services_tags = array_merge($services_tags, $childServices);
                        }
                    }
                }

                $service = service::findBySlug($slug, $_SESSION["lang"]);
                
                // $faqs = faq::findAll($_SESSION["lang"], true, $service->getId(), false);
                $faqs = faq::findAll($_SESSION["lang"], true, $service->getId(), '0,3');
		        $faqs2 = faq::findAll($_SESSION["lang"], true, $service->getId(), '3,6');
                
                // packages
    			$packs = pack::findAll($_SESSION["lang"], true, true, $service->getId());
    // 			var_dump($packs);
    // 			die();
    // 			if($service->getParent()->getId() != 0) $packs = pack::findAll($_SESSION["lang"], true, true, $service->getParent()->getId());
    			
    			// Videos to discover
    			$pageVideo = getComponent("com_video");
    			$videos_to_discover = video::findAllRand($_SESSION["lang"],true,"5",true,14);
    			
    			$references = reference::findAllRand($_SESSION["lang"],true,"5",true);
    			
    			if($service->hasChildren(true)){
    				$childServices = $service->getChildren($_SESSION["lang"],true,true);
    			}else{
    			    if($service->getParent()->getId() != 0){
    			        $childServices = $service->getParent()->getChildren($_SESSION["lang"],true,true);
    			    }
    			}
    			
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
				
				// Liste des outils
				$toolsId = tool::findAll(true);
				$tools = array();
				foreach ($toolsId as $id_tool) {
					$t = new tool($id_tool,$db,$_SESSION['lang']);
					array_push($tools, $t);
				}
				
				// Liste des témoignages
        		$testimonials = temoignage::findAll($_SESSION['lang'], true);
        		
        		// secteurs
    			$secteurs = secteur::findAll($_SESSION["lang"], true, $service->getId());
    			
                $mr_brico = reference::find(27 , $_SESSION['lang'] );
				$ljs = reference::find(55 , $_SESSION['lang'] );
				switch($service->getId()){
					case 17 : include_once("components/com_service/views/service/ia.php"); break;
					case 1 : include_once("components/com_service/views/service/saas.php"); break;
					case 18 : include_once("components/com_service/views/service/brand.php"); break;
					case 107 : include_once("components/com_service/views/service/web-mobile.php"); break;
					default : include_once("components/com_service/views/service/subservice.php");
				}
			
    			
            }
        break;
	case "thankYou":
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            $page = getComponent("com_service");
			$id = $_GET["id"];
            $service = service::find($id, $_SESSION["lang"]);
			include_once("components/com_service/views/service/thankyou.php");
        }
        break;	
    default :
        $page = getComponent("com_service");
        $services = service::findAll($_SESSION["lang"],true,true,true);
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
        $references = reference::findAllRand($_SESSION["lang"],true,"5",true);
        $testimonials = temoignage::findAll($_SESSION['lang'], true);
        $pageContact = getComponent("com_contact");
        $pageReference = getComponent("com_reference");
        include_once("components/com_service/views/service/list.php");
        
        break;
}