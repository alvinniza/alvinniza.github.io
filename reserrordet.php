<?php
	@session_start();
	include "conn.php";

	if($_SESSION['user'] || $_SESSION['admin'])
	{
		//header("refresh:3;url=landingpage.php");
		
		?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>ERROR PAGE</title>
</head>

<body>
<nav class="noshadow">
    <div class="teal nav-wrapper">
        <a href="landingpage.php" class="white-text left brand-logo"><i class="material-icons">arrow_back</i>Page Error</a>
    </div>
</nav>    
	
	
<nav class="noshadow">
    <div class="white nav-wrapper">
        <a href="#" class="black-text brand-logo light"></a>
    </div>
</nav> 

 <div class="container">
 <h3 style="text-align:center"><b><i>PAGE NOT FOUND!</i></b></h3>
	</div>
<?php
	}
	else
	{
		header("location:login.php");
	}
?>