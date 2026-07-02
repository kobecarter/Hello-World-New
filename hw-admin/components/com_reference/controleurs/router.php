<?php

require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addReference' :
            if ($_SESSION['user']->hasDroit('add', 'com_reference')) {
                include_once ("reference/controleur.php");
            }
            break;
        case 'editReference' :
            if ($_SESSION['user']->hasDroit('edit', 'com_reference')) {
                include_once ("reference/controleur.php");
            }
            break;
        case 'deleteReference' :
            if ($_SESSION['user']->hasDroit('delete', 'com_reference')) {
                include_once ("reference/controleur.php");
            }
            break;
        case 'enableReference' :
            if ($_SESSION['user']->hasDroit('edit', 'com_reference')) {
                include_once ("reference/controleur.php");
            }
            break;
        case 'deleteReferences' :
            if ($_SESSION['user']->hasDroit('delete', 'com_reference')) {
                include_once ("reference/controleur.php");
            }
            break;
        case 'enableReferences' :
            if ($_SESSION['user']->hasDroit('edit', 'com_reference')) {
                include_once ("reference/controleur.php");
            }
            break;
        case 'addReferenceItem' :
            if ($_SESSION['user']->hasDroit('add', 'com_reference')) {
                include_once ("reference_item/controleur.php");
            }
            break;
        case 'editReferenceItem' :
            if ($_SESSION['user']->hasDroit('edit', 'com_reference')) {
                include_once ("reference_item/controleur.php");
            }
            break;
        case 'deleteReferenceItem' :
            if ($_SESSION['user']->hasDroit('delete', 'com_reference')) {
                include_once ("reference_item/controleur.php");
            }
            break;
        case 'deleteReferenceItems' :
            if ($_SESSION['user']->hasDroit('delete', 'com_reference')) {
                include_once ("reference_item/controleur.php");
            }
            break;
		case 'addCursus' :
            if ($_SESSION['user']->hasDroit('add', 'com_reference')) {
                include_once ("cursus/controleur.php");
            }
            break;
        case 'editCursus' :
            if ($_SESSION['user']->hasDroit('edit', 'com_reference')) {
                include_once ("cursus/controleur.php");
            }
            break;
        case 'deleteCursus' :
            if ($_SESSION['user']->hasDroit('delete', 'com_reference')) {
                include_once ("cursus/controleur.php");
            }
            break;
        case 'deleteCursuss' :
            if ($_SESSION['user']->hasDroit('delete', 'com_reference')) {
                include_once ("cursus/controleur.php");
            }
            break;	
        
    }
}