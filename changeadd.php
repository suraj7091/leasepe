<?php
session_start();
include('connection.php');
if(!isset($_SESSION['SESS_FIRST_NAME'])) {
    header('Location:login.php'); // redirects them to homepage
    exit; // for good measure

}
if(!isset($_SESSION['id'])) {
    header('Location:account.php'); // redirects them to homepage
    exit; // for good measure

}
include('connection.php');
$title=$_POST['title'];
$category=$_POST['category'];
$price=$_POST['price'];
$rent=$_POST['rate'];
$name=$_POST['name'];

$city=$_POST['city'];
$des=$_POST['desc'];
$id=$_SESSION['id'];
$price=$price.$rent;
$phone=$_SESSION['SESS_FIRST_NAME'];
$tablename=$_SESSION['SESS_FIRST_NAME'];
$k=$tablename.$id;

$query="UPDATE  addsall_ SET title='$title',category='$category',price='$price',name='$name',phone='$phone',city='$city',des='$des' WHERE id='$k'";
//echo $query;
mysqli_query($bd,$query);
$tablename="s".$tablename;
$query2="UPDATE  $tablename SET title='$title',category='$category',price='$price',name='$name',phone='$phone',city='$city',des='$des' WHERE id='$id'";
echo $query2;
mysqli_query($bd,$query2);
header('location:account.php');
exit();
?>