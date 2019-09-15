<?php
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


//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
require_once __DIR__ . '/vendor/autoload.php';
$conn = mysqli_connect("db", "root", "root", "electricity");
mysqli_set_charset($conn, 'utf8');

$select = "SELECT * FROM declaration where repairing_status = 3 order by declaration_id desc ";

if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
    $select = "SELECT * FROM declaration where repairing_status = 3 and (declaration_date >= " . "'" . $_GET['startDate'] . "'" . " and declaration_date <= " . "'" . $_GET['endDate'] . "')" . " order by declaration_id desc ";
}
$result = $conn->query($select);

$content = "";
        while ($res = mysqli_fetch_array($result)) {
            $content .="<tr>
                        <td style='border:1px solid #000; padding:5px;'>" . $res["declaration_id"] . "</td>
                        <td style='border:1px solid #000; padding:5px;'>" . $res["declaration_date"] . "</td>
                        <td style='border:1px solid #000; padding:5px;'>" . $res["Informate_fname"]."&nbsp;".$res["Informate_lname"]. "</td>
                        <td style='border:1px solid #000; padding:5px;'>" . $res["informant_tel"] . "</td>
                        <td style='border:1px solid #000; padding:5px;'>" . $res["LOC_ID"] . "</td>
                        </tr>";
            }

            
$mpdf = new mPDF();
$head = '
<style>
    body{
        font-family: "THSarabun";
        font-size: 28px;
    }
  
</style>
<h6 style="text-align:center">ประวัติการเบิกถอนวัสดุ</h6>
<p style="text-align:right; font-size:14pt;" >พิมพ์เมื่อ '.DateThai($now).'  </p>
<table id="bg-table" width="100%" style="border-collapse: collapse; margin-top:8px;">
<thead>
        <tr  style="border:1px solid #000; padding:4px;">
        <td  width="20%" style="border-right:1px solid #000;padding:4px;text-align:center;">ลำดับ</td>
        <td  width="45%" style="border-right:1px solid #000; padding:4px;text-align:center;">&nbsp;วันที่เบิก</td>
        <td  width="45%" style="border-right:1px solid #000; padding:4px;text-align:center;">&nbsp;รายการวัสดุที่เบิก</td>
        <td  width="45%" style="border-right:1px solid #000; padding:4px;text-align:center;">จำนวน</td>
        <td  width="20%" style="border-right:1px solid #000; padding:4px;text-align:center;">ชื่อผู้เบิก</td>
        <td  width="20%" style="border-right:1px solid #000; padding:4px;text-align:center;">เสาไฟ</td>
        </tr>   
</thead>
<tbody>';


$end = "</tbody></table>";
$mpdf->WriteHTML($head);
$mpdf->WriteHTML($content);
$mpdf->WriteHTML($end);
$mpdf->Output();
?>