<?php
	session_start();
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserName = '".trim($_POST['txtUsername'])."' 
	and Password = '".trim($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL)or die(mysql_error());
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["UserId"] = $objResult["UserId"];
			$_SESSION["UserStatus"] = $objResult["UserStatus"];

			session_write_close();
			
			if($objResult["UserStatus"] == "ADMIN")
			{
				header("location:admin_page1.php");
			}
			else if($objResult["UserStatus"] == "authority")
			{
				header("location:authority_page.php");
			}
			else
			{
				header("location:user_page1.php");
			}
	}
	mysql_close();
?>