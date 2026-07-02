<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_categorie')) {
            $action = "components/com_categorie/controleurs/router.php?task=addCategorie";
            $submitName = "add";
            $submitValue = "Ajouter categorie";
            $parents = categorie::findAll($_SESSION["langue"], false, false, true);
            include_once("components/com_categorie/views/categorie/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_categorie')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $categorie = categorie::find($id, $_SESSION['langue']);
                $action = "components/com_categorie/controleurs/router.php?task=editCategorie";
                $submitName = "edit";
                $submitValue = "Modifier categorie";
                $parents = categorie::findAll($_SESSION["langue"], false, false, true);
                include_once("components/com_categorie/views/categorie/edit.php");
            }
        }
        break;
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_categorie')) {
            $categories = categorie::findAll($_SESSION["langue"], false, false, true);
            include_once("components/com_categorie/views/categorie/list.php");
        }
        break;
}