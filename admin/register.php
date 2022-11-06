<?php 
error_reporting(0);
include('dbconnect.php');
if (isset($_POST['login'])){
  header("location:index.php");
}
if (isset($_POST['register']))
{
    $surname = trim($_POST['surname']);
    $othername = trim($_POST['othername']);
    $gender = trim($_POST['gender']);
    $matric = trim($_POST['matric_no']);
    $nationality = trim($_POST['nationality']);
    $date_of_birth = trim($_POST['dob']);
    $programme = trim($_POST['programme']);
    $department = trim($_POST['department']);
    $degree = trim($_POST['degree']);
    $local_phone = trim($_POST['local_phone']);
    $foreign_phone = trim($_POST['foreign_phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $session = trim($_POST['session']);
    $mode = trim($_POST['mode']);
    $university = trim($_POST['university']);
    $gyear = trim($_POST['gyear']);
    $employee = trim($_POST['employee']);
    $employee_address = trim($_POST['employee_address']);
    $password = trim($_POST['password']);
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);

    $query = ("SELECT matric_no FROM matric WHERE matric_no = '$matric' ");
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);

$query1 = ("SELECT matric_no FROM student WHERE matric_no = '$matric' ");
$result1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_assoc($result1);
$num1 = mysqli_num_rows($result1);
if ($num == 0){
    echo'<script>
        alert("OPPSS!!!. Registration failed due to the invalid Student Matric Number.");
    </script>';
}
elseif($num1 > 0){
  echo'<script>
        alert("OOPSS!!!. You cannot register twice!!!.");
    </script>';
  }
else{
  $query = "INSERT INTO student (surname,othername,gender,matric_no,nationality,date_of_birth,programme,department,degree_in_view,phone_one,phone_two,email,address,session,mode_of_study,university,gyear,employee,employee_address,password,question,answer) 
            VALUES ('$surname','$othername','$gender','$matric','$nationality','$date_of_birth','$programme','$department','$degree','$local_phone','$foreign_phone','$email','$address','$session','$mode','$university','$gyear','$employee','$employee_address','$password','$question','$answer')";
  $result = mysqli_query($conn,$query);
  $query1 = ("UPDATE matric set status ='registered' where matric_no = '$matric' ");
$result1 = mysqli_query($conn,$query1);
  if ($result AND $result1){
    echo'<script>
        alert("SUCCESS!!!. Your Registration was Successful!, you can now login");
        window.location = "index.php"
    </script>';
  }
  else{
    echo'<script>
        alert("OOPSS!!!. Registration Failed!.");
    </script>';
  }
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Course Registration | Student Registration</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="uploads/pan-africa.png">
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <style>
      .ui-datepicker{
        background: #000;
        padding: 10px;
        /*margin-top: 178px;*/
      }
      .ui-datepicker-header{
        padding:10px;
      }
      .ui-datepicker-header a{
        color: #00e7f2;
        font-weight: bold;
      }
      .ui-datepicker-next{
        float:right;
      }
      .ui-datepicker-title{
        color:#ffffff;
        text-align: center;
        font-weight: bold;
      }
      .ui-datepicker-calendar th{
        padding: 3px !important;
        color: #1ce100;
      }
      .ui-datepicker-calendar tr td{
        padding: 6px;
      }
      .ui-datepicker-calendar tr td a{
        color:#00e7f2 !important;
        font-weight: bold;
      }
    </style>
  </head>
  <body class="login-page">
    <div class="register-boxes">
      <div class="login-logo">
        <a href="#" style="color:#dd4b39;"><b>Student Registration</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Fill in all required details</p>
                <form role="form" action="" method="POST">
                  <div class="box-body">
                  <div class="form-group">
                      <label for="matric">Matric No. <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="matric" placeholder="Enter your matric no. e.g PAU-UI-0352" name="matric_no" required="required">
                    </div>
                  <div class="form-group">
                      <label for="fullname">Surname(Lastname) <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="surname" placeholder="Enter your surname/lastname" name="surname" value="<?php if(isset($surname)) echo $surname; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="fullname">Othernames (Firstname First) <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="othername" placeholder="Enter your othernames" name="othername" value="<?php if(isset($othername)) echo $othername; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender <span style="color:red;">*</span></label>
                      <select class="form-control" id="gender" name="gender" required="required">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="nationality">Nationality <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="nationality" placeholder="Enter your nationality" name="nationality" value="<?php if(isset($nationality)) echo $nationality; ?>" required="required">
                    </div>
                    <div class="form-group">
                    <label for="dob">Date of Birth <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="datepicker" placeholder="Enter your date of birth" name="dob" 
                     value="<?php if(isset($date_of_birth)) echo $date_of_birth; ?>" required="required">
                      </div>
                    <div class="form-group">
                      <label for="programme">Programme of study <span style="color:red;">*</span></label>
                      <select class="form-control" id="programme" name="programme" required="required">
                        <option value="">Select Programme</option>
                        <option value="Avian Medicine">Avian Medicine</option>
                        <option value="Environmental Management">Environmental Management</option>
                        <option value="Medicinal Plants Research and Drug Development">Medicinal Plants Research and Drug Development</option>
                        <option value="Mineral Exploration Geosciences">Mineral Exploration Geosciences</option>
                        <option value="Petroleum Geosciences">Petroleum Geosciences</option>
                        <option value="Plant Breeding">Plant Breeding</option>
                        <option value="Reproductive Biology">Reproductive Biology</option>
                        <option value="Reproductive Health Sciences">Reproductive Health Sciences</option>
                        <option value="Sport Management and Policy Development">Sport Management and Policy Development</option>
                        <option value="Veterinary Vaccine Production and Quality Control">Veterinary Vaccine Production and Quality Control</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="department">Department <span style="color:red;">*</span></label>
                      <select class="form-control" id="department" name="department" required="required">
                        <option value="">Select Department</option>
                        <option value="Geography and Agricultural Engineering">Geography and Agricultural Engineering</option>
                        <option value="Crop and Horticultural Science">Crop and Horticultural Science</option>
                        <option value="Human Kinetics">Human Kinetics</option>
                        <option value="Veterinary Medicine">Veterinary Medicine</option>
                        <option value="Geology">Geology</option>
                        <option value="Obstetrics and Gynaecology">Obstetrics and Gynaecology</option>
                        <option value="Pharmacognosy">Pharmacognosy</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="degree">Degree <span style="color:red;">*</span></label>
                      <select class="form-control" id="degree" name="degree" required="required">
                        <option value="">Select Degree</option>
                        <option value="MSc">MSc</option>
                        <option value="Ph.D">Ph.D</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="lphone">Local Phone No. <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="lphone" placeholder="Enter your local phone +234xxxxxxxxx" name="local_phone" value="<?php if(isset($local_phone)) echo $local_phone; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="fphone">Foreign Phone No. <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="fphone" placeholder="Enter your foreign phone no. e.g. +99xxxxxxxxxx" name="foreign_phone" value="<?php if(isset($foreign_phone)) echo $foreign_phone; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="email">Email address <span style="color:red;">*</span></label>
                      <input type="email" class="form-control" id="email" placeholder="Enter your email address"  value="<?php if(isset($email)) echo $email; ?>" required="required" name="email">
                    </div>
                    <div class="form-group">
                      <label for="session">Session <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="session" placeholder="Enter your session" value="<?php if(isset($session)) echo $session; ?>" required="required" name="session">
                    </div>                    
                    <div class="form-group">
                      <label for="address">Address During Session <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="address" placeholder="Enter your residencial address"  value="<?php if(isset($address)) echo $address; ?>" required="required" name="address">
                    </div>
                    <div class="form-group">
                      <label for="mode">Mode of Study <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="mode" placeholder="Enter your mode of study" value="<?php if(isset($mode)) echo $mode; ?>" required="required" name="mode">
                    </div>
                    <div class="form-group">
                      <label for="university">University Attendend <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="university" placeholder="Enter the name of the university you attend " name="university" 
                     value="<?php if(isset($university)) echo $university; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="gyear">Year of Graduation <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="gyear" placeholder="Enter your year of graduation" name="gyear" 
                     value="<?php if(isset($gyear)) echo $gyear; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="ename">Employee Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="ename" placeholder="Enter your employee name" name="employee" 
                     value="<?php if(isset($employee)) echo $employee; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="eaddress">Employee Address <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="eaddress" placeholder="Enter your employee address" name="employee_address" 
                     value="<?php if(isset($employee_address)) echo $employee_address; ?>" required="required">
                    </div>           
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password <span style="color:red;">*</span></label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" required="required" name="password">
                    </div>
                    <div class="form-group">
                      <label for="question">Security Question (for password reset) <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="question" placeholder="Enter your security question" name="question" 
                     value="<?php if(isset($question)) echo $question; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="answer">Answer <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="answer" placeholder="Enter your answer" name="answer" 
                     value="<?php if(isset($answer)) echo $answer; ?>" required="required">
                    </div>
                  <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary" name="register">Submit</button>
                  </div>
                  <div class="form-group">
                    <a href="index" class="form-control btn btn-success" name="login">Go Back to Login Page</a>
                  </div>
                </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
              </div>
              

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="plugins/jQuery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->

  </body>
</html>