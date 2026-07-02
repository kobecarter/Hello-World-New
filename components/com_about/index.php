<?php

@$task = $_GET['task'];
switch ($task)
{
    default :
        if(isset($_GET["id"]) && !empty($_GET["id"])) {
            global $db;
            $id = intval($_GET["id"]);
            $page = new page($id, $db, $_SESSION["lang"]);
            $casaPage = new page(32, $db, $_SESSION['lang']);
            $marrakechPage = new page(33, $db, $_SESSION['lang']);
            $londonPage = new page(34, $db, $_SESSION['lang']);
            include_once("components/com_about/views/page/detail.php");
        }
        break;
}