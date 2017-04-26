<?php
date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");


function pesan($string)
{
	echo "$string";
}

function kembali()
{
	echo "<br><a href='javascript:history.back()'>harap diulangi</a>";
}
function refresh($time,$url)
{
	echo "<meta http-equiv=refresh content='$time;url=?module=$url'>";
}
function pergike($tpergi,$upergi)
{
	echo "<meta http-equiv=refresh content='$tpergi;url=$upergi'>";
}
$arbulan=array(" ","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
?>
<script language="javascript">
function konfirm(str)
{
	jwb=confirm(str);
	if(jwb==true)
	{
		return true
	}
	else
	{
		return false
	}
}
</script>