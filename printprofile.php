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
	<?php
		$employee_no = $_GET['employee'];
		$sql = "SELECT * FROM employee WHERE employee_no = '$employee_no'";
		$result34 = mysql_query($sql) or die("Failed Sql Query");
		while ($row3 = mysql_fetch_assoc($result34)) {
	?>
		<span>Employee <b><?= $row3['surname'] ." ". $row3['lastname'] ?></b> Data</span>
		<table class="table table-striped">
		  <tr>
		    <th>Employee No.</th>
		    <td><?= $row3['employee_no'] ?></td>
		  </tr>
		  <tr>
		    <th>Name</th>
		    <td><?= $row3['title'] ?> <?= $row3['surname'] ?> <?= $row3['lastname'] ?></td>
		  </tr>
		  <tr>
		    <th>Dept</th>
		    <td><?= $row3['dept'] ?></td>
		  </tr>
		  <tr>
		    <th>Role</th>
		    <td><?= $row3['position'] ?></td>
		  </tr>
		  <tr>
		    <th>Address</th>
		    <td><?= $row3['address'] ?></td>
		  </tr>
		  <tr>
		    <th>Phone No</th>
		    <td><?= $row3['phoneno'] ?></td>
		  </tr>
		  <tr>
		    <th>Guarantor's Name</th>
		    <td><?= $row3['guarantor_name'] ?></td>
		  </tr>
		  <tr>
		    <th>Guarantor's No</th>
		    <td><?= $row3['guarantor_no'] ?></td>
		  </tr>
		  <tr>
		    <th>Joined</th>
		    <td><?= date_only($row3['joined']) ?></td>
		  </tr>
		</table>
	<?php
		}
	?> 
	</div>
</body>
</html>