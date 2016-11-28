<html>
<head>  
	<title>EVENTER</title>
<script src="style.css" type="text/css"></script>
</head>
<body>  
	<h1>List Event</h1>  
	<a href="form_simpan.php">Tambah Data</a><br><br>  
	<table border="1" width="100%">  
	<tr>    
		<th>Email</th>    
		<th>ProfPic</th>    
	</tr> 
	<?php  
	// Load file koneksi.php  
	include "koneksi.php";    

	$query = "SELECT email,image FROM users"; // Query untuk menampilkan semua data siswa  
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query    

	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql    
	echo "<tr>";     
	echo "<td>".$data['email']."</td>";    
	if($data['image'] == null){
		echo "<td><img class='resize' src='../profpic/default.jpg' align='center'></td>";  
	}
	else{
		echo "<td><img class='resize' src='../profpic/".$data['image']."' align='center'></td>";  
	}
	echo "</tr>";  
	}  
	?>  
	</table>
</body>
</html>