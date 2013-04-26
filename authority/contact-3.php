<?php include('h1.php');?>


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
	if(document.frmEdit.txtName.value == "")
	{
		alert('กรุณากรอก "ชื่อเจ้าหน้าที่"');
		document.frmEdit.txtName.focus();
		return false;
	}	

	if(document.frmEdit.txtAddress.value == "")
	{
		alert('กรุณากรอก "ที่อยู่"');
		document.frmEdit.txtAddress.focus();		
		return false;
	}	

		if(document.frmEdit.txtEmail.value == "")
	{
		alert('กรุณากรอก "อีเมล์"');
		document.frmEdit.txtEmail.focus();		
		return false;
	}	

		if(document.frmEdit.txtphone1.value == "")
	{
		alert('กรุณากรอก "หมายเลขโทรศัพท์"');
		document.frmEdit.txtphone1.focus();		
		return false;
	}	

		if(document.frmEdit.txtPhoneFax.value == "")
	{
		alert('กรุณากรอก "หมายเลขโทรศัพท์แฟกซ์"');
		document.frmEdit.txtPhoneFax.focus();		
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

<?php include('h2.php');?>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM contact  WHERE Id = '".$_GET["Id"]."' ";
	@mysql_query("SET NAMES UTF8");
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>
	<form name="frmEdit" method="post" action="contact-5.php" enctype="multipart/form-data"  onSubmit="JavaScript:return fncSubmit();">
	<table width="600" border="0"  id="box-table-a">
  <tr> 
  <tr>
<td colspan="8"> <div id="head_content">
	  เพิ่มรายละเอียดติดต่อเจ้าหน้าที่ : <?php echo$objResult["Name"];?></div></td>
</tr>

	<tr>
    <th width=""> <div align="left">ชื่อเจ้าหน้าที่ :  </div></th>
	<td><input type="text" name="txtName" size="30" value="">*</td>
</tr>

	<tr>
    <th width=""> <div align="left">ที่อยู่ :  </div></th>
	<td><textarea  name="txtAddress" value="" cols="30" rows="5"></textarea>*</td>
</tr>

	<tr>
    <th width=""> <div align="left">อีเมล์ :  </div></th>
	<td><input type="text" name="txtEmail" value="">*</td>
</tr>

<tr>
    <th width=""> <div align="left">หมายเลขโทรศัพท์ (สำนักงาน) : </div></th>
	<td><input type="text" name="txtphone1" value="">*</td>
</tr>

	<tr>
    <th width=""> <div align="left">หมายเลขโทรศัพท์ (เคลื่อนที่) :  </div></th>
	<td><input name="txtphone2" value="">
*</td>
</tr>

<tr>
    <th width=""> <div align="left">หมายเลขแฟกซ์ :  </div></th>
	<td>
<input name="txtPhoneFax" value="">*
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