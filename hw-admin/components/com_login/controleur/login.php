<?php
include"../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
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
	$email = stripslashes($_POST['email']);
	$SQLselect = "SELECT * FROM 212_client WHERE email = '$email'";
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
		$login = addslashes($data['login']);
		$password = $data['password'];
		$user = new user($login, $password, $db);
		if($user->isConnected())
			echo '1'; // connexion réusi
		else
			echo '2'; // login et mot de passe incorrecte
	}
	else
	echo '0'; // champs requis
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