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
    </style>
  <!-- TemplateBeginEditable name="head" -->
  <!-- TemplateEndEditable -->
</head>
<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('Tax_Mon').value == "")
    {
        alert('PLEASE INPUT Months');
        return false;
    }
    if(document.getElementById('Tax_Rate').value == "")
    {
        alert('PLEASE INPUT Interest expense');
        return false;
    }
}
</script>
<body>


<?

include('connect.php');

$Tax_Id= $_GET['Tax_Id'];

$strSQL = "SELECT * FROM tax WHERE Tax_Id = '$Tax_Id'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
  echo "Not found Tax_Id=".$_GET["Tax_Id"];
}
else
{
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
        <li><a href="Tax_Search.php"class="current">ดอกเบี้ย</a></li>
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
            <td colspan="3">ผู้ใช้งาน&gt;&gt;เเก้ไขข้อมูลผู้ใช้ระบบ</td>
          </tr>
          </table>
      </div>
      <p>&nbsp;</p>
  </div>


  <form id="form1" method="post" action="Tax_Update.php?$Tax_Id=<?=$_GET["Tax_Id"];?>" onSubmit="JavaScript:return fncSubmit();">
    <div id="cols">
      <div class="col">
        <table width="270" border="0">
        <tr>
          <td width="45%">รหัสดอกเบี้ย :</td>
          <td width="55%" align="right" id="l"><label for="Tax_Id"></label>
            <input name="Tax_Id" type="text" id="Tax_Id" value="<?=$objResult["Tax_Id"];?>" size="18" readonly="readonly" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="col">
      <table width="267" border="0">
          <tr>
            <td width="45%">จำนวนเดือน :</td>
            <td width="55%" colspan="2"><label for="Tax_Mon"></label>
              <input name="Tax_Mon" type="text" id="Tax_Mon" value="<?=$objResult["Tax_Mon"];?>" size="18" tabindex="1" /></td>
           </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>

          </table>
    </div>
      <div class="col">
      <table width="267" border="0">
          <tr>
            <td width="45%">อัตราดอกเบี้ย :</td>
            <td width="55%"><label for="Tax_Rate"></label>
              <input name="Tax_Rate" type="text" id="Tax_Rate" value="<?=$objResult["Tax_Rate"];?>" size="18" tabindex="2"/></td>
            </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
            </tr>
          </table>
      <p>
        <input type="submit" name="button2" id="button2" value="บันทึก" />
      </p>
    </div>
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


  <?
  }
  mysql_close();
  ?>

  <div id="footer">
  <h3>มหาวิทยาลัยสงขลานครินทร์  | Prince of Songkla University</h3>
    <p>Copyright &copy; 2014 ร้านช่างยุทธโทรทัศน์ สาขา 2&middot; Design: <a href="http://www.solucija.com/">Solucija.com</a></p>
  </div>
</div>
</body>
</html>