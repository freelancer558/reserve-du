<?php include_once "connDB.php"; ?>
<?php
if($submit=="OK"){
if($id1==""){
$sql="INSERT  INTO  user set UserId='".$UserId."',UserName='".$UserName."',Password='".$Password."',UserFullname='".$UserFullname."',UserSex='".$UserSex."',UserAddress='".$UserAddress."',UserPhone='".$UserPhone."',UserEmail='".$UserEmail."',UserSSID='".$UserSSID."',UserStatus='".$UserStatus."',FacultyId='".$FacultyId."',DepartmentId='".$DepartmentId."',BranchId='".$BranchId."'";
}else{
$sql="UPDATE user set UserName='".$UserName."',Password='".$Password."',UserFullname='".$UserFullname."',UserSex='".$UserSex."',UserAddress='".$UserAddress."',UserPhone='".$UserPhone."',UserEmail='".$UserEmail."',UserSSID='".$UserSSID."',UserStatus='".$UserStatus."',FacultyId='".$FacultyId."',DepartmentId='".$DepartmentId."',BranchId='".$BranchId."'  WHERE UserId='".$id1."'" ;
}
mysql_query($sql);
}
if ($submit=="DEL"){
$sql="delete from user where UserId ='".$id1."'";
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
if(document.getElementById('UserId').value==""){
alert("กรุณาระบุ UserId ด้วยครับ");
document.getElementById('UserId').focus();
return false;
}
if(document.getElementById('UserName').value==""){
alert("กรุณาระบุ UserName ด้วยครับ");
document.getElementById('UserName').focus();
return false;
}
if(document.getElementById('Password').value==""){
alert("กรุณาระบุ Password ด้วยครับ");
document.getElementById('Password').focus();
return false;
}
if(document.getElementById('UserFullname').value==""){
alert("กรุณาระบุ UserFullname ด้วยครับ");
document.getElementById('UserFullname').focus();
return false;
}
if(document.getElementById('UserStatus').value==""){
alert("กรุณาระบุ UserStatus ด้วยครับ");
document.getElementById('UserStatus').focus();
return false;
}
if(document.getElementById('FacultyId').value==""){
alert("กรุณาระบุ FacultyId ด้วยครับ");
document.getElementById('FacultyId').focus();
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Add User</title>
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>


</head>
<script type='text/javascript' language='javascript' src='date_time/prototype-1.js'></script>
<script type='text/javascript' language='javascript' src='date_time/prototype-date-extensions.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviour.js'></script>
<script type='text/javascript' language='javascript' src='date_time/datepicker.js'></script>
<script type='text/javascript' language='javascript' src='date_time/behaviors.js'></script>
<link rel='stylesheet' href='date_time/datepicker.css'>
<body>
<center>
<div id="container">
<div id="header">
<div id="header_left"></div>
<div id="header_main">ระบบจัดการข้อมูล user</div>
<div id="header_right"></div>
</div>
<div id="content"><br><br>

<?php  if($submit=="" or $show=="OK"){?>
<center><form name="form1" method="post" action="user.php?show=OK&strSearch=Y">
<table width="98%" >
<tr>
<td width="50%"><div align="right">ค้นหา :<select name="Search2">
<option value="UserId" <?php if($Search2=="UserId"){ ?>selected<?php }?>>UserId</option>
<option value="UserName" <?php if($Search2=="UserName"){ ?>selected<?php }?>>UserName</option>
<option value="Password" <?php if($Search2=="Password"){ ?>selected<?php }?>>Password</option>
<option value="UserFullname" <?php if($Search2=="UserFullname"){ ?>selected<?php }?>>UserFullname</option>
<option value="UserStatus" <?php if($Search2=="UserStatus"){ ?>selected<?php }?>>UserStatus</option>
<option value="FacultyId" <?php if($Search2=="FacultyId"){ ?>selected<?php }?>>FacultyId</option>
</select></div>
</td>
<td width="64%"><input name="Search" type="text" size="20" value="<?php echo $Search?>"onFocus="this.value = '';">
<input type="submit" name="submit" value="Search">
</td>
</tr>
</table>
</form></center>

<?php
if(!isset($start)){
$start = 0;
$page=1;
}
$limit = '10';

if($strSearch=="Y"){
$Qtotal = mysql_query("select * from user Where ".$Search2." like '%".$Search."%'  ");
}else{
$Qtotal = mysql_query("select * from user");
}

$total = mysql_num_rows($Qtotal); 
if($strSearch=="Y"){
$Query = mysql_query("select * from user Where ".$Search2." like '%".$Search."%'   order  by  UserId DESC LIMIT $start,$limit");
}else{
$Query= mysql_query("select * from user order  by  UserId DESC LIMIT $start,$limit");
}

$totalp = mysql_num_rows($Query);
$xx=$totalp+$start;
$yy=$start+1;
echo "ข้อมูลที่ ".$yy." ถึงข้อมูลที่ ".$xx;
printf(" | จากทั้งหมด %d รายการ  ",$total);
printf(" | หน้าที่ %d <br />",$page);
?><br><br>

<table width="98%">
<tr bgcolor="#999999" height='40' >
<td align='center'><strong>UserId </strong></td>
<td align='center'><strong>UserName </strong></td>
<td align='center'><strong>Password </strong></td>
<td align='center'><strong>UserFullname </strong></td>
<td align='center'><strong>UserStatus </strong></td>
<td align='center'><strong>Faculty </strong></td>
<td width="8%"><a href="user.php?submit=Add&show="><center><img src="style/images/add.png" border="0"></center></a></td>
</tr>
<?php
while($arr = mysql_fetch_array($Query)){
$autoid = $arr['UserId'];
$i++;
if($i%2==0){
$bg = "#CCCCCC";
}else{
$bg = "#FFFFFF";
}
?>
<tr bgcolor="<?php echo $bg?>" onmouseover="this.style.backgroundColor='#CCFFCC'" onmouseout="this.style.backgroundColor=''" valign="top">
<td align='center'><?php echo $arr['UserId'] ?></td>
<td align='center'><?php echo $arr['UserName'] ?></td>
<td align='center'><?php echo $arr['Password'] ?></td>
<td align='center'><?php echo $arr['UserFullname'] ?></td>
<td align='center'><?php echo $arr['UserStatus'] ?></td>
<td align='center'><?php echo $arr['FacultyId'] ?></td>
<td align="center">
<a href="user.php?submit=DEL&show=OK&id1=<?php echo $autoid;?>" OnClick="return chkdel();"><img src="style/images/-.png" border="0"></a>&nbsp;
<a href="user.php?submit=Edit&id1=<?php echo $autoid;?>"><img src="style/images/Tools.png" border="0"></a></td>
</tr>
<?php }?>
</table>

<?php }?>

<?php  if($submit=="Add"){?>
<form action="user.php?submit=OK&show=OK&id1=" method="post"onSubmit="return Check_txt()" enctype='multipart/form-data'>
<table width="98%">

<tr>
<td width='30%'  align='right'>UserName : </td>
<td width='70%'><input name='UserName' id='UserName' type='text' size='50'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>Password : </td>
<td width='70%'><input name='Password' id='Password' type='password' size='50'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>UserFullname : </td>
<td width='70%'><input name='UserFullname' id='UserFullname' type='text' size='50'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>UserSex : </td>
<td width='70%'>
<input  name='UserSex'  type='radio' value='male'> male
<input  name='UserSex'  type='radio' value='female'> female
</td>
</tr>
<tr>
<td width='30%'  align='right'>UserAddress : </td>
<td width='70%'><input name='UserAddress' id='UserAddress' type='text' size='50'></td>
</tr>
<tr>
<td width='30%'  align='right'>UserPhone : </td>
<td width='70%'><input name='UserPhone' id='UserPhone' type='text' size='50' onKeyUp="if(this.value*1!=this.value) this.value='' ;"></td>
</tr>
<tr>
<td width='30%'  align='right'>UserEmail : </td>
<td width='70%'><input name='UserEmail' id='UserEmail' type='text' size='50'></td>
</tr>
<tr>
<td width='30%'  align='right'>UserSSID : </td>
<td width='70%'><input name='UserSSID' id='UserSSID' type='text' size='50' onKeyUp="if(this.value*1!=this.value) this.value='' ;"></td>
</tr>
<tr>
<td width='30%'  align='right'>UserStatus : </td>
<td width='70%'><select name='UserStatus' id='UserStatus'>
<option value='User'>user</option>
<option value='Authority'>authority</option>
</select>
 * </td>
</tr>
<tr>
<td width='30%'  align='right'>FacultyId : </td>
<td width='70%'><select name='FacultyId' id='FacultyId'>
<?php
$rstTemp=mysql_query('select * from faculty');
while($arr_2=mysql_fetch_array($rstTemp)){
?>
<option value="<?php echo $arr_2['FacultyId']?>"><?php echo $arr_2['FacultyThaiName']?></option>
<?php }?>
</select>
 * </td>
</tr>
<tr>
<td width='30%'  align='right'>DepartmentId : </td>
<td width='70%'><select name='DepartmentId' id='DepartmentId'>
<?php
$rstTemp=mysql_query('select * from department');
while($arr_2=mysql_fetch_array($rstTemp)){
?>
<option value="<?php echo $arr_2['DepartmentId']?>"><?php echo $arr_2['DepartmentThaiName']?></option>
<?php }?>
</select>
</td>
</tr>
<tr>
<td width='30%'  align='right'>BranchId : </td>
<td width='70%'><select name='BranchId' id='BranchId'>
<?php
$rstTemp=mysql_query('select * from branch');
while($arr_2=mysql_fetch_array($rstTemp)){
?>
<option value="<?php echo $arr_2['BranchId']?>"><?php echo $arr_2['BranchThaiName']?></option>
<?php }?>
</select>
</td>
</tr>
<tr height='50'>
<td></td>
<td align='left' valign='middle'><input type='submit' name='Submit' value='   บันทึก   '> <input type='reset' name='Submit2' value='ล้างข้อมูล'> <input type='button' name='Submit222' value='   ยกเลิก   ' onclick="document.location.href='user.php?show=OK'"></td>
</tr>
</table>
</form>
<?php }?>


<?php  if($submit=="Edit"){
$sql="select * from user  where UserId ='".$id1."'  ";
$tem = mysql_query($sql);
$row3=mysql_fetch_array($tem);
?>

<form action="user.php?submit=OK&show=OK&id1=<?php echo $id1?>" method="post"onSubmit="return Check_txt();" enctype='multipart/form-data'>
<input type='hidden' name='UserId' value="<?php echo $row3['UserId']?>">
<table width="98%">
<tr>
<td width='30%'  align='right'>UserId : </td>
<td width='70%'><input name='UserId' id='UserId' type='text' size='50' onKeyUp="if(this.value*1!=this.value) this.value='' ;" value='<?php echo $row3["UserId"]?>'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>UserName : </td>
<td width='70%'><input name='UserName' id='UserName' type='text' size='50' value='<?php echo $row3["UserName"]?>'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>Password : </td>
<td width='70%'><input name='Password' id='Password' type='text' size='50' value='<?php echo $row3["Password"]?>'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>UserFullname : </td>
<td width='70%'><input name='UserFullname' id='UserFullname' type='text' size='50' value='<?php echo $row3["UserFullname"]?>'> * </td>
</tr>
<tr>
<td width='30%'  align='right'>UserSex : </td>
<td width='70%'>
<input  name='UserSex'  type='radio' value='male' <?php if($row3['UserSex']=='male') echo 'checked';?>> male
<input  name='UserSex'  type='radio' value='female' <?php if($row3['UserSex']=='female') echo 'checked';?>> female
</td>
</tr>
<tr>
<td width='30%'  align='right'>UserAddress : </td>
<td width='70%'><input name='UserAddress' id='UserAddress' type='text' size='50' value='<?php echo $row3["UserAddress"]?>'></td>
</tr>
<tr>
<td width='30%'  align='right'>UserPhone : </td>
<td width='70%'><input name='UserPhone' id='UserPhone' type='text' size='50' onKeyUp="if(this.value*1!=this.value) this.value='' ;" value='<?php echo $row3["UserPhone"]?>'></td>
</tr>
<tr>
<td width='30%'  align='right'>UserEmail : </td>
<td width='70%'><input name='UserEmail' id='UserEmail' type='text' size='50' value='<?php echo $row3["UserEmail"]?>'></td>
</tr>
<tr>
<td width='30%'  align='right'>UserSSID : </td>
<td width='70%'><input name='UserSSID' id='UserSSID' type='text' size='50' onKeyUp="if(this.value*1!=this.value) this.value='' ;" value='<?php echo $row3["UserSSID"]?>'></td>
</tr>
<tr>
<td width='30%'  align='right'>UserStatus : </td>
<td width='70%'><select name='UserStatus' id='UserStatus'>
<option value='User' <?php if($row3['UserStatus']=='User') echo 'selected';?>>user</option>
<option value='Authority' <?php if($row3['UserStatus']=='Authority') echo 'selected';?>>authority</option>
</select>
 * </td>
</tr>
<tr>
<td width='30%'  align='right'>FacultyId : </td>
<td width='70%'><select name='FacultyId' id='FacultyId'>
<?php
$rstTemp=mysql_query('select * from faculty');
while($arr_2=mysql_fetch_array($rstTemp)){
?>
<option value="<?php echo $arr_2['FacultyId']?>" <?php if($row3["FacultyId"]==$arr_2['FacultyId']) echo 'selected'; ?>><?php echo $arr_2['FacultyThaiName']?></option>
<?php }?>
</select>
 * </td>
</tr>
<tr>
<td width='30%'  align='right'>DepartmentId : </td>
<td width='70%'><select name='DepartmentId' id='DepartmentId'>
<?php
$rstTemp=mysql_query('select * from department');
while($arr_2=mysql_fetch_array($rstTemp)){
?>
<option value="<?php echo $arr_2['DepartmentId']?>" <?php if($row3["DepartmentId"]==$arr_2['DepartmentId']) echo 'selected'; ?>><?php echo $arr_2['DepartmentThaiName']?></option>
<?php }?>
</select>
</td>
</tr>
<tr>
<td width='30%'  align='right'>BranchId : </td>
<td width='70%'><select name='BranchId' id='BranchId'>
<?php
$rstTemp=mysql_query('select * from branch');
while($arr_2=mysql_fetch_array($rstTemp)){
?>
<option value="<?php echo $arr_2['BranchId']?>" <?php if($row3["BranchId"]==$arr_2['BranchId']) echo 'selected'; ?>><?php echo $arr_2['BranchThaiName']?></option>
<?php }?>
</select>
</td>
</tr>
<tr height="50">
<td></td>
<td><input type="submit" name="Submit" value="   บันทึก   "> <input type="button" name="Submit222" value="   ยกเลิก   " onclick="document.location.href='user.php?show=OK'"></td>
</tr>
</table>
</form>
<?php }?>

</div>
<div id="footer">
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
</center>
</body>

