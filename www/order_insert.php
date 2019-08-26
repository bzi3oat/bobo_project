<?php
session_start();
include("connect.php");
include("swal.php");

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");

mysqli_query($conn, "INSERT INTO orders(order_amount, order_price, stuff_id, member_id) VALUES 
								(
								'$_GET[amount]',
                                '$_GET[price]',
                                '$_GET[stuff_id]',
								'$_SESSION[member_id]'
								) ") or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));

$id = mysqli_insert_id($conn);
?>

<?php
mysqli_close($conn);
?>

<script type="text/javascript">
    const id = <?php echo $id; ?>;
    swal("เพิ่มใบสั่งซื้อสำเร็จ", "ระบบกำลังพากลับไปยังหน้าออกใบสั่งซื้อ", "success")
    setTimeout(function() {
        window.location.href = `order_print.php?order_id=${id}`;
    }, 2000); 
</script>
