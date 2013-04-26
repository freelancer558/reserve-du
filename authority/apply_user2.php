<?php include('h1.php'); ?>


<html>
<?php include_once "connDB.php"; ?>

<head>
<style type="text/css">
a{
text-decoration:none;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile User</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="table1.css" rel="stylesheet" type="text/css">
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
    
 <td width="80%" rowspan="8" align="center" valign="top"> <div id="content">

<form action="apply_user3.php?UseId=<?php echo $_GET["UseId"];?>" name="frmEdit" method="post" onSubmit="JavaScript:return fncSubmit();">

<?php
$strSQL = "SELECT * FROM user WHERE UserId = '".$_GET["UseId"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
@mysql_query("SET NAMES UTF8");
if(!$objResult)
{
	echo "Not found UseId=".$_GET["UseId"];
}
else
{
?>


<table width="650" border="0"  id="box-table-a">
 
   <tr>
<td colspan="2"> <div id="head_content">
	  คำร้องขอ ใช้ระบบ ของ :&nbsp;<?php echo $objResult["UserFullname"];?></div></td>
</tr>
  
  <tr>
<form action="apply_user3.php?UseId=<?php echo $_GET["UseId"];?>" name="Submit3" method="post">


<tr>
    <th width="180"> <div align="left">ชื่อผู้ใช้ :</div></th>
<td><?php echo $objResult["UserName"];?></td>
</tr>

<tr>
    <th width="50"><br> <div align="left">ชื่อ-นามสกุล :</div></th>		  
	 <td><br><?php echo $objResult["UserFullname"];?>
	</td>
	</tr>

<tr>
	<th width="30"> <br><div align="left">เพศ :</div></th>
<td align=""><br><?php echo $objResult["UserSex"];?>
</tr>

<tr>
    <th width="90"><br> <div align="left">ที่อยู่ :</div></th>
<td><br><?php echo $objResult["UserAddress"];?>
</tr>

<tr>
	    <th width="100px"><br> <div align="left">หมายเลขโทรศัพท์ :</div></th>
<td align=""><br><?php echo $objResult["UserPhone"];?>
</tr>

<tr>
    <th width="30"> <br><div align="left">อีเมล์ :</div></th>
<td align=""><br><?php echo $objResult["UserEmail"];?>
</tr>

<tr>
    <th width="30"><br> <div align="left">รหัสประจำตัวประชาชน :</div></th>
<td align=""><br><?php echo $objResult["UserSSID"];?>
</tr>

<tr>
	    <th width="20"><br> <div align="left">สถานะ :</div></th>

<td align=""><br>
<SELECT NAME="txtEditUserStatus" >
	<OPTION VALUE="user" SELECTED>ผู้ใช้
	<OPTION VALUE="authority">เจ้าหน้าที่
	<OPTION VALUE="authority-apply">เจ้าหน้าที่มีสิทธิ์อณุมัติ
	<OPTION VALUE="ADMIN">ผู้ดูแลระบบ
</SELECT>&nbsp;*
</td>
</tr>

<tr>
    <th width="20"><br> <div align="left">คณะ :</div></th>
	
<?php
$facid = $objResult["FacultyId"];
	$strSQL2 = "SELECT FacultyThaiName FROM faculty WHERE FacultyId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<td><br><div align=""><?php echo $objResult2["FacultyThaiName"];?></div></td>
<?php
	}
	?>

	</tr>

<tr>
    <th width="20"><br> <div align="left">ภาควิชา :</div></th>
<?php
$depid = $objResult["DepartmentId"];
	$strSQL3 = "SELECT DepartmentThaiName FROM department WHERE DepartmentId =' ".$depid." ' ";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	while($objResult3 = mysql_fetch_array($objQuery3))
	{
	?>
    <td align=""><br><?php echo $objResult3["DepartmentThaiName"];?></td>
<?php
	}
	?>
</tr>

<tr>
	    <th width="20"> <br><div align="left">รายละเอียด :</div></th>
<td><br><?php echo $objResult["Detail"];?>
</tr>

</tr>
  </table>
<br>
<input type="image" name="submit3" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>
&nbsp;&nbsp;

<a href="apply_user4.php?UseId=<?php echo $objResult["UserId"];?>"><IMG SRC="../images/no-apply.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a> 


  <?php
  }
  mysql_close($objConnect);
  ?>
  </form>

</div>




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