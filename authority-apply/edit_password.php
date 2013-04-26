<?php include('h1.php');?>

<html>

<?php include_once "connDB.php"; ?>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="styles_head.css" rel="stylesheet" type="text/css">
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

<?php include('h2.php');?>
    
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">

<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

 <table width="500" border="0"  id="box-table-a">
  <tr>
<td colspan="5"> <div id="head_content">
	  แก้ไขรหัสผ่าน</div></td>
</tr>

  
  <tr>

<form action="save_password.php" name="frmEdit" method="post" onSubmit="JavaScript:return fncSubmit();">


<tr>
    <th width="120"> <div align="left">รหัสผ่าน : </div></th>
   <td><input type="password" name="txtEditPassword" size="20" value="<?php echo $objResult["Password"];?>">*</td>
   </tr>

   <tr>
    <th width="20"> <div align="left">ยืนยันรหัสผ่าน : <br><br></div></th>
   <td><input type="password" name="txtCPassword" size="20"value="<?php echo $objResult["Password"];?>">*</td>
   </tr>


</tr>
  </table><br>
  <input type="submit" name="submit" value="submit">
หมายเหตุ (*) กรุณากรอกข้อมูล


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