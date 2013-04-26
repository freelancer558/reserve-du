<?php


	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");
	@mysql_query("SET NAMES UTF8");
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ค้นหาเครื่องมือวิทยาศาสตร์</title>
<link href="table1.css" rel="stylesheet" type="text/css">
<link href="styles_menu.css" rel="stylesheet" type="text/css">
<link href="text1.css" rel="stylesheet" type="text/css" />
<link href="styles_head.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style.css" />
<link href="smooth-php-cal.css" rel="stylesheet" />
<script src="jquery.js" type="text/javascript"></script>
<script src="smooth-php-cal.js" type="text/javascript"></script>

</head>

<body>
<table width="100%" border="0" BORDERCOLOR="CCCCCC"align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="3" scope="col"><img src="images/header.bmp" width="100%" height="100%" /></th>
  </tr>
<?php include('bar/headbar0.php');?>
   <tr>
    <td width="1%" ></td>
    
 <td width="80%" rowspan="8" align="center" valign="top">   <div id="content">


<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="700" border="0">
    <tr>
      <th>Keyword (ชื่อเครื่องมือ)
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
     <input type="image" name="submit" WIDTH="100" HEIGHT="30"src="images/search.bmp"/>
	</th>
    </tr>
  </table>
</form>
<?php
if($_GET["txtKeyword"] != "")
	{
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("project");

	// Search By Name or Email
	$strSQL = "SELECT * FROM durablearticleset WHERE (
	DurableArticleSetThaiName LIKE '%".$_GET["txtKeyword"]."%' 
	or DurableArticleSetEnglishName LIKE '%".$_GET["txtKeyword"]."%' )";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$Num_Rows = mysql_num_rows($objQuery);


	$Per_Page = 10;   // Per Page

	$Page = $_GET["Page"];
	if(!$_GET["Page"])
	{
		$Page=1;
	}

	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;

	$Page_Start = (($Per_Page*$Page)-$Per_Page);
	if($Num_Rows<=$Per_Page)
	{
		$Num_Pages =1;
	}
	else if(($Num_Rows % $Per_Page)==0)
	{
		$Num_Pages =($Num_Rows/$Per_Page) ;
	}
	else
	{
		$Num_Pages =($Num_Rows/$Per_Page)+1;
		$Num_Pages = (int)$Num_Pages;
	}


	$strSQL .=" order  by DurableArticleSetId  LIMIT $Page_Start , $Per_Page";
	$objQuery  = mysql_query($strSQL);

	?>
<table width="900" border="0"  id="box-table-a" >
  <tr>
    <th width="130"> <div align="center">หมายเลขเครื่องมือ</div></th>
    <th width="200"> <div align="center"> </div></th>
    <th width="300"> <div align="center"> </div></th>
	</tr>

<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
<TR>
	<TD><div align="center"><?php echo $objResult["DurableArticleSetNumber"];?></div></TD>
	<TD><img src="myfile/<?php echo $objResult["DurableArticleSetPic"];?>" width="300" height="250"></TD>
	<TD valign="top"><TABLE    valign="top">
	
	<TR>
		<TD  >ชื่อภาษาไทย :</TD>
		<TD ><?php echo $objResult["DurableArticleSetThaiName"];?></TD>
	</TR>

	<TR>
		<TD >ชื่อภาษาอังกฤษ :</TD>
		<TD> <?php echo $objResult["DurableArticleSetEnglishName"];?></TD>
	</TR>
	
	<TR>
		<TD >รุ่น :</TD>
		<TD><?php echo $objResult["DurableArticleSetVersion"];?></TD>
	</TR>

	<TR>
		<TD >สถานะ :</TD>
		<TD><?php echo $objResult["DurableArticleSetStatus"];?></TD>
	</TR>
	
		<TR>
		<TD align="center" colspan="2"> <br>
		
		<a href="durable_detail.php?CusID=<?php echo $objResult["DurableArticleSetId"];?>"><IMG SRC="images/detail.bmp" WIDTH="100" HEIGHT="30" BORDER="0" ALT=""></a>
		
		</TD>

	</TR>

	</TABLE>
	</TD>
</TR>
<?php
}
?>
</table>
	<br>	<br>	<br>
	Total <?php echo  $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
	<?php
	if($Prev_Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&txtKeyword=$_GET[txtKeyword]'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
		if($i != $Page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$_GET[txtKeyword]'>$i</a> ]";
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($Page!=$Num_Pages)
	{
		echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&txtKeyword=$_GET[txtKeyword]'>Next>></a> ";
	}
	
	mysql_close($objConnect);

	}	
	?>




</div></td>   
  </tr>

  


  
<?php include('bar/footer0.php');?>
</body>
</html>
