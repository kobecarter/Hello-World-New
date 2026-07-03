<?php

@$task = $_GET['task'];
switch ($task) {

    case 'showDetails':
        if (isset($_GET['slug']) && !empty($_GET['slug'])) {
            $slug       = $_GET['slug'];
            $formation  = formation::findBySlug($slug, $_SESSION['lang']);
            $page       = getComponent("com_formation");
            $pageContact = getComponent("com_contact");
            $formations  = formation::findAll($_SESSION['lang'], true);
            $testimonials = temoignage::findAll($_SESSION['lang'], true);
            include_once("components/com_formation/views/formation/detail.php");
        }
        break;

    default:
        $page         = getComponent("com_formation");
        $pageContact  = getComponent("com_contact");
        $pageReference= getComponent("com_reference");
        $testimonials = temoignage::findAll($_SESSION['lang'], true);
        $formations   = formation::findAll($_SESSION['lang'], true);
        include_once("components/com_formation/views/formation/list.php");
        break;
}
