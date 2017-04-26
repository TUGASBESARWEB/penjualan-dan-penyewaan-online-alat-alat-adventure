<?php
$nama=$_POST['nama'];
$pass1=md5($_POST["pass1"]);
$pass2=md5($_POST["pass2"]);
$pass3=md5($_POST["pass3"]);

if(isset($_POST['Submit2']))
{
	if(!empty($_POST['pass2']))
	{
		$fpass=",password='$pass2' ";
	}
	else
	{
		$fpass="";
	}
	
	if($pass1!=$_SESSION['sespass'])
	{
		echo "<script>alert('Password Anda tidak dikenal')</script>";
		pergike(0,"?module=lihatprofile");
	}
	else
	{
		mysqli_query($con,"update admin set nama_admin='$nama' $fpass where username='$_SESSION[sesuser]'");
		if(mysqli_affected_rows($con)>0)
		{
			echo "<script>alert('Profil Anda berhasil diubah')</script>";
			if(!empty($pass2))
			{
				$_SESSION['sesnama']=$nama;
				$_SESSION['sespass']=$pass2;
			}
			pergike(0,"?module=home");
		}
	}
}
?>