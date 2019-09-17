<?php
include("session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!-- TemplateBeginEditable name="doctitle" -->
	<title>Social Community Management</title>
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



<?

include('connect.php');

$Cust_Id = $_GET['Cust_Id'];


$strSQL = "SELECT * FROM customers WHERE Cust_Id = '$Cust_Id'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found Cust_Id=".$_GET["Cust_Id"];
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
			      <td colspan="3">งานขาย&gt;&gt;รายละเอียดสินค้า&gt;&gt;รายการสินค้าที่เลือก&gt;&gt;ลูกค้า</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="form1" method="POST" action="T_Prod_show_detail_show_cust_Add.php" onSubmit="JavaScript:return fncSubmit();">
    <div id="cols">
      <div class="col">
        <table width="270" border="0">
       <tr align="center">
          <th colspan="3" align="center"><p>&nbsp;</p>
            <p>&nbsp;</p></th>
        </tr>
         <tr>
          <td>รหัสผู้ใช้ :</td>
          <td><input name="Cust_Id" type="text" id="Cust_Id" value="<?=$objResult["Cust_Id"];?>" size="18" readonly="readonly" /></td>
         </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="45%">ชื่อ :</td>
          <td width="55%" align="right" id="l"><label for="Cust_Password"></label>
            <input name="Cust_Fname" type="text" id="Cust_Fname" value="<?=$objResult["Cust_Fname"];?>" size="18" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>บ้านเลขที่ :</td>
          <td align="right" id="l"><label for="textfield3"></label>
            <input name="Cust_Number" type="text" id="Cust_Number" value="<?=$objResult["Cust_Number"];?>" size="18" tabindex="3"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>ตำบล :</td>
          <td align="right" id="l"><label for="textfield4"></label>
            <input name="Cust_District" type="text" id="Cust_District" value="<?=$objResult["Cust_District"];?>" size="18" tabindex="6"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>รหัสไบร์ษณีย์ :</td>
          <td align="right" id="l"><label for="textfield5"></label>
            <input name="Cust_Code" type="text" id="Cust_Code" value="<?=$objResult["Cust_Code"];?>" size="18" tabindex="9"/></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="col">
	    <table width="267" border="0">
        <tr align="center">
          <th colspan="3" align="center"><p><a href="T_Prod_show_detail_show_cust_In.php">เพิ่มลูกค้าใหม่ </a>| <a href="T_Prod_show_detail_show_cust_search.php">ค้นหาลูกค้า</a></p>
            <p>&nbsp;</p></th>
        </tr>
			    <tr>
			      <td>ละติจูด :</td>
			      <td><input name="StoreLati" type="text" id="StoreLati" value="<?=$objResult["StoreLati"];?>" size="18" /></td>
	      </tr>
			    <tr>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
	      </tr>
			    <tr>
			      <td width="55%">นามสกุล :</td>
			      <td><label for="StoreLongi"></label>
			        <input name="Cust_Lname" type="text" id="Cust_Lname" value="<?=$objResult["Cust_Lname"];?>" size="18" tabindex="1"/></td>
		        </tr>
			    <tr>
			      <td width="55" colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>หมู่ :</td>
			      <td><label for="textfield3"></label>
			        <input name="Cust_Moo" type="text" id="Cust_Moo" value="<?=$objResult["Cust_Moo"];?>" size="18" tabindex="4"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>อำเภอ :</td>
			      <td><label for="textfield4"></label>
			        <input name="Cust_Prefecture" type="text" id="Cust_Prefecture" value="<?=$objResult["Cust_Prefecture"];?>" size="18" tabindex="7"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>โทรศัพท์ :</td>
			      <td><label for="textfield5"></label>
			        <input name="Cust_Tel" type="text" id="Cust_Tel" value="<?=$objResult["Cust_Tel"];?>" size="18" tabindex="10"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
	      </tr>
        </table>
	  </div>
      <div class="col">
	    <table width="267" border="0">
         <tr align="center">
          <th colspan="3" align="center"><p>&nbsp;</p>
            <p>&nbsp;</p></th>
        </tr>
			    <tr>
			      <td>ลองจิจูด :</td>
			      <td><input name="StoreLongi" type="text" id="StoreLongi" value="<?=$objResult["StoreLongi"];?>" size="18" /></td>
	      </tr>
			    <tr>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
	      </tr>
			    <tr>
			      <td width="45%">ID Card :</td>
			      <td width="55%"><label for="StoreLongi"></label>
			        <input name="Cust_Id_Current" type="text" id="Cust_Id_Current" value="<?=$objResult["Cust_Id_Current"];?>" size="18" tabindex="2"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>ถนน :</td>
			      <td><label for="textfield3"></label>
			        <input name="Cust_Road" type="text" id="Cust_Road" value="<?=$objResult["Cust_Road"];?>" size="18" tabindex="5"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>จังหวัด :</td>
			      <td><label for="textfield4"></label>
		          <input name="Cust_Province" type="text" id="Cust_Province" value="<?=$objResult["Cust_Province"];?>" size="18" tabindex="8"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>อีเมล์ :</td>
			      <td><label for="textfield5"></label>
			        <input name="Cust_Email" type="text" id="Cust_Email" value="<?=$objResult["Cust_Email"];?>" size="18" tabindex="11"/></td>
		        </tr>
			    <tr>
			      <td colspan="2">&nbsp;</td>
		        </tr>
		      </table>
	    <p>
	      <input type="submit" name="button2" id="button2" value="ถัดไป" />
	    </p>
	  </div>
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