<?php

@$task = $_GET['task'];
switch ($task) {
    default:
        // die("hello");
        $id_categorie = isset($_GET['id']) ? intval($_GET['id']) : 1;
        $categorie = categorie::find($id_categorie, $_SESSION["lang"]);
        $posts = blog::findAll($_SESSION["lang"],true,$categorie->getId());
        	$pageContact = getComponent("com_contact");
        include_once("components/com_categorie/views/categorie/list.php");
        break;
}