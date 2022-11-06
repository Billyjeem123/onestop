<?php
include_once('../config/data_access.php');
$reg = new DBaseAccess();
  //get the id and otp value
  $userId = intval($_GET['userId']);
  $otp = trim($_GET['otp']);
  $country = trim($_GET['country']);
  $emailRes = $reg->getEmailAddress;
  $emailAddress = $emailRes->emailAddress;
  $message =
                     "<html>
                    <body>
                    <p> <strong> Welcome to Onestop Procurement </strong></p>
                    <p> We are experienced and respected professionals that provide a wide array of value-added advisory services to its clients in risk management, strategic management, 
                        suppliers verification, ID verifications, and training.  
                    </p>
                    <p> Your OTP verification code is <strong> $otp </strong
                    </p>
                    </body>
                    </html>";
    $subject = "Your OTP Verification";
    if ($reg->storeotp($userId, $otp, $country)) {
       if($reg->sendNewMessage($emailAddress, $subject, $message))
       {
          echo "save";
       }
    }
    else {
     echo "error";
    }
?>