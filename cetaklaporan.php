<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
include "../config/config.php";
include "../config/variables.php";
include "editing.php";
if($_SESSION['sesvalid']!="true")
{
	die("Anda tidak bisa mengakses halaman ini.");
}
else
{
if(!empty($_POST['tgl']))
	$tgl=$_POST['tgl'];
else if(!empty($_GET['tgl']))
	$tgl=$_GET['tgl'];
else
	$tgl="";

if(!empty($_POST['tgl2']))
	$tgl2=$_POST['tgl2'];
else if(!empty($_GET['tgl2']))
	$tgl2=$_GET['tgl2'];
else
	$tgl2="";


if(!empty($_POST['bln']))
	$bln=$_POST['bln'];
else if(!empty($_GET['bln']))
	$bln=$_GET['bln'];
else
	$bln="";

if(!empty($_POST['bln2']))
	$bln2=$_POST['bln2'];
else if(!empty($_GET['bln2']))
	$bln2=$_GET['bln2'];
else
	$bln2="";


if(!empty($_POST['thn']))
	$thn=$_POST['thn'];
else if(!empty($_GET['thn']))
	$thn=$_GET['thn'];
else
	$thn="";

if(!empty($_POST['thn2']))
	$thn2=$_POST['thn2'];
else if(!empty($_GET['thn2']))
	$thn2=$_GET['thn2'];
else
	$thn2="";

if(!empty($tgl) && !empty($bln) && !empty($thn) && !empty($tgl2) && !empty($bln2) && !empty($thn2))
{
	$tanggal1="$thn-$bln-$tgl";
	$tanggal2="$thn2-$bln2-$tgl2";
	
	$filter=" and (p.tgl_selesai>='$tanggal1' && p.tgl_selesai<='$tanggal2') ";
}
else
{
	$filter="";
}
?>
<center>
	<h2>Laporan Pemesanan Modifikasi Motor</h2>
    <h3>Black And Custom Yogyakarta<br />
    Jl. Pringgolayan No. 7a Banguntapan Bantul</h3>
 <?php
 if(!empty($filter))
 {
	 echo ($tgl*1)." ".$arbulan[($bln*1)]." ".$thn." s/d ".($tgl2*1)." ".$arbulan[($bln2*1)]." ".$thn2;
 }
 ?>
 <hr />
 </center>
<table width="100%" cellpadding="5" cellspacing="0"  border="1" align="center" class="tabel">
  <tr style="background-color:009900;color:#FFFFFF">
    <th width="20">No. Urut</th><th>Tgl. Order</th><th>Nama</th><th>Alamat</th><th>Total Biaya</th><th>Tgl. Selesai</th>
    
  </tr>
<?php
//baca data satuan kerja
$qf2=mysqli_query($con,"select o.*,p.*,b.* 
				  from orders o, biaya b, pekerjaan p 
				  where b.id_order=o.id_order and p.id_order=o.id_order
				  $filter ");

$rph=10;
$jurec=mysqli_num_rows($qf2);
$jmlhal=ceil($jurec/$rph);

if(!isset($_GET['nohal']))
	$nohal=0;
else
	$nohal=$_GET['nohal']-1;
	

$batas=$nohal*$rph;

$qf=mysqli_query($con,"select o.*,p.*,b.* 
				  from orders o, biaya b, pekerjaan p 
				  where b.id_order=o.id_order and p.id_order=o.id_order
				  $filter order by o.id_order desc limit $batas,$rph");

$nmr=$batas;


$nmr=0;
while($df=mysqli_fetch_array($qf))
{
	$nmr++;
	$t=explode("-",$df['tgl_order']);
	$tglorder=($t[2]*1)." ".$arbulan[($t[1]*1)]." ".$t[0];
	
	$t=explode("-",$df['tgl_selesai']);
	$tglselesai=($t[2]*1)." ".$arbulan[($t[1]*1)]." ".$t[0];
	
	$totalbiaya=$df[biaya_material]+$df[biaya_jasa];
	
	if(($nmr%2)==0)
		$bc="style='background-color:00FFFF'";
	else
		$bc="style='background-color:white'";	
	?>
    
  <tr <?php echo "$bc";?>>
    <td align="center" valign="top"><?php echo"$nmr";?></td>
    <td align="center" valign="top"><?php echo "$tglorder";?></td>
    <td align="left" valign="top"><?php echo"$df[nama]";?></td>
    <td align="left" valign="top"><?php echo"$df[alamat]";?></td>
        <td align="right" valign="top"><?php echo number_format($totalbiaya,0,",",".").",-";?></td>
    <td align="center" valign="top"><?php echo "$tglselesai";?></td>
  </tr>
<?php
}
?>
</table>
<table border="0" align="right" cellspacing="0" cellpadding="5">
  <tr>
    <td align="center"><?php echo "Yogyakarta, ".date("d-m-Y");?>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    Kelik Christian Toro
    </td>
  </tr>
</table>
<p>
  <?php
}
?>
</p>
<script>
window.print() 
</script>
