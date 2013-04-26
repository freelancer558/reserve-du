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
	@mysql_query("SET NAMES UTF8");
?>


<html>
<?php include_once "../connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Authority Page</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="../text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.print.css' media='print' />

<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script type='text/javascript' src='../fullcalendar/fullcalendar.js'></script>
<script type="text/javascript" src="../jquery/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui-sliderAccess.js"></script>

<style>
A{text-decoration:none}
#new_event{ display: none; width: 460px; margin: 0 auto;}
.eastern, .western { overflow: hidden;}

.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }

.ui-timepicker-rtl{ direction: rtl; }
.ui-timepicker-rtl dl { text-align: right; }
.ui-timepicker-rtl dl dd { margin: 0 65px 10px 10px; }

body {

  text-align: center;
  font-size: 14px;
  font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  }
  
#loading {
  position: absolute;
  top: 5px;
  right: 5px;
  }

#calendar {
  width: 900px;
  margin: 0 auto;
  }
A{text-decoration:none}
#new_event{ display: none; width: 460px; margin: 0 auto;}
.eastern, .western { overflow: hidden;}

.fc-event-skin[data-status=pending], .fc-event-skin[data-status=pending] .fc-event-skin {
  background-color: orange;
  border-color: orange;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
  $('#addmore_product').click(function(e){
    e.preventDefault();
    var lastValue = $('.product :selected').last().val();
    var productClone = $('.product').css('margin-bottom', '10px').last().clone();
    productClone.insertAfter($('.product').last());
    
    $('.product :last option').each(function(){
      if($(this).val() == lastValue) $(this).remove();
    });
    if($('.product :last option').size() == 1) $(this).hide();
  });

  $('#calendar').fullCalendar({
    
      editable: false,
      
      events: "json-events.php?filter=<?php echo isset($_GET['filter']) ? $_GET['filter'] : ''; ?>",
      
      eventDrop: function(event, delta) {
        alert(event.title + ' was moved ' + delta + ' days\n' +
          '(should probably update your database)');
      },
      
      loading: function(bool) {
        if (bool) $('#loading').show();
        else $('#loading').hide();
      },

      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
        var d = new Date(start);
        var date = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        var hour = date.getHours();
        var minute = date.getMinutes();
        var second = date.getSeconds();

        var output = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day + ' ' + hour + ':' + minute;
        
        window.location = 'events-create.php?start_at='+ output + "<?php echo (isset($_GET['filter'])) ? '&filter='.$_GET['filter'] : ''; ?>";
      },
      
      eventAfterRender : function( event, element, view ) { 
        element.attr({'data-id': event.id, 'data-status' : event.status});
      },

      eventClick: function(calEvent, jsEvent, view) {

        alert(calEvent.full_title);
        // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        // alert('View: ' + view.name);

        // change the border color just for fun
        // $(this).css('border-color', 'red');

      }
    });

  // var startDateTextBox = $('.start_datetime');
  // var endDateTextBox = $('.end_datetime');

  // startDateTextBox.datetimepicker({ 
  //   minDate: 0,
  //   dateFormat: "yy-mm-dd",
  //   onClose: function(dateText, inst) {
  //     if (endDateTextBox.val() != '') {
  //       var testStartDate = startDateTextBox.datetimepicker('getDate');
  //       var testEndDate = endDateTextBox.datetimepicker('getDate');
  //       if (testStartDate > testEndDate)
  //         endDateTextBox.datetimepicker('setDate', testStartDate);
  //     }
  //     else {
  //       endDateTextBox.val(dateText);
  //     }
  //   },
  //   onSelect: function (selectedDateTime){
  //     endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
  //   }
  // });
  // endDateTextBox.datetimepicker({
  //   dateFormat: "yy-mm-dd",
  //   onClose: function(dateText, inst) {
  //     if (startDateTextBox.val() != '') {
  //       var testStartDate = startDateTextBox.datetimepicker('getDate');
  //       var testEndDate = endDateTextBox.datetimepicker('getDate');
  //       if (testStartDate > testEndDate)
  //         startDateTextBox.datetimepicker('setDate', testEndDate);
  //     }
  //     else {
  //       startDateTextBox.val(dateText);
  //     }
  //   },
  //   onSelect: function (selectedDateTime){
  //     startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
  //   }
  // });
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
    <div id="navbar">	
<ul>
   <li><a href="../authority/authority_page.php"><span>หน้าแรก</span></a></li>
   <li><a href="../authority/HowToReserve-A.php"><span>ระเบียบปฏิบัติ</span></a></li>
   <li><a href="index.php"><span>ตรวจสอบสถานะการใช้งาน</span></a></li>
</ul>
	</div>
	<div style="clear:both; margin: 0 0 1px 0;">&nbsp;</div></th>
  </tr>


  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar">	<center>ข้อมูล เจ้าหน้าที่</center></td>
    
 <td width="80%" rowspan="8" valign="top">  

  <?php if(!empty($_POST)) require_once('smoothcalendar.php'); ?>

 <div id="content">
    <div class="main-content" style="width:500px;margin:0 auto;">
    <div class="header" >
      <div class="hdrl"></div>
      <div class="hdrr"></div>
      <h2>ทำการจอง</h2>
    </div>
  <div class="block">

<?php
  if (isset($_POST["event"]))
  {
    $DurableArticleSet = [];
    $date = new DateTime();
    $timestamp = $date->getTimestamp();

    for($i=0; $i<count($_POST["event"]['DurableArticleSet']); $i++){
      if(!empty($_POST["event"]['DurableArticleSet'][$i])) array_push($DurableArticleSet, $_POST["event"]["DurableArticleSet"][$i]);
    }
    
    $eventtime   = $_POST['start_datetime']; 
    
    $end_eventtime   = $_POST['end_datetime']; 

    if (strcmp($eventtime, "") == 0)
        {
      ?>        
      <p class="message error">
        Event time or date were invalid
      </p>
      <?php
        }
        elseif((strtotime($eventtime) > $timestamp || strtotime($end_eventtime) < $timestamp) || (strtotime($eventtime) > strtotime($end_eventtime)))
        {
      ?>
      <p class="message error">
        Cannot select older than current datetime.
      </p>
      <?php
        }
        else
        {
          $result = $calendar->createEvent(array("date" => $eventtime, "content" => $DurableArticleSet, "end_date" => $end_eventtime, "group_id" => $timestamp));       
          
          if (isset($result["error"]))
          {
      ?>        
      <p class="message error">
        <?php echo $result["error"]; ?>
      </p>
        
      <?php
          }
          else
          {
      ?>        
      <p class="message">
        <?php echo $result['message']; ?>
      </p>
        
      <?php
          }
        }
      } 

        $currentYearInfo = getdate(time());
      ?>      
    <form method="POST" action="index.php" >
      <div class="western">
        <p>
        <h3>เครื่องมือ <a href="#" id="addmore_product">+ เพิ่มเครื่องมือ</a></h3>
              <!-- <br/> -->
         <div class="product" align="right" style="margin-right: 110px;clear: none;"> 
              <?php
                $sql = 'SELECT DurableArticleSetId, DurableArticleSetThaiName, DurableArticleSetEnglishName FROM durablearticleset';
                $q = mysql_query($sql) or die(mysql_error());
                ?>
                <select name="event[DurableArticleSet][]" class="setname">
                <?php
                while($tools = mysql_fetch_assoc($q)){
                ?>
                  <option value="<?php echo $tools['DurableArticleSetEnglishName'];?>" <?php echo (isset($_GET['filter']) && $_GET['filter'] == $tools['DurableArticleSetEnglishName']) ? 'selected' : ''; ?> ><?php echo $tools['DurableArticleSetEnglishName'];?></option>
                <?php
                }
                ?>
                </select>
                <?php
              ?>
            </div>
        </p>
      </div><!-- <br><br><br> -->
      <div class="eastern" style="margin-top: 10px;clear: none;">
            <h3>เริ่ม วันที่</h3>
            <p style="float:left;">
              <label>วันที่ และ เวลา <em>(yyyy-mm-dd)</em></label>
              <!-- <br/> -->
              <input type="text" class="start_datetime" name="start_datetime" value="<?php echo isset($_GET['start_at']) ? $_GET['start_at'] : ''; ?>">
            </p>
          </div>
          <div class="clearfix"></div>
          <div class="eastern" style="width:460px;margin-top: 10px;">
            <h3>สิ้นสุด วันที่</h3>  
            <p style="float:left;">
              <label>วันที่ และ เวลา <em>(yyyy-mm-dd)</em></label>
             <!--  <br/> -->
              <input type="text" name="end_datetime" class="end_datetime">
            </p>
          </div>
      <p class=""><div align="center"><br>
        <input type="submit" class="submit" value="ยืนยัน" /><div>
      </p>
    </form>
  </div>
  <div class="bdrl"></div>
  <div class="bdrr"></div>
</div>
</div></div>
  
  <div id='loading' style='display:none'>loading...</div>
  <div id='calendar'></div>

 </div></td>   
  </tr>
  
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
<a href="../authority/edit_profile.php"><IMG SRC="../images/edit_profile.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a> &nbsp; &nbsp;

<a href="../authority/edit_password.php"><IMG SRC="../images/password.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a>
<br><br>
<a href="../authority/logout.php"><IMG SRC="../images/logout.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a>
<br>
</form></td>
  </tr>

  




  
  <tr class="do-not-print">
    <td>  <div id="menu_bar">
	<center>เครื่องมือวิทยาศาสตร์</center></td>
  </tr>
  <tr class="do-not-print"><td>
<div id='cssmenu'>
<ul>
   <li>
  <a href="../authority/AllDurable-A.php"><span>เครื่องมือวิทยาศาสตร์ที่มีทั้งหมด</span></a></li>
   <li>
  <a href="../authority/SearchDurable-A.php"><span>ค้นหาเครื่องมือวิทยาศาสตร์</span></a></li>
	</center></td>
  </tr>



 <tr class="do-not-print">
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar">
	<center>จอง</center></td>
  </tr>
  <tr class="do-not-print"><td>
<div id='cssmenu'>
<ul>
   <li><a href='events-create.php'><span>ทำการจอง</span></a></li>
    <li><a href='index.php'><span>ตรวจสอบสถานะการใช้งาน</span></a></li>
   <li><a href='../authority/CheckReserve-Au.php'><span>ตรวจสอบสถานะการจอง</span></a></li>
	</center></td>
  </tr>
</ul>
</div>
</td></tr>

 <tr class="do-not-print">
    <td >    <div id="menu_bar">	<center>การจัดการพื้นฐาน</center> </div></td>
  </tr>
  <tr class="do-not-print"><td>
<div id='cssmenu'>
 <ul>
   <li class='has-sub '><a href='#'><span>จัดการข้อมูลพื้นฐาน</span></a>
      <ul>
	  <li><a href='../authority/add_user-A.php'><span>ผู้ใช้</span></a>
         </li>
         <li><a href='../authority/durablearticleset-A.php'><span>เครื่องมือวิทยาศาสตร์</span></a>
         </li>
         <li><a href='../authority/add_durable-Z-show-A.php'><span>เครื่องมือประกอบ</span></a>
         </li>

               <li><a href='../authority/add_faculty-A.php'><span>คณะ</span></a></li>
               <li><a href='../authority/add_department-A.php'><span>ภาควิชา</span></a></li>

		<li><a href='../authority/procurement-A.php'><span>หมวดเงิน</span></a>
         </li>

         <li><a href='../authority/company-A.php'><span>บริษัท</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>ซ่อมบำรุงเครื่องมือ</span></a>
   <ul>
               <li><a href='../authority/show_maintenance-A.php'><span>รายการแจ้งซ่อมทั้งหมด</span></a></li>
               <li><a href='../authority/add-maintenance3-A.php'><span>เพิ่มรายการแจ้งซ่อม</span></a></li>
			   <li><a href='../authority/add-maintenance.php'><span>เพิ่มเติมรายละเอียดหลังได้รับเครื่องมือ</span></a></li>
	</ul>
   </li>
         <li><a href='apply_user.php'><span>อนุมัติผู้ใช้</span></a></li>


      <li class='has-sub '><a href='#'><span>ออกรายงาน</span></a>
   <ul>
               <li><a href='../authority/report-A.php'><span>จากเครื่องมือทั้งหมด</span></a></li>
               <li><a href='../authority/report-3-A.php'><span>จากการเลือกเครื่องมือ</span></a>
			   </li>
	</ul>
   </li>


		 <li><a href='contact.php'><span>ติดต่อเจ้าหน้าที่</span></a></li>
<li class='has-sub '><a href='#'><span>ข่าวสาร</span></a>
   <ul>
               <li><a href='../authority/News1.php'><span>เพิ่มข่าวสาร</span></a></li>
               <li><a href='../authority/News3.php'><span>ดูข่าวทั้งหมด</span></a></li>
	</ul>
   </li>



      <li class='has-sub '><a href='#'><span>การแจ้งซ่อมจากผู้ใช้</span></a>
   <ul>
               <li><a href='../authority/userRepairing-A.php'><span>การแจ้งซ่อมจากผู้ใช้</span></a></li>
               <li><a href='../authority/userRepairing-4-A.php'><span>การแจ้งซ่อมจากผู้ใช้ที่ยืนยันแล้ว</span></a></li>
			   <li><a href='../authority/userRepairing-6-A.php'><span>การแจ้งซ่อมทั้งหมด</span></a></li>
	</ul>
   </li>
</div>
</td>
</tr>




  <tr class="do-not-print">
    <td ><center><br><br><br><br><br></center></td>
  </tr>
  <tr class="do-not-print">
    <td BGCOLOR="DDDDDD"><center>

    </center></td>
  </tr>
  <tr class="do-not-print">
    <td colspan="3"><center>	<div id="footer">
		: : ระบบจองเครื่องมือวิทยาศาสตร์ออนไลน์ : : <br> ภาควิชานิติวิทยาศาสตรมหาบัณฑิต คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</div></center></td>
  </tr>
</table>