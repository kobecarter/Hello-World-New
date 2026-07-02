<?php

/* -------------------------------- installation -------------------------------- */
function install_com_page(){
    global $db;
    $createSQL = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."page (".
        "id INT NOT NULL auto_increment,".
        "menu_parent INT NULL,".
        "type VARCHAR(20) NOT NULL,".
        "page_vide VARCHAR(10) NULL,".
        "position VARCHAR(30) NULL,".
        "id_slider INT NULL,".
        "photo VARCHAR(100) NULL,".
        "order_p INT NULL,".
        "actif INT NULL,".
        "PRIMARY KEY(id)".
        ")";

    $createSQL2 = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."details_page (".
        "id_page INT NOT NULL,".
        "seo_titre VARCHAR(255) NULL,".
        "seo_description VARCHAR(255) NULL,".
        "titre VARCHAR(255) NOT NULL,".
        "url VARCHAR(255) NULL,".
        "texte TEXT NULL,".
        "externe VARCHAR(255) NULL,".
        "extrait TEXT NULL,".
        "langue VARCHAR(3) NOT NULL".
        ")";

    $droit1 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_page', 'view')";
    $droit2 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_page', 'add')";
    $droit3 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_page', 'edit')";
    $droit4 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_page', 'delete')";

    if(!$db->query($createSQL) && !$db->query($createSQL2)){
        if(!$db->query($droit1) && !$db->query($droit2) && !$db->query($droit3) && !$db->query($droit4)) {
            if (!is_dir("../../../../images/pages")) {
                mkdir("../../../../images/pages");
            }
            return 1;
        }
        return 2;
    }else{
        return 0;
    }
}

/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_page(){
    global $db;
    $dropSQL = "DROP TABLE IF EXISTS ".__prefixe_db__."page";
    $dropSQL2 = "DROP TABLE IF EXISTS ".__prefixe_db__."details_page";
    $deleteSQL = "DELETE FROM ".__prefixe_db__."droits WHERE module = 'com_page'";
    if(!$db->query($dropSQL) && !$db->query($dropSQL2) && !$db->query($deleteSQL)){
        if(is_dir("../../../../images/pages")){
            rmdir_recursive("../../../../images/pages");
        }
        return 1;
    }else{
        return 0;
    }
}
