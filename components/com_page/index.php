<?php

@$task = $_GET['task'];
switch ($task)
{
    default :
        if(isset($_GET["id"]) && !empty($_GET["id"])) {
            global $db;
            $id = intval($_GET["id"]);
            $pageContact = getComponent("com_contact");
	        $pageReference = getComponent("com_reference");
            $page = new page($id, $db, $_SESSION["lang"]);
            include_once("components/com_page/views/page/detail.php");
        }
        break;
}