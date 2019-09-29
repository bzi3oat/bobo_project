<?php
session_start();
include("connect.php");
include("swal.php");

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");

mysqli_query($conn, "INSERT INTO borrow(b_amount, b_date, member_id, stuff_id, loc_id) VALUES
								(
								'$_GET[amount]',
								'$date',
								'$_SESSION[member_id]',
								'$_GET[stuff_id]',
								'$_GET[loc_id]'
                                )") or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));

$deQuery = mysqli_query($conn, 'SELECT * FROM warehouse where stuff_id = "' .  $_GET['stuff_id'] . '"');
$old_amount = mysqli_fetch_array($deQuery)['stuff_amount'];
$newAmount =  $old_amount - $_GET['amount'];

$sqlupdatewarehouse = "UPDATE warehouse 
SET stuff_amount = '$newAmount'
WHERE stuff_id = '$_GET[stuff_id]'";
if (!mysqli_query($conn, $sqlupdatewarehouse)) {
echo "Error: " . $sqlupdatewarehouse . "<br>" . mysqli_error($conn);
}

?>

<script type="text/javascript">
    swal("บันทึกข้อมูลเสร็จสิ้น", "", "success")
    setTimeout(function() {
        window.location.href = "withdraw_history.php";
    }, 2000); 
</script>


<?php
mysqli_close($conn);
?>