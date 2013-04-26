<?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}

	if($_SESSION['UserStatus'] != "ADMIN")
	{
		echo "This page for Admin only!";
echo '<br><a href="../index.html"> Go To Main Page</a>';
		exit();
	}	
	
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>


<?php


	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	@mysql_query("SET NAMES UTF8");
?>


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
	if(document.frmEdit.txtDurableArticleSetNumber.value == "")
	{
		alert('กรุณากรอก "หมายเลขอุปกรณ์"');
		document.frmEdit.txtDurableArticleSetNumber.focus();
		return false;
	}	

	if(document.frmEdit.txtPassword.value == "")
	{
		alert('กรุณากรอก "ชื่อภาษาไทย"');
		document.frmEdit.txtPassword.focus();		
		return false;
	}	

		if(document.frmEdit.txtName.value == "")
	{
		alert('กรุณากรอก "ชื่อภาษาอังกฤษ"');
		document.frmEdit.txtName.focus();		
		return false;
	}	

		if(document.frmEdit.txtDurableArticleSetVersion.value == "")
	{
		alert('กรุณากรอก "รุ่น"');
		document.frmEdit.txtDurableArticleSetVersion.focus();		
		return false;
	}	

		if(document.frmEdit.txtDurableArticleSetDetail.value == "")
	{
		alert('กรุณากรอก "รายละเอียด"');
		document.frmEdit.txtDurableArticleSetDetail.focus();		
		return false;
	}	

		if(document.frmEdit.txtDurableArticleSetBuyDate.value == "")
	{
		alert('กรุณากรอก "วันที่ซื้อ"');
		document.frmEdit.txtDurableArticleSetBuyDate.focus();		
		return false;
	}	

		if(document.frmEdit.txtDurableArticleSetType.value == "")
	{
		alert('กรุณากรอก "ประเภทอุปกรณ์"');
		document.frmEdit.txtDurableArticleSetType.focus();		
		return false;
	}	

			if(document.frmEdit.txtDurableArticleSetStatus.value == "")
	{
		alert('กรุณากรอก "สถานะอุปกรณ"');
		document.frmEdit.txtDurableArticleSetStatus.focus();		
		return false;
	}	

			if(document.frmEdit.txtDurableArticleSetAtRoom.value == "")
	{
		alert('กรุณากรอก "ตั้งอยู่ที่ห้อง"');
		document.frmEdit.txtDurableArticleSetAtRoom.focus();		
		return false;
	}	

			if(document.frmEdit.txtVouchDate.value == "")
	{
		alert('กรุณากรอก "ระยะประกัน"');
		document.frmEdit.txtVouchDate.focus();		
		return false;
	}	

			if(document.frmEdit.txtProcurementBudgetYear.value == "")
	{
		alert('กรุณากรอก "ปีงบประมาณ"');
		document.frmEdit.txtProcurementBudgetYear.focus();		
		return false;
	}	
				if(document.frmEdit.txtProcumentBudgetType.value == "")
	{
		alert('กรุณากรอก "ประเภทงบประมาณ"');
		document.frmEdit.txtProcumentBudgetType.focus();		
		return false;
	}	
				if(document.frmEdit.txtCompanyId.value == "")
	{
		alert('กรุณากรอก "บริษัท"');
		document.frmEdit.txtCompanyId.focus();		
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

<body>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
 
<?php include('headbar3.php');?>

  <tr>
<td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticleset  WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";
	@mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>
	<form name="frmEdit" method="post" action="add_durable4-A.php?DurableArticleSetId=<?php echo $_GET["DurableArticleSetId"];?>" enctype="multipart/form-data"  onSubmit="JavaScript:return fncSubmit();">
	<table width="600" border="0"  id="box-table-a">
  <tr> 
  <tr>
<td colspan="8"> <div id="head_content">
	  แก้ไขรายละเอียดเครื่องมือวิทยาศาสตร์ : <?php echo$objResult["DurableArticleSetThaiName"];?></div></td>
</tr>


	<tr>
    <th width="150"> <div align="left">หมายเลขเครื่องมือ :  </div></th>
	<td><input type="text" name="txtDurableArticleSetNumber" value="<?php echo $objResult["DurableArticleSetNumber"];?>">*</td>
</tr>

	<tr>
    <th width=""> <div align="left">ชื่อภาษาไทย :  </div></th>
	<td><input type="text" name="txtPassword" value="<?php echo$objResult["DurableArticleSetThaiName"];?>">*</td>
</tr>

	<tr>
    <th width=""> <div align="left">ชื่อภาษาอังกฤษ :  </div></th>
	<td><input type="text" name="txtName" value="<?php echo $objResult["DurableArticleSetEnglishName"];?>">*</td>
</tr>

	<tr>
    <th width=""> <div align="left">ยี่ห้อ :  </div></th>
	<td><input type="text" name="txtBrand" value="<?php echo $objResult["DurableArticleSetBrand"];?>">*</td>
</tr>

<tr>
    <th width=""> <div align="left">	รุ่น : </div></th>
	<td><input type="text" name="txtDurableArticleSetVersion" value="<?php echo $objResult["DurableArticleSetVersion"];?>">*</td>
</tr>

	<tr>
    <th width=""> <div align="left">รายละเอียด :  </div></th>
	<td><textarea name="txtDurableArticleSetDetail" rows="5" cols="50" ><?php echo $objResult["DurableArticleSetDetail"];?></textarea>
*</td>
</tr>

<tr>
    <th width=""> <div align="left">บริษัท :  </div></th>
	<td>
<select id="company" name="txtCompanyId" style="width:200px">
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


<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticleset  WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";
	@mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>


<tr>
    <th width=""> <div align="left">	รูป :  </div></th>
	<td>
	<input type="file" name="filUpload"
	value="<?php echo $objResult["DurableArticleSetPic"];?>">
	<input type="hidden" name="hdnOldFile" value="<?php echo $objResult["DurableArticleSetPic"];?>"></td>
</tr>


<tr>
    <th width=""> <div align="left">วิธีใช้ :  </div></th>
	<td>
		<input type="file" name="txtDurableArticleSetHowToUse" value="<?php echo $objResult["DurableArticleSetHowtoUse"];?>">
	<input type="hidden" name="hdnOldFile2" value="<?php echo $objResult["DurableArticleSetHowtoUse"];?>">
</td>
</tr>

<tr>
    <th width=""> <div align="left">วันที่ซื้อ :  </div></th>
	<td><input type="text" name="txtDurableArticleSetBuyDate" value="<?php echo $objResult["DurableArticleSetBuyDate"];?>">*</td>
</tr>

<tr>
    <th width=""> <div align="left">ประเภทอุปกรณ์ :  </div></th>
		<td align=""><select name='txtDurableArticleSetType' id='DurableArticleSetType'>
<option value='<?php echo $objResult["DurableArticleSetType"];?>'><?php echo $objResult["DurableArticleSetType"];?></option>
<option value='อุปกรณ์กลาง'>อุปกรณ์กลาง</option>
<option value='อุปกรณ์เฉพาะ'>อุปกรณ์เฉพาะ</option>
</select>*</td>
</tr>

<tr>
    <th width=""> <div align="left">สถานะอุปกรณ์ :  </div></th>
<td>
	<select name='txtDurableArticleSetStatus' id='DurableArticleSetStatus'>
	<option value='<?php echo $objResult["DurableArticleSetStatus"];?>'><?php echo $objResult["DurableArticleSetStatus"];?></option>
<option value='พร้อมใช้งาน'>พร้อมใช้งาน</option>
<option value='บำรุงรักษา'>บำรุงรักษา</option>
</select>*

</td>
</tr>

<tr>
    <th width=""> <div align="left">ตั้งอยู่ที่ห้อง :  </div></th>
	<td><input type="text" name="txtDurableArticleSetAtRoom" value="<?php echo $objResult["DurableArticleSetAtRoom"];?>">*</td>
</tr>

<tr>
    <th width=""> <div align="left">ระยะประกัน :  </div></th>
	<td><input type="text" name="txtVouchDate" value="<?php echo $objResult["VouchDate"];?>"> *ปี</td>
</tr>


<tr>
    <th width=""> <div align="left">ปีงบประมาณ :  </div></th>
	<td>
<select id="txtProcurementBudgetYear" name="txtProcurementBudgetYear" style="width:200px">

	<?php
	$strSQL = "SELECT * FROM procurement ORDER BY ProcurementBudgetId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["ProcurementBudgetId"];?>"><?php echo $objResult["ProcurementBudgetYear"];?></option>
	<?php
	}
	?>
	*</select></td>



</tr>

<tr>
    <th width=""> <div align="left">ประเภทงบประมาณ :  </div></th>
	<td>
<select id="ProcumentBudgetType" name="txtProcumentBudgetType" style="width:200px">

	<?php
	$strSQL = "SELECT * FROM procurement ORDER BY ProcurementBudgetId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["ProcurementBudgetId"];?>"><?php echo $objResult["ProcurementBudgetType"];?></option>
	<?php
	}
	?>
	*</select>


</td>
</tr>



</tr></table><br><br>
<input type="image" name="submit" WIDTH="100" HEIGHT="30" src="../images/submit2.bmp"/>
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







<?php include('footer2.php');?>
</body>
</html>