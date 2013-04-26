<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticleset  WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>
	<form name="form1" method="post" action="PageUploadToMySQL5.php?DurableArticleSetId=<?=$_GET["DurableArticleSetId"];?>" enctype="multipart/form-data">
	Edit Picture :<br>
	Name : <input type="text" name="txtName" value="<?=$objResult["DurableArticleSetEnglishName"];?>"><br>

	<img src="myfile/<?=$objResult["DurableArticleSetPic"];?>"><br>
	Picture : <input type="file" name="filUpload"><br>

	<input type="hidden" name="hdnOldFile" value="<?=$objResult["DurableArticleSetPic"];?>">
	<input name="btnSubmit" type="submit" value="Submit">
	</form>
</body>
</html>