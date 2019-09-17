<?php
include("session.php");
include('connect.php');

$Repair_Id = $_POST['NewEID'];
$Repair_Date_In = date("d-m-y H:i:s");
$Repair_Detail = $_POST['Repair_Detail'];
$Order_Id = $_POST['Order_Id'];
$Prod_Id = $_POST['Prod_Id'];
$Repair_status_ch = "N";

$sql="INSERT INTO repair(Repair_Id,Repair_Date_In,Repair_Detail,Order_Id,Prod_Id,Repair_status_ch)
VALUES('$Repair_Id','$Repair_Date_In','$Repair_Detail','$Order_Id','$Prod_Id','$Repair_status_ch')";

if(mysql_query($sql)){
	echo"record Add successful";
	echo "<meta http-equiv='refresh' content='1;url=T_User_repair_home.php' />";
}else{
	echo $NewEID;
	echo"Error :",mysql_error();
}
mysql_close();
?>
