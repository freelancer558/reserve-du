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
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Add Company Page</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
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

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>


<?php include('headbar3.php');?>


  <tr>
<td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">



<div id="content">

<?php  if($submit=="" or $show=="OK"){?>
<center>
<table width="98%" >

</table>
</form></center>



<?php

//*** Add Condition ***//
if($_POST["hdnCmd"] == "Add")
{
	$strSQL = "INSERT INTO company ";
	$strSQL .="(CompanyId,CompanyThaiName,CompanyEnglishName,CompanyAddress,CompanyEmail,CompanyPhone) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtAddCompanyId"]."' ";
	$strSQL .=",'".$_POST["txtAddCompanyThaiName"]."' ";
	$strSQL .=",'".$_POST["txtAddCompanyEnglishName"]."' ";
	$strSQL .=",'".$_POST["txtAddCompanyAddress"]."' ";
	$strSQL .=",'".$_POST["txtAddCompanyEmail"]."' ";
	$strSQL .=",'".$_POST["txtAddCompanyPhone"]."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

//*** Update Condition ***//
if($_POST["hdnCmd"] == "Update")
{
	$strSQL = "UPDATE company SET ";
	$strSQL .="CompanyId = '".$_POST["txtEditCompanyId"]."' ";
	$strSQL .=",CompanyThaiName = '".$_POST["txtEditCompanyThaiName"]."' ";
	$strSQL .=",CompanyEnglishName = '".$_POST["txtEditCompanyEnglishName"]."' ";
	$strSQL .=",CompanyAddress = '".$_POST["txtEditCompanyAddress"]."' ";
	$strSQL .=",CompanyEmail = '".$_POST["txtEditCompanyEmail"]."' ";
	$strSQL .=",CompanyPhone = '".$_POST["txtEditCompanyPhone"]."' ";
	$strSQL .="WHERE CompanyId = '".$_POST["hdnEditCompanyId"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

//*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM company ";
	$strSQL .="WHERE CompanyId = '".$_GET["ProId"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Delete [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}


$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM company ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 10;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by CompanyId ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>




<form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
<table width="800" border="0" id="box-table-a">
 <tr>
<td colspan="8"> <div id="head_content">
	  จัดการข้อมูลบริษัท</div></td>
</tr>
  <tr>
    <th width="100"> <div align="center">หมายเลขบริษัท </div></th>
    <th width="150"> <div align="center">ชื่อบริษัทภาษาไทย </div></th>
	<th width="150"> <div align="center">ชื่อบริษัทภาษาอังกฤษ </div></th>
    <th width="200"> <div align="center">ที่อยู่ </div></th>
    <th width="100"> <div align="center">อีเมล์ </div></th>
    <th width="50"> <div align="center">หมายเลขโทรศัพท์ </div></th>
    <th width="30"> <div align="center"> </div></th>
    <th width="30"> <div align="center"> </div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>

  <?php
	if($objResult["CompanyId"] == $_GET["ProId"] and $_GET["Action"] == "Edit")
	{
  ?>
  <tr>
    <td><div align="center">
		<input type="text" name="txtEditCompanyId" size="5" value="<?php echo $objResult["CompanyId"];?>">
		<input type="hidden" name="hdnEditCompanyId" size="5" value="<?php echo $objResult["CompanyId"];?>">
	</div></td>

    <td><input type="text" name="txtEditCompanyThaiName" size="20" value="<?php echo $objResult["CompanyThaiName"];?>"></td>

    <td><input type="text" name="txtEditCompanyEnglishName" size="20" value="<?php echo $objResult["CompanyEnglishName"];?>"></td>

    <td><input type="text" name="txtEditCompanyAddress" size="20" value="<?php echo $objResult["CompanyAddress"];?>"></td>

	    <td><input type="text" name="txtEditCompanyEmail" size="20" value="<?php echo $objResult["CompanyEmail"];?>"></td>

	 <td><input type="text" name="txtEditCompanyPhone" size="20" value="<?php echo $objResult["CompanyPhone"];?>"></td>



<td colspan="2" align="right"><div align="center">
      <input name="btnAdd" type="button" id="btnUpdate" value="Update" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();">
	  <input name="btnAdd" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>';">
    </div></td>
  </tr>
  <?php
	}
  else
	{
  ?>
  <tr>
    <td><div align="center"><?php echo $objResult["CompanyId"];?></div></td>
    <td><?php echo $objResult["CompanyThaiName"];?></td>
	    <td><?php echo $objResult["CompanyEnglishName"];?></td>
    <td><?php echo $objResult["CompanyAddress"];?></td>
	<td><?php echo $objResult["CompanyEmail"];?></td>
	<td><div align="center"><?php echo $objResult["CompanyPhone"];?></td>



    <td align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Edit&ProId=<?php echo $objResult["CompanyId"];?>">แก้ไข</a></td>
	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&ProId=<?php echo $objResult["CompanyId"];?>';}">ลบ</a></td>
  </tr>
  <?php
	}
  ?>
<?php
}
?>
  <tr>
    <td></td>
    <td><input type="text" name="txtAddCompanyThaiName" size="20"></td>
	  <td><input type="text" name="txtAddCompanyEnglishName" size="20"></td>
    <td><input type="text" name="txtAddCompanyAddress" size="20"></td>
    <td><input type="text" name="txtAddCompanyEmail" size="20"></td>
    <td><input type="text" name="txtAddCompanyPhone" size="20"></td>



    <td colspan="2" align="right"><div align="center">

	  <input type="image" name="btnAdd" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();" />
    </div></td>
  </tr>
</table>


Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}

?>


</form>
<?php
mysql_close($objConnect);
?>
<?php }?>


</div>
</div>
</center>






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