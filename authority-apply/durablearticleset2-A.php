<?php include('h2.php');?>

<html>
<?php include_once "connDB.php"; ?>

<head>
<style type="text/css">
a{
text-decoration:none;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Add DurableArticleSet User</title>

<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>


</head>
<script type='text/javascript' language='javascript' src='date_time/prototype-1.js'></script>
<script type='text/javascript' language='javascript' src='date_time/prototype-date-extensions.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviour.js'></script>
<script type='text/javascript' language='javascript' src='date_time/datepicker.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviors.js'></script>

<?php include('h2.php');?>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">


<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticleset";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<?php //*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM durablearticleset ";
	$strSQL .="WHERE DurableArticleSet = '".$_GET["DurId"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Delete [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}
?>


<table width="340" border="1">
<tr>
<th width="50"> <div align="center"> หมายเลขอุปกรณ์ </div></th>
<th width="150"> <div align="center">รูป</div></th>
<th width="150"> <div align="center">ชื่อภาษาไทย</div></th>
<th width="150"> <div align="center">ชื่อภาษาอังกฤษ</div></th>
<th width="150"> <div align="center">Edit</div></th>
</tr>
<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
<tr>
<td><div align="center"><?php echo $objResult["DurableArticleSetNumber"];?></div></td>
<td><center><img src="myfile/<?php echo $objResult["DurableArticleSetPic"];?>" width="160" height="100"></center></td>
<td><center><?php echo $objResult["DurableArticleSetThaiName"];?></center></td>
<td><center><?php echo $objResult["DurableArticleSetEnglishName"];?></center></td>
<td><center><a href="PageUploadToMySQL4.php?DurableArticleSetId=<?php echo $objResult["DurableArticleSetId"];?>">Edit</a></center></td>

<td align=""><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&DurableArticleSetId=<?php echo $objResult["DurableArticleSetId"];?>';}">Delete</a></td>
</tr>
<?php
	}
?>
</table>
<?php
mysql_close($objConnect);
?>







</div></td>   
  </tr>

   <tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="check_login.php">
  <table border="0" style="width: 210px">
    <?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<?php include('userbuttom.php'); ?>







<?php include('footer.php');?>
</body>
</html>