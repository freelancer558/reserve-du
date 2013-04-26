<?php include('h1.php'); ?>
<html>
<?php include_once "connDB.php"; ?>
<head>
<META HTTP-EQUIV="Refresh"CONTENT="2;URL=apply_user.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT * FROM user WHERE UserId = '".$_GET["UseId"]."' ";

$strSQL = "UPDATE user SET Active = 'NoApply' WHERE UserId = '".$_GET["UseId"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{

    $strTo = $objResult["UserEmail"];
    $strSubject = "คำร้องขอบัญชีผู้ใช้ของคุณได้ถูกปฏิเสธ";
    $strHeader = "From: katsuojr0@gmail.com";
    $strMessage = "เนื่องจากคำขอของคุณในการเข้าใช้งานได้ถูกปฏิเสธ <br>
	คุณสามารถส่งคำร้องใหม่ หรือ ติดต่อได้โดยตรงกับเจ้าหน้าที่ <br> เพื่อทำการขอใช้ระบบใหม่<br>ขอบคุณคะ";
    $flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // ใส่ @ = ไม่แสดง errorไว้ //
    if($flgSend)
    {
        echo "<a href='apply_user.php'><center>ทำการบันทึกสำเร็จ
		<br>และทำการส่งอีเมลสำเร็จ
		<br>ระบบจะเปลี่ยนหน้าเองอัตโนมัติ <br> หากระบบไม่เปลี่ยนหน้า กรุณาคลิ๊ก <br> ที่นี้</center></a>";
    }
    else
    {
        echo "ไม่สามารถส่ง email ได้.";
    }

}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>