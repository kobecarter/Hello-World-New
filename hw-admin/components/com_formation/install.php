<?php
/* -------------------------------- installation -------------------------------- */
function install_com_formation()
{
    $install = new installation();

    // Table principale (données non traduites)
    $result1 = $install->init()
        ->table("formation")
        ->column("type_formation",  "VARCHAR(50) NULL DEFAULT 'presentiel'")
        ->column("type_public",     "VARCHAR(250) NULL")
        ->column("date_debut",      "DATETIME NULL")
        ->column("date_fin",        "DATETIME NULL")
        ->column("lieu",            "VARCHAR(250) NULL")
        ->column("photo",           "VARCHAR(250) NULL")
        ->column("photo_banniere",  "VARCHAR(250) NULL")
        ->column("pdf",             "VARCHAR(250) NULL")
        ->column("nb_participants", "INT(5) NULL DEFAULT 0")
        ->column("status",          "VARCHAR(50) NULL DEFAULT 'brouillon'")
        ->column("active",          "TINYINT(1) NULL DEFAULT 0")
        ->column("date_add",        "DATE NULL")
        ->column("last_edit",       "DATE NULL")
        ->create();

    // Table de traduction (contenus multilingues)
    $result2 = $install->init()
        ->table("details_formation")
        ->column("id_formation",    "INT NULL")
        ->column("seo_titre",       "VARCHAR(200) NULL")
        ->column("seo_description", "VARCHAR(300) NULL")
        ->column("slug",            "VARCHAR(250) NULL")
        ->column("titre",           "VARCHAR(250) NULL")
        ->column("h1",              "VARCHAR(250) NULL")
        ->column("sous_titre",      "TEXT NULL")
        ->column("extrait",         "TEXT NULL")
        ->column("description",     "TEXT NULL")
        ->column("prerequis",       "TEXT NULL")
        ->column("livrables",       "TEXT NULL")
        ->column("langue",          "VARCHAR(3) NULL")
        ->create();

    $result3 = $install->init()->module("com_formation")->addPermissions();

    if ($result1 && $result2 && $result3) {
        return 1;
    } else {
        return 0;
    }
}

/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_formation()
{
    $desinstall = new installation();
    $result1 = $desinstall->init()->table("formation")->drop();
    $result2 = $desinstall->init()->table("details_formation")->drop();
    $result3 = $desinstall->init()->module("com_formation")->revokePermissions();
    if ($result1 && $result2 && $result3) {
        return 1;
    } else {
        return 0;
    }
}
