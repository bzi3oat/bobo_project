<?php
session_start();
include('connect.php');

$strSQL = "SELECT * FROM member WHERE member_id = '" . $_SESSION['member_id'] . "' ";
mysqli_set_charset($conn, 'utf8');

$objQuery = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
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
                                <h1>เพิ่มผู้ใช้ใหม่เข้าสู่ระบบ <span> </span></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="insert_register.php" method="post" name="form1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h6>รายละเอียดสมาชิก</h6>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-field col s4">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input class="fname" type="text" name="member_fname" required />
                                                <label for="icon_prefix">ชื่อ</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <input class="lname" type="text" name="member_lname" required />
                                                <label for="icon_telephone">นามสกุล</label>
                                            </div>


                                            <div class="input-field col s2">
                                                <label>
                                                    <input type="radio" name="member_gender" value="ชาย" />
                                                    <span>เพศชาย</span>
                                                </label>
                                            </div>
                                            <div class="input-field col s2">
                                                <label>
                                                    <input type="radio" name="member_gender" value="หญิง" />
                                                    <span>เพศหญิง</span>
                                                </label>
                                            </div>


                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-field col s6">
                                                <i class="material-icons prefix">email</i>
                                                <input id="email" name="member_email" type="email" class="validate" required>
                                                <label for="email">Email</label>
                                            </div>

                                            <div class="input-field col s3">
                                                <i class="material-icons prefix">vpn_key</i>
                                                <input id="password" name="Password" type="password" class="validate" required>
                                                <label for="password">Password</label>
                                            </div>

                                            <div class="input-field col s3">

                                                <input id="password" name="conPassword" type="password" class="validate" required>
                                                <label for="password">Confirm Password</label>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-field col s4">
                                                <i class="material-icons prefix">contact_mail</i>
                                                <input class="id_card" type="text" name="member_id_card" size="40" value="" OnKeyPress="return chkNumber(this)" maxlength="13" onkeyup="javascript:controlchars(this,alpha);" required />
                                                <label for="icon_prefix">หมายเลขบัตรประชาชน</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <i class="material-icons prefix">local_phone</i>
                                                <input id="member_tel" type="text" class="validate" name="member_tel" maxlength="11" onkeyup="autoTab(this)" OnKeyPress="return chkNumber(this)" required>
                                                <label for="member_tel">เบอร์โทร</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <i class="material-icons prefix">date_range</i>
                                                <label for="member_tel">วันเกิด</label>
                                                <input type="text" name="member_birthdate" id="datepicker" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-field col s3">
                                                <i class="material-icons prefix">home</i>
                                                <textarea class="materialize-textarea" name="house_number"></textarea>
                                                <label for="textarea1">บ้านเลขที่</label>
                                            </div>
                                            <div class="input-field col s2">
                                                <textarea class="materialize-textarea" name="soi"></textarea>
                                                <label for="textarea1">ซอย</label>
                                            </div>
                                            <div class="input-field col s2">
                                                <textarea class="materialize-textarea" name="moo"></textarea>
                                                <label for="textarea1">หมู่</label>
                                            </div>
                                            <div class="input-field col s5">
                                                <textarea class="materialize-textarea" name="road"></textarea>
                                                <label for="textarea1">ถนน</label>
                                            </div>

                                            <div class="input-field col s3">
                                                <i class="material-icons prefix"> </i>
                                                <select name="province_id" id="provincedd" onChange="change_province(this)">
                                                    <?php
                                                    $res = mysqli_query($conn, "SELECT * FROM province");
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        ?>
                                                        <option value="<?php echo $row["Pid"]; ?>"><?php echo $row["Pname_th"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                                <label> จังหวัด </label>
                                            </div>

                                            <div class="input-field col s3">
                                                <i class="material-icons prefix"> </i>
                                                <select name="district_id" id="district" onChange="change_district(this)">
                                                </select>
                                                <label> อำเภอ </label>
                                            </div>

                                            <div class="input-field col s3">
                                            <i class="material-icons prefix"> </i>
                                                <select name="subdistrict_id" id="subdistrict">
                                                </select>
                                                <label> ตำบล </label>
                                            </div>

                                            <div class="input-field col s2">
                                                <textarea class="materialize-textarea" name="postal_code"></textarea>
                                                <label for="textarea1">รหัสไปรษณีย์</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="input-field col s3">
                                                <i class="material-icons prefix">people</i>
                                                <label>สถานะผู้ใช้งาน </label>
                                            </div>
                                            <div class="input-field col s2">
                                                <label>
                                                    <input name="member_typeid" type="radio" value="1" />
                                                    <span>เจ้าหน้าที่</span>
                                                </label>
                                            </div>
                                            <div class="input-field col s2">
                                                <label>
                                                    <input name="member_typeid" type="radio" value="2" />
                                                    <span>หัวหน้างาน</span>
                                                </label>
                                            </div>
                                            <div class="input-field col s2">
                                                <label>
                                                    <input name="member_typeid" type="radio" value="3" />
                                                    <span>ปลัดเทศบาล</span>
                                                </label>
                                            </div>
                                            <div class="input-field col s2">
                                                <label>
                                                    <input name="member_typeid" type="radio" value="4" />
                                                    <span>ผู้ดูแลระบบ</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="card-body">

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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>

<script>
    $(document).ready(function() {
        $('input#input_text, textarea#textarea2').characterCounter();
        $('select').formSelect();
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            yearRange: [1950,2020]
        });
        change_province($('#provincedd option:selected'))
    });

    change_province = (value) => {
        $.ajax({
            type: "post",
            url: "backend/district.php",
            data: {
                "PId": value.value || value.val()
            },
            dataType: "json",
            success: function(result) {
                $('#district')
                    .empty()
                if(result.length > 0) {
                    $.each(result, function(key, value) {
                    $('#district')
                        .append($(`<option></option>`)
                            .attr("value", value.Did)
                            .text(value.Dname_th));
                })
                }
                $("#district").formSelect()
                change_district($('#district option:selected'))
            },
            error: function(err) {
                console.log(err)
            }

        });
    }

    change_district = (value) => {
        $.ajax({
            type: "post",
            url: "backend/subdistrict.php",
            data: {
                "DId": value.value || value.val()
            },
            dataType: "json",
            success: function(result) {
                $('#subdistrict')
                    .empty()
                if(result.length > 0) {
                    $.each(result, function(key, value) {
                    $('#subdistrict')
                        .append($(`<option></option>`)
                            .attr("value", value.SDTid)
                            .text(value.SDTname_th));
                })
                }
                $("#subdistrict").formSelect()
            },
            error: function(err) {
                console.log(err)
            }

        });
    }
</script>

</html>