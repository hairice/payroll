<?php
	include "connection.php";
	$id = $_GET['eid'];
	
	$query3 ="DELETE  FROM employee WHERE id='$id'";
	$result3 = mysql_query($query3) or die('could not execute query3');
?>