<?php
session_start();
include 'connection.php';
if (!isset($_GET['page']) && !(isset($_POST['place']))) {
    //header('location:index.php');
    //exit();
}
if (!isset($_GET['page']) && (isset($_POST['place']))) {
    $place = $_POST["place"];
    $_SESSION['place'] = $place;
}

?>


<html>
            <head>
               <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>leasepe.com</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

    <style type="text/css">
       .di { background-color: #FFFFFF; }

.di:hover { background-color: #eeeeee; }
a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    background-color:#0397d6;
    text-align:center;
    border-radius: 1px;
    color: initial;
    width:20px;
}
    </style>
            </head>

<body>

<!--Navbar-->
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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="third.php">submit add</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="second.php">account</a>
            </li>

            <!-- Dropdown -->


        </ul>
        <!-- Links -->

        <!-- Search form -->

        <form class="form-inline" action="searchplace.php" method="POST">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search2" aria-label="Search" required>
            <button type="submit" class="btn purple-gradient btn-sm">search</button>
        </form>
    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
<main>
  <div class="container" style="border: 1px solid grey;margin-top:2%;margin-bottom: 2%;min-height: 600px;">
<!-- Section: Products v.2 -->
<section class="text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Welcome for get paid </h2>
  <!-- Section description -->
  <p class="grey-text text-center w-responsive mx-auto mb-5">The Results Are.</p>

  <!-- Grid row -->
  <div class="row">

    <?php

include ("connection.php");
$place = mysqli_real_escape_string($bd,$_SESSION['place']);
$datatable = "addsall_";
$results_per_page = 10;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $results_per_page;
$sql = "select * from $datatable where city LIKE '%$place%' " . " ORDER BY ID ASC LIMIT $start_from, " . $results_per_page;

$rs_result = mysqli_query($bd, $sql);

if (mysqli_num_rows($rs_result) == 0) {
    echo "<div class='col-md-12' style='margin-top:5%;border:1px solid green;width:100%;background-color:green;width:50%;'><B style='margin-left:10%;margin-top:50%;font-size:20px;color:red;'> No result found try another place</B></div>";
} else {
    while ($row = mysqli_fetch_array($rs_result)) {

        echo "
    <div class='col-lg-4 col-md-12 mb-lg-0 mb-4' style='margin-top:5%;'>
      <!-- Card -->
      <div class='card card-cascade wider card-ecommerce'>
        <!-- Card image -->
        <div class='view view-cascade overlay'>";
        if ($row[7] != null) {
            echo " <img src=$row[7] style='max-width:100%;

max-height:100%;'>";} else if ($row[8] != null) {
            echo " <img src=$row[7] style='max-width:100%;

max-height:100%;'>";
        }
        echo "
          <a>
            <div class='mask rgba-white-slight'></div>
          </a>
        </div>
        <!-- Card image -->
        <!-- Card content -->
        <div class='card-body card-body-cascade text-center'>
          <!-- Category & Title -->
          <a href='viewadd.php?id=$row[0]' class='text-muted'>
            <h5>$row[2]</h5>
          </a>
          <h4 class='card-title'>
            <strong>
              <a href='viewadd.php?id=$row[0]'>$row[1]</a>
            </strong>
          </h4>
          <!-- Description -->
          <p class='card-text'>$row[9].</p>
          <!-- Card footer -->
          <div class='card-footer px-1'>
            <span class='float-left font-weight-bold'>
              <strong>$row[3]</strong>
            </span>
            <span class='float-right'>

            </span>
          </div>
        </div>
        <!-- Card content -->
      </div>
      <!-- Card -->
    </div>
    <!-- Grid column -->

    <!-- Grid column -->";

    }
}
?>
 </div>
</section>
 </div>
 <?php
//$row=mysqli_fetch_array($rs_result);
$sql1 = "select * from $datatable where city LIKE '%$place%'  ";
$rs_result1 = mysqli_query($bd, $sql1);
$row2 = mysqli_num_rows($rs_result1);
$_SESSION["roff"] = $row2;
// $sql = "SELECT COUNT(ID) AS total FROM ".$datatable;
// $result = $bd->query($sql);
// $row = $result->fetch_assoc();
$total_pages = ceil($row2 / $results_per_page); // calculate total pages with results

echo "<div style='margin-left:10%;margin-top:2%;'><font size='5'>Pages<< </font>";
for ($i = 1; $i <= $total_pages; $i++) { // print links for all pages
    echo "<a class='button' href='arearesult.php?page=" . $i . "'";
    if ($i == $page) {
        echo " class='curPage'";
    }

    echo "<font  size='5'>$i</font></a> ";
}
echo '</div>';
?>

       <script src="js/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
</body>
</html>