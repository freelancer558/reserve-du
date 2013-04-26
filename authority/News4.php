<?php include('h1.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Authority Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
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


<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM news WHERE NewsId = '".$_GET["NewsId"]."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>
	<form name="form1" method="post" action="News5.php?NewsId=<?php echo $_GET["NewsId"];?>" enctype="multipart/form-data">

	<table width="600" border="0"  id="box-table-a"><br><br>
	<tr>
	<tr><td>
	หัวข้อ : </td><td>
	<textarea name="txtHead" rows="1" cols="50" ><?php echo $objResult["NewsHeader"];?></textarea><br><br></td>
	</tr>

<tr><td>
	รายละเอียด : </td><td>
	<textarea name="txtDe"rows="5" cols="50"><?php echo $objResult["NewsDetail"];?></textarea>
<br><br></td>
	</tr>

	<tr><td>	รูปภาพ :</td>
	<td><img src="../myfile/<?php echo $objResult["NewsPic"];?>"  width="150" height="100"><br>
	
	
<input type="file" name="filUpload"><br>
	
<input type="hidden" name="hdnOldFile" value="<?php echo $objResult["NewsPic"];?>">
<br><br><br>
	<input name="btnSubmit" type="submit" value="Submit">	</td>
	</form>
	</tr>

</tr>
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