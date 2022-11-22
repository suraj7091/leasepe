<?php
session_start();
require("connection.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$adid=$_GET['adid'];
	$result=mysqli_query($bd,"SELECT * FROM comments WHERE id='$id'");
	$row=mysqli_fetch_array($result);
	$name=$_SESSION['SESS_FIRST_NAME'];
	if($row['userid']==$name)
	{

		mysqli_query($bd,"DELETE FROM comments WHERE parent='$id' and adid='$adid'");
		mysqli_query($bd,"DELETE FROM comments WHERE id='$id' and adid='$adid'");
	}
}
	mysqli_close($bd);
	header("location: viewadd.php?id=$adid");
	exit();
	?>