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
                title: 'สำเร็จ!',
                text: 'กำลังจะกลับไปหน้าจัดการข้อมูลผู้ใช้ในอีก 2 วินาที.',
                icon: 'success',
                timer: 1000,
                showCancelButton: false,
                showConfirmButton: false
            })
            .then(() => {
                window.location.href = "http://localhost:8080/bobo_project/admin_manage_user.php";
            })
    }
</script>

<?php
include("connect.php");

$member_id = "$_GET[member_id]";

// user
$sqldeletemember = "UPDATE member SET member_status = 0 WHERE member_id = $member_id";

if (!mysqli_query($conn, $sqldeletemember)) {
    echo "Error: " . $sqldeletemember . "<br>" . mysqli_error($conn);
}

echo '<script type="text/javascript">';
echo 'myFn();';
echo '</script>';

?>