<?php
$us=$_POST['username'];
$pas=md5($_POST['password']);

$q=mysqli_query($con,"select * from admin where username='$us' and password='$pas'");
if(mysqli_num_rows($q)<=0)
{
	unset($_SESSION['sesvalid']);
	echo "<center><b>Maaf username atau password Anda salah</b></center>";
	echo "<meta http-equiv=refresh content='2;url=index.php'>";
}
else
{
	$data=mysqli_fetch_array($q);
	$_SESSION['sesuser']=$_POST['username'];
	$_SESSION['sespass']=md5($_POST['password']);
	$_SESSION['sesvalid']="true";
	$_SESSION['sesnama']=$data['nama_admin'];
	echo "<meta http-equiv=refresh content='0;url=administ/media.php'>";
}
?>