<?php include('h1.php'); ?>


<html>
<?php include_once "connDB.php"; ?>

<head>
<META HTTP-EQUIV="Refresh"  CONTENT="1;URL=show_maintenance-A.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Add Maintenance Admin</title>
</head>
<body>




	<form name="form1" method="post" action="add-maintenance.php" enctype="multipart/form-data">
<table width="600" border="0">
  <tr> 
<?php 

		//*** Insert Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");
		$strSQL = "INSERT INTO maintenance ";
		$strSQL .="(MaintenanceDetail,
		MaintenanceStatus,
		MaintenanceType,
		DurableArticleSetId,
		DurableArticleSetStatus
		) ";
$strSQL .="VALUES ";
$strSQL .= "('".$_POST["MaintenanceDetail"]."',
		'".$_POST["MaintenanceStatus"]."' ,
		'".$_POST["MaintenanceType"]."',
		'".$_POST["DurableArticleSetId"]."',
		'".$_POST["durablestatus"]."'
		)";
		$objQuery = mysql_query($strSQL);		

if($objQuery)
{
mysql_query("UPDATE durablearticleset  SET  DurableArticleSetStatus='บำรุงรักษา' Where DurableArticleSetId='".$_POST[DurableArticleSetId]."'");

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
