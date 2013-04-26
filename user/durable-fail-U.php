<html>
<?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['UserStatus'] != "user")
	{
		echo "This page for user only!";
		exit();
	}	
	
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
		@mysql_query("SET NAMES UTF8");
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>แจ้งปัญหาเครื่องมือวิทยาศาสตร์</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<style type="text/css">

</style>
</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('headbar.php'); ?>
  <tr>
  <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"><center>ข้อมูล ผู้ใช้</center></td>
    
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">
 

	<form name="form1" method="post" action="durable-fail2-U.php" enctype="multipart/form-data">
<table width="690" border="0" id="box-table-a">
    <tr>
<td colspan="3"> <div id="head_content">
	  แจ้งปัญหาการใช้งานเครื่องมือวิทยาศาสตร์ที่ชำรุด </div></td>
</tr>


<tr>
   <th width="230"> <div align="right">เครื่องมือที่ชำรุด :<br><br> </div></th>
<td>

<select id="pagelist" name="DurableArticleSetId">
	<option selected value="">กรุณาเลือก</option>
	<?php
	$strSQL = "SELECT * FROM durablearticleset ORDER BY DurableArticleSetId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["DurableArticleSetId"];?>"><?php echo $objResult["DurableArticleSetEnglishName"];?></option>
	<?php
	}
	?>

	</select>

</td>
</tr>

<tr>
    <th width="230"> <div align="right">รายละเอียดที่เครื่องมือชำรุด :<br><br></div></th>
<td >
<textarea name="Detail" rows="5"
cols="50"></textarea>

</td>
</tr>

  
  </tr></table><br><br>

 <input type="image" name="btnSubmit" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>

	</form>


  

 
 
 
 
 
 </div></td>   
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