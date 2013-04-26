
<html>
<?php include_once "connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>สมัครสมาชิก</title>
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

			if(document.frmEdit.txtFacultyId.value == "")
	{
		alert('กรุณากรอก "คณะ"');
		document.frmEdit.txtFacultyId.focus();		
		return false;
	}	

			if(document.frmEdit.txtDepartmentId.value == "")
	{
		alert('กรุณากรอก "ภาควิชา"');
		document.frmEdit.txtDepartmentId.focus();		
		return false;
	}	


		if(document.frmEdit.txtUserDetail.value == "")
		{
		alert('กรุณากรอก "รายละเอียด"');
		document.frmEdit.txtUserDetail.focus();		
		return false;
	}

	document.frmEdit.submit();
}
</script>


<STYLE>
A:link { color: black; text-decoration:none}
A:visited {color: black; text-decoration: none}
A:hover {color: black}
</STYLE>
</head>

<body>


<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('bar/headbar5.php');?>


  <tr>
    <td width="1%"></td>
    
 <td width="920" rowspan="20" align="center" valign="top"> <div id="content">

      

 
<?php  if($submit=="" or $show=="OK"){?>
<form action="edit_profile_save_user.php?UseId=<?php echo $_GET["UseId"];?>" name="frmEdit" method="post" onSubmit="JavaScript:return fncSubmit();">


<table width="900" border="0" id="box-table-a" >
  <tr align="center"> 
<tr>
<td colspan="2"> <div id="head_content">
	  สมัครสมาชิก</div></td>
</tr>
<tr>
    <th width="200"> <div align="right">ชื่อผู้ใช้  : &nbsp;</div></th>
<td><input type="text" name="txtUserName" size="20" >*หมายเลขประจำตัวนักศึกษา</td>
</tr>

<tr>
    <th width="20"><div align="right">รหัสผ่าน :&nbsp;</div></th>
   <td><input type="password" name="txtPassword" size="20" >*</td>
   </tr>

<tr>
    <th width="20"><div align="right">ยืนยันรหัสผ่าน : &nbsp;<br></div></th>
   <td><input type="password" name="txtCPassword" size="20" >*กรุณากรอกรหัสผ่านที่ตรงกับรหัสผ่านข้างต้น</td>
   </tr>

<tr>
    <th width="50"><div align="right">ชื่อ-นามสกุล : &nbsp;</div></th>		  
	 <td><div align=""><input type="text" name="txtUserFullname" size="30" >*
	</div></td>
	</tr>

<tr>
	<th width="30"><div align="right">เพศ :&nbsp; </div></th>
<td align=""><input  name='txtUserSex'  type='radio' value='male' <?php if($row3['UserSex']=='male') echo 'checked';?>> ชาย
<input  name='txtUserSex'  type='radio' value='female' <?php if($row3['UserSex']=='female') echo 'checked';?>> หญิง
</td>

</tr>

<tr>
    <th width="90"><div align="right">ที่อยู่  :&nbsp;</div></th>
<td ><textarea type="text" name="txtUserAddress" cols="60" rows="5"></textarea>*</td>
</tr>

<tr>
	    <th width="30"><div align="right">หมายเลขโทรศัพท์ :&nbsp;</div></th>
<td align=""><input type="text" name="txtUserPhone" size="20" >*กรุณากรอกหมายเลขโทรศัพท์จริงของท่าน</td>
</tr>

<tr>
    <th width="30"><div align="right">อีเมล์ : &nbsp;</div></th>
<td align="" width="600"><input type="text" name="txtUserEmail" size="20" >*กรุณากรอกอีเมลล์จริงของท่าน เพื่อรอรับการตอบกลับทางอีเมล์</td>
</tr>

<tr>
    <th width="110"><div align="right">รหัสประจำตัวประชาชน : &nbsp;</div></th>
<td align=""><input type="text" name="txtUserSSID" size="40" >*</td>
</tr>

<tr>
<td align=""><input  name='txtUserStatus'  type='hidden' value='user' <?php if($row3['UserStatus']=='user') echo 'checked';?>>
</td>
</tr>

<tr>
    <th width="20"> <div align="right">คณะ : &nbsp;</div></th>
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
	</select>*</td>
	</tr>

<tr>
    <th width="20"> <div align="right">ภาควิชา : &nbsp;</div></th>
<td>
	<select id="ddlProvince" name="txtDepartmentId" style="width:200px" onChange = "ListAmphur(this.value)">
	<option value = "-">-</option>
	</select>*</td>
</tr>


	<input type="hidden" id="ddlAmphur" name="txtBranchId" style="width:200px">

<tr>
	    <th width="20"> <br><div align="right">รายละเอียด :&nbsp; </div></th>
<td ><textarea name="txtUserDetail" rows="5"
cols="30"></textarea>* กรุณากรอกความประสงค์ในการสมัครขอใช้ระบบ</td>



</tr>
  </table><br>
  <input type="image" name="submit" WIDTH="100" HEIGHT="30"src="images/submit2.bmp"/>

หมายเหตุ (*) กรุณากรอกข้อมูล
  </form>


<?php } ?>



</div></td>   
  </tr>
  

 
  
<?php include('bar/footer4.php');?>
</body>
</html>
