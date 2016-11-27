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
    

<title>Filter</title>
</head>

<body class="grey lighten-2">
    

    
<nav class="noshadow">
    <div class="teal nav-wrapper">
        <a href="landingpage.php" class="white-text left brand-logo"><i class="material-icons">arrow_back</i>FILTER</a>
    </div>
</nav> 
    
    <div class="row">
    
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#tab1">Top</a></li>
        <li class="tab col s3"><a  href="#tab2">New</a></li>
		<li class="tab col s3"><a  href="#tab3">Free</a></li>
		<li class="tab col s3"><a  href="#tab4">By Date</a></li>
      </ul>
	
   
    	<!--Isi Tab 1-->    
    <div id="tab1" class="col s12">
		<?php
		$sql = "SELECT * FROM event WHERE status ='Valid' ORDER BY view DESC limit 5";
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
		$sql = "SELECT * FROM event Where status='Valid' ORDER BY id_event DESC LIMIT 10";
		
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
    
    <!--Isi Tab 3-->    
    <div id="tab3" class="col s12">
        <?php
		$sql = "SELECT * FROM event where harga=0 AND status='Valid'";
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
			</a>
            </div>
            </div>
            </div>
          </div>
        <?php }
		?>
		
   </div>
   
    <!--Isi Tab 4-->    
    <div id="tab4" class="col s12">
		<div class="row">
        <div class="col s12 m7">
          <div class="card zeromarg">
                <ul class="collapsible" data-collapsible="accordion">
                    
                    <li>
                      <div class="collapsible-header"><b>DATE</b></div>
                        
                        
                      <div class="collapsible-body">
                          <form action="#">
                    <p>
                      <input class="with-gap" name="dateradio" type="radio" id="alldate"  />
                      <label for="alldate">All Dates</label>
                    </p>
                        <p>
                      <input class="with-gap" name="dateradio" type="radio" id="today"  />
                      <label for="today">Today</label>
                    </p>
                        <p>
                      <input class="with-gap" name="dateradio" type="radio" id="bsk"  />
                      <label for="bsk">Tomorrow</label>
                    </p>
                        <p>
                      <input class="with-gap" name="dateradio" type="radio" id="wkd"  />
                      <label for="wkd">Weekend</label>
                    </p>

                        <p>
                         <input class="with-gap" name="dateradio" type="radio" id="pd"  />
                            <label for="pd">Choose tanggal</label>
                            </p>
                        
                            <div id="datepick" class="container">
                             <input type="date" class="datepicker"> to <input type="date" class="datepicker"> 
                            </div>
                  </form>                        
				  <input type="submit" class="btn btn-center green white-text"  name="save" value="SAVE"><br>
                        </div>    
                    
                    </li>
                    
                    </ul>
                       
          </div>
        </div>
      </div>
	</div>
   
   
 <div class="container">        

     
     
</div>
       
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script>

$('.datepicker').datepicker({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 2 // Creates a dropdown of 15 years to control year
  });

</script>
    
</body>
</html>

<?php
	}
	else
	{
		header("location:login.php");
	}
?>