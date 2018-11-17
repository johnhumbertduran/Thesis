
<style>

* {box-sizing:border-box}


.tdTop{
color:#fff;
background:#3a3a3a;
padding-top:10px;
padding-bottom:7px;
}


tr:nth-child(odd){
background:#c0c0c0;

}


tr:nth-child(even){
background:#a5a5a5;

}


.siz{
    width:10%;
}



#modal{
background-color:rgba(0, 0, 0, .5);
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
background-color:#3a3a3a;
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
background-color:#3a3a3a;
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
	background-color:#3a3a3a;
}

.ri{
	text-align:right;
	color:#fff;
}

.label{color:#fff;}



</style>

    <link rel="stylesheet" type="text/css" media="screen" href="../styles/nav.css" />

<br/>
<h1 style="text-align:center; color:#fff;">Student Records</h1>
<br/>



<center>

<table border="0" width="100%" style="background:#fff; ">
	
	<tr>
	
		<td width="10%" class="tdTop"><center><b>Transaction No</b></center></td>
		<td width="16%" class="tdTop"><center><b>Name</b></center></td>
		<td width="14%" class="tdTop"><center><b>Room</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Date Submitted</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Date Needed</b></center></td>
		<td width="16%" class="tdTop"><center><b>Telephone No</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>View Request</b></center></td>
		<td width="16%" class="tdTop"><center><b>Action</b></center></td>
	
	</tr>





<?php

	include("../connections.php");
	
	$newName = $newRoom = $newDateNeed = $newDateSub = $newTel = "";
	
	$retrieve_query = mysqli_query($connections,"SELECT * FROM requestertbl where stat='1' ");
	
	while($row_requesters = mysqli_fetch_assoc($retrieve_query)){
	
	$db_rollNo = $row_requesters["rollNo"];
	
	$roll = $row_requesters["rollNo"];
	$db_reqName = $row_requesters["reqName"];
	$db_room = $row_requesters["room"];
	$db_dateTimeNeeded = $row_requesters["dateTimeNeeded"];
	$db_dateSubmitted = $row_requesters["dateSubmitted"];
	$db_telNo = $row_requesters["telNo"];
		
		$jScript = md5(rand(1,9));
		
		$new_Script = md5(rand(1,9));
		
		$get_Update = md5(rand(1,9));
		
		$get_Delete = md5(rand(1,9));
	
	
		echo"
		
		<tr>
		
			<td><center>$db_rollNo</center></td>
			<td><center>$db_reqName</center></td>
			<td><center>$db_room</center></td>
			<td><center>$db_dateTimeNeeded</center></td>
			<td><center>$db_dateSubmitted</center></td>
			<td><center>$db_telNo</center></td>
			<td><center><a href='#' class='view'>View Request</a></center></td>
			<td>
				<center>
					<br/>
					
					<a href='	?jScript=$jScript && newScript=$new_Script && get_Update=$get_Update && ver_01=$roll&&$get_Delete ' class='updateBtn'>Update</a>
					
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
			
			if($newName && $newRoom && $newDateNeed && $newDateSub && $newTel){
			
			
			mysqli_query($connections, "UPDATE requestertbl SET reqName = '$db_Name',room = '$db_Room', dateTimeNeeded = '$db_DateNeed', dateSubmitted = '$db_DateSub', telNo = '$db_Tel' WHERE rollNo = '$roll' ");
	
				echo"<script>window.location.href='?'; alert('Record succesfully Updated!');</script>";
				
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
								<tr>
									<td class="nope ri">Date Submitted:</td> <td class="nope"><input type="text" name="dateSub" value="<?php echo $db_DateSub; ?>" class="inTypes" placeholder="Date Submitted" required readonly></td>
								</tr>
								<tr>
									<td class="nope ri">Telephone No.:</td> <td class="nope"><input type="text" name="tel" value="<?php echo $db_Tel; ?>" class="inTypes" maxlength="11" placeholder="Telephone No" required></td>
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
	

		$num = mysqli_query($connections, "SELECT * FROM requestertbl where rollNo='$roll' ");
	
		$rowNum = mysqli_fetch_assoc($num);
		
		$db_Requester = $rowNum["reqName"];
		
		
		
				if(isset($_POST["delete"])){
		
			mysqli_query($connections, "UPDATE requestertbl SET stat=0 WHERE rollNo = '$roll' ");
	
				echo"<script>window.location.href='?'; alert('Record succesfully Updated!');</script>";
			
			
		
		}

?>
	<div id="modal">
		<div class="modal-content">
			<div class="close" onclick="closeB()" style="cursor:pointer;">X</div>
				<form method="POST">
							<h1 class="label">Delete</h1>
				<font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" color="black"><b><?php echo "Are you sure you want to delete "?></br><font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" size="5em" color="red"><?php echo $db_Requester;?></font><?php echo " ?"; ?></b></font>
				
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

</center>

	<script>


function check(){
document.getElementById("modal").setAttribute("style","display:block;");

}

function closeB(){
document.getElementById("modal").setAttribute("style","display:none;");
}


</script>