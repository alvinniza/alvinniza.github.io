<?php
	@session_start();
	include "conn.php";
	$email = $_SESSION['user'];
	if($_SESSION['user'] || $_SESSION['admin'])
	{
		$sql = "SELECT * FROM users where email='$email'";
		$result = $db->query($sql);
		$num = $result->num_rows;
		$row = $result->fetch_assoc();
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

<body>   
    

<nav class="noshadow">
    <div class="teal nav-wrapper">
        <a href="landingpage.php" class="white-text left brand-logo"><i class="material-icons">arrow_back</i></a>
        <!-- <a href="#" class="mi2 white-text right">SAVE</a> -->
    </div>
</nav> 
   <div class="teal section">
              <div class="mb3 clearfix center">
			  <img src="<?php if($row['image']==null){ echo 'profpic/default.jpg';} else{ echo 'profpic/'.$row['image'];} ?>" class="pp3 circle"></img>
                <a class="ppbutton btn-floating btn-small waves-effect waves-light orange" href="imgupload.php"><i class="material-icons">mode_edit</i></a>
              </div>
    </div>
    
    <div class="row mb3 mt3">
    <form class="col s12" method="post" action="">
      <div class="row">
        <div class="input-field">
            
          <input id="name" name="name" type="text" class="validate" value="<?php echo ''.$row['name'];?>" required>
          <label for="name">Name</label>
          </div>
         
          <div class="input-field">
          <input id="address" name="address" type="text" class="validate" value="<?php echo ''.$row['address'];?>">
          <label for="address">Address</label>
          </div>
          
          <div class="input-field">
          <input id="hp" name="hp" type="number" class="validate" value="<?php echo ''.$row['nohp'];?>">
          <label for="hp">Phone Number</label>
        </div>
          <input type="submit" class="btn btn-center green white-text"  name="save" value="SAVE">
        </div>
    </form>
	<?php
	$name = @$_POST["name"];
	$address = @$_POST["address"];
	$hp = @$_POST["hp"];
	$save = @$_POST["save"];
	if($save){
		if($name == ""){
			echo "invalid name!";
		}
		else{
			//$query = mysqli_query($db, "select * from event where name= '$name' AND location = '$loc'") or die (mysqli_error());
			//$data = mysqli_fetch_array($query);
			//$cek = mysqli_num_rows($query);
			$sql = "UPDATE users SET name = '$name', address = '$address', nohp = '$hp' WHERE email='$email'";
			
			//$sql = "ALTER INTO event (nama_event,deskripsi,harga,lokasi,kontak,website,kategori,tanggal) values ('$name', '$desc', '$harga', '$loc', '$cont', '$web', '$cat', '$date')";
			//$result = mysqli_query($db, $sql);
			$result = $db->query($sql);
			if($result){
				header("Location:reseditprof.php");
			}
			else{
				echo 'Error inserting new Event';
			}
		}		
	}
	?>
	
	
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