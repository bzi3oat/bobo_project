<?php
include("../connect.php");
include("../swal.php");

$loc_id = "$_GET[loc_id]";
$status = "$_GET[status]";

$updatestatus = "UPDATE location 
                        SET status = '$status'
                        WHERE LOC_ID = $loc_id";

if (!mysqli_query($conn, $updatestatus)) {
    echo "Error: " . $updatestatus . "<br>" . mysqli_error($conn);
}

?>

<script type="text/javascript">
    swal("บันทึกข้อมูลเสร็จสิ้น", "ระบบกำลังพากลับไปหน้าจัดการข้อมูลเสาไฟฟ้าส่องสว่าง", "success")
    setTimeout(function() {
        window.location.href = "../admin_electricity_manage.php";
    }, 2000); 
</script>
