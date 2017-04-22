<?php
session_start();
unset($_SESSION['user_admin'],$_SESSION['nama_admin'],$_SESSION['pass_admin'],$_SESSION['sesidunit'],$_SESSION['sesvalid']);
echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = '../'</script>";
?>
