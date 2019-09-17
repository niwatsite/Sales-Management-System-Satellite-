<?php
	//$objConnect = mysql_connect("mysql.hostinger.in.th","u570781514_sun","0812775184");
	//$objDB = mysql_select_db("u570781514_sun");

	include('connect.php');
	mysql_query("SET NAMES UTF8");

	//$_POST["strUser"] = "0000"; // for Sample
	//$_POST["strPass"] = "0000";  // for Sample

	$strUsername = $_POST["strUser"];
	$strPassword = $_POST["strPass"];
	$strSQL = "SELECT * FROM employee WHERE 1 
		AND User_Username = '".$strUsername."'  
		AND User_Password = '".md5($strPassword)."'  
		";

	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$intNumRows = mysql_num_rows($objQuery);
	if($intNumRows==0)
	{
		$arr['StatusID'] = "0"; 
		$arr['User_Id'] = "0"; 
		$arr['Error'] = "Incorrect Username and Password";	
	}
	else
	{
		$arr['StatusID'] = "1"; 
		$arr['User_Id'] = $objResult["User_Id"]; 
		$arr['Error'] = "";	
	}

	/**
		$arr['StatusID'] // (0=Failed , 1=Complete)
		$arr['MemberID'] // MemberID
		$arr['Error']  // Error Message
	*/
	
	mysql_close($objConnect);
	
	echo json_encode($arr);
?>