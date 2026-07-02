<?php

/* -------------------------------- installation -------------------------------- */
function install_com_menu(){
    global $db;
    $createSQL = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."menu (".
        "id INT NOT NULL auto_increment,".
        "titre VARCHAR(100) NOT NULL,".
        "PRIMARY KEY(id)".
        ")";

    $createSQL2 = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."menu_items (".
        "id INT NOT NULL auto_increment,".
        "id_menu INT NOT NULL,".
        "parent_id INT NULL,".
        "type VARCHAR(10) NOT NULL,".
        "id_item INT NULL,".
        "blank INT NULL,".
        "ordre INT NULL,".
        "PRIMARY KEY(id)".
        ")";

    $createSQL3 = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."details_menu_item (".
        "id_menu_item INT NOT NULL,".
        "titre VARCHAR(100) NOT NULL,".
        "lien VARCHAR(200) NULL,".
        "langue VARCHAR(3) NULL".
        ")";

    $droit1 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_menu', 'view')";
    $droit2 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_menu', 'add')";
    $droit3 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_menu', 'edit')";
    $droit4 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_menu', 'delete')";

    if(!$db->query($createSQL) && !$db->query($createSQL2) && !$db->query($createSQL3)){
        if(!$db->query($droit1) && !$db->query($droit2) && !$db->query($droit3) && !$db->query($droit4)) {
            return 1;
        }
        return 2;
    }else{
        return 0;
    }
}

/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_menu(){
    global $db;
    $dropSQL = "DROP TABLE IF EXISTS ".__prefixe_db__."menu";
    $dropSQL2 = "DROP TABLE IF EXISTS ".__prefixe_db__."menu_items";
    $dropSQL3 = "DROP TABLE IF EXISTS ".__prefixe_db__."details_menu_item";
    $deleteSQL = "DELETE FROM ".__prefixe_db__."droits WHERE module = 'com_menu'";
    if(!$db->query($dropSQL) && !$db->query($dropSQL2) && !$db->query($dropSQL3) && !$db->query($deleteSQL)){
        return 1;
    }else{
        return 0;
    }
}