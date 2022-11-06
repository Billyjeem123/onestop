<?php
include_once('../../config/data_access.php');
include_once('../../config/config.php');
$reg = new DBaseAccess();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['emailAddress']) || ($_SESSION['userId'] == '')) 
{
    header("location: ../signin.php");
}
else {
	include('session_check.php');
}
$emailAddress = $_SESSION['emailAddress'];
$userId = $_SESSION['userId'];
$query = ("SELECT * FROM vendor WHERE emailAddress = '$emailAddress' and userId = '$userId' ");
$result = $conn->query($query);
$row =$result->fetch_assoc();
$fname = strtoupper($row["surname"]) . " ". ucfirst($row["firstname"]);
$pic = $row["picture"];

if(isset($_POST['create']))
{
    $regType = $_POST['regType'];
    $regNumber = $_POST['regNumber'];
    $regDate = $_POST['regDate'];
    $regCountry = $_POST['regCountry'];
    if($reg->otherRegistration($userId,$regType,$regNumber,$regDate,$regCountry))
    {
        ?>
        <script type="text/javascript">
            alert("International Registration Details Successfully Saved");
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert("Error saving International Registration Details");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>International Registration  | Ordinary Portal Office</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="../uploads/favicon.png">
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../bootstrap/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="../jquery.min.js" type="text/javascript"></script>
    
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
                International Registration
            </h4>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- form start -->
                            <form role="form" action="" method="POST" name="createLinks" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="regType">Registration Type (ISO, EIN etc)</label>
                                            <input type="text" class="form-control" placeholder="" name="regType" required="required" id="regType" autocomplete="off" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="regNumber">Registration Number</label>
                                            <input type="text" class="form-control" placeholder="" name="regNumber" required="required" id="regNumber" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="regDate">Registration Date</label>
                                            <input type="Date" class="form-control" placeholder="" name="regDate" required="required" id="regDate" autocomplete="off" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="regCountry">Country of Registration</label>
                                            <input type="text" class="form-control" placeholder="" name="regCountry" required="required" id="regCountry" autocomplete="off" />
                                        </div>
                                    </div> 
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="create">Save Details</button>
                                </div>
                            </form>
                        </div><!-- /.box -->
                    </div>
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
                                        <th>Registration Type</th>
                                        <th>Registration Number</th>
                                        <th>Date of Registration</th>
                                        <th>Country</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $trans=mysqli_query($conn,"SELECT * FROM intregistration where userId = '$userId' ORDER BY  id DESC ");
                                            $no = 0;
                                            while($row = mysqli_fetch_array($trans))
                                            {
                                                $no = $no + 1;
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php $date = date_create($row['regdate']); echo date_format($date, 'j / n / Y');  ?></td>
                                                    <td><?php echo $row['regtype']; ?></td>
                                                    <td><?php echo $row['regnumber']; ?></td>
                                                    <td><?php echo $row['country']; ?></td>
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
