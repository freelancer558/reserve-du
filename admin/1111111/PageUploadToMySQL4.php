

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


	�����Ţ�ػ�ó� : <input type="text" name="txtDurableArticleSetNumber" value="<?=$objResult["DurableArticleSetNumber"];?>"><br>

	���������� : <input type="text" name="txtPassword" value="<?=$objResult["DurableArticleSetThaiName"];?>"><br>

	���������ѧ��� : <input type="text" name="txtName" value="<?=$objResult["DurableArticleSetEnglishName"];?>"><br>

	��� : <input type="text" name="txtDurableArticleSetVersion" value="<?=$objResult["DurableArticleSetVersion"];?>"><br>

	��������´ : <input type="text" name="txtDurableArticleSetDetail" value="<?=$objResult["DurableArticleSetDetail"];?>"><br>


	�ٻ : <input type="file" name="filUpload" value="<?=$objResult["DurableArticleSetPic"];?>"><br>
	<input type="hidden" name="hdnOldFile" value="<?=$objResult["DurableArticleSetPic"];?>">


�Ը��� : <input type="text" name="txtDurableArticleSetHowToUse" value="<?=$objResult["DurableArticleSetHowtoUse"];?>"><br>

�ѹ������ : <input type="text" name="txtDurableArticleSetBuyDate" value="<?=$objResult["DurableArticleSetBuyDate"];?>"><br>

�������ػ�ó� : <input type="text" name="txtDurableArticleSetType" value="<?=$objResult["DurableArticleSetType"];?>"><br>

ʶҹ��ػ�ó� : <input type="text" name="txtDurableArticleSetStatus" value="<?=$objResult["DurableArticleSetStatus"];?>"><br>

�����������ͧ : <input type="text" name="txtDurableArticleSetAtRoom" value="<?=$objResult["DurableArticleSetAtRoom"];?>"><br>

���л�Сѹ : <input type="text" name="txtVouchDate" value="<?=$objResult["VouchDate"];?>"><br>


�է�����ҳ : <input type="text" name="txtProcurementBudgetYear" value="<?=$objResult["ProcurementBudgetYear"];?>"><br>

������������ҳ : <input type="text" name="txtProcumentBudgetType" value="<?=$objResult["ProcurementBudgetType"];?>"><br>

����ѷ : <input type="text" name="txtCompanyId" value="<?=$objResult["CompanyId"];?>"><br>


	<input name="btnSubmit" type="submit" value="Submit">
	</form>
