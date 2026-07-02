<?php

require_once("config.php");
require_once("instanceDb.php");
require_once('includes/functions/functions.php');

if (!isset($_SESSION)){
	session_start();	
}
require_once('includes/traduction.php');
require_once('modules/login/index.php');

$option = isset($_GET['option']) ? $_GET['option'] : "com_dashboard";

if($option != 'com_login'){
	include("includes/tpl/top.php");
	include("includes/tpl/sidebar.php");
}

if (preg_match("/com_/i",$option) && file_exists("components/".$option."/index.php")){
    if($option == "com_module" || $option == "com_lang"){
        if($_SESSION["user"]->isDev()){
            include("components/" . $option . "/index.php");
        } else {
            show404Error("404");
        }
    } else {
        include("components/" . $option . "/index.php");
    }
}else if($option == ""){
	@header("location:index.php?option=com_dashboard");
}else{
	show404Error("404");
}
if($option != 'com_login')
include("includes/tpl/bottom.php");
?>