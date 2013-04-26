
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
		@mysql_query("SET NAMES UTF8");
	$objResult = mysql_fetch_array($objQuery);
?>


<html>
<?php include_once "connDB.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Authority-Apply Page</title>
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
<?php include('headbar-aa.php');?>



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
<form  action="show_reserve2-4.php?id=<?php echo $_GET["id"];?>"  name="frmEdit" method="post">
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
<a href="show_reserve2-1.php"><IMG SRC="../images/back.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a> &nbsp; &nbsp;
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