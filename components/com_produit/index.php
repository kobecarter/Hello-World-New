<?php

@$task = $_GET['task'];
switch ($task)
{
    case "showDetails":
        if(isset($_GET["id"]) && !empty($_GET["id"])){
			$id = $_GET["id"];
            $page = new page(25,$db,$_SESSION["lang"]);
            $produit = produit::find($id,$_SESSION["lang"]);
            if(!$produit->getTitre()){
                $produitDefault = produit::find($id, langue::getDefaultLanguage());
                if($produitDefault->getTitre()){
                    header("Location: " . $produitDefault->getLink(), true, 302);
                    exit;
                }
                header("HTTP/1.1 404 Not Found");
                include('404.html');
                exit;
            }
            include_once("components/com_produit/views/page/detail.php");
        }
        break;
    case 'showCategorie' :
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            $id_categorie = intval($_GET["id"]);
            $categorie = categorie_produit::find($id_categorie,$_SESSION["lang"]);
            $page = new page(25,$db,$_SESSION["lang"]);
            $produits = produit::findAll($_SESSION["lang"],true);
            $categories_produit = categorie_produit::findAll($_SESSION["lang"],true,false,true);
            include_once("components/com_produit/views/page/categorie.php");
        }
        break;
    case 'produits' :
            $page = new page(25,$db,$_SESSION["lang"]);
            $produits = produit::findAll($_SESSION["lang"],true);
            $categories_produit = categorie_produit::findAll($_SESSION["lang"],true,false,true);
            include_once("components/com_produit/views/page/produits.php");
        break;
    default :
            $page = getComponent('com_produit');
            $pageContact = getComponent('com_contact');
            $produits = produit::findAll($_SESSION["lang"],true,false,12);
            $formations = produit::findAll($_SESSION["lang"],true,1);
            $services = service::findAll($_SESSION["lang"],true,true,true);
            $tools = produit::findAll($_SESSION["lang"],true,3);
            $packs = produit::findAll($_SESSION["lang"],true,4);
            $temoignages = temoignage::findAll($_SESSION["lang"],true);
            $categories_produit = categorie_produit::findAll($_SESSION["lang"],true,false,true);
            $packages = pack::findAll($_SESSION["lang"],true,true);
            
            $blogs = blog::findAll($_SESSION["lang"],true,6);
            
            $categorie_formations = $categorie = categorie_produit::find(1,$_SESSION["lang"]);
            $categorie_services = $categorie = categorie_produit::find(2,$_SESSION["lang"]);
            $categorie_packs = $categorie = categorie_produit::find(4,$_SESSION["lang"]);
            $categorie_tools = $categorie = categorie_produit::find(3,$_SESSION["lang"]);

            $faqs = faq::findAll($_SESSION["lang"], true, false, '0,6');
		    $faqs2 = faq::findAll($_SESSION["lang"], true, false, '7,6');

            include_once("components/com_produit/views/page/list.php");
        break;
}