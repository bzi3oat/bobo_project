<?php
include("connect.php");

$perpage = 10;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

$sqlwarehouse = "SELECT * FROM warehouse limit {$start} , {$perpage}";
$resultwarehouse = $conn->query($sqlwarehouse);
?>