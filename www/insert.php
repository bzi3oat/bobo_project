<?php
include("connect.php");

$link_address1 = 'visitor_index.php';
// เอาไว้ดูว่าข้อมูลส่งไปป่าว

// echo    $_POST['Informate_fname'],
//         $_POST['Informate_lname'],
//         $_POST['informant_id_card'],
//         $_POST['informant_tel'],
//         $_POST['repairing_detail'];



?>

<?php

//   ดึงข้อมูลจากหน้า index มาเก็บลงฐานข้อมูล
mysqli_query($conn, "INSERT INTO declaration(`Informate_fname`, `Informate_lname`, `informant_id_card`, `informant_tel`, `repairing_detail`, `declaration_date`, `repairing_status`) VALUES(
    '',
    '$_POST[Informate_fname]',
    '$_POST[Informate_lname]',
    '$_POST[informant_id_card]',
    '$_POST[informant_tel]',
    '$_POST[repairing_detail]',
    CURRENT_TIMESTAMP,
    '0')") or die("Error insert_case เกิดจาก : " . mysqli_error($conn));

$id = mysqli_insert_id($conn);

for($i = 0; $i < 3; $i++) {
    mysqli_query($conn, "INSERT INTO declaration_progress(`mem_id`, `mem_typeid`, `dp_status`, `d_id`, `updated_at`) VALUES(
        null,
        '0',
        $id,
        CURRENT_TIMESTAMP") or die("Error insert_case เกิดจาก : " . mysqli_error($conn));
}

?>

<script type="text/javascript">
    alert("บันทึกข้อมูลเสร็จสิ้น");
    window.location.href = "visitor_tracking.php";
</script>