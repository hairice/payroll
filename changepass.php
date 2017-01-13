<?php
  include "connection.php";
  session_start("pay");
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM employee WHERE employee_no = '$username'";
  $result34 = mysql_query($sql) or die("Failed Sql Query");
  
  while ($row3 = mysql_fetch_assoc($result34)) {
  $employee = $row3['employee_no'];
  $password = $row3['password'];
      $pass = md5(sha1($_POST['password']));
      $new_pass = md5(sha1($_POST['new_pass']));
      $con_pass = md5(sha1($_POST['con_pass']));

    if ($pass != $password) {
      $message = "<div class='alert alert-warning alert-bold-border fade in alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Current Password Is Incorrect!  
          </div>";
      echo $message;
    }else{
      if ($new_pass == $con_pass) {
        $query60 = "UPDATE employee SET password = '$new_pass' WHERE employee_no = '$employee'";
        $result60 = mysql_query($query60) or die("Couldn't Execute Query60");
        $message = "<div class='alert alert-success alert-bold-border fade in alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Password Changed Successfully!  
          </div>";
      echo $message;
      }else{
        $message = "<div class='alert alert-warning alert-bold-border fade in alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Password Mismatch!  
          </div>";
      echo $message;
      }
    }
  }
?>