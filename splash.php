<?php
@session_start();
include "conn.php";

if(@$_SESSION['admin']){
	header("Location: landingpage.php");
}
else if(@$_SESSION['user']){
	header("Location: landingpage.php");
}
?>	

<!doctype html>
<html>
<head>

	<meta http-equiv=REFRESH CONTENT=1.5;url='start.php'>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>Splash</title>
</head>

<body class="grad">
    
    <div class="logo">
    <img src="img/logo.png" class=""> 
    </div>
    
    
</body>
</html>

