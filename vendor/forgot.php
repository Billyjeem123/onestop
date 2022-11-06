<?php
error_reporting(0);
include('dbconnect.php');
if (isset($_POST['submit']))
{
    $matric = trim($_POST['matric']);
    $email = trim($_POST['email']);
    $query = "SELECT * FROM student where matric_no = '$matric' and email = '$email' ";
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if(mysqli_num_rows($result) > 0 )
    {
      while ($row = mysqli_fetch_assoc($result))
      {
        session_start();
        $_SESSION['matric']= $row['matric_no'];
        header("location: secret.php");
      }
    }
    else
    {
      ?>
    <script>
        alert("OOPSS!!!. Invalid Student details!.");
    </script>
  <?php
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
        <a href="#" style="color:#dd4b39;"><img src="uploads/mainlogo.png"></a>
    </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Enter the details to reset your password</p>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Matric No." name="matric" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="xxxx@paulesi.org.ng" name="email" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group">
              <button type="submit" class="form-control btn btn-primary btn-block btn-flat" name="submit">Submit</button>
          </div><!-- /.col -->
          <div class="form-group">
              <a href="signin" class="form-control btn btn-success btn-block btn-flat" name="home">Go Back to Login page</a>
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
