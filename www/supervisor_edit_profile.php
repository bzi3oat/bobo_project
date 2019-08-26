<?php
session_start();
include("connect.php")
if ($_SESSION['member_id'] == "") {
    echo "Please Login!";
    exit();
}

if ($_SESSION['member_typeid'] != 2) {
    echo "This page for Supervisor only!";
    exit();
}


$strSupervisor = "SELECT * FROM member WHERE member_id = '" . $_SESSION['member_id'] . "' ";

$objSupervisor = $conn->query($strSupervisor);
$supervisor = mysqli_fetch_assoc($objSupervisorResult);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supervisor</title>
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




</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="profile.php">
                            <!-- <img src="assets/images/logo.png" alt="" /> -->
                            <span><span>Welcome </span>
                                <?php echo $supervisor["member_fname"]; ?>
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
                    <li><a href="profile.php"><i class="ti-user"></i> ข้อมูลส่วนตัว </a></li>
                    <li><a href="register2.php"><i class="ti-comments-smiley"></i> เพิ่มผู้ใช้ใหม่เข้าสู่ระบบ </a></li>

                    <li class="label">ระบบกองช่าง</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> งานซ่อมบำรุง <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="   ">ข้อมูลการแจ้งซ่อม</a></li>
                        </ul>
                        <ul>
                            <li><a href="   ">ข้อมูลการซ่อมบำรุง</a></li>
                        </ul>
                        <ul>
                            <li><a href="tracking_for_admin.php">ติดตามสถานะการแจ้งซ่อม</a></li>
                        </ul>
                    </li>


                    <li><a href="app-event-calender.html"><i class="ti-calendar"></i> ข้อมูลเสาไฟฟ้าส่องสว่าง </a></li>

                    <li class="label">ระบบคลังสินค้า</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> คลังสินค้า <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="admin_warehouse.php">สินค้าในคลัง</a></li>
                        </ul>
                        <ul>
                            <li><a href="   ">เพิ่มพัสดุ</a></li>
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
                                        <li><a href="supervisor_profile.php"><i class="ti-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
                                        <li><a href="supervisor_edit_profile.php"><i class="ti-pencil"></i> <span>แก้ไขข้อมูลส่วนตัว</span></a></li>
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
                                <h1>แก้ไขข้อมูลส่วนตัว
                                    <span> </span>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">App-Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->



                <section id="main-content">
                    <form action="edit_register.php" method="post" name="form1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="user-profile">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="user-photo m-b-30">
                                                        <img class="img-fluid" src="assets/images/user-profile.jpg" alt="" />
                                                    </div>

                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active">
                                                            <a> </a>
                                                        </li>
                                                    </ul>
                                                    <div class="contact-information">

                                                        <!-- จัดให้ฟอร์มอยู่ด้านขวา  -->
                                                        <div class="work-content">
                                                            <!------------------------>

                                                            <div class="basic-information">
                                                                <h4>ข้อมูลการติดต่อ</h4>
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label">เบอร์โทร </label>
                                                                    <div class="col-sm-9">
                                                                        <input maxlength="11" type="text" name="member_tel" class="form-control input-default " onkeyup="autoTab(this)" value=" <?php echo $supervisor["member_tel"]; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label">Email </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="email" name="member_email" class="form-control input-default" value="<?php echo $supervisor["member_email"]; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label">Password </label>
                                                                    <div class="col-sm-9">
                                                                        <input required type="password" name="Password" class="form-control input-default" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-3 control-label">Confirm Password </label>
                                                                    <div class="col-sm-9">
                                                                        <input required type="password" name="conPassword" class="form-control input-default" value="">
                                                                    </div>
                                                                </div>


                                                                <div class="col-sm-6"> </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8">
                                                    <div class="user-profile-name"> <?php echo $supervisor["member_email"]; ?> </div>
                                                    <div class="user-Location">
                                                        <i class="ti-location-pin"></i> เชียงใหม่, ไทย</div>

                                                    <div class="user-job-title"><span>สถานะผู้ใช้งาน : </span>
                                                        <?php if ($member_typeid = 1) {
                                                            echo "Admin";
                                                        } elseif ($member_typeid = 2) {
                                                            echo "Supervisor";
                                                        } elseif ($member_typeid = 3) {
                                                            echo "Municiple";
                                                        } else {
                                                            echo "Administrator";
                                                        }
                                                        ?>

                                                    </div>

                                                    <div class="user-send-message">

                                                        <button class="btn btn-dark m-b-10 m-l-5" type="submit"> เสร็จสิ้น </button>


                                                        <button type="file" value="upload" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">
                                                            <i class="ti-plus"></i>อัพโหลดรูปภาพ</button>

                                                    </div>

                                                    <div class="custom-tab user-profile-tab">

                                                        <ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" class="active">
                                                                <a> </a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content">

                                                            <div role="tabpanel" class="tab-pane active" id="1">
                                                                <div class="contact-information">
                                                                    <h4>ข้อมูลพื้นฐาน</h4>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="float-left">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label">รหัสพนักงาน </label>
                                                                                    <?php echo $supervisor["member_id"]; ?>
                                                                                    <input type="hidden" name="member_id" value="<?php echo $supervisor["member_id"]; ?>">
                                                                                </div>
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label">ชื่อ </label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="member_fname" class="form-control input-default" value="<?php echo $supervisor["member_fname"]; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label">นามสกุล </label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="member_lname" class="form-control input-default" value="<?php echo $supervisor["member_lname"]; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label">เพศ </label>
                                                                                    <?php echo $supervisor["member_gender"]; ?>


                                                                                </div>
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label">วันเกิด </label>
                                                                                    <?php echo $supervisor["member_birthdate"]; ?>

                                                                                </div>
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 control-label">อายุ </label>
                                                                                    <?php echo $supervisor["member_age"]; ?>

                                                                                </div>
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label">เลขบัตรประชาชน </label>
                                                                                    <div class="col-sm-9">
                                                                                        <input maxlength="13" type="text" name="member_id_card" class="form-control input-default" value="<?php echo $supervisor["member_id_card"]; ?>  ">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label">ที่อยู่ </label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="member_address" class="form-control input-default" value="<?php echo $supervisor["member_address"]; ?>">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </form>



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


</body>

</html>