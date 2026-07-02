<?php
include "../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
session_start();

if (isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'addMenu' :
            addMenu($_POST);
            break;
        case 'editMenu' :
            editMenu($_POST);
            break;
        case 'deleteMenu' :
            deleteMenu($_POST);
            break;
        case 'editMenuItem' :
            editMenuItem($_POST);
            break;
        case 'addMenuItem' :
            addMenuItem($_POST);
            break;
        case 'deleteMenuItem' :
            deleteMenuItem($_POST);
            break;
    }
}

/* -------------------------------- editMenu -------------------------------- */
function editMenu($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id']) && isset($data['titre']) && !empty($data['titre'])) {
        $id = intval($data['id']);
        $SQLupdate = sprintf("UPDATE " . __prefixe_db__ . "menu SET titre=%s  WHERE id=%s",
            GetSQLValueString($data['titre'], "text"),
            GetSQLValueString($id, "int"));

        if (!$db->query($SQLupdate)) {
            echo '1';
        } else
            echo '2';
    } else
        echo '0';
}

/* -------------------------------- addMenu -------------------------------- */
function addMenu($data)
{
    global $db;
    if (isset($data['titre']) && !empty($data['titre'])) {
        $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "menu (titre) VALUES (%s)",
            GetSQLValueString($data['titre'], "text"));
		
        if (!$db->query($insertSQL))
            echo '1';
        else
            echo '2';
    } else
        echo '0'; // champs obligatoirs
}

/* -------------------------------- deleteMenu -------------------------------- */
function deleteMenu($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {
        $id = intval($data['id']);
        $m = new menu($id, $db);
        $SQLdelete = "DELETE FROM " . __prefixe_db__ . "menu WHERE id = $id";
        $SQLdelete2 = "DELETE FROM " . __prefixe_db__ . "menu_items WHERE id_menu = $id";
        $ids_menu_items = $m->findAllChildItem();
        $good = true;
        if (!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
            foreach ($ids_menu_items as $id_item) {
                $SQLdelete3 = "DELETE FROM " . __prefixe_db__ . "details_menu_item WHERE id_menu_item = $id_item";
                if($db->query($SQLdelete3)){
                   $good = false;
                   break;
                }
            }
            if($good) {
                echo '1';
            }else{
                echo '3';
            }
        } else
            echo '2';
    } else
        echo '0';
}

/* -------------------------------- addMenuItem -------------------------------- */
function addMenuItem($data)
{
    global $db;
    if (isset($data['titre']) && !empty($data['titre']) && isset($data['id_menu']) && !empty($data['id_menu'])) {

        $id_item = isset($data[$data['type']]) ? $data[$data['type']] : 0;

        $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "menu_items (id_menu, parent_id, type, id_item, blank, ordre) VALUES (%s, %s, %s, %s, %s, %s)",
            GetSQLValueString($data['id_menu'], "int"),
            GetSQLValueString($data['item_parent'], "int"),
            GetSQLValueString($data['type'], "text"),
            GetSQLValueString($id_item, "int"),
            GetSQLValueString(isset($data['blank']) ? 1 : 0, "int"),
            GetSQLValueString($data['ordre'], "int"));

        if (!$db->query($insertSQL)) {
            $id_element = $db->last_id();
            $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "details_menu_item (id_menu_item, titre, lien, langue) VALUES (%s, %s, %s, %s)",
                GetSQLValueString($id_element, "int"),
                GetSQLValueString($data['titre'], "text"),
                GetSQLValueString($data['lien_ext'], "text"),
                GetSQLValueString($_SESSION['langue'], "text"));

            if (!$db->query($insertSQL)) {
                echo '1';
            } else
                echo '2';

        } else
            echo '3';
    } else
        echo '0'; // champs obligatoirs
}

/* -------------------------------- editMenuItem -------------------------------- */
function editMenuItem($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id']) && isset($data['titre']) && !empty($data['titre'])) {

        $id = intval($data['id']);

        $id_item = isset($data[$data['type']]) ? $data[$data['type']] : 0;


        $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "menu_items SET parent_id=%s, type=%s, id_item=%s, blank=%s, ordre=%s WHERE id=%s",

            GetSQLValueString($data['item_parent'], "int"),
            GetSQLValueString($data['type'], "text"),
            GetSQLValueString($id_item, "int"),
            GetSQLValueString(isset($data['blank']) ? 1 : 0, "int"),
            GetSQLValueString($data['ordre'], "int"),
            GetSQLValueString($id, "int"));

        if (!$db->query($updateSQL)) {
            $SQLselect = "SELECT * FROM " . __prefixe_db__ . "details_menu_item WHERE id_menu_item = $id AND langue = '" . $_SESSION['langue'] . "'";
            $result = $db->query($SQLselect);
            // ajout d'une nouvelle traduction
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . __prefixe_db__ . "details_menu_item (id_menu_item, titre, lien, langue) VALUES (%s, %s, %s, %s)",
                    GetSQLValueString($id, "int"),
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['lien_ext'], "text"),
                    GetSQLValueString($_SESSION['langue'], "text"));
            } // modification de la table détails
            else {
                $SQLupdate = sprintf("UPDATE " . __prefixe_db__ . "details_menu_item SET titre=%s, lien=%s WHERE id_menu_item=%s AND langue=%s",
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['lien_ext'], "text"),
                    GetSQLValueString($id, "int"),
                    GetSQLValueString($_SESSION['langue'], "text"));
            }


            if (!$db->query($SQLupdate))
                echo '1';
            else
                echo '2';
        } else
            echo '3';
    } else
        echo '0';
}

/* -------------------------------- deleteMenuItem -------------------------------- */
function deleteMenuItem($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {
        $id = intval($data['id']);
        $mi = new menu_item($id, $db, $_SESSION['langue']);
        $SQLdelete = "DELETE FROM " . __prefixe_db__ . "menu_items WHERE id = $id";
        $SQLdelete2 = "DELETE FROM " . __prefixe_db__ . "details_menu_item WHERE id_menu_item = $id";
        if (!$db->query($SQLdelete) && !$db->query($SQLdelete2))
            echo '1';
        else
            echo '2';
    } else
        echo '0';
}

?>