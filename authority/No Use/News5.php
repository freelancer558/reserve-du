<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?

		//*** Update Record ***//
		$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");

		$strSQL = "UPDATE news SET";
		$strSQL .=" NewsHeader = '".$_POST["txtHead"]."' ";
		$strSQL .=" ,NewsDetail = '".$_POST["txtDe"]."' ";
		$strSQL .= " WHERE NewsId = '".$_GET["NewsId"]."' ";

		$objQuery = mysql_query($strSQL);		
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("myfile/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE News ";
			$strSQL .=" SET NewsPic = '".$_FILES["filUpload"]["name"]."' WHERE NewsId = '".$_GET["NewsId"]."' ";
			$objQuery = mysql_query($strSQL);		

			echo "Copy/Upload Complete<br>";

		}
	}
?>
<a href="News3.php">View files</a>
</body>
</html>