<?php
include_once('../config/data_access.php');
include_once('../config/config.php');
$admin = new DBaseAccess();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['username']) || ($_SESSION['fullName'] == '')) {
    header("location: index.php");
    exit();
}
$username = $_SESSION['username'];
$query = ("SELECT * FROM `admin` WHERE `username` = '$username'");
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$fname = $row['fullName'];
$pic = $row['picture'];

$msg = "";
//get the investment plan
if(isset($_GET['verify']))
{
    $id = intval($_GET['id']);
    $userId = intval($_GET['userId']);
    $query = mysqli_query($con, "UPDATE `banktransfer` set `status` = 1 where (`userId` = '$userId' and `id` = '$id') ");
    if($query)  
        $msg = 'success';
    else 
        $msg = 'error';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Contributor's Bank Transfer Payments </title>
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
            $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
                $("#success-alert").alert('close');
                window.location='verifyBankTransfer';
            }); 
            $("#error-alert").fadeTo(3000, 500).slideUp(500, function(){
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
                Contributor's Wallet Bank Transfer Verification
                <small></small>
            </h4>
            <section class="content">
                <div class="row">
                    <?php  if( isset($msg) and $msg == 'success') 
                                        { ?>
                                            <div class="alert alert-success" id="success-alert">
                                                <strong>Success! Contributor's Wallet Bank Transfer Confirmed</strong>
                                            </div>
                                            <?php  } 
                                            if (isset($msg) and $msg == 'error') { ?>
                                                <div class="alert alert-error" id="error-alert">
                                                <strong>Error Confirming Contributor's Wallet Bank Transfer</strong>
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
                                        <tr>
                                            <th>No</th>
                                            <th>Date Initiate</th>
                                            <th>Contributor's Name</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>Amount(₦)</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $trans=mysqli_query($con,"SELECT * FROM `banktransfer` order by id DESC");
                                        $no = 0;
                                        while($row = mysqli_fetch_array($trans))
                                        {
                                            $no = $no + 1;
                                            $userId = $row['userId'];
                                            $sql = mysqli_query($con, "Select * from `user` where `userId` = '$userId'");
                                            $res = mysqli_fetch_array($sql);
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php $date = date_create($row['dateAdded']); echo date_format($date, 'j / n / Y');  ?></td>
                                                <td><?php echo ucfirst($res['fullName']) ; ?></td>
                                                <td><?php echo ucfirst($res['bankName']) ; ?></td>
                                                <td><?php echo ucfirst($res['accountNumber']) ; ?></td>
                                                <td><?php echo number_format($row['amount'],2); ?></td>
                                                <?php 
                                                    if ( $row['status'] == 0) {
                                                ?>
                                                    <td><a class="btn btn-space btn-warning active" href="verifyBankTransfer?id=<?php echo $row['id']; ?>&userId=<?php echo $row['userId']; ?>&verify=verify" title="Verify Payment"> Confirm Payment</a></td>
                                                <?php 
                                                    }
                                                    else if ( $row['status'] == 1) {
                                                ?>
                                                    <td><span class="btn btn-space btn-success"> Payment Confirmed</span></td>
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

