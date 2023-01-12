<?php 
	session_start();

	// connect to database
    $db = new mysqli("127.0.0.1", "root", "", "test", "3306");

	$loggedin = false;
	$username = null;
	$usertype = null;
	
?>