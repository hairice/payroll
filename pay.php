<?php 
  session_start('pay');
?> 
<?php include("connection.php"); ?>
<?php
  if (!isset($_SESSION['username'])) {
    echo("<script>location.href = 'login.php';</script>");
  // header ('Location: login.php');
 } 
  date_default_timezone_get();
  //Check if the user is admin
  $username = $_SESSION['username'];
  $sql2 = "SELECT * FROM admin where username = '$username'";
  $result = mysql_query($sql2) or die("Couldn't execute sql2");
  $count = mysql_num_rows($result);
  if ($count == 0) {
    echo("<script>location.href = 'profile.php';</script>");
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
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="pay.php">Staff Payment</a></li>
            <li><a href="record.php">Records</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <?php
          $mon = date('Y-m-d');
        ?>
        <h3>Record Staff Payment For <?= months_year($mon) ?></h3>
        <div class="row">
          <div class="col-md-6 employeeform">
            <span id="message"></span>
            <form method="post" id="insert">
              <div class="form-group col-md-6">
                <label>Choose Employee</label>
                <select class="form-control" name="employee_no">
                  <?php
                    $sql2 = "SELECT * FROM employee";
                    $result = mysql_query($sql2) or die("Couldn't execute sql2");
                    while ($row2 = mysql_fetch_assoc($result)) {
                  ?>
                    <option value="<?php echo $row2['employee_no'] ?>"><?= $row2['surname']."  ".$row2['lastname'] ?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Worked Days</label>
                <input type="number" name="worked_days" class="form-control" placeholder="Worked Days" required>
              </div>
              <div class="form-group col-md-6">
                <label>Days Absent At Work</label>
                <input type="number" name="exception" class="form-control" placeholder="Days Absent">
              </div>
              <div class="form-group col-md-6">
                <label>Over Time Fees</label>
                <input type="number" name="overtime" class="form-control" placeholder="Over Time" >
              </div>
              <div class="form-group col-md-6">
                <label>Allowance Fees</label>
                <input type="number" name="allowance" class="form-control" placeholder="Allowance Fees" >
              </div>
              <div class="form-group col-md-6">
                <label>Salary</label>
                <input type="number" name="salary" class="form-control" placeholder="Staff Salary" required>
              </div>
              <div class="form-group col-md-6">
                <label>Tax Rate</label>
                <input type="text" name="tax" class="form-control" placeholder="Tax Rate" required>
              </div>
              <div class="form-group col-md-6"><p></p></div>
              <div class="form-group col-md-6">
                <button type="submit" class="btn btn-block btn-info">Record Payment</button>
              </div>
            </form>
          </div>
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

       // Insert Employee
       $('#insert').submit(function(event){
          event.preventDefault();
          $.ajax({
            url: "paystaff.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage){
              $('#insert')[0].reset();
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
