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
<?php include_once "connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Page</title>
<link href="../text1.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<link href="table1.css" rel="stylesheet" type="text/css" />
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />

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
    <a href="../user/user_page1.php">หน้าแรก</a> |
		<a href="../user/HowToReserve-U.php">ระเบียบปฏิบัติ</a> |
		<a href="../user/Contact-U.php">ติดต่อเจ้าหน้าที่</a> 
	</div></th>
  </tr>


  <tr>
    <td width="15%" BGCOLOR="#FFFF99" style="color:#330000"><center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
 <td width="80%" rowspan="8" valign="top">  
 
  <div id="header">
    <div class="hdrl"></div>
    <div class="hdrr"></div>
    <ul>

    </ul>
  </div>

  <?php if(!empty($_POST)) require_once('smoothcalendar.php'); ?>

 <div id="content">
    <div class="block">
      <?php
      if (!empty($_POST["event"]))
      {

        $DurableArticleSet = [];
        $date = new DateTime();
        $timestamp = $date->getTimestamp();

        for($i=0; $i<count($_POST["event"]['DurableArticleSet']); $i++){
          if(!empty($_POST["event"]['DurableArticleSet'][$i])) array_push($DurableArticleSet, $_POST["event"]["DurableArticleSet"][$i]);
        }
        $eventtime   = mktime($_POST["event"]["hour"  ], 
                    $_POST["event"]["minute"], 0,
                    $_POST["event"]["month" ], 
                    $_POST["event"]["day"   ], 
                    $_POST["event"]["year"  ]);
        $eventtime   = date('Y-m-d H:i:s', $eventtime); 
        
        $end_eventtime   = mktime($_POST["end_event"]["hour"  ], 
                    $_POST["end_event"]["minute"], 0,
                    $_POST["end_event"]["month" ], 
                    $_POST["end_event"]["day"   ], 
                    $_POST["end_event"]["year"  ]);
        $end_eventtime   = date('Y-m-d H:i:s', $end_eventtime); 

        if (strcmp($eventtime, "") == 0)
        {
      ?>        
      <p class="message error">
        Event time or date were invalid
      </p>
      <?php
        }
        elseif((strtotime($end_eventtime) < $timestamp) || (strtotime($eventtime) > strtotime($end_eventtime)))
        {
      ?>
      <p class="message error">
   วันหรือช่วงเวลาที่เลือกไม่ถูกต้อง
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
    </div>
    <div id="new_event">
        <form method="POST" action="<?php echo $_SERVER["REQUEST_URI"]?>" class="form-inline">
          <div class="western" style="width:460px;">
            <p>
              <label>อุปกรณ์ <a href="#" id="addmore_product">+ เพิ่มอุปกรณ์</a></label>
              <br/>
              <div class="product">
                <?php
                  $sql = 'SELECT DurableArticleSetId, DurableArticleSetThaiName, DurableArticleSetEnglishName FROM durablearticleset';
                  $q = mysql_query($sql) or die(mysql_error());
                  ?>
                  <select name="event[DurableArticleSet][]" id="setname">
                  <?php
                  while($tools = mysql_fetch_assoc($q)){
                  ?>
                    <option value="<?php echo $tools['DurableArticleSetThaiName'];?>"><?php echo $tools['DurableArticleSetThaiName'];?></option>
                  <?php
                  }
                  ?>
                  </select>
                  <?php
                ?>
              </div>
            </p>
          </div>
          <div class="eastern" style="width:460px;margin-top: 10px;">
            <h3>Start at</h3>
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
          <div class="eastern" style="width:460px;margin-top: 10px;">
            <h3>End at</h3>
            <p style="float:left;">
              <label>Date <em>(dd-mm-yyyy)</em></label>
              <br/>
              <select name="end_event[day]">
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

              <select name="end_event[month]">
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

              <select name="end_event[year]">
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
              &nbsp;&nbsp;&nbsp;<select name="end_event[hour]">
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

              <select name="end_event[minute]">
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
          weekDays             : ["อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์"],
          monthsOfYear         : ["มกราคม","กุมภาพันธ์ ","มีนาคม","เมษายน ","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"],
          dayNumbers           : {"อาทิตย์" : 0, "จันทร์" : 1, "อังคาร" : 2, "พุธ" : 3, "พฤหัสบดี" : 4, "ศุกร์" : 5, "เสาร์" : 6},
        });
      });
      $(document).ready(function(){
        setTimeout(function(){
          $('.day_event_list').each(function(){
            var $this = $(this);
            // console.log($(this).attr('data-id'));
            var event_id = $(this).attr('data-id');
            var request = $.ajax({
              url: "dayInfo.php",
              type: "GET",
              data: {id : event_id},
              dataType: "json"
            });

            request.done(function(msg) {
              var d = new Date(msg.date);
              var ed= new Date(msg.end_date);
              var s = 'start: '+d.getDate()+'/'+d.getMonth()+'/'+d.getFullYear();
              var e = 'end:'+ed.getDate()+'/'+ed.getMonth()+'/'+ed.getFullYear()
              $this.append(msg.fullname);
            });

            request.fail(function(jqXHR, textStatus) {
              // console.log(textStatus);
            });
            
          });
        }, 1100);
      });
    </script>

</div></td>   
  </tr>
  
 <tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="../check_login.php">
  <table border="0" style="width: 250px">
    <?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

    <tbody> 
      <tr>
        <td>&nbsp;&nbsp;&nbsp;Username :</td>
        <td><?php echo $objResult["UserName"];?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;Name : </td>
        <td><?php echo $objResult["UserFullname"];?>
        </td>
      </tr>
    </tbody>
  </table>
 <a href="../user/edit_profile.php">แก้ไขข้อมูลส่วนตัว</a><br>
 <INPUT TYPE="button" VALUE="LogOut" ONCLICK="window.location.href='logout.php'"><br>
</form></td>
  </tr>
  



  <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>เครื่องมือวิทยาศาสตร์</center> </div></td>
  </tr>
<tr><td>
<div id='cssmenu'>
<ul>
  <li><a href='../user/AllDurable-A.php'><span>เครื่องมือที่มีทั้งหมด</span></a></li>
 <li><a href='../user/SearchDurable-A.php'><span>ค้นหาเครื่องมือวิทยาศาสตร์</span></a></li>
  <li><a href='../user/durable-fail-U.php'><span>แจ้งปัญหาที่พบ</span></a></li>
</ul>
</div>
</td></tr>



  <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>การจอง</center> </div></td>
  </tr>


<tr><td>
<div id='cssmenu'>
<ul>
   <li><a href='index1.php'><span>ทำการจอง</span></a></li>
      <li><a href='index-u.php'><span>ตรวจสอบเวลาว่างการจอง</span></a></li>
   <li><a href='../user/CheckReserve-Au.php'><span>ตรวจสอบสถานะการจอง</span></a></li>
</div>
</td>
</tr>

<tr>
<td>
<br><br>
<br><br>
<br>
</td>
<tr>






  <tr>
    <td ><center></center></td>
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