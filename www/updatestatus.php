<?php
    session_start();
    include("connect.php");
    include("swal.php");

    $now = date("Y-m-d H:i:s");
    
    $sql = "UPDATE declaration SET repairing_status=$_GET[status] WHERE declaration_id=$_GET[id]";
    $sql2 = "UPDATE declaration_progress SET mem_id = $_SESSION[member_id], dp_status = $_GET[status], updated_at = '$now' WHERE d_id = $_GET[id] AND mem_typeid = $_SESSION[member_typeid]";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
?>
<script type="text/javascript">
    swal("บันทึกข้อมูลเสร็จสิ้น", "", "success")
    setTimeout(function() {
        window.location.href = "informant_datail.php";
    }, 2000); 
</script>

<?php
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
?>