<?php
session_start();
include('connect.php');
{
	$username= trim($_POST["username"]);
	$password= md5(trim($_POST['password']));

$strSQL = "SELECT * FROM employee WHERE User_Username = '".mysql_real_escape_string($username)."'
 AND User_Password = '".mysql_real_escape_string($password)."'";

//echo "Error  [".$strSQL."]";

	$objSql=mysql_query($strSQL);
	$row=mysql_fetch_array($objSql);
   	 	$count=mysql_num_rows($objSql);

    	if($count!="")
    	{
	session_register("sessionusername");

    $_SESSION['login_username']=$username;
		$_SESSION['login_Password']=$Password;
		$_SESSION['login_User_Id']=$User_Id;
		$_SESSION['login_User_Fname']=$User_Fname;
		$_SESSION['login_User_Lname']=$User_Lname;
	//$_SESSION['login_User_Status_Admin']=$login_User_Status_Admin;

		$statuss="0";
		if($row['User_Status_Admin']==$statuss )
			{
				header("location:Head_admin_home.php");
			}
			else
			{
				header("location:Head_admin_User.php");
			}
    }
    else
    {
	   header('Location:index.php');
	   echo "<p style='color:#ff0000'>Username หรือ Password ไม่ถูกต้อง!</p>";
	}
}
 mysql_close();
?>
