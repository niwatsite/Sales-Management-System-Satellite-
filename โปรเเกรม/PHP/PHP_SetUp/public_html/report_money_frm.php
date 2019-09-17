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
    </style>
        <style type="text/css">
<!--

.style10 {
	font-size: 16px;
	color: #000000;
}
.style13 {font-size: 14px; color: #000000; }
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
			<li><a href="T_User_Prod_show_frm.php">ผลิตภัณฑ์</a></li>
			<li><a href="T_Cust_Search.php">ลูกค้า</a></li>
			<li><a href="T_Prod_show_detail_show.php" class="current">&#3586;&#3634;&#3618;</a></li>
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
			      <td colspan="3">ขาย&gt;&gt;ใบเสร็จรับเงิน</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>
	

  <form id="form1" method="post" action="report_money_save.php"enctype="multipart/form-data" target="_blank">
    <div id="cols">
      
      <p class="style10">ข้อมูลออกใบเสร็จ</p>
      <div align="center">
        <table width="573" border="0">
          <?php


include('connect.php');

$maxSQL = "SELECT max(Report_ID)as MaxEID FROM report";
			$maxQuery = mysql_query($maxSQL) or die (mysql_error());
			$maxResult = mysql_fetch_array($maxQuery);

			$NewEID;
			
			if($maxResult["MaxEID"]!="")
			{
			$MaxID=(int)substr($maxResult["MaxEID"], 2);
			$MaxID+=1;
			
				if($MaxID<10){
					$NewEID="00000".$MaxID;
				}
				elseif($MaxID<100 && $MaxID>=10){
					$NewEID="0000".$MaxID;
				}
				elseif($MaxID<1000 && $MaxID>=100){
					$NewEID="000".$MaxID;
				}
				elseif($MaxID<10000 && $MaxID>=1000){
					$NewEID="00".$MaxID;
				}
				else{
					$NewEID="0".$MaxID;
				}
			}
			else
			{
			$NewEID="000001";
			}

//$_GET['Order_Id'] = "O00061";
$Order_Id = $_GET['Order_Id'];
$query = "select * from report";
$strSQL = "SELECT * FROM order_sales NATURAL JOIN order_sale_detail NATURAL JOIN employee NATURAL JOIN customers NATURAL JOIN products WHERE Order_Id = '$Order_Id'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found Order_Id=".$_GET["Order_Id"];
}
else
{
?>
          <tr >
            <td width="151"><div align="right" class="style13">เลขที่ใบเสร็จ : </div></td>
            <td width="412" align="center" valign="middle"><div align="left" class="style13">
                <input name="NewEID" type="text" id="NewEID" value="<?php echo $NewEID;?>" size="18" readonly="readonly" />
            </div></td>
          </tr>
          <tr >
            <td><div align="right"><span class="style13">รหัสผู้ออกใบเสร็จ :</span></div></td>
            <td align="center" valign="middle"><div align="left">
            <input name="Reprort_User_ID" type="text" id="Reprort_User_ID" value="<?=$objResult ["User_Id"];?>" size="18" readonly="readonly" />
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">ผู้ออกใบเสร็จ :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
                <input name="Reprort_User" type="text" id="Reprort_User" value="<?echo $login_User_Fname;?> "size="18" readonly="readonly" />
              &nbsp;&nbsp;&nbsp;
              <input name="Reprort_User1" type="text" id="Reprort_User1" value="<?echo $login_User_Lname;?> "size="18" readonly="readonly" />
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">วันที่   :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
                <input name="Report_Date" type="text" id="Report_Date" value="<?php echo date("d-m-y");?>" size="18" readonly="readonly" />
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">ชื่อผู้ซื้อ  :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
            <input name="Reprort_c" type="text" id="Reprort_c" value="<?=$objResult ["Cust_Fname"];?>"size="18" readonly="readonly" />
              &nbsp;&nbsp;&nbsp;
              <input name="Reprort_c" type="text" id="Reprort_c" value="<?=$objResult ["Cust_Lname"];?> "size="18" readonly="readonly" />
                
              
              
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">ที่อยู่  :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
                <?=$objResult["Cust_Number"];?>
              &nbsp;&nbsp;หมู่ที่
              <?=$objResult["Cust_Moo"];?>
              &nbsp;&nbsp;ถนน
              <?=$objResult["Cust_Road"];?>
              &nbsp;&nbsp;ตำบล
              <?=$objResult["Cust_District"];?>
              &nbsp;&nbsp;อำเภอ
              <?=$objResult["Cust_Prefecture"];?>
              &nbsp;&nbsp;จังหวัด
              <?=$objResult["Cust_Province"];?>
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">เบอร์โทรศัพท์ :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
            <input name="tel" type="text" id="tel" value="<?=$objResult["Cust_Tel"];?>" size="18" readonly="readonly" />
               
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">รหัสใบสั่งซื้อ :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
                <input name="Order_Id" type="text" id="Order_Id" value="<?=$objResult["Order_Id"];?>" size="18" readonly="readonly" />
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">ชื่อสินค้า :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
            <input name="Order_n" type="text" id="Order_n" value="<?=$objResult["Prod_Name"];?>" size="18" readonly="readonly" />
                
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">จำนวน :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
            <input name="Order_c" type="text" id="Order_c" value="<?=$objResult["Prod_Num"];?>" size="18" readonly="readonly" />
                
            </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">ราคา/หน่วย :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
            <input name="Order_p" type="text" id="Order_p" value="<?=$objResult["Prod_SalePrice"];?>" size="18" readonly="readonly" />
                
            </div></td>
          </tr>
          <?php
		$amount = ($objResult["Prod_Num"]*$objResult["Prod_SalePrice"]);
		?>
          <?php 
		$amount_result = ($amount_result+$amount );
		?>
          <tr >
            <td><div align="right" class="style13">ราคารวม :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
			<input name="Order_amount" type="text" id="Order_amount" value="<?php echo $amount;?>" size="18" readonly="readonly" />
			 </div></td>
          </tr>
          <tr >
            <td><div align="right" class="style13">จำนวนเงินสุทธิ :</div></td>
            <td align="center" valign="middle"><div align="left" class="style13">
			<input name="Order_result" type="text" id="Order_result" value="<?php echo $amount_result;?>" size="18" readonly="readonly" />
			</div></td>
          </tr>
          <?php
	}
?>
        </table>
        <p>
          <input type="submit" name="button" id="button" value="พิมพ์ใบเสร็จ" />
        </p>
      </div>
      <div align="center"></div>
      <div></div>
	  <p>
	    <label></label>
	  </p>
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