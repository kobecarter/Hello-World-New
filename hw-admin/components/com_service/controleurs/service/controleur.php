<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addService':
            addService($_POST);
            break;
        case 'editService':
            editService($_POST);
            break;
        case 'deleteService':
            deleteService($_POST);
            break;
        case "enableService":
            enableService($_POST);
            break;
        case 'deleteServices' :
            deleteServices($_POST);
            break;
        case 'enableServices' :
            enableServices($_POST);
            break;
    }
}

function addService($data)
{
    $indices = array("titre");
    if (validateService($data, $indices)) {
        if (buildService($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editService($data)
{
    $indices = array("id", "titre");
    if (validateService($data, $indices)) {
        if (buildService($data, $data['id'])->edit() == 1) {
            /*$services = service::findAll('fr');
            foreach($services as $key => $service){
                $service->setSlug(service::generateSlug($service->getTitre(),$_SESSION['langue'],$service->getId()));
                $service->edit();
            }*/
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteService($data)
{
    $indices = array("id");
    if (validateService($data, $indices))
    {
        $id = $data["id"];
        $service = service::find($id, $_SESSION["langue"]);
        if ($service->delete() == 1) {
            if(file_exists("../../../../images/services/" . $service->getPhoto())){
                @unlink("../../../../images/services/" . $service->getPhoto());
            }

            if(file_exists("../../../../images/services/" . $service->getPhotoBanniere())){
                @unlink("../../../../images/services/" . $service->getPhotoBanniere());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteServices($data)
{
    $indices = array("ids");
    if (validateService($data, $indices))
    {  
        $photos = service::findPhotosName($data['ids']);
        if (service::deleteMultiple($data) == 1) {
            if($photos)
                foreach($photos as $photo)
                {
                    if(file_exists("../../../../images/services/" . $photo)){
                        @unlink("../../../../images/services/" . $photo);
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

function enableService($data)
{
    $indices = array("id", "state");
    if (validateService($data, $indices))
    {
        $service = new service();
        $service->setId($data['id']);
        $service->setActive($data['state'] == "oui" ? 0 : 1);
        if ($service->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableServices($data)
{
    $indices = array("ids", "active");
    if(validateService($data, $indices ))
    {
        $res = service::enableMultiple($data);
        if($res == 1)
            echo '1';
        else
            echo '2';
    }
    else
        echo '0';
}

function validateService($data = array(), $indices = array())
{
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildService($data, $id = null)
{
    global $db;
    $service = new service();

    $photo = array();
    $photo_banniere = array();

    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/services/',  array('svg','jpg','jpeg','gif','png','webp','JPG','JPEG','GIF','PNG','SVG','WEBP'));
    }

    if(isset($_FILES['photo_banniere']) && $_FILES['photo_banniere']['name'][0]!=''){
        $photo_banniere = uploadFiles('photo_banniere','../../../../images/services/',  array('svg','jpg','jpeg','gif','png','webp','JPG','JPEG','GIF','PNG','SVG','WEBP'));
    }

    if($id){
        $service->setId($id);
        if(isset($photo[0]) ) {
            $service->setPhoto($photo[0]);
            if(file_exists("../../../../images/services/" . service::find($id, $_SESSION['langue'])->getPhoto())){
                @unlink("../../../../images/services/" . service::find($id, $_SESSION['langue'])->getPhoto());
            }
        } else {
            $service->setPhoto(service::find($id, $_SESSION['langue'])->getPhoto());
        }

        if(isset($photo_banniere[0]) ) {
            $service->setPhotoBanniere($photo_banniere[0]);
            if(file_exists("../../../../images/services/" . service::find($id, $_SESSION['langue'])->getPhotoBanniere())){
                @unlink("../../../../images/services/" . service::find($id, $_SESSION['langue'])->getPhotoBanniere());
            }
        } else {
            $service->setPhotoBanniere(service::find($id, $_SESSION['langue'])->getPhotoBanniere());
        }
        $slug = service::generateSlug((isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),$_SESSION['langue'],$id);
        $data['slug'] = $slug;
    } else {
        if(isset($photo[0]) ) {
            $service->setPhoto($photo[0]);
        } else {
            $service->setPhoto(null);
        }

        if(isset($photo_banniere[0]) ) {
            $service->setPhotoBanniere($photo_banniere[0]);
        } else {
            $service->setPhotoBanniere(null);
        }
         $slug = service::generateSlug((isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),$_SESSION['langue']);
        $data['slug'] = $slug;
    }
	
    $service->setParent(service::find($data["id_parent"], $_SESSION["langue"]));
    $sl = new slider($data["id_slider"], $db);
    $service->setSlider($sl);
	$service->setOrdre($data['ordre']);
    $service->setActive(isset($data['active']) ? 1 : 0);
    $service->setHome(isset($data['home']) ? 1 : 0);
    $service->setTitre($data['titre']);
    $service->setSlug($data['slug']);
    $service->setSousTitre($data['sous_titre']);
	$service->setH1($data['h1']);
    $service->setTexteAccueil($data['texte_accueil']);
    $service->setExtrait($data['extrait']);
    $service->setTexte($data['texte']);
    $service->setSeoTitre($data['seo_titre']);
    $service->setSeoDescription($data['seo_description']);
    $service->setSeoKeyword($data['seo_keyword']);
    $service->setDateAdd(date("Y-m-d"));
    $service->setLastEdit(date("Y-m-d"));
    $service->setLangue($_SESSION['langue']);

    return $service;
}