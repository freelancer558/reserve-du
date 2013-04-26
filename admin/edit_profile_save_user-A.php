<?php
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
<?php include_once "connDB.php"; ?>

<head>
<META HTTP-EQUIV="Refresh"CONTENT="2;URL=add_user-A.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "INSERT INTO user ";
$strSQL .="(UserId,UserName,Password,UserFullname,UserSex,UserAddress,UserPhone,UserEmail,UserSSID,UserStatus,FacultyId,DepartmentId,BranchId) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["txtUserId"]."','".$_POST["txtUserName"]."','".$_POST["txtPassword"]."' ";
$strSQL .=",'".$_POST["txtUserFullname"]."','".$_POST["txtUserSex"]."','".$_POST["txtUserAddress"]."' ";
$strSQL .=",'".$_POST["txtUserPhone"]."','".$_POST["txtUserEmail"]."','".$_POST["txtUserSSID"]."','".$_POST["txtUserStatus"]."' ";
$strSQL .=",'".$_POST["txtFacultyId"]."','".$_POST["txtDepartmentId"]."','".$_POST["txtBranchId"]."') ";

$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "<a href='add_user-A.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>