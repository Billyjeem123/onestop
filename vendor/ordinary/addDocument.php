<?php
include_once('../../config/data_access.php');
include_once('../../config/config.php');
$reg = new DBaseAccess();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['emailAddress']) || ($_SESSION['userId'] == '')) 
{
    header("location: ../signin.php");
}
else {
	include('session_check.php');
}
$emailAddress = $_SESSION['emailAddress'];
$userId = $_SESSION['userId'];
$query = ("SELECT * FROM vendor WHERE emailAddress = '$emailAddress' and userId = '$userId' ");
$result = $conn->query($query);
$row =$result->fetch_assoc();
$fname = strtoupper($row["surname"]) . " ". ucfirst($row["firstname"]);
$pic = $row["picture"];

if(isset($_POST['create']))
{
    $docName = $_POST['docName'];
    //check if the document already uploaded
    $result = $conn->query("Select * from docupload where userId = '$userId' and docname = '$docName'");
    $row = $result->num_rows;
    if($row > 0 )
    {
        $imageError="";
        $target_dir="../companyDoc/$emailAddress";
        if(!is_dir($target_dir))  {
            mkdir("$target_dir",0777);
        }
        $mempic=$_FILES["appicon"]["name"];
        $target_file = $target_dir."/".$mempic;
        $uploadOk = 1;
        $filetempname=$_FILES["appicon"]["tmp_name"];
        if($imageError=="")
        {
            $ext = strtolower(substr(strrchr($mempic, "."), 1));
            $image_extensions_allowed = array('pdf', 'doc');
            if(!in_array($ext, $image_extensions_allowed))
            {
                $exts = implode(', ',$image_extensions_allowed);
                $imageError .= "We allow document with one of the following extensions: ".$exts."<br>";
            }
            $extension = $ext;
        }
        if ($_FILES["appicon"]["size"] > 40000000 ) {
            $imageError.="Sorry, your file is too large. We allow max of 2MB";
            $uploadOk = 0;
        }
        if ($uploadOk == 0 || $imageError!="") {
            $imageError.="Sorry, your file was not uploaded.";
        }
        else
        {
            if (move_uploaded_file($_FILES["appicon"]["tmp_name"], $target_file)) {
                $icon=$target_file;
            } else {
                $imageError.="Sorry, there was an error uploading your file.";
            }
        }
        if(empty($imageError))
        {
            $pmode1=$target_file;
            $sql = "Update `docupload`set `docproof` = '$pmode1', `docdate` = now() where userId ='$userId' ";
            $conn->query($sql);
            ?>
            <script type="text/javascript">
                alert("Your Upload Successfully Saved");
            </script>
            <?php
        }
        else 
        {
            ?>
            <script type="text/javascript">
                var error = "<?php echo $imageError; ?>"
                var msg = "Error!: " + error ;
                alert(msg);
            </script>
            <?php
        }
    }
    else
    {
        $imageError="";
        $target_dir="../companyDoc/$emailAddress";
        if(!is_dir($target_dir))  {
            mkdir("$target_dir",0777);
        }
        $mempic=$_FILES["appicon"]["name"];
        $target_file = $target_dir."/".$mempic;
        $uploadOk = 1;
        $filetempname=$_FILES["appicon"]["tmp_name"];
        if($imageError=="")
        {
            $ext = strtolower(substr(strrchr($mempic, "."), 1));
            $image_extensions_allowed = array('pdf', 'doc');
            if(!in_array($ext, $image_extensions_allowed))
            {
                $exts = implode(', ',$image_extensions_allowed);
                $imageError .= "We allow document with one of the following extensions: ".$exts."<br>";
            }
            $extension = $ext;
        }
        if ($_FILES["appicon"]["size"] > 40000000 ) {
            $imageError.="Sorry, your file is too large. We allow max of 2MB";
            $uploadOk = 0;
        }
        if ($uploadOk == 0 || $imageError!="") {
            $imageError.="Sorry, your file was not uploaded.";
        }
        else
        {
            if (move_uploaded_file($_FILES["appicon"]["tmp_name"], $target_file)) {
                $icon=$target_file;
            } else {
                $imageError.="Sorry, there was an error uploading your file.";
            }
        }
        if(empty($imageError))
        {
            $pmode1=$target_file;
            $sql = "insert into `docupload`(`userId`,`docname`,`docproof`,`docdate`) values('$userId','$docName','$pmode1',now())";
            $conn->query($sql);
            ?>
            <script type="text/javascript">
                alert("Your Upload Successfully Saved");
            </script>
            <?php
        }
        else 
        {
            ?>
            <script type="text/javascript">
                var error = "<?php echo $imageError; ?>"
                var msg = "Error!: " + error ;
                alert(msg);
            </script>
            <?php
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upload New Document  | Ordinary Portal Office</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="../uploads/favicon.png">
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../bootstrap/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="../jquery.min.js" type="text/javascript"></script>
    
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
            <h4>
                Upload Company Documents
                <small></small>
            </h4>
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
                                            <label for="docName">Select the company document to upload</label>
                                            <select class="form-control" name="docName" id="docName" autocomplete="off"  required="required">
                                                <option value=""> Select Document </option>
                                                <option value="Proof of Address"> Proof of Address </option>
                                                <option value="Certificate of Incorporation"> Certificate of Incorporation </option>
                                                <option value="Registration Document"> Registration Document </option>
                                            </select>
    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="docProof">Upload Document</label>
                                            <input class="form-control" type="file" name = "appicon" id = "appicon" accept=".pdf,.doc" placeholder="Upload Proof" />
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="create">Submit Document</button>
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
