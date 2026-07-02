<?php

require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addVideo' :
            if ($_SESSION['user']->hasDroit('add', 'com_video')) {
                include_once ("video/controleur.php");
            }
            break;
        case 'editVideo' :
            if ($_SESSION['user']->hasDroit('edit', 'com_video')) {
                include_once ("video/controleur.php");
            }
            break;
        case 'deleteVideo' :
            if ($_SESSION['user']->hasDroit('delete', 'com_video')) {
                include_once ("video/controleur.php");
            }
            break;
        case 'enableVideo' :
            if ($_SESSION['user']->hasDroit('edit', 'com_video')) {
                include_once ("video/controleur.php");
            }
            break;
    }
}