<?php
include("../session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!-- TemplateBeginEditable name="doctitle" -->
	<title>Sales Management System</title>
	<!-- TemplateEndEditable -->
	<meta name="author" content="Luka Cvrk (www.solucija.com)" />
	<link rel="stylesheet" href="../css/main.css" type="text/css" />
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
<body>


<?

include('../connect.php');

$User_Id = $_GET['User_Id'];

$strSQL = "SELECT * FROM employee WHERE User_Id = '$User_Id'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found User_Id=".$_GET["User_Id"];
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
			  <li><a href="../Head_admin_home.php">หน้าเเรก</a></li>
				<li><a href="../User_Search.php" class="current">ผู้ใช้งาน</a></li>
				<li><a href="../Cust_Search.php">ลูกค้า</a></li>
				<li><a href="../Prod_Search.php">สินค้า</a></li>
				<li><a href="../User_repair_frm_Amin.php">ซ่อมบำรุง</a></li>
				<li><a href="#">ออกรายงาน</a></li>
                <li><a href="../logout.php">ออกจากระบบ</a></li>
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


  <form id="form1" method="post" action="../User_Update?$User_Id=<?=$_GET["User_Id"];?>">
    <div id="cols">
      <div class="col">
        <table width="270" border="0">
        <tr>
          <td width="45%">รหัสผู้ใช :</td>
          <td width="55%" align="right" id="l"><label for="User_Password"></label>
            <input name="User_Id" type="text" id="User_Id" value="<?=$objResult["User_Id"];?>" size="18" readonly="readonly" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>คำนำหน้า :</td>
          <td align="right" id="l"><label for="textfield2"></label>
            <select name="User_Title" id="User_Title">
              <option value="นาย">นาย</option>
              <option value="นาง">นาง</option>
              <option value="นางสาว">นางสาว</option>
            </select>
<label for="Department_Id"></label></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>บ้านเลขที่ :</td>
          <td align="right" id="l"><label for="textfield3"></label>
            <input name="User_number" type="text" id="User_number" value="<?=$objResult["User_number"];?>" size="18" tabindex="5"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>ตำบล :</td>
          <td align="right" id="l"><label for="textfield4"></label>
            <input name="User_District" type="text" id="User_District" value="<?=$objResult["User_District"];?>" size="18" tabindex="8"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>รหัสไบร์ษณีย์ :</td>
          <td align="right" id="l"><label for="textfield5"></label>
            <input name="User_Code" type="text" id="User_Code" value="<?=$objResult["User_Code"];?>" size="18" tabindex="11"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>เเผนก :</td>
          <td align="right" id="l"><label for="User_Id"></label>
            <select name="Department_Id" id="Department_Id">
              <option value="D00001">บัญชี</option>
              <option value="D00002">งานขาย</option>
            </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" id="l">&nbsp;</td>
        </tr>
        </table>
      </div>
      <div class="col">
	    <table width="267" border="0">
			    <tr>
			      <td width="45%">Username :</td>
			      <td width="55%" colspan="2"><label for="User_Password"></label>
			        <input name="User_Username" type="text" id="User_Username" value="<?=$objResult["User_Username"];?>" size="18" tabindex="1" /></td>
		        </tr>
			    <tr>
			      <td colspan="3">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>		          ชื่อ :</td>
			      <td colspan="2"><label for="textfield2"></label>
			        <input name="User_Fname" type="text" id="User_Fname" value="<?=$objResult["User_Fname"];?>" size="18" tabindex="3"/></td>
		        </tr>
			    <tr>
			      <td colspan="3">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>หมู่ :</td>
			      <td colspan="2"><label for="textfield3"></label>
			        <input name="User_Moo" type="text" id="User_Moo" value="<?=$objResult["User_Moo"];?>" size="18" tabindex="6"/></td>
		        </tr>
			    <tr>
			      <td colspan="3">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>อำเภอ :</td>
			      <td colspan="2"><label for="textfield4"></label>
			        <input name="User_Prefecture" type="text" id="User_Prefecture" value="<?=$objResult["User_Prefecture"];?>" size="18" tabindex="9"/></td>
		        </tr>
			    <tr>
			      <td colspan="3">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>โทรศัพท์ :</td>
			      <td colspan="2"><label for="textfield5"></label>
			        <input name="User_Tel" type="text" id="User_Tel" value="<?=$objResult["User_Tel"];?>" size="18" tabindex="12"/></td>
		        </tr>
			    <tr>
			      <td colspan="3">&nbsp;</td>
		        </tr>
			    <tr>
			      <td height="18"><p>สถานะ :</p>
		          <p>&nbsp;</p></td>
			      <td colspan="2" align="left"><p>
			        <label>
<input name="User_Status" type="radio" id="User_Status2" value="0" checked="checked" />
On </label>
			        &nbsp;<br />
			        <label>
<input type="radio" name="User_Status" value="1" id="User_Status" />
Off</label>
			        &nbsp;<br />
		          </p></td>
		        </tr>
		      </table>
	  </div>
      <div class="col">
	    <table width="267" border="0">
			    <tr>
			      <td width="45%">Password :</td>
			      <td width="55%"><label for="User_Password"></label>
			        <input name="User_Password" type="text" id="User_Password" value="<?=$objResult["User_Password"];?>" size="18" tabindex="2"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>นามสกุล:</td>
			      <td><label for="textfield2"></label>
			        <input name="User_Lname" type="text" id="User_Lname" value="<?=$objResult["User_Lname"];?>" size="18" tabindex="4"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>ถนน :</td>
			      <td><label for="textfield3"></label>
		          <input name="User_Road" type="text" id="User_Road" value="<?=$objResult["User_Road"];?>" size="18" tabindex="7"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>จังหวัด :</td>
			      <td><label for="textfield4"></label>
			        <input name="User_Province" type="text" id="User_Province" value="<?=$objResult["User_Province"];?>" size="18" tabindex="10"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>อีเมล์ :</td>
			      <td><label for="textfield5"></label>
			        <input name="User_Email" type="text" id="User_Email" value="<?=$objResult["User_Email"];?>" size="18" tabindex="13"/></td>
		        </tr>
			    <tr>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
		        </tr>
			    <tr>
			      <td>&nbsp;</td>
			      <td><label for="User_Id"></label></td>
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
