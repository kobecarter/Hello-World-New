<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addSecteur':
            addSecteur($_POST);
            break;
        case 'editSecteur':
            editSecteur($_POST);
            break;
        case 'deleteSecteur':
            deleteSecteur($_POST);
            break;
        case "enableSecteur":
            enableSecteur($_POST);
            break;
        case 'deleteSecteurs' :
            deleteSecteurs($_POST);
            break;
        case 'enableSecteurs' :
            enableSecteurs($_POST);
            break;
    }
}

function addSecteur($data)
{
    $indices = array("titre");
    if (validateSecteur($data, $indices)) {
        if (buildSecteur($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editSecteur($data)
{
    $indices = array("id", "titre");
    if (validateSecteur($data, $indices)) {
        if (buildSecteur($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteSecteur($data)
{
    $indices = array("id");
    if (validateSecteur($data, $indices))
    {
        $id = $data["id"];
        $secteur = secteur::find($id, $_SESSION["langue"]);
        if ($secteur->delete() == 1) {
            if(file_exists("../../../../images/secteur/" . $secteur->getPhoto())){
                @unlink("../../../../images/secteur/" . $secteur->getPhoto());
            }

            if(file_exists("../../../../images/secteur/" . $secteur->getPhotoBanniere())){
                @unlink("../../../../images/secteur/" . $secteur->getPhotoBanniere());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteSecteurs($data)
{
    $indices = array("ids");
    if (validateSecteur($data, $indices))
    {  
        $photos = secteur::findPhotosName($data['ids']);
        if (secteur::deleteMultiple($data) == 1) {
            if($photos)
                foreach($photos as $photo)
                {
                    if(file_exists("../../../../images/secteur/" . $photo)){
                        @unlink("../../../../images/secteur/" . $photo);
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

function enableSecteur($data)
{
    $indices = array("id", "state");
    if (validateSecteur($data, $indices))
    {
        $secteur = new secteur();
        $secteur->setId($data['id']);
        $secteur->setActive($data['state'] == "oui" ? 0 : 1);
        if ($secteur->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableSecteurs($data)
{
    $indices = array("ids", "active");
    if(validateSecteur($data, $indices ))
    {
        $res = secteur::enableMultiple($data);
        if($res == 1)
            echo '1';
        else
            echo '2';
    }
    else
        echo '0';
}

function validateSecteur($data = array(), $indices = array())
{
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildSecteur($data, $id = null)
{
    global $db;
    $secteur = new secteur();

    $photo = array();
    $photo_banniere = array();

    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/secteur/',  array('jpg','jpeg','gif','png','svg','JPG','webp','JPEG','GIF','PNG','SVG','WEBP'));
    }

    if(isset($_FILES['photo_banniere']) && $_FILES['photo_banniere']['name'][0]!=''){
        $photo_banniere = uploadFiles('photo_banniere','../../../../images/secteur/',  array('jpg','jpeg','gif','png','svg','webp','JPG','JPEG','GIF','PNG','SVG','WEBP'));
    }

    if($id){
        $secteur->setId($id);
        if(isset($photo[0]) ) {
            $secteur->setPhoto($photo[0]);
            if(file_exists("../../../../images/secteur/" . secteur::find($id, $_SESSION['langue'])->getPhoto())){
                @unlink("../../../../images/secteur/" . secteur::find($id, $_SESSION['langue'])->getPhoto());
            }
        } else {
            $secteur->setPhoto(secteur::find($id, $_SESSION['langue'])->getPhoto());
        }

        if(isset($photo_banniere[0]) ) {
            $secteur->setPhotoBanniere($photo_banniere[0]);
            if(file_exists("../../../../images/secteur/" . secteur::find($id, $_SESSION['langue'])->getPhotoBanniere())){
                @unlink("../../../../images/secteur/" . secteur::find($id, $_SESSION['langue'])->getPhotoBanniere());
            }
        } else {
            $secteur->setPhotoBanniere(secteur::find($id, $_SESSION['langue'])->getPhotoBanniere());
        }
        $slug = secteur::generateSlug((isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),$_SESSION['langue'],$id);
        $data['slug'] = $slug;
    } else {
        if(isset($photo[0]) ) {
            $secteur->setPhoto($photo[0]);
        } else {
            $secteur->setPhoto(null);
        }

        if(isset($photo_banniere[0]) ) {
            $secteur->setPhotoBanniere($photo_banniere[0]);
        } else {
            $secteur->setPhotoBanniere(null);
        }
        $slug = secteur::generateSlug((isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),$_SESSION['langue']);
        $data['slug'] = $slug;
    }

    $secteur->setService(service::find($data['id_service'],$_SESSION['langue']));
    $secteur->setActive(isset($data['active']) ? 1 : 0);
    $secteur->setTitre($data['titre']);
    $secteur->setH1(isset($data['h1']) ? $data['h1'] : '');
    $secteur->setSlug($data['slug']);
    $secteur->setSousTitre($data['sous_titre']);
    $secteur->setExtrait($data['extrait']);
    $secteur->setTexte($data['texte']);
    $secteur->setSeoTitre($data['seo_titre']);
    $secteur->setSeoDescription($data['seo_description']);
    $secteur->setSeoKeyword(isset($data['seo_keyword']) ? $data['seo_keyword'] : '');
    $secteur->setDateAdd(date("Y-m-d"));
    $secteur->setLastEdit(date("Y-m-d"));
    $secteur->setLangue($_SESSION['langue']);

    return $secteur;
}