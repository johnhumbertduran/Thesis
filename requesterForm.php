<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Records Request and Inventory Management System of Data Center of ACC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/reqFormStyles.css" />
    <!-- <script src="main.js"></script> -->
</head>
<body>

    <?php
        $transaction_no = $requester_name = $room_office = $date_time_needed = $date = $telephone_mobile_no = "";
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

        if (isset($_POST["next"])){
            
            if(empty($_POST["transaction_no"])){
		
                $transaction_no_err = "Required!";
            
            }else{
            
                $transaction_no = $_POST["transaction_no"];
            
            }
            
            if(empty($_POST["requester_name"])){
		
                $requester_name_err = "Required!";
            
            }else{
            
                $requester_name = $_POST["requester_name"];
            
            }

            if(empty($_POST["room_office"])){
		
                $room_office_err = "Required!";
            
            }else{
            
                $room_office = $_POST["room_office"];
            
            }

            if(empty($_POST["date_time_needed"])){
		
                $date_time_needed_err = "Required!";
            
            }else{
            
                $date_time_needed = $_POST["date_time_needed"];
            
            }

            if(!empty($_POST["date"])){
		
            //     $date_err = "Required!";
            
            // }else{
            
                $date = $_POST["date"];
            
            }

            if(empty($_POST["telephone_mobile_no"])){
		
                $telephone_mobile_no_err = "Required!";
            
            }else{
            
                $telephone_mobile_no = $_POST["telephone_mobile_no"];
            
            }

            if ($transaction_no && $requester_name && $room_office && $date_time_needed && $date && $telephone_mobile_no ){

                echo"<script> window.location.href = 'requestDetails.php?ver_1=$dir_1&&transaction_no_data=$transaction_no_data&&$loca&&1=$transaction_no&&requester_name_data=$requester_name_data&&2=$requester_name&&ver_2=$dir_2&&room_office_data=$room_office_data&&3=$room_office&&date_time_needed_data=$date_time_needed_data&&4=$date_time_needed&&redirect=$dir_3&&date_data=$date_data&&5=$date&&local=$loca&&6=$telephone_mobile_no&&telephone_mobile_no_data=$telephone_mobile_no_data'; </script>";
                // ver_1=$dir_1&&trno=$requester_name_data&&redirect=$dir_2&&loc=$loca&&do=$dir_3

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
                <td class="boldFont"><span class="star"><sup>*</span> Transaction No.:</td>
                <td><input type="text" name="transaction_no" value="<?php echo $transaction_no; ?>"><td class="err"><span class="error"><?php echo $transaction_no_err; ?></span></td></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup>*</span> Requester Name:</td>
                <td><input type="text" name="requester_name" value="<?php echo $requester_name; ?>"><td class="err"><span class="error"><?php echo $requester_name_err; ?></span></td></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup>*</span> Room/Office:</td>
                <td><input type="text" name="room_office" value="<?php echo $room_office; ?>"><td class="err"><span class="error"><?php echo $room_office_err; ?></span></td></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup>*</span> Date/Time Needed:</td>
                <td><input type="text" name="date_time_needed" value="<?php echo $date_time_needed; ?>"><td class="err"><span class="error"><?php echo $date_time_needed_err; ?></span></td></td>
            </tr>
            <tr>
                <td class="boldFont">Date:</td>
                <td><input type="text" name="date" value="<?php echo date("m/d/y"); ?>" readonly><td class="err"><span class="error"><?php echo $date_err; ?></span></td></td>
            </tr>
            <tr>
                <td class="boldFont"><span class="star"><sup>*</span> Telephone/Mobile No.:</td>
                <td><input type="text" name="telephone_mobile_no" value="<?php echo $telephone_mobile_no; ?>"><td class="err"><span class="error"><?php echo $telephone_mobile_no_err; ?></span></td></td>
            </tr>

            <tr><td colspan="2"><br><center><button type="submit" name="next">Next</button></center></td></tr>
        </table>
        </form>
        </div>
    </center>
        



</body>
</html>