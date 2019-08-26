<?php
session_start();
include('connect.php');

$strSQL = "SELECT * FROM member WHERE member_id = '" . $_SESSION['member_id'] . "' ";

$objQuery = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery);

?>
<?php
$select = "SELECT * FROM declaration where repairing_status = 3 order by declaration_id desc ";

if(isset($_GET['startDate']) && isset($_GET['endDate'])) {
    $select = "SELECT * FROM declaration where repairing_status = 3 and (declaration_date >= "."'".$_GET['startDate']."'"." and declaration_date <= ". "'".$_GET['endDate']. "')". " order by declaration_id desc ";
}

$result = $conn->query($select);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: Data Table</title>

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

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- SEARCH BAR -->
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
                                <h1>งามซ่อมที่ถูกปฎิเสธ <span></span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <!-- <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Table-Export</li>
                                </ol>
                            </div> -->
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <div class="col-lg-7">
                                            <div class="row">
                                                <div class="input-field col s4">
                                                    <h6>ระบุวันที่ต้องการค้นหา</h6>
                                                </div>

                                                <div class="input-field col s2" id="datep-start">
                                                    <input type="text" name="dates" <?php echo ((isset($_GET['startDate']) && isset($_GET['endDate'])) ? 'value="'.date( "m-d-Y", strtotime($_GET['startDate'])).' - '.date( "m-d-Y", strtotime($_GET['endDate'])). '"' : ''); ?>/>
                                                </div>
                                                <a href="pdf_report_fail.php<?php echo ((isset($_GET['startDate']) && isset($_GET['endDate'])) ? '?startDate='.$_GET['startDate'].'&endDate='.$_GET['endDate'] : ''); ?>">
                                                <button class="btn btn-info m-b-5 m-l-1" type="button">
                                                    ออกรายงาน PDF &nbsp; <i class="ti-printer"></i>
                                                </button>
                                                </a> 
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped">


                                            <thead>
                                                <tr>
                                                    <div>
                                                        <th>หมายเลขรายงาน</th>
                                                    </div>

                                                    <div>
                                                        <th>วันเวลาที่แจ้งซ่อม</th>
                                                    </div>
                                                    <div>
                                                        <th>ชื่อ - สกุล ผู้แจ้ง</th>
                                                    </div>
                                                    <div>
                                                        <th>เบอร์โทรผู้แจ้ง</th>
                                                    </div>
                                                    <div>
                                                        <th>รหัสเสาไฟ</th>
                                                    </div>
                                                    <!-- <div>
                                                        <th>ลบ</th>
                                                    </div> -->
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">

                                                <?php
                                                while ($res = mysqli_fetch_array($result)) {
                                                    ?>

                                                    <tr>
                                                        <?php

                                                        echo '<td>' . $res['declaration_id'] . "</td>";
                                                        echo '<td>' . $res['declaration_date'] . "</td>";
                                                        echo '<td>' . $res['Informate_fname'] . '&nbsp;' . $res['Informate_lname'] . "</td>";
                                                        // echo '<td>'.$res['informant_id_card']."</td>";
                                                        echo '<td>' . $res['informant_tel'] . "</td>";
                                                        echo '<td>' . $res['LOC_ID'] . "</td>";
                                                        // echo '<td>  <a href="#" onClick="onDelete(' . $res['declaration_id'] . ')">
                                                        // <button class="btn btn-danger m-b-5 m-l-1" type="button">
                                                        // <i class="ti-trash"></i> 
                                                        // </button> 
                                                        // </a></td>';

                                                        // echo '<td>'.$res['declaration_date']."</td>";
                                                    }
                                                    ?>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <!-- <p>  - <a href="#">example.com</a></p> -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <!-- bootstrap -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.dataTables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

</body>
<script>
$(function() {
    $('input[name="dates"]').daterangepicker({
    opens: 'right'
  }, function(start, end, label) {
    window.location.href = `http://localhost:8000/admin_report_fail.php?startDate=${start.format('YYYY-MM-DD')}&endDate=${end.format('YYYY-MM-DD')}`
  });
});
</script>
</html>