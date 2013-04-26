<?php include('h1.php'); ?>


<html>
<?php include_once "connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>อนุมัติคำขอผู้ใช้</title>
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
<link rel='stylesheet' href='date_time/datepicker.css'>

<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">


<?php  if($submit=="" or $show=="OK"){?>
<center><form name="form1" method="post" >
<table width="98%" >
<br><br>
<?php
//*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM userdurablereport ";
	$strSQL .="WHERE RId = '".$_GET["RId"]."' ";
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
$strSQL = "SELECT * FROM userdurablereport WHERE Active='No'  ";
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

$strSQL .=" order  by RId ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>




<form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
<table width="800" border="0" id="box-table-a" align="center">

 <tr>
<td colspan="6"> <div id="head_content">
	  การแจ้งซ่อมจากผู้ใช้ระบบ</div></td>
</tr>

  <tr>

    <th width="150"> <div align="center">หมายเลขการแจ้งซ่อมจากผู้ใช้ </div></th>
    <th width="120"> <div align="center">เครื่องมือ </div></th>
    <th width="250"> <div align="center">รายละเอียด </div></th>		    
    <th width="30"> <div align="center"> </div></th>


	</div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>

  <tr>
    <td><div align="center"><?php echo $objResult["RId"];?></div></td>

<?php
$facid = $objResult["DurableArticleSetId"];
	$strSQL2 = "SELECT DurableArticleSetThaiName FROM durablearticleset WHERE DurableArticleSetId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<td><div align="left"><?php echo $objResult2["DurableArticleSetThaiName"];?></div></td>
<?php
	}
	?>

    <td><div align="left"><?php echo iconv_substr( $objResult["Detail"],0,60, "UTF-8");?></div></td>



   <td align="" width="80px"><a href="userRepairing-2-A.php?RId=<?php echo $objResult["RId"];?>">รายละเอียด</a></td>

  </tr>
  <?php
	}
  ?>
<?php
}
?>


</table>
<br><br>
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