<?php
/* -------------------------------- installation -------------------------------- */
function install_com_tool(){
    global $db;
    $createSQL = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."tool (".
        "id INT NOT NULL auto_increment,".
        "photo VARCHAR(250) NULL,".
        "url VARCHAR(250) NULL,".
        "ordre INT NULL,".
        "actif INT NULL,".
        "PRIMARY KEY(id)".
        ")";

    $createSQL2 = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."details_tool (".
        "id_tool INT NOT NULL,".
        "titre VARCHAR(200) NOT NULL,".
        "langue VARCHAR(3) NULL".
        ")";

    $droit1 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_tool', 'view')";
    $droit2 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_tool', 'add')";
    $droit3 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_tool', 'edit')";
    $droit4 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_tool', 'delete')";

    if(!$db->query($createSQL) && !$db->query($createSQL2)){
        if(!$db->query($droit1) && !$db->query($droit2) && !$db->query($droit3) && !$db->query($droit4)) {
            if (!is_dir("../../../../images/tools")) {
                mkdir("../../../../images/tools");
            }
            if(!is_dir("../../../../components/com_tool/com_tool")){
                copy_recursive("../../../components/com_tool/com_tool", "../../../../components/com_tool");
                rmdir_recursive("../../../components/com_tool/com_tool");
            }
            return 1;
        }
        return 2;
    }else{
        return 0;
    }
}

/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_tool(){
    global $db;
    $dropSQL = "DROP TABLE IF EXISTS ".__prefixe_db__."tool";
    $dropSQL2 = "DROP TABLE IF EXISTS ".__prefixe_db__."details_tool";
    $deleteSQL = "DELETE FROM ".__prefixe_db__."droits WHERE module = 'com_tool'";
    if(!$db->query($dropSQL) && !$db->query($dropSQL2) && !$db->query($deleteSQL)){
        if(is_dir("../../../../images/tools")){
            rmdir_recursive("../../../../images/tools");
        }
        if(is_dir("../../../../components/com_tool")){
            copy_recursive("../../../../components/com_tool", "../../../components/com_tool/com_tool");
            rmdir_recursive("../../../../components/com_tool");
        }
        return 1;
    }else{
        return 0;
    }
}
