<?php
session_start();
include('connection.php');
if(!isset($_SESSION['SESS_FIRST_NAME'])) {
    header("Location:login.php"); // redirects them to homepage
    exit; // for good measure

}
include('connection.php');

$user=$_SESSION['SESS_FIRST_NAME'];
$query="delete FROM addsall_ where memberid=$user ";
$result=mysqli_query($bd,$query);

$query3="DELETE FROM member WHERE phonenumber='$user'";
//echo $query3;
$result3=mysqli_query($bd,$query3);

unset($_SESSION['SESS_FIRST_NAME']);
session_destroy();

header('Location: login.php');
exit();
?>