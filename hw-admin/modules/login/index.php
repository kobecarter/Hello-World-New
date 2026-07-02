<?php
// Module Login
$option = @$_GET['option'];
if ($option != "com_login"){
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		if (!$user->isConnected()){
			header ("location:index.php?option=com_login");
			exit;
		}
	}
	else{
		header ("location:index.php?option=com_login");
		exit;
	}
}

// Déconnexion
if ($option == "doLogout"){
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		$user->disconnect();
	}
	if(isset($_SESSION['client'])){
		$client = $_SESSION['client'];
		$client->disconnect();
	}
	session_destroy();
	header ("location:index.php?option=com_login");
	exit;
}
?>