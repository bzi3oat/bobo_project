<?php
	include("connect.php");
	include("swal.php");
	
	$link_address1 = 'admin_profile.php';

	date_default_timezone_set('Asia/Bangkok');
	$datenow =date("Y-m-d");

$file_name = null;

if(isset($_FILES['member_pic'])) {
	$file_tmp = $_FILES['member_pic']['tmp_name'];
	$file_name = date("YmdHis").'.jpg';
	move_uploaded_file($file_tmp,"images/".$file_name);
}

$member_id = $_POST['member_id'];
$member_email = $_POST['member_email'];
$Password = $_POST['Password'];
$conPassword = $_POST['conPassword'];
$member_fname = $_POST['member_fname'];
$member_lname = $_POST['member_lname'];
// $member_address = $_POST['member_address'];
$member_gender = $_POST['member_gender'];
$member_birthdate = '';
$member_age = '';
$member_id_card = $_POST['member_id_card'];
$member_tel = $_POST['member_tel'];
$member_typeid = '';

	mysqli_query($conn,"UPDATE `member` 
											SET	`member_email` = '$member_email', 
											`Password` = '$Password', 
											`conPassword` = '$conPassword', 
											`member_fname` = '$member_fname',
											`member_lname` = '$member_lname', 
											`member_gender` = '$member_gender', 
											`member_id_card` = '$member_id_card', 
											`member_tel` = '$member_tel',
											`member_pic` = '$file_name'
											
											WHERE `member`.`member_id` = '$member_id'")or die ("Error insert_cate เกิดจาก : ".mysqli_error($conn));
								
								$id = mysqli_insert_id($conn);

								$hn = $_POST['house_number'];
								$s = $_POST['soi'];
								$m = $_POST['moo'];
								$r = $_POST['road'];
								$sdti =$_POST['subdistrict_id'];
								$dti =$_POST['district_id'];
								$pi = $_POST['province_id'];
								$pc = $_POST['postal_code'];
mysqli_query($conn, "UPDATE `member_address` 
SET	`house_number` = '$hn', 
`soi` = '$s', 
`moo` = '$m',
`road` = '$r', 
`sub_district` = '$sdti', 
`district` = '$dti', 
`province` = '$pi',
`postal_code` = '$pc'

WHERE `member_id` = '$member_id'") or die("Error insert_cate เกิดจาก : " . mysqli_error($conn));


											if ($_POST['Password']==$_POST['conPassword']) 
											{
												?>
													<script type="text/javascript">
														swal("แก้ไขข้อมูลผู้ใช้เสร็จสิ้น", "กำลังพากลับไปยังหน้าจัดการข้อมูลผู้ใช้ระบบ", "success")
														setTimeout(function() {
															window.location.href = "admin_manage_user.php";
														}, 2000); 
													</script>
											<?php		
											} 
											else 
											{
												?>
												<script type="text/javascript">
														swal("เกิดข้อผิดพลาด", "กรุณากรอกรหัสผ่านทั้งสองช่องให้ตรงกัน", "error")
														setTimeout(function() {
															window.location.href = "admin_manage_user.php?";
														}, 2000); 
													</script>
												
												<?php	
											}
									
														
                                
	/*echo '<script>window.location.href = "manage.php";</script>';*/
	
?>
<?php 
	mysqli_close($conn);
?>
