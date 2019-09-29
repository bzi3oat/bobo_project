<?php ob_start(); ?>
<?php
include('connect.php');
session_start();


if(!isset($_GET['locId'])) {
    header("Location: http://localhost:8000/admin_electricity_manage.php");
    die();
} 

$strSQL = "SELECT * FROM member WHERE member_id = '" . $_SESSION['member_id'] . "' ";
$objQuery = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery);

$lampSQL = "SELECT * FROM type_lamp";
$queryLamp = mysqli_query($conn, $lampSQL);

$editSQL = "SELECT * FROM location WHERE LOC_ID = ".$_GET['locId'];
mysqli_set_charset($conn, 'utf8');
$editQuery = mysqli_query($conn, $editSQL);
$editResult = mysqli_fetch_array($editQuery, MYSQLI_ASSOC);

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
                <h1>เพิ่มเสาไฟฟ้าส่องสว่าง
                  <span> </span>
                </h1>
              </div>
            </div>
          </div>

          <!-- /# column -->
        </div>
        <!-- /# row -->



        <section id="main-content">
          <form action="api_updateelectricity.php" method="post" name="form1">
            <input type="hidden" name="loc_id" value="<?php echo $editResult['LOC_ID']; ?>">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="user-profile">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="row">
                            <div class="form-group">
                              <div class="card-title">
                                <h6>รายละเอียดเสาไฟฟ้าส่องสว่าง</h6>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="input-field col l4">
                                      <select class="form-control" name="lamp_id" required>
                                        <?php
                                             while($row = $queryLamp->fetch_assoc()) {
                                             echo '<option value="'.$row['lamp_id'].'" '.($editResult['lamp_id'] == $row['lamp_id'] ? 'selected': '').'>'.$row['lamp_name'].'</option>';
                                          }
                                        ?>
                                      </select>
                                    </div>

                                    <div class="input-field col l4">
                                      <input id="latinput" type="text" name="lat"
                                        value="<?php echo $editResult['LAT']; ?>" required />
                                      <label for="icon_telephone">LAT:</label>
                                    </div>
                                    <div class="input-field col l3">
                                      <input id="lnginput" type="text" name="lng"
                                        value="<?php echo $editResult['LNG']; ?>" required />
                                      <label for="icon_telephone">LNG:</label>
                                    </div>

                                    <div class="input-field col l12">
                                      <input id="lnginput" type="text" name="details"
                                        value="<?php echo $editResult['LOC_DETAIL']; ?>" />
                                      <label for="icon_telephone">Detail:</label>
                                    </div>

                                    <div class="input-field col l12">
                                      <select class="form-control" name="village_id" required>
                                        <option value="admin_electricity_manage.php" disabled
                                          <?php echo isset($editResult['village_id']) ? "" : "selected"; ?>>เลือกหมู่บ้าน
                                        </option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 1 ? "selected" : ""; ?>>
                                          หมู่ 1 บ้านตองกาย</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 2 ? "selected" : ""; ?>>
                                          หมู่ 2 บ้านฟ่อน</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 3 ? "selected" : ""; ?>>
                                          หมู่ 3 บ้านไร่-กองขิง</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 4 ? "selected" : ""; ?>>
                                          หมู่ 4 บ้านต้นเกว๋น</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 5 ? "selected" : ""; ?>>
                                          หมู่ 5 บ้านหนองควาย</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 6 ? "selected" : ""; ?>>
                                          หมู่ 6 บ้านร้อยจันทร์</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 7 ? "selected" : ""; ?>>
                                          หมู่ 7 บ้านเหมืองกุง</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 8 ? "selected" : ""; ?>>
                                          หมู่ 8 บ้านขุนเส</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 9 ? "selected" : ""; ?>>
                                          หมู่ 9 บ้านสันทราย</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 10 ? "selected" : ""; ?>>
                                          หมู่ 10 บ้านนาบุก</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 11 ? "selected" : ""; ?>>
                                          หมู่ 11 บ้านสันป่าสัก</option>
                                        <option value="<?php echo $editResult['village_id']; ?>"
                                          <?php echo isset($editResult['village_id']) && $editResult['village_id'] == 12 ? "selected" : ""; ?>>
                                          หมู่ 12 บ้านตองกายเหนือ</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <!-- GOOGLE MAP -->
                              <div id="map" style="width:100%;height:700px;"></div>
                            </div>
                          </div>
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

                        <div class="contact-information">

                          <!-- จัดให้ฟอร์มอยู่ด้านขวา  -->
                          <div class="work-content">
                            <!------------------------>


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
            $(document).ready(function () {
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
          <script>
            function myMap() {
              var mapProp = {
                center: new google.maps.LatLng(51.508742, -0.120850),
                zoom: 5,
              };
              var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            }
          </script>

          <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV_WYNaYYPu9k86zrR-quNycJDvhcNur4&callback=initMap"
            async defer>
          </script>
</body>
<script>
  var mapOptions = {
    center: {
      lat: <?php echo $editResult['LAT']; ?> ,
      lng : <?php echo $editResult['LNG']; ?>
    },
    zoom: 14.5,
  }

  var maps
  var marker
  var markers = []

  function initMap()

  {
    maps = new google.maps.Map(document.getElementById("map"), mapOptions);

    marker = new google.maps.Marker({
      position: new google.maps.LatLng( <?php echo $editResult['LAT']; ?> , <?php echo $editResult['LNG']; ?>
        ),
      map: maps,
      draggable: false,
      animation: google.maps.Animation.DROP,
      title: `${<?php echo $editResult['LOC_ID']; ?>}`
    });


    google.maps.event.addListener(maps, 'click', function (event) {
      console.log(event.latLng)
      document.getElementById("latinput").value = event.latLng.lat();
      document.getElementById("lnginput").value = event.latLng.lng();
      DeleteMarkers();
      var location = event.latLng;

      //Create a marker and placed it on the map.
      marker = new google.maps.Marker({
        position: location,
        map: maps
      });

      markers.push(marker);

    });

  }

  function DeleteMarkers() {
    //Loop through all the markers and remove
    marker.setMap(null)
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
    }
    markers = [];
  };
</script>

</html>