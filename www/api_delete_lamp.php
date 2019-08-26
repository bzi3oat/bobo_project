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
                text: 'ระบบกำลังพากลับไปที่หน้าจัดการประเภทหลอดไฟ',
                icon: 'success',
                timer: 1000,
                showCancelButton: false,
                showConfirmButton: false
            })
            .then(() => {
                window.location.href = "http://localhost:8000/admin_electricity_lamp.php";
            })
    }
</script>

<?php
include("connect.php");

$lamp_id = "$_GET[lamp_id]";

// user
$sqldeletelamp = "DELETE FROM type_lamp WHERE lamp_id = $lamp_id";

if (!mysqli_query($conn, $sqldeletelamp)) {
    echo "Error: " . $sqldeletelamp . "<br>" . mysqli_error($conn);
}

echo '<script type="text/javascript">';
echo 'myFn();';
echo '</script>';

?>