<?php 
include "../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');

function sendResponse($data){
global $db;	
if(isset($data["last_msg"]) && !empty($data["last_msg"]) && isset($data["contenu"]) && !empty($data["contenu"])){

$m = new message($data["last_msg"],$db);

$insertSQL = sprintf("INSERT INTO ".__prefixe_db__."message(contenu, id_parent, fk_projet, titre, date_message, message_vu, fk_departement, HW ) VALUES (%s, %s, %s, '', NOW(), 0, %s, 0)",
		GetSQLValueString($data['contenu'], "text"),
		GetSQLValueString($data['last_msg'], "int"),
		GetSQLValueString($m->getIdProjet(), "int"),
		GetSQLValueString($m->getIdDepartement(), "int"));
				   
$db->query($insertSQL);
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
echo '1';
}
else
	echo '0';
}
?>