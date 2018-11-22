<?php
session_start();


if(!isset($_SESSION['$java']))
{
	
	
	header('location:login.php');
	exit();
	//echo "dfg";
	
}

 include('connection.php');

$active=1;

$phonenumber=$_SESSION['$phonenumber'];
$password=$_SESSION['$password'];
  $name=$_SESSION['$name']; 
 
$result=mysqli_query($bd,"INSERT INTO member(fname,phonenumber, password,active)VALUES('$name','$phonenumber','$password', '$active') ") ;
	$search = mysqli_query($bd,"SELECT * FROM member WHERE phonenumber='$phonenumber'  ") or die(mysqli_error($bd)); 
		$member = mysqli_fetch_assoc($search);
		//	$_SESSION['SESS_FIRST_NAME'] = $member['id'];
	$_SESSION['SESS_FIRST_NAME'] = $member['phonenumber'];
      header("location:account.php");
		exit();
		unset($_SESSION['$java']);
?>