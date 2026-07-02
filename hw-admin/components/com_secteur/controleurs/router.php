<?php
require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addSecteur' :
            if ($_SESSION['user']->hasDroit('add', 'com_secteur')) {
                include_once ("secteur/controleur.php");
            }
            break;
        case 'editSecteur' :
            if ($_SESSION['user']->hasDroit('edit', 'com_secteur')) {
                include_once ("secteur/controleur.php");
            }
            break;
        case 'deleteSecteur' :
            if ($_SESSION['user']->hasDroit('delete', 'com_secteur')) {
                include_once ("secteur/controleur.php");
            }
            break;
        case 'enableSecteur' :
            if ($_SESSION['user']->hasDroit('edit', 'com_secteur')) {
                include_once ("secteur/controleur.php");
            }
            break;
        case 'deleteSecteurs' :
            if ($_SESSION['user']->hasDroit('delete', 'com_secteur')) {
                include_once ("secteur/controleur.php");
            }
            break;
        case 'enableSecteurs' :
            if ($_SESSION['user']->hasDroit('edit', 'com_secteur')) {
                include_once ("secteur/controleur.php");
            }
            break;
        
    }
}