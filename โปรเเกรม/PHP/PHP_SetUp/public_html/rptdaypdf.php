<? 
error_reporting("E_ALL");
include('connect.php');
include("thaipdfclass.php");

$dayid = $_POST['dayid'];
$monthid = $_POST['monthid'];
$yearid = $_POST['yearid'];


$pdf=new ThaiPDF('P','mm','A4');
$pdf->SetThaiFont();
$pdf->SetLeftMargin(0);
$pdf->SetRightMargin(0);
$pdf->SetTopMargin(0);
$pdf->SetTextColor(0,0,0);
// บรรทัดที่ 13-37 เป็นการใช้คำสั่ง if else เพื่อต้องการหาเดือนที่ผู้ใช้เลือกที่จะออกรายงาน 

if ($dayid == 1) {
	$day = "1";
}else if  ($dayid == 2) {
	$day = "2";
}else if  ($dayid == 3) {
	$day = "3";
}else if  ($dayid == 4) {
	$day = "4";
}else if  ($dayid == 5) {
	$day = "5";
}else if  ($dayid == 6) {
	$day = "6";
}else if  ($dayid == 7) {
	$day = "7";
}else if  ($dayid == 8) {
	$day = "8";
}else if  ($dayid == 9) {
	$day = "9";
}else if  ($dayid == 10) {
	$day = "10";
}else if  ($dayid == 11) {
	$day = "11";
}else if  ($dayid == 12) {
	$day = "12";
}else if  ($dayid == 13) {
	$day = "13";
}else if  ($dayid == 14) {
	$day = "14";
}else if  ($dayid == 15) {
	$day = "15";
}else if  ($dayid == 16) {
	$day = "16";
}else if  ($dayid == 17) {
	$day = "17";
}else if  ($dayid == 18) {
	$day = "18";
}else if  ($dayid == 19) {
	$day = "19";
}else if  ($dayid == 20) {
	$day = "20";
}else if  ($dayid == 21) {
	$day = "21";
}else if  ($dayid == 22) {
	$day = "22";
}else if  ($dayid == 23) {
	$day = "23";
}else if  ($dayid == 24) {
	$day = "24";
}else if  ($dayid == 25) {
	$day = "25";
}else if  ($dayid == 26) {
	$day = "26";
}else if  ($dayid == 27) {
	$day = "27";
}else if  ($dayid == 28) {
	$day = "28";
}else if  ($dayid == 29) {
	$day = "29";
}else if  ($dayid == 30) {
	$day = "30";
}else if  ($dayid == 31) {
	$day = "31";
}

if ($monthid == 1) {
	$monthtxt = "มกราคม";
}else if  ($monthid == 2) {
	$monthtxt = "กุมภาพันธ์";
}else if  ($monthid == 3) {
	$monthtxt = "มีนาคม";
}else if  ($monthid == 4) {
	$monthtxt = "เมษายน";
}else if  ($monthid == 5) {
	$monthtxt = "พฤษภาคม";
}else if  ($monthid == 6) {
	$monthtxt = "มิถุนายน";
}else if  ($monthid == 7) {
	$monthtxt = "กรกฎาคม";
}else if  ($monthid == 8) {
	$monthtxt = "สิงหาคม";
}else if  ($monthid == 9) {
	$monthtxt = "กันยายน";
}else if  ($monthid == 10) {
	$monthtxt = "ตุลาคม";
}else if  ($monthid == 11) {
	$monthtxt = "พฤศจิกายน";
}else if  ($monthid == 12) {
	$monthtxt = "ธันวาคม";
}

$day = 'วันที่ '.$day.  ' เดือน '.$monthtxt.' พ.ศ. '.$yearid; // ตัวแปร $daytxt เก็บค่าวันเดือนและปีที่ต้องการแสดงรายงาน


$pdf->AddPage();

$pdf->SetFont('AngsanaNew','B',18);
$row=8;
$col=0;
$pdf->SetXY(0,$row);

$pdf->Cell(0,0,conv('ร้านช่างยุทธ์ โทรทัศน์'),0,0,'C');

$pdf->SetFont('AngsanaNew','',16);
$row=15;
$col=0;
$pdf->SetXY(0,$row);
$txt='รายงานสรุปยอดขายประจำ '.$day;
$pdf->Cell(0,0,conv($txt),0,0,'C');
$pdf->SetFont('AngsanaNew','',14);
	$ln_row_start=$row+9;

	$pdf->Line(6,$ln_row_start,206,$ln_row_start);
	$ln_row_start=$ln_row_start+7;
	$pdf->Line(6,$ln_row_start,206,$ln_row_start);

$row=$row+12;
$pdf->SetXY($col+12,$row);
$pdf->SetFont('AngsanaNew','B',14);
$pdf->SetFont('AngsanaNew','',14);

	$txt_row_start=$row+1;
// บรรทัดที่ 70-79 เป็นคำสั่งที่ใช้กำหนดตำแหน่งและแสดงข้อความหัวข้อของรายงานในแต่ละช่อง
	$pdf->SetXY(10,$txt_row_start);
	$pdf->Cell(5,0,conv('ลำดับที่'),0,0,'C');
	$pdf->SetXY(30,$txt_row_start);
	$pdf->Cell(14,0,conv('วันที่/เวลา'),0,0,'C');
	$pdf->SetXY(65,$txt_row_start);
	$pdf->Cell(14,0,conv('ชื่อ-สกุลลูกค้า'),0,0,'C');
	$pdf->SetXY(100,$txt_row_start);
	$pdf->Cell(20,0,conv('รหัสสินค้า'),0,0,'C');
	$pdf->SetXY(130,$txt_row_start);
	$pdf->Cell(20,0,conv('ราคา/ชิ้น'),0,0,'C');
	$pdf->SetXY(155,$txt_row_start);
	$pdf->Cell(20,0,conv('จำนวน'),0,0,'C');
	$pdf->SetXY(185,$txt_row_start);
	$pdf->Cell(20,0,conv('ยอดรวม'),0,0,'C');

// คำสั่ง SQL เพื่อทำการ SELECT ข้อมูลจากตาราง order_sales ( เชื่อมต่อกับตาราง customers และ order_sale_detail และ products ) 
// โดยมีเงื่อนไขในส่วนของ WHERE  จะเลือกเอาเฉพาะรายการที่มีฟิลด์ Order_Date อยู่ในเดือนที่ผู้ใช้เลือกที่จะแสดงข้อมูล

$mysql = "SELECT * FROM order_sales INNER JOIN customers ON customers.Cust_Id=order_sales.Cust_Id
 
INNER JOIN order_sale_detail ON order_sales.Order_Id = order_sale_detail.Order_Id

INNER JOIN products ON order_sale_detail.Prod_Id = products.Prod_Id

 WHERE order_sales.Order_Status_Setup ='0' AND day(order_sales.Order_Date) =".$dayid." AND month(order_sales.Order_Date) =".$monthid."
 ";


$myrs = mysql_query($mysql);	
	$i=1;
	$cnt =  0;
	$ntotal = 0; // ตัวแปร $ntotal  เป็นตัวแปรที่ใช้สำหรับเก็บยอดรวมเงินทั้งสิ้น
	// คำสั่ง While เป็นคำสั่งวนลูป นั่นก็คือวนแสดงข้อมูลที่เราดึงมาได้จากคำสั่ง SQL มาแสดงรายการข้อมูลทีละเรคคอร์ด
	// จนหมดรายการข้อมูลที่ดึงมาได้ 
	while($row=mysql_fetch_assoc($myrs)){
			$cnt++;
			$fname =$row['Cust_Fname']." ".$row['Cust_Lname'];
			$amount = $row["Prod_Num"]* $row["Prod_SalePrice"];
			$sum = $sum + $row["Prod_Num"];
			$txt_row_start = $txt_row_start + 6;
			$pdf->SetXY(6,$txt_row_start);
			$pdf->Cell(10,0,$i,0,0,'C');
			$pdf->SetXY(22,$txt_row_start);
			$pdf->Cell(12,0,$row['Order_Date'],0,0,'L');
			$pdf->SetXY(60,$txt_row_start);
			$pdf->Cell(40,0,conv($fname),0,0,'L');
			$pdf->SetXY(105,$txt_row_start);
			$pdf->Cell(20,0,conv($row['Prod_Id']),0,0,'L');
			$pdf->SetXY(135,$txt_row_start);
			$pdf->Cell(20,0,conv($row['Prod_SalePrice']),0,0,'L');
			$pdf->SetXY(165,$txt_row_start);
			$pdf->Cell(20,0,conv($row['Prod_Num']),0,0,'L');
			$pdf->SetXY(190,$txt_row_start);
			$pdf->Cell(20,0,conv($amount),0,0,'L');
			$ntotal=$ntotal + $amount;
			
			$i++;
	}
	$ln_row_start = $txt_row_start + 3;

	$pdf->Line(6,$ln_row_start,206,$ln_row_start);
	$pdf->SetFont('AngsanaNew','B',14);
	$pdf->SetXY(130,$txt_row_start+6);
	$pdf->Cell(20,0,conv('ยอดรวมทั้งสิ้น'),0,0,'L');
	$pdf->SetXY(165,$txt_row_start+6);
	$pdf->Cell(20,0,conv($sum),0,0,'L');
	$pdf->SetXY(188,$txt_row_start+6);
	$pdf->Cell(20,0,conv($ntotal),0,0,'L');
	$ln_row_start = $txt_row_start + 9;
	$pdf->Line(6,$ln_row_start,206,$ln_row_start);

$pdf->Output();

function conv($string) {
return iconv('UTF-8', 'TIS-620', $string);
}

?>