<?php
    include "../connect.php";
    $fetchDistrict="SELECT * FROM district WHERE Pid ='".$_POST["PId"]."'";
    $results = $conn->query($fetchDistrict);

    $district = array();
    while($row = mysqli_fetch_assoc($results)) {
        $district[] = $row;
    }

    echo json_encode($district);
?>
