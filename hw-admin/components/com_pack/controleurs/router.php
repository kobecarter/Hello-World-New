<?php

require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addPack' :
            if ($_SESSION['user']->hasDroit('add', 'com_pack')) {
                include_once ("pack/controleur.php");
            }
            break;
        case 'editPack' :
            if ($_SESSION['user']->hasDroit('edit', 'com_pack')) {
                include_once ("pack/controleur.php");
            }
            break;
        case 'deletePack' :
            if ($_SESSION['user']->hasDroit('delete', 'com_pack')) {
                include_once ("pack/controleur.php");
            }
            break;
        case 'enablePack' :
            if ($_SESSION['user']->hasDroit('edit', 'com_pack')) {
                include_once ("pack/controleur.php");
            }
            break;
        case 'deletePacks' :
            if ($_SESSION['user']->hasDroit('delete', 'com_pack')) {
                include_once ("pack/controleur.php");
            }
            break;
        case 'enablePacks' :
            if ($_SESSION['user']->hasDroit('edit', 'com_pack')) {
                include_once ("pack/controleur.php");
            }
            break;
        
    }
}