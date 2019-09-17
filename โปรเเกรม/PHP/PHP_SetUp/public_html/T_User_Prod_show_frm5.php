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
    .delete:before {	content: "\2718";
}
	.edit:before {	content: "\270E";
}

<!--
@import url("css/myCenter.css");
.style5 {font-size: 14px; }
.style6 {font-size: 14; }
.style7 {color: #777777}
.style8 {color: #FF0000}
.style9 {
	color: #006600;
	font-size: 16px;
	font-weight: bold;
}
-->
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
				                                <li><a href="Head_admin_User.php">หน้าเเรก</a></li>
                                				<li><a href="T_User_Prod_show_frm.php" class="current">ผลิตภัณฑ์</a></li>
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
			      <td colspan="3">ผลิตภัณฑ์&gt;&gt;รายการสินค้า</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="form1" method="post" action="User_Prod_show_frm.php"enctype="multipart/form-data">
    <div id="cols">
      <div></div>
      <table width="100%" border="0" align="center">

        <tr>
          <th scope="row"><a href="T_User_Prod_show_frm.php"  class="style8">สินค้าทั้งหมด</a></span>|
          				  <a href="T_User_Prod_show_frm1.php" class="style7">ชุดจานดาวเทียมพร้อมติดตั้ง</a></span>|
                          <a href="T_User_Prod_show_frm2.php" class="style7">ชุดจานดาวเทียมไม่รวมค่าติดตั้ง</a></span>|
                          <a href="T_User_Prod_show_frm3.php" class="style7">Receiver เครื่องรับสัณญาณ</a></span>|
                          <a href="T_User_Prod_show_frm4.php" class="style7">หน้าจานดาวเทียม</a></span>|
                          <a href="T_User_Prod_show_frm5.php" class="style7">กล่องรับสัณญาณดิจิตอล</a></span>|
<label><br />
        </label></th>
        </tr>
      </table>
      <p>&nbsp;</p>
<table width="800" border="0" align="center" bgcolor="#FFFF99">
<tr bgcolor="#CCCCCC"">
          <th width="170"> <div align="center" class="style5">รูปสินค้า</div></th>
          <th width="150"> <div align="center" class="style5">ชื่อ</div></th>
          <th width="100"> <div align="center" class="style5">ราคา</div></th>
          <th width="150"> <div align="center" class="style5">สั่งซื้อ</div></th>
              </tr>
<?php
	$strSQL = "SELECT * FROM products where Prod_type='5' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<?php
$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
		$i++;
		if($i%2==0)
		{
			$bg = "#CDC9C9";
		}
		else
		{
			$bg = "#C6E772";
		}
?>
            <tr bgcolor="<?=$bg;?>">
                <td ><center><img src="myfile/<?=$objResult["Prod_img"];?>" width="auto" height="200"/></center></td>
              	<td><center><?=$objResult["Prod_Name"];?></a></center></td>
              	<td><center><?=$objResult["Prod_SalePrice"];?></a></center></td>
                <td align="center"><a href="T_Prod_show_detail_frm.php?Prod_Id=<?php echo $objResult["Prod_Id"];?>"class="style9">Buy</a></td>

              </tr>
              <?php
	}
?>
      </table>
	  <p>&nbsp;</p>
			<p>&nbsp;</p>
	  <div class="x"></div>
	</div>
  </form>
  <div id="footer">
    <h3><a href="https://www.google.co.th/url?sa=t&amp;rct=j&amp;q=&amp;esrc=s&amp;source=web&amp;cd=2&amp;cad=rja&amp;uact=8&amp;ved=0CCQQFjAB&amp;url=http%3A%2F%2Fwww.psu.ac.th%2F&amp;ei=hPMLVPiEHtjmuQSy-oDABA&amp;usg=AFQjCNHrpbYLJmqVwzlODe5gPds4RRjSKw&amp;sig2=9tERvA4CkB3-K64djomsSg&amp;bvm=bv.74649129,d.c2E" onmousedown="return rwt(this,'','','','2','AFQjCNHrpbYLJmqVwzlODe5gPds4RRjSKw','9tERvA4CkB3-K64djomsSg','0CCQQFjAB','','',event)" data-href="http://www.psu.ac.th/">มหาวิทยาลัยสงขลานครินทร์ | Prince of Songkla University</a>    </h3>
    <p>Copyright &copy; 2014 ร้านช่างยุทธโทรทัศน์ สาขา 2&middot; Design: <a href="http://www.solucija.com/">Solucija.com</a></p>
  </div>
</div>
</body>
</html>
