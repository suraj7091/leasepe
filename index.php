<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>leasepe</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <script src="js/place/jquery-1.12.4.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123333744-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123333744-1');
</script>

  <script type="text/javascript">
    $(function () {
      $(document).scroll(function () {
        var $nav = $(".fixed-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
      });
    });

  </script>
  <style type="text/css">
  html,
  body,
  header,
  .view {
    height: 100%;
  }

  @media (max-width: 740px) {
    html,
    body,
    header,
    .view {
      height: 1000px;
    }
  }

  @media (min-width: 800px) and (max-width: 850px) {
    html,
    body,
    header,
    .view {
      height: 650px;
    }
  }
  @media (min-width: 800px) and (max-width: 850px) {
    .navbar:not(.top-nav-collapse) {
      background: #1C2331!important;
    }
  }
  .fixed-top.scrolled {
    background-color:#1e1d1b;
    transition: background-color 200ms linear;
  }
</style>

</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="index.php" target="_blank" >
      <strong>leasepe</strong>
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Links -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Left -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="third.php" target="_blank">submit Ad</a>
      </li>
      <li class="nav-item">
        <?php
session_start();
if (!isset($_SESSION['SESS_FIRST_NAME'])) {
    echo ' <a href="#" class="nav-link" data-toggle="modal" id="java" data-target="#exampleModal" >login</a>';

} else {
    echo ' <a href="account.php" class="nav-link"   target="_blank" >account</a>';
}
?>

    </li>

  </ul>

  <!-- Right -->
  <form class="form-inline" name="area"  method="POST">
    <input class="form-control mr-sm-2" id="tags" type="text" placeholder="location" name="place" aria-label="location" required>

  </form>
  <form class="form-inline" name="search" onSubmit= " return getdata()"  method="POST">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search2" aria-label="Search" required>
    <button type="submit" class="btn purple-gradient btn-sm" >search</button>
  </form>
</div>



</nav>
<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form name="reg" id="submit" action="verify.php" method="POST" class="col-md-12" enctype="multipart/form-data">
        <div class="modal-body">
          <h5 class="modal-title" id="exampleModalLabel"><B style='margin-left:30%;font-size:40px;'>login</B></h5>


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
          <div style="margin-left: 5%;">
            <table>
              <tr>

                <td id='refresh'><img src="captcha.php" id='captchaimg' style="width:90%;">click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td><td>
                  <input id="captcha_code" class='form-control' name="captcha_code" type="text" required>

                </td>
              </tr>   </table>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" onsubmit="verify.php">submit</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
          </div>
        </form>
        <div class="options" style="margin-left: 30%;">
          <p>Not a member? <a href="register.php" >Sign Up</a></p>
          <p>Forgot <a href="#"  data-toggle="modal" id="java" data-target="#exampleModal1" >Password?</a></p>
        </div>
      </div>
    </div>

  </div>
  <div  class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Forgot password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form name="reg2" id="submit1" action="forgot.php" onSubmit="return valid()" method="POST" class="col-md-12" enctype="multipart/form-data">
          <div class="modal-body">
           <div class="md-form">

            <input type="text" name="forgot" placeholder="enter your phone number" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" onsubmit="forgot.php">submit</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function valid()
  {

    var h=document.forms["reg2"]["forgot"].value;
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
  var x;
  $(document).ready(function () {
    $('#tags').on('autocompletechange change', function () {
      //$('#tagsname').html('You selected: ' + this.value);
      x=this.value;

    }).change();
  });

  function getdata()
  {
    if(x!='')
    {

      var y=document.forms['search']['search2'].value;
      var z="searchplace.php?place="+x+"&search2="+y;
      window.location.href=z;
      return false;
    }
    else
    {

      var y=document.forms['search']['search2'].value;
      var z="searchresult.php?search2="+y;
      window.location.href=z;
    return false;
    }

  }
//
</script>

<!-- Navbar -->

<!-- Full Page Intro -->
<a name='top'></a>
<div  class="view full-page-intro" style="background-image: url('images/78.jpg'); background-repeat: no-repeat; background-size: cover;">

  <!-- Mask & flexbox options-->
  <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

    <!-- Content -->
    <div class="container">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4 white-text text-center text-md-left">

          <h1 class="display-4 font-weight-bold">Welcome to leasepe.com</h1>

          <hr class="hr-light">

          <p>
            <strong>Post your free Ad</strong>
          </p>

          <p class="mb-4 d-none d-md-block">
            <strong>Now post your ad for books,house,car,bike at one place and also find others ad for rent</strong>
          </p>

          <a target="_blank" href="submit.php" class="btn btn-indigo btn-lg">submit free ad </a>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 col-xl-5 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <!-- Form -->

              <!-- Heading -->
              <h3 class="dark-grey-text text-center">
                <strong>Select category:</strong>
              </h3>
              <hr>

              <!-- Grid row -->
              <div class="row">

                <!-- Grid column -->
                <div class="col mb-3" id="wrapper">

                 <input type="image" id='car' src="images/car.jpg" class="img-fluid z-depth-1" alt="Responsive image" >


               </div>
               <!-- Grid column -->

               <!-- Grid column -->
               <div class="col mb-3">

                 <input type="image" id="bike" src="images/bike.jpg" class="img-fluid z-depth-1" alt="Responsive image">

               </div>
               <!-- Grid column -->

             </div>
             <!-- Grid row -->

             <!-- Grid row -->
             <div class="row">

              <!-- Grid column -->
              <div class="col mb-3">

               <input type="image" id='house' src="images/house.jpg" class="img-fluid z-depth-1" alt="Responsive image">

             </div>
             <!-- Grid column -->

             <!-- Grid column -->
             <div class="col mb-3">

              <input type="image" id="book" src="images/book.jpg" class="img-fluid z-depth-1" alt="Responsive image">

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col mb-3">

             <input type="image" id='electronic' src="images/electra.jpg" class="img-fluid z-depth-1" alt="Responsive image">

           </div>
           <!-- Grid column -->

           <!-- Grid column -->
           <div class="col mb-3">

            <input type="image" id='other'   src="images/other.png" class="img-fluid z-depth-1" alt="Responsive image">

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>

    </div>
    <!--/.Card-->

  </div>
  <!--Grid column-->

</div>
<!--Grid row-->

</div>
<!-- Content -->

</div>
<!-- Mask & flexbox options-->

</div>
<script type="text/javascript">
  var p;
  $(document).ready(function () {
    $('#tags').on('autocompletechange change', function () {
      //$('#tagsname').html('You selected: ' + this.value);
      p=this.value;

    }).change();
  });


  var classname = document.getElementsByClassName("img-fluid z-depth-1");

  var myFunction = function() {
    var attribute = this.getAttribute("id");


    window.location.href="category.php?category="+attribute+"&place="+p;
  };

  for (var i = 0; i < classname.length; i++) {
    classname[i].addEventListener('click', myFunction, false);
  }
</script>
<!-- Full Page Intro -->

<!--Main layout-->
<main>
  <div class="container">


    <!--Section: Main info-->
    <section class="mt-5 wow fadeIn">
     <h3 class="h3 text-center mb-5">POSTING AD</h3>

     <!--Grid row-->
     <div class="row">

      <!--Grid column-->
      <div class="col-md-6 mb-4">

        <img src="images/tut.png" class="img-fluid z-depth-1-half" alt="">

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-6 mb-4">

        <!-- Main heading -->
        <h3 class="h3 mb-3">POSTING AD IS NOT MUCH TOUGH</h3>
        <p>Just click a pic of your good and post it using our portal</p>
        <p>just fill the contact details and product details</p>
        <!-- Main heading -->

        <hr>

        <p>
          Others user come to our site and see your ad and contact you for rent of product as simple as that.
        </p>

        <!-- CTA -->
        <a target="_blank" href="third.php" class="btn btn-indigo btn-md">submit free ad

        </a>
        <a  href="#top" class="btn btn-indigo btn-md">view other ad

        </a>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </section>
</div>
</main>
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
    <hr class="rgba-white-light" style="margin: 0 15%;">
    <a href="category.php?category=book&place=">book on rent</a>/<a href="category.php?category=car&place=">car on rent</a>/
    <a href="category.php?category=bike&place=">bike on rent</a>/<a href="category.php?category=house&place=">house on rent</a>/
    <a href="category.php?category=electronic&place=">tv on rent</a>/<a href="category.php?category=electronic&place=">computer on rent</a>/
    <a href="category.php?category=electronic&place=">speaker on rent</a>/<a href="searchresult.php?search2=furniture">furniture on rent</a><br>
    <a href="category.php?category=book&place=delhi">book on rent in delhi</a>/<a href="category.php?category=car&place=delhi">car on rent in delhi</a>/
    <a href="category.php?category=bike&place=delhi">bike on rent in delhi</a>/<a href="category.php?category=house&place=delhi">house on rent in delhi</a>/
    <a href="category.php?category=electronic&place=delhi">tv on rent in delhi</a>/<a href="category.php?category=electronic&place=delhi">computer on rent in delhi</a><br>
    <a href="category.php?category=electronic&place=delhi">speaker on rent in delhi</a>/<a href="searchplace.php?place=delhi&search2=furniture">furniture on rent in delhi</a>/
    <a href="category.php?category=book&place=mumbai">book on rent in mumbai</a>/<a href="category.php?category=car&place=mumbai">car on rent in mumbai</a>/
    <a href="category.php?category=bike&place=mumbai">bike on rent in mumbai</a><br>/<a href="category.php?category=house&place=mumbai">house on rent in mumbai</a>
    <a href="category.php?category=electronic&place=mumbai">tv on rent in mumbai</a>/<a href="category.php?category=electronic&place=mumbai">computer on rent in mumbai</a>/
    <a href="category.php?category=electronic&place=mumbai">speaker on rent in mumbai</a>/<a href="searchplace.php?place=mumbai&search2=furniture">furniture on rent in mumbai</a><br>
    <a href="category.php?category=book&place=">book on lease</a>/<a href="category.php?category=car&place=">car on lease</a>/
    <a href="category.php?category=bike&place=">bike on lease</a>/<a href="category.php?category=house&place=">house on lease</a>/
    <a href="category.php?category=electronic&place=">tv on lease</a>/<a href="category.php?category=electronic&place=">computer on lease</a>/
    <a href="category.php?category=electronic&place=">speaker on lease</a>/<a href="searchresult.php?search2=furniture">furniture on lease</a><br>
    <a href="category.php?category=book&place=">book on lower rent</a>/<a href="category.php?category=car&place=">car on lower rent</a>/
    <a href="category.php?category=bike&place=">cheap bike on rent</a>/<a href="category.php?category=house&place=">cheap house on rent</a>/
    <a href="category.php?category=electronic&place=">cheap tv on rent</a>/<a href="category.php?category=electronic&place=">cheap computer on rent</a>/
    <a href="category.php?category=electronic&place=">speaker on rent</a>/<a href="searchresult.php?search2=furniture">cheap furniture on rent</a><br>
    <a href="searchplace.php?place=delhi&search2=bullet">bullet on rent in delhi</a>/<a href="searchplace.php?place=delhi&search2=splendor">splendor on rent in delhi</a>/
    <a href="searchplace.php?place=delhi&search2=avenger">avenger on rent in delhi</a>/ <a href="searchplace.php?place=delhi&search2=apache">apache on rent in delhi</a>/
    <a href="searchplace.php?place=delhi&search2=pulsar">pulsar on rent in delhi</a>/<a href="searchplace.php?place=delhi&search2=duke">duke on rent in delhi</a><br>
    <a href="searchplace.php?place=delhi&search2=wagonr">wagonr on rent in delhi</a>/<a href="searchplace.php?place=delhi&search2=swift">swift on rent in delhi</a>/
    <a href="searchplace.php?place=delhi&search2=eeco">eeco on rent in delhi</a>/ <a href="searchplace.php?place=delhi&search2=fortuner">fortuner on rent in delhi</a>/
    <a href="searchplace.php?place=delhi&search2=amaze">amaze on rent in delhi</a>/<a href="searchplace.php?place=delhi&search2=scorpio">scorpio on rent in delhi</a>
    <!-- Grid row-->
  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="http://leasepe.com"> Leasepe.com</a>
  </div>
  <!-- Copyright -->

</footer>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Initializations -->
<script src="js/place/jquery-1.12.4.js"></script>
<script src="js/place/jquery-ui.js"></script>
<script src="js/place/place.js"></script>
<script type="text/javascript">
  // Animations initialization
  new WOW().init();
</script>
</body>

</html>