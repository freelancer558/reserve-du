<?php include('h1.php');?>
<html>
<?php include_once "connDB.php"; ?>
<head>
<META HTTP-EQUIV="Refresh"  CONTENT="2;URL=admin_page1.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");

$strSQL = "UPDATE user SET ";
//	$strSQL .="UserName = '".$_POST["txtEditUserName"]."' ";
	$strSQL .="Password = '".$_POST["txtEditPassword"]."' ";
//	$strSQL .=",UserFullname = '".$_POST["txtEditUserFullname"]."' ";
//	$strSQL .=",UserSex = '".$_POST["txtEditUserAddress"]."' ";
//$strSQL .=",UserAddress = '".$_POST["txtEditUserAddress"]."' ";
//$strSQL .=",UserPhone = '".$_POST["txtEditUserPhone"]."' ";
//$strSQL .=", UserEmail= '".$_POST["txtEditUserEmail"]."' ";
//$strSQL .=", UserSSID= '".$_POST["txtEditUserSSID"]."' ";
//$strSQL .=",FacultyId = '".$_POST["txtEditFacultyId"]."' ";
//$strSQL .=",DepartmentId = '".$_POST["txtEditDepartmentId"]."' ";
//$strSQL .=", BranchId= '".$_POST["txtEditBranchId"]."' ";
$strSQL .="	WHERE UserId = '".$_SESSION["UserId"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "<a href='admin_page1.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>