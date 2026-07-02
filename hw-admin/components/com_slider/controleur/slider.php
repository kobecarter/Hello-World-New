<?php
include"../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
session_start();

if (isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'addSlider' :
            addSlider($_POST);
            break;
        case 'editSlider' :
            editSlider($_POST);
            break;
        case 'deleteSlider' :
            deleteSlider($_POST);
            break;
        case 'addSlide' :
            addSlide($_POST);
            break;
        case 'editSlide' :
            editSlide($_POST);
            break;
        case 'deleteSlide' :
            deleteSlide($_POST);
            break;
        case 'orderSlide' :
            orderSlide($_POST);
            break;
    }
}

/* -------------------------------- addSlider -------------------------------- */
function addSlider($data)
{
    global $db;

    $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "slider (titre, actif) VALUES (%s, %s)",
        GetSQLValueString($data['titre'], "text"),
        GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"));

    if (!$db->query($insertSQL))
        echo '1';
    else
        echo '2';
}

/* -------------------------------- editSlider -------------------------------- */
function editSlider($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {

        $id = intval($data['id']);
        $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "slider SET titre=%s, actif=%s WHERE id=%s ",
            GetSQLValueString($data['titre'], "text"),
            GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($id, "int"));

        if (!$db->query($updateSQL))
            echo '1';
        else
            echo '2';
    } else
        echo '0';
}

/* -------------------------------- deleteSlider -------------------------------- */
function deleteSlider($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {
        $id = intval($data['id']);
        $s = new slider($id, $db);
        $SQLdelete = "DELETE FROM " . __prefixe_db__ . "slider WHERE id = $id";
        $SQLdelete2 = "DELETE FROM " . __prefixe_db__ . "slides WHERE id_slider = $id";
        $ids_slides = $s->getIdChildrenSlide();
        $good = true;
        foreach ($ids_slides as $id_slide) {
            $SQLdelete3 = "DELETE FROM " . __prefixe_db__ . "details_slide WHERE id_slide = $id_slide";
            $slide = new slide($id_slide,$db,$_SESSION['langue']);
            if (!$db->query($SQLdelete3)) {
                @unlink("../../../../images/slides/" . $slide->getPhoto());
                $good = true;
            } else {
                $good = false;
                break;
            }
        }
        if (!$good) {
            echo '3';
            exit;
        }
        if (!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
            echo '1';
        } else {
            echo '2';
        }
    } else {
        echo '0';
    }
}

/* -------------------------------- editSlide -------------------------------- */
function editSlide($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {

        $id = intval($data['id']);
        $s = new slide($id, $db);

        $photo = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['name'][0] != '') {
            $var = uploadFiles('photo', '../../../../images/slides/', array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF', 'PNG'));
            $photo = "photo = " . GetSQLValueString($var[0], "text") . ", ";
        }

        $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "slides SET id_slider=%s, $photo ordre=%s, actif=%s WHERE id=%s ",
            GetSQLValueString($data['slider'], "int"),
            GetSQLValueString($data['ordre'], "int"),
            GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($id, "int"));

        if (!$db->query($updateSQL)) {
            $SQLselect = "SELECT * FROM " . __prefixe_db__ . "details_slide WHERE id_slide = $id AND langue = '" . $_SESSION['langue'] . "'";
            $result = $db->query($SQLselect);
            // ajout d'une nouvelle traduction
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . __prefixe_db__ . "details_slide (id_slide, titre, description, url, langue) VALUES (%s, %s, %s, %s, %s)",

                    GetSQLValueString($id, "int"),
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['description'], "text"),
                    GetSQLValueString($data['url'], "text"),
                    GetSQLValueString($_SESSION['langue'], "text"));
            } // modification de la table détails
            else {
                $SQLupdate = sprintf("UPDATE " . __prefixe_db__ . "details_slide SET titre=%s, description=%s, url=%s WHERE id_slide=%s AND langue=%s ",

                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['description'], "text"),
                    GetSQLValueString($data['url'], "text"),
                    GetSQLValueString($id, "int"),
                    GetSQLValueString($_SESSION['langue'], "text"));
            }

            if (!$db->query($SQLupdate)) {
                //Supprimer l'ancienne image
                if ($photo != '') {
                    @unlink("../../../../images/slides/" . $s->getPhoto());
                }
                echo '1';
            } else
                echo '2';
        } else
            echo '3';
    } else
        echo '0';
}

/* -------------------------------- addSlide -------------------------------- */
function addSlide($data)
{
    global $db;

    $photo = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['name'][0] != '') {
        $var = uploadFiles('photo', '../../../../images/slides/', array('jpg', 'jpeg', 'gif', 'png','JPG', 'JPEG', 'GIF', 'PNG'));
        $photo = $var[0];
    }

    $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "slides (id_slider, photo, ordre, actif) VALUES (%s, %s, %s, %s)",
        GetSQLValueString($data['slider'], "int"),
        GetSQLValueString($photo, "text"),
        GetSQLValueString($data['ordre'], "int"),
        GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"));

    if (!$db->query($insertSQL)) {
        $id_slide = $db->last_id();
        $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "details_slide (id_slide, titre, description, url, langue) VALUES (%s, %s, %s, %s, %s)",

            GetSQLValueString($id_slide, "int"),
            GetSQLValueString($data['titre'], "text"),
            GetSQLValueString($data['description'], "text"),
            GetSQLValueString($data['url'], "text"),
            GetSQLValueString($_SESSION['langue'], "text"));
        if (!$db->query($insertSQL)) {
            echo '1';
        } else
            echo '2';
    } else
        echo '0';
}

/* -------------------------------- deleteSlide -------------------------------- */
function deleteSlide($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {
        $id = intval($data['id']);
        $s = new slide($id, $db);
        $SQLdelete = "DELETE FROM " . __prefixe_db__ . "slides WHERE id = $id";
        $SQLdelete2 = "DELETE FROM " . __prefixe_db__ . "details_slide WHERE id_slide = $id";
        if (!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
            @unlink("../../../../images/slides/" . $s->getPhoto());
            echo '1';
        } else
            echo '2';
    } else
        echo '0';
}

/* -------------------------------- orderSlide -------------------------------- */
function orderSlide($data)
{
    global $db;
    $cpt = 1;
    if (isset($data['ordre']) && !empty($data['ordre'])) {
        foreach ($data['ordre'] as $item) {
            $SQLupdate = sprintf("UPDATE " . __prefixe_db__ . "slides SET ordre=%s WHERE id=%s",
                GetSQLValueString($cpt, "int"),
                GetSQLValueString($item, "int"));
            if (!$db->query($SQLupdate))
                $cpt++;
        }
        echo '1';
    }
}

?>