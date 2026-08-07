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

			// The client-space data is fetched from the remote API. If the token
			// lookup fails (server down, rate-limit, invalid/expired token), $info
			// is not a usable object. Guard every downstream access so the
			// dashboard degrades gracefully instead of emitting PHP notices/warnings.
			$clientId = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id))
				? $info->info->id : null;

			$factures     = $clientId ? client::getInvoicesByClientApi($clientId)     : null;
			$devis        = $clientId ? client::getQuotesByClientApi($clientId)       : null;
			$reclamations = $clientId ? client::getReclamationsByClientApi($clientId) : null;
			$rapples      = $clientId ? client::getRapplesByClientApi($clientId)      : null;
			// Prefer the full client record captured at login (findClientByIdApi
			// can return an empty object on the API), fall back to the API call.
			if (!empty($_SESSION['client_info']) && is_object($_SESSION['client_info'])) {
				$userData = $_SESSION['client_info'];
			} else {
				$userData = $clientId ? client::getClientByIdApi($clientId) : null;
			}

			// Normalize to types the view can safely count()/foreach over.
			$factures     = (is_array($factures) || is_object($factures)) ? $factures : array();
			$devis        = (is_array($devis) || is_object($devis)) ? $devis : array();
			$reclamations = (is_array($reclamations) || is_object($reclamations)) ? $reclamations : array();
			$rapples      = (is_array($rapples) || is_object($rapples)) ? $rapples : array();

			// Guarantee $user is an object exposing every field the view reads.
			if (is_object($userData)) {
				$user = $userData;
				foreach (array("nom", "prenom", "email", "tel", "raison_social") as $f) {
					if (!isset($user->$f)) { $user->$f = ""; }
				}
			} else {
				$user = (object) array("nom" => "", "prenom" => "", "email" => "", "tel" => "", "raison_social" => "");
			}

			// Technologies list for the "trust" section (same source as the homepage).
			$toolsId = tool::findAll(true);
			$tools = array();
			foreach ($toolsId as $id_tool) {
				$tools[] = new tool($id_tool, $db, $_SESSION['lang']);
			}
        	include_once("components/com_client/views/client/facture.php");
		}
		else
			include_once("components/com_client/views/client/login.php");
        break;
}