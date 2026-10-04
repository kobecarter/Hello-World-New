<?php

@$task = $_GET['task'];
switch ($task) {
    default:
        // die("hello");
        $id_categorie = isset($_GET['id']) ? intval($_GET['id']) : 1;
        $categorie = categorie::find($id_categorie, $_SESSION["lang"]);
        // Cette adresse etait un doublon de /blog-categorie/<slug>/ (canonical vers l'accueil, titre de l'accueil) : 301.
        if (!$categorie || !$categorie->getId()) { sendHttp404AndExit(); }
        if ($categorie->getSlug() != "") {
            header("Location: " . $categorie->getCategorieLink(), true, 301);
            exit;
        }
        $posts = blog::findAll($_SESSION["lang"],true,$categorie->getId());
        	$pageContact = getComponent("com_contact");
        	$pageReference = getComponent("com_reference"); // utilise par la vue ; son absence donnait une erreur 500
        include_once("components/com_categorie/views/categorie/list.php");
        break;
}