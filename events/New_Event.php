<?php
   //date_default_timezone_set("Asia/Bangkok");
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
    <a href="../authority_page.php">หน้าแรก</a> |
	<a href="../HowToReserve-Au.php">ระเบียบปฏิบัติ</a> |

		<a href="../Contact-Au.php">ตรวจสอบการติดต่อจากผู้ใช้</a> 
	</div></th>
  </tr>


  <tr>
    <td width="15%" BGCOLOR="#FFFF99" style="color:#330000"><center>ข้อมูล เจ้าหน้าที่</center></td>
    
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
        elseif((strtotime($eventtime) > $timestamp || strtotime($end_eventtime) < $timestamp) || (strtotime($eventtime) > strtotime($end_eventtime)))
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
    <form method="POST" action="index.php" >
      <div class="western">
        <p>
          <label>อุปกรณ์ <a href="#" id="addmore_product">+ เพิ่มอุปกรณ์</a></label>
            <br/>
            <div class="product">
              <?php
                $sql = 'SELECT DurableArticleSetId, DurableArticleSetThaiName, DurableArticleSetEnglishName FROM durablearticleset';
                $q = mysql_query($sql) or die(mysql_error());
                ?>
                <select name="event[DurableArticleSet]" id="setname">
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
      </div><br><br><br><br><br><br><br><br>
      <div class="eastern" style="width:460px;margin-top: 10px;clear: none;">
            <h3>เริ่ม</h3>
            <p style="float:left;">
              <label>วันที่ <em>(dd-mm-yyyy)</em></label>
              <br/>
              <select name="event[day]">
      <?php
                if(isset($_GET['start_at'])) $startDay = explode('/', $_GET['start_at'])[0];
                for($i = 1; $i < 32; $i++)
                {
                  $value    = ($i < 10) ? "0" . $i : $i;
                  $day      = (int)$currentYearInfo["mday"];
                  if(isset($_GET['start_at'])){
                    $selected = ($startDay == $i) ? 'selected="selected"' : "";
                  }else{
                    $selected = ($day == $i) ? 'selected="selected"' : "";
                  }
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
            <p style=" clear: none;">
              <label>เวลา <em>(hh:mm)</em></label>
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
            <h3>สิ้นสุด</h3>
            <p style="float:left;">
              <label>วันที่ <em>(dd-mm-yyyy)</em></label>
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
            <p style="clear: none;">
              <label>เวลา <em>(hh:mm)</em></label>
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
        <input type="submit" class="submit" value="Save" />
      </p>
    </form>
  </div>
  <div class="bdrl"></div>
  <div class="bdrr"></div>
</div>   
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
 <a href="../edit_profile.php">แก้ไขข้อมูลส่วนตัว</a><br>
 <INPUT TYPE="button" VALUE="LogOut" ONCLICK="window.location.href='../logout.php'" class="btn"><br>
</form></td>
  </tr>
  
   <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>เครื่องมือวิทยาศาสตร์</center> </div></td>
  </tr>
<tr><td>
<div id='cssmenu'>
<ul>
   <li><a href='AllDurable-Au.php'><span>เครื่องมือวิทยาศาสตร์ทั้งหมด</span></a></li>
   <li><a href='AllDurable-Au.php'><span>ค้นหาเครื่องมือวิทยาศาสตร์</span></a></li>
</ul>
</div>
</td></tr>

 <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>การจอง</center> </div></td>
  </tr>
<tr><td>
<div id='cssmenu'>
<ul>
 <li><a href='events-create.php'><span>ทำการจอง</span></a></li>
    <li><a href='index.php'><span>ดูเวลาว่างการจอง</span></a></li>
   <li><a href='../authority/CheckReserve-Au.php'><span>ตรวจสอบสถานะการจอง</span></a></li>
   <li><a href='../authority/AllReserve.php'><span>ตรวจสอบรายการจองทั้งหมด</span></a></li>
</ul>
</div>
</td></tr>


  <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>การจัดการพื้นฐาน	 </center> </div></td>
  </tr>


<tr><td>
<div id='cssmenu'>
<ul>
   <li class='has-sub '><a href='#'><span>จัดการข้อมูลพื้นฐาน</span></a>
      <ul>
	   <li><a href='../authority/add_user.php'><span>ผู้ใช้</span></a>
         </li>
         <li><a href='../authority/durablearticleset.php'><span>เครื่องมือวิทยาศาสตร์</span></a>
         </li>
               <li><a href='../authority/add_faculty.php'><span>คณะ</span></a></li>
               <li><a href='../authority/add_department.php'><span>ภาควิชา</span></a></li>
			   <li><a href='../authority/add_branch.php'><span>สาขา</span></a></li>
		 	 <li><a href='../authority/procurement.php'><span>หมวดเงิน</span></a>
         </li>

         <li><a href='../authority/company.php'><span>บริษัท</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>ซ่อมบำรุงเครื่องมือ</span></a>
   <ul>
               <li><a href='../authority/show_maintenance.php'><span>รายการแจ้งซ่อมทั้งหมด</span></a></li>
               <li><a href='../authority/maintenance.php'><span>เพิ่มรายการแจ้งซ่อม</span></a></li>
	</ul>
   </li>
   <li><a href='../authority/report-Au.php'><span>ออกรายงาน</span></a></li>
   <li><a href='../authority/userRepairing-Au.php'><span>การแจ้งซ่อมจากผู้ใช้</span></a></li>
</div>
</td>
</tr>






  <tr>
    <td ><center><br><br><br><br><br><br></center></td>
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
