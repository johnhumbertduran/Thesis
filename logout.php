<?php

	session_start();
	
	$logout = md5($_SESSION['userName']);
	$email_md5 = md5($logout);
	unset($_SESSION['userName']);
	
	session_unset();
	session_destroy();
	
	echo "Logging out... Please wait...";
	echo "<script>window.location.href='index.php?logout=$logout&v_1=$email_md5';</script>";
	exit();


?>