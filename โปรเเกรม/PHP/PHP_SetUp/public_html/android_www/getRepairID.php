<?php
	//$objConnect = mysql_connect("mysql.hostinger.in.th","u570781514_sun","0812775184");
	//$objDB = mysql_select_db("u570781514_sun");

	include('connect.php');
	mysql_query("SET NAMES UTF8");

	//$_POST["txtKeyword"] = "C00009"; // for Sample

	$strKeyword = $_POST["txtKeyword"];
$Chanck="Y";

        $strSQL = "SELECT * FROM repair NATURAL JOIN order_sales NATURAL JOIN customers WHERE  Repair_Id LIKE '%".$strKeyword."%'OR Cust_Id LIKE '%".$strKeyword."%' OR Cust_Fname LIKE '%".$strKeyword."%' OR Cust_Lname LIKE '%".$strKeyword."%' ORDER BY Repair_Id";

	$objQuery = mysql_query($strSQL);
	$intNumField = mysql_num_fields($objQuery);
	$resultArray = array();
	while($obResult = mysql_fetch_array($objQuery))
	{
if( $obResult['Repair_status_ch']==$Chanck ){

		$arrCol = array();
		for($i=0;$i<$intNumField;$i++)
		{
			$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
		}
		array_push($resultArray,$arrCol);
	}
}
	
	mysql_close($objConnect);
	
	echo json_encode($resultArray);
?>	