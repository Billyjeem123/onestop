<?php
include('header.php');

if (isset($_POST['register']))
{
    $surname = trim($_POST['surname']);
    $othername = trim($_POST['othername']);
    $gender = trim($_POST['gender']);
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

  $query = "UPDATE student set surname = '$surname', othername = '$othername',gender = '$gender',nationality = '$nationality',date_of_birth = '$date_of_birth',programme = '$programme',
            department = '$department', degree_in_view = '$degree' ,phone_one ='$local_phone',phone_two = '$foreign_phone',email = '$email',address = '$address',session = '$session',mode_of_study = '$mode',
             university = '$university' , gyear = '$gyear',employee = '$employee',employee_address = '$employee_address',password ='$password' where matric_no =  '$matric' ";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
  {
    echo'<script>
        alert("SUCCESS!!!. Your Profile Details Successfully Updated");
        window.location = "homepage.php"
    </script>';
  }
  else
  {
    echo'<script>
        alert("OOPSS!!!. Error Updating Profile Details!.");
    </script>';
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Welcome to Student Portal | Edit Profile </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="uploads/pan-africa.png">
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="bootstrap/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
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
    <style type="text/css">
      .img-resp{
        border-radius:12%; 
        background:#555299;
        height: 120px;
        width: 120px;
        text-align: center;
        margin: auto;
        padding: 10px;
      }
    </style>
  </head>
  <body class="skin-purple">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><b>Student Portal</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="uploads/<?php echo $pic; ?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $fname; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="uploads/<?php echo $pic; ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $fname; ?>
                      <small><?php echo $matric; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-left" style="margin-left:2%;">
                      <a href="image.php" class="btn btn-default btn-flat">Change Avatar</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
       <?php
        include('sidebar.php');
      ?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Profile
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Profile</a></li>
            <li class="active">Edit</li>
          </ol>
          <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                
              <form role="form" action="" method="POST">
                  <div class="box-body">
                  <div class="form-group">
                      <label for="fullname">Surname(Lastname) <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="surname" placeholder="Enter your surname/lastname" name="surname" value="<?php echo $surname; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="fullname">Othernames (Firstname First) <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="othername" placeholder="Enter your othernames" name="othername" value="<?php echo $row['othername']; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender <span style="color:red;">*</span></label>
                      <select class="form-control" id="gender" name="gender" required="required">
                      <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="nationality">Nationality <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="nationality" placeholder="Enter your nationality" name="nationality" value="<?php echo $row['nationality']; ?>" required="required">
                    </div>
                    <div class="form-group">
                    <label for="dob">Date of Birth <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="datepicker" placeholder="Enter your date of birth" name="dob" 
                     value="<?php echo $row['date_of_birth']; ?>" required="required">
                      </div>
                    <div class="form-group">
                      <label for="programme">Programme of study <span style="color:red;">*</span></label>
                      <select class="form-control" id="programme" name="programme" required="required">
                      <option value="<?php echo $row['programme']; ?>" selected><?php echo $row['programme']; ?></option>
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
                       <option value="<?php echo $row['department']; ?>" selected><?php echo $row['department']; ?></option>
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
                      <option value="<?php echo $row['degree_in_view']; ?>" selected><?php echo $row['degree_in_view']; ?></option>
                        <option value="MSc">MSc</option>
                        <option value="Ph.D">Ph.D</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="lphone">Local Phone No. <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="lphone" placeholder="Enter your local phone +234xxxxxxxxx" name="local_phone" value="<?php echo $row['phone_one']; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="fphone">Foreign Phone No. <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="fphone" placeholder="Enter your foreign phone no. e.g. +99xxxxxxxxxx" name="foreign_phone" value="<?php echo $row['phone_two']; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="email">Email address <span style="color:red;">*</span></label>
                      <input type="email" class="form-control" id="email" placeholder="Enter your email address"  value="<?php echo $row['email']; ?>" required="required" name="email">
                    </div>
                    <div class="form-group">
                      <label for="session">Session <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="session" placeholder="Enter your session" value="<?php echo $row['session']; ?>" required="required" name="session">
                    </div>                    
                    <div class="form-group">
                      <label for="address">Address During Session <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="address" placeholder="Enter your residencial address"  value="<?php echo $row['address']; ?>" required="required" name="address">
                    </div>
                    <div class="form-group">
                      <label for="mode">Mode of Study <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="mode" placeholder="Enter your mode of study" value="<?php echo $row['mode_of_study']; ?>" required="required" name="mode">
                    </div>
                    <div class="form-group">
                      <label for="university">University Attendend <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="university" placeholder="Enter the name of the university you attend " name="university" 
                     value="<?php  echo $row['university']; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="gyear">Year of Graduation <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="gyear" placeholder="Enter your year of graduation" name="gyear" 
                     value="<?php echo $row['gyear']; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="ename">Employee Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="ename" placeholder="Enter your employee name" name="employee" 
                     value="<?php echo $row['employee']; ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for="eaddress">Employee Address <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="eaddress" placeholder="Enter your employee address" name="employee_address" 
                     value="<?php  echo $row['employee_address']; ?>" required="required">
                    </div>           
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" required="required" name="password"
                      value="<?php  echo $row['password']; ?>">
                    </div>
                  <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary" name="register">Update Profile</button>
                  </div>
                </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
              </div>
              </div>
              
        </section>

        <!-- Main content -->
        <!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </section>
      <?php
  include('footer.php');
?>  
