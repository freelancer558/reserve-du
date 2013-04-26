<?php include('h1.php');?>
<?php include_once "connDB.php"; ?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>รายละเอียดการบำรุงรักษา</title>
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
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
background: -webkit-gradient(linear, left top, left bottom, from(#EEEEEE), to(#FFFFFF));
}
a:link {
	color: #000;
}
a:hover {
	color: #F00;
}
a{
text-decoration:none;
}
</style>

</head>
<?php include('h2.php');?>


 <div id="content" >
<td width="80%" rowspan="8"  valign="top" align="center"> 


<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM maintenance WHERE MaintenanceId = '".$_GET["CusID"]."' ";
mysql_query("SET CHARACTER SET utf8");
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found MaintenanceId=".$_GET["CusID"];
}
else
{
?>
<table  border="0"  id="box-table-a" ><br>

 <tr>
<td colspan="2"> <div id="head_content">
	 รายละเอียดการซ่อมบำรุงอุปกรณ์ : 	<?php
$depid = $objResult["DurableArticleSetId"];
	$strSQL3 = "SELECT DurableArticleSetEnglishName FROM durablearticleset WHERE DurableArticleSetId =' ".$depid." ' ";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	while($objResult3 = mysql_fetch_array($objQuery3))
	{
	?>
    <?php echo $objResult3["DurableArticleSetEnglishName"];?>
<?php
	}
	?></div></td>
</tr>

  <tr >
  <tr>
    <th width="220" ><div align="left">หมายเลขการซ่อมบำรุง :</div></th>
	 <td width="400"><div align="left"><?php echo $objResult["MaintenanceId"];?></div></td>
	</tr>

  <tr><th><div align="left">เครื่องมือวิทยาศาสตร์ : </div></th>
	
	
	<?php
$depid = $objResult["DurableArticleSetId"];
	$strSQL3 = "SELECT DurableArticleSetEnglishName FROM durablearticleset WHERE DurableArticleSetId =' ".$depid." ' ";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	while($objResult3 = mysql_fetch_array($objQuery3))
	{
	?>
    <td align="left"><?php echo $objResult3["DurableArticleSetEnglishName"];?></td>
<?php
	}
	?>

	</tr>


    <tr><th ><div align="left">รายละเอียด :</div></th>
	 <td><div align="left"><?php echo $objResult["MaintenanceDetail"];?></td>
	</tr>

    <tr><th><div align="left"> ครั้งถัดไป : </div></th>
 <td><div align="left"><?php echo $objResult["MaintenanceNext"];?></td>
	</tr>

    <tr><th ><div align="left"> ค่าใช้จ่าย : </div></th>
	<td><div align="left"><?php echo $objResult["MaintenanceCharges"];?></div></td>
	</tr>

    <tr><th ><div align="left">รายละเอียดค่าใช้จ่าย : </div></th>
	<td><div align="left"><?php echo $objResult["MaintenanceDetailCharges"];?></td>
	</tr>

    <tr><th><div align="left">สถานะการบำรุง : </div></th>
	<td ><div align="left"><?php echo $objResult["MaintenanceStatus"];?></td>
	</tr>

	  <tr><th> <div align="left">ประเภทการบำรุง : </div></th>
	<td ><div align="left"><?php echo $objResult["MaintenanceType"];?></td>
	</tr>

	  <tr><th><div align="left">วันที่บำรุง : </div></th>
	<td ><div align="left"><?php echo $objResult["MaintenanceDate"];?></td>
	</tr>



	



<tr >
<br>
<td colspan="2"align="center"> 
  <a href="show_maintenance-A.php"><IMG SRC="../images/back.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a>

  </table>

  <?php
  }
  mysql_close($objConnect);
  ?>
  </form>


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