<?php
	@session_start();
	include "conn.php";

	if($_SESSION['user'] || $_SESSION['admin'])
	{
		?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>Landing Page</title>
</head>

<body class="grey lighten-2">
    
   
<nav class="teal nav-long">
    
   <div class="nav-wrapper">
       <a href="landingpage.php" class="white-text left brand-logo"><i class="material-icons">arrow_back</i></a>
       
       <form class="ml">
          
         
            <div class="input-field">
          <input placeholder="Search events" id="name-search" class="ml" type="search" required>
          <label for="name-search"><i class="material-icons white-overlay">search</i></label>
          <i class="material-icons">close</i>
            </div>
          
          <div class="input-field">
          <input placeholder="Enter location" id="place-search" class="ml" type="search" required>
          <label for="place-search"><i class="material-icons white-overlay">room</i></label>
          <i class="material-icons">close</i>
            </div>
              
      </form>
           
    </div>
  </nav>
 
    
    
    <div class="container">
    <p>Categories</p>
        </div>
    
 <div class="collection">
        <a href="#!" class="collection-item">Music</a>
        <a href="#!" class="collection-item">Business</a>
        <a href="#!" class="collection-item">Food</a>
        <a href="#!" class="collection-item">Community</a>
        <a href="#!" class="collection-item">Festival</a>
        <a href="#!" class="collection-item">Arts</a>
        <a href="#!" class="collection-item">Film & Media</a>
        <a href="#!" class="collection-item">Sport</a>
        <a href="#!" class="collection-item">Health</a>
        <a href="#!" class="collection-item">Science</a>
        <a href="#!" class="collection-item">Technology</a>
        <a href="#!" class="collection-item">Travel</a>
      </div>
    
    
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
    
</body>
</html>

<?php
	}
	else
	{
		header("location:login.php");
	}
?>