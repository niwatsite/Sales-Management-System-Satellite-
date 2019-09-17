<?php
	//$objConnect = mysql_connect("mysql.hostinger.in.th","u570781514_sun","0812775184");
	//$objDB = mysql_select_db("u570781514_sun");

	include('connect.php');
	mysql_query("SET NAMES UTF8");

	$strMemberID = $_POST["sMemberID"];
	$strSQL = "SELECT * FROM  employee NATURAL JOIN department WHERE 1 AND User_Id = '".$strMemberID."'  ";

	$objQuery = mysql_query($strSQL);
	$obResult = mysql_fetch_array($objQuery);
	if($obResult)
	{
		$arr["User_Id"] = $obResult["User_Id"];
		$arr["User_Username"] = $obResult["User_Username"];
		$arr["User_Password"] = $obResult["User_Password"];
		$arr["User_Fname"] = $obResult["User_Fname"];
		$arr["User_Lname"] = $obResult["User_Lname"];
		$arr["User_Tel"] = $obResult["User_Tel"];
		$arr["Department_name"] = $obResult["Department_name"];
	}

	
	mysql_close($objConnect);

	/*** return JSON by MemberID ***/
	/* Eg :
	{"MemberID":"2",
	"Username":"adisorn",
	"Password":"adisorn@2",
	"Name":"Adisorn Bunsong",
	"Tel":"021978032",
	"Email":"adisorn@thaicreate.com"}
	*/
	
	echo json_encode($arr);
?>