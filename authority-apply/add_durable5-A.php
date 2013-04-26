<?php include('h1.php'); ?>


<html>
<?php include_once "connDB.php"; ?>

<head>

<META HTTP-EQUIV="Refresh"CONTENT="2;URL=durablearticleset-A.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>



</head>


<body>
<form action="add_durable_save-A.php?UseId=<?php echo $_GET["DruId"];?>" name="frmEdit" method="post">

<body>

  



<?php

		//*** Update Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");

		$strSQL = "UPDATE  durablearticleset SET";

		$strSQL .="WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";

		$objQuery = mysql_query($strSQL);		
	

		if($_FILES["txtDurableArticleSetHowToUse"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["txtDurableArticleSetHowToUse"]["tmp_name"],"../myfile/".$_FILES["txtDurableArticleSetHowToUse"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("../myfile/".$_POST["hdnOldFile2"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE durablearticleset ";
			$strSQL .=" SET DurableArticleSetHowtoUse = '".$_FILES["txtDurableArticleSetHowToUse"]["name"]."' WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";
			$objQuery = mysql_query($strSQL);		

			echo ".<br>";

		}
	}

?>
<a href='durablearticleset-A.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>
</body>
</html>
