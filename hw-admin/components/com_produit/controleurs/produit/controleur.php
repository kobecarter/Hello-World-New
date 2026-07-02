<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addProduit':
            addProduit($_POST);
            break;
        case 'editProduit':
            editProduit($_POST);
            break;
        case 'deleteProduit':
            deleteProduit($_POST);
            break;
        case "enableProduit":
            enableProduit($_POST);
            break;
        case 'deleteProduits' :
            deleteProduits($_POST);
            break;
        case 'enableProduits' :
            enableProduits($_POST);
            break;
    }
}

function addProduit($data)
{
    $indices = array("titre");
    if (validateProduit($data, $indices)) {
        if (buildProduit($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editProduit($data)
{
    $indices = array("id", "titre");
    if (validateProduit($data, $indices)) {
        if (buildProduit($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteProduit($data)
{
    $indices = array("id");
    if (validateProduit($data, $indices))
    {
        $id = $data["id"];
        $produit = produit::find($id, $_SESSION["langue"]);
        if ($produit->delete() == 1) {
            if(file_exists("../../../../images/produit/" . $produit->getPhoto())){
                @unlink("../../../../images/produit/" . $produit->getPhoto());
            }

            if(file_exists("../../../../images/produit/" . $produit->getPhotoBanniere())){
                @unlink("../../../../images/produit/" . $produit->getPhotoBanniere());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteProduits($data)
{
    $indices = array("ids");
    if (validateProduit($data, $indices))
    {  
        $photos = produit::findPhotosName($data['ids']);
        if (produit::deleteMultiple($data) == 1) {
            if($photos)
                foreach($photos as $photo)
                {
                    if(file_exists("../../../../images/produit/" . $photo)){
                        @unlink("../../../../images/produit/" . $photo);
                    }
                }
                
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableProduit($data)
{
    $indices = array("id", "state");
    if (validateProduit($data, $indices))
    {
        $produit = new produit();
        $produit->setId($data['id']);
        $produit->setActive($data['state'] == "oui" ? 0 : 1);
        if ($produit->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableProduits($data)
{
    $indices = array("ids", "active");
    if(validateProduit($data, $indices ))
    {
        $res = produit::enableMultiple($data);
        if($res == 1)
            echo '1';
        else
            echo '2';
    }
    else
        echo '0';
}

function validateProduit($data = array(), $indices = array())
{
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildProduit($data, $id = null)
{
    global $db;
    $produit = new produit();

    $photo = array();
    $photo_banniere = array();

    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/produit/',  array('webp','svg','jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG','WEBP','SVG'));
    }

    if(isset($_FILES['photo_banniere']) && $_FILES['photo_banniere']['name'][0]!=''){
        $photo_banniere = uploadFiles('photo_banniere','../../../../images/produit/',  array('webp','svg','jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG','WEBP','SVG'));
    }

    if($id){
        $produit->setId($id);
        if(isset($photo[0]) ) {
            $produit->setPhoto($photo[0]);
            if(file_exists("../../../../images/produit/" . produit::find($id, $_SESSION['langue'])->getPhoto())){
                @unlink("../../../../images/produit/" . produit::find($id, $_SESSION['langue'])->getPhoto());
            }
        } else {
            $produit->setPhoto(produit::find($id, $_SESSION['langue'])->getPhoto());
        }

        if(isset($photo_banniere[0]) ) {
            $produit->getPhotoBanniere($photo_banniere[0]);
            if(file_exists("../../../../images/produit/" . produit::find($id, $_SESSION['langue'])->getPhotoBanniere())){
                @unlink("../../../../images/produit/" . produit::find($id, $_SESSION['langue'])->getPhotoBanniere());
            }
        } else {
            $produit->setPhotoBanniere(produit::find($id, $_SESSION['langue'])->getPhotoBanniere());
        }
    } else {
        if(isset($photo[0]) ) {
            $produit->setPhoto($photo[0]);
        } else {
            $produit->setPhoto(null);
        }

        if(isset($photo_banniere[0]) ) {
            $produit->setPhotoBanniere($photo_banniere[0]);
        } else {
            $produit->setPhotoBanniere(null);
        }
    }

    $produit->setCategorie(categorie_produit::find($data['id_categorie'],$_SESSION['langue']));
    $produit->setActive(isset($data['active']) ? 1 : 0);
    $produit->setTitre($data['titre']);
    $produit->setSousTitre($data['sous_titre']);
    $produit->setExtrait($data['extrait']);
    $produit->setTexte($data['texte']);
    $produit->setSeoTitre($data['seo_titre']);
    $produit->setSeoDescription($data['seo_description']);
    $produit->setPrix($data['prix']);
    $produit->setDevise($data['devise']);
    $produit->setURL($data['url']);
    $produit->setDateAdd(date("Y-m-d"));
    $produit->setLastEdit(date("Y-m-d"));
    $produit->setLangue($_SESSION['langue']);

    return $produit;
}