<?php
include_once('../config/data_access.php');
include_once('../config/config.php');
$reg = new DBaseAccess();

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

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Beneficiaries | Admin Portal </title>
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
                View All Beneficiary Details
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-Home"></i> Home</a></li>
                <!--<li class="active">Dashboard</li>-->
            </ol>
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
                                        <tr style="font-size: 10px;">
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Unit Name</th>
                                            <th>Beneficiary Name</th>
                                            <th>Sex</th>
                                            <th>Age</th>
                                            <th>Phone</th>
                                            <th>Email Address</th>
                                            <th>Business Type</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $trans=mysqli_query($con,"SELECT * FROM beneficiary ORDER BY  id DESC");
                                        $no = 0;
                                        while($row = mysqli_fetch_array($trans))
                                        {
                                            $no = $no + 1;
                                            $uNo = $row['uNo'];
                                            $query = mysqli_query($con,"select uName from units where uNo = '$uNo' ");
                                            $res = mysqli_fetch_array($query);
                                            ?>
                                            <tr style="font-size: 10px;">
                                                <td><?php echo $no; ?></td>
                                                <td><?php $date = date_create($row['regDate']); echo date_format($date, 'j / n / Y'); ?></td>
                                                <td><?php echo $res['uName']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['sex']; ?></td>
                                                <td><?php echo $row['age']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['emailAddress']; ?></td>
                                                <td><?php echo $row['business']; ?></td>
                                                <td><?php echo $row['bankName']; ?></td>
                                                <td><?php echo $row['accountNumber']; ?></td>
                                                <?php
                                                if ( $row['status'] == 0) {
                                                    ?>
                                                    <td><span class="btn btn-space btn-warning"> Pending</span></td>
                                                    <?php
                                                }
                                                else if ( $row['status'] == 1) {
                                                    ?>
                                                    <td><span class="btn btn-space btn-success"> Confirmed </span></td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>

                                            <?php
                                        }
                                        ?>
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

