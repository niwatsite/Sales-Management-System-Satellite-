<title>Sales Management System</title>
<?php

include('connect.php');
date_default_timezone_set('Asia/Bangkok');
	
$_POST["Tax_Date"] = date("Y-m-d H:i:s");

$Tax_Id = $_POST['NewEID'];
$Tax_Mon = $_POST['Tax_Mon'];
$Tax_Rate = $_POST['Tax_Rate'];
$Tax_Date= $_POST['Tax_Date'];


$sql="INSERT INTO tax (Tax_Id,Tax_Mon,Tax_Rate,Tax_Date)VALUES('$Tax_Id','$Tax_Mon','$Tax_Rate','$Tax_Date')";

if(mysql_query($sql)){
  echo"record Add successful";
  echo "<meta http-equiv='refresh' content='1;url=Tax_Search.php' />";

}else{
  echo $Tax_Id;
  echo"Error :",mysql_error();

}
mysql_close();
?>
