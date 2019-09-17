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

$User_Id = $_GET['User_Id'];

$strSQL = "SELECT * FROM employee WHERE User_Id = '".$_POST["User_Id"]."'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);
$User_Password = $objResult["User_Password"];

if($User_Password == $_POST["User_Password"] )
{
	$Password = $User_Password;
	//echo "1 [".$Password."]";
}
else
{
	$Password = md5($_POST["User_Password"]);
	//echo "2 [".$Password."]";
}

$strSQL = "UPDATE employee SET ";
$strSQL .="User_Id = '".$_POST["User_Id"]."' ";
$strSQL .=",User_Username = '".$_POST["User_Username"]."' ";
$strSQL .=",User_Password = '".$Password."' ";
$strSQL .=",User_Title = '".$_POST["User_Title"]."' ";
$strSQL .=",User_Fname = '".$_POST["User_Fname"]."' ";
$strSQL .=",User_Lname = '".$_POST["User_Lname"]."' ";
$strSQL .=",User_number = '".$_POST["User_number"]."' ";
$strSQL .=",User_Moo = '".$_POST["User_Moo"]."' ";
$strSQL .=",User_Road = '".$_POST["User_Road"]."' ";
$strSQL .=",User_District = '".$_POST["User_District"]."' ";
$strSQL .=",User_Prefecture = '".$_POST["User_Prefecture"]."' ";
$strSQL .=",User_Province = '".$_POST["User_Province"]."' ";
$strSQL .=",User_Code = '".$_POST["User_Code"]."' ";
$strSQL .=",User_Tel = '".$_POST["User_Tel"]."' ";
$strSQL .=",User_Email = '".$_POST["User_Email"]."' ";
$strSQL .=",User_Status = '".$_POST["User_Status"]."' ";
$strSQL .=",Department_Id = '".$_POST["Department_Id"]."' ";
$strSQL .="WHERE User_Id = '".$_POST["User_Id"]."' ";

$objQuery = mysql_query($strSQL);
if(!$$objQuery) {

	echo "Save successful.";
	echo "<meta http-equiv='refresh' content='1;url=User_Search.php' />";
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
