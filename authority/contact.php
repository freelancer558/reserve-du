<?php include('h1.php');?>

<html>
<?php include_once "connDB.php"; ?>

<head>
<style type="text/css">
a{
text-decoration:none;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Add Contact</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
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
<form action="add_durable_save-A.php?UseId=<?php echo $_GET["DruId"];?>" name="frmEdit" method="post">

<?php include('h2.php');?>
    
 <td width="900" rowspan="20" align="center" valign="top"> <div id="content">

<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	$strSQL = "SELECT * FROM contact";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<?php //*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM contact ";
	$strSQL .="WHERE Id = '".$_GET["Id"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Delete [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}


$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM contact ";
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

$strSQL .=" order  by Id ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>


<table width="900" border="0" id="box-table-a" >
 <tr>
<td colspan="7"> <div id="head_content">
	  ข้อมูลการติดต่อเจ้าหน้าที่</div></td>
</tr>

<tr >
<th width="130"> <div align="center"> หมายเลขข้อมูล</div></th>
<th width="120"> <div align="center">ชื่อเจ้าหน้าที่</div></th>
<th width="100"> <div align="center">อีเมล์</div></th>
<th width="300"> <div align="center">ที่อยู่</div></th>
<th width="100"> <div align="center"></div>หมายเลขโทรศัพท์</th>
<th width="100"> <div align="center"></div>หมายเลขแฟกซ์</th>
<th width="50"><a href="contact-3.php"> <img src="images/add.png" border="0"></center></a></th>
</tr>
<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
?>
<tr>
<td><div align="center"><?php echo $objResult["Id"];?></div></td>
<td><center><?php echo $objResult["Name"];?></center></td>
<td><center><?php echo $objResult["Email"];?></center></td>
<td><center><?php echo $objResult["Address"];?></center></td>
<td><center><?php echo $objResult["phone1"];?>,<?php echo $objResult["phone2"];?></center></td>
<td><center><?php echo $objResult["PhoneFax"];?></center></td>
<td><center><a href="contact-2.php?Id=<?php echo $objResult["Id"];?>">แก้ไข</a></center></td>

<td align=""><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&Id=<?php echo $objResult["Id"];?>';}">ลบ</a></td>
</tr>
<?php
	}
?>
</table>
<br><br><br>
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






<?php include('footer2.php');?>
</body>
</html>