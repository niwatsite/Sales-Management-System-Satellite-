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
			      <td colspan="3">ซ่อมบำรุง&gt;&gt;จัดการสถานะเเจ้งซ้อม&gt;&gt;สถานะการเเจ้งซ่อม</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
    <div id="cols">
      <table width="100%" border="0" align="center">
      <tr align="center">
          <th colspan="3" align="center"><p><a href="T_User_repair_home.php">รับเรื่องการเเจ้งซ่อม</a> | สถานะการเเจ้งซ่อม</p>
          <p>&nbsp;</p></th>
        </tr>
        <tr align="center">
          <th width="300" align="right">&nbsp;</th>
          <th width="298">Keyword :
          <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_GET["txtKeyword"];?>" size="20" />            <input name="Btn_search" type="submit" id="Btn_search" value="ค้นหา" /></th>
          <th width="300" align="left">&nbsp;</th>
        </tr>
        <tr align="center">
          <th height="18" colspan="3" align="right">&nbsp;</th>
        </tr>
      </table>
      <?
	if($_GET["txtKeyword"] != "")
	{
	// Search
	$strSQL = "SELECT * FROM repair NATURAL JOIN order_sales NATURAL JOIN customers NATURAL JOIN products NATURAL JOIN employee WHERE 1 AND repair.Repair_status_ch = 'N' AND(repair.Repair_Id LIKE '%".$_GET["txtKeyword"]."%' or order_sales.Cust_Id LIKE '%".$_GET["txtKeyword"]."%' or customers.Cust_Fname LIKE '%".$_GET["txtKeyword"]."%')ORDER BY repair.Repair_Id";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>

<table width="100%" border="0" align="center">
	  <tr bgcolor="#FFFFFF">
      	<th width="5%"> <div align="center">รับเรื่อง</div></th>
      	<th width="5%"> <div align="center">รหัสเเจ้งซ่อม</div></th>
        <th width="12%"> <div align="center">วันที่รับเรื่อง</div></th>
		  <th width="5%"> <div align="center">รหัสลูค้า</div></th>
		  <th width="13%"> <div align="center">ชื่อ - นามสกุล</div></th>
				<th width="12%"> <div align="center">เบอร์โทร</div></th>
        <th width="7%"> <div align="center">รหัสสินค้า</div></th>
				<th width="11%"> <div align="center">ชื่อสินค้า</div></th>
				<th width="8%"> <div align="center">สภาพการซ่อม</div></th>
				<th width="14%"> <div align="center">ชื่อ - นามสกุล ผู้รับเรื่อง</div></th>
		</tr>
<?php
$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
		$i++;
		if($i%2==0)
		{
			$bg = "#CDC9C9";
		}
		else
		{
			$bg = "#CDC9A5";
		}
?>
	  <tr bgcolor="<?=$bg;?>">
       <td align="center"><a href="T_User_repair_Update.php?Repair_Id=<?php echo $objResult["Repair_Id"];?>">เลือก</a></td>
        <td align="center"><?=$objResult["Repair_Id"];?></td>
        <td align="center"><?=$objResult["Repair_Date_In"];?></td>
				<td width="10" align="center"><?=$objResult["Cust_Id"];?></td>
				<td align="center"><?=$objResult["Cust_Fname"];?>&nbsp;&nbsp;<?=$objResult["Cust_Lname"];?></td>
				<td align="center"><?=$objResult["Cust_Tel"];?></td>
        <td align="center"><?=$objResult["Prod_Id"];?></td>
				<td align="center"><?=$objResult["Prod_Name"];?></td>
				<td align="center"><?=$objResult["Repair_status_ch"];?></td>
				<td align="center"><?=$objResult["User_Fname"];?>&nbsp;&nbsp;<?=$objResult["User_Lname"];?></td>
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
