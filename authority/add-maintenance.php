<?php include('h1.php'); ?>


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
<link href="styles_head.css" rel="stylesheet" type="text/css">
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

<?php include('h2.php'); ?>
    
 <td width="" rowspan="20" align="center" valign="top"> <div id="content">


<?php

$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM Maintenance WHERE MaintenanceStatus !='ได้รับเครื่องมือคืนแล้ว' ";
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

$strSQL .=" order  by MaintenanceId ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>


<table width="950" border="0" id="box-table-a" >
 <tr>
<td colspan="8"> <div id="head_content">
	 เพิ่มรายละเอียดการซ่อมบำรุงเครื่องมือหลังได้รับเครื่องมือคืน : 
	 </td></tr>
<tr >
<td width="150"> <div align="center"> หมายเลขการซ่อมบำรุง </div></td>
<td width="300"> <div align="center">รายละเอียดการซ่อมบำรุง</div></td>
<td width="250"> <div align="center">สถานะการซ่อมบำรุง</div></td>
<td width="250"> <div align="center">ประเภทการซ่อมบำรุง</div></td>
<td width="200"> <div align="center">วันที่ทำการซ่อมบำรุง</div></td>
<td width="200"> <div align="center">เครื่องมือ</div></td>

<th width="200"> <div align="center"></div></th>

</tr>
<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
<tr>
<td><div align="center"><?php echo $objResult["MaintenanceId"];?></div></td>
<td><center><?php echo $objResult["MaintenanceDetail"];?></center></td>

<td><center><?php echo $objResult["MaintenanceStatus"];?></center></td>
<td><center><?php echo $objResult["MaintenanceType"];?></center></td>
<td><center><?php echo $objResult["MaintenanceDate"];?></center></td>
<td><center><?php
$facid = $objResult["DurableArticleSetId"];
	$strSQL2 = "SELECT DurableArticleSetEnglishName FROM durablearticleset WHERE DurableArticleSetId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<div align="center"><?php echo $objResult2["DurableArticleSetEnglishName"];?></div>
<?php
	}
	?></center></td>
<td><center><a href="add-maintenance1-A.php?MaintenanceId=<?php echo $objResult["MaintenanceId"];?>">เพิ่มรายละเอียด</a></center></td>

</tr>
<?php
	}
?>
</table>
<br><br><br>
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