<?php
	//$objConnect = mysql_connect("mysql.hostinger.in.th","u570781514_sun","0812775184");
	//$objDB = mysql_select_db("u570781514_sun");

	include('connect.php');
	mysql_query("SET NAMES UTF8");
	date_default_timezone_set('Asia/Bangkok');
	

		 $_POST["Order_Date_Setup"] = date("Y-m-d H:i:s");

        
		$strRepair_status_ch = $_POST["Repair_status_ch"];
        $strOrder_Date_Setup = $_POST["Order_Date_Setup"];
        $strOrder_User_Id_Setup	= $_POST["User_Id_Setup"];
        $strRepair_Id = $_POST["Repair_Id"];

	
	/*** Update ***/
	$strSQL = " UPDATE repair SET
		Repair_status_ch = '".$strRepair_status_ch."',
                Repair_Date_Setrepair = '".$strOrder_Date_Setup."',
                Repair_User_Id_Setrepair = '".$strOrder_User_Id_Setup."'
		WHERE Repair_Id = '".$strRepair_Id."'";

	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		$arr['StatusID'] = "0"; 
		$arr['Error'] = "Cannot save data!";	
	}
	else
	{
		$arr['StatusID'] = "1"; 
		$arr['Error'] = "";	
	}

	/**
		$arr['StatusID'] // (0=Failed , 1=Complete)
		$arr['Error'] // Error Message
	*/
	
	mysql_close($objConnect);
	
	echo json_encode($arr);
?>