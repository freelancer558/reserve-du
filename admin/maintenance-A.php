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


<?php include_once "connDB.php"; ?>
<?php
if($submit=="OK"){
if($id1==""){
$sql="INSERT  INTO  maintenance set MaintenanceId='".$MaintenanceId."',MaintenanceDetail='".$MaintenanceDetail."',MaintenanceNext='".$MaintenanceNext."',MaintenanceCharges='".$MaintenanceCharges."',MaintenanceDetailCharges='".$MaintenanceDetailCharges."',MaintenanceStatus='".$MaintenanceStatus."',MaintenanceType='".$MaintenanceType."',MaintenanceDate='".$MaintenanceDate."',UserId='".$UserId."',DurableArticleSetId='".$DurableArticleSetId."'";
}else{
$sql="UPDATE maintenance set MaintenanceDetail='".$MaintenanceDetail."',MaintenanceNext='".$MaintenanceNext."',MaintenanceCharges='".$MaintenanceCharges."',MaintenanceDetailCharges='".$MaintenanceDetailCharges."',MaintenanceStatus='".$MaintenanceStatus."',MaintenanceType='".$MaintenanceType."',MaintenanceDate='".$MaintenanceDate."',UserId='".$UserId."',DurableArticleSetId='".$DurableArticleSetId."'  WHERE MaintenanceId='".$id1."'" ;
}
mysql_query($sql);
}
if ($submit=="DEL"){
$sql="delete from maintenance where MaintenanceId ='".$id1."'";
mysql_query($sql);
}
?>
<script language="JavaScript">
function chkdel(){
if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  ')){
return true;
}else{
return false;
}
}

function Check_txt(){
if(document.getElementById('MaintenanceId').value==""){
alert("กรุณาระบุ MaintenanceId ด้วยครับ");
document.getElementById('MaintenanceId').focus();
return false;
}
if(document.getElementById('MaintenanceDetail').value==""){
alert("กรุณาระบุ MaintenanceDetail ด้วยครับ");
document.getElementById('MaintenanceDetail').focus();
return false;
}
if(document.getElementById('MaintenanceCharges').value==""){
alert("กรุณาระบุ MaintenanceCharges ด้วยครับ");
document.getElementById('MaintenanceCharges').focus();
return false;
}
if(document.getElementById('MaintenanceStatus').value==""){
alert("กรุณาระบุ MaintenanceStatus ด้วยครับ");
document.getElementById('MaintenanceStatus').focus();
return false;
}
if(document.getElementById('MaintenanceType').value==""){
alert("กรุณาระบุ MaintenanceType ด้วยครับ");
document.getElementById('MaintenanceType').focus();
return false;
}
if(document.getElementById('MaintenanceDate').value==""){
alert("กรุณาระบุ MaintenanceDate ด้วยครับ");
document.getElementById('MaintenanceDate').focus();
return false;
}
if(document.getElementById('DurableArticleSetId').value==""){
alert("กรุณาระบุ DurableArticleSetId ด้วยครับ");
document.getElementById('DurableArticleSetId').focus();
return false;
}
}
function isEmail(str) {
var supported = 0;
if (window.RegExp) {
var tempStr = 'a';
var tempReg = new RegExp(tempStr);
if (tempReg.test(tempStr)) supported = 1;
 }
if (!supported)
return (str.indexOf('.') > 2) && (str.indexOf('@') > 0);
var r1 = new RegExp('(@.*@)|(\\.\\.)|(@\\.)|(^\\.)');
var r2 = new RegExp('^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$');
return (!r1.test(str) && r2.test(str));
}

</script>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Add Maintenance Page</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>
<style type="text/css">
a{
text-decoration:none;
}
</style>
</head>


<script type='text/javascript' language='javascript' src='date_time/prototype-1.js'></script>
<script type='text/javascript' language='javascript' src='date_time/prototype-date-extensions.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviour.js'></script>
<script type='text/javascript' language='javascript' src='date_time/datepicker.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviors.js'></script>
<link rel='stylesheet' href='date_time/datepicker.css'>


<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>

<?php include('headbar3.php');?>

  <tr>
 <td width="1%" BGCOLOR="#FFFF99" style="color:#330000"> <div id="menu_bar"> <center>ข้อมูล ผู้ดูแลระบบ</center></td>
    
	 <div id="content">
 <td width="80%" rowspan="8" align="center" valign="top"> 
 
 
 <?php  if($submit=="" or $show=="OK"){?>
<center><form name="form1" method="post" action="maintenance-A.php?show=OK&strSearch=Y">

</form></center>

<?php
if(!isset($start)){
$start = 0;
$page=1;
}
$limit = '10';

if($strSearch=="Y"){
$Qtotal = mysql_query("select * from maintenance Where ".$Search2." like '%".$Search."%'  ");
}else{
$Qtotal = mysql_query("select * from maintenance");
}

$total = mysql_num_rows($Qtotal); 
if($strSearch=="Y"){
$Query = mysql_query("select * from maintenance Where ".$Search2." like '%".$Search."%'   order  by  MaintenanceId DESC LIMIT $start,$limit");
}else{
$Query= mysql_query("select * from maintenance order  by  MaintenanceId  LIMIT $start,$limit");
}

$totalp = mysql_num_rows($Query);
$xx=$totalp+$start;
$yy=$start+1;
echo "ข้อมูลที่ ".$yy." ถึงข้อมูลที่ ".$xx;
printf(" | จากทั้งหมด %d รายการ  ",$total);
printf(" | หน้าที่ %d <br />",$page);
?><br><br>

<table width="98%" id="box-table-a">
<tr bgcolor="#999999" height='40' >
<th align='center'><strong>MaintenanceId </strong></th>
<th align='center'><strong>MaintenanceDetail </strong></th>
<th align='center'><strong>MaintenanceCharges </strong></th>
<th align='center'><strong>MaintenanceStatus </strong></th>
<th align='center'><strong>MaintenanceType </strong></th>
<th align='center'><strong>MaintenanceDate </strong></th>
<th align='center'><strong>DurableArticleSetId </strong></th>
<th width="8%"><a href="maintenance-A.php?submit=Add&show="><center><img src="images/add.png" border="0"></center></a></th>
</tr>
<?php
while($arr = mysql_fetch_array($Query)){
$autoid = $arr['MaintenanceId'];
$i++;
if($i%2==0){
$bg = "#CCCCCC";
}else{
$bg = "#FFFFFF";
}
?>
<tr bgcolor="<?php echo $bg?>" onmouseover="this.style.backgroundColor='#CCFFCC'" onmouseout="this.style.backgroundColor=''" valign="top">
<td align='center'><?php echo $arr['MaintenanceId'] ?></td>
<td align='center'><?php echo $arr['MaintenanceDetail'] ?></td>
<td align='center'><?php echo $arr['MaintenanceCharges'] ?></td>
<td align='center'><?php echo $arr['MaintenanceStatus'] ?></td>
<td align='center'><?php echo $arr['MaintenanceType'] ?></td>
<td align='center'><?php echo $arr['MaintenanceDate'] ?></td>
<td align='center'>

<?php
$facid = $objResult["DurableArticleSetId"];
	$strSQL2 = "SELECT DurableArticleSetThaiName FROM durablearticleset WHERE DurableArticleSetId =' ".$facid." ' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2))
	{
	?>
		<td><div align="center"><?php echo $objResult2["DurableArticleSetThaiName"];?></div></td>
<?php
	}
	?>
</td>
<td align="center">
<a href="maintenance-A.php?submit=DEL&show=OK&id1=<?php echo $autoid;?>" OnClick="return chkdel();"><img src="images/-.png" border="0"></a>&nbsp;
<a href="maintenance-A.php?submit=Edit&id1=<?php echo $autoid;?>"><img src="images/Tools.png" border="0"></a></td>
</tr>
<?php }?>
</table>

<?php }?>

<?php  if($submit=="Add"){?>
<form action="maintenance-A.php?submit=OK&show=OK&id1=" method="post"onSubmit="return Check_txt()" enctype='multipart/form-data'>
<table width="98%">

<tr>
<td width='30%'  align='right'>รายละเอียด : </td>
<td width='70%'><input name='MaintenanceDetail' id='MaintenanceDetail' type='text' size='50'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>วันที่ซ่อมบำรุงครั้งถัดไป : </td>
<td width='70%'><input  name='MaintenanceNext' id='MaintenanceNext' class='datepicker'>  </td>
</tr>
<tr>
<td width='30%'  align='right'>ค่าใช้จ่ายในการซ่อมบำรุง : </td>
<td width='70%'><input name='MaintenanceCharges' id='MaintenanceCharges' type='text' size='50' onKeyUp="if(this.value*1!=this.value) this.value='' ;"> * </td>
</tr>
<tr>
<td width='30%'  align='right'>รายละเอียดค่าใช้จ่าย : </td>
<td width='70%'><input name='MaintenanceDetailCharges' id='MaintenanceDetailCharges' type='text' size='50'></td>
</tr>
<tr>
<td width='30%'  align='right'>สถานะการซ่อมบำรุง : </td>
<td width='70%'><select name='MaintenanceStatus' id='MaintenanceStatus'>
<option value=''></option>
<option value='รอการส่งซ่อม'>รอการส่งซ่อม</option>
<option value='อยู่ในระยะการซ่อม'>อยู่ในระยะการซ่อม</option>
<option value='ได้รับอุปกรณ์คืนแล้ว'>ได้รับอุปกรณ์คืนแล้ว</option>
</select>
 * </td>
</tr>
<tr>
<td width='30%'  align='right'>ประเภทการซ่อมบำรุง : </td>
<td width='70%'><select name='MaintenanceType' id='MaintenanceType'>
<option value=''></option>
<option value='ชำรุดจากการใช้งาน'>ชำรุดจากการใช้งาน</option>
<option value='ซ่อมบำรุงตามระยะ'>ซ่อมบำรุงตามระยะ</option>
</select>
 * </td>
</tr>
<tr>
<td width='30%'  align='right'>วันที่ทำการบำรุงรักษา : </td>
<td width='70%'><input  name='MaintenanceDate' id='MaintenanceDate' class='datepicker'> * </td>
</tr>

<tr>
<td width='30%'  align='right'>ชื่อเครื่องมือ : </td>
<td width='70%'>

<select id="DurableArticleSetId" name="DurableArticleSetId" >
	<option selected value=""></option>
	<?php
	$strSQL = "SELECT * FROM durablearticleset ORDER BY DurableArticleSetId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["DurableArticleSetId"];?>"><?php echo $objResult["DurableArticleSetThaiName"];?></option>
<?php }?>
</select>

 * </td>
</tr>
<tr height='50'>
<td></td>
<td align='left' valign='middle'><input type='submit' name='Submit' value='   บันทึก   '> <input type='reset' name='Submit2' value='ล้างข้อมูล'> <input type='button' name='Submit222' value='   ยกเลิก   ' onclick="document.location.href='show_maintenance-A.php?show=OK'"></td>
</tr>
</table>
</form>
<?php }?>


<?php  if($submit=="Edit"){
$sql="select * from maintenance  where MaintenanceId ='".$id1."'  ";
$tem = mysql_query($sql);
$row3=mysql_fetch_array($tem);
?>

<form action="maintenance-A.php?submit=OK&show=OK&id1=<?php echo $id1?>" method="post"onSubmit="return Check_txt();" enctype='multipart/form-data'>
<input type='hidden' name='MaintenanceId' value="<?php echo $row3['MaintenanceId']?>">
<table width="98%">
<tr>
<td width='30%'  align='right'>Id : </td>
<td width='70%'><input name='MaintenanceId' id='MaintenanceId' type='text' size='50' value='<?php echo $row3["MaintenanceId"]?>' disabled> * </td>
</tr>
<tr>
<td width='30%'  align='right'>รายละเอียด : </td>
<td width='70%'><input name='MaintenanceDetail' id='MaintenanceDetail' type='text' size='50' value='<?php echo $row3["MaintenanceDetail"]?>'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>ซ่อมบำรุงครั้งถัดไป : </td>
<td width='70%'><input name='MaintenanceNext' id='MaintenanceNext' type='text' size='50' value='<?php echo $row3["MaintenanceNext"]?>'></td>
</tr>
<tr>
<td width='30%'  align='right'>ค่าใช้จ่าย : </td>
<td width='70%'><input name='MaintenanceCharges' id='MaintenanceCharges' type='text' size='50' onKeyUp="if(this.value*1!=this.value) this.value='' ;" value='<?php echo $row3["MaintenanceCharges"]?>'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>รายละเอียดค่าใช้จ่าย : </td>
<td width='70%'><input name='MaintenanceDetailCharges' id='MaintenanceDetailCharges' type='text' size='50' value='<?php echo $row3["MaintenanceDetailCharges"]?>'></td>
</tr>
<tr>
<td width='30%'  align='right'>สถานะการบำรุง : </td>
<td width='70%'><select name='MaintenanceStatus' id='MaintenanceStatus'>
<option value='' <?php if($row3['MaintenanceStatus']=='') echo 'selected';?>></option>
<option value='รอการส่งซ่อม' <?php if($row3['MaintenanceStatus']=='รอการส่งซ่อม') echo 'selected';?>>รอการส่งซ่อม</option>
<option value='อยู่ในระยะการซ่อม' <?php if($row3['MaintenanceStatus']=='อยู่ในระยะการซ่อม') echo 'selected';?>>อยู่ในระยะการซ่อม</option>
<option value='ได้รับอุปกรณ์คืนแล้ว' <?php if($row3['MaintenanceStatus']=='ได้รับอุปกรณ์คืนแล้ว') echo 'selected';?>>ได้รับอุปกรณ์คืนแล้ว</option>
</select>
 * </td>
</tr>
<tr>
<td width='30%'  align='right'>ประเภทการบำรุง : </td>
<td width='70%'><select name='MaintenanceType' id='MaintenanceType'>
<option value='' <?php if($row3['MaintenanceType']=='') echo 'selected';?>></option>
<option value='ชำรุดจากการใช้งาน' <?php if($row3['MaintenanceType']=='ชำรุดจากการใช้งาน') echo 'selected';?>>ชำรุดจากการใช้งาน</option>
<option value='ซ่อมบำรุงตามระยะ' <?php if($row3['MaintenanceType']=='ซ่อมบำรุงตามระยะ') echo 'selected';?>>ซ่อมบำรุงตามระยะ</option>
</select>
 * </td>
</tr>
<tr>
<td width='30%'  align='right'>วันที่บำรุง : </td>
<td width='70%'><input  name='MaintenanceDate' id='MaintenanceDate' class='datepicker' value='<?php echo $row3["MaintenanceDate"]?>'> * </td>
</tr>

</tr>
<tr>
<td width='30%'  align='right'>อุปกรณ์ : </td>
<td width='70%'>
<select id="DurableArticleSetId" name="DurableArticleSetId" onChange = "ListProvince(this.value)">
	<option selected value=""></option>
	<?php
	$strSQL = "SELECT * FROM durablearticleset ORDER BY FacultyId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["DurableArticleSetId"];?>"><?php echo $objResult["DurableArticleSetThaiName"];?></option>


<?php }?>




</select>
 * </td>
</tr>
<tr height="50">
<td></td>
<td><input type="submit" name="Submit" value="   บันทึก   "> <input type="button" name="Submit222" value="   ยกเลิก   " onclick="document.location.href='maintenance-A.php?show=OK'"></td>
</tr>
</table>
</form>
<?php }?>

</div>
<div id="">
<?php if($submit=="" or $show=="OK"){
$page = ceil($total/$limit);
for($i=1;$i<=$page;$i++){
if($_GET['page']==$i){
echo "[<a href='?start=".$limit*($i-1)."&page=$i&strSearch=$strSearch&Search=$Search&Search2=$Search2'><B>$i</B></A>]";
}else{
echo "[<a href='?start=".$limit*($i-1)."&page=$i&strSearch=$strSearch&Search=$Search&Search2=$Search2'>$i</A>]";
}}} ?>
</div>
</div>
 
 
 



</div></td>   
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






<?php include('footer.php');?>
</body>
</html>