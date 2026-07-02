<?php
include "../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');

function downloadFile($data){
global $db, $siteURL;

if(isset($data['file']) && !empty($data['file'])){
	$id = base64_decode($data['file']);
	$id = str_replace("Hello","",$id);
	$id = str_replace("World","",$id);
	$id = intval($id);

	$f = new fil($id,$db);	
	$file = '../uploads/'.$f->getNom();

	if(file_exists($file)){
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($f->getNom()).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		readfile($file);
		exit;
	}			
	else
		die('does not existe');
}

// telechargement des factures
if(isset($data['invoice']) && !empty($data['invoice'])){
	$f = base64_decode($data['invoice']);
	$f = str_replace("Hello","",$f);
	$f = str_replace("World","",$f);

	$file = '../uploads/'.$f;

	if(file_exists($file)){
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($f).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		readfile($file);
		exit;
	}			
	else
		die('does not existe');
}
}
?>