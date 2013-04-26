<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<html>
<?php include_once "connDB.php"; ?>
<head>
<META HTTP-EQUIV="Refresh"CONTENT="2;URL=userRepairing-A.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM userdurablereport WHERE RId = '".$_GET["RId"]."' ";

$strSQL = "UPDATE userdurablereport SET Active = 'Yes' WHERE RId = '".$_GET["RId"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
        echo "<a href='userRepairing-A.php'><center>ทำการบันทึกสำเร็จ
		<br>ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>