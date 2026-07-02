<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addGalerie':
            addGalerie($_POST);
            break;
        case 'editGalerie':
            editGalerie($_POST);
            break;
        case 'deleteGalerie':
            deleteGalerie($_POST);
            break;
        case "enableGalerie":
            enableGalerie($_POST);
            break;
        case 'deleteGaleries' :
            deleteGaleries($_POST);
            break;
        case 'enableGaleries' :
            enableGaleries($_POST);
            break;
    }
}

function addGalerie($data)
{
    $indices = array();
    if (validateGalerie($data, $indices)) {
        if (buildGalerie($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editGalerie($data)
{
    $indices = array("id");
    if (validateGalerie($data, $indices)) {
        if (buildGalerie($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteGalerie($data)
{
    $indices = array("id");
    if (validateGalerie($data, $indices))
    {
        $id = $data["id"];
        $galerie = galerie::find($id, $_SESSION["langue"]);
        if ($galerie->delete() == 1) {
            if(file_exists("../../../../images/galerie/" . $galerie->getCover())){
                @unlink("../../../../images/galerie/" . $galerie->getCover());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteGaleries($data)
{
    $indices = array("ids");
    if (validateGalerie($data, $indices))
    {  
        $photos = galerie::findPhotosName($data['ids']);
        if (galerie::deleteMultiple($data) == 1) {
            if($photos)
                foreach($photos as $photo)
                {
                    if(file_exists("../../../../images/galerie/" . $photo)){
                        @unlink("../../../../images/galerie/" . $photo);
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

function enableGalerie($data)
{
    $indices = array("id", "state");
    if (validateGalerie($data, $indices))
    {
        $galerie = new galerie();
        $galerie->setId($data['id']);
        $galerie->setActive($data['state'] == "oui" ? 0 : 1);
        if ($galerie->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableGaleries($data)
{
    $indices = array("ids", "active");
    if(validateGalerie($data, $indices ))
    {
        $res = galerie::enableMultiple($data);
        if($res == 1)
            echo '1';
        else
            echo '2';
    }
    else
        echo '0';
}

function validateGalerie($data = array(), $indices = array())
{
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildGalerie($data, $id = null)
{
    global $db;
    $galerie = new galerie();

    $cover = array();

    if(isset($_FILES['cover']) && $_FILES['cover']['name'][0]!=''){
        $cover = uploadFiles('cover','../../../../images/galerie/',  array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'));
    }

    if($id){
        $galerie->setId($id);
        if(isset($cover[0]) ) {
            $galerie->setCover($cover[0]);
            if(file_exists("../../../../images/galerie/" . galerie::find($id, $_SESSION['langue'])->getCover())){
                @unlink("../../../../images/galerie/" . galerie::find($id, $_SESSION['langue'])->getCover());
            }
        } else {
            $galerie->setCover(galerie::find($id, $_SESSION['langue'])->getCover());
        }

    } else {
        if(isset($cover[0]) ) {
            $galerie->setCover($cover[0]);
        } else {
            $galerie->setCover(null);
        }
    }
    
    $galerie->setTitre($data['titre']);
    $galerie->setActive(isset($data['active']) ? 1 : 0);
    $galerie->setDateAdd(date("Y-m-d  h:i:s"));
    $galerie->setLastEdit(date("Y-m-d  h:i:s"));
    $galerie->setLangue($_SESSION['langue']);

    return $galerie;
}