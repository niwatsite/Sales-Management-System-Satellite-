<?php
session_start();
include('connect.php');

$check=$_SESSION['login_username'];
$session = mysql_query("select * from employee where User_Username='$check'");

//echo "Error  [".$session."]";
         $row = mysql_fetch_array($session);
         $login_User_Username = $row['User_Username'];
         $login_User_Id = $row['User_Id'];
         $login_User_Password = $row['User_Password'];
         $login_User_Fname = $row['User_Fname'];
         $login_User_Lname = $row['User_Lname'];

  if(!isset($login_User_Id))
   {
    header("Location:index.php");
   }
?>
