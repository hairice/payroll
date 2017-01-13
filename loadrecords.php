<?php
	include "connection.php";
	$id = $_GET['eid'];
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
		