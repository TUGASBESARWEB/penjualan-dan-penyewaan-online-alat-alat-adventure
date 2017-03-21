<!DOCTYPE html>
<html  ="">

<head>
<title>Sign Up Form</title>
</head>

<body bgcolor="#483D8B"/>
<div align="center">
<font face = "impact" size= "8" align="center">Sign Up Form</font>
<br>
<br>
<br>
<?php
if($_GET){
$Username = $_GET['username'];
$email = $_GET['email'];
$alamat = $_GET['alamat'];
$kota = $_GET['kota'];
$Password = $_GET['password'];
$error = array();
if(empty($Username)){
$error['username'] = 'username tidak boleh kosong';
}
if(empty($email)){
$error['email'] = 'Email tidak boleh kosong';
}
if(empty($alamat)){
$error['alamat'] = 'Alamat tidak boleh kosong';
}
if(empty($kota)){
$error['kota'] = 'Kota tidak boleh kosong';
}
if(empty($Password)){
$error['password'] = 'password tidak boleh kosong';
}
if(empty($error)){
}
}
?>
<form action="" method="GET">
Username :
<br><input type="text" name="username" value ="<?php echo isset($_GET['username']) ? $_GET['username'] : '';?>"/> <br />
<div style="color:red"><?php echo isset($error['username']) ? $error['username'] : '';?></div>
<br>
Email :
<br><input type="text" name="email" value = "<?php echo isset($_GET['email']) ? $_GET['email'] : '';?>"/> <br />
<div style="color:red"><?php echo isset($error['email']) ? $error['email'] : '';?></div>
<br>
Alamat :
<br><input type="text" name="alamat" value = "<?php echo isset($_GET['alamat']) ? $_GET['alamat'] : '';?>"/> <br />
<div style="color:red"><?php echo isset($error['alamat']) ? $error['alamat'] : '';?></div>
<br>
Kota :
<br><input type="text" name="kota" value = "<?php echo isset($_GET['kota']) ? $_GET['kota'] : '';?>"/> <br />
<div style="color:red"><?php echo isset($error['kota']) ? $error['kota'] : '';?></div>
<br>
Password :
<br><input type="text" name="password" value = "<?php echo isset($_GET['password']) ? $_GET['password'] : '';?>"/> <br />
<div style="color:red"><?php echo isset($error['password']) ? $error['password'] : '';?></div>
<br>
<input type="submit" value="Sign Up"/>
</form>
</body>
</html>