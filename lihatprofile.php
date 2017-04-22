<?php
$q9=mysqli_query($con,"select * from admin where username='$_SESSION[sesuser]'");
$d9=mysqli_fetch_array($q9);
?>
<script type="text/javascript" src="script/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="script/jquery.validate.pack.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#form100").validate({
		messages: {
			email: {
				required: "E-mail harus diisi",
				email: "Masukkan E-mail yang valid"
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})

function cek()
{
	vpass2=document.getElementById("pass2").value
	vpass3=document.getElementById("pass3").value
	if(vpass2!=vpass3)
	{
		alert("Password baru dan konfirmasi password baru tidak sama");
		return false
	}
	else
	{
		return true
	}
}

</script>

<form name="form100" id="form100" method="post" action="?module=updateprofil" enctype="multipart/form-data" onsubmit="return cek()">
<h1>Profil Anda</h1><hr />
  <table width="97%" cellpadding="5" border="0" cellspacing="2" style="font-size:9pt;">
    <tr align="left" valign="top">
      <td width="29%" height="32" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Nama lengkap</font></td>
      <td width="71%" valign="top"><input name="nama" type="text" id="nama" value="<?php echo"$d9[nama_admin]";?>" size="45" class="required" title="tidak boleh kosong" /></td>
    </tr>
    <tr align="left" valign="top">
      <td height="31" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Username </font></td>
      <td valign="top">
        <input type="text" name="username" id="username" value="<?php echo"$d9[username]";?>" readonly="readonly" />
     </td>
    </tr>
    
    <tr>
      <td width="200" align="left" valign="top">Password</td>
      <td align="left" valign="top"><input type="password" name="pass1" id="pass1" placeholder="wajib diisi untuk dapat menyimpan perubahan" size="40" class="required" title="tidak boleh kosong"></td>
    </tr>
    <tr>
      <td align="left" valign="top">Password baru</td>
      <td align="left" valign="top"><input type="password" name="pass2" id="pass2" placeholder="biarkan kosong jika tidak ingin mengganti" size="38"></td>
    </tr>
    <tr>
      <td align="left" valign="top">Ketik ulang password baru</td>
      <td align="left" valign="top"><input type="password" name="pass3" id="pass3" placeholder="harus sama dengan password baru" size="35"></td>
    </tr>
 
    <tr align="left" valign="top">
      <td height="17" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"> </font></p></td>
      <td height="17" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">
        <input type="submit" name="Submit2" value="Submit"/>
      </font></td>
    </tr>
  </table>
</form>