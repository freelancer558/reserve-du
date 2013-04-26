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
<?php include_once "connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Page</title>
<link href="../text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />

<script src="smooth-php-cal.js" type="text/javascript"></script>
<link href="table1.css" rel="stylesheet" type="text/css" />
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal-min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
  $('.event_status').change(function(){
    var value   = $(this).val();
    var eid     = $(this).attr('data-id');
    var groupid = $(this).closest('tr').attr('data-group-id');

    $.post('update_event-show.php', {id: eid, group_id: groupid, status: value}, function(result){
      if(result.status) alert(result.msg);
    }, 'json').error(function(error) { console.log(error.responseText); })
  });
});
</script>


</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="../images/header.bmp" width="100%" height="100%" /></th>
  </tr>
  <tr>
    <th colspan="3" scope="col">
	<div id='navbar'>
<ul>
   <li><a href="../admin/admin_page1.php"><span>หน้าแรก</span></a></li>
   <li><a href="../admin/HowToReserve-A.php"><span>ระเบียบปฏิบัติ</span></a></li>
   <li><a href="index-1.php"><span>ตรวจสอบสถานะการใช้งาน</span></a></li>
</ul>
</div>
<div style="clear:both; margin: 0 0 1px 0;">&nbsp;</div>
	</th>
  </tr>



  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"><center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="80%" rowspan="8" align="center" valign="top">   

 <?php require_once('show_reserve-2.php'); ?>
<div id="content">

<?php
  $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
  $objDB = mysql_select_db("project");
  $strSQL = "SELECT * FROM user";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

  $month = (isset($_GET["m"]) && is_numeric($_GET["m"])) ? (int)$_GET["m"] : "";
  $year  = (isset($_GET["y"]) && is_numeric($_GET["y"])) ? (int)$_GET["y"] : "";

  if (strcmp($month, "") == 0 || strcmp($year, "") == 0)
  {
    $from  = time();
    $info  = getdate($from);
    $month = $info["mon"];
    $year  = $info["year"];
  }

  $from = mktime(0, 0, 0, $month, 1, $year);
  $to   = mktime(0, 0, 0, ($month + 1 == 13) ? 1 : $month + 1, 1, ($month + 1 == 13) ? $year + 1 : $year);

  ?>

  <div class="main-content" style="margin-top: 20px; width: 95%;">
    <div class="header" >
      <div class="hdrl"></div>
      <div class="hdrr"></div>
      <h2>การจอง <?php echo date('M Y', $from);?></h2>
    </div>
    <div class="block">
      <div class="navigation">
        <a href="show_reserve-1.php?y=<?php echo $year - 1; ?>&m=<?php echo $month; ?>">ปีก่อนหน้า</a>
        <a href="show_reserve-1.php?y=<?php echo ($month - 1 == 0) ? $year - 1 : $year; ?>&m=<?php echo ($month - 1 == 0) ? 12 : $month - 1; ?>">เดือนก่อนหน้า</a>
        <a href="show_reserve-1.php?y=<?php echo ($month + 1 == 13) ? $year + 1 : $year; ?>&m=<?php echo ($month + 1 == 13) ? 1 : $month + 1; ?>">เดือนถัดไป</a>
        <a href="show_reserve-1.php?y=<?php echo $year + 1; ?>&m=<?php echo $month; ?>">ปีถัดไป</a>
  <?php
      $currentMonthInfo = getdate(time());
  ?>

        <a href="show_reserve-1.php?y=<?php echo $currentMonthInfo["year"]; ?>&m=<?php echo $currentMonthInfo["mon"]; ?>">เดือนปัจจุบัน </a>
      </div>
  <?php

  $events = $calendar->listreserveByGroupId($from, $to);
  if (count($events) > 0)
  {
  ?>
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>ผู้ขอ</th>
            <th>วันที่จอง</th>
            <th>เวลา</th>
            <th>วันที่สิ้นสุดการจอง</th>
            <th>เวลาที่สิ้นสุดการจอง</th>
            <th>เครื่องมือวิทยาศาสตร์</th>
            <th>สถานะ</th>
			<th></th>
          </tr>
        </thead>
        <tbody>
  <?php 
    for($i = 0; $i < count($events); $i++)
    {
      $e    = $events[$i];
      $time = strtotime($e["date"]);
      $endDate= strtotime($e["end_date"]);
      // $reserved = "SELECT * FROM `project`.`reserve` WHERE (`Date` >= '" . date('Y-m-d', $time) . "' OR `end_date` >= '" . date('Y-m-d', $time) . "') AND (`Date` <= '" . date('Y-m-d', $endDate) . "' OR `end_date` <= '" . date('Y-m-d', $endDate) . "') AND `show` = 1 AND `status` = 'approved'";
      // $q = mysql_query($reserved) or die('DIE');
      // $row = mysql_num_rows($q);
  ?>
          <tr data-group-id="<?php echo $e['group_id'];?>">
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $e["fullname"]; ?>,</td>
            <td><?php echo date('M d, Y', $time); ?>,</td>
            <td><?php echo date('h:i A', $time); ?>,</td>
            <td><?php echo date('M d, Y', $endDate); ?>,</td>
            <td><?php echo date('h:i A', $endDate); ?>,</td>
            <td><?php echo $e["products"]; ?></td>
            <!-- <td><a href="events-edit.php?id=<?php echo $e["id"]; ?>" >edit</a></td> -->
            <td>
            <?php if($_SESSION['UserStatus'] == "ADMIN"){ ?>
		<?php $e["id"]; ?>
             <?php if($e['status'] == 'pending') {echo รอการอนุมัติ ;} else 
			 if($e['status'] == 'approved') { echo อนุมัติ ; } else
            if($e['status'] == 'reject') echo ไม่อนุมัติ; 
              ?>

<!--               <a href="events-delete.php?group_id=<?php echo $e["group_id"]; ?>" class="btn" style="margin-bottom:10px;" >ลบออกจากหน้าจอ</a> -->
            <?php }else{
              // if($row>0 && $e['status'] != 'approved'){
              //   echo "มีการจองอุปกรณ์ในช่วงเวลานี้แล้ว";
              // }else{
                echo $e['status'];                
              // }
            } ?>
            </td>
<td><a href="show_reserve-3.php?id=<?php echo $e["id"];?>" >แก้ไข </a></td>

          </tr>
  <?php
    }
  ?>
        </tbody>
      </table>
  <?php 
  }
  else
  {
  ?>
      <p class="message error">ไม่มีคำขอการจอง<?php echo date('M Y', $from); ?></p>
  <?php
  }
  ?>
    </div>
    <div class="bdrl"></div>
    <div class="bdrr"></div>
  </div>
</div>
</td>   
  </tr>
  
 <tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="../check_login.php">
  <table border="0" style="width: 210px">
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
 <a href="../admin/edit_profile.php">แก้ไขข้อมูลส่วนตัว</a><br>
 <INPUT TYPE="button" VALUE="LogOut" ONCLICK="window.location.href='../logout.php'" class="btn"><br>
</form></td>
  </tr>


 <tr class="do-not-print">
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar">
	<center>เครื่องมือวิทยาศาสตร์</center></td>
  </tr>
  <tr class="do-not-print"><td>
<div id='cssmenu'>
<ul>
   <li>
  <a href="../admin/AllDurable-A.php"><span>เครื่องมือวิทยาศาสตร์ที่มีทั้งหมด</span></a></li>
   <li>
  <a href="../admin/SearchDurable-A.php"><span>ค้นหาเครื่องมือวิทยาศาสตร์</span></a></li>
	</center></td>
  </tr>



 <tr class="do-not-print">
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar">
	<center>การจอง</center></td>
  </tr>
  <tr class="do-not-print"><td>
<div id='cssmenu'>
<ul>
    <li>
	<a href="events.php"><span>อนุมัติการจอง</span></a></li>
	    <li>
	<a href="index1.php"><span>ตรวจสอบสถานะการใช้งาน</span></a></li>
	<li>
	<a href="show_reserve-1.php"><span>เปลี่ยนแปลงสถานะการจอง</span></a></li>
	</center></td>
  </tr>


 <tr class="do-not-print">
    <td BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>การจัดการพื้นฐาน</center> </div></td>
  </tr>


  <tr class="do-not-print"><td>
<div id='cssmenu'>

 <ul>
   <li class='has-sub '><a href='#'><span>จัดการข้อมูลพื้นฐาน</span></a>
      <ul>
	  <li><a href='../admin/add_user-A.php'><span>ผู้ใช้</span></a>
         </li>
         <li><a href='../admin/durablearticleset-A.php'><span>เครื่องมือวิทยาศาสตร์</span></a>
         </li>
         <li><a href='../admin/add_durable-Z-show-A.php'><span>เครื่องมือประกอบ</span></a>
         </li>

               <li><a href='../admin/add_faculty-A.php'><span>คณะ</span></a></li>
               <li><a href='../admin/add_department-A.php'><span>ภาควิชา</span></a></li>

		<li><a href='../admin/procurement-A.php'><span>หมวดเงิน</span></a>
         </li>

         <li><a href='../admin/company-A.php'><span>บริษัท</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>ซ่อมบำรุงเครื่องมือ</span></a>
   <ul>
               <li><a href='../admin/show_maintenance-A.php'><span>รายการแจ้งซ่อมทั้งหมด</span></a></li>
               <li><a href='../admin/add-maintenance3-A.php'><span>เพิ่มรายการแจ้งซ่อม</span></a></li>
			   <li><a href='../admin/add-maintenance.php'><span>เพิ่มเติมรายละเอียดหลังได้รับเครื่องมือ</span></a></li>
	</ul>
   </li>
         <li><a href='../admin/apply_user.php'><span>อนุมัติผู้ใช้</span></a></li>


      <li class='has-sub '><a href='#'><span>ออกรายงาน</span></a>
   <ul>
               <li><a href='../admin/report-A.php'><span>จากเครื่องมือทั้งหมด</span></a></li>
               <li><a href='../admin/report-3-A.php'><span>จากการเลือกเครื่องมือ</span></a>
			   </li>
	</ul>
   </li>


		 <li><a href='../admin/contact.php'><span>ติดต่อเจ้าหน้าที่</span></a></li>
<li class='has-sub '><a href='#'><span>ข่าวสาร</span></a>
   <ul>
               <li><a href='../admin/News1.php'><span>เพิ่มข่าวสาร</span></a></li>
               <li><a href='../admin/News3.php'><span>ดูข่าวทั้งหมด</span></a></li>
	</ul>
   </li>



      <li class='has-sub '><a href='#'><span>การแจ้งซ่อมจากผู้ใช้</span></a>
   <ul>
               <li><a href='../admin/userRepairing-A.php'><span>การแจ้งซ่อมจากผู้ใช้</span></a></li>
               <li><a href='../admin/userRepairing-4-A.php'><span>การแจ้งซ่อมจากผู้ใช้ที่ยืนยันแล้ว</span></a></li>
			   <li><a href='../admin/userRepairing-6-A.php'><span>การแจ้งซ่อมทั้งหมด</span></a></li>
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