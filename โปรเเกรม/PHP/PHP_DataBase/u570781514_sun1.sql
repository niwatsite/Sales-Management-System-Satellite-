
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2014 at 06:26 PM
-- Server version: 5.1.66
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u570781514_sun1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `Cust_Id` varchar(6) NOT NULL,
  `Cust_Fname` varchar(50) NOT NULL,
  `Cust_Lname` varchar(50) NOT NULL,
  `Cust_Number` varchar(10) NOT NULL,
  `Cust_Moo` varchar(5) NOT NULL,
  `Cust_Road` varchar(50) NOT NULL,
  `Cust_District` varchar(50) NOT NULL,
  `Cust_Prefecture` varchar(50) NOT NULL,
  `Cust_Province` varchar(50) NOT NULL,
  `Cust_Code` varchar(5) NOT NULL,
  `Cust_Id_Current` varchar(13) NOT NULL,
  `StoreLati` varchar(50) NOT NULL,
  `StoreLongi` varchar(50) NOT NULL,
  `Cust_Tel` varchar(12) NOT NULL,
  `Cust_Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Cust_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Cust_Id`, `Cust_Fname`, `Cust_Lname`, `Cust_Number`, `Cust_Moo`, `Cust_Road`, `Cust_District`, `Cust_Prefecture`, `Cust_Province`, `Cust_Code`, `Cust_Id_Current`, `StoreLati`, `StoreLongi`, `Cust_Tel`, `Cust_Email`) VALUES
('C00001', 'ชัยเชษฐ์', 'คุ้มเกิด', '104', '7', '-', 'ท่าโพธิ์', 'เมือง', 'สงขลา', '92510', '1930822266543', '0.0', '0.0', '0894765433', 'Mity125@hotmail.com'),
('C00002', 'กนกพร ', 'อริยวัฒนางกูร', '18/4', '7', '-', 'บานนา', 'เมือง', 'สงขลา', '92500', '1980267566770', '7.5175879', '99.5790501', '', ''),
('C00003', 'สุรินทร์ ', 'รอดหร่าย', '320', '10', 'แม่หวาด', 'แม่หวาด', 'กรงปินัง', 'ยะลา', '91200', '1930800065543', '0.0', '0.0', '', 'protftrd@hotmail.com'),
('C00004', 'นพดล', 'กาญจนพิบูลย์', '227', '12', 'กองบิน56', 'วังใหญ่', 'คลองหอยโข่ง', 'สงขลา', '90115', '1909800622453', '6.9884937', '100.59934', '0872455674', 'Noppadon227@hotmail.com'),
('C00005', 'อำนาจ', 'วิบูลย์เชื้อ', '90/2', '4', 'ลิพัง2', 'ลิพัง', 'ปะเหลียน', 'ตรัง', '92180', '1930065527581', '7.519123', '99.5826053', '', ''),
('C00007', 'สุชาติ ', 'แก้วคำหา', '512', '7', 'ควนธานี', 'ควนธานี', 'กันตัง', 'ตรัง', '92100', '1930800063356', '0.0', '0.0', '0831719951', ''),
('C00009', 'ดนัย', 'กิตตโยทัย', '107', '1', 'บางนา', 'พรุน้อย', 'เบตง', 'ยะลา', '95110', '1954356790101', '0.0', '0.0', '0845678845', 'Mity125@hotmail.com'),
('C00006', 'ประสิทธิ์', 'ศรีหรั่งไพโรจน์', '21/1', '9', 'ปฐมพร', 'หินแก้ม', 'ท่าแซะ', 'ชุมพร', '86190', '1940800062251', '0.0', '0.0', '0831719951', 'Prasit@gmail.com'),
('C00016', 'mar', 'mama', '80', '4', 'คนเดิน', 'ปลวก', 'เมือง', 'กูนิ', '11112', '19000000080', '7.5190398', '99.5825504', '0894443335', ''),
('C00010', 'นิภา', 'ธนะกูลกิจ', '232', '2', 'วังใหญ่-เทพา', 'วังใหญ่', 'เทพา', 'สงขลา', '90260', '190560035310', '0.0', '0.0', '', 'Nipa_oi_1@hotmail.com'),
('C00011', 'สุชาติ ', 'แก้วคำหา', '512', '7', 'ควนธานี', 'ควนธานี', 'กันตัง', 'ตรัง', '92100', '1930800063356', '7.5215248', '99.5790336', '', ''),
('C00014', 'ณัฐพงษ์', 'แก้วเพ็ง', '123', '6', '-', 'ห้วยยอด', 'ห้วยยอด', 'ตรัง', '91000', '1929900511123', '7.5191031', '99.5825971', '0980262843', ''),
('C00015', 'niwat', 'wongsakornthong', '1', '2', '-', 'tanermalot', 'betong', 'yala', '95110', '1959800080651', '0.0', '0.0', '0812775184', ''),
('C00017', 'วราชิต', 'พรหมรัตน์', '12', '3', '-', 'หนองธง', 'ป่าบอน', 'พัทลุง', '93170', '1290374255875', '0.0', '0.0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `debtor`
--

CREATE TABLE IF NOT EXISTS `debtor` (
  `Debtor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_ID` varchar(6) NOT NULL,
  `Count_Sum` int(11) NOT NULL,
  `Count_Pay` int(11) NOT NULL,
  `Debtor_User_ID` varchar(6) NOT NULL,
  `Debtor_Date_Pay` datetime NOT NULL,
  PRIMARY KEY (`Debtor_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `debtor`
--

INSERT INTO `debtor` (`Debtor_ID`, `Order_ID`, `Count_Sum`, `Count_Pay`, `Debtor_User_ID`, `Debtor_Date_Pay`) VALUES
(1, 'O00003', 2, 1, '', '0000-00-00 00:00:00'),
(2, 'O00004', 3, 1, '', '0000-00-00 00:00:00'),
(3, 'O00005', 3, 1, '', '2014-11-21 22:31:42'),
(4, 'O00008', 2, 1, '', '2014-11-21 16:40:51'),
(5, 'O00010', 5, 2, '', '2014-11-21 01:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Department_Id` varchar(6) NOT NULL,
  `Department_name` varchar(20) NOT NULL,
  PRIMARY KEY (`Department_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_Id`, `Department_name`) VALUES
('D00001', 'ทั่วไป'),
('D00002', 'บุคคล'),
('D00003', 'บัญชี'),
('D00004', 'เทคนิค'),
('D00005', 'ขาย');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `User_Id` varchar(6) NOT NULL,
  `User_Username` varchar(20) NOT NULL,
  `User_Password` varchar(150) NOT NULL,
  `User_Title` varchar(10) NOT NULL,
  `User_Fname` varchar(50) NOT NULL,
  `User_Lname` varchar(50) NOT NULL,
  `User_number` varchar(10) NOT NULL,
  `User_Moo` varchar(10) NOT NULL,
  `User_Road` varchar(50) NOT NULL,
  `User_District` varchar(50) NOT NULL,
  `User_Prefecture` varchar(50) NOT NULL,
  `User_Province` varchar(50) NOT NULL,
  `User_Code` varchar(5) NOT NULL,
  `User_Tel` varchar(12) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `User_Status` varchar(1) NOT NULL,
  `User_Status_Admin` varchar(1) NOT NULL,
  `Department_Id` varchar(6) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`User_Id`, `User_Username`, `User_Password`, `User_Title`, `User_Fname`, `User_Lname`, `User_number`, `User_Moo`, `User_Road`, `User_District`, `User_Prefecture`, `User_Province`, `User_Code`, `User_Tel`, `User_Email`, `User_Status`, `User_Status_Admin`, `Department_Id`) VALUES
('U00001', 'sun1', '7676b124363f307b4dc544a745a4f23e', 'นางสาว', 'ฐิติมา', 'สิทธิศักดิ์', '31/1', '2', '-', 'เนาะเเมเราะ', 'เบตง', 'ยะลา', '95110', '08-1277-5084', 'niwatsun@hotmail.com', '0', '0', 'D00001'),
('U00002', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'นิภัรน์', 'เเซ่ลุก', '3', '6', 'ควนรู', 'ควนรู', 'รัตภูมิ', 'ยะลา', '90220', '08-2548-5874', 'sun@gmail.com', '0', '1', 'D00001'),
('U00003', 'niwat', '7676b124363f307b4dc544a745a4f23e', 'นาย', 'นิวัฒน์', 'วงศกรทอง', '14/16', '7', '-', 'ตาเนาะเเมเราะ', 'เบตง', 'ยะลา', '95110', '0812775184', 'niwatsun@hotmail.com', '0', '1', 'D00002'),
('U00005', 'atthadt', 'cedaa7897b097b8501d6238b3e822a8b', 'นาย', 'อรรถเดช', 'หนูเซ่ง', '122/5', '7', '-', 'นาท่ามใต้', 'เมือง', 'ตรัง', '92190', '084-8587731', 'Atthadt@hotmail.com', '0', '0', 'D00003');

-- --------------------------------------------------------

--
-- Table structure for table `order_sales`
--

CREATE TABLE IF NOT EXISTS `order_sales` (
  `Order_Id` varchar(6) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Order_Status_Setup` varchar(1) NOT NULL,
  `Order_Date_Setup` datetime NOT NULL,
  `Order_User_Id_Setup` varchar(6) NOT NULL,
  `User_Id` varchar(6) NOT NULL,
  `Cust_Id` varchar(6) NOT NULL,
  PRIMARY KEY (`Order_Id`),
  UNIQUE KEY `Order_Id` (`Order_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_sales`
--

INSERT INTO `order_sales` (`Order_Id`, `Order_Date`, `Order_Status_Setup`, `Order_Date_Setup`, `Order_User_Id_Setup`, `User_Id`, `Cust_Id`) VALUES
('O00008', '2014-11-13 13:40:05', '0', '2014-11-14 20:57:25', 'U00001', 'U00001', 'C00011'),
('O00009', '2014-11-13 13:54:24', '0', '2014-11-17 14:32:44', 'U00003', 'U00003', 'C00001'),
('O00010', '2014-11-13 23:18:26', '0', '2014-11-17 10:04:19', 'U00003', 'U00001', 'C00002'),
('O00001', '2014-11-08 14:56:18', '1', '2014-11-08 17:32:06', 'U00001', 'U00002', 'C00001'),
('O00007', '2014-11-13 10:40:41', '0', '0000-00-00 00:00:00', '', 'U00002', 'C00010'),
('O00002', '2014-11-08 17:38:02', '1', '2014-11-13 23:20:46', 'U00001', 'U00002', 'C00003'),
('O00003', '2014-11-08 17:40:17', '0', '2014-11-17 14:11:57', 'U00003', 'U00001', 'C00005'),
('O00004', '2014-11-08 17:51:48', '0', '0000-00-00 00:00:00', '', 'U00001', 'C00009'),
('O00005', '2014-11-08 17:53:28', '0', '2014-11-17 14:12:11', 'U00003', 'U00001', 'C00006'),
('O00006', '2014-11-08 17:54:03', '0', '0000-00-00 00:00:00', '', 'U00001', 'C00005');

-- --------------------------------------------------------

--
-- Table structure for table `order_sale_detail`
--

CREATE TABLE IF NOT EXISTS `order_sale_detail` (
  `Order_Sale_Detail_Id` int(6) NOT NULL AUTO_INCREMENT,
  `Prod_Id` varchar(6) NOT NULL,
  `Prod_Num` int(10) NOT NULL,
  `Prod_Num_Count` double NOT NULL,
  `Order_Id` varchar(6) NOT NULL,
  PRIMARY KEY (`Order_Sale_Detail_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `order_sale_detail`
--

INSERT INTO `order_sale_detail` (`Order_Sale_Detail_Id`, `Prod_Id`, `Prod_Num`, `Prod_Num_Count`, `Order_Id`) VALUES
(3, 'P00001', 1, 2, 'O00003'),
(10, 'P00008', 1, 0, 'O00009'),
(1, 'P00001', 2, 0, 'O00001'),
(11, 'P00010', 1, 2, 'O00010'),
(9, 'P00009', 2, 0, 'O00009'),
(8, 'P00009', 1, 3, 'O00008'),
(4, 'P00006', 1, 5, 'O00004'),
(5, 'P00001', 1, 4, 'O00005'),
(6, 'P00001', 1, 0, 'O00006'),
(7, 'P00001', 1, 0, 'O00007'),
(2, 'P00001', 2, 0, 'O00002');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `Prod_Id` varchar(6) NOT NULL,
  `Prod_Name` varchar(100) CHARACTER SET tis620 NOT NULL,
  `Prod_O` int(10) NOT NULL,
  `Prod_SalePrice` int(10) NOT NULL,
  `Prod_type` varchar(10) NOT NULL,
  `Prod_Remark` varchar(200) CHARACTER SET tis620 NOT NULL,
  `Prod_ImagePath` tinytext NOT NULL,
  `Prod_img` tinytext NOT NULL,
  PRIMARY KEY (`Prod_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Prod_Id`, `Prod_Name`, `Prod_O`, `Prod_SalePrice`, `Prod_type`, `Prod_Remark`, `Prod_ImagePath`, `Prod_img`) VALUES
('P00009', 'IPM Lite(ฟรี90)', 0, 2400, '1', 'CPU ความเร็วสูง กดเปลี่ยนช่องทันใจ เข้าเมนูได้รวดเร็ว\r\nรองรับการใช้งาน 2 ระบบ หลายดาวเทียมทั้ง C & Ku Band\r\n รองรับระบบ Super OTA เพื่ออัพเกรดช่องรายการ หมดห่วงเรื่องช่องรายการหาย\r\nดีไซน์ทันสมัย วัสดุ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A9.jpg', 'Thumbnails_A9.jpg'),
('P00008', 'IPM HD PRO(HD23) ', 0, 4200, '1', 'CPU 32-bit MIPS ความเร็ว 667 MHz\r\nรองรับหน่วยความจำ 16-bit DDR3-1333\r\nสามารถถอดภาพแบบ Real-time ได้ในระดับ Full HD 1080p\r\nรองรับ format ที่นิยมหลากหลาย เช่น mp3, aac, wma, wav, avi, dat, dvi, divx, mk', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A8.jpg', 'Thumbnails_A8.jpg'),
('P00005', 'OK + GMMZ smart ', 0, 3200, '1', 'ฝนตกหนักๆดูไม่ได้ ภาพหายและกระตุก ขึ้นว่าไม่มีสัญญาณ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A5.jpg', 'Thumbnails_A5.jpg'),
('P00004', 'PSI 1.5 C-BAND + GMM Z', 0, 3700, '1', 'มีฟังค์ชั่น OTA อัพเดทช่องรายการอัตโนมัติผ่านดาวเทียม (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nรับชมช่องรายการพิเศษ 4 ช่องรายการ ฟรีไม่มีรายเดือน จาก GMM Z ผ่านดาวเทียม THAICOM ระบบ C-Band และ KU-', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A4.jpg', 'Thumbnails_A4.jpg'),
('P00006', 'PSI TRUE TV ', 0, 2500, '1', 'ฝนตกหนักๆดูไม่ได้ ภาพหายและกระตุก ขึ้นว่าไม่มีสัญญาณ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A6.jpg', 'Thumbnails_A6.jpg'),
('P00021', 'ชุดจานดำPSI OK เครื่องGMMZ smart', 0, 1400, '2', 'ชุดจานPSIOK 1ชุด + เครื่องGMMZรุ่นsmart    ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B11.jpg', 'Thumbnails_B11.jpg'),
('P00022', 'ชุดจานเหลืองDTV HD1 60 ซม.', 0, 2750, '2', 'รับชมช่องโทรทัศน์ด้วยระบบความละเอียดสูงสุดที่ 1080P ได้ 5 ช่อง\r\nรับชมช่องมาตรฐานคุณภาพ(SDTV)อีกกว่า 70 ช่อง ในระดับภาพที่ดีขึ้นด้วย Upscale Function\r\nรองรับช่องโทรทัศน์และวิทยุได้มากถึง 500 ช่อง\r\nรองร', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B12.jpg', 'Thumbnails_B12.jpg'),
('P00003', 'PSI SX', 0, 3500, '1', '	มีฟังค์ชั่น OTA อัพเดทช่องรายการอัตโนมัติผ่านดาวเทียม (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nรับสัญญาณดาวเทียม C/KU BAND ในระบบ Digital\r\nสามารถ Manual OTA ได้\r\nไม่มีหน้าจอแสดงเลขช่อง ไม่มีปุ่มก', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A3.jpg', 'Thumbnails_A3.jpg'),
('P00007', '60cm+GMMZ HD', 0, 4500, '1', 'Full HD ความคมชัดที่มากกว่าถึง 5 เท่า\r\nระบบเสียง Digital Dolby 5.1\r\nระบบ PVR สั่งบันทึกได้ ตามขนาด HDD คุณ\r\nทำหน้าที่เป็น Play Box เล่น File จาก USB FlashDrive, HDD ไม่จำกัด\r\nดูหนังฟังเพลง รองรับ File', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A7.jpg', 'Thumbnails_A7.jpg'),
('P00002', 'SUNBOX', 0, 3900, '1', 'ใช้กับจานดาวเทียมได้ทั้งระบบ C-Band และ Ku-Band โดยรับสัญญาณจากดาวเทียมTHAICOM5\r\n	สามารถรับชมฟุตบอลลาลีก้าสเปน ผ่านทางช่อง RS Sport La Liga ครบทั้ง 380 แมตช์ ฟรี! \r\nรองรับการเปิดสัญญาณรับชมฟุตบอลโลก 2', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A2.jpg', 'Thumbnails_A2.jpg'),
('P00001', 'PSI O2 HD', 0, 4500, '1', 'รับสัญญาณในระบบ C BAND ช่องรายการความคมชัดแบบ HI-DEFINITION\r\nดูฟรี ๆ ไม่มีรายเดือน พร้อมรับชม ฟุตบอลลาลีกาสเปนผ่านช่อง Sun channel ในระบบHD \r\nรองรับการถ่ายทอดสดบอลโลก2014\r\nคอนเทนท์พิเศษจากช่อง World C', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A1.jpg', 'Thumbnails_A1.jpg'),
('P00010', 'IPM Clear(120) ', 0, 2900, '1', 'CPU ความเร็วสูง กดเปลี่ยนช่องทันใจ เข้าเมนูได้รวดเร็ว\r\n รองรับการใช้จาน 2 ระบบ หลายดาวเทียมทั้ง C & Ku Band\r\nรองรับระบบ Super OTA เพื่ออัพเกรดช่องรายการ หมดห่วงเรื่องช่องรายการลข\r\nดีไซน์เครื่องทันสมัย', 'http://icmpsutrang.esy.es/myfile/Thumbnails_A10.jpg', 'Thumbnails_A10.jpg'),
('P00011', 'ชุดจานดาวเทียมPSI 1.7 + LNB X2 + SX ', 0, 2200, '2', 'อัพเดทช่องรายการผ่านดาวเทียมอัตโนมัติ (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nไม่มีหน้าจอ ไม่มีปุ่มกด ไม่มีRF-OUT\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B1.jpg', 'Thumbnails_B1.jpg'),
('P00012', 'ชุดจานดาวเทียมPSI 1.5 SW(ชิ้นเดียว) + X1 + SX ', 0, 1450, '2', 'อัพเดทช่องรายการผ่านดาวเทียมอัตโนมัติ (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nไม่มีหน้าจอ ไม่มีปุ่มกด ไม่มีRF-OUT\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B2.jpg', 'Thumbnails_B2.jpg'),
('P00013', 'ชุดจานดาวเทียม 5ฟุต (4ชิ้น) + LNB X2 + SUNBOX', 0, 2150, '2', 'มีฟังค์ชั่น OTA อัพเดทช่องรายการอัตโนมัติผ่านดาวเทียม (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nสามารถรับชมฟุตบอลลาลีก้าสเปน ผ่านทางช่อง RS Sport La Liga ครบทั้ง 380 แมตช์ ฟรี! 1 ฤดูกาล (1ก.ค.55 ถึ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B3.jpg', 'Thumbnails_B3.jpg'),
('P00014', 'ชุดจานดาวเทียมGMM 5ฟุต (ชิ้นเดียว คอเล็ก) + LNB X2 + GMM MINI ', 0, 1600, '2', 'รองรับได้ทั้งจานดาวเทียมระบบ C ฺBAND และ KU BAND\r\nรับชมได้กว่า 200 ช่อง ในระบบ C-Band\r\nรับชมได้กว่า 80 ช่อง ในระบบ KU-Band\r\nแสนสบายด้วยรีโมทอัจฉริยะ ให้คุณเลือกชมรายการโปรดได้อย่างสะดวกสบายและรวดเร็ว\r', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B4.jpg', 'Thumbnails_B4.jpg'),
('P00015', 'ชุดจานดาวเทียมGMM 5ฟุต (ชิ้นเดียว) + LNB X1 + GMM MINI ', 0, 1450, '2', 'รองรับได้ทั้งจานดาวเทียมระบบ C ฺBAND และ KU BAND\r\nรับชมได้กว่า 200 ช่อง ในระบบ C-Band\r\nรับชมได้กว่า 80 ช่อง ในระบบ KU-Band\r\nแสนสบายด้วยรีโมทอัจฉริยะ ให้คุณเลือกชมรายการโปรดได้อย่างสะดวกสบายและรวดเร็ว\r', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B5.jpg', 'Thumbnails_B5.jpg'),
('P00016', 'ชุดจานดาวเทียมPSI 1.5 SW(ชิ้นเดียว) + X2 + SX ', 0, 1600, '2', 'อัพเดทช่องรายการผ่านดาวเทียมอัตโนมัติ (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nไม่มีหน้าจอ ไม่มีปุ่มกด ไม่มีRF-OUT\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B6.jpg', 'Thumbnails_B6.jpg'),
('P00017', 'ชุดจานดาวเทียมPSI 1.7 + LNB X1 + SX ', 0, 2050, '2', 'อัพเดทช่องรายการผ่านดาวเทียมอัตโนมัติ (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nม่มีหน้าจอ ไม่มีปุ่มกด ไม่มีRF-OUT\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B7.jpg', 'Thumbnails_B7.jpg'),
('P00018', 'ชุดจานดาวเทียม 5ฟุต (4ชิ้น) + LNB X1 + SUNBOX', 0, 2000, '2', 'มีฟังค์ชั่น OTA อัพเดทช่องรายการอัตโนมัติผ่านดาวเทียม (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nสามารถรับชมฟุตบอลลาลีก้าสเปน ผ่านทางช่อง RS Sport La Liga ครบทั้ง 380 แมตช์ ฟรี! 1 ฤดูกาล (1ก.ค.55 ถึ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B8.jpg', 'Thumbnails_B8.jpg'),
('P00019', 'ชุดจานดาวเทียมGMM 5ฟุต (ชิ้นเดียว) + LNB C2 + GMM Z ', 0, 2040, '2', 'มีฟังค์ชั่น OTA อัพเดทช่องรายการอัตโนมัติผ่านดาวเทียม (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nรับชมช่องรายการพิเศษ 4 ช่องรายการ ฟรีไม่มีรายเดือน จาก GMM Z ผ่านดาวเทียม THAICOM ระบบ C-Band และ KU-', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B9.jpg', 'Thumbnails_B9.jpg'),
('P00020', 'ชุดจานดาวเทียมGMM 5ฟุต (ชิ้นเดียว) + LNB X1 + GMM Z ', 0, 1890, '2', 'มีฟังค์ชั่น OTA อัพเดทช่องรายการอัตโนมัติผ่านดาวเทียม (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nรับชมช่องรายการพิเศษ 4 ช่องรายการ ฟรีไม่มีรายเดือน จาก GMM Z ผ่านดาวเทียม THAICOM ระบบ C-Band และ KU-', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B10.jpg', 'Thumbnails_B10.jpg'),
('P00023', 'ชุดจานดำPSI-OK 60 ซม.', 0, 950, '2', 'จานรับสัญญาณขนาด 60 ซ.ม. พร้อมขาตั้ง\r\nหัวรับสัญญาณดาวเทียม (LNBF)\r\nกล่องรับสัญญาณ (IRD)\r\nรีโมทคอนโทรล\r\nสาย AV\r\n*Receiver PSI-OK สามารถเปิด-ปิด OTA ได้*\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B13.jpg', 'Thumbnails_B13.jpg'),
('P00024', 'ชุดจานส้มIPM HD Pro 60 ซม.', 0, 2600, '2', 'CPU 32-bit MIPS ควมเร็วสูงถึง 677 MHz รองรับหน่วยความจำ 16-bit-DDR3 1333\r\nรับชมรายการที่หลากหลายมากยิ่งขึ้นเพราะรองรับทั้งจานดาวเทียมระบบ C Band และ Ku Band\r\nอัพเดทซอฟแวร์และช่องรายการดาวเทียมแบบอัตโน', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B14.jpg', 'Thumbnails_B14.jpg'),
('P00025', 'ชุดจานดาวเทียม SUNBOX 60 ซม.', 0, 1500, '2', 'สามารถรับชมฟุตบอลลาลีก้าสเปน ผ่านทางช่อง RS Sport La Liga ครบทั้ง 380 แมตช์ ฟรี! 1 ฤดูกาล (1ก.ค.55 ถึง 31ก.ค.56)\r\nรองรับการเปิดสัญญาณรับชมฟุตบอลโลก 2014 ที่ประเทศบราซิล\r\nสามารถชมรายการได้มากกว่า 70 ช่', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B15.jpg', 'Thumbnails_B15.jpg'),
('P00026', 'ชุดจานดาวเทียม GMMZ 60 ซม. ', 0, 1400, '2', 'ชุดจานดาวเทียม GMMZ 60 ซม.\r\nกล่องGMM Z สามารถใช้ร่วมกับจานทุกสี\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B16.jpg', 'Thumbnails_B16.jpg'),
('P00027', 'ชุดจานเหลืองDTV KE-10 60 ซม. ', 0, 1500, '2', 'จานเหลืองDTV KE-10 รับสัญญาณทีวีไทย ช่อง 3,5,7,9,NBT,TPBS รวม 6 ช่อง และช่องอื่นๆ อีก 70 กว่าช่องได้แก่ Nation, Money-Chanal, ช่องข่าวอื่นๆ, ช่องกีฬา, ช่องสารคดี, ช่องการ์ตูน, ช่องหนัง, ช่องซีรี่ย์, ช', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B17.jpg', 'Thumbnails_B17.jpg'),
('P00028', 'ชุดจานส้มIPM-CLEAR 60 ซม.', 0, 1400, '2', 'จานส้มIPM-CLEAR รับสัญญาณทีวีไทย ช่อง 3,5,7,9,NBT,TPBS รวม 6 ช่อง และช่องอื่นๆ อีกกว่า 80 ช่องได้แก่ ASTV NEW1, Spring New, ช่องข่าวอื่นๆ, ช่องกีฬา, ช่องสารคดี, ช่องการ์ตูน, ช่องหนัง, ช่องซีรี่ย์, ช่อ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B18.jpg', 'Thumbnails_B18.jpg'),
('P00029', 'ชุดจานเหลืองDTV D-KHOOM 60 ซม.', 0, 1000, '2', 'จานเหลือง DTV D-KHOOM รับสัญญาณทีวีไทย ช่อง 3, 5, 7, 9, NBT, TPBS รวม 6 ช่อง และช่องอื่นๆ อีก 70 กว่าช่อง ได้แก่ Nation, Money-Chanal, ช่องข่าวอื่นๆ ช่องกีฬา, ช่องสารคดี, ช่องการ์ตูน, ช่องหนัง, ช่องซี', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B19.jpg', 'Thumbnails_B19.jpg'),
('P00030', 'ชุดจานส้ม IPM Lite 60ซม.', 0, 1200, '2', 'จานส้ม IPM Lite รับสัญญาณทีวีไทย ช่อง 3,5,7,9,NBT,TPBS รวม 6 ช่อง และช่องอื่นๆ รวมกว่า 80 ช่องได้แก่ ASTV NEWS1, Spring NEWS, ช่องข่าวอื่นๆ, ช่องกีฬา, ช่องสารคดี, ช่องการ์ตูน, ช่องหนัง, ช่องซีรีย์, ช่', 'http://icmpsutrang.esy.es/myfile/Thumbnails_B20.jpg', 'Thumbnails_B20.jpg'),
('P00031', 'เครื่องรับสัญญาณ PSI OTV', 0, 2500, '3', 'สามารถรับชมช่องรายการผ่านดาวเทียมไทยคม 5/6 ระบบ KU BAND ได้เลย เช่น ช่อง ฟรีทีวี 3 5 7 9 NBT TPBS การศึกษา 15 ช่อง TGN, ETV, Money Channel, DMC, รัฐสภา, MVTV , Psi channel, Workpoint ,World movie ,Nat', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C1.jpg', 'Thumbnails_C1.jpg'),
('P00032', 'กล่องรับ สัญญาณ GMMZ HD-Lite 365 วัน', 0, 4990, '3', 'รองรับการชมช่องรายการในระบบ HD\r\nไม่พลาดทุกการรับชม ด้วยระบบ PVR สั่งบันทึกได้ตามฮาร์ดดิสก์ของคุณ\r\nALL IN ONE PLAYBOX สามารถดูหนัง ฟังเพลง หรือชมรูปภาพจาก Flash Drive\r\nหรือ Hard Disk ได้ไม่จำกัด\r\nรองรั', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C2.jpg', 'Thumbnails_C2.jpg'),
('P00033', 'PSI CTH plugin dongle ', 0, 2399, '3', '', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C3.jpg', 'Thumbnails_C3.jpg'),
('P00034', 'sunbox', 0, 1350, '3', '', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C4.jpg', 'Thumbnails_C4.jpg'),
('P00035', 'เครื่องรับ สัญญาณ ดาวเทียม IPM HD combo 3in1 ', 0, 2700, '3', 'Receiver IPM HD Combo 3in1 เอชดี คอมโบ\r\nที่สุดของการรับชม ทีวีดาวเทียมและทีวีดิจิตอล\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C5.jpg', 'Thumbnails_C5.jpg'),
('P00036', 'เครื่อง รับ สัญญาณ ดาวเทียม Leotech 809V1S ', 0, 650, '3', 'กล่องเป็นระบบ FTA (Free to Air) เหมาะสำหรับใช้กับจานตะแกรงดำ\r\n   C-Band เป็นหลัก \r\nสามารถรับชมช่องรายการได้มากกว่า 250 ช่อง \r\n  จากดาวเทียมไทยคม C-Band\r\nรองรับการถ่ายทอดสดกีฬาต่างๆ ผ่านทางช่อง 3, 5, 7', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C6.jpg', 'Thumbnails_C6.jpg'),
('P00037', 'เครื่อง รับ สัญญาณ ดาวเทียม GMMZ HD Lite ', 0, 2990, '5', 'รับประกันสินค้า1ปี', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C7.jpg', 'Thumbnails_C7.jpg'),
('P00038', 'เครื่อง รับ สัญญาณ ดาวเทียม GMMZ HD Lite ', 0, 1350, '3', 'รับประกันสินค้า1ปี', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C8.jpg', 'Thumbnails_C8.jpg'),
('P00039', 'กล่อง รับ สัญญาณ ดาวเทียม PSI O2X HD ', 0, 1550, '5', 'ต้องมีจานดาวเทียมอยู่แล้ว ได้ทุกสี แดง ดำ เขียว เหลือง\r\nถ้ามีจานแดงอยู่แล้วสามารถซื้อไปติดตั้งได้เลยครับ ถ้ามีมากกว่า1จุดให้ทำการปิดเครื่องจุดอื่นที่ไม่ได้ดูครับเนื่องจากจะทำให้เครื่องดึงสัญญาณกันแล้ว', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C9.jpg', 'Thumbnails_C9.jpg'),
('P00040', 'กล่องรับสัญญาณดาวเทียม THAISAT BEST 1 BISS OTA ', 0, 499, '3', 'เป็นสีแบบบรอนเงินและสีดำดีไซด์ทันสมัยมุมมองใหม่\r\nมีปุ่มกดในกรณี...หารีโมทไม่เจอ...หรือรีโมทหาย\r\nมีจอแสดงตัวเลขช่องรายการ...เพื่อบอก...ว่าดูช่องไหนอยู่\r\nมีปุ่ม Power เปิดปิดเครื่อง...ช่วยตัดไฟจริงเพื่อ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C11.jpg', 'Thumbnails_C11.jpg'),
('P00041', 'กล่องรับสัญญาณดาวเทียม THAISAT BEST 2 BISS OTA ', 0, 450, '3', 'สามารถใช้รับสัญญาณฟรีทีวีไทย 6 ช่อง และช่องอื่นๆ อีก 50 ช่อง โดยใช้จานOFFSETขนาดเล็ก ตั้งแต่ 45 ซม. ขึ้นไป หันไปรับดาวเทียมThaicom5KU\r\nสามารถต่อกับจานKU BAND เพื่อรับสัญญาณฟรีทีวีไทย 6 ช่อง และช่องอื่', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C12.jpg', 'Thumbnails_C12.jpg'),
('P00042', 'กล่องรับสัญญาณดาวเทียม THAISAT HD RV-007 ', 0, 3500, '3', ' รับสัญญาณดาวเทียมระบบ MPEG 4 HD,MPEG 2 SD (ภาพชัดสีสด ใส)\r\n เป็นเครื่องรับในระบบ Standard Definition (SD) มีขนาด 720 x 480\r\nเครื่องรับมาตรฐานความคมชัดระบบ High Definition (HD) การรับส่งสัญญาณภาพในแบบ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C13.jpg', 'Thumbnails_C13.jpg'),
('P00043', 'กล่องรับสัญญาณดาวเทียม กล่องคนดี whitebox ', 0, 400, '3', 'จัดเรียงช่องรายการที่ดี สำหรับคนดี ไว้ลำดับต้นๆ\r\nช่องรายการไม่หาย ด้วยระบบอัพเกรดช่องรายการอัตโนมัติผ่านดาวเทียม OTA\r\nFast OTA คือ การอัพเกรด OTA ได้อย่างรวดเร็ว เพียงไม่กี่วินาที \r\nBiss key OTA คือ ส', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C14.jpg', 'Thumbnails_C14.jpg'),
('P00044', 'กล่อง รับ สัญญาณ ดาวเทียม RECEIVER GMMZ-HD ', 0, 2490, '3', 'มีช่องรายการมากถึง5ช่องFREE HD และดูPAYTV ฟรี1ปี', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C15.jpg', 'Thumbnails_C15.jpg'),
('P00045', 'กล่อง รับ สัญญาณ ดาวเทียม RECEIVER PSI OK-X ', 0, 599, '3', 'มีฟังค์ชั่น OTA อัพเดทช่องรายการอัตโนมัติผ่านดาวเทียม (ช่องรายการไม่หาย ไม่ต้องแก้ความถี่ช่องเอง)\r\nรับสัญญาณดาวเทียม C/KU BAND ในระบบ Digital\r\nสามารถ Manual OTA ได้\r\nไม่มีหน้าจอแสดงเลขช่อง ไม่มีปุ่มกด', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C16.jpg', 'Thumbnails_C16.jpg'),
('P00046', 'กล่อง รับ สัญญาณ ดาวเทียม RECEIVER IPM-CLEAR ', 0, 1100, '3', ' สามารถใช้รับสัญญาณฟรีทีวีไทย 6 ช่อง และช่องอื่นๆ อีกกว่า 120 ช่อง โดยใช้จานOFFSETขนาดเล็ก ตั้งแต่ 45 ซม. ขึ้นไป หันไปรับดาวเทียม NSS6\r\n ตัวเครื่องเป็นกล่องพลาสติก มีหน้าจอแสดงเลขช่อง มีปุ่มกดเลื่อนช่', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C17.jpg', 'Thumbnails_C17.jpg'),
('P00047', 'กล่อง รับ สัญญาณ ดาวเทียม RECEIVER IPM HD PRO ', 0, 2299, '3', '  รับสัญญาณทีวีไทย ผ่านดาวเทียม NSS6 ระบบ KU-Band โดยสามารถรับชมช่องในแบบ HDTV ได้ถึง 9 ช่องและรองรับได้สูงสุดถึง24ช่องรายการ ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C18.jpg', 'Thumbnails_C18.jpg'),
('P00048', 'กล่อง รับ สัญญาณ ดาวเทียม RECEIVER PSI OK ', 0, 550, '3', 'สามารถใช้รับสัญญาณฟรีทีวีไทย 6 ช่อง และช่องอื่นๆ อีก 50 ช่อง โดยใช้จานOFFSETขนาดเล็ก ตั้งแต่ 45 ซม. ขึ้นไป หันไปรับดาวเทียม Thaicom5K\r\nสามารถต่อกับจานแดง true vision เพื่อรับสัญญาณฟรีทีวีไทย 6 ช่อง แล', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C19.jpg', 'Thumbnails_C19.jpg'),
('P00049', 'กล่องรับสัญญาณดาวเทียม RECEIVER DTV รุ่น D-KHOOM ', 0, 599, '3', 'สามารถใช้รับสัญญาณฟรีทีวีไทย 6 ช่อง และช่องอื่นๆ อีก 70 กว่าช่อง โดยใช้จานOFFSETขนาดเล็ก ตั้งแต่ 45 ซม. ขึ้นไป หันไปรับดาวเทียม Thaicom5K\r\n สามารถต่อกับจานแดง true vision เพื่อรับสัญญาณฟรีทีวีไทย 6 ช่', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C22.jpg', 'Thumbnails_C22.jpg'),
('P00050', 'RECEIVER DTV รุ่น KE-10 ', 0, 1100, '3', 'เป็นเครื่องรับ Digital ระบบ Ku-band แบบฟิกซ์ สามารถรับทีวีไทยได้ 6 ช่อง และรายการอื่น ๆ รวมกว่า 50 ช่อง โดยใช้จานขนาด 60-75 cm เท่านั้น\r\nRECEIVER DTV KE-10 รับสัญญาณทีวีไทย ช่อง 3,5,7,9,NBT,TPBS รวม 6', 'http://icmpsutrang.esy.es/myfile/Thumbnails_C23.jpg', 'Thumbnails_C23.jpg'),
('P00051', 'THAISAT C-BAND 185 4ชิ้น', 0, 1650, '4', 'หน้าจานดีไซน์ใหม่ขนาด 185 ฟุต แบ่งเป็น 4 ชิ้น บรรจุกล่องกระดาษ เพื่อความสะดวกในการขนส่ง\r\nเกณฑ์การรับสัญญาณสูงกว่าในจานขนาดเดียวกัน\r\nจานดาวเทียม THAISAT 185 ซม. (4 ชิ้น) + เสา 2" สูง 100 ซ.ม.+ หมวก\r\nคอ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D1.jpg', 'Thumbnails_D1.jpg'),
('P00052', 'หน้าจานดาวเทียม Thaisat 60 cm สีเขียว', 0, 450, '4', 'หน้าจานดีไซน์ใหม่เพิ่มเกณฑ์รับสัญญาณสูงกว่าจานทั่วไปในขนาดเดียวกัน\r\nขาจับและส่วนประกอบต่างๆออกแบบให้ติดตั้งง่ายสะดวกต่อการใช้งาน\r\nเพิ่มขนาดเสาจาน แข็งแรง ทนทาน ต่อแรงลมที่มาปะท\r\nเคลือบผิวด้วยเครื่องอบ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D2.jpg', 'Thumbnails_D2.jpg'),
('P00053', 'THAISAT C-BAND 5 ฟุต ชิ้นเดียว รุ่น SV', 0, 800, '4', 'หน้าจานดีไซน์ใหม่เพิ่มเกณฑ์ รับสัญญาณสูงกว่าจานทั่วไปในขนาดเดียวกัน\r\nจานดาวเทียม THAISAT 5 ฟุต ชิ้นเดียว(SV) + เสา 1.5" สูง 75 ซ.ม.+ หมวกเหลี่ยม\r\nขา จับและส่วนประกอบต่างๆ ออกแบบให้ติดตั้งง่ายสะดวกต่อก', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D3.jpg', 'Thumbnails_D3.jpg'),
('P00054', 'หน้าจาน PSI OK + หัวรับ OK-2', 0, 790, '4', 'หน้าจานดาวเทียมสีดำ 60 ซม.พร้อมขาตั้ง\r\nหัวรับสัญญาณ KU OK2\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D4.jpg', 'Thumbnails_D4.jpg'),
('P00055', 'จานส้ม IPM 60cm.+หัวรับ KU Universal', 0, 600, '4', 'หน้าจานดาวเทียม IPM สีส้ม 60 ซ.ม. พร้อมขาตั้ง\r\nLNB KU- Universal\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D5.jpg', 'Thumbnails_D5.jpg'),
('P00056', 'หน้าจานเขียว LEOTECH 60cm', 0, 450, '4', ' \r\nจานรับสัญญาณดาวเทียม ขนาด 60 ซ.ม. สีเขียว พร้อมขาตั้ง \r\nใช้รับสัญญาณดาวเทียม NSS6 Ku-Band หรือ รับสัญญาณดาวเทียม Thaicom Ku-Band\r\nใช้ร่วมกับหัวรับ LNB Ku-Band\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D6.jpg', 'Thumbnails_D6.jpg'),
('P00057', 'หน้าจานส้มIPM ขนาด 60ซม. ', 0, 450, '4', 'หน้าจานส้มIPM ขนาด 60ซม. ใช้รับสัญญาณดาวเทียมระบบ Ku-Band เช่น Thaicom 5K, Nss6(ASTV)\r\n\r\nอุปกรณ์ประกอบด้วย\r\n หน้าจานส้มIPM ขนาด 60ซม.\r\nชุดคอจาน\r\n ก้านจับ LNBF\r\nห่วงรัด LNBF\r\n ขาตั้งจานดาวเทียม (ใช้ติด', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D7.jpg', 'Thumbnails_D7.jpg'),
('P00058', 'หน้าจานแดง true vision ขนาด 75ซม. + LNB 11300', 0, 700, '4', 'หน้าจานแดง true vision ขนาด 75ซม. ใช้รับสัญญาณดาวเทียมระบบ Ku-Band เช่น Thaicom 5K\r\n\r\nอุปกรณ์ประกอบด้วย\r\nหน้าจานแดง true vision ขนาด 75ซม.\r\n ชุดคอจาน\r\n ก้านจับ LNBF\r\n ห่วงรัด LNBF\r\nขางอยึดจานดาวเทียม\r', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D8.jpg', 'Thumbnails_D8.jpg'),
('P00059', 'หน้าจานดาวเทียมPSI 227 ซม.(MOVE) ', 0, 3060, '4', 'หน้าจานดาวเทียมPSI 227 ซม.(MOVE) ใช้รับสัญญาณดาวเทียมระบบ C-Band\r\n\r\nอุปกรณ์ในชุดประกอบด้วย\r\nหน้าจานดาวเทียมPSI 227 ซม. จำนวน 1 ชุด\r\nชุดคอจานแบบMOVE จำนวน 1 ชุด\r\nเสาสูง 1.5 ม. จำนวน 1 ต้น\r\nหมวกครอบ LNB', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D9.jpg', 'Thumbnails_D9.jpg'),
('P00060', 'หน้าจานเหลืองDTV ขนาด 60ซม. ', 0, 400, '4', 'หน้าจานเหลืองDTV ขนาด 60ซม. ใช้รับสัญญาณดาวเทียมระบบ Ku-Band เช่น Thaicom 5K, Nss6(ASTV)\r\n\r\nอุปกรณ์ประกอบด้วย\r\nหน้าจานเหลืองDTV ขนาด 60ซม.\r\n ชุดคอจาน\r\nก้านจับ LNBF\r\nห่วงรัด LNBF\r\n ขาตั้งจานดาวเทียม (ใ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D10.jpg', 'Thumbnails_D10.jpg'),
('P00061', 'หน้าจานดาวเทียม PSI D185 แบบฟิกซ์ (4 ชิ้น) ', 0, 1800, '4', 'หน้าจานดาวเทียมPSI 1.85 ใช้รับสัญญาณดาวเทียมระบบ C-Band\r\n\r\nอุปกรณ์ในชุดประกอบด้วย\r\nหน้าจานดาวเทียมPSI 1.85 จำนวน 1 ชุด\r\nชุดคอจานแบบ FIX จำนวน 1 ชุด\r\n เสาสูง 1 ม. จำนวน 1 ต้น\r\nหมวกครอบ LNBF จำนวน 1 ใบ\r', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D11.jpg', 'Thumbnails_D11.jpg'),
('P00062', 'หน้าจานดาวเทียม PSI D1.7 (FIX) 4ชิ้น ', 0, 1400, '4', 'เป็นจานแบบ FIX เหมาะสำหรับรับสัญญาณในระบบ C-BAND DIGITAL\r\n\r\nคุณสมบัติเด่น\r\n น้ำหนักเบา\r\n ติดตั้งง่าย\r\n เล็กกระทัดรัด\r\n เหมาะสำหรับบ้านที่อยู่ในเมื่อง ที่มีพื้นที่จำกัด\r\n ใช้เวลาในการประกอบน้อย\r\n หาสัญ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D12.jpg', 'Thumbnails_D12.jpg'),
('P00063', 'หน้าจานดาวเทียม PSI D1.5 FIX (ชิ้นเดียว) ', 0, 950, '4', 'เป็นหน้าจานแบบ FIX เหมาะสำหรับรับสัญญาณในระบบ C-BAND DIGITAL\r\n\r\nคุณสมบัติเด่น\r\nน้ำหนักเบา\r\n ติดตั้งง่าย\r\nเล็กกระทัดรัด\r\n เหมาะสำหรับบ้านที่อยู่ในเมื่อง ที่มีพื้นที่จำกัด\r\nใช้เวลาในการประกอบน้อย\r\n หาสั', 'http://icmpsutrang.esy.es/myfile/Thumbnails_D13.jpg', 'Thumbnails_D13.jpg'),
('P00064', 'กล่องรับสัญญาณดิจิตตอล DVB-T2 Thaisat', 0, 1250, '5', '	เครื่องรับดีไซน์ใหม่ บรรจุกล่องกระดาษ เพื่อความสะดวกในการขนส่ง\r\n	ใช้รับสัญญาณทีวีดิจิตอลภาคพื้นดินรับสัญญาณช่องฟรี\r\n	เกณฑ์การรับสัญญาณ สูงกว่าในเครื่องรับขนาดเดียวกัน\r\n?	รับสัญญาณตั้งแต่ความถี่ 48 - ', 'http://icmpsutrang.esy.es/myfile/Thumbnails_E1.jpg', 'Thumbnails_E1.jpg'),
('P00065', 'ชุดกล่องรับสัญญาณดิจิตอล DVB-T2 SAMART Strong Pro + เสาภายใน SAMART D1A ', 0, 1750, '5', 'ประหยัดค่าไฟฟ้า (กินกระแสไฟฟ้าต่ำกว่า 6 วัตต์) และในโหมดสแตนบายกินกระแสไฟฟ้าค่ำกว่า 0.5 วัตต์\r\nรองรับการบันทึก (PVR), หยุดเวลา (TimeShift), อัพเกรดซอฟท์แวร์ และการเล่นมีเดียไฟล์ ผ่านพอร์ตยูเอสบี (USB)', 'http://icmpsutrang.esy.es/myfile/Thumbnails_E2.jpg', 'Thumbnails_E2.jpg'),
('P00066', 'ชุดกล่องรับสัญญาณดิจิตอล DVB-T2 SAMART Strong Pro + เสาภายใน SAMART D7A ', 0, 1590, '5', 'ประหยัดค่าไฟฟ้า (กินกระแสไฟฟ้าต่ำกว่า 6 วัตต์) และในโหมดสแตนบายกินกระแสไฟฟ้าค่ำกว่า 0.5 วัตต์\r\nรองรับการบันทึก (PVR), หยุดเวลา (TimeShift), อัพเกรดซอฟท์แวร์ และการเล่นมีเดียไฟล์ ผ่านพอร์ตยูเอสบี (USB)', 'http://icmpsutrang.esy.es/myfile/Thumbnails_E3.jpg', 'Thumbnails_E3.jpg'),
('P00067', 'ชุดกล่องรับสัญญาณดิจิตอล DVB-T2 SAMART Strong Pro + เสาภายใน Leotech T2H', 0, 1699, '5', 'ประหยัดค่าไฟฟ้า (กินกระแสไฟฟ้าต่ำกว่า 6 วัตต์) และในโหมดสแตนบายกินกระแสไฟฟ้าค่ำกว่า 0.5 วัตต์\r\nรองรับการบันทึก (PVR), หยุดเวลา (TimeShift), อัพเกรดซอฟท์แวร์ และการเล่นมีเดียไฟล์ ผ่านพอร์ตยูเอสบี (USB)', 'http://icmpsutrang.esy.es/myfile/Thumbnails_E4.jpg', 'Thumbnails_E4.jpg'),
('P00068', 'ชุดกล่องรับสัญญาณดิจิตอล DVB-T2 Leotech + เสาภายใน Leotech T2H', 0, 1650, '5', 'รับสัญญาณดิจิตอลทีวี Full HD\r\nผ่านมาตรฐานจาก กสทช.\r\nตั้งเวลาล่วงหน้าบันทึกช่องรายการอัตโนมัติ หรือกดบันทึกแบบทันที\r\n เล่นไฟล์มัลติมีเดียได้ เช่น ไฟล์หนัง, ไฟล์เพลง, ไฟล์ภาพ, PVR\r\nเชื่อมต่อ External Ha', 'http://icmpsutrang.esy.es/myfile/Thumbnails_E5.jpg', 'Thumbnails_E5.jpg'),
('P00069', 'กล่องรับสัญญาณดิจิตอลทีวี LEOTECH DVB-T2 รุ่น RECNR-LEO-T2DIGITAL-00', 0, 1250, '5', 'รับสัญญาณดิจิตอลทีวี Full HD\r\nผ่านมาตรฐานจาก กสทช.\r\nตั้งเวลาล่วงหน้าบันทึกช่องรายการอัตโนมัติ หรือกดบันทึกแบบทันที\r\nเล่นไฟล์มัลติมีเดียได้ เช่น ไฟล์หนัง, ไฟล์เพลง, ไฟล์ภาพ, PVR\r\nเชื่อมต่อ External Har', 'http://icmpsutrang.esy.es/myfile/Thumbnails_E6.jpg', 'Thumbnails_E6.jpg'),
('P00070', 'ชุด รับ สัญญาณ ดาวเทียม ดิจิตอล SAMART DVB-T2 ', 0, 1600, '5', 'รับได้แล้วในบางพื้นที่ทดลองออกอากาศ กรุงเทพ ,อุบลราชธานี,เชียงใหม่,พิษณุโลก,สุโขทัย,นครราชสีมา,เชียงราย,นนทบุรี,\r\nปทุมธานี,สระแก้ว,นครสวรรค์,ระยอง,สงขลา ฯลฯ\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_E7.jpg', 'Thumbnails_E7.jpg'),
('P00071', 'กล่องรับสัญญาณดิจิตอลทีวี SAMART DVB-T2 ( STRONG PRO ) SONY BUILT-IN ', 0, 1150, '5', 'รับได้แล้วในบางพื้นที่ทดลองออกอากาศ กรุงเทพ และปริมณฑล ,อุบลราชธานี,เชียงใหม่,พิษณุโลก,สุโขทัย,นครราชสีมา,เชียงราย,นนทบุรี,\r\nปทุมธานี,ระยอง,สงขลา ฯลฯ\r\n', 'http://icmpsutrang.esy.es/myfile/Thumbnails_E8.jpg', 'Thumbnails_E8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE IF NOT EXISTS `repair` (
  `Repair_Id` varchar(6) NOT NULL,
  `Repair_Date_Setrepair` datetime NOT NULL,
  `Repair_User_Id_Setrepair` varchar(6) NOT NULL,
  `Repair_Date_In` datetime NOT NULL,
  `Repair_Detail` varchar(200) NOT NULL,
  `Order_Id` varchar(6) NOT NULL,
  `Prod_Id` varchar(6) NOT NULL,
  `Repair_status_ch` varchar(1) NOT NULL,
  PRIMARY KEY (`Repair_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`Repair_Id`, `Repair_Date_Setrepair`, `Repair_User_Id_Setrepair`, `Repair_Date_In`, `Repair_Detail`, `Order_Id`, `Prod_Id`, `Repair_status_ch`) VALUES
('R00001', '2014-11-18 20:50:23', 'U00003', '2008-11-14 08:11:11', 'พัง', 'O00001', 'P00001', 'Y'),
('R00002', '2014-11-18 17:14:40', 'U00003', '2008-11-14 12:19:37', 'พังๆๆเปิดไม่ติด', 'O00002', 'P00001', 'Y'),
('R00003', '2014-11-18 00:00:00', '', '2009-11-14 05:37:49', 'เปิดไม่ติด', 'O00006', 'P00001', 'N'),
('R00004', '2014-11-13 10:42:29', '', '2013-11-14 03:33:33', 'เปิดไม่ติด', 'O00001', 'P00001', 'N'),
('R00005', '2014-11-17 17:53:40', '', '2013-11-14 03:42:18', 'ภาพกระตุกตลอดวัน แม้ว่าฝนไม่ได้ตก ', 'O00007', 'P00001', 'N'),
('R00006', '2014-11-21 00:11:15', '', '2013-11-14 06:56:25', 'ไม่มีสียง', 'O00001', 'P00001', 'N'),
('R00007', '0000-00-00 00:00:00', '', '2014-11-14 12:43:40', 'พัง', 'O00009', 'P00009', 'N'),
('R00008', '2014-11-17 17:53:57', '', '2014-11-14 13:52:26', 'สายขาด', 'O00006', 'P00001', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `Report_ID` varchar(6) NOT NULL,
  `Report_Date` datetime NOT NULL,
  `Order_Id` varchar(6) NOT NULL,
  `Reprort_User_ID` varchar(6) NOT NULL,
  PRIMARY KEY (`Report_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`Report_ID`, `Report_Date`, `Order_Id`, `Reprort_User_ID`) VALUES
('000001', '2026-11-14 00:00:00', 'O00008', 'U00001'),
('000002', '2026-11-14 00:00:00', 'O00009', 'U00003');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `Tax_Id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Tax_Mon` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Tax_Rate` double NOT NULL,
  `Tax_Date` datetime NOT NULL,
  PRIMARY KEY (`Tax_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`Tax_Id`, `Tax_Mon`, `Tax_Rate`, `Tax_Date`) VALUES
('T00001', '2', 0.05, '2014-11-20 16:43:30'),
('T00002', '3', 0.08, '2014-11-20 16:43:52'),
('T00004', '5', 0.17, '2014-11-20 16:44:30'),
('T00003', '4', 0.12, '2014-11-20 16:44:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
