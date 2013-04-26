<?php include('h1.php');?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Admin Page</title>
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

<?php include('h2.php');?>
    
 <td width="210px" rowspan="8" align="center" valign="top">   <div id="content">




<form action="NewsDetail.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM news WHERE NewsId = '".$_GET["CusID"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found NewsId=".$_GET["CusID"];
}
else
{
?>


<table width="800" border="0"  id="box-table-a">
<tr> 
<td> <div align="center"> 
<img src="../myfile/<?=$objResult["NewsPic"];?>" width="300" height="250">
</div></td>
<tr>
   <td><div align="left" > <font size=4> &nbsp;&nbsp;&nbsp;&nbsp;<?=$objResult["NewsHeader"];?> </font> </div></td>
</tr>
    <td><div align="left"> <font size=3>  <?=$objResult["NewsDetail"];?>   </font> </div></td>
</tr>
</tr>





<?php
}
   ?>
 
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






<?php include('footer.php');?>
</body>
</html>