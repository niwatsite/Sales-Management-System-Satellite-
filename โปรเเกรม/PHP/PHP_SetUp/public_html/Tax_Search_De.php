<html>
<head>
<title>Sales Management System</title>
</head>
<body>
<?
include('connect.php');

$strSQL = "DELETE FROM tax ";
$strSQL .="WHERE Tax_Id = '".$_GET["Tax_Id"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
  echo "Record Deleted successful.";
  echo "<meta http-equiv='refresh' content='1;url=Tax_Search.php' />";
}
else
{
  echo "Error Delete [".$strSQL."]";
}
mysql_close();
?>
</body>
</html>
