<?php
include("session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <!-- TemplateBeginEditable name="doctitle" -->
  <title>Sales Management System</title>
  <!-- TemplateEndEditable -->
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
    .style11 {	font-size: 14px;
	color: #000000;
	text-align: left;
}
  </style>
  <!-- TemplateBeginEditable name="head" -->
  <!-- TemplateEndEditable -->
</head>


<?php
include('connect.php');
?>
<?

$Repair_Id = $_GET['Repair_Id'];

$strSQL = "SELECT * FROM repair NATURAL JOIN products NATURAL JOIN customers NATURAL JOIN order_sales  WHERE repair.Repair_Id = '$Repair_Id'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);

if(!$objResult)
{
  echo "Not found Repair_Id =".$_GET["Repair_Id"];
}
else
{
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
        <li><a href="T_User_repair_home.php" class="current">ซ่อมบำรุง</a></li>
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
            <td colspan="3">ซ่อมบำรุง&gt;&gt;จัดการสถานะเเจ้งซ้อม&gt;&gt;รับเรื่องการเเจ้งซ่อม&gt;&gt;เพิ่มข้อมูล</td>
            </tr>
          </table>
      </div>
      <p>&nbsp;</p>
  </div>


  <form id="frmSearch" method="Post" action="T_User_repair_Update_Add.php">
    <div id="cols">

  <table width="90%" border="0" align="center">
    <tr align="center">
      <th width="610" align="right">&nbsp;</th>
      <th width="85">&nbsp;</th>
    <th width="337" align="left">&nbsp;</th>
    </tr>
    <tr align="center">
      <th colspan="3" align="center"><table width="900" border="0">
        <tr>
          <td width="20%" align="right">รหัสใบเเจ้งซ่อม :</td>
          <td width="170"><label for="Repair_Id"></label>
          <input name="Repair_Id" type="text" id="Repair_Id" value="<?=$objResult["Repair_Id"];?>" size="18" readonly="readonly" /></td>
          <td width="15%">&nbsp;</td>
          <td width="20%">&nbsp;</td>
          <td width="15%" align="right">วันที่รับเรื่อง :</td>
          <td width="170"><label><?php echo date("d-m-y");?></label>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td width="170">&nbsp;</td>
          </tr>
        <tr>
          <td align="right">รหัสลูกค้า :</td>
          <td><input name="Cust_Id" type="text" id="Cust_Id" value="<?=$objResult["Cust_Id"];?>" size="18" readonly="readonly" /></td>
          <td align="right">ชื่อ :</td>
          <td><input name="Cust_Fname" type="text" id="Cust_Fname" value="<?=$objResult["Cust_Fname"];?>" size="18" readonly="readonly" /></td>
          <td align="right">นามสกุล :</td>
          <td width="170"><input name="Cust_Lname" type="text" id="Cust_Lname" value="<?=$objResult["Cust_Lname"];?>" size="18" readonly="readonly" /></td>
<?php
  }
?>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td width="170">&nbsp;</td>
          </tr>
        <tr>
          <td align="right">เลขที่ใบสั่งซื้อ :</td>
          <td><input name="Order_Id" type="text" id="Order_Id" value="<?=$objResult["Order_Id"];?>" size="18" readonly="readonly" /></td>
          <td align="right">วันที่ซื้อ :</td>
          <td><input name="Order_Date" type="text" id="Order_Date" value="<?=$objResult["Order_Date"];?>" size="18" readonly="readonly" /></td>
          <td align="right">&nbsp;</td>
          <td align="center">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="2" align="left">&nbsp;</td>
		</tr>
        <tr>
          <td align="right">รหัสสินค้า :</td>
          <td><input name="Prod_Id" type="text" id="Prod_Id" value="<?=$objResult["Prod_Id"];?>" size="18" readonly="readonly" /></td>
          <td align="right">ชื่อสินค้า :</td>
          <td><input name="Prod_Name" type="text" id="Prod_Name" value="<?=$objResult["Prod_Name"];?>" size="18" readonly="readonly" /></td>
          <td colspan="2" align="left">&nbsp;</td>
          </tr>
        <tr>
          <td height="24" align="right">&nbsp;</td>
          <td height="24" align="right">&nbsp;</td>
          <td height="24" align="right">&nbsp;</td>
          <td height="24" align="right">&nbsp;</td>
          <td colspan="2" align="left">&nbsp;</td>
        </tr>
        <tr>
          <td height="29" align="right">สถานะ :</td>
          <td height="29" colspan="2">
            <input name="Repair_status_ch" type="radio" id="Repair_status_ch" value="Y"<?php if($objResult["Repair_status_ch"]=="Y") echo 'checked=checked';?> />
            <span class="style11">ซ่อมเรียบร้อยเเล้ว</span></td>
          <td height="29" align="right">&nbsp;</td>
          <td colspan="2" align="left">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><input name="Repair_status_ch" type="radio" id="Repair_status_ch" value="N"<?php if($objResult["Repair_status_ch"]=="N") echo 'checked=checked';?>  />
            <span class="style11"> อยู่ระหว่างดำเนินการซ่อม</span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td width="170"><input type="submit" name="button2" id="button2" value="บันทึกข้อมูล" /></td>
        </tr>
      </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p></th>
      </tr>
  </table>
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
