<?php
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"electricity");
mysqli_set_charset($link,'utf8');
$province=$_GET["province"];



if($province!="")
{
    $res=mysqli_query($link,"SELECT * FROM district WHERE Pid=$province");
    echo "<select id='districtdd' onChange='change_district'>";
    while ($row=mysqli_fetch_array($res))
    {
    echo "<option>"; echo $row["Dname_th"]; echo "</option>";
    }
    echo "</select>";
}

?>
