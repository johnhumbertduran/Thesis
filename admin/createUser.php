<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    <link rel="icon" type="image/png" href="../images/logo.png">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/createUserStyles.css" />
    <style>
    #four{
    background-color:#1f1f1f;
    }
    </style>
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
	
		if($account_type != 1){
		
			echo "<script>window.location.href='../forbidden.php';</script>";
		
		}
	
	}else{
	
			echo "<script>window.location.href='../';</script>";
	
	}


    ?>

    <?php

    $fName = $mName = $lName = $uName = $pass = $account_type = $catAcc_type ="";
    $fNameErr = $mNameErr = $lNameErr = $uNameErr = $passErr = $account_typeErr = "";


    if(isset($_POST["next"])){


        if(empty($_POST["firstName"])){

        }else {
            $fName = $_POST["firstName"];
        }

        if(empty($_POST["middleName"])){

        }else {
            $mName = $_POST["middleName"];
        }

        if(empty($_POST["lastName"])){

        }else {
            $lName = $_POST["lastName"];
        }

        if(empty($_POST["userName"])){

        }else {
            $uName = $_POST["userName"];
        }

        if(empty($_POST["pass"])){

        }else {
            $pass = $_POST["pass"];
        }

        if(empty($_POST["account_type"])){

        }else {
            $account_type = $_POST["account_type"];
            $catAcc_type = $_POST["catAcc_type"];
        }

        if($fName && $mName && $lName && $uName && $pass && $catAcc_type){
            $checkUserName = mysqli_query($connections, "SELECT userName FROM usertbl WHERE userName='$uName' ");
            $check_user = mysqli_num_rows($checkUserName);

            if($check_user > 0){

                echo"<script>alert('User Name already already exists!');</script>";
                $uNameErr = "*";
                $uName = "";
                // echo"<script>document.getelementById('uNa').setAttribute('autofocus');</script>";

            }else{

                mysqli_query($connections, "INSERT INTO usertbl (firstName,middleName,lastName,username,pass,account_type)
                VALUES('$fName','$mName','$lName','$uName','$pass','$catAcc_type')");
                echo"<script>window.location.href='../'; alert('User Account has been succesfully added!');</script>";
            }
            
        }

    }
    
    ?>

    <center> 
        <div class="table">

        <form method="post">

        <table border="0">
            <tr>
                <td colspan="2">
                <center>
                <h1>Create User</h1>
                </center>
                </td>
            </tr>

            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $fNameErr; ?></span> First Name:</td>
                <td><input type="text" name="firstName" value="<?php echo $fName; ?>" required autofocus></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $mNameErr; ?></span> Middle Name:</td>
                <td><input type="text" name="middleName" id="req" value="<?php echo $mName; ?>" required></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $lNameErr; ?></span> Last Name:</td>
                <td><input type="text" name="lastName" value="<?php echo $lName; ?>" required></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $uNameErr; ?></span> User Name:</td>
                <td><input type="text" id="uNa" name="userName" value="<?php echo $uName; ?>" required></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $passErr; ?></span> Password:</td>
                <td><input type="password" name="pass" value="<?php echo $pass; ?>" required></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $account_typeErr; ?></span> Account Type:</td>
                <td>
                    <select name="account_type" id="acct_type" onChange="accType()">>
                        <option name="account_type" value="">Select Account Type</option>
                        <option name="account_type" value="Admin" <?php if($account_type == "Admin") {echo "selected";} ?>>Admin</option>
                        <option name="account_type" value="Technician" <?php if($account_type == "Technician") {echo "selected";} ?>>Technician</option>
                        <option name="account_type" value="Requester" <?php if($account_type == "Requester") {echo "selected";} ?>>Requester</option>
                    </select>
                </td>
            </tr>
            <tr><td><input type="text" name="catAcc_type" id="catchAcc" value="<?php echo $catAcc_type; ?>" readonly></td></tr>
            
            <tr><td colspan="2"><br><center><button type="submit" name="next">Submit</button></center></td></tr>
        </table>
        </form>
        </div>
    </center>
    
    <script>
    function accType(){
        var type = document.getElementById("acct_type").value;
        var cat = document.getElementById("catchAcc");
        if(type == "Admin"){
            cat.value = "1";
        }else if(type == "Technician"){
            cat.value = "2";
        }else if(type == "Requester"){
            cat.value = "3";
        }
    }
    </script>
</body>
</html>