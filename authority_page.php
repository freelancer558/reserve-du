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
<link href="text1.css" rel="stylesheet" type="text/css" />
<style type="text/css">

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
  <tr>
    <th colspan="3" scope="col">
    <div id="navbar">	
    <a href="authority_page.php">หน้าแรก</a> |
	<a href="HowToReserve-Au.php">ระเบียบปฏิบัติ</a> |
		<a href="CheckTimeReserve-Au.php">ตรวจสอบเวลาว่างของอุปกรณ์</a> |
		<a href="Contact-Au.php">ตรวจสอบการติดต่อจากผู้ใช้</a> 
	</div></th>
  </tr>


  <tr>
    <td width="15%" BGCOLOR="#FFFF99" style="color:#330000"><center>ข้อมูล เจ้าหน้าที่</center></td>
    
 <td width="80%" rowspan="8" align="center" valign="top">  
 
 หน้าแรก
 
 <div id="content">


</div></td>   
  </tr>
  
  <tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="check_login.php">
  <table border="0" style="width: 250px">
    <tbody>
      <tr>
        <td>Username :</td>
        <td><?php echo $objResult["UserName"];?>
        </td>
      </tr>
      <tr>
        <td>Name : </td>
        <td><?php echo $objResult["UserFullname"];?>
        </td>
      </tr>
    </tbody>
  </table>
 <a href="edit_profile.php">แก้ไขข้อมูลส่วนตัว</a><br>
 <INPUT TYPE="button" VALUE="LogOut" ONCLICK="window.location.href='logout.php'"><br>
</form></td>
  </tr>
  
  <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000" ><center>เครื่องมือวิทยาศาสตร์</center></td>
  </tr>
  <tr>
    <td BGCOLOR="DDDDDD">
<br>
      <a href="AllDurable-Au.php">&nbsp;&nbsp;แสดงรายการเครื่องมือ</a><br>
      <a href="SearchDurable-Au.php">&nbsp;&nbsp;อนุมัติการจอง</a><br>
<br>
 </td>
  </tr>
  <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000"><center>Tools</center></td>
  </tr>
  <tr>
    <td BGCOLOR="DDDDDD">
 <a href="edit_databasic-Au.php">&nbsp;&nbsp;จัดการข้อมูลเบื่องต้น</a><br>
      <a href="report-Au.php">&nbsp;&nbsp;ออกรายงาน</a><br>
    <a href="userRepairing-Au.php">&nbsp;&nbsp;การแจ้งซ่อมจาก User</a><br>
    <a href="Repairing-Au.php">&nbsp;&nbsp;ส่งซ่อม</a>
   <br><br>
    </center></td>
  </tr>
  <tr>
    <td ><center></center></td>
  </tr>
  <tr>
    <td BGCOLOR="DDDDDD"><center>

    </center></td>
  </tr>
  <tr>
    <td colspan="3"><center>	<div id="footer">
		: : ระบบจองอุปกรณ์วิทยาศาสตร์ออนไลน์ : : <br> ภาควิชานิติวิทยาศาสตรมหาบัณฑิต คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</div></center></td>
  </tr>
</table>
</body>
</html>
