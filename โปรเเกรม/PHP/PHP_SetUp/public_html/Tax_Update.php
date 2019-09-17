<?php
include("session.php");
?>
<html>
<head>
<title>Sales Management System</title>
</head>
<body>
<?
include('connect.php');
date_default_timezone_set('Asia/Bangkok');
	
$_POST["Tax_Date"] = date("Y-m-d H:i:s");

$strSQL = "UPDATE tax SET ";
$strSQL .="Tax_Id = '".$_POST["Tax_Id"]."' ";
$strSQL .=",Tax_Mon = '".$_POST["Tax_Mon"]."' ";
$strSQL .=",Tax_Rate = '".$_POST["Tax_Rate"]."' ";
$strSQL .=",Tax_Date= '".$_POST["Tax_Date"]."' ";
$strSQL .="WHERE Tax_Id = '".$_POST["Tax_Id"]."' ";

$objQuery = mysql_query($strSQL);
if($objQuery)
{
  echo "Save successful.";
  echo "<meta http-equiv='refresh' content='1;url=Tax_Search.php' />";
}
else
{
  echo "Error Save [".$strSQL."]";
  echo "<meta http-equiv='refresh' content='2;url=User_Update.php' />";
}
mysql_close();
?>
</body>
</html>
