<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
	{
		echo "Copy/Upload Complete<br>";

		//*** Insert Record ***//
		$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
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
		'".$_FILES["filUpload"]["name"]."' ";
$strSQL .= " ,'".$_POST["txtDurableArticleSetHowToUse"]."',
		'".$_POST["txtDurableArticleSetBuyDate"]."',
		'".$_POST["txtDurableArticleSetType"]."' ";
$strSQL .= ", '".$_POST["txtDurableArticleSetStatus"]."',
		'".$_POST["txtDurableArticleSetAtRoom"]."',
		'".$_POST["txtVouchDate"]."' ";
$strSQL .= " ,'".$_POST["txtProcurementBudgetYear"]."',
		'".$_POST["txtProcumentBudgetType"]."',
		'".$_POST["txtCompanyId"]."') ";

		$objQuery = mysql_query($strSQL);		
	}
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>
</html>