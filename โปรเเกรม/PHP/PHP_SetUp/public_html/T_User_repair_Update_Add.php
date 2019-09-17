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
	
$_POST["Order_Date_Setup"] = date("Y-m-d H:i:s");
$strsUser_Id = $login_User_Id;

$strSQL = "UPDATE repair SET ";
$strSQL .="Repair_Id = '".$_POST["Repair_Id"]."' ";
$strSQL .=",Repair_status_ch = '".$_POST["Repair_status_ch"]."' ";
$strSQL .=",Repair_Date_Setrepair= '".$_POST["Order_Date_Setup"]."' ";
$strSQL .=",Repair_User_Id_Setrepair= '".$strsUser_Id."' ";
$strSQL .="WHERE Repair_Id = '".$_POST["Repair_Id"]."' ";

$objQuery = mysql_query($strSQL);
if($objQuery)
{
  echo "Save successful.";
  echo "<meta http-equiv='refresh' content='1;url=T_User_repair_frm_User.php' />";
}
else
{
  echo "Error Save [".$strSQL."]";
  echo "<meta http-equiv='refresh' content='2;url=T_User_repair_Update.php' />";
}
mysql_close();
?>
</body>
</html>
