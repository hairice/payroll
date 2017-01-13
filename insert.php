<?php
	include "connection.php";

	$employee_no = $_POST['employee_no'];
	$title = $_POST['title'];
	$surname = $_POST['surname'];
	$lastname = $_POST['lastname'];
	$dept = $_POST['dept'];
	$position = $_POST['position'];
	$address = $_POST['address'];
	$phoneno = $_POST['phoneno'];
	$guarantor_name = $_POST['guarantor_name'];
	$guarantor_no = $_POST['guarantor_no'];
	$password = md5(sha1($_POST['lastname']));
	$joined = date('Y-m-d');

	$sql2 = "SELECT * FROM employee WHERE employee_no = '$employee_no'";
    $result = mysql_query($sql2) or die("Couldn't execute sql2");
    $count = mysql_num_rows($result);
    if ($count == 0) {
    	$sql = "INSERT INTO employee 
		(employee_no,title,surname,lastname,dept,position,address,phoneno,guarantor_name,guarantor_no,password,joined) 
		values('$employee_no', '$title', '$surname', '$lastname', '$dept', '$position', '$address', '$phoneno', '$guarantor_name', '$guarantor_no', '$password', '$joined')";

		mysql_query($sql) or die("Failed Sql Query");
    }else{
    	$message = "<div class='alert alert-success alert-bold-border fade in alert-dismissable'>
		    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		        This Employee No Is Already Taken!  
		      </div>";
	    echo $message;
    }
?>