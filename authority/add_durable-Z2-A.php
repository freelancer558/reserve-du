<?php include('h1.php'); ?>


<html>
<?php include_once "connDB.php"; ?>

<head>
<style type="text/css">
a{
text-decoration:none;
}
</style>

<META HTTP-EQUIV="Refresh"CONTENT="2;URL=add_durable-Z-show-A.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />


<title>Add DurableArticle</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>


</head>
<script type='text/javascript' language='javascript' src='date_time/prototype-1.js'></script>
<script type='text/javascript' language='javascript' src='date_time/prototype-date-extensions.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviour.js'></script>
<script type='text/javascript' language='javascript' src='date_time/datepicker.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviors.js'></script>



<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



	<form name="form1" method="post" action="add_durable-Z2-A.php" enctype="multipart/form-data">
<table width="600" border="0">
  <tr> 
<?php 
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../myfile/".$_FILES["filUpload"]["name"]))
	{
		echo "Upload Picture Complete<br>";

		//*** Insert Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");
		$strSQL = "INSERT INTO durablearticle ";
		$strSQL .="(DurableArticleSetId,
		DurableArticleNumber,
		DurableArticleThaiName,
		DurableArticleEnglishName,
		DurableArticleVersion,
		DurableArticleDetail,
		DurableArticlePic,
		DurableArticleStatus,
		DurableArticleVouchDate,
		DuarableArticleCompanyId) ";
$strSQL .="VALUES ";
$strSQL .= "('".$_POST["DurableArticleSetId"]."',
		'".$_POST["DurableArticleNumber"]."',
		'".$_POST["DurableArticleThaiName"]."' ";
$strSQL .= ",'".$_POST["DurableArticleEnglishName"]."',
		'".$_POST["DurableArticleVersion"]."',
		'".$_POST["DurableArticleDetail"]."',
		'".$_FILES["filUpload"]["name"]."' ";
$strSQL .= " ,'".$_POST["DurableArticleStatus"]."',
		'".$_POST["DurableArticleVouchDate"]."',
		'".$_POST["DuarableArticleCompanyId"]."' )";

		$objQuery = mysql_query($strSQL);		
	}
?>
<a href="add_durable-Z-show-A.php">Save Compete <br> หากไม่มีการเปลี่ยนหน้าอัตโนมัติ  <br> กรุณาคลิกที่นี้</a>
</tr></table>







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