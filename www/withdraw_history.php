<?php
session_start();
include('connect.php');

$perpage = 10;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
$strSQL = "SELECT * FROM member WHERE member_id = '" . $_SESSION['member_id'] . "' ";
mysqli_set_charset($conn, 'utf8');
$objQuery = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

$locationSQL = "SELECT * FROM borrow inner join warehouse on borrow.stuff_id = warehouse.stuff_id inner join type_brand on warehouse.stuff_brand = type_brand.brand_id inner join type_lamp on warehouse.stuff_type = type_lamp.lamp_id inner join member on borrow.member_id = member.member_id left join location on borrow.loc_id = location.LOC_ID left join village on location.village_id = village.village_id ORDER BY b_id desc limit {$start} , {$perpage}";

if(isset($_GET['startDate']) && isset($_GET['endDate'])) {
    $locationSQL = "SELECT * FROM borrow inner join warehouse on borrow.stuff_id = warehouse.stuff_id inner join type_brand on warehouse.stuff_brand = type_brand.brand_id inner join type_lamp on warehouse.stuff_type = type_lamp.lamp_id inner join member on borrow.member_id = member.member_id inner join location on borrow.loc_id = location.LOC_ID inner join village on location.village_id = village.village_id WHERE b_date >= " . '"'.$_GET['startDate'].'"' . " and b_date <= ". '"'.$_GET['endDate'].'" ORDER BY b_id desc '. " limit {$start} , {$perpage}";
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                                <h1>ประวัติการเบิกถอนวัสดุ <span> </span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="card">



                <div class="col-lg-4">
                    <div class="row">
                        <div class="input-field col s2">
                            <h6>ระบุวันที่ต้องการค้นหา</h6>
                        </div>
                        <div class="input-field col s2" id="datep-start">
                        <input type="text" name="dates" <?php echo ((isset($_GET['startDate']) && isset($_GET['endDate'])) ? 'value="'.date( "m-d-Y", strtotime($_GET['startDate'])).' - '.date( "m-d-Y", strtotime($_GET['endDate'])). '"' : ''); ?>/>
                        </div>
                      
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
                                        <th>วันที่เบิก</th>
                                    </div>
                                    <div>
                                        <th>รายการวัสดุที่เบิก</th>
                                    </div>
                                    <div>
                                        <th>จำนวน</th>
                                    </div>
                                    <div>
                                        <th>ชื่อผู้เบิก</th>
                                    </div>
                                    <div>
                                        <th>เสาไฟ</th>
                                    </div>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $queryLocation->fetch_assoc()) {
                                     echo "<tr>";
                                     echo "<td>".$row['b_id']."</td>";
                                     echo "<td>".date( "d/m/Y", strtotime($row['b_date']))."</td>";
                                     echo "<td>".$row['stuff_name']."</td>";
                                     echo "<td>".$row['b_amount']."</td>";
                                     echo "<td>".$row['member_fname']. ' '. $row['member_lname']."</td>";
                                     echo "<td>". $row['village_name'] . "(" . $row['loc_id'] . ")</td>";
                                     echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
   $locationSQL = "SELECT * FROM borrow inner join warehouse on borrow.stuff_id = warehouse.stuff_id inner join type_brand on warehouse.stuff_brand = type_brand.brand_id inner join type_lamp on warehouse.stuff_type = type_lamp.lamp_id inner join member on borrow.member_id = member.member_id left join location on borrow.loc_id = location.LOC_ID left join village on location.village_id = village.village_id ORDER BY b_id desc ";

   if(isset($_GET['startDate']) && isset($_GET['endDate'])) {
       $locationSQL = "SELECT * FROM borrow inner join warehouse on borrow.stuff_id = warehouse.stuff_id inner join type_brand on warehouse.stuff_brand = type_brand.brand_id inner join type_lamp on warehouse.stuff_type = type_lamp.lamp_id inner join member on borrow.member_id = member.member_id inner join location on borrow.loc_id = location.LOC_ID inner join village on location.village_id = village.village_id WHERE b_date >= " . '"'.$_GET['startDate'].'"' . " and b_date <= ". '"'.$_GET['endDate'].'" ORDER BY b_id desc ';
   }
    $query2 = mysqli_query($conn, $locationSQL);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    ?>
        <div class="col-lg-12">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                <a class="page-link" href="withdraw_history.php?page=1" tabindex="-1">Previous</a>
                </li>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li class="page-item <?php echo $i == $page ? 'active' : '';?>"><a class="page-link" href="withdraw_history.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
                <?php } ?>
                <li class="page-item">
                <a class="page-link" href="withdraw_history.php?page=<?php echo $total_page; ?>">Next</a>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- scripit init-->



</body>
<script>
$(function() {
    $('input[name="dates"]').daterangepicker({
    opens: 'right'
  }, function(start, end, label) {
    window.location.href = `http://localhost:8000/withdraw_history.php?startDate=${start.format('YYYY-MM-DD')}&endDate=${end.format('YYYY-MM-DD')}`
  });
});
</script>

</html>