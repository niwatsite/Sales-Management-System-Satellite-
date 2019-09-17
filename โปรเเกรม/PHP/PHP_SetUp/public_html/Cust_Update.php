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

$strSQL = "UPDATE customers SET ";
$strSQL .="Cust_Id = '".$_POST["Cust_Id"]."' ";
$strSQL .=",Cust_Fname = '".$_POST["Cust_Fname"]."' ";
$strSQL .=",Cust_Lname = '".$_POST["Cust_Lname"]."' ";
$strSQL .=",Cust_Number = '".$_POST["Cust_Number"]."' ";
$strSQL .=",Cust_Id_Current = '".$_POST["Cust_Id_Current"]."' ";
$strSQL .=",Cust_Moo = '".$_POST["Cust_Moo"]."' ";
$strSQL .=",Cust_Road = '".$_POST["Cust_Road"]."' ";
$strSQL .=",Cust_District = '".$_POST["Cust_District"]."' ";
$strSQL .=",Cust_Prefecture = '".$_POST["Cust_Prefecture"]."' ";
$strSQL .=",Cust_Province = '".$_POST["Cust_Province"]."' ";
$strSQL .=",Cust_Code = '".$_POST["Cust_Code"]."' ";
$strSQL .=",StoreLati	= '".$_POST["StoreLati"]."' ";
$strSQL .=",StoreLongi = '".$_POST["StoreLongi"]."' ";
$strSQL .=",Cust_Tel = '".$_POST["Cust_Tel"]."' ";
$strSQL .=",Cust_Email = '".$_POST["Cust_Email"]."' ";
$strSQL .="WHERE Cust_Id = '".$_POST["Cust_Id"]."' ";

$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "Save successful.";
	echo "<meta http-equiv='refresh' content='1;url=Cust_Search.php' />";
}
else
{
	echo "Error Save [".$strSQL."]";
	echo "<meta http-equiv='refresh' content='2;url=Cust_Update.php' />";
}
mysql_close();
?>
</body>
</html>
