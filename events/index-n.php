  <? mysql_connect("localhost","root","");
  mysql_select_db("project");
  $strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
  $objQuery = mysql_query($strSQL)or die(mysql_error());
  $objResult = mysql_fetch_array($objQuery);
	@mysql_query("SET NAMES UTF8");
?>


<html>
<?php include_once "connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Page</title>
<link href="../text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<link href="table1.css" rel="stylesheet" type="text/css" />
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='../jquery/jquery-1.8.1.min.js'></script>
<script type='text/javascript' src='../jquery/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='../fullcalendar/fullcalendar.js'></script>
<script type='text/javascript'>

  $(document).ready(function() {
  
    $('#calendar').fullCalendar({
    
      editable: false,
      
      events: "json-events.php",
      
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

        var month = d.getMonth()+1;
        var day = d.getDate();
        var hour = d.getHours();
        var minute = d.getMinutes();
        var second = d.getSeconds();

        var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
        window.location = 'event-create.php?start_at='+ output;
      },
      
    });
    
  });

</script>

<style>
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
#new_event{ display:none; width: 500px; margin: 20 0 20 110 ;}
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
	<div id='navbar'>
<ul>
   <li><a href="../index.php"><span>หน้าแรก</span></a></li>
   <li><a href="../HowToReserve.php"><span>ระเบียบปฏิบัติ</span></a></li>
   <li><a href="../Contact.php"><span>ติดต่อเจ้าหน้าที่</span></a></li>
   <li><a href="../login.php"><span>เข้าสู่ระบบ</span></a></li>
      <li><a href="../add_user.php"><span>สมัครสมาชิก</span></a></li>
</ul>
</div>
<div style="clear:both; margin: 0 0 1px 0;">&nbsp;</div>
	</th>
  </tr>


  <tr>
    <td width="1%"></td>
    
  <td width="80%" rowspan="8" valign="top">  
 

    <div class="hdrl"></div>
    <div class="hdrr"></div>
    <ul>

    </ul>


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
   วันหรือช่วงเวลาที่เลือกไม่ถูกต้อง หรือ มีการจองในช่วงเวลานั้นแล้ว
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
              <label>เครื่องมือ <a href="#" id="addmore_product">+ เพิ่มเครื่องมือ</a></label>
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
                    <option value="<?php echo $tools['DurableArticleSetEnglishName'];?>"><?php echo $tools['DurableArticleSetEnglishName'];?></option>
                  <?php
                  }
                  ?>
                  </select>
                  <?php
                ?>
              </div>
            </p>
          </div>
          <div class="eastern" style="width:460px;margin-top: 10px;"><br>
            <h3>เริ่มจอง</h3>
            <p style="float:left;">
              <label><br>วันที่ <em>(dd-mm-yyyy)</em></label>
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
              <label><br>เวลา <em>(hh:mm)</em></label>
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
            <h3><br>เวลาสิ้นสุดการจอง</h3>
            <p style="float:left;">
              <label><br>วันที่ <em>(dd-mm-yyyy)</em></label>
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
              <label><br>เวลา <em>(hh:mm)</em></label>
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

    <div id='loading' style='display:none'>loading...</div>
    <div id='calendar'></div>
    <script type="text/javascript">
      $(window).ready(function(){
        // $(".calendar").smoothPhpCalendar({
        //   weekDays             : ["อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์"],
        //   monthsOfYear         : ["มกราคม","กุมภาพันธ์ ","มีนาคม","เมษายน ","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"],
        //   dayNumbers           : {"อาทิตย์" : 0, "จันทร์" : 1, "อังคาร" : 2, "พุธ" : 3, "พฤหัสบดี" : 4, "ศุกร์" : 5, "เสาร์" : 6},
        // });
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
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar"><center>เครื่องมือวิทยาศาสตร์</center></td>
  </tr>
  <tr>
    <td > <div id='cssmenu'>
  <ul>
    <li>
  <a href="../SearchDurable.php">ค้นหาเครื่องมือวิทยาศาสตร์</a></li>
  <li>
  <a href="../AllDurable.php"> เครื่องมือวิทยาศาสตร์ที่มีทั้งหมด</a></li>
  </td>
  </tr>

  <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar"><center>จอง</center></td>
  </tr>
  <tr>
    <td > <div id='cssmenu'>
  <ul>
    <li>
  <a href="index-n.php">ตรวจสอบสถานะการใช้งาน</a></li>

  </td>
  </tr>

  <tr>
    <td ><center></center></td>
  </tr>
  <tr>
    <td><br>
	<br>
	<br>
	<br>
	<br>
	<br>
<br>
	<br><center>

    </center></td>
  </tr>
  <tr>
    <td><center></center></td>
  </tr>
  <tr>
    <td ><center>

    </center></td>
  </tr>
  <tr>
    <td colspan="3"><center>	<div id="footer">
		: : ระบบจองเครื่องมือวิทยาศาสตร์ออนไลน์ : : <br> ภาควิชานิติวิทยาศาสตรมหาบัณฑิต คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</div></center></td>
  </tr>
</table>


</body>
</html>
