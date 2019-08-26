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
                text: 'ระบบกำลังพากลับไปที่หน้าจัดการประเภทยี่ห้อวัสดุ',
                icon: 'success',
                timer: 1000,
                showCancelButton: false,
                showConfirmButton: false
            })
            .then(() => {
                window.location.href = "http://localhost/bobo_project/admin_electricity_brand.php";
            })
    }
</script>

<?php
include("connect.php");

$brand_id = "$_GET[brand_id]";

// user
$sqldeletebrand = "DELETE FROM type_brand WHERE brand_id = $brand_id";

if (!mysqli_query($conn, $sqldeletebrand)) {
    echo "Error: " . $sqldeletebrand . "<br>" . mysqli_error($conn);
}

echo '<script type="text/javascript">';
echo 'myFn();';
echo '</script>';

?>