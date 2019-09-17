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
.style6 {font-size: 16px; }
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
	$Prod_Id= $_GET['Prod_Id'];

	$strSQL = "SELECT * FROM products WHERE Prod_Id = '$Prod_Id' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
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
				<li><a href="T_User_Prod_show_frm.php" class="current">งานขาย</a></li>
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
			      <td colspan="3">สินค้า&gt;&gt;รายละเอียดสินค้า</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>
	

  <form id="form1" method="post" action="User_Prod_show_frm.php"enctype="multipart/form-data">
    <div id="cols">
      <div></div>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="2" cellpadding="1">
        <tr class="style6">
          <td width="73%" align="center" ><img src="myfile/<?=$objResult["Prod_img"];?>" width="350" height="250"/>&nbsp;&nbsp;&nbsp;</td>
          <td width="27%" align="left" valign="top" class="tablecomment"><table width="100%" border="0" cellspacing="1" cellpadding="2">
              <tr>
                <td height="204" colspan="2" valign="top" class="tabletopic2"><table width="100%" height="126" border="0" cellpadding="2" cellspacing="1">
                    <tr>
                      <td height="18">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="18" >ชื่อสินค้า :&nbsp;<?=$objResult["Prod_Name"]?></td>
                    </tr>
                    <tr>
                      <td height="18">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="18">รายละเอียดสินค้า</td>
                    </tr>
                    <tr> 
                      <td height="18">&nbsp;&nbsp;<?=$objResult["Prod_Remark"]?></td>
                    </tr>
                    <tr>
                      <td height="18"></td>
                    </tr>
                    <tr>
                      <td height="18" >&nbsp;ราคา&nbsp;<?=$objResult["Prod_SalePrice"];?>&nbsp;บาท</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                 <td align="center"><a href="T_User_Prod_show_frm.php"class="style9">Back</a></td>
                 <td align="center"><a href="session_Order.php?Prod_Id=<?php echo $objResult["Prod_Id"];?>"class="style9">Buy</a></td>
              </tr>
              <tr>
                <td height="77" colspan="2" align="right" valign="top" class="txt06"></td>
              </tr>
          </table></td>
        </tr>
      </table>
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