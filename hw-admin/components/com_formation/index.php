<?php

@$task = $_GET['task'];
switch ($task) {
    case 'add':
        if ($_SESSION['user']->hasDroit('add', 'com_formation')) {
            $action      = "components/com_formation/controleurs/router.php?task=addFormation";
            $submitName  = "add";
            $submitValue = "Ajouter la formation";
            include_once("components/com_formation/views/formation/add.php");
        }
        break;
    case 'edit':
        if ($_SESSION['user']->hasDroit('edit', 'com_formation')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id        = intval($_GET['id']);
                $formation = formation::find($id, $_SESSION['langue']);
                $action    = "components/com_formation/controleurs/router.php?task=editFormation";
                $submitName  = "edit";
                $submitValue = "Modifier la formation";
                include_once("components/com_formation/views/formation/edit.php");
            }
        }
        break;
    default:
        if ($_SESSION['user']->hasDroit('view', 'com_formation')) {
            $formations = formation::findAll($_SESSION["langue"]);
            include_once("components/com_formation/views/formation/list.php");
        }
        break;
}
