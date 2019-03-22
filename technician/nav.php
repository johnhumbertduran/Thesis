
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/nav.css" />


<style>

.notif{
	background-color:#c20a0a;
	border-radius:50%;
	position:absolute;
	padding:5px 11px;
	top:0;
	left:8%;
	color:#fff;
}

.notif::after{
	content: " ";
    position: absolute;
    top: 80%; /* At the bottom of the tooltip */
    left: -7%;
    /* margin-left: -5px; */
    border-width: 10px;
    border-style: solid;
	border-color: #c20a0a transparent transparent transparent;
	-ms-transform: rotate(25deg); /* IE 9 */
    -webkit-transform: rotate(25deg); /* Safari */
    transform: rotate(25deg);
}

</style>
    	<script src="js/jQuery.js"></script>


    <script>
    
    setInterval(function(){
    
        $('#notif').load('notif.php');
        // $('#checkNotif').load('checkNotif.php');
    
    
    }, 1000);

	</script>



<?php

$notif1 = sha1(rand(1,9));
$notif2 = sha1(rand(1,9));
$notif3 = sha1(rand(1,9));

?>
	<div id="nav">
<a href="requester_records?<?php echo"redir_=$notif1&&request=$notif2&&perm=$notif3"; ?>" class="nav" id="one">Requests</a><a href="../logout.php" class="nav">Log Out</a>
<!-- <a href="requester_records?<?php echo"redir_=$notif1&&request=$notif2&&perm=$notif3"; ?>" class="nav" id="one">View Requests</a><a href="<?php echo"?redir_=$notif1&&request=$notif2&&perm=$notif3"; ?>" class="nav" id="two">Notification</a><a href="currentElection" class="nav" id="three">Nav 3</a><a href="previousElection" class="nav" id="four">Nav 4</a><a href="studentRecord" class="nav" id="five">Nav 5</a><a href="candidateRecord" class="nav" id="six">Nav 6</a><a href="../logout.php" class="nav">Log Out</a> -->

	</div>

	<?php
		include("../connections.php");
		$notifs = mysqli_query($connections, "SELECT notifCount FROM notiftbl ");
		$getNotif = mysqli_fetch_assoc($notifs);
		$notif = $getNotif["notifCount"];
	?>


	<div id="notif">
    
	<?php	include("notif.php"); ?>

    </div>








	<div id="checkNotif">
    
	<?php	include("checkNotif.php"); ?>

    </div>


	