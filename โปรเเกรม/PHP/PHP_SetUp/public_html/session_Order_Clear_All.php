<?

ob_start();
session_start();
     $_SESSION["intLine"] = "";
	 $_SESSION["strProductID"][0] = "";
	 $_SESSION["strQty"][0] = "";
	 header("location:T_Prod_show_detail_show.php");
      
?>
		