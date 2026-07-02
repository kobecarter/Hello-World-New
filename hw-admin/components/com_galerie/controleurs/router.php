<?php

require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addGalerie' :
            if ($_SESSION['user']->hasDroit('add', 'com_galerie')) {
                include_once ("galerie/controleur.php");
            }
            break;
        case 'editGalerie' :
            if ($_SESSION['user']->hasDroit('edit', 'com_galerie')) {
                include_once ("galerie/controleur.php");
            }
            break;
        case 'deleteGalerie' :
            if ($_SESSION['user']->hasDroit('delete', 'com_galerie')) {
                include_once ("galerie/controleur.php");
            }
            break;
        case 'enableGalerie' :
            if ($_SESSION['user']->hasDroit('edit', 'com_galerie')) {
                include_once ("galerie/controleur.php");
            }
            break;
        case 'deleteGaleries' :
            if ($_SESSION['user']->hasDroit('delete', 'com_galerie')) {
                include_once ("galerie/controleur.php");
            }
            break;
        case 'enableGaleries' :
            if ($_SESSION['user']->hasDroit('edit', 'com_galerie')) {
                include_once ("galerie/controleur.php");
            }
            break;
        case 'addGaleriePhoto' :
            if ($_SESSION['user']->hasDroit('add', 'com_galerie')) {
                include_once ("galerie_photo/controleur.php");
            }
            break;
        case 'editGaleriePhoto' :
            if ($_SESSION['user']->hasDroit('edit', 'com_galerie')) {
                include_once ("galerie_photo/controleur.php");
            }
            break;
        case 'deleteGaleriePhoto' :
            if ($_SESSION['user']->hasDroit('delete', 'com_galerie')) {
                include_once ("galerie_photo/controleur.php");
            }
            break;
        case 'deleteGaleriePhotos' :
            if ($_SESSION['user']->hasDroit('delete', 'com_galerie')) {
                include_once ("galerie_photo/controleur.php");
            }
            break;
		case 'orderPhoto' :
            if ($_SESSION['user']->hasDroit('edit', 'com_galerie')) {
                include_once ("galerie_photo/controleur.php");
            }
            break;	
        
    }
}