<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case "login":
            login($_POST);
            break;
		case "loginApi":
			loginApi($_POST);
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
	echo client::createReclamationApi($data);
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




