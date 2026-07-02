<?php include"../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');
session_start();

function login($data){
global $db, $siteURL;	
if (isset($data['login']) && isset($data['mdp']) && !empty($data['login'])&& !empty($data['mdp']) ){
	
	$login = $data['login']; 
	$mdp = md5($data['mdp']);
	
	$SQLselect = "SELECT * FROM ".__prefixe_db__."client WHERE login='$login' AND password='$mdp' ";
	$result = $db->query($SQLselect);

	if ($db->num_rows($result) == 1) {
		$data2 = $db->fetch_array($result);
		$id_client = $data2["id"];
		$c = new client($id_client,$db);
		$_SESSION['client'] = $c;
		

		echo 1;
	}
	else
		echo 2;

}
else
	echo 0;
}
?>

