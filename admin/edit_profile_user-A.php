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
echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}	
	
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
		@mysql_query("SET NAMES UTF8");
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile User</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<script language = "JavaScript">

<?php
$strSQL = "SELECT * FROM user WHERE UserId = '".$_GET["UseId"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
@mysql_query("SET NAMES UTF8");
if(!$objResult)
{
	echo "Not found UseId=".$_GET["UseId"];
}
else
{
?>

		//**** List Province (Start) ***//
		function ListProvince(SelectValue)
		{
			frmEdit.ddlProvince.length = 0
			frmEdit.ddlAmphur.length = 0
			
			//*** Insert null Default Value ***//
			var myOption = new Option(' <?php echo $objResult["FacultyId"];?>',' <?php echo $objResult["FacultyId"];?>')  
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

<body>


<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>

<?php include('headbar3.php');?>


  <tr>
<td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="80%" rowspan="8" align="center" valign="top"> <div id="content">


<?php
$strSQL = "SELECT * FROM user WHERE UserId = '".$_GET["UseId"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
@mysql_query("SET NAMES UTF8");
if(!$objResult)
{
	echo "Not found UseId=".$_GET["UseId"];
}
else
{
?>


<table width="550" border="0"  id="box-table-a">
<tr>
   <tr>
<td colspan="2"> <div id="head_content">
	  แก้ไขข้อมูลผู้ใช้ : <?php echo $objResult["UserName"];?></div></td>
</tr>
  
  


<form action="edit_profile_user_save-A.php?UseId=<?php echo $_GET["UseId"];?>" name="frmEdit" method="post" onSubmit="JavaScript:return fncSubmit();">
<tr>
    <td width="190"> <div align="right">ชื่อผู้ใช้ : &nbsp;</div></td>
<td width="300"><input type="text" name="txtEditUserName" size="20" value="<?php echo $objResult["UserName"];?>">*รหัสประจำตัวนักศึกษา</td>
</tr>

<tr>
    <td > <div align="right">รหัสผ่าน : &nbsp;</div></td>
   <td><input type="password" name="txtEditPassword" size="20" value="<?php echo $objResult["Password"];?>">*</td>
   </tr>

<tr>
    <td > <div align="right">ยืนยันรหัสผ่าน :&nbsp; </div></td>
   <td><input type="password" name="txtCPassword" size="20"value="<?php echo $objResult["Password"];?>" >*</td>
   </tr>

<tr>
    <td > <div align="right">ชื่อ-นามสกุล : &nbsp;</div></td>		  
	 <td><div align=""><input type="text" name="txtEditUserFullname" size="30" value="<?php echo $objResult["UserFullname"];?>">
	*</div></td>
	</tr>

<!-- <tr>
	<th width="30"> <div align="left">เพศ : </div></th>
<td align=""><input  name='txtEditUserSex'  type='radio' value='male' <?php if($row3['UserSex']=='male') echo 'checked';?>> ชาย
<input  name='txtUserSex'  type='radio' value='female' <?php if($row3['UserSex']=='female') echo 'checked';?>> หญิง
</tr> -->

<tr>
    <td> <div align="right">ที่อยู่ : &nbsp;</div></td>
<td><textarea type="textarea" name="txtEditUserAddress" rows="5" cols="30" value="<?php echo $objResult["UserAddress"];?>"><?php echo $objResult["UserAddress"];?></textarea>*</td>
</tr>

<tr>
	    <td> <div align="right">หมายเลขโทรศัพท์ : &nbsp;</div></td>
<td align=""><input type="text" name="txtEditUserPhone" size="20" value="<?php echo $objResult["UserPhone"];?>">*</td>
</tr>

<tr>
    <td> <div align="right">อีเมล์ : &nbsp;</div></td>
<td align=""><input type="text" name="txtEditUserEmail" size="20" value="<?php echo $objResult["UserEmail"];?>">*</td>
</tr>

<tr>
    <td> <div align="right">รหัสประจำตัวประชาชน :&nbsp;</div></td>
<td align=""><input type="text" name="txtEditUserSSID" size="20" value="<?php echo $objResult["UserSSID"];?>">*</td>
</tr>

<tr>
	    <td> <div align="right">สถานะ : &nbsp;</div></td>

<td align="">
<SELECT NAME="txtEditUserStatus" >
	<OPTION  VALUE="<?php echo $objResult["UserStatus"];?>" SELECTED><?php echo $objResult["UserStatus"];?>
	<OPTION VALUE="user">ผู้ใช้
	<OPTION VALUE="authority">เจ้าหน้าที่
	<OPTION VALUE="authority-apply">เจ้าหน้าที่มีสิทธิอณุมัติ
	<OPTION VALUE="ADMIN">ผู้ดูแลระบบ
</SELECT>*
</td>
</tr>

<!-- <tr>
  <th width="20"> <div align="center">คณะ </div></th>
<td> -->
	
<!-- 	<select id="ddlGeo" name="txtEditFacultyId" onChange = "ListProvince(this.value)" style="width:200px">
	<option selected value=""></option> -->
<!-- 	<?php
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
    <th width="20"> <div align="center">ภาควิชา </div></th>
<td>
	<select id="ddlProvince" name="txtEditDepartmentId" style="width:200px" onChange = "ListAmphur(this.value)"></select>*</td>
</tr> -->

<!-- <tr>
	    <th width="20"> <div align="center">สาขา </div></th>
<td>
	<select id="ddlAmphur" name="txtEditBranchId" style="width:200px"></select>
</td>
  </tr> -->

  

</tr>
  </table><br>
<input type="image" name="submit" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>
หมายเหตุ (*) กรุณากรอกข้อมูล

  <?php
  }

  ?>

  <?php
  }
  mysql_close($objConnect);
  ?>
  </form>

</div>




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