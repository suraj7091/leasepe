<?php
session_start();
require("connection.php");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$adid=$_GET['adid'];

	$result=mysqli_query($con,"SELECT * FROM $adid WHERE id='$id'");
	$row=mysqli_fetch_array($result);
	$name=$_SESSION['SESS_FIRST_NAME'];

	if($row['userid']==$name)
	{

		if($row['parent']==-1)
		{

			$result1 = mysqli_query($con, "SELECT * FROM $adid where parent='$id' ORDER BY id ASC");
			while($row1=mysqli_fetch_array($result1))
			{
				$del=$row1['id'];
				mysqli_query($con,"DELETE FROM $adid WHERE id='$del'");
			}
		}
		mysqli_query($con,"DELETE FROM $adid WHERE id='$id'");
	}
}
	mysqli_close($con);
	header("location: viewadd.php?id=$adid");
	exit();
	?>