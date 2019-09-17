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

<?

include('connect.php');
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
			  <li><a href="Head_admin_home.php">หน้าเเรก</a></li>
				<li><a href="User_Search.php">ผู้ใช้งาน</a></li>
				<li><a href="Cust_Search.php">ลูกค้า</a></li>
				<li><a href="#" class="current">สินค้า</a></li>
				<li><a href="Tax_Search">ดอกเบี้ย</a></li>
				<li><a href="User_repair_frm_Amin.php">ซ่อมบำรุง</a></li>
				<li><a href="#">ออกรายงาน</a></li>
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
			      <td colspan="3">สินค้า&gt;&gt;ค้นหา - เเก้ไข - ลบ </td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>

  <form id="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
    <div id="cols">

  <table width="100%" border="0" align="center">
    <tr align="center">
      <th width="300" align="right">&nbsp;</th>
      <th width="298">Keyword :
        <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_GET["txtKeyword"];?>" size="20" />        <input name="Btn_search" type="submit" id="Btn_search" value="ค้นหา"></th>
	  <th width="300" align="left"><a href="Prod_In.php">เพิ่มข้อมูล</a></th>
    </tr>
    <tr align="center">
      <th colspan="3" align="right">&nbsp;</th>
      </tr>
  </table>
    <?
	if($_GET["txtKeyword"] != "")
	{
	// Search
	$strSQL = "SELECT * FROM products WHERE (Prod_Id LIKE '%".$_GET["txtKeyword"]."%' or Prod_name LIKE '%".$_GET["txtKeyword"]."%')";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>

<table width="100%" border="0" align="center">
	  <tr bgcolor="#FFFFFF">
      	<th> <div align="center">Edit </div></th>
        <th> <div align="center">Delete </div></th>
		<th> <div align="center">รหัส</div></th>
		<th> <div align="center">ชื่อสินค้า</div></th>
        <th> <div align="center">ราคาซื้้อ </div></th>
		<th> <div align="center">ราคาขาย </div></th>
		<th> <div align="center">รูป</div></th>
        <th> <div align="center">หมายเหตุ</div></th>
  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
         <td align="center"><a href="Prod_Search_Edit.php?Prod_Id=<?php echo $objResult["Prod_Id"];?>">Edit</a></td>
        <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='Prod_Search_De.php?Prod_Id=<?=$objResult["Prod_Id"];?>';}">Delete</a></td>
		<td align="center"><?=$objResult["Prod_Id"];?></td>
        <td align="center"><?=$objResult["Prod_Name"];?></td>
		<td align="center"><?=$objResult["Prod_O"];?></td>
		<td align="center"><?=$objResult["Prod_SalePrice"];?></td>
        <td align="center"><?=$objResult["Prod_Pic"];?></td>
		<td align="center"><?=$objResult["Prod_Remark"];?></td>
  </tr>
	<?
	}
	?>
</table>
	<?
	mysql_close();
	}
?>
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
