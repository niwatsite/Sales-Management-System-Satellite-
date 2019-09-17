<?php
include("session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!-- TemplateBeginEditable name="doctitle" -->
	<title>Sales Management System</title>
	<!-- TemplateEndEditable -->
	<meta name="author" content="Luka Cvrk (www.solucija.com)" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<style type="text/css">
	#apDiv1 {
	position: absolute;
	left: 337px;
	top: 169px;
	width: 378px;
	height: 31px;
	z-index: 1;
}
    #apDiv2 {
	position: absolute;
	left: 693px;
	top: 370px;
	width: 241px;
	height: 28px;
	z-index: 1;
}
    #apDiv3 {
	position: absolute;
	left: 139px;
	top: 559px;
	width: 52px;
	height: 23px;
	z-index: 1;
}
    </style>
	<!-- TemplateBeginEditable name="head" -->
	<!-- TemplateEndEditable -->
</head>


<?php

include('connect.php');

?>
<?

$Order_Id= $_GET['Order_Id'];

$strSQL = "SELECT * FROM order_sales  NATURAL JOIN order_sale_detail NATURAL JOIN products NATURAL JOIN debtor NATURAL JOIN  employee NATURAL JOIN customers WHERE order_sales.Order_Id= '$Order_Id'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);

if(!$objResult)
{
	echo "Not found Order_Id =".$_GET["Order_Id"];
}
else
{
?>
<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('Repair_Detail').value == "")
    {
        alert('PLEASE INPUT Repair Detail');
        return false;
    }
}
</script>
<body>
<div class="col">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="content">
	<div id="header">
			<p id="top">	&quot;Our Soul is for the Benefit of Mankind&quot; </p>

			<h1>&#3619;&#3657;&#3634;&#3609;&#3594;&#3656;&#3634;&#3591;&#3618;&#3640;&#3607;&#3608;&#3650;&#3607;&#3619;&#3607;&#3633;&#3624;&#3609;&#3660; &#3626;&#3634;&#3586;&#3634; 2</h1>

			<ul id="menu">
				<li><a href="Head_admin_User.php">&#3627;&#3609;&#3657;&#3634;&#3648;&#3648;&#3619;&#3585;</a></li>
				<li><a href="T_User_Prod_show_frm.php">&#3612;&#3621;&#3636;&#3605;&#3616;&#3633;&#3603;&#3601;&#3660;</a></li>
				<li><a href="T_Cust_Search.php">&#3621;&#3641;&#3585;&#3588;&#3657;&#3634;</a></li>
				<li><a href="T_Prod_show_detail_show.php">&#3586;&#3634;&#3618;</a></li>
                                <li><a href="T_debtor_Search.php" class="current">&#3594;&#3635;&#3619;&#3632;&#3627;&#3609;&#3637;&#3657;</a></li>
				<li><a href="T_User_repair_home.php">&#3595;&#3656;&#3629;&#3617;&#3610;&#3635;&#3619;&#3640;&#3591;</a></li>
				<li><a href="T_User_chang_Password_frm.php">&#3592;&#3633;&#3604;&#3585;&#3634;&#3619;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;</a></li>
				<li><a href="logout.php">&#3629;&#3629;&#3585;&#3592;&#3634;&#3585;&#3619;&#3632;&#3610;&#3610;</a></li>
	  </ul>

			<div id="pitch">
			  <table width="100%" border="0">
			    <tr>
			      <td width="15%">&#3594;&#3639;&#3656;&#3629;&#3612;&#3641;&#3657;&#3651;&#3594;&#3657;&#3619;&#3632;&#3610;&#3610; :</td>
			      <td width="33%"><label><?php echo $login_User_Fname . " " . $login_User_Lname; ?></label></td>
			      <td width="46%">&nbsp;</td>
		        </tr>
			    <tr>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
		        </tr>
			    <tr>
			     <td colspan="3">&#3594;&#3635;&#3619;&#3632;&#3627;&#3609;&#3637;&#3657;&gt;&gt;&#3619;&#3641;&#3611;&#3649;&#3610;&#3610;&#3585;&#3634;&#3619;&#3612;&#3656;&#3629;&#3609;&#3594;&#3635;&#3619;&#3632;</td>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>

 <form id="frmSearch" method="Post" action="T_debtor_Update.php" onSubmit="JavaScript:return fncSubmit();">
    <div id="cols">
      <table width="90%" border="0" align="center">
         <tr align="center">
          <th width="890" align="center"><label for="select"></label>
            <table width="900" border="0">
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="155" align="right">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;&#3651;&#3610;&#3626;&#3633;&#3656;&#3591;&#3595;&#3639;&#3657;&#3629; :</td>
                <td width="156"><input name="Order_Id" type="text" id="Order_Id" value="<?=$objResult["Order_Id"];?>" size="18" readonly="readonly" /></td>
                <td width="141" align="right">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3595;&#3639;&#3657;&#3629; :</td>
                <td width="126"><input name="Order_Date" type="text" id="Order_Date" value="<?=$objResult["Order_Date"];?>" size="18" readonly="readonly" /></td>
                <td width="153" align="right">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3605;&#3636;&#3604;&#3605;&#3633;&#3657;&#3591; :</td>
                <td width="143"><input name="Order_Date_Setup" type="text" id="Order_Date_Setup" value="<?=$objResult["Order_Date_Setup"];?>" size="18" readonly="readonly" /></td>
              </tr>
               <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&#3619;&#3627;&#3633;&#3626;&#3621;&#3641;&#3585;&#3588;&#3657;&#3634; :</td>
                <td><input name="Cust_Id" type="text" id="Cust_Id" value="<?=$objResult["Cust_Id"];?>" size="18" readonly="readonly" /></td>
                <td align="right">&#3594;&#3639;&#3656;&#3629;&#3621;&#3641;&#3585;&#3588;&#3657;&#3634; :</td>
                <td><input name="Cust_Fname" type="text" id="Cust_Fname" value="<?=$objResult["Cust_Fname"];?>" size="18" readonly="readonly" /></td>
                <td align="right">&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621;&#3621;&#3641;&#3585;&#3588;&#3657;&#3634; :</td>
                <td><input name="Cust_Lname" type="text" id="Cust_Lname" value="<?=$objResult["Cust_Lname"];?>" size="18" readonly="readonly" /></td>
                <?php
	}
?>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&#3619;&#3627;&#3633;&#3626;&#3612;&#3641;&#3657;&#3586;&#3634;&#3618; :</td>
                <td><input name="User_Id" type="text" id="User_Id" value="<?=$objResult["User_Id"];?>" size="18" readonly="readonly" /></td>
                <td align="right">&#3594;&#3639;&#3656;&#3629;&#3612;&#3641;&#3657;&#3586;&#3634;&#3618; :</td>
                <td><input name="User_Fname" type="text" id="User_Fname" value="<?=$objResult["User_Fname"];?>" size="18" readonly="readonly" /></td>
                <td align="right">&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621;&#3612;&#3641;&#3657;&#3586;&#3634;&#3618; :</td>
                <td><input name="Cust_Lname" type="text" id="Cust_Lname" value="<?=$objResult["User_Lname"];?>" size="18" readonly="readonly" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td width="143">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&#3591;&#3623;&#3604;&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604; :</td>
                <td><input name="Count_Sum" type="text" id="Count_Sum" value="<?=$objResult["Count_Sum"];?>" size="18" readonly="readonly" /></td>
                <td align="right">&#3591;&#3623;&#3604;&#3588;&#3657;&#3634;&#3591;&#3594;&#3635;&#3619;&#3632; :</td>
                <td><input name="Count_Pay" type="text" id="Count_Pay" value="<?=($objResult["Count_Sum"]-$objResult["Count_Pay"]);?>" size="18" readonly="readonly" /></td>
                <td align="right">&#3592;&#3635;&#3609;&#3623;&#3609;&#3648;&#3591;&#3636;&#3609;/&#3591;&#3623;&#3604; :</td>
                <td><input name="count" type="text" id="count" value="<?=(($objResult["Prod_SalePrice"]+($objResult["Prod_SalePrice"]*$objResult["Tax_Rate"]))/$objResult["Count_Sum"]);?>" size="18" readonly="readonly" /></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&#3619;&#3634;&#3588;&#3634;&#3612;&#3656;&#3629;&#3609; :</td>
                <td><input name="NetPrice" type="text" id="NetPrice" value="<?=($objResult["Prod_SalePrice"]+($objResult["Prod_SalePrice"]*$objResult["Tax_Rate"]));?>" size="18" readonly="readonly" /></td>
                <td align="right">&#3588;&#3657;&#3634;&#3591;&#3594;&#3635;&#3619;&#3632; :</td>
                <td><input name="Discount" type="text" id="Discount" value="<?=(($objResult["Count_Sum"]-$objResult["Count_Pay"])*(($objResult["Prod_SalePrice"]+($objResult["Prod_SalePrice"]*$objResult["Tax_Rate"]))/$objResult["Count_Sum"]));?>" size="18" readonly="readonly" /></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="6" align="center">&#3607;&#3635;&#3619;&#3634;&#3618;&#3585;&#3634;&#3619;&#3612;&#3656;&#3629;&#3609;&#3594;&#3635;&#3619;&#3632;</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">&#3592;&#3635;&#3609;&#3623;&#3609;&#3591;&#3623;&#3604; :</td>
                <td><label for="CountD"></label>
                  <select name="CountD" id="CountD" onchange="run()">
                  <option value=""><--&#3585;&#3619;&#3640;&#3603;&#3634;&#3607;&#3635;&#3619;&#3634;&#3618;&#3585;&#3634;&#3619;--></option>
			<?php
	
			for($i=1;$i<=($objResult["Count_Sum"]-$objResult["Count_Pay"]);$i++)
			{
			
			?>
			<option value="<? echo $i;?>" ><? echo $i;?></option>
			<?php
			}
			?>
            </select></td>
                <td colspan="2" align="right"><label for="srt"></label>
                &#3619;&#3634;&#3588;&#3634;&#3607;&#3637;&#3656;&#3605;&#3657;&#3629;&#3591;&#3594;&#3635;&#3619;&#3632; :</td>
                <td align="right"><input type="text" name="srt" id="srt"  readonly="readonly"/></td>
                <td width="143">&nbsp;</td>
              </tr>
              <tr>
                <td height="37" colspan="6" align="right">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td width="143"><input type="submit" name="button2" id="button2" value="&#3610;&#3633;&#3609;&#3607;&#3638;&#3585;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;" /></td>
              </tr>
            </table>
           <p>&nbsp;</p></th>
        </tr>
      </table>
      <div class="x"></div>
	</div>
  </form>
  <div id="footer">
    <h3>&#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3626;&#3591;&#3586;&#3621;&#3634;&#3609;&#3588;&#3619;&#3636;&#3609;&#3607;&#3619;&#3660; | Prince of Songkla University</h3>
    <p>Copyright &copy; 2014 &#3619;&#3657;&#3634;&#3609;&#3594;&#3656;&#3634;&#3591;&#3618;&#3640;&#3607;&#3608;&#3650;&#3607;&#3619;&#3607;&#3633;&#3624;&#3609;&#3660; &#3626;&#3634;&#3586;&#3634; 2&middot; Design: <a href="http://www.solucija.com/">Solucija.com</a></p>
  </div>
</div>
</body>
</html>
<script type="text/javascript">

function run() {	

var count=<?=(($objResult["Prod_SalePrice"]+($objResult["Prod_SalePrice"]*$objResult["Tax_Rate"]))/$objResult["Count_Sum"])?>;
document.getElementById("srt").value =(count * document.getElementById("CountD").value);	
}

function up() {

    //if (document.getElementById("srt").value != "") {
        var dop = document.getElementById("srt").value;
    //}
    pop(dop);

}

function pop(val) {
    alert(val);
}
</script>	