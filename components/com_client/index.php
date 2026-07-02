<?php

@$task = $_GET['task'];
switch ($task)
{
    case "showDetails":
        if(isset($_GET["id"]) && !empty($_GET["id"])){
						
			$id = $_GET["id"];
            $post = blog::find($id, $_SESSION["lang"]);
			
			$id_categorie = $post->getCategorie()->getId() != "" ? $post->getCategorie()->getId() : 1;
			$page = getComponent("com_blog&cat=$id_categorie");
		
            include_once("components/com_blog/views/blog/detail.php");
        }
        break;
	case "enableAccount":
		$page = getComponent("com_client&task=enableAccount");
		$pageAccount = getComponent("com_client");
		if(isset($_GET['code']) && !empty($_GET['code'])){
			$code = str_replace('42xDdZs3s5','',$_GET['code']);
			$code = str_replace('jwX4jOGhah','',$code);
			$id_client = intval(base64_decode($code));
			//echo $id_client;
			$client = client::find($id_client);
		}
		include_once("components/com_client/views/client/enable_account.php");
        break;
	case "passwordRecovery":
		$page= getComponent("com_client&task=passwordRecovery");
		$page_client_space = getComponent("com_client");
		include_once("components/com_client/views/client/password_recovery.php");
		break;
	case "createNewPassword":
		if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['token']) && !empty($_GET['token']) ){
			$page= getComponent("com_client&task=createNewPassword");
			$page_password_recovery= getComponent("com_client&task=passwordRecovery");
			include_once("components/com_client/views/client/new_password.php");
		}
		break;
    default :
        $page = getComponent("com_client");
		$page_password_recovery = getComponent("com_client&task=passwordRecovery");
		if(isset($_SESSION['client'])){
			$page = getComponent("com_client&task=facture");
			$info = client::getInfoFromTokenApi($_SESSION['client']);
			$factures = client::getInvoicesByClientApi($info->info->id);
			$devis = client::getQuotesByClientApi($info->info->id);
			
			var_dump($devis);
			$reclamations = client::getReclamationsByClientApi($info->info->id);
			$rapples = client::getRapplesByClientApi($info->info->id);
			$user = client::getClientByIdApi($info->info->id);
			//var_dump($factures);
			$packs = produit::findAll($_SESSION["lang"],true,4);
			$tools = produit::findAll($_SESSION["lang"],true,3);

			$categorie_packs = $categorie = categorie_produit::find(4,$_SESSION["lang"]);
            $categorie_tools = $categorie = categorie_produit::find(3,$_SESSION["lang"]);
        	include_once("components/com_client/views/client/facture.php");
		}
		else
			include_once("components/com_client/views/client/login.php");
        break;
}