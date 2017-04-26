<?php
if(!isset($_POST['button']))
{
	
	?>
    <?php
      //include "editormce.php";
	  ?>
   <form action="?module=tambahabout" method="post" enctype="multipart/form-data" name="form1">
  <h2>Input Data about </h2>
  <table border="0" cellspacing="0" cellpadding="5" class="tabel2">
    <tr>
      <td align="left" valign="top">Judul</td>
      <td align="left" valign="top"><textarea name="judul" id="judul" style="width:400px;height:80px;" required></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top">Gambar About</td>
      <td align="left" valign="top"><input type="file" name="gambar" id="gambar"></td>
    </tr>
    <tr>
      <td align="left" valign="top">Isi About</td>
      <td align="left" valign="top">
      <textarea name="keterangan" id="keterangan" style="width:400px;height:80px;" required></textarea></td>
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
	
	mysqli_query($con,"insert into about (judul,isi_about) values ('$judul','$ket')");
	if(mysqli_affected_rows($con)>0)
	{
		$idg=mysqli_insert_id($con);
		$nm="$idg-$gb";
		if(!empty($gb))
		{
			move_uploaded_file("$tmp","../gbr_about/$nm");
			mysqli_query($con,"update about set gambar='$nm' where id_about='$idg'");
		}
	}
	echo "<meta http-equiv=refresh content='0;url=?module=about'>";
}
?>