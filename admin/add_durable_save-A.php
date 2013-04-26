<html>
<head>
<title></title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "INSERT INTO durablearticleset ";
$strSQL .="(DurableArticleSetId,DurableArticleSetNumber,DurableArticleSetThaiName,DurableArticleSetEnglishName,DurableArticleSetVersion,DurableArticleSetDetail,DurableArticleSetPic,DurableArticleSetHowtoUse,DurableArticleSetQuantity,DurableArticleSetBuyDate,DurableArticleSetType,DurableArticleSetStatus,DurableArticleSetAtRoom,VouchDate,ProcurementBudgetYear,ProcurementBudgetType,CompanyId) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["txtDurableArticleSetId"]."','".$_POST["txtDurableArticleSetNumber"]."','".$_POST["txtDurableArticleSetThaiName"]."' ";
$strSQL .=",'".$_POST["txtDurableArticleSetEnglishName"]."','".$_POST["txtDurableArticleSetDetail"]."','".$_POST["txtDurableArticleSetPic"]."' ";
$strSQL .=",'".$_POST["txtDurableArticleSetHowtoUse"]."','".$_POST["txtDurableArticleSetQuantity"]."','".$_POST["txtDurableArticleSetBuyDate"]."','".$_POST["txtDurableArticleSetType"]."' ";
$strSQL .=",'".$_POST["txtDurableArticleSetStatus"]."','".$_POST["txtDurableArticleSetAtRoom"]."','".$_POST["txtVouchDate"]."') ";
$strSQL .=",'".$_POST["txtProcurementBudgetYear"]."','".$_POST["txtProcurementBudgetType"]."','".$_POST["txtCompanyId"]."') ";

$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "<a href='add_durable-A.php'>Go</a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>