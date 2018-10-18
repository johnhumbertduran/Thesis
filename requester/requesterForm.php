<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Requester Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/reqFormStyles.css" />
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
        $transaction_no = "20180000";
        $dbRollNo = $requester_name = $room_office = $date_time_needed = $var_date = $telephone_mobile_no = "";
        $transaction_no_err = $requester_name_err = $room_office_err = $date_time_needed_err = $date_err = $telephone_mobile_no_err = "";
    ?>

        <?php

        $transaction_no_data = md5(rand(1,9));
        $requester_name_data = md5(rand(1,9));
        $room_office_data = md5(rand(1,9));
        $date_time_needed_data = md5(rand(1,9));
        $date_data = md5(rand(1,9));
        $telephone_mobile_no_data = md5(rand(1,9));
        $dir_1 = md5(rand(1,9));
        $dir_2 = md5(rand(1,9));
        $dir_3 = md5(rand(1,9));
        $loca = md5(rand(1,4));

        $checkRollNo = mysqli_query($connections, "SELECT rollNo FROM requesttbl ORDER BY rollNo DESC LIMIT 1 ");
        while($rowRollNo = mysqli_fetch_assoc($checkRollNo)){

            $dbRollNo = $rowRollNo["rollNo"];
            $transaction_no = $dbRollNo;


        if($dbRollNo = $transaction_no){

            $transaction_no += 1;
            
        }else{

        }

        if (isset($_POST["next"])){
            
            if(empty($_POST["transaction_no"])){
		
            
            
            }else{
            
                $transaction_no = $_POST["transaction_no"];
            
            }
            
            if(empty($_POST["requester_name"])){
		
            
            
            }else{
            
                $requester_name = $_POST["requester_name"];
            
            }

            if(empty($_POST["room_office"])){
		
            
            
            }else{
            
                $room_office = $_POST["room_office"];
            
            }

            if(empty($_POST["date_time_needed"])){
		
            
            
            }else{
            
                $date_time_needed = $_POST["date_time_needed"];
            
            }

            // if(!empty($_POST["date"])){
		
            //     $date_err = "Required!";
            
            // }else{
            
                $var_date = $_POST["var_date"];
            
            // }

            if(empty($_POST["telephone_mobile_no"])){
		
            
            
            }else{
            
                $telephone_mobile_no = $_POST["telephone_mobile_no"];
            
            }

        }

            if ($transaction_no && $requester_name && $room_office && $date_time_needed && $var_date && $telephone_mobile_no ){
                


            if(!preg_match("/^[a-zA-Z ]*$/", $requester_name)){
				
                // $requester_name_err = "Numbers are not allowed!";
                echo"<script>alert('Numbers are not allowed!');</script>";
                $requester_name = "";
                $requester_name_err = "*";
                echo"<script>document.getElementById('');</script>";
            
            }else{

                echo"<script> window.location.href = 'requestDetails.php?ver_1=$dir_1&&transaction_no_data=$transaction_no_data&&$loca&&1=$transaction_no&&requester_name_data=$requester_name_data&&2=$requester_name&&ver_2=$dir_2&&room_office_data=$room_office_data&&3=$room_office&&date_time_needed_data=$date_time_needed_data&&4=$date_time_needed&&redirect=$dir_3&&date_data=$date_data&&5=$var_date&&local=$loca&&6=$telephone_mobile_no&&telephone_mobile_no_data=$telephone_mobile_no_data'; </script>";
                // ver_1=$dir_1&&trno=$requester_name_data&&redirect=$dir_2&&loc=$loca&&do=$dir_3
                
            }

            }

            
        }
    ?>
    <center> 
        <div class="table">

        <form method="post">

        <table border="0">
            <tr>
                <td colspan="3">
                <center>
                <h1>Requester's Form</h1>
                </center>
                </td>
            </tr>
            <tr>
                <td class="boldFont">Transaction No.:</td>
                <td><input type="text" name="transaction_no" value="<?php echo $transaction_no; ?>" readonly></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup><?php echo$requester_name_err; ?></span> Requester Name:</td>
                <td><input type="text" name="requester_name" id="req" value="<?php echo $requester_name; ?>" required autofocus></td>
            </tr>
            <tr>
                <td class="boldFont">Room/Office:</td>
                <td><input type="text" name="room_office" value="<?php echo $room_office; ?>" required></td>
            </tr>
            <tr>
                <td class="boldFont">Date Needed:</td>
                <td><input type="date" name="date_time_needed" value="<?php echo $date_time_needed; ?>" required></td>
            </tr>
            <tr>
                <td class="boldFont">Date:</td>
                <td><input type="text" name="var_date" value="<?php echo date("m/d/y"); ?>" readonly></td>
            </tr>
            <tr>
                <td class="boldFont">Telephone/Mobile No.:</td>
                <td><input type="text" name="telephone_mobile_no" value="<?php echo $telephone_mobile_no; ?>"  maxlength="11" onkeypress='return isNumberKey(event)' required></td>
            </tr>

            <tr><td colspan="2"><br><center><button type="submit" name="next">Next</button></center></td></tr>
        </table>
        </form>
        </div>
    </center>
        

        <script>
        	function isNumberKey(evt){
	
                var charCode = (evt.which) ? evt.which : event.keyCode
    
                if(charCode > 31 && (charCode < 48 || charCode > 57) )
    
                    return false;
        
                return true;

            }
        </script>

</body>
</html>