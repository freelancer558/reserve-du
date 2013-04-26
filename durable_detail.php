<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	@mysql_query("SET NAMES UTF8");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>หน้าหลัก</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />


<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>

</style>
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
<?php include('bar/headbar0.php');?>
      <tr>
    <td width="1%"></td>

 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">


<form action="durable_detail.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM durablearticleset WHERE DurableArticleSetId = '".$_GET["CusID"]."' ";
$objQuery = mysql_query($strSQL);
	@mysql_query("SET NAMES UTF8");
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found DurableArticleSetId=".$_GET["CusID"];
}
else
{
?>


<table width="800" border="0"  id="box-table-a">


<tr>
<td colspan="2"> <div id="head_content">
	  เครื่องมือวิทยาศาสตร์ : <?php echo $objResult["DurableArticleSetThaiName"];?></div></td>
</tr>
<tr><td width="98" colspan="2" align="center"> 
	  <img src="myfile/<?php echo $objResult["DurableArticleSetPic"];?>" width="300" height="250"></td>
</tr>

    <tr><td width="91"> <div align="right">หมายเลขเครื่องมือ : &nbsp;</div></td>
   <td><div align="left"><?php echo $objResult["DurableArticleSetNumber"];?></div></td>
</tr>

   

    <tr><td width="198"> <div align="right">ชื่อภาษาไทย :  &nbsp;</div></td>
	    <td align="left"><?php echo $objResult["DurableArticleSetThaiName"];?></td>
</tr>

    <tr><td width="97"> <div align="right">ชื่อภาษาอังกฤษ : &nbsp;</div></td>
	    <td align="left"><?php echo $objResult["DurableArticleSetEnglishName"];?></td>
</tr>

    <tr><td width="59"> <div align="right">รุ่น : &nbsp;</div></td>
	   <td align="left"><?php echo $objResult["DurableArticleSetVersion"];?></td>
	</tr>

    <tr><td width="59"> <div align="right">วิธีใช้ : &nbsp;</div></td>
	   <td align="left">
	   <a href="myfile/<?=$objResult["DurableArticleSetHowtoUse"];?>"><?=$objResult["DurableArticleSetHowtoUse"];?></a>




	</td>
	</tr>

    <tr><td width="59"> <div align="right">รายละเอียด :  &nbsp;</div></td>
	   <td align="left"><?php echo $objResult["DurableArticleSetDetail"];?></td>
	</tr>
	<tr>
    <td width=""> <div align="right">ยี่ห้อ  : &nbsp;</div></td>
	<td><?php echo $objResult["DurableArticleSetBrand"];?></td>
</tr>



    <tr><td width="59"> <div align="right">บริษัท : &nbsp;</div></td>
<?php
$facid = $objResult["CompanyId"];
	$strSQL2 = "SELECT CompanyThaiName FROM company WHERE CompanyId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		 <td align="left"><?php echo $objResult2["CompanyThaiName"];?></td>
<?php
	}
	?>
	</tr>

	 <tr><td width="59"> <div align="right">วันที่ซื้อเครื่องมือ : &nbsp;</div></td>
	   <td align="left"><?php echo $objResult["DurableArticleSetBuyDate"];?></td>
	</tr>

		 <tr><td width="59"> <div align="right">ปีงบประมาณ : &nbsp;</div></td>
<?php
$facid = $objResult["ProcurementBudgetYear"];
	$strSQL3 = "SELECT ProcurementBudgetYear FROM procurement WHERE ProcurementBudgetId =' ".$facid." ' ";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	while($objResult3 = mysql_fetch_array($objQuery3))
	{
	?>
		 <td align="left"><?php echo $objResult3["ProcurementBudgetYear"];?></td>
<?php
	}
	?>

</td>
	</tr>

	 <tr><td width="59"> <div align="right">ประเภทงบประมาณ : &nbsp;</div></td>
	   <?php
$facid = $objResult["ProcurementBudgetType"];
	$strSQL4 = "SELECT ProcurementBudgetType FROM procurement WHERE ProcurementBudgetId =' ".$facid." ' ";
	$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
	while($objResult4 = mysql_fetch_array($objQuery4))
	{
	?>
		 <td align="left"><?php echo $objResult4["ProcurementBudgetType"];?></td>
<?php
	}
	?>

	</tr>

	 <tr><td width="59"> <div align="right">ระยะประกัน : &nbsp;</div></td>
	   <td align="left"><?php echo $objResult["VouchDate"];?> &nbsp;ปี</td>
	</tr>

	 <tr><td width="59"> <div align="right">ตั้งอยู่ที่ห้อง : &nbsp;</div></td>
	   <td align="left"><?php echo $objResult["DurableArticleSetAtRoom"];?></td>
	</tr>

    <tr><td width="59"> <div align="right">ประเภทเครื่องมือ :&nbsp;</div></td>
	   <td align="left"><?php echo $objResult["DurableArticleSetType"];?></td>
	</tr>

	    <tr><td width="59"> <div align="right">สถานะเครื่องมือ :&nbsp;</div></td>
	   <td align="left"><?php echo $objResult["DurableArticleSetStatus"];?></td>
	</tr>

	    <tr><td width="59"> <div align="right">เครื่องมือประกอบ :&nbsp;</div></td>


<?php
$facid = $objResult["DurableArticleSetId"];
	$strSQL5 = "SELECT DurableArticleThaiName FROM durablearticle WHERE DurableArticleSetId =' ".$facid." ' ";
	$objQuery5 = mysql_query($strSQL3) or die ("Error Query [".$strSQL5."]");
	while($objResult5 = mysql_fetch_array($objQuery5))
	{
	?>
		 <td align="left"><?php echo $objResult5["DurableArticleThaiName"];?></td>
<?php
	}
	?>


  </tr>



<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>

<br><br>
<a href="SearchDurable.php"><IMG SRC="images/back.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a>









</div></td>   
  </tr>

 

  
<?php include('bar/footer.php');?>
</body>
</html>
