<?php


require_once("vendor/init.php");

$database = new Database();
$user = new Users();

 

if (isset($_POST['username']) or !empty($_POST['password'])) {


$user->username = $database->escape_string($_POST['username']);
$user->password = $database->escape_string($_POST['password']);
 $TrackIp = $user->Geolocation();
 $foundIp  =  $TrackIp->ip;

echo $sql = " SELECT * FROM tblusers WHERE username = '$username'";
return false;
$find_user =  $user->LogUser($user->username);
var_dump($find_user);
$rows = $database->rows($find_user);

if ($rows > 0) {



    foreach ($find_user as $key) {

        if (password_verify($user->password, $key['password'])) {
            
          $UserId =   intval($key['id']);

            $user->InsertLocationLogin($user->username, $foundIp);

            $array = [
                'success' => true,
                'message' => 'Logged in successfully',
                'username' => $user->username,
                'userid' => $UserId,
                'ipaddress' => $foundIp
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        } else {
            $array = [
                'success' => false,
                'message' => 'Username and Password Doesnt Match',
                'username' => $user->username,
                 'userid' => $UserId
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        }
    }
} else {

    $array = [
        'success' => false,
        'message' => 'Username or password does not exist in our database',
    ];
    $return = json_encode($array);
    echo "$return";
    exit();
}

}
