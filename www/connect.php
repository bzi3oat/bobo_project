
<?php
$host = "db";
$username = "root";
$password = "root";
$database = "electricity";

$conn = mysqli_connect($host, $username, $password, $database);
mysqli_set_charset($conn, 'utf8');

?>