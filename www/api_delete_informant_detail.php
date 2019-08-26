<?php
    session_start();
?>
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
                text: 'จะกลับไปสู่หน้าเดิมอีก 2 วินาที.',
                icon: 'success',
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false
            })
            .then(() => {
                window.location.href = "http://localhost:8000/informant_datail.php";
            })
    }
</script>

<?php
include("connect.php");

$declaration_id = "$_GET[declaration_id]";

// user
$sql = "UPDATE declaration SET repairing_status=$_GET[status] WHERE declaration_id=$_GET[id]";
$sql2 = "UPDATE declaration_progress SET mem_id = $_SESSION[member_id], dp_status = $_GET[status], updated_at = '$now' WHERE d_id = $_GET[id] AND mem_typeid = $_SESSION[member_typeid]";

if (!mysqli_query($conn, $sqldeleteinformant)) {
    echo "Error: " . $sqldeleteinformant . "<br>" . mysqli_error($conn);
}

echo '<script type="text/javascript">';
echo 'myFn();';
echo '</script>';

?>