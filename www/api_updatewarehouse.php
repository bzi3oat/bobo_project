<?php
include("connect.php");
include("swal.php");

$stuff_id = "$_POST[stuff_id]";
$stuff_name = "$_POST[stuff_name]";
$stuff_type = "$_POST[stuff_type]";
$stuff_brand = "$_POST[stuff_brand]";
$stuff_price = "$_POST[stuff_price]";
$stuff_amount = "$_POST[stuff_amount]";

$sqlupdatedwarehouse = "UPDATE warehouse 
                        SET stuff_name = '$stuff_name', 
                        stuff_type = '$stuff_type', 
                        stuff_brand = '$stuff_brand', 
                        stuff_price = '$stuff_price', 
                        stuff_amount = '$stuff_amount'
                        WHERE stuff_id = $stuff_id";

if (!mysqli_query($conn, $sqlupdatedwarehouse)) {
    echo "Error: " . $sqlupdatedwarehouse . "<br>" . mysqli_error($conn);
}

?>




<script type="text/javascript">
    swal("บันทึกข้อมูลเสร็จสิ้น", "กำลังกลับไปหน้าจัดการวัสดุในคลัง", "success")

    setTimeout(function() {
        
        window.location.href = "admin_warehouse.php";
    }, 2000); // 5 วิแล้วค่อยไปที่หน้าที่ต้องการ
</script>