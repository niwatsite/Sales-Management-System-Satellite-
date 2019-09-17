<?php
include("session.php");
include('connect.php');
?>
<?php
    $login_User_Id;
	$login_User_Username;
	$oldpassword = md5(trim($_POST["oldpassword"]));
	$password    = md5(trim($_POST["password"]));
	$repassword  = md5(trim($_POST["repassword"]));

	$sql = "select User_Username from employee where User_Username='$login_User_Username' and User_Password ='$oldpassword'";

		$objSql=mysql_query($sql);
		$row=mysql_fetch_array($objSql);
   	 	$num =mysql_num_rows($objSql);



	if ($num == 0){
		die("<script>
				alert('Old password incorrect');
				history.back();
			 </script>");
        }
	if ($password == 0){
		die("<script>
				alert('Please enter new  password !');
				history.back();
			 </script>");
        }
	if ($repassword == 0){
	  die("<script>
			  alert('Please enter Confirm new  password !');
			  history.back();
		   </script>");
        }
// password = repassword
	if ($password != $repassword){
		die("<script>
				alert('Password is not same');
				history.back();
			 </script>");
        }
	else{

// save data
			 
	$sql = "update employee set User_Password='$password' where User_Id='$login_User_Id'";
		$result = mysql_query($sql) or die("Err : $sql");

		echo "<script>
				alert('Update Password');
				window.location='index.html';
			  </script>";
	}
?>
	