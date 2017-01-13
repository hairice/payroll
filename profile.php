<?php 
  session_start('pay');
?> 
<?php include("connection.php"); ?>
<?php include("date.php"); ?>
<?php
  if (!isset($_SESSION['username'])) {
    echo("<script>location.href = 'login.php';</script>");
  // header ('Location: login.php');
 } 
  date_default_timezone_get();
  $username = $_SESSION['username'];
  $sql2 = "SELECT * FROM employee where employee_no = '$username'";
  $result = mysql_query($sql2) or die("Couldn't execute sql2");
  $count = mysql_num_rows($result);
  if ($count == 0) {
    echo("<script>location.href = 'index.php';</script>");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Crawford</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Crawford</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="profile.php">Home</a></li>
            <li><a href="my_record.php">Record</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h2>Welcome Employee <?= $_SESSION['username'] ?></h2>
        <div class="col-md-6" id="showProfile"></div>
        <div class="col-md-6 editemployee" style="display:none;">
          <h4>Edit Profile</h4>
          <?php
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM employee WHERE employee_no = '$username'";
            $result34 = mysql_query($sql) or die("Failed Sql Query");
            while ($row3 = mysql_fetch_assoc($result34)) {
            $employee = $row3['employee_no'];

            if (isset($_POST['update'])) {
              $surname = $_POST['surname'];
              $lastname = $_POST['lastname'];
              $address = $_POST['address'];
              $phoneno = $_POST['phoneno'];

              $query60 = "UPDATE employee SET surname = '$surname', lastname = '$lastname', address = '$address',phoneno = '$phoneno' WHERE employee_no = '$employee'";
              $result60 = mysql_query($query60) or die("Couldn't Execute Query60");
              header("Location: profile.php");
            }
          ?>
          <form method="post" action="profile.php">
            <div class="form-group">
              <div class="col-md-6"><label>Surname</label></div>
              <div class="col-md-6" style="margin-bottom:15px;"><input type="text" name="surname" class="form-control" value="<?= $row3['surname'] ?>"></div>
            </div>
            <div class="form-group">
              <div class="col-md-6"><label>Lastname</label></div>
              <div class="col-md-6" style="margin-bottom:15px;"><input type="text" name="lastname" class="form-control" value="<?= $row3['lastname'] ?>"></div>
            </div>
            <div class="form-group">
              <div class="col-md-6"><label>Address</label></div>
              <div class="col-md-6" style="margin-bottom:15px;"><textarea name="address" class="form-control"> <?= $row3['address'] ?></textarea></div>
            </div>
            <div class="form-group">
              <div class="col-md-6"><label>Phone No</label></div>
              <div class="col-md-6" style="margin-bottom:15px;"><input type="number" name="phoneno" class="form-control" value="<?= $row3['phoneno'] ?>"></div>
            </div>
            <div class="form-group">
              <button class="btn btn-default" type="submit" name="update">Update</button>
            </div>
          </form>
          <?php
            }
          ?>
        </div>
        <div class="col-md-6" id="showPass" style="display:none;">
          <form id="changePassword">
            <span id="msg"></span>
            <div class="form-group">
              <div class="col-md-6"><label>Current Password</label></div>
              <div class="col-md-6" style="margin-bottom:15px;"><input type="password" name="password" class="form-control"></div>
            </div>
            <div class="form-group">
              <div class="col-md-6"><label>New Password</label></div>
              <div class="col-md-6" style="margin-bottom:15px;"><input type="password" name="new_pass" class="form-control"></div>
            </div>
            <div class="form-group">
              <div class="col-md-6"><label>Confirm Password</label></div>
              <div class="col-md-6" style="margin-bottom:15px;"><input type="password" name="con_pass" class="form-control"></div>
            </div>
            <div class="form-group">
              <button class="btn btn-default" type="submit" name="changepass">Change Password</button>
            </div>
          </form>
        </div>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $.ajax({
          url:"loadprofile.php",
          dataType: "html",
          success: function(Result){
            $('#showProfile').html(Result);
          }
        })

        var result = function(){ $.post('loadprofile.php', {'request':'result'}).done(function(data){$('#showProfile').html(data)}); }
       setInterval(result, 10000);

        $(document).on('click', '.editProfile', function(){ 
          $('.editemployee').css("display","block");
          $('#showPass').css("display","none");
        });

        $(document).on('click', '.changePass', function(){
          $('.editemployee').css("display","none"); 
          $('#showPass').css("display","block");
        });

        // Change Pass
        $('#changePassword').submit(function(event){
          $('#showPass').css("display","block");
          event.preventDefault();
          $.ajax({
            url: "changepass.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage){
              $('#msg').html(strMessage);
            }
          })
        })
      });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
