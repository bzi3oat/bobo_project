<?php

    include("connect.php");

    $select = "SELECT * FROM member order by member_id desc ";

    $result = $conn->query($select);

?>