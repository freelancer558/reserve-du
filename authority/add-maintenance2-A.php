<?php include('h1.php'); ?>

<html>
<?php include_once "connDB.php"; ?>

<head>

<META HTTP-EQUIV="Refresh"  CONTENT=";URL=show_maintenance-A.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Add Maintenance Admin</title>

</head>






	<form name="form1" method="post" action="" enctype="multipart/form-data">
<table width="600" border="0">
  <tr> 
<?php 

		//*** Insert Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");
			$strSQL = "SELECT * FROM maintenance ";
		$strSQL = "UPDATE  maintenance SET ";
$strSQL .="MaintenanceDetail2 = '".$_POST["MaintenanceDetail2"]."' ";

$strSQL .=" , MaintenanceNext = '".$_POST["MaintenanceNext"]."' ";

$strSQL .=", MaintenanceCharges = '".$_POST["MaintenanceCharges"]."' ";

$strSQL .=", MaintenanceDetailCharges = '".$_POST["MaintenanceDetailCharges"]."' ";

$strSQL .=", MaintenanceStatus = '".$_POST["MaintenanceStatus"]."' ";

$strSQL .=", MaintenanceDateReceive = '".$_POST["MaintenanceDateReceive"]."' ";

$strSQL .=", DurableArticleSetStatus = '".$_POST["durablestatus"]."' ";

$strSQL .="WHERE MaintenanceId = '".$_GET["MaintenanceId"]."' ";

		$objQuery = mysql_query($strSQL);			






if($objQuery)
{
$strSQL2 = "SELECT * FROM maintenance WHERE MaintenanceId = '".$_GET["MaintenanceId"]."' ";
mysql_query("SET CHARACTER SET utf8");
$objQuery2 = mysql_query($strSQL2);
$objResult2 = mysql_fetch_array($objQuery2);
$update_sql = "UPDATE durablearticleset  SET  DurableArticleSetStatus='พร้อมใช้งาน' Where DurableArticleSetId= ' " .$objResult2["DurableArticleSetId"] ." ' ";
mysql_query($update_sql);

	echo "<a href='show_maintenance-A.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</tr></table>

</body>
</html>
