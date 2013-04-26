<?php include('h1.php'); ?>


<html>
<?php include "connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Add Faculty Page</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
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

<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">


<div id="content">

<?php  if($submit=="" or $show=="OK"){?>
<center><form name="form1" method="post" action="faculty.php?show=OK&strSearch=Y">

</form></center>



<?php

//*** Add Condition ***//
if($_POST["hdnCmd"] == "Add")
{
	$strSQL = "INSERT INTO faculty ";
	$strSQL .="(FacultyId,FacultyThaiName,FacultyEnglishName) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtAddFacultyId"]."' ";
		$strSQL .=",'".$_POST["txtAddFacultyThaiName"]."' ";
	$strSQL .=",'".$_POST["txtAddFacultyEnglishName"]."') ";
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
	$strSQL = "UPDATE faculty SET ";
	$strSQL .="FacultyId = '".$_POST["txtEditFacultyId"]."' ";
	$strSQL .=",FacultyThaiName = '".$_POST["txtEditFacultyThaiName"]."' ";
	$strSQL .=",FacultyEnglishName = '".$_POST["txtEditFacultyEnglishName"]."' ";
	$strSQL .="WHERE FacultyId = '".$_POST["hdnEditFacultyId"]."' ";
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
	$strSQL = "DELETE FROM faculty ";
	$strSQL .="WHERE FacultyId = '".$_GET["FacId"]."' ";
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
$strSQL = "SELECT * FROM faculty ";
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

$strSQL .=" order  by FacultyId ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>



<form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
<table width="700" border="0"  id="box-table-a">
 <tr>
<td colspan="4"> <div id="head_content">
	  จัดการข้อมูลคณะ</div></td>
</tr>

  <tr >
    <th width="130"> <div align="center">หมายเลขคณะ </div></th>
    <th width="200"> <div align="center">ชื่อคณะภาษาไทย </div></th>
    <th width="300"> <div align="center">ชื่อคณะภาษาอังกฤษ </div></th>

    <th width="100"> <div align="center"> </div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>

  <?php
	if($objResult["FacultyId"] == $_GET["FacId"] and $_GET["Action"] == "Edit")
	{
  ?>
  <tr>
    <td><div align="center">
		<input type="text" name="txtEditFacultyId" size="5" value="<?php echo $objResult["FacultyId"];?>">
		<input type="hidden" name="hdnEditFacultyId" size="5" value="<?php echo $objResult["FacultyId"];?>">
	</div></td>

    <td><input type="text" name="txtEditFacultyThaiName" size="25" value="<?php echo $objResult["FacultyThaiName"];?>"></td>

    <td><input type="text" name="txtEditFacultyEnglishName" size="25" value="<?php echo $objResult["FacultyEnglishName"];?>"></td>


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
    <td><div align="center"><?php echo $objResult["FacultyId"];?></div></td>
    <td><?php echo $objResult["FacultyThaiName"];?></td>



    <td><?php echo $objResult["FacultyEnglishName"];?></td>




	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&FacId=<?php echo $objResult["FacultyId"];?>';}">ลบ</a></td>
  </tr>
  <?php
	}
  ?>
<?php
}
?>
  <tr>
    <td><div align="center"><input type="text" name="txtAddFacultyId" size="5">*</div></td>
    <td><input type="text" name="txtAddFacultyThaiName" size="18">*</td>

    <td><input type="text" name="txtAddFacultyEnglishName" size="25">*</td>



    <td colspan="2" align="right"><div align="center">

  <input type="image" name="btnAdd" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();" />


    </div></td>
  </tr>
</table><br><br>

Total <?phpecho $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
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