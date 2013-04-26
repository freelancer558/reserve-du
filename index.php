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
<?php include('bar/headbar.php');?>


  <tr>
    <td width="1%" ></td>
    
 <td width="800px" rowspan="8" align="center" valign="top">   <div id="content">

<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM news ORDER BY NewsId DESC";
	@mysql_query("SET NAMES UTF8");
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="700" border="0" >
<IMG SRC="myfile/71929_577518675599573_1926675079_n.jpg" WIDTH="700" HEIGHT="450" BORDER="0" ALT="">
 
</table>
 
 
 </div></td>   
  </tr>
 
  
  
<?php include('bar/footer.php');?>
</body>
</html>
