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

$strSQL = "SELECT * FROM member WHERE member_id != '". $_SESSION['member_id'] ."'ORDER BY member_id DESC limit {$start} , {$perpage}";
mysqli_set_charset($conn, 'utf8');
$member2 = mysqli_query($conn, $strSQL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: JS Grid Table</title>

    <!-- ================= Favicon ================== -->
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
    <link href="assets/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
    <link href="assets/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

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
                                <h1>จัดการข้อมูลผู้ใช้ระบบ <span> </span></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card-title pr">
                        <div class="card-body">
                            <div class="basic-form">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ตารางสินค้าในคลัง -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <div class="row">
                       
                        <div class="col-lg-5">
                            <input class="form-control" id="myInput" type="text" placeholder="ค้นหา.."> <br>
                        </div>
                        <div class="col-lg-1">
                            <a href="admin_register.php" class="btn btn-primary btn-flat m-b-15 m-l-1 ti-plus"> เพิ่มข้อมูลผู้ใช้ระบบ </a>
                        </div>
                   </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <div>
                                        <th>รหัสพนักงาน</th>
                                    </div>
                                    <div>
                                        <th>อีเมล</th>
                                    </div>
                                    <div>
                                        <th>ชื่อ</th>
                                    </div>
                                    <div>
                                        <th>นามสกุล</th>
                                    </div>
                                    <div>
                                        <th>เพศ</th>
                                    </div>
                                    <!-- <div>
                                        <th>วันเกิด</th>
                                    </div> -->
                                    <div>
                                        <th>เบอร์โทร</th>
                                    </div>
                                    <div>
                                        <th>สถานะผู้ใช้</th>
                                    </div>
                                    <div>
                                        <th>ตรวจสอบ</th>
                                    </div>
                                    <div>
                                        <th>แก้ไข</th>
                                    </div>
                                    <div>
                                        <th>เปลี่ยนสถานะ</th>
                                    </div>
                                </tr>
                            </thead>
                            <tbody id="myTable">

                                <?php
                                while ($row = $member2->fetch_assoc()) { 
                                    echo "<tr>";

                                    '<a href="admin_report_fail2.php">
                                    <button class="btn btn-info m-b-5 m-l-1" type="button">
                                        <i class="ti-printer"></i> 
                                    </button>    </a> ' . "</td>";

                                    echo '<td>' . $row['member_id'] . '</td>';
                                    echo '<td>' . $row['member_email'] . '</td>';
                                    echo '<td>' . $row['member_fname'] . '</td>';
                                    echo '<td>' . $row['member_lname'] . '</td>';
                                    echo '<td>' . $row['member_gender'] . '</td>';
                                    // echo '<td>' . $row['member_birthdate'] . '</td>';
                                    echo '<td>' . $row['member_tel'] . '</td>';
                                    echo '<td>' . '<div style="color:'.($row['member_status'] == 0 ? "red" : "green").'">สถานะ : ' . ($row['member_status'] == 0 ? "ไม่ใช้งาน" : "ใช้งานปกติ") . '</div>' . '</td>';
                                    echo '<td>' .   '<a href="admin_edit_member.php?memberId='.$row['member_id'].'">
                                                          <button class="btn btn-primary m-b-5 m-l-1" type="button">
                                                            <i class="ti-search"></i> 
                                                          </button>    
                                                        </a> ' . "</td>";
                                    echo '<td>' .   '<a href="admin_edit_member.php?memberId='.$row['member_id'].'">
                                                        <button class="btn btn-warning m-b-5 m-l-1" type="button">
                                                            <i class = ti-pencil></i>
                                                        </button>   
                                                    </a>' . "</td>";
                                    echo '<td>    
                                                        <button class="btn btn-danger m-b-5 m-l-1" type="button"  onClick="onDelete(' . $row['member_id'] . ','.($row['member_status'] == 0 ? 1 : 0).')">
                                                            <i class="ti-trash"></i> 
                                                        </button> 
                                                </td>';

                                    // echo '<td><a href="updatewarehouse.php?stuff_id='.$revalues['stuff_id'].'"><i class="material-icons">edit</i></a></td>';
                                    // echo '<td><a href="#" onClick="onDelete('.$value['stuff_id'].')"><i class="material-icons">delete</i></a></td>';  
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
    $sql2 = "SELECT * FROM member WHERE member_id != '". $_SESSION['member_id'] ."'";
    $query2 = mysqli_query($conn, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    ?>

    <div class="col-lg-12">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                <a class="page-link" href="admin_manage_user.php?page=1" tabindex="-1">Previous</a>
                </li>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li class="page-item <?php echo $i == $page ? 'active' : '';?>"><a class="page-link" href="admin_manage_user.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
                <?php } ?>
                <li class="page-item">
                <a class="page-link" href="admin_manage_user.php?page=<?php echo $total_page; ?>">Next</a>
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


    <script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    </script>
    
    <script type="text/javascript">
        onDelete = (id, status) => {
            swal({
                    title: "คุณแน่ใจหรือไม่ที่จะเปลี่ยนสถานะ ?",
                    text: "หากแน่ใจให้กดตกลง",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "http://localhost:8000/backend/change_status_user.php?member=" + id + "&status=" + status
                    }
                });
        }
    </script>
    <!-- jquery vendor -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <!-- bootstrap -->



    <!-- JS Grid Scripts Start-->
    <script src="assets/js/lib/jsgrid/db.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.core.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.load-indicator.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.load-strategies.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.sort-strategies.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.field.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.text.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.number.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.select.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.checkbox.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.control.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid-init.js"></script>
    <!-- JS Grid Scripts End-->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->

</body>

</html>