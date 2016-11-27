<?php
	include("session.php");
	
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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>Start</title>
</head>

    
<body class="startbg">
    
  <div class="container">
  
      <h4 class="ads"><span class="white-text"><strong>Dapatkan <br> pengalaman <br> mencari event <br> di sini   
        </strong></span></h4> 
    
      
<form class="white-text" method="post" action="signup.php">
    Email <br><input class="darkfill white-text" type="text" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" ><br>
    <button class="green white-text btn btn-center" type="submit" name="start">MULAI</button>    
</form>  

<?php
	require_once("session.php");
	if (isset($_POST['submit'])) { 
		 $_SESSION['email'] = $_POST['email'];
	} 
?>

<p class="p1 light white-text">Masuk untuk mendapatkan pengalaman</p>


</div>

</body>
</html>