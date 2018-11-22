<?php
session_start();
include("connection.php");
if (isset($_POST['phone'])) {

    // session_start();
    $_SESSION['$name'] = mysqli_real_escape_string($bd,$_POST['name']);
    $_SESSION['$email'] = mysqli_real_escape_string($bd,$_POST['email']);
    $_SESSION['$id'] =mysqli_real_escape_string($bd, $_POST['id']);
    $_SESSION['$phonenumber'] =mysqli_real_escape_string($bd, $_POST['phonenumber']);
    $_SESSION['$password'] = mysqli_real_escape_string($bd,$_POST['password']);
    $key = $b = '1';
    $otp = 1;
    $_SESSION['otp'] = $otp;
    $_SESSION['key'] = $b;
    header("location:demo.php");

    exit();
} else {
    if (!$_SESSION['SESS_FIRST_NAME']) {
        //echo"ji";
        header("location:register.php");
        exit();
    } else {
        header("location:login.php");
        exit();
    }
}

?>
<html>
<body>
</body>
</html>
