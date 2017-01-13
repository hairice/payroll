<?php	
	mysql_connect("localhost","root","");
	mysql_select_db("payroll");

	error_reporting(E_ALL);
  	ini_set('display_errors', '0');
	
	function datetime_to($datetime=""){
		$unixdatetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
	}
	function date_only($datetime=""){
		$unixdatetime = strtotime($datetime);
		return strftime("%B %d, %Y ", $unixdatetime);
	}
	function time_only($datetime=""){
		$unixdatetime = strtotime($datetime);
		return strftime("%I:%M %p ", $unixdatetime);
	}
	function year_only($datetime=""){
		$unixdatetime = strtotime($datetime);
		return strftime("%Y ", $unixdatetime);
	}
	function no_year($datetime=""){
		$unixdatetime = strtotime($datetime);
		return strftime("%m%d", $unixdatetime);
	}
	function months_year($datetime=""){
		$unixdatetime = strtotime($datetime);
		return strftime("%B, %Y", $unixdatetime);
	}
?>	