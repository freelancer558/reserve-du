<?php include('h1.php');?>
<html>
<head>

<title>ข่าวสาร</title>
<META HTTP-EQUIV="Refresh"CONTENT="2;URL=News3.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

</head>

<body>


<?php
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../myfile/".$_FILES["filUpload"]["name"]))
	{
		echo "";

		//*** Insert Record ***//
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");
		$strSQL = "INSERT INTO news ";
		$strSQL .="(NewsHeader,NewsDetail,NewsPic) VALUES ('".$_POST["txtHead"]."','".$_POST["txtDe"]."','".$_FILES["filUpload"]["name"]."')";
		$objQuery = mysql_query($strSQL);		
	}

if($objQuery)
{
	echo "<a href='News3.php'><center>ทำการบันทึกสำเร็จ <br> ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>

</body>
</html>
