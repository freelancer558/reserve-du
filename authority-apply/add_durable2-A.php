<?php include('h1.php'); ?>

<html>
<?php include_once "connDB.php"; ?>

<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>

    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



	<form name="form1" method="post" action="add_durable2-A.php" enctype="multipart/form-data">
<table width="600" border="0">
  <tr> 
<?php 
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../myfile/".$_FILES["filUpload"]["name"]))
	{
		echo ".<br>";

	if(move_uploaded_file($_FILES["txtDurableArticleSetHowToUse"]["tmp_name"],"../myfile/".$_FILES["txtDurableArticleSetHowToUse"]["name"]))
	{
		echo ".<br>";
		//*** Insert Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");
		$strSQL = "INSERT INTO durablearticleset ";
		$strSQL .="(DurableArticleSetNumber,
		DurableArticleSetThaiName,
		DurableArticleSetEnglishName,
		DurableArticleSetVersion,
		DurableArticleSetDetail,
		DurableArticleSetPic,
		DurableArticleSetHowtoUse,
		DurableArticleSetBuyDate,
		DurableArticleSetType,
		DurableArticleSetStatus,
		DurableArticleSetAtRoom,
		VouchDate,
		ProcurementBudgetYear,
		ProcurementBudgetType,
		CompanyId) ";
$strSQL .="VALUES ";
$strSQL .= "('".$_POST["txtDurableArticleSetNumber"]."',
		'".$_POST["txtPassword"]."',
		'".$_POST["txtName"]."' ";
$strSQL .= ",'".$_POST["txtDurableArticleSetVersion"]."',
		'".$_POST["txtDurableArticleSetDetail"]."',
		'".$_FILES["filUpload"]["name"]."' ,
		'".$_FILES["txtDurableArticleSetHowToUse"]["name"]."' ";

$strSQL .= " ,'".$_POST["txtDurableArticleSetBuyDate"]."',
		'".$_POST["txtDurableArticleSetType"]."' ";
$strSQL .= ", '".$_POST["txtDurableArticleSetStatus"]."',
		'".$_POST["txtDurableArticleSetAtRoom"]."',
		'".$_POST["txtVouchDate"]."' ";
$strSQL .= " ,'".$_POST["txtProcurementBudgetYear"]."',
		'".$_POST["txtProcumentBudgetType"]."',
		'".$_POST["txtCompanyId"]."') ";

		$objQuery = mysql_query($strSQL);		
	}
	}
if($objQuery)
{
	echo "<a href='durablearticleset-A.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>





</body>
</html>
