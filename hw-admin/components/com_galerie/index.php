<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_galerie')) {
            $action = "components/com_galerie/controleurs/router.php?task=addGalerie";
            $submitName = "add";
            $submitValue = "Ajouter référence";
            include_once("components/com_galerie/views/galerie/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_galerie')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $galerie = galerie::find($id, $_SESSION['langue']);
                $action = "components/com_galerie/controleurs/router.php?task=editGalerie";
                $submitName = "edit";
                $submitValue = "Modifier référence";
                include_once("components/com_galerie/views/galerie/edit.php");
            }
        }
        break;
    case 'addPhoto' :
        if ($_SESSION['user']->hasDroit('add', 'com_galerie')) 
        {
            if (isset($_GET['id']) && !empty($_GET['id'])) 
            {
                $id = intval($_GET['id']);
				$galerie = galerie::find($id, $_SESSION['langue']);
                $galerie_photos = galerie_photo::findAllByGalerie($_SESSION['langue'], $id);
                $action = "components/com_galerie/controleurs/router.php?task=addGaleriePhoto&id=" . $_GET['id'];
                $submitName = "add";
                $submitValue = "Ajouter photo";
                include_once("components/com_galerie/views/galerie_photo/add.php");
            }
        }
        break;
    case 'editPhoto' :
        if ($_SESSION['user']->hasDroit('edit', 'com_galerie')) 
        {
            if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['id_photo']) && !empty($_GET['id_photo'])) 
            {
                $id = intval($_GET['id']);
				$galerie = galerie::find($id, $_SESSION['langue']);
                $galerie_photos = galerie_photo::findAllByGalerie($_SESSION['langue'], $id);
                $galerie_photo = galerie_photo	::find($_GET['id_photo'],$_SESSION['langue']);
                $action = "components/com_galerie/controleurs/router.php?task=editGaleriePhoto";
                $action .= "&id=" . $id . "&id_photo=" . $_GET['id_photo'];
                $submitName = "edit";
                $submitValue = "Modifier photo";
                include_once("components/com_galerie/views/galerie_photo/edit.php");
            }
        }
        break;
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_galerie')) {
            $galeries = galerie::findAll($_SESSION["langue"], false);
            include_once("components/com_galerie/views/galerie/list.php");
        }
        break;
}