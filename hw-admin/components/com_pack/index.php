<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_pack')) {
            $action = "components/com_pack/controleurs/router.php?task=addPack";
            $submitName = "add";
            $submitValue = "Ajouter pack";
            $parents = pack::findAll($_SESSION["langue"], false, false);
            include_once("components/com_pack/views/pack/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_pack')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $pack = pack::find($id, $_SESSION['langue']);
                $action = "components/com_pack/controleurs/router.php?task=editPack";
                $submitName = "edit";
                $submitValue = "Modifier pack";
                $parents = pack::findAll($_SESSION["langue"], false, false);
                include_once("components/com_pack/views/pack/edit.php");
            }
        }
        break;
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_pack')) {
            $packs = pack::findAll($_SESSION["langue"], false, false);
            include_once("components/com_pack/views/pack/list.php");
        }
        break;
}