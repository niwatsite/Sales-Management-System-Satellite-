<?php
//include("session.php");
session_start();
$Order_Id =$_SESSION['order'];
$eid = $_SESSION['eid'];
?>


<?php


include('connect.php');


$query = "select * from report";
$strSQL = "SELECT * FROM customers NATURAL JOIN order_sales NATURAL JOIN order_sale_detail NATURAL JOIN employee NATURAL JOIN products WHERE Order_Id = '$Order_Id'";
$objQuery = mysql_query($strSQL) or die("Query failed");
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found Order_Id=".$_GET["Order_Id"];
}
else
{
?>

<?php

	/**
 * เวลาเรียกใช้ให้เรียก ThaiBahtConversion(1234020.25); ประมาณนี้
 * @param numberic $amount_number
 * @return string 
 */
function ThaiBahtConversion($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    //echo "<br/>amount = " . $amount_number . "<br/>";
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    //list($number, $fraction) = explode(".", $number);
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    //return iconv("UTF-8", "TIS-620", $ret);
    return $ret;
}

function ReadNumber($number)
{
	 
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
	
    return $ret;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-image: url();
	margin-left: 10px;
	margin-top: 1px;
	margin-right: 0px;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="POST" action="report_money_save.php">


<table width="877" border="1">
  <tr>
    <td width="867" align="center" >
    
    <p align="right">เลขที่ใบเสร็จ : <label name="NewEID2" id="NewEID2" ><?php echo $eid;?></label>
    

      <p align="right">ผู้ออกใบเสร็จ : <?=$objResult ["User_Fname"];?>&nbsp;&nbsp;&nbsp;<?=$objResult ["User_Lname"];?> 
      <p align="right">วันที่   :   <label  name="Report_Date" id="Report_Date" ><?php echo date("d-m-y");?></label>
      <p align="right">
      <p align="center" ><img src="pic/logo.png" width="141" height="141" />
      <p>ใบเสร็จรับเงิน</p>
      <p>ร้าน ช่างยุทธ์ โทรทัศน์ </p>
      <p>เลขที่ 118 หมู่ที่ 9 ตำบลเขาไม้แก้ว อำเภอสิเกา จังหวัดตรัง 92150</p>
      <p>เบอร์โทรศัพท์ 075-570-206 </p>
      
      <table width="85%" border="0" cellspacing="0" cellpadding="0">
        <tr></tr>
      </table>
      <p>----------------------------------------------------------------------------------------------------------------------      </p>
      <table width="359" border="0" align="left">
        <tr>
          <td  width="60">ชื่อผู้ซื้อ  :</td>
          <td width="289"><?=$objResult ["Cust_Fname"];?>&nbsp;&nbsp;&nbsp;<?=$objResult ["Cust_Lname"];?> </td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="967" border="0" align="left">
        <tr>
          <td width="44">ที่อยู่  : </td>
          <td width="913"><?=$objResult["Cust_Number"];?>&nbsp;&nbsp;หมู่ที่<?=$objResult["Cust_Moo"];?>&nbsp;&nbsp;ถนน<?=$objResult["Cust_Road"];?>&nbsp;&nbsp;ตำบล<?=$objResult["Cust_District"];?>&nbsp;&nbsp;อำเภอ<?=$objResult["Cust_Prefecture"];?>&nbsp;&nbsp;จังหวัด<?=$objResult["Cust_Province"];?></td>
        
        </tr>
      </table>
      <p align="left">&nbsp;</p>
      <table width="248" border="0" align="left">
        <tr>
          <td width="100">เบอร์โทรศัพท์ : </td>
          <td width="138"><?=$objResult["Cust_Tel"];?></td>
        </tr>
      </table>
      <p align="left">&nbsp;</p>---------------------------------------------------------------------------------------------------------------------- </p>
    <p>รายการสินค้า</p><center>
    <table width="790" border="0" align="center">
      <tr>
        <td width="70" align="center">รหัสสินค้า</td>
        <td width="227">ชื่อสินค้า</td>
        <td width="70" align="center">จำนวน</td>
        <td width="70" align="center">ราคา/หน่วย</td>
        <td width="70" align="center">ราคารวม</td>
      </tr>
      <tr>
    <td align="center"><?=$objResult["Prod_Id"];?></td>
        <td><?=$objResult["Prod_Name"];?>&nbsp;</td>
        <td align="center"><?=$objResult["Prod_Num"];?>&nbsp;</td>
        <td align="center"><?=$objResult["Prod_SalePrice"];?>&nbsp;</td>
    <?php
		$amount = ($objResult["Prod_Num"]*$objResult["Prod_SalePrice"]);
		?> 
        <td align="center"><p><?php echo $amount;?> &nbsp;</p></td> 
        <?php 
		$amount_result = ($amount_result+$amount );
		?>
		
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">จำนวนเงินสุทธิ</td>
        
        <td align="center"><?php echo $amount_result;?>&nbsp;</td>
      </tr>
    </table>  
    </center>   
    <p>----------------------------------------------------------------------------------------------------------------------      </p>
    <p>&nbsp;</p>
    <p align="left">จำนวนเงินรวม (ตัวอักษร) :  
	<?php echo  ThaiBahtConversion ($amount_result); ?>     </p>
    <p>&nbsp;</p>
    <p align="right">ลงชื่อ.................................................ผู้จ่ายเงิน</p>
    <p align="right">(.....................................................................)</p>
    <p align="right">&nbsp;<br>
     <br />
      <?php
	 
}
      ?>
    </p></td>
  </tr>
</table>
<br />

<input type="hidden" name="hdneid" value="<?php echo $NewEID;?>" /> 
<input type="button" value="print" onclick="this.style.visibility='hidden';print()" />

</form>
</body>
</html>