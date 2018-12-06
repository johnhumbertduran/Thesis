<?php

	if(empty($_GET['redir_'])){

	}else{

		$notif = 0;

		mysqli_query($connections, "UPDATE notiftbl SET notifCount = '$notif' ");

		// echo"<table border='2'>
		
		// 	<tr><td>Hya</td></tr>
		
		// </table>";

	}

	#butangan status sa request details table



?>