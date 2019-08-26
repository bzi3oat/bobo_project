<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
<script type="text/javascript">
    function myFn() {
        swal({
                title: 'ดำเนินการเสร็จสิ้น',
                text: 'ระบบกำลังพากลับไปหน้ารายการวัสดุในคลัง',
                icon: 'success',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            })
            .then(() => {
                window.location.href = "http://localhost:8000/admin_warehouse.php";
            })
    }
</script>

<?php
include("connect.php");

$stuff_id = "$_GET[stuff_id]";

// user
$sqldeletewarehouse = "DELETE FROM warehouse WHERE stuff_id = $stuff_id";

if (!mysqli_query($conn, $sqldeletewarehouse)) {
    echo "Error: " . $sqldeletewarehouse . "<br>" . mysqli_error($conn);
}

echo '<script type="text/javascript">';
echo 'myFn();';
echo '</script>';

?>