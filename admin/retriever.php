
<style>

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
	
	
	$retrieve_query = mysqli_query($connections,"SELECT * FROM requestertbl");
	
	while($row_requesters = mysqli_fetch_assoc($retrieve_query)){
	
	$db_rollNo = $row_requesters["rollNo"];
	
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
					
					<a href='	?jScript=$jScript && newScript=$new_Script && get_Update=$get_Update && ' class='updateBtn'>Update</a>
					
					&nbsp
					
					<a href='	?jScript=$jScript && newScript=$new_Script && get_Delete=$get_Delete && ' class='deleteBtn'>Delete</a>
					
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

</center>

