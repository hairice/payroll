<?php
session_start('pay');
if(session_destroy())
{
	// header("Location:login.php");
	echo("<script>location.href = 'login.php';</script>");
}
?>