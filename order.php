<center>
	<h2>DAFTAR ORDER</h2>
<div style="text-align:right">
<table width="100%" cellpadding="5" cellspacing="0"  border="1" align="center" class="tabel">
  <tr style="background-color:009900; color:#FFF">
    <th width="20">No. Urut</th><th>Tanggal</th>
    <th>Nama Kontak</th>
   <th>Harga</th>
   <th>Status Order</th>
   <th>Status pembayaran</th>
  </tr>
<?php
$qf2=mysqli_query($con,"select * from orders $filter");
$rph=10;
$jurec=mysqli_num_rows($qf2);
$jmlhal=ceil($jurec/$rph);

if(!isset($_GET['nohal']))
	$nohal=0;
else
	$nohal=$_GET['nohal']-1;
	

$batas=$nohal*$rph;

$qf=mysqli_query($con,"select * from orders order by id_order desc limit $batas,$rph");

$nmr=$batas;
while($df=mysqli_fetch_array($qf))
{
	$nmr++;
	if(($nmr%2)==0)
		$bc="style='background-color:00FFFF'";
	else
		$bc="style='background-color:white'";	
		
	$t=explode("-",$df['tgl_order']);
	
	//biaya order
	$q3=mysqli_query($con,"select * from biaya where id_order='$df[id_order]'");
	$d3=mysqli_fetch_array($q3);
	$bm=$d3['biaya_material'];
	$bj=$d3['biaya_jasa'];
	$bt=$bm+$bj;
	
	//pekerjaan
	$q4=mysqli_query($con,"select * from pekerjaan where id_order='$df[id_order]'");
	$d4=mysqli_fetch_array($q4);
	$adakerja=mysqli_num_rows($q4);
	
	?>
    
  <tr <?php echo "$bc";?>>
    <td align="center" valign="top"><?php echo"$nmr";?></td>
    <td align="center" valign="top"><?php echo"$t[2]-$t[1]-$t[0]";?></td>
    <td align="left" valign="top"><?php echo"$df[nama]";?></td>
     <td align="right" valign="top"><?php
  echo number_format($bt,0,",",".").",-";
  ?></td>
  <td align="right" valign="top"><?php
  echo number_format($d3['Harga'],0,",",".").",-";
  ?></td>
  <td align="right" valign="top"><?php
  $t=explode("-",$d3['status_biaya']);
  echo ($t[2]*1)." ".$arbulan[($t[1]*1)]." ".$t[0];
  
  ?></td>
  <td align="right" valign="top"><?php
  echo number_format($d3['status_order'],0,",",".").",-";
  ?></td>
  
     <td align="left" valign="top"><?php echo"$df[status_order]";?></td>
      <td align="right" valign="top"><?php echo "$d3[status_biaya]";?></td>
  <td align="right" valign="top"><?php echo "$d4[status_pembayaran]";?></td>
 
     
     
      <td align="center" valign="top"><?php
	  $qc=mysqli_query($con,"select id_order,id_biaya from biaya where id_order='$df[id_order]'");
	  if(mysqli_num_rows($qc)>0)
	  {
		  $dc=mysqli_fetch_array($qc);
		  echo"<a href='?module=editbiaya&id=$dc[id_biaya]'>Edit</a>";
	  }
	  else
	  {
		  echo"<a href='?module=inputbiaya&id=$df[id_order]'>Input</a>";
	  }
	  ?></td> 
       <td align="center" valign="top"><?php 
	   if($adakerja<=0)
	   {
	   	echo"<a href='?module=inputpekerjaan&id=$df[id_order]'>Input</a>";
	   }
	   else
	   {
		   echo"<a href='?module=inputpekerjaan&id=$df[id_order]'>Edit</a>";
	   }
	   ?></td> 
    <td align="center" valign="top" width="55">
    <a href="?module=detilorder&id=<?php echo"$df[id_order]";?>" title="klik untuk menampilkan detil order">Detil</a>
      <a href="?module=editorder&aksi=hapus&id=<?php echo"$df[id_order]";?>" onclick="return konfirm('Yakin mau dihapus ?')">Hapus</a>
     </td>

  </tr>
<?php
}
?>
</table>
<p>&nbsp;</p>
<?php
{
	echo "<center>Halaman : ";
for($i=0;$i<$jmlhal;$i++)
{
	$k=$i+1;
	if($i==$nohal)
		echo " [<b>$k</b>] ";
	else
		echo " [<a href='?module=order&txtcari=$txtcari&nohal=$k'>$k</a>] ";
}
echo "</center>";
}
?>

