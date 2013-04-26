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
<?php include_once "connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Authority Page</title>
<link href="text1.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal-min.js" type="text/javascript"></script>

<style>
A{text-decoration:none}
#new_event{ display: none; width: 460px; margin: 0 auto;}
.eastern, .western { overflow: hidden;}
</style>

<script type="text/javascript">
$(document).ready(function(){
  $('#add_event_link').click(function(e){
    e.preventDefault();
    $('#new_event').slideToggle('slow');
  });
});
</script>
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
 
  <div id="header">
    <div class="hdrl"></div>
    <div class="hdrr"></div>
    <ul>
      <li>
        <a href="events.php">Events</a>
      </li>
      <li>
        <a href="#" id="add_event_link">Add Event</a>
      </li>
    </ul>
  </div>

  <?php if(!empty($_POST)) require_once('smoothcalendar.php'); ?>

 <div id="content">
    <div class="block">
      <?php
      if (!empty($_POST["event"]))
      {
        $description = $_POST["event"]["description"];
        $eventtime   = mktime($_POST["event"]["hour"  ], 
                    $_POST["event"]["minute"], 0,
                    $_POST["event"]["month" ], 
                    $_POST["event"]["day"   ], 
                    $_POST["event"]["year"  ]);
        $eventtime   = date('Y-m-d H:i:s', $eventtime); 

        if (strcmp($description, "") == 0)
        {
      ?>        
      <p class="message error">
        You forgot to add description
      </p>
      <?php
        }
        else if (strcmp($eventtime, "") == 0)
        {
      ?>        
      <p class="message error">
        Event time or date were invalid
      </p>
      <?php
        }
        else
        {
          $result = $calendar->createEvent(array("date" => $eventtime, "content" => $description));       
          
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
        Done creating event.
      </p>
        
      <?php
          }
        }
      } 

        $currentYearInfo = getdate(time());
      ?>      
    </div>
    <div id="new_event">
        <form method="POST" action="<?php echo $_SERVER["REQUEST_URI"]?>" class="form-inline">
          <div class="western" style="width:460px;">
            <p>
              <label>Title </label>
              <br/>
              <textarea id="setname" class="text" type="text"  name="event[description]" style="width:440px;float:left;"></textarea>
            </p>
          </div>
          <div class="eastern" style="width:460px;margin-top: 10px;">
            <p style="float:left;">
              <label>Date <em>(dd-mm-yyyy)</em></label>
              <br/>
              <select name="event[day]">
      <?php
                for($i = 1; $i < 32; $i++)
                {
                  $value    = ($i < 10) ? "0" . $i : $i;
                  $day      = (int)$currentYearInfo["mday"];
                  $selected = ($day == $i) ? 'selected="selected"' : "";
      ?>
                  <option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>           
      <?php
                }
      ?>
              </select>

              <select name="event[month]">
      <?php
                for($i = 1; $i < 13; $i++)
                {
                  $value = ($i < 10) ? "0" . $i : $i;
                  $month    = (int)$currentYearInfo["mon"];
                  $selected = ($month == $i) ? 'selected="selected"' : "";
      ?>
                  <option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>           
      <?php
                }
      ?>
              </select>

              <select name="event[year]">
      <?php
                $years = (int)$currentYearInfo["year"];
                
                for($i = $years; $i <= $years + 3; $i++)
                {
      ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>            
      <?php
                }
      ?>
              </select>
            </p>
            <p>
              <label>Time <em>(hh:mm)</em></label>
              <br/>
              &nbsp;&nbsp;&nbsp;<select name="event[hour]">
      <?php
                for($i = 0; $i < 24; $i++)
                {
                  $value    = ($i < 10) ? "0" . $i : $i;
                  $hours    = (int)$currentYearInfo["hours"];
                  $selected = ($hours == $i) ? 'selected="selected"' : "";
      ?>
                  <option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>           
      <?php
                }
      ?>
              </select>

              <select name="event[minute]">
      <?php
                for($i = 0; $i < 60; $i = $i + 5)
                {
                  $value = ($i < 10) ? "0" . $i : $i;
      ?>
                  <option value="<?php echo $value; ?>"><?php echo $value; ?></option>            
      <?php
                }
      ?>
              </select>
            </p>
          </div>
          <div class="clearfix"></div>
          <p class="rightalign">
            <br>
            <input type="submit" class="btn submit" value="Save" />
          </p>
        </form>
      </div>
    </div> <!-- End new event -->

    <div id="calendar"></div>
    <script type="text/javascript">
      $(window).ready(function(){
        $("#calendar").smoothPhpCalendar({
          weekDays             : ["sunday","monday","tuesday","wednesday","thursday","friday","saturday"],
          monthsOfYear         : ["January","February","March","April","May","June","July","August","September","October","November","December"],
          dayNumbers           : {"sunday" : 0, "monday" : 1, "tuesday" : 2, "wednesday" : 3, "thursday" : 4, "friday" : 5, "saturday" : 6},
        });
      });
    </script>

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
      <a href="events">&nbsp;&nbsp;Reserve</a><br>
      <a href="AllDurable-Au.php">&nbsp;&nbsp;แสดงรายการเครื่องมือ</a><br>
      <a href="SearchDurable-Au.php">&nbsp;&nbsp;อนุมัติการจอง</a><br>
      <a href="Reserve-Au.php">&nbsp;&nbsp;จอง</a><br>
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
