<?php
session_start();
if (!isset($_GET['category'])) {
    header('location:index.php');
}
$category = $_GET['category'];
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>leasepe</title>

   <link rel="stylesheet" href="css/font-awesome.css">
    <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/mdb.css" rel="stylesheet">
    <link href="css/compile.min.css" rel="stylesheet">

</head>
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

        <!-- Search form -->  <form class="form-inline"  method="POST">
            <input class="form-control mr-sm-2" type="text" id='place' placeholder="location" name="place" aria-label="location" required>
        </form>
        <form class="form-inline" name="sea" onSubmit="return valid()" method="POST">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search" aria-label="Search" required>
            <button type="submit" class="btn purple-gradient btn-sm">search</button>
        </form>
    </div>
    <!-- Collapsible content -->

</nav>
 <script type="text/javascript">

      var category="<?php echo $category; ?>";

      function valid()
      {

        var place=document.getElementById('place').value
        var search=document.forms['sea']['search'].value;
        var y="categorysearch.php?category="+category+"&place="+place+"&search="+search;

        window.location.href=y;
        return false;
      }

    </script>
<main>
  <div class="container" style="border: 1px solid grey;margin-top:2%;margin-bottom: 2%;">
<!-- Section: Products v.2 -->
<section class="text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Welcome To Get Rent </h2>
  <!-- Section description -->
  <p class="grey-text text-center w-responsive mx-auto mb-5">Post Your Free Ad And Earn Some Rent.</p>

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <?php
include "connection.php";
$category = $_GET['category'];
$place = $_GET['place'];

$datatable = "addsall_";
$results_per_page = 10;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $results_per_page;
if ($place == null) {
    $sql = "SELECT * FROM " . $datatable . " WHERE category LIKE '%$category%'  ORDER BY ID ASC LIMIT $start_from, " . $results_per_page;
} else {
    $sql = "SELECT * FROM " . $datatable . " WHERE category LIKE '%$category%' and city LIKE'%$place%' ORDER BY ID ASC LIMIT $start_from, " . $results_per_page;
}

$rs_result = mysqli_query($bd, $sql);
while ($row = mysqli_fetch_array($rs_result)) {
    echo "
    <div class='col-lg-4 col-md-12 mb-lg-0 mb-4' style='margin-top:5%;'>
      <!-- Card -->
      <div class='card card-cascade'>
        <!-- Card image -->
        <div class='view view-cascade overlay' style='max-height:50%;'>";
    if ($row[7] != null) {
        echo " <img src=$row[7] style='max-width:100%;

max-height:100%;min-height:100%;'>";} else if ($row[8] != null) {
        echo " <img src=$row[8] style='max-width:100%;

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
}?>


  </div>
  <!-- Grid row -->

</section>
 <?php

if ($place == null) {
    $sql = "SELECT * FROM " . $datatable . " WHERE category LIKE '%$category%'  ";
} else {
    $sql = "SELECT * FROM " . $datatable . " WHERE category LIKE '%$category%' and city LIKE '%$place%'";
}

$rs_result1 = mysqli_query($bd, $sql);
$row2 = mysqli_num_rows($rs_result1);
$total_pages = ceil($row2 / $results_per_page); // calculate total pages with results
echo "<div style='margin-left:10%;margin-top:2%;margin-bottom:4%'><font size='5'>Pages<< </font>";
for ($i = 1; $i <= $total_pages; $i++) { // print links for all pages
    echo "<a class='button' href='category.php?category=" . $category . "&place=" . $place . "&page=" . $i . "'";
    if ($i == $page) {
        echo " class='curPage'";
    }

    echo "<font  size='5'>$i</font></a> ";
}
echo '</div>';
?>
</div>
<!-- Footer -->
<footer class="page-footer font-small indigo" style="margin-top: 5%;">

  <!-- Footer Links -->
  <div class="container" style="width: 100%">

    <!-- Grid row-->
    <div class="row text-center d-flex justify-content-center pt-5 mb-3">

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="aboutus.php">About us</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="terms.php">Terms and condition</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->

      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="help.php">Help</a>
        </h6>
      </div>
      <!-- Grid column -->
      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a href="contactus.php">Contact</a>
        </h6>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row-->
    <hr class="rgba-white-light" style="margin: 0 15%;">
    <!-- Grid row-->
    <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
      <!-- Grid column -->
      <!-- Grid column -->
    </div>
    <!-- Grid row-->
    <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">
    <!-- Grid row-->
    <div class="row pb-3">
      <!-- Grid column -->
      <div class="col-md-12">
        <div class="mb-5 flex-center">
          <!-- Facebook -->
          <a class="fb-ic" href="https://www.facebook.com/leasepe.com1/">
            <i class="fa fa-facebook fa-lg white-text mr-4"> </i>
          </a>

          <!-- Google +-->
          <a class="gplus-ic" href="https://plus.google.com/114503242566440927087">
            <i class="fa fa-google-plus fa-lg white-text mr-4"> </i>
          </a>

          <!--Instagram-->
          <a class="ins-ic" href="https://www.instagram.com/leasepe.com1/">
            <i class="fa fa-instagram fa-lg white-text mr-4"> </i>
          </a>
          <!--Pinterest-->

        </div>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row-->
  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="http://leasepe.com"> Leasepe.com</a>
  </div>
  <!-- Copyright -->

</footer>
  <!-- Footer -->
</main>
<!-- Section: Products v.2 -->
<script src="js/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
</body>
</html>