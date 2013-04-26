<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>หน้าหลัก</title>
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
<?php include('bar/headbar.php');?>

  <tr>
    <td width="1%"></td>
    
 <td width="210px" rowspan="8" align="center" valign="top">   <div id="content">



<table width="800" border="0">
<tr> 
<td> <div align="center"> 
<form action="NewsDetail.php?CusID=<?=$_GET["CusID"];?>" name="frmEdit" method="post">
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM news WHERE NewsId = '".$_GET["CusID"]."' ";
	@mysql_query("SET NAMES UTF8");
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found NewsId=".$_GET["CusID"];
}
else
{
?>

<img src="myfile/<?=$objResult["NewsPic"];?>" width="300" height="250">
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
 
  

 
 
  
<?php include('bar/footer.php');?>
</body>
</html>
