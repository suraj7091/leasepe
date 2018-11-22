<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
session_start();
if(isset($_SESSION['SESS_FIRST_NAME'])) {
	
	header('location:submit.php');
	exit();
}
else
{
header('location:login.php');
	exit();
}
?>