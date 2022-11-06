<?php
include('header.php');
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $image = $matric.'.'.$imageFileType;
  $check = getimagesize($_FILES["uploadfile"]["tmp_name"]);
    if($check !== false) {
    } else {
        $uploadOk = 0;
    }
// Check file size
if ($_FILES["uploadfile"]["size"] > 500000) {
    ?>
    <script>
        alert("OOPSS!!!. Oversize Image.");
    </script>
  <?php
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    ?>
    <script>
        alert("OOPSS!!!. Invalid Image Format Please Select an Image File.");
    </script>
  <?php
}
else{
    $query = ("UPDATE student SET image ='".$image."' WHERE matric_no = '".$matric."'");
    $result = mysqli_query($conn,$query);
    $move = move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_dir . $image);
    if ($move){
         ?>
    <script>
        alert("SUCCESS!!!. Image Upload was Successful!.");
        window.location = 'image.php';
    </script>
  <?php
    }
    else{
      ?>
    <script>
        alert("OOPSS!!!. Image Upload Failed.");
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
    <title>Welcome to Student Portal | Image Upload</title>
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
                      <a href="view.php" class="btn btn-default btn-flat">Profile</a>
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
            Image Upload
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Profile</a></li>
            <li class="active">Image Upload</li>
          </ol>
          <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputFile">Upload Your Passport</label>
                      <input type="file" id="exampleInputFile" name="uploadfile" required />
                      <p class="help-block"><b>Note. Make sure that the image size is not more that 2MB.</b></p>
                    </div>
                    </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="upload"><i class="fa fa-upload">&nbsp;</i>Upload image</button>
                  </div>
                </form>
              </div><!-- /.box -->
              </div>
              </div>
              </section>
        </section>

        <!-- Main content -->
        <!-- right col -->
          </div><!-- /.row (main row) --><!-- /.content -->
      </div><!-- /.content-wrapper -->
       <?php
  include('footer.php');
?>    