<html>
<head>
<title>ThaiCreate.Com PHP Sending Email</title>
</head>
<body>
<?php
	$strTo = "katsuojr@gmail.com";
	$strSubject = "Test Send Email";
	$strHeader = "From: webmaster@reserve-du.com";
	$strMessage = "My Body & My Description";
	$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	if($flgSend)
	{
		echo "Email Sending.";
	}
	else
	{
		echo "Email Can Not Send.";
	}
?>
</body>
</html>