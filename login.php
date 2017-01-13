<?php
  session_start('pay');

    include"connection.php";

  error_reporting(E_ALL);
    ini_set('display_errors', '0');


  if (isset($_SESSION['username'])) {
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

  <body style="background-image:url(bg05.jpg);color:#fff;">

    <div class="container">

      <div class="starter-template">
        <div class="col-md-4">
          <button class="btn btn-primary adminLog">Admin Login</button>
          <button class="btn btn-primary employeeLog">Employee Login</button>
        </div>
        <div class="col-md-4 payroll">
          <h3><em>Crawford</em> University Nursery & Primary School</h3>
        </div>
        <div id="employee" class="col-md-4 employee" style="display:none;">
          <h2>Employee Log In</h2>
          <form method="post" action="login.php">
            <div class="form-group">
              <input type="number" name="employee_no" placeholder="Employee No" required="" class="form-control" />
            </div>
            <div class="form-group">
              <input type="text" name="surname" placeholder="Surname" required="" class="form-control" />
            </div>  
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" required="" class="form-control" />
            </div>
            <div class="form-group">
              <button type="submit" name="employee" class="btn btn-info">Log In</button> 
            </div>
          </form>
        </div>
        <div id="admin" class="col-md-4 admin" style="display:none;">
          <h2>Admin Log In</h2>
          <form>
            <div class="form-group">
              <input type="text" name="username" placeholder="Username" required="" class="form-control" />
            </div>  
            <div class="form-group">
              <input type="password" name="admin_password" placeholder="Password" required="" class="form-control" />
            </div>
            <div class="form-group">
              <button type="submit" name="admin" class="btn btn-info">Log In</button> 
            </div>
          </form>
        </div>
        <div id="message" class="col-md-4">
          
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
        $('.adminLog').click(function(){
          $('.payroll').css("display","none");
          $('.admin').css("display","block");
          $('.employee').css("display","none");
        })

        $('.employeeLog').click(function(){
          $('.payroll').css("display","none");
          $('.employee').css("display","block");
          $('.admin').css("display","none");
        })

        // Admin Login
        $('#admin').submit(function(event){
          event.preventDefault();
          $.ajax({
            url: "adminlogin.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage){
              $('#message').html(strMessage);
            }
          })
        })

        // Employee Login
        $('#employee').submit(function(event){
          event.preventDefault();
          $.ajax({
            url: "employeelogin.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage){
              $('#message').html(strMessage);
            }
          })
        })
      });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
