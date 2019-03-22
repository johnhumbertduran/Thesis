<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Make Request</title>
    <!-- <title>Records Request and Inventory Management System of Data Center of ACC</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/requestDetailsStyles.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/nav.css" />    
    <!-- <script src="main.js"></script> -->
    <style>
    #two{
        background-color:#01310d;
    }
    </style>
</head>
<body>
    <?php
        
        session_start();

        include("../connections.php");
        // include("nav.php");

    
            if(isset($_SESSION["userName"])){
        
            $userName = $_SESSION["userName"];
            
            $authentication = mysqli_query($connections, "SELECT * FROM usertbl WHERE userName='$userName' ");
            $fetch = mysqli_fetch_assoc($authentication);
            $account_type = $fetch["account_type"];
            $requester_name = $fetch["name"];
            $room = $fetch["room"];
            $mobile = $fetch["mobnum"];
            $PL = $fetch["priority_level"];
        
            if($account_type != 3){
            
                echo "<script>window.location.href='../forbidden.php';</script>";
            
            }
        
        }else{
        
                echo "<script>window.location.href='../';</script>";
        
        }
        // $transaction_no =  $requester_name =  $room_office =  $date_time_needed =  $var_date = $telephone_mobile_no = "";
        /* $value_all = $others = */ $specified = "";
        $transaction_no = $date_time_needed = $var_date = "";
        $catGet1 = $catGet2 = $catGet3 = $catGet4 = $catGet5 = $catGet6 = $catGet7 = $catGet8 = "";
        $compRep = "Computer Repair";
        $lan = "LAN/Internet Connection";
        $assist = "Assist/Install LCD Projector";
        $printer = "Printer Repair";
        $cctv = "CCTV Repair";
        $email_LogIn = "Email or Login Account";
        $rfid = "RFID Photo/Sig. Capturing";
        
        // $notifs = mysqli_query($connections, "SELECT notifCount FROM notiftbl ");
        // $getNotif = mysqli_fetch_assoc($notifs);
        // $notif = $getNotif["notifCount"];

    // echo"$notif";
        ?>
    <?php
    // if((empty($_GET["transaction_no_data"])) || (empty($_GET["requester_name_data"])) || (empty($_GET["room_office_data"])) || (empty($_GET["date_time_needed_data"])) || (empty($_GET["date_data"])) || (empty($_GET["telephone_mobile_no_data"]))){
    //     echo"<script>alert('Sorry, No data was transmitted!'); window.location.href = 'requesterForm.php';</script>";
    // }else{
    //     $transaction_no = $_GET["1"];
    //     $requester_name = $_GET["2"];
    //     $room_office = $_GET["3"];
    //     $date_time_needed = $_GET["4"];
    //     $var_date = $_GET["5"];
    //     $telephone_mobile_no = $_GET["6"];
    // }
    ?>

    <?php

$transaction_no = "20180000";

        
$checkRollNo = mysqli_query($connections, "SELECT rollNo FROM requesttbl ORDER BY rollNo DESC LIMIT 1 ");
while($rowRollNo = mysqli_fetch_assoc($checkRollNo)){

    $dbRollNo = $rowRollNo["rollNo"];
    $transaction_no = $dbRollNo;


if($dbRollNo = $transaction_no){

    $transaction_no += 1;
    
}

        if(isset($_POST["button"])){

            //Boe-on du category nga gin butang sa URL
    
        if(empty($_POST["catGet1"])){
            // echo"<script>alert('hay');</script>";
        }else{
            $catGet1 = $_POST["catGet1"];
        }


        if(empty($_POST["catGet2"])){
            
        }else{
            $catGet2 = $_POST["catGet2"];
        }


        if(empty($_POST["catGet3"])){
            
        }else{
            $catGet3 = $_POST["catGet3"];
        }


        if(empty($_POST["catGet4"])){
            
        }else{
            $catGet4 = $_POST["catGet4"];
        }


        if(empty($_POST["catGet5"])){
            
        }else{
            $catGet5 = $_POST["catGet5"];
        }


        if(empty($_POST["catGet6"])){
            
        }else{
            $catGet6 = $_POST["catGet6"];
        }


        if(empty($_POST["catGet7"])){
            
        }else{
            $catGet7 = $_POST["catGet7"];
        }


        if(empty($_POST["catGet8"])){
            
        }else{
            $catGet8 = $_POST["catGet8"];
        }


        if($catGet1 || $catGet2 || $catGet3 || $catGet4 || $catGet5 || $catGet6 || $catGet7 || $catGet8 ){
            
            // $checkTransactionNo1 = mysqli_query($connections, "SELECT * FROM requestertbl WHERE rollNo='$transaction_no' ");
            // $check_row1 = mysqli_num_rows($checkTransactionNo1);
            
            $checkTransactionNo2 = mysqli_query($connections, "SELECT * FROM requesttbl WHERE rollNo='$transaction_no' ");
            $check_row2 = mysqli_num_rows($checkTransactionNo2);
            
            // check if me same nga rollNo (peo wa gd don kase automatic imaw naga input nato)
            // if($check_row1 > 0){
                
            // }else{

                if($check_row2 > 0){
                    
                }else{

                    $success = md5(rand(1,9));
                    $end = md5(rand(1,9));	


                    if(empty($_POST["transaction_no"])){
		
            
            
                    }else{
                    
                        $transaction_no = $_POST["transaction_no"];
                    
                    }

                    if(empty($_POST["date_time_needed"])){
		
            
            
                    }else{
                    
                        $date_time_needed = $_POST["date_time_needed"];
                    
                    }

                    $var_date = $_POST["var_date"];

                    //Ibutang du value it kada checkbox
                    if(empty($_POST["categoryOfWork1"])){
                        $compRep = "";
                    }else{
                        $compRep = $_POST["categoryOfWork1"];
                    }
                    
                    
                    if(empty($_POST["categoryOfWork2"])){
                        $lan = "";
                    }else{
                        $lan = $_POST["categoryOfWork2"];
                    }
                    
                    
                    if(empty($_POST["categoryOfWork3"])){
                        $assist = "";
                    }else{
                        $assist = $_POST["categoryOfWork3"];
                    }
                    
                    
                    if(empty($_POST["categoryOfWork4"])){
                        $printer = "";
                    }else{
                        $printer = $_POST["categoryOfWork4"];
                    }
                    
                    
                    if(empty($_POST["categoryOfWork5"])){
                        $cctv = "";
                    }else{
                        $cctv = $_POST["categoryOfWork5"];
                    }
                    
                    
                    if(empty($_POST["categoryOfWork6"])){
                        $email_LogIn = "";
                    }else{
                        $email_LogIn = $_POST["categoryOfWork6"];
                    }
                    
                    
                    if(empty($_POST["categoryOfWork7"])){
                        $rfid = "";
                    }else{
                        $rfid = $_POST["categoryOfWork7"];
                    }
                    
                    if(empty($_POST["categoryOfWork9"])){
                        
                        // $others = "";

                    }else{
                        
                        // $others = $_POST["categoryOfWork8"];
                    
                        
                        // if(empty($_POST["categoryOfWork9"])){
                            // $specified = "";
                            // echo"<script> alert('No data to be saved!');</script>";
                        // }else{
                            $specified = $_POST["categoryOfWork9"];
                              
                        // }
                    }

                    // mysqli_query($connections, "INSERT INTO requestertbl (rollNo,reqName,room,dateTimeNeeded,dateSubmitted,telNo,stat)
                    // VALUES('$transaction_no','$requester_name','$room_office','$date_time_needed','$var_date','$telephone_mobile_no','1')");
    
                    mysqli_query($connections, "INSERT INTO requesttbl (rollNo,requester,room,date_needed,date_submitted,mobnum,priority_level,categoryOfWork1,categoryOfWork2,categoryOfWork3,categoryOfWork4,categoryOfWork5,categoryOfWork6,categoryOfWork7,categoryOfWork8,stat)
                    VALUES('$transaction_no','$requester_name','$room','$date_time_needed','$var_date','$mobile','$PL','$compRep','$lan','$assist','$printer','$cctv','$email_LogIn','$rfid','$specified','1')");
            
                    // $notif += 1;

					// mysqli_query($connections, "UPDATE notiftbl SET notifCount = '$notif' ");

                    // echo "<script>alert('Record has been successfully added!');</script>";
                    echo "<script>window.location.href='requestDetails.php?$success&&notify=Record has been successfully added!&&$end'; alert('Record has been successfully added!');</script>";
                    // echo "<script>alert('Record has been successfully added!');</script>";

                }



            // }
        }else{

            echo"<script> alert('No data to be saved!');</script>";

        }


    }

}
    ?>

	<div id="nav">
    <a class="nav" href="myRequests">My Requests</a><a href="?" class="nav" id="two">Make Request</a><a href="../logout.php" class="nav">Log Out</a><a href="../" class="nav toRight"><?php echo $requester_name; ?></a>
	</div>



    <center>
        <div class="table">
            <form method="POST" id="frm">

    <div class="external_data">
    
    <input type="text" name="catGet1" readonly value="<?php echo $catGet1; ?>">
    <input type="text" name="catGet2" readonly value="<?php echo $catGet2; ?>"><br>
    <input type="text" name="catGet3" readonly value="<?php echo $catGet3; ?>">
    <input type="text" name="catGet4" readonly value="<?php echo $catGet4; ?>"><br>
    <input type="text" name="catGet5" readonly value="<?php echo $catGet5; ?>">
    <input type="text" name="catGet6" readonly value="<?php echo $catGet6; ?>"><br>
    <input type="text" name="catGet7" readonly value="<?php echo $catGet7; ?>">
    <input type="text" name="catGet8" readonly value="<?php echo $catGet8; ?>">
    </div>
                <table border="0">
                    <tr><th colspan="3"><h1>Request Details</h1></th></tr>
                    
                    <tr>
                        <td class="boldFont"><b>Name:</b></td>
                        <td><input type="text" name="requester_name" value="<?php echo $requester_name; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td class="boldFont"><b>Transaction No.:</b></td>
                        <td><input type="text" name="transaction_no" value="<?php echo $transaction_no; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td class="boldFont"><b>Date Needed:</b></td>
                        <td><input type="date" name="date_time_needed" value="<?php echo $date_time_needed; ?>" required></td>
                    </tr>
                    <tr>
                        <td class="boldFont"><b>Date:</b></td>
                        <td><input type="text" name="var_date" value="<?php echo date("Y-m-d"); ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Category of Work:</b></td>
                        <td><input type="checkbox" name="categoryOfWork1" id="1" onclick="cat1()" value="<?php echo $compRep; ?>"><a href="#" class="che" id="1" onclick="cat1Che()" > Computer Repair </a></td>
                        <td><input type="checkbox" name="categoryOfWork2" id="5" onclick="cat5()" value="<?php echo $lan; ?>"><a href="#" class="che" id="5" onclick="cat5Che()" > LAN/Internet Connection </a></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="checkbox" name="categoryOfWork3" id="2" onclick="cat2()" value="<?php echo $assist; ?>"><a href="#" class="che" id="2" onclick="cat2Che()" > Assist/Install LCD Projector </a></td>
                        <td><input type="checkbox" name="categoryOfWork4" id="6" onclick="cat6()" value="<?php echo $printer; ?>"><a href="#" class="che" id="6" onclick="cat6Che()" > Printer Repair </a></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="checkbox" name="categoryOfWork5" id="3" onclick="cat3()" value="<?php echo $cctv; ?>"><a href="#" class="che" id="3" onclick="cat3Che()" > CCTV Repair </a></td>
                        <td><input type="checkbox" name="categoryOfWork6" id="7" onclick="cat7()" value="<?php echo $email_LogIn; ?>"><a href="#" class="che" id="7" onclick="cat7Che()" > Email or Login Account </a></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="checkbox" name="categoryOfWork7" id="4" onclick="cat4()" value="<?php echo $rfid; ?>"><a href="#" class="che" id="4" onclick="cat4Che()" > RFID Photo/Sig. Capturing </a></td>
                        <td><input type="checkbox" name="categoryOfWork8" id="8" onclick="cat8()" value="<?php echo $others; ?>"><a href="#" class="che" id="8" onclick="cat8Che()" > Others, Please specify. </a></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    
                    <tr>
                        <td colspan="3"  rows="3" cols="50"><center><textarea type="text" name="categoryOfWork9" id="other" value="<?php echo $specified; ?>" form="frm" placeholder="Others..." disabled></textarea></center></td>
                        <!-- <td colspan="3"><center><input type="text" name="categoryOfWork9" id="other" size="70px" value="" disabled></center></td> -->
                    </tr>

                    
                    <tr>
                        <td><input type="submit" name="button" value="Submit" class="button"></td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
    <br>
    <!-- <a href="requesterForm.php" class="button">Back</a> -->


    <script src="../scripts/reqDetails.js"></script>
</body>
</html>