 <?php
 session_start();
if(!isset($_SESSION['SESS_FIRST_NAME'])||!isset($_POST['name'])) {
    header("Location:index.php"); // redirects them to homepage
    exit; // for good measure

}
    
    include('connection.php');
		$user=$_SESSION['SESS_FIRST_NAME'];
		
    $name=$_POST['name'];
    $check="UPDATE member SET fname='$name' WHERE phonenumber='$user'";
    $rs = mysqli_query($bd,$check);
    if($rs){
    echo'database updated '.$name;}
    ?>
