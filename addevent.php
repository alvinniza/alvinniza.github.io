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

<body>   
   

<div class="parallax-container">
    
     
    <a href="landingpage.php" class="mi white-text left"><i class="material-icons">arrow_back</i></a>
      <!-- <a href="#" class="mi white-text right">SAVE</a> -->
    
     <div class="bottomleft"><a href="#" class="white-text"></a><p class="white-text">Click here to edit photo</p>
    </div>
  
    <div class="parallax"><img src="img/teal.jpg">    
    </div>
    
    <a class="bottomright btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>

    
</div>
    
    

    <div class="row mb3 mt3">
     <form class="col s12" method="post" action="">
      <div class="row">
        <div class="input-field">
          <input id="eventname" name="eventname" type="text" class="validate" required>
          <label for="eventname">Event Name</label>
        </div>
		
		<div class="input-field">
          <p>Image</p>
		  <input id="image" type="file" name="eventimage" class="validate">
        </div>
		<br>
		<div class="input-field">
          <p>Date</p>
		  <input id="date" type="date" name="eventdate" class="validate" required
        </div>
		
          <div class="input-field">
          <textarea id="eventdecs" name="eventdesc" class="materialize-textarea"></textarea>
          <label for="eventdecs">Description</label>
        </div>
          
          <div class="input-field">
          <input id="loc" type="text" name="eventloc" class="validate" required>
          <label for="loc">Location</label>
        </div>
          
          <div class="input-field">
          <input name="eventcat" id="category" type="text" class="validate" required>
          <label for="category">Categories</label>
        </div>
          
          <!--
		  <div class="input-field">
              Price
              <p>
                <input class="with-gap" name="eventprc" type="radio" id="payless" value=0 />
                <label for="payless">Free</label>
              </p>
              
              <p>
                <input class="with-gap" name="eventprc" type="radio" id="pay" value=/>
                <label for="pay"><input placeholder="without ',' & '.'" id="paynom" type="number" class="validate" min=1 ></label>
                </p>
          </div>
		  -->
		  
		  <div class="input-field">
			  <input name="eventprc" id="price" type="number" class="validate" placeholder="0 for free, without ',' and '.' " required pattern "0-9">
			  <label for="price">Price</label>
		  </div>
		  
          <div class="input-field">
          <input name="eventcont" id="contact" type="number" class="validate" required>
          <label for="Contact">Contact</label>
        </div>
		
		<div class="input-field">
          <input name="eventweb" id="web" type="text" class="validate" placeholder="without 'http://' and 'www.'">
          <label for="Website">Website</label>
        </div>
          <input type="submit" class="btn btn-center green white-text"  name="save" value="SAVE">
        </div>
	</div>
    </form>
	<?php
	$name = @$_POST["eventname"];
	$desc = @$_POST["eventdesc"];
	$loc = @$_POST["eventloc"];
	$cat = @$_POST["eventcat"];
	$harga = @$_POST["eventprc"];
	$cont = @$_POST["eventcont"];
	$web = @$_POST["eventweb"];
	$date = @$_POST["eventdate"];
	$save = @$_POST["save"];
	if($save){
		if($name == ""){
			echo "invalid name!";
		}
		else if($loc == ""){
			echo "invalid location!";
		}
		else if($cont == ""){
			echo "invalid contact!";
		}
		else if($cat == ""){
			echo "invalid category!";
		}
		else{
			//$query = mysqli_query($db, "select * from event where name= '$name' AND location = '$loc'") or die (mysqli_error());
			//$data = mysqli_fetch_array($query);
			//$cek = mysqli_num_rows($query);
			
			$sql = "INSERT INTO event (nama_event,deskripsi,harga,lokasi,kontak,website,kategori,tanggal) values ('$name', '$desc', '$harga', '$loc', '$cont', '$web', '$cat', '$date')";
			//$result = mysqli_query($db, $sql);
			$result = $db->query($sql);
			if($result){
				header("Location:resaddevent.php");
			}
			else{
				echo 'Error inserting new Event';
			}
		}		
	}
	?>
	
	
  
    
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