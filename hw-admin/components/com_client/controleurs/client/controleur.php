<?php
if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addClient':
            addClient($_POST);
            break;
        case 'editClient':
            editClient($_POST);
            break;
        case 'deleteClient':
            deleteClient($_POST);
            break;
        case "enableClient":
            enableClient($_POST);
            break;
        case "enableClient":
            enableClient($_POST);
            break;
    }
}

function addClient($data)
{
    $indices = array("nom");
    if (fieldCheck($data, $indices)) {
        if (buildClient($data)->add() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editClient($data)
{
    $indices = array("id", "titre");
    if (fieldCheck($data, $indices)) {
        if (buildClient($data, $data['id'])->edit() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteClient($data)
{
    $indices = array("id");
    if (fieldCheck($data, $indices))
    {
        $client = new client();
        $client->setId($data['id']);
        if ($client->delete() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableClient($data)
{
    $indices = array("id", "state");
    if (fieldCheck($data, $indices))
    {
        $client = client::find($data['id']);
        $client->setActive($data['state'] == "oui" ? 0 : 1);
        if ($client->edit() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function buildClient($data, $id = null)
{
    $client = new client();
	
	$photo = array();
    if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
        $photo = uploadFiles('photo','../../../images/clients/',  array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'));
    }

    if($id){
        $client = client::find($id);
    }
	
	if(isset($photo[0])) {
		$client->setPhoto($photo[0]);
	}

    $client->setActive(isset($data['active']) ? 1 : 0);
    $client->setTitre($data['titre']);
	$client->setPrenom($data['prenom']);
    $client->setNom($data['nom']);
	$client->setRaisonSocial($data['raison_social']);
	$client->setICE($data['ice']);
    $client->setTel($data['tel']);
    $client->setEmail($data['email']);
    $client->setCp($data['cp']);
    $client->setAdresse($data['adresse']);
	$client->setAdresse2($data['adresse2']);
    $client->setVille($data['ville']);
    $client->setPays($data['pays']);
    $client->setDateAdd(date("Y-m-d"));
    $client->setLastEdit(date("Y-m-d"));

    return $client;
}