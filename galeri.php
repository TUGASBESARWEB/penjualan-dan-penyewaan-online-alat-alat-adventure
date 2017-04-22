<center>
	<h2>Galeri</h2>
<?php
if(!empty($_POST['button']))
 	$button=$_POST['button'];
else if(!empty($_GET['button']))
	$button=$_GET['button'];
else
	$button="";


if(!empty($_POST['txtcari']))
 	$txtcari=$_POST['txtcari'];
else if(!empty($_GET['txtcari']))
	$txtcari=$_GET['txtcari'];
else
	$txtcari="";

if(!empty($txtcari) && ($button=="Cari"))
{
	$filter=" where judul_galeri like '%$txtcari%'";
}
else
{
	$filter="";
}

?>	
    
<form method="post" action="?module=galeri">
  <table border="0" cellspacing="0" cellpadding="5" class="tabel">
    <tr>
      <td colspan="2">Filter Row Data Galeri</td>
      </tr>
    <tr>
      <td>ketik judul</td>
      <td><input name="txtcari" type="text" id="txtcari" size="40" value="<?php echo "$txtcari";?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="button" type="submit" id="button" value="Cari" />
        <input type="submit" name="button" id="button" value="Semua" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</center>

<div style="text-align:right">
<table width="100%" cellpadding="5" cellspacing="0"  border="1" align="center" class="tabel">
  <tr style="background-color:009900; color:#FFF">
    <th width="20">No. Urut</th><th>Judul</th>
    <th width=40>Gambar</th><th>Keterangan</th>
   
    <th width="50">Aksi</th>
  </tr>
<?php
$qf2=mysqli_query($con,"select * from galeri $filter");
$rph=10;
$jurec=mysqli_num_rows($qf2);
$jmlhal=ceil($jurec/$rph);

if(!isset($_GET['nohal']))
	$nohal=0;
else
	$nohal=$_GET['nohal']-1;
	

$batas=$nohal*$rph;

$qf=mysqli_query($con,"select * from galeri $filter order by id_galeri desc limit $batas,$rph");

$nmr=$batas;
while($df=mysqli_fetch_array($qf))
{
	$nmr++;
	if(($nmr%2)==0)
		$bc="style='background-color:00FFFF'";
	else
		$bc="style='background-color:white'";	
	?>
    
  <tr <?php echo "$bc";?>>
    <td align="center" valign="top"><?php echo"$nmr";?></td>
    <td align="left" valign="top"><?php echo"$df[judul_galeri]";?></td>
     <td align="center" valign="top"><?php
	 $gb=$df['gbr_galeri'];
	 if(!empty($gb) && file_exists("../gbr_galeri/$gb"))
	 {
		 echo"<img src='../gbr_galeri/$gb' height='40'>";
	 }
	 else
	 {
		 echo "-";
	 }
	 ?></td>
    <td align="left" valign="top"><?php echo"$df[keterangan]";?></td>
    <td align="center" valign="top" width="55">
      <a href="?module=editgaleri&aksi=edit&id=<?php echo"$df[id_galeri]";?>"><?php fedit();?></a>
       <a href="?module=editgaleri&aksi=hapus&id=<?php echo"$df[id_galeri]";?>" onclick="return konfirm('Yakin mau dihapus ?')"><?php fhapus();?></a>
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
		echo " [<a href='?module=galeri&txtcari=$txtcari&nohal=$k'>$k</a>] ";
}
echo "</center>";
}
?>

