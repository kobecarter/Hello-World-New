<?php

require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addJob' :
            if ($_SESSION['user']->hasDroit('add', 'com_job')) {
                include_once ("job/controleur.php");
            }
            break;
        case 'editJob' :
            if ($_SESSION['user']->hasDroit('edit', 'com_job')) {
                include_once ("job/controleur.php");
            }
            break;
        case 'deleteJob' :
            if ($_SESSION['user']->hasDroit('delete', 'com_job')) {
                include_once ("job/controleur.php");
            }
            break;
        case 'enableJob' :
            if ($_SESSION['user']->hasDroit('edit', 'com_job')) {
                include_once ("job/controleur.php");
            }
            break;
        case 'deleteJobs' :
            if ($_SESSION['user']->hasDroit('delete', 'com_job')) {
                include_once ("job/controleur.php");
            }
            break;
        case 'enableJobs' :
            if ($_SESSION['user']->hasDroit('edit', 'com_job')) {
                include_once ("job/controleur.php");
            }
            break;
        
    }
}