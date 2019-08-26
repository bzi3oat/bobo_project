<?php
include("../connect.php");
include("../swal.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");

date_default_timezone_set('Asia/Bangkok');
$now = date("Y-m-d H:i:s");

mysqli_query($conn, "INSERT INTO declaration(Informate_fname,
Informate_lname,
informant_id_card,
informant_tel,
repairing_detail,
declaration_date,
repairing_status,
LOC_ID) VALUES
								(
								'$_POST[Informate_fname]',
								'$_POST[Informate_lname]',
								'$_POST[informant_id_card]',
								'$_POST[informant_tel]',
								'$_POST[repairing_detail]',
								'$now',
								'0',
								'$_POST[saofai_id]'
								)") or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));

$id = mysqli_insert_id($conn);

if($id >= 10000) {
	$id = $id;
} else if($id >=1000) {
	$id = "0".$id;
} else if($id >=100) {
	$id = "00".$id;
} else if($id >= 10) {
	$id = "000".$id;
} else {
	$id = "0000".$id;
}

for($i = 0; $i < 3; $i++) {
    mysqli_query($conn, "INSERT INTO declaration_progress(mem_id,
	mem_typeid,
	dp_status,
	d_id,
	updated_at) VALUES(
        null,
		$i + 1,
        '0',
        '$id',
		'$now')") or die("Error insert_case เกิดจาก : " . mysqli_error($conn));
}
$sToken = "SauY9ujLmKZSa29HxMduBt5o2rObdKihgxpW1RG44jF";
$sMessage = "วันที่ ". date('d-m-Y') . " เวลา " . date('H:i') . "\nมีการแจ้งซ่อม Tracking id: " . $id . "\nชื่อ-นามสกุลผู้แจ้ง: " . $_POST['Informate_fname'] . ' ' . $_POST['Informate_lname'] . "\nเบอร์โทรศัพท​์:" . $_POST['informant_tel'];

$chOne = curl_init(); 
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt( $chOne, CURLOPT_POST, 1); 
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec( $chOne ); 

//Result error 
if(curl_error($chOne)) 
{ 
	echo 'error:' . curl_error($chOne); 
}
curl_close( $chOne );

?>


<?php
mysqli_close($conn);
?>

<script type="text/javascript">
    swal("การแจ้งเหตุขัดข้องเสร็จสิ้น", "ระบบกำลังพาไปยังหน้าติดตามสถานะการแจ้งซ่อม", "success")
    setTimeout(function() {
        window.location.href = "../visitor_tracking.php";
    }, 3000); 
</script>