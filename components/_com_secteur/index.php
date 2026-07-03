<?php

@$task = $_GET['task'];
switch ($task)
{
    case "showDetails":
        if(isset($_GET["slug"]) && !empty($_GET["slug"])){
                        
            $slug = $_GET["slug"];
            $secteur = secteur::findBySlug($slug, $_SESSION["lang"]);
            $contactPage = getComponent("com_contact");
            
            switch($secteur->getId()){
                case 1 : include_once("components/com_secteur/views/secteur/sante.php"); break;
                case 2 : include_once("components/com_secteur/views/secteur/resto.php"); break;
                case 3 : include_once("components/com_secteur/views/secteur/hotel.php"); break;
                case 4 : include_once("components/com_secteur/views/secteur/immo.php"); break;
                case 5 : include_once("components/com_secteur/views/secteur/finance.php"); break;
                case 6 : include_once("components/com_secteur/views/secteur/marketing.php"); break;
                case 7 : include_once("components/com_secteur/views/secteur/operation.php"); break;
            }
            
        }
        break;

    default :
        include_once("components/com_secteur/views/secteur/list.php");
        break;
}