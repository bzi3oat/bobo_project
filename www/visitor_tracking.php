<?php
include("connect.php");

$select = "SELECT * FROM declaration order by declaration_id desc ";

$result = $conn->query($select);
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


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>



    <?php
    include("visitor_sidebar.php");

    ?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>ติดตามสถานะการแจ้งซ่อม<span> </span></h1><br>
                            </div>

                            <!-- หมายเลขสถานะการติดตาม -->
                            <div class="input-group input-group-default">
                                <button class="btn btn-#ffa726 orange lighten-1 btn-large" type="submit">
                                    <span class="input-group-btn"><i class="ti-search"></i></span>
                                </button> &nbsp;&nbsp;&nbsp;
                                <input class="form-control " id="myInput" type="text" placeholder="กรุณาระบุข้อมูลผู้แจ้ง..">


                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <!-- ระบุตำแหน่งเสาไฟฟ้าขัดข้อง -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h6>สถานะการดำเนินงาน</h6>
                            </div>

                            <!-- ข้อมูลสถานะการดำเนินงาน -->
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tracking ID</th>
                                                <th>ชื่อผู้แจ้ง</th>
                                                <th>นามสกุล</th>
                                                <th>เบอร์โทร</th>
                                                <th>รายละเอียด</th>
                                                <th>วันที่แจ้ง</th>
                                             
                                                    <th>PDF</th>
                                                
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>

                                        <tbody id="myTable">
                                            <?php
                                            while ($res = mysqli_fetch_array($result)) {
                                                $db = $res['declaration_date'];
                                                $timestamp = strtotime($db);
                                                ?>

                                                <tr>
                                                    <?php
                                                    $status = "";
                                                    if ($res['repairing_status'] == 0) {
                                                        $status = '<span class="badge badge-warning">รอการตรวจสอบ</span>';
                                                    } else if ($res['repairing_status'] == 1) {
                                                        $status = '<span class="badge badge-info">  ดำเนินการซ่อม</span>';
                                                    } else if ($res['repairing_status'] == 2) {
                                                        $status = '<span class="badge badge-success">เสร็จสิ้น</span>';
                                                    } else if ($res['repairing_status'] == 3) {
                                                        $status = '<span class="badge badge-danger">ปฏิเสธ</span>';
                                                    }
                                                    echo "<td>" . $res['declaration_id'] . "</td>";
                                                    echo "<td>" . $res['Informate_fname'] . "</td>";
                                                    echo "<td>" . $res['Informate_lname'] . "</td>";
                                                    echo "<td>" . $res['informant_tel'] . "</td>";
                                                    echo "<td>" . $res['repairing_detail'] . "</td>";
                                                    echo "<td>";
                                                    echo date("Y-m-d เวลา H:i น.", $timestamp);
                                                    echo "</td>";
                                                    echo '<td>' .   '<a href="admin_report_complete2.php?decId='.$res['declaration_id'].'">
                                                            <button class="btn btn-warning m-b-5 m-l-1" type="button">
                                                            <i class="ti-printer"></i>
                                                            </button>   
                                                        </a>' . '</td>';
                                                    
                                                    echo '<td>' . $status . '</td>';
                                                    echo "</tr>";
                                                }
                                                ?>
                                        </tbody>

                                    </table>

                                    <!-- <div class="jsgrid-pager" >
                                        Pages:
                                            <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button">
                                                <a href="javascript:void(0);">First</a>
                                            </span> 
                                            <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button">
                                                <a href="javascript:void(0);">Prev</a>
                                            </span> 
                                            <span class="jsgrid-pager-page jsgrid-pager-current-page">1</span>
                                            <span class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span>
                                            <span class="jsgrid-pager-page"><a href="javascript:void(0);">3</a></span>
                                            <span class="jsgrid-pager-page"><a href="javascript:void(0);">4</a></span>
                                            <span class="jsgrid-pager-page"><a href="javascript:void(0);">5</a></span>
                                            <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">...</a></span> 
                                            <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span> 
                                            <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span> 
                                            &nbsp;&nbsp; 1 of 7 
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="footer">
                        <!-- <p>2019 © copyright - <a href="#">B. </a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

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
    <!-- scripit init-->

</body>

</html>