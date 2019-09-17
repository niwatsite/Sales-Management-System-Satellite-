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
	
$_POST["Debtor_Date_Pay"] = date("Y-m-d H:i:s");

if($_POST["CountD"]!=null)
{
$strsUser_Id = $login_User_Id;
$_POST["CountD"]+="1";

$strSQL = "UPDATE debtor SET ";
$strSQL .="Count_Pay = '".$_POST["CountD"]."' ";
$strSQL .=",Debtor_User_ID = '".$strsUser_Id."' ";
$strSQL .=",Debtor_Date_Pay = '".$_POST["Debtor_Date_Pay"]."' ";
$strSQL .="WHERE Order_ID = '".$_POST["Order_Id"]."' ";

$objQuery = mysql_query($strSQL);
if($objQuery)
{
  echo "Save successful.";
  echo "<meta http-equiv='refresh' content='1;url=T_debtor_Search.php' />";
}
else
{
  echo "Error Save [".$strSQL."]";
  echo "<meta http-equiv='refresh' content='2;url=T_debtor_Search.php' />";

}
mysql_close();
}
echo "<meta http-equiv='refresh' content='1;url=T_debtor_Search.php' />";

?>
</body>
</html>
