﻿<?php
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
	
	mysql_connect("localhost","root","1234");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
		@mysql_query("SET NAMES UTF8");
	$objResult = mysql_fetch_array($objQuery);

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Admin Page</title>
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" />
<link href="table1.css" rel="stylesheet" type="text/css">
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

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>


 
<?php include('headbar.php'); ?>



  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="800px" rowspan="8" align="center" valign="top">   <div id="content">

<?php
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM news ORDER BY NewsId DESC";
	@mysql_query("SET NAMES UTF8");
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="700" border="0" >
<tr><IMG SRC="../images/news.gif" WIDTH="700" HEIGHT="50" BORDER="0" ALT=""></tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>

   <tr>
<td>   <div align="center"><img src="../myfile/<?php echo $objResult["NewsPic"];?> " width="60" height="60"></div></td>  

    <td align="left">  

	<a href="NewsDetail.php?CusID=<?php echo $objResult["NewsId"];?>"><?php echo $objResult["NewsHeader"];?></a><br><br><br><br></td>
	</tr>
<?php
}
   ?>
 
</table>
 
 
 </div></td>   
  </tr>




    <tr  id='cssmenu'>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="check_login.php">
  <table border="0" style="width: 210px">
    <?php
	mysql_connect("localhost","root","1234");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<?php include('userbuttom.php'); ?>



<?php include('footer.php'); ?>



</body>
</html>