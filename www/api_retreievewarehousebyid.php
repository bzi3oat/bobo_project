<?php
include("connect.php");

$stuff_id = $_GET['stuff_id'];

$sqlwarehouse = "SELECT * FROM warehouse WHERE stuff_id = $stuff_id";
$resultwarehouse = $conn->query($sqlwarehouse);
?>
<?php
mysqli_close($conn);
?>