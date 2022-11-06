<?php
error_reporting(0);
include('dbconnect.php'); 
session_start();
if (!isset($_SESSION['matric']) || ($_SESSION['matric'] == '')) {
    header("location: index.php");
    exit();
}
$matric = $_SESSION['matric'];
if (isset($_POST['submit'])){
  $password = trim($_POST['password']);
  $confpass = trim($_POST['confpass']);
  if($password != $confpass){
    ?>
    <script>
      alert("OOPSS!!!. Password does not match!.");
    </script>
    <?php
  }
  else{
    $query = ("UPDATE student SET password = '$password' WHERE matric_no = '$matric'");
    $result = mysqli_query($conn,$query);
    if($result){
    ?>
    <script>
      alert("SUCCESS!!! Your Password has been changed!.");
      window.location = "index.php";
    </script>
    <?php
      
    }
    else{
      ?>
    <script>
        alert("OOPSS!!!. Failed to change password!.");
    </script>
  <?php
    }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Student Portal | Forgot Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="uploads/pan-africa.png">
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="bootstrap/css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Password Reset</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Enter the details to reset your password</p>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Enter your new password" name="password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Confirm your password" name="confpass" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group">
              <button type="submit" class="form-control btn btn-primary btn-block btn-flat" name="submit">Submit</button>
          </div><!-- /.col -->
          <div class="form-group">
              <a href="/course" class="form-control btn btn-success btn-block btn-flat" name="home">Go Back to Login page</a>
          </div><!-- /.col -->
          </div>
        </form>

      <!-- <a href="forgotpassword.php">Forgot password</a><br>
        <a href="register.php" class="text-center">Signup</a>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
