<?php
session_start();
if (!isset($_SESSION['SESS_FIRST_NAME'])) {

  header('location:login.php');
  exit();
}

include('connection.php');
$title=mysqli_real_escape_string($bd,$_SESSION['title']);
$category=mysqli_real_escape_string($bd,$_SESSION['category']);
$price=mysqli_real_escape_string($bd,$_SESSION['price']);
$name=mysqli_real_escape_string($bd,$_SESSION['name']);
$phone=mysqli_real_escape_string($bd,$_SESSION['phone']);
$city=mysqli_real_escape_string($bd,$_SESSION['city']);
$file1=mysqli_real_escape_string($bd,$_SESSION['file1']);
$file2=mysqli_real_escape_string($bd,$_SESSION['file2']);
$des=mysqli_real_escape_string($bd,$_SESSION['desc']);
// $mysql_database="adds";
$username =$_SESSION['SESS_FIRST_NAME'];
// $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
// mysqli_select_db($bd, $mysql_database) or die("Could not select database");

	mysqli_query($bd,"INSERT INTO addsall_(title,category,price,name,phone,city,file1,file2,des,memberid)VALUES('$title','$category','$price','$name','$phone','$city','$file1','$file2','$des','$username')");
// mysqli_query($bd,"CREATE TABLE `$forcomment` (
//   `id` int(10) NOT NULL AUTO_INCREMENT,
//   `name` varchar(40) NOT NULL,
//   `comments` text NOT NULL,
//   `date_publish` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//    `parent` varchar(40),
//    `userid` varchar(15),
//   PRIMARY KEY (`id`)
// )");
echo "Ad have been posted succesfully";
?>