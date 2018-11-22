<?php
session_start();
if (!isset($_SESSION['SESS_FIRST_NAME'])) {

    header('location:login.php');
    exit();
}
?>
<!doctype html>
<html>
<head>
  <title>Post your free add</title>
  <!--Import Google Icon Font-->

  <!--Import materialize.css-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/mdb.css" rel="stylesheet">
  <link href="css/compile.min.css" rel="stylesheet">
  <link href="css/upload.css" rel="stylesheet">

  <script language = "Javascript">
    maxL=200;
    var bName = navigator.appName;
    function taLimit(taObj) {
      if (taObj.value.length==maxL) return false;
      return true;
    }

    function taCount(taObj,Cnt) {
      objCnt=createObject(Cnt);
      objVal=taObj.value;
      if (objVal.length>maxL) objVal=objVal.substring(0,maxL);
      if (objCnt) {
        if(bName == "Netscape"){
          objCnt.textContent=maxL-objVal.length;}
          else{objCnt.innerText=maxL-objVal.length;}
        }
        return true;
      }
      function createObject(objId) {
        if (document.getElementById) return document.getElementById(objId);
        else if (document.layers) return eval("document." + objId);
        else if (document.all) return eval("document.all." + objId);
        else return eval("document." + objId);
      }
    </script>


    <style>


  </style>

</head>

<body >



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
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" href="third.php">submit add<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="second.php">account</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container" style="margin-top:2%;margin-bottom: 2%;" >
    <div class="card">
      <div class="card-body">
        <p style="margin-left:1%;font-size:25px;margin-top:2%">Submit free add</p>
        <form name="reg" id="submit" action="upload.php" method="POST" class="col-md-12" enctype="multipart/form-data">
          <div class="form-row">
          <div class="col-md-4" style="margin-left:10%;">
            <div class="md-form form-group">

            <label for="fname" >Add Title</label>

            <input id="addtitle"  type="text" name="title"   placeholder="not more than 60 character"  required >
          </div>
        </div>
          <div class="col-md-5" style="margin-left:8%;" >
           <div class="md-form form-group">
            <select name="category" id="category"  class="mdb-select" >
                <option value="" disabled selected>Choose Category</option>
              <option  value="house">House</option>
              <option value="car">Car</option>
              <option value="bike">Bike</option>
              <option value="book">Books</option>
              <option value="electronic">electronic</option>
              <option value="other">other</option>
            </select>

        </div>
        </div>
      </div>

          <div class="form-row">
          <div class="col-md-5" style="margin-left:10%" >
            <div class="md-form form-group">
           <label for="price" >Price</label>
           <input id="price"  type="text" name="price" style="width:80%;border-radius:2% ;margin-left:4%" placeholder="price In Rupay" required>


              </div>
            </div>
            <div class="col-md-5" >
            <div class="md-form form-group">


            <select name="rate" id="rate"  class="mdb-select" >
                <option value="" disabled selected>Choose Rate</option>

              <option value="PerMonth">Per Month</option>
              <option  value="Perweek">Per Week</option>
              <option value="Perday">Per Day</option>

              <option value="Perhour">Per Hour</option>

            </select>

        </div>
         </div>
       </div>



         <div class="form-row">
          <div class="col-md-10" style="margin-left: 10%" >
            <div class="md-form form-group">
           <label for="textarea1" >add description</label>
           <textarea id="textarea1" class="md-textarea" length="120" name="desc" onKeyPress="return taLimit(this)" onKeyUp="return taCount(this,'myCounter')" name="Description" required ></textarea>
           <B><SPAN id=myCounter>200</SPAN></B>characters remaining

         </div>
       </div>
     </div>
      <!--  <hr style="height:1px;border:none;color:grey;background-color:grey;"> -->

         <div class="file-field" style="margin-top:30px;margin-left:10%;">

          <div class="btn btn-primary btn-sm float-left"  >

            <span>Choose file</span>
            <input type="file"  name="userfile[]" id="fileinput" multiple="multiple" >
          </div>
           <div class="file-path-wrapper">
           <input class="file-path validate"  type="text" placeholder="Upload your file">
        </div>

          </div>

        <div class="file-field" style="margin-top:30px;margin-left:10%;">

          <div class="btn btn-primary btn-sm float-left" >

            <span>Choose file</span>
            <input type="file" name="userfile[]" id="fileinput" multiple="multiple" >

          </div>
          <div class="file-path-wrapper">
           <input class="file-path validate" type="text" placeholder="Upload your file">
         </div>
       </div>
        <B style="margin-left:100px;color:red;font-size:30px;" id='imgerr'>

      </B>
        <!-- <hr style="height:1px;border:none;color:grey;background-color:grey;"> -->

      <div style="margin-top:20px">
        <label for="name" style="margin-left:10%;">Name</label>
        <input id="name"  type="text" name="name" style="width:60%;border-radius:2% ;margin-left:2%" required >
      </div>

      <div style="margin-top:20px">
        <label for="tags" style="margin-left:10%;">location</label>
        <input id="tags"  type="text" name="city" style="width:60%;border-radius:2% ;margin-left:2%" required>

      </div>
<button type="submit"  class="btn btn-default waves-effect waves-light" style="margin-top:30px;margin-left:60%;" name="submitad">Submit</button>
</form>
<div id="bararea">
		<div id="bar"></div>
	</div>

    <div id="percent"></div>
	<div id="status"></div>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/place/jquery-1.12.4.js"></script>
<script src="js/place/jquery-ui.js"></script>
<script src="js/place/place.js"></script>
<script src="js/place/place.js"></script>
<script src="js/jquery-form.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/materialize.min.js">
</script>
<script src='js/jquery-form.js'></script>
<script type="text/javascript">
$(document).ready(function() {
   $('.mdb-select').material_select();
 });
 $(function() {
	$(document).ready(function(){
		var bar = $('#bar')
		var percent = $('#percent');
		var status = $('#status');

	$('form').ajaxForm({
		beforeSend: function() {
		 status.empty();
		var percentVal = '0%';
		bar.width(percentVal);
		percent.html(percentVal);
		},
	uploadProgress: function(event, position, total, percentComplete) {
		var percentVal = percentComplete + '%';
		percent.html(percentVal);
		bar.width(percentVal);
		},
	complete: function(xhr) {
    //status.html();
    var data=xhr.responseText;
    alert(data);
    if(data==0){
    document.getElementById('imgerr').innerHTML="Unsupported file type format";
    }
    else{
      window.location.href='account.php';
    }
		}
		});
	});
});

 </script>
 <footer class="page-footer font-small indigo" style="margin-top: 5%;">

<div class="container" style="width: 100%">

  <div class="row text-center d-flex justify-content-center pt-2 mb-2">

    <div class="col-md-2 mb-3">
      <h6 class="text-uppercase font-weight-bold">
        <a href="aboutus.php">About us</a>
      </h6>
    </div>

    <div class="col-md-3 mb-3">
      <h6 class="text-uppercase font-weight-bold">
        <a href="terms.php">Terms and condition</a>
      </h6>
    </div>

    <div class="col-md-2 mb-3">
      <h6 class="text-uppercase font-weight-bold">
        <a href="help.php">Help</a>
      </h6>
    </div>

    <div class="col-md-2 mb-3">
      <h6 class="text-uppercase font-weight-bold">
        <a href="contactus.php">Contact</a>
      </h6>
    </div>

  </div>

  <hr class="rgba-white-light" style="margin: 0 15%;">

  <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

  </div>
  <!-- Grid row-->
  <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">
  <!-- Grid row-->
  <div class="row pb-2">
    <!-- Grid column -->
    <div class="col-md-12">
      <div class="mb-5 flex-center">

        <a class="fb-ic" href="https://www.facebook.com/leasepe.com1/">
          <i class="fa fa-facebook fa-lg white-text mr-4"> </i>
        </a>

        <a class="gplus-ic" href="https://plus.google.com/114503242566440927087">
          <i class="fa fa-google-plus fa-lg white-text mr-4"> </i>
        </a>


        <a class="ins-ic" href="https://www.instagram.com/leasepe.com1/">
          <i class="fa fa-instagram fa-lg white-text mr-4"> </i>
        </a>


      </div>
    </div>

  </div>

</div>

<div class="footer-copyright text-center py-1">© 2018 Copyright:
  <a href="http://leasepe.com"> Leasepe.com</a>
</div>


</footer>
</body>
</html>
