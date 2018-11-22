<?php
session_start();
if (!isset($_SESSION['key']) && !isset($_POST['submitotp'])) {
    header('location:register.php');
    exit();
//echo "ko";
}
?>
<html>
<head>
  <title>Phone verify</title>
        <!--Import Google Icon Font-->

      <!--Import materialize.css-->

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
<nav class='navbar navbar-expand-lg navbar-dark green'>
    <a class='navbar-brand' href='index.php'>Leasepe.com</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
        aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
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
</body>
<div style="margin-top: 5%;" class="container">
<?php

include 'connection.php';

if (!isset($_POST['submitotp'])) {
    $phonenumber = $_SESSION['$phonenumber'];

    $_SESSION['$phonenumber'] = $phonenumber;
    $check = "SELECT * FROM member WHERE phonenumber = '$phonenumber'";
    $rs = mysqli_query($bd, $check);
    if (mysqli_num_rows($rs) != 0) {
        //session_start();

        $b = "User Already in Exists with this phone number";
        $msg1 = $b;
        $_SESSION['$msg1'] = $b;
        header("location:register.php");
        exit();
    }
}
$sender = "surajkumar"; //Your Approved Sender Name / Mask
$authkey = "178049AgfeiKGkqx59d66985";
$me = "please do not share otp.Your OTP for leasepe is";
$smsgatewaycenter_com_url = "https://control.msg91.com/api/sendhttp.php?"; 

function smsgatewaycenter_com_Send($mobile, $message, $debug = false)
{
    global $smsgatewaycenter_com_password, $smsgatewaycenter_com_url, $sender, $me, $authkey;
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
    $string = $chars{rand(0, $chars_length)};
    for ($i = 1; $i < $length; $i = strlen($string)) {
        $r = $chars{rand(0, $chars_length)};
        if ($r != $string{$i - 1}) {
            $string .= $r;
        }

    }
    unset($_SESSION['key']);
    return $string;
}

$debug = true; //Set to true if you want to see the response
if (!isset($_POST['submitotp'])) {
    $_SESSION['smsgatewaycenterotp'] = smsgatewaycenter_com_OTP(); //Generate OTP
    smsgatewaycenter_com_Send($phonenumber, $_SESSION['smsgatewaycenterotp'], $debug);
    echo '

                    <h1>Authenticate OTP (One Time Password)</h1>
                    <p>We have sent an SMS to your registered phone number, please authenticate your one time password entering below.</p>
                    <form method="POST" class="col-md-12">

                            Your one time password (OTP):
                            <input type="text" name="getsmsgatewaycenterotp" style="width:200px">


                            <td><input type=submit name="submitotp" value="Authenticate OTP" ></td>
                    <h2 style="color:red;">PLEASE DO NOT PRESS REFRESH BUTTON </h2>
                    </form>
            ';
        }
if (isset($_POST['submitotp'])) {

    $sgc_otp = $_POST['getsmsgatewaycenterotp'];
    if ($_SESSION['smsgatewaycenterotp'] == $sgc_otp) {
        $java = $div = "1";
        $_SESSION['$java'] = $java;
        header("location:fourth.php");
        exit();

    } 
    else {
        echo '

                    <h1>Authenticate OTP (One Time Password)</h1>
                    <p>We have sent an SMS to your registered phone number, please authenticate your one time password entering below.</p>
                    <form method="POST" class="col-md-12">

                            Your one time password (OTP):
                            <input type="text" name="getsmsgatewaycenterotp" style="width:200px">


                            <td><input type=submit name="submitotp" value="Authenticate OTP"></td>
                              <h2 style="color:red;">PLEASE DO NOT PRESS REFRESH BUTTON </h2>
                    </form>
            ';
        echo '<h2>Wrong Password!</h2>';
        $_SESSION['$otp'] = "shih";

    }
}
?>
</div>
<script src="js/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
<body>
    </html>