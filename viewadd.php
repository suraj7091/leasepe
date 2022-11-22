	<?php
include 'chat.php';
?>
	<html>
	<head>

		<link href="css/reset.css" rel="stylesheet" type="text/css">
		<link href="css/style1.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/mdb.css" rel="stylesheet">
		<link href="css/compile.min.css" rel="stylesheet">
		<title>leasepe.com</title>

	</head>
	<body style="">
	<nav class="navbar navbar-expand-lg navbar-dark indigo">
    <a class="navbar-brand" href="index.php">leasepe.com</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="third.php">submitad <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="second.php">account</a>
            </li>
        </ul>

    </div>
</nav>

		<div class="container" style="border:1px solid grey;margin-top: 2%;margin-bottom: 2%;">
			<div style="min-height:400px;">
				<?php

include "connection.php";
if (!isset($_GET['id'])) {
    header('location:index.php');
}
$id = mysqli_real_escape_string($bd, $_GET['id']);
$sql = "select * from addsall_ where id='$id'";
$rs = mysqli_query($bd, $sql);
$row = mysqli_fetch_array($rs);
if ($row[7] != null && $row[8] != null) {
    echo "<div class='row'><div class='col-md-2'	style='float:left;'><input type='image'  src='pa.png' onclick='func()'/></div>";
}

if ($row[7] != null) {

    echo "<div class='col-md-6' id='image' sttle='width:40%;height:60%;'>
					<img src=$row[7]  style='margin-left:20%;max-width:100%'></img>
					</div>";
    if ($row[8] == null) {
        echo "<B>here is only one image</b>";
    }

} else if ($row[8] != null) {
    echo "<div id='image' class='col-md-6' style='width:40%;height:60%;'>
					<img src=$row[8]  style='margin-left:20%;max-width:100%'></img>

					</div>";
    if ($row[7] == null) {
        echo "<B>here is only one image</B>";}

} else {
    echo "<B style='margin-left:30%;'> No Image is available</B>";
}

if ($row[8] != null && $row[7] != null) {

    echo "<div class='col-md-10'><input  type='image'  src='pa2.png' onclick='func2()'/></div>
						</div><hr>
						<div class='row'>
						<div class='col-md-4' >

						<img src='$row[7]' id='image1' style=' width:25%;'></img>
						</div>
						<div class='col-md-4'>
						<img id='image2' src='$row[8]'style='width:25%;opacity:0.3'></img>
						</div>
						</div>


						";

}

echo "</div><hr>
					<div class='row'>
					<div class='col-md-6'> <p style='font-size:20px;'>Title=$row[1]</p></div>
					<div class='col-md-6'><p style='font-size:20px;'>Category=$row[2]</p></div>
					<div class='col-md-6'><p style='font-size:20px;'>Price=$row[3]</p></div>
					</div >
					<div class='row'>
					<div class='col-md-6'><p style='font-size:20px;'> $row[9]</p></div>


					</div >";
if (isset($_SESSION['SESS_FIRST_NAME'])) {

    echo "<B style='color:orange;font-size:30px;'>CONTACT PERSON</B>
					<div class='row'>
					<div class='col-md-6'><p style='font-size:20px;'>Name=$row[4]</p></div>
					<div class='col-md-6'><p style='font-size:20px;'>Phone=$row[5]</p></div>
					<div class='col-md-6'><p style='font-size:20px;'>City=$row[6]</p></div>
					</div>";
} else {
    echo "<p style='font-size:20px;color:red'><a href='login.php'>LOGIN</a> TO VIEW CONTACT DETAILS</p>";
}

?>

					<script type='text/javascript'>
						function func()
						{

							var a="<?php echo $row[8]; ?>";
							var b="<img src='"+a+ "'' style='margin-left:20%;max-width:100%'></img>";

							document.getElementById('image').innerHTML=b;
							document.getElementById('image2').style.opacity=1;
							document.getElementById('image1').style.opacity=0.3;
						}
						function func2()
						{

							var a="<?php echo $row[7]; ?>";
							var b="<img src='"+a+ "'' style='margin-left:20%;max-width:100%'></img>";

							document.getElementById('image').innerHTML=b;
							document.getElementById('image1').style.opacity=1;
							document.getElementById('image2').style.opacity=0.3;
						}</script>
						<hr>
						<div class='row'>
							<div class='col-md-12'>
						<div class="comment_input" style="">
							<form name="form1">
							<br> <br>
							<textarea name="comments"  placeholder="Leave Comments Here..." style="width:80%; height:80px;"></textarea><br></br>
							<a href="#" onClick="commentSubmit()" class="button">Post</a><br>
						</form>
					</div>
				</div></div>
					<div id="comment_logs">
						<?php
$comment = $_GET['id'];
$result = mysqli_query($bd, "SELECT * FROM $comment ORDER BY date_publish ASC");

while ($row = mysqli_fetch_array($result)) {

    if ($row['parent'] == -1) {
        echo "<hr>";
        echo "<div class='comments_content'>";
        echo "<h4><a href='deletechat.php?id=" . $row['id'] . "&adid=" . $_GET['id'] . "'> X</a></h4>";
        echo "<p>" . $row['name'] . "&nbsp ";
        echo $row['date_publish'] . "</p>";
        echo "<h3 style='margin-left:5%;'>" . $row['comments'] . "</h3>";
        $k = "die" . $row['id'];
        echo "<p style='margin-left:5%;'  onClick='reply(" . '"' . $k . '"' . ")'>reply</p>";
        echo "<div class='comment_input' id='die" . $row['id'] . "' style='display:none;'> <form name='form'><textarea name='comments' id='" . $row['id'] . "' placeholder='Leave Comments Here...' style='width:80%; height:100px;'></textarea></br></br> <a href='#' onClick='commentSubmit2(" . $row['id'] . ")' class='button'>Post</a></br></form></div>";
        echo "</div>";
        $p = $row['id'];
        $result1 = mysqli_query($bd, "SELECT * FROM $comment where parent='$p' ORDER BY date_publish ASC");
        while ($row1 = mysqli_fetch_array($result1)) {
            echo "<div class='comments_content' style='margin-left:10%;'>";
            echo "<h4><a href='deletechat.php?id=" . $row['id'] . "&adid=" . $_GET['id'] . "'> X</a></h4>";
            echo "<p>" . $row1['name'] . "&nbsp";
            echo $row1['date_publish'] . "</p>";
            echo "<h3 style='color:black;margin-left:5%;'>" . $row1['comments'] . "</h3>";
            $k = "die" . $row1['id'];
            echo "<p style='margin-left:5%;' onClick='reply(" . '"' . $k . '"' . ")'>reply</p>";
            echo "<div class='comment_input' id='die" . $row1['id'] . "' style='display:none;'> <form name='form'><textarea name='comments' id='" . $row1['id'] . "' placeholder='Leave Comments Here...' style='width:80%; height:100px;'></textarea></br></br> <a href='#' onClick='commentSubmit2(" . $row1['id'] . ")' class='button'>Post</a></br></form></div>";
            echo "</div>";
        }

    }
}
mysqli_close($bd);

?>
					</div></div>
					<div>
					</div>
					<script src="js/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
				</body>
				</html>