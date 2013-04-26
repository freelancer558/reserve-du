<?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
		echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}

	if($_SESSION['UserStatus'] != "authority")
	{
		echo "This page for authority only!";
		echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}	
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
		@mysql_query("SET NAMES UTF8");
?>





<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Authority Page</title>
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

<script>
		//**** List Province (Start) ***//
		function ListProvince(SelectValue)
		{
			frmMain.ddlProvince.length = 0
			frmMain.ddlAmphur.length = 0
			
			//*** Insert null Default Value ***//
			var myOption = new Option('','')  
			frmMain.ddlProvince.options[frmMain.ddlProvince.length]= myOption
			
			<?php
			$intRows = 0;
			$strSQL = "SELECT * FROM faculty ORDER BY FacultyId ASC ";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$intRows = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$intRows++;
			?>			
				x = <?php echo $intRows;?>;
				mySubList = new Array();
				
				strGroup = <?php echo $objResult["FacultyId"];?>;
				strValue = "<?php echo $objResult["FacultyId"];?>";
				strItem = "<?php echo $objResult["FacultyThaiName"];?>";
				mySubList[x,0] = strItem;
				mySubList[x,1] = strGroup;
				mySubList[x,2] = strValue;
				if (mySubList[x,1] == SelectValue){
					var myOption = new Option(mySubList[x,0], mySubList[x,2])  
					frmMain.ddlProvince.options[frmMain.ddlProvince.length]= myOption					
				}
			<?php
			}
			?>																	
		}
		//**** List Province (End) ***//


</script>

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



<?php include('headbar1.php'); ?>



  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>ข้อมูล เจ้าหน้าที่</center></div></td>
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">


<div id="content">

<?php  if($submit=="" or $show=="OK"){?>
<center><form name="form1" method="post" action="add_department-A.php?show=OK&strSearch=Y">
<table width="98%" >



</select></div>
</td>

</td>
</tr>
</table>
</form></center>



<?php

//*** Add Condition ***//
if($_POST["hdnCmd"] == "Add")
{
	$strSQL = "INSERT INTO department ";
	$strSQL .="(DepartmentId,DepartmentThaiName,DepartmentEnglishName,FacultyId) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtAddDepartmentId"]."','".$_POST["txtAddDepartmentThaiName"]."' ";
	$strSQL .=",'".$_POST["txtAddDepartmentEnglishName"]."' ";
	$strSQL .=",'".$_POST["txtAddFacultyId"]."') ";
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
	$strSQL = "UPDATE department SET ";
	$strSQL .="DepartmentId = '".$_POST["txtEditDepartmentId"]."' ";
	$strSQL .=",DepartmentThaiName = '".$_POST["txtEditDepartmentThaiName"]."' ";
	$strSQL .=",DepartmentEnglishName = '".$_POST["txtEditDepartmentEnglishName"]."' ";
	$strSQL .=",FacultyId = '".$_POST["txtEditFacultyId"]."' ";
	$strSQL .="WHERE DepartmentId = '".$_POST["hdnEditDepartmentId"]."' ";
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
	$strSQL = "DELETE FROM department ";
	$strSQL .="WHERE DepartmentId = '".$_GET["DepId"]."' ";
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
$strSQL = "SELECT * FROM department ";
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

$strSQL .=" order  by DepartmentId ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>



<form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
<table width="900" border="0"  id="box-table-a">
 <tr>
<td colspan="5"> <div id="head_content">
	  จัดการข้อมูลภาควิชา</div></td>
</tr>

  <tr>

    <th width="200"> <div align="center">คณะ </div></th>

    <th width="50"> <div align="center">หมายเลขภาควิชา </div></th>
    <th width="200"> <div align="center">ชื่อภาควิชาภาษาไทย </div></th>
    <th width="200"> <div align="center">ชื่อภาควิชาภาษาอังกฤษ </div></th>

    <th width="100"> <div align="center"> </div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
	$autoid = $arr['BranchId'];
$i++;
if($i%2==0){
$bg = "#CCCCCC";
}else{
$bg = "#FFFFFF";
}
?>


  <?php
	if($objResult["DepartmentId"] == $_GET["DepId"] and $_GET["Action"] == "Edit")
	{
  ?>
  <tr>
    <td><div align="center">

  <td>
	
	<select id="ddlGeo" name="txtEditFacultyId">
	<option selected value=""></option>
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
	</select>
	
	</td>

		<input type="text" name="txtEditDepartmentId" size="5" value="<?php echo $objResult["DepartmentId"];?>">
		<input type="hidden" name="hdnEditDepartmentId" size="5" value="<?php echo $objResult["DepartmentId"];?>">
	</div></td>

    <td><input type="text" name="txtEditDepartmentThaiName" size="20" value="<?php echo $objResult["DepartmentThaiName"];?>"></td>

    <td><input type="text" name="txtEditDepartmentEnglishName" size="20" value="<?php echo $objResult["DepartmentEnglishName"];?>"></td>



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

<?php
$facid = $objResult["FacultyId"];
	$strSQL2 = "SELECT FacultyThaiName FROM faculty WHERE FacultyId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<td><div align="center"><?php echo $objResult2["FacultyThaiName"];?></div></td>
<?php
	}
	?>

    <td><div align="center"><?php echo $objResult["DepartmentId"];?></div></td>
    <td><?php echo $objResult["DepartmentThaiName"];?></td>
    <td><?php echo $objResult["DepartmentEnglishName"];?></td>






	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&DepId=<?php echo $objResult["DepartmentId"];?>';}">ลบ</a></td>
  </tr>
  <?php
	}
  ?>
<?php
}
?>
  <tr>

<td align="center">

	<select id="ddlGeo" name="txtAddFacultyId" onChange = "ListProvince(this.value)">
	<option selected value=""></option>
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

    <td><div align="center"><input type="text" name="txtAddDepartmentId" size="5"></div></td>
    <td><input type="text" name="txtAddDepartmentThaiName" size="20"></td>

    <td><input type="text" name="txtAddDepartmentEnglishName" size="20"></td>






    <td colspan="2" align="right"><div align="center">

  <input type="image" name="btnAdd"  id="btnAdd" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();" />



    </div></td>
  </tr>
</table>

<br><br>
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
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