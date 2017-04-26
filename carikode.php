<?php
$kode=$_POST['vkode'];
$capt=$_POST['vkodecap'];

if($kode!=$capt)
$a="tidak";
else
$a="cocok";

echo $a;

?>