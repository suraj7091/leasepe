<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['SESS_FIRST_NAME'])) {
    header("Location:login.php"); // redirects them to homepage
    exit; // for good measure

} else {

    $user = $_SESSION['SESS_FIRST_NAME'];
    $id = mysqli_real_escape_string($bd, $_GET['id']);
    if ($id == null) {
        header('Location:account.php'); // redirects them to homepage
        exit; // for good measure
    }
    $result = mysqli_query($bd, "SELECT * FROM addsall_ WHERE id='$id'");
    $row = mysqli_fetch_array($result);
    if ($row[8] != null) {
        $file = $row[8];
        unlink($file);
    }
    if ($row[7] != null) {
        $file = $row[7];
        unlink($file);
    }
    $query = "DELETE  FROM addsall_ WHERE id='$id'";
    mysqli_query($bd, $query);

//***********************************

    header('location:account.php');
    exit();
}
