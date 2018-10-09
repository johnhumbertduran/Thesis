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
        $transaction_no =  $requester_name =  $room_office =  $date_time_needed =  $date = $telephone_mobile_no = "";
    ?>

    <?php
    if((empty($_GET["transaction_no_data"])) || (empty($_GET["requester_name_data"])) || (empty($_GET["room_office_data"])) || (empty($_GET["date_time_needed_data"])) || (empty($_GET["date_data"])) || (empty($_GET["telephone_mobile_no_data"]))){
        echo"<script>alert('Sorry, No data was transmitted!'); window.location.href = 'requesterForm.php';</script>";
    }else{
        $transaction_no = $_GET["1"];
        $requester_name = $_GET["2"];
        $room_office = $_GET["3"];
        $date_time_needed = $_GET["4"];
        $date = $_GET["5"];
        $telephone_mobile_no = $_GET["6"];
    }
    ?>

        <form method="post">
    <input type="text" readonly name="transaction_no" value="<?php echo $transaction_no; ?>"><br>
    <input type="text" readonly name="requester_name" value="<?php echo $requester_name; ?>"><br>
    <input type="text" readonly name="room_office" value="<?php echo $room_office; ?>"><br>
    <input type="text" readonly name="date_time_needed" value="<?php echo $date_time_needed; ?>"><br>
    <input type="text" readonly name="date" value="<?php echo $date; ?>"><br>
    <input type="text" readonly name="telephone_mobile_no" value="<?php echo $telephone_mobile_no; ?>">
    </form>


    <a href="../thesis/requesterForm.php" class="button">back</a>
</body>
</html>