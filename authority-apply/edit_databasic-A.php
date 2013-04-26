<?php include('h1.php');?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ค้นหารายการยืม</title>
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
background: -webkit-gradient(linear, left top, left bottom, from(#EEEEEE), to(#FFFFFF));
}
a:link {
	color: #000;
}
a:hover {
	color: #F00;
}
a{
text-decoration:none;
}
</style>
</head>

<?php include('h2.php');?>
    
    <td width="80%" rowspan="8"  align="center" valign="top"><center>
		จัดการข้อมูลพื้นฐาน
	<INPUT TYPE="button" VALUE="Search" ONCLICK="">

	</center></td>   
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