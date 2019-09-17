<html>
<head>
<title>Sales Management System</title>
</head>
<?

include('connect.php');
?>
<body>

<form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
  <table width="100%" border="0" align="center">
    <tr align="center">
      <th width="654" align="right">Keyword : 
        <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_GET["txtKeyword"];?>" size="20"></th>
      <th width="95"><input name="Btn_search" type="submit" id="Btn_search" value="ค้นหา"></th>
	  <th width="348" align="left"><a href="User_In.php">เพิ่มข้อมูล</a></th>
    </tr>
    <tr align="center">
      <th align="right">&nbsp;</th>
      <th>&nbsp;</th>
      <th align="left">&nbsp;</th>
    </tr>
  </table>
</form>

	<?
	if($_GET["txtKeyword"] != "")
	{
	// Search 
	$strSQL = "SELECT * FROM employee WHERE (User_Id LIKE '%".$_GET["txtKeyword"]."%' or User_Fname LIKE '%".$_GET["txtKeyword"]."%' or User_Lname LIKE '%".$_GET["txtKeyword"]."%' )";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>

<table width="100%" border="1" align="center">
	  <tr bgcolor="#FFFFFF">
      	<th> <div align="center">Edit </div></th>
        <th> <div align="center">Delete </div></th>
		<th> <div align="center">รหัส</div></th>
        <th> <div align="center">คำนำหน้า </div></th>
		<th> <div align="center">ชื่อ</div></th>
		<th> <div align="center">นามสกุล </div></th>
		<th> <div align="center">บ้านเลขที่</div></th>
		<th> <div align="center">หมู่</div></th>
		<th> <div align="center">ถนน</div></th>
        <th> <div align="center">ตำบล</div></th>
		<th> <div align="center">อำเภอ</div></th>
		<th> <div align="center">จังหวัด</div></th>
		<th> <div align="center">รหัสไปรษณีย์</div></th>
		<th> <div align="center">เบอร์โทร</div></th>
		<th> <div align="center">อีเมล์</div></th>
        <th> <div align="center">หมายเหตุ</div></th>
		<th> <div align="center">สถานะ </div></th>
		<th> <div align="center">สิทธิ์</div></th>
		<th> <div align="center">เเผนก </div></th>
  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
         <td align="center"><a href="JavaScript:if(confirm('Confirm Edit?')==true){window.location='User_Search_Edit.php?User_Id=<?=$objResult["User_Id"];?>';}">Edit</a></td>
        <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='User_Search_De.php?User_Id=<?=$objResult["User_Id"];?>';}">Delete</a></td>
		<td align="center"><?=$objResult["User_Id"];?></td>
        <td align="center"><?=$objResult["User_Title"];?></td>
		<td align="center"><?=$objResult["User_Fname"];?></td>
		<td align="center"><?=$objResult["User_Lname"];?></td>
		<td align="center"><?=$objResult["User_number"];?></td>
		<td align="center"><?=$objResult["User_Moo"];?></td>
		<td align="center"><?=$objResult["User_Road"];?></td>
        <td align="center"><?=$objResult["User_District"];?></td>
		<td align="center"><?=$objResult["User_Prefecture"];?></td>
		<td align="center"><?=$objResult["User_Province"];?></td>
		<td align="center"><?=$objResult["User_Code"];?></td>
		<td align="center"><?=$objResult["User_Tel"];?></td>
        <td align="center"><?=$objResult["User_Email"];?></td>
		<td align="center"><?=$objResult["User_Remark"];?></td>
		<td align="center"><?=$objResult["User_Status"];?></td>
		<td align="center"><?=$objResult["User_Status_Admin"];?></td>
		<td align="center"><?=$objResult["Department_Id"];?></td>
  </tr>
	<?
	}
	?>
</table>
	<?
	mysql_close();
	}
?>
</body>
</html>