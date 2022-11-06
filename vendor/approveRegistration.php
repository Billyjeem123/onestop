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

if(isset($_GET['approve']))
{
    $id=intval($_GET['id']);
    $uNo = intval($_GET['uNo']);
    mysqli_query($con, "UPDATE `payment` SET `status` = '1' WHERE `id` ='$id'");
    mysqli_query($con, "UPDATE `units` SET status = '1' WHERE `uNo` ='$uNo'");
    mysqli_query($con, "UPDATE `beneficiary` SET `status` = '1' WHERE `uNo` ='$uNo'");
    ?>
    <script>
        alert("Registration Payment Successfully Approved");
    </script>
    <?php
    echo "<script type='text/javascript'>";
    echo "window.location='approveRegistration'";
    echo "</script>";

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Approve Registration | Admin Portal </title>
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
                Approve Registration Payment
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
                                            <th>Date Paid</th>
                                            <th>Units Name</th>
                                            <th>Amount Paid</th>
                                            <th>Proof of Payment</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $trans=mysqli_query($con,"SELECT * FROM payment where status = 0 ORDER BY  id DESC ");
                                        $no = 0;
                                        while($row = mysqli_fetch_array($trans))
                                        {
                                            $no = $no + 1;
                                            $uNo = $row['uNo'];
                                            $query = mysqli_query($con,"select uName from units where uNo = '$uNo' ");
                                            $res = mysqli_fetch_array($query);
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php $date = date_create($row['datePaid']); echo date_format($date, 'j / n / Y');  ?></td>
                                                <td><?php echo $res['uName']; ?></td>
                                                <td><?php echo number_format($row['amount'],2); ?></td>
                                                <?php
                                                $end = explode('.',$row['paymentProof']);
                                                if($end[1] == "pdf")
                                                {
                                                ?>
                                                <td align="center">
                                                    <embed src="../member/paymentProof/<?php echo $uNo."/".$row['paymentProof']; ?>" type="application/pdf" height="100px" width="120px" ><br/>
                                                    <a href="../member/paymentProof/<?php echo $uNo."/".$row['paymentProof']; ?>" target="_blank">View Proof</a>
                                                </td>
                                                <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <td align="center"><a href="../member/paymentProof/<?php echo $uNo."/". $row['paymentProof']; ?>" target="_blank"><img src="../member/paymentProof/<?php echo $uNo."/".$row['paymentProof']; ?>" height="50px" width="50px" /></a> </td>
                                                    <?php
                                                }
                                                ?>
                                                <td>
                                                    <a class="btn btn-space btn-warning active" href="approveRegistration?uNo=<?php echo $row['id']; ?>&id=<?php echo $row['id']; ?>&approve=approve" title="Approved Deposit"><i class="fa fa-heart"></i> Approved</a>&nbsp;
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

