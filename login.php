<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>หน้าหลัก</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />

<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>

</style>
<STYLE>
A:link { color: black; text-decoration:none}
A:visited {color: black; text-decoration: none}
A:hover {color: black}
</STYLE>
</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('bar/headbar4.php');?>


  <tr>
    <td width="1%"></td>
    
 <td width="800px" rowspan="8" align="center" valign="top">   <div id="content">

<table>
<tr><td colspan="2" background="images/login.bmp" width="300" height="50"></td></tr>
</table>
<form name="form1" method="post" action="check_login.php">
<table style="width: 300px" height="180" background="images/bg-login.bmp" >
    <tbody>


      <tr >
        <td align="right"><br> &nbsp;&nbsp;&nbsp;Username : &nbsp;<br><br></td>
        <td><br>
          <input name="txtUsername" type="text" id="txtUsername" size="14" placeholder="Username" >
        </td>
      </tr>
      <tr>
        <td align="right"> &nbsp;&nbsp;&nbsp;Password : &nbsp;</td>
        <td><input name="txtPassword" type="password" id="txtPassword" size="14" placeholder="Password" >
        </td>
      </tr>

<tr><td colspan="2">
<center><br> <input type="image" name="Submit" WIDTH="100" HEIGHT="30"src="images/submit.bmp"/></center>
</td></tr>
<tr><td colspan="2">
<center><br>
<a href="add_user.php"><IMG SRC="images/register.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a> &nbsp; &nbsp;

<a href="Contact.php"><IMG SRC="images/loss-password.png" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a>

</center></td></tr>
</tbody>
  </table>
</form>

 
 </div></td>   
  </tr>

  
<?php include('bar/footer.php');?>
</body>
</html>
