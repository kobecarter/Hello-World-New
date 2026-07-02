<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addReferenceItem':
            addReferenceItem($_POST);
            break;
        case 'editReferenceItem':
            editReferenceItem($_POST);
            break;
        case 'deleteReferenceItem':
            deleteReferenceItem($_POST);
            break;
        case 'deleteReferenceItems' :
            deleteReferenceItems($_POST);
            break;
    }
}

function addReferenceItem($data)
{
    $indices = array("titre");
    if (validateReferenceItem($data, $indices)) {
        if (buildReferenceItem($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editReferenceItem($data)
{
    $indices = array("id", "titre");
    if (validateReferenceItem($data, $indices)) {
        if (buildReferenceItem($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteReferenceItem($data)
{
    $indices = array("id");
    if (validateReferenceItem($data, $indices))
    {
        $id = $data["id"];
        $reference_item = reference_item::find($id, $_SESSION["langue"]);
        if ($reference_item->delete() == 1) 
        {
            if(file_exists("../../../../images/references/" . $reference_item->getPhoto())){
                @unlink("../../../../images/references/" . $reference_item->getPhoto());
            }

            if(file_exists("../../../../images/references/" . $reference_item->getPDF())){
                @unlink("../../../../images/references/" . $reference_item->getPDF());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteReferenceItems($data)
{
    $indices = array("ids");
    if (validateReferenceItem($data, $indices))
    {
        $photos = reference::findPhotosName($data['ids']);
        if (reference_item::deleteMultiple($data) == 1)
        {
            if($photos)
                foreach($photos as $photo)
                {
                    if(file_exists("../../../../images/references/" . $photo)){
                        @unlink("../../../../images/references/" . $photo);
                    }
                }

            echo "1";
        }
        else 
            echo "2";
        
    } else {
        echo "0";
    }
}

function validateReferenceItem($data = array(), $indices = array()){
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildReferenceItem($data, $id = null)
{
    $reference_item = new reference_item();

    $photo = array();
    $pdf = array();

    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/references/',  array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG', 'webp'));
    }

    if(isset($_FILES['pdf']) && $_FILES['pdf']['name'][0]!=''){
        $pdf = uploadFiles('pdf','../../../../images/references/',  array('pdf', 'PDF'));
        
    }

    if($id)
    {
        $reference_item->setId($id);
        
        $old_photo = reference_item::find($id, $_SESSION['langue'])->getPhoto();
        if(isset($photo[0]) ) {
            $reference_item->setPhoto($photo[0]);
            if(file_exists("../../../../images/references/" . $old_photo)){
                @unlink("../../../../images/references/" . $old_photo);
            }
        } else {
            $reference_item->setPhoto($old_photo);
        }

        $old_pdf = reference_item::find($id, $_SESSION['langue'])->getPDF();
        if(isset($pdf[0]) ) {
            $reference_item->setPDF($pdf[0]);
            if(file_exists("../../../../images/references/" . $old_pdf)){
                @unlink("../../../../images/references/" . $old_pdf);
            }
        } else {
            $reference_item->setPDF($old_pdf);
        }
    } else {
        if(isset($photo[0]) ) {
            $reference_item->setPhoto($photo[0]);
        } else {
            $reference_item->setPhoto(null);
        }

        if(isset($pdf[0]) ) {
            $reference_item->setPDF($pdf[0]);
        } else {
            $reference_item->setPDF(null);
        }
    }


    $reference_item->setReference(reference::find($data['id_reference'], $_SESSION['langue']));
    $reference_item->setService($data['service']);
    $reference_item->setGalerie(galerie::find($data['id_galerie'], $_SESSION['langue']));
    $reference_item->setVideo(video::find($data['id_video'], $_SESSION['langue']));
    $reference_item->setOrdre($data['ordre']);
    $reference_item->setTitre($data['titre']);
	$reference_item->setSousTitre($data['soustitre']);
    $reference_item->setDescription($data['description']);
    $reference_item->setDateAdd(date("Y-m-d  h:i:s"));
    $reference_item->setLastEdit(date("Y-m-d  h:i:s"));
    $reference_item->setLangue($_SESSION['langue']);

    return $reference_item;
}