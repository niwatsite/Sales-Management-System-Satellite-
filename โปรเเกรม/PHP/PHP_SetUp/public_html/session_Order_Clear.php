<?
	$Order_Id = $_GET["Order_Id"];
 

ob_start();
session_start();
         $_SESSION["intLine"] = "";
	 $_SESSION["strProductID"][0] = "";
	 $_SESSION["strQty"][0] = "";
	// header("location:T_Prod_show_detail_show.php");
        echo "<meta http-equiv='refresh' content='0;url=report_money_frm.php?Order_Id=$Order_Id'>";
?>
		