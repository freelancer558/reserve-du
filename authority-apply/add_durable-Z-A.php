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
<title>Add DurableArticleSet </title>
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
<link rel='stylesheet' href='date_time/datepicker.css'>

<body>


<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



	<form name="form1" method="post" action="add_durable-Z2-A.php" enctype="multipart/form-data">
<table width="700" border="0"  id="box-table-a">
  <tr> 

 <tr>
<td colspan="8"> <div id="head_content">
	เพิ่มเครื่องมือประกอบ </div></td>
</tr>

<tr>
   <th width="190"> <div align="right">เครื่องมือหลัก :<br><br> </div></th>
<td>

<select name="DurableArticleSetId">

	<?php
	$strSQL = "SELECT * FROM durablearticleset ORDER BY DurableArticleSetId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["DurableArticleSetId"];?>"><?php echo $objResult["DurableArticleSetThaiName"];?></option>
	<?php
	}
	?>
	</select>



</td>
</tr>



<tr>
    <th width="100"> <div align="right">หมายเลขเครื่องมือประกอบ :<br><br> </div></th>
<td><input type="text" name="DurableArticleNumber" size="20" ></td>
</tr>


<tr>
    <th width="70"> <div align="right">ชื่อภาษาไทย : <br><br> </div></th>
   <td><input type="text" name="DurableArticleThaiName" size="20" ></td>
   </tr>


<tr>
    <th width="70"> <div align="right">ชื่อภาษาอังกฤษ :<br><br>  </div></th>		  
	 <td><div align=""><input type="text" name="DurableArticleEnglishName" size="30" >
	</div></td>
	</tr>

<tr>
	<th width="70"> <div align="right">รุ่น : <br><br> </div></th>
	 <td><div align=""><input type="text" name="DurableArticleVersion" size="30" >
	</div></td>

</tr>

<tr>
    <th width="70"> <div align="right">รายละเอียด : <br><br></div></th>
<td >
<textarea name="DurableArticleDetail" rows="5"
cols="50"></textarea>
</td>
</tr>

<tr>
	    <th width="70"> <div align="right">รูป :  <br><br></div></th>
<td align="">
	<input type="file" name="filUpload"><br>
</td>
</tr>

<tr>
    <th width="70"> <div align="right">สถานะเครื่องมือ :<br><br></div></th>
<td>
	<select name='DurableArticleStatus' >
<option value='พร้อมใช้งาน'>พร้อมใช้งาน</option>
<option value='บำรุงรักษา'>บำรุงรักษา</option>
</select></td>
</tr>

<tr>
	    <th width="70"> <div align="right">ระยะประกัน :<br><br> </div></th>
<td align=""><input type="text" name="DurableArticleVouchDate" size="20" >*ปี</td>
  </tr>

  
  <tr>
	    <th width="40"> <div align="right">บริษัท :<br><br></div></th>
		<td>
<select id="company" name="DuarableArticleCompanyId" style="width:200px">
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
	</select>*</td>
  </tr>

  
  </tr></table>
<br><br>
	<input type="image" name="submit" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>
หมายเหตุ (*) กรุณากรอกข้อมูล
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