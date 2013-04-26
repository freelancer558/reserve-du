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
<title>Add Maintenance </title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>


<script language="javascript">
function fncSubmit()
{
	if(document.frmEdit.MaintenanceDetail2.value == "")
	{
		alert('กรุณากรอก "รายละเอียดการเสียหาย"');
		document.frmEdit.MaintenanceDetail2.focus();
		return false;
	}	

	if(document.frmEdit.MaintenanceCharges.value == "")
	{
		alert('กรุณากรอก "ค่าใช้จ่าย"');
		document.frmEdit.MaintenanceCharges.focus();		
		return false;
	}	
	
		if(document.frmEdit.MaintenanceDetailCharges.value == "")
	{
		alert('กรุณากรอก "รายละเอียดค่าใช้จ่าย"');
		document.frmEdit.MaintenanceDetailCharges.focus();		
		return false;
	}	

		if(document.frmEdit.MaintenanceDateReceive.value == "")
	{
		alert('กรุณากรอก "วันที่รับเครื่องมือ"');
		document.frmEdit.MaintenanceDateReceive.focus();		
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



	<form name="frmEdit" method="post" action="add-maintenance2-A.php?MaintenanceId=<?php echo $_GET["MaintenanceId"];?> enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
<table width="690" border="0" id="box-table-a" >
 <tr>
<td colspan="2"> <div id="head_content">
	 เพิ่มรายละเอียดการซ่อมบำรุงเครื่องมือหลังได้รับเครื่องมือคืน : 
<?php
$depid = $objResult["DurableArticleSetId"];
	$strSQL3 = "SELECT DurableArticleSetEnglishName FROM durablearticleset WHERE DurableArticleSetId =' ".$depid." ' ";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	while($objResult3 = mysql_fetch_array($objQuery3))
	{
	?>
    <?php echo $objResult3["DurableArticleSetEnglishName"];?>
<?php
	}
	?></div></td>
</tr>
  
  <tr> 

<tr>
    <th width="270"> <div align="left">รายละเอียดการเสียหาย/การซ่อมบำรุง :  <br><br> <br><br> </div></th>
   <td><textarea name="MaintenanceDetail2" cols="30" rows="5" ></textarea> *</td>
   </tr>


<tr>
<th  width="70"> <div align="left">วันที่ซ่อมบำรุงครั้งถัดไป : <br><br> </div></th>
<td><input  name='MaintenanceNext' id='MaintenanceNext' class='datepicker'>  </td>
   </tr>

<tr>
    <th width="70"> <div align="left">ค่าใช้จ่ายการซ่อมบำรุง :<br><br>  </div></th>		  
	 <td><div align=""><input type="text" name="MaintenanceCharges" size="30" >
	* บาท</div> </td>
	</tr>

<tr>
    <th width="70"> <div align="left">รายละเอียดค่าใช้จ่าย :<br><br>    <br><br> <br><br> </div></th>		  
	 <td><div align=""><textarea type="text" name="MaintenanceDetailCharges"cols="30" rows="5"></textarea>
	*</div></td>
	</tr>

 <input type="hidden" name="MaintenanceStatus" value="ได้รับเครื่องมือคืนแล้ว" />

<tr>
	    <th width="70"> <div align="left">วันที่ทำการรับเครื่องมือ :  <br><br></div></th>
<td align="">
<input  name='MaintenanceDateReceive' id='MaintenanceDateReceive' class='datepicker'> * <br>
</td>
</tr>
<input type="hidden" name="durablestatus" value="พร้อมใช้งาน">
<tr>
<td  colspan="2" align="center">
<a href="add-maintenance.php"><IMG SRC="../images/back.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a>

&nbsp; &nbsp;
 <input type="image" name="btnSubmit" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>หมายเหตุ(*)กรุณากรอกข้อมูล
</td>
</tr>

 </tr></table>
<td  align="center">

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