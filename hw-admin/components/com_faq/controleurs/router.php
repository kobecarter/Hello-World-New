<?php
require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addFaq' :
            if ($_SESSION['user']->hasDroit('add', 'com_faq')) {
                include_once ("faq/controleur.php");
            }
            break;
        case 'editFaq' :
            if ($_SESSION['user']->hasDroit('edit', 'com_faq')) {
                include_once ("faq/controleur.php");
            }
            break;
        case 'deleteFaq' :
            if ($_SESSION['user']->hasDroit('delete', 'com_faq')) {
                include_once ("faq/controleur.php");
            }
            break;
        case 'enableFaq' :
            if ($_SESSION['user']->hasDroit('edit', 'com_faq')) {
                include_once ("faq/controleur.php");
            }
            break;
        case 'deleteFaqs' :
            if ($_SESSION['user']->hasDroit('delete', 'com_faq')) {
                include_once ("faq/controleur.php");
            }
            break;
        case 'enableFaqs' :
            if ($_SESSION['user']->hasDroit('edit', 'com_faq')) {
                include_once ("faq/controleur.php");
            }
            break;
        
    }
}