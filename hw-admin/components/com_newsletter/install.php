<?php

/* -------------------------------- installation -------------------------------- */
function install_com_newsletter(){
    global $db;
    $createSQL = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."newsletter (".
        "id INT NOT NULL auto_increment,".
        "nom VARCHAR(250) NULL,".
        "email VARCHAR(250) NOT NULL,".
        "date_add DATE NULL,".
        "confirm INT NULL,".
        "PRIMARY KEY(id)".
        ")";

    $droit1 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_newsletter', 'view')";
    $droit2 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_newsletter', 'add')";
    $droit3 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_newsletter', 'edit')";
    $droit4 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_newsletter', 'delete')";

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
function desinstall_com_newsletter(){
    global $db;
    $dropSQL = "DROP TABLE IF EXISTS ".__prefixe_db__."newsletter";
    $deleteSQL = "DELETE FROM ".__prefixe_db__."droits WHERE module = 'com_newsletter'";
    if(!$db->query($dropSQL) && !$db->query($deleteSQL)){
        return 1;
    }else{
        return 0;
    }
}