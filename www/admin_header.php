<?php include('connect.php');
  
$member = "SELECT * FROM member INNER JOIN member_address on member.member_id = member_address.member_id 
INNER JOIN province as p on member_address.province = p.Pid
INNER JOIN district as d on member_address.district = d.Did
INNER JOIN subdistrict as sd on member_address.sub_district = sd.SDTid
WHERE member.member_id = '" . $_SESSION['member_id'] . "'";

mysqli_set_charset($conn, 'utf8');
$objMember = mysqli_query($conn, $member);
$objMemberResult = mysqli_fetch_array($objMember, MYSQLI_ASSOC);

    ?>

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
                                   if ($objMemberResult["member_typeid"] == 1) {
                                    echo "STAFF";
                                  } elseif ($objMemberResult["member_typeid"] == 2) {
                                    echo "SUPERVISOR";
                                  } elseif ($objMemberResult["member_typeid"] == 3) {
                                    echo "MUNICIPLE";
                                  } else {
                                    echo "ADMINISRATOR";
                                  }
                                ?>
                                <br>
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