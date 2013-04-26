<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM news WHERE NewsId = '".$_GET["NewsId"]."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>
	<form name="form1" method="post" action="News5.php?NewsId=<?=$_GET["NewsId"];?>" enctype="multipart/form-data">
	แก้ไข  :<br>
	หัวข้อ : <input type="text" name="txtHead" value="<?=$objResult["NewsHeader"];?>"><br>
	รายละเอียด : <input type="text" name="txtDe" value="<?=$objResult["NewsDetail"];?>"><br>
	

	<img src="myfile/<?=$objResult["NewsPic"];?>"><br>
	รูปภาพ : <input type="file" name="filUpload"><br>
	<input type="hidden" name="hdnOldFile" value="<?=$objResult["NewsPic"];?>">
	<input name="btnSubmit" type="submit" value="Submit">
	</form>
</body>
</html>