<?php
@session_start();
include "koneksi.php";
	$email = $_SESSION['user'];
	$id = $_POST['id'];
	if($_SESSION['user'] || $_SESSION['admin'])
	{
		$sql = "SELECT * FROM event where id_event='$id'";
		$result = $connect->query($sql);
		$num = $result->num_rows;
		$row = $result->fetch_assoc();

		// Load file koneksi.php
		

		// Ambil Data yang Dikirim dari Form
		//$email = $_POST['email'];
		
		$gambar = $_FILES['gambar']['name'];
		$tmp = $_FILES['gambar']['tmp_name'];

		// Set path folder tempat menyimpan fotonya
		//$path = "profpic/".$gambar;
		$path = "../evnt/".$gambar;

		// Proses upload
		if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		  // Proses simpan ke Database
			//$sql = "UPDATE users SET name = '$name', address = '$address', nohp = '$hp' WHERE email='$email'";
		  $query = "UPDATE event SET poster =  '$gambar' WHERE id_event = '$id'";
		  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

		  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: index2.php"); // Redirect ke halaman index.php
		  }else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
		  }
		}else{
		  // Jika gambar gagal diupload, Lakukan :
		  echo "Maaf, Gambar gagal untuk diupload.";
		  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
		}
	}
	else{
		header("location:login.php");
	}
?>