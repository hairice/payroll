<?php
	$pass = 'admin';
	$password = md5(sha1($pass));
	$paa = md5($pass);
	$pa = sha1($pass);
	$p = sha1(md5($pass)); 
	echo 'md5sha1'.'<br>'.$password.'<br>'.'md5 only'.'<br>'.$paa.'<br>'.'sha1 only'.'<br>'.$pa.'<br>'.'sha1md5'.'<br>'.$pa;

	echo "<p></p>";
	echo "Password Hash";
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	echo "<br/>".$hash;
	$cot = strlen($hash);
	echo "<br/>".$cot;
?>