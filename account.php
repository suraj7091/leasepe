<?php
session_start();
if (!isset($_SESSION['SESS_FIRST_NAME'])) {
    header("Location:login.php"); // redirects them to homepage
    exit; // for good measure

}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/mdb.css" rel="stylesheet">
    <link href="css/compile.min.css" rel="stylesheet">
    <style type="text/css">
    	.arrow-up
{

  border-left:1px solid grey;
  border-right: 1px solid grey;
  border-top: 1px solid grey;
  border-bottom: 1px solid white;
  width:120px;
  float: left;
  margin-bottom:5px;

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
    <a class="navbar-brand" href="index.php">leasepe.com</a>
	 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="account.php">account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
            </li>
        </ul>
        <?php
        include "connection.php";
        // $bd = mysqli_connect($mysql_hostname1, $mysql_user1, $mysql_password1) or die("Could not connect database");
        // mysqli_select_db($bd, $mysql_database1) or die("Could not select database");
        $id = $_SESSION['SESS_FIRST_NAME'];
        $result = mysqli_query($bd, "SELECT * FROM member WHERE phonenumber='$id'");
        $row1 = mysqli_fetch_array($result);
        echo "<p style='color:white;font-size:20px;'>Hello $row1[0]</p>";
        ?>


    </div>

</nav>
<div class="container" style="margin-top: 2%;margin-bottom:2%">
   <h3 class="pink-text mb-5" style="margin-left:30%">
                        <strong ><a href="setting.php" >Settings/</a></strong>
                        <strong style="color: grey">Your Ads</strong>
                      </h3>


<div style="border:1px solid grey;min-height:200px;margin-top:1px;">
	<div style="margin-left: 10%;">
<?php
include "connection.php";
$id = $_SESSION['SESS_FIRST_NAME'];
$id = "s" . $id;

$result = mysqli_query($bd, "SELECT * FROM $id");
echo nl2br("\n");
if ($result != null) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<table><tr><td>";
        echo "<div style=''><p>";
        echo nl2br("<B>title:-</B>" . $row[1] . "\n" .
            "<B>category:-</B>" . $row[2] . "\n" .

            "<B>price:-</B>" . $row[3] . "\n" .
            "<B>name:-</B>" . $row[4] . "\n" .
            "<B>contact:-</B>" . $row[5] . "\n" .

            "<B>location:-</B>" . $row[6] . "\n" . "<B>desc:-</B>"
        );
        $str = $row[9];
        $k = 0;
        for ($i = 0; $i < strlen($str); $i++) {

            echo ($str[$i]);
            $k++;
            if ($k == 30) {
                echo nl2br("\n");
                $k = 0;
            }
        }
        echo "</p></div></td><td><div >";
        if ($row[7] != null) {
            echo "<img src='$row[7]' style='width:30%;margin-left:10%;'></img>";
        }
        if ($row[8] != null) {
            echo " <img src='$row[8]' style='width:30%;margin-left:10%;'></img></div></td></tr>";
        }

        echo "

          <tr>
          <td><button class='btn btn-danger' onclick='validateForm$row[0]()'>delete</button></td>
          <script >
               function validateForm$row[0]()
               {
               	 if (confirm('Are you really want to delete!')) {
                     location.href = 'delete.php?id=$row[0]';

    }
    }

          </script>

          <td><button class='btn btn-default' onclick='Form$row[0]()'>edit</button></td>
                    <script >
               function Form$row[0]()
               {

                     location.href = 'edit.php?id=$row[0]';
    }

          </script>
          </tr>


        </table>";
        //echo "</div>";
        echo "<hr>";

    }}
?>
</div>
</div>
</div>
</div>

<script src="js/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
</body>
</html>