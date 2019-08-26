<?php
session_start();
include('connect.php');
$lampSQL = "SELECT * FROM type_lamp";
$queryLamp = mysqli_query($conn, $lampSQL);

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
                                <h1>จัดการประเภทหลอดไฟ<span> </span></h1>
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
                            <a href="admin_electricity_lamp2.php">
                                <button class="btn btn-primary m-b-10 m-l-5" type="button"> เพิ่มประเภทหลอดไฟ </button>
                            </a>
                            
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <div>
                                        <th>ลำดับ</th>
                                    </div>
                                    <div>
                                        <th>ประเภทหลอดไฟ</th>
                                    </div>
                                    <!-- <div>
                                        <th>แก้ไข</th>
                                    </div> -->
                                    <div>
                                        <th>ลบ</th>
                                    </div>
                           

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = $queryLamp->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row['lamp_id']."</td>";
                                        echo "<td>".$row['lamp_name']."</td>";
                                        // echo '<td>  <a href="update_lamp.php?lamp_id=' . $row['lamp_id'] . '">
                                        //                 <button class="btn btn-warning m-b-5 m-l-1" type="button">
                                        //                     <i class="ti-pencil"></i> 
                                        //                 </button>
                                        //             </a></td>';
                                        echo '<td>  <a href="#" onClick="onDelete(' . $row['lamp_id'] . ')">
                                                        <button class="btn btn-danger m-b-5 m-l-1" type="button">
                                                        <i class="ti-trash"></i> 
                                                        </button> 
                                                    </a></td>';
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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


    <script type="text/javascript">
        onDelete = (id) => {
            swal({
                    title: "คุณแน่ใจหรือไม่ ?",
                    text: "หากตกลงแล้วจะไม่สามารถกู้คืนกลับมาได้",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "http://localhost:8000/api_delete_lamp.php?lamp_id=" + id
                    }
                });
        }
    </script>

</body>

</html>