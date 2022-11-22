<?php
session_start();
if (!isset($_POST['forgot']) && !isset($_SESSION['forgot']) && !isset($_POST['submitotp'])) {
    header('location:register.php');
    exit();
}
?>
<html>
<head>
  <title>Phone verify</title>


    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>

    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <!-- Bootstrap core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <!-- Material Design Bootstrap -->
    <link href='css/mdb.min.css' rel='stylesheet'>
    <!-- Your custom styles (optional) -->
    <link href='css/style.css' rel='stylesheet'>

</head>

<body>



<!--Navbar-->
<nav class='navbar navbar-expand-lg navbar-dark green'>

    <!-- Navbar brand -->
    <a class='navbar-brand' href='index.php'>leasepe.com</a>

    <!-- Collapse button -->
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
        aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>

    <!-- Collapsible content -->
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>

        <!-- Links -->
        <ul class='navbar-nav mr-auto'>
            <li class='nav-item'>
                <a class='nav-link' href='index.php'>Home </a>
            </li>
            <li class='nav-item '>
                <a class='nav-link' href='third.php'>submit add</a>
            </li>
            <li class='nav-item active'>
                <a class='nav-link' href='second.php'>account<span class='sr-only'>(current)</span></a>
            </li>

        </ul>
    </div>
</nav>
<div class='container' style="margin-top: 2%;">
<?php

include 'connection.php';

if (!isset($_POST['submitotp'])) {
    $forgot = $_POST['forgot'];

    $_SESSION['forgot'] = $forgot;
    $check = "SELECT * FROM member WHERE phonenumber = $forgot";
    $rs = mysqli_query($bd, $check);
    if (mysqli_num_rows($rs) == 0) {
        //session_start();

        $b = "NO User Exists with this phone number";
        $msg1 = $b;
        $_SESSION['$msg1'] = $b;
        header("location:index.php");
        exit();
    }

}
$sender = "surajkumar"; 
$authkey = "178049AgfeiKGkqx59d66985";
$me = "please donot share  otp .Your OTP for leasepe is";
$smsgatewaycenter_com_url = "https://control.msg91.com/api/sendhttp.php?"; //SMS Gateway Center API URL

function smsgatewaycenter_com_Send($mobile, $message, $debug = false)
{
    global $smsgatewaycenter_com_password, $smsgatewaycenter_com_url, $sender, $me, $authkey;
    //echo $message;
    $to = '91' . $mobile;
    $me = $me . $message;
    $parameters = 'authkey=' . $authkey;
    $parameters .= '&mobiles=' . $to;
    $parameters .= '&message=' . urlencode($me);
    $parameters .= '&sender=' . $sender;
    $parameters .= '&route=' . '4';
    $parameters .= '&country=' . '91';
    $apiurl = $smsgatewaycenter_com_url . $parameters;
    $ch = curl_init($apiurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curl_scraped_page = curl_exec($ch);
    curl_close($ch);

    return ($curl_scraped_page);
}

function smsgatewaycenter_com_OTP($length = 5, $chars = '0123456789')
{
    $chars_length = (strlen($chars) - 1);
    $string = $chars[rand(0, $chars_length)];
    for ($i = 1; $i < $length; $i = strlen($string)) {
        $r = $chars[rand(0, $chars_length)];
        if ($r != $string[$i - 1]) {
            $string .= $r;
        }

    }
    return $string;
}

$debug = true; //Set to true if you want to see the response
if (!isset($_POST['submitotp'])) {
    $_SESSION['smsgatewaycenterotp'] = smsgatewaycenter_com_OTP(); //Generate OTP
    smsgatewaycenter_com_Send($forgot, $_SESSION['smsgatewaycenterotp'], $debug);
    echo '


                    <h1>Authenticate OTP (One Time Password)</h1>
                    <p>We have sent an SMS to your registered phone number, please authenticate your one time password entering below.</p>
                    <form method="POST" class="col-md-12">

                            Your one time password (OTP):
                            <input type="text" name="getsmsgatewaycenterotp" style="width:200px">


                            <input type=submit name="submitotp" value="Authenticate OTP">
                              <h2 style="color:red;">PLEASE DO NOT PRESS REFRESH BUTTON </h2>
             ';}
if (isset($_POST['submitotp'])) {

    $sgc_otp = $_POST['getsmsgatewaycenterotp'];
    if ($_SESSION['smsgatewaycenterotp'] == $sgc_otp) {
        $java = $div = "1";
        $_SESSION['SESS_FIRST_NAME'] = $_SESSION['forgot'];
        header("location:setting.php");
        exit();

    } else {
        echo '

                    <h1>Authenticate OTP (One Time Password)</h1>
                    <p>We have sent an SMS to your registered phone number, please authenticate your one time password entering below.</p>
                    <form method="POST" class="col-md-12">

                            Your one time password (OTP):
                            <input type="text" name="getsmsgatewaycenterotp" style="width:200px">


                            <input type=submit name="submitotp" value="Authenticate OTP">
                              <h2 style="color:red;">PLEASE DO NOT PRESS REFRESH BUTTON </h2>
                    </form>
                    <h2>Wrong Password!</h2>
                    </div>

           ';

    }
}
?>
    <script src="js/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
<body>
    </html>