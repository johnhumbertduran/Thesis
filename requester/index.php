<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/requestStyles.css" />
    <!-- <script src="main.js"></script> -->
</head>
<body>

    <?php
	
	session_start();

	include("../connections.php");
	include("nav.php");

		if(isset($_SESSION["userName"])){
	
		$userName = $_SESSION["userName"];
		
		$authentication = mysqli_query($connections, "SELECT * FROM usertbl WHERE userName='$userName' ");
		$fetch = mysqli_fetch_assoc($authentication);
		$account_type = $fetch["account_type"];
	
		if($account_type != 3){
		
			echo "<script>window.location.href='../forbidden.php';</script>";
		
		}
	
	}else{
	
			echo "<script>window.location.href='../';</script>";
	
	}


?>

	<center>
		<h1>Requester</h1>
	</center>

</body>
</html>