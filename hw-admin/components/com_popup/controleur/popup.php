<?php
include"../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');

session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {

    $task = $_GET['task'];

    switch ($task) {

        case 'addPopup':

            addPopup($_POST);

            break;

        case 'editPopup' :

            editPopup($_POST);

            break;

        case 'deletePopup':

            deletePopup($_POST);

            break;

        case 'enablePopup':

            enablePopup($_POST);

            break;

        case 'disablePopup':

            disablePopup($_POST);

            break;

    }

}



/* -------------------------------- addPopup -------------------------------- */

function addPopup($data){

	global $db;

    if(isset($data['titre']) && !empty($data['titre']) ){



        $photo = '';

        if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
            $var = uploadFiles('photo','../../../../images/popup/',  array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'));
            $photo = $var[0];
        }

        $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."popup (page, actif, from_date, to_date, size, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s)",

            GetSQLValueString(serialize($data['page']), "text"),
			GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($data['from_date'], "date"),
            GetSQLValueString($data['to_date'], "date"),
			GetSQLValueString($data['size'], "text"),				 
            GetSQLValueString(date('Y-m-d'), "date"),
            GetSQLValueString(date('Y-m-d'), "date"));
		//echo $insertSQL;
        if(!$db->query($insertSQL)){
            $id_popup = $db->last_id();

            $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."details_popup (id_popup, titre, extrait, description, photo, btn_text, btn_link, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",

                GetSQLValueString($id_popup, "int"),
                GetSQLValueString($data['titre'], "text"),
                GetSQLValueString($data['extrait'], "text"),
                GetSQLValueString($data['description'], "text"),
				GetSQLValueString($photo, "text"),
				GetSQLValueString($data['btn_text'], "text"),
				GetSQLValueString($data['btn_link'], "text"),
                GetSQLValueString($_SESSION['langue'], "text"));
			
			//echo $insertSQL;
            if(!$db->query($insertSQL)){

                echo '1';

            }else

                echo '2';

        }else

            echo '3';

    }

    else

        echo '0'; // champs obligatoirs

}



/* -------------------------------- editPopup -------------------------------- */

function editPopup($data){

    global $db;

    if(isset($data['id']) && !empty($data['id']) && isset($data['titre']) && !empty($data['titre'])){



        $id = intval($data['id']);

        $b = new popup($id,$db,$_SESSION['langue']);



        $photo = '';

        if(isset($_FILES['photo']) && $_FILES['photo']['name'][0]!=''){
            $var = uploadFiles('photo','../../../../images/popup/',  array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'));
            $photo = "photo = ".GetSQLValueString($var[0], "text").", ";
        }

        $updateSQL = sprintf("UPDATE ".__prefixe_db__."popup SET page=%s, actif=%s, from_date=%s, to_date=%s, size=%s, last_edit=%s WHERE id=%s",

            GetSQLValueString(serialize($data['page']), "text"),
			GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($data['from_date'], "date"),
            GetSQLValueString($data['to_date'], "date"),
			GetSQLValueString($data['size'], "text"),				 
            GetSQLValueString(date('Y-m-d'), "date"),
            GetSQLValueString($id, "int"));

        if(!$db->query($updateSQL)){



            $SQLselect = "SELECT * FROM ".__prefixe_db__."details_popup WHERE id_popup = $id AND langue = '".$_SESSION['langue']."'";

            $result = $db->query($SQLselect);

            // ajout d'une nouvelle traduction

            if($db->num_rows($result) == 0){

                $SQLupdate = sprintf("INSERT INTO ".__prefixe_db__."details_popup (id_popup, titre, extrait, description, photo, btn_text, btn_link, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",

                    GetSQLValueString($id, "int"),
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['extrait'], "text"),
                    GetSQLValueString($data['description'], "text"),
					GetSQLValueString($var[0], "text"),
					GetSQLValueString($data['btn_text'], "text"),
					GetSQLValueString($data['btn_link'], "text"),
                    GetSQLValueString($_SESSION['langue'], "text"));

            }

            // modification de la table détails

            else{

                $SQLupdate = sprintf("UPDATE ".__prefixe_db__."details_popup SET $photo titre=%s, extrait=%s, description=%s, btn_text=%s, btn_link=%s WHERE id_popup=%s AND langue=%s",

                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['extrait'], "text"),
                    GetSQLValueString($data['description'], "text"),
					GetSQLValueString($data['btn_text'], "text"),
					GetSQLValueString($data['btn_link'], "text"),
                    GetSQLValueString($id, "int"),
                    GetSQLValueString($_SESSION['langue'], "text"));

            }



            if(!$db->query($SQLupdate)){

                // supprimer l'ancienne photo

                if($photo != ''){

                    @unlink("../../../../images/popup/".$b->getPhoto());

                }

                echo '1';

            }

            else

                echo '2';

        }else

            echo '3';

    }

    else

        echo '0';

}



/* -------------------------------- deletePopup -------------------------------- */

function deletePopup($data){

    global $db;

    if(isset($data['id']) && !empty($data['id'])){

        $id = intval($data['id']);

        $b = new popup($id,$db,$_SESSION['langue']);

        $SQLdelete = "DELETE FROM ".__prefixe_db__."popup WHERE id = $id";

        $SQLdelete2 = "DELETE FROM ".__prefixe_db__."details_popup WHERE id_popup = $id";

        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)){

            @unlink("../../../../images/popup/".$b->getPhoto());

            echo '1';

        }else

            echo '2';

    }

    else

        echo '0';

}



/* -------------------------------- enablePopup -------------------------------- */

function enablePopup($data){

    global $db;

    if (isset($data['id']) && !empty($data['id'])) {



        $SQLupdate = sprintf("UPDATE ".__prefixe_db__."popup SET actif=%s WHERE id=%s",

            GetSQLValueString(1, "int"),

            GetSQLValueString($data['id'], "text"));

        if(!$db->query($SQLupdate)){

            echo 1;

        }else{

            echo 2;

        }

    }

}



/* -------------------------------- disablePopup -------------------------------- */

function disablePopup($data){

    global $db;

    if (isset($data['id']) && !empty($data['id'])) {



        $SQLupdate = sprintf("UPDATE ".__prefixe_db__."popup SET actif=%s WHERE id=%s",

            GetSQLValueString(0, "int"),

            GetSQLValueString($data['id'], "text"));

        if(!$db->query($SQLupdate)){

            echo 1;

        }else{

            echo 2;

        }

    }

}
?>