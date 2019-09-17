<html>
<head>
<title>Sales Management System</title>
</head>
<body>
<?
include('connect.php');

$strSQL = "DELETE FROM products ";
$strSQL .="WHERE Prod_Id = '".$_GET["Prod_Id"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "Record Deleted successful.";
	echo "<meta http-equiv='refresh' content='2;url=Prod_edit_frm.php' />";
}
else
{
	echo "Error Delete [".$strSQL."]";
}
mysql_close();
?>
</body>
</html>