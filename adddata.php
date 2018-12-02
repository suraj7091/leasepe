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
$mysql_database="adds";

$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($bd, $mysql_database) or die("Could not select database");
$tablename=$_SESSION['SESS_FIRST_NAME'];
$tablename1="s".$tablename;
$t= "SELECT * FROM $tablename1 WHERE 1";
$check=mysqli_query($bd,$t);

if($check==NULL)
{
	$query="CREATE TABLE $tablename1 ( id VARCHAR(20) NOT NULL , title VARCHAR(60) NOT NULL , category VARCHAR(20) NOT NULL , price varchar(100) NOT NULL , name VARCHAR(50) NOT NULL , phone VARCHAR(10) NOT NULL , city VARCHAR(200) NOT NULL , file1 VARCHAR(100)  , file2 VARCHAR(100)  , des VARCHAR(200) NOT NULL , PRIMARY KEY (id))";
	
mysqli_query($bd,$query);

$id=uniqid();

$id1=$tablename.$id;
$forcomment=$id1;
mysqli_query($bd,"INSERT INTO $tablename1(id,title,category,price,name,phone,city,file1,file2,des)VALUES('$id','$title','$category','$price','$name','$phone','$city','$file1','$file2','$des')");
mysqli_query($bd,"INSERT INTO addsall_(id,title,category,price,name,phone,city,file1,file2,des)VALUES('$id1','$title','$category','$price','$name','$phone','$city','$file1','$file2','$des')");

}
else
{

	$a=mysqli_num_rows($check);
	$id=uniqid();
	$id2=$tablename.$id;
	
	$bc=mysqli_query($bd,"INSERT INTO $tablename1(id,title,category,price,name,phone,city,file1,file2,des)VALUES('$id','$title','$category','$price','$name','$phone','$city','$file1','$file2','$des')");
    $forcomment=$id2;
	mysqli_query($bd,"INSERT INTO addsall_(id,title,category,price,name,phone,city,file1,file2,des)VALUES('$id2','$title','$category','$price','$name','$phone','$city','$file1','$file2','$des')");
}

mysqli_query($con,"CREATE TABLE `$forcomment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `comments` text NOT NULL,
  `date_publish` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   `parent` varchar(40),
   `userid` varchar(15),
  PRIMARY KEY (`id`)
)");
echo "Ad have been posten succesfully";
?>