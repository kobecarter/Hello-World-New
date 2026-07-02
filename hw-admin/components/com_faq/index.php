<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_faq')) {
            $action = "components/com_faq/controleurs/router.php?task=addFaq";
            $submitName = "add";
            $submitValue = "Ajouter faq";
            $services = service::findAll($_SESSION["langue"], true, false,true);
            include_once("components/com_faq/views/faq/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_faq')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $faq = faq::find($id, $_SESSION['langue']);
                $action = "components/com_faq/controleurs/router.php?task=editFaq";
                $submitName = "edit";
                $submitValue = "Modifier faq";
                $services = service::findAll($_SESSION["langue"], true, false,true);
                include_once("components/com_faq/views/faq/edit.php");
            }
        }
        break;
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_faq')) {
            $faqs = faq::findAll($_SESSION["langue"]);
            include_once("components/com_faq/views/faq/list.php");
        }
        break;
}