<?php 
include"../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');
session_start();

function addTemoignage($data){
global $db;

if(isset($data['fonction']) && !empty($data['fonction']) && isset($data['sujet']) && !empty($data['sujet']) && isset($data['temoignage']) && !empty($data['temoignage']) && isset($_SESSION["client"])){
$c = $_SESSION["client"];
$insertSQL = sprintf("INSERT INTO ".__prefixe_db__."temoignage (id_client, nom, fonction, email, sujet, temoignage, date_add, actif) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
		GetSQLValueString($c->getId(), "int"),
		GetSQLValueString($c->getNom(), "text"),
		GetSQLValueString($data['fonction'], "text"),
		GetSQLValueString($c->getEmail(), "text"),
		GetSQLValueString($data['sujet'], "text"),
		GetSQLValueString($data['temoignage'], "text"),
		GetSQLValueString(date('Y-m-d H:i:s'), "date"),
		GetSQLValueString(0, "int"));
if(!$db->query($insertSQL)){
	
	$SQLselect = "SELECT id FROM ".__prefixe_db__."departement";
	$result = $db->queryS($SQLselect);
	foreach($result as $data){
		$d = new departement($data['id'],$db);
		if(isset($data['depart'.$d->getId()]) && !empty($data['depart'.$d->getId()])){
			$score = $data['depart'.$d->getId()];
			$insertSQL = sprintf("INSERT INTO ".__prefixe_db__."temoignage_departement (fk_departement, score, fk_client) VALUES (%s, %s, %s)",
					GetSQLValueString($d->getId(), "int"),
					GetSQLValueString($score, "int"),
					GetSQLValueString($c->getId(), "int"));
			$db->query($insertSQL);
		}
	}
	
	echo '1'; // succès
}
else
	echo '2'; // Erreur
}
else
	echo '0'; // champs obligatoires
}
?>