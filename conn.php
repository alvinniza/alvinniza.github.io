<?php

	$serverName = 'localhost';
	$userName = 'root';
	$pass = '';
	$dbName = "session";
/*

	$serverName = 'mysql.idhostinger.com';
	$userName = 'u686892199_ evtr1';
	$pass = 'sVVyp56wqdmIrprQgL';
	$dbName = "u686892199_ event";
	*/
	// Create connection
	$db = mysqli_connect($serverName, $userName, $pass, $dbName);

	// Check connection
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>