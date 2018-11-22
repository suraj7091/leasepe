<?php
//Start session
session_start();
if (isset($_post['$id'])) {
    header("location: login.php");

    exit();
}
include "connection.php";
$errflag = false;
$id = $_SESSION['$id'];
$password = $_SESSION['$password'];
echo $id;
echo $password;
$result = mysqli_query($bd, "SELECT * FROM member WHERE phonenumber='$id' AND password='$password'");
if ($result) {
    if (mysqli_num_rows($result) > 0) {

        session_regenerate_id();
        $member = mysqli_fetch_assoc($result);
        $_SESSION['SESS_FIRST_NAME'] = $member['phonenumber'];
        session_write_close();
        header("location:account.php");
        exit();

    } else {
        $errmsg = 'id and password not found';
        $errflag = true;
        if ($errflag) {
            $_SESSION['$ERRMSG'] = $errmsg;

            session_write_close();
            header("location: login.php");

            exit();
        }
    }
} else {
    die("Query failed");
}
