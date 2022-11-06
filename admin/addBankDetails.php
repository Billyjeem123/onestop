<?php
session_start();
include_once('../config/config.php');
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['username']) || ($_SESSION['fullName'] == '')) {
    header("location: index.php");
    exit();
}
$username = $_SESSION['username'];
$query = ("SELECT * FROM `admin` WHERE username = '$username'");
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$fname = $row['fullName'];
$pic = $row['picture'];
$msg = "";
$successMsg = "";
$errorMsg = "";
if(isset($_GET['del']))
{
    $id = intval($_GET['id']);
    mysqli_query($con,"DELETE from `banks` where `id` = $id ");
    $msg = 'success';
    $successMsg = "Bank Details Successfully Deleted";
}
if(isset($_POST['saveAgent']))
{
    $name = trim($_POST['bankName']);
    $sql = "insert into `banks`(`name`) values('$name')";
    if ( mysqli_query($con,$sql) )
    {
        $msg =  'success';
        $successMsg = "Bank Details Successfully Added";
    } 
    else
        $msg = 'error';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Bank Details </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="uploads/favicon.png">
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
                $("#success-alert").alert('close');
                window.location='addBankDetails';
            }); 
            $("#error-alert").fadeTo(1000, 500).slideUp(500, function(){
                $("#error-alert").alert('close');
            });             
        });
               
    </script>
</head>
<body class="skin-purple">
<div class="wrapper">
    <?php
    include('header.php');
    include('sidebar.php');
    ?>
    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                Add New Bank Details
                <small></small>
            </h4>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- form start -->
                            <form role="form" name="register" id="register" method="POST" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <?php  if( isset($msg) and $msg == 'success') 
                                        { ?>
                                            <div class="alert alert-success" id="success-alert">
                                                <strong><?php echo $successMsg; ?></strong>
                                            </div>
                                            <?php  } 
                                            if (isset($msg) and $msg == 'error') { ?>
                                                <div class="alert alert-error" id="error-alert">
                                                <strong>Error Adding Bank Details </strong>
                                                </div>
                                            <?php  } ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="bankName">Enter Bank Name</label>
                                            <input type="text" id="bankName" name="bankName" class="form-control" required="" >
                                               
                                        </div>
                                    </div>
                                    

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="saveAgent" >Add New Bank</button>
                                </div>
                            </form>

                        </div><!-- /.box -->
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="col-md-12">
                                <div class="card" style="padding: 5px;">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr >
                                                    <th style="font-size:14px;">S/N</th>
                                                    <th style="font-size:14px;">Bank Name</th>
                                                    <th style="font-size:14px;">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no=0;
                                                    //Bronze sponsor List
                                                    $a = mysqli_query($con, "SELECT * FROM `banks` order by name asc ");
                                                    while ( ($row=mysqli_fetch_array($a)) )
                                                    {
                                                        $no = $no + 1;
                                                        ?>
                                                        <tr >
                                                            <td style="font-size:14px;"><?php echo $no; ?></td>
                                                            <td style="font-size:14px;"><?php echo $row['name']; ?></td>
                                                            
                                                            <td>
                                                                <a class="btn btn-space btn-danger active" href="addBankDetails?id=<?php echo $row['id']; ?>&del=del" title="Delete Bank Details"> Delete</a>
                                                                <a class="btn btn-space btn-warning active" href="editBankDetails?id=<?php echo $row['id']; ?>&edit=edit" title="Edit Bank Details"> Edit</a>
                                                                
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                ?>
                                            </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </section>
        </section>
        <!-- /.content-wrapper -->
    </div>
</div>
<?php
include('footer.php');
?>


