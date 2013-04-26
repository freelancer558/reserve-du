<html>
<?php include_once "connDB.php"; ?>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
	<form name="form1" method="post" action="PageUploadToMySQL2.php" enctype="multipart/form-data">


<tr>
    <th width="80"> <div align="left">หมายเลขอุปกรณ์ : </div></th>
<td><input type="text" name="txtDurableArticleSetNumber" size="20" ></td>
</tr>

<tr>
    <th width="50"> <div align="left">ชื่อภาษาไทย :  </div></th>
   <td><input type="text" name="txtPassword" size="20" ></td>
   </tr>


<tr>
    <th width="50"> <div align="left">ชื่อภาษาอังกฤษ :  </div></th>		  
	 <td><div align=""><input type="text" name="txtName" size="30" >
	</div></td>
	</tr>

<tr>
	<th width="40"> <div align="left">รุ่น :  </div></th>
	 <td><div align=""><input type="text" name="txtDurableArticleSetVersion" size="30" >
	</div></td>

</tr>

<tr>
    <th width="90"> <div align="left">รายละเอียด : </div></th>
<td >
<input type="text" name="txtDurableArticleSetDetail" size="50">
</td>
</tr>

<tr>
	    <th width="40"> <div align="left">รูป :  </div></th>
<td align="">
	<input type="file" name="filUpload"><br>
</td>
</tr>

<tr>
    <th width="40"> <div align="left">วิธีใช้ :  </div></th>
<td align=""><input type="text" name="txtDurableArticleSetHowToUse" size="40" ></td>
</tr>

<tr>
	    <th width="40"> <div align="left">วันที่ซื้อ :  </div></th>
<td align=""><input type="text" name="txtDurableArticleSetBuyDate" size="20" ></td>
</tr>

<tr>
    <th width="40"> <div align="left">ประเภทอุปกรณ์ :  </div></th>
	<td align=""><select name='txtDurableArticleSetType' id='DurableArticleSetType'>
<option value='อุปกรณ์กลาง'>อุปกรณ์กลาง</option>
<option value='อุปกรณ์เฉพาะ'>อุปกรณ์เฉพาะ</option>
</select></td>
	</tr>

<tr>
    <th width="40"> <div align="left">สถานะอุปกรณ ์ :</div></th>
<td>
	<select name='txtDurableArticleSetStatus' id='DurableArticleSetStatus'>
<option value='พร้อมใช้งาน'>พร้อมใช้งาน</option>
<option value='บำรุงรักษา'>บำรุงรักษา</option>
</select></td>
</tr>

<tr>
	    <th width="40"> <div align="left">ตั้งอยู่ที่ห้อง : </div></th>
<td align=""><input type="text" name="txtDurableArticleSetAtRoom" size="20" ></td>
  </tr>

<tr>
	    <th width="40"> <div align="left">ระยะประกัน : </div></th>
<td align=""><input type="text" name="txtVouchDate" size="20" >*ปี</td>
  </tr>


<tr>
	    <th width="40"> <div align="left">ปีงบประมาณ : </div></th>
<td align=""><input type="text" name="txtProcurementBudgetYear" size="20" ></td>
  </tr>

  <tr>
	    <th width="40"> <div align="left">ประเภทงบประมาณ :  </div></th>
<td><select name='txtProcumentBudgetType' id='ProcumentBudgetType'>
<option value='งบประมาณแผ่นดิน'>งบประมาณแผ่นดิน</option>
<option value='งบประมาณคณะ'>งบประมาณคณะ</option>
</select></td>
  </tr>

  <tr>
	    <th width="40"> <div align="left">บริษัท : </div></th>
		<td>
<select id="company" name="txtCompanyId" style="width:200px">
	<?php
	$strSQL = "SELECT * FROM company ORDER BY CompanyId ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<option value="<?php echo $objResult["CompanyId"];?>"><?php echo $objResult["CompanyName"];?></option>
	<?php
	}
	?>
	</select></td>
  </tr>

	<input name="btnSubmit" type="submit" value="Submit">
	</form>
</body>
</html>