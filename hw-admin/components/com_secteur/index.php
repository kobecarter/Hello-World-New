<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_secteur')) {
            $action = "components/com_secteur/controleurs/router.php?task=addSecteur";
            $submitName = "add";
            $submitValue = "Ajouter secteur";
            $services = service::findAll($_SESSION["langue"], true, true);
            include_once("components/com_secteur/views/secteur/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_secteur')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $secteur = secteur::find($id, $_SESSION['langue']);
                $action = "components/com_secteur/controleurs/router.php?task=editSecteur";
                $submitName = "edit";
                $submitValue = "Modifier secteur";
                $services = service::findAll($_SESSION["langue"], true, true);
                include_once("components/com_secteur/views/secteur/edit.php");
            }
        }
        break;
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_secteur')) {
            $secteurs = secteur::findAll($_SESSION["langue"]);
            include_once("components/com_secteur/views/secteur/list.php");
        }
        break;
}