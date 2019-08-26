<?php
session_start();
header('Content-type: text/html; charset=utf-8');
include("api_retreievewarehousebyid.php");


$con = mysqli_connect("db", "root", "root", "electricity");

mysqli_set_charset($con, 'utf8');


$strSQL = "SELECT * FROM member WHERE member_id = '" . $_SESSION['member_id'] . "' ";

$objQuery = $con->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);

$warehouse = mysqli_fetch_assoc($resultwarehouse);
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

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="admin_profile.php">
                            <!-- <img src="assets/images/logo.png" alt="" /> -->
                            <span><span>Welcome </span>
                                <?php echo $objResult["member_fname"]; ?>
                            </span></a>
                    </div>
                    <!--   
                        <li class="label">Main</li>
                    
                        <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard <span class="badge badge-primary">2</span> <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                          
                            <ul>
                                <li><a href="visitor_index.php">Dashboard 1</a></li>
                                <li><a href="index1.html">Dashboard 2</a></li>
                            </ul>
                        </li>
                    -->

                    <li class="label">จัดการข้อมูลผู้ใช้ระบบ</li>
                    <li><a href="admin_profile.php"><i class="ti-user"></i> ข้อมูลส่วนตัว </a></li>
                    <li><a href="admin_register.php"><i class="ti-comments-smiley"></i> เพิ่มผู้ใช้ใหม่เข้าสู่ระบบ </a></li>
                    <li><a href="admin_warehouse.php"><i class="ti-comments-smiley"></i> คลังสินค้า </a></li>

                    <li class="label">ระบบกองช่าง</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> งานซ่อมบำรุง <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="informant_datail.php">ข้อมูลการแจ้งซ่อม</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">ข้อมูลการซ่อมบำรุง</a></li>
                        </ul>
                        <ul>
                            <li><a href="admin_tracking.php">ติดตามสถานะการแจ้งซ่อม</a></li>
                        </ul>
                    </li>


                    <li><a href="app-event-calender.html"><i class="ti-calendar"></i> ข้อมูลเสาไฟฟ้าส่องสว่าง </a></li>

                    <li class="label">ระบบคลังสินค้า</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> คลังสินค้า <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="admin_warehouse.php">สินค้าในคลัง</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">เพิ่มพัสดุ</a></li>
                        </ul>

                        <!--
                        <li><a href="app-profile.html"><i class="ti-user"></i> Profile</a></li>
                        <li><a href="app-widget-card.html"><i class="ti-layout-grid2-alt"></i> Widget</a></li>
                        <li class="label">Features</li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-alerts.html">Alerts</a></li>

                                <li><a href="ui-button.html">Button</a></li>
                                <li><a href="ui-dropdown.html">Dropdown</a></li>

                                <li><a href="ui-list-group.html">List Group</a></li>

                                <li><a href="ui-progressbar.html">Progressbar</a></li>
                                <li><a href="ui-tab.html">Tab</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Components <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="uc-calendar.html">Calendar</a></li>
                                <li><a href="uc-carousel.html">Carousel</a></li>
                                <li><a href="uc-weather.html">Weather</a></li>
                                <li><a href="uc-datamap.html">Datamap</a></li>
                                <li><a href="uc-todo-list.html">To do</a></li>
                                <li><a href="uc-scrollable.html">Scrollable</a></li>
                                <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                                <li><a href="uc-toastr.html">Toastr</a></li>
                                <li><a href="uc-range-slider-basic.html">Basic Range Slider</a></li>
                                <li><a href="uc-range-slider-advance.html">Advance Range Slider</a></li>
                                <li><a href="uc-nestable.html">Nestable</a></li>

                                <li><a href="uc-rating-bar-rating.html">Bar Rating</a></li>
                                <li><a href="uc-rating-jRate.html">jRate</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Table <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="table-basic.html">Basic</a></li>

                                <li><a href="table-export.html">Datatable Export</a></li>
                                <li><a href="table-row-select.html">Datatable Row Select</a></li>
                                <li><a href="table-jsgrid.html">Editable </a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Icons <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="font-themify.html">Themify</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="gmaps.html">Basic</a></li>
                                <li><a href="vector-map.html">Vector Map</a></li>
                            </ul>
                        </li>
                        <li class="label">Form</li>
                        <li><a href="form-basic.html"><i class="ti-view-list-alt"></i> Basic Form </a></li>
                        <li class="label">Extra</li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Invoice <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="invoice.html">Basic</a></li>
                                <li><a href="invoice-editable.html">Editable</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-reset-password.html">Forgot password</a></li>
                            </ul>
                        </li>
                        <li><a href="../documentation/visitor_index.php"><i class="ti-file"></i> Documentation</a></li>
                    -->

                    <li><a href="logout.php"><i class="ti-close"></i> ออกจากระบบ</a></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <!-- HEADER บนซ้าย -->
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
                        <li class="header-icon dib">
                            <span class="user-avatar">
                                <?php
                                if ($member_typeid = 1) {
                                    echo "Admin";
                                } elseif ($member_typeid = 2) {
                                    echo "Supervisor";
                                } elseif ($member_typeid = 2) {
                                    echo "Palad";
                                } else {
                                    echo "Administrator";
                                }
                                ?>
                                <i class="ti-angle-down f-s-10"></i>
                            </span>

                            <div class="drop-down dropdown-profile">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="admin_profile.php"><i class="ti-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
                                        <li><a href="admin_edit_profile.php"><i class="ti-pencil"></i> <span>แก้ไขข้อมูลส่วนตัว</span></a></li>
                                        <li><a href="logout.php"><i class="ti-power-off"></i> <span>ออกจากระบบ</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </div>

                    <!-- ICON ซองจดหมาย -->
                    <!--
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    -->

                    <!--
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown"> 
                    -->


                    <!-- <span class="user-avatar">Log in -->

                    <!-- สามเหลี่ยมชี้ลง -->
                    <!--
                                    <i class="ti-angle-down f-s-10"></i>
                                -->
                    <!-- </span> -->

                    <!--
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>-->
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
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>เพิ่มข้อมูลคลังสินค้า <span> </span></h1>
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
                <form action="api_updatewarehouse.php" method="post" name="form1">
                    <input type="hidden" name="stuff_id" value="<?php echo $warehouse['stuff_id']; ?>">
                    <div class="card">
                        <div class="card-title">
                            <h6>รายละเอียดสินค้า</h6>
                            <div class="row" style="margin-bottom:0px;">
                                <div class="col-lg-12">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input class="fname" type="text" name="stuff_name" value="<?php echo $warehouse['stuff_name'] ?>" required />
                                        <label for="icon_prefix">ชื่อวัสดุ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label>ประเภทวัสดุ</label>
                                    <select name="stuff_type" class="form-control">
                                        <option value="1" <?php echo ($warehouse['stuff_type'] == 1 ? "selected" : "") ?>>หลอดไฟ LED</option>
                                        <option value="2" <?php echo ($warehouse['stuff_type'] == 2 ? "selected" : "") ?>>หลอดฟลูออเรสเซนต์</option>
                                        <option value="3" <?php echo ($warehouse['stuff_type'] == 3 ? "selected" : "") ?>>หลอดฮาโลเจน</option>
                                        <option value="4" <?php echo ($warehouse['stuff_type'] == 4 ? "selected" : "") ?>>หลอดนีออน</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label>แบรนด์วัสดุ</label>
                                    <select name="stuff_brand" class="form-control">
                                        <option value="1" <?php echo ($warehouse['stuff_brand'] == 1 ? "selected" : "") ?>>LG</option>
                                        <option value="2" <?php echo ($warehouse['stuff_brand'] == 2 ? "selected" : "") ?>>Phillips</option>
                                        <option value="3" <?php echo ($warehouse['stuff_brand'] == 3 ? "selected" : "") ?>>Arachi</option>
                                        <option value="4" <?php echo ($warehouse['stuff_brand'] == 4 ? "selected" : "") ?>>Racer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom:0px;">
                                <div class="col-lg-12">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">attach_money</i>
                                        <input name="stuff_price" class="fname" type="text" value="<?php echo $warehouse['stuff_price']; ?>" required />
                                        <label for="icon_prefix">ราคา</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom:0px;">
                                <div class="col-lg-12">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">add_shopping_cart</i>
                                        <input name="stuff_amount" class="fname" type="text" value="<?php echo $warehouse['stuff_amount']; ?>" required />
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
                                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div> &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-s-3">
                                <button class="btn waves-effect waves-light" type="reset" name="action"> Reset
                                </button>
                            </div>
                        </div>
                </form>


                <!--
                            <div class="col-lg-4">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="ct-pie-chart"></div>
                                    </div>
                                </div>
                            </div>
                            -->
            </div>

            <!-- /# row -->


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