<?php
	@session_start();
	include "conn.php";

	if($_SESSION['user'] || $_SESSION['admin'])
	{
		header("refresh:1;url=editprofile.php");
		
		?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>PROFILE UPDATED SUCCESSFULLY</title>
</head>

<body>
    
<nav class="noshadow">
    <div class="white nav-wrapper">
        <a href="#" class="black-text brand-logo light">PROFILE UPDATED SUCCESSFULLY</a>
    </div>
</nav> 

 <div class="container">
 <p style="text-align:center">Edit profile updated successfully</p>
 <p style="text-align:center">Redirecting you back to edit profile page</p>
	</div>
<?php
	}
	else
	{
		header("location:login.php");
	}
?>