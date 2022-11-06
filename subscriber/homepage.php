<?php
session_start();


include_once('../config/data_access.php');
include_once('../config/config.php');
$reg = new DBaseAccess();
//Check whether the session variable SESS_MEMBER_ID is present or not

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Subscriber Portal | Homepage</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="../vendor/uploads/favicon.png">
    <!-- Bootstrap 3.3.2 -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="../vendor/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../vendor/bootstrap/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../vendor/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../vendor/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../vendor/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../vendor/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../vendor/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../vendor/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){

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
                Home
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
                            <div class="box-body">
                                <div class="form-group" style="line-height:30px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-blue">
                                                <div class="inner">
                                                    <?php
                                                    $query = ("SELECT * FROM `user` ");
                                                    $result = mysqli_query($conn, $query);
                                                    $num = mysqli_num_rows($result);
                                                    ?>
                                                    <h3><?php echo $num; ?></h3>
                                                    <p>Total Number Accounts Created</p>
                                                </div>
                                                <div class="icon" style="padding: 10px;">
                                                    <i class="ion ion-person"></i>
                                                </div>
                                            </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-yellow">
                                                <div class="inner">
                                                    <?php
                                                    $query = ("SELECT * FROM `contribution` ");
                                                    $result = mysqli_query($conn, $query);
                                                    $num = mysqli_num_rows($result);
                                                    ?>
                                                    <h3><?php echo $num; ?></h3>
                                                    <p>Total Number of Active Contributor's</p>
                                                </div>
                                                <div class="icon" style="padding: 10px;">
                                                    <i class="ion ion-person"></i>
                                                </div>
                                            </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-green">
                                                <div class="inner">
                                                    <?php
                                                    $query = ("SELECT sum(amount) as amount FROM `fundwallet` ");
                                                    $result = mysqli_query($conn, $query);
                                                    $num = mysqli_fetch_array($result);
                                                    ?>
                                                    <h3>₦<?php echo number_format($num['amount'],2); ?></h3>
                                                    <p>Total Wallet Amount </p>
                                                </div>
                                                <div class="icon" style="padding: 10px;">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                            </div>
                                        </div><!-- ./col -->

                                        <div class="col-lg-4 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-purple">
                                                <div class="inner">
                                                <?php
                                                                    $result = mysqli_query($conn, "SELECT sum(amount) as amount FROM `fundwallethistory` where `status` = 2 ");
                                                                    $num = mysqli_fetch_array($result);
                                                                ?>
                                                                <h3 style="font-size: 26px;">₦<?php if(mysqli_num_rows($result) > 0 ) echo number_format($num['amount'],2); else echo number_format("0000"); ?></h3>
                                                                <p>Pending Wallet Amount</p>
                                                </div>
                                                <div class="icon" style="padding: 10px;">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                            </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                                        <!-- small box -->
                                                        <div class="small-box bg-red">
                                                            <div class="inner">
                                                                <?php
                                                                    $result = mysqli_query($conn, "SELECT sum(amount) as amount FROM `banktransfer` where `status` = 0 ");
                                                                    $num = mysqli_fetch_array($result);
                                                                ?>
                                                                <h3 style="font-size: 26px;">₦<?php if(mysqli_num_rows($result) > 0 ) echo number_format($num['amount'],2); else echo number_format("0000"); ?></h3>
                                                                <p>Pending Bank Transfer Amount</p>
                                                            </div>
                                                            <div class="icon" style="padding: 10px;">
                                                                <i class="fa fa-money"></i>
                                                            </div>
                                                        </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                                        <!-- small box -->
                                                        <div class="small-box bg-yellow">
                                                            <div class="inner">
                                                                <?php
                                                                    $result = mysqli_query($conn, "SELECT sum(amount) as amount FROM `banktransfer` where `status` = 1 ");
                                                                    $num = mysqli_fetch_array($result);
                                                                ?>
                                                                <h3 style="font-size: 26px;">₦<?php if(mysqli_num_rows($result) > 0 ) echo number_format($num['amount'],2); else echo number_format("0000"); ?></h3>
                                                                <p>Total Bank Transfer Amount</p>
                                                            </div>
                                                            <div class="icon" style="padding: 10px;">
                                                                <i class="fa fa-money"></i>
                                                            </div>
                                                        </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-blue">
                                                <div class="inner">
                                                    <?php
                                                    $query = ("SELECT sum(amount) as amount FROM `contribution` ");
                                                    $result = mysqli_query($conn, $query);
                                                    $num = mysqli_fetch_array($result);
                                                    ?>
                                                    <h3>₦<?php echo number_format($num['amount'],2); ?></h3>
                                                    <p>Total Contribution Amount Received</p>
                                                </div>
                                                <div class="icon" style="padding: 10px;">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                            </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-4 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-green">
                                                <div class="inner">
                                                    <?php
                                                    $query = ("SELECT sum(dailyInterest) as amount FROM `contribution` ");
                                                    $result = mysqli_query($conn, $query);
                                                    $num = mysqli_fetch_array($result);
                                                    ?>
                                                    <h3>₦<?php echo number_format($num['amount'],4); ?></h3>
                                                    <p>Total Interests</p>
                                                </div>
                                                <div class="icon" style="padding: 10px;">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                            </div>
                                        </div><!-- ./col -->
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
