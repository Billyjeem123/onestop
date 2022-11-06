<?php
include('Mail/Mail.php');
session_start();
class DBaseAccess
{
    public $conn = "localhost";
    public $dbasename = "onestop";
    public $dbuser = "root";
    public $dbpassword = "";
    private $db;
    //registeration parameter
    public $emailAddress = "";
    public $lastName = "";
    public $firstName = "";
    public $password = "";
    public $userName = "";
    public $userId = "";

    public function DB()
    {
        try {
            $db = new PDO('mysql:host=' . $this->conn . ';dbname=' . $this->dbasename, $this->dbuser, $this->dbpassword);
            return $db;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
            die();
        }
    }
    public function redirect($url)
    {
        header("Location: $url");
    }
    //to register the new vendor begin
    public function registerVendor($surname, $firstname, $emailAddress, $phoneNumber, $busName, $busAddress, $password)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO vendor (surname,firstname,emailAddress,phoneNumber,busName,busAddress,password,dateRegister) 
                           VALUES (:surname,:firstname,:emailAddress,:phoneNumber,:busName,:busAddress,:password,now()) ");
            $query->bindParam("surname", $surname, PDO::PARAM_STR);
            $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
            $query->bindParam("emailAddress", $emailAddress, PDO::PARAM_STR);
            $enc_password = md5($password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->bindParam("phoneNumber", $phoneNumber, PDO::PARAM_STR);
            $query->bindParam("busName", $busName, PDO::PARAM_STR);
            $query->bindParam("busAddress", $busAddress, PDO::PARAM_STR);
            $query->execute();
            $id = $db->lastInsertId();
            //insert the phoneverification
            $pQuery = $db->prepare("INSERT INTO verifyphone(userId,phoneNumber) VALUES(:userId,:phoneNumber) ");
            $pQuery->bindParam("userId", $id, PDO::PARAM_INT);
            $pQuery->bindParam("phoneNumber", $phoneNumber, PDO::PARAM_STR);
            $pQuery->execute();
            $pId = $db->lastInsertId();
            //insert the emailverification
            $eQuery = $db->prepare("INSERT INTO verifyemail(userId,emailAddress) VALUES(:userId,:emailAddress) ");
            $eQuery->bindParam("userId", $id, PDO::PARAM_INT);
            $eQuery->bindParam("emailAddress", $emailAddress, PDO::PARAM_STR);
            $eQuery->execute();
            $eId = $db->lastInsertId();

            if ($id > 0 and $pId > 0 and $eId > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    //save from end contact
    public function saveContact($fullName, $phone, $email, $details)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO contactus (fullName,phone,email,details) 
                           VALUES (:fullName,:phone,:email,:details) ");
            $query->bindParam("fullName", $fullName, PDO::PARAM_STR);
            $query->bindParam("phone", $phone, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("details", $details, PDO::PARAM_STR);
            $query->execute();
            $id = $db->lastInsertId();
            if ($id > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function otherRegistration($userId, $regType, $regNumber, $regDate, $regCountry)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO intregistration(userId,regtype,regnumber,regdate,country) 
                           VALUES (:userId,:regType,:regNumber,:regDate,:regCountry) ");
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->bindParam("regType", $regType, PDO::PARAM_STR);
            $query->bindParam("regNumber", $regNumber, PDO::PARAM_STR);
            $query->bindParam("regDate", $regDate, PDO::PARAM_STR);
            $query->bindParam("regCountry", $regCountry, PDO::PARAM_STR);
            $query->execute();
            $id = $db->lastInsertId();
            if ($id > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function storeotp($userId, $otp, $country)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE verifyphone set otp = :otp where userId = :userId");
            $query->bindParam("otp", $otp, PDO::PARAM_STR);
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $s = $query->execute();
            $vQuery = $db->prepare("UPDATE vendor set country = :country where userId = :userId");
            $vQuery->bindParam("country", $country, PDO::PARAM_STR);
            $vQuery->bindParam("userId", $userId, PDO::PARAM_INT);
            $v = $vQuery->execute();
            if ($s and $v) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    // function to send email begin
    function sendNewMessage($to, $subject, $message)
    {
        $from = "Onestop Procurement <info@onestopprocurement.com>";
        $host = "ssl://premium213.web-hosting.com";
        $port = "465";
        $email_address = "info@onestopprocurement.com";
        $username = "info@onestopprocurement.com";
        $password = "OneStopProc@2021";
        $content = "text/html; charset=utf-8";
        $mime = "1.0";
        $headers = array(
            'From' => $from,
            'To' => $to,
            'Subject' => $subject,
            'Reply-To' => $email_address,
            'MIME-Version' => $mime,
            'Content-type' => $content
        );

        $smtp = Mail::factory(
            'smtp',
            array(
                'host' => $host,
                'port' => $port,
                'auth' => true,
                'username' => $username,
                'password' => $password
            )
        );

        $mail = $smtp->send($to, $headers, $message);
        if (PEAR::isError($mail)) {
            echo ("<p>" . $mail->getMessage() . "</p>");
            return false;
        } else {
            return true;
        }
    }
    public function sendSMS($recipient_phone_numbers, $message)
    {
        $service_plan_id = "58f82a583175401690630f8afd9f93ec";
        $bearer_token = "YOUR_API_token";

        //Any phone number assigned to your API
        $send_from = "+12064743875";
        //May be several, separate with a comma , 
        $message = "Test message to {$recipient_phone_numbers} from {$send_from}";
        // Check recipient_phone_numbers for multiple numbers and make it an array.
        if (stristr($recipient_phone_numbers, ',')) {
            $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
        } else {
            $recipient_phone_numbers = [$recipient_phone_numbers];
        }
        // Set necessary fields to be JSON encoded
        $content = [
            'to' => array_values($recipient_phone_numbers),
            'from' => $send_from,
            'body' => $message
        ];

        $data = json_encode($content);

        $ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
        curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, $bearer_token);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
            echo $result;
        }
        curl_close($ch);
    }
    //send email function end
    // Send Activation to confirm email and Continue Registration
    public function sendActivation($emailAddress)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM vendor WHERE emailAddress =:email");
            $query->bindParam("email", $emailAddress, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $res = $query->fetch(PDO::FETCH_OBJ);
                $userId = $res->userId;
                $subject = "Please Activate Your Account";
                $sentDetails = base64_encode($userId) . "&emailAddress=" . base64_encode($emailAddress);
                $message =
                    "<html>
                    <body>
                    <p> <strong> Welcome to Onestop Procurement </strong></p>
                    <p> We are experienced and respected professionals that provide a wide array of value-added advisory services to its clients in risk management, strategic management, 
                        suppliers verification, ID verifications, and training.  
                    </p>
                    <p><a href='https://onestopprocurement.com/vendor/stagetwo?userId=$sentDetails'>Please Click Here to Activate Your Account</a></p>
                    </body>
                    </html>";
                return $this->sendNewMessage($emailAddress, $subject, $message);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    //End Send Activation to confirm and Continue Registration
    // register new vendor end
    /*
     * Login
     *
     * @param $username, $password
     * @return $mixed
     * */
    public function userLogin($username, $password)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM vendor WHERE emailAddress =:username AND password =:password");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = md5($password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function getEmailAddress($userId)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM vendor WHERE userId =:userId");
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function getUserId($emailAddress)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM vendor WHERE emailAddress =:emailAddress");
            $query->bindParam("emailAddress", $emailAddress, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * */
    public function checkEmail($email)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM user WHERE emailAddress=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function checkUserName($userName)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM user WHERE username =:userName");
            $query->bindParam("userName", $userName, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    /*
     * Register New User
     *
     * @param $name, $email, etc 
     * @return ID
     * */
    public function registerUser($firstName, $lastName, $emailAddress, $userName, $password, $referral, $phone)
    {
        try {
            $jdate = date("Y-m-d h:i:sa");
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO user (firstName,lastName,emailAddress,password,jdate,username,referral,phoneNumber) VALUES (:firstName,:lastName,:emailAddress,:password,:jdate,:userName,:referral,:phone)");
            $query->bindParam("firstName", $firstName, PDO::PARAM_STR);
            $query->bindParam("lastName", $lastName, PDO::PARAM_STR);
            $query->bindParam("emailAddress", $emailAddress, PDO::PARAM_STR);
            $enc_password = md5($password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->bindParam("jdate", $jdate, PDO::PARAM_STR);
            $query->bindParam("userName", $userName, PDO::PARAM_STR);
            $query->bindParam("referral", $referral, PDO::PARAM_STR);
            $query->bindParam("phone", $phone, PDO::PARAM_STR);
            $query->execute();
            $id = $db->lastInsertId();
            if ($id > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function regSubAdmin($firstName, $lastName, $emailAddress, $userName, $password)
    {
        try {
            $jdate = date("Y-m-d h:i:sa");
            $adminType = 2;
            $active = 1;
            $referral = "zionsupport";
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO user (firstName,lastName,emailAddress,password,jdate,username,referral,adminType,active) VALUES (:firstName,:lastName,:emailAddress,:password,:jdate,:userName,:referral,:adminType,:active)");
            $query->bindParam("firstName", $firstName, PDO::PARAM_STR);
            $query->bindParam("lastName", $lastName, PDO::PARAM_STR);
            $query->bindParam("emailAddress", $emailAddress, PDO::PARAM_STR);
            $enc_password = md5($password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->bindParam("jdate", $jdate, PDO::PARAM_STR);
            $query->bindParam("userName", $userName, PDO::PARAM_STR);
            $query->bindParam("referral", $referral, PDO::PARAM_STR);
            $query->bindParam("adminType", $adminType, PDO::PARAM_INT);
            $query->bindParam("active", $active, PDO::PARAM_INT);
            $t = $query->execute();
            if ($t) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function saveFaq($title, $body)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT into faq(title,body) values(:title, :terms)");
            $query->bindParam("title", $title, PDO::PARAM_STR);
            $query->bindParam("terms", $body, PDO::PARAM_STR);
            $t = $query->execute();
            if ($t) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function saveWork($body)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO howworks(body) VALUES (:body)");
            $query->bindParam("body", $body, PDO::PARAM_STR);
            $t = $query->execute();
            if ($t) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function updateWork($body)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE howworks set body = :body where id = 1");
            $query->bindParam("body", $body, PDO::PARAM_STR);
            $t = $query->execute();
            if ($t) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function createPlan($pName, $pInfo, $pSlot, $pAmount, $pReturn, $pRinvest, $pDuration, $pStartDate, $pEndDate, $repayDate, $pType, $pInsurance, $pRepayment, $Itype)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO createplan (pName,pInfo,pSlot,pAmount,pReturn,pRinvest,pDuration,pStartDate,pEndDate,repayDate,pType,pInsurance,pRepayment,Itype) 
                VALUES (:pName,:pInfo,:pSlot,:pAmount,:pReturn,:pRinvest,:pDuration,:pStartDate,:pEndDate,:repayDate,:pType,:pInsurance,:pRepayment,:Itype)");
            $query->bindParam("pName", $pName, PDO::PARAM_STR);
            $query->bindParam("pInfo", $pInfo, PDO::PARAM_STR);
            $query->bindParam("pSlot", $pSlot, PDO::PARAM_INT);
            $query->bindParam("pAmount", $pAmount, PDO::PARAM_INT);
            $query->bindParam("pReturn", $pReturn, PDO::PARAM_INT);
            $query->bindParam("pRinvest", $pRinvest, PDO::PARAM_STR);
            $query->bindParam("pDuration", $pDuration, PDO::PARAM_STR);
            $query->bindParam("pStartDate", $pStartDate, PDO::PARAM_STR);
            $query->bindParam("pEndDate", $pEndDate, PDO::PARAM_STR);
            $query->bindParam("repayDate", $repayDate, PDO::PARAM_STR);
            $query->bindParam("pType", $pType, PDO::PARAM_STR);
            $query->bindParam("pInsurance", $pInsurance, PDO::PARAM_STR);
            $query->bindParam("pRepayment", $pRepayment, PDO::PARAM_STR);
            $query->bindParam("Itype", $Itype, PDO::PARAM_INT);

            $t = $query->execute();
            if ($t)
                return true;
            else
                return false;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function createPlanGetId($pName, $pInfo, $pSlot, $pAmount, $pReturn, $pRinvest, $pDuration, $pStartDate, $pEndDate, $repayDate, $pType, $pInsurance, $pImage, $pRepayment, $Itype)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO createplan (pName,pInfo,pSlot,pAmount,pReturn,pRinvest,pDuration,pStartDate,pEndDate,repayDate,pType,pInsurance,pImage,pRepayment,:Itype) 
                VALUES (:pName,:pInfo,:pSlot,:pAmount,:pReturn,:pRinvest,:pDuration,:pStartDate,:pEndDate,:repayDate,:pType,:pInsurance,:pImage,:pRepayment,:Itype)");
            $query->bindParam("pName", $pName, PDO::PARAM_STR);
            $query->bindParam("pInfo", $pInfo, PDO::PARAM_STR);
            $query->bindParam("pSlot", $pSlot, PDO::PARAM_INT);
            $query->bindParam("pAmount", $pAmount, PDO::PARAM_INT);
            $query->bindParam("pReturn", $pReturn, PDO::PARAM_STR);
            $query->bindParam("pRinvest", $pRinvest, PDO::PARAM_STR);
            $query->bindParam("pDuration", $pDuration, PDO::PARAM_STR);
            $query->bindParam("pStartDate", $pStartDate, PDO::PARAM_STR);
            $query->bindParam("pEndDate", $pEndDate, PDO::PARAM_STR);
            $query->bindParam("repayDate", $repayDate, PDO::PARAM_STR);
            $query->bindParam("pType", $pType, PDO::PARAM_STR);
            $query->bindParam("pInsurance", $pInsurance, PDO::PARAM_STR);
            $query->bindParam("pImage", $pImage, PDO::PARAM_STR);
            $query->bindParam("pRepayment", $pRepayment, PDO::PARAM_STR);
            $query->bindParam("Itype", $Itype, PDO::PARAM_STR);

            $t = $query->execute();
            if ($t)
                return true;
            else
                return false;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }


    public function sendForgotLink($emailAddress)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM user WHERE emailAddress =:email");
            $query->bindParam("email", $emailAddress, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $res = $query->fetch(PDO::FETCH_OBJ);
                $userId = $res->userId;
                $Name = strtoupper($res->lastName) . " " . $res->firstName;
                $subject = "For Your Forgot Password";
                $message =
                    "<html>
                    <body>
                        <p><a href='https://app.zionvestng.com/resetPassword.php?userId=$userId'>Please Click Here to Reset Your Password</a></p>
                    </body>
                    </html>";
                return $this->sendNewMessage($emailAddress, $subject, $message);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }

    public function changeUserPassword($newPassword, $userId)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE user set password = :password where userId = :userId");
            $enc_password = md5($newPassword);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function activateUser($userId)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE user set active = 1 where userId = :userId");
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function updateUserProfile($phoneNumber, $bankName, $bankType, $accountNumber, $userId, $emailAddress, $sex)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE user set phoneNumber = :phoneNumber, bankName = :bankName, bankType = :bankType, accountNumber = :accountNumber, sex = :sex WHERE (userId = :userId AND emailAddress = :emailAddress)");
            $query->bindParam("phoneNumber", $phoneNumber, PDO::PARAM_STR);
            $query->bindParam("bankName", $bankName, PDO::PARAM_STR);
            $query->bindParam("bankType", $bankType, PDO::PARAM_STR);
            $query->bindParam("accountNumber", $accountNumber, PDO::PARAM_STR);
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->bindParam("emailAddress", $emailAddress, PDO::PARAM_STR);
            $query->bindParam("sex", $sex, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function updatePicture($name, $userId)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE user set userPics = :name where userId = :userId");
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function saveUserMessage($userId, $senderEmail, $subject, $message)
    {
        try {
            $jdate = date("Y-m-d h:i:sa");
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO usermessages(userId,senderEmail,subject, message,noti_time) VALUES (:userId,:senderEmail,:subject,:message,:noti_time)");
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->bindParam("senderEmail", $senderEmail, PDO::PARAM_STR);
            $query->bindParam("subject", $subject, PDO::PARAM_STR);
            $query->bindParam("message", $message, PDO::PARAM_STR);
            $query->bindParam("noti_time", $jdate, PDO::PARAM_STR);
            $query->execute();
            $id = $db->lastInsertId();
            if ($id > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function sendSupportMessage($to, $subject, $message)
    {

        return $this->sendNewMessage($to, $subject, $message);
    }


    public function sendNotification($details, $status)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO notificationall(details,status) VALUES (:details,:status)");
            $query->bindParam("details", $details, PDO::PARAM_STR);
            $query->bindParam("status", $status, PDO::PARAM_INT);
            $query->execute();
            $id = $db->lastInsertId();
            if ($id > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function memberNotification($userId, $details, $status)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("INSERT INTO notification(userId,details,status) VALUES (:userId,:details,:status)");
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->bindParam("details", $details, PDO::PARAM_STR);
            $query->bindParam("status", $status, PDO::PARAM_INT);
            $query->execute();
            $id = $db->lastInsertId();
            if ($id > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function updateNotification($userId, $details)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE notification set details = :details where (userId = :userId) ");
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->bindParam("details", $details, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function checkNotification($userId)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM notification WHERE (userId=:userId)");
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    /*
     * Register New User
     *
     * @param $name, $email, etc 
     * @return ID
     * 
     */
    public function updateProfileDetails($lastName, $firstName, $phoneNumber, $bankName, $bankType, $accountNumber, $userId, $emailAddress, $userName)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE user set lastName = :lastName, firstName = :firstName, phoneNumber = :phoneNumber, bankName = :bankName, bankType = :bankType, accountNumber = :accountNumber, username = :userName WHERE (userId = :userId AND emailAddress = :emailAddress)");
            $query->bindParam("lastName", $lastName, PDO::PARAM_STR);
            $query->bindParam("firstName", $firstName, PDO::PARAM_STR);
            $query->bindParam("phoneNumber", $phoneNumber, PDO::PARAM_STR);
            $query->bindParam("bankName", $bankName, PDO::PARAM_STR);
            $query->bindParam("bankType", $bankType, PDO::PARAM_STR);
            $query->bindParam("accountNumber", $accountNumber, PDO::PARAM_STR);
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->bindParam("emailAddress", $emailAddress, PDO::PARAM_STR);
            $query->bindParam("userName", $userName, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function updateResponseMessage($userId, $response)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE usermessages set messageread = 1, response = :response where userId = :userId ");
            $query->bindParam("userId", $userId, PDO::PARAM_INT);
            $query->bindParam("response", $response, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function updateContact($id, $response)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE contact set messageread = 1, response = :response where id = :id ");
            $query->bindParam("id", $id, PDO::PARAM_INT);
            $query->bindParam("response", $response, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }



    public function sendResponseMessage($to, $subject, $message)
    {

        return $this->sendNewMessage($to, $subject, $message);
    }
    public function fileUpload($name, $filename, $uploadUrl)
    {
        $uploadedFile = '';
        $file = $filename;
        $uploadDir = $uploadUrl;
        if (!empty($_FILES["$file"]["type"])) {
            $fileName = $_FILES["$file"]["name"];
            $filesize = $_FILES["$file"]["size"];
            $targetPath = $uploadDir . $fileName;
            $valid_extensions = array("jpeg", "jpg", "png", "docx", "pdf");
            $temporary = explode(".", $_FILES["$file"]["name"]);
            $file_extension = end($temporary);
            if ((($file_extension == "png") || ($file_extension == "jpg") || ($file_extension == "jpeg") || ($file_extension == "docx") || ($file_extension == "pdf")) && in_array($file_extension, $valid_extensions) && ($filesize < 19000000)) {
                $sourcePath = $_FILES["$file"]["tmp_name"];
                $fileName = $name . "." . $file_extension;
                $targetPath = $uploadDir . $fileName;
                if (move_uploaded_file($sourcePath, $targetPath)) {

                    return $fileName;
                } else return false;
            } else {
                return "error";
            }
        }
    }
    public function getPlanSlot($plan, $con)
    {
        $sql = mysqli_query($con, "SELECT pSlot from createplan where pName ='$plan'");
        $res = mysqli_fetch_assoc($sql);
        return intval(($res["pSlot"]));
    }
    public function deductPlan($plan, $getSlot, $slotNo, $con)
    {
        $diff = intval($getSlot) - intval($slotNo);
        $sql = "UPDATE createplan set pSlot = $diff where pName = '$plan' ";
        $res = mysqli_query($con, $sql);
        if ($res)
            return true;
        else
            return false;
    }

    public function updatePlan($pName, $pInfo, $pSlot, $pReturn, $pRinvest, $pAmount, $pRepayment, $pDuration, $pStartDate, $pEndDate, $repayDate, $pType, $pInsurance, $pId, $Itype)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE createplan set pName=:pName, pInfo=:pInfo,pSlot=:pSlot,pReturn=:pReturn,pRinvest=:pRinvest, 
					pAmount=:pAmount,pRepayment=:pRepayment,pDuration=:pDuration,pStartDate=:pStartDate,pEndDate =:pEndDate,
					repayDate=:repayDate,pType=:pType,pInsurance=:pInsurance,Itype =:Itype WHERE pId=:pId ");
            $query->bindParam("pName", $pName, PDO::PARAM_STR);
            $query->bindParam("pInfo", $pInfo, PDO::PARAM_STR);
            $query->bindParam("pSlot", $pSlot, PDO::PARAM_INT);
            $query->bindParam("pReturn", $pReturn, PDO::PARAM_STR);
            $query->bindParam("pRinvest", $pRinvest, PDO::PARAM_STR);
            $query->bindParam("pAmount", $pAmount, PDO::PARAM_STR);
            $query->bindParam("pRepayment", $pRepayment, PDO::PARAM_STR);
            $query->bindParam("pDuration", $pDuration, PDO::PARAM_STR);
            $query->bindParam("pStartDate", $pStartDate, PDO::PARAM_STR);
            $query->bindParam("pEndDate", $pEndDate, PDO::PARAM_STR);
            $query->bindParam("repayDate", $repayDate, PDO::PARAM_STR);
            $query->bindParam("pType", $pType, PDO::PARAM_STR);
            $query->bindParam("pInsurance", $pInsurance, PDO::PARAM_STR);
            $query->bindParam("pId", $pId, PDO::PARAM_INT);
            $query->bindParam("Itype", $Itype, PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function updatePlanImg($pName, $pInfo, $pSlot, $pReturn, $pRinvest, $pAmount, $pRepayment, $pDuration, $pStartDate, $pEndDate, $repayDate, $pType, $pInsurance, $pImage, $pId, $Itype)
    {
        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE createplan set pName=:pName, pInfo=:pInfo,pSlot=:pSlot,pReturn=:pReturn,pRinvest=:pRinvest, 
					pAmount=:pAmount,pRepayment=:pRepayment,pDuration=:pDuration,pStartDate=:pStartDate,pEndDate =:pEndDate,
					repayDate=:repayDate,pType=:pType,pInsurance=:pInsurance,pImage=:pImage,Itype =:Itype WHERE pId=:pId ");
            $query->bindParam("pName", $pName, PDO::PARAM_STR);
            $query->bindParam("pInfo", $pInfo, PDO::PARAM_STR);
            $query->bindParam("pSlot", $pSlot, PDO::PARAM_INT);
            $query->bindParam("pReturn", $pReturn, PDO::PARAM_STR);
            $query->bindParam("pRinvest", $pRinvest, PDO::PARAM_STR);
            $query->bindParam("pAmount", $pAmount, PDO::PARAM_STR);
            $query->bindParam("pRepayment", $pRepayment, PDO::PARAM_STR);
            $query->bindParam("pDuration", $pDuration, PDO::PARAM_STR);
            $query->bindParam("pStartDate", $pStartDate, PDO::PARAM_STR);
            $query->bindParam("pEndDate", $pEndDate, PDO::PARAM_STR);
            $query->bindParam("repayDate", $repayDate, PDO::PARAM_STR);
            $query->bindParam("pType", $pType, PDO::PARAM_STR);
            $query->bindParam("pInsurance", $pInsurance, PDO::PARAM_STR);
            $query->bindParam("pImage", $pImage, PDO::PARAM_STR);
            $query->bindParam("pId", $pId, PDO::PARAM_INT);
            $query->bindParam("Itype", $Itype, PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    //  <!--
    //     * 
    //    Beginning of My code
    //     *
    //     *
    //     --!>

    public function  userSubscriber($email, $password)
    {

        try {
            $db = $this->DB();
            $query = $db->prepare("SELECT * FROM subscriber WHERE emailAddress =:email AND password =:password");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $enc_password = ($password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }
    public function  verifyUserMail($con, $userid)
    {

       $sql = " SELECT *  FROM verifysubscriber WHERE userId  = '$userid'";
       $query = mysqli_query($con, $sql);
        $res = mysqli_fetch_assoc($query);
         $status = $res["status"];
             if ($status == 1) {
                 return true;
             }else{
                return false;
             }
        }
    



    public function  verifyPhoneAccount($userid)
    {

        $db = $this->DB();
        $sql = " SELECT *  from verifysubemail where userId = :userid ";
        $query = $db->prepare($sql);
        $query->bindParam("userid", $userid, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            $fetchData =  $query->fetch(PDO::FETCH_OBJ);
            $status = intval($fetchData->status);
            if ($status == 1) {
                // echo "yes";
                return true;
            }else{

                return false;
            }
        }
    }

    public function getDetails($userid, $emailAddress)
    {

        $db = $this->DB();
        $sql = " SELECT *  from subscriber where userId = :userid ";
        $sql .= "AND emailAddress = :mail";
        $query = $db->prepare($sql);
        $query->bindParam("userid", $userid, PDO::PARAM_STR);
        $query->bindParam("mail", $emailAddress, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            $fetchData =  $query->fetch(PDO::FETCH_ASSOC);
            return $fetchData;
        } else {
            // $this->redirect("./signin");
        }
    }

    public function verifySubscriberEmail($con, $userid, $otp)
    {


        $sql = " SELECT userId, otp  from verifysubemail where otp = '$otp' ";
        $sql .= " AND userId = '$userid' ";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query) > 0) {
            $fetchData = mysqli_fetch_array($query);
            if ($fetchData['otp'] !== $otp) {
                echo "Incorrect";
            } else {
                if ($this->updateMailStatus($userid) == true) {
                    echo "Verified";
                }
            }
        } else {

            echo "null";
        }
    }



    public function verifySubscriberPhone($con, $userid, $otp)
    {


        $sql = " SELECT userId, otp  from `verifysubscriber` where otp = '$otp' ";
        $sql .= " AND userId = '$userid' ";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query) > 0) {
            $fetchData = mysqli_fetch_array($query);
            if ($fetchData['otp'] !== $otp) {
                echo "Incorrect";
            } else {
                if ($this->updatePhoneStatus($userid) == true) {
                    echo "Verified";
                }
            }
        } else {

            echo "null";
        }
    }



    public function updateMailStatus($userid)
    {
        $status = 1;

        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE verifysubemail set status = :status where userId = :userid");
            $query->bindParam("status", $status, PDO::PARAM_STR);
            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $t = $query->execute();
            if ($t) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }

    public function updatePhoneStatus($userid)
    {
        $status = 1;

        try {
            $db = $this->DB();
            $query = $db->prepare("UPDATE verifysubscriber set status = :status where userId = :userid");
            $query->bindParam("status", $status, PDO::PARAM_STR);
            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $t = $query->execute();
            if ($t) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
        }
    }

    public function checkmailStatus($con)
    {

        $status  = 1;
        $sql = mysqli_query($con, " SELECT status FROM verifysubemail WHERE userId  = '$status' ");
        $res = mysqli_fetch_assoc($sql);
        return (($res["status"]));
    }
    public function checkPhoneStatus($con)
    {

        $status  = 1;
        $sql = mysqli_query($con, " SELECT status FROM verifysubscriber WHERE userId  = '$status' ");
        $res = mysqli_fetch_assoc($sql);
        return (($res["status"]));
    }
}
