<?php
//CAPTCHA Matching code
include 'connection.php';
session_start();

if (isset($_post['$id']) && $_POST['captcha_code']) {
    header("location: login.php");

    exit();
}

$id = mysqli_real_escape_string($bd, $_POST['id']);
$password = mysqli_real_escape_string($bd, $_POST['password']);
$_SESSION['$id'] = $id;

$_SESSION['$password'] = $password;
if ($_SESSION["my_captcha"] == $_POST["captcha_code"]) {
    header("location: login_exec.php");

    exit();
} else {
    $_SESSION['$ERRMSG'] = "captcha does not match";
    header("location: login.php");
    exit();
}
