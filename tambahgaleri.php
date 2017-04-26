<?php
if(!isset($_POST['button']))
{
	?>
   <form action="?module=tambahgaleri" method="post" enctype="multipart/form-data" name="form1">
  <h2>Input Data Galeri </h2>
  <table border="0" cellspacing="0" cellpadding="5" class="tabel2">
    <tr>
      <td align="left" valign="top">Judul</td>
      <td align="left" valign="top"><textarea name="judul" id="judul" style="width:400px;height:80px;" required></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top">Gambar</td>
      <td align="left" valign="top"><input type="file" name="gambar" id="gambar"></td>
    </tr>
    <tr>
      <td align="left" valign="top">Keterangan</td>
      <td align="left" valign="top"><textarea name="keterangan" id="keterangan" style="width:400px;height:80px;" required></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><input type="submit" name="button" id="button" value="Submit"></td>
    </tr>
  </table>
</form>
<?php
}
else
{
	$judul=$_POST['judul'];
	$ket=$_POST['keterangan'];
	$gb=$_FILES['gambar']['name'];
	$tmp=$_FILES['gambar']['tmp_name'];
	
	mysqli_query($con,"insert into galeri (judul_galeri,keterangan) values ('$judul','$ket')");
	if(mysqli_affected_rows($con)>0)
	{
		$idg=mysqli_insert_id($con);
		$nm="$idg-$gb";
		if(!empty($gb))
		{
			move_uploaded_file("$tmp","../gbr_galeri/$nm");
			mysqli_query($con,"update galeri set gbr_galeri='$nm' where id_galeri='$idg'");
		}
	}
	echo "<meta http-equiv=refresh content='0;url=?module=galeri'>";
}
?>