<?php

    include("connect.php");

    $select = "SELECT * FROM 'location' order by LOC_ID desc ";

    $result = $conn->query($select);

?>