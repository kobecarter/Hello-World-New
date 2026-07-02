<?php

@$task = $_GET['task'];
switch ($task)
{
    case "showDetails":
        if(isset($_GET["id"]) && !empty($_GET["id"])){
						
			$id = $_GET["id"];
            $post = blog::find($id, $_SESSION["lang"]);
			
			$id_categorie = $post->getCategorie()->getId() != "" ? $post->getCategorie()->getId() : 1;
			$page = getComponent("com_blog&cat=$id_categorie");
		
            include_once("components/com_blog/views/blog/detail.php");
        }
        break;
    default :
        $page = getComponent("com_job");
        $jobs = job::findAll($_SESSION["lang"],true);
		      $pageContact = getComponent('com_contact');
		              $pageReference = getComponent("com_reference");
        include_once("components/com_job/views/job/list.php");
        break;
}