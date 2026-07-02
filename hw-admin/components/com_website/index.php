<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_client')) {
            $action = "components/com_client/controleurs/router.php?task=addClient";
            $submitName = "add";
            $submitValue = "Ajouter client";
            include_once("components/com_client/views/client/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_client')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $client = client::find($id);
                $action = "components/com_client/controleurs/router.php?task=editClient";
                $submitName = "edit";
                $submitValue = "Modifier client";
                include_once("components/com_client/views/client/edit.php");
            }
        }
        break;	
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_client')) {
            $clients = client::findAll();
            include_once("components/com_client/views/client/list.php");
        }
        break;
}