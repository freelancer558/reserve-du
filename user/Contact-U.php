 <?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
		echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}

	if($_SESSION['UserStatus'] != "user")
	{
		echo "This page for user only!";
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ติดต่อเจ้าหน้าที่</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>

</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('headbar.php'); ?>
  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"><center>ข้อมูล ผู้ใช้</center></td>


     <td width="80%" rowspan="8"  align="center" valign="top">
	
<table  align="center"  valign="center" border="0" width="600" id="box-table-a">
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM contact";
	@mysql_query("SET NAMES UTF8");
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
 <tr>
<td colspan="5"> <div id="head_content">
	  ติดต่อเจ้าหน้าที่</div></td>
</tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
<tr><td>
ชื่อผู้ติดต่อ: &nbsp;<?php echo $objResult["Name"];?><br>
ที่อยู่สถานที่ติดต่อ :&nbsp; <?php echo $objResult["Address"];?><br>
อีเมล์ :&nbsp;<?php echo $objResult["Email"];?><br>
หมายเลขโทรศัพท์สำนักงาน :&nbsp;<?php echo $objResult["phone1"];?>&nbsp;<br> หมายเลขโทรศัพท์เคลื่อนที่ : &nbsp;<?php echo $objResult["phone2"];?><br>
หมายเลขแฟกซ์ :&nbsp;<?php echo $objResult["PhoneFax"];?>

</td></tr>

<?php }?>
	</table>


</center></td>   
  </tr>
 


<tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="../check_login.php">
  <table border="0" style="width: 210px">
    <?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<?php include('userbuttom.php'); ?>
  
<?php include('footer.php'); ?>
</body>
</html>