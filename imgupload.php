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
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style2.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.form.js"></script>
<script>
$(document).on('change', '#image_upload_file', function () {
var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');

$('#image_upload_form').ajaxForm({
    beforeSend: function() {
		progressBar.fadeIn();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function(html, statusText, xhr, $form) {		
		obj = $.parseJSON(html);	
		if(obj.status){		
			var percentVal = '100%';
			bar.width(percentVal)
			percent.html(percentVal);
			$("#imgArea>img").prop('src',obj.image_medium);			
		}else{
			alert(obj.error);
		}
    },
	complete: function(xhr) {
		progressBar.fadeOut();			
	}	
}).submit();		

});
</script>
</head>

<body>
<nav class="noshadow">
    <div class="white nav-wrapper">
        <a href="editprofile.php" class="black-text left brand-logo"><i class="material-icons">arrow_back</i></a>
        <a href="#" class="black-text brand-logo light">Profile Image</a>
    </div>
</nav> 


<div id="imgContainer">
  <form enctype="multipart/form-data" action="imgsubmit.php" method="post" name="image_upload_form" id="image_upload_form">
    <div id="imgArea"><img src="<?php if($row['image']==null){ echo 'profpic/default.jpg';} else{ echo 'profpic/'.$row['image'];} ?>">
      <div class="progressBar">
        <div class="bar"></div>
        <div class="percent"><h4>0%</div>
      </div>
      <div id="imgChange"><span>Change Photo</span>
        <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
      </div>
    </div>
  </form>
  <br><br>
  <div class="row">
  </div>
</div>

</body>
</html>

<?php
	}
	else
	{
		header("location:login.php");
	}
?>