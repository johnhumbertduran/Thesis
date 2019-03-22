<?php


	$connections = mysqli_connect("localhost", "root", "", "thesisdb");
	
	if(isset($_SESSION["userName"])){
	$userName = $_SESSION["userName"];
		
	$authentication = mysqli_query($connections, "SELECT * FROM usertbl WHERE userName='$userName' ");
	$fetch = mysqli_fetch_assoc($authentication);
	$req = $fetch["name"];
	}

	if(mysqli_connect_errno()){
	
		echo "Failed to connect to MySQL: " .mysqli_connect_error();
	
	}



?>