<html>
<head>
<title>รายงานสรุปการใช้งานเครื่องมือวิทยาศาสตร์</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>
<?php   $date1 = $_POST['date1'];
	   $date2 = $_POST['date2']; 
	    $durable = $_POST['durable']; 
	   ?>

	           <span class="txtBlack16">&nbsp;&nbsp;&nbsp;&nbsp;รายงานสรุปการใช้งานเครื่องมือวิทยาศาสตร์   <?php echo $durable; ?>&nbsp;เริ่มวันที่ 
      <?php echo $date1; ?> 
      ถึง วันที่
      <?php echo $date2; ?><br><br>

<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
//$strSQL = "SELECT * FROM reserve";
$strSQL = "SELECT  * FROM reserve WHERE (Date between '$date1' and '$date2' and status ='approved' and DurableArticleSet = '$durable') order by Date ASC";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="800" border="1" align="center">
  <tr>
    <th width="180"> <div align="center">หมายเลขการจอง </div></th>
    <th width="200"> <div align="center">เครื่องมือวิทยาศาสตร์ </div></th>
	<th width="200"> <div align="center">ชื่อผู้จอง </div></th>
    <th width="198"> <div align="center">วันที่เริ่มจอง </div></th>
    <th width="198"> <div align="center">วันที่สิ้นสุดการจอง </div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td ><div align="center"><?php echo $objResult["ID"];?></div></td>
    <td align="center"><?php echo $objResult["DurableArticleSet"];?></td>
	 <td align="center">
		            <?php 
            $userq = mysql_query('SELECT UserFullname FROM user WHERE UserId = '.$objResult['user_id']);
            $user = mysql_fetch_assoc($userq);
            echo $user['UserFullname'];
            ?>
	</td>
    <td align="center"><?php echo $objResult["Date"];?></td>
    <td align="center"><?php echo $objResult["end_date"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>
</body>
</html>