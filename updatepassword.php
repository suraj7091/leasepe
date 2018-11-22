 <?php
  session_start();
if(!isset($_SESSION['SESS_FIRST_NAME'])||!isset($_POST['name'])) {
    header("Location:index.php"); // redirects them to homepage
    exit; // for good measure

}
   // session_start();
    include('connection.php');
		$user=$_SESSION['SESS_FIRST_NAME'];
		
    $password=$_POST['password'];
    $check="UPDATE member SET password='$password' WHERE phonenumber='$user'";
    $rs = mysqli_query($bd,$check);
    if($rs){
    echo'database updated';}
    ?>
