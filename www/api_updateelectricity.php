<?php
include("connect.php");
include("swal.php");

$loc_id = "$_POST[loc_id]";
$lamp_id = "$_POST[lamp_id]";
$lat = "$_POST[lat]";
$lng = "$_POST[lng]";
$details = "$_POST[details]";
$village_id = "$_POST[village_id]";
$now = date("Y-m-d H:i:s");

$sqldateelectricity = "UPDATE location 
                        SET lamp_id = '$lamp_id', 
                        LOC_DETAIL = '$details', 
                        LAT = '$lat', 
                        LNG = '$lng', 
                        village_id = '$village_id',
                        LOC_DATE = '$now'
                        WHERE LOC_ID = $loc_id";
if (!mysqli_query($conn, $sqldateelectricity)) {
    echo "Error: " . $sqldateelectricity . "<br>" . mysqli_error($conn);
}

?>
<script type="text/javascript">
    swal("บันทึกข้อมูลเสร็จสิ้น", "ระบบกำลังพากลับไปที่หน้าจัดการข้อมูลเสาไฟฟ้าส่องสว่าง", "success")
    setTimeout(function() {
        window.location.href = "admin_electricity_manage.php";
    }, 2000); 
</script>
