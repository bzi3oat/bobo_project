<?php
include("connect.php");

$sqlwarehouse = "SELECT * FROM warehouse";
$resultwarehouse = $conn->query($sqlwarehouse);
?>