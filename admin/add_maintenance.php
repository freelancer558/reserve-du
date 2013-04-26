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
<title>Add DurableArticleSet User</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>


</head>
<script type='text/javascript' language='javascript' src='date_time/prototype-1.js'></script>
<script type='text/javascript' language='javascript' src='date_time/prototype-date-extensions.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviour.js'></script>
<script type='text/javascript' language='javascript' src='date_time/datepicker.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviors.js'></script>

<body>
<form action="add_durable_save-A.php?UseId=<?php echo $_GET["DruId"];?>" name="frmEdit" method="post">

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
  

<?php include('headbar3.php');?>

  <tr>
<td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">


<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM durablearticleset";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<?php //*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM durablearticleset ";
	$strSQL .="WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";
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
$strSQL = "SELECT * FROM durablearticleset ";
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

$strSQL .=" order  by DurableArticleSetId ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>


<table width="800" border="0" id="box-table-a" >
<tr  BGCOLOR="#cccccc" >
<th width="80"> <div align="center"> หมายเลขการซ่อมบำรุง </div></th>
<th width="190"> <div align="center">รายละเอียดการซ่อมบำรุง</div></th>
<th width="190"> <div align="center">ค่าใช้จ่าย</div></th>
<th width="190"> <div align="center">สถานะการซ่อมบำรุง</div></th>
<th width="190"> <div align="center">ประเภทการซ่อมบำรุง</div></th>
<th width="190"> <div align="center">วันที่ทำการซ่อมบำรุง</div></th>
<th width="190"> <div align="center">อุปกรณ์</div></th>

<th width="500"> <div align="center"></div></th>
<th width="500"><a href="add_maintenance1-A.php"> <img src="images/add.png" border="0"></center></a></th>
</tr>
<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
<tr>
<td><div align="center"><?php echo $objResult["MaintenanceId"];?></div></td>
<td><center><?php echo $objResult["MaintenanceDetail"];?></center></td>
<td><center><?php echo $objResult["MaintenanceCharges"];?></center></td>
<td><center><?php echo $objResult["MaintenanceStatus"];?></center></td>
<td><center><?php echo $objResult["MaintenanceType"];?></center></td>
<td><center><?php echo $objResult["MaintenanceDate"];?></center></td>
<td><center><?php
$facid = $objResult["DurableArticleSetId"];
	$strSQL2 = "SELECT DurableArticleSetThaiName FROM durablearticleset WHERE DurableArticleSetId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<td><div align="center"><?php echo $objResult2["DurableArticleSetThaiName"];?></div></td>
<?php
	}
	?></center></td>
<td><center><a href="add_durable3-A.php?DurableArticleSetId=<?php echo $objResult["DurableArticleSetId"];?>">Edit</a></center></td>

<td align=""><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&DurableArticleSetId=<?php echo $objResult["DurableArticleSetId"];?>';}">Delete</a></td>
</tr>
<?php
	}
?>
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


<?php
mysql_close($objConnect);
?>







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