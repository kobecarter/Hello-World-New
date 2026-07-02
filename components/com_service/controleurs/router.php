<?php
require_once ("../../../hw-admin/config.php");
require_once ("../../../hw-admin/instanceDb.php");
require_once ("../../../hw-admin/includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'getForm' :
            include_once ("service/controleur.php");
            break;
			
		case 'contact' :
            include_once ("service/controleur.php");
            break;	
    }
}