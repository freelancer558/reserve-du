<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?

		//*** Update Record ***//
		$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
		$objDB = mysql_select_db("project");

		$strSQL = "UPDATE durablearticleset ";
		$strSQL .=" SET DurableArticleSetEnglishName = '".$_POST["txtName"]."' WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";
		$objQuery = mysql_query($strSQL);		
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("myfile/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE durablearticleset ";
			$strSQL .=" SET DurableArticleSetPic = '".$_FILES["filUpload"]["name"]."' WHERE DurableArticleSetId = '".$_GET["DurableArticleSetId"]."' ";
			$objQuery = mysql_query($strSQL);		

			echo "Copy/Upload Complete<br>";

		}
	}
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>
</html>