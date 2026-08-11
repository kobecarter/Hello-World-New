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
		case "createParrainageApi":
			createParrainageApi($_POST);
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

// Parrainage : le parrain (client connecté) recommande un prospect (filleul).
// Stocké dans la base du SITE (hw_parrainage), statut 0 = en attente. Le suivi
// et l'attribution des récompenses se font côté agence (manuel).
function createParrainageApi($data){
	global $db;
	if (!isset($_SESSION['client']) || empty($_SESSION['client'])) {
		echo json_encode(array("icon"=>"error","message"=>"Not authenticated","code"=>"auth"));
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idParrain = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int)$info->info->id : 0;
	if ($idParrain <= 0) {
		echo json_encode(array("icon"=>"error","message"=>"Not authenticated","code"=>"auth"));
		return;
	}
	$fNom   = isset($data['filleul_nom']) ? trim($data['filleul_nom']) : '';
	$fEmail = isset($data['filleul_email']) ? trim($data['filleul_email']) : '';
	if ($fNom === '' || $fEmail === '' || !filter_var($fEmail, FILTER_VALIDATE_EMAIL)) {
		echo json_encode(array("icon"=>"warning","message"=>"Missing or invalid fields","code"=>"missing"));
		return;
	}
	$fEnt = isset($data['filleul_entreprise']) ? trim($data['filleul_entreprise']) : '';
	$fTel = isset($data['filleul_tel']) ? trim($data['filleul_tel']) : '';
	$msg  = isset($data['message']) ? trim($data['message']) : '';
	// Nom / email du parrain (infos capturées à la connexion).
	$pNom = ''; $pEmail = '';
	if (isset($_SESSION['client_info']) && is_object($_SESSION['client_info'])) {
		$ci = $_SESSION['client_info'];
		$rs = isset($ci->raison_social) ? trim($ci->raison_social) : '';
		$full = trim((isset($ci->prenom) ? $ci->prenom : '') . ' ' . (isset($ci->nom) ? $ci->nom : ''));
		$pNom = $rs !== '' ? $rs : $full;
		$pEmail = isset($ci->email) ? $ci->email : '';
	}
	if ($pEmail === '' && is_object($info) && isset($info->info->email)) { $pEmail = $info->info->email; }
	// Anti-doublon : même filleul déjà parrainé par ce parrain.
	$dup = $db->queryS(sprintf("SELECT id FROM " . __prefixe_db__ . "parrainage WHERE id_parrain = %s AND filleul_email = %s LIMIT 1",
		GetSQLValueString($idParrain, "int"), GetSQLValueString($fEmail, "text")));
	if (is_array($dup) && count($dup) > 0) {
		echo json_encode(array("icon"=>"warning","message"=>"Already referred","code"=>"dup"));
		return;
	}
	$now = date("Y-m-d H:i:s");
	$db->query(sprintf("INSERT INTO " . __prefixe_db__ . "parrainage (id_parrain, parrain_nom, parrain_email, filleul_nom, filleul_entreprise, filleul_email, filleul_tel, message, statut, recompense_donnee, date_add) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, 0, 0, %s)",
		GetSQLValueString($idParrain, "int"), GetSQLValueString($pNom, "text"), GetSQLValueString($pEmail, "text"),
		GetSQLValueString($fNom, "text"), GetSQLValueString($fEnt, "text"), GetSQLValueString($fEmail, "text"),
		GetSQLValueString($fTel, "text"), GetSQLValueString($msg, "text"), GetSQLValueString($now, "text")));
	// Email d'invitation au filleul (best-effort : n'interrompt jamais la réponse).
	sendParrainageInvitationEmail($fEmail, $fNom, $pNom);
	echo json_encode(array("icon"=>"success","message"=>"Merci ! Nous contactons votre filleul rapidement.","code"=>"ok"));
}

// Envoie au filleul un email d'invitation (mentionne le parrain + offre de bienvenue).
// Même mécanisme PHPMailer que le formulaire de contact (fonctionne en production).
function sendParrainageInvitationEmail($fEmail, $fNom, $pNom) {
	global $db, $siteURL, $emailUsername;
	if (empty($fEmail)) { return; }
	try {
		require_once __DIR__ . '/../../../../vendor/autoload.php';
		$fromEmail = ''; $fromName = 'Hello World Agency';
		try { $config = new config($db); $fromEmail = $config->getEmail(); $fromName = $config->getNom(); } catch (\Throwable $e) {}
		if (empty($fromEmail)) { $fromEmail = isset($emailUsername) && $emailUsername !== '' ? $emailUsername : 'contact@helloworld-agency.com'; }
		$parrainRaw = ($pNom !== '' ? $pNom : 'Un client');
		$parrain = htmlspecialchars($parrainRaw);
		$fil = htmlspecialchars($fNom);
		$logo = $siteURL . 'images/logo_hello_world.png';
		$message = '<html><body style="font-family:Arial,sans-serif;color:#1a1613;background:#f6f6f6;padding:20px">'
			. '<table width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;margin:0 auto;background:#fff;border-radius:12px;overflow:hidden">'
			. '<tr><td style="text-align:center;padding:24px"><img src="' . $logo . '" alt="Hello World Agency" height="54"></td></tr>'
			. '<tr><td style="padding:0 28px 26px">'
			. '<h2 style="color:#680262;font-weight:normal">Vous &ecirc;tes recommand&eacute; par ' . $parrain . ' &#127873;</h2>'
			. '<p>Bonjour ' . $fil . ',</p>'
			. '<p><strong>' . $parrain . '</strong> vous recommande <strong>Hello World Agency</strong> pour vos projets web, marketing et digital.</p>'
			. '<p>En tant que filleul, vous b&eacute;n&eacute;ficiez d&#39;une <strong>offre de bienvenue</strong> et d&#39;un <strong>mini-audit offert</strong> d&egrave;s votre premier contact.</p>'
			. '<p style="text-align:center;margin:28px 0"><a href="' . $siteURL . '" style="background:#09A1BE;color:#fff;padding:12px 28px;border-radius:30px;text-decoration:none;font-weight:bold">D&eacute;couvrir Hello World</a></p>'
			. '<p style="color:#6b6460;font-size:12px">Vous recevez cet email car ' . $parrain . ' vous a recommand&eacute; aupr&egrave;s de Hello World Agency.</p>'
			. '</td></tr></table></body></html>';
		$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
		$mail->Host = 'helloworld-agency.com';
		$mail->Username = $fromEmail;
		$mail->setFrom($fromEmail, $fromName);
		$mail->addAddress($fEmail, $fNom !== '' ? $fNom : $fEmail);
		$mail->addReplyTo($fromEmail, $fromName);
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Encoding = 'base64';
		$mail->Subject = $parrainRaw . ' vous recommande Hello World Agency';
		$mail->AltBody = $parrainRaw . ' vous recommande Hello World Agency. Offre de bienvenue + mini-audit offert.';
		$mail->Body = $message;
		$mail->send();
	} catch (\Throwable $e) {
		error_log('Parrainage invitation email failed: ' . $e->getMessage());
	}
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




