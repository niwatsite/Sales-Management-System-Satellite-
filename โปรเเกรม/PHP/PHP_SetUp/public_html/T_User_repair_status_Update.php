<?php
include("session.php");
include('connect.php');

$strSQL = "UPDATE repair SET ";
$strSQL .="Repair_Id = '".$_POST["TT"]."' ";
$strSQL .=",Repair_status_ch = '".$_POST["Repair_status_ch"]."' ";
$strSQL .="WHERE Repair_Id = '".$_POST["TT"]."' ";

$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "Save successful.";
	echo "<meta http-equiv='refresh' content='1;url=T_User_repair_home.php' />";
}
else
{
	echo "Error Save [".$strSQL."]";
	echo "<meta http-equiv='refresh' content='2;url=T_User_repair_status.php' />";
}
mysql_close();
?>
</body>
</html>
