<?php
	$serverName = 'localhost';
	$userName = 'root';
	$pass = '';
	$dbName = "session";
	
	// Create connection
	$db = mysqli_connect($serverName, $userName, $pass, $dbName);

	// Check connection
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>