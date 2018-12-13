<?php
//yes
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "Dhokha12345@";
$mysql_database2 = "adds";

$bd1 = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($bd1, $mysql_database2) or die("Could not select database");



$mysql_hostname1 = "localhost";
$mysql_user1 = "root";
$mysql_password1 = "Dhokha12345@";
$mysql_database1 = "adds";


$bd = mysqli_connect($mysql_hostname1, $mysql_user1, $mysql_password1) or die("Could not connect database");
mysqli_select_db($bd, $mysql_database1) or die("Could not select database");





$con=mysqli_connect("localhost","root","Dhokha12345@","userss");
		
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
?>
