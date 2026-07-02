<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_video')) {
            $action = "components/com_video/controleurs/router.php?task=addVideo";
            $submitName = "add";
            $submitValue = "Ajouter vidéo";
            $categories = categorie::findAll($_SESSION["langue"], true);
            include_once("components/com_video/views/video/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_video')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $video = video::find($id, $_SESSION['langue']);
                $action = "components/com_video/controleurs/router.php?task=editVideo";
                $submitName = "edit";
                $submitValue = "Modifier vidéo";
                $categories = categorie::findAll($_SESSION["langue"], true);
                include_once("components/com_video/views/video/edit.php");
            }
        }
        break;
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_video')) {
            $videos = video::findAll($_SESSION['langue']);
            include_once("components/com_video/views/video/list.php");
        }
        break;
}