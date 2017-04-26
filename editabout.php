<?php
$aksi=$_GET['aksi'];
$id=$_GET['id'];

if($aksi=="edit")
{
	$qf=mysqli_query($con,"select * from about where id_about='$id'");
	$df=mysqli_fetch_array($qf);
	?>
   <form action="?module=editabout&aksi=update&id=<?php echo $id;?>" method="post" enctype="multipart/form-data" name="form1">
  <h2>Edit Data About </h2>
  <table border="0" cellspacing="0" cellpadding="5" class="tabel2">
    <tr>
      <td align="left" valign="top">Judul About</td>
      <td align="left" valign="top"><textarea name="judul" id="judul" style="width:400px;height:80px;" required><?php echo "$df[judul]";?></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top">Gambar </td>
      <td align="left" valign="top">
      <?php
	   $gb=$df['gambar'];
	 if(!empty($gb) && file_exists("../gbr_about/$gb"))
	 {
		 echo"<img src='../gbr_about/$gb' height='150'>";
	 }
	 else
	 {
		 echo "-";
	 }
	  ?><br />
      <input type="file" name="gambar" id="gambar"></td>
    </tr>
    <tr>
      <td align="left" valign="top">Isi About</td>
      <td align="left" valign="top"><textarea name="keterangan" id="keterangan" style="width:400px;height:80px;" required><?php echo "$df[isi_about]";?></textarea></td>
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
	
	mysqli_query($con,"update about set judul='$judul',isi_about='$ket' where id_about='$id'");
	$nm="$id-$gb";
	if(!empty($gb))
	{
		$qf=mysqli_query($con,"select * from about where id_about='$id'");
		$df=mysqli_fetch_array($qf);
		 $gb=$df['gambar'];
		 if(!empty($gb) && file_exists("../gbr_about/$gb"))
		 {
			 unlink("../gbr_about/$gb");
		 }
		move_uploaded_file("$tmp","../gbr_about/$nm");
		mysqli_query($con,"update about set gambar='$nm' where id_about='$id'");
	}

	echo "<meta http-equiv=refresh content='0;url=?module=about'>";
}
else if($aksi=="hapus")
{
	$qf=mysqli_query($con,"select * from about where id_about='$id'");
	$df=mysqli_fetch_array($qf);
	$gb=$df['gambar'];
	 if(!empty($gb) && file_exists("../gbr_about/$gb"))
	 {
		 unlink("../gbr_about/$gb");
	 }
	 mysqli_query($con,"delete from about where id_about='$id'");
	 
	echo "<meta http-equiv=refresh content='0;url=?module=about'>";
}
?>