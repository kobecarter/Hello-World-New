<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_reference')) {
            $action = "components/com_reference/controleurs/router.php?task=addReference";
            $submitName = "add";
            $submitValue = "Ajouter référence";
            include_once("components/com_reference/views/reference/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_reference')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $reference = reference::find($id, $_SESSION['langue']);
                $action = "components/com_reference/controleurs/router.php?task=editReference";
                $submitName = "edit";
                $submitValue = "Modifier référence";
                include_once("components/com_reference/views/reference/edit.php");
            }
        }
        break;
    case 'addItem' :
        if ($_SESSION['user']->hasDroit('add', 'com_reference')) 
        {
            if (isset($_GET['id']) && !empty($_GET['id'])) 
            {
                $id = intval($_GET['id']);
                $reference_items = reference_item::findAllByReference($_SESSION['langue'], $id);
				$galeries = galerie::findAll($_SESSION["langue"], true);
				$videos = video::findAll($_SESSION["langue"], true);
                $action = "components/com_reference/controleurs/router.php?task=addReferenceItem&id=" . $_GET['id'];
                $submitName = "add";
                $submitValue = "Ajouter élément";
                include_once("components/com_reference/views/reference_item/add.php");
            }
        }
        break;
    case 'editItem' :
        if ($_SESSION['user']->hasDroit('edit', 'com_reference')) 
        {
            if (isset($_GET['id']) && !empty($_GET['id'])) 
            {
                $id = intval($_GET['id']);
                $reference_items = reference_item::findAllByReference($_SESSION['langue'], $id);
				$galeries = galerie::findAll($_SESSION["langue"], true);
				$videos = video::findAll($_SESSION["langue"], true);
                $reference_item = reference_item::find($_GET['id_item'],$_SESSION['langue']);
                $action = "components/com_reference/controleurs/router.php?task=editReferenceItem";
                $action .= "&id=" . $id . "&id_item=" . $_GET['id_item'];
                $submitName = "edit";
                $submitValue = "Modifier élément";
                include_once("components/com_reference/views/reference_item/edit.php");
            }
        }
        break;
	case 'addCursus' :
        if ($_SESSION['user']->hasDroit('add', 'com_reference')) 
        {
            if (isset($_GET['id']) && !empty($_GET['id'])) 
            {
                $id = intval($_GET['id']);
                $cursuss = cursus::findAllByReference($_SESSION['langue'], $id);
                $action = "components/com_reference/controleurs/router.php?task=addCursus&id=" . $_GET['id'];
                $submitName = "add";
                $submitValue = "Ajouter cursus";
                include_once("components/com_reference/views/cursus/add.php");
            }
        }
        break;
    case 'editCursus' :
        if ($_SESSION['user']->hasDroit('edit', 'com_reference')) 
        {
            if (isset($_GET['id']) && !empty($_GET['id'])) 
            {
                $id = intval($_GET['id']);
                $cursuss = cursus::findAllByReference($_SESSION['langue'], $id);

				$cursus = cursus::find($_GET['id_cursus'],$_SESSION['langue']);
                $action = "components/com_reference/controleurs/router.php?task=editCursus";
                $action .= "&id=" . $id . "&id_cursus=" . $_GET['id_cursus'];
                $submitName = "edit";
                $submitValue = "Modifier cursus";
                include_once("components/com_reference/views/cursus/edit.php");
            }
        }
        break;
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_reference')) {
            $references = reference::findAll($_SESSION["langue"], false);
            include_once("components/com_reference/views/reference/list.php");
        }
        break;
}