<title>Sales Management System</title>
<?php

include('connect.php');

$_POST['StoreLati'] = "0.0";
$_POST['StoreLongi'] = "0.0";


$Cust_Id = $_POST['NewEID'];
$Cust_Fname = $_POST['Cust_Fname'];
$Cust_Lname = $_POST['Cust_Lname'];
$Cust_number = $_POST['Cust_number'];
$Cust_Moo = $_POST['Cust_Moo'];
$Cust_Road = $_POST['Cust_Road'];
$Cust_District = $_POST['Cust_District'];
$Cust_Prefecture = $_POST['Cust_Prefecture'];
$Cust_Province = $_POST['Cust_Province'];
$Cust_Code = $_POST['Cust_Code'];
$StoreLati = $_POST['StoreLati'];
$StoreLongi = $_POST['StoreLongi'];
$Cust_Tel = $_POST['Cust_Tel'];
$Cust_Email = $_POST['Cust_Email'];



$sql="INSERT INTO customers(Cust_Id,Cust_Fname,Cust_Lname,Cust_number,Cust_Moo,Cust_Road,Cust_District,Cust_Prefecture,Cust_Province,Cust_Code,StoreLati,StoreLongi,Cust_Tel,Cust_Email)VALUES('$Cust_Id','$Cust_Fname','$Cust_Lname','$Cust_number','$Cust_Moo','$Cust_Road','$Cust_District','$Cust_Prefecture','$Cust_Province','$Cust_Code','$StoreLati','$StoreLongi','$Cust_Tel','$Cust_Email')"; 

if(mysql_query($sql)){
	echo"record Add successful";
	echo "<meta http-equiv='refresh' content='1;url=T_Cust_Search.php' />";

}else{
	echo $NewEID;
	echo"Error :",mysql_error();

}
 mysql_close();
?>