<?php
session_start();
?>

<html>
<head>
  <!--meta http-equiv="Content-Type" content="text/html; charset=utf-8"-->
  <title>Sales Management System</title>
  <link rel="stylesheet" href="sign-up/css/style.css">
</head>

<body>

<script language="javascript">
function fncSubmit()
{
	if(document.frmLogin.username.value == "")
	{
		alert('Please input Username');
		document.frmLogin.username.focus();
		return false;
	}	
	if(document.frmLogin.password.value == "")
	{
		alert('Please input Password');
		document.frmLogin.password.focus();		
		return false;
	}	
	document.frmLogin.submit();
}
</script>

  <form class="sign-up" name="frmLogin" method="post" action="login.php" onSubmit="JavaScript:return fncSubmit();">
    <h1 class="sign-up-title">ยินดีตอนรับเข้าสู่ระบบ</h1>
	<td> Username</td>
    <input type="text" class="sign-up-input" name = "username"  autofocus>
	<td> Password</td>
    <input type="password" class="sign-up-input"  name = "password">
    <input type="submit" value="Login" class="sign-up-button">
  </form>
</body>
</html>
