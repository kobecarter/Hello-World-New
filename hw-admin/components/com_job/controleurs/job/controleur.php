<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addJob':
            addJob($_POST);
            break;
        case 'editJob':
            editJob($_POST);
            break;
        case 'deleteJob':
            deleteJob($_POST);
            break;
        case 'deleteJobs' :
            deleteJobs($_POST);
            break;
        case "enableJob":
            enableJob($_POST);
            break;
        case 'enableJobs' :
            enableJobs($_POST);
            break;
    }
}

function addJob($data)
{
    $indices = array("titre");
    if (validateJob($data, $indices)) {
        if (buildJob($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editJob($data)
{
    $indices = array("id", "titre");
    if (validateJob($data, $indices)) {
        if (buildJob($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteJob($data)
{
    $indices = array("id");
    if (validateJob($data, $indices))
    {
        $id = $data["id"];
        $job = job::find($id, $_SESSION["langue"]);
        if ($job->delete() == 1) {
            if(file_exists("../../../../images/jobs/" . $job->getPhoto())){
                @unlink("../../../../images/jobs/" . $job->getPhoto());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteJobs($data)
{
    $indices = array("ids");
    if (validateJob($data, $indices))
    {  
        $photos = job::findPhotosName($data['ids']);
        if (job::deleteMultiple($data) == 1) {
            if($photos)
                foreach($photos as $photo)
                {
                    if(file_exists("../../../../images/jobs/" . $photo)){
                        @unlink("../../../../images/jobs/" . $photo);
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

function enableJob($data)
{
    $indices = array("id", "state");
    if (validatejob($data, $indices))
    {
        $job = new job();
        $job->setId($data['id']);
        $job->setActive($data['state'] == "oui" ? 0 : 1);
        if ($job->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableJobs($data)
{
    $indices = array("ids", "active");
    if(validateJob($data, $indices ))
    {
        $res = job::enableMultiple($data);
        if($res == 1)
            echo '1';
        else
            echo '2';
    }
    else
        echo '0';
}

function validateJob($data = array(), $indices = array()){
    foreach($indices as $indice){
        if(!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0) ){
            return false;
        }
    }
    return true;
}

function buildJob($data, $id = null)
{
    $job = new job();

    $photo = array();
    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../../images/jobs/',  array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'));
    }

    if($id){
        $job->setId($id);
        if(isset($photo[0]) ) {
            $job->setPhoto($photo[0]);
            if(file_exists("../../../../images/jobs/" . job::find($id, $_SESSION['langue'])->getPhoto())){
                @unlink("../../../../images/jobs/" . job::find($id, $_SESSION['langue'])->getPhoto());
            }
        } else {
            $job->setPhoto(job::find($id, $_SESSION['langue'])->getPhoto());
        }
    } else {
        if(isset($photo[0]) ) {
            $job->setPhoto($photo[0]);
        } else {
            $job->setPhoto(null);
        }
    }

    $job->setActive(isset($data['active']) ? 1 : 0);
    $job->setOrdre($data['ordre']);
    $job->setTitre($data['titre']);
    $job->setDescription($data['description']);
    $job->setDateAdd(date("Y-m-d"));
    $job->setLastEdit(date("Y-m-d"));
    $job->setLangue($_SESSION['langue']);

    return $job;
}