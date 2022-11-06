<?php
//error_reporting(0);
include_once('config/data_access.php');
include_once('config/config.php');
$reg = new  DBaseAccess();
session_unset();
if (isset($_POST['register'])) {
    $emailAddress = trim($_POST['emailAddress']);
    $password = trim($_POST['password']);
    $accType = trim($_POST['accType']);

    if ($accType == "subscriber") {

        $usersub = $reg->userSubscriber($emailAddress, $password);
        if ($usersub  === false) {
?>
            <script>
                alert("Username or Password is Wrong. Try Again");
                window.location = "signin";
            </script>
        <?php
        } else {
            /**
             * Verify Subscriber.
             */
            $verify = $reg->verifyUserMail($conn, $usersub['userId']);
            $verifyPhone = $reg->verifyPhoneAccount($usersub['userId']);
            if ($verify == false  || $verifyPhone == false) {
                $url = base64_encode($usersub['userId']) . "&emailAddress=" . base64_encode($usersub['emailAddress']);
                echo "<script>
                    alert('Your Account have not being verified. Click Ok to Verify');
                    var url = '$url';
                    window.location = 'subscriber/verification?userId=' + url;
                </script>";
            } else {
                $_SESSION['userid'] = $userid;
                $_SESSION['emailAddress'] = $emailAddress;
                $reg->redirect("subscriber/index.php");
            }
        }
    } else {
// PAU_O10_
        // return false;

        $userlog = $reg->userLogin($emailAddress, $password);
        if (!$userlog) {
        ?>
            <script>
                alert("Username or Password is Wrong. Try Again");
                window.location = "signin";
            </script>
            <?php
        } else {
            $userId = $userlog->userId;
            $emailAddress = $userlog->emailAddress;
            //check the status of the phone verification
            $sql = $conn->query("select * from verifyphone where userId = '$userId'");
            $res = $sql->fetch_assoc();
            $status = intval($res["status"]);
            if ($status == 0) {
                $url = base64_encode($userId) . "&emailAddress=" . base64_encode($emailAddress);
            ?>
                <script>
                    alert("Your Phone Number has not being verified. Click Ok to Verify");
                    var url = "<?php echo $url; ?>";
                    window.location = "stagetwo?userId=" + url;
                </script>
                <?php
            } else {
                //check the subscription details
                $sql = $conn->query("select * from subscription where userId = '$userId'");
                $row = $sql->num_rows;
                if ($row < 1) {
                    $url = "$userId&emailAddress=$emailAddress";
                ?>
                    <script>
                        alert("You are yet to subscribed. Click Ok to Subscribe");
                        var url = "<?php echo $url; ?>";
                        window.location = "subscription?userId=" + url;
                    </script>
                    <?php
                } else {
                    //check the payment details
                    //check the subscription details
                    $sql = $conn->query("select * from payment where userId = '$userId'");
                    $row = $sql->num_rows;
                    if ($row < 1) {
                        //get the plan details of the user
                        $sql = $conn->query("select * from subscription where userId = '$userId'");
                        $res = $sql->fetch_assoc();
                        $plan = trim($res["plan"]);
                        $url = base64_encode($userId) . "&emailAddress=" . base64_encode($emailAddress) . "&plan='$plan'";
                    ?>
                        <script>
                            alert("You are yet to pay for your subcription. Click Ok to pay.");
                            var url = "<?php echo $url; ?>";
                            window.location = "payment?userId=" + url;
                        </script>
                        <?php
                    } else {
                        //chck the payment details if the admin has approved.
                        $res = $sql->fetch_assoc();
                        $status = intval($res["status"]);
                        if ($status == 0) {
                        ?>
                            <script>
                                alert("Your Payment Has not being Confirmed by Admin \n Check back or send mail to admin");
                            </script>
<?php
                        } else {
                            $sql = $conn->query("select * from subscription where userId = '$userId'");
                            $res = $sql->fetch_assoc();
                            $plan = trim($res["plan"]);
                            setcookie("emailAddress", $emailAddress, time() + 3600, "/");
                            setcookie("password", $userlog->password, time() + 3600, "/");
                            //store value in session
                            $_SESSION['start'] = time();
                            $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
                            $_SESSION['emailAddress'] = $emailAddress;
                            $_SESSION['userId'] = $userId;
                            if ($plan == "ordinary")
                                $reg->redirect('ordinary/index');
                            else if ($plan == "standard")
                                $reg->redirect('standard/index');
                            else if ($plan == "premium")
                                $reg->redirect('premium/index');
                        }
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Authentication | Onestop Procurements </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="vendor/uploads/favicon.png">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#" style="color:#dd4b39;"><img src="uploads/mainlogo.png"></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg" style="color:#2B3187;font-size:16px;">Login to your Account </p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email Address" name="emailAddress" required />
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" required />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="password">Account Type</label>
                    <select class="form-control" name="accType" id="accType" required>
                        <option value="">Select Account Category</option>
                        <option value="subscriber">Subscriber</option>
                        <option value="vendor">Vendor</option>
                    </select>



                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary btn-block btn-flat" name="register">Sign In</button>
                </div>
                <div class="form-group">
                    <a href="#" class="form-control btn btn-danger btn-block btn-flat" name="forgot">Forgot Password</a>
                </div>

            </form>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="vendor/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="vendor/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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