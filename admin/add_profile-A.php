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
<title>Add Profile User</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
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
			var myOption = new Option('','')  
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
	if(document.frmEdit.txtUserName.value == "")
	{
		alert('กรุณากรอก "ชื่อผู้ใช้"');
		document.frmEdit.txtUserName.focus();
		return false;
	}	

	if(document.frmEdit.txtPassword.value == "")
	{
		alert('กรุณากรอก "รหัสผ่าน"');
		document.frmEdit.txtPassword.focus();		
		return false;
	}	
			if(document.frmEdit.txtPassword.value != document.frmEdit.txtCPassword.value )
	{
		alert('กรุณากรอก "รหัสผ่านที่เหมือนกัน"');
		document.frmEdit.txtPassword.focus();		
		return false;
	}	

		if(document.frmEdit.txtUserFullname.value == "")
	{
		alert('กรุณากรอก "ชื่อ-นามสกุล"');
		document.frmEdit.txtUserFullname.focus();		
		return false;
	}	

		if(document.frmEdit.txtUserSex.value == "")
	{
		alert('กรุณากรอก "เพศ"');
		document.frmEdit.txtUserSex.focus();		
		return false;
	}	

		if(document.frmEdit.txtUserAddress.value == "")
	{
		alert('กรุณากรอก "ที่อยู่"');
		document.frmEdit.txtUserAddress.focus();		
		return false;
	}	

		if(document.frmEdit.txtUserPhone.value == "")
	{
		alert('กรุณากรอก "หมายเลขโทรศัพท์"');
		document.frmEdit.txtUserPhone.focus();		
		return false;
	}	

		if(document.frmEdit.txtUserEmail.value == "")
	{
		alert('กรุณากรอก "อีเมล์"');
		document.frmEdit.txtUserEmail.focus();		
		return false;
	}	

		if(document.frmEdit.txtUserSSID.value == "")
	{
		alert('กรุณากรอก "รหัสประจำตัวประชาชน"');
		document.frmEdit.txtUserSSID.focus();		
		return false;
	}	

			if(document.frmEdit.txtUserStatus.value == "")
	{
		alert('กรุณากรอก "สถานะ"');
		document.frmEdit.txtUserStatus.focus();		
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


<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>

<?php include('headbar3.php');?>


  <tr>
<td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="80%" rowspan="8" align="center" valign="top"> <div id="content">



<?php  if($submit=="" or $show=="OK"){?>
<form action="edit_profile_save_user-A.php?UseId=<?php echo $_GET["UseId"];?>" name="frmEdit" method="post" onSubmit="JavaScript:return fncSubmit();">


<table width="550" border="0" align="center" id="box-table-a">
  <tr align="center"> 
 <tr>
<td colspan="8"> <div id="head_content">
	  เพิ่มผู้ใช้งานระบบ </div></td>
</tr>


<tr>
    <th width="170"> <div align="right">ชื่อผู้ใช้  :</div></th>
<td><input type="text" name="txtUserName" size="20" >*หมายเลขประจำตัวนักศึกษา</td>
</tr>

<tr>
    <th width="20"> <div align="right">รหัสผ่าน :</div></th>
   <td><input type="password" name="txtPassword" size="20" >*</td>
   </tr>

<tr>
    <th width="20"> <div align="right">ยืนยันรหัสผ่าน : <br><br></div></th>
   <td><input type="password" name="txtCPassword" size="20" >*</td>
   </tr>

<tr>
    <th width="50"> <div align="right">ชื่อ-นามสกุล : </div></th>		  
	 <td><div align=""><input type="text" name="txtUserFullname" size="30" >
	*</div></td>
	</tr>

<tr>
	<th width="30"> <div align="right">เพศ : </div></th>
<td align=""><input  name='txtUserSex'  type='radio' value='male' <?php if($row3['UserSex']=='male') echo 'checked';?>> ชาย
<input  name='txtUserSex'  type='radio' value='female' <?php if($row3['UserSex']=='female') echo 'checked';?>> หญิง
</td>

</tr>

<tr>
    <th width="90"> <div align="right">ที่อยู่  :</div></th>
<td ><textarea name="txtUserAddress" cols="30" rows="5"></textarea>*</td>
</tr>

<tr>
	    <th width="30"> <div align="right">หมายเลขโทรศัพท์ :</div></th>
<td align=""><input type="text" name="txtUserPhone" size="20" >*</td>
</tr>

<tr>
    <th width="30"> <div align="right">อีเมล์ : </div></th>
<td align=""><input type="text" name="txtUserEmail" size="20" >*</td>
</tr>

<tr>
    <th width="30"> <div align="right">รหัสประจำตัวประชาชน : </div></th>
<td align=""><input type="text" name="txtUserSSID" size="20" >*</td>
</tr>

<tr>
	    <th width="20"> <div align="right">สถานะ : </div></th>
<td align=""><input  name='txtUserStatus'  type='radio' value='user' <?php if($row3['UserStatus']=='user') echo 'checked';?>> ผู้ใช้
<input  name='txtUserStatus'  type='radio' value='authority' <?php if($row3['UserStatus']=='authority') echo 'checked';?>> เจ้าหน้าที่
<input  name='txtUserStatus'  type='radio' value='authority-apply' <?php if($row3['UserStatus']=='authority-apply') echo 'checked';?>> เจ้าหน้าที่ผู้มีสิทธิอณุมัติ
<input  name='txtUserStatus'  type='radio' value='ADMIN' <?php if($row3['UserStatus']=='ADMIN') echo 'checked';?>> ผู้ดูแลระบบ
</td>
</tr>

<tr>
    <th width="20"> <div align="right">คณะ : </div></th>
<td>
	
	<select id="ddlGeo" name="txtFacultyId" onChange = "ListProvince(this.value)" style="width:200px">
	<option selected value="">-</option>
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
	</select></td>
	</tr>

<tr>
    <th width="20"> <div align="right">ภาควิชา : </div></th>
<td>
	<select id="ddlProvince" name="txtDepartmentId" style="width:200px" onChange = "ListAmphur(this.value)">
	<option value = "-">-</option>
	</select></td>
</tr>


	<input type="hidden" id="ddlAmphur" name="txtBranchId" style="width:200px">

</tr>
  </table><br>

<a href="add_user-A.php"><IMG SRC="../images/back.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a>

  <input type="image" name="submit" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>
หมายเหตุ (*) กรุณากรอกข้อมูล
  </form>


<?php } ?>



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