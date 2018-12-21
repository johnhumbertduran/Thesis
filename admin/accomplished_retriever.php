
<style>

* {box-sizing:border-box}


.tdTop{
color:#000;
background:#bebb00;
padding-top:10px;
padding-bottom:7px;
}

.tdTopRequest{
color:#000;
background:#bebb00;
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
background:#b4b216;
color:#000;

}


tr:nth-child(even){
background:#c7c421;
color:#000;

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



.request_modal_content{
background-color:#3a3a3a;
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
	background-color:#3a3a3a;
}

.ri{
	text-align:right;
	color:#fff;
}

.label{color:#fff;}

#three{
    background-color:#1f1f1f;
}

</style>

    <link rel="stylesheet" type="text/css" media="screen" href="../styles/nav.css" />



<center>

<table border="0" width="100%" style="background:#fff; ">
	
	<tr>
	
		<td width="10%" class="tdTop"><center><b>Transaction No</b></center></td>
		<td width="16%" class="tdTop"><center><b>Name</b></center></td>
		<td width="5%" class="tdTop"><center><b>Room</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Date Submitted</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Date Needed</b></center></td>
		<td width="10%" class="tdTop"><center><b>Telephone No</b></center></td>
		<td width="10%" class="tdTop siz"><center><b>View Request</b></center></td>
		<td width="19%" class="tdTop"><center><b>Action</b></center></td>
	
	</tr>


					#permanent delete kara kase kung soft delete hay ma agto imaw sa archived then pag e unarchived imaw hay ma agto ta maw sa records


<?php

	include("../connections.php");
	
	$newName = $newRoom = $newDateNeed = $newDateSub = $newTel = "";
	
	$retrieve_query = mysqli_query($connections,"SELECT * FROM requestertbl WHERE stat='3' ORDER BY rollNo DESC ");
	
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
			<td width='5%'><center>$db_room</center></td>
			<td><center>$db_dateSubmitted</center></td>
			<td><center>$db_dateTimeNeeded</center></td>
			<td width='10%'><center>$db_telNo</center></td>
			<td width='10%'><center><a href='?jScript=$jScript && newScript=$new_Script && view_Request=$get_Update && ver_0x=$roll&&$get_Delete ' class='view'>View Request</a></center></td>
			<td width='19%'>
				<center>
					<br/>
					
					<a href='	?jScript=$jScript && newScript=$new_Script && get_Update=$get_Update && ver_01=$roll&&$get_Delete ' class='accomRet'>Return to Records</a>
					
					&nbsp

					<a href='	?jScript=$jScript && newScript=$new_Script && get_Delete=$get_Delete && ver_02=$roll&&$get_Update ' class='deleteBtn'>Permanent Delete</a>
					
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
	
		$num = mysqli_query($connections, "SELECT * FROM requestertbl where rollNo='$roll' ");
	
		$rowNum = mysqli_fetch_assoc($num);
		
		$db_Requester = $rowNum["reqName"];
		
				if(isset($_POST["update"])){
								
								mysqli_query($connections, "UPDATE requestertbl SET stat = '1' WHERE rollNo = '$roll' ");
								
								echo"<script>window.location.href='?'; alert('Record succesfully Updated!');</script>";

		}
						
					

?>

	<div id="modal">
		<div class="modal_content">
			<div class="close" onclick="closeB()" style="cursor:pointer;">X</div>
				<form method="POST">

							<h1 class="label">Return to Records</h1>

                            <br>

				            <font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" color="black"><b><?php echo "Return"?></br><font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" size="5em" color="red"><?php echo $db_Requester;?></font><br><?php echo " to records?"; ?></b></font>
							
				
							<br/>
							<br/>
							<br/>
					
					<input type='submit' value='Return' name='update' class='accomRet' style='border:none; padding:8px; font-size:1em; cursor:pointer;'> <a  class='deleteBtn' style=" padding:8.5px; font-size:1em; cursor:pointer;" onclick="closeB()">Cancel</a>
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
		
			mysqli_query($connections, "DELETE FROM requestertbl WHERE rollNo = '$roll' ");
	
				echo"<script>window.location.href='?'; alert('Record succesfully Deleted!');</script>";
			
			
		
		}

?>
	<div id="modal">
		<div class="modal-content">
			<div class="close" onclick="closeB()" style="cursor:pointer;">X</div>
				<form method="POST">
							<h1 class="label">Delete</h1>
				<font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" color="black"><b><?php echo "Are you sure you want to permanently delete "?></br><font style="text-shadow:0 2px 1px #fff, 0 -2px 1px #fff, 2px 0 1px #fff, -2px 0 1px #fff;" size="5em" color="red"><?php echo $db_Requester;?></font><?php echo " ?"; ?></b></font>
				
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