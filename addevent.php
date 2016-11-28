<?php
	@session_start();
	include "conn.php";
	$email = $_SESSION['user'];
	if($_SESSION['user'] || $_SESSION['admin'])
	{
		$sql = "SELECT * FROM event";
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
   

   <nav class="teal nav">
   <div class="nav-wrapper">
       <a href="landingpage.php" class="white-text left brand-logo"><i class="material-icons">arrow_back</i>Add Event</a>
    </div>
  </nav>   
    

    <div class="row mb3 mt3">
     <form class="col s12" method="post" enctype="multipart/form-data" action="addeventprocess.php">
      <div class="row">
        <div class="input-field">
          <input id="eventname" name="eventname" type="text" class="validate" required>
          <label for="eventname">Event Name*</label>
        </div>
		
		<div class="file-field input-field">
            <div class="btn">
                <span>Choose</span>
                <input name="eventimage" type="file" class="validate">
              </div>

		<div class="file-path-wrapper">
                <input placeholder="Select event poster" class="file-path validate" type="text">
              </div>
        </div>

		<br>

		<div class="input-field">
          <p>Date*</p>
		  <input id="date" type="date" name="eventdate" class="datepicker validate" required>
        </div>
		
          <div class="input-field">
          <textarea id="eventdecs" name="eventdesc" class="materialize-textarea"></textarea>
          <label for="eventdecs">Description</label>
        </div>
          
          <div class="input-field">
          <input id="loc" type="text" name="eventloc" class="validate" required>
          <label for="loc">Location*</label>
        </div>
          
          <div class="input-field">
          <input name="eventcat" id="category" type="text" class="validate" required>
          <label for="category">Categories*</label>
        </div>
		  
		  <div class="input-field">
			  <input name="eventprc" id="price" type="number" class="validate" placeholder="0 for free, without ',' and '.' " required pattern "0-9">
			  <label for="price">Price*</label>
		  </div>
		  
          <div class="input-field">
          <input name="eventcont" id="contact" type="number" class="validate" required>
          <label for="Contact">Contact*</label>
        </div>
		
		<div class="input-field">
          <input name="eventweb" id="web" type="text" class="validate" placeholder="without 'http://' and 'www.'">
          <label for="Website">Website</label>
        </div>
          <input type="submit" class="btn btn-center green white-text"  name="save" value="SAVE">
        </div>
	</div>
    </form>
	
    
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