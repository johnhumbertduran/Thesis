<?php

        include("../connections.php");
        // include("nav.php");

        ?>

<center>

<table border="0" width="100%" style="background:#fff; ">
	
	<tr>
	
		<td width="10%" class="tdTop"><center><b>Transaction No</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Date Submitted</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Date Needed</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>View Request</b></center></td>
		<td width="16%" class="tdTop siz"><center><b>Status</b></center></td>
	
	</tr>





<?php
	
	$newName = $newRoom = $newDateNeed = $newDateSub = "";
	
	$retrieve_query = mysqli_query($connections,"SELECT * FROM requesttbl WHERE stat!='0' AND requester='$req' ORDER BY rollNo DESC ");
	
	while($row_requesters = mysqli_fetch_assoc($retrieve_query)){
	
	$db_rollNo = $row_requesters["rollNo"];
	
	$roll = $row_requesters["rollNo"];
	$db_dateTimeNeeded = $row_requesters["date_needed"];
	$db_dateSubmitted = $row_requesters["date_submitted"];
	$status = $row_requesters["stat"];
		
		$jScript = md5(rand(1,9));
		
		$new_Script = md5(rand(1,9));
		
		$get_Update = md5(rand(1,9));
		
		$get_Delete = md5(rand(1,9));
	
	
		echo"
		
		<tr>
		
			<td><center>$db_rollNo</center></td>
			<td><center>$db_dateSubmitted</center></td>
			<td><center>$db_dateTimeNeeded</center></td>
			<td><center><a href='?jScript=$jScript && newScript=$new_Script && view_Request=$get_Update && ver_0x=$roll&&$get_Delete ' class='view'>View</a></center></td>
			<td><center>"; if ($status == 1) {echo "<div class='pending'><b>Pending</b></div>";}else{ if($status == 2) {echo "<div class='progress'><b>In Progress</b></div>";} else { if($status == 3) {echo "<div class='accomplished'><b>Accomplished</b></div>";} } } echo"</center></td>
		
		</tr>";
		
		echo "
		
		
		";
		
		
	
	}

	

	?>




</table>


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