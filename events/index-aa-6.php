 <?php
	session_start();
	if($_SESSION['UserId'] == "")
	{
		echo "Please Login!";
		echo '<br><a href="../index.php"> Go To Main Page</a>';
		exit();
	}

	if($_SESSION['UserStatus'] != "authority-apply")
	{
		echo "This page for authority-apply only!";
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
<?php include_once "../connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Authority Page</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="table1.css" rel="stylesheet" type="text/css">

<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal-min.js" type="text/javascript"></script>
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='../jquery/jquery-1.8.1.min.js'></script>
<script type='text/javascript' src='../jquery/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='../fullcalendar/fullcalendar.js'></script>
<script type="text/javascript" src="../jquery/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui-sliderAccess.js"></script>

<style type="text/css">
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }

.ui-timepicker-rtl{ direction: rtl; }
.ui-timepicker-rtl dl { text-align: right; }
.ui-timepicker-rtl dl dd { margin: 0 65px 10px 10px; }
</style>
<script type='text/javascript'>

  $(document).ready(function() {
  
    $('#calendar').fullCalendar({
    
      editable: false,
      
      events: "json-events-6.php",
      
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
        window.location = 'events-create-a.php?start_at='+ output;
      },
      
      eventAfterRender : function( event, element, view ) { 
        element.attr('data-id', event.id);
      },

      eventClick: function(calEvent, jsEvent, view) {

        alert(calEvent.full_title);
        // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        // alert('View: ' + view.name);

        // change the border color just for fun
        // $(this).css('border-color', 'red');

      }
    });

  var startDateTextBox = $('.start_datetime');
  var endDateTextBox = $('.end_datetime');

  startDateTextBox.datetimepicker({ 
    minDate: 0,
    dateFormat: "yy-mm-dd",
    onClose: function(dateText, inst) {
      if (endDateTextBox.val() != '') {
        var testStartDate = startDateTextBox.datetimepicker('getDate');
        var testEndDate = endDateTextBox.datetimepicker('getDate');
        if (testStartDate > testEndDate)
          endDateTextBox.datetimepicker('setDate', testStartDate);
      }
      else {
        endDateTextBox.val(dateText);
      }
    },
    onSelect: function (selectedDateTime){
      endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
    }
  });
  endDateTextBox.datetimepicker({
    dateFormat: "yy-mm-dd",
    onClose: function(dateText, inst) {
      if (startDateTextBox.val() != '') {
        var testStartDate = startDateTextBox.datetimepicker('getDate');
        var testEndDate = endDateTextBox.datetimepicker('getDate');
        if (testStartDate > testEndDate)
          startDateTextBox.datetimepicker('setDate', testEndDate);
      }
      else {
        startDateTextBox.val(dateText);
      }
    },
    onSelect: function (selectedDateTime){
      startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
    }
  });

  });

</script>

<script type="text/javascript">

function namosw_goto_byselect(sel, targetstr)
{
var index = sel.selectedIndex;
if (sel.options[index].value != '') {
if (targetstr == 'blank') {
window.open(sel.options[index].value, 'win1');
} else {
var frameobj;
if (targetstr == '') targetstr = 'self';
if ((frameobj = eval(targetstr)) != null)
frameobj.location = sel.options[index].value;
}
}
}
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

<?php include('headbar-aa.php');?>


  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"><div id="menu_bar"><center>ข้อมูล เจ้าหน้าที่</center></td>
    
 <td width="80%" rowspan="8" valign="top">  
 

    <ul>

<center> เครื่องมือ : Drying Oven with Natural <br>
<select name="select" size="1" onChange="namosw_goto_byselect(this, 'self')">
            <option value=''>-----กรุณาเลือกเครื่องมือ------</option>
			<option value='index-aa.php'>pH meter</option> 
			<option value='index-aa-2.php'>Microscope</option>
			<option value='index-aa-3.php'>UV Spectrophotometer</option>
			<option value='index-aa-4.php'>Centrifuge</option>
			<option value='index-aa-5.php'>Thermal Cycler</option>
			<option value='index-aa-6.php'>Drying Oven with Natural</option>
</select>

</center>

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
          <div class="eastern" style="width:460px;margin-top: 10px;">
            <h3>Start at</h3>
            <p style="float:left;">
              <label>Date <em>(dd-mm-yyyy)</em></label>
              <br/>
              <input type="text" class="start_datetime" name="start_datetime">
          </div>
          <div class="clearfix"></div>
          <div class="eastern" style="width:460px;margin-top: 10px;">
            <h3>End at</h3>
            <p style="float:left;">
              <label>Date <em>(dd-mm-yyyy)</em></label>
              <br/>
              <input type="text" name="end_datetime" class="end_datetime">
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
        // $("#calendar").smoothPhpCalendar({
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
  
<?php include('user-aa.php');?>
  

<?php include('footer-aa.php');?>
</body>
</html>