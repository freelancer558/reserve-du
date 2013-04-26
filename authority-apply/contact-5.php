<?php include('h1.php');?>


<html>
<?php include_once "connDB.php"; ?>

<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>

    
 <td width="80%" rowspan="20" align="center" valign="top"> <div id="content">



	<form name="form1" method="post" action="contact.php" enctype="multipart/form-data">
<table width="600" border="0">
  <tr> 
<?php 
		//*** Insert Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");
		$strSQL = "INSERT INTO contact ";
		$strSQL .="(Name,
		Address,
		Email,
		phone1,
		phone2,
		PhoneFax) ";
$strSQL .="VALUES ";
$strSQL .= "('".$_POST["txtName"]."',
		'".$_POST["txtAddress"]."',
		'".$_POST["txtEmail"]."',
		'".$_POST["txtphone1"]."' ";
$strSQL .= " ,'".$_POST["txtphone2"]."',

		'".$_POST["txtPhoneFax"]."' )";

		$objQuery = mysql_query($strSQL);		
	
	
if($objQuery)
{
	echo "<a href='contact.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>





</body>
</html>
