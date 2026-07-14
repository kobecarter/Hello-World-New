<?php

@$task = $_GET['task'];
switch ($task)
{
    /*case "showDetails":
        if(isset($_GET["sluyg"]) && !empty($_GET["id"])){
						
			$id = $_GET["id"];
            $post = blog::find($id, $_SESSION["lang"]);
			
			$id_categorie = $post->getCategorie()->getId() != "" ? $post->getCategorie()->getId() : 1;
			$page = getComponent("com_blog&cat=$id_categorie");
		
            include_once("components/com_blog/views/blog/detail.php");
        }
        break;*/
    case "showDetails":
            if(isset($_GET["slug"]) && !empty($_GET["slug"])){

        		$slug = $_GET["slug"];
                $post = blog::findBySlug($slug, $_SESSION["lang"]);
                if(!$post->getId()){
                    $postDefault = blog::findBySlug($slug, langue::getDefaultLanguage());
                    if($postDefault->getId()){
                        header("Location: " . $postDefault->getLink(), true, 302);
                        exit;
                    }
                    header("HTTP/1.1 404 Not Found");
                    include('404.html');
                    exit;
                }
                // detail.php's related-articles loop reassigns $post -- keep a
                // stable reference to the actual post being viewed for anything
                // (hreflang, schema) that runs later in template.php.
                $currentPost = $post;
                $similarblogs = blog::findSimilar($post->getCategorie()->getId(), true, $_SESSION["lang"], 3);
        		$id_categorie = $post->getCategorie()->getId() != "" ? $post->getCategorie()->getId() : 1;
        		$categories = categorie::findAll($_SESSION["lang"], true, true);
        		$page = getComponent("com_blog&cat=$id_categorie");
            	$pageContact = getComponent("com_contact");
            	$presseCat = categorie::find(3, $_SESSION["lang"]);
            	$marketingCat = categorie::find(5, $_SESSION["lang"]);
            	$digitalCat = categorie::find(14, $_SESSION["lang"]);
            	$pageContact = getComponent("com_contact");
	            $pageReference = getComponent("com_reference");
                include_once("components/com_blog/views/blog/detail.php");
            }
        break;
    case "categorie":
            if(isset($_GET["slug"]) && !empty($_GET["slug"])){

                $slug_categorie = $_GET["slug"];
                $categorie = categorie::findBySlug($slug_categorie,$_SESSION["lang"]);
                $categories = categorie::findAll($_SESSION["lang"], true, true);
                $posts = blog::findAll($_SESSION["lang"],true,$categorie->getId());
        		$pageContact = getComponent("com_contact");
	            $pageReference = getComponent("com_reference");
                include_once("components/com_blog/views/blog/categorie.php");
            }
        break;
        default :
    		$id_categorie = isset($_GET['cat']) ? intval($_GET['cat']) : 1;
            $page = getComponent("com_blog&cat=$id_categorie");
    		
            // $posts = blog::findAll($_SESSION["lang"],true,$id_categorie);
            $itemPerPage = 25;
    	$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $uri = $_SERVER['REQUEST_URI']; // exemple : "/blog/2/"
        $parts = explode('/', trim($uri, '/')); // coupe en morceaux : ["blog", "2"]
        
        $currentPage = 1; // par défaut
        $lastPart = end($parts); // récupère le dernier morceau : "2"
        
        if (is_numeric($lastPart)) {
            $currentPage = intval($lastPart);
        }
        // 		var_dump($currentPage);
        // 		die();
            $posts = blog::findAll($_SESSION["lang"], true, $id_categorie, $currentPage, $itemPerPage);
    
    
        // pagination
	
		$blogAll = blog::findAll($_SESSION["lang"], true, $id_categorie, false, false);
		$pageContact = getComponent("com_contact");
	    $pageReference = getComponent("com_reference");
        include_once("components/com_blog/views/blog/list.php");
        break;
}