<?php
session_start();
include('connect.php');
include('api_retreievewarehouse.php');

function setStuffTypeName($id)
{
    if ($id == 1) {
        return "หลอดไฟ LED";
    } else if ($id == 2) {
        return "หลอดฟลูออเรสเซนต์";
    } else if ($id == 3) {
        return "หลอดฮาโลเจน";
    } else if ($id == 4) {
        return "หลอดนีออน";
    }
    return "ไม่ทราบ";
}

function setBrandName($id)
{
    if ($id == 1) {
        return "LG";
    } else if ($id == 2) {
        return "Phillips";
    } else if ($id == 3) {
        return "Arachi";
    } else if ($id == 4) {
        return "Racer";
    }
    return "ไม่ทราบ";
}

$sql = "SELECT * FROM village";
$query = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">

    <!-- Styles -->
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
                                <h1>รายการวัสดุในคลัง <span> </span></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card-title pr">
                        <div class="card-body">
                            <div class="basic-form">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ตารางสินค้าในคลัง -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">

                            <div class="col-lg-5">
                                <input class="form-control" id="myInput" type="text" placeholder="ค้นหา.."> <br>
                            </div>
                            <div class="col-lg-1">
                                <a href="admin_insert_warehouse.php" align="right"
                                    class="btn btn-primary btn-flat m-b-15 m-l-1 ti-plus"> เพิ่มวัสดุ </a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <div>
                                        <th>ID</th>
                                    </div>
                                    <div>
                                        <th>ชื่อวัสดุ</th>
                                    </div>
                                    <div>
                                        <th>ประเภทหลอดไฟ</th>
                                    </div>
                                    <div>
                                        <th>แบรนด์วัสดุ</th>
                                    </div>
                                    <div>
                                        <th>วันที่บันทึก</th>
                                    </div>
                                    <div>
                                        <th>ราคา</th>
                                    </div>
                                    <div>
                                        <th>จำนวน</th>
                                    </div>
                                    <div>
                                        <th>แก้ไข</th>
                                    </div>
                                    <!-- <div>
                                        <th>เบิกจำนวน</th>
                                    </div> -->
                                    <!-- <div>
                                        <th>เบิกวัสดุ</th>
                                    </div> -->
                                    <!-- <div>
                                        <th>ใบสั่งซื้อ</th>
                                    </div> -->
                                    <div>
                                        <th>ลบวัสดุ</th>
                                    </div>
                                </tr>
                            </thead>
                            <tbody id="myTable">

                                <?php
                                while ($res = mysqli_fetch_assoc($resultwarehouse)) {
                                    ?>

                                <tr>
                                    <?php
                                        echo '<td>' . $res['stuff_id'] . "</td>";
                                        echo '<td>' . $res['stuff_name'] . "</td>";
                                        echo '<td>' . setStuffTypeName($res['stuff_type']) . '</td>';
                                        echo '<td>' . setBrandName($res['stuff_brand']) . '</td>';
                                        echo '<td>' . $res['stuff_date'] . '</td>';
                                        echo '<td>' . $res['stuff_price'] . '</td>';
                                        echo '<td>' . $res['stuff_amount'] . '</td>';
                                        echo '<td>  <a href="updatewarehouse.php?stuff_id='. $res['stuff_id'].'">
                                                        <button class="btn btn-warning m-b-5 m-l-1" type="button">
                                                            <i class="ti-pencil"></i> 
                                                        </button>
                                                    </a>';
                                        // echo '<td><input id="borrow'.$res['stuff_id'].'" type="number" name="borrow"></td>';
                                        // echo '<td>  <a href="#?stuff_id='.$res['stuff_id'].'">
                                        //                 <button class="btn btn-success m-b-5 m-l-1" type="button" onclick="onClickBorrow('.$res['stuff_id'].','.$res['stuff_amount'].')">
                                        //                     <i class="ti-shopping-cart-full"></i> 
                                        //                 </button>
                                        //             </a></td>';

                                        // echo '<td><button type="button" class="btn btn-success" id="modalbtn" data-toggle="modal" data-target="#exampleModalCenter" data-stuff="'. $res['stuff_id'] .'" data-amount="'. $res['stuff_amount'] .'">
                                        //         <i class="ti-shopping-cart-full"></i> 
                                        //     </button>
                                        //     </td>';
                                        // echo '<td>  
                                        //                 <button class="btn btn-primary m-b-5 m-l-1" type="button">
                                        //                     <i class="ti-printer"></i> 
                                        //                 </button>
                                        //            </td>';
                                        echo '<td>  <a href="#" onClick="onDelete('.$res['stuff_id'].')">
                                                        <button class="btn btn-danger m-b-5 m-l-1" type="button">
                                                        <i class="ti-trash"></i> 
                                                        </button> 
                                                    </a></td>';
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
    $statistic = "SELECT * FROM warehouse";
    $query2 = mysqli_query($conn, $statistic);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    ?>
        <div class="col-lg-12">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                <a class="page-link" href="admin_warehouse.php?page=1" tabindex="-1">Previous</a>
                </li>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li class="page-item <?php echo $i == $page ? 'active' : '';?>"><a class="page-link" href="admin_warehouse.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
                <?php } ?>
                <li class="page-item">
                <a class="page-link" href="admin_warehouse.php?page=<?php echo $total_page; ?>">Next</a>
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
        $(document).ready(function () {
            $('#modalbtn').click(function() {
                var href = $(this).data('target')
                var stuff = $(this).data('stuff');
                var amount = $(this).data('amount');
                console.log(href)
                $(href).data('stuff', stuff);
                $(href).data('amount', amount);
            });

            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
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
                console.log($('#exampleModalCenter').data('amount'))
                if(total !== "" && typeof total !== 'undefined' && lamp !== 0 && lamp !== null) {
                    window.location.href = "http://localhost:8000/api_insert_borrow.php?amount=" + total + "&stuff_id=" + $('#exampleModalCenter').data('stuff') +
                    "&old_total=" + $('#exampleModalCenter').data('amount') + "&loc_id=" + lamp
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

</body>

</html>

<script type="text/javascript">
    onClickBorrow = (id, total) => {
        const amount = $(`#borrow${id}`).val();
        if (typeof amount === 'undefined' || amount <= 0) {
            alert('กรุณากรอกจำนวนวัสดุที่ต้องการเบิก');
            return false;
        }
        window.location.href = "http://localhost:8000/api_insert_borrow.php?amount=" + amount + "&stuff_id=" + id +
            "&old_total=" + total
    }

    onDelete = (id) => {
        swal({
                title: "คุณแน่ใจหรือไม่ ?",
                text: "หากตกลงแล้วจะไม่สามารถกู้คืนกลับมาได้",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                // content: "input",
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "http://localhost:8000/api_deletewarehouse.php?stuff_id=" + id
                }
            });
    }
</script>