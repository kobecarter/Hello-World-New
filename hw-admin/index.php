<?php

require_once("config.php");
require_once("instanceDb.php");
require_once('includes/functions/functions.php');
require_once('includes/security.php');

hwSendSecurityHeaders();

if (!isset($_SESSION)){
	hwSecureSessionCookie();
	session_start();
}

// Paramètres de routage hors format (option, task, langues) : requête forgée, 404.
$routingParams = array_intersect_key($_GET, array_flip(array('option', 'task', 'l', 'lang_sys')));
if (isset($routingParams['option']) && $routingParams['option'] === 'doLogout') {
	unset($routingParams['option']); // action de déconnexion (modules/login), pas un composant
}
if (!hwRequestParamsValid($routingParams) || (isset($_GET['l']) && $_GET['l'] !== '' && !hwIsKnownLanguage($_GET['l']))) {
	http_response_code(404);
	exit;
}
foreach (array('langue', 'lang_sys') as $sessionLang) {
	if (isset($_SESSION[$sessionLang]) && !preg_match('/^[a-z]{2}$/', (string) $_SESSION[$sessionLang])) {
		unset($_SESSION[$sessionLang]);
	}
}
require_once('includes/traduction.php');
require_once('modules/login/index.php');

$option = isset($_GET['option']) ? $_GET['option'] : "com_dashboard";

if($option != 'com_login'){
	include("includes/tpl/top.php");
	include("includes/tpl/sidebar.php");
}

if (preg_match("/com_/i",$option) && file_exists("components/".$option."/index.php")){
    if($option == "com_module" || $option == "com_lang"){
        if($_SESSION["user"]->isDev()){
            include("components/" . $option . "/index.php");
        } else {
            show404Error("404");
        }
    } else {
        include("components/" . $option . "/index.php");
    }
}else if($option == ""){
	@header("location:index.php?option=com_dashboard");
}else{
	show404Error("404");
}
if($option != 'com_login')
include("includes/tpl/bottom.php");
?>