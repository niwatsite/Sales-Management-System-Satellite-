<title>Sales Management System</title>
<?php

include('connect.php');

$User_Id = $_POST['NewEID'];
//$NewEID;
$User_Username = $_POST['User_Username'];
$User_Password = $_POST['User_Password'];
$User_Title = $_POST['User_Title'];
$User_Fname = $_POST['User_Fname'];
$User_Lname = $_POST['User_Lname'];
$User_number = $_POST['User_number'];
$User_Moo = $_POST['User_Moo'];
$User_Road = $_POST['User_Road'];
$User_District = $_POST['User_District'];
$User_Prefecture = $_POST['User_Prefecture'];
$User_Province = $_POST['User_Province'];
$User_Code = $_POST['User_Code'];
$User_Tel = $_POST['User_Tel'];
$User_Email = $_POST['User_Email'];
$Department_Id = $_POST['Department_Id'];
$User_Status_Admin = "1";

//$Department_Id = $_POST['Department_Id'];

$sql="INSERT INTO employee(User_Id,User_Username,User_Password,User_Title,User_Fname,User_Lname,User_number,User_Moo,User_Road,User_District,User_Prefecture,User_Province,User_Code,User_Tel,User_Email,Department_Id,User_Status_Admin)VALUES('$User_Id','$User_Username','$User_Password','$User_Title','$User_Fname','$User_Lname','$User_number','$User_Moo','$User_Road','$User_District','$User_Prefecture','$User_Province','$User_Code','$User_Tel','$User_Email','$Department_Id','$User_Status_Admin')"; 


$objQuery = mysql_query($sql);
if(!$$objQuery) {
	echo"record Add successful";
	echo "<meta http-equiv='refresh' content='1;url=User_Search.php' />";

}else{
	echo $NewEID;
	echo"Error :",mysql_error();

}

mysql_close();

?>		