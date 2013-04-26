<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
</head>
<body>

<?php
require('fpdf.php');
	define('FPDF_FONTPATH','font/');

class PDF extends FPDF
{
//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{
	//Header
	$w=array(30,30,55,25,20,20);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 
	{
		$this->Cell(30,6,$eachResult["CustomerID"],1);
		$this->Cell(30,6,$eachResult["Name"],1);
		$this->Cell(55,6,$eachResult["Email"],1);
		$this->Cell(25,6,$eachResult["CountryCode"],1,0,'C');
		$this->Cell(20,6,$eachResult["Budget"],1);
		$this->Cell(20,6,$eachResult["Budget"],1);
		$this->Ln();
	}
}

//Better table
function ImprovedTable($header,$data)
{
	//Column widths
	$w=array(20,30,55,25,25,25);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data






	//Closure line
	$this->Cell(array_sum($w),0,'','T');
}

//Colored table
function FancyTable($header,$data)
{
	//Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('angsa','',20);;
	//Header
	$w=array(20,30,45,20,30,25,25);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	//Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('angsa');
	//Data
	$fill=false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		$this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
		$this->Cell($w[4],6,($row[4]),'LR',0,'C',$fill);
		$this->Cell($w[5],6,($row[5]),'LR',0,'C',$fill);
		$this->Cell($w[6],6,($row[6]),'LR',0,'C',$fill);
		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF();
//Column titles
$header=array('UserId','UserName','UserFullname','UserSex','UserStatus','FacultyId','DepartmentId');
//Data loading

//*** Load MySQL Data ***//
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("project");
$strSQL = "SELECT `user`.`UserId`, `user`.`UserName`, `user`.`UserFullname`, `user`.`UserSex`, `user`.`UserStatus`, `user`.`FacultyId` , `user`.`DepartmentId` FROM user";
$objQuery = mysql_query($strSQL);
@mysql_query("set NAMES'utf8'");
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//





//*** Table 3 ***//

$pdf->AddPage();
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',20);
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ตารางการออกรายงาน  : สมาชิกผู้ใช้งาน'),0,1,"C");
$pdf->Ln(10);
$pdf->FancyTable($header,$resultData);

$pdf->Output("MyPDF/MyPDF.pdf","F");
$pdf=new FPDF();
?>

PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>