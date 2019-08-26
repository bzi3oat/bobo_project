<?php
include("connect.php");

mysqli_query($conn, "INSERT INTO type_brand(brand_name) VALUES
								(
								'$_POST[brand_name]'
								)") or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));


?>
<script type="text/javascript">
	alert("บันทึกข้อมูลเสร็จสิ้น");
	window.location.href = "admin_electricity_brand2.php";
</script>
<?php

?>
<?php
mysqli_close($conn);
?>