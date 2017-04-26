<?php
include "daftarkontak.php";
if(!isset($_POST['button']))
{
	?>
       <script language="javascript">
	function cek()
	{
		vn=document.getElementById("nama").value
		ve=document.getElementById("email").value
		va=document.getElementById("pesan").value
		vkode=document.getElementById("kode").value
		vkodecap=document.getElementById("kodecap").value
		pj=vn.length;
		//alert(pj)
		
		ada="tidak";
		for(i=0;i<pj;i++)
		{
			str=parseFloat(vn.charAt(i));
			if(!isNaN(str))
			{
				ada="ya"
			}
		}
		if(vn=="")
		{
			alert("Nama harus diisi");
			document.getElementById("nama").focus()
			return false
		}
		else if(vn=="" || ada=="ya")
		{
			alert("nama wajib diisi dan hanya boleh diisi dengan huruf");
			document.getElementById("nama").focus()
			return false
		}
		else if(va=="")
		{
			alert("Pesan harus diisi");
			document.getElementById("pesan").focus()
			return false
		}
		else if(ve=="" || ve.indexOf("@")==-1 || ve.indexOf(".")==-1)
		{
			alert("Email kosong atau email tidak valid");
			document.getElementById("email").focus()
			return false
		}
		else if(vkode=="")
		{
			alert("Kode keamanan wajib diisi");
			document.getElementById("kode").focus()
			return false
		}
		else if(vkode!=vkodecap)
		{
			alert("Kode kemanan tidak cocok");
			document.getElementById("kode").focus()
			return false
		}
		
		else
		{
			return true
		}
	}
	</script>
 
    <div class="contact-form">
    <br>
    <br>
    <br>
				  	<h5>Kirim Komentar</h5>
					    <form method="post" action="?page=kontak" onsubmit="return cek()">
					    	<div>
						    	<span><label>Nama lengkap</label></span>
						    	<span><input name="nama" id="nama" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-Mail</label></span>
						    	<span><input name="email" id="email" type="text" class="textbox"></span>
						    </div>
						   	<div>
						    	<span><label>Pesan</label></span>
						    	<span><textarea name="pesan" id="pesan"></textarea></span>
						    </div>
                            <div><br /><br />
    <?php
	include "captcha.php";
	?>
    <br />
    Masukkan kode keamanan di atas <input type="text" name="kode" id="kode" /><br />
    </div>
						  
						 <input type="submit" value="Submit" name="button" class='button-contact'>
					    </form>
				  </div>
<?php
}
else
{
	$tgl=date("Y-m-d");
	mysqli_query($con,"insert into kontak (nama_kontak,email_kontak,pesan_kontak,tgl_kontak)
										   values 
										   ('$_POST[nama]','$_POST[email]','$_POST[pesan]','$tgl')");
	echo "<meta http-equiv=refresh content='0;url=?page=daftarkontak'>";
}
?>