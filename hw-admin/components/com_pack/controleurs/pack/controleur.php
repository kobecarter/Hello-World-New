<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addPack':
            addPack($_POST);
            break;
        case 'editPack':
            editPack($_POST);
            break;
        case 'deletePack':
            deletePack($_POST);
            break;
        case "enablePack":
            enablePack($_POST);
            break;
        case 'deletePacks' :
            deletePacks($_POST);
            break;
        case 'enablePacks' :
            enablePacks($_POST);
            break;
    }
}

function addPack($data)
{
    $indices = array("titre");
    if (validatePack($data, $indices)) {
        if (buildPack($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editPack($data)
{
    $indices = array("id", "titre");
    if (validatePack($data, $indices)) {
        if (buildPack($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deletePack($data)
{
    $indices = array("id");
    if (validatePack($data, $indices))
    {
        $id = $data["id"];
        $pack = pack::find($id, $_SESSION["langue"]);
        if ($pack->delete() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deletePacks($data)
{
    $indices = array("ids");
    if (validatePack($data, $indices))
    {
        if (pack::deleteMultiple($data) == 1)
            echo "1";
        else 
            echo "2";
        
    } else {
        echo "0";
    }
}

function enablePack($data)
{
    $indices = array("id", "state");
    if (validatePack($data, $indices))
    {
        $pack = new pack();
        $pack->setId($data['id']);
        $pack->setActive($data['state'] == "oui" ? 0 : 1);
        if ($pack->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enablePacks($data)
{
    $indices = array("ids", "active");
    if(validatePack($data, $indices ))
    {
        $res = pack::enableMultiple($data);
        if($res == 1)
            echo '1';
        else
            echo '2';
    }
    else
        echo '0';
}

function validatePack($data = array(), $indices = array()){
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildPack($data, $id = null)
{
    $pack = new pack();
    
    $photo = array();
    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/packs/',  array('jpg','jpeg','gif','png','svg','JPG','webp','JPEG','GIF','PNG','SVG','WEBP'));
    }

    if($id) $pack = pack::find($id, $_SESSION['langue']);
        
    if(isset($photo[0]) ) {
        $pack->setPhoto($photo[0]);
        if($id && file_exists("../../../../images/packs/" . pack::find($id, $_SESSION['langue'])->getPhoto())){
            @unlink("../../../../images/packs/" . pack::find($id, $_SESSION['langue'])->getPhoto());
        }
    }

    $pack->setService(service::find($data["id_service"], $_SESSION["langue"]));
    $pack->setPrix($data['prix']);
    $pack->setActive(isset($data['active']) ? 1 : 0);
    $pack->setPopulaire(isset($data['populaire']) ? 1 : 0);
    $pack->setOrdre($data['ordre']);
    $pack->setTitre($data['titre']);
    $pack->setDescription($data['description']);
    $pack->setdetails($data['details']);
    $pack->setDateAdd(date("Y-m-d"));
    $pack->setLastEdit(date("Y-m-d"));
    $pack->setLangue($_SESSION['langue']);

    return $pack;
}