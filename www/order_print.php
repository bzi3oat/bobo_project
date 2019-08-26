<?php
	require_once __DIR__ . '/vendor/autoload.php';

	$conn = mysqli_connect("db", "root", "root", "electricity");
    mysqli_set_charset($conn, 'utf8');
    
	$sql = "SELECT * FROM orders inner join warehouse on orders.stuff_id = warehouse.stuff_id where order_id = '" . $_GET['order_id'] . "'";
	$result = mysqli_query($conn, $sql);
	$objResult = mysqli_fetch_array($result);
		
	$day = date("d");
	$month = date("m");
	$year = date("Y")+543;
	$dateObj = ("$year-$month-$day");

	date_default_timezone_set('Asia/Bangkok');
	$now = date("d-m-Y H:i:s");

	function DateThai($now)
	{
		$strYear = date("Y",strtotime($now))+543;
		$strMonth= date("n",strtotime($now));
		$strDay= date("j",strtotime($now));
		$strHour= date("H",strtotime($now));
		$strMinute= date("i",strtotime($now));
		$strSeconds= date("s",strtotime($now));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "วันที่ "."$strDay $strMonthThai $strYear"." เวลา "."$strHour:$strMinute"." น.";

	}
	function DateThaiShort($now)
	{
		$strYear = date("Y",strtotime($now));
		$strMonth= date("n",strtotime($now));
		$strDay= date("j",strtotime($now));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

	$mpdf = new mPDF();
	$head = '
	<p style="text-align:center; font-size:16pt; ">รายการสั่งซื้อวัสดุ</p> 
	<style>
		body{
			font-family: "THSarabun";
		}
		u{
			border-bottom: 1px dotted;
			text-decoration: none;
		}
  
	</style>
    <br>
    <p style="font-size: 14pt;">รหัสวัสดุ <u>'. $objResult['stuff_id'] .'</u></p>
    <p style="font-size: 14pt;">ชื่อวัสดุ <u>'. $objResult['stuff_name'] .'</u></p>
    <p style="font-size: 14pt;">เหลือจำนวน <u>'. $objResult['stuff_amount'] .'</u></p>
    <p style="font-size: 14pt;">ต้องการสั่งซื้อเพิ่มจำนวน <u>'. $objResult['order_amount'] .'</u></p>
    <p style="font-size: 14pt;">ชิ้นละ <u>'. $objResult['order_price'] .'</u></p>
    <p style="font-size: 14pt;">รวมเป็นจำนวนเงิน <u>'. $objResult['total'] .'</u></p>
    <p style="font-size: 14pt;">ณ วันที่ <u>'. $objResult['order_date'] .'</u></p><br><br>
    <p style="font-size: 16pt;">จึงออกใบสั่งซื้อนี้เพื่อมาแจ้งให้ทราบ</p>';

$mpdf->WriteHTML($head);
$mpdf->Output();
?>