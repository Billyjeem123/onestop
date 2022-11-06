<?php
include_once('../config/data_access.php');
$reg = new DBaseAccess();
$eName = trim($_POST['eName']);
if ( ($reg->checkLinkName($eName)) )
    echo "exist";
else
    echo "not";
?>
