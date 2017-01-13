<?php
include("connection.php");
              $username = trim($_POST['username']);
              $pass= trim($_POST['admin_password']);
              $hashed_password = md5(sha1($pass));

              $username = stripslashes($username); 
              $hashed_password = stripslashes($hashed_password);  
                
              $username = mysql_real_escape_string($username); 
              $hashed_password = mysql_real_escape_string($hashed_password);
                
                $query21 = "SELECT * FROM admin WHERE username='$username'";
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
                      session_start('air');
                      $_SESSION['username'] = $username;
                      echo("<script>location.href = 'index.php';</script>");
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