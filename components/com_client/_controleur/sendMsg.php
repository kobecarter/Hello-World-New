<?php 
include"../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');
session_start();

function newMessage($data){
global $db, $siteURL;	

if(isset($data['message']) && !empty($data['message'])){
	$insertSQL = sprintf("INSERT INTO ".__prefixe_db__."message (contenu, id_parent, fk_projet, titre, date_message, message_vu, fk_departement, HW) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
			GetSQLValueString($data['message'], "text"),
			GetSQLValueString(0, "int"),
			GetSQLValueString($data['projet'], "int"),
			GetSQLValueString($data['objet'], "text"),
			GetSQLValueString(date('Y-m-d H:i:s'), "date"),
			GetSQLValueString(0, "int"),
			GetSQLValueString($data['departement'], "int"),
			GetSQLValueString(0, "int"));
					   
	if(!$db->query($insertSQL)){
	$id_message = $db->last_id();
	
	if(isset($_FILES['userfile']) && $_FILES['userfile']['name']!=''){
		$var = uploadFiles('userfile','../uploads/', array('jpg','jpeg','gif','png','JPG','doc','pdf','PDF','DOC','PNG','GIF'));
		
		if(is_array($var)){
			foreach($var as $doc){	
				$insertSQL = sprintf("INSERT INTO ".__prefixe_db__."file(nom, type, fk_message, fk_projet, fk_departement, date_add) VALUES (%s, 'message', %s, %s, %s, %s)",
						GetSQLValueString($doc, "text"),
						GetSQLValueString($id_message, "int"),
						GetSQLValueString($m->getIdProjet(), "int"),
						GetSQLValueString($m->getIdDepartement(), "int"),
						GetSQLValueString(date('Y-m-d H:i:s'), "text"));
				$db->query($insertSQL);
			}
		}
	
	}
	echo '1'; // succes
	
	}
	else
		echo '2'; // erreur
}
else
	echo '0'; // champs obligatoires
}
?>