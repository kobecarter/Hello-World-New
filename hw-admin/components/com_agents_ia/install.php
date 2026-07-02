<?php
/* -------------------------------- installation -------------------------------- */
function install_com_agents_ia()
{
    $install = new installation();

    $result1 = $install->init()
        ->table("agent_ia")
        ->column("photo", "VARCHAR(250) NULL")
        ->column("active", "INT(3) NULL")
        ->column("date_add", "DATE NULL")
        ->column("last_edit", "DATE NULL")
        ->create();

    $result2 = $install->init()
        ->table("details_agent_ia")
        ->column("id_agent_ia", "INT NULL")
        ->column("titre", "VARCHAR(250) NULL")
        ->column("slug", "VARCHAR(250) NULL")
        ->column("sous_titre", "VARCHAR(250) NULL")
        ->column("extrait", "text NULL")
        ->column("texte", "text NULL")
        ->column("seo_titre", "VARCHAR(200) NULL")
        ->column("seo_description", "VARCHAR(300) NULL")
        ->column("langue", "VARCHAR(3) NULL")
        ->create();

    $result3 = $install->init()->module("com_agents_ia")->addPermissions();

    if ($result1 && $result2 && $result3) {
        $install->init()->file("agents_ia", "images")->fileCreate();
        return 1;
    } else {
        return 0;
    }
}

/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_agents_ia()
{
    $desinstall = new installation();
    $result1 = $desinstall->init()->table("agent_ia")->drop();
    $result2 = $desinstall->init()->table("details_agent_ia")->drop();
    $result3 = $desinstall->init()->module("com_agents_ia")->revokePermissions();
    if ($result1 && $result2 && $result3) {
        $desinstall->init()->file("agents_ia", "images")->fileRemove();
        return 1;
    } else {
        return 0;
    }
}
