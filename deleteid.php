<?php
session_start();
include('connection.php');
if(!isset($_SESSION['SESS_FIRST_NAME'])) {
    header("Location:login.php"); // redirects them to homepage
    exit; // for good measure

}
include('connection.php');

$user=$_SESSION['SESS_FIRST_NAME'];
$user1="s".$user;
$query="SELECT * FROM $user1 where 1 ";
$result=mysqli_query($bd,$query);
if($result!=NULL){
while($row=mysqli_fetch_array($result))
{
$query1="DELETE FROM addsall_ where id='$user$row[0]'";
mysqli_query($bd,$query5);
$result1=mysqli_query($bd,$query1);
}}
$query2="DROP TABLE $user1";
$result2=mysqli_query($bd,$query2);
$query3="DELETE FROM member WHERE phonenumber='$user'";
//echo $query3;
$result3=mysqli_query($bd,$query3);

unset($_SESSION['SESS_FIRST_NAME']);
session_destroy();

header('Location: login.php');
exit();
?>