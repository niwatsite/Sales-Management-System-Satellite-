<?php
	//$objConnect = mysql_connect("mysql.hostinger.in.th","u570781514_sun","0812775184");
	//$objDB = mysql_select_db("u570781514_sun");

	include('connect.php');
	mysql_query("SET NAMES UTF8");
	date_default_timezone_set('Asia/Bangkok');

	//$_POST["strType"] = "1";
	//$_POST["Cust_Id"] = "C00001";
	$_POST["strProd_Num"] = "1";
	$_POST["strtoday"] = date("Y-m-d H:i:s");
	$_POST["strOrder_Status_Setup"] = "0";

	//order_sale _detail
	$strProd_Id =  $_POST["strProd_Id"];
	$strProd_Num =  $_POST["strProd_Num"];	//Fix VALUES
	$strProd_Num_Count =  $_POST["strProd_Num_Count"];
	//$strProd_Num_Amount_Price =  $_POST["strProd_Num_Count_Price"];
	//$strProd_Price_Result =  $_POST["strProd_Price_Result"];
	//order_sales
        $strtoday = $_POST["strtoday"];   //Fix VALUES
	$strsUser_Id = $_POST["strUser_Id"];
	$strOrder_Id = $_POST["strOrder_Id"];
	$strOrder_Status_Setup = $_POST["strOrder_Status_Setup"];
	//Customer
	$strCust_Id = $_POST["strCust_Id"];
	$strFnameOut = $_POST["strFnameOut"];
	$strLnameOut = $_POST["strLnameOut"];
	$strCust_Id_CurrentOut = $_POST["strCust_Id_CurrentOut"];
	$strCust_TelOut = $_POST["strCust_TelOut"];
	$strCust_NumberOut = $_POST["strCust_NumberOut"];
	$strCust_MooOut = $_POST["strCust_MooOut"];
	$strCust_RoadOut = $_POST["strCust_RoadOut"];
	$strCust_DistrictOut = $_POST["strCust_DistrictOut"];
	$strCust_PrefectureOut = $_POST["strCust_PrefectureOut"];
	$strCust_ProvinceOut = $_POST["strCust_ProvinceOut"];
	$strCust_CodeOut = $_POST["strCust_CodeOut"];
	$strStoreLati = $_POST["lat"];
	$strStoreLongi = $_POST["lng"];
	$strType = $_POST["strType"];

	//Check Page New Customers
	if($strType == 0){

			/*** Check Max Cust_Id ***/
			$strSQL = "SELECT max(Cust_Id)as MaxEID FROM customers ";
			$objQuery = mysql_query($strSQL);
			$maxResult = mysql_fetch_array($objQuery);
					$NewEID;
					if($maxResult["MaxEID"]!="")
					{
					$MaxID=(int)substr($maxResult["MaxEID"], 2);
					$MaxID+=1;
						if($MaxID<10){
							$NewEID="C0000".$MaxID;
						}
						elseif($MaxID<100 && $MaxID>=10){
							$NewEID="C000".$MaxID;
						}
						elseif($MaxID<1000 && $MaxID>=100){
							$NewEID="C00".$MaxID;
						}
						elseif($MaxID<10000 && $MaxID>=1000){
							$NewEID="C0".$MaxID;
						}
						else{
							$NewEID="C".$MaxID;
						}
					}
					else
					{
					$NewEID="C00001";
					}

					$strCust_Id = $NewEID;

				/*** Insert customers ***/
				$strSQL = "INSERT INTO customers (Cust_Id,Cust_Fname,Cust_Lname,Cust_Id_Current,Cust_Tel,Cust_Number,Cust_Moo,Cust_Road,Cust_District,Cust_Prefecture,Cust_Province,Cust_Code,StoreLati,StoreLongi)
					VALUES (
						'".$strCust_Id."',
						'".$strFnameOut."',
						'".$strLnameOut."',
						'".$strCust_Id_CurrentOut."',
						'".$strCust_TelOut."',
						'".$strCust_NumberOut."',
						'".$strCust_MooOut."',
						'".$strCust_RoadOut."',
						'".$strCust_DistrictOut."',
						'".$strCust_PrefectureOut."',
						'".$strCust_ProvinceOut."',
						'".$strCust_CodeOut."',
						'".$strStoreLati."',
						'".$strStoreLongi."'
						)";
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
	//Check Page Update Customers
	}if($strType == 1){

				/*** Update ***/
				$strSQL = " UPDATE customers SET
				   	 Cust_Fname = '".$strFnameOut."'
					,Cust_Lname = '".$strLnameOut."'
					,Cust_Id_Current = '".$strCust_Id_CurrentOut."'
					,Cust_Tel = '".$strTelOut."'
					,Cust_Number = '".$strCust_NumberOut."'
					,Cust_Moo = '".$strCust_MooOut."'
					,Cust_Road = '".$strCust_RoadOut."'
					,Cust_District = '".$strCust_DistrictOut."'
					,Cust_Prefecture = '".$strCust_PrefectureOut."'
					,Cust_Province = '".$strCust_ProvinceOut."'
					,Cust_Code = '".$strCust_CodeOut."'
					,StoreLati = '".$strStoreLati."'
					,StoreLongi = '".$strStoreLongi."'
					WHERE Cust_Id = '".$strCust_Id."'";

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
	}


/*** Insert order_sales***/
		$strSQL = "INSERT INTO order_sales(Order_Id,Order_Date,User_Id,Cust_Id,Order_Status_Setup)
		VALUES (
				'".$strOrder_Id."',
				'".$strtoday."',
				'".$strsUser_Id."',
				'".$strCust_Id."',
				'".$strOrder_Status_Setup."'
				)";
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

/*** Insert order_sale _detail ***/
		$strSQL = "INSERT INTO order_sale_detail(Order_Id,Prod_Id,Prod_Num,Prod_Num_Count)
		VALUES (
				'".$strOrder_Id."',
				'".$strProd_Id."',
				'".$strProd_Num."',
				'".$strProd_Num_Count."'
				)";

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
				
				
if($strProd_Num_Count != "0"){				
/*** Insert debtor ***/
$_POST["strCount_Pay"] = "1"; //&#3585;&#3635;&#3627;&#3609;&#3604;&#3591;&#3623;&#3604;&#3648;&#3648;&#3619;&#3585;
$strCount_Pay = $_POST["strCount_Pay"];

						$strSQL = "INSERT INTO debtor(Order_ID,Count_Sum,Count_Pay)
						VALUES (
								'".$strOrder_Id."',
								'".$strProd_Num_Count."',
								'".$strCount_Pay."'
								)";
				
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
}			

	mysql_close($objConnect);

	echo json_encode($arr);
?>
	