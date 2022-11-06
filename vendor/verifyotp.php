<?php
include('../config/config.php');
  //get the id and otp value
  $userId = intval($_GET['userId']);
  $otp = trim($_GET['otp']);
  $sql = "Select otp from verifyphone where userId = '$userId' ";
  $res = $conn->query($sql);
  $out = $res->fetch_assoc();
  $dOtp = $out["otp"];
    if ($otp == trim($dOtp)) 
    {
    	//update the status details
        $conn->query("Update verifyphone set status = 1 where userId = '$userId' ");
        //check how many minutes
        echo "save";
    }
    else {
     echo "error ";
    }
?>