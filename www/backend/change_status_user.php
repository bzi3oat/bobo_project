<?php
include("../connect.php");
include("../swal.php");

$member_id = "$_GET[member]";
$status = "$_GET[status]";

$updatestatus = "UPDATE member 
                        SET member_status = '$status'
                        WHERE member_id = $member_id";

if (!mysqli_query($conn, $updatestatus)) {
    echo "Error: " . $updatestatus . "<br>" . mysqli_error($conn);
}

?>

<script type="text/javascript">
    swal("บันทึกข้อมูลเสร็จสิ้น", "", "success")
    setTimeout(function() {
        window.location.href = "../admin_manage_user.php";
    }, 2000); 
</script>

