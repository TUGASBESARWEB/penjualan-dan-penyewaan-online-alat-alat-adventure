<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
include "../config/config.php";
if($_SESSION['sesvalid']=="ya")
	echo "<meta http-equiv=refresh content='0;url=media.php'>";
	//header("location:media.php");
else
	echo "<meta http-equiv=refresh content='0;url=../index.php'>";
	//header("location:../index.php");
?>