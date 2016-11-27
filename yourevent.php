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

<body class="grey lighten-2">
    
    
<ul id="dropdown1" class="dropdown-content">
  <li><a href="editprofile.php">Edit Profile</a></li>
  <li><a href="#!">Setting</a></li>
  <li><a href="logout.php">Sign out</a></li>
</ul>    
    
<nav class="noshadow">
    <div class="teal nav-wrapper">
        <a href="landingpage.php" class="white-text left brand-logo"><i class="material-icons">arrow_back</i></a>
        <a href="#" data-activates="dropdown1" class="white-text dropdown-button right brand-logo"><i class="material-icons">more_vert</i></a>
    </div>
</nav> 
    
    
    
   <div class="teal section">
              <div class="clearfix center">
              <img src="img/fotoprofil.jpg" class="pp2 circle">             
              <h5 class="mb center-align white-text"><b><?php echo ''.$row['name'];?></b></h5>
              </div>
              </div>
    
    
    <div class="row">
    
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#tab1">Attend to</a></li>
        <li class="tab col s3"><a  href="#tab2">Added by You</a></li>
      </ul>
   
    <!--Isi Tab 1-->    
    <div id="tab1" class="col s12">
        
        <?php
		$sql = "SELECT * FROM event where status='Valid'";
		$result = $db->query($sql);
		$num2 = $result->num_rows;
		//$row = mysqli_fetch_assoc($result);
		//if($row > 0){
		while($row = $result->fetch_assoc()){
		$_SESSION['row'] = $row;
		?>
			<div class="">
			<div class="card horizontal">
			<div class="card-image">
			<a href="detailevent.php?idn=<?php echo ''.$row['id_event'];?>">
			<img src="img/band.jpg">
            </a>
            </div>
            <div class="card-stacked">
            <div class="card-content">
			<a href="detailevent.php?idn=<?php echo ''.$row['id_event'];?>">
            <p class="grey-text"><small><?php echo ''.$row['tanggal'];?></small></p>
            <h6 class="mb2"><b><?php echo ''.$row['nama_event'];?></b></h6>
            <p class="grey-text"><small><?php echo ''.$row['lokasi'];?></small></p>
            </div>
            </div>
            </div>
          </div>
        <?php }
		?>
		
   </div>
    <!--Isi Tab 2-->    
    <div id="tab2" class="col s12">
        
        
		<?php
		$sql = "SELECT * FROM event where proposedby = '$email' order by status desc";
		$result = $db->query($sql);
		$num = $result->num_rows;
		//$row = mysqli_fetch_assoc($result);
		//if($row > 0){
		while($row = $result->fetch_assoc()){
		$_SESSION['row'] = $row;			
		?>
			<div class="">
			<div class="card horizontal">
			<div class="card-image">
			<a href="detailevent.php?idn=<?php echo ''.$row['id_event'];?>">
			<img src="img/band.jpg">
            </a>
            </div>
            <div class="card-stacked">
            <div class="card-content">
			<a href="detailevent.php?idn=<?php echo ''.$row['id_event'];?>">
            <p class="grey-text"><small><?php echo ''.$row['tanggal'];?></small></p>
            <h6 class="mb2"><b><?php echo ''.$row['nama_event'];?></b></h6>
            <p class="grey-text"><small><?php echo ''.$row['lokasi'];?></small></p>
			<?php if($row['status'] == 'Valid'){ ?>
				<p class="green-text"><b><?php echo ''.$row['status'];?></b></p>
			<?php
			}else if($row['status'] == 'Rejected'){ ?>
				<p class="red-text"><b><?php echo ''.$row['status'];?></b></p>
			<?php
			}else if($row['status'] == 'in Confirmation'){ ?>	
				<p class="grey-text"><b><?php echo ''.$row['status']; }?></b></p>
            </div>
            </div>
            </div>
          </div>
        <?php }
		?>
  </div>
    
    
    
 <div class="container">        

     
     
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