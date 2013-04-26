<?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['UserStatus'] != "authority")
	{
		echo "This page for authority only!";
		exit();
	}	
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Authority Page</title>
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />

<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>

</style>
<style>
A{text-decoration:none}
</style>
</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('headbar.php');?>


  <tr>
    <td width="1%" ></td>
    
 <td width="80%" rowspan="8" align="center" valign="top">  
 

 
 <div id="content">


</div></td>   
  </tr>
  
  
  
<?php include('footer.php');?>
</body>
</html>
