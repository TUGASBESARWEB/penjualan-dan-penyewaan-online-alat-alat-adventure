<?php

$qf=mysqli_query($con,"select b.*,o.* 
				 from biaya b,orders o 
				 where b.id_order=o.id_order and b.id_order='$_GET[id]'");
$df=mysqli_fetch_array($qf);
$to=explode("-",$df['tgl_order']);
$td=explode("-",$df['tgl_dp']);
$tl=explode("-",$df['tgl_lunas']);

	
	$qp=mysqli_query($con,"select * from pekerjaan where id_order='$_GET[id]'");
	$dp=mysqli_fetch_array($qp);
	$t=explode("-",$dp['tgl_mulai']);
	$t2=explode("-",$dp['tgl_selesai']);
	$idorder=$df['id_order'];
	$sp=$dp['status_pekerjaan'];
	
	$dpne=$df['bukti_dp'];
	$lunase=$df['bukti_lunas'];
	?>
  <h2>Detil Order</h2>
  <table border="0" cellspacing="0" cellpadding="5" class="tabel">
    <tr>
      <td>ID order</td>
      <td><?php echo "$df[id_order]";?></td>
    </tr>
    <tr>
      <td>Tgl. order</td>
      <td><?php echo ($to[2]*1)." ".$arbulan[($to[1]*1)]." ".$to[0];?></td>
    </tr>
    <tr>
      <td>Pemesan</td>
      <td><?php echo "$df[nama]";?></td>
    </tr>
    <tr>
      <td>No. telepon</td>
      <td><?php echo "$df[telepon]";?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo "$df[email]";?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?php echo "$df[alamat]";?></td>
    </tr>
    <tr>
      <td>Modifikasi</td>
      <td><?php echo "$df[modifikasi]";?></td>
    </tr>
    <tr>
      <td>Gambar asli</td>
      <td><?php
   $gb=$df['gambar_asli'];
   if(!empty($gb) && file_exists("../gbr_order/$gb"))
   {
	   echo "<img src='../gbr_order/$gb' height=60>";
   }
   else
   {
	   echo"-";
   }
   ?></td>
    </tr>
    <tr>
      <td>Gambar modifikasi</td>
      <td><?php
   $gb=$df['gambar_modifikasi'];
   if(!empty($gb) && file_exists("../gbr_order/$gb"))
   {
	   echo "<img src='../gbr_order/$gb' height=60>";
   }
   else
   {
	   echo"-";
   }
   ?></td>
    </tr>
    <tr>
      <td>Biaya material</td>
      <td>Rp <?php echo number_format($df['biaya_material'],0,",",".");?>,-</td>
    </tr>
    <tr>
      <td>Biaya jasa</td>
      <td>Rp <?php echo number_format($df['biaya_jasa'],0,",",".");?>,-</td>
    </tr>
    <tr>
      <td>Total harus dibayar</td>
      <td>Rp <?php echo number_format(($df['biaya_material']+$df['biaya_jasa']),0,",",".");?>,-</td>
    </tr>
    <tr>
      <td>DP</td>
      <td>Rp <?php echo number_format($df['DP'],0,",",".");?>,-</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><h2><strong>Pembayaran</strong></h2></td>
    </tr>
    <tr>
      <td>Tgl. DP</td>
      <td><?php echo ($td[2]*1)." ".$arbulan[($td[1]*1)]." ".$td[0];?></td>
    </tr>
 
 
 
    <tr>
      <td>DP</td>
      <td>Rp <?php echo number_format($df['pelunasan'],0,",",".");?>,-</td>
    </tr>
    <tr>
      <td valign="top">Bukti Transfer DP</td>
      <td><?php 
	  if(!empty($dpne) && file_exists("../bukti/$dpne"))
	  {
		  echo "<img src='../bukti/$dpne' width=100 title='bukti transfer DP'>";
	  }
	  else
	  {
		  echo "-";
	  }
	  ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Tgl. lunas</td>
      <td><?php echo ($tl[2]*1)." ".$arbulan[($tl[1]*1)]." ".$tl[0];?></td>
    </tr>
    <tr>
      <td valign="top">Bukti Pelunasan</td>
      <td><?php 
	  if(!empty($lunase) && file_exists("../bukti/$lunase"))
	  {
		  echo "<img src='../bukti/$lunase' width=100 title='bukti transfer pelunasan'>";
	  }
	  else
	  {
		  echo "-";
	  }
	  ?></td>
    </tr>    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Total sudah dibayar</td>
      <td>Rp <?php echo number_format(($df['DP']+$df['pelunasan']),0,",",".");?>,-</td>
    </tr>
    <tr>
      <td>Status biaya</td>
      <td>
      <?php
	  $arb=array("Proses","DP","Lunas");
	  for($i=0;$i<count($arb);$i++)
	  {
		 if($arb[$i]==$df['status_biaya'])
		 echo "$arb[$i]";
	  }
	  ?>
</td>
    </tr>
    <tr>
      <td>Tgl. mulai</td>
      <td><?php 
	  echo ($t[2]*1)." ".$arbulan[($t[1]*1)]." ".$t[0];?></td>
    </tr>
    <tr>
      <td>Tgl. selesai</td>
      <td><?php 
	  echo ($t2[2]*1)." ".$arbulan[($t2[1]*1)]." ".$t2[0];?></td>
    </tr>
    <tr>
      <td>Status pekerjaan</td>
      <td>
        <?php
	  echo "$sp";
	  ?>
</td>
    </tr>
  </table>
  <p>&nbsp;</p>
<input type="button" onclick="javascript:history.back()" value="Kembali" />