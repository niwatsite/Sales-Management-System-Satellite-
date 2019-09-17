<?php
	//$objConnect = mysql_connect("mysql.hostinger.in.th","u570781514_sun","0812775184");
	//$objDB = mysql_select_db("u570781514_sun");

	include('connect.php');
	mysql_query("SET NAMES UTF8");
	date_default_timezone_set('Asia/Bangkok');
	
	/*** for Sample 
		$_POST["sMemberID"] = "2";
		$_POST["sPassword"] = "adisorn@2";
		$_POST["sName"] = "Adisorn Bunsong";
		$_POST["sEmail"] = "adisorn@thaicreate.com";
		$_POST["sTel"] = "021978032";
	*/


          //$_POST["Order_Status_Setup"] = "1";
          //$_POST["Order_Id"]= "O00012";


        $_POST["Order_Date_Setup"] = date("Y-m-d H:i:s");

        
	$strOrder_Status_Setup = $_POST["Order_Status_Setup"];
        $strOrder_Date_Setup = $_POST["Order_Date_Setup"];
        $strOrder_User_Id_Setup	= $_POST["User_Id_Setup"];
        $strOrder_Id = $_POST["Order_Id"];

	
	/*** Update ***/
	$strSQL = " UPDATE order_sales SET
		Order_Status_Setup = '".$strOrder_Status_Setup."',
                Order_Date_Setup = '".$strOrder_Date_Setup."',
                Order_User_Id_Setup = '".$strOrder_User_Id_Setup."'
		WHERE Order_Id = '".$strOrder_Id."'
	";

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