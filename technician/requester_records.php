<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Requester Records</title>
    <!-- <title>Technician Main</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="../styles/nav.css" /> -->
   <!-- <script src="main.js"></script> -->
   <script src="js/jQuery.js"></script>
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
	
		if($account_type != 2){
		
			echo "<script>window.location.href='../forbidden.php';</script>";
		
		}
	
	}else{
	
			echo "<script>window.location.href='../';</script>";
	
	}


?>

	<center>
		<h1>Requester Records</h1>
	</center>
    
    
    <?php
   	if(empty($_GET['jScript']) ){

        ?>
            <script>
    
    setInterval(function(){
    
        $('#retriever').load('retriever.php');
    
    
    }, 1000);

</script>
<?php

	}else{}
    
    ?>
    
    
    <div id="retriever">
    
    <?php	include("retriever.php"); ?>
    
    </div>
    
    <?php

        
    ?>
    

</body>
</html>