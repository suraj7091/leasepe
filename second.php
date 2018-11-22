
<?php
session_start();
if(isset($_SESSION['SESS_FIRST_NAME'])) {
	
	header('location:account.php');
	exit();
}
else
{
header('location:login.php');
	exit();
}
?>