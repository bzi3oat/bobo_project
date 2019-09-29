<?ob_start();?>
<?php
session_start();
include('../connect.php');
include('../swal.php');

$strSQL = 	"SELECT * FROM member WHERE member_email = '" . mysqli_real_escape_string($conn, $_POST['txtUsername']) . "' 
				and Password = '" . mysqli_real_escape_string($conn, $_POST['txtPassword']) . "'";
$chkStatus = "SELECT * FROM member WHERE  member_email = '" . $_POST['txtUsername'] . "' AND Password = " . $_POST['txtPassword'] . " AND member_status = 0";
$objQuerychkStatus = mysqli_query($conn, $chkStatus);


	$objQuery = mysqli_query($conn, $strSQL);
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
	if (!$objResult) {
		?>
		<script type="text/javascript">
			swal("รหัสผ่านไม่ถูกต้อง", "", "error")
			setTimeout(function() {
				window.location.href = "login.php";
			}, 2000);
		</script>
	<?php
	} else {
		$_SESSION["member_id"] = $objResult["member_id"];
		$_SESSION["member_typeid"] = $objResult["member_typeid"];
		
		session_write_close();

		if ($objResult["member_typeid"] == 1) {
			header("location:../informant_datail.php");
		} else if ($objResult["member_typeid"] == 2) {
			header("location:../informant_datail.php");
		} else if ($objResult["member_typeid"] == 3) {
			header("location:../informant_datail.php");
		} else if ($objResult["member_typeid"] == 4) {
			header("location:../informant_datail3.php");
		} else {
			header("location:../login.php");
		}
	}

?>