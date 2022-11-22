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
      width:135px;
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
  <script type="text/javascript">

    function validate() {

     if( confirm('are you sure you want to delete'))
     {
      window.location.href = 'deleteid.php';
    }

  }
</script>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark indigo">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="index.php">leasepe.com</a>
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
          <a class="nav-link" href="logout.php">logout</a>
        </li>
        <li>
        </li>
        <!-- Dropdown -->


      </ul>
      <?php
include "connection.php";
// $bd = mysqli_connect($mysql_hostname1, $mysql_user1, $mysql_password1) or die("Could not connect database");
// mysqli_select_db($bd, $mysql_database1) or die("Could not select database");
$id = $_SESSION['SESS_FIRST_NAME'];
$result = mysqli_query($bd, "SELECT * FROM member WHERE phonenumber='$id'");
$row1 = mysqli_fetch_array($result);

echo "<p style='text-align:right;color:white;font-size:20px;'>Hello $row1[0]</p>";

?>


    </div>
    <!-- Collapsible content -->

  </nav>


  <div class="container" style="margin-top: 2%;">
    <h3 class="pink-text mb-5" style="margin-left:30%">
      <strong style="color: grey">Settings/</strong>
      <strong><a href="account.php" >Your Ads</a></strong>
    </h3>

    <div class="row">

      <div class="col-md-10 mb-r">
        <div class="card" >
          <div class="card-body">
            <!--Header-->
            <div class="text-center">
              <h3 class="pink-text mb-5">
                <strong>Settings</strong>

              </h3>
            </div>
            <!--form-->
            <form name="reg" id="register"  method="post" enctype="multipart/form-data">



              <div class="row">
                <div class="col-md-6">
                  <div class="md-form">
                    <input id="name" class="form-control" type="text" name="name" required>
                    <label for="name">Change  name</label>
                  </div>
                </div><!--form row-->

                <div class="col-md-6">
                  <div class="md-form">

                    <button class="btn btn-success" style="margin-left: 30px;" name="save1" id="save1">save</button>
                    <img src="img/loading.gif" id='loading' style="width:20%;height:20%;display: none;">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="md-form">
                    <input id="password" class="form-control" type="password" name="password" required>
                    <label for="password">Change Password</label>
                    <small class="text-muted">
                      Must be 8-20 characters long.
                    </small>
                  </div>


                </div><!--row-->
                <!--form row-->

                <div class="col-md-6">
                  <div class="md-form">

                    <button class="btn btn-success" style="margin-left: 30px;" name="save2" id="save2">save</button>
                         <img src="img/loading1.gif" id='loading1' style="width:20%;height:20%;display: none;">
                  </div>
                </div>



                <div class="row">
                  <div class="col-md-6">
                    <div class="md-form">
                      <button  type="button"  name="confirm" style="width:200px;border-radius:2% ;margin-left:20px" class="btn btn-danger" id="alert-target" onclick="validate()">
                      Delete Account</button>
                    </div>
                  </div>
                </div></div>

              </form>

            </div><!--card-body-->
          </div><!--card-->

        </div>
      </div>
    </div>



    <script src="js/jquery.min.js"></script>



    <script type="text/javascript">

      $(document).ready(function ()
      {
        $('#save1').click(function(event)
        {

          var textcontent = $("#name").val();
          if(textcontent=="")
          {
           alert("enter some text");
         }
         else{
           event.preventDefault();
           $.ajax({
          beforeSend:function()
          {
            $("#loading").css("display", "inline");
          },
            url:"updatename.php",
            method:"post",
            data:$('form').serialize(),
            datatype:"text",
            success:function(strMessage){
             alert(strMessage);


           },
         complete:   function(){
    $("#loading").css("display", "none");
}
         });
         }

       })
      })
      $(document).ready(function () {
        $('#save2').click(function(event){

         var textcontent = $("#password").val();
         if(textcontent=="")
         {
          alert("enter some text");
        }
        var k=textcontent.length;
        if(k<8)
        {
          alert("Password is short in lenght");
          return;
        }
        else{
         event.preventDefault();
         $.ajax({
             beforeSend:function()
          {
            $("#loading1").css("display", "inline");
          },
          url:"updatepassword.php",
          method:"post",
          data:$('form').serialize(),
          datatype:"text",
          success:function(strMessage){
           alert(strMessage);

         },
                  complete:   function(){
    $("#loading1").css("display", "none");
}

       });
       }

     })
      })

    </script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
  </body>

  </html>