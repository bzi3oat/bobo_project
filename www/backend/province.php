<?php
    include "connect.php";
    $fetchProvince="SELECT * FROM province";
    $results = $conn->query($fetchProvince);

    $province = array();
    while($row = mysqli_fetch_assoc($results)) {
        $province[] = $row;
    }

    echo json_encode($province);
?>
