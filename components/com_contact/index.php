<?php

@$task = $_GET['task'];
switch ($task)
{
	case 'quote' : 
        if(isset($_GET["id"]) && !empty($_GET["id"])) {
            global $db;
            $id = intval($_GET["id"]);
            $page = new page($id, $db, $_SESSION["lang"]);
            $testimonials = temoignage::findAll($_SESSION['lang'], true);
            include_once("components/com_contact/views/devis/detail.php");
        }
        break;
    case 'confirmation' : 
        if(isset($_GET["id"]) && !empty($_GET["id"])) {
            global $db;
            $id = intval($_GET["id"]);
            $page = new page($id, $db, $_SESSION["lang"]);
            $pageContact = getComponent("com_contact");
            $pageRealisation = getComponent("com_reference");
            $pageFormation = getComponent("com_formation");
            $pageBlog = getComponent("com_blog&cat=1");
            $pageIA = service::find(17, $_SESSION["lang"]);
            include_once("components/com_contact/views/contact/confirmation.php");
        }
        break;    
    default :
        if(isset($_GET["id"]) && !empty($_GET["id"])) {
            global $db;
            $id = intval($_GET["id"]);
            $page = new page($id, $db, $_SESSION["lang"]);
            $pageDevis = getComponent("com_contact&task=quote");
            
            // Liste des outils
    		$toolsId = tool::findAll(true);
    		$tools = array();
    		foreach ($toolsId as $id_tool) {
    			$t = new tool($id_tool,$db,$_SESSION['lang']);
    			array_push($tools, $t);
    		}
    		
    		// Liste des témoignages
    		$testimonials = temoignage::findAll($_SESSION['lang'], true);
		
            include_once("components/com_contact/views/contact/detail.php");
        }
        break;
}