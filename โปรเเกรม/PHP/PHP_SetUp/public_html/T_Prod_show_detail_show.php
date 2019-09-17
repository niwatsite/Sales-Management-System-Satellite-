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
.delete:before {	content: "\2718";
}
.edit:before {	content: "\270E";
}
    .style9 {	color: #006600;
	font-size: 16px;
	font-weight: bold;
}
  </style>
  <!-- TemplateBeginEditable name="head" -->
  <!-- TemplateEndEditable -->
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
      <p id="top">	&quot;Our Soul is for the Benefit of Mankind&quot;

      <h1>&#3619;&#3657;&#3634;&#3609;&#3594;&#3656;&#3634;&#3591;&#3618;&#3640;&#3607;&#3608;&#3650;&#3607;&#3619;&#3607;&#3633;&#3624;&#3609;&#3660; &#3626;&#3634;&#3586;&#3634; 2</h1>

      <ul id="menu">
        <li><a href="Head_admin_User.php">&#3627;&#3609;&#3657;&#3634;&#3648;&#3648;&#3619;&#3585;</a></li>
        <li><a href="T_User_Prod_show_frm.php">&#3612;&#3621;&#3636;&#3605;&#3616;&#3633;&#3603;&#3601;&#3660;</a></li>
        <li><a href="T_Cust_Search.php">&#3621;&#3641;&#3585;&#3588;&#3657;&#3634;</a></li>
        <li><a href="T_Prod_show_detail_show.php" class="current">&#3586;&#3634;&#3618;</a></li>
         <li><a href="T_debtor_Search.php">&#3594;&#3635;&#3619;&#3632;&#3627;&#3609;&#3637;&#3657;</a></li>
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
            <td colspan="3">&#3591;&#3634;&#3609;&#3586;&#3634;&#3618;&gt;&gt;&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&gt;&gt;&#3619;&#3634;&#3618;&#3585;&#3634;&#3619;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3607;&#3637;&#3656;&#3648;&#3621;&#3639;&#3629;&#3585;</td>
          </tr>
          </table>
      </div>
      <p>&nbsp;</p>
  </div>

  <form id="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
    <div id="cols">

  <table width="100%" border="0" align="center">
    <tr align="center">
      <th width="1097" align="right">&#3619;&#3634;&#3618;&#3585;&#3634;&#3619;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3607;&#3637;&#3656;&#3648;&#3621;&#3639;&#3629;&#3585;
        <p>&nbsp;</p></th>
    </tr>
  </table>

<table width="100%"  border="0">
  <tr>
  <th> <div align="center">&#3619;&#3627;&#3633;&#3626;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;</div></th>
  <th> <div align="center">&#3594;&#3639;&#3656;&#3629;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;</div></th>
  <th> <div align="center">&#3619;&#3634;&#3588;&#3634;</div></th>
  <th> <div align="center">&#3592;&#3635;&#3609;&#3623;&#3609;&#3594;&#3636;&#3657;&#3609;</div></th>
  <th> <div align="center">&#3619;&#3634;&#3588;&#3634;&#3619;&#3623;&#3617;</div></th>
  <th> <div align="center">Delete</div></th>
  </tr>
  <?
  $Total = 0;
  $SumTotal = 0;
  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
  		{
		$strSQL = "SELECT * FROM products WHERE Prod_Id = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["Prod_SalePrice"];
		$SumTotal = $SumTotal + $Total;
 ?>
	<tr>
    	<td align="center"><?=$_SESSION["strProductID"][$i];?></td>
    	<td align="center"><?=$objResult["Prod_Name"];?></td>
   	 	<td align="center"><?=$objResult["Prod_SalePrice"];?></td>
    	<td align="center"><?=$_SESSION["strQty"][$i];?></td>
    	<td align="center"><?=number_format($Total,2);?></td>
    	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='Order_delete.php?Line=<?=$i;?>';}"class="delete">Delete</a></td>
  </tr>
  <?
  	}
  }
  ?>
</table>
<p>&nbsp;</p>
<p><span id="right">ราคารวม&nbsp;<?=number_format($SumTotal,2);?>&nbsp;บาท</span></p>
<p>&nbsp;</p>

<p>&nbsp;</p>

      <p>&nbsp;</p>
      <p><span id="right">&nbsp;</span></p>
      <p><a href="T_User_Prod_show_frm.php"class="style9">Add </a>| <a href="T_Prod_show_detail_show_cust_In.php"class="style9">B</a><a href="T_Prod_show_detail_show_cust_In.php"class="style9">uy</a></p>
      <p><a href="session_Order_Clear_All.php"class="style9">Clear</a></p>
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
<script type="text/javascript">
/*
function run() {	

var SumTotal=<?=$SumTotal?>;
document.getElementById("srt").value =((SumTotal * document.getElementById("strProd_Num_Count").value)+SumTotal);	

var  x = document.getElementById("srt").value;	
$.post('T_Prod_show_detail_show_cust_In.php',{data:x});

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
*/	