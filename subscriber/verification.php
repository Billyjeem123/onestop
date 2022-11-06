<?php
//error_reporting(0);
include_once('../config/data_access.php');
include_once('../config/config.php');
//check the parameter passed if exists
$reg = new DBaseAccess();
$phoneNumber = "";
if (isset($_GET['userId']) or isset($_GET['emailAddress'])) {
    // get the value of vendId and Email Address
    $userid = base64_decode($_GET['userId']);
    $email = base64_decode($_GET['emailAddress']);
    $fetch = $reg->getDetails($userid, $email);
    $phoneNumber = $fetch["phoneNumber"];
    $emailAddress = $fetch["emailAddress"];
} 
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Verification Page | Onestop Procurements </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="uploads/favicon.png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <script src="jquery-3.5.1.min.js"></script>
    <script src="function.js"></script>
    
</head>

<body class="login-page">
    <input type="hidden" name="mail" value="<?php  echo $userid; ?>" id='showMaail'>
    <div class="login-box">
        <div class="login-logo">
            <a href="#" style="color:#dd4b39;"><img src="uploads/mainlogo.png"></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg" style="color:#2B3187;font-size:16px;">Subscriber's Email and Phone Verification </p>
            <form method="post" enctype="multipart/form-data" name="register">

                <div class="row">
                    <div class="form-group col-md-8" style="padding-right:5px;">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" value="<?php echo $emailAddress; ?>" name="email" id="email" required readonly />
                    </div>
                    <div class="form-group col-md-4" style="padding-left:0px;">
                        <label></label>
                        <?php
                        if ($reg->checkmailStatus($conn, $userid) == 1) {
                            echo " <span class=' glyphicon glyphicon-ok form-control btn btn-success verifyEmail'style=' padding:5px;margin-top:5px;' id='verifyEmail'> Verified</span>";
                        } else {
                            echo "<span class=' form-control btn btn-warning verifyEmail'style='padding:5px;margin-top:5px;' id='verifyEmail'> Verify Email</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-8" style="padding-right:5px;">
                        <label for="phoneNumber">Mobile Phone</label>
                        <input type="text" class="form-control" value="<?php echo $phoneNumber; ?>" name="phoneNumber" id="phoneNumber" required readonly />
                    </div>
                    <div class="form-group col-md-4" style="padding-left:0px;">
                        <label for="Email"></label>
                        <?php
                        if ($reg->checkPhoneStatus($conn, $userid) == 1) {
                            echo " <span class=' glyphicon glyphicon-ok form-control btn btn-success verifyPhone'style='padding:5px;margin-top:5px;' id='verifyPhone'> Verified</span>";
                        } else {
                            echo "<span class=' form-control btn btn-warning verifyPhone'style='padding:5px;margin-top:5px;' id='verifyPhone'> Verify Mobile</span>";
                        }
                        ?>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <button id="sendCode" type="button" class="form-control btn btn-primary btn-block btn-flat">Click to Verify Phone Number</button>
                </div>

            </form>
        </div><!-- /.login-box-body -->
        <div id="emailresponsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Enter the OTP Sent to your Registered Email Address </h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" name="otpcode">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="otp">OTP Code</label>
                                    <input name="otp" type="text" class="form-control" id="otp" />
                                </div>
                                
                                <button class="btn btn-space btn-info active btn-rounded btn-outline" type="button" name="verifyOTPCode" id="verifyOTPCode"> Verify Email </button>
                               
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-danger waves-effect waves-light">Close</button>
                </div>
            </div>
        </div>

    </div><!-- /.login-box -->
    <div id="phoneresponsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Enter the OTP Sent to your Phone Number </h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" name="otpcode">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="otp">OTP Code</label>
                                <input name="phoneotp" type="text" class="form-control" id="phoneotp" />
                            </div>
                            <button class="btn btn-space btn-info active btn-rounded btn-outline" type="button" name="verifyPhoneCode" id="verifyPhoneCode"> Verify Phone </button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-danger waves-effect waves-light">Close</button>
            </div>
        </div>
    </div>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>