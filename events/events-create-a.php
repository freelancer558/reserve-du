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
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="../text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">

<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
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
    <form method="POST" action="index-aa.php" >
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
                  <option value="<?php echo $tools['DurableArticleSetEnglishName'];?>"><?php echo $tools['DurableArticleSetEnglishName'];?></option>
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
              <label>วันที่ และ เวลา <em>(dd-mm-yyyy)</em></label>
              <!-- <br/> -->
              <input type="text" class="start_datetime" name="start_datetime">
            </p>
          </div>
          <div class="clearfix"></div>
          <div class="eastern" style="width:460px;margin-top: 10px;">
            <h3>สิ้นสุด วันที่</h3>  
            <p style="float:left;">
              <label>วันที่ และ เวลา <em>(dd-mm-yyyy)</em></label>
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
<a href="../authority-apply/edit_profile.php"><IMG SRC="../images/edit_profile.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a> &nbsp; &nbsp;

<a href="../authority-apply/edit_password.php"><IMG SRC="../images/password.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a>
<br><br>
<a href="../authority-apply/logout.php"><IMG SRC="../images/logout.png" WIDTH="100" HEIGHT="20" BORDER="0" ALT=""></a>
<br>
</form></td>
  </tr>
  



<?php include('footer-aa.php');?>
</body>
</html>