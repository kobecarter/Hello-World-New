<?php

require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addClient' :
            if ($_SESSION['user']->hasDroit('add', 'com_client')) {
                include_once ("client/controleur.php");
            }
            break;
        case 'editClient' :
            if ($_SESSION['user']->hasDroit('edit', 'com_client')) {
                include_once ("client/controleur.php");
            }
            break;
        case 'deleteClient' :
            if ($_SESSION['user']->hasDroit('delete', 'com_client')) {
                include_once ("client/controleur.php");
            }
            break;
        case 'enableClient' :
            if ($_SESSION['user']->hasDroit('edit', 'com_client')) {
                include_once ("client/controleur.php");
            }
            break;
    }
}