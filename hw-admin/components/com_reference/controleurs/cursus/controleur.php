<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addCursus':
            addCursus($_POST);
            break;
        case 'editCursus':
            editCursus($_POST);
            break;
        case 'deleteCursus':
            deleteCursus($_POST);
            break;
        case 'deleteCursuss' :
            deleteCursuss($_POST);
            break;
    }
}

function addCursus($data)
{
    $indices = array();
    if (validateCursus($data, $indices)) {
        if (buildCursus($data)->add() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editCursus($data)
{
    $indices = array("id");
    if (validateCursus($data, $indices)) {
        if (buildCursus($data, $data['id'])->edit() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteCursus($data)
{
    $indices = array("id");
    if (validateCursus($data, $indices))
    {
        $id = $data["id"];
        $cursus = cursus::find($id, $_SESSION["langue"]);
        if ($cursus->delete() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteCursuss($data)
{
    $indices = array("ids");
    if (validateCursus($data, $indices))
    {
        if (cursus::deleteMultiple($data) == 1)
        {
            echo "1";
        }
        else 
            echo "2";
        
    } else {
        echo "0";
    }
}

function validateCursus($data = array(), $indices = array()){
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildCursus($data, $id = null)
{
    $cursus = new cursus();

    if($id){
        $cursus->setId($id);
    }

    $cursus->setReference(reference::find($data['id_reference'], $_SESSION['langue']));
    $cursus->setOrdre($data['ordre']);
    $cursus->setTitre($data['titre']);
    $cursus->setDescription($data['description']);
    $cursus->setDateAdd(date("Y-m-d  h:i:s"));
    $cursus->setLastEdit(date("Y-m-d  h:i:s"));
    $cursus->setLangue($_SESSION['langue']);

    return $cursus;
}