<?php include('h1.php');?>

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


<?php include('h2.php');?>
    
 <td width="800px" rowspan="8" align="center" valign="top">   <div id="content">

  <table border="0"  id="box-table-a">
 <form action="report-2-A.php" method="post" name="frmSearch" order_company="frmSearch" target="_blank">
				  <? $date = date("Y-m-d"); ?>
 <tr>
<td colspan="5"> <div id="head_content">
	  	  ทำการออกรายงานสรุปการใช้เครื่องมือวิทยาศาสตร์ โดยเลือกจากเครื่องมือวิทยาศาสตร์</div></td>
</tr>

<tr>
	<tr>
		<td align="center">
			<input type="datetime" id="exampleVII" name="date1" class='datepicker' size="20" > ถึงวันที่
			<input type="datetime" id="exampleVII" name="date2" class='datepicker' size="20" >

		</td>
		<td align="center">
<INPUT TYPE="submit" value="ทำการพิมพ์">

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