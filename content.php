<?php
include "class_paging.php";
// Bagian User
$mod=$_GET['module'];
if(!isset($_GET['module']) || $mod=="home")
{
	echo "Selamat datang dihalaman administrator";
}
else
{
	if($mod=="ubahvalidasi")
		include "ubahvalidasi.php";
	else if($mod=="laporan")
		include "laporan.php";

	else if($mod=="order")
		include "order.php";
	else if($mod=="detilorder")
		include "detilorder.php";
	else if($mod=="editorder")
		include "editorder.php";
else if($mod=="inputbiaya")
		include "inputbiaya.php";	
	else if($mod=="editbiaya")
		include "editbiaya.php";
	else if($mod=="inputpekerjaan")
		include "inputpekerjaan.php";	
		
else if($mod=="galeri")
		include "galeri.php";
	else if($mod=="tambahgaleri")
		include "tambahgaleri.php";
	else if($mod=="editgaleri")
		include "editgaleri.php";		

	else if($mod=="kontak")
		include "kontak.php";
	else if($mod=="editkontak")
		include "editkontak.php";
	else if($mod=="tambahkontak")
		include "tambahkontak.php";

	else if($mod=="about")
		include "about.php";
	else if($mod=="editabout")
		include "editabout.php";
	else if($mod=="tambahabout")
		include "tambahabout.php";


		
	else if($mod=="tipepetugas")
		include "tipepetugas.php";
	else if($mod=="gantipassword")
		include "gantipassword.php";
	else if($mod=="updatepass")
		include "updatepass.php";
	else if($mod=="updateprofil")
		include "updateprofil.php";
	else if($mod=="detilrowdata")
		include "detilrowdata.php";
	else if($mod=="rowdata")
		include "rowdata.php";
	else if($mod=="editrowdata")
		include "editrowdata.php";		
	else if($mod=="update_pendaftaran")
		include "update_pendaftaran.php";		
	else if($mod=="lihatprofile")
		include "lihatprofile.php";		
	else if($mod=="gantipassword")
		include "gantipassword.php";		
		
	else
		echo "<center><p style='text-decoration:blink'><b>MODUL ".strtoupper($_GET['module'])." BELUM ADA ATAU BELUM LENGKAP</b></p></center>";
}
?>
