<?php

@$task = $_GET['task'];
switch ($task) {
    default:
        // die("hello");
        $id_categorie = isset($_GET['id']) ? intval($_GET['id']) : 1;
        $categorie = categorie::find($id_categorie, $_SESSION["lang"]);
        $posts = blog::findAll($_SESSION["lang"],true,$categorie->getId());
        	$pageContact = getComponent("com_contact");
        	$pageReference = getComponent("com_reference"); // utilise par la vue ; son absence donnait une erreur 500
        include_once("components/com_categorie/views/categorie/list.php");
        break;
}