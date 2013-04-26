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
<title>เพิ่มรายการแจ้งซ่อม</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />

<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>


<script language="javascript">
function fncSubmit()
{
	if(document.frmEdit.DurableArticleSetId.value == "")
	{
		alert('กรุณากรอก "เครื่องมือ"');
		document.frmEdit.DurableArticleSetId.focus();
		return false;
	}	

	if(document.frmEdit.MaintenanceDetail.value == "")
	{
		alert('กรุณากรอก "รายละเอียด"');
		document.frmEdit.MaintenanceDetail.focus();		
		return false;
	}	
	
		if(document.frmEdit.MaintenanceStatus.value == "")
	{
		alert('กรุณากรอก "สถานะการบำรุงรักษา"');
		document.frmEdit.MaintenanceStatus.focus();		
		return false;
	}	

		if(document.frmEdit.MaintenanceType.value == "")
	{
		alert('กรุณากรอก "ประเภทการบำรุงรักษา"');
		document.frmEdit.MaintenanceType.focus();		
		return false;
	}	

	document.frmEdit.submit();
}
</script>

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



	<form name="frmEdit" method="post" action="add-maintenance4-A.php" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
<table width="700" border="0"  id="box-table-a"> 
  <tr> 

 <tr>
<td colspan="2"> <div id="head_content">
	  จัดการข้อมูลซ่อมบำรุงเครื่องมือ : เพิ่มรายการแจ้งซ่อม</div></td>
</tr>

<tr>
    <th width="350"> <div align="left">เครื่องมือที่ซ่อมบำรุง : <br><br> </div></th>
<td align=""><select id="DurableArticleSetId" name="DurableArticleSetId" >
	<option selected value=""></option>
	<?php
	$strSQL = "SELECT * FROM durablearticleset ORDER BY DurableArticleSetId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["DurableArticleSetId"];?>"><?php echo $objResult["DurableArticleSetEnglishName"];?></option>
<?php }?>
</select>

 * </td>
</tr>

<tr>
    <th width="150"> <div align="left">รายละเอียดการเสียหาย/การซ่อมบำรุง :  <br><br> <br><br> </div></th>
   <td width ="350"><textarea name="MaintenanceDetail" cols="30" rows="5" ></textarea></td>
   </tr>
<INPUT TYPE="hidden" NAME="MaintenanceStatus" value='อยู่ในระยะการซ่อม'>

<tr>
    <th width="70"> <div align="left">ประเภทการซ่อมบำรุง : <br><br></div></th>
<td >
<select name='MaintenanceType' id='MaintenanceType'>
<option value=''></option>
<option value='ชำรุดจากการใช้งาน'>ชำรุดจากการใช้งาน</option>
<option value='ซ่อมบำรุงตามระยะ'>ซ่อมบำรุงตามระยะ</option>
</select> *
</td>
</tr>



<input type="hidden" name="durablestatus" value="บำรุงรักษา">

<tr><br>
<td  colspan="2" align="center">
<a href="show_maintenance-A.php"><IMG SRC="../images/back.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a>

&nbsp; &nbsp;
 <input type="image" name="btnSubmit" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>หมายเหตุ(*)กรุณากรอกข้อมูล
</td>
</tr>
 </tr></table>


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