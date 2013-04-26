<?php
	require_once('smoothcalendar.php');
	require_once('../functions.php');

	$result = $calendar->updatereserveStatus(array(
		"id" => $_POST['id'], 
		"status" => $_POST['status'],
		"group_id" => $_POST['group_id']
	));				
			
	if (isset($result["error"])) echo  '{"status": false, "msg":" Cannot update status "}';
	
	$reserv_sql = 'SELECT user_id FROM reserve WHERE group_id='.$_POST['group_id'];
  $reserv_q = mysql_fetch_assoc($calendar->query($reserv_sql));

  $user_sql = 'SELECT UserEmail FROM user WHERE UserId='.$reserv_q['user_id'];
  $user_q = mysql_fetch_assoc($calendar->query($user_sql));

  // sendEmail($from, $to, $subject, $message)
  if(function_exists('sendEmail')):
  	if(sendEmail('admin@example.com', $user_q['UserEmail'], 'อนุมัติ', 'อุปกรณ์ที่คุณร้องขอมาได้รับการอนุมัติแล้ว')):
			echo '{"status": true, "msg": "'.$result['message'].'"}';
		else:
			echo '{"status": true, "msg": "อนุมัติเรียบร้อยแล้ว แต่ไม่สามารถส่งอีเมล์ได้"}';
		endif;
  endif;
