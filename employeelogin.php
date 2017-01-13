<?php
include("connection.php");
              $surname = trim($_POST['surname']);
              $pass= trim($_POST['password']);
              $employee_no= $_POST['employee_no'];
              $hashed_password = md5(sha1($pass));

              $surname = stripslashes($surname); 
              $hashed_password = stripslashes($hashed_password);  
                
              $surname = mysql_real_escape_string($surname); 
              $hashed_password = mysql_real_escape_string($hashed_password);
                
                $query21 = "SELECT * FROM employee WHERE surname='$surname' and employee_no = '$employee_no'";
                $result21 = mysql_query($query21) or die ("Couldn't execute query21");
                $count = mysql_num_rows($result21);
                if( $count == "1")
                {
                  while ($row24 = mysql_fetch_array($result21,MYSQL_ASSOC)) {
                    if ($row24['password'] !=  $hashed_password) {
                      $message = "<div class='alert alert-warning alert-bold-border fade in alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            Password is Incorrect.  
                          </div>";
                  echo $message;
                    }
                    else{
                      session_start('pay');
                      $employee = $row24['employee_no'];
                      $_SESSION['username'] = $employee;
                      echo("<script>location.href = 'profile.php';</script>");
                    }
                  }  
                }
                else
                {
                  $message = "<div class='alert alert-warning alert-bold-border fade in alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <p> Can't Login <br>
                  This Account Does Not Exist</div>";
                  echo $message;
                }
          ?>