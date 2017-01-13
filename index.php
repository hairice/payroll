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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="pay.php">Staff Payment</a></li>
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
        <h3>Employee List</h3>
        <div class="row">
          <div class="col-md-5 employeeform">
            <p id="message"></p>
            <form method="post" id="insert">
              <div class="form-group col-md-6">
                <label>Employee No</label>
                <input type="number" name="employee_no" class="form-control" placeholder="Employee No" required>
              </div>
              <div class="form-group col-md-6">
                <label>Title</label>
                <select class="form-control" name="title">
                  <option value="Pastor">Pastor</option>
                  <option value="Mr">Mr</option>
                  <option value="Mrs">Mrs</option>
                  <option value="Master">Master</option>
                  <option value="Miss">Miss</option>
                  <option value="Sir">Sir</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" placeholder="Surname" required>
              </div>
              <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
              </div>
              <div class="form-group col-md-6">
                <!-- <input type="text" name="dept" class="form-control" placeholder="Department" required> -->
                <label>Department</label>
                <select class="form-control" name="dept" required>
                  <option value="">Department</option>
                  <option value="Sos">Sos</option>
                  <option value="Teaching Quaters">Teaching Quaters</option>
                  <option value="Hostel Quaters">Hostel Quaters</option>
                  <option value="Security Quaters">Security Quaters</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <!-- <input type="text" name="position" class="form-control" placeholder="Role" required> -->
                <label>Position/Role</label>
                <select class="form-control" name="position" required>
                  <option value="">Role</option>
                  <option value="It Manager">It Manager</option>
                  <option value="Vice Principal">Vice Principal</option>
                  <option value="Secretary">Secretary</option>
                  <option value="Teacher">Teacher</option>
                  <option value="Principal">Principal</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label>Address</label>
                <textarea name="address" class="form-control" placeholder="Address" required></textarea>
              </div>
              <div class="form-group col-md-6">
                <label>Telephone No</label>
                <input type="number" name="phoneno" class="form-control" placeholder="Phone No" required>
              </div>
              <div class="form-group col-md-6">
                <label>Guarantor's Name</label>
                <input type="text" name="guarantor_name" class="form-control" placeholder="Guarantor's name" required>
              </div>
              <div class="form-group col-md-6">
                <label>Guarantor's No</label>
                <input type="number" name="guarantor_no" class="form-control" placeholder="Guarantor's No" required>
              </div>
              <div class="form-group col-md-6">
                <label style="display:block;padding:10px;"></label>
                <button type="submit" class="btn btn-block btn-info insertButton">Submit</button>
              </div>
            </form>
          </div>
          <div class="col-md-5 viewemployee" style="display:none;"></div>
          <div class="col-md-7">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Employee No</th>
                  <th>Name</th>
                  <th>Dept</th>
                  <th>Role</th>
                  <th>Phone No</th>
                  <th>Joined</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="showEmployee"></tbody>
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
        // Load Employee List
        $.ajax({
          url:"loademployee.php",
          dataType: "html",
          success: function(Result){
            $('#showEmployee').html(Result);
          }
        })
        var result = function(){ $.post('loademployee.php', {'request':'result'}).done(function(data){$('#showEmployee').html(data)}); }
        setInterval(result, 10000);

       // Insert Employee
       $('#insert').submit(function(event){
          event.preventDefault();
          $.ajax({
            url: "insert.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(strMessage){
              $('#message').html(strMessage);
              $('#insert')[0].reset();
            }
          })
        })

        //View Employee
        $(document).on('click', '.view-button', function(){ 
          $('.employeeform').css("display","none");
          $('.viewemployee').css("display","block");
          var eid = $(this).attr("did"); 
          var Data = {'eid':eid};
          $.ajax({
            url: "load.php",
            method: "get",
            data: Data,
            dataType: "html",
            success: function(res){
              $('.viewemployee').html(res);
            }
          })
          $(document).on('click', '.addEmployee', function(){ 
            $('.employeeform').css("display","block");
            $('.viewemployee').css("display","none");
          })
        });

        //Delete Employee
        $(document).on('click', '.delete-button', function(){ 
          var eid = $(this).attr("did"); 
          var Data = {'eid':eid};
          $('#pre'+eid).hide(1000);
          $.ajax({
            url: "delemployee.php",
            method: "get",
            data: Data,
            // dataType: "text",
            success: function(response){
            }
          })
        });

      });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
