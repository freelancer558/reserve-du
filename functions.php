<?php
	function sendEmail($from, $to, $subject, $message)
	{
		$headers  = "From: ".$from."\r\n";
	  $headers .= "Reply-To: ".$from."\r\n";
	  $headers .= "Return-Path: ".$from."\r\n";
	  $headers .= "X-Mailer: PHP/" . phpversion() . "\n";
	  $headers .= 'MIME-Version: 1.0' . "\n";
	  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		return mail($to, $subject, $message, $headers);
	}