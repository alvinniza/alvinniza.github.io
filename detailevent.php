<?php
	@session_start();
	include "conn.php";
	$email = $_SESSION['user'];
	if($_SESSION['user'] || $_SESSION['admin'])
	{
		//$token = md5('katacak');
		$idn=$_GET['idn']; // Collecting data from query string
		$sql0 = "SELECT * FROM event WHERE id_event='$idn'";
		$query = $db->query($sql0);
		if(mysqli_num_rows($query)==0){
			header("refresh:0.5;url=reserrordet.php");
			exit;
		}
		else{
			if(!is_numeric($idn)){ // Checking data it is a number or not
			header("refresh:0.5;url=reserrordet.php");
			exit;
			}
			else if($idn <1){
				header("refresh:0.5;url=reserrordet.php");
				exit;
			}
		}
	
		$sql = "SELECT * FROM event where id_event='$idn'";
		$result = $db->query($sql);
		$num = $result->num_rows;
		$row = $result->fetch_assoc();
		
		
		$current_views = $row['view'];
		$new_views = $current_views + 1;
		$update_view_counts = "UPDATE event SET view ='$new_views' WHERE id_event='$idn' ";
		$count_views = $db->query($update_view_counts);
		?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>Detail Event</title>
</head>


<body class="grey lighten-2">
    
     
    
<div class="parallax-container">
    
     
    <a href="javascript:history.go(-1)" class="mi white-text left"><i class="material-icons">arrow_back</i></a>
      <a href="#" class="mi white-text right"><i class="material-icons">notifications</i></a>
    
     <div class="bottom"><a href="#" class="white-text"><i class="material-icons">person</i></a><p class="nomarg white-text">1250</p>
    </div>
  
    <div class="parallax"><img src="<?php if($row['poster']==null){ echo 'evnt/default.png';} else{ echo 'evnt/'.$row['poster'];} ?>">    
    </div>

    
</div>
    

<div class="section white">
    <div class="row container">
        <p class="center-align header"><small><?php echo ''.$row['tanggal'];?></small></p>
      <h5 class="center-align header"><b><?php echo ''.$row['nama_event'];?></b></h5>
      <p class="grey-text text-darken-3 lighten-3"><?php echo ''.$row['deskripsi'];?></p>
    </div>
</div>

<div class="divider2">
</div>    

<div class="section white">
    <div class="row container">
      <p class="grey-text text-darken-3 lighten-3"><strong>Location :</strong><br><?php echo ''.$row['lokasi'];?></p>
    </div>
</div>
    
<div class="section white">
    <div class="row container">
      <p class="grey-text text-darken-3 lighten-3"><strong>Contact :</strong><br><?php echo ''.$row['kontak'];?></p>
    </div>
</div>
<div class="section white">
    <div class="row container">
      <p class="grey-text text-darken-3 lighten-3"><strong>Website :</strong><br><a href="http://<?php echo ''.$row['website'];?>"><?php echo ''.$row['website'];?></a></p>
    </div>
</div>
    
<div class="divider2">
</div>    

<div class="section white">
    <div class="row container">
      <p class="grey-text text-darken-3 lighten-3"><strong>Category :</strong></p>
        <div class="card-action">
              <a href="#" class="grey-text">#Food</a>
              <a href="#" class="grey-text">#Festival</a>
              <a href="#" class="grey-text">#Family</a>
            <a href="#" class="grey-text">#Competition</a>
        </div>
    </div>
</div>
        
<div class="divider3">
</div> 
    
<div class="podbar">
    <p class="white-text left"><?php if($row['harga'] > 0){echo ''.$row['harga'];}else{echo 'FREE';}?></p>
    <?php if($row['harga'] == 0)  {?>
		<a class="right green bw1 waves-effect waves-light btn">HADIRI</a>
		<?php
	}
	else{
	?><a class="right red bw1 waves-effect waves-light btn">BATAL HADIRI</a>
	<?php } ?>
		
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