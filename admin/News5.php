﻿<?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}

	if($_SESSION['UserStatus'] != "ADMIN")
	{
		echo "This page for Admin only!";
echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}	
	
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<?php


	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	@mysql_query("SET NAMES UTF8");
?>
<html>
<head>

<title>Admin Page</title>
<META HTTP-EQUIV="Refresh"CONTENT="0;URL=News3.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>

</head>

<body>
<?php

		//*** Update Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");

		$strSQL = "UPDATE news SET";
		$strSQL .=" NewsHeader = '".$_POST["txtHead"]."' ";
		$strSQL .=" ,NewsDetail = '".$_POST["txtDe"]."' ";
		$strSQL .= " WHERE NewsId = '".$_GET["NewsId"]."' ";

		$objQuery = mysql_query($strSQL);		
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../myfile/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("../myfile/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE News ";
			$strSQL .=" SET NewsPic = '".$_FILES["filUpload"]["name"]."' WHERE NewsId = '".$_GET["NewsId"]."' ";
			$objQuery = mysql_query($strSQL);		

	echo "<a href='News3.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
<?php } ?>

</body>
</html>


</body>
</html>
