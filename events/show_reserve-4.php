<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title></title>
</head>
<body>

<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "UPDATE reserve SET ";
$strSQL .="status = '".$_POST["event_status"]."' ";
$strSQL .=",Detail = '".$_POST["detail"]."' ";
$strSQL .="WHERE group_id='".$_POST["group_id"]."' ";
mysql_query("SET NAMES UTF8");
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "Save Done.";
	echo '<br><a href="show_reserve-1.php"> back</a>';
	
}
else
{
	echo "Error Save [".$strSQL."]";
	echo '<br><a href="show_reserve-1.php">back</a>';
}



mysql_close($objConnect);
?>
</body>
</html>