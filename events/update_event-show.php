<?php
	require_once('show_reserve-2.php');

	$result = $calendar->updatereserveStatus(array(
		"id" => $_POST['id'], 
		"status" => $_POST['status'],
		"group_id" => $_POST['group_id']
	));				
			
	if (isset($result["error"])) 
	 echo  '{"status": false, "msg":" Cannot update status "}';
	
	echo '{"status": true, "msg": "'.$result['message'].'"}';
