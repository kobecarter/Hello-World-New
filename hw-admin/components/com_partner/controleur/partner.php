<?php
include"../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'addPartner':
            addPartner($_POST);
            break;
        case 'editPartner' :
            editPartner($_POST);
            break;
        case 'deletePartner':
            deletePartner($_POST);
            break;
    }
}

/* -------------------------------- addPartner -------------------------------- */
function addPartner($data){
    global $db;
    if(isset($data['titre']) && !empty($data['titre'])){

        $photo = '';
        if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
            $var = uploadFiles('photo','../../../../images/partners/',  array('svg','jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG','SVG','webp','WEBP'));
            $photo = $var[0];
        }

        $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."partner (photo, url, actif, ordre) VALUES (%s, %s, %s, %s)",
            GetSQLValueString($photo, "text"),
            GetSQLValueString($data['url'], "text"),
            GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($data["ordre"], "int"));

        if(!$db->query($insertSQL)){
            $id_partner = $db->last_id();
            $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."details_partner (id_partner, titre, langue) VALUES (%s, %s, %s)",

                GetSQLValueString($id_partner, "int"),
                GetSQLValueString($data['titre'], "text"),
                GetSQLValueString($_SESSION['langue'], "text"));
            if(!$db->query($insertSQL)){
                echo '1';
            }else
                echo '3';
        }else
            echo '3';
    }
    else
        echo '0'; // champs obligatoirs
}

/* -------------------------------- editPartner -------------------------------- */
function editPartner($data){
    global $db;
    if(isset($data['id']) && !empty($data['id']) && isset($data['titre']) && !empty($data['titre'])){

        $id = intval($data['id']);
        $p = new partner($id,$db);

        $photo = '';
        if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
            $var = uploadFiles('photo','../../../../images/partners/',  array('svg','jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG','SVG','webp','WEBP'));
            $photo = "photo = ".GetSQLValueString($var[0], "text").", ";
        }

        $updateSQL = sprintf("UPDATE ".__prefixe_db__."partner SET $photo url=%s, actif=%s, ordre=%s WHERE id=%s ",
            GetSQLValueString($data['url'], "text"),
            GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($data['ordre'], "int"),
            GetSQLValueString($data['id'], "int"));

        if(!$db->query($updateSQL)){
            $SQLselect = "SELECT * FROM ".__prefixe_db__."details_partner WHERE id_partner = $id AND langue = '".$_SESSION['langue']."'";
            $result = $db->query($SQLselect);
            // ajout d'une nouvelle traduction
            if($db->num_rows($result) == 0){
                $SQLupdate = sprintf("INSERT INTO ".__prefixe_db__."details_partner (id_partner, titre, langue) VALUES (%s, %s, %s)",

                    GetSQLValueString($data['id'], "int"),
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($_SESSION['langue'], "text"));
            }
            // modification de la table détails
            else{
                $SQLupdate = sprintf("UPDATE ".__prefixe_db__."details_partner SET titre=%s WHERE id_partner=%s AND langue=%s ",

                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['id'], "int"),
                    GetSQLValueString($_SESSION['langue'], "text"));
            }

            if(!$db->query($SQLupdate)){
                //Supprimer l'ancienne image
                if($photo != ''){
                    @unlink("../../../../images/partners/".$p->getPhoto());
                }
                seo(); //Reecriture des urls
                echo '1';
            }else
                echo '2';
        }else
            echo '2';
    }
    else
        echo '0';
}

/* -------------------------------- deletePartner -------------------------------- */
function deletePartner($data){
    global $db;
    if(isset($data['id']) && !empty($data['id'])){
        $id = intval($data['id']);
        $p = new partner($id,$db);
        $SQLdelete = "DELETE FROM ".__prefixe_db__."partner WHERE id = $id";
        $SQLdelete2 = "DELETE FROM ".__prefixe_db__."details_partner WHERE id_Partner = $id";
        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)){
            @unlink("../../../../images/partners/".$s->getPhoto());
            echo '1';
        }else
            echo '0';
    }
    else
        echo '0';
}
?>