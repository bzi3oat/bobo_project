<?php
	include("connect.php");
	include("swal.php");

	
	$link_address1 = 'admin_profile.php';

	date_default_timezone_set('Asia/Bangkok');
	$datenow =date("Y-m-d");
	//echo $datenow;

	
	/*
	if($member_age>1){
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Birthday Invalid !!');
    window.location.href='register2.php';
    </script>");
	} 
/*
	if(isset($_POST['action'])){
		$hobby = json_encode($_POST['hobby']);
	 }
	*/




/*
	echo "<br>password : ". $_POST['Password'];
	echo "<br>firstname : ". $_POST['member_fname'];
	echo "<br>surname : ". $_POST['member_lname'];
	echo "<br>address : ". $_POST['member_address'];
	echo "<br>phone : ". $_POST['member_tel'];
	

	/*
	foreach (json_decode($hobby) as $v) {
		echo "Hobby : ".$v."<br />";
	 }
	*/
$file_name = null;

if(isset($_FILES['member_pic'])) {
	$file_tmp = $_FILES['member_pic']['tmp_name'];
	$file_name = date("YmdHis").'.jpg';
	move_uploaded_file($file_tmp,"images/".$file_name);
}

$member_id = $_POST['member_id'];
$member_email = $_POST['member_email'];
$Password = $_POST['Password'];
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
											`member_fname` = '$member_fname',
											`member_lname` = '$member_lname', 
											`member_gender` = '$member_gender', 
											`member_id_card` = '$member_id_card', 
											`member_tel` = '$member_tel',
											`member_pic` = '$file_name'
											
											WHERE `member`.`member_id` = '$member_id'")or die ("Error insert_cate เกิดจาก : ".mysqli_error($conn));
                                
											if ($_POST['Password']==$_POST['conPassword']) 
											{
												
											} 
											else 
											{
												echo "Your password don't match!";
											}
											
											
													
                                
	/*echo '<script>window.location.href = "manage.php";</script>';*/
	


?>


<?php 
	mysqli_close($conn);
?>


<script type="text/javascript">
    swal("บันทึกข้อมูลเสร็จสิ้น", "", "success")
    setTimeout(function() {
        window.location.href = "admin_profile.php";
    }, 3000); 
</script>