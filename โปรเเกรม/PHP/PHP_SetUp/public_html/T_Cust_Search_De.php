<html>
<head>
<title>Sales Management System</title>
</head>
<body>
<?
include('connect.php');

$strSQL = "DELETE FROM customers ";
$strSQL .="WHERE Cust_Id = '".$_GET["Cust_Id"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "Record Deleted successful.";
	echo "<meta http-equiv='refresh' content='1;url=T_Cust_Search.php' />";
}
else
{
	echo "Error Delete [".$strSQL."]";
	echo "<meta http-equiv='refresh' content='2;url=T_Cust_Search.php' />";
}
mysql_close();
?>
</body>
</html>