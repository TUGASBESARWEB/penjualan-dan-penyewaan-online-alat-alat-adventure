<center>
	<h2>KONTAK</h2>
<div style="text-align:right">
<table width="100%" cellpadding="5" cellspacing="0"  border="1" align="center" class="tabel">
  <tr style="background-color:009900; color:#FFF">
    <th width="20">No. Urut</th><th>Tanggal</th>
    <th>Nama Kontak</th><th>Email</th><th>Pesan Kontak</th>
    <th>Tanggapan Admin</th>
   
    <th width="50">Aksi</th>
  </tr>
<?php
$qf2=mysqli_query($con,"select * from kontak $filter");
$rph=10;
$jurec=mysqli_num_rows($qf2);
$jmlhal=ceil($jurec/$rph);

if(!isset($_GET['nohal']))
	$nohal=0;
else
	$nohal=$_GET['nohal']-1;
	

$batas=$nohal*$rph;

$qf=mysqli_query($con,"select * from kontak order by id_kontak desc limit $batas,$rph");

$nmr=$batas;
while($df=mysqli_fetch_array($qf))
{
	$nmr++;
	if(($nmr%2)==0)
		$bc="style='background-color:00FFFF'";
	else
		$bc="style='background-color:white'";	
		
	$t=explode("-",$df['tgl_kontak']);	
	?>
    
  <tr <?php echo "$bc";?>>
    <td align="center" valign="top"><?php echo"$nmr";?></td>
    <td align="center" valign="top"><?php echo"$t[2]-$t[1]-$t[0]";?></td>
    <td align="left" valign="top"><?php echo"$df[nama_kontak]";?></td>
     <td align="left" valign="top"><?php echo"$df[email_kontak]";?></td>
      <td align="left" valign="top"><?php echo"$df[pesan_kontak]";?></td>
 <td align="left" valign="top"><?php echo"$df[respon_admin]";?></td>      
    <td align="center" valign="top" width="55">
      <a href="?module=editkontak&aksi=edit&id=<?php echo"$df[id_kontak]";?>"><?php fedit();?></a>
       <a href="?module=editkontak&aksi=hapus&id=<?php echo"$df[id_kontak]";?>" onclick="return konfirm('Yakin mau dihapus ?')"><?php fhapus();?></a>
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
		echo " [<a href='?module=kontak&txtcari=$txtcari&nohal=$k'>$k</a>] ";
}
echo "</center>";
}
?>

