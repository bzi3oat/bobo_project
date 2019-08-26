<?php
session_start();
include('connect.php');
header('Content-type: text/html; charset=utf-8');

$deSQL = "SELECT * FROM declaration ";
$updatestatus;

if (isset($_SESSION["member_typeid"])) {
    if ($_SESSION["member_typeid"] == 1) {
        $deSQL = $deSQL . "inner join declaration_progress on declaration.declaration_id = declaration_progress.d_id WHERE  declaration_progress.d_id = declaration.declaration_id and declaration_progress.mem_typeid = 1 and declaration_progress.mem_id is null";
        $updatestatus = 0;
    }
    if ($_SESSION["member_typeid"] == 2) {
        $deSQL = $deSQL . "inner join declaration_progress on declaration.declaration_id = declaration_progress.d_id
        where (declaration_progress.mem_typeid = 1 and (declaration_progress.mem_id is not null and declaration_progress.dp_status = 0)) AND declaration.declaration_id in (select declaration_id from declaration_progress where  declaration_progress.d_id = declaration.declaration_id and declaration_progress.mem_typeid = 2 and declaration_progress.mem_id is null)";
        $updatestatus = 1;
    }
    if ($_SESSION["member_typeid"] == 3) {
        $deSQL = $deSQL . "inner join declaration_progress on declaration.declaration_id = declaration_progress.d_id
        where (declaration_progress.mem_typeid = 1 and (declaration_progress.mem_id is not null and declaration_progress.dp_status = 0)) AND declaration.declaration_id in (select declaration_id from declaration_progress where declaration_progress.mem_typeid = 2 and declaration_progress.mem_id is not null and declaration_progress.dp_status = 1)  AND declaration.declaration_id in (select declaration_id from declaration_progress where declaration_progress.mem_typeid = 3 and declaration_progress.mem_id is null and declaration_progress.d_id = declaration.declaration_id)";
        $updatestatus = 2;
    }
}

mysqli_set_charset($conn, 'utf8');
$deQuery = mysqli_query($conn, $deSQL);
?>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


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
                                <h1>ข้อมูลการแจ้งซ่อม <span> </span></h1>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- Tracking status -->
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <button class="btn btn-#ffa726 orange lighten-1 btn-large" type="submit">
                            <span class="ti-search"></span>
                        </button> &nbsp;&nbsp;&nbsp;
                        <input class="form-control " id="myInput" type="text" placeholder="กรุณาระบุข้อมูลผู้แจ้ง..">
                        <div class="row">
                            <div class="form-group">
                                <h6> </h6>

                            </div>
                            <table class="table">
                                <!-- Search form -->

                                <thead>
                                    <tr>
                                        <div>
                                            <th>ID</th>
                                        </div>

                                        <div>
                                            <th>ชื่อผู้แจ้ง</th>
                                        </div>
                                        <div>
                                            <th>นามสกุล</th>
                                        </div>
                                        <!-- <div> <th>เลขบัตรประชาชน</th></div> -->
                                        <div>
                                            <th>เบอร์โทร</th>
                                        </div>
                                        <div>
                                            <th>สถานะ</th>
                                        </div>
                                        <!-- <div> <th>วันที่แจ้ง</th></div> -->
                                        <div>
                                            <th>รายละเอียด</th>
                                        </div>
                                        <div>
                                            <th>อนุมัติ / ปฎิเสธ</th>
                                        </div>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                    <?php
                                    while ($res = mysqli_fetch_array($deQuery)) {
                                        ?>

                                        <tr>
                                            <?php
                                            $status = "";
                                            $declarationId = $res['declaration_id'];
                                            if ($res['repairing_status'] == "0") {
                                                $status = '<span class="badge badge-warning">รอการตรวจสอบ</span>';
                                            } else if ($res['repairing_status'] == "1") {
                                                $status = '<span class="badge badge-info">ดำเนินการซ่อม</span>';
                                            } else if ($res['repairing_status'] == "2") {
                                                $status = '<span class="badge badge-success">เสร็จสิ้น</span>';
                                            } else if ($res['repairing_status'] == "3") {
                                                $status = '<span class="badge badge-danger">ปฏิเสธ</span>';
                                            }
                                            echo '<td>' . $declarationId . "</td>";
                                            echo '<td>' . $res['Informate_fname'] . "</td>";
                                            echo '<td>' . $res['Informate_lname'] . "</td>";
                                            // echo '<td>'.$res['informant_id_card']."</td>";
                                            echo '<td>' . $res['informant_tel'] . "</td>";

                                            // echo '<td>'.$res['declaration_date']."</td>";
                                            echo '<td>' . $status . '</td>';
                                            echo '<td>' .   '<a href="admin_detail.php?declarationId=' . $declarationId . '">
                                                          <button class="btn btn-primary m-b-5 m-l-1" type="button">
                                                            <i class="ti-search"></i> 
                                                          </button>    
                                                        </a> ' . "</td>";
                                            echo    '<td>   <a href="updatestatus.php?status=' . $updatestatus . '&id=' . $res['declaration_id'] . '"> 
                                                            <button class="btn btn-success m-b-5 m-l-1" type="button">
                                                                <i class="ti-check"></i> 
                                                            </button>
                                                        </a> &nbsp;&nbsp;
                                                        
                                                        <a href="#" onClick="onDelete(' . '\'' . $res['declaration_id'] . '\'' . ')">
                                                        <button class="btn btn-danger m-b-5 m-l-1" type="button">
                                                            <i class="ti-trash"></i> 
                                                        </button> 
                                                    </a>
                                                </td>';
                                        }
                                        ?>
                                    </tr>

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
                        window.location.href = "http://localhost/bobo_project/updatestatus.php?status=3&id=" + id
                    }
                });
        }
    </script>


</body>

</html>