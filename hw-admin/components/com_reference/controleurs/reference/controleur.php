<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addReference':
            addReference($_POST);
            break;
        case 'editReference':
            editReference($_POST);
            break;
        case 'deleteReference':
            deleteReference($_POST);
            break;
        case "enableReference":
            enableReference($_POST);
            break;
        case 'deleteReferences' :
            deleteReferences($_POST);
            break;
        case 'enableReferences' :
            enableReferences($_POST);
            break;
    }
}

function addReference($data)
{
    $indices = array("nom_client");
    if (validateReference($data, $indices)) {
        if (buildReference($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editReference($data)
{
    $indices = array("id", "nom_client");
    if (validateReference($data, $indices)) {
        if (buildReference($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteReference($data)
{
    $indices = array("id");
    if (validateReference($data, $indices))
    {
        $id = $data["id"];
        $reference = reference::find($id, $_SESSION["langue"]);
        if ($reference->delete() == 1) {
            if(file_exists("../../../../images/references/" . $reference->getPhoto())){
                @unlink("../../../../images/references/" . $reference->getPhoto());
            }

            if(file_exists("../../../../images/references/" . $reference->getLogo())){
                @unlink("../../../../images/references/" . $reference->getLogo());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteReferences($data)
{
    $indices = array("ids");
    if (validateReference($data, $indices))
    {  
        $photos = reference::findPhotosName($data['ids']);
        if (reference::deleteMultiple($data) == 1) {
            if($photos)
                foreach($photos as $photo)
                {
                    if(file_exists("../../../../images/references/" . $photo)){
                        @unlink("../../../../images/references/" . $photo);
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

function enableReference($data)
{
    $indices = array("id", "state");
    if (validateReference($data, $indices))
    {
        $reference = new reference();
        $reference->setId($data['id']);
        $reference->setActive($data['state'] == "oui" ? 0 : 1);
        if ($reference->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableReferences($data)
{
    $indices = array("ids", "active");
    if(validateReference($data, $indices ))
    {
        $res = reference::enableMultiple($data);
        if($res == 1)
            echo '1';
        else
            echo '2';
    }
    else
        echo '0';
}

function validateReference($data = array(), $indices = array())
{
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildReference($data, $id = null)
{
    global $db;
    $reference = new reference();

    $photo = array();
    $logo = array();

    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/references/',  array('jpg','jpeg','gif','png','webp','JPG','JPEG','GIF','PNG','WEBP'));
    }

    if(isset($_FILES['logo']) && $_FILES['logo']['name'][0]!=''){
        $logo = uploadFiles('logo','../../../../images/references/',  array('jpg','jpeg','gif','png','webp','JPG','JPEG','GIF','PNG','WEBP'));
    }


    if($id){
        $reference->setId($id);
        if(isset($photo[0]) ) {
            $reference->setPhoto($photo[0]);
            if(file_exists("../../../../images/references/" . reference::find($id, $_SESSION['langue'])->getPhoto())){
                @unlink("../../../../images/references/" . reference::find($id, $_SESSION['langue'])->getPhoto());
            }
        } else {
            $reference->setPhoto(reference::find($id, $_SESSION['langue'])->getPhoto());
        }

        if(isset($logo[0]) ) {
            $reference->setLogo($logo[0]);
            if(file_exists("../../../../images/references/" . reference::find($id, $_SESSION['langue'])->getLogo())){
                @unlink("../../../../images/references/" . reference::find($id, $_SESSION['langue'])->getLogo());
            }
        } else {
            $reference->setLogo(reference::find($id, $_SESSION['langue'])->getLogo());
        }
    } else {
        if(isset($photo[0]) ) {
            $reference->setPhoto($photo[0]);
        } else {
            $reference->setPhoto(null);
        }

        if(isset($logo[0]) ) {
            $reference->setLogo($logo[0]);
        } else {
            $reference->setLogo(null);
        }
    }
    
    $reference->setNomClient($data['nom_client']);
    $reference->setSecteur($data['secteur']);
    $reference->setDuree($data['duree']);
    $reference->setServices($data['services']);
    $reference->setActive(isset($data['active']) ? 1 : 0);
    $reference->setExtrait($data['extrait']);
    $reference->setDescription($data['description']);
    $reference->setSecteurActivite($data['secteur_activite']);
    $reference->setHistoriqueCollaboration($data['historique_collaboration']);
    $reference->setResultat($data['resultat']);
    $reference->setSiteWeb($data['site_web']);
    $reference->setDateAdd(date("Y-m-d  h:i:s"));
    $reference->setLastEdit(date("Y-m-d  h:i:s"));
    $reference->setLangue($_SESSION['langue']);

    return $reference;
}