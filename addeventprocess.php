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
		/////////////////////////////
		
		$name = @$_POST["eventname"];
		$desc = @$_POST["eventdesc"];
		$loc = @$_POST["eventloc"];
		$cat = @$_POST["eventcat"];
		$harga = @$_POST["eventprc"];
		$cont = @$_POST["eventcont"];
		$web = @$_POST["eventweb"];
		$date = @$_POST["eventdate"];
		
		$gambar = $_FILES['eventimage']['name'];
		$tmp = $_FILES['eventimage']['tmp_name'];
		
		$path = "evnt/".$gambar;
		
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
				if(move_uploaded_file($tmp, $path)){
					$sql2 = "INSERT INTO event (nama_event,deskripsi,harga,lokasi,kontak,website,kategori,tanggal,poster,proposedby) values ('$name', '$desc', '$harga', '$loc', '$cont', '$web', '$cat', '$date', '$gambar', '$email')";
					$rslt = $db->query($sql2); // Eksekusi/ Jalankan query dari variabel $query
					if($rslt){
						header("Location:resaddevent.php");
					}
				}
				else{
					header("Location:reserroraddevent.php");
				}
			}		
		}
	}
	else{
		header("location:login.php");
	}
		?>