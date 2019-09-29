<?php
session_start();
include('connect.php');
include('api_retreievewarehouse.php');

$perpage = 10;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

$deSQL = "SELECT * FROM declaration ";
$updatestatus;

if (isset($_SESSION["member_typeid"])) {
    if ($_SESSION["member_typeid"] == 1) {
        $deSQL = $deSQL . "inner join declaration_progress on declaration.declaration_id = declaration_progress.d_id WHERE  declaration_progress.d_id = declaration.declaration_id and declaration_progress.mem_typeid = 1 and declaration_progress.mem_id is null limit {$start} , {$perpage}";
        $updatestatus = 0;
    }
    if ($_SESSION["member_typeid"] == 2) {
        $deSQL = $deSQL . "inner join declaration_progress on declaration.declaration_id = declaration_progress.d_id
        where (declaration_progress.mem_typeid = 1 and (declaration_progress.mem_id is not null and declaration_progress.dp_status = 0)) AND declaration.declaration_id in (select declaration_id from declaration_progress where  declaration_progress.d_id = declaration.declaration_id and declaration_progress.mem_typeid = 2 and declaration_progress.mem_id is null) limit {$start} , {$perpage}";
        $updatestatus = 1;
    }
    if ($_SESSION["member_typeid"] == 3) {
        $deSQL = $deSQL . "inner join declaration_progress on declaration.declaration_id = declaration_progress.d_id
        where (declaration_progress.mem_typeid = 1 and (declaration_progress.mem_id is not null and declaration_progress.dp_status = 0)) AND declaration.declaration_id in (select declaration_id from declaration_progress where declaration_progress.mem_typeid = 2 and declaration_progress.mem_id is not null and declaration_progress.dp_status = 1)  AND declaration.declaration_id in (select declaration_id from declaration_progress where declaration_progress.mem_typeid = 3 and declaration_progress.mem_id is null and declaration_progress.d_id = declaration.declaration_id) limit {$start} , {$perpage}";
        $updatestatus = 2;
    }
}

mysqli_set_charset($conn, 'utf8');
$deQuery = mysqli_query($conn, $deSQL);
// print_r(mysqli_fetch_array($deQuery));exit;
$sql = "SELECT * FROM village";
$query = mysqli_query($conn, $sql);
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
                        <div class="input-group input-group-default">
                            <button class="btn btn-#ffa726 orange lighten-1 btn-large" type="submit">
                                <span class="ti-search"></span>
                            </button> &nbsp;&nbsp;&nbsp;
                            <input class="form-control " id="myInput" type="text" placeholder="กรุณาระบุข้อมูลผู้แจ้ง..">
                        </div>
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
                                        <div>
                                            <th>PDF</th>
                                        </div>
                                        <div>
                                            <th>เบิกวัสดุ</th>
                                        </div>
                                        <div>
                                            <th>อนุมัติงานซ่อม</th>
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
                                            
                                            if ($res['repairing_status'] == "0") {
                                                $status = '<span class="badge badge-warning">รอการตรวจสอบ</span>';
                                            } else if ($res['repairing_status'] == "1") {
                                                $status = '<span class="badge badge-info">ดำเนินการซ่อม</span>';
                                            } else if ($res['repairing_status'] == "2") {
                                                $status = '<span class="badge badge-success">เสร็จสิ้น</span>';
                                            } else if ($res['repairing_status'] == "3") {
                                                $status = '<span class="badge badge-danger">ปฏิเสธ</span>';
                                            }
                                            echo '<td>' .   '<a style="color:blue;" href="admin_detail.php?declarationId=' . $res['declaration_id']. '">
                                                            '.$res['declaration_id']. ' 
                                                        </a> ' . "</td>";
                                            echo '<td>' . $res['Informate_fname'] . "</td>";
                                            echo '<td>' . $res['Informate_lname'] . "</td>";
                                            // echo '<td>'.$res['informant_id_card']."</td>";
                                            echo '<td>' . $res['informant_tel'] . "</td>";
                                           
                                            // echo '<td>'.$res['declaration_date']."</td>";
                                            echo '<td>' . $status . '</td>';
                                            echo '<td>' .   '<a href="admin_report_complete2.php?decId='.$res['declaration_id'].'">
                                            <button class="btn btn-primary m-b-5 m-l-1" type="button">
                                            <i class="ti-printer"></i>
                                            </button>   
                                        </a>' . '</td>';
                                        echo '<td><button type="button" class="btn btn-success" id="modalbtn" data-toggle="modal" data-target="#exampleModalCenter" data-stuff="'. $res['stuff_id'] .'" data-amount="'. $res['stuff_amount'] .'">
                                        <i class="ti-shopping-cart-full"></i> 
                                    </button>
                                    </td>';
                                            echo    '<td>   <a href="updatestatus.php?status=' . $updatestatus . '&id=' . $res['declaration_id'] . '"> 
                                                            <button class="btn btn-success m-b-5 m-l-1" type="button">
                                                                <i class="ti-check"></i> 
                                                            </button>
                                                        </a> &nbsp;&nbsp;
                                                        
                                                       
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

            <?php
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
            
  
    $query2 = mysqli_query($conn, $deSQL);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    ?>
        <div class="col-lg-12">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                <a class="page-link" href="informant_datail.php?page=1" tabindex="-1">Previous</a>
                </li>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li class="page-item <?php echo $i == $page ? 'active' : '';?>"><a class="page-link" href="informant_datail.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
                <?php } ?>
                <li class="page-item">
                <a class="page-link" href="informant_datail.php?page=<?php echo $total_page; ?>">Next</a>
                </li>
            </ul>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียดการเบิก</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">จำนวน</label>
                                <input type="text" class="form-control" id="total">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">วัสดุ</label>
                                <select class="custom-select custom-select-lg mb-3 d-block w-100" id="product">
                                    <option selected disabled>เลือกวัสดุ</option>
                                    <?php 
                                        while ($res = mysqli_fetch_array($resultwarehouse)) {
                                            echo '<option value="' . $res['stuff_id'] . '">'. $res['stuff_name'] .'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">หมู่บ้าน</label>
                                <select class="custom-select custom-select-lg mb-3 d-block w-100" id="village">
                                    <option selected disabled>เลือกหมู่บ้าน</option>
                                    <?php 
                                        while ($res = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $res['village_id'] . '">'. $res['village_name'] .'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">เสาไฟ</label>
                                <select class="custom-select custom-select-lg mb-3 d-block w-100" id="lamp">
                                    <option selected disabled>เลือกเสาไฟ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save">Save changes</button>
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

            $('#modalbtn').click(function() {
                var href = $(this).data('target')
                var stuff = $(this).data('stuff');
                var amount = $(this).data('amount');

                $(href).data('stuff', stuff);
                $(href).data('amount', amount);
            });

            $('#total').on('keyup', function () {
                this.value = this.value.replace(/[^0-9\.]/g,'');
            })

            $('#village').on('change', function() {
                getLamp(this)
            })

            $('#save').click(function(e) {
                const total = $('#total').val();
                const lamp = $('#lamp').val()
                const product = $('#product').val()
                if(total !== "" && typeof total !== 'undefined' && lamp !== 0 && lamp !== null && product !== 0 && product !== null) {
                    window.location.href = "http://localhost:8000/api_insert_borrow.php?amount=" + total + "&stuff_id=" + $('#product').val() +
                    "&loc_id=" + lamp
                } else {
                    alert('กรุณากรอกข้อมูลให้ครบ')
                }
            })

            getLamp = async (value) => {
                $.ajax({
                    type: "post",
                    url: "backend/getLamp.php",
                    data: {
                        "villageID": value.value || value.val()
                    },
                    dataType: "json",
                    success: function(result) {
                        $('#lamp')
                            .empty()
                        if(result.length > 0) {
                            $.each(result, function(key, value) {
                            $('#lamp')
                                .append($(`<option></option>`)
                                    .attr("value", value.LOC_ID)
                                    .text(value.LOC_ID));
                        })
                        } else {
                            $('#lamp')
                                .append($(`<option></option>`)
                                    .attr("value", 0)
                                    .text("ไม่มี"));
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });
            }
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
                        window.location.href = "http://localhost:8000/updatestatus.php?status=3&id=" + id
                    }
                });
        }
    </script>


</body>

</html>