<?php
/* -------------------------------- installation -------------------------------- */
function install_com_popup(){

    global $db;

    $createSQL = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."popup (".

        "id INT NOT NULL auto_increment,".
		
		"page VARCHAR(250) NULL,".

        "actif INT NULL,".

        "from_date DATE NULL,".

        "to_date DATE NULL,".
		"size VARCHAR(20) NULL,".
        "date_add DATE NULL,".

        "last_edit DATE NULL,".

        "PRIMARY KEY(id)".

        ")";

    $createSQL2 = "CREATE TABLE IF NOT EXISTS ".__prefixe_db__."details_popup (".

        "id_popup INT NOT NULL,".

        "titre VARCHAR(100) NULL,".

        "extrait TEXT NULL,".

        "description TEXT NULL,".
	    "photo VARCHAR(250) NULL,".
		"btn_text VARCHAR(250) NULL,".
		"btn_link VARCHAR(250) NULL,".
        "langue VARCHAR(3) NULL".

        ")";



    $droit1 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_popup', 'view')";

    $droit2 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_popup', 'add')";

    $droit3 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_popup', 'edit')";

    $droit4 = "INSERT INTO ".__prefixe_db__."droits (id_profil, module, action) VALUES (1, 'com_popup', 'delete')";



    if(!$db->query($createSQL) && !$db->query($createSQL2)){

        if(!$db->query($droit1) && !$db->query($droit2) && !$db->query($droit3) && !$db->query($droit4)) {

            if (!is_dir("../../../../images/popup")) {

                mkdir("../../../../images/popup");

            }

            /*if(!is_dir("../../../../components/com_popup/com_popup")){

                copy_recursive("../../../components/com_popup/com_popup", "../../../../components/com_popup");

                rmdir_recursive("../../../components/com_popup/com_popup");

            }*/

            return 1;

        }

        return 2;

    }else{

        return 0;

    }

}



/* -------------------------------- désinstallation -------------------------------- */

function desinstall_com_popup(){

    global $db;

    $dropSQL = "DROP TABLE IF EXISTS ".__prefixe_db__."popup";

    $dropSQL2 = "DROP TABLE IF EXISTS ".__prefixe_db__."details_popup";

    $deleteSQL = "DELETE FROM ".__prefixe_db__."droits WHERE module = 'com_popup'";

    if(!$db->query($dropSQL) && !$db->query($dropSQL2) && !$db->query($deleteSQL)){

        if(is_dir("../../../../images/popup")){

            rmdir_recursive("../../../../images/popup");

        }

        if(is_dir("../../../../components/com_popup")){

            copy_recursive("../../../../components/com_popup", "../../../components/com_popup/com_popup");

            rmdir_recursive("../../../../components/com_popup");

        }

        return 1;

    }else{

        return 0;

    }

}