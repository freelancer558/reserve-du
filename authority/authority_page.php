<!--zzzzzzzzzzzzzzzzzzzzzzzzzz ตั้งแต่นี้zzzzzzzzzzzzzzzzzzzzzzzzzzzzzz -->
<?php include('h1.php'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Authority Page</title>

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

<?php include('h2.php'); ?>

 <td width="800px" rowspan="8" align="center" valign="top">   <div id="content">

<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM news ORDER BY NewsId DESC";
	@mysql_query("SET NAMES UTF8");
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="700" border="0" >
<IMG SRC="../myfile/71929_577518675599573_1926675079_n.jpg" WIDTH="700" HEIGHT="450" BORDER="0" ALT="">
 
</table>
 
 
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






 <?php include('footer.php'); ?>
</body>
</html>



