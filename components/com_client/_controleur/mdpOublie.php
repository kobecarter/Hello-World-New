<?php  
include"../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');
session_start();

function mdpOublie($data){
global $db, $siteURL;	
$login=$data['login']; 
	
	$sql = "SELECT * from ".__prefixe_db__."client where login='$login' or email='$login' ";
	$result = $db->query($sql);

	if ($db->num_rows($result) == 1) {
		$data2 = $db->fetch_array($result);
		$id_client = $data2["id"];
		$c = new client($id_client,$db);
		$email=$c->getEmail();$nom=$c->getNom();
		$msg="un email de reinitialisation est envoye";
		
		$nvid=base64_encode ("hello".$id_client."word" );
		
		$lien="http://www.helloworld-agency.com/client/index.php?option=com_test&task=reinitialisation&id=$nvid" ;
	    $contenu="Bonjour ".$nom." 
	Nous avons reçu une demande de réinitialisation de votre mot de passe. Si vous n'avez pas fait cette demande, ignorez simplement cet e-mail. Sinon, vous pouvez le réinitialiser en suivant ce lien : $lien ";
	mail($email, "email de reinitialisation", $contenu);
	

	}
	else{
		
		$msg=" votre login/email n'existe pas" ;
	}
	
	echo $msg;
}


?>