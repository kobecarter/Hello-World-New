<?php

@$task = $_GET['task'];
switch ($task)
{
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_dashboard')) {
            $nbrModules = module::count();
            include_once("components/com_dashboard/views/dashboard/list.php");
        }
        break;
}