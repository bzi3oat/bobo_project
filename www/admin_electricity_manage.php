<?php
session_start();
include('connect.php');

$locationSQL = "SELECT * FROM location as l inner join village as v on l.village_id = v.village_id inner join type_lamp on l.lamp_id = type_lamp.lamp_id ORDER BY LOC_ID DESC";
if(isset($_GET['villageId'])) {
    $locationSQL = "SELECT * FROM location as l inner join village as v on l.village_id = v.village_id inner join type_lamp on l.lamp_id = type_lamp.lamp_id WHERE v.village_id = ". $_GET['villageId'] . " ORDER BY LOC_ID DESC ";
}
$queryLocation = mysqli_query($conn, $locationSQL);

?>
<?php
include("electricity_show.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: Admin UI</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- materializecss -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">



</head>

<body>

    <?php
    include("admin_sidebar.php");
    include("admin_header.php");
    ?>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>จัดการข้อมูลเสาไฟฟ้าส่องสว่าง <span> </span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="card">

                <div class="row">
                    <div class="form-group">
                        <h6> </h6>

                        <select class="form-control" required onchange="location = this.value">
                            <option value="admin_electricity_manage.php" disabled
                                <?php echo isset($_GET['villageId']) ? "" : "selected"; ?>>เลือกหมู่บ้าน</option>
                            <option value="admin_electricity_manage.php?villageId=1"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 1 ? "selected" : ""; ?>>
                                หมู่ 1 บ้านตองกาย</option>
                            <option value="admin_electricity_manage.php?villageId=2"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 2 ? "selected" : ""; ?>>
                                หมู่ 2 บ้านฟ่อน</option>
                            <option value="admin_electricity_manage.php?villageId=3"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 3 ? "selected" : ""; ?>>
                                หมู่ 3 บ้านไร่-กองขิง</option>
                            <option value="admin_electricity_manage.php?villageId=4"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 4 ? "selected" : ""; ?>>
                                หมู่ 4 บ้านต้นเกว๋น</option>
                            <option value="admin_electricity_manage.php?villageId=5"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 5 ? "selected" : ""; ?>>
                                หมู่ 5 บ้านหนองควาย</option>
                            <option value="admin_electricity_manage.php?villageId=6"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 6 ? "selected" : ""; ?>>
                                หมู่ 6 บ้านร้อยจันทร์</option>
                            <option value="admin_electricity_manage.php?villageId=7"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 7 ? "selected" : ""; ?>>
                                หมู่ 7 บ้านเหมืองกุง</option>
                            <option value="admin_electricity_manage.php?villageId=8"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 8 ? "selected" : ""; ?>>
                                หมู่ 8 บ้านขุนเส</option>
                            <option value="admin_electricity_manage.php?villageId=9"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 9 ? "selected" : ""; ?>>
                                หมู่ 9 บ้านสันทราย</option>
                            <option value="admin_electricity_manage.php?villageId=10"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 10 ? "selected" : ""; ?>>
                                หมู่ 10 บ้านนาบุก</option>
                            <option value="admin_electricity_manage.php?villageId=11"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 11 ? "selected" : ""; ?>>
                                หมู่ 11 บ้านสันป่าสัก</option>
                            <option value="admin_electricity_manage.php?villageId=12"
                                <?php echo isset($_GET['villageId']) && $_GET['villageId'] == 12 ? "selected" : ""; ?>>
                                หมู่ 12 บ้านตองกายเหนือ</option>
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <a href="admin_electricity_add.php" class="btn btn-primary btn-flat m-b-15 m-l-1 ti-plus">
                            เพิ่มตำแหน่งเสาไฟฟ้าส่องสว่าง </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <div>
                                        <th>LOC_ID</th>
                                    </div>
                                    <div>
                                        <th>ชนิดหลอดไฟ</th>
                                    </div>
                                    <div>
                                        <th>บันทึกการซ่อมบำรุง</th>
                                    </div>
                                    <!-- <div> <th>วันที่แจ้ง</th></div> -->
                                    <div>
                                        <th>วันที่แก้ไข</th>
                                    </div>
                                    <!-- <div>
                                        <th>หมู่บ้าน</th>
                                    </div> -->
                                    <div>
                                        <th>สถานะ</th>
                                    </div>
                                    <div>
                                        <th>ซ่อมบำรุง</th>
                                    </div>
                                    <div>
                                        <th>แก้ไข</th>
                                    </div>
                                    <div>
                                        <th>เบิกวัสดุ</th>
                                    </div>
                                    <div>
                                        <th>เปลี่ยนสถานะ</th>
                                    </div>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = $queryLocation->fetch_assoc()) {
                                        $timediff = time() - strtotime($row['LOC_DATE']);
                                        echo "<tr>";
                                        echo "<td>".$row['LOC_ID']."</td>";
                                        echo "<td>".$row['lamp_name']."</td>";
                                        echo "<td>".($row['LOC_DETAIL'] == null ? "ไม่มี" : $row['LOC_DETAIL'])."</td>";
                                        echo "<td>".$row['LOC_DATE']."</td>";
                                        // echo "<td>".$row['village_name']."</td>";
                                     
                                        echo '<td>' . '<div style="color:'.($row['status'] == 0 ? "red" : "green").'">สถานะ : ' . ($row['status'] == 0 ? "ไม่ใช้งาน" : "ใช้งานปกติ") . '</div>' . '</td>';
                                        echo '<td>'. ($timediff >= 7884000 ? '<p class="text-danger"><i class="ti-pulse"></i></p>' : '<p>ปกติ</p>') .'</td>';
                                        echo '<td>' . '<a href="admin_edit_electricity.php?locId='.$row['LOC_ID'].'">
                                                            <button class="btn btn-warning m-b-5 m-l-1" type="button">
                                                                <i class = ti-pencil></i>
                                                            </button>   
                                                        </a>' . '</td>';
                                        echo '<td class="text-center">' .   '
                                                        <a href="electricity_borrow.php?loc_id=' . $row['LOC_ID'] .'" class="btn btn-info m-b-5 m-l-1">
                                                            <i class = ti-book></i>
                                                        </a>' . '</td>';
                                        echo '<td class="text-center">' .   '<a href="#" onClick="onChaneStatus(' . '\''.$row['LOC_ID'] .'\''. ','.($row['status'] == 0 ? 1 : 0) .')">
                                                            <button class="btn btn-danger m-b-5" type="button">
                                                                <i class = ti-trash></i>
                                                            </button>   
                                                        </a>' . '</td>';
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer">
                    <!-- <p>  - <a href="#">example.com</a></p> -->
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>

    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- bootstrap -->

    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>

    <script src="assets/js/lib/morris-chart/raphael-min.js"></script>
    <script src="assets/js/lib/morris-chart/morris.js"></script>
    <script src="assets/js/lib/morris-chart/morris-init.js"></script>

    <!--  flot-chart js -->
    <script src="assets/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="assets/js/lib/flot-chart/jquery.flot.resize.js"></script>
    <script src="assets/js/lib/flot-chart/flot-chart-init.js"></script>
    <!-- // flot-chart js -->


    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.algeria.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.argentina.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.brazil.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.france.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.germany.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.greece.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.iran.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.iraq.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.russia.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.tunisia.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.europe.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.usa.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/vector.init.js"></script>

    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- scripit init-->


    <script type="text/javascript">
        onChaneStatus = (loc_id, status) => {
            swal({
                    title: "คุณแน่ใจหรือไม่ ?",
                    text: "กดยืนยันเพื่อเปลี่ยนสถานะเสาไฟ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href =
                            "http://localhost:8000/backend/change_status_electicity.php?loc_id=" +
                            loc_id + "&status=" + status
                    }
                });
        }
    </script>
</body>

</html>