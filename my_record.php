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

    <title>Payroll System</title>

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
            <li><a href="profile.php">Home</a></li>
            <li class="active"><a href="my_record.php">Record</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <div class="col-md-6">
          <h4><em style="font-size:14px;">Payment Records</em></h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Worked Days</th>
                  <th>Absent Days</th>
                  <th>Allowance Fees</th>
                  <th>Overtime Fees</th>
                  <th>Tax Rate</th>
                  <th>Salary Fees</th>
                  <th>Recorded By</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $id = $_SESSION['username'];
                  $sql = "SELECT * FROM history WHERE employee_no = '$id'";
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
              </tbody>
            </table> 
            <div>
            <?php
              $username = $_SESSION['username'];
              $sql = "SELECT * FROM employee WHERE employee_no = '$username'";
              $result34 = mysql_query($sql) or die("Failed Sql Query");
              while ($row3 = mysql_fetch_assoc($result34)) {
            ?>    
              <a href="printrecord.php?record=<?php echo $row3['employee_no']; ?>&name=<?= $row3['surname']." ".$row3['lastname'] ?>" target="_new" class="btn btn-info"> Print Records</a>
            <?php } ?>  
            </div>
        </div>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
