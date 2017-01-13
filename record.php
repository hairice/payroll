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
            <li><a href="pay.php">Staff Payment</a></li>
            <li class="active"><a href="record.php">Records</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h3>Payment History</h3>
        <div class="row">
          <div class="col-md-6 employee responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Dept</th>
                  <th>Role</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $sql4 = "SELECT * FROM employee";
                    $res = mysql_query($sql4) or die("couldn't execute sql4");
                    while ($row4 = mysql_fetch_assoc($res)) {
                  ?>
                    <tr>
                      <td><?= $row4['surname']." ".$row4['lastname'] ?></td>
                      <td><?= $row4['dept'] ?></td>
                      <td><?= $row4['position'] ?></td>
                      <td><button class="btn btn-info loadRecords" nd="<?= $row4['title'] ?>  <?= $row4['surname'] ?>  <?= $row4['lastname'] ?>" did="<?= $row4['employee_no'] ?>">View Employee Records</button></td>
                      <td><a href="printrecord.php?record=<?php echo $row4['employee_no']; ?>&name=<?= $row4['surname']." ".$row4['lastname'] ?>" target="_new" class="btn btn-info"> Print Records</a>
                      </td>
                    </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
          </div>
          <div class="col-md-6 recordTab" style="display:none;">
            <h4><span id="changeText"></span> <em style="font-size:14px;">Payment Records</em></h4>
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
              <tbody class="viewRecords">
              </tbody>
            </table>
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

        // Load Records
        $('.loadRecords').click(function(){
          var eid = $(this).attr("did"); 
          var nd = $(this).attr("nd"); 
          var Data = {'eid':eid};
          $.ajax({
            url: "loadrecords.php",
            method: "get",
            data: Data,
            dataType: "html",
            success: function(res){
              $('.recordTab').css("display","block");
              $('.viewRecords').html(res);
              $('#changeText').text(nd);
            }
          })
        })

      });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
