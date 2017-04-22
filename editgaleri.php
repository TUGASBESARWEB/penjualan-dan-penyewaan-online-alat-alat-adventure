<?php
$aksi=$_GET['aksi'];
$id=$_GET['id'];

if($aksi=="edit")
{
	$qf=mysqli_query($con,"select * from galeri where id_galeri='$id'");
	$df=mysqli_fetch_array($qf);
	?>
   <form action="?module=editgaleri&aksi=update&id=<?php echo $id;?>" method="post" enctype="multipart/form-data" name="form1">
  <h2>Edit Data Galeri </h2>
  <table border="0" cellspacing="0" cellpadding="5" class="tabel2">
    <tr>
      <td align="left" valign="top">Judul</td>
      <td align="left" valign="top"><textarea name="judul" id="judul" style="width:400px;height:80px;" required><?php echo "$df[judul_galeri]";?></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top">Gambar</td>
      <td align="left" valign="top">
      <?php
	   $gb=$df['gbr_galeri'];
	 if(!empty($gb) && file_exists("../gbr_galeri/$gb"))
	 {
		 echo"<img src='../gbr_galeri/$gb' height='150'>";
	 }
	 else
	 {
		 echo "-";
	 }
	  ?><br />
      <input type="file" name="gambar" id="gambar"></td>
    </tr>
    <tr>
      <td align="left" valign="top">Keterangan</td>
      <td align="left" valign="top"><textarea name="keterangan" id="keterangan" style="width:400px;height:80px;" required><?php echo "$df[keterangan]";?></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><input type="submit" name="button" id="button" value="Submit"></td>
    </tr>
  </table>
</form>
<?php
}
else if($aksi=="update")
{
	$judul=$_POST['judul'];
	$ket=$_POST['keterangan'];
	$gb=$_FILES['gambar']['name'];
	$tmp=$_FILES['gambar']['tmp_name'];
	
	mysqli_query($con,"update galeri set judul_galeri='$judul',keterangan='$ket' where id_galeri='$id'");
	$nm="$id-$gb";
	if(!empty($gb))
	{
		$qf=mysqli_query($con,"select * from galeri where id_galeri='$id'");
		$df=mysqli_fetch_array($qf);
		 $gb=$df['gbr_galeri'];
		 if(!empty($gb) && file_exists("../gbr_galeri/$gb"))
		 {
			 unlink("../gbr_galeri/$gb");
		 }
		move_uploaded_file("$tmp","../gbr_galeri/$nm");
		mysqli_query($con,"update galeri set gbr_galeri='$nm' where id_galeri='$id'");
	}

	echo "<meta http-equiv=refresh content='0;url=?module=galeri'>";
}
else if($aksi=="hapus")
{
	$qf=mysqli_query($con,"select * from galeri where id_galeri='$id'");
	$df=mysqli_fetch_array($qf);
	$gb=$df['gbr_galeri'];
	 if(!empty($gb) && file_exists("../gbr_galeri/$gb"))
	 {
		 unlink("../gbr_galeri/$gb");
	 }
	 mysqli_query($con,"delete from galeri where id_galeri='$id'");
	 
	echo "<meta http-equiv=refresh content='0;url=?module=galeri'>";
}
?>