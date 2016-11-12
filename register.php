<!doctype html>
<html>
<head>
<title>Register Form</title>
</head>

<body>
<h2>Sign Up</h2>
<h4>sudah punya akun? <a href="login.php">masuk disini</a></h4><br><br><hr>

<form name="regform" action="" method="post" onsubmit="return validate()">
	name<br>
	<input type="text" name="name" required">
	
	<br><br>email<br>
	<input type="text" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
	
	<br><br>password<br>
	<input type="password" name="password" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="UpperCase, LowerCase, Number/SpecialChar and min 8 Chars">
	
	<br><br>confirm password<br>
	<input type="password" name="confpassword" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="UpperCase, LowerCase, Number/SpecialChar and min 8 Chars">
	<div id="passw_error" class="alert"></div>
	
	<input type="submit" value="Sign Up" name="signup" />
</form>

<?php
$result="";
if(isset($_POST["signup"])){
	$name = $_POST["name"];
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$confpassword = trim($_POST['confpassword']);
	
	$pwd = md5($_POST["password"]);
	
	include "conn.php";
	
	$query = mysqli_query($db, "SELECT * FROM users WHERE email='".$email."'");
	if(mysqli_num_rows($query)==0){
		$sql = "INSERT INTO users (name,email,password) values ('$name', '$email', '$pwd')";
		$result = mysqli_query($db, $sql);
	}
	if($result){
		echo "Account Successfully Created<br>Loading....";
		header("refresh:3;url=login.php");
	}
	else{
		echo "Email already registered! Please try again with another";
	}
}
?>

</body>
</html>
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

