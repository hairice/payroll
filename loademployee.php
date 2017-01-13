<?php
	include "connection.php";
	$sql = "SELECT * FROM employee ORDER BY id DESC";
	$result34 = mysql_query($sql) or die("Failed Sql Query");
	while ($row3 = mysql_fetch_assoc($result34)) {
		$id = $row3['id'];
                $employee = $row3['employee_no'];
		$surname = $row3['surname'];
		$lastname = $row3['lastname'];
		echo "<tr class='prev' id='pre$id'>";
        echo    "<td>".$row3['employee_no']."</td>";
        echo    "<td> $surname $lastname </td>";
        echo    "<td>".$row3['dept']."</td>";
        echo    "<td>".$row3['position']."</td>";
        echo    "<td>".$row3['phoneno']."</td>";
        echo    "<td>".date_only($row3['joined'])."</td>";
        echo 	"<td><div class='btn btn-info view-button' did='$id'>View</div></td>";
        echo 	"<td><div class='btn btn-danger delete-button' did='$id'>Delete</div></td>";
        echo 	"<td><a href='printprofile.php?employee=$employee' class='btn btn-info' target='_new'>Print</a></td>";
        echo    "</tr>";
	}
?>