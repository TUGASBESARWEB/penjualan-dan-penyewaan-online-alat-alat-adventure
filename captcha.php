<?php
$sumber=array("a","v","x","p","L","h","J","H","Y","z","Z","W","S",0,1,2,3,4,5,6,7,8,9);
$ambil=array();
while(count($ambil)<5)
{
	$acak=rand(0,(count($sumber)-1));
	$teks=$sumber[$acak];
	$ambil[]=$teks;
}
$hasil=implode(" ",$ambil);
$hasil2=implode("",$ambil);
echo "<div style='box-shadow:0px 0px 15px #666666;width:100px;margin-top:-25px;text-align:center'><h2>$hasil</h2>
<input type=hidden name=kodecap id=kodecap value=$hasil2></div>";
?>
						
