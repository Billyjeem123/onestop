<?php
session_start();
include_once('../config/config.php');
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['username']) || ($_SESSION['fullName'] == '')) {
    header("location: index.php");
    exit();
}
$username = $_SESSION['username'];
$query = ("SELECT * FROM login WHERE username = '$username'");
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$fname = $row['fullName'];
$pic = $row['picture'];

if(isset($_GET['deletePlan']))
{
    $id= $_GET['id'];
    $user_result = mysqli_query($con,"DELETE FROM createplan WHERE pId = $id ");
    ?>
    <script>
        alert("Investment Plan Successfully Deleted");
    </script>
    <?php
    echo "<script type='text/javascript'>";
    echo "window.location='viewPlan'";
    echo "</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Investment Plan | Admin Portal </title>
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
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                View All Investment Plan
                <small></small>
            </h1>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="card" style="padding: 5px;">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="font-size:13px;font-weight:bold;">No</th>
                                            <th style="font-size:13px;font-weight:bold;">Investment Plan</th>
                                            <th style="font-size:13px;font-weight:bold;" >Minimum Amount($)</th>
                                            <th style="font-size:13px;font-weight:bold;" >Maximum Amount($)</th>
                                            <th style="font-size:13px;font-weight:bold;" >ROI Rate(%)</th>
                                            <th style="font-size:13px;font-weight:bold;" >Duration</th>
                                            <th style="font-size:13px;font-weight:bold;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no=0;
                                        //Bronze sponsor List
                                        $a = mysqli_query($con, "SELECT * FROM createplan  ORDER BY  pId DESC");
                                        while ( ($row=mysqli_fetch_array($a)) )
                                        {
                                            $no=$no+1;
                                            ?>
                                            <tr style="font-size:14px;">
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['pName']; ?></td>
                                                <td><?php echo $row['minAmount']; ?></td>
                                                <td><?php echo $row['maxAmount']; ?></td>
                                                <td><?php echo $row['pRate']; ?></td>
                                                <td><?php echo $row['pDuration'] . " Hours"; ?></td>
                                                <td>
                                                    <a  href="editPlan?pId=<?php echo $row["pId"]; ?>" class="btn btn-space btn-warning active" style="color:white" title="Edit Plan"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                    <a class="btn btn-space btn-danger active" href="viewPlan?id=<?php echo $row['pId']; ?>&deletePlan=deletePlan" title="Delete Plan"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.box -->
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
