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
        case 'reorderMenuItem' :
            reorderMenuItem($_POST);
            break;
        case 'reorderAutoListChildren' :
            reorderAutoListChildren($_POST);
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

        $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "menu_items (id_menu, parent_id, type, id_item, blank, ordre, panel_key, icon, gradient, badge, card_style, auto_list, auto_limit, show_packs, testimonial_id, cta_label, active, image) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($data['id_menu'], "int"),
            GetSQLValueString($data['item_parent'], "int"),
            GetSQLValueString($data['type'], "text"),
            GetSQLValueString($id_item, "int"),
            GetSQLValueString(isset($data['blank']) ? 1 : 0, "int"),
            GetSQLValueString($data['ordre'], "int"),
            GetSQLValueString(menuItemSlugifyPanelKey($data), "text"),
            GetSQLValueString(isset($data['icon']) ? $data['icon'] : '', "text"),
            GetSQLValueString(isset($data['gradient']) ? $data['gradient'] : '', "text"),
            GetSQLValueString(isset($data['badge']) ? $data['badge'] : '', "text"),
            GetSQLValueString(isset($data['card_style']) ? $data['card_style'] : '', "text"),
            GetSQLValueString(isset($data['auto_list']) ? $data['auto_list'] : '', "text"),
            GetSQLValueString(isset($data['auto_limit']) && $data['auto_limit'] !== '' ? $data['auto_limit'] : null, "int"),
            GetSQLValueString(isset($data['show_packs']) ? 1 : 0, "int"),
            GetSQLValueString(isset($data['testimonial_id']) && $data['testimonial_id'] != 0 ? $data['testimonial_id'] : null, "int"),
            GetSQLValueString(isset($data['cta_label']) ? $data['cta_label'] : '', "text"),
            GetSQLValueString(isset($data['active']) ? 1 : 0, "int"),
            GetSQLValueString(isset($data['image']) ? $data['image'] : '', "text"));

        if (!$db->query($insertSQL)) {
            $id_element = $db->last_id();
            $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "details_menu_item (id_menu_item, titre, lien, langue, description) VALUES (%s, %s, %s, %s, %s)",
                GetSQLValueString($id_element, "int"),
                GetSQLValueString($data['titre'], "text"),
                GetSQLValueString($data['lien_ext'], "text"),
                GetSQLValueString($_SESSION['langue'], "text"),
                GetSQLValueString(isset($data['description']) ? $data['description'] : '', "text"));

            if (!$db->query($insertSQL)) {
                echo '1';
            } else
                echo '2';

        } else
            echo '3';
    } else
        echo '0'; // champs obligatoirs
}

/* A brand-new top-level (parent_id=0) item gets a slugified panel_key from
   its title, generated once at creation and never changed afterwards
   (protects the data-menu/data-panel JS wiring). Existing/child items don't
   need one -- the field stays empty for them. */
function menuItemSlugifyPanelKey($data)
{
    if (!isset($data['item_parent']) || intval($data['item_parent']) != 0) {
        return '';
    }
    if (isset($data['panel_key']) && trim($data['panel_key']) !== '') {
        return trim($data['panel_key']);
    }
    $slug = strtolower(trim($data['titre']));
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    return trim($slug, '-');
}

/* -------------------------------- editMenuItem -------------------------------- */
function editMenuItem($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id']) && isset($data['titre']) && !empty($data['titre'])) {

        $id = intval($data['id']);

        $id_item = isset($data[$data['type']]) ? $data[$data['type']] : 0;

        // Note: panel_key is deliberately NOT in this UPDATE -- it's set once
        // at creation (see menuItemSlugifyPanelKey()) and never overwritten,
        // to protect the data-menu/data-panel JS wiring.
        $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "menu_items SET parent_id=%s, type=%s, id_item=%s, blank=%s, ordre=%s, icon=%s, gradient=%s, badge=%s, card_style=%s, auto_list=%s, auto_limit=%s, show_packs=%s, testimonial_id=%s, cta_label=%s, active=%s, image=%s WHERE id=%s",

            GetSQLValueString($data['item_parent'], "int"),
            GetSQLValueString($data['type'], "text"),
            GetSQLValueString($id_item, "int"),
            GetSQLValueString(isset($data['blank']) ? 1 : 0, "int"),
            GetSQLValueString($data['ordre'], "int"),
            GetSQLValueString(isset($data['icon']) ? $data['icon'] : '', "text"),
            GetSQLValueString(isset($data['gradient']) ? $data['gradient'] : '', "text"),
            GetSQLValueString(isset($data['badge']) ? $data['badge'] : '', "text"),
            GetSQLValueString(isset($data['card_style']) ? $data['card_style'] : '', "text"),
            GetSQLValueString(isset($data['auto_list']) ? $data['auto_list'] : '', "text"),
            GetSQLValueString(isset($data['auto_limit']) && $data['auto_limit'] !== '' ? $data['auto_limit'] : null, "int"),
            GetSQLValueString(isset($data['show_packs']) ? 1 : 0, "int"),
            GetSQLValueString(isset($data['testimonial_id']) && $data['testimonial_id'] != 0 ? $data['testimonial_id'] : null, "int"),
            GetSQLValueString(isset($data['cta_label']) ? $data['cta_label'] : '', "text"),
            GetSQLValueString(isset($data['active']) ? 1 : 0, "int"),
            GetSQLValueString(isset($data['image']) ? $data['image'] : '', "text"),
            GetSQLValueString($id, "int"));

        if (!$db->query($updateSQL)) {
            $SQLselect = "SELECT * FROM " . __prefixe_db__ . "details_menu_item WHERE id_menu_item = $id AND langue = '" . $_SESSION['langue'] . "'";
            $result = $db->query($SQLselect);
            // ajout d'une nouvelle traduction
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . __prefixe_db__ . "details_menu_item (id_menu_item, titre, lien, langue, description) VALUES (%s, %s, %s, %s, %s)",
                    GetSQLValueString($id, "int"),
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['lien_ext'], "text"),
                    GetSQLValueString($_SESSION['langue'], "text"),
                    GetSQLValueString(isset($data['description']) ? $data['description'] : '', "text"));
            } // modification de la table détails
            else {
                $SQLupdate = sprintf("UPDATE " . __prefixe_db__ . "details_menu_item SET titre=%s, lien=%s, description=%s WHERE id_menu_item=%s AND langue=%s",
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['lien_ext'], "text"),
                    GetSQLValueString(isset($data['description']) ? $data['description'] : '', "text"),
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

/* -------------------------------- reorderMenuItem -------------------------------- */
/* Takes a list of sibling menu_items ids in their new drag-and-drop order
   (data['ordre'][]) and re-numbers their `ordre` column 1..n accordingly.
   Works the same for the 3 hierarchy levels (panels/groups/items) -- the
   caller only ever submits ids that share the same parent_id. */
function reorderMenuItem($data)
{
    global $db;
    $cpt = 1;
    if (isset($data['ordre']) && !empty($data['ordre'])) {
        foreach ($data['ordre'] as $id) {
            $SQLupdate = sprintf("UPDATE " . __prefixe_db__ . "menu_items SET ordre=%s WHERE id=%s",
                GetSQLValueString($cpt, "int"),
                GetSQLValueString($id, "int"));
            if (!$db->query($SQLupdate))
                $cpt++;
        }
        echo '1';
    } else
        echo '0';
}

/* -------------------------------- reorderAutoListChildren -------------------------------- */
/* Reorders the *live* records an auto_list group expands into on the public
   site (agent_ia rows, or service children) -- these aren't menu_items rows,
   so this writes to their own source table's `ordre` column instead. */
function reorderAutoListChildren($data)
{
    global $db;
    $allowedTables = array(
        'agent_ia' => __prefixe_db__ . 'agent_ia',
        'service'  => __prefixe_db__ . 'service',
    );
    if (isset($data['list_type']) && isset($allowedTables[$data['list_type']]) && isset($data['ordre']) && !empty($data['ordre'])) {
        $table = $allowedTables[$data['list_type']];
        $cpt = 1;
        foreach ($data['ordre'] as $id) {
            $SQLupdate = sprintf("UPDATE " . $table . " SET ordre=%s WHERE id=%s",
                GetSQLValueString($cpt, "int"),
                GetSQLValueString($id, "int"));
            if (!$db->query($SQLupdate))
                $cpt++;
        }
        echo '1';
    } else
        echo '0';
}

?>