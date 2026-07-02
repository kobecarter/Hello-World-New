<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_job')) {
            $action = "components/com_job/controleurs/router.php?task=addJob";
            $submitName = "add";
            $submitValue = "Ajouter offre de travail";
            $parents = job::findAll($_SESSION["langue"], false, false, true);
            include_once("components/com_job/views/job/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_job')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $job = job::find($id, $_SESSION['langue']);
                $action = "components/com_job/controleurs/router.php?task=editJob";
                $submitName = "edit";
                $submitValue = "Modifier offre de travail";
                $parents = job::findAll($_SESSION["langue"], false, false, true);
                include_once("components/com_job/views/job/edit.php");
            }
        }
        break;
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_job')) {
            $jobs = job::findAll($_SESSION["langue"], false, false, true);
            include_once("components/com_job/views/job/list.php");
        }
        break;
}