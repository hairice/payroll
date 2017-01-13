<?php
	include "connection.php";
	$id = $_GET['eid'];
	$sql = "SELECT * FROM employee WHERE id = '$id'";
	$result34 = mysql_query($sql) or die("Failed Sql Query");
	while ($row3 = mysql_fetch_assoc($result34)) {
?>
	<table class="table table-striped">
		<tr>
            <th><button class="btn btn-primary addEmployee">Add New Employee</button></th>
            <td></td>
		</tr>
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