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
	$objResult = mysql_fetch_array($objQuery);
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Admin Page</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<!-- <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css"> -->
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script> -->
<style type="text/css">
a{
text-decoration:none;
}

.table {
  width: 100%;
  margin-bottom: 20px;
}

.table th,
.table td {
  padding: 8px;
  line-height: 20px;
  text-align: left;
  vertical-align: top;
  border-top: 1px solid #dddddd;
}

.table th {
  font-weight: bold;
}

.table thead th {
  vertical-align: bottom;
}

.table caption + thead tr:first-child th,
.table caption + thead tr:first-child td,
.table colgroup + thead tr:first-child th,
.table colgroup + thead tr:first-child td,
.table thead:first-child tr:first-child th,
.table thead:first-child tr:first-child td {
  border-top: 0;
}

.table tbody + tbody {
  border-top: 2px solid #dddddd;
}

.table .table {
  background-color: #ffffff;
}

table{
  max-width: 100%;
  background-color: transparent;
  border-collapse: collapse;
  border-spacing: 0;
}
</style>
<script type="text/javascript">
$(function() {
  // $( "#stat_datetime" ).datepicker({
  //   dateFormat: "yy-mm-dd" 
  // });
});
</script>
</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>

<?php include('headbar3.php');?>
</body>
</html>


  <tr>
 <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">


<?php 
  require_once('../connDB.php');
  if(isset($_GET['pname'])){
    $sql = "SELECT * FROM reserve WHERE ID=".$_GET['pname'];
    $mq = mysql_query($sql) or die(mysql_error());
    $reserve = mysql_fetch_assoc($mq);
    $find_sql = "SELECT * FROM reserve WHERE DurableArticleSet = '".$reserve['DurableArticleSet']."'";
    $find_q = mysql_query($find_sql) or die(mysql_error());
    ?>
    <table class="table">
      <thead>
        <th>สถิติการใช้วาน(วัน)</th>
        <th>ชื่อเครื่องมือ</th>
        <th>ชื่อผู้ใช้</th>
        <th>เวลาการใช้งาน</th>
      </thead>
      <tbody>
      <?php
        while ($found = mysql_fetch_assoc($find_q)) {
      ?>
        <tr>
          <td>
            <?php 
              $date = new DateTime($found['Date']);
              echo $date->format('Y-m-d');
            ?>
          </td>
          <td><?php echo $found['DurableArticleSet'];?></td>
          <td>
            <?php 
            $userq = mysql_query('SELECT UserFullname FROM user WHERE UserId = '.$found['user_id']);
            $user = mysql_fetch_assoc($userq);
            echo $user['UserFullname'];
            ?>
          </td>
          <td><?php 
            $date = new DateTime($found['Date']);
            $end_date = new DateTime($found['end_date']);
            echo $date->format('H:i:s') . " - " . $end_date->format('H:i:s');
          ?></td>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
<?php
  }
?>
</div></td>   
  </tr>
  
   <tr>
  <?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>


    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="check_login.php">
  <table border="0" style="width: 210px">

 <?php include('userbuttom.php'); ?>








<?php include('footer.php');?>
</body>
</html>