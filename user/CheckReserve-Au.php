 <?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
		echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}

	if($_SESSION['UserStatus'] != "user")
	{
		echo "This page for user only!";
		echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}	
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<?php


	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	@mysql_query("SET NAMES UTF8");
?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ตรวจสอบสถานะการจอง</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<style type="text/css">
a{
text-decoration:none;
}
</style>
</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('headbar.php'); ?>

  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>ข้อมูล ผู้ใช้</center></div></td>
    
    
 <td width="900" rowspan="8" align="center" valign="top">   <div id="content">




<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM reserve WHERE user_id = '".$_SESSION['UserId']."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 10;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by group_id DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>


<table width="900" border="0"  id="box-table-a">
  <tr>
<td colspan="9"> <div id="head_content">
	  รายการจองของคุณ </div></td>
</tr>
  <tr>
    <th width="190"> <div align="center">หมายเลขการจอง </div></th>
    <th width="150"> <div align="center">ผู้จอง </div></th>
    <th width="350"> <div align="center">วันที่จอง </div></th>
    <th width="350"> <div align="center">เวลาสิ้นสุด </div></th>
    <th width="300"> <div align="center">เครื่องมือที่ </div></th>
	    <th width="150"> <div align="center">สถานะ </div></th>
    <th width="300"> <div align="center">รายละเอียด </div></th
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["ID"];?></div></td>

	
	
<?php
$facid = $objResult["user_id"];
	$strSQL2 = "SELECT UserName FROM user WHERE UserId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<td><div align="center"><?php echo $objResult2["UserName"];?></div></td>
<?php
	}
	?>
	
	

    <td align="center"><?php echo$objResult["Date"];?></td>
    <td><div align="center"><?php echo $objResult["end_date"];?></div></td>
    <td align="center">

	<?php echo $objResult["DurableArticleSet"];?>
	
	</td>
	    <td align="center">
				<?php $objResult["status"]; ?>
             <?php if($objResult['status'] == 'pending') {echo รอการอนุมัติ ;} else 
			 if($objResult['status'] == 'approved') { echo อนุมัติ ; } else
            if($objResult['status'] == 'reject') echo ไม่อนุมัติ; 
              ?>
		</td>
</td>

    <td align="left">

	<?php echo $objResult["Detail"];?>
	
	</td>

  </tr>
<?php
}
?>
</table>

<br><br>
Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}

?>



<?php
mysql_close($objConnect);
?>










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