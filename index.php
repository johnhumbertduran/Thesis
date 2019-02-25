<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Request and IT Equipment Monitoring</title>
    <!-- <title>Records Request and Inventory Management System of Data Center of ACC</title> -->
    <link rel="icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="styles/indexStyles.css">
</head>
<body>
    <?php 

session_start();

include("connections.php");
$userName = $password = $logErr = "";

    if(isset($_SESSION["userName"])){

    $userName = $_SESSION["userName"];
    $query_account_type = mysqli_query($connections, "SELECT * FROM usertbl WHERE userName='$userName'");
    $get_account_type = mysqli_fetch_assoc($query_account_type);
    $account_type = $get_account_type["account_type"];
    
    if($account_type == 1){
    
        echo"<script>window.location.href='admin';</script>";
    
    }elseif($account_type == 2){
    
        echo "<script>window.location.href='technician';</script>";
    
    }elseif($account_type == 3){
    
        echo "<script>window.location.href='requester';</script>";
    
    }

}


if(isset($_POST["submit"])){
    
    
    
    if(empty($_POST["password"]) && empty($_POST["userName"]) ){
    
        // $logErr = "User Name and Password are empty!";
        echo"<script>alert('User Name and Password are empty');</script>";
    
        }else{
    
        if(empty($_POST["userName"])){
        
        // $logErr = "Usern Name is empty!";
        echo"<script>alert('Usern Name is empty');</script>";
    
        }else{
    
        $userName = $_POST["userName"];
        
        }
        
        if(empty($_POST["password"])){
        
            // $logErr = "Password is empty!";
            echo"<script>alert('Password is empty');</script>";         
        
        }else{
        
            $password = $_POST["password"];
        
    
        }
    
    }
    
    
    if($userName && $password){
    
        $checkUser = mysqli_query($connections, "SELECT * FROM usertbl WHERE userName='$userName' ");
        $checkRow = mysqli_num_rows($checkUser);
        
        if($checkRow > 0){
        
            $fetch = mysqli_fetch_assoc($checkUser);
            $db_pass = $fetch["pass"];
            
            $account_type = $fetch["account_type"];
        
        if($account_type == "1"){
        
            
            if($db_pass == $password){
                
                    $_SESSION["userName"] = $userName;
                    echo"<script>window.location.href='admin';</script>";
                
                }else{
                
                    echo"<script>alert('Your Password is incorrect!');</script>";
                
                }

        
        }elseif ($account_type == "2") {

            if ($db_pass == $password) {
                $_SESSION["userName"] = $userName;
                echo"<script>window.location.href='technician';</script>";

                }else{
                
                    echo"<script>alert('Your Password is incorrect!');</script>";
                
                }
        }elseif ($account_type == "3") {
            
            if ($db_pass == $password) {
                $_SESSION["userName"] = $userName;
                echo"<script>window.location.href='requester';</script>";

                }else{
                
                    echo"<script>alert('Your Password is incorrect!');</script>";
                
                }
        
            
            }

            
        }else{
            echo"<script>alert('Sorry, the User Name you entered is not registered.');</script>";
        }
    }
    
    
}


?>



<h2 class="heading">Job Request Application and IT Equipment Monitoring of Data Center of Aklan Catholic College</h2>


<span class="warn"><h3><?php echo $logErr; ?></h3></span>

<br/>
<br/>
<br/>
<center>
	<div id="nav">
<center><h1 class="logI">Log In</h1></center>
			
			<form method="POST">
		<table border="0" width="60%">
			
			<tr>
				<td><input type="text" name="userName" value="<?php echo $userName; ?>" placeholder="User Name" class="inTypes"></td>
			</tr>
		
			<tr>
				<td><input type="password" name="password" value="<?php echo $password; ?>" placeholder="Password" class="inTypes"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="submit" value="Log In" class="inBoxes" style="width:30%;">&nbsp;&nbsp;&nbsp;<!-- <a href="#">Forgot Password?</a> --></td>
			</tr>
			
		</table>

			</form>
	</div>
</center>

</body>
</html>