<?php
$id=$_GET['id'];
$aksi=$_GET['aksi'];

if($aksi=="edit")
{
	$q=mysqli_query($con,"select * from kontak where id_kontak='$_GET[id]'");
	$d=mysqli_fetch_array($q);
	$t=explode("-",$d['tgl_kontak']);
	?>
<form name="form1" method="post" action="?module=editkontak&aksi=update&id=<?php echo "$_GET[id]";?>">
  <h2>EDIT KONTAK
  </h2>
  <table border="0" cellspacing="0" cellpadding="5" class="tabel">
    <tr>
      <td align="left" valign="top">Tanggal</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><?php echo ($t[2]*1)." ".$arbulan[($t[1]*1)]." ".$t[0];?></td>
    </tr>
    <tr>
      <td align="left" valign="top">Nama</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><?php echo "$d[nama_kontak]";?>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Email</td>
      <td align="left" valign="top">:</td>
<td align="left" valign="top"><?php echo "$d[email_kontak]";?>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Pesan</td>
      <td align="left" valign="top">:</td>
<td align="left" valign="top"><?php echo "$d[pesan_kontak]";?>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">Tanggapan</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><textarea name="tanggapan" id="tanggapan" style="width:600px;height:100px;"></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><input type="submit" name="button" id="button" value="Submit"></td>
    </tr>
  </table>
  <p>&nbsp; </p>
</form>
<?php
}
else if($aksi=="update")
{
	mysqli_query($con,"update kontak set respon_admin='$_POST[tanggapan]' where id_kontak='$_GET[id]'");
	echo "<meta http-equiv=refresh content='0;url=?module=kontak'>";
}
else if($aksi=="hapus")
{
	mysqli_query($con,"delete from kontak where id_kontak='$id'");
	echo "<meta http-equiv=refresh content='0;url=?module=kontak'>";
}
?>