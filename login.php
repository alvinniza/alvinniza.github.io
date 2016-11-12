<?php
@session_start();
include "conn.php";

if(@$_SESSION['admin']){
	header("location: homeadmin.php");
}
else if(@$_SESSION['user']){
	header("location: landingpage.php");
}

?>
<!doctype html>
<html>
<head>
<title>Login Form</title>
</head>
<body>
<h2>Login Form</h2>
<form method="post" action="">
Email: <br><input type="text" name="email"><br>
Password: <br><input type="password" name="password"><br>
<input type="submit" name="signin" value="Login">
</form>

<?php
	$email = @$_POST["email"];
	$password = @$_POST["password"];
	$msk = @$_POST["signin"];
	if($msk){
		if($email == ""){
			echo "email kosong";
		}
		else if($password == ""){
			echo "password kosong";
		}
		else{
			$sql = mysqli_query($db, "select * from users where email= '$email' AND password = md5('$password')") or die (mysqli_error());
			$data = mysqli_fetch_array($sql);
			$cek = mysqli_num_rows($sql);
			if($cek > 0){
				if($data['level'] == "admin"){
					//echo "sukses login sebagai admin";
					@$_SESSION['admin'] = $data['email'];
					header("location:homeadmin.php");
				}
				else if($data['level'] == "user"){
					//echo "sukses login sebagai user";
					@$_SESSION['user'] = $data['email'];
					header("location:landingpage.php");
				}
			}
			else{
				echo "Login gagal";
			}
		}
	}
	
?>

<h4>belum punya akun? <a href="register.php">daftar disini</a></h4>

</body>
</html>