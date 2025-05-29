<?php
	//Start Session
	session_start();

	//Unset variables of session
	session_unset();

	//Destroy Session
	session_destroy();
	
	//Delete the remembered username cookie
	if (isset($_COOKIE['remember_username'])) {
			setcookie("remember_username", "", time() - 3600, "/");
	}
	
	header('Location: index.php');
	exit();
?>