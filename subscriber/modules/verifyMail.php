<?php
//error_reporting(0);
include_once('../../config/data_access.php');
include_once('../../config/config.php');
//check the parameter passed if exists
$reg = new DBaseAccess();

$userId = $_GET['userid'];
$otp = $_GET['otp'];

 $verify = $reg->verifySubscriberEmail($conn, $userId, $otp);
 if(!$verify){

    exit();
 }