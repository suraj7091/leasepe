<?php
session_start();
include('connection.php');
if(!isset($_SESSION['SESS_FIRST_NAME'])) {
    header("Location:login.php"); // redirects them to homepage
    exit; // for good measure

}
include('connection.php');
$mysql_database="adds";
$user=$_SESSION['SESS_FIRST_NAME'];
$user1="s".$user;
	$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($bd, $mysql_database) or die("Could not select database");
$query="SELECT * FROM $user1 where 1 ";
$result=mysqli_query($bd,$query);
if($result!=NULL){
while($row=mysqli_fetch_array($result))
{
$query1="DELETE FROM addsall_ where id='$user$row[0]'";
$query5="DROP TABLE $user$row[0]";
mysqli_query($con,$query5);
$result1=mysqli_query($bd,$query1);
}}
$query2="DROP TABLE $user1";
$result2=mysqli_query($bd,$query2);
$mysql_database="adds";
$bd1= mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($bd1, $mysql_database) or die("Could not select database");
$query3="DELETE FROM member WHERE phonenumber='$user'";
//echo $query3;
$result3=mysqli_query($bd1,$query3);

unset($_SESSION['SESS_FIRST_NAME']);
session_destroy();

header('Location: login.php');
exit();
?>