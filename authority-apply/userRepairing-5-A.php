<?php include('h1.php'); ?>

<html>
<?php include_once "connDB.php"; ?>

<head>
<style type="text/css">
a{
text-decoration:none;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile User</title>
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


<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="8" align="center" valign="top"> <div id="content">


<?php
$strSQL = "SELECT * FROM userdurablereport WHERE RId = '".$_GET["RId"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
@mysql_query("SET NAMES UTF8");
if(!$objResult)
{
	echo "Not found RId=".$_GET["RId"];
}
else
{
?>


<table width="700" border="0"  id="box-table-a" >

   <tr>
<td colspan="6"> <div id="head_content">
	  การแจ้งซ่อมจากผู้ใช้ระบบ เครื่องมือ : <?php
$facid = $objResult["DurableArticleSetId"];
	$strSQL2 = "SELECT DurableArticleSetThaiName FROM durablearticleset WHERE DurableArticleSetId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<?php echo $objResult2["DurableArticleSetThaiName"];?>
<?php
	}
	?></td>
</tr>
  
  <tr><br>
<form name="form1" method="post" action="userRepairing-3-A.php?RId=<?php echo $_GET["RId"];?>"  enctype="multipart/form-data">

<tr>
    <th width="260"> <div align="left">หมายเลขการแจ้งซ่อมจากผู้ใช้ : </div></th>
<td width="600px"><?php echo $objResult["RId"];?></td>
</tr>


<tr>
    <th width="100px"> <div align="left">ชื่อผู้ใช้ : </div></th>
<td width="600px"><?php echo $objResult["RId"];?></td>
</tr>

<tr>
    <th width="50px"><div align="left">เครื่องมือ : </div></th>		  
	 <td><?php
$facid = $objResult["DurableArticleSetId"];
	$strSQL2 = "SELECT DurableArticleSetThaiName FROM durablearticleset WHERE DurableArticleSetId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<div align="left"><?php echo $objResult2["DurableArticleSetThaiName"];?></div>
<?php
	}
	?>
	</td>
	</tr>

<tr>
	<th width="30"> <div align="left">รายละเอียด : </div></th>
<td align="">
<?php echo $objResult["Detail"]; ?>

<!-- <?php $text=$objResult["Detail"];
$newtext = wordwrap($text,70,"<br>\n",1);// every 70 character new line
echo"<div align='left'>".$newtext."</div>";
?> -->
</tr>



</tr>
  </table>
  <?php
  }
  mysql_close($objConnect);
  ?>
<br><br>
<a href="userRepairing-6-A.php"><IMG SRC="../images/back.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a> 

  </form>
</div>




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