

    <link rel="stylesheet" type="text/css" media="screen" href="../styles/nav.css" />


<?php
		if(isset($_SESSION["userName"])){
	
			$userName = $_SESSION["userName"];
			
			$authentication = mysqli_query($connections, "SELECT * FROM usertbl WHERE userName='$userName' ");
			$fetch = mysqli_fetch_assoc($authentication);
			$account_type = $fetch["account_type"];
			$requester_name = $fetch["name"];

		}
?>
	<div id="nav">
<a class="nav" href="myRequests" id="one">My Requests</a><a href="requestDetails" class="nav active" id="two">Make Request</a><a href="../logout.php" class="nav">Log Out</a><a href="../" class="nav toRight"><?php echo $req; ?></a>
<!-- <a href="requesterForm.php" class="nav active" id="one">Make Request</a><a href="../logout.php" class="nav">Log Out</a> -->
<!-- <a href="requesterForm.php" class="nav active" id="one">Make Request</a><a href="register" class="nav" id="two">Nav 2</a><a href="currentElection" class="nav" id="three">Nav 3</a><a href="previousElection" class="nav" id="four">Nav 4</a><a href="studentRecord" class="nav" id="five">Nav 5</a><a href="candidateRecord" class="nav" id="six">Nav 6</a><a href="../logout.php" class="nav">Log Out</a> -->

	</div>
	