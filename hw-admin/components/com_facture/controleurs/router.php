<?php

require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addFacture' :
            if ($_SESSION['user']->hasDroit('add', 'com_facture')) {
                include_once ("facture/controleur.php");
            }
            break;
        case 'editFacture' :
            if ($_SESSION['user']->hasDroit('edit', 'com_facture')) {
                include_once ("facture/controleur.php");
            }
            break;
        case 'deleteFacture' :
            if ($_SESSION['user']->hasDroit('delete', 'com_facture')) {
                include_once ("facture/controleur.php");
            }
            break;
        case 'getRowFacture' :
            if ($_SESSION['user']->hasDroit('add', 'com_facture')) {
                include_once ("facture/controleur.php");
            }
            break;
		case 'removeItemFacture' :
            if ($_SESSION['user']->hasDroit('delete', 'com_facture')) {
                include_once ("facture/controleur.php");
            }
            break;
		case 'customItemFacture' :
            if ($_SESSION['user']->hasDroit('edit', 'com_facture')) {
                include_once ("facture/controleur.php");
            }
            break;
		case 'editItemFacture' :
            if ($_SESSION['user']->hasDroit('edit', 'com_facture')) {
                include_once ("facture/controleur.php");
            }
            break;	
		case 'getServicePrice' :
			include_once ("facture/controleur.php");
            break;		
		case 'paymentForm' :
            if ($_SESSION['user']->hasDroit('edit', 'com_facture')) {
                include_once ("payment/controleur.php");
            }
            break;	
		case 'addPayment' :
            if ($_SESSION['user']->hasDroit('add', 'com_facture')) {
                include_once ("payment/controleur.php");
            }
            break;
		case 'editPayment' :
            if ($_SESSION['user']->hasDroit('edit', 'com_facture')) {
                include_once ("payment/controleur.php");
            }
            break;
		case 'deletePayment' :
            if ($_SESSION['user']->hasDroit('delete', 'com_facture')) {
                include_once ("payment/controleur.php");
            }
            break;	
		case 'pdfFacture' :
            //if (isset($_SESSION['user']) && $_SESSION['user']->hasDroit('view', 'com_facture')) {
                include_once ("facture/controleur.php");
            //}
            break;		
    }
}