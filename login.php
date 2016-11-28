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
    

<title>Login</title>
</head>

<body>
    
<nav class="noshadow">
    <div class="white nav-wrapper">
        <a href="signup.php" class="black-text left brand-logo"><i class="material-icons">arrow_back</i></a>
        <a href="#" class="black-text brand-logo light">Selamat Datang!</a>
    </div>
</nav> 
    
 <div class="container">
  
        
<form method="post" action="">
Email <br> <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value=""><br>
Password <br><input type="password" name="password" required><br>

<!-- <button class="btn btn-center green white-text" type="submit" name="signin">LOG IN </button>     -->
<input type="submit" class="btn btn-center green white-text"  name="signin" value="LOG IN">
   
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
			$cek = $sql->num_rows;
			//$cek = mysqli_num_rows($sql);
			if($cek > 0){
				if($data['level'] == "admin"){
					//echo "sukses login sebagai admin";
					@$_SESSION['admin'] = $data['email'];	
					header("Location:landingpage.php");
				}
				else if($data['level'] == "user"){
					//echo "sukses login sebagai user";
					@$_SESSION['user'] = $data['email'];
					header("Location:landingpage.php");
				}
			}
			else{
				echo "<p class='center red-text mt'>".'The password you entered is incorrect'."</p>";
			}
		}
	}
?>

<p class="p1"><a href=#>Lupa password?</a></p>

</div>
    
</body>
</html>