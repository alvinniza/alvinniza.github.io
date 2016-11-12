<?php

	echo "Logged out successfully<br>redirect you back";
    
	header("refresh:3;url=login.php");
	
    session_start();
	session_destroy();
	setcookie("PHPSESSID",session_id(),time()-1);

?>