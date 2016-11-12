<?php
	@session_start();	
	include "conn.php";
	
	if($_SESSION['admin'])
	{
		echo 'Welcome '.$_SESSION['admin'];
		echo "<hr><br><br>";
		echo "<br><a href='logout.php'>Logout</a>";
		?>
		<!doctype html>
		<head>
		<title>home admin</title>
		</head>
		<body>
		<h3>Session ini hanya untuk level admin</h3>
		</body>
		<?php
	}
	else
	{
		header("location:login.php");
	}
?>