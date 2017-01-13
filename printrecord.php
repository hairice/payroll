<?php
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
	<script>
	  function myFunction() {
	      window.print();
	  }
	</script> 
</head>
<body onload="myFunction()" style="text-align:center;">
	<h2><em>Crawford</em> University Nursery & Primary School</h2>
	<div style="width:80%;height:auto;padding:20px;margin:auto;">
		<span>Employee <b><?= $_GET['name'] ?></b> Records</span>
		<table class="table table-striped">
              <thead>
                <tr>
                  <th>Worked Days</th>
                  <th>Absent Days</th>
                  <th>Allowance Fees</th>
                  <th>Overtime Fees</th>
                  <th>Tax Rate</th>
                  <th>Salary Fees</th>
                  <th>Recorded By</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
              	<?php
					$id = $_GET['record'];
					$sql = "SELECT * FROM history WHERE employee_no = '$id' ORDER BY id DESC";
					$result34 = mysql_query($sql) or die("Failed Sql Query");
					while ($row3 = mysql_fetch_assoc($result34)) { 
				?>	
					<tr>
						<td><?= $row3['worked_days'] ?></td>
						<td><?= $row3['exception'] ?></td>
						<td><?= $row3['allowance'] ?></td>
						<td><?= $row3['overtime'] ?></td>
						<td><?= $row3['tax'] ?></td>
						<td><?= $row3['salary'] ?></td>
						<td><?= $row3['paid_by'] ?></td>
						<td><?= months_year($row3['date']) ?></td>
					</tr>
				<?php } ?>		
		
              </tbody>
            </table>
	</div>
</body>
</html>