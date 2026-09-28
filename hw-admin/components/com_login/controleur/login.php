<?php
include"../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
require_once('../../../includes/security.php');
// Le cookie régénéré à la connexion doit garder HttpOnly / Secure / SameSite.
hwSecureSessionCookie();
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'doLogin' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        case 'restaurePass':
            restaurePass($_POST);
            break;
        case 'newPass':
            newPass($_POST);
            break;
    }
}

function resetPasswordRequest(){
global $db, $siteURL;	
if(isset($_POST['email']) && !empty($_POST['email'])){
	$email = $_POST['email'];
	$SQLselect = "SELECT * FROM 212_client WHERE email = ".GetSQLValueString($email, "text");
	$result = $db->query($SQLselect);
	if($db->num_rows($result) == 1){
		$data = $db->fetch_array($result);
		$c = new client($data['idclient'],$db);
		$config = new config($db);
		$code = base64_encode("Zakaria".$c->getId()."EL HABOUSSI");
		/* -------------------------- Envoi mail -------------------------- */
		$message = '<html><body>
			<table width="100%" border="0">
				<tr><th><img src="'.$siteURL.'images/logo.png" width="100" style="margin:10px 0;" /></th>
				<th heigh="30"><h2>R&eacute;initialisation mot de passe du compte '.$config->getNom().'</h2></th></tr>
				<tr><td></td><td style="padding:10px; ligne-hight:20px;">
					<p>Veuillez cliquer sur le lien ci-dessous pour réinitialiser votre mot de passe</p>
					<p><a href="'.$siteURL.'index.php?option=com_login&task=newPassword&code='.$code.'">réinitialiser mon mot de passe</a></p>
				</td></tr>
			</table>
		</body></html>';
		
		$from = $config->getEmail();
		$headers ='From: <'.$from.'>'."\n";
		$headers .='Reply-To: '.$from."\n";
		$headers .='Content-Type: text/html; charset="utf-8"'."\n";
		$headers .='Content-Transfer-Encoding: 8bit';
		mail($email, 'Reinitialisation mot de passe du compte '.$config->getNom(), $message, $headers);
		/* -------------------------- Envoi mail -------------------------- */
		
		echo '1';
	}
	else
	echo '2'; // email introuvable	
}
else
echo '0'; // champs requis
}
/* -------------------------------- checkConnexion -------------------------------- */
function checkConnexion(){
	if(isset($_SESSION['client']) && !empty($_SESSION['client'])){
		if($_SESSION['client']->isActif())
			echo '1'; // client actif connecté
		else
			echo '2'; // client inactif connecté
	}
	else
		echo '0'; // aucun client connecté
}
/* -------------------------------- Login -------------------------------- */
function login($data){
	if(isset($data['login']) && !empty($data['login']) && isset($data['password']) && !empty($data['password'])){
		global $db;
		if(loginThrottled()){
			echo '3'; // trop de tentatives échouées
			return;
		}
		$user = new user((string) $data['login'], (string) $data['password'], $db);
		if($user->isConnected()){
			loginThrottleReset();
			// Nouvel identifiant de session à la connexion (anti fixation de session).
			session_regenerate_id(true);
			echo '1'; // connexion réusi
		}
		else{
			loginThrottleFail();
			echo '2'; // login et mot de passe incorrecte
		}
	}
	else
	echo '0'; // champs requis
}

/* -------------------------------- Anti force brute -------------------------------- */
// Compteur d'échecs par IP dans un fichier hors web : au-delà de 5 échecs en
// 15 minutes, la connexion est refusée. Stocké à côté des sessions PHP (dossier
// forcément accessible en écriture puisque les sessions fonctionnent), sinon
// dans le dossier temporaire du système.
function loginThrottleFile(){
	$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'inconnue';
	$parts = explode(';', (string) session_save_path());
	$dir = end($parts);
	if($dir === '' || !is_dir($dir) || !is_writable($dir)){
		$dir = sys_get_temp_dir();
	}
	return rtrim($dir, '/') . '/hw_admin_login_' . sha1($ip);
}

function loginThrottleState(){
	$state = @json_decode((string) @file_get_contents(loginThrottleFile()), true);
	if(!is_array($state) || !isset($state['n'], $state['t']) || time() - $state['t'] > 900){
		return array('n' => 0, 't' => time());
	}
	return $state;
}

function loginThrottled(){
	$state = loginThrottleState();
	return $state['n'] >= 5;
}

function loginThrottleFail(){
	$state = loginThrottleState();
	$state['n']++;
	@file_put_contents(loginThrottleFile(), json_encode($state), LOCK_EX);
	error_log('hw-admin login - échec de connexion depuis ' . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'inconnue'));
}

function loginThrottleReset(){
	@unlink(loginThrottleFile());
}
/* -------------------------------- logout -------------------------------- */
function logout(){
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
		echo '1';	
	}
}
/* -------------------------------- restaurePass -------------------------------- */
function restaurePass($data){
    if(isset($data['email']) && !empty($data['email'])){
        if(user::isEmailValable($data['email'])){
            echo '1';
        }else{
            echo '2';
        }
    }else{
        echo '0';
    }
}
/* -------------------------------- newPass -------------------------------- */
function newPass($data){
    if(isset($data['code']) && !empty($data['code']) && isset($data['password']) && !empty($data['password'])){
        if($data['code'] == "code"){
            echo '1';
        }else{
            echo '2';
        }
    }else{
        echo '0';
    }
}
?>