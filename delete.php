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
    $user2 = 's' . $user;
    $result = mysqli_query($bd, "SELECT * FROM $user2 WHERE id='$id'");
    if (mysqli_num_rows($result) == null) {
        header('location:account.php');
        exit();
    }
//echo $query;
    $user2 = 's' . $user;
    $result = mysqli_query($bd, "SELECT * FROM $user2 WHERE id='$id'");
    $row = mysqli_fetch_array($result);
    if ($row[8] != null) {
        $file = $row[8];
        unlink($file);
    }
    if ($row[7] != null) {
        $file = $row[7];
        unlink($file);
    }

    $id1 = $user . $id;
    $query1 = "DELETE  FROM addsall_ WHERE id='$id1'";
    $user = "s" . $user;
    $query = "DELETE  FROM $user2 where id='$id'";
    // $query2 = "DROP TABLE $id1";
    // mysqli_query($bd, $query2);
    mysqli_query($bd, $query);
//echo $query1;
    mysqli_query($bd, $query1);

//***********************************

    header('location:account.php');
    exit();
}
