<?php
if(empty($_SESSION['user_admin']))
{
	$_SESSION['sesvalid']="tidak";
	echo"<meta http-equiv=refresh content='0;url=../index.php'>";
	die();
}
else
{
	$qa=mysql_query("select * from admin where username='$_SESSION[user_admin]' and password='$_SESSION[pass_admin]'");
	if(mysql_num_rows($qa)<=0)
	{
			$_SESSION['sesvalid']="tidak";
			echo"<meta http-equiv=refresh content='0;url=../index.php'>";
			die();
	}
	else
	{
		$_SESSION['sesvalid']="ya";
	}	
}
?>