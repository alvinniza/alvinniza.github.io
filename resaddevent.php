<?php
	@session_start();
	include "conn.php";

	if($_SESSION['user'] || $_SESSION['admin'])
	{
		header("refresh:1;url=landingpage.php");
		
		?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>EVENT INSERTED SUCCESSFULLY</title>
</head>

<body>
    
<nav class="noshadow">
    <div class="white nav-wrapper">
        <a href="#" class="black-text brand-logo light">EVENT</a>
    </div>
</nav> 

 <div class="container">
 <p style="text-align:center">New event inserted successfully</p>
 <p style="text-align:center">Please wait while our team review your event</p>
	</div>
<?php
	}
	else
	{
		header("location:login.php");
	}
?>