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

    <title>rental service</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <!-- <link href="css/mdb.css" rel="stylesheet"> -->
    <link href="css/main.css" rel="stylesheet">
    <style rel="stylesheet">

        body {

        }
        main {
            padding-top: 3rem;
            padding-bottom: 2rem;
        }
		.arrow-up
{
 width: 0;
  height: 0;
  border-left: 40px solid transparent;
  border-right: 40px solid transparent;
  border-bottom: 10px solid #1A8EB1;
  margin-left:130px;

}
.box
{
border:1px solid #1B9FA6 ;
background-color:#1B9FA6;
color:#000000;
margin-left:20px;
width:300px;
height:50px;
border-radius:6px;
}
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark indigo">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="index.php">Leasepe.com</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="third.php">submit add</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="second.php">account<span class="sr-only">(current)</span></a>
            </li>

            <!-- Dropdown -->


        </ul>
        <!-- Links -->

        <!-- Search form -->

    </div>
    <!-- Collapsible content -->

</nav>
    <main>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>

                <div class="col-md-6 mb-r">
                    <!--Form without header-->
                    <div class="card">
                        <div class="card-body">
                            <!--Header-->
                            <div class="form-header default-color text-center">
                                <h3>Login</h3>
                            </div>
                            <!--Body-->
                            <form action="verify.php" name="login" method="post" onSubmit="return validate()">
                                <div class="md-form">
                                    <i class="fa fa-id-card prefix grey-text"></i>
                                    <input id="cyanForm-email" class="form-control" type="text" name="id" required>
                                    <label for="cyanForm-email">user id</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input id="cyanForm-pass" class="form-control" type="password" name="password" required>
                                    <label for="cyanForm-pass">Your password</label>
                                </div>
                            <?php
                        if (isset($_SESSION['$ERRMSG'])) {
                            echo '<div class="arrow-up">';
                            echo '</div>';
                            echo '<div class="box">';
                            echo '<p style="margin-left:30px">';
                            echo $_SESSION['$ERRMSG'];
                            echo '</p>';
                            echo '</div>';
                            unset($_SESSION['$ERRMSG']);
                        }
                        ?>
    <div style="margin-left: 5%;">
    <table>
        <tr>
            <td id='refresh'><img src="captcha.php" id='captchaimg' style="width:90%;">click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td><td>
                <input id="captcha_code" name="captcha_code" type="text" required>
            </td>
        </tr>
    </table>
    </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default waves-effect waves-light">Login</button>

                                </div>
                            </form>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options">
                                <p>Not a member? <a href="register.php" >Sign Up</a></p>
                                <p>Forgot <a href="#"  data-toggle="modal" id="java" data-target="#exampleModal" >Password?</a></p>
                            </div>
                        </div>
                    </div><!--card-->
                    <!--/Form without header-->
                </div><!--col-->
            </div><!--row-->
        </div>
    </main>
<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forgot password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <form name="reg" id="submit" action="forgot.php" onSubmit="return valid()" method="POST" class="col-md-12" enctype="multipart/form-data">
            <div class="modal-body">


                <input type="text" name="forgot" placeholder="enter your phone number" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" onsubmit="forgot.php">submit</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
            </div>
        </form>
        </div>
    </div>
</div>
    <!--Footer-->
    <!--/.Footer-->

 <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>




</body>

</html>
<script type="text/javascript">
    function valid()
    {
        var h=document.forms["reg"]["forgot"].value;
        if(h.length<10)
        {
            alert("Invalid phone number");
            return false;
        }


}

function refreshCaptcha()
{
    document.getElementById("refresh").innerHTML="<img src='captcha.php' id='captchaimg' style='width:90%;'>click <a href='javascript: refreshCaptcha();'>here</a> to refresh.";
}

</script>