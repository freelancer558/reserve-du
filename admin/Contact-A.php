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
	$objResult = mysql_fetch_array($objQuery);
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ติดต่อเจ้าหน้าที่</title>
<link href="text1.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
background: -webkit-gradient(linear, left top, left bottom, from(#EEEEEE), to(#FFFFFF));
}
a:link {
	color: #000;
}
a:hover {
	color: #F00;
}
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
    <a href="admin_page1.php">หน้าแรก</a> |
	<a href="HowToReserve-A.php">ระเบียบปฏิบัติ</a> |
<a href="../events/index1.php">ตรวจสอบสถานะการใช้งาน</a> 
	</div></th>
  </tr>
  <tr>
    <td width="15%" BGCOLOR="#FFFF99" style="color:#330000"><center>ข้อมูล Admin</center></td>
    
    <td width="80%" rowspan="8"  align="center" valign="top"><center>
<table  align="center"  valign="center" border="0" width="60%">ติดต่อเจ้าหน้าที่<br><tr><td>
	ที่ตั้ง :	หน่วยงานนิติวิทยาศาสตร์ หลักสูตรวิทยาศาสตร์มหาบัณฑิต <br>
คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น <br>
โทรศัพท์ :		088-3110000 <br>
	แฟกซ์ :		043-222222  <br>
	โทรศัพท์มือถือ :	083-654845<br>
</td></tr>
	</table>


</center></td>   
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







  <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar">
	<center>เครื่องมือวิทยาศาสตร์</center></td>
  </tr>
  <tr><td>
<div id='cssmenu'>
<ul>
   <li>
  <a href="AllDurable-A.php"><span>เครื่องมือวิทยาศาสตร์ที่มีทั้งหมด</span></a></li>
   <li>
  <a href="SearchDurable-A.php"><span>ค้นหาเครื่องมือวิทยาศาสตร์</span></a></li>
	</center></td>
  </tr>



 <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar">
	<center>การจอง</center></td>
  </tr>
  <tr><td>
<div id='cssmenu'>
<ul>
    <li>
	<a href="../events/events.php"><span>อนุมัติการจอง</span></a></li>
	    <li>
	<a href="../events/index1.php"><span>ตรวจสอบสถานะการใช้งาน</span></a></li>
	</center></td>
  </tr>


 <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>การจัดการพื้นฐาน</center> </div></td>
  </tr>


  <tr><td>
<div id='cssmenu'>

 <ul>
   <li class='has-sub '><a href='#'><span>จัดการข้อมูลพื้นฐาน</span></a>
      <ul>
	  <li><a href='add_user-A.php'><span>ผู้ใช้</span></a>
         </li>
         <li><a href='durablearticleset-A.php'><span>เครื่องมือวิทยาศาสตร์</span></a>
         </li>
         <li><a href='add_durable-Z-show-A.php'><span>เครื่องมือประกอบ</span></a>
         </li>

               <li><a href='add_faculty-A.php'><span>คณะ</span></a></li>
               <li><a href='add_department-A.php'><span>ภาควิชา</span></a></li>
			   <li><a href='add_branch-A.php'><span>สาขา</span></a></li>

		<li><a href='procurement-A.php'><span>หมวดเงิน</span></a>
         </li>

         <li><a href='company-A.php'><span>บริษัท</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>ซ่อมบำรุงเครื่องมือ</span></a>
   <ul>
               <li><a href='show_maintenance-A.php'><span>รายการแจ้งซ่อมทั้งหมด</span></a></li>
               <li><a href='add-maintenance3-A.php'><span>เพิ่มรายการแจ้งซ่อม</span></a></li>
			   <li><a href='add-maintenance.php'><span>เพิ่มเติมรายละเอียดหลังได้รับเครื่องมือ</span></a></li>
	</ul>
   </li>
         <li><a href='apply_user.php'><span>อนุมัติผู้ใช้</span></a></li>

<li class='has-sub '><a href='#'><span>ข่าวสาร</span></a>
   <ul>
               <li><a href='News1.php'><span>เพิ่มข่าวสาร</span></a></li>
               <li><a href='News3.php'><span>ดูข่าวทั้งหมด</span></a></li>
	</ul>
   </li>



      <li class='has-sub '><a href='#'><span>การแจ้งซ่อมจากผู้ใช้</span></a>
   <ul>
               <li><a href='userRepairing-A.php'><span>การแจ้งซ่อมจากผู้ใช้</span></a></li>
               <li><a href='userRepairing-4-A.php'><span>การแจ้งซ่อมจากผู้ใช้ที่ยืนยันแล้ว</span></a></li>
			   <li><a href='userRepairing-6-A.php'><span>การแจ้งซ่อมทั้งหมด</span></a></li>
	</ul>
   </li>
</div>
</td>
</tr>




  <tr>
    <td ><center><br><br><br><br><br></center></td>
  </tr>
  <tr>
    <td BGCOLOR="DDDDDD"><center>

    </center></td>
  </tr>
  <tr>
    <td colspan="3"><center>	<div id="footer">
		: : ระบบจองเครื่องมือวิทยาศาสตร์ออนไลน์ : : <br> ภาควิชานิติวิทยาศาสตรมหาบัณฑิต คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</div></center></td>
  </tr>
</table>
</body>
</html>