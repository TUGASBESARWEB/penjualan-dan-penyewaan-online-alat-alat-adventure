<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
include "../config/config.php";
include "../config/variables.php";
include "editing.php";
if($_SESSION['sesvalid']!="true")
{
echo "<meta http-equiv=refresh content='0;url=../index.php'>";}
else{
?>
<html>
<head>
<title>all adventure</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">  
	<div id="menu">
		<div class="left">
		 <ul>
        <li><a href=?module=home>Beranda</a></li>
         <li><a>Master Data  &raquo;</a>
        <ul>
            <li><a href='?module=tambahgaleri'>Galeri</a></li>
            <li><a href='?module=tambahabout'>About</a></li>
         </ul>
		</li>
        <li><a href=?module=galeri>Galeri</a></li>
        <li><a href=?module=kontak>Kontak</a></li>
                <li><a href=?module=about>Tentang Kami</a></li>
        <li><a href=?module=order>Order</a></li>
         <li><a href=?module=laporan>Laporan</a></li>
                  
        <li><a  href='?module=lihatprofile'>Profil Pribadi</a></li>

        </ul>
		</div>
		<div class="right">
		 <ul class="topmenu">
         
		  <li> <a href=logout.php>Logout - [<?php echo $_SESSION['sesnama'];?>]</a></li></ul>
		</div>
	</div>
</div>
<div id="wrap">
  <div id="content" style="min-height:400px">
		<?php include "content.php"; ?>
  </div>
	<div id="footer">
			Copyright@AllAdventure 2017
    </div>
</div>
</body>
</html>
<?php
}
?>
