<?php
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
	
	mysql_connect("localhost","root","");
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

<script type='text/javascript' language='javascript' src='date_time/prototype-1.js'></script>
<script type='text/javascript' language='javascript' src='date_time/prototype-date-extensions.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviour.js'></script>
<script type='text/javascript' language='javascript' src='date_time/datepicker.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviors.js'></script>
<link rel='stylesheet' href='date_time/datepicker.css'>


<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>


 
<?php include('headbar.php'); ?>



  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="800px" rowspan="8" align="center" valign="top">   <div id="content">

<!-- เครื่องมือ -->
  <table border="0" width="900" id="box-table-a">
 <form action="report-4-A.php" method="post" name="submit2" order_company="submit2" target="_blank">
				  <? $date = date("Y-m-d"); ?>

 <tr>
<td colspan="5"> <div id="head_content">
	  	  ทำการออกรายงานสรุปการใช้เครื่องมือวิทยาศาสตร์ โดยเลือกจากเครื่องมือวิทยาศาสตร์</div></td>
</tr>
 


	<tr>
		<td align="center">
		เลือกเครื่องมือวิทยาศาสตร์

		  <select name="durable">
			<option value=""><-- กรุณาเลือก --></option>
			<?php
			mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("project");
			$strSQL = "SELECT DISTINCT DurableArticleSet FROM reserve ORDER BY DurableArticleSet ASC";
			$objQuery = mysql_query($strSQL);
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<option value="<?php echo $objResuut["DurableArticleSet"];?>"><?php echo $objResuut["DurableArticleSet"]?></option>
			<?php
			}
			?>
		  </select>

			<input type="datetime" id="exampleVII" name="date1" class='datepicker' size="20" > ถึงวันที่
			<input type="datetime" id="exampleVII" name="date2" class='datepicker' size="20" >
		</td>
		<td align="center" width="100">
<INPUT name="submit" TYPE="submit" value="ทำการพิมพ์" >
		</td>
	</tr>
</tr>



</tr>
</table>


 
 
 </div></td>   
  </tr>
    <tr  id='cssmenu'>
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