<?php
$now = time();
if ( isset($_SESSION['expire']) && ( $now - $_SESSION['expire'] > 900) )
{
	session_destroy();
	?>
	   <script>
	       alert("Your Session Expire. Please Login Again");
	   </script>
	<?php
	echo "<script type='text/javascript'>";
	echo "window.location='../signin'";
	echo "</script>";
}
?>