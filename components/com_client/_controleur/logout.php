<?php 
include "../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');

function logout(){
global $siteURL;
session_start();
		
unset($_SESSION["client"]);
//$p = getComponent("com_client");
//header('location : '.$p->getLink());
echo '1';
}
  ?>