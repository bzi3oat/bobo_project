<?php

    include("connect.php");

    $select = "SELECT * FROM declaration where repairing_status = 2 order by declaration_id desc ";

    $result = $conn->query($select);

?>