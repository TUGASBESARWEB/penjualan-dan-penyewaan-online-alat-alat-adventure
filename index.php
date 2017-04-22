<?php
error_reporting(0);
session_start();
include "config/koneksi.php";
include "config/config.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>all adventure</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--slider-->
<script src="js/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/superfish.js"></script>
</head>
<body>
<div class="wrap"> 
	 <div class="total">
		<div class="header">
			<div class="header-bot">
				<div class="logo">
					<a href="index.php"><img src="images/logo.jpg" height="140" align="middle"/><br><span style="font-size:22pt;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif">ALL ADVENTURE</span></a>
                   <!--
                    <br><br>Jl. Pringgolayan No. 7a Banguntapan Bantul
                    -->
				</div>
				<div class="f-right">
					<p class="welcome-msg">Selamat Datang Di All Adventure</p>
					<div class="clear"></div>
					<ul class="links">
                        <li class="first"><a href="?page=pesan" title="My Account">Pesan</a></li>
                        <li><a href="?page=daftarpesanan" title="My Cart" class="top-link-cart">Daftar Pesanan</a></li>
                        <li class=" last"><a href="?page=login" title="Log In">Log In</a></li>
           			</ul>
				</div>
				<div class="clear"></div> 
			</div>
		</div>	
		<div class="header_bottom">
			  <div class="menu">
			     	<ul>
					   	<li class="active"><a href="index.php">BERANDA</a></li>
                        <li><a href="?page=about">ABOUT</a></li>
					   	<li><a href="?page=galeri">GALERI</a></li>
					    <li><a href="?page=kontak">KONTAK</a></li>
					    <div class="clear"></div>
		     		</ul>
			    </div>
			    <div class="search_box">
			     	<form method="post" action="?page=daftarpesanan">
			     		<input type="text" name="txtcari" placeholder="ketik nomor pemesanan"><input type="submit" value="">
			     	</form>
			    </div>
	     	<div class="clear"></div>
	     </div>
	<?php
    
		?>
        <div class="banner">
        
	
       <?php
	   
	?>
       <div class="clear"></div> 
    </div>
    <div class="mian">
	<?php
	
	$page=$_GET['page'];
	if(empty($page))
	{
		include "galeri.php";
		
	}
	else
	{
		include "$page.php";
	}
	
	?>
		 
    </div>
 	<div class="footer">
	<?php
	include "footer.php";
	?>
   </div>
</div>
</body>
</html>

    	
    	
            