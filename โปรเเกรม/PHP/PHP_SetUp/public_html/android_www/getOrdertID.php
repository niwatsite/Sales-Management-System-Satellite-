<?php
	//$objConnect = mysql_connect("mysql.hostinger.in.th","u570781514_sun","0812775184");
	//$objDB = mysql_select_db("u570781514_sun");

	include('connect.php');
	mysql_query("SET NAMES UTF8");

	//$strMemberID = $_POST["sMemberID"];
	$strSQL = "SELECT max(Order_Id)as MaxEID FROM order_sales ";

	$objQuery = mysql_query($strSQL);
	$maxResult = mysql_fetch_array($objQuery);

		//$arr["User_Id"] = $obResult["User_Id"];

			$NewEID;
			if($maxResult["MaxEID"]!="")
			{
			$MaxID=(int)substr($maxResult["MaxEID"], 2);
			$MaxID+=1;
			
				if($MaxID<10){
					$NewEID="O0000".$MaxID;
				}
				elseif($MaxID<100 && $MaxID>=10){
					$NewEID="O000".$MaxID;
				}
				elseif($MaxID<1000 && $MaxID>=100){
					$NewEID="O00".$MaxID;
				}
				elseif($MaxID<10000 && $MaxID>=1000){
					$NewEID="O0".$MaxID;
				}
				else{
					$NewEID="O".$MaxID;
				}
			}
			else
			{
			$NewEID="O00001";
			}

	
			//echo json_encode($NewEID);

	//	$arr["Prod_Id"] = ($NewEID);



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
	
	//echo json_encode($arr);
		echo($NewEID);

?>