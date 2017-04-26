
<div class="about">
				<h5>Komentar Pengunjung</h5>
				  <?php
$qa=mysqli_query($con,"select * from kontak order by id_kontak desc");
while($da=mysqli_fetch_array($qa))
{
	echo "Nama lengkap : $da[nama_kontak]<br>
	Tanggal : $da[tgl_kontak]<br>
	Email : $da[email_kontak]<br>
	Pesan : 
	$da[pesan_kontak]
	<br>
	Tanggapan Admin :
	$da[respon_admin]<hr>";
}
?>	
			 </div>
	
