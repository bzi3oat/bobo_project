<?php
include('connect.php');
$today_date = date('Y-m-d');
$strSQL = "";
if (isset($_GET['amphur'])) {
    $strSQL = "SELECT * FROM location WHERE village_id = " . $_GET['amphur'];
} else {
    $strSQL = "SELECT * FROM location";
}
mysqli_set_charset($conn, 'utf8');
$objQuery = mysqli_query($conn, $strSQL);
$latLng = array();
while ($row = mysqli_fetch_array($objQuery)) {
    $data = array($row['LOC_NAME'], $row['LOC_ID'], $row['LAT'], $row['LNG']);
    array_push($latLng, $data);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แจ้งเหตุขัดข้องเสาไฟฟ้าส่องสว่าง</title>
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
        /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 500px;
            width: 600px;
        }


        .li-test li {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .li-test ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        .li-test li {
            float: left;
        }

        .li-test li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        .li-test li a:hover {
            background-color: #111;
        }

        .container btm {
            margin: 0 auto;
        }

        .box {
            padding: 30px;
            text-align: center;
            /* สไตล์สำหรับจัดให้อยู่กึ่งกลาง */
           

            }
    </style>

</head>

<body>

    <?php
    include("visitor_sidebar.php");
    ?>
    <!-- ---- -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>แจ้งเหตุขัดข้องเสาไฟฟ้าส่องสว่าง <span> </span></h1>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ระบุตำแหน่งเสาไฟฟ้าขัดข้อง -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title pr">
                            <h6>ระบุตำแหน่งเสาไฟฟ้าที่ขัดข้อง</h6>
                            <div class="row">
                                <div class="form-group">
                                    <label></label>
                                    <select class="form-control" required onchange="location = this.value">
                                        <option value="visitor_index.php" disabled selected>เลือกหมู่บ้าน</option>
                                        <option value="visitor_index.php?amphur=1">หมู่ 1 บ้านตองกาย</option>
                                        <option value="visitor_index.php?amphur=2">หมู่ 2 บ้านฟ่อน</option>
                                        <option value="visitor_index.php?amphur=3"">หมู่ 3 บ้านไร่-กองขิง</option>
                                        <option value="visitor_index.php?amphur=4"">หมู่ 4 บ้านต้นเกว๋น</option>
                                        <option value="visitor_index.php?amphur=5"">หมู่ 5 บ้านหนองควาย</option>
                                        <option value="visitor_index.php?amphur=6"">หมู่ 6 บ้านร้อยจันทร์</option>
                                        <option value="visitor_index.php?amphur=7"">หมู่ 7 บ้านเหมืองกุง</option>
                                        <option value="visitor_index.php?amphur=8"">หมู่ 8 บ้านขุนเส</option>
                                        <option value="visitor_index.php?amphur=9"">หมู่ 9 บ้านสันทราย</option>
                                        <option value="visitor_index.php?amphur=10"">หมู่ 10 บ้านนาบุก</option>
                                        <option value="visitor_index.php?amphur=11"">หมู่ 11 บ้านสันป่าสัก</option>
                                        <option value="visitor_index.php?amphur=12"">หมู่ 12 บ้านตองกายเหนือ</option>
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <!-- GOOGLE MAP -->
                            <div id="map" style="width:100%;height:700px;"></div>
                        
                        </div>
                    </div>
                </div>

                <form action="backend/insert_declaration.php" method="post" name="form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h6>รายละเอียดข้อมูลการแจ้งซ่อม</h6>
                                    
                                    
                                    <div class="row">
                                        <div class="input-field col s5">
                                            <i class="material-icons prefix">home</i>
                                            <input id="saofai_id" type="text" name="saofai_id" readonly>
                                        </div>

                                     
                                    </div>
                                    
                                    <div class="row">
                                        <div class="input-field col s5">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="icon_prefix" type="text" class="validate" name="Informate_fname" maxlength="50" required>
                                            <label for="icon_prefix">ชื่อ</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <input id="icon_telephone" type="tel" class="validate" name="Informate_lname" maxlength="50" required>
                                            <label for="icon_telephone">นามสกุล</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s5">
                                            <i class="material-icons prefix">credit_card</i>
                                            <input id="icon_prefix" type="text" class="validate" name="informant_id_card" OnKeyPress="return chkNumber(this)" maxlength="13" required>
                                            <label for="icon_prefix">หมายเลขบัตรประชาชน</label>
                                        </div>

                                        <div class="input-field col s5">
                                            <i class="material-icons prefix">local_phone</i>
                                            <input id="icon_prefix" type="text" class="validate" name="informant_tel" onkeyup="autoTab(this)" OnKeyPress="return chkNumber(this)" maxlength="11" required>
                                            <label for="icon_prefix">เบอร์โทร</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">format_align_left</i>
                                            <textarea id="textarea1" class="materialize-textarea" name="repairing_detail"></textarea>
                                            <label for="textarea1">รายละเอียดอื่นๆ อาการขัดข้อง</label>
                                        </div>
                                    </div>
                                    
                                <div class="card-body">

                                </div>
                            </div>
                        </div>

                        <!-- SUBMIT FORM BUTTON -->
                        <div class="box">
                       
                            <div class="col-s-4">
                                <button class="btn btn-#ffa726 orange lighten-1 btn-large" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button> &nbsp;&nbsp;&nbsp;
                            
                           
                                <button class="btn #757575 grey darken-1 btn-large" type="reset" name="action"> Reset
                                </button>
                            </div>
                        </div>
      
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="footer">
                        <!-- <p>2019 © copyright - <a href="#">B. </a></p> -->
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV_WYNaYYPu9k86zrR-quNycJDvhcNur4&callback=initMap" async defer>
    </script>

</body>
<script>

    $( document ).ready(function() {
        getLamp($('#village option:selected'))
    });

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

        var locations = [<?php
            foreach ($latLng as $value) {
                echo '[\'' . $value['0'] . '\',\'' . $value['1'] . '\',' . $value['2'] . ',' . $value['3'] . ']';
                echo ',';
            }
        ?>];

        var marker
        var maps
        
        function initMap()
        {
                                    var mapOptions = {
                                        center: {
                                            lat: locations[0]['2'],
                                            lng: locations[0]['3']
                                        },
                                        zoom: 14.5,
                                    }
                                    maps = new google.maps.Map(document.getElementById("map"), mapOptions);
           

                                    var infowindow = new google.maps.InfoWindow();
                                    
                                    for (let i = 0; i < locations.length; i++) {
                                        const title = locations[i]['1']
                                        marker = new google.maps.Marker({
                                            position: new google.maps.LatLng(locations[i]['2'], locations[
                                                i]['3']),
                                            map: maps,
                                            draggable: false,
                                            animation: google.maps.Animation.DROP,
                                            title: `${title}`
                                        });

                                        google.maps.event.addListener(marker, 'click', (function(marker, si) {
                                            return function() {
                                                infowindow.setContent('<div id="content">'+
                                        '<div id="siteNotice">'+
                                        '</div>'+
                                                '<div id="bodyContent">'+
                                                `<p><b>รหัสเสาไฟ :</b>${title}<br> ` +
                                                `<b>ชนิดหลอดไฟ :</b>${locations[i]['2']}<br>`+
                                                `<b>LAT :</b>${locations[i]['2']}<br>`+
                                                `<b>LNG :</b>${locations[i]['3']}<br>`+
                                                `<b>ปรับปรุงครั้งล่าสุด :</b> <br>`+
                                                `<b>รายละเอียดการซ่อม :</b> sandstone rock formation in the southern part of the  <br>`+
                                        `<br><button class="btn btn-#ffa726 orange lighten-1 btn-block" onclick="onClickMarker('${title}')">เลือก</button>`+
                                        '</div>'+
                                        '</div>');
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                }
        currentLocation() // show current location
    }

    currentLocation = () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, returnStatusLocationPermission);
        } else { 
            alert("กรุณาเปิดให้เบาร์เซอร์สามารถเข้าถึงตำแหน่งของคุณได้ !!!");
        }
    }

    showPosition = (position) => {
  
        maps.setCenter({
            lat : position.coords.latitude,
		lng : position.coords.longitude
        })
        
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(position.coords.latitude,position.coords.longitude),
            map: maps,
            title: "ตำแหน่งของฉัน",
            icon: 'images/current-location-icon.png'
        });

        var currentLocationInfoWindow = new google.maps.InfoWindow({
          content: "คุณอยู่ที่นี่",
          maxWidth: 300
        });
        currentLocationInfoWindow.open(maps, marker);

        google.maps.event.addListener(marker, "click", function() {
            currentLocationInfoWindow.setContent("ตำแหน่งของฉัน");
            currentLocationInfoWindow.open(maps, this);
        });

        marker.setMap(maps)
    }

    returnStatusLocationPermission = (error) => {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.")
            break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.")
            break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.")
            break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.")
            break;
        }
    }

    function onClickMarker(saofaiID) {
        $('#saofai_id').val(saofaiID)
    }
</script>

</html>