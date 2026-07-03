<?php
require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if (isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task) {
        case 'addFormation':
            if ($_SESSION['user']->hasDroit('add', 'com_formation')) {
                include_once("formation/controleur.php");
            }
            break;
        case 'editFormation':
            if ($_SESSION['user']->hasDroit('edit', 'com_formation')) {
                include_once("formation/controleur.php");
            }
            break;
        case 'deleteFormation':
            if ($_SESSION['user']->hasDroit('delete', 'com_formation')) {
                include_once("formation/controleur.php");
            }
            break;
        case 'enableFormation':
            if ($_SESSION['user']->hasDroit('edit', 'com_formation')) {
                include_once("formation/controleur.php");
            }
            break;
        case 'deleteFormations':
            if ($_SESSION['user']->hasDroit('delete', 'com_formation')) {
                include_once("formation/controleur.php");
            }
            break;
        case 'enableFormations':
            if ($_SESSION['user']->hasDroit('edit', 'com_formation')) {
                include_once("formation/controleur.php");
            }
            break;
    }
}
