<?php
include"../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'updateConfig' :
            updateConfig($_POST);
            break;
        case 'deleteLogo' :
            deleteLogo();
            break;
    }
}

/* -------------------------------- updateConfig -------------------------------- */
function updateConfig($data)
{
    global $db;

    $c = new config($db,$_SESSION['langue']);

    $logo = '';
    if (isset($_FILES['logo']) && $_FILES['logo']['name'][0] != '') {
        $var = uploadFiles('logo', '../../../../images/config/', array('jpg', 'jpeg', 'gif', 'png','JPG', 'JPEG', 'GIF', 'PNG'));

        $logo = "logo = " . GetSQLValueString($var[0], "text") . ", ";
    }

    $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "config SET $logo email=%s, tel=%s, tel2=%s, fax=%s, x=%s, y=%s, id_slider=%s, facebook=%s, twitter=%s, gplus=%s, youtube=%s, instagram=%s, pinterest=%s, linkedin=%s, skype=%s, tumblr=%s, viadeo=%s, analytic=%s WHERE id = %s",

        GetSQLValueString($data['email'], "text"),
        GetSQLValueString($data['tel'], "text"),
        GetSQLValueString($data['tel2'], "text"),
        GetSQLValueString($data['fax'], "text"),
        GetSQLValueString($data['x'], "text"),
        GetSQLValueString($data['y'], "text"),
        GetSQLValueString($data['slider'], "int"),
        GetSQLValueString($data['facebook'], "text"),
        GetSQLValueString($data['twitter'], "text"),
        GetSQLValueString($data['gplus'], "text"),
        GetSQLValueString($data['youtube'], "text"),
        GetSQLValueString($data['instagram'], "text"),
        GetSQLValueString($data['pinterest'], "text"),
        GetSQLValueString($data['linkedin'], "text"),
        GetSQLValueString($data['skype'], "text"),
        GetSQLValueString($data['tumblr'], "text"),
        GetSQLValueString($data['viadeo'], "text"),
        GetSQLValueString($data['analytic'], "text"),
        GetSQLValueString(0, "int")
    );

    if (!$db->query($updateSQL)) {

        $SQLselect = "SELECT * FROM ".__prefixe_db__."details_config WHERE id_config = 0 AND langue = '".$_SESSION['langue']."'";
        $result = $db->query($SQLselect);
        // ajout d'une nouvelle traduction
        if($db->num_rows($result) == 0){
            $updateSQL = sprintf("INSERT INTO ".__prefixe_db__."details_config (id_config, nom, titre, description, adresse, langue) VALUES (%s, %s, %s, %s, %s, %s)",
                GetSQLValueString(0, "int"),
                GetSQLValueString($data['nom'], "text"),
                GetSQLValueString($data['titre'], "text"),
                GetSQLValueString($data['description'], "text"),
                GetSQLValueString($data['adresse'], "text"),
                GetSQLValueString($_SESSION['langue'], "text"));
        }
        // modification de la table détails
        else {
            $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "details_config SET nom=%s, titre=%s, description=%s, adresse=%s WHERE langue=%s AND id_config = %s",

                GetSQLValueString($data['nom'], "text"),
                GetSQLValueString($data['titre'], "text"),
                GetSQLValueString($data['description'], "text"),
                GetSQLValueString($data['adresse'], "text"),
                GetSQLValueString($_SESSION['langue'], "text"),
                GetSQLValueString(0, "int")
            );
        }
        if (!$db->query($updateSQL)) {
            if ($logo != '') {
                @unlink("../../../../images/config/" . $c->getLogo());
            }
            echo '1';
        } else
            echo '2';
    }
    return '0';
}

/* -------------------------------- deleteLogo -------------------------------- */
function deleteLogo()
{
    global $db;

    $c = new config($db, $_SESSION['langue']);
    $logo = "";
    $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "config SET logo=%s WHERE id=%s ",
        GetSQLValueString($logo, "text"),
        GetSQLValueString(0, "int")
    );

    if (!$db->query($updateSQL)) {
        @unlink("../../../../images/config/" . $c->getLogo());
        echo '1';
    } else
        echo '2';
}

?>