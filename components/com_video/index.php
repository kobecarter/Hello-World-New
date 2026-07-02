<?php

@$task = $_GET['task'];
switch ($task)
{
    case "categorie" :
        if(isset($_GET['id']) && !empty($_GET['id'])){
            global $db;
            $categorie_id = $_GET['id'];
            $page = new page($categorie_id, $db, $_SESSION["lang"]);
            $videos = video::findAllByCategorie($_SESSION["lang"], 14, true,true);
            include_once("components/com_video/views/video/list_by_category.php");
        }
        break;
    default :
        $page = getComponent("com_video");
        $videos = video::findAll($_SESSION["lang"],true,false);
        include_once("components/com_video/views/video/list.php");
        break;
}