 <?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
		echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}

	if($_SESSION['UserStatus'] != "user")
	{
		echo "This page for user only!";
		echo '<br><a href="../index.php"> Go To Main Page</a>';
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

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Profile</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<script language = "JavaScript">

		//**** List Province (Start) ***//
		function ListProvince(SelectValue)
		{
			frmEdit.ddlProvince.length = 0
			frmEdit.ddlAmphur.length = 0
			
			//*** Insert null Default Value ***//
			var myOption = new Option('','')  
			frmEdit.ddlProvince.options[frmEdit.ddlProvince.length]= myOption
			
			<?php
			$intRows = 0;
			$strSQL = "SELECT * FROM department ORDER BY DepartmentId ASC ";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$intRows = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$intRows++;
			?>			
				x = <?php echo $intRows;?>;
				mySubList = new Array();
				
				strGroup = <?php echo $objResult["FacultyId"];?>;
				strValue = "<?php echo $objResult["DepartmentId"];?>";
				strItem = "<?php echo $objResult["DepartmentThaiName"];?>";
				mySubList[x,0] = strItem;
				mySubList[x,1] = strGroup;
				mySubList[x,2] = strValue;
				if (mySubList[x,1] == SelectValue){
					var myOption = new Option(mySubList[x,0], mySubList[x,2])  
					frmEdit.ddlProvince.options[frmEdit.ddlProvince.length]= myOption					
				}
			<?php
			}
			?>																	
		}
		//**** List Province (End) ***//

		
		//**** List Amphur (Start) ***//
		function ListAmphur(SelectValue)
		{
			frmEdit.ddlAmphur.length = 0

			//*** Insert null Default Value ***//
			var myOption = new Option('-','-')  
			frmEdit.ddlAmphur.options[frmEdit.ddlAmphur.length]= myOption
			
			<?php
			$intRows = 0;
			$strSQL = "SELECT * FROM branch ORDER BY BranchId ASC ";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$intRows = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$intRows++;
			?>
				x = <?php echo $intRows;?>;
				mySubList = new Array();
				
				strGroup = <?php echo $objResult["DepartmentId"];?>;
				strValue = "<?php echo $objResult["BranchId"];?>";
				strItem = "<?php echo $objResult["BranchThaiName"];?>";
				mySubList[x,0] = strItem;
				mySubList[x,1] = strGroup;
				mySubList[x,2] = strValue;
							
				if (mySubList[x,1] == SelectValue){
					var myOption = new Option(mySubList[x,0], mySubList[x,2])  
					frmEdit.ddlAmphur.options[frmEdit.ddlAmphur.length]= myOption					
				}
			<?php
			}
			?>																	
		}
		//**** List Amphur (End) ***//

</script>



<script language="javascript">
function fncSubmit()
{
	if(document.frmEdit.txtEditUserName.value == "")
	{
		alert('กรุณากรอก "ชื่อผู้ใช้"');
		document.frmEdit.txtEditUserName.focus();
		return false;
	}	

	if(document.frmEdit.txtEditPassword.value == "")
	{
		alert('กรุณากรอก "รหัสผ่าน"');
		document.frmEdit.txtEditPassword.focus();		
		return false;
	}	

				if(document.frmEdit.txtPassword.value != document.frmEdit.txtCPassword.value )
	{
		alert('กรุณากรอก "รหัสผ่านที่เหมือนกัน"');
		document.frmEdit.txtPassword.focus();		
		return false;
	}	

		if(document.frmEdit.txtEditUserFullname.value == "")
	{
		alert('กรุณากรอก "ชื่อ-นามสกุล"');
		document.frmEdit.txtEditUserFullname.focus();		
		return false;
	}	

		if(document.frmEdit.txtEditUserSex.value == "")
	{
		alert('กรุณากรอก "เพศ"');
		document.frmEdit.txtEditUserSex.focus();		
		return false;
	}	

		if(document.frmEdit.txtEditUserAddress.value == "")
	{
		alert('กรุณากรอก "ที่อยู่"');
		document.frmEdit.txtEditUserAddress.focus();		
		return false;
	}	

		if(document.frmEdit.txtEditUserPhone.value == "")
	{
		alert('กรุณากรอก "หมายเลขโทรศัพท์"');
		document.frmEdit.txtEditUserPhone.focus();		
		return false;
	}	

		if(document.frmEdit.txtEditUserEmail.value == "")
	{
		alert('กรุณากรอก "อีเมล์"');
		document.frmEdit.txtEditUserEmail.focus();		
		return false;
	}	

		if(document.frmEdit.txtEditUserSSID.value == "")
	{
		alert('กรุณากรอก "รหัสประจำตัวประชาชน"');
		document.frmEdit.txtEditUserSSID.focus();		
		return false;
	}	

			if(document.frmEdit.txtEditUserStatus.value == "")
	{
		alert('กรุณากรอก "สถานะ"');
		document.frmEdit.txtEditUserStatus.focus();		
		return false;
	}	

			if(document.frmEdit.txtEditFacultyId.value == "")
	{
		alert('กรุณากรอก "คณะ"');
		document.frmEdit.txtEditFacultyId.focus();		
		return false;
	}	

			if(document.frmEdit.txtEditDepartmentId.value == "")
	{
		alert('กรุณากรอก "ภาควิชา"');
		document.frmEdit.txtEditDepartmentId.focus();		
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

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('headbar.php'); ?>

 <tr>
    <td width="15%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"><center>ข้อมูล ผู้ใช้</center></td>
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">

<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

 <table width="700" border="0">
  <tr>
<form action="save_profile.php" name="frmEdit" method="post" onSubmit="JavaScript:return fncSubmit();">
<tr>
    <th width="130"> <div align="center">ชื่อผู้ใช้ : </div></th>
<td><input type="text" name="txtEditUserName" size="20" value="<?php echo $objResult["UserName"];?>">*รหัสประจำตัวนักศึกษา</td>
</tr>

<tr>
    <th width="20"> <div align="center">รหัสผ่าน : </div></th>
   <td><input type="password" name="txtEditPassword" size="20" value="<?php echo $objResult["Password"];?>">*</td>
   </tr>

   <tr>
    <th width="20"> <div align="left">ยืนยันรหัสผ่าน : <br><br></div></th>
   <td><input type="password" name="txtCPassword" size="20"value="<?php echo $objResult["Password"];?> ">*</td>
   </tr>

<tr>
    <th width="50"> <div align="center">ชื่อ-นามสกุล :</div></th>		  
	 <td><div align=""><input type="text" name="txtEditUserFullname" size="30" value="<?php echo $objResult["UserFullname"];?>">
	</div>*</td>
	</tr>


<tr>
    <th width="90"> <div align="center">ที่อยู่ :</div></th>
<td><input type="text" name="txtEditUserAddress" size="50"value="<?php echo $objResult["UserAddress"];?>">*</td>
</tr>

<tr>
	    <th width="30"> <div align="center">หมายเลขโทรศัพท์ :</div></th>
<td align=""><input type="text" name="txtEditUserPhone" size="20" value="<?php echo $objResult["UserPhone"];?>">*</td>
</tr>

<tr>
    <th width="30"> <div align="center">อีเมล์ : </div></th>
<td align=""><input type="text" name="txtEditUserEmail" size="20" value="<?php echo $objResult["UserEmail"];?>">*</td>
</tr>

<tr>
    <th width="30"> <div align="center">รหัสประจำตัวประชาชน : </div></th>
<td align=""><input type="text" name="txtEditUserSSID" size="20" value="<?php echo $objResult["UserSSID"];?>">*</td>
</tr>


<!-- <tr>
    <th width="20"> <div align="center">คณะ : </div></th>
<td>
	
	<select id="ddlGeo" name="txtEditFacultyId" onChange = "ListProvince(this.value)" style="width:200px">
	<option selected value=" "><?php
$facid = $objResult["FacultyId"];
	$strSQL2 = "SELECT FacultyThaiName FROM faculty WHERE FacultyId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<?php echo $objResult2["FacultyThaiName"];?>
<?php
	}
	?>



</option>
	<?php
	$strSQL = "SELECT * FROM faculty ORDER BY FacultyId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["FacultyId"];?>"><?php echo $objResult["FacultyThaiName"];?></option>
	<?php
	}
	?>
	</select>*</td>
	</tr> -->

<!-- <tr>
    <th width="20"> <div align="center">ภาควิชา : </div></th>
<td>
	<select id="ddlProvince" name="txtEditDepartmentId" style="width:200px" onChange = "ListAmphur(this.value)">
	<option value = ""><?php
$depid = $objResult["DepartmentId"];
	$strSQL3 = "SELECT DepartmentThaiName FROM department WHERE DepartmentId =' ".$depid." ' ";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	while($objResult3 = mysql_fetch_array($objQuery3))
	{
	?>
   <?php echo $objResult3["DepartmentThaiName"];?>
<?php
	}
	?>
	
	
	</option>
	<?php
$depid = $objResult["DepartmentId"];
	$strSQL4 = "SELECT DepartmentThaiName FROM department WHERE DepartmentId =' ".$depid." ' ";
	$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
	while($objResult4 = mysql_fetch_array($objQuery4))
	{
	?>
   <?php echo $objResult4["DepartmentThaiName"];?>
<?php
	}
	?>

	</select>*</td>
</tr> -->


	<!-- <input type="hidden" id="ddlAmphur" name="txtBranchId" style="width:200px"> -->

</tr>
  </table><br>
  <input type="submit" name="submit" value="submit">
หมายเหตุ (*) กรุณากรอกข้อมูล


  </form>

</div>




</div></td>   
  </tr>
  



<tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="../check_login.php">
  <table border="0" style="width: 210px">
    <?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<?php include('userbuttom.php'); ?>
  
<?php include('footer.php'); ?>
</body>
</html>