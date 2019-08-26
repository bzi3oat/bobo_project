<?php
include("connect.php");
include("swal.php");

date_default_timezone_set('Asia/Bangkok');
$datenow = date("Y-m-d");
//echo $datenow;
$day = round(abs(strtotime("$_POST[member_birthdate]") - strtotime("$datenow")) / 60 / 60 / 24);
$member_age = round($day / 365);
$timeStamp = date("Y-m-d H:i:s");

$null = null;

mysqli_query($conn, "INSERT INTO member(`member_email`, `Password`, `conPassword`, `member_fname`, `member_lname`, `member_gender`, `member_birthdate`, `member_age`, `member_id_card`, `member_tel`, `member_typeid`, `member_pic`, `member_status`) VALUES
								(
								'$_POST[member_email]',
								'$_POST[Password]',
								'$_POST[conPassword]',
								'$_POST[member_fname]',
								'$_POST[member_lname]',
								'$_POST[member_gender]',
								'$_POST[member_birthdate]',
								'$member_age',
								'$_POST[member_id_card]',
								'$_POST[member_tel]',
								'$_POST[member_typeid]',
								null,
								'1'
								)") or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));

$id = mysqli_insert_id($conn);
mysqli_query($conn, "INSERT INTO member_address(`house_number`, `soi`, `moo`, `road`, `sub_district`, `district`, `province`, `postal_code`, `member_id`) VALUES
								(
								'$_POST[house_number]',
								'$_POST[soi]',
								'$_POST[moo]',
								'$_POST[road]',
								'$_POST[subdistrict_id]',
								'$_POST[district_id]',
								'$_POST[province_id]',
								'$_POST[postal_code]',
								$id
								)") or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));

?>


<script type="text/javascript">
    swal("เพิ่มผู้ใช้เสร็จสิ้น", "กำลังพากลับไปยังหน้าจัดการข้อมูลผู้ใช้ระบบ", "success")
    setTimeout(function() {
        window.location.href = "admin_manage_user.php";
    }, 2000); 
</script>




<?php

?>
<?php
mysqli_close($conn);
?>