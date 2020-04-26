<?php
include("includes/config.php");

if (isset($_COOKIE["user_uname"]) && isset($_COOKIE["user_password"])) {
  $name =  $_COOKIE["user_uname"];
  $password =  $_COOKIE["user_password"];
  if ($_SESSION['user_type'] == "teacher") {
    $select = "SELECT * FROM staff WHERE uname = '" . $name . "' AND pwd = '" . $password . "'";
  } else {
    $select = "SELECT * FROM users WHERE email = '" . $name . "' AND admin_password = '" . $password . "'";
  }
  $result = mysqli_query($conn, $select);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  if ($count > 0) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_type'] = $_REQUEST['user_type'];
    $_SESSION['user_name'] = $row['fname'] . " " . $row['lname'];
    header("location:dashboard.php");
  }
} else {
  //echo "hi";exit;
}
//print_r($_COOKIE);exit;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Flash Math-Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.ico">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="css/adminlogin.css">
  <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
</head>

<body>
  <div class="wrapper1">

    <div class="login-box">
      <div class="login-logo">
        <a href="javascript:void(0);"><img src="images/favicon.png" width="150px" /></a>
      </div>
      <?php
      if (isset($_SESSION['successmsg']) && $_SESSION['successmsg'] != "") {
        echo $_SESSION['successmsg'];
        unset($_SESSION['successmsg']);
      }
      ?>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign In</p>

          <form action="login_db.php" method="post">
            <div class="form-group has-feedback">
              <select class="form-control" name="user_type">
                <option>Select User</option>
                <option value="admin">Admin</option>
                <option value="teacher">Staff</option>
              </select>
              <!--span class="fa fa-envelope form-control-feedback"></span-->
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="User Name" name="Email" id="Email" onblur="validateEmail();">
              <span id="errorEmail" class="errormsg"></span>
              <!--span class="fa fa-envelope form-control-feedback"></span-->
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="Password" id="Password" onblur="validatePassword();">
              <span id="errorPassword" class="errormsg"></span><br>
              <!--span class="fa fa-lock form-control-feedback"></span-->
              <label class="checkbox"><input type="checkbox" name="adminremember"> Remember me</label>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="pulsate-bck" onclick="formValidate();" name="login" id="login">Sign In</button>
              </div>
              <!-- /.col -->

              <!-- /.col -->
            </div>
          </form>

          <!--p class="mb-1">
        <a href="#">I forgot my password</a>
      </p-->
          <!--p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p-->
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->

    <!-- iCheck -->
    <script src="plugins/icheck.min.js"></script>
    <script src="js/login.js"></script>
    <script>
      $(function() {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        })
      })
    </script>
  </div>
</body>

</html>