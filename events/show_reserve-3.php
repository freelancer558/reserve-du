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
<link href="table1.css" rel="stylesheet" type="text/css" />
<link href="styles_menu.css" rel="stylesheet" type="text/css">

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

 

<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM reserve WHERE ID = '".$_GET["id"]."' ";
$objQuery = mysql_query($strSQL);
mysql_query("SET NAMES UTF8");
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found ID=".$_GET["id"];
}
else
{
?>


<table width="660" border="0"  id="box-table-a">
<form  action="show_reserve-4.php?id=<?php echo $_GET["id"];?>"  name="frmEdit" method="post">
  <tr >
<td colspan="2"> <div id="head_content">
	แก้ไขรายการจอง</div></td>
</tr>

  <tr>
  <td align="right">สถานะ :</td>
<td width="500">        
              <select name="event_status" data-id="<?php echo $objResult["id"]; ?>">
                <option value="pending" <?php if($objResult['status'] == 'pending') echo "selected='selected'"; ?>>รอการอนุมัติ</option>
                <option value="approved" <?php if($objResult['status'] == 'approved') echo "selected='selected'"; ?>>อนุมัติ</option>
                <option value="reject" <?php if($objResult['status'] == 'reject') echo "selected='selected'"; ?>>ไม่อนุมัติ</option>
              </select>
  </td>

    <tr><td width="150"> <div align="right">รายละเอียด :</div></td>
	    <td align="left" width="300" ><textarea name="detail" cols="40" rows="8"></textarea>*กรุณากรอกรายละเอียด</td>
</tr>

<input type="hidden" name="country" value="Norway">
<INPUT TYPE="hidden" NAME="group_id"  value="<?php echo $objResult["group_id"];?>" >

<tr><td colspan="2" align="center">
<a href="show_reserve-1.php"><IMG SRC="../images/back.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a> &nbsp; &nbsp;
<input type="image" name="submit" WIDTH="100" HEIGHT="30"src="../images/submit2.bmp"/>

</td></tr>
  
  </tr>



<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>





</div></td>   
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