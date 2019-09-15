<?php
	require_once __DIR__ . '/vendor/autoload.php';

	$conn = mysqli_connect("db", "root", "root", "electricity");
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM declaration INNER JOIN location ON declaration.LOC_ID = location.LOC_ID WHERE declaration_id = '" . $_GET['decId'] . "' ";
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
	<p style="text-align:center; font-size:16pt; ">คำร้องขอซ่อมแซมไฟสาธารณะ<br>เทศบาลตำบลหนองควาย</p> 
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
	<p style="text-align:right; font-size:14pt;" >พิมพ์เมื่อ '.DateThai($now).'  </p>

	<p style="text-align:left; font-size:14pt; ">เรื่อง ขอซ่อมแซมไฟฟ้าสาธารณะ</p> 
	<p style="text-align:left; font-size:14pt; ">เรียน นายกเทศมนตรีตำบลหนองควาย</p> 

	<p style="text-align:left; font-size:14pt; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้าพเจ้า <u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$objResult["Informate_fname"].' '.$objResult["Informate_lname"].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u>
		 มีความประสงค์ขอให้เทศบาลตำบลหนองควาย อำเภอหางดง จังหวัดเชียงใหม่ เข้าดำเนินการซ่อมแซมไฟฟ้าสาธารณะของหมู่ที่ <u> &nbsp;&nbsp;&nbsp;'.$objResult["village_id"].' &nbsp;&nbsp;&nbsp;</u> หมู่บ้าน <u> &nbsp;&nbsp;&nbsp; '.($objResult['village_id'] == 1 ? '': 'หมู่บ้านตองกาย').'&nbsp;&nbsp;&nbsp; </u>  ตำบล <u> หนองควาย </u>
		อำเภอหางดง จังหวัดเชียงใหม่</p> 

	<p style="text-align:left; font-size:14pt; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เสาไฟต้นที่ <u> &nbsp;&nbsp;&nbsp;&nbsp;'.$objResult["LOC_ID"].'&nbsp;&nbsp;&nbsp;&nbsp;</u> 
		ตำแหน่งเสาไฟฟ้าส่องสว่าง LAT <u> &nbsp;&nbsp;&nbsp;&nbsp;'.$objResult["LAT"].'&nbsp;&nbsp;&nbsp;&nbsp;</u> LNG <u> &nbsp;&nbsp;&nbsp;&nbsp;'.$objResult["LNG"].'&nbsp;&nbsp;&nbsp;&nbsp;</u>  รายละเอียดอื่นๆ อาการขัดข้อง 
		<u> &nbsp;&nbsp;&nbsp;&nbsp;'.$objResult["repairing_detail"].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> 
		</p> 

	<p style="text-align:right; font-size:14pt; "> ชื่อผู้แจ้ง <u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$objResult["Informate_fname"].' '.$objResult["Informate_lname"].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> 	</p> 
	<p style="text-align:right; font-size:14pt; "> เบอร์ติดต่อ <u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$objResult["informant_tel"].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> 	</p> <br>	
	
	

	<p style="text-align:left; font-size:14pt; "> สถานะการอนุมัติ 	</p> 
	<p style="text-align:left; font-size:14pt; "> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" '.($objResult['repairing_status'] >= 0 ? 'checked="checked"' : '').'> เจ้าพนักงานธุรการชำนาญงาน   		</p> 
	<p style="text-align:left; font-size:14pt; "> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" '.($objResult['repairing_status'] >= 1 ? 'checked="checked"' : '').'>  ผู้อำนวยการกองช่าง   			</p> 
	<p style="text-align:left; font-size:14pt; "> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" '.($objResult['repairing_status'] >= 2 ? 'checked="checked"' : '').'>  ปลัดเทศบาลตำบลหนองควาย   	 </p> 
	
	<p style="text-align:left; font-size:14pt; "> สถานะการดำเนินงาน 	</p> 
	<p style="text-align:left; font-size:14pt; "> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" '.($objResult['repairing_status'] == 2 ? 'checked="checked"' : '').'> ดำเนินการเสร็จสิ้น
</p> ';

$mpdf->WriteHTML($head);
$mpdf->Output();
?>