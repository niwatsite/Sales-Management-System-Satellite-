<?
ob_start();
session_start();
	
if(!isset($_SESSION["intLine"]))
{

	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["Prod_Id"];
	 $_SESSION["strQty"][0] = 1;

	 header("location:T_Prod_show_detail_show.php");
}
else
{
	
   $key = array_search($_GET["Prod_Id"], $_SESSION["strProductID"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["Prod_Id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	
	 header("location:T_Prod_show_detail_show.php");

}
?>



/* ////เเบบดักการเลือกซ้้า///
<?
ob_start();
session_start();
include('connect.php');

if(!isset($_SESSION["intLine"]))
{

	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["Prod_Id"];
	 $_SESSION["strQty"][0] = 1;

	 header("location:T_Prod_show_detail_show.php");
}
else
{

	$key = array_search($_GET["Prod_Id"], $_SESSION["strProductID"]);
	if((string)$key == "")
	{
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["Prod_Id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}

	 header("location:T_Prod_show_detail_show.php");

}
?> 
*/
