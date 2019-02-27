<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Logging Out...</title>
</head>
<body>
	
</body>
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
</html>