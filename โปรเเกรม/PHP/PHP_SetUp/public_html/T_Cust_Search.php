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
							<li><a href="T_Cust_Search.php" class="current">ลูกค้า</a></li>
							<li><a href="T_Prod_show_detail_show.php">&#3586;&#3634;&#3618;</a></li>
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
			      <td colspan="3">ลูกค้า&gt;&gt;ค้นหา - เเก้ไข - ลบ </td>
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
	  <th width="300" align="left"><a href="T_Cust_In.php">เพิ่มข้อมูล</a></th>
    </tr>
    <tr align="center">
      <th colspan="3" align="right"><p>&nbsp;</p>
        <p>&nbsp;</p></th>
      </tr>
  </table>
    <?
	if($_GET["txtKeyword"] != "")
	{
	// Search
	$strSQL = "SELECT * FROM customers WHERE (Cust_Id LIKE '%".$_GET["txtKeyword"]."%' or Cust_Fname LIKE '%".$_GET["txtKeyword"]."%' or Cust_Lname LIKE '%".$_GET["txtKeyword"]."%' )ORDER BY Cust_Id";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>

<table width="100%" border="0" align="center">
	  <tr bgcolor="#FFFFFF">
			<th> <div align="center">รหัส</div></th>
			<th> <div align="center">ชื่อ</div></th>
			<th> <div align="center">นามสกุล </div></th>
			<th> <div align="center">บ้านเลขที่</div></th>
			<th> <div align="center">หมู่</div></th>
			<th> <div align="center">ถนน</div></th>
      <th> <div align="center">ตำบล</div></th>
			<th> <div align="center">อำเภอ</div></th>
			<th> <div align="center">จังหวัด</div></th>
                        <th> <div align="center">&#3619;&#3627;&#3633;&#3626;&#3652;&#3611;&#3619;&#3625;&#3603;&#3637;&#3618;&#3660;</div></th>
			<th> <div align="center">เบอร์โทร</div></th>
			<th> <div align="center">อีเมล์</div></th>
			<th> <div align="center">Edit </div></th>
			<th> <div align="center">Delete </div></th>
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
			<td align="center"><?=$objResult["Cust_Id"];?></td>
			<td align="center"><?=$objResult["Cust_Fname"];?></td>
			<td align="center"><?=$objResult["Cust_Lname"];?></td>
			<td align="center"><?=$objResult["Cust_Number"];?></td>
			<td align="center"><?=$objResult["Cust_Moo"];?></td>
			<td align="center"><?=$objResult["Cust_Road"];?></td>
      <td align="center"><?=$objResult["Cust_District"];?></td>
			<td align="center"><?=$objResult["Cust_Prefecture"];?></td>
			<td align="center"><?=$objResult["Cust_Province"];?></td>
			<td align="center"><?=$objResult["Cust_Code"];?></td>
			<td align="center"><?=$objResult["Cust_Tel"];?></td>
      <td align="center"><?=$objResult["Cust_Email"];?></td>
			<td align="center"><a href="T_Cust_Search_Edit.php?Cust_Id=<?php echo $objResult["Cust_Id"];?>"class="edit">Edit</a></td>
			<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='T_Cust_Search_De.php?Cust_Id=<?=$objResult["Cust_Id"];?>';}"class="delete">Delete</a></td>
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
