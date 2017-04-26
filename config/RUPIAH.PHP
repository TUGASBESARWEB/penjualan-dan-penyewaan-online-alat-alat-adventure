<?php
function rup($rp)
{
	$rupiah="";
	$pj=strlen($rp);
	while($pj>3)
	{
		$rupiah=".".substr($rp,-3).$rupiah;
		$sisa=strlen($rp)-3;
		$rp=substr($rp,0,$sisa);
		$pj=strlen($rp);	
	}
	$rupiah=$rp.$rupiah;
	echo "$rupiah";
}
function ambilbulan($str)
{
		switch($str)
		{
			case 1:$bulann="Januari";break;
			case 2:$bulann="Februari";break;
			case 3:$bulann="Maret";break;
			case 4:$bulann="April";break;
			case 5:$bulann="Mei";break;
			case 6:$bulann="Juni";break;
			case 7:$bulann="Juli";break;
			case 8:$bulann="Agustus";break;
			case 9:$bulann="September";break;
			case 10:$bulann="Oktober";break;
			case 11:$bulann="Nopember";break;
			case 12:$bulann="Desember";break;
			default:$bulann="";
		}
		return $bulann;	
}
?>