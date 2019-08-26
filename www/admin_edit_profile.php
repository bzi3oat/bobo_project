<?php
session_start();
include('connect.php');


$profileSQL = "SELECT * FROM member INNER JOIN member_address on member.member_id = member_address.member_id 
INNER JOIN province as p on member_address.province = p.Pid
INNER JOIN district as d on member_address.district = d.Did
INNER JOIN subdistrict as sd on member_address.sub_district = sd.SDTid
WHERE member.member_id = '" . $_SESSION['member_id'] . "'";

mysqli_set_charset($conn, 'utf8');
$profileQuery = mysqli_query($conn, $profileSQL);
$profileResult = mysqli_fetch_array($profileQuery, MYSQLI_ASSOC);
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
  <style>
    input[type="file"] {
      display: none;
    }

    .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
    }
  </style>
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
              
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->



        <section id="main-content">
          <form action="edit_register.php" method="post" name="form1" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="user-profile">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="user-photo m-b-30">
                            <img class="img-fluid" src="images/<?php echo $profileResult["member_pic"]; ?>" alt="" />
                          </div>

                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a> </a>
                            </li>
                          </ul>
                          <div class="contact-inforfcumation">

                            <!-- จัดให้ฟอร์มอยู่ด้านขวา  -->
                            <div class="work-content">
                              <!------------------------>

                              <div class="basic-information">
                                <h4>ข้อมูลที่อยู่</h4>
                                <div class="row">
                                  <label class="col-sm-3 control-label">บ้านเลขที่ </label>
                                  <div class="col-sm-9">
                                    <input type="text" name="member_address" class="form-control input-default" value="<?php echo $profileResult["house_number"]; ?>">
                                    
                                  </div>
                                </div>
                                <div class="row">
                                  <label class="col-sm-3 control-label">ซอย </label>
                                  <div class="col-sm-9">
                                    <input type="text" name="member_address" class="form-control input-default" value=" <?php echo $profileResult["soi"]; ?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <label class="col-sm-3 control-label">หมู่ </label>
                                  <div class="col-sm-9">
                                    <input type="text" name="member_address" class="form-control input-default" value="<?php echo $profileResult["moo"]; ?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <label class="col-sm-3 control-label">ถนน </label>
                                  <div class="col-sm-9">
                                    <input type="text" name="member_address" class="form-control input-default" value=" <?php echo $profileResult["road"]; ?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <label class="col-sm-3 control-label">ตำบล </label>
                                  <div class="col-sm-9">
                                    <input type="text" name="member_address" class="form-control input-default" value="<?php echo $profileResult["SDTname_th"]; ?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <label class="col-sm-3 control-label">อำเภอ </label>
                                  <div class="col-sm-9">
                                    <input type="text" name="member_address" class="form-control input-default" value="<?php echo $profileResult["Dname_th"]; ?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <label class="col-sm-3 control-label">จังหวัด </label>
                                  <div class="col-sm-9">
                                    <input type="text" name="member_address" class="form-control input-default" value="<?php echo $profileResult["Pname_th"]; ?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <label class="col-sm-3 control-label">รหัสไปรษณีย์ </label>
                                  <div class="col-sm-9">
                                    <input type="text" name="member_address" class="form-control input-default" value="<?php echo $profileResult["postal_code"]; ?>">
                                  </div>
                                </div>

                                <div class="col-sm-6"> </div>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-8">
                          <div class="user-profile-name"> <?php echo $profileResult["member_email"]; ?> </div>
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

                            <button class="btn btn-primary m-b-10 m-l-5" type="submit" onClick="onDelete()"> เสร็จสิ้น </button>

                    
                           
                         
                            <label for="file-upload" class="custom-file-upload">
                              <i class="fa fa-cloud-upload"></i> Custom Upload
                            </label>
                            <input id="file-upload" name="member_pic" type="file" />


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
                                          <?php echo $profileResult["member_id"]; ?>
                                          <input type="hidden" name="member_id" value="<?php echo $profileResult["member_id"]; ?>">
                                        </div>
                                        <div class="row">
                                          <label class="col-sm-3 control-label">ชื่อ </label>
                                          <div class="col-sm-9">
                                            <input type="text" name="member_fname" class="form-control input-default" value="<?php echo $profileResult["member_fname"]; ?>">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label class="col-sm-3 control-label">นามสกุล </label>
                                          <div class="col-sm-9">
                                            <input type="text" name="member_lname" class="form-control input-default" value="<?php echo $profileResult["member_lname"]; ?>">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label class="col-sm-4 control-label">เพศ </label>
                                          <input type="radio" name="member_gender" <?= ($profileResult['member_gender'] == 'ชาย') ? "checked" : "" ?> value="ชาย">&nbsp;ชาย &nbsp;
                                          <input type="radio" name="member_gender" <?= ($profileResult['member_gender'] == 'หญิง') ? "checked" : "" ?> value="หญิง">&nbsp;หญิง
                                        </div>
                                        <div class="row">
                                          <label class="col-sm-4 control-label">วันเกิด </label>
                                          <?php echo $profileResult["member_birthdate"]; ?>
                                        </div>
                                        <div class="row">
                                          <label class="col-sm-4 control-label">อายุ </label>
                                          <?php echo $profileResult["member_age"]; ?>

                                        </div>
                                        <div class="row">
                                          <label class="col-sm-3 control-label">เลขบัตรประชาชน </label>
                                          <div class="col-sm-9">
                                            <input maxlength="13" type="text" name="member_id_card" class="form-control input-default" value="<?php echo $profileResult["member_id_card"]; ?>" OnKeyPress="return chkNumber(this)">
                                          </div>
                                        </div>

                                        <br>

                                        <h4>ข้อมูลการติดต่อ</h4>
                                        <div class="row">
                                          <label class="col-sm-3 control-label">เบอร์โทร</label>
                                          <div class="col-sm-9">
                                            <input maxlength="11" type="text" name="member_tel" class="form-control input-default " onkeyup="autoTab(this)" OnKeyPress="return chkNumber(this)" value="<?php echo $profileResult["member_tel"]; ?>">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label class="col-sm-3 control-label">Email </label>
                                          <div class="col-sm-9">
                                            <input type="email" name="member_email" class="form-control input-default" value="<?php echo $profileResult["member_email"]; ?>">
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