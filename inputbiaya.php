<?php

$qf=mysqli_query($con,"select * from orders where id_order='$_GET[id]'");
$df=mysqli_fetch_array($qf);

if(!isset($_POST['button']))
{
	?>
<form name="form1" method="post" action="?module=inputbiaya&id=<?php echo "$_GET[id]";?>">
  <h2>Input Biaya Kustom</h2>
  <table border="0" cellspacing="0" cellpadding="5" class="tabel">
    <tr>
      <td>ID order</td>
      <td><?php echo "$df[id_order]";?></td>
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
      <td><input type="text" name="biayamaterial" id="biayamaterial" required></td>
    </tr>
    <tr>
      <td>Biaya jasa</td>
      <td><input type="text" name="biayajasa" id="biayajasa" required></td>
    </tr>
    <tr>
      <td>Status biaya</td>
      <td><select name="statusbiaya" id="statusbiaya">
      <?php
	  $arb=array("Proses","DP","Lunas");
	  for($i=0;$i<count($arb);$i++)
	  {
		 if($arb[$i]==$df['status_biaya'])
		 echo "<option value='$arb[$i]' selected>$arb[$i]</option>";
		 else
		 echo "<option value='$arb[$i]'>$arb[$i]</option>";
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Submit"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<?php
}
else
{
	mysqli_query($con,"insert into biaya (id_order,biaya_material,biaya_jasa)
										  values ('$_GET[id]','$_POST[biayamaterial]','$_POST[biayajasa]')");
	
	mysqli_query($con,"update orders set status_order='Proses' where id_order='$_GET[id]'");
	
	echo "<meta http-equiv=refresh content='0;url=?module=order'>";
}
?>