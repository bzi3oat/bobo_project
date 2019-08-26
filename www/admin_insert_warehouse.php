<?php
session_start();
include('connect.php');
$con = mysqli_connect("db", "root", "root", "electricity");

mysqli_set_charset($con, 'utf8');


$strSQL = "SELECT * FROM member WHERE member_id = '" . $_SESSION['member_id'] . "' ";

$objQuery = $con->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);


$lampSQL = "SELECT * FROM type_lamp";
$queryLamp = mysqli_query($conn, $lampSQL);

$brandSQL = "SELECT * FROM type_brand";
$queryBrand = mysqli_query($conn, $brandSQL);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <!-- materializecss FORM -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- materializecss FORM -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- materializecss ICON -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


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
                                <h1>เพิ่มข้อมูลคลังวัสดุ <span> </span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <!--
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
                    -->
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <!--
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-money color-success border-success"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Total Profit</div>
                                            <div class="stat-digit">1,012</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">New Customer</div>
                                            <div class="stat-digit">961</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Active Projects</div>
                                            <div class="stat-digit">770</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Referral</div>
                                            <div class="stat-digit">2,781</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    -->
                <form action="api_insertwarehouse.php" method="post" name="form1">
                    <div class="card">
                        <div class="card-title">
                            <h6>รายละเอียดวัสดุ</h6>
                            <div class="row" style="margin-bottom:0px;">
                                <div class="col-lg-12">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input class="fname" type="text" name="stuff_typename" required />
                                        <label for="icon_prefix">ชื่อวัสดุ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label>ประเภทวัสดุ</label>
                                    <select class="form-control" name="lamp_id" required>
                                        <?php
                                             while($row = $queryLamp->fetch_assoc()) {
                                             echo '<option value="'.$row['lamp_id'].'">'.$row['lamp_name'].'</option>';
                                          }
                                        ?>
                                      </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label>แบรนด์วัสดุ</label>
                                    <select class="form-control" name="brand_id" required>
                                        <?php
                                             while($row = $queryBrand->fetch_assoc()) {
                                             echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
                                          }
                                        ?>
                                      </select>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom:0px;">
                                <div class="col-lg-12">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">attach_money</i>
                                        <input name="stuff_price" class="fname" type="text" name="member_fname" required />
                                        <label for="icon_prefix">ราคา</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom:0px;">
                                <div class="col-lg-12">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">add_shopping_cart</i>
                                        <input name="stuff_amount" class="fname" type="text" name="member_fname" required />
                                        <label for="icon_prefix">จำนวน</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                        </div>


                        <!-- SUBMIT FORM BUTTON -->
                        <div class="row">
                            <div class="col-s-3">
                                <button class="btn #1976d2 blue darken-2" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div> &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-s-3">
                                <button class="btn #757575 grey darken-1" type="reset" name="action"> Reset
                                </button>
                            </div>
                        </div>
                </form>

            </div>

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

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="assets/js/dashboard2.js"></script>
    <script>
        $(document).ready(function() {
            $('input#input_text, textarea#textarea2').characterCounter();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>
    <!-- ฟอร์มเบอร์โทร -->
    <script type="text/javascript">
        function autoTab(obj) {
            /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
            หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
            4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
            รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
            หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
            ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
            */
            var pattern = new String("___-_______"); // กำหนดรูปแบบในนี้
            var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
            var returnText = new String("");
            var obj_l = obj.value.length;
            var obj_l2 = obj_l - 1;
            for (i = 0; i < pattern.length; i++) {
                if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                    returnText += obj.value + pattern_ex;
                    obj.value = returnText;
                }
            }
            if (obj_l >= pattern.length) {
                obj.value = obj.value.substr(0, pattern.length);
            }
        }
    </script>

    <!-- บังคับกรอกได้แค่เลข -->
    <script language="JavaScript">
        function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
            ele.onKeyPress = vchar;
        }
    </script>

</body>

</html>