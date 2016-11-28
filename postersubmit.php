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

		include('posterfunctions.php');
		/*defined settings - start*/
		ini_set("memory_limit", "99M");
		ini_set('post_max_size', '20M');
		ini_set('max_execution_time', 600);
		define('IMAGE_SMALL_DIR', 'evnt/small/');
		define('IMAGE_SMALL_SIZE', 50);
		define('IMAGE_MEDIUM_DIR', 'evnt/medium/');
		define('IMAGE_MEDIUM_SIZE', 250);
		/*defined settings - end*/

		if(isset($_FILES['image_upload_file'])){
			$output['status']=FALSE;
			set_time_limit(0);
			$allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
			
			if ($_FILES['image_upload_file']["error"] > 0) {
				$output['error']= "Error in File";
			}
			elseif (!in_array($_FILES['image_upload_file']["type"], $allowedImageType)) {
				$output['error']= "You can only upload JPG, PNG and GIF file";
			}
			elseif (round($_FILES['image_upload_file']["size"] / 1024) > 4096) {
				$output['error']= "You can upload file size up to 4 MB";
			} else {
				/*create directory with 777 permission if not exist - start*/
				createDir(IMAGE_SMALL_DIR);
				createDir(IMAGE_MEDIUM_DIR);
				/*create directory with 777 permission if not exist - end*/
				$path[0] = $_FILES['image_upload_file']['tmp_name'];
				$temp = $_FILES['image_upload_file']['tmp_name'];
				$gambar = $_FILES['image_upload_file']['name'];
				$uploadpath = "profpic/".$gambar;
				$file = pathinfo($_FILES['image_upload_file']['name']);
				$fileType = $file["extension"];
				$desiredExt='jpg';
				$fileNameNew = rand(333, 999) . time() . ".$desiredExt";
				$path[1] = IMAGE_MEDIUM_DIR . $fileNameNew;
				$path[2] = IMAGE_SMALL_DIR . $fileNameNew;
				
				if (createThumb($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE)) {
					if (createThumb($path[1], $path[2],"$desiredExt", IMAGE_SMALL_SIZE, IMAGE_SMALL_SIZE,IMAGE_SMALL_SIZE)) {
						$output['status']=TRUE;
						$output['image_medium']= $path[1];
						$output['image_small']= $path[2];
					}
				}
				if(move_uploaded_file($temp, $uploadpath)){
					$sql2 = "UPDATE users SET image =  '$gambar' WHERE email = '$email'";
					$rslt = $db->query($sql2); // Eksekusi/ Jalankan query dari variabel $query
					if($rslt){
						header("refresh:1;url=editprofile.php"); // Redirect ke halaman index.php
					}
					else{
						echo "Error uploading new image!";
						header("refresh:1;url=imgupload.php");
					}
				}
			}
			echo json_encode($output);
		}
	}
	else{
		header("location:login.php");
	}
?>	