<?php
	session_start();
	if($_SESSION['member_id'] == " ")
	{
		echo "Please Login!";
		exit();
	}
	mysql_connect("localhost","root","");
	mysql_select_db("electricity");
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "รหัสผ่านไม่ตรงกัน!";
		exit();
	}
	$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."' 
	,Name = '".trim($_POST['txtName'])."' WHERE member_id = '".$_SESSION["member_id"]."' ";
	$objQuery = mysql_query($strSQL);
	
	echo "บันทึกเสร็จสิ้น!<br>";		
	
	if($_SESSION["member_typeid"] == "1")
	{
		echo "<br> Go to <a href='admin_page.php'>หน้าหลัก</a>";
	}
	elseif ($_SESSION["member_typeid"] == "2") 
	{
		echo "<br> Go to <a href='user_page.php'>Done 2</a>";
	}  
	elseif ($_SESSION["member_typeid"] == "3") 
	{
		echo "<br> Go to <a href='	'>Done 2</a>";
	} 
	else 
	{
		echo "<br> Go to <a href='	'>Done 3</a>";
	}
	
	mysql_close();
