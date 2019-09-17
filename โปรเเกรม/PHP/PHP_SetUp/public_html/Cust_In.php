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
</head>
<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('Cust_Fname').value == "")
    {
        alert('PLEASE INPUT  Name');
        return false;
    }
    if(document.getElementById('Cust_Lname').value == "")
    {
        alert('PLEASE INPUT Last Name');
        return false;
    }
    if(document.getElementById('Cust_Id_Current').value == "")
    {
        alert('PLEASE INPUT Identity Card');
        return false;
    }
}
</script>
<body>

<?php

include('connect.php');

$maxSQL = "SELECT max(Cust_Id)as MaxEID FROM customers";
			$maxQuery = mysql_query($maxSQL) or die (mysql_error());
			$maxResult = mysql_fetch_array($maxQuery);

			$NewEID;

			if($maxResult["MaxEID"]!="")
			{
			$MaxID=(int)substr($maxResult["MaxEID"], 2);
			$MaxID+=1;

				if($MaxID<10){
					$NewEID="C0000".$MaxID;
				}
				elseif($MaxID<100 && $MaxID>=10){
					$NewEID="C000".$MaxID;
				}
				elseif($MaxID<1000 && $MaxID>=100){
					$NewEID="C00".$MaxID;
				}
				elseif($MaxID<10000 && $MaxID>=1000){
					$NewEID="C0".$MaxID;
				}
				else{
					$NewEID="C".$MaxID;
				}
			}
			else
			{
			$NewEID="C00001";
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
				<li><a href="Cust_Search.php" class="current">ลูกค้า</a></li>
				<li><a href="Prod_edit_frm.php">สินค้า</a></li>
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
			      <td colspan="3">ลูกค้า&gt;&gt;เพิ่มข้อมูลลูกค้า</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="form1" method="post" action="Cust_Add.php" onSubmit="JavaScript:return fncSubmit();">
    <div id="cols">
      <div class="col">
        <table width="270" border="0">
        <tr>
          <td width="45%">&#3619;&#3627;&#3633;&#3626;&#3621;&#3641;&#3585;&#3588;&#3657;&#3634; :</td>
          <td width="55%" align="right" id="l"><label for="Cust_Password"></label>
            <input name="NewEID" type="text" id="NewEID" value="<?php echo $NewEID;?>" size="18" readonly="readonly" /></td>
        </tr>
                        <tr>
			      <td width="55%">&nbsp;</td>
			      <td><label for="textfield2"></label></td>
		        </tr>
        		<tr>
			      <td width="55%">ชื่อ :</td>
			      <td><label for="textfield2">
			        <input name="Cust_Fname" type="text" id="Cust_Fname" size="18" maxlength="50" tabindex="1"/>
			      </label></td>
		        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>บ้านเลขที่ :</td>
          <td align="right" id="l"><label for="textfield3"></label>
            <input name="Cust_number" type="text" id="Cust_number" size="18" maxlength="10" tabindex="3"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>ตำบล :</td>
          <td align="right" id="l"><label for="textfield4"></label>
            <input name="Cust_District" type="text" id="Cust_District" size="18" maxlength="50" tabindex="6"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>รหัสไบร์ษณีย์ :</td>
          <td align="right" id="l"><label for="textfield5"></label>
            <input name="Cust_Code" type="text" id="Cust_Code" size="18" maxlength="5" tabindex="9"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="col">
	    <table width="267" border="0">
                <tr>
			      <td width="55%">&nbsp;</td>
			      <td><label for="textfield2"></label></td>
		        </tr>
        		<tr>
			      <td width="55%">&nbsp;</td>
			      <td><label for="textfield2"></label></td>
		        </tr>
			    <tr>
			    <tr>
			      <td width="55%">นามสกุล :</td>
			      <td><label for="textfield2">
			        <input name="Cust_Lname" type="text" id="Cust_Lname" size="18" maxlength="50" tabindex="2"/>
			      </label></td>
		        </tr>
			    <tr>
			      <td width="55" colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>หมู่ :</td>
			      <td><label for="textfield3"></label>
			        <input name="Cust_Moo" type="text" id="Cust_Moo" size="18" maxlength="5" tabindex="4"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>อำเภอ :</td>
			      <td><label for="textfield4"></label>
			        <input name="Cust_Prefecture" type="text" id="Cust_Prefecture" size="18" maxlength="50" tabindex="7"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>โทรศัพท์ :</td>
			      <td><input name="Cust_Tel" type="text" id="Cust_Tel" size="18" maxlength="12" tabindex="10"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
	      </tr>
        </table>
	  </div>
      <div class="col">
	    <table width="267" border="0">
                <tr>
			      <td width="55%">&nbsp;</td>
			      <td><label for="textfield2"></label></td>
		        </tr>
        		<tr>
			      <td width="55%">&nbsp;</td>
			      <td><label for="textfield2"></label></td>
		        </tr>
			    <tr>
			      <td width="45%">ID Card :</td>
			      <td width="55%"><label for="textfield2"></label>
		          <input name="Cust_Id_Current" type="text" id="Cust_Id_Current" size="18" maxlength="13" tabindex="2"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>ถนน :</td>
			      <td><label for="textfield3"></label>
			        <input name="Cust_Road" type="text" id="Cust_Road" size="18" maxlength="50" tabindex="5"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>จังหวัด :</td>
			      <td><label for="textfield4"></label>
			        <input name="Cust_Province" type="text" id="Cust_Province" size="18" maxlength="50" tabindex="8"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>อีเมล์ :</td>
			      <td><label for="textfield5"></label>
			        <input name="Cust_Email" type="text" id="Cust_Email" size="18" maxlength="50" tabindex="11"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
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