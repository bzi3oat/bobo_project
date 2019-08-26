<?php
include("connect.php");

$sqlwarehouse = "SELECT * FROM member";
$resultwarehouse = $conn->query($sqlmember);
?>
<?php
mysqli_close($conn);
?>