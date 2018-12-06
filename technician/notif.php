	<?php
		include("../connections.php");
		$notifs = mysqli_query($connections, "SELECT notifCount FROM notiftbl ");
		$getNotif = mysqli_fetch_assoc($notifs);
		$notif = $getNotif["notifCount"];
	?>

	<?php if($notif > 0){

	?>
    <span class="notif"><?php echo $notif; ?></span>

	<?php }else{} ?>