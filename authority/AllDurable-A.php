<?php include('h1.php'); ?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>แสดงรายการเครื่องมือ</title>
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

<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">


<?php
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



<table width="900" border="0"  id="box-table-a">
  <tr>
<td colspan="3"> <div id="head_content">
	  เครื่องมือวิทยาศาสตร์ </div></td>
</tr>
  
  <tr>
    <th width="150"> <div align="center">หมายเลขเครื่องมือ</div></th>
    <th width="200"> <div align="center"> </div></th>
    <th width="500"> <div align="center"> </div></th>
	</tr>

<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
<TR>
	<TD><div align="center"><?php echo $objResult["DurableArticleSetNumber"];?></div></TD>
	<TD><img src="../myfile/<?php echo $objResult["DurableArticleSetPic"];?>" width="300" height="250"></TD>
	<TD valign="top"><TABLE    valign="top">
	
	<TR>
		<TD align="right"  >ชื่อภาษาไทย :</TD>
		<TD ><?php echo $objResult["DurableArticleSetThaiName"];?></TD>
	</TR>

	<TR>
		<TD align="right" >ชื่อภาษาอังกฤษ :</TD>
		<TD> <?php echo $objResult["DurableArticleSetEnglishName"];?></TD>
	</TR>
	
	<TR>
		<TD  align="right">รุ่น :</TD>
		<TD><?php echo $objResult["DurableArticleSetVersion"];?></TD>
	</TR>

	<TR>
		<TD align="right" >สถานะ :</TD>
		<TD><?php echo $objResult["DurableArticleSetStatus"];?></TD>
	</TR>

	<TR>
		<TD align="center" colspan="2"> <br>
		
		<a href="durable_detail.php?CusID=<?php echo $objResult["DurableArticleSetId"];?>"><IMG SRC="../images/detail.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a>
		
		</TD>

	</TR>
	

	</TABLE>
	</TD>
</TR>
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