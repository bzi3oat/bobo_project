<?php

include("connect.php");

$select = "SELECT * FROM declaration WHERE declaration_id = '" . $_SESSION['declaration_id'] . ";

    $result = $conn->query($select);

?>
