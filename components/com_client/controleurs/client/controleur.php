<?php

// Points de fidélité : valeurs par action (ajustables ici, aucun autre
// endroit du code ne les redéfinit). L'attribution des récompenses (crédits
// Ads, remise, cartes-cadeaux, audit, formation) reste manuelle côté agence —
// ce compteur ne fait que donner à l'équipe un chiffre objectif à regarder.
// Doit rester tout en haut du fichier : le switch juste en dessous appelle
// des fonctions qui lisent ces constantes dès le premier include du fichier,
// avant que l'exécution n'atteigne un define() placé plus bas.
define('CL_POINTS_AVIS', 10);
define('CL_POINTS_PARRAINAGE', 15);
define('CL_POINTS_ATTESTATION', 20);
define('CL_POINTS_TELECHARGEMENT', 1);
define('CL_POINTS_SOCIAL', 3);
define('CL_POINTS_CONNEXION_REGULIERE', 1);
define('CL_LOGIN_BONUS_THRESHOLD', 4);

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
		case "pdfPaymentApi":
			pdfPaymentApi($_GET);
			break;
		case "findAttestationsApi":
			findAttestationsApi($_GET);
			break;
		case "signAttestationApi":
			signAttestationApi($_POST);
			break;
		case "pdfAttestationApi":
			pdfAttestationApi($_GET);
			break;
		case "findClientSocialsApi":
			findClientSocialsApi($_GET);
			break;
		case "createDemandeApi":
			createDemandeApi($_POST);
			break;
		case "followSocialApi":
			followSocialApi($_POST);
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
	$response = client::loginApi($data);
	clTrackLoginAndCheckMonthlyBonus($response);
	echo $response;
}

// Connexion sociale
function googleLoginApi($data)
{
	$response = client::googleLoginApi($data);
	clTrackLoginAndCheckMonthlyBonus($response);
	echo $response;
}

function facebookLoginApi($data)
{
	$response = client::facebookLoginApi($data);
	clTrackLoginAndCheckMonthlyBonus($response);
	echo $response;
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

// Le CRM (com_fidelite) est la source de vérité pour le total de points et
// les paliers de récompenses -- voir hw_crm/components/com_fidelite/classes/
// fidelite.php (addPoints() y débloque déjà les paliers automatiquement,
// pas besoin de le refaire ici). L'INSERT local sert uniquement de journal
// de déduplication pour clAwardDownloadPointOnce/clTrackLoginAndCheckMonthlyBonus
// ci-dessous (éviter d'attribuer deux fois le même gain) ; ce n'est plus la
// source du total affiché au client (voir $__pointsTotal dans facture.php).
function clAwardPoints($idClient, $points, $type, $libelle = null) {
	global $db;
	if ($idClient <= 0 || $points <= 0) return;
	$db->query(sprintf(
		"INSERT INTO " . __prefixe_db__ . "points_client (id_client, points, type, libelle, date_add) VALUES (%s, %s, %s, %s, %s)",
		GetSQLValueString($idClient, "int"), GetSQLValueString($points, "int"),
		GetSQLValueString($type, "text"), GetSQLValueString($libelle, "text"),
		GetSQLValueString(date("Y-m-d H:i:s"), "text")
	));
	client::addFideliteApi($idClient, $points, $type, $libelle);
}

// Comme clAwardPoints, mais n'attribue les points qu'une seule fois par
// document (facture/devis) : hw_points_client n'a pas de colonne de
// référence dédiée, donc l'unicité est vérifiée sur (id_client, type,
// libelle) — le libelle inclut l'id du document, ce qui suffit à empêcher
// un gain à chaque clic de téléchargement sur le même document.
function clAwardDownloadPointOnce($idClient, $type, $refId, $libelleBase) {
	global $db;
	if ($idClient <= 0 || $refId <= 0) return;
	$libelle = $libelleBase . ' #' . $refId;
	$existing = $db->queryS(sprintf(
		"SELECT id FROM " . __prefixe_db__ . "points_client WHERE id_client = %s AND type = %s AND libelle = %s LIMIT 1",
		GetSQLValueString($idClient, "int"), GetSQLValueString($type, "text"), GetSQLValueString($libelle, "text")
	));
	if (is_array($existing) && count($existing) > 0) return;
	clAwardPoints($idClient, CL_POINTS_TELECHARGEMENT, $type, $libelle);
}

// Connexion régulière : journalise chaque connexion réussie (hw_client_login_log)
// puis, si le client a au moins CL_LOGIN_BONUS_THRESHOLD jours de connexion
// DISTINCTS sur le mois calendaire en cours, attribue le bonus mensuel — une
// seule fois par mois (vérifié via le libelle, qui inclut l'année-mois, comme
// clAwardDownloadPointOnce). On compte des jours distincts plutôt que des
// connexions brutes pour éviter qu'une suite de déconnexions/reconnexions le
// même jour ne déclenche le seuil artificiellement.
function clTrackLoginAndCheckMonthlyBonus($loginResponse)
{
	global $db;
	$decoded = json_decode($loginResponse);
	if (!is_object($decoded) || !isset($decoded->icon) || $decoded->icon !== 'success' || !isset($decoded->client)) {
		return;
	}
	$c = $decoded->client;
	$idClient = isset($c->id) ? (int) $c->id : (isset($c->ID) ? (int) $c->ID : 0);
	if ($idClient <= 0) {
		return;
	}
	$now = date("Y-m-d H:i:s");
	$db->query(sprintf(
		"INSERT INTO " . __prefixe_db__ . "client_login_log (id_client, date_add) VALUES (%s, %s)",
		GetSQLValueString($idClient, "int"), GetSQLValueString($now, "text")
	));

	$monthKey = date("Y-m");
	$rows = $db->queryS(sprintf(
		"SELECT COUNT(DISTINCT DATE(date_add)) AS n FROM " . __prefixe_db__ . "client_login_log WHERE id_client = %s AND DATE_FORMAT(date_add, '%%Y-%%m') = %s",
		GetSQLValueString($idClient, "int"), GetSQLValueString($monthKey, "text")
	));
	$distinctDays = (is_array($rows) && count($rows) > 0) ? (int) $rows[0]['n'] : 0;
	if ($distinctDays < CL_LOGIN_BONUS_THRESHOLD) {
		return;
	}

	$libelle = 'Connexion régulière · ' . $monthKey;
	$existing = $db->queryS(sprintf(
		"SELECT id FROM " . __prefixe_db__ . "points_client WHERE id_client = %s AND type = 'connexion_reguliere' AND libelle = %s LIMIT 1",
		GetSQLValueString($idClient, "int"), GetSQLValueString($libelle, "text")
	));
	if (is_array($existing) && count($existing) > 0) {
		return;
	}
	clAwardPoints($idClient, CL_POINTS_CONNEXION_REGULIERE, 'connexion_reguliere', $libelle);
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
	if (!$existing) { clAwardPoints($idClient, CL_POINTS_AVIS, 'avis', 'Avis client déposé'); }
	echo json_encode(array("icon"=>"success","message"=>"Merci pour votre avis !","code"=>"ok"));
}

// Parrainage : le parrain (client connecté) recommande un prospect (filleul).
// Le CRM (crm_client_parrainage) est la source de vérité -- validation
// (champs, auto-parrainage, anti-doublon) et notification de l'agence par
// e-mail se font côté CRM (clientparrainage::createApi), pas ici. Le suivi et
// l'attribution des récompenses restent un geste manuel de l'agence.
function createParrainageApi($data){
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

	$response = client::createParrainageApi($idParrain, $pNom, $pEmail, $fNom, $fEnt, $fEmail, $fTel, $msg);
	$decoded = json_decode($response);
	if (is_object($decoded) && isset($decoded->icon) && $decoded->icon === 'success') {
		// Email d'invitation au filleul (best-effort : n'interrompt jamais la réponse).
		sendParrainageInvitationEmail($fEmail, $fNom, $pNom);
		clAwardPoints($idParrain, CL_POINTS_PARRAINAGE, 'parrainage', 'Recommandation de ' . $fNom);
	}
	echo $response;
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
	$response = client::pdfInvoiceApi($data['id']);
	clAwardDownloadPointFromPdfResponse($response, (int) $data['id'], 'facture_telechargement', 'Facture téléchargée');
	echo $response;
}

function pdfPaymentApi($data)
{
	if (!isset($_SESSION['client']) || empty($_SESSION['client'])) {
		echo json_encode(array("icon"=>"error","message"=>"Not authenticated","code"=>"auth"));
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idClient = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int) $info->info->id : 0;
	if ($idClient <= 0) {
		echo json_encode(array("icon"=>"error","message"=>"Not authenticated","code"=>"auth"));
		return;
	}
	$response = client::pdfPaymentApi($idClient, isset($data['id']) ? $data['id'] : 0);
	clAwardDownloadPointFromPdfResponse($response, (int) $data['id'], 'paiement_telechargement', 'Paiement téléchargé');
	echo $response;
}

function pdfQuoteApi($data)
{
	$response = client::pdfQuoteApi($data['id']);
	clAwardDownloadPointFromPdfResponse($response, (int) $data['id'], 'devis_telechargement', 'Devis téléchargé');
	echo $response;
}

// Attribue 1 point au client connecté quand un PDF (facture/devis) a bien
// été généré (icon=success dans la réponse), une seule fois par document —
// voir clAwardDownloadPointOnce(). Ne modifie jamais $response : appelée
// avant le echo qui renvoie exactement la même chose qu'avant côté client.
function clAwardDownloadPointFromPdfResponse($response, $refId, $type, $libelleBase)
{
	if (!isset($_SESSION['client']) || empty($_SESSION['client']) || $refId <= 0) {
		return;
	}
	$decoded = json_decode($response);
	if (!is_object($decoded) || !isset($decoded->icon) || $decoded->icon !== 'success') {
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idClient = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int) $info->info->id : 0;
	if ($idClient > 0) {
		clAwardDownloadPointOnce($idClient, $type, $refId, $libelleBase);
	}
}

function findAttestationsApi($data)
{
	if (!isset($_SESSION['client']) || empty($_SESSION['client'])) {
		echo json_encode(array());
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idClient = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int)$info->info->id : 0;
	if ($idClient <= 0) {
		echo json_encode(array());
		return;
	}
	echo client::getAttestationsByClientApi($idClient);
}

function signAttestationApi($data)
{
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
	$id = isset($data['id']) ? (int) $data['id'] : 0;
	$nom = isset($data['nom']) ? trim($data['nom']) : '';
	$response = client::signAttestationApi($idClient, $id, $nom);
	$decoded = json_decode($response);
	if (is_object($decoded) && isset($decoded->icon) && $decoded->icon === 'success') {
		clAwardPoints($idClient, CL_POINTS_ATTESTATION, 'attestation', 'Attestation signée');
	}
	echo $response;
}

function pdfAttestationApi($data)
{
	if (!isset($_SESSION['client']) || empty($_SESSION['client'])) {
		http_response_code(401);
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idClient = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int)$info->info->id : 0;
	$id = isset($data['id']) ? (int) $data['id'] : 0;
	if ($idClient <= 0 || $id <= 0) {
		http_response_code(400);
		return;
	}
	$response = client::pdfAttestationApi($idClient, $id);
	$decoded = json_decode($response);
	if (!is_object($decoded) || !isset($decoded->icon) || $decoded->icon !== 'success' || empty($decoded->pdf_base64)) {
		http_response_code(404);
		echo "PDF not found";
		return;
	}
	// Le téléchargement est possible avant signature (le client peut vouloir
	// consulter le document, ou le télécharger pour le traiter autrement) :
	// le CRM ne renvoie first_download=true qu'une seule fois par attestation
	// (download_date posé au premier appel), donc les points ne sont
	// attribués qu'au tout premier téléchargement, pas à chaque relecture.
	if (!empty($decoded->first_download)) {
		clAwardPoints($idClient, CL_POINTS_ATTESTATION, 'attestation_telechargement', 'Attestation téléchargée');
	}
	$pdfBytes = base64_decode($decoded->pdf_base64);
	$filename = isset($decoded->filename) ? $decoded->filename : ('attestation-' . $id . '.pdf');
	$mime = isset($decoded->mime) ? $decoded->mime : 'application/pdf';
	header('Content-Type: ' . $mime);
	header('Content-Disposition: inline; filename="' . $filename . '"');
	header('Content-Length: ' . strlen($pdfBytes));
	echo $pdfBytes;
}

function findClientSocialsApi($data)
{
	if (!isset($_SESSION['client']) || empty($_SESSION['client'])) {
		echo json_encode(array());
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idClient = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int)$info->info->id : 0;
	if ($idClient <= 0) {
		echo json_encode(array());
		return;
	}
	echo client::getClientSocialsByClientApi($idClient);
}

// "J'ai suivi nos réseaux" : système déclaratif (aucun moyen de vérifier
// côté serveur qu'un compte a réellement suivi une page tierce), 3 points
// attribués une seule fois par client — pas de ref_id ici (une seule action
// possible, pas par document), donc vérification directe sur (id_client,
// type) plutôt que via clAwardDownloadPointOnce.
function followSocialApi($data)
{
	if (!isset($_SESSION['client']) || empty($_SESSION['client'])) {
		echo json_encode(array("icon" => "error", "message" => "Unauthorized"));
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idClient = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int) $info->info->id : 0;
	if ($idClient <= 0) {
		echo json_encode(array("icon" => "error", "message" => "Unauthorized"));
		return;
	}
	global $db;
	$existing = $db->queryS(sprintf(
		"SELECT id FROM " . __prefixe_db__ . "points_client WHERE id_client = %s AND type = 'social_follow' LIMIT 1",
		GetSQLValueString($idClient, "int")
	));
	if (is_array($existing) && count($existing) > 0) {
		echo json_encode(array("icon" => "success", "already" => true));
		return;
	}
	clAwardPoints($idClient, CL_POINTS_SOCIAL, 'social_follow', 'Réseaux sociaux suivis');
	echo json_encode(array("icon" => "success", "already" => false));
}

// Demandes client : essai gratuit d'un agent IA, commande d'un agent IA,
// inscription à une formation, ou commande d'un service. Un seul mécanisme
// générique (hw_demande_client) pour les 4 cas — voir Découvrir dans
// l'espace client. Chaque demande envoie aussi un email à l'agence (même
// schéma que com_service/com_formation) pour ne rien perdre tant qu'il n'y a
// pas encore d'écran de gestion dédié côté CRM.
function createDemandeApi($data)
{
	if (!isset($_SESSION['client']) || empty($_SESSION['client'])) {
		echo json_encode(array("icon" => "error", "message" => "Not authenticated", "code" => "auth"));
		return;
	}
	$info = client::getInfoFromTokenApi($_SESSION['client']);
	$idClient = (is_object($info) && isset($info->info) && is_object($info->info) && isset($info->info->id)) ? (int) $info->info->id : 0;
	if ($idClient <= 0) {
		echo json_encode(array("icon" => "error", "message" => "Not authenticated", "code" => "auth"));
		return;
	}
	$allowedTypes = array('agent_essai', 'agent_commande', 'formation', 'service');
	$type = isset($data['type']) ? trim($data['type']) : '';
	if (!in_array($type, $allowedTypes, true)) {
		echo json_encode(array("icon" => "warning", "message" => "Type invalide", "code" => "type"));
		return;
	}
	$idRef = isset($data['id_ref']) ? (int) $data['id_ref'] : 0;
	$refTitre = isset($data['ref_titre']) ? trim($data['ref_titre']) : '';
	$refSlug = isset($data['ref_slug']) ? trim($data['ref_slug']) : '';
	$message = isset($data['message']) ? trim($data['message']) : '';
	if ($refTitre === '') {
		echo json_encode(array("icon" => "warning", "message" => "Champs manquants", "code" => "missing"));
		return;
	}

	global $db;
	$now = date("Y-m-d H:i:s");
	$db->query(sprintf(
		"INSERT INTO " . __prefixe_db__ . "demande_client (id_client, type, id_ref, ref_titre, ref_slug, message, statut, date_add) VALUES (%s, %s, %s, %s, %s, %s, 0, %s)",
		GetSQLValueString($idClient, "int"), GetSQLValueString($type, "text"),
		GetSQLValueString($idRef > 0 ? $idRef : null, "int"), GetSQLValueString($refTitre, "text"),
		GetSQLValueString($refSlug, "text"), GetSQLValueString($message !== '' ? $message : null, "text"),
		GetSQLValueString($now, "text")
	));

	// Infos client (même schéma que createTemoignageApi).
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

	$typeLabels = array(
		'agent_essai'    => "Essai gratuit d'un agent IA",
		'agent_commande' => "Commande d'un agent IA",
		'formation'      => "Inscription à une formation",
		'service'        => "Commande d'un service",
	);
	$sujet = $typeLabels[$type];

	require_once '../../../vendor/autoload.php';
	try {
		$config = new config($db, isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr');
		$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
		$mail->Host = 'helloworld-agency.com';
		$mail->Username = $config->getEmail();
		if ($email !== '') { $mail->setFrom($email, $nomAffiche); }
		$mail->addAddress($config->getEmail(), $config->getNom());
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Encoding = 'base64';
		$mail->Subject = $sujet . ' — espace client';
		$mail->AltBody = $sujet;
		$mail->Body = '<html><body>'
			. '<h1 style="font-weight:normal">' . htmlspecialchars($sujet) . '</h1>'
			. '<table border="0" cellpadding="5">'
			. '<tr><td><strong>Client : </strong></td><td>' . htmlspecialchars($nomAffiche) . ($rs !== '' ? ' (' . htmlspecialchars($rs) . ')' : '') . '</td></tr>'
			. '<tr><td><strong>E-mail : </strong></td><td>' . htmlspecialchars($email) . '</td></tr>'
			. '<tr><td><strong>Concerne : </strong></td><td>' . htmlspecialchars($refTitre) . '</td></tr>'
			. ($message !== '' ? '<tr><td><strong>Message : </strong></td><td>' . nl2br(htmlspecialchars($message)) . '</td></tr>' : '')
			. '</table></body></html>';
		$mail->send();
	} catch (\Throwable $e) {
		// L'email est un bonus (notification immédiate) : la demande est déjà
		// enregistrée en base, donc on n'échoue pas la requête si l'envoi rate.
	}

	echo json_encode(array("icon" => "success", "message" => "Demande envoyée"));
}


