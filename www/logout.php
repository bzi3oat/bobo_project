<?php
	session_start();
	session_destroy();
	header("location:visitor_index.php");
?>