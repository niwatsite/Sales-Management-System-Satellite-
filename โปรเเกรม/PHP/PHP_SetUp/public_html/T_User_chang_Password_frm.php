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
    <link href="css/pa.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #000000;
}
-->
    </style>
</head>
<?

include('connect.php');
?>

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
				                                <li><a href="Head_admin_User.php">หน้าเเรก</a></li>
				                                <li><a href="T_User_Prod_show_frm.php">ผลิตภัณฑ์</a></li>
				                                <li><a href="T_Cust_Search.php">ลูกค้า</a></li>
				<li><a href="T_Prod_show_detail_show.php">&#3586;&#3634;&#3618;</a></li>
                                <li><a href="T_debtor_Search.php">&#3594;&#3635;&#3619;&#3632;&#3627;&#3609;&#3637;&#3657;</a></li>
                                				<li><a href="T_User_repair_home.php">ซ่อมบำรุง</a></li>
                                				<li><a href="T_User_chang_Password_frm.php" class="current">จัดการข้อมูล</a></li>
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
			      <td colspan="3">จัดการข้อมูล&gt;&gt;เปลี่ยนรหัสผ่าน</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="form1" method="post" action="T_User_chang_check.php">
    <div id="cols">
      <div id="pass">
        <div class="col">
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
        <div class="col">
          <table width="267" border="0">
            <tr>
              <td width="149"><div align="right" class="style1">รหัสผ่านเก่า : </div></td>
              <td width="108"><label for="textfield9"></label>
                <input name="oldpassword" type="password" id="oldpassword" size="18" maxlength="10" /></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td><div align="right" class="style1">รหัสผ่านใหม่ : </div></td>
              <td><label for="textfield10"></label>
                <input name="password" type="password" id="password" size="18" maxlength="10" /></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td><div align="right" class="style1">ยืนยันรหัสผ่าน : </div></td>
              <td><label for="textfield11"></label>
                <input name="repassword" type="password" id="repassword" size="18" maxlength="10" /></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                <input type="submit" name="save2" id="save2" value="บันทึก" />
                <input type="reset" name="button" id="button2" value="ล้างข้อมูล" />
              </div></td>
            </tr>
          </table>
        </div>
        <div class="col">
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
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