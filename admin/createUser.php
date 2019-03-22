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
    background-color:#01310d;
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

    $name = $room = $mobile = $uName = $pass = $priority_level = $catPrior_lvl = $account_type = $catAcc_type ="";
    $nameErr = $roomErr = $mobileErr = $uNameErr = $passErr = $priority_levelErr = $account_typeErr = "";


    if(isset($_POST["next"])){


        if(empty($_POST["name"])){

        }else {
            $name = $_POST["name"];
        }

        if(empty($_POST["room"])){

        }else {
            $room = $_POST["room"];
        }

        if(empty($_POST["mobile"])){

        }else {
            $mobile = $_POST["mobile"];
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
            $priority_level = $_POST["priority_level"];
            $catPrior_lvl = $_POST["catPrior_lvl"];
        }

        if(empty($_POST["account_type"])){

        }else {
            $account_type = $_POST["account_type"];
            $catAcc_type = $_POST["catAcc_type"];
        }

        if($name && $room && $mobile && $uName && $pass && $catPrior_lvl && $catAcc_type){
            $checkUserName = mysqli_query($connections, "SELECT username FROM usertbl WHERE userName='$uName' ");
            $check_user = mysqli_num_rows($checkUserName);

            if($check_user > 0){

                echo"<script>alert('User Name already already exists!');</script>";
                $uNameErr = "*";
                $uName = "";
                // echo"<script>document.getelementById('uNa').setAttribute('autofocus');</script>";
                
            }else{
            if(!preg_match("/^[a-zA-Z ]*$/", $name)){
				
                    // $name_err = "Numbers are not allowed!";
                    echo"<script>alert('Numbers are not allowed!');</script>";
                    $name = "";
                    $name_err = "*";
                    echo"<script>document.getElementById('');</script>";
                
                }else{

                    if((strlen($mobile) < 11) /* || (strlen($telephone_mobile_no) > 8 && strlen($telephone_mobile_no) < 11) */ ){
                            
                        echo"<script>alert('Contact number must be 11 digits!');</script>";                                                    
                   
                    }else{

                mysqli_query($connections, "INSERT INTO usertbl (name,room,mobnum,username,pass,priority_level,account_type)
                VALUES('$name','$room','$mobile','$uName','$pass','$catPrior_lvl','$catAcc_type')");
                echo"<script>window.location.href='../'; alert('User Account has been succesfully added!');</script>";
                }
            }
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
                <td class="boldFont"><span class="star"><sup><?php echo $nameErr; ?></span> Name:</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" required autofocus></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $roomErr; ?></span> Room:</td>
                <td><input type="text" name="room" id="req" value="<?php echo $room; ?>" required></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $mobileErr; ?></span> Mobile Number:</td>
                <td><input type="text" name="mobile" autocomplete="off" value="<?php echo $mobile; ?>" maxlength="11" onkeypress='return isNumberKey(event)' required></td>
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
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo $priority_levelErr; ?></span> Priority Level:</td>
                <td>
                    <select name="priority_level" id="prior_lvl" onChange="priorLevel()" disabled>>
                        <option name="priority_level" value="">Select Level of Priority</option>
                        <option name="priority_level" value="Low" <?php if($priority_level == "Low") {echo "selected";} ?>>Low</option>
                        <option name="priority_level" value="Medium" <?php if($priority_level == "Medium") {echo "selected";} ?>>Medium</option>
                        <option name="priority_level" value="High" <?php if($priority_level == "High") {echo "selected";} ?>>High</option>
                    </select>
                </td>
            </tr>
            <tr><td><input type="text" name="catAcc_type" id="catchAcc" value="<?php echo $catAcc_type; ?>" readonly></td></tr>
            <tr><td><input type="text" name="catPrior_lvl" id="catchPrior" value="<?php echo $catPrior_lvl; ?>" readonly></td></tr>
            
            <tr><td colspan="2"><br><center><button type="submit" name="next">Submit</button></center></td></tr>
        </table>
        </form>
        </div>
    </center>
    
    <script>
    function accType(){
        var type = document.getElementById("acct_type").value;
        var cat = document.getElementById("catchAcc");
        if(type == ""){
            document.getElementById("prior_lvl").disabled = true;
            lvl = document.getElementById("prior_lvl").value = "";
        }else if(type == "Admin"){
            cat.value = "1";
            document.getElementById("prior_lvl").disabled = true;
            lvl = document.getElementById("prior_lvl").value = "";
        }else if(type == "Technician"){
            cat.value = "2";
            document.getElementById("prior_lvl").disabled = true;
            lvl = document.getElementById("prior_lvl").value = "";
        }else if(type == "Requester"){
            cat.value = "3";
            document.getElementById("prior_lvl").disabled = false;
        }
    }


    function priorLevel(){
        var lvl = document.getElementById("prior_lvl").value;
        var catPri = document.getElementById("catchPrior");
        if(lvl == "Low"){
            catPri.value = "1";
        }else if(lvl == "Medium"){
            catPri.value = "2";
        }else if(lvl == "High"){
            catPri.value = "3";
            
        }
    }

    function isNumberKey(evt){
	
    var charCode = (evt.which) ? evt.which : event.keyCode

    if(charCode > 31 && (charCode < 48 || charCode > 57) )

        return false;

    return true;

}

    </script>
</body>
</html>