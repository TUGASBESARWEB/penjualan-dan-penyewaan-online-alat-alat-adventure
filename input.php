<?php
include "validasiadmin.php";
$_SESSION['sessimpan']="belum";
?>
<link rel="stylesheet" type="text/css" href="styles/calendar-win2k-1.css">
<script type="text/javascript" src="script/calendar.js"></script>
<script type="text/javascript" src="script/lang/calendar-en.js"></script>
<script type="text/javascript" src="script/calendar-setup.js"></script>
<script language="javascript" src="script/tables.js"></script>

<script src="../script/jquery-1.4.js"></script>
<script>
$("document").ready(function(){

	$("#direktorat").change(function(){
		idd=$("#direktorat").val()
		
		$.ajax({
		type:"POST",
		url:"carisatuankerja.php",
		data:"idd="+idd,
		success:function(html){
		$("#layersatuankerja").html(html)
		}})
	})

	$("#subalokasi").change(function(){
		ids=$("#subalokasi").val()
		$.ajax({
		type:"POST",
		url:"carisubalokasi.php",
		data:"ids="+ids,
		success:function(html){
		$("#layersubalokasi").html(html)
		}})
	})


})
</script>

<h2>INPUT REKAP PERENCANAAN TAHUN 2016</h2>
<script language="javascript">
function cekform()
{
	vumum=document.getElementById("tglpengumuman").value
	vapeng=document.getElementById("tglawalpengadaan").value
	vakpeng=document.getElementById("tglakhirpengadaan").value
	vap=document.getElementById("tglawalpekerjaan").value
	vakp=document.getElementById("tglakhirpekerjaan").value
	if(vumum=="")
	{
		alert("Tanggal pengumuman harus diisi");
		document.getElementById("tglpengumuman").focus
		return false
	}
	else if(vapeng=="")
	{
		alert("Tanggal awal penggadaan harus diisi");
		document.getElementById("tglawalpengadaan").focus
		return false
	}	
	else if(vakpeng=="")
	{
		alert("Tanggal akhir pengadaan harus diisi");
		document.getElementById("tglakhirpengadaan").focus
		return false
	}	
	else if(vap=="")
	{
		alert("Tanggal awal pekerjaan harus diisi");
		document.getElementById("tglawalpekerjaan").focus
		return false
	}	
	else if(vakp=="")
	{
		alert("Tanggal akhir pekerjaan harus diisi");
		document.getElementById("tglakhirpekerjaan").focus
		return false
	}	
	else
	{
		ty=confirm("Apakah Anda sudah yakin dengan isian Rencana Kerja Tahunan 2016, jika masih ragu silahkan hubungi bagian perencanaan di ext 227  ?")
		if(ty==false)
			return false
		else
			return true
	}		
}
</script>	
<body role="application">		
<form action="?module=simpanrup" method="post" enctype="multipart/form-data" name="form1" onsubmit="return cekform()">
  <table border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td align="left" valign="middle">Tanggal Entri</td>
      <td align="left" valign="middle"><input name="tglinput" type="text" id="tglinput" style="text-align:center" readonly="readonly" size="8" 
	 value="<?php echo date("d-m-Y");?>" placeholder='klik sini'/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">No Usulan RKT </td>
      <td align="left" valign="middle"><input name="norup" type="text" id="norup" size="50" placeholder="nomor akan terisi otomatis saat di-submiit" readonly="readonly" required /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">K/L/D/I</td>
      <td align="left" valign="middle"><input name="kldi" type="text" id="kldi" size="70" value="Kementerian Kesehatan" readonly="readonly" required/></td>
    </tr>
    <?php
	if($_SESSION['sesidunit']==0)
	{
	?>
    <tr>
      <td align="left" valign="middle">Direktorat</td>
      <td align="left" valign="middle"><select name="direktorat" id="direktorat" required>
      <option value=""></option>
      <?php
	  $qd=mysql_query("select * from direktorat");
	  while($dd=mysql_fetch_array($qd))
	  {
	  	echo "<option value='$dd[id_direktorat]'>$dd[nm_direktorat]</option>";
	}	
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="left" valign="middle">Satuan Kerja</td>
      <td align="left" valign="middle"><div id="layersatuankerja"><select name="satuankerja" id="satuankerja" required>
      </select></div>      </td>
    </tr>
    <?php
	}
	else
	{
	$qrupp=mysql_query("select * from satuan_kerja where id_satuankerja='$_SESSION[sesidunit]'");
	$drupp=mysql_fetch_array($qrupp);
	?>
       <tr>
      <td align="left" valign="middle">Direktorat</td>
      <td align="left" valign="middle"><select name="direktorat" id="direktorat" readonly="readonly" required>
       <?php
	  $qd=mysql_query("select * from direktorat where id_direktorat='$drupp[id_direktorat]'");
	  while($dd=mysql_fetch_array($qd))
	  {
	  	echo "<option value='$dd[id_direktorat]'>$dd[nm_direktorat]</option>";
	}	
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td align="left" valign="middle">Satuan Kerja</td>
      <td align="left" valign="middle"><div id="layersatuankerja"><select name="satuankerja" id="satuankerja" readonly="readonly" required>
        <?php
	  $qd=mysql_query("select * from satuan_kerja where id_satuankerja='$drupp[id_satuankerja]'");
	  while($dd=mysql_fetch_array($qd))
	  {
	  	echo "<option value='$dd[id_satuankerja]'>$dd[nm_satuankerja]</option>";
	}	
	  ?>
      </select></div>      </td>
    </tr>

    <?php
	}
	?>
    
    <tr>
      <td align="left" valign="middle">Tahun Anggaran</td>
      <td align="left" valign="middle"><select name="tahunanggaran" id="tahunanggaran" required>
      <?php
	  for($i=0;$i<count($artahun);$i++)
	  {
	  	echo "<option value='$artahun[$i]'>$artahun[$i]</option>";
	}
	?>	
      </select>      </td>
    </tr>
    <tr>
      <td align="left" valign="middle">Perihal Usulan</td>
      <td align="left" valign="middle"><input name="kegiatan" type="text" id="kegiatan" size="75" required /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Nama Barang/Kegiatan </td>
      <td align="left" valign="middle"><input name="namapaket" type="text" id="namapaket" size="70" required /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Lokasi Barang / Kegiatan</td>
      <td align="left" valign="middle"><input name="lokasi" type="text" id="lokasi" size="70" required/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Rencana Kebutuhan</td>
      <td align="left" valign="middle"><select name="jenisbelanja" id="jenisbelanja" required="required">
       <?php
	  for($i=0;$i<count($jenisbelanja);$i++)
	  {
	  	echo "<option value='$jenisbelanja[$i]'>$jenisbelanja[$i]</option>";
	}
	?>	
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Prioritas</td>
      <td align="left" valign="middle"><select name="jenispengadaan" id="jenispengadaan" required="required">
        <?php
	for($i=0;$i<count($jenispengadaan);$i++)
	  {
	  	echo "<option value='$jenispengadaan[$i]'>$jenispengadaan[$i]</option>";
	}
	  ?>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Jumlah usulan</td>
      <td align="left" valign="middle"><input name="volumepaket" type="number" id="volumepaket" size="4" required min=1 max=999999 /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Jumlah Barang</td>
      <td align="left" valign="middle"><input name="volumebarang" type="number" id="volumebarang" size="4"  required min=1 max=999999/></td>
    </tr>
    <tr>
      <td align="left" valign="top">Satuan</td>
      <td align="left" valign="middle"><input name="satuan" type="text" id="satuan" size="10" /></td>
    </tr>
    <tr>
      <td align="left" valign="top">Deskripsi</td>
      <td align="left" valign="middle"><textarea name="deskripsi" id="deskripsi" style="width:600px;height:100px" required></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tanggal Pengumuman</td>
      <td align="left" valign="middle"><input name="tglpengumuman" type="text" id="tglpengumuman" readonly="readonly" placeholder="klik sini" style="text-align:center" size="8" 
	required/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Sumber Dana</td>
      <td align="left" valign="middle"><select name="sumberdana" id="sumberdana" required="required">
        <?php
	 for($i=0;$i<count($sumberdana);$i++)
	  {
	  	echo "<option value='$sumberdana[$i]'>$sumberdana[$i]</option>";
	}
	  ?>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Total Rupiah</td>
      <td align="left" valign="middle"><input type="number" name="pagu" id="pagu" required /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Sub Alokasi</td>
      <td align="left" valign="middle"><select name="subalokasi" id="subalokasi" required="required">
<option value=""></option>
        <?php
	 /*
	 for($i=0;$i<count($subalokasi);$i++)
	  {
	  	echo "<option value='$subalokasi[$i]'>$subalokasi[$i]</option>";
	}*/
	$q6=mysql_query("select * from subalokasi");
	while($d6=mysql_fetch_array($q6))
	{
		echo "<option value='$d6[nm_alokasi]'>$d6[nm_alokasi]</option>";
	}
	  ?>
      </select></td>
    </tr>

    <tr>
      <td align="left" valign="middle">MAK</td>
      <td align="left" valign="middle"><div id="layersubalokasi"><input name="mak" type="text" id="mak" size="60" required readonly="readonly" /></div></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Metode Pemilihan Penyedia</td>
      <td align="left" valign="middle"><select name="metode" id="metode" required="required">
     
        <?php
	 for($i=0;$i<count($metodepemilihan);$i++)
	  {
	  	echo "<option value='$metodepemilihan[$i]'>$metodepemilihan[$i]</option>";
	}
	  ?>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tanggal Awal Pengadaan</td>
      <td align="left" valign="middle"><input name="tglawalpengadaan" type="text" id="tglawalpengadaan" style="text-align:center" readonly="readonly" size="8" 
	 placeholder='klik sini' required/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tanggal Akhir Pengadaan</td>
      <td align="left" valign="middle"><input name="tglakhirpengadaan" type="text" id="tglakhirpengadaan" style="text-align:center" readonly="readonly" size="8" 
	 placeholder='klik sini' required/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tanggal Awal Pekerjaan</td>
      <td align="left" valign="middle"><input name="tglawalpekerjaan" type="text" id="tglawalpekerjaan" style="text-align:center" readonly="readonly" size="8" 
	 placeholder='klik sini' required/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Tanggal Akhir Pekerjaan</td>
      <td align="left" valign="middle"><input name="tglakhirpekerjaan" type="text" id="tglakhirpekerjaan" style="text-align:center" readonly="readonly" size="8" 
	 placeholder='klik sini' required/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Triwulan</td>
      <td align="left" valign="middle"><select name="triwulan" id="triwulan" required="required">
        <?php
	 for($i=0;$i<count($triwulan);$i++)
	  {
	  	echo "<option value='$triwulan[$i]'>$triwulan[$i]</option>";
	}
	  ?>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="top">Keterangan / Catatan</td>
      <td align="left" valign="middle"><textarea name="keterangan" id="keterangan" style="width:600px;height:100px"></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Upload File</td>
      <td align="left" valign="middle"><input type="file" name="uploadfile" id="uploadfile" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;</td>
      <td align="left" valign="middle"><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form></body>
<script type="text/javascript">
  Calendar.setup(
    {
	  inputField  : "tglinput",         
      ifFormat    : "%d-%m-%Y",  
      button      : "tglinput"    
    }
   );
  Calendar.setup(
    {
	  inputField  : "tglinput",         
      ifFormat    : "%d-%m-%Y",  
      button      : "btntglinput"    
    }
   );
   
    Calendar.setup(
    {
	  inputField  : "tglawalpengadaan",         
      ifFormat    : "%d-%m-%Y",  
      button      : "tglawalpengadaan"    
    }
   );
  Calendar.setup(
    {
	  inputField  : "tglawalpengadaan",         
      ifFormat    : "%d-%m-%Y",  
      button      : "btntglawalpengadaan"    
    }
   );

    Calendar.setup(
    {
	  inputField  : "tglakhirpengadaan",         
      ifFormat    : "%d-%m-%Y",  
      button      : "tglakhirpengadaan"    
    }
   );
  Calendar.setup(
    {
	  inputField  : "tglakhirpengadaan",         
      ifFormat    : "%d-%m-%Y",  
      button      : "btntglakhirpengadaan"    
    }
   );
   
   
     Calendar.setup(
    {
	  inputField  : "tglawalpekerjaan",         
      ifFormat    : "%d-%m-%Y",  
      button      : "tglawalpekerjaan"    
    }
   );
  Calendar.setup(
    {
	  inputField  : "tglawalpekerjaan",         
      ifFormat    : "%d-%m-%Y",  
      button      : "btntglawalpekerjaan"    
    }
   );
  
     Calendar.setup(
    {
	  inputField  : "tglakhirpekerjaan",         
      ifFormat    : "%d-%m-%Y",  
      button      : "tglakhirpekerjaan"    
    }
   );
  Calendar.setup(
    {
	  inputField  : "tglakhirpekerjaan",         
      ifFormat    : "%d-%m-%Y",  
      button      : "btntglakhirpekerjaan"    
    }
   );
 
    Calendar.setup(
    {
	  inputField  : "tglpengumuman",         
      ifFormat    : "%d-%m-%Y",  
      button      : "tglpengumuman"    
    }
   );
  Calendar.setup(
    {
	  inputField  : "tglpengumuman",         
      ifFormat    : "%d-%m-%Y",  
      button      : "btntglpengumuman"    
    }
   );
  
  </script> 
  