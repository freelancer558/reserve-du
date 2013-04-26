<?php include('h1.php'); ?>


<html>
<?php include_once "connDB.php"; ?>



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

		if(document.frmEdit.filUpload.value == "")
	{
		alert('กรุณากรอก "รูป"');
		document.frmEdit.filUpload.focus();		
		return false;
	}	

		if(document.frmEdit.txtDurableArticleSetHowToUse.value == "")
	{
		alert('กรุณากรอก "วิธีใช้"');
		document.frmEdit.txtDurableArticleSetHowToUse.focus();		
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


<head>
<style type="text/css">
a{
text-decoration:none;
}
</style>


</head>
<script type='text/javascript' language='javascript' src='date_time/prototype-1.js'></script>
<script type='text/javascript' language='javascript' src='date_time/prototype-date-extensions.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviour.js'></script>
<script type='text/javascript' language='javascript' src='date_time/datepicker.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviors.js'></script>
<link rel='stylesheet' href='date_time/datepicker.css'>

<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



	<form name="frmEdit" method="post" action="add_durable2-A.php" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
<table width="550" border="0" id="box-table-a">
  <tr>
<td colspan="8"> <div id="head_content">
	  เพิ่มเครื่องมือวิทยาศาสตร์ </div></td>
</tr>
  
  <tr> 
<tr>
    <th width="170"> <div align="right">หมายเลขเครื่องมือ :<br><br> </div></th>
<td><input type="text" name="txtDurableArticleSetNumber" size="20" >*</td>
</tr>


<tr>
    <th width="70"> <div align="right">ชื่อภาษาไทย : <br><br> </div></th>
   <td><input type="text" name="txtPassword" size="20" >*</td>
   </tr>


<tr>
    <th width="70"> <div align="right">ชื่อภาษาอังกฤษ :<br><br>  </div></th>		  
	 <td><input type="text" name="txtName" size="30" >
	*</td>
	</tr>

<tr>
	<th width="70"> <div align="right">รุ่น : <br><br> </div></th>
	 <td><input type="text" name="txtDurableArticleSetVersion" size="30" >
	*</td>

</tr>

<tr>
    <th width="70"> <div align="right">รายละเอียด : <br><br></div></th>
<td >
<textarea name="txtDurableArticleSetDetail" rows="5"
cols="50"></textarea>*
</td>
</tr>

<tr>
	    <th width="70"> <div align="right">รูป :  <br><br></div></th>
<td align="">
	<input type="file" name="filUpload"><br>
</td>
</tr>

<tr>
    <th width="70"> <div align="right">วิธีใช้ : <br><br> </div></th>
<td align="">
<input type="file" name="txtDurableArticleSetHowToUse"><br></td>
</tr>

<tr>
	    <th width="70"> <div align="right">วันที่ซื้อ :  <br><br></div></th>
<td align="">
<input type="text" name="txtDurableArticleSetBuyDate" class='datepicker' size="20" > * yyyy-mm-dd
</td>
</tr>


<tr>
    <th width="70"> <div align="right">ประเภทอุปกรณ์ :  <br><br></div></th>
	<td align=""><select name='txtDurableArticleSetType' id='DurableArticleSetType'>
<option value='อุปกรณ์กลาง'>อุปกรณ์กลาง</option>
<option value='อุปกรณ์เฉพาะ'>อุปกรณ์เฉพาะ</option>
</select>*</td>
	</tr>

<tr>
    <th width="70"> <div align="right">สถานะอุปกรณ์ :<br><br></div></th>
<td>
	<select name='txtDurableArticleSetStatus' id='DurableArticleSetStatus'>
<option value='พร้อมใช้งาน'>พร้อมใช้งาน</option>
<option value='บำรุงรักษา'>บำรุงรักษา</option>
</select>*</td>
</tr>

<tr>
	    <th width="70"> <div align="right">ตั้งอยู่ที่ห้อง : <br><br></div></th>
<td align=""><input type="text" name="txtDurableArticleSetAtRoom" size="20" >*</td>
  </tr>

<tr>
	    <th width="70"> <div align="right">ระยะประกัน :<br><br> </div></th>
<td align=""><input type="text" name="txtVouchDate" size="20" >*ปี</td>
  </tr>


<tr>
	    <th width="70"> <div align="right">ปีงบประมาณ : <br><br></div></th>
<td align="">
<select name='txtProcurementBudgetYear' id='ProcurementBudgetYear'>
	<option selected value=""></option>
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
	</select>
*
</td>
  </tr>

  <tr>
	    <th width="70"> <div align="right">ประเภทงบประมาณ :  <br><br></div></th>
<td><select name='txtProcumentBudgetType' id='ProcumentBudgetType'>
	<option selected value=""></option>
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
	</select>*</td>
  </tr>

  <tr>
	    <th width="40"> <div align="right">บริษัท : </div></th>
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
	</select>*</td>
  </tr>
  
  
  </tr></table>
<br><br>


<input type="image" name="submit" WIDTH="100" HEIGHT="30" src="../images/submit2.bmp"/>
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







<?php include('footer2.php');?>
</body>
</html>