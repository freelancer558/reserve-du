<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM news";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="340" border="1">
<tr>
<th width="50"> <div align="center">ID </div></th>
<th width="150"> <div align="center">หัวข้อ</div></th>
<th width="150"> <div align="center">รายละเอียด</div></th>
<th width="150"> <div align="center">รูปภาพ</div></th>
<th width="150"> <div align="center">Edit</div></th>
</tr>
<?
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
<tr>
<td><div align="center"><?=$objResult["NewsId"];?></div></td>
<td><center><?=$objResult["NewsHeader"];?></center></td>
<td><center><?=$objResult["NewsDetail"];?></center></td>
<td><center><img src="myfile/<?=$objResult["NewsPic"];?>"></center></td>

<td><center><a href="News4.php?NewsId=<?=$objResult["NewsId"];?>">Edit</a></center></td>
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