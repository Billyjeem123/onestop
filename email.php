<?php
include_once('config/data_access.php');
$reg = new  DBaseAccess();

if(isset($_POST['contact']))
{
    $msg = array();
    $name = trim($_POST['name']) ;
    $email = trim($_POST['email']) ;
    $number = trim($_POST['number']);
    $message = trim($_POST['message']) ;
    $mailbody = 'From Asthetics' . PHP_EOL . PHP_EOL . 
                'name: ' . $name . '' . PHP_EOL .
                'email:' . $email . '' . PHP_EOL .
                'number : ' . $number . '' . PHP_EOL .
                'message: ' . $message . '' . PHP_EOL;
    $subject = 'New Lead Enquiry';
    $to = "ciggic2016@gmail.com";
    if ($reg->saveContact($name,$phone,$email,$message) )
    {
        //send the message to the admin
        if($reg->sendNewMessage($to, $subject, $mailbody))
        {
            $msg = "success";
        }
        else
        $msg =  'failed';
    }
    echo  json_encode($msg);
}

