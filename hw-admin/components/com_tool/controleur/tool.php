<?php
include"../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'addTool':
            addTool($_POST);
            break;
        case 'editTool' :
            editTool($_POST);
            break;
        case 'deleteTool':
            deleteTool($_POST);
            break;
    }
}

/* -------------------------------- addTool -------------------------------- */
function addTool($data){
    global $db;
    if(isset($data['titre']) && !empty($data['titre'])){

        $photo = '';
        if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
            $var = uploadFiles('photo','../../../../images/tools/',  array('svg','jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG','SVG'));
            $photo = $var[0];
        }

        $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."tool (photo, url, actif, ordre) VALUES (%s, %s, %s, %s)",
            GetSQLValueString($photo, "text"),
            GetSQLValueString($data['url'], "text"),
            GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($data["ordre"], "int"));

        if(!$db->query($insertSQL)){
            $id_tool = $db->last_id();
            $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."details_tool (id_tool, titre, langue) VALUES (%s, %s, %s)",

                GetSQLValueString($id_tool, "int"),
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

/* -------------------------------- editTool -------------------------------- */
function editTool($data){
    global $db;
    if(isset($data['id']) && !empty($data['id']) && isset($data['titre']) && !empty($data['titre'])){

        $id = intval($data['id']);
        $p = new tool($id,$db);

        $photo = '';
        if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
            $var = uploadFiles('photo','../../../../images/tools/',  array('svg','jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG','SVG'));
            $photo = "photo = ".GetSQLValueString($var[0], "text").", ";
        }

        $updateSQL = sprintf("UPDATE ".__prefixe_db__."tool SET $photo url=%s, actif=%s, ordre=%s WHERE id=%s ",
            GetSQLValueString($data['url'], "text"),
            GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($data['ordre'], "int"),
            GetSQLValueString($data['id'], "int"));

        if(!$db->query($updateSQL)){
            $SQLselect = "SELECT * FROM ".__prefixe_db__."details_tool WHERE id_tool = $id AND langue = '".$_SESSION['langue']."'";
            $result = $db->query($SQLselect);
            // ajout d'une nouvelle traduction
            if($db->num_rows($result) == 0){
                $SQLupdate = sprintf("INSERT INTO ".__prefixe_db__."details_tool (id_tool, titre, langue) VALUES (%s, %s, %s)",

                    GetSQLValueString($data['id'], "int"),
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($_SESSION['langue'], "text"));
            }
            // modification de la table détails
            else{
                $SQLupdate = sprintf("UPDATE ".__prefixe_db__."details_tool SET titre=%s WHERE id_tool=%s AND langue=%s ",

                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['id'], "int"),
                    GetSQLValueString($_SESSION['langue'], "text"));
            }

            if(!$db->query($SQLupdate)){
                //Supprimer l'ancienne image
                if($photo != ''){
                    @unlink("../../../../images/tools/".$p->getPhoto());
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

/* -------------------------------- deleteTool -------------------------------- */
function deleteTool($data){
    global $db;
    if(isset($data['id']) && !empty($data['id'])){
        $id = intval($data['id']);
        $p = new tool($id,$db);
        $SQLdelete = "DELETE FROM ".__prefixe_db__."tool WHERE id = $id";
        $SQLdelete2 = "DELETE FROM ".__prefixe_db__."details_tool WHERE id_Tool = $id";
        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)){
            @unlink("../../../../images/tools/".$s->getPhoto());
            echo '1';
        }else
            echo '0';
    }
    else
        echo '0';
}
?>