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

    .delete:before {	content: "\2718";
}
  .edit:before {	content: "\270E";
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
        <li><a href="Prod_edit_frm.php">สินค้า</a></li>
        <li><a href="#"class="current">ดอกเบี้ย</a></li>
        <li><a href="User_repair_frm_Amin.php">ซ่อมบำรุง</a></li>
        <li><a href="report.php">ออกรายงาน</a></li>
        <li><a href="logout.php">ออกจากระบบ</a></li>
    </ul>

      <div id="pitch">
        <table width="100%" border="0">
          <tr>
            <td width="15%">ชื่อผู้ใช้ระบบ :</td>
            <td width="33%"><label><?php echo $login_User_Fname . " " . $login_User_Lname; ?></label></td>
            <td width="46%"></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td colspan="3">ดอกเบี้ย&gt;&gt;ค้นหา - เเก้ไข - ลบ </td>
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
    <th width="300" align="left"><a href="Tax_In.php">เพิ่มข้อมูล</a></th>
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
  $strSQL = "SELECT * FROM tax WHERE (Tax_Id LIKE '%".$_GET["txtKeyword"]."%' or Tax_Mon LIKE '%".$_GET["txtKeyword"]."%' or Tax_Rate LIKE '%".$_GET["txtKeyword"]."%')ORDER BY Tax_Mon";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<table width="100%" border="0" align="center">
    <tr bgcolor="#FFFFFF">
    <th width="15%"> <div align="center">รหัส</div></th>
    <th width="37%"> <div align="center">จำนวนเดือน </div></th>
    <th width="28%"> <div align="center">อัตราดอกเบี้ย (%)</div></th>
    <th width="28%"> <div align="center">&#3623;&#3633;&#3609;&#3648;&#3623;&#3621;&#3634;&#3607;&#3637;&#3656;&#3607;&#3635;&#3585;&#3634;&#3619;&#3648;&#3648;&#3585;&#3657;&#3652;&#3586;</div></th>
    <th width="12%"> <div align="center">Edit</div></th>
    <th width="12%">  <div align="center">Delete</div></th>
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
      <td align="center"><?=$objResult["Tax_Id"];?></td>
      <td align="center"><?=$objResult["Tax_Mon"];?></td>
      <td align="center"><?=$objResult["Tax_Rate"];?></td>
      <td align="center"><?=$objResult["Tax_Date"];?></td>
      <td align="center"><a href="Tax_Search_Edit.php?Tax_Id=<?php echo $objResult["Tax_Id"];?>"class="edit">Edit</a></td>
      <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='Tax_Search_De.php?Tax_Id=<?=$objResult["Tax_Id"];?>';}"class="delete">Delete</a></td>
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