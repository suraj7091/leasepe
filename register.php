<?php
session_start();
if (isset($_SESSION['SESS_FIRST_NAME'])) {
    header("Location:index.php"); // redirects them to homepage
    exit; // for good measure
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/mdb.css" rel="stylesheet">
    <link href="css/compile.min.css" rel="stylesheet">

    <style rel="stylesheet">
        main {
            padding-top: 3rem;
            padding-bottom: 2rem;
        }

		.avatar-pic {
  			width: 150px;
		}
    </style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark indigo">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="index.php">leasepe.com</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="third.php">submit add</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="second.php">account <span class="sr-only">(current)</span></a>
            </li>
        </ul>

    </div>

</nav>

<main>
    <div class="container">
        <div class="row">
			<div class="col-md-2"></div>
            <div class="col-md-8 mb-r">
				<div class="card">
					<div class="card-body">
						<!--Header-->
						<div class="text-center">
                			<h3 class="pink-text mb-5"><strong>Register</strong></h3>
						</div>
						<!--form-->
						<form name="reg" id="register" action="first.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="md-form">
										<input id="name" class="form-control" type="text" name="name" required>
										<label for="name">full name</label>
									</div>
								</div>

							</div><!--form row-->

							<div class="md-form">
								<input id="phonenumber" class="form-control" type="text" name="phonenumber"  required>
								<label for="phonenumber">phone number</label>
							</div>

							<div class="row">

										<div class="col-md-4">
										<div class="md-form">
										<p style=" margin-left:50px;margin-top:20px;color:#C43133;">
										<?php
										if (isset($_SESSION['$msg1'])) {
											$msg1 = $_SESSION['$msg1'];
											echo $msg1;

											unset($_SESSION['$msg1']);

										}
										?>
										</p>

									</div>
								</div>


							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="md-form">
										<input id="password" class="form-control" type="password" name="password" required>
										<label for="password">Password</label>
										<small class="text-muted">
											Must be 8-20 characters long.
										</small>
									</div>
								</div>
								<div class="col-md-6">
									<div class="md-form">
										<input id="confirm" class="form-control" type="password" name="confirm" required>
										<label for="confirm">Confirm Password</label>
									</div>
								</div>
							</div><!--row-->

							<div class="text-center">
								<button type="submit" name="phone" class="btn btn-default waves-effect waves-light" >verify by phone</button>

  					<a href="login.php" class="btn btn-deep-orange waves-effect waves-light">Login</a>
							</div>

							<div class="text-center">
								<div id="status"></div>
							</div>

						</form>
					</div><!--card-body-->
				</div><!--card-->
            </div><!--col-md-8-->
        </div><!--row-->
    </div>
</main>

<!--Footer-->
<!--/.Footer-->

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript">

	//Material select
	$(document).ready(function() {
    	$('.mdb-select').material_select();
  	});

	function validateForm() {
	var g=document.forms["reg"]["confirm"].value;
var h=document.forms["reg"]["password"].value;
var x=document.forms["reg"]["phonenumber"].value;
var k=h.length;
		if (g!=h){
			alert("password not matched");
  			return false;
		}
		if(k<8){
			alert("password is short in length");
			return false;
		}
		if(x.length<10)
		{
			alert("invalid phonenumber");
			return false;
		}

		document.getElementById('status').innerHTML = "Sending...";
		document.getElementById('register').submit();
	}
</script>

</body>
</html>


