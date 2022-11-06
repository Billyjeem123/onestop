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

if(isset($_GET['del']))
{
    $id = intval($_GET['id']);
    mysqli_query($con,"DELETE from `user` where `userId` = $id ");
    mysqli_query($con,"DELETE from `membershipfee` where `userId` = $id ");
    mysqli_query($con,"DELETE from `fundwallet` where `userId` = $id ");
    $msg = 'success';
    $successMsg = "Contributor's Account Successfully Deleted";
}
if(isset($_GET['enable']))
{
    $id = intval($_GET['id']);
    mysqli_query($con,"UPDATE `user` set `active` = 1 where `userId` = $id ");
    $msg = 'success';
    $successMsg = "Contributor's Account Successfully Verified";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contributor's Account  | Admin Portal </title>
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
    <script src="jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
                $("#success-alert").alert('close');
                window.location='viewAccount';
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
            <h1>
                View Contributor's Profile
                <small></small>
            </h1>
            <section class="content">
            <div class="row">
                                        <?php  if( isset($msg) and $msg == 'success') 
                                        { ?>
                                            <div class="alert alert-success" id="success-alert">
                                                <strong><?php echo $successMsg; ?></strong>
                                            </div>
                                            <?php  } 
                                            if (isset($msg) and $msg == 'error') { ?>
                                                <div class="alert alert-error" id="error-alert">
                                                <strong>Error Deleting/Verifying Contributor's Account </strong>
                                                </div>
                                            <?php  } ?>
                                    </div>
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
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Password</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>Wallet Number</th>
                                            <th>Agent Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $trans=mysqli_query($con,"SELECT * FROM `user` ORDER BY  `userId` DESC");
                                        $no = 0;
                                        while($row = mysqli_fetch_array($trans))
                                        {
                                            $no = $no + 1;
                                            $referralCode = $row['referralCode'];
                                            $query = mysqli_query($con, "Select fullName from agent where referralCode = '$referralCode' ");
                                            $res = mysqli_fetch_array($query);
                                            ?>
                                            <tr style="font-size: 13px;">
                                                <td><?php echo $no; ?></td>
                                                <td> <?php $date = date_create($row['registerDate']); echo date_format($date, 'j / n / Y');  ?></td>
                                                <td><?php echo ucfirst($row['fullName']); ?></td>
                                                <td><?php echo $row['emailAddress']; ?></td>
                                                <td><?php echo $row['phoneNumber']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['bankName']; ?></td>
                                                <td><?php echo $row['accountNumber']; ?></td>
                                                <td><?php echo $row['walletNumber']; ?></td>
                                                <td><?php 
                                                    if(is_null($res['fullName']))
                                                       echo 'admin';
                                                    else
                                                       echo ucfirst($res['fullName']); ?></td>
                                                <td>
                                                     <a class="btn btn-space btn-danger active" href="viewAccount?id=<?php echo $row['userId']; ?>&del=del" title="Delete Account"> Delete</a>
                                                                <?php 
                                                                if(intval($row['active']) == 0)
                                                                {
                                                                ?>
                                                                    <a class="btn btn-space btn-warning active" href="viewAccount?id=<?php echo $row['userId']; ?>&enable=enable" title="Verify Contribution Account"> Verify</a>
                                                                <?php
                                                                } 
                                                                else
                                                                {
                                                                ?>
                                                                    <span class="btn btn-space btn-success active">Active</span>
                                                                <?php
                                                                }
                                                                ?>
                                                </td>
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

