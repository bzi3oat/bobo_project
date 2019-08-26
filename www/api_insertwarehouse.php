<?php
session_start();
include("connect.php");
include("swal.php");

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");

mysqli_query($conn, "INSERT INTO warehouse(stuff_name, stuff_type, stuff_brand, stuff_date, stuff_price, stuff_amount, member_id) VALUES 
								(
								'$_POST[stuff_typename]',
								'$_POST[lamp_id]',
								'$_POST[brand_id]',
								'$date',
								'$_POST[stuff_price]',
								'$_POST[stuff_amount]',
								'$_SESSION[member_id]'
								) ") or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));


// mysqli_query($conn, "INSERT INTO type_lamp(lamp_name) VALUES ('$_POST[lamp_name]') ") ;
// mysqli_query($conn, "INSERT INTO type_brand(lamp_name) VALUES ('$_POST[lamp_name]') ") ;
?>

<?php
mysqli_close($conn);
?>

<script type="text/javascript">
    swal("เพิ่มข้อมูลวัสดุเสร็จสิ้น", "ระบบกำลังพากลับไปยังหน้ารายการวัสดุ", "success")
    setTimeout(function() {
        window.location.href = "admin_warehouse.php";
    }, 2000); 
</script>
