<html>
<head>
<title>Sales Management System</title>
</head>
<body>
<?
include('connect.php');
$User_Status_Admin  =  "0";

		$strSQL = "DELETE FROM employee ";
		$strSQL .="WHERE User_Id = '".$_GET["User_Id"]."'and User_Status_Admin != '".$User_Status_Admin."'";
		$objQuery = mysql_query($strSQL);

					  if($objQuery)
					  {
					  		if($User_Status_Admin != "0")
							{
						  	echo "Record Deleted successful.";
						 	 	echo "<meta http-equiv='refresh' content='1;url=User_Search.php' />";
							}
					  }
					  else{
						  echo "Error Delete [".$strSQL."]";

					  }
					 // echo "Can not Delete Admin.";
					  echo "<meta http-equiv='refresh' content='1;url=User_Search.php' />";
mysql_close();
?>
</body>
</html>
