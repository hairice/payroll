<?php
	include "connection.php";
	session_start('pay');

	$employee_no = $_POST['employee_no'];
	$worked_days = $_POST['worked_days'];
	$exception = $_POST['exception'];
	$allowance = $_POST['allowance'];
	$overtime = $_POST['overtime'];
	$tax = $_POST['tax'];
	$salary = $_POST['salary'];
	$paid_by = $_SESSION['username'];
	$date = date('Y-m-d');

	$sql2 = "SELECT * FROM history WHERE employee_no = '$employee_no'";
    $result = mysql_query($sql2) or die("Couldn't execute sql2");
    $count = mysql_num_rows($result);
	if ($count == 1) {
	    while ($row2 = mysql_fetch_assoc($result)) {
	    	$historydate = months_year($row2['date']);
	    	$inputdate = months_year($date);
	    	if ($historydate != $inputdate) {
				$sql = "INSERT INTO history 
				(employee_no,worked_days,exception,allowance,overtime,tax,salary,paid_by,date) 
				values('$employee_no', '$worked_days', '$exception', '$allowance', '$overtime', '$tax', '$salary', '$paid_by', '$date')";

				mysql_query($sql) or die("Failed Sql Query");
				$message = "<div class='alert alert-success alert-bold-border fade in alert-dismissable'>
				    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				        Recorded Successfully!  
				      </div>";
			    echo $message;
	    	}else{
	    		$message = "<div class='alert alert-warning alert-bold-border fade in alert-dismissable'>
				    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				        This Month Payment Has Already Been Recorded!  
				      </div>";
			    echo $message;
	    	}
		}
	}else{
		$sql = "INSERT INTO history 
		(employee_no,worked_days,exception,allowance,overtime,tax,salary,paid_by,date) 
		values('$employee_no', '$worked_days', '$exception', '$allowance', '$overtime', '$tax', '$salary', '$paid_by', '$date')";

		mysql_query($sql) or die("Failed Sql Query");
		$message = "<div class='alert alert-success alert-bold-border fade in alert-dismissable'>
		    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		        Recorded Successfully!  
		      </div>";
	    echo $message;
	}
?>