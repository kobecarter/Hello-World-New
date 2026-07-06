<?php

@$task = $_GET['task'];
switch ($task) {
    case "showDetails":
        if (isset($_GET["slug"]) && !empty($_GET["slug"])) {
            $slug       = $_GET["slug"];
            $agent_ia   = agent_ia::findBySlug($slug, $_SESSION["lang"]);
            $pageContact   = getComponent("com_contact");
            $pageReference = getComponent("com_reference");

            // Fixed sections data
            $references   = reference::findAllRand($_SESSION["lang"], true, "5", true);
            $testimonials = temoignage::findAll($_SESSION['lang'], true);
            $toolsId      = tool::findAll(true);
            $tools        = array();
            foreach ($toolsId as $id_tool) {
                $t = new tool($id_tool, $db, $_SESSION['lang']);
                array_push($tools, $t);
            }
            $partnersId = partner::findAll(true, '0,10');
            $partners   = array();
            foreach ($partnersId as $id_partner) {
                $p = new partner($id_partner, $db, $_SESSION['lang']);
                array_push($partners, $p);
            }
            $partnersId2 = partner::findAll(true, '10,10');
            $partners2   = array();
            foreach ($partnersId2 as $id_partner) {
                $p = new partner($id_partner, $db, $_SESSION['lang']);
                array_push($partners2, $p);
            }

            $faqs  = faq::findAll($_SESSION["lang"], true, false, '0,3', $agent_ia->getId());
            $faqs2 = faq::findAll($_SESSION["lang"], true, false, '3,6', $agent_ia->getId());

            include_once("components/com_agents_ia/views/agent_ia/detail.php");
        }
        break;

    default:
        $page        = getComponent("com_agents_ia");
        $agents_ia   = agent_ia::findAll($_SESSION["lang"], true);
        $pageContact = getComponent("com_contact");
          $pageReference = getComponent("com_reference");
        $partnersId = partner::findAll(true, '0,10');
        $partners   = array();
        foreach ($partnersId as $id_partner) {
            $p = new partner($id_partner, $db, $_SESSION['lang']);
            array_push($partners, $p);
        }
        $partnersId2 = partner::findAll(true, '10,10');
        $partners2   = array();
        foreach ($partnersId2 as $id_partner) {
            $p = new partner($id_partner, $db, $_SESSION['lang']);
            array_push($partners2, $p);
        }
        include_once("components/com_agents_ia/views/agent_ia/list.php");
        break;
}
