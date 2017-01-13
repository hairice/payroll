<?php
include "connection.php";
session_start("pay");
$username = $_SESSION['username'];
$sql = "SELECT * FROM employee WHERE employee_no = '$username'";
$result34 = mysql_query($sql) or die("Failed Sql Query");
while ($row3 = mysql_fetch_assoc($result34)) {
?>
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
  <tr>
    <td><button class="btn btn-danger changePass">Change Password</button></td>
    <td><button class="btn btn-info editProfile">Edit Profile</button></td>
  </tr>
</table>
<?php
}
?> 