<?php
     include "../connect.php";
     $fetchLamp="SELECT * FROM location WHERE village_id ='".$_POST["villageID"]."'";
     $results = $conn->query($fetchLamp);
 
     $lamp = array();
     while($row = mysqli_fetch_assoc($results)) {
         $lamp[] = $row;
     }
 
     echo json_encode($lamp);
?>