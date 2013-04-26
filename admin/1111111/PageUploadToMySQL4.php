

<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticleset  WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";
	@mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>
	<form name="form1" method="post" action="PageUploadToMySQL5.php?DurableArticleSetId=<?=$_GET["DurableArticleSetId"];?>" enctype="multipart/form-data">
	Edit  :<br>


	หมายเลขอุปกรณ์ : <input type="text" name="txtDurableArticleSetNumber" value="<?=$objResult["DurableArticleSetNumber"];?>"><br>

	ชื่อภาษาไทย : <input type="text" name="txtPassword" value="<?=$objResult["DurableArticleSetThaiName"];?>"><br>

	ชื่อภาษาอังกฤษ : <input type="text" name="txtName" value="<?=$objResult["DurableArticleSetEnglishName"];?>"><br>

	รุ่น : <input type="text" name="txtDurableArticleSetVersion" value="<?=$objResult["DurableArticleSetVersion"];?>"><br>

	รายละเอียด : <input type="text" name="txtDurableArticleSetDetail" value="<?=$objResult["DurableArticleSetDetail"];?>"><br>


	รูป : <input type="file" name="filUpload" value="<?=$objResult["DurableArticleSetPic"];?>"><br>
	<input type="hidden" name="hdnOldFile" value="<?=$objResult["DurableArticleSetPic"];?>">


วิธีใช้ : <input type="text" name="txtDurableArticleSetHowToUse" value="<?=$objResult["DurableArticleSetHowtoUse"];?>"><br>

วันที่ซื้อ : <input type="text" name="txtDurableArticleSetBuyDate" value="<?=$objResult["DurableArticleSetBuyDate"];?>"><br>

ประเภทอุปกรณ์ : <input type="text" name="txtDurableArticleSetType" value="<?=$objResult["DurableArticleSetType"];?>"><br>

สถานะอุปกรณ์ : <input type="text" name="txtDurableArticleSetStatus" value="<?=$objResult["DurableArticleSetStatus"];?>"><br>

ตั้งอยู่ที่ห้อง : <input type="text" name="txtDurableArticleSetAtRoom" value="<?=$objResult["DurableArticleSetAtRoom"];?>"><br>

ระยะประกัน : <input type="text" name="txtVouchDate" value="<?=$objResult["VouchDate"];?>"><br>


ปีงบประมาณ : <input type="text" name="txtProcurementBudgetYear" value="<?=$objResult["ProcurementBudgetYear"];?>"><br>

ประเภทงบประมาณ : <input type="text" name="txtProcumentBudgetType" value="<?=$objResult["ProcurementBudgetType"];?>"><br>

บริษัท : <input type="text" name="txtCompanyId" value="<?=$objResult["CompanyId"];?>"><br>


	<input name="btnSubmit" type="submit" value="Submit">
	</form>
