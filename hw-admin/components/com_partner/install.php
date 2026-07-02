<?php
/* -------------------------------- installation -------------------------------- */
function install_com_partner(){
    global $db;
    $createSQL = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."partner (".
        "id INT NOT NULL auto_increment,".
        "photo VARCHAR(250) NULL,".
        "url VARCHAR(250) NULL,".
        "ordre INT NULL,".
        "actif INT NULL,".
        "PRIMARY KEY(id)".
        ")";

    $createSQL2 = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."details_partner (".
        "id_partner INT NOT NULL,".
        "titre VARCHAR(200) NOT NULL,".
        "langue VARCHAR(3) NULL".
        ")";

    $droit1 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_partner', 'view')";
    $droit2 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_partner', 'add')";
    $droit3 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_partner', 'edit')";
    $droit4 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_partner', 'delete')";

    if(!$db->query($createSQL) && !$db->query($createSQL2)){
        if(!$db->query($droit1) && !$db->query($droit2) && !$db->query($droit3) && !$db->query($droit4)) {
            if (!is_dir("../../../../images/partners")) {
                mkdir("../../../../images/partners");
            }
            if(!is_dir("../../../../components/com_partner/com_partner")){
                copy_recursive("../../../components/com_partner/com_partner", "../../../../components/com_partner");
                rmdir_recursive("../../../components/com_partner/com_partner");
            }
            return 1;
        }
        return 2;
    }else{
        return 0;
    }
}

/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_partner(){
    global $db;
    $dropSQL = "DROP TABLE IF EXISTS ".__prefixe_db__."partner";
    $dropSQL2 = "DROP TABLE IF EXISTS ".__prefixe_db__."details_partner";
    $deleteSQL = "DELETE FROM ".__prefixe_db__."droits WHERE module = 'com_partner'";
    if(!$db->query($dropSQL) && !$db->query($dropSQL2) && !$db->query($deleteSQL)){
        if(is_dir("../../../../images/partners")){
            rmdir_recursive("../../../../images/partners");
        }
        if(is_dir("../../../../components/com_partner")){
            copy_recursive("../../../../components/com_partner", "../../../components/com_partner/com_partner");
            rmdir_recursive("../../../../components/com_partner");
        }
        return 1;
    }else{
        return 0;
    }
}
