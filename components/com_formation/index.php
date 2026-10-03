<?php

@$task = $_GET['task'];
switch ($task) {

    case 'showDetails':
        if (isset($_GET['slug']) && !empty($_GET['slug'])) {
            $slug       = $_GET['slug'];
            $formation  = formation::findBySlug($slug, $_SESSION['lang']);
            if (!$formation || !$formation->getId()) {
                // Pas de traduction : langue par defaut ; slug inconnu : vraie 404 (avant, page vide en 200).
                $formation = formation::findBySlug($slug, langue::getDefaultLanguage());
                if (!$formation || !$formation->getId()) { sendHttp404AndExit(); }
            }
            $page       = getComponent("com_formation");
            $pageContact = getComponent("com_contact");
            $formations  = formation::findAll($_SESSION['lang'], true);
            $testimonials = temoignage::findAll($_SESSION['lang'], true);
            $videos       = video::findAllByCategorie($_SESSION['lang'], 14, true, false);
            $toolsId      = tool::findAll(true);
            $tools        = array();
            foreach ($toolsId as $id_tool) {
                $tools[] = new tool($id_tool, $db, $_SESSION['lang']);
            }
            $partnersId   = partner::findAll(true, '0,10');
            $partners     = array();
            foreach ($partnersId as $id_partner) {
                $partners[] = new partner($id_partner, $db, $_SESSION['lang']);
            }
            $partnersId2  = partner::findAll(true, '10,10');
            $partners2    = array();
            foreach ($partnersId2 as $id_partner) {
                $partners2[] = new partner($id_partner, $db, $_SESSION['lang']);
            }
            include_once("components/com_formation/views/formation/detail.php");
        }
        break;

    default:
        $page         = getComponent("com_formation");
        $pageContact  = getComponent("com_contact");
        $pageReference= getComponent("com_reference");
        $testimonials = temoignage::findAll($_SESSION['lang'], true);
        $formations   = formation::findAll($_SESSION['lang'], true);
        $videos       = video::findAllByCategorie($_SESSION['lang'], 14, true, false);
        $toolsId      = tool::findAll(true);
        $tools        = array();
        foreach ($toolsId as $id_tool) {
            $tools[] = new tool($id_tool, $db, $_SESSION['lang']);
        }
        $partnersId   = partner::findAll(true, '0,10');
        $partners     = array();
        foreach ($partnersId as $id_partner) {
            $partners[] = new partner($id_partner, $db, $_SESSION['lang']);
        }
        $partnersId2  = partner::findAll(true, '10,10');
        $partners2    = array();
        foreach ($partnersId2 as $id_partner) {
            $partners2[] = new partner($id_partner, $db, $_SESSION['lang']);
        }
        include_once("components/com_formation/views/formation/list.php");
        break;
}
