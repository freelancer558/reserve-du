<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$strSQL = "SELECT * FROM user WHERE UserId = '".$_SESSION['UserId']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<html>
<?php include_once "connDB.php"; ?>
<head>
<META HTTP-EQUIV="Refresh"CONTENT=";URL=apply_user.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");

$strSQL = "UPDATE user SET ";
$strSQL .=" UserStatus = '".$_POST["txtEditUserStatus"]." ' ";
$strSQL .= ",Active = 'Yes' " ;
$strSQL .="WHERE UserId = '".$_GET["UseId"]." ' ";


$objQuery = mysql_query($strSQL);
if($objQuery)
{

    $strTo = $objResult["UserEmail"];
    $strSubject = "ทำการอนุมัติบัญชีผู้ใช้งานเรียบร้อย";
    $strHeader = "From: webmaster@reserve-du.com";
    $strMessage = "ได้ถูกทำการอนุมัติรายการขอใช้ บัญชี ของคุณเรียบร้อย  <br>
	คุณสามารถเข้าใช้งานเว็ปไซส์ได้แล้วคะ <br> ขอบคุณคะ";
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