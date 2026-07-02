<?php  
include"../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');


function nvpassword($data){
global $db, $siteURL;	

$id=$data['id_client']; 

if(!empty($data['pswd1']) && !empty($data['pswd2'])){
	$pswd1=$data['pswd1']; $pswd2=$data['pswd2'];
	if($pswd1 == $pswd2){
		
$r=base64_decode($id);
$a=str_replace("hello","",$r);
$f=str_replace("word","",$a);

$sql="UPDATE ".__prefixe_db__."client set password= '$pswd1' where id='$f' ";
	 $db->query($sql);
	echo 1;
	}
else{
	
	echo 0 ;
}
}

else{
echo 2 ;
}

	
	

	

}

?>