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
    mysqli_query($con,"DELETE from `contplan` where `id` = $id ");
    $msg = 'success';
    $successMsg = "Contribution Plan Successfully Deleted";
}
if(isset($_GET['enable']))
{
    $id = intval($_GET['id']);
    mysqli_query($con,"UPDATE `contplan` set `status` = 1 where `id` = $id ");
    $msg = 'success';
    $successMsg = "Contribution Plan Successfully Enabled";
}
if(isset($_GET['disable']))
{
    $id = intval($_GET['id']);
    mysqli_query($con,"UPDATE `contplan` set `status` = 0 where `id` = $id ");
    $msg = 'success';
    $successMsg = "Contribution Plan Successfully Disable";
}
if(isset($_POST['saveAgent']))
{
    $name = trim($_POST['planName']);
    $days= trim($_POST['days']);
    $status = intval(trim($_POST['status']));
    $sql = "insert into `contplan`(`plan`,`days`,`status`) values('$name','$days',$status)";
    if ( mysqli_query($con,$sql) )
    {
        $msg =  'success';
        $successMsg = "Contribution Plan Successfully Added";
    } 
    else
        $msg = 'error';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Contribution Plan </title>
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
                window.location='addContPlan';
            }); 
            $("#error-alert").fadeTo(1000, 500).slideUp(500, function(){
                $("#error-alert").alert('close');
            });             
        });
        function formatNumber(event) {
            if(event.which >= 37 && event.which <= 40)
                return;
            // format number
            $('#days').val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        }
        
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
            <h1>
                Add New Contribution Plan
                <small></small>
            </h1>
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
                                                <strong>Error Adding Contribution Plan </strong>
                                                </div>
                                            <?php  } ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="planName">Enter Contribution Plan</label>
                                            <input type="text" id="planName" name="planName" class="form-control" required="" >
                                               
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="days">Enter Plan Contribution Days </label>
                                            <input id="days" name="days"  class="form-control" type="text" parsley-trigger="change" required="" onkeyUp="formatNumber(event)" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="status">Select Contribution Status </label>
                                            <select id="status" name="status"  class="form-control" parsley-trigger="change" required="" autocomplete="off" >
                                                <option value=""> Select Status </option>
                                                <option value="1"> Enable </option>
                                               <option value="0"> Disable </option>
                                            </select>   
                                        </div>
                                    </div>

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="saveAgent" >Add New Plan</button>
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
                                                    <th style="font-size:14px;">Contribution Plan</th>
                                                    <th style="font-size:14px;">Contribution Days</th>
                                                    <th style="font-size:14px;">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no=0;
                                                    //Bronze sponsor List
                                                    $a = mysqli_query($con, "SELECT * FROM `contplan` order by `days` desc ");
                                                    while ( ($row=mysqli_fetch_array($a)) )
                                                    {
                                                        ?>
                                                        <tr >
                                                            <td style="font-size:14px;"><?php echo $row['plan']; ?></td>
                                                            <td style="font-size:14px;"><?php echo $row['days']; ?></td>
                                                            <td>
                                                                <a class="btn btn-space btn-danger active" href="addContPlan?id=<?php echo $row['id']; ?>&del=del" title="Delete Contribution Plan"> Delete</a>
                                                                <?php 
                                                                if(intval($row['status']) == 0)
                                                                {
                                                                ?>
                                                                    <a class="btn btn-space btn-warning active" href="addContPlan?id=<?php echo $row['id']; ?>&enable=enable" title="Enable Contribution Plan"> Enable</a>
                                                                <?php
                                                                } 
                                                                else
                                                                {
                                                                ?>
                                                                    <a class="btn btn-space btn-primary active" href="addContPlan?id=<?php echo $row['id']; ?>&disable=disable" title="Disable Contribution Plan">Disable</a>
                                                                <?php
                                                                }
                                                                ?>
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


