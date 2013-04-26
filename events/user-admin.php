 <tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="../check_login.php">
  <table border="0" style="width: 210px">
  <tbody>
      <tr  >
        <td><FONT SIZE="2" COLOR="">Username :</FONT></td>
        <td><FONT SIZE="2" COLOR=""><?php echo $objResult["UserName"];?></FONT>
        </td>
      </tr>
      <tr>
        <td><FONT SIZE="2" COLOR="">Name : </FONT></td>
        <td><FONT SIZE="2" COLOR=""><?php echo $objResult["UserFullname"];?></FONT>
        </td>
      </tr>
    </tbody>
  </table><br>
<a href="../admin/edit_profile.php"><IMG SRC="../images/edit_profile.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a> &nbsp; &nbsp;

<a href="../admin/edit_password.php"><IMG SRC="../images/password.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a>
<br><br>
<a href="../admin/logout.php"><IMG SRC="../images/logout.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a>
<br>
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