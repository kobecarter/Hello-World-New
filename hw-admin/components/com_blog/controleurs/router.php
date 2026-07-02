<?php
require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task)
    {
        case 'addPost' :
            if ($_SESSION['user']->hasDroit('add', 'com_blog')) {
                include_once ("blog/controleur.php");
            }
            break;
        case 'editPost' :
            if ($_SESSION['user']->hasDroit('edit', 'com_blog')) {
                include_once ("blog/controleur.php");
            }
            break;
        case 'deletePost' :
            if ($_SESSION['user']->hasDroit('delete', 'com_blog')) {
                include_once ("blog/controleur.php");
            }
            break;
        case 'enablePost' :
            if ($_SESSION['user']->hasDroit('edit', 'com_blog')) {
                include_once ("blog/controleur.php");
            }
            break;
        case 'deletePosts' :
            if ($_SESSION['user']->hasDroit('delete', 'com_blog')) {
                include_once ("blog/controleur.php");
            }
            break;
        case 'enablePosts' :
            if ($_SESSION['user']->hasDroit('edit', 'com_blog')) {
                include_once ("blog/controleur.php");
            }
            break;
        
    }
}