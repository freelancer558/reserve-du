<?php include('h1.php');?>
<?php include_once "connDB.php"; ?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Page</title>
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


<?php include('h2.php');?>
    
 <td width="80%" rowspan="8" align="center" valign="top"> <div id="content">
 
 <?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM maintenance ";
	@mysql_query("SET NAMES UTF8");
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

$strSQL .=" order  by MaintenanceId DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>


<table width="900" id="box-table-a">
 <tr>
<td colspan="7"> <div id="head_content">
	  จัดการข้อมูลซ่อมบำรุงเครื่องมือ : รายการแจ้งซ่อมบำรุงทั้งหมด</div></td>
</tr>
  <tr>
    <th width="170"> <div align="center">หมายเลขการบำรุงรักษา</div></th>
    <th width="90"> <div align="center">รายละเอียด </div></th>
    <th width="90"> <div align="center">สถานะ </div></th>
	<th width="150"> <div align="center">ประเภทการบำรุง </div></th>
	<th width="90"> <div align="center">วันที่บำรุง </div></th>
	<th width="90"> <div align="center">เครื่องมือ </div></th>
	<th  width="90"></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>



  <tr bgcolor="<?php echo $bg?>" onmouseover="this.style.backgroundColor='#CCFFCC'" onmouseout="this.style.backgroundColor=''" valign="top">
    <td><div align="center"><?php echo $objResult["MaintenanceId"];?></div></td>
    <td><div align="center"><?php echo $objResult["MaintenanceDetail"];?></div></td>

    <td><div align="center"><?php echo $objResult["MaintenanceStatus"];?></div></td>
	<td><div align="center"><?php echo $objResult["MaintenanceType"];?></div></td>
    <td><div align="center"><?php echo $objResult["MaintenanceDate"];?></div></td>


<?php
$duid = $objResult["DurableArticleSetId"];
	$strSQL2 = "SELECT DurableArticleSetEnglishName FROM durablearticleset WHERE DurableArticleSetId =' ".$duid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<td><div align="center"><?php echo $objResult2["DurableArticleSetEnglishName"];?></div></td>
<?php
	}
	?>

  <td align="center"><a href="show_detail_maintenance-A.php?CusID=<?php echo $objResult["MaintenanceId"];?>">รายละเอียด</a></td>
  </tr>
<?php
}
?>
</table>

<br><br>
Total <?php echo  $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
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