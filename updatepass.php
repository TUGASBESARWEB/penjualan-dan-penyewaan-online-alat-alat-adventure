<?php
	$pass1=md5($_POST["pass1"]);
	$pass2=md5($_POST["pass2"]);
	$pass3=md5($_POST["pass3"]);
					  
	if(empty($_POST["pass1"]) || empty($_POST["pass2"]))
	{
		echo("<span style='text-decoration:blink'>Password lama dan password baru harus diisi !<span>");
		kembali();
	}
	else
	{
		$qp=mysql_query("select * from administrator where username='$_SESSION[user_admin]' and password='$pass1'");
		if(mysql_num_rows($qp)<=0)
		{
			echo("<span style='text-decoration:blink'>Password anda tidak benar !</span>");
			kembali();
		}
		else
		{
			if($_POST["pass3"]!=$_POST["pass2"])
			{
				echo("<span style='text-decoration:blink'>Pass baru anda tidak cocok!</span>");
				kembali();

			}
			else
			{
				mysql_query("update administrator set password='$pass2' where username='$_SESSION[user_admin]'");
				if(mysql_affected_rows()>0)
				{
					$_SESSION["pass_admin"]=$pass2;
					echo("<span style='text-decoration:blink'>Password anda berhasil diubah !</span>");
					echo "<meta http-equiv=refresh content='2;url=?module=home'>";
				}
				else
				{
					echo("Password gagal disimpan !");
				}
			}
		}
	}
	?>
	<div style="height:200px;">&nbsp;</div>