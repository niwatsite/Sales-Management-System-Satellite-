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
    .style6 {font-size: 14; }
    </style>
	<!-- TemplateBeginEditable name="head" -->	<!-- TemplateEndEditable -->
</head>
<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('Prod_Name').value == "")
    {
        alert('PLEASE INPUT Product Name');
        return false;
    }
    if(document.getElementById('Prod_SalePrice').value == "")
    {
        alert('PLEASE INPUT  Sale Price');
        return false;
    }
}
</script>
<body>


<?

include('connect.php');

$Prod_Id= $_GET['Prod_Id'];

$strSQL = "SELECT * FROM products WHERE Prod_Id = '$Prod_Id'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found Prod_Id=".$_GET["Prod_Id"];
}
else
{
?>

<div class="col">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="content">
	<div id="header">
			<p id="top">	&quot;Our Soul is for the Benefit of Mankind&quot; </p>

			<h1>&#3619;&#3657;&#3634;&#3609;&#3594;&#3656;&#3634;&#3591;&#3618;&#3640;&#3607;&#3608;&#3650;&#3607;&#3619;&#3607;&#3633;&#3624;&#3609;&#3660; &#3626;&#3634;&#3586;&#3634; 2</h1>

			<ul id="menu">
			  <li><a href="Head_admin_home.php">&#3627;&#3609;&#3657;&#3634;&#3648;&#3648;&#3619;&#3585;</a></li>
				<li><a href="User_Search.php">&#3612;&#3641;&#3657;&#3651;&#3594;&#3657;&#3591;&#3634;&#3609;</a></li>
				<li><a href="Cust_Search.php">&#3621;&#3641;&#3585;&#3588;&#3657;&#3634;</a></li>
				<li><a href="Prod_edit_frm.php" class="current">&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;</a></li>
				<li><a href="Tax_Search.php">&#3604;&#3629;&#3585;&#3648;&#3610;&#3637;&#3657;&#3618;</a></li>
				<li><a href="User_repair_frm_Amin.php">&#3595;&#3656;&#3629;&#3617;&#3610;&#3635;&#3619;&#3640;&#3591;</a></li>
				<li><a href="report.php">&#3629;&#3629;&#3585;&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;</a></li>
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
			      <td colspan="3">&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&gt;&gt;&#3648;&#3648;&#3585;&#3657;&#3652;&#3586;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;</td>
		        </tr>
		      </table>
			</div>
			<p>&nbsp;</p>
	</div>


  <form id="form1" method="post" action="Prod_Update.php?$Prod_Id=<?=$_GET["Prod_Id"];?>" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
    <div id="cols">
      <div class="col">
        <table width="270" border="0">
          <tr>
            <td>&#3619;&#3627;&#3633;&#3626;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634; :</td>
            <td align="right" id="l"><label for="Prod_Id"></label>
              <input name="Prod_Id" type="text" id="Prod_Id" value="<?=$objResult["Prod_Id"];?>" size="18" readonly="readonly" /></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td>&#3619;&#3634;&#3588;&#3634;&#3595;&#3639;&#3657;&#3657;&#3629;  :</td>
            <td align="right" id="l"><label for="textfield6"></label>
              <input name="Prod_O" type="text" id="Prod_O" value="<?=$objResult["Prod_O"];?>" size="18" tabindex="2"/></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td>&#3611;&#3619;&#3632;&#3648;&#3616;&#3607;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634; :</td>
            <td align="right" id="l"><select name="Prod_type" id="Prod_type">
            <option value="1" <?php if ($objResult["Prod_type"] == "1"): ?> selected="selected"<?php endif; ?>>&#3594;&#3640;&#3604;&#3592;&#3634;&#3609;&#3604;&#3634;&#3623;&#3648;&#3607;&#3637;&#3618;&#3617;&#3614;&#3619;&#3657;&#3629;&#3617;&#3605;&#3636;&#3604;&#3605;&#3633;&#3657;&#3591;</option>
    		<option value="2" <?php if ($objResult["Prod_type"] == "2"): ?> selected="selected"<?php endif; ?>>&#3594;&#3640;&#3604;&#3592;&#3634;&#3609;&#3604;&#3634;&#3623;&#3648;&#3607;&#3637;&#3618;&#3617;&#3652;&#3617;&#3656;&#3619;&#3623;&#3617;&#3605;&#3636;&#3604;&#3605;&#3633;&#3657;&#3591;</option>
    		<option value="3" <?php if ($objResult["Prod_type"] == "3"): ?> selected="selected"<?php endif; ?>>Receiver&#3648;&#3588;&#3619;&#3639;&#3656;&#3629;&#3591;&#3619;&#3633;&#3610;&#3626;&#3633;&#3603;&#3597;&#3634;&#3603;</option>
            <option value="4" <?php if ($objResult["Prod_type"] == "4"): ?> selected="selected"<?php endif; ?>>&#3627;&#3609;&#3657;&#3634;&#3592;&#3634;&#3609;&#3604;&#3634;&#3623;&#3648;&#3607;&#3637;&#3618;&#3617;</option>
    		<option value="5" <?php if ($objResult["Prod_type"] == "5"): ?> selected="selected"<?php endif; ?>>&#3585;&#3621;&#3656;&#3629;&#3591;&#3619;&#3633;&#3610;&#3626;&#3633;&#3603;&#3597;&#3634;&#3603;&#3604;&#3636;&#3592;&#3636;&#3605;&#3629;&#3621;</option>
            </select></td>
          </tr>
        </table>
      </div>
      <div class="col">
        <table width="267" border="0">
          <tr>
            <td> &#3594;&#3639;&#3656;&#3629;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634; :</td>
            <td><label for="textfield7"></label>
              <input name="Prod_Name" type="text" id="Prod_Name" value="<?=$objResult["Prod_Name"];?>" size="18" tabindex="1"/></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td>&#3619;&#3634;&#3588;&#3634;&#3586;&#3634;&#3618; :</td>
            <td><label for="textfield8"></label>
              <input name="Prod_SalePrice" type="text" id="Prod_SalePrice" value="<?=$objResult["Prod_SalePrice"];?>" size="18" tabindex="3"/></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;:</td>
          </tr>
          <tr>
          <td colspan="2"><textarea name="Prod_Remark" id="Prod_Remark" cols="35" rows="5" tabindex="4"><?php echo $objResult["Prod_Remark"];?></textarea></td>

          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="col">
        <table width="267" border="0">
          <tr>
            <td>&#3619;&#3641;&#3611;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634; :</td>
            <td><label for="textfield2"></label></td>
          </tr>
          <tr>
            <td colspan="2"><input type="file" name="filUpload" tabindex="5"/></td>
          </tr>
          <tr>
            <td colspan="2"><span class="style6"><img src="myfile/<?=$objResult["Prod_img"];?>" alt="" width="auto" height="250"  /></span></td>
          </tr>
          <tr>
            <td colspan="2"><input type="hidden" name="hdnOldFile" value="<?=$objResult["Prod_img"];?>"></td>
          </tr>
        </table>
        <p>
          <input type="submit" name="button2" id="button2" value="&#3648;&#3614;&#3636;&#3656;&#3617;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;" />
          <input type="reset" name="Reset" id="button" value="&#3621;&#3657;&#3634;&#3591;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;" />
        </p>
      </div>
      <p>&nbsp;</p>
			<p>&nbsp;</p>
			<div class="x"></div>
	</div>
  </form>


  <?
}
  mysql_close();
  ?>

  <div id="footer">
   <h3>&#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3626;&#3591;&#3586;&#3621;&#3634;&#3609;&#3588;&#3619;&#3636;&#3609;&#3607;&#3619;&#3660;  | Prince of Songkla University</h3>
    <p>Copyright &copy; 2014 &#3619;&#3657;&#3634;&#3609;&#3594;&#3656;&#3634;&#3591;&#3618;&#3640;&#3607;&#3608;&#3650;&#3607;&#3619;&#3607;&#3633;&#3624;&#3609;&#3660; &#3626;&#3634;&#3586;&#3634; 2&middot; Design: <a href="http://www.solucija.com/">Solucija.com</a></p>
  </div>
</div>
</body>
</html>	