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

$sql = mysqli_query($con,"SELECT max(id) as eNo FROM `executive`");
$res = mysqli_fetch_array($sql);
$maxUnitNo =  intval($res['eNo']);

if(isset($_POST['create']))
{
    $eName = strtolower($_POST['eName']);
    $refLink = trim($_POST['refLink']);
    $fullName = trim($_POST['fullName']);
    $phoneNumber = trim($_POST['phoneNumber']);
    $emailAddress = trim($_POST['emailAddress']);
    $sex = trim($_POST['sex']);
    $address = trim($_POST['address']);
    $locationState = trim($_POST['locationState']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm-password']);
    if($password == $confirmPassword)
    {
            if($reg->adminRegisterExec($eName,$refLink,$fullName,$phoneNumber,$emailAddress,$sex,$address,$locationState,$username,$password))
                $msg = "Success! Executive Account Created";
            else
                $msg = "Error! Unable to Create Executive Account";
            ?>
            <script>
                let res = "<?php echo $msg;?>";
                alert(res);
            </script>
            <?php
            echo "<script type='text/javascript'>";
            echo "window.location='createLinks'";
            echo "</script>";

    }
    else{
        ?>
        <script>
            alert("Password Not Match");
        </script>
        <?php
        echo "<script type='text/javascript'>";
        echo "window.location='createLinks'";
        echo "</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Executive Links | Admin Portal </title>
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
            let u = "<?php echo $maxUnitNo ?>";
            let eNo = ZeroPadNumber(parseInt(u) + 1 );
            $("#eNo").val(eNo);
        });
        function ZeroPadNumber ( nValue )
        {
            if ( nValue < 10 )
            {
                return ( '00' + nValue.toString () );
            }
            else if ( nValue < 100 )
            {
                return ( '00' + nValue.toString () );
            }
            else
            {
                return ( nValue );
            }
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
                Create Executive Links
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
                            <div class="box-header">
                                <h3 class="box-title"></h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="" method="POST" name="createLinks" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="unitNo">Link Number</label>
                                            <input type="text" class="form-control" readonly="readonly" name="eNo" id="eNo" autocomplete="off"  required="required">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="unitName">Unit Name</label>
                                            <input type="text" class="form-control" name="eName" id="eName" required="required" autocomplete="off" onchange="confirmLinkName()">
                                        </div>
                                        <script>
                                            function confirmLinkName()
                                            {
                                                let eName = $("#eName").val().toLowerCase();
                                                $.ajax({
                                                    url: "checkLinkName.php",                           // Any URL
                                                    type: "POST",
                                                    data: new FormData(createLinks),
                                                    contentType: false,
                                                    cache: false,
                                                    processData:false,        // Serialize the form data
                                                    success: function (data) {
                                                        if(data == "exist") {
                                                            alert("The Link Name Already Exists. Try Another Name");
                                                            $("#eName").val("");
                                                        }
                                                        else {
                                                            let ref = "https://tminnoafrica.com/tradefund/register?ref="+eName;
                                                            $("#refLink").val(ref);
                                                        }
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="refLink">Executive's Referral Link</label>
                                            <input type="text" class="form-control" placeholder="" readonly="readonly" name="refLink" required="required" id="refLink" autocomplete="off" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" name="fullName" id="fullName" required="required" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="phoneNumber">Phone Number</label>
                                            <input type="tel" class="form-control" placeholder="080xxxx" name="phoneNumber" id="phoneNumber" required="required" autocomplete="off" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="emailAddress">Email Address</label>
                                            <input type="email" class="form-control" name="emailAddress" id="emailAddress" required="required" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="sex">Sex</label>
                                            <select class="form-control" placeholder="070xxxx" name="sex" required="required" id="sex" autocomplete="off">
                                                <option value=""> -- Select Gender -- </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address">Full Address</label>
                                            <input type="text" class="form-control" name="address" id="address" required="required" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="locationState">Location/State</label>
                                            <input type="text" class="form-control" placeholder="" name="locationState" required="required" id="locationState" autocomplete="off" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" required="required" autocomplete="off" />
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" required="required" autocomplete="off" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="confirm-password">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="" name="confirm-password" id="confirm-password"required="required" autocomplete="off" onkeyup="confirmPassword()" />
                                            <p style="margin: 0px 0px 0px 0px;" id="divCheckPasswordMatch"></p>
                                        </div>
                                        <script>
                                            function confirmPassword()
                                            {
                                                var password = $("#password").val();
                                                var confirmPassword = $("#confirm-password").val();

                                                if (password != confirmPassword) {
                                                    $("#divCheckPasswordMatch").html("Password do not match!");
                                                    $("#divCheckPasswordMatch").css('color', 'red');
                                                    $("$confirm-password").val("");
                                                }
                                                else
                                                {
                                                    $("#divCheckPasswordMatch").html("Password Match.");
                                                    $("#divCheckPasswordMatch").css('color', 'green');
                                                }
                                            }
                                        </script>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="create">Create Links</button>
                                </div>
                            </form>
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
