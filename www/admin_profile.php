<?php
session_start();
include('connect.php');
if (isset($_SESSION['member_id']) == "") {
  echo "Please Login!";
  exit();
}

// if ($_SESSION['member_typeid'] != 4) {
//   echo "This page for Admin only!";
//   exit();
// }

$member = "SELECT * FROM member INNER JOIN member_address on member.member_id = member_address.member_id 
INNER JOIN province as p on member_address.province = p.Pid
INNER JOIN district as d on member_address.district = d.Did
INNER JOIN subdistrict as sd on member_address.sub_district = sd.SDTid
WHERE member.member_id = '" . $_SESSION['member_id'] . "'";

mysqli_set_charset($conn, 'utf8');
$objMember = mysqli_query($conn, $member);
$objMemberResult = mysqli_fetch_array($objMember, MYSQLI_ASSOC);

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
                <h1>ข้อมูลส่วนตัวผู้ใช้
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


                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="images/<?php echo $objMemberResult["member_pic"]; ?>" alt="" />
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
                              <h4>ข้อมูลที่อยู่</h4>
                              <div class="gender-content">
                                <span class="contact-title">บ้านเลขที่ :</span>
                                <?php echo $objMemberResult["house_number"]; ?>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">ซอย :</span>
                                <?php echo $objMemberResult["soi"]; ?>
                              </div>

                              <div class="gender-content">
                                <span class="contact-title">หมู่ :</span>
                                <?php echo $objMemberResult["moo"]; ?>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">ถนน :</span>
                                <?php echo $objMemberResult["road"]; ?>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">จังหวัด :</span>
                                <?php echo $objMemberResult["Pname_th"]; ?>
                              </div>

                              <div class="gender-content">
                                <span class="contact-title">อำเภอ :</span>
                                <?php echo $objMemberResult["Dname_th"]; ?>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">ตำบล :</span>
                                <?php echo $objMemberResult["SDTname_th"]; ?>
                              </div>
                              <div class="email-content">
                                <span class="contact-title">รหัสไปรษณีย์ :</span>
                                <?php echo $objMemberResult["postal_code"]; ?>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="user-profile-name"> <?php echo $objMemberResult["member_email"]; ?> </div>
                        <div class="user-Location">
                          <i class="ti-location-pin"></i> เชียงใหม่, ไทย</div>

                          <div class="user-job-title"><span>สถานะผู้ใช้งาน : </span>
                            <?php
                            if ($objMemberResult["member_typeid"] == 1) {
                              echo "เจ้าหน้าที่";
                            } elseif ($objMemberResult["member_typeid"] == 2) {
                              echo "หัวหน้างาน";
                            } elseif ($objMemberResult["member_typeid"] == 3) {
                              echo "ปลัดเทศบาล";
                            } else {
                              echo "ผู้ดูแลระบบ";
                            }
                            ?>
                          </div>

                          <div class="user-send-message">
                            <a href="admin_edit_profile.php">
                              <button class="btn btn-primary m-b-10 m-l-5" type="button"> แก้ไขข้อมูลส่วนตัว </button>
                            </a>
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
                                  <div class="birthday-content">
                                    <span class="contact-title">รหัสพนักงาน : </span>
                                    <?php echo $objMemberResult["member_id"]; ?>
                                  </div>
                                  <div class="birthday-content">
                                    <span class="contact-title">ชื่อ : </span>
                                    <?php echo $objMemberResult["member_fname"]; ?>
                                  </div>
                                  <div class="birthday-content">
                                    <span class="contact-title">นามสกุล : </span>
                                    <?php echo $objMemberResult["member_lname"]; ?>
                                  </div>
                                  <div class="gender-content">
                                    <span class="contact-title">เพศ :</span>
                                    <?php echo $objMemberResult["member_gender"]; ?>
                                  </div>
                                  <div class="gender-content">
                                    <span class="contact-title">วันเกิด :</span>
                                    <?php echo $objMemberResult["member_birthdate"]; ?>
                                  </div>
                                  <div class="gender-content">
                                    <span class="contact-title">อายุ :</span>
                                    <?php echo $objMemberResult["member_age"]; ?>
                                  </div>
                                  <div class="gender-content">
                                    <span class="contact-title">หมายเลขบัตรประชาชน :</span>
                                    <?php echo $objMemberResult["member_id_card"]; ?>
                                  </div>

                                  <br>

                                  <h4>ข้อมูลการติดต่อ</h4>
                                  <div class="gender-content">
                                    <span class="contact-title">เบอร์โทร :</span>
                                    <?php echo $objMemberResult["member_tel"]; ?>
                                  </div>
                                  <div class="email-content">
                                    <span class="contact-title">อีเมล : </span>
                                    <?php echo $objMemberResult["member_email"]; ?>
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
</body>

</html>