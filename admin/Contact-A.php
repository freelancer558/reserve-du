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
<title>�Դ������˹�ҷ��</title>
<link href="text1.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
background: -webkit-gradient(linear, left top, left bottom, from(#EEEEEE), to(#FFFFFF));
}
a:link {
	color: #000;
}
a:hover {
	color: #F00;
}
</style>
</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>

 <tr>
    <th colspan="3" scope="col">
    <div id="navbar">	
    <a href="admin_page1.php">˹���á</a> |
	<a href="HowToReserve-A.php">����º��Ժѵ�</a> |
<a href="../events/index1.php">��Ǩ�ͺʶҹС����ҹ</a> 
	</div></th>
  </tr>
  <tr>
    <td width="15%" BGCOLOR="#FFFF99" style="color:#330000"><center>������ Admin</center></td>
    
    <td width="80%" rowspan="8"  align="center" valign="top"><center>
<table  align="center"  valign="center" border="0" width="60%">�Դ������˹�ҷ��<br><tr><td>
	����� :	˹��§ҹ�Ե��Է����ʵ�� ��ѡ�ٵ��Է����ʵ����Һѳ�Ե <br>
����Է����ʵ�� ����Է����¢͹�� <br>
���Ѿ�� :		088-3110000 <br>
	ῡ�� :		043-222222  <br>
	���Ѿ����Ͷ�� :	083-654845<br>
</td></tr>
	</table>


</center></td>   
  </tr>
  
  
   <tr>
    <td BGCOLOR="DDDDDD"><center><form name="form1" method="post" action="check_login.php">
  <table border="0" style="width: 210px">
    <?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<?php include('userbuttom.php'); ?>







  <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar">
	<center>����ͧ����Է����ʵ��</center></td>
  </tr>
  <tr><td>
<div id='cssmenu'>
<ul>
   <li>
  <a href="AllDurable-A.php"><span>����ͧ����Է����ʵ�����շ�����</span></a></li>
   <li>
  <a href="SearchDurable-A.php"><span>��������ͧ����Է����ʵ��</span></a></li>
	</center></td>
  </tr>



 <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">  <div id="menu_bar">
	<center>��èͧ</center></td>
  </tr>
  <tr><td>
<div id='cssmenu'>
<ul>
    <li>
	<a href="../events/events.php"><span>͹��ѵԡ�èͧ</span></a></li>
	    <li>
	<a href="../events/index1.php"><span>��Ǩ�ͺʶҹС����ҹ</span></a></li>
	</center></td>
  </tr>


 <tr>
    <td BGCOLOR="#FFFF99" style="color:#330000">    <div id="menu_bar">	<center>��èѴ��þ�鹰ҹ</center> </div></td>
  </tr>


  <tr><td>
<div id='cssmenu'>

 <ul>
   <li class='has-sub '><a href='#'><span>�Ѵ��â����ž�鹰ҹ</span></a>
      <ul>
	  <li><a href='add_user-A.php'><span>�����</span></a>
         </li>
         <li><a href='durablearticleset-A.php'><span>����ͧ����Է����ʵ��</span></a>
         </li>
         <li><a href='add_durable-Z-show-A.php'><span>����ͧ��ͻ�Сͺ</span></a>
         </li>

               <li><a href='add_faculty-A.php'><span>���</span></a></li>
               <li><a href='add_department-A.php'><span>�Ҥ�Ԫ�</span></a></li>
			   <li><a href='add_branch-A.php'><span>�Ң�</span></a></li>

		<li><a href='procurement-A.php'><span>��Ǵ�Թ</span></a>
         </li>

         <li><a href='company-A.php'><span>����ѷ</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>�������ا����ͧ���</span></a>
   <ul>
               <li><a href='show_maintenance-A.php'><span>��¡���駫���������</span></a></li>
               <li><a href='add-maintenance3-A.php'><span>������¡���駫���</span></a></li>
			   <li><a href='add-maintenance.php'><span>���������������´��ѧ���Ѻ����ͧ���</span></a></li>
	</ul>
   </li>
         <li><a href='apply_user.php'><span>͹��ѵԼ����</span></a></li>

<li class='has-sub '><a href='#'><span>�������</span></a>
   <ul>
               <li><a href='News1.php'><span>�����������</span></a></li>
               <li><a href='News3.php'><span>�٢��Ƿ�����</span></a></li>
	</ul>
   </li>



      <li class='has-sub '><a href='#'><span>����駫����ҡ�����</span></a>
   <ul>
               <li><a href='userRepairing-A.php'><span>����駫����ҡ�����</span></a></li>
               <li><a href='userRepairing-4-A.php'><span>����駫����ҡ��������׹�ѹ����</span></a></li>
			   <li><a href='userRepairing-6-A.php'><span>����駫���������</span></a></li>
	</ul>
   </li>
</div>
</td>
</tr>




  <tr>
    <td ><center><br><br><br><br><br></center></td>
  </tr>
  <tr>
    <td BGCOLOR="DDDDDD"><center>

    </center></td>
  </tr>
  <tr>
    <td colspan="3"><center>	<div id="footer">
		: : �к��ͧ����ͧ����Է����ʵ���͹�Ź� : : <br> �Ҥ�ԪҹԵ��Է����ʵ���Һѳ�Ե ����Է����ʵ�� ����Է����¢͹��</div></center></td>
  </tr>
</table>
</body>
</html>