<?php
include("session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Sales Management System</title>
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
    <link href="css/pa.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #000000;
	text-align: left;
}
-->
    </style>
</head>
<?

include('connect.php');
?>

<body>
<div class="col">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="content">
	<div id="header">
			<p id="top">	&quot;Our Soul is for the Benefit of Mankind&quot;</p>

			<h1>&#3619;&#3657;&#3634;&#3609;&#3594;&#3656;&#3634;&#3591;&#3618;&#3640;&#3607;&#3608;&#3650;&#3607;&#3619;&#3607;&#3633;&#3624;&#3609;&#3660; &#3626;&#3634;&#3586;&#3634; 2</h1>

			<ul id="menu">
				<li><a href="Head_admin_User.php">&#3627;&#3609;&#3657;&#3634;&#3648;&#3648;&#3619;&#3585;</a></li>
				<li><a href="T_User_Prod_show_frm.php">&#3612;&#3621;&#3636;&#3605;&#3616;&#3633;&#3603;&#3601;&#3660;</a></li>
				<li><a href="T_Cust_Search.php">&#3621;&#3641;&#3585;&#3588;&#3657;&#3634;</a></li>
				<li><a href="T_Prod_show_detail_show.php">&#3586;&#3634;&#3618;</a></li>
                 <li><a href="#" class="current">&#3594;&#3635;&#3619;&#3632;&#3627;&#3609;&#3637;&#3657;</a></li>
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
		 <td colspan="3">&#3594;&#3635;&#3619;&#3632;&#3627;&#3609;&#3637;&#3657;&gt;&gt;</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


 <form id="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
    <div id="cols">
      <table width="100%" border="0" align="center">
      <tr align="center">
          <th colspan="3" align="center"><p>&nbsp;</p></th>
        </tr>
        <tr align="center">
          <th width="300" align="right">&nbsp;</th>
          <th width="298">Keyword :
          <input name="txtKeyword" type="text" id="txtKeyword" value="<?=$_GET["txtKeyword"];?>" size="20" />            <input name="Btn_search" type="submit" id="Btn_search" value="&#3588;&#3657;&#3609;&#3627;&#3634;" /></th>
          <th width="300" align="left">&nbsp;</th>
        </tr>
        <tr align="center">
          <th height="18" colspan="3" align="right">&nbsp;</th>
        </tr>
      </table>
      <?
	if($_GET["txtKeyword"] != "")
	{
	// Search
	$strSQL = "SELECT * FROM order_sales NATURAL JOIN customers NATURAL JOIN order_sale_detail NATURAL JOIN debtor NATURAL JOIN employee WHERE (Order_Id LIKE '%".$_GET["txtKeyword"]."%' or Cust_Id LIKE '%".$_GET["txtKeyword"]."%' or Cust_Fname LIKE '%".$_GET["txtKeyword"]."%' or Cust_Lname LIKE '%".$_GET["txtKeyword"]."%')ORDER BY Order_Id";

/*		$strSQL = "SELECT * FROM customers WHERE (Cust_Id LIKE '%".$_GET["txtKeyword"]."%' or Cust_Fname LIKE '%".$_GET["txtKeyword"]."%' or Cust_Lname LIKE '%".$_GET["txtKeyword"]."%' or Repair_status_ch LIKE '%".$_GET["txtKeyword"]."%' )";*/


	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

	?>

<table width="100%" border="0" align="center">
	 <tr bgcolor="#FFFFFF">
      	<th width="3%"> <div align="center">&#3648;&#3621;&#3639;&#3629;&#3585;</div></th>
	<th width="8%"> <div align="center">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;&#3651;&#3610;&#3626;&#3633;&#3656;&#3591;&#3595;&#3639;&#3657;&#3629;</div></th>
	<th width="10%"> <div align="center">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3595;&#3639;&#3657;&#3629;</div></th>
        <th width="4%"><div align="center">&#3619;&#3627;&#3633;&#3626;</div></th>
        <th width="12%"> <div align="center">&#3594;&#3639;&#3656;&#3629; - &#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621; &#3621;&#3641;&#3585;&#3588;&#3657;&#3634;</div></th>
        <th width="7%">&#3592;&#3635;&#3609;&#3623;&#3609;&#3591;&#3623;&#3604;</th>
	<th width="5%"> <div align="center">&#3588;&#3591;&#3648;&#3627;&#3621;&#3639;&#3629;</div></th>
        <th width="11%"> <div align="center">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3594;&#3635;&#3619;&#3632;&#3588;&#3619;&#3633;&#3657;&#3591;&#3621;&#3656;&#3634;&#3626;&#3640;&#3604;</div></th>
        <th width="12%"> <div align="center">&#3594;&#3639;&#3656;&#3629; - &#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621; &#3612;&#3641;&#3657;&#3586;&#3634;&#3618;</div></th>
        </tr>
<?php
$i=0;
	while($objResult = mysql_fetch_array($objQuery))

	{

		$i++;
		if($i%2==0)
		{
			$bg = "#CDC9C9";
		}
		else
		{
			$bg = "#CDC9A5";
		}
if($objResult["Count_Sum"] != $objResult["Count_Pay"]){
?>
	<tr bgcolor="<?=$bg;?>">
        <td align="center"><a href='T_debtor_Search_In.php?Order_Id=<?php echo $objResult["Order_Id"];?>'>&#3648;&#3621;&#3639;&#3629;&#3585;</a></td>
	<td align="center"><?=$objResult["Order_Id"];?></td>
	<td align="center"><?=$objResult["Order_Date"];?></td>
        <td align="center"><?=$objResult["Cust_Id"];?></td>
        <td align="center"><?=$objResult["Cust_Fname"];?>&nbsp;&nbsp;<?=$objResult["Cust_Lname"];?></td>
        <td align="center"><?=$objResult["Count_Sum"];?></td>
	<td align="center"><?=$objResult["Count_Pay"];?></td>
        <td align="center"><?=$objResult["Debtor_Date_Pay"];?></td>
        <td align="center"><?=$objResult["User_Fname"];?>&nbsp;&nbsp;<?=$objResult["User_Lname"];?></td>
        </tr>
	<?
	}
}

	?>
</table>

	<?

	mysql_close();
	}

?>
      <p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div class="x"></div>
	</div>
  </form>
  <div id="footer">
   <h3>&#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3626;&#3591;&#3586;&#3621;&#3634;&#3609;&#3588;&#3619;&#3636;&#3609;&#3607;&#3619;&#3660;  | Prince of Songkla University</h3>
    <p>Copyright &copy; 2014 &#3619;&#3657;&#3634;&#3609;&#3594;&#3656;&#3634;&#3591;&#3618;&#3640;&#3607;&#3608;&#3650;&#3607;&#3619;&#3607;&#3633;&#3624;&#3609;&#3660; &#3626;&#3634;&#3586;&#3634; 2&middot; Design: <a href="http://www.solucija.com/">Solucija.com</a></p>
  </div>
</div>
</body>
</html>	