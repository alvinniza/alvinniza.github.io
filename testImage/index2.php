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
		<th>Nama Event</th>
		<th>Poster</th>    
	</tr> 
	<?php  
	// Load file koneksi.php  
	include "koneksi.php";    

	$query = "SELECT * FROM event"; // Query untuk menampilkan semua data siswa  
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query    

	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql    
	echo "<tr>";     
	echo "<td>".$data['id_event']." - ".$data['nama_event']."</td>";    
	if($data['poster'] == null){
		echo "<td><img class='resize' src='../evnt/default.png' align='center'></td>";  
	}
	else{
		echo "<td><img class='resize' src='../evnt/".$data['poster']."' align='center'></td>";  
	}
	echo "</tr>";  
	}  
	?>  
	</table>
</body>
</html>