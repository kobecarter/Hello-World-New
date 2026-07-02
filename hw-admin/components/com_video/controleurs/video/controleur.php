<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addVideo':
            addVideo($_POST);
            break;
        case 'editVideo':
            editVideo($_POST);
            break;
        case 'deleteVideo':
            deleteVideo($_POST);
            break;
        case "enableVideo":
            enableVideo($_POST);
            break;
    }
}

function addVideo($data)
{
    $indices = array("titre");
    if (validateVideo($data, $indices)) {
        if (buildVideo($data)->add() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editVideo($data)
{
    $indices = array("id", "titre");
    if (validateVideo($data, $indices)) {    
        if (buildVideo($data, $data['id'])->edit() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteVideo($data)
{
    $indices = array("id");
    if (validateVideo($data, $indices))
    {
        $id = $data["id"];
        $video = video::find($id, $_SESSION["langue"]);
        if ($video->delete() == 1) {
            if(file_exists("../../../../images/videos/" . $video->getPhoto())){
                @unlink("../../../../images/videos/" . $video->getPhoto());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableVideo($data)
{
    $indices = array("id", "state");
    if (validateVideo($data, $indices))
    {
        $video = new video();
        $video->setId($data['id']);
        $video->setActive($data['state'] == "oui" ? 0 : 1);
        if ($video->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function validateVideo($data = array(), $indices = array()){
    foreach($indices as $indice){
        if(!isset($data[$indice]) || empty($data[$indice])){
            return false;
        }
    }
    return true;
}

function buildVideo($data, $id = null)
{
    $video = new video();
    $photo = array();
    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/videos/',  array('jpg','jpeg','gif','png','webp','JPG','JPEG','GIF','PNG','WEBP'));
    }

    if($id){
        $video->setId($id);
        if(isset($photo[0]) ) {
            $video->setPhoto($photo[0]);
        } else {
            $video->setPhoto(video::find($id, $_SESSION['langue'])->getPhoto());
        }
    } else {
        if(isset($photo[0]) ) {
            $video->setPhoto($photo[0]);
        } else {
            $video->setPhoto(null);
        }
    }

    $video->setCategorie(categorie::find($data["id_categorie"], $_SESSION["langue"]));
    $video->setActive(isset($data['active']) ? 1 : 0);
    $video->setOrdre($data['ordre']);
    $video->setVideo($data['video']);
	$video->setTitre($data['titre']);
    $video->setExtrait($data['extrait']);
	$video->setLocalisation($data['localisation']);
	$video->setDateShooting($data['date_shooting']);
    $video->setDateAdd(date("Y-m-d"));
    $video->setLastEdit(date("Y-m-d"));
    $video->setLangue($_SESSION['langue']);

    return $video;
}