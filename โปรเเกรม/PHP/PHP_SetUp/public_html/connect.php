<?php
$host = '127.0.0.1';
$user = 'root';
$pass = 'root';

//$host = 'mysql.hostinger.in.th';
//$user = 'u570781514_sun1';
//$pass = '0812775184';
$database = 'u570781514_sun1';

$objConnect = mysql_connect($host,$user,$pass) or die ("ติดต่อฐานข้อมูลไม่ได้");
$objDB = mysql_select_db($database) or die ("ติดต่อฐานข้อมูลไม่ได้");

mysql_db_query($database,"SET NAMES UTF8");
?>
