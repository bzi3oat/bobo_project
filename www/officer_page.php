<?php
session_start();
include('connect.php');
if ($_SESSION['member_id'] == "") {
  echo "Please Login!";
  exit();
}

if ($_SESSION['member_typeid'] != "1") {
  echo "This page for User only!";
  exit();
}

$strSQL    = "SELECT * FROM member WHERE UserID = '" . $_SESSION['UserID'] . "' ";
$objQuery  = mysqli_query($strSQL);
$objResult = mysqli_fetch_array($objQuery);
?>
<html>

<head>
  <title>ThaiCreate.Com Tutorials</title>
</head>

<body>
  Welcome to User Page! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["Username"]; ?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Name</td>
        <td><?php echo $objResult["Name"]; ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="edit_profile.php">Edit</a><br>
  <br>
  <a href="logout.php">Logout</a>
</body>

</html>