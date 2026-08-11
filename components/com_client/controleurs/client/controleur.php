<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case "login":
            login($_POST);
            break;
		case "loginApi":
			loginApi($_POST);
			break;
		case "googleLoginApi":
			googleLoginApi($_POST);
			break;
		case "facebookLoginApi":
			facebookLoginApi($_POST);
			break;
		case "verifyEmailApi":
			verifyEmailApi($_POST);
			break;
		case "setNewPasswordApi":
			setNewPasswordApi($_POST);
			break;
		case "logoutApi":
			logoutApi();
			break;
		case "createReclamationApi":
			createReclamationApi($_POST);
			break;
		case "createTemoignageApi":
			createTemoignageApi($_POST);
			break;
		case "updateReclamationApi":
			updateReclamationApi($_POST);
			break;
		case "updateProfileApi":
			updateProfileApi($_POST);
			break;
		case "pdfInvoiceApi":
			pdfInvoiceApi($_GET);
			break;
		case "pdfQuoteApi":
			pdfQuoteApi($_GET);
			break;
    }
}
/* ----------------------------------------- login ----------------------------------------- */
function login($data)
{
	require_once ("../../../includes/traduction.php");
	global $db, $siteURL;
	if (isset($data['login']) && isset($data['mdp']) && !empty($data['login'])&& !empty($data['mdp']) ){

		$login = $data['login']; 
		$mdp = $data['mdp'];
		
		$client = client::doLogin($login,$mdp);
		if($client == null)
			echo 2;
		else{
			$_SESSION['client'] = $client;
			echo 1;
		}
			
	}
	else
		echo 0;
}

// API

// Login
function loginApi($data)
{
	echo client::loginApi($data);
}

// Connexion sociale
function googleLoginApi($data)
{
	echo client::googleLoginApi($data);
}

function facebookLoginApi($data)
{
	echo client::facebookLoginApi($data);
}

function verifyEmailApi($data)
{
	echo client::verifyEmailApi($data);
}

function setNewPasswordApi($data)
{
	echo client::setNewPasswordApi($data);
}

function logoutApi(){
	unset($_SESSION['client']);
	echo 1;
}

function createReclamationApi($data){
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$data['id_client'] = $info->info->id;
	// Facturation : rattacher la facture concernée en tête du message (visible côté CRM).
	if (isset($data['department']) && $data['department'] === 'Billing'
	    && isset($data['facture_ref']) && trim($data['facture_ref']) !== '') {
		$ref = trim($data['facture_ref']);
		$data['message'] = "Facture concernée : " . $ref . "\n\n" . (isset($data['message']) ? $data['message'] : '');
	}
	echo client::createReclamationApi($data);
}

// Témoignage client : alimente le système de témoignages du SITE
// (hw_temoignage + hw_details_temoignage), en active=0 (à valider par l'admin
// dans la gestion des témoignages). La note + le lien sont conservés dans
// hw_avis_client. Un seul témoignage par client (mise à jour, pas de doublon).
function createTemoignageApi($data){
	global $db;
	if (!isset($_SESSION['client']) || empty($_SESSION['client'])) {
		echo json_encode(array("icon"=>"error","message"=>"Not authenticated","code"=>"auth"));
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idClient = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int)$info->info->id : 0;
	if ($idClient <= 0) {
		echo json_encode(array("icon"=>"error","message"=>"Not authenticated","code"=>"auth"));
		return;
	}
	$note = isset($data['note']) ? (int)$data['note'] : 0;
	$message = isset($data['message']) ? trim($data['message']) : '';
	if ($note < 1 || $note > 5 || $message === '') {
		echo json_encode(array("icon"=>"warning","message"=>"Missing fields","code"=>"missing"));
		return;
	}
	// Infos client (capturées à la connexion) : nom+prénom en "nom", raison sociale en "fonction".
	$prenom = ''; $nom = ''; $rs = ''; $email = '';
	if (isset($_SESSION['client_info']) && is_object($_SESSION['client_info'])) {
		$ci = $_SESSION['client_info'];
		$prenom = isset($ci->prenom) ? trim($ci->prenom) : '';
		$nom    = isset($ci->nom) ? trim($ci->nom) : '';
		$rs     = isset($ci->raison_social) ? trim($ci->raison_social) : '';
		$email  = isset($ci->email) ? $ci->email : '';
	}
	if ($email === '' && is_object($info) && isset($info->info->email)) { $email = $info->info->email; }
	$nomAffiche = trim($prenom . ' ' . $nom);
	if ($nomAffiche === '') { $nomAffiche = $rs !== '' ? $rs : 'Client'; }
	$fonction = $rs; // la raison sociale s'affiche sous le nom, comme les autres témoignages
	$today = date("Y-m-d");
	$now   = date("Y-m-d H:i:s");
	// Langues à alimenter (même texte ; l'admin pourra traduire ensuite).
	$curLang = isset($_SESSION['lang']) && $_SESSION['lang'] !== '' ? $_SESSION['lang'] : 'fr';
	$langs = array_values(array_unique(array_merge(array('fr', 'en'), array($curLang))));

	// Un seul témoignage par client : on lie via hw_avis_client.id_temoignage.
	$rows = $db->queryS(sprintf("SELECT id, id_temoignage FROM " . __prefixe_db__ . "avis_client WHERE id_client = %s LIMIT 1", GetSQLValueString($idClient, "int")));
	$existing = (is_array($rows) && count($rows) > 0) ? $rows[0] : null;

	if ($existing && !empty($existing['id_temoignage'])) {
		// Mise à jour : on repasse le témoignage en attente de validation.
		$idT = (int)$existing['id_temoignage'];
		$db->query(sprintf("UPDATE " . __prefixe_db__ . "temoignage SET active = 0, last_edit = %s WHERE id = %s",
			GetSQLValueString($today, "text"), GetSQLValueString($idT, "int")));
		foreach ($langs as $l) {
			$ex = $db->queryS(sprintf("SELECT id FROM " . __prefixe_db__ . "details_temoignage WHERE id_temoignage = %s AND langue = %s",
				GetSQLValueString($idT, "int"), GetSQLValueString($l, "text")));
			if (is_array($ex) && count($ex) > 0) {
				$db->query(sprintf("UPDATE " . __prefixe_db__ . "details_temoignage SET nom = %s, fonction = %s, email = %s, temoignage = %s WHERE id_temoignage = %s AND langue = %s",
					GetSQLValueString($nomAffiche, "text"), GetSQLValueString($fonction, "text"), GetSQLValueString($email, "text"), GetSQLValueString($message, "text"), GetSQLValueString($idT, "int"), GetSQLValueString($l, "text")));
			} else {
				$db->query(sprintf("INSERT INTO " . __prefixe_db__ . "details_temoignage (id_temoignage, nom, fonction, email, sujet, temoignage, langue) VALUES (%s, %s, %s, %s, NULL, %s, %s)",
					GetSQLValueString($idT, "int"), GetSQLValueString($nomAffiche, "text"), GetSQLValueString($fonction, "text"), GetSQLValueString($email, "text"), GetSQLValueString($message, "text"), GetSQLValueString($l, "text")));
			}
		}
		$db->query(sprintf("UPDATE " . __prefixe_db__ . "avis_client SET note = %s, message = %s, client_nom = %s, client_email = %s, statut = 0, last_edit = %s WHERE id = %s",
			GetSQLValueString($note, "int"), GetSQLValueString($message, "text"), GetSQLValueString($nomAffiche, "text"), GetSQLValueString($email, "text"), GetSQLValueString($now, "text"), GetSQLValueString($existing['id'], "int")));
	} else {
		// Création : nouveau témoignage (active=0), détails par langue.
		$db->query(sprintf("INSERT INTO " . __prefixe_db__ . "temoignage (photo, active, global, ordre, date_add, last_edit) VALUES (NULL, 0, 0, NULL, %s, %s)",
			GetSQLValueString($today, "text"), GetSQLValueString($today, "text")));
		$idT = (int)$db->last_id();
		foreach ($langs as $l) {
			$db->query(sprintf("INSERT INTO " . __prefixe_db__ . "details_temoignage (id_temoignage, nom, fonction, email, sujet, temoignage, langue) VALUES (%s, %s, %s, %s, NULL, %s, %s)",
				GetSQLValueString($idT, "int"), GetSQLValueString($nomAffiche, "text"), GetSQLValueString($fonction, "text"), GetSQLValueString($email, "text"), GetSQLValueString($message, "text"), GetSQLValueString($l, "text")));
		}
		if ($existing) {
			$db->query(sprintf("UPDATE " . __prefixe_db__ . "avis_client SET note = %s, message = %s, client_nom = %s, client_email = %s, statut = 0, id_temoignage = %s, last_edit = %s WHERE id = %s",
				GetSQLValueString($note, "int"), GetSQLValueString($message, "text"), GetSQLValueString($nomAffiche, "text"), GetSQLValueString($email, "text"), GetSQLValueString($idT, "int"), GetSQLValueString($now, "text"), GetSQLValueString($existing['id'], "int")));
		} else {
			$db->query(sprintf("INSERT INTO " . __prefixe_db__ . "avis_client (id_client, id_temoignage, client_nom, client_email, note, message, statut, date_add) VALUES (%s, %s, %s, %s, %s, %s, 0, %s)",
				GetSQLValueString($idClient, "int"), GetSQLValueString($idT, "int"), GetSQLValueString($nomAffiche, "text"), GetSQLValueString($email, "text"), GetSQLValueString($note, "int"), GetSQLValueString($message, "text"), GetSQLValueString($now, "text")));
		}
	}
	echo json_encode(array("icon"=>"success","message"=>"Merci pour votre avis !","code"=>"ok"));
}

function updateReclamationApi($data){
	// L'appartenance est vérifiée côté CRM via le token.
	echo client::updateReclamationApi($data);
}

function updateProfileApi($data){
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$data['id_client'] = $info->info->id;
	echo client::updateProfileApi($data);
}

function pdfInvoiceApi($data)
{
	echo client::pdfInvoiceApi($data['id']);
}

function pdfQuoteApi($data)
{
	echo client::pdfQuoteApi($data['id']);
}




