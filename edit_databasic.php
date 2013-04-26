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
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Authority Page</title>
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('headbar.php');?>


  <tr>
    <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"><div id="menu_bar"><center>ข้อมูล </center></td>
    
 <td width="80%" rowspan="8" align="center" valign="top">  
 
จัดการข้อมูลเบื่องต้น
 
 <div id="content">


</div></td>   
  </tr>
  

  <tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="check_login.php">
  <table border="0" style="width: 210px">
    <tbody>
      <tr>
        <td> &nbsp;&nbsp;&nbsp;Username : <br><br></td>
        <td>
          <input name="txtUsername" type="text" id="txtUsername" size="14">
        </td>
      </tr>
      <tr>
        <td> &nbsp;&nbsp;&nbsp;Password :</td>
        <td><input name="txtPassword" type="password" id="txtPassword" size="14">
        </td>
      </tr>
    </tbody>
  </table>
  <input type="submit" name="Submit" value="Login"><br><br>
<a href="add_user.php">สมัครสมาชิก</a> &nbsp; &nbsp;
<a href="Contact.php">ลืมรหัสผ่าน <br><br></a>
</form>
</td>

  </tr>
  
 <?php include('footer.php');?>
</body>
</html>
