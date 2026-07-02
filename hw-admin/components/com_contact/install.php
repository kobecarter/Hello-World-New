<?php

/* -------------------------------- installation -------------------------------- */
function install_com_contact(){
    global $db;
    $createSQL = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."contact (".
        "id INT NOT NULL auto_increment,".
        "nom VARCHAR(250) NULL,".
        "fullname VARCHAR(250) NULL,".
        "email VARCHAR(250) NULL,".
        "phone VARCHAR(250) NULL,".
        "template TEXT NOT NULL,".
        "date_add DATE NULL,".
        "confirm INT NULL,".
        "PRIMARY KEY(id)".
        ")";

    $droit1 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_contact', 'view')";
    $droit2 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_contact', 'add')";
    $droit3 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_contact', 'edit')";
    $droit4 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_contact', 'delete')";

    if(!$db->query($createSQL)){
        if(!$db->query($droit1) && !$db->query($droit2) && !$db->query($droit3) && !$db->query($droit4)) {
            return 1;
        }
        return 2;
    }else{
        return 0;
    }
}

/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_contact(){
    global $db;
    $dropSQL = "DROP TABLE IF EXISTS ".__prefixe_db__."contact";
    $deleteSQL = "DELETE FROM ".__prefixe_db__."droits WHERE module = 'com_contact'";
    if(!$db->query($dropSQL) && !$db->query($deleteSQL)){
        return 1;
    }else{
        return 0;
    }
}