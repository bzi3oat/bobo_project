
<?php ob_start() ?>
<?php
include('connect.php');
if ($_SESSION['member_id'] == "") {
    echo "Please Login!";
    exit();
}

$strSQL = "SELECT * FROM member WHERE member_id = '" . $_SESSION['member_id'] . "' ";
mysqli_set_charset($conn, 'utf8');
$objQuery = mysqli_query($conn, $strSQL);
$profile = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);


?>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="admin_profile.php">
                        <!-- <img src="assets/images/logo.png" alt="" /> -->
                        <span><span>Welcome </span>
                            <?php echo $profile["member_fname"]; ?>
                        </span></a>
                </div>

                <li class="label">จัดการข้อมูลผู้ใช้ระบบ</li>
                <li><a href="admin_profile.php"><i class="ti-user"></i> ข้อมูลส่วนตัว </a></li>
                <?php if ($_SESSION['member_typeid'] == 4) { ?>
                    <li><a class="sidebar-sub-toggle"><i class="ti-id-badge"></i> ข้อมูลผู้ใช้ระบบ <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="admin_manage_user.php">จัดการผู้ใช้ระบบ</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['member_typeid'] <= 3 || $_SESSION['member_typeid'] == 4) { ?>
                    <li class="label">ระบบกองช่าง</li>

                    <?php if ($_SESSION['member_typeid'] <= 2 || $_SESSION['member_typeid'] == 4) { ?>
                        <li><a class="sidebar-sub-toggle"><i class="ti-shine"></i> ข้อมูลเสาไฟฟ้าส่องสว่าง <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="admin_electricity_manage.php">จัดการข้อมูลเสาไฟฟ้าส่องสว่าง</a></li>
                            </ul>
                            <ul>
                                <li><a href="statistic_electricity.php">สถิติเบิกใช้วัสดุเสาไฟฟ้าส่องสว่าง</a></li>
                            </ul>
                        </li>
                    <?php } ?>



                    <li><a class="sidebar-sub-toggle"><i class="ti-alert"></i> งานซ่อมบำรุง <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                       
                        <?php if ($_SESSION['member_typeid'] <= 3) { ?>
                            <ul>
                                <li><a href="informant_datail.php">ข้อมูลการแจ้งซ่อม</a></li>
                            </ul>
                        <?php } ?>
                        <?php if ($_SESSION['member_typeid'] == 4) { ?>
                            <ul>
                                <li><a href="informant_datail3.php">ข้อมูลการแจ้งซ่อม</a></li>
                            </ul>
                        <?php } ?>
                    </li>

                    <li><a href="orders.php"><i class="ti-receipt"></i> ระบบใบสั่งซื้อ </a></li>
                <?php } ?>

                <?php if ($_SESSION['member_typeid'] <= 2) { ?>
                    <li class="label">ระบบคลังวัสดุ</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> คลังวัสดุ <span class="sidebar-collapse-icon ti-angle-down"></span></a>

                        <ul>
                            <li><a href="admin_warehouse.php">จัดการวัสดุในคลัง</a></li>
                        </ul>
                        <?php if ($_SESSION['member_typeid'] == 2) { ?>
                            <ul>
                                <li><a href="admin_electricity_lamp.php">จัดการประเภทวัสดุ</a></li>
                            </ul>
                            <ul>
                                <li><a href="admin_electricity_brand.php">จัดการประเภทยี่ห้อวัสดุ</a></li>
                            </ul>
                        <?php } ?>

                        <ul>
                            <li><a href="withdraw_history.php">ประวัติการเบิกใช้วัสดุ</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['member_typeid'] == 2 || $_SESSION['member_typeid'] == 3) { ?>
                    <li class="label">ระบบการออกรายงาน</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> ออกรายงาน <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="admin_report_complete.php">งานซ่อมที่เสร็จสิ้น</a></li>
                        </ul>
                     
                    </li>
                    </li>
                <?php } ?>
                <li><a href="logout.php"><i class="ti-close"></i> ออกจากระบบ</a></li>

            </ul>
        </div>
    </div>
</div>