<?
session_start();
$_SESSION['eid']=$_POST['NewEID'];
$_SESSION['order']=$_POST['Order_Id'];
session_write_close();
?>
<title>Sales Management System</title>
<?php

include('connect.php');

$Report_ID = $_POST['NewEID'];
$Report_Date = $_POST['Report_Date'];
$Order_Id = $_POST['Order_Id'];
$Reprort_User_ID = $_POST['Reprort_User_ID'];


$sql="INSERT INTO report(Report_ID,Report_Date,Order_Id,Reprort_User_ID)VALUES('$Report_ID','$Report_Date','$Order_Id','$Reprort_User_ID')"; 

if(mysql_query($sql)){
	
	echo "<meta http-equiv='refresh' content='1;url=report_money.php' />";

}else{
	echo $NewEID;
	echo"Error :",mysql_error();

}
?>