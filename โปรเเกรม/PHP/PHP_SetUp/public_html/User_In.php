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
    if(document.getElementById('User_Username').value == "")
    {
        alert('PLEASE INPUT  UserName');
        return false;
    }
    if(document.getElementById('User_Password').value == "")
    {
        alert('PLEASE INPUT Password');
        return false;
    }
    if(document.getElementById('User_Fname').value == "")
    {
        alert('PLEASE INPUT Name');
        return false;
    }
    if(document.getElementById('User_Lname').value == "")
    {
        alert('PLEASE INPUT Last Name');
        return false;
    }
    if(document.getElementById('User_Tel').value == "")
    {
        alert('PLEASE INPUT Tel');
        return false;
    }
}
</script>
<body>

<?php

include('connect.php');

$maxSQL = "SELECT max(User_Id)as MaxEID FROM employee";
			$maxQuery = mysql_query($maxSQL) or die (mysql_error());
			$maxResult = mysql_fetch_array($maxQuery);

			$NewEID;

			if($maxResult["MaxEID"]!="")
			{
			$MaxID=(int)substr($maxResult["MaxEID"], 2);
			$MaxID+=1;

				if($MaxID<10){
					$NewEID="U0000".$MaxID;
				}
				elseif($MaxID<100 && $MaxID>=10){
					$NewEID="U000".$MaxID;
				}
				elseif($MaxID<1000 && $MaxID>=100){
					$NewEID="U00".$MaxID;
				}
				elseif($MaxID<10000 && $MaxID>=1000){
					$NewEID="U0".$MaxID;
				}
				else{
					$NewEID="U".$MaxID;
				}
			}
			else
			{
			$NewEID="U00001";
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
				<li><a href="User_Search.php" class="current">ผู้ใช้งาน</a></li>
				<li><a href="Cust_Search.php">ลูกค้า</a></li>
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
			      <td colspan="3">ผู้ใช้งาน&gt;&gt;เพิ่มข้อมูลผู้ใช้งาน</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="form1" method="post" action="User_Add.php" onSubmit="JavaScript:return fncSubmit();">
    <div id="cols">
      <div class="col">
        <table width="270" border="0">
        <tr>
          <td width="45%">รหัสผู้ใช้ :</td>
          <td width="55%" align="right" id="l"><label for="User_Password"></label>
            <input name="NewEID" type="text" id="NewEID" value="<?php echo $NewEID;?>" size="18" readonly="readonly" /></td>
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
<label for="select2"></label></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>บ้านเลขที่ :</td>
          <td align="right" id="l"><label for="textfield3"></label>
            <input name="User_number" type="text" id="User_number" size="18" maxlength="10" tabindex="5" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>ตำบล :</td>
          <td align="right" id="l"><label for="textfield4"></label>
            <input name="User_District" type="text" id="User_District" size="18" maxlength="50" tabindex="8" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>รหัสไบร์ษณีย์ :</td>
          <td align="right" id="l"><label for="textfield5"></label>
            <input name="User_Code" type="text" id="User_Code" size="18" maxlength="5" tabindex="11" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td>เเผนก :</td>
          <td align="right" id="l"><select name="Department_Id" id="Department_Id" tabindex="12" >
			<?php
			$strSQL = "SELECT * FROM department ORDER BY Department_Id ASC";
			$objQuery = mysql_query($strSQL);
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<option value="<?php echo $objResuut["Department_Id"];?>" <?php echo $sel;