<?php
include("connect.php");
include("swal.php");

date_default_timezone_set('Asia/Bangkok');

$timeStamp = date("Y-m-d H:i:s");

$query = "INSERT INTO location(LOC_NAME, LAT, LNG, LOC_DETAIL, LOC_DATE, village_id, lamp_id, status) VALUES
(
'',
'$_POST[lat]',
'$_POST[lng]',
'$_POST[details]',
'$timeStamp',
'$_POST[village_id]',
'$_POST[lamp_id]',
'1')";

mysqli_query($conn, $query) or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));


?>
<script type="text/javascript">
    swal("บันทึกข้อมูลเสร็จสิ้น", "ระบบกำลังพาไปที่หน้าจัดการข้อมูลเสาไฟฟ้าส่องสว่าง", "success")
    setTimeout(function() {
        window.location.href = "admin_electricity_manage.php";
    }, 2000); 
</script>

<?php

?>
<?php
mysqli_close($conn);
?>