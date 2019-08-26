<?php
    include "../connect.php";
    $fetchSubDistrict="SELECT * FROM subdistrict WHERE Did ='".$_POST["DId"]."'";
    $results = $conn->query($fetchSubDistrict);

    $Subdistrict = array();
    while($row = mysqli_fetch_assoc($results)) {
        $Subdistrict[] = $row;
    }

    echo json_encode($Subdistrict);
?>
