<?php include('h1.php');?>

<html>
<?php include_once "connDB.php"; ?>

<head>

<META HTTP-EQUIV="Refresh"CONTENT="0;URL=contact.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>



</head>


<body>

  



<?php

		//*** Update Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");

		$strSQL = "UPDATE  contact SET";
		$strSQL .=" Name = '".$_POST["txtName"]."' ";

		$strSQL .=" ,Address = '".$_POST["txtAddress"]."' ";
		
		$strSQL .=" ,Email = '".$_POST["txtEmail"]."' ";

		$strSQL .=" ,phone1 = '".$_POST["txtphone1"]."' ";		

		$strSQL .=" ,phone2 = '".$_POST["txtphone2"]."' ";
		
		$strSQL .=" ,PhoneFax = '".$_POST["txtPhoneFax"]."' ";		
		
		$strSQL .="WHERE Id = '".$_GET["Id"]."' ";

		$objQuery = mysql_query($strSQL);		
	

?>
<a href='contact.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>
</body>
</html>
