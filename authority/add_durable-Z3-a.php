<?php include('h1.php'); ?>

<html>
<?php include_once "connDB.php"; ?>

<head>
<style type="text/css">
a{
text-decoration:none;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Add DurableArticle</title>
<link href="table1.css" rel="stylesheet" type="text/css">
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

<body>

<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticle  WHERE DurableArticleId = '".$_GET["DurableArticleId"]."' ";
	@mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>
	<form name="form1" method="post" action="add_durable-Z4-A.php?DurableArticleId=<?php echo $_GET["DurableArticleId"];?>" enctype="multipart/form-data">
	<table width="600" border="0"  id="box-table-a">
  <tr> 

   <tr>
<td colspan="8"> <div id="head_content">
	แก้ไขเครื่องมือประกอบ </div></td>
</tr>


	<tr>
    <th width="50"> <div align="right">เครื่องมือหลัก :  </div></th>
	<td><select name="DurableArticleSetId">
		<option value="
		<?php echo $objResult["DurableArticleSetId"];?>" selected>
<?php
$depid = $objResult["DurableArticleSetId"];
	$strSQL3 = "SELECT DurableArticleSetThaiName FROM durablearticleset WHERE DurableArticleSetId =' ".$depid." ' ";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	while($objResult3 = mysql_fetch_array($objQuery3))
	{
	?>
  <?php echo $objResult3["DurableArticleSetThaiName"];?>
<?php
	}
	?>
	</option >


<?php
mysql_close($objConnect);
?>


<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticle  WHERE DurableArticleId = '".$_GET["DurableArticleId"]."' ";
	@mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>


	<?php
	$strSQL = "SELECT * FROM durablearticleset ORDER BY DurableArticleSetId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
<option value="	<?php echo $objResult["DurableArticleSetId"];?>">
<?php echo $objResult["DurableArticleSetThaiName"];?></option>
	<?php
	}
	?>
	</select></td>
</tr>

<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticle  WHERE DurableArticleId = '".$_GET["DurableArticleId"]."' ";
	@mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>

	<tr>
    <th width="50"> <div align="right">หมายเลขอุปกรณ์ประกอบ :  </div></th>
	<td><input type="text" name="DurableArticleNumber" value="<?php echo $objResult["DurableArticleNumber"];?>"></td>
</tr>

	<tr>
    <th width=""> <div align="right">ชื่อภาษาไทย :  </div></th>
	<td><input type="text" name="DurableArticleThaiName" value="<?php echo $objResult["DurableArticleThaiName"];?>"></td>
</tr>

	<tr>
    <th width=""> <div align="right">ชื่อภาษาอังกฤษ :  </div></th>
	<td><input type="text" name="DurableArticleEnglishName" value="<?php echo $objResult["DurableArticleEnglishName"];?>"></td>
</tr>

<tr>
    <th width=""> <div align="right">	รุ่น : </div></th>
	<td><input type="text" name="DurableArticleVersion" value="<?php echo $objResult["DurableArticleVersion"];?>"></td>
</tr>

	<tr>
    <th width=""> <div align="right">รายละเอียด :  </div></th>
	<td><textarea name="DurableArticleDetail" rows="5" cols="50" ><?php echo $objResult["DurableArticleDetail"];?></textarea></td>
</tr>


<tr>
    <th width=""> <div align="right">	รูป :  </div></th>
	<td>
	<input type="file" name="filUpload" value="<?php echo $objResult["DurableArticlePic"];?>">
	<input type="hidden" name="hdnOldFile" value="<?php echo $objResult["DurableArticlePic"];?>"></td>
</tr>


<tr>
    <th width=""> <div align="right">สถานะอุปกรณ :  </div></th>
	<td>	<select name='DurableArticleStatus' >
<option value='พร้อมใช้งาน'>พร้อมใช้งาน</option>
<option value='บำรุงรักษา'>บำรุงรักษา</option>
</select></td>
</tr>

<tr>
    <th width=""> <div align="right">ระยะประกัน :  </div></th>
	<td><input type="text" name="DurableArticleVouchDate" value="<?php echo $objResult["DurableArticleVouchDate"];?>">*ปี</td>
</tr>

<tr>
    <th width=""> <div align="right">บริษัท :  </div></th>
		<td align=""><select name="DuarableArticleCompanyId" >
		<option value="
	<?php echo $objResult["DurableArticleSetId"];?>" selected>
<?php
$deid = $objResult["CompanyId"];
	$strSQL5 = "SELECT CompanyThaiName FROM company WHERE CompanyId =' ".$deid." ' ";
	$objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]");
	while($objResult5 = mysql_fetch_array($objQuery5))
	{
	?>
  <?php echo $objResult5["CompanyThaiName"];?>
<?php
	}
	?>
	</option >


<?php
	$strSQL = "SELECT * FROM company ORDER BY CompanyId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["CompanyId"];?>"><?php echo $objResult["CompanyThaiName"];?></option>
	<?php
	}
	?>
	</select></td>
</tr>


</tr></table><br><br>
	<input type="image" name="submit" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>
	</form>







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