<?php

/* -------------------------------- installation -------------------------------- */
function install_com_slider(){
    global $db;
    $createSQL = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."slider (".
        "id int(11) NOT NULL auto_increment,".
        "titre varchar(100) NULL,".
        "actif int(11) NULL,".
        "PRIMARY KEY(id)".
        ")";

    $createSQL2 = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."slides (".
        "id int(11) NOT NULL auto_increment,".
        "id_slider int(11) NULL,".
        "photo varchar(200) NULL,".
        "ordre int(11) NULL,".
        "actif int(11) NULL,".
        "PRIMARY KEY(id)".
        ")";

    $createSQL3 = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."details_slide (".
        "id_slide int(11) NOT NULL,".
        "titre varchar(100) NULL,".
        "description varchar(200) NULL,".
        "url varchar(200) NULL,".
        "langue varchar(5) NOT NULL".
        ")";

    $droit1 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_slider', 'view')";
    $droit2 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_slider', 'add')";
    $droit3 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_slider', 'edit')";
    $droit4 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_slider', 'delete')";

    if(!$db->query($createSQL) && !$db->query($createSQL2) && !$db->query($createSQL3)){
        if(!$db->query($droit1) && !$db->query($droit2) && !$db->query($droit3) && !$db->query($droit4)) {
            if (!is_dir("../../../../images/slides")) {
                mkdir("../../../../images/slides");
            }
            return 1;
        }
        return 2;
    }else{
        return 0;
    }
}

/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_slider(){
    global $db;
    $dropSQL = "DROP TABLE IF EXISTS ".__prefixe_db__."slider";
    $dropSQL2 = "DROP TABLE IF EXISTS ".__prefixe_db__."slides";
    $dropSQL3 = "DROP TABLE IF EXISTS ".__prefixe_db__."details_slide";
    $deleteSQL = "DELETE FROM ".__prefixe_db__."droits WHERE module = 'com_slider'";
    if(!$db->query($dropSQL) && !$db->query($dropSQL2) && !$db->query($dropSQL3) && !$db->query($deleteSQL)){
        if(is_dir("../../../../images/slides")){
            rmdir_recursive("../../../../images/slides");
        }
        return 1;
    }else{
        return 0;
    }
}