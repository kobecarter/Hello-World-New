<?php

@$task = $_GET['task'];
switch ($task) {
    default:
        $page = getComponent("com_formation");
       $pageContact = getComponent("com_contact");
	    $pageReference = getComponent("com_reference");
      	$testimonials = temoignage::findAll($_SESSION['lang'], true);
        include_once("components/com_formation/views/formation/list.php");
        break;
}