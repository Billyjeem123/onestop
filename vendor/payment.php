<?php
//error_reporting(0);
include_once('../config/config.php');
//check the parameter passed if exists
$amount = "";
$bankName="";
$accountName="";
$accountNumber = "";
if(isset($_GET['userId']) or isset($_GET['emailAddress']) or isset($_GET['plan']) )
{
    // get the value of vendId and Email Address
    $userId = base64_decode($_GET['userId']);
    $emailAddress = base64_decode($_GET['emailAddress']);
    $plan = trim($_GET['plan']);
    //geth the amount of the plan subscribed
    $res = $conn->query("select amount from plan where plan = '$plan' ");
    $out = $res->fetch_assoc();
    $amount = $out["amount"];
    //check if the person subscription already inserted
    $sql = $conn->query("Select * from subscription where userId = '$userId'");
    $row = $sql->num_rows;
    if($row < 1)
        //insert the subscription plan the person picked.
        $conn->query("insert into subscription(userId,plan,amount) values('$userId','$plan','$amount') ");
    //get the company bank details
    $res = $conn->query("select * from companybank where id = 1 ");
    $out = $res->fetch_assoc();
    $bankName = $out["bankName"];
    $accountName = $out["accountName"];
    $accountNumber = $out["accountNumber"];
}
else {
    //$reg->redirect('index');
}
if(isset($_POST['verifyPayment']))
{
    $imageError="";
    $userId = base64_decode($_GET['userId']);
    $emailAddress = base64_decode($_GET['emailAddress']);
    $tempAmount = trim($_POST['amount']);
	$totalAmount = doubleval( preg_replace('/[^\d.]/', '', $tempAmount) );
	$target_dir="paymentslip/$emailAddress";
	if(!is_dir($target_dir))  
    {
		mkdir("$target_dir",0777);
	}
	$mempic=$_FILES["slip"]["name"];
	$target_file = $target_dir."/".$mempic;
    $uploadOk = 1;
	$filetempname=$_FILES["slip"]["tmp_name"];
    if($imageError=="") 
	{
		$ext = strtolower(substr(strrchr($mempic, "."), 1));
		$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp','pdf');
		if(!in_array($ext, $image_extensions_allowed))
		{
			$exts = implode(', ',$image_extensions_allowed);
			$imageError .= "We allow images with one of the following extensions: ".$exts."<br>";
		}
		$extension = $ext;
	}
    if ($_FILES["slip"]["size"] > 4000000) {
        $imageError.="Sorry, your file is too large. We allow max of 5MB";
        $uploadOk = 0;
    }
    if ($uploadOk == 0 || $imageError!="") {
        $imageError.="Sorry, your file was not uploaded.";
    }
    else
    {
        if (move_uploaded_file($_FILES["slip"]["tmp_name"], $target_file)) {
            $icon=$target_file;
        } else {
            $imageError.="Sorry, there was an error uploading your file.";
        }
    }
    if(empty($imageError))
    {
    
        $pmode1=$target_file;
        $query = "Insert into payment(userId,amount,proof,datepaid) values('$userId','$totalAmount','$pmode1', now())";
        $conn->query($query);
        ?>
          <script type="text/javascript">
            alert("Payment Proof Successfully uploaded. Welcome to Onestop Procurement. Happy to receive you. ");
            window.location = "signin";
          </script>
        <?php
    }
    else {
        ?>
          <script type="text/javascript">
            var error = "<?php echo $imageError; ?>"
            var msg = "Following Error have occured while processing your payment: " + error ;
              alert(msg);
          </script>
        <?php
    } 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Details | Onestop Procurements </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="uploads/favicon.png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <script src="jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#transfer').hide();
    });
    </script>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#" style="color:#dd4b39;"><img src="uploads/mainlogo.png"></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg" style="color:#2B3187;font-size:16px;"><strong>Business Profile Payment Details</strong> </p>
        <form action="" method="post" enctype="multipart/form-data" name="register">
            <p>You are to pay: <strong>₦ <?php echo number_format($amount, 2); ?> </strong> </p>
            <input type="hidden" class="form-control" name="prevAmount" id="prevAmount" value="<?php echo $amount;?>" />
            <div class="form-group has-feedback">
                <label for="phoneNumber">Any Payment Voucher</label>
                <input type="text" class="form-control" name="voucher" id="voucher" onkeyUp="formatNumber(event)" onchange="applyVoucher()" />
                <span class="glyphicon glyphicon-money form-control-feedback"></span>
            </div>
            <script>
                function applyVoucher()
                {
                    var amount = parseInt($("#prevAmount").val());
                    var tempVoucher = $('#voucher').val();
                    if(tempVoucher == "")
                    {
                        $("#amount").val(amount.toLocaleString('en'));
                    }
                    else{
                        var voucher = parseInt(tempVoucher.replace(/[^0-9\.]/g,''), 10);
                        var totalAmount = parseFloat(amount - voucher);
                        $("#amount").val(totalAmount.toLocaleString('en'));
                    }  
                }
                function formatNumber(event) {
                        if(event.which >= 37 && event.which <= 40) 
                          
                          return;
                          // format number
                          $('#voucher').val(function(index, value) {
                            return value
                            .replace(/\D/g, "")
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                              ;
                            });
                    }

            </script>
            <div class="form-group has-feedback">
                <label for="amount">Total Amount To Pay </label>
                <input type="text" class="form-control"  name="amount" value="<?php echo number_format($amount,2); ?>" id="amount" required readonly />
                <span class="glyphicon glyphicon-money form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="payment">Payment Option</label>
                <select id="payOption" name="payOption" id="payOption" class="form-control" required onchange="selectPayment()">
                    <option value="">Select Payment Option</option>    
                    <option value="online">Debit/Credit Card</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>
            <script>
                function selectPayment()
                {
                    var payOption = $('#payOption').val();
                    if(payOption == "online")
                    {
                        $('#transfer').hide();
                    }
                    else if(payOption == "transfer")
                    {
                        $('#transfer').show(); 
                    }
                    else {
                        alert("Select the Payment Option");
                    }
                }
            </script>
            <div id="transfer">
                <div class="form-group has-feedback">
                    <p>Pay through Bank Transfer or Deposit </p>
                    <p>Bank Name:  <strong> <?php echo $bankName; ?> </strong></p>
                    <p>Account Name: <strong> <?php echo $accountName; ?> </strong></p>
                    <p>Account Number: <strong> <?php echo $accountNumber; ?> </strong></p>
                </div>
                <div class="form-group has-feedback">
                    <label for="slip">Upload Payment Slip</label>
                    <input type="file" class="form-control" require name="slip" id="slip" />
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary btn-block btn-flat" name="verifyPayment" >Save Payment Details</button>
                </div>
            </div>
            
        </form>
    </div><!-- /.login-box-body -->
    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Enter the OTP Sent to your phone </h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" name="verityOTPCode" id="verifyOTPCode" >
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="otp">OTP Code</label>
                                <input name="otp" type="text" class="form-control" id="otp" />
                            </div>
                        <button class="btn btn-space btn-info active btn-rounded btn-outline" type="button" onclick="verifyOTPCode()"> Verify Phone </button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-danger waves-effect waves-light">Close</button>
            </div>
        </div>
    </div>
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    function verifyPhone()
    {
        //the the phone number and the id of the person
        var country = $("#country").val();
        let userId = "<?php echo base64_decode($_GET['userId']); ?>";
        //generate a random OTP Code
        var otp = Math.floor(100000 + Math.random() * 900000);
         $.ajax({
             url: "storeotp.php?userId="+userId+"&otp="otp+"&country="+country,                           // Any URL
             type: "POST",
             data: new FormData(register), 
                   contentType: false,
             cache: false,
             processData:false,        // Serialize the form data
             success: function (data) {
                if(data == "save") 
                {
                    //call the function that send the code to the phone API
                    $("#responsive-modal").modal();
                }
                else if(data == "error") {
                   alert("Error Sending OTP Code");
                }
             }
          });
          //display the modal to verify the code
    }
    function verifyOTPCode()
    {
        let userId = "<?php echo base64_decode($_GET['userId']); ?>";
        var otpcode = $("#otp").val();
         $.ajax({
             url: "verifyotp.php?userId="+userId+"&otp="otp,                           // Any URL
             type: "POST",
             data: new FormData(register), 
                   contentType: false,
             cache: false,
             processData:false,        // Serialize the form data
             success: function (data) {
                if(data == "save") 
                {
                   window.location = 'payment';
                }
                else if(data == "error") {
                   alert("OTP Code Enter is Wrong");
                   $("#responsive-modal").modal(hide);
                }
             }
          });
          //display the modal to verify the code
        
    }
    
</script>
</body>
</html>
