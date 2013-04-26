<?php
	require_once('../connDB.php');

	$year = date('Y');
	$month = date('m');

	$events=[];
	$event=[];
	$sql 	= "SELECT * FROM reserve WHERE status = 'approved'";
	$q 		= mysql_query($sql);

	while($result = mysql_fetch_assoc($q)){
		$user = 'SELECT UserFullname FROM user WHERE UserId = ' . $result['user_id'];
		$name = mysql_fetch_assoc(mysql_query($user));
		array_push($events, array('id'=> $result['ID'], 'title' => $name['UserFullname'] . ' - เครื่องมือ  ' . $result['DurableArticleSet'] . ' - เริ่ม   '.  $result['Date'] .  '  - สิ้นสุด  ' . $result['end_date'] , 'start' => $result['Date'], 'end' => $result['end_date']));
	}

	echo json_encode($events);

?>
