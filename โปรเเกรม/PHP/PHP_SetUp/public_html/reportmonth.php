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
.style3 {font-size: 18px}
    .style4 {font-size: 16px}
    .style5 {font-size: 14px}
    .style6 {font-size: 12px}
    .style7 {color: #000000}
    .style8 {
	color: #FF0000;
	font-size: 18px;
}
    </style>
</head>
<body>

<?php

include('connect.php');

?>

<div class="col">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="content">
	<div id="header">
			<p id="top">	&quot;Our Soul is for the Benefit of Mankind&quot; </p>
			
			<h1>ร้านช่างยุทธโทรทัศน์ สาขา 2</h1>
			
			<ul id="menu">
			  <li><a href="Head_admin_home.php">หน้าเเรก</a></li>
				<li><a href="User_Search.php">ผู้ใช้งาน</a></li>
				<li><a href="Cust_Search.php">ลูกค้า</a></li>
				<li><a href="Prod_edit_frm.php">สินค้า</a></li>
                <li><a href="Tax_Search.php">ดอกเบี้ย</a></li>
				<li><a href="User_repair_frm_Amin.php">ซ่อมบำรุง</a></li>
				<li><a href="report.php" class="current">ออกรายงาน</a></li>
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
			      <td colspan="3">ออกรายงาน&gt;&gt;รายงานสรุปยอดขายประจำเดือน</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>
	

  
  <form method="POST" action="rptmonthpdf.php" target="_blank">
    <div id="cols">
      <div class="col">
        <p class="style6"><img src="pic/iconreport.png" alt="" width="195" height="195" /></p>
        <p class="style4">&nbsp;</p>
      </div>
      <div class="col">
        <div align="center" class="style3">
          <div align="center" class="style3">
            <p><span class="topic_detail style5 style8 style3">รายงานสรุปยอดขายประจำเดือน</span></p>
            <table width="99%" height="150" border="0" cellpadding="1" cellspacing="1" class="tablecomment">
              <?
								$mm=date("m");
						?>
              <tr>
                <td height="35" align="right" class="topic_detail style5 style7">โปรดระบุเดือนที่ต้องการ :</td>
                <td align="left"><select name="monthid" id="monthid">
                    <option value="1" <?=$mm=='1' ? 'selected' : ''?>>มกราคม</option>
                    <option value="2" <?=$mm=='2' ? 'selected' : ''?>>กุมภาพันธ์</option>
                    <option value="3" <?=$mm=='3' ? 'selected' : ''?>>มีนาคม</option>
                    <option value="4" <?=$mm=='4' ? 'selected' : ''?>>เมษายน</option>
                    <option value="5" <?=$mm=='5' ? 'selected' : ''?>>พฤษภาคม</option>
                    <option value="6" <?=$mm=='6' ? 'selected' : ''?>>มิถุนายน</option>
                    <option value="7" <?=$mm=='7' ? 'selected' : ''?>>กรกฎาคม</option>
                    <option value="8" <?=$mm=='8' ? 'selected' : ''?>>สิงหาคม</option>
                    <option value="9" <?=$mm=='9' ? 'selected' : ''?>>กันยายน</option>
                    <option value="10" <?=$mm=='10' ? 'selected' : ''?>>ตุลาคม</option>
                    <option value="11" <?=$mm=='11' ? 'selected' : ''?>>พฤศจิกายน</option>
                    <option value="12" <?=$mm=='12' ? 'selected' : ''?>>ธันวาคม</option>
                </select></td>
              </tr>
              <tr>
                <td height="35" align="right" class="topic_detail style5 style7">ปี
                  : </td>
                <td align="left"><select name="yearid" id="yearid">
                    <?
								$yy = date("Y")+543;
								for($yyyy=2553;$yyyy<=2600;$yyyy++){ ?>
                    <option <?=$yyyy==$yy ? 'selected' : ''?>>
                    <?=$yyyy;?>
                    </option>
                    <?}?>
                </select></td>
              </tr>
              <tr>
                <td height="35" align="right" class="topic_detail style5">&nbsp;</td>
                <td align="left"><span class="style4">
                  <input type="submit" name="cmdfind" id="cmdfind" value="พิมพ์รายงาน" />
                </span></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
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