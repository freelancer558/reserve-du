<?php
	session_start();
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserName = '".trim($_POST['txtUsername'])."' 
	and Password = '".trim($_POST['txtPassword'])."'
	and Active = 'Yes' ";
	$objQuery = mysql_query($strSQL)or die(mysql_error());
	$objResult = mysql_fetch_array($objQuery);
	@mysql_query("SET NAMES UTF8");
	if(!$objResult)
	{
			echo "<center>Username หรือ Password ไม่ถูกต้อง! <br>
			หรือ ยังไม่ได้รับการอนุมัติจากเจ้าหน้าที่ <br>กรุณาตรวจสอบ อีเมล์</cemter>";
			echo "<a href='login.php'><br><center>ย้อนกลับ</center></a>";
	}
	else
	{
			$_SESSION["UserId"] = $objResult["UserId"];
			$_SESSION["UserStatus"] = $objResult["UserStatus"];

			session_write_close();
			
			if($objResult["UserStatus"] == "ADMIN")
			{
				header("location:admin/admin_page1.php");
			}
			else if($objResult["UserStatus"] == "authority")
			{
				header("location:authority/authority_page.php");
			}
			else if($objResult["UserStatus"] == "authority-apply")
			{
				header("location:authority-apply/authority_page.php");
			}
			else if($objResult["UserStatus"] == "user")
			{
				header("location:user/user_page1.php");
			}
	}
	mysql_close();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<META HTTP-EQUIV="Refresh"CONTENT="2;URL=login.php">
</head>
<body></body>
</html>