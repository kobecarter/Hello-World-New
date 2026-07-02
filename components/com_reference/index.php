<?php

@$task = $_GET['task'];
switch ($task)
{
    case "showDetails":
        if(isset($_GET["id"]) && !empty($_GET["id"])){
						
			$id = intval($_GET["id"]);
            $reference = reference::find($id, $_SESSION["lang"]);
			$items = reference_item::findAllByReference($_SESSION["lang"],$id,"ORDER by ordre ASC");
			$cursuss = cursus::findAllByReference($_SESSION["lang"],$id);
			$page = getComponent("com_reference");
            include_once("components/com_reference/views/reference/detail.php");
        }
        break;
    default :

        $page = getComponent("com_reference");
		$limit = "0,16";
        $references = reference::findAll($_SESSION["lang"],true,$limit,true);
        $pageContact = getComponent("com_contact");
        include_once("components/com_reference/views/reference/list.php");
        break;
}