<?php include('h1.php'); ?>


<html>
<?php include_once "connDB.php"; ?>

<head>
<style type="text/css">
a{
text-decoration:none;
}
</style>

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

<body>
<form action="add_durable-Z4-A.php?UseId=<?php echo $_GET["DruId"];?>" name="frmEdit" method="post">

<?php include('h2.php'); ?>
    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



<?php

		//*** Update Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");

		$strSQL = "UPDATE  durablearticle SET";
		$strSQL .=" DurableArticleSetId = '".$_POST["DurableArticleSetId"]."' ";

		$strSQL .=" ,DurableArticleNumber = '".$_POST["DurableArticleNumber"]."' ";
		
		$strSQL .=" ,DurableArticleThaiName = '".$_POST["DurableArticleThaiName"]."' ";
		
		$strSQL .=" ,DurableArticleEnglishName = '".$_POST["DurableArticleEnglishName"]."' ";
		
		$strSQL .=" ,DurableArticleVersion = '".$_POST["DurableArticleVersion"]."' ";		
		
		$strSQL .=" ,DurableArticleDetail = '".$_POST["DurableArticleDetail"]."' ";
		
		$strSQL .=" ,DurableArticleStatus = '".$_POST["DurableArticleStatus"]."' ";
		
		$strSQL .=" ,DurableArticleVouchDate = '".$_POST["DurableArticleVouchDate"]."' ";
		
		$strSQL .=" ,DuarableArticleCompanyId = '".$_POST["DuarableArticleCompanyId"]."' ";
	

		
		$strSQL .="WHERE DurableArticleId = '".$_GET["DurableArticleId"]."' ";

		$objQuery = mysql_query($strSQL);		
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../myfile/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("../myfile/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE durablearticle ";
			$strSQL .=" SET DurableArticlePic = '".$_FILES["filUpload"]["name"]."' WHERE DurableArticleId = '".$_GET["DurableArticleId"]."' ";
			$objQuery = mysql_query($strSQL);		

			echo "Copy/Upload Complete<br>";

		}
	}
?>
<a href="add_durable-Z-show-A.php">update compete</a>









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