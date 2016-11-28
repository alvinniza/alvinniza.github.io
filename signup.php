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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>Sign Up</title>
</head>

<body>
    
<nav class="noshadow">
    <div class="white nav-wrapper">
        <a href="login.php" class="black-text left brand-logo"><i class="material-icons">arrow_back</i></a>
        <a href="#" class="black-text brand-logo light">Buat Akun</a>
    </div>
</nav> 
    
 <div class="container">
  
        
<form method="post" action="" name="regform" onsubmit="return validate()">
Email <br> <input type="text" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br>
Nama Lengkap <br> <input type="text" name="nama" required pattern="[a-zA-Z][a-zA-Z ]{4,}"><br> 
Password <br><input type="password" name="password" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="UpperCase, LowerCase, Number/SpecialChar and min 8 Chars"><br>
Konfirmasi Password <br><input type="password" name="confpassword"><br>
<p id='passw_error' class='center red-text mt'></p><br>
<button class="btn btn-center green white-text" type="submit" name="signup">SIGN UP </button>    
    
</form>

</div>
    
</body>
</html>

<?php
$result="";
if(isset($_POST["signup"])){
	$emaildb = trim($_POST['email']);
	$namedb = $_POST["nama"];
	$passworddb = trim($_POST['password']);
	$confpassworddb = trim($_POST['confpassword']);
	
	$pwddb = md5($_POST["password"]);
	
	include "conn.php";
	
	$query = mysqli_query($db, "SELECT * FROM users WHERE email='".$emaildb."'");
	if($query->num_rows==0){
		$sql = "INSERT INTO users (name,email,password) values ('$namedb', '$emaildb', '$pwddb')";
		$result = $db->query($sql);
	}
	if($result){
		header("Location:login.php");
	}
	else{
		echo "<p class='center red-text mt'>".'Email already registered! Please try again with another'."</p>";
	}
}
?>

</div>
    
</body>
</html>

<script type="text/javascript">
	var pass = document.forms["regform"]["password"];
	var pass2 = document.forms["regform"]["confpassword"];
	
	var passw_error = document.getElementById("passw_error");
	
	function validate(){
		if(pass.value != pass2.value){
			passw_error.innerHTML = "Password does not match";
			return false;
		}
	}
	
</script>