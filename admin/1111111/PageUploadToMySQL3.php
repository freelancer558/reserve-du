<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticleset";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="340" border="1">
<tr>
<th width="50"> <div align="center">Files ID </div></th>
<th width="150"> <div align="center">Picture</div></th>
<th width="150"> <div align="center">Name</div></th>
<th width="150"> <div align="center">Edit</div></th>
</tr>
<?
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
<tr>
<td><div align="center"><?=$objResult["DurableArticleSetId"];?></div></td>
<td><center><img src="myfile/<?=$objResult["DurableArticleSetPic"];?>" width="160" height="100"></center></td>
<td><center><?=$objResult["DurableArticleSetEnglishName"];?></center></td>
<td><center><a href="PageUploadToMySQL4.php?DurableArticleSetId=<?=$objResult["DurableArticleSetId"];?>">Edit</a></center></td>
</tr>
<?
	}
?>
</table>
<?
mysql_close($objConnect);
?>
</body>
</html>