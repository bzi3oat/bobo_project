<?php
include("informant_show.php");
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


    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="index.html">
                            <!-- <img src="assets/images/logo.png" alt="" /> --><span>Guest</span></a></div>
                    <li class="label">เมนูหลัก</li>
                    <li><a href="index.html"><i class="ti-alert"></i> แจ้งเหตุขัดข้อง </a></li>
                    <li><a href="tracking.php"><i class="ti-search"></i> ติดตามสถานะการแจ้งซ่อม</a></li>

                    <li class="label">ช่วยเหลือ</li>
                    <li><a href="app-email.html"><i class="ti-email"></i> ติดต่อเจ้าหน้าที่</a></li>
                    <li><a href="app-email.html"><i class="ti-help"></i> วิธีใช้</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- /# sidebar -->


    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <!-- HEADER บนขวา -->
                    <div class="float-right">

                        <div class="header-icon">
                            <i class=" "><a href="login/login.php"> &nbsp; </a></i>
                            <div class="drop-down dropdown-menu dropdown-menu-right">

                                <!-- HEADER บนขวา เมนูย่อย Dropdown -->
                                <div class="dropdown-content-heading">
                                    <span class="text-left">Recent Notifications</span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <!-- Container 0 -->
                <!-- Welcome Dashboard -->
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>ติดตามสถานะการแจ้งซ่อม <span> </span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>

                <div class="col-lg-12">

                    <div class="card-title pr">

                        <div class="card-body">
                            <div class="basic-form">
                                <form>

                                    <div class="form-group">

                                        <div class="input-group input-group-default">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="submit"><i class="ti-search"></i></button></span>
                                            <input type="text" placeholder="หมายเลขสถานะการติดตาม . . ." name=" " class="form-control">
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <!-- Tracking status -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h6>สถานะการดำเนินงาน</h6>
                </div>
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
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($res = mysqli_fetch_array($result)) {
                                    $db = $res['declaration_date'];
                                    $timestamp = strtotime($db);
                                    ?>
                                    <tr>
                                        <?php
                                        $status = "";
                                        if ($res['repairing_status'] == 0) {
                                            $status = '<span class="badge badge-warning">รอการอนุมัติ</span>';
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
                                        echo date("Y-m-d", $timestamp);
                                        echo "</td>";
                                        echo '<td>' . $status . '</td>';
                                        echo "</tr>";
                                    }
                                    ?>
                                    <!--   
                                                        <tr>
                                                            <td>
                                                                <div class="round-img">
                                                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                                                </div>
                                                            </td>
                                                            <td>Lew Shawon</td>
                                                            <td><span>Asus-565</span></td>
                                                            <td><span>456 pcs</span></td>
                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="round-img">
                                                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                                                </div>
                                                            </td>
                                                            <td>lew Shawon</td>
                                                            <td><span>Dell-985</span></td>
                                                            <td><span>456 pcs</span></td>
                                                            <td><span class="badge badge-success">Done</span></td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>
                                                                <div class="round-img">
                                                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                                                </div>
                                                            </td>
                                                            <td>Lew Shawon</td>
                                                            <td><span>Asus-565</span></td>
                                                            <td><span>456 pcs</span></td>
                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="round-img">
                                                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                                                </div>
                                                            </td>
                                                            <td>lew Shawon</td>
                                                            <td><span>Dell-985</span></td>
                                                            <td><span>456 pcs</span></td>
                                                            <td><span class="badge badge-success">Done</span></td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>
                                                                <div class="round-img">
                                                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                                                </div>
                                                            </td>
                                                            <td>Lew Shawon</td>
                                                            <td><span>Asus-565</span></td>
                                                            <td><span>456 pcs</span></td>
                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                        </tr>
                                                        -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer">
                    <p>  - <a href="#">B. </a></p>
                </div>
            </div>
        </div>
    </div>



    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <!--
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-two">
                                        <div class="stat-content">
                                            <div class="stat-text">Today Expenses </div>
                                            <div class="stat-digit"> <i class="fa fa-usd"></i>8500</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-two">
                                        <div class="stat-content">
                                            <div class="stat-text">Income Detail</div>
                                            <div class="stat-digit"> <i class="fa fa-usd"></i>7800</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-two">
                                        <div class="stat-content">
                                            <div class="stat-text">Task Completed</div>
                                            <div class="stat-digit"> <i class="fa fa-usd"></i> 500</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-two">
                                        <div class="stat-content">
                                            <div class="stat-text">Task Completed</div>
                                            <div class="stat-digit"> <i class="fa fa-usd"></i>650</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div> 
                            -->
            <!-- /# card -->
        </div>

        <!-- /# column -->
        </div>

        <!-- /# row -->













    </section>
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
    <!-- scripit init-->

</body>

</html>