
<style>

* {box-sizing:border-box}


.tdTop{
color:#fff;
background:#005014;
padding-top:10px;
padding-bottom:7px;
}

.tdTopRequest{
color:#fff;
background:#005014;
text-align:center;
padding:10px 15px;
/* padding-top:10px;
padding-bottom:7px; */
border-radius:6px;
}

.reqTd{
	padding:10px;
	border-radius:6px;
}


tr:nth-child(odd){
background:#29e057;

}


tr:nth-child(even){
background:#079129;

}


.siz{
    width:10%;
}



#modal{
background-color:#068d2880;
/* display:none; */
position:fixed;
overflow:auto;
height:100%;
width:100%;
z-index:1;
top:0;
left:0;
}

.modal-content{
background-color:#12a837;
border:5px solid #fff;
position:absolute;
width:27%;
height:50%;
top:150px;
left:495px;
z-index:2;
}

.modal-content{    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.9s;
    animation-name: zoom;
    animation-duration: 0.9s;
}



.modal_content{
background-color:#12a837;
border:5px solid #fff;
position:absolute;
width:30%;
height:60%;
top:10%;
left:35%;
z-index:2;
}

.modal_content{    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.9s;
    animation-name: zoom;
    animation-duration: 0.9s;
}



.request_modal_content{
background-color:#12a837;
border:5px solid #fff;
position:absolute;
width:40%;
height:75%;
top:10%;
left:30%;
z-index:2;
}

.request_modal_content{    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.9s;
    animation-name: zoom;
    animation-duration: 0.9s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}

@keyframes zoom {
    from {transform: scale(0.1)} 
    to {transform: scale(1)}
}

.close{
background-color:#cc1616;
border-radius:50%;
position:absolute;
font-weight:bold;
font-size:1.5em;
padding:0 7px;
right:10px;
color:#fff;
z-index:3;
top:5px;
}

.close:hover{
background:#f00;
box-shadow:0 3px 8px #000;
}

.inTypes{
/* position:absolute;
top:130px;
left:100px; */
font-size:1em;
padding:5px;
border-radius:6px;
border:none;
}

.inTypes:nth-child(8){
	width:52%;
	/* background-color:red; */
	/* float:left; */
}

.updateBtn{
padding:4px;
font-size: .9em;
}

.deleteBtn{
padding:4px;
font-size: .9em;

}

.nope{
	background-color:#12a837;
}

.ri{
	text-align:right;
	color:#fff;
}

.label{color:#fff;}

.low{
	background-color: #00ff00;
	padding: 23px 0;
	/* color:#ffffff; */
}

.medium{
	background-color: #dfe217;
	padding: 23px 0;
}

.high{
	background-color: #a70909;
	padding: 23px 0;
	color:#ffffff;
}



</style>

    <link rel="stylesheet" type="text/css" media="screen" href="../styles/nav.css" />



<center>

<table border="0" width="100%" style="background:#fff; ">
	
	<tr>
	
		<td width="10%" class="tdTop"><center><b>Transaction No</b></center></td>
		<td width="16%" class="tdTop"><center><b>Name</b></center></td>
		<td width="10%" class="tdTop"><center><b>Room</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Date Submitted</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Date Needed</b></center></td>
		<td width="8%" class="tdTop"><center><b>Mobile No</b></center></td>
		<td width="13%" class="tdTop siz"><center><b>Requests</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Priority Level</b></center></td>
		<td width="16%" class="tdTop"><center><b>Action</b></center></td>
	
	</tr>





<?php

	include("../connections.php");

	$notifs = mysqli_query($connections, "SELECT notifCount FROM notiftbl ");
	$getNotif = mysqli_fetch_assoc($notifs);
	$notif = $getNotif["notifCount"];
	
	$newName = $newRoom = $newDateNeed = $newDateSub = $newTel = "";
	
	$retrieve_query = mysqli_query($connections,"SELECT * FROM requesttbl WHERE stat='1' ORDER BY rollNo DESC ");
	$user_query = mysqli_query($connections,"SELECT * FROM usertbl WHERE ");
	
	while($row_requesters = mysqli_fetch_assoc($retrieve_query)){
	
	$db_rollNo = $row_requesters["rollNo"];
	
	$roll = $row_requesters["rollNo"];
	$db_reqName = $row_requesters["requester"];
	$db_room = $row_requesters["room"];
	$db_dateTimeNeeded = $row_requesters["date_needed"];
	$db_dateSubmitted = $row_requesters["date_submitted"];
	$db_telNo = $row_requesters["mobnum"];
	$db_PL = $row_requesters["priority_level"];
		
		$jScript = md5(rand(1,9));
		
		$new_Script = md5(rand(1,9));
		
		$get_Update = md5(rand(1,9));
		
		$get_Delete = md5(rand(1,9));
	
	
		echo"
		
		<tr>
		
			<td><center>$db_rollNo</center></td>
			<td><center>$db_reqName</center></td>
			<td><center>$db_room</center></td>
			<td><center>$db_dateSubmitted</center></td>
			<td><center>$db_dateTimeNeeded</center></td>
			<td><center>$db_telNo</center></td>
			<td><center><a href='?jScript=$jScript && newScript=$new_Script && view_Request=$get_Update && ver_0x=$roll&&$get_Delete ' class='view'>View</a></center></td>
			<td><center>"; if ($db_PL == '1'){ echo "<div class='low'><b>Low</b></div>";} else { if ($db_PL == '2'){ echo "<div class='medium'><b>Medium</b></div>";} else { if ($db_PL == '3'){ echo "<div class='high'><b>High</b></div>";} } } echo "</center></td>
			<td>
				<center>
					<br/>
					
					<a href='	?jScript=$jScript && newScript=$new_Script && get_approved=$get_Update && ver_01=$roll&&$get_Delete ' class='updateBtn'>Approve</a>
					
					&nbsp
					
					<a href='	?jScript=$jScript && newScript=$new_Script && get_Delete=$get_Delete && ver_02=$roll&&$get_Update ' class='deleteBtn'>Delete</a>
					
					<br/>
					<br/>
				</center>
			</td>
		
		</tr>";
		
		echo "
		
		
		";
		
		
	
	}

	

	?>




</table>

<?php

	if(empty($_GET['get_Update'])){

	}else{

		$roll = $_GET['ver_01'];
	
		$getID = mysqli_query($connections, "SELECT * FROM requestertbl where rollNo='$roll' ");
		
		while($rowID = mysqli_fetch_assoc($getID)){
		
			$db_Name = $rowID["reqName"];
			$db_Room = $rowID["room"];
			$db_DateNeed = $rowID["dateTimeNeeded"];
			$db_DateSub = $rowID["dateSubmitted"];
			$db_Tel = $rowID["telNo"];
		
		}
		
				if(isset($_POST["update"])){
		
			if(empty($_POST["name"])){
			
				// 
			
			}else{
			
				$newName = $_POST["name"];
				$db_Name = $newName;
			
			}
			
			
			if(empty($_POST["room"])){
			
				// 
			
			}else{
			
				$newRoom = $_POST["room"];
				$db_Room = $newRoom;
			
			}
			
			
			if(empty($_POST["dateNeed"])){
			
				// 
			
			}else{
			
				$newDateNeed = $_POST["dateNeed"];
				$db_DateNeed = $newDateNeed;
			
			}
			
			
			if(empty($_POST["dateSub"])){
			
				// 
			
			}else{
			
				$newDateSub = $_POST["dateSub"];
				$db_DateSub = $newDateSub;
			
			}
			
			
			if(empty($_POST["tel"])){
			
				// 
			
			}else{
			
				$newTel = $_POST["tel"];
				$db_Tel = $newTel;
			
			}
			
			if($newName && $newRoom && $newDateNeed && $newTel){
			
			
				if(!preg_match("/^[a-zA-Z ]*$/", $newName)){
				
					// $requester_name_err = "Numbers and special characters are not allowed!";
					echo"<script>alert('Numbers and special characters are not allowed in your name!');</script>";
				}else{

					$dateNow = date("m/d/y");

					if( strtotime($db_DateNeed) <= strtotime($dateNow)){

						echo "<script>alert('Date needed is prior to the date today!');</script>";

					}else{

						if(strlen($db_Tel) < 11 ){
                            
							echo"<script>alert('Contact number must be 11 digits!');</script>";  

						}else{

							if(!preg_match("/^[0-9]*$/", $db_Tel)){

								echo"<script>alert('Contact number must not contain alphabet(s) or any white space!');</script>";  

							}else{

								
								mysqli_query($connections, "UPDATE requestertbl SET reqName = '$db_Name',room = '$db_Room', dateTimeNeeded = '$db_DateNeed', /* dateSubmitted = '$db_DateSub', */ telNo = '$db_Tel' WHERE rollNo = '$roll' ");
								
								echo"<script>window.location.href='?'; alert('Record succesfully Updated!');</script>";
							}
						}
					}
				}
			}
		}
						
					

?>

	<div id="modal">
		<div class="modal_content">
			<div class="close" onclick="closeB()" style="cursor:pointer;">X</div>
				<form method="POST">

							<h1 class="label">Update</h1>
							<table border="0">
								<tr>
									<td class="nope ri">Name:</td> <td class="nope"><input type="text" name="name" value="<?php echo $db_Name; ?>" class="inTypes" placeholder="Name" required></td>
								</tr>

								<tr>
									<td class="nope ri">Room:</td> <td class="nope"><input type="text" name="room" value="<?php echo $db_Room; ?>" class="inTypes" placeholder="Room" required></td>
								</tr>

								<tr>
									<td class="nope ri">Date Needed:</td> <td class="nope"><input type="date" name="dateNeed" value="<?php echo $db_DateNeed; ?>" class="inTypes" placeholder="Date Needed" required></td>
								</tr>

								<!-- <tr>
									<td class="nope ri">Date Submitted:</td> <td class="nope"><input type="text" name="dateSub" value="<?php echo $db_DateSub; ?>" class="inTypes" placeholder="Date Submitted" required readonly></td>
								</tr> -->

								<tr>
									<td class="nope ri">Telephone No.:</td> <td class="nope"><input type="text" name="tel" value="<?php echo $db_Tel; ?>" class="inTypes" maxlength="11" placeholder="Telephone No" onkeypress='return isNumberKey(event)' required></td>
								</tr>

							</table>
				
							<br/>
					
					<input type='submit' value='Update' name='update' class='updateBtn' style='border:none; padding:8px; font-size:1em; cursor:pointer;'> <a  class='deleteBtn' style=" padding:8.5px; font-size:1em; cursor:pointer;" onclick="closeB()">Cancel</a>
				</form>
				
		</div>
	</div>

<?php
	}
?>


<?php

	if(empty($_GET['get_Delete'])){

	} else {

		$roll = $_GET['ver_02'];
	

		$num = mysqli_query($connections, "SELECT * FROM requesttbl where rollNo='$roll' ");
	
		$rowNum = mysqli_fetch_assoc($num);
		
		$db_Requester = $rowNum["requester"];
		
		
		
				if(isset($_POST["delete"])){
		
			mysqli_query($connections, "UPDATE requesttbl SET stat=0 WHERE rollNo = '$roll' ");
	
				echo"<script>window.location.href='?'; alert('Record succesfully Deleted!');</script>";
			
			
		
		}

?>
	<div id="modal">
		<div class="modal-content">
			<div class="close" onclick="closeB()" style="cursor:pointer;">X</div>
				<form method="POST">
							<h1 class="label">Delete</h1>
				<font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" color="black"><b><?php echo "Are you sure you want to delete "?></br><font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" size="5em" color="red"><?php echo $db_Requester . "'s";?></font><?php echo " request?"; ?></b></font>
				
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
					
					<input type='submit' value='Delete' name='delete' class='updateBtn' style='border:none; padding:8px; font-size:1em; cursor:pointer;'> <a  class='deleteBtn' style=" padding:8.5px; font-size:1em; cursor:pointer;" onclick="closeB()">Cancel</a>
				</form>
				
			
		</div>
	</div>
	
	<?php
	}
	?>


<?php

	if(empty($_GET['get_approved'])){

	} else {

		$roll = $_GET['ver_01'];
	

		$num = mysqli_query($connections, "SELECT * FROM requesttbl WHERE rollNo='$roll' ");
	
		$rowNum = mysqli_fetch_assoc($num);
		
		$db_Requester = $rowNum["requester"];
		
		
		
				if(isset($_POST["approve"])){
		
			mysqli_query($connections, "UPDATE requesttbl SET stat='2' WHERE rollNo = '$roll' ");
			$notif += 1;

			mysqli_query($connections, "UPDATE notiftbl SET notifCount = '$notif' ");
				echo"<script>window.location.href='?'; alert('Record succesfully Approved!');</script>";
			
			
		
		}

?>
	<div id="modal">
		<div class="modal-content">
			<div class="close" onclick="closeB()" style="cursor:pointer;">X</div>
				<form method="POST">
							<h1 class="label">Approve</h1>
				<font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" color="black"><b><?php echo "Are you sure you want to delete "?></br><font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" size="5em" color="blue"><?php echo $db_Requester . "'s";?></font><?php echo " request?"; ?></b></font>
				
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
					
					<input type='submit' value='Approve' name='approve' class='updateBtn' style='border:none; padding:8px; font-size:1em; cursor:pointer;'> <a  class='deleteBtn' style=" padding:8.5px; font-size:1em; cursor:pointer;" onclick="closeB()">Cancel</a>
				</form>
				
			
		</div>
	</div>
	
	<?php
	}
	?>




<?php

	if(empty($_GET['view_Request'])){

	} else {		
		$roll = $_GET['ver_0x'];
		
		

?>
	<div id="modal">
		<div class="request_modal_content">
			<div class="close" onclick="closeB()" style="cursor:pointer;">X</div>
				<form method="POST">
							<h1 class="label">Request Records</h1>

							<table>

							<tr><td class="tdTopRequest"><b>Request(s)</b></td></tr>
							
				<?php
					
					
					
					$vr = mysqli_query($connections, "SELECT * FROM requesttbl where rollNo='$roll' ");
					$vrName = mysqli_query($connections, "SELECT * FROM requestertbl where rollNo='$roll' ");
					
					
						$rowVr = mysqli_fetch_assoc($vr);
						$rowVrName = mysqli_fetch_assoc($vrName);
						
						
						$db_Requester = $rowVrName["reqName"];
						$catWrk1 = $rowVr["categoryOfWork1"];
						$catWrk2 = $rowVr["categoryOfWork2"];
						$catWrk3 = $rowVr["categoryOfWork3"];
						$catWrk4 = $rowVr["categoryOfWork4"];
						$catWrk5 = $rowVr["categoryOfWork5"];
						$catWrk6 = $rowVr["categoryOfWork6"];
						$catWrk7 = $rowVr["categoryOfWork7"];
						$catWrk8 = $rowVr["categoryOfWork8"];

						
						if($catWrk1){
						echo"<tr><td class='reqTd'>$catWrk1</td></tr>";
						}

						if($catWrk2){
						echo"<tr><td class='reqTd'>$catWrk2</td></tr>";
						}

						if($catWrk3){
						echo"<tr><td class='reqTd'>$catWrk3</td></tr>";
						}

						if($catWrk4){
						echo"<tr><td class='reqTd'>$catWrk4</td></tr>";
						}

						if($catWrk5){
						echo"<tr><td class='reqTd'>$catWrk5</td></tr>";
						}

						if($catWrk6){
						echo"<tr><td class='reqTd'>$catWrk6</td></tr>";
						}

						if($catWrk7){
						echo"<tr><td class='reqTd'>$catWrk7</td></tr>";
						}

						if($catWrk8){
						echo"<tr><td class='reqTd'>$catWrk8</td></tr>";
						}
						 
						
					
				?>
				
							</table>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
					
					<!-- <input type='submit' value='Delete' name='delete' class='updateBtn' style='border:none; padding:8px; font-size:1em; cursor:pointer;'> <a  class='deleteBtn' style=" padding:8.5px; font-size:1em; cursor:pointer;" onclick="closeB()">Cancel</a> -->
				</form>
				
			
		</div>
	</div>
	
	<?php
	}
	?>






</center>

	<script>


		function check(){
		document.getElementById("modal").setAttribute("style","display:block;");
		
		}

		function closeB(){
		document.getElementById("modal").setAttribute("style","display:none;");
		window.location.href = "?";
		}

        function isNumberKey(evt){
	
		var charCode = (evt.which) ? evt.which : event.keyCode

		if(charCode > 31 && (charCode < 48 || charCode > 57) )

		return false;

		return true;

		}

</script>