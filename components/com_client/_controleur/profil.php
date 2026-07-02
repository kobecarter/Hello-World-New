<?php 
include "../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');
session_start();

function editProfil($data){
global $db;

$password = isset($data['password']) && !empty($data['password']) ? ', password = '.GetSQLValueString(md5($data['password']), "text") : '';
if(isset($data['telephone']) && !empty($data['telephone']) && isset($data['email']) && !empty($data['email']) && isset($_SESSION['client'])){
	
	$updateSQL = sprintf("UPDATE ".__prefixe_db__."client SET prenom=%s, email=%s, telephone=%s, nom=%s $password WHERE id=%s",
	   GetSQLValueString($data['prenom'], "text"),
	   GetSQLValueString($data['email'], "text"),
	   GetSQLValueString($data['telephone'], "text"),
	   GetSQLValueString($data['nom'], "text"),
	   GetSQLValueString($_SESSION['client']->getId(), "int"));

	if(!$db->query($updateSQL))
		echo '1';
	else
		echo '2';
}
else
	echo '0';
}
?>