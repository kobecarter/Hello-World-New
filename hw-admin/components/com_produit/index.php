<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_produit')) {
            $action = "components/com_produit/controleurs/router.php?task=addProduit";
            $submitName = "add";
            $submitValue = "Ajouter article";
            $categories = categorie_produit::findAll($_SESSION["langue"], true, null);
            include_once("components/com_produit/views/produit/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_produit')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $produit = produit::find($id, $_SESSION['langue']);
                $action = "components/com_produit/controleurs/router.php?task=editProduit";
                $submitName = "edit";
                $submitValue = "Modifier article";
                $categories = categorie_produit::findAll($_SESSION["langue"], true, null);
                include_once("components/com_produit/views/produit/edit.php");
            }
        }
        break;
	case 'addCategorie' :
        if ($_SESSION['user']->hasDroit('add', 'com_produit')) {
            $action = "components/com_produit/controleurs/router.php?task=addCategorie";
            $submitName = "add";
            $submitValue = "Ajouter catégorie";
			$categories = categorie_produit::findAll($_SESSION["langue"],true,null);
            include_once("components/com_produit/views/categorie/add.php");
        }
        break;
	case 'editCategorie' :
        if ($_SESSION['user']->hasDroit('edit', 'com_produit')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $categorie = categorie_produit::find($id, $_SESSION['langue']);
                $action = "components/com_produit/controleurs/router.php?task=editCategorie";
                $submitName = "edit";
                $submitValue = "Modifier catégorie";
				$categories = categorie_produit::findAll($_SESSION["langue"],true,null);
                include_once("components/com_produit/views/categorie/edit.php");
            }
        }
        break;	
	case 'categorie' :
        if ($_SESSION['user']->hasDroit('view', 'com_produit')) {
            $categories = categorie_produit::findAllParent($_SESSION["langue"]);
            include_once("components/com_produit/views/categorie/list.php");
        }
        break;	
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_produit')) {
            $produits = produit::findAll($_SESSION["langue"]);
            include_once("components/com_produit/views/produit/list.php");
        }
        break;
}