<?php
include("session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Sales Management System</title>
	<meta name="author" content="Luka Cvrk (www.solucija.com)" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<style type="text/css">
	#apDiv1 {
	position: absolute;
	left: 337px;
	top: 169px;
	width: 378px;
	height: 31px;
	z-index: 1;
}
    #apDiv2 {
	position: absolute;
	left: 693px;
	top: 370px;
	width: 241px;
	height: 28px;
	z-index: 1;
}
    #apDiv3 {
	position: absolute;
	left: 139px;
	top: 559px;
	width: 52px;
	height: 23px;
	z-index: 1;
}
    </style>
</head>
<body>
<div class="col">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="content">
	<div id="header">
			<p id="top">	&quot;Our Soul is for the Benefit of Mankind&quot; </p>

			<h1>ร้านช่างยุทธโทรทัศน์ สาขา 2</h1>

			<ul id="menu">
								<li><a href="Head_admin_User.php"  class="current">หน้าเเรก</a></li>
								<li><a href="T_User_Prod_show_frm.php">ผลิตภัณฑ์</a></li>
								<li><a href="T_Cust_Search.php">ลูกค้า</a></li>
								<li><a href="T_Prod_show_detail_show.php">&#3586;&#3634;&#3618;</a></li>
                                                                <li><a href="T_debtor_Search.php">&#3594;&#3635;&#3619;&#3632;&#3627;&#3609;&#3637;&#3657;</a></li>
								<li><a href="T_User_repair_home.php">ซ่อมบำรุง</a></li>
								<li><a href="T_User_chang_Password_frm.php">จัดการข้อมูล</a></li>
								<li><a href="logout.php">ออกจากระบบ</a></li>
	  </ul>

			<div id="pitch">
			  <table width="100%" border="0">
			    <tr>
			      <td width="15%">ชื่อผู้ใช้ระบบ :</td>
			      <td width="33%"><label><?php echo $login_User_Fname . " " . $login_User_Lname; ?></label></td>
			      <td width="46%">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
		        </tr>
			    <tr>
			      <td colspan="3">หน้าหลัก&gt;&gt;</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="form1" method="post" action="">
    <div id="cols">
      <h3>&nbsp;</h3>
      <p>&nbsp;</p>
      <h2>ยินดีตอนรับเข้าสู่ระบบในส่วนของ ผู้ใช้ทั่วไป</h2>
      <p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div class="x"></div>
	</div>
  </form>
  <div id="footer">
  <h3>มหาวิทยาลัยสงขลานครินทร์  | Prince of Songkla University</h3>
    <p>Copyright &copy; 2014 ร้านช่างยุทธโทรทัศน์ สาขา 2&middot; Design: <a href="http://www.solucija.com/">Solucija.com</a></p>
  </div>
</div>
</body>
</html>
