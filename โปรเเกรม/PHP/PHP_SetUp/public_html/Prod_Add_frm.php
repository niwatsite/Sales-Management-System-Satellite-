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
.style2 {color: #000000}
    </style>
</head>
<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('Prod_Name').value == "")
    {
        alert('PLEASE INPUT Product Name');
        return false;
    }
    if(document.getElementById('Prod_SalePrice').value == "")
    {
        alert('PLEASE INPUT  Sale Price');
        return false;
    }
}
</script>
<body>

<?php

include('connect.php');

$maxSQL = "SELECT max(Prod_Id)as MaxEID FROM products";
			$maxQuery = mysql_query($maxSQL) or die (mysql_error());
			$maxResult = mysql_fetch_array($maxQuery);

			$NewEID;

			if($maxResult["MaxEID"]!="")
			{
			$MaxID=(int)substr($maxResult["MaxEID"], 2);
			$MaxID+=1;

				if($MaxID<10){
					$NewEID="P0000".$MaxID;
				}
				elseif($MaxID<100 && $MaxID>=10){
					$NewEID="P000".$MaxID;
				}
				elseif($MaxID<1000 && $MaxID>=100){
					$NewEID="P00".$MaxID;
				}
				elseif($MaxID<10000 && $MaxID>=1000){
					$NewEID="P0".$MaxID;
				}
				else{
					$NewEID="P".$MaxID;
				}
			}
			else
			{
			$NewEID="P00001";
			}
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
				<li><a href="Prod_edit_frm.php" class="current">สินค้า</a></li>
				<li><a href="Tax_Search.php">ดอกเบี้ย</a></li>
				<li><a href="User_repair_frm_Amin.php">ซ่อมบำรุง</a></li>
				<li><a href="report.php">ออกรายงาน</a></li>
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
			      <td colspan="3">สินค้า&gt;&gt;เพิ่มข้อมูลสินค้า</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="form1" method="post" action="PageUploadToMySQL2.php"enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
    <div id="cols">
      <div class="col">
        <table width="273" border="0">
        <tr>
          <td width="29%">รหัสสินค้า :</td>
          <td width="71%" align="right" id="l"><label for="Prod_Id"></label>
            <input name="NewEID" type="text" id="NewEID" value="<?php echo $NewEID;?>" size="18" readonly="readonly" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>ราคาซื้้อ  :</td>
          <td align="right" id="l"><label for="textfield3"></label>
            <input name="Prod_O" type="text" id="Prod_O" size="18"  tabindex="2" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="col">
	    <table width="305" border="0">
			    <tr>
			      <td width="100">		          <div align="left">ชื่อสินค้า :</div></td>
			      <td width="195"><label for="textfield2"></label>
			        <input name="Prod_Name" type="text" id="Prod_Name" size="18"  tabindex="1" /></td>
          </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
          </tr>
			    <tr>
			      <td><div align="left">ราคาขาย :</div></td>
			      <td><input name="Prod_SalePrice" type="text" id="Prod_SalePrice" size="18"  tabindex="3"/></td>
	      </tr>
			    <tr>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
	      </tr>
			    <tr>
			      <td>ประเภทสินค้า :</td>

          <td>
			        <select name="select" id="select">
			          <option value="1">ชุดจานดาวเทียมพร้อมติดตั้ง</option>
			          <option value="2">ชุดจานดาวเทียมไม่รวมติดตั้ง</option>
			          <option value="3">Receiverเครื่องรับสัณญาณ</option>
			          <option value="4">หน้าจานดาวเทียม</option>
			          <option value="5">กล่องรับสัณญาณดิจิตอล</option>
                                        </select>
			      </td>
	      </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
		      </table>
	  </div>
      <div class="col">
	    <table width="267" border="0">
			    <tr>
			      <td width="26%">รูปสินค้า :</td>
			      <td width="74%"><label for="textfield2"></label></td>
		        </tr>
			    <tr>
			      <td colspan="2"><input type="file" name="filUpload"  tabindex="4"/></td>
	      </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
	      </tr>
			    <tr>
			      <td colspan="2">รายละเอียดสินค้า :</td>
	      </tr>
			    <tr>
			      <td colspan="2"><label for="Prod_Remark"></label>
		          <textarea name="Prod_Remark" id="Prod_Remark" cols="35" rows="5"  tabindex="6" ></textarea></td>
	      </tr>
		      </table>
	    <p>
	      <input type="submit" name="button2" id="button2" value="เพิ่มข้อมูล" />
			    <input type="reset" name="Reset" id="button" value="ล้างข้อมูล" />
	    </p>
	  </div>
			<p>&nbsp;</p>
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
