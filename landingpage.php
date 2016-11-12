<?php
	@session_start();	
	include "conn.php";
	
	if($_SESSION['user'])
	{
		echo 'Welcome '.$_SESSION['user'];
		echo "<hr><br><br>";
		echo "<br><a href='logout.php'>Logout</a>";
		?>
		<!doctype html>
		<head>
		<title>home user</title>
		</head>
		<body>
		<h3>Session ini hanya untuk level user</h3>
		<h2>Session ini hanya untuk level user</h2>
		<h3>Session ini hanya untuk level user</h3>
		<h1>Session ini hanya untuk level user</h1>
		</body>
		<?php
	}
	else
	{
		header("location:login.php");
	}
?>