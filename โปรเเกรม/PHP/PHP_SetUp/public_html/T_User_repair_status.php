<?php
include("session.php");
$Repair_Id = $_GET['Repair_Id'];
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
	text-align: left;
}
.style11 {	font-size: 14px;
	color: #000000;
	text-align: left;
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
      <li><a href="#">งานขาย</a></li>
				<li><a href="T_Cust_Search.php">ลูกค้า</a></li>
				<li><a href="#">ผลิตภัณฑ์</a></li>
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
			      <td colspan="3">ซ่อมบำรุง&gt;&gt;จัดการสถานะเเจ้งซ้อม</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>
	


  <form id="form1" method="post" action="T_User_repair_status_Update.php">
    <div id="cols">
      <div id="pass">
        <div class="col">
          <table width="267" border="0">
            <tr>
              <td width="146" align="right">รหัสเเจ้งซ่อม :</td>
              <td width="111" align="right"><input name="TT" type="text" id="TT" value="<?php echo $Repair_Id;?>" size="18" /></td>
            </tr>
            <tr>
              <td><label for="Repair_Id "></label></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left"><div align="right" class="style1"></div>
                <label for="radio5"></label>
                <div align="right" class="style1"></div>
                <label for="textfield2"></label>                <div align="center"></div></td>
              <td align="left"><label for="TT"></label></td>
            </tr>
          </table>
        </div>
        <div class="col">
          <table width="267" border="0">
            <tr>
              <td align="right"><span class="style1">
                <label for="radio3"></label>
              </span>สถานะการเเจ้งซ่อม</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right"><div align="right" class="style1">
                <input type="radio" name="Repair_status_ch" id="Repair_status_ch" value="Y" />
                ซ่อมเรียบร้อยเเล้ว
                <label for="Repair_status_ch"></label>
              </div>                <label for="radio2"></label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="right" class="style1">
                <input type="radio" name="Repair_status_ch" id="Repair_status_ch" value="N" />
              อยู่ระหว่างดำเนินการซ่อม</div>                <label for="textfield11"></label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center">
                <input type="submit" name="save2" id="save2" value="บันทึก" />
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
      </div>
      <div class="x"></div>
	</div>
  </form>
  <div id="footer">
    <h3>มหาวิทยาลัยสงขลานครินทร์ | Prince of Songkla University</h3>
    <p>Copyright &copy; 2014 ร้านช่างยุทธโทรทัศน์ สาขา 2&middot; Design: <a href="http://www.solucija.com/">Solucija.com</a></p>
  </div>
</div>
</body>
</html>