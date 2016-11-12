<html >
<header>
<link rel="stylesheet" type="text/css" href="style.css">

<title>Start Page</title>

</header>

<body>
	
	<div>
	<h3>Dapatkan Pengalaman mencari event disini</h3>
	</div>

	<form action="" method="post">
	
	<br><br>email<br>
	<input type="text" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
	<div id="passw_error" class="alert"></div>
	<br><br>
	<br><input type="submit" name="mulai" value="Mulai">
	</form>
	
	<?php
	if(isset($_POST["mulai"])){
		$email = trim($_POST['email']);
		
		include "conn.php";
		
		$query = mysqli_query($db, "SELECT * FROM users WHERE email='".$email."'");
		//di database email belum ada yang sama
		if(mysqli_num_rows($query)==0){
			echo "Email Available!<br>Redirecting you to sign up Page....";
			header("refresh:3;url=register.php");
		}
		//udah ada email yang sama
		else{
			echo "Email already registered!<br>Redirecting you to sign in Page....";
			header("refresh:3;url=login.php");
		}
	}
	?>
	
</body>


</html>