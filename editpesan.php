<?php
$aksi=$_GET['aksi'];
$id=$_GET['id'];

if($aksi=="hapus")
{
	mysql_query("delete from pesan where id_pesan='$id'");
	echo "<meta http-equiv=refresh content='0;url=?module=pesan'>";
}
else
{
	die();
}
?>		