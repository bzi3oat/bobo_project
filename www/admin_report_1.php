<?php
include("connect.php");
?>

<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

<style type="text/css">
    < !-- @page rotated {
        size: landscape;
    }

    .style1 {
        font-family: "TH SarabunPSK";
        font-size: 18pt;
        font-weight: bold;
    }

    .style2 {
        font-family: "TH SarabunPSK";
        font-size: 16pt;
        font-weight: bold;
    }

    .style3 {
        font-family: "TH SarabunPSK";
        font-size: 16pt;

    }

    .style5 {
        cursor: hand;
        font-weight: normal;
        color: #000000;
    }

    .style9 {
        font-family: Tahoma;
        font-size: 12px;
    }

    .style11 {
        font-size: 12px
    }

    .style13 {
        font-size: 9
    }

    .style16 {
        font-size: 9;
        font-weight: bold;
    }

    .style17 {
        font-size: 12px;
        font-weight: bold;
    }

    -->
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>

<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
</head>

<body>
    <div class=Section2>

        <table width="704" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="291" align="left"><span class="style2">คำร้องขอซ่อมแซมไฟฟ้าสาธารณะ<br>เทศบาลตำบลหนองควาย</span></td>
            </tr>

            <tr>
                <td height="27" align="right"><span class="style5">วันที่ .. เดือน .. พ.ศ. ..<br> </span></td>
            </tr>

            <tr>
                <td width="291" align="left"><span class="style5">เรื่อง ขอซ่อมแซมไฟฟ้าสาธารณะ <br> </span></td>
            </tr>
            <tr>
                <td width="291" align="left"><span class="style5">เรียน นายกเทศมนตรีเทศบาลตำบลหนองควาย <br> </span></td>
            </tr>
            <tr>
                <td width="291" align="left"><span class="style5">ข้าพเจ้า ..................................... ตำแหน่ง ....... หมู่ที่ ....... <br> บ้าน ......... </span></td>
            </tr>
        </table>


        <table width="200" border="0" align="center">
            <tbody>
                <tr>
                    <td align="center">&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <table bordercolor="#424242" width="1141" height="78" border="1" align="center" cellpadding="0" cellspacing="0" class="style3">
            <tr align="center">
                <td width="44" height="23" align="center" bgcolor="#D5D5D5"><strong>ลำดับ</strong></td>
                <td width="44" height="23" align="center" bgcolor="#D5D5D5"><strong>รหัส</strong></td>
                <td width="178" align="center" bgcolor="#D5D5D5"><strong>ชื่อ-นามสกุล</strong></td>
                <td width="123" align="center" bgcolor="#D5D5D5"><strong>เพศ</strong></td>
                <td width="155" align="center" bgcolor="#D5D5D5"><strong>วันเกิด</strong></td>
                <td width="139" align="center" bgcolor="#D5D5D5"><strong>เลขบัตรประชาชน</strong></td>
                <td width="114" align="center" bgcolor="#D5D5D5"><strong>ที่อยู่</strong></td>
                <td width="103" align="center" bgcolor="#D5D5D5"><strong>เบอร์โทรศัพท์</strong></td>
                <td width="104" align="center" bgcolor="#D5D5D5"><strong>วันที่เป็นสมาชิก</strong></td>
                <td width="161" align="center" bgcolor="#D5D5D5"><strong>วันที่ลาออก</strong></td>
            </tr>

            <?php
            $objConnect = mysqli_connect("localhost", "root", "1234") or die("Error Connect to Database");
            $objDB = mysqli_select_db("satcha");
            mysqli_query("set NAMES'UTF8'"); // set อักขระให้เป็น Utf8  เพิ่มตรงนี้เลยครับ   รับรองได้ชัวครับ
            $strSQL = "SELECT * FROM member";
            $objQuery = mysqli_query($strSQL);
            $resultData = array();
            for ($i = 0; $i < mysqli_num_rows($objQuery); $i++) {
                $result = mysqli_fetch_array($objQuery);
                array_push($resultData, $result);
            }
            ?>
            <tr>
                <td align="right" class="style3"><?php echo $result['$i']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_id']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_fname']; ?>
                    <?php echo $result['m_lname']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_sex']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_birth']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_iden']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_add']; ?>
                    ม.<?php echo $result['m_moo']; ?>
                    ต.<?php echo $result['m_tambon']; ?>
                    อ.<?php echo $result['m_amphor']; ?>
                    จ.<?php echo $result['m_province']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_tel']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_issdate']; ?></td>
                <td align="right" class="style3"><?php echo $result['m_expdate']; ?></td>
                <td align="center" class="style3"></td>
            </tr>



        </table>
        <table width="200" border="0">
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>
<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', ''); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="../fpdf/MyPDF/MyPDF.pdf">คลิกที่นี้</a>