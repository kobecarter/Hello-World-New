<?php
require_once ("../../../hw-admin/config.php");
require_once ("../../../hw-admin/instanceDb.php");
require_once ("../../../hw-admin/includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'login' :
            include_once ("client/controleur.php");
            break;	
        case 'loginApi' :
            include_once ("client/controleur.php");
            break;
        case 'googleLoginApi' :
            include_once ("client/controleur.php");
            break;
        case 'facebookLoginApi' :
            include_once ("client/controleur.php");
            break;
        case 'logoutApi' :
            include_once ("client/controleur.php");
            break;
        case 'createReclamationApi' :
            include_once ("client/controleur.php");
            break;
        case 'createTemoignageApi' :
            include_once ("client/controleur.php");
            break;
        case 'updateReclamationApi' :
            include_once ("client/controleur.php");
            break;
        case 'updateProfileApi' :
            include_once ("client/controleur.php");
            break;	
        case 'pdfInvoiceApi' :
            include_once ("client/controleur.php");
            break;
        case 'pdfQuoteApi' :
            include_once ("client/controleur.php");
            break;
        case 'verifyEmailApi' :
            include_once ("client/controleur.php");
            break;
        case 'setNewPasswordApi' :
            include_once ("client/controleur.php");
            break;
	}
}