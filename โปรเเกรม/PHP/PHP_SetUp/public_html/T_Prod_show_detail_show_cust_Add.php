<?php
include("session.php");
?>
<?php
include('connect.php');
		mysql_query("SET NAMES UTF8");
		date_default_timezone_set('Asia/Bangkok');

		//$_POST["strType"] = "1";
		//$_POST["Cust_Id"] = "C00001";
		$_POST["strtoday"] = date("Y-m-d H:i:s");
		$_POST["strOrder_Status_Setup"] = "0";
                $_POST["StoreLati"] = "0.0";
                $_POST["StoreLongi"] = "0.0";

		//order_sale _detail

		$strProd_Num_Count =  $_POST["data"];

		//order_sales

                $strtoday = $_POST["strtoday"];   //Fix VALUES
		$strsUser_Id = $login_User_Id;
		$strOrder_Status_Setup = $_POST["strOrder_Status_Setup"];

		//Customer

		$strCust_Id = $_POST["Cust_Id"];
		$strFnameOut = $_POST["Cust_Fname"];
		$strLnameOut = $_POST["Cust_Lname"];
		$strCust_Id_CurrentOut = $_POST["Cust_Id_Current"];
		$strCust_TelOut = $_POST["Cust_Tel"];
		$strCust_NumberOut = $_POST["Cust_Number"];
		$strCust_MooOut = $_POST["Cust_Moo"];
		$strCust_RoadOut = $_POST["Cust_Road"];
		$strCust_DistrictOut = $_POST["Cust_District"];
		$strCust_PrefectureOut = $_POST["Cust_Prefecture"];
		$strCust_ProvinceOut = $_POST["Cust_Province"];
		$strCust_CodeOut = $_POST["Cust_Code"];
                $strCust_EmailOut = $_POST["Cust_Email"];
		$strStoreLati = $_POST["StoreLati"];
		$strStoreLongi = $_POST["StoreLongi"];

$strSQL = "SELECT * FROM customers WHERE  Cust_Id = '".$strCust_Id."'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);
$User_Current = $objResult["Cust_Id_Current"];
$User_Cust_Id = $objResult["Cust_Id"];

		//echo " customers ID [".$strSQL."]";

	//Check Page New Customers
		if(($strCust_Id_CurrentOut != $User_Current)&&($strCust_Id != $User_Cust_Id)){

	                                /*** Insert customers ***/
					$strSQL = "INSERT INTO customers (Cust_Id,Cust_Fname,Cust_Lname,Cust_Id_Current,Cust_Tel,Cust_Number,Cust_Moo,Cust_Road,Cust_District,Cust_Prefecture,Cust_Province,Cust_Code,Cust_Email,StoreLati,StoreLongi)
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
                                                '".$strCust_EmailOut ."',
						'".$strStoreLati."',
						'".$strStoreLongi."'
						)";
							if(mysql_query($strSQL)){

									//echo"record INSERT  customers successful";
									//echo "Save INSERT customers [".$strSQL."]";
							}else{

									echo "Error Save INSERT customers [".$strSQL."]";
                                                                        echo "<meta http-equiv='refresh' content='1;url=T_Prod_show_detail_show_cust_In.php />";
							}
	//Check Page Update Customers
		}else{

					/*** Update ***/
					$strSQL = " UPDATE customers SET
				   		 Cust_Fname = '".$strFnameOut."'
						,Cust_Lname = '".$strLnameOut."'
						,Cust_Id_Current = '".$strCust_Id_CurrentOut."'
						,Cust_Tel = '".$strCust_TelOut."'
						,Cust_Number = '".$strCust_NumberOut."'
						,Cust_Moo = '".$strCust_MooOut."'
						,Cust_Road = '".$strCust_RoadOut."'
						,Cust_District = '".$strCust_DistrictOut."'
						,Cust_Prefecture = '".$strCust_PrefectureOut."'
						,Cust_Province = '".$strCust_ProvinceOut."'
						,Cust_Code = '".$strCust_CodeOut."'
                                                ,Cust_Email = '".$strCust_EmailOut."'
						,StoreLati = '".$strStoreLati."'
						,StoreLongi = '".$strStoreLongi."'
						WHERE Cust_Id = '".$strCust_Id."'";

							if(mysql_query($strSQL)){

									//echo"record UPDATE customers successful";
									//echo "Save UPDATE customers [".$strSQL."]";
							}else{

									echo "Error Save UPDATE customers [".$strSQL."]";
                                                                        echo "<meta http-equiv='refresh' content='1;url=T_Prod_show_detail_show_cust_search.php' />";
					}
				}

	/*** Insert order Max***/
				$maxSQL = "SELECT max(Order_Id)as MaxEID FROM order_sales";
						$maxQuery = mysql_query($maxSQL) or die (mysql_error());
						$maxResult = mysql_fetch_array($maxQuery);

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


	          /*** Insert order_sales***/

									$strSQL = "INSERT INTO order_sales(Order_Id,Order_Date,User_Id,Cust_Id,Order_Status_Setup)
										VALUES (
											'".$NewEID."',
											'".$strtoday."',
											'".$strsUser_Id."',
											'".$strCust_Id."',
											'".$strOrder_Status_Setup."'
											)";
												if(mysql_query($strSQL)){

														//echo"record INSERT  order_sales successful";
														//echo "Save order_sale [".$strSQL."]";

												  }else{

														echo "Error Save order_sale [".$strSQL."]";
                                                                                                                echo "<meta http-equiv='refresh' content='1;url=T_Prod_show_detail_show.php' />";
												  }

		            /*** Insert order_sale _detail ***/

  			             for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  				                                    {
	  				               if($_SESSION["strProductID"][$i] != "")
	  				                                         {
												$strSQL = "INSERT INTO order_sale_detail(Order_Id,Prod_Id,Prod_Num,Prod_Num_Count)
													VALUES (
														'".$NewEID."',
														'".$_SESSION["strProductID"][$i]."',
														'".$_SESSION["strQty"][$i]."',
														'".$strProd_Num_Count."'
														)";
                                                                                                                 	      if(mysql_query($strSQL)){

																	//echo"record INSERT  order_sale_detail successful";
																	//echo "Save order_sale_detail [".$strSQL."]";
																//echo "<meta http-equiv='refresh' content='1;url=session_Order_Clear.php'/>";
                                                                                                                                echo "<meta http-equiv='refresh' content='1;url=session_Order_Clear.php?Order_Id=$NewEID'>";

                                                                                                                                 

                                                                                                                                 //echo "<meta http-equiv='refresh' content='1;url=session_Order_Clear.php?Order_Id=$NewEID'/>"; 
                                                                                                                                 //echo "<meta http-equiv="refresh"content="1;url=session_Order_Clear.php?Order_Id=<?=echo $NewEID;"/>";
                                                                                                                                
																}else{

																	echo "Error Save order_sale_detail [".$strSQL."]";
                                                                                                                                        //echo "<meta http-equiv='refresh' content='1;url=T_Prod_show_detail_show.php' />";

																}
	  					                                  }
  				                                        }


mysql_close();

?>
			