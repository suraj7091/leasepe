<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['SESS_FIRST_NAME'])) {
    header('Location:login.php');
    exit;
}
include 'connection.php';
$id = mysqli_real_escape_string($bd, $_GET['id']);
if ($id == null) {
    header('Location:account.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
  <title>Change the add </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/mdb.css" rel="stylesheet">
    <link href="css/compile.min.css" rel="stylesheet">
<style>
select {
   border:0px;
   outline:0px;
   background-color:#f7f2f2;
}
</style>
</head>

<body>
<nav class='navbar navbar-expand-lg navbar-dark indigo'>

    <!-- Navbar brand -->
    <a class='navbar-brand' href='index.php'>LEASEPE</a>

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
                <a class='nav-link active' href='third.php'>submit add</a>
            </li>
            <li class='nav-item '>
                <a class='nav-link' href='second.php'>account<span class='sr-only'>(current)</span></a>
            </li>

        </ul>

    </div>

</nav>
<div class="container" style='width:65%;min-height:780px;border:1px solid #D3D3D3;margin-top:10px'>
  <p style='margin-left:10px;font-size:25px;margin-top:7px'>Edit add</p>
  <hr>
  <?php
$user = $_SESSION["SESS_FIRST_NAME"];
$id = mysqli_real_escape_string($bd, $_GET["id"]);
$_SESSION['id'] = $id;
$user = "s" . $user;

$query = "SELECT * FROM $user where id='$id'";

$result = mysqli_query($bd, $query);
if (mysqli_num_rows($result) == null) {
    header('location:account.php');
    exit();
}
$row = mysqli_fetch_array($result);
$str = $row[3];
$arr = preg_split('/(?<=[0-9])(?=[a-z]+)/i', $str);
echo "
  <form name='reg' id='submit' action='changeadd.php' onSubmit='return validateForm()'' method='POST' class='col-md-12' enctype='multipart/form-data'>
  <div >
  <label for='fname' style='margin-left:10%;'>Add Title</label>
<input id='addtitle'  type='text' name='title' value='$row[1]' style='width:40%;border-radius:2% ;margin-left:20px'  placeholder='not more than 60 character'required>
</div>
<div class='row' style='margin-top:2%'>
  <label for='category' style='margin-left:10%;'>category</label>

<select name='category'   value='$row[2]' class='browser-default' style='margin-left:20px;width:30%;'>
<option  value='house'>House</option>
  <option value='car'>Car</option>
  <option value='bike'>Bike</option>
    <option value='book'>Books</option>
      <option value='other'>other</option>
  </select>

  </div>

  <hr>
  <div style='margin-top:20px' class='row'>
   <label for='price' style='margin-left:10%;'>Price</label>
<input id='price'  type='text' name='price' value='$arr[0]' style='width:35%;border-radius:2% ;margin-left:20px' required>
<div style='margin-left:20px;width:30%;margin-top:2%;'>
 <select name='rate' id='rate'  class='browser-default'value='$arr[1]' >
              <option value='PerMonth'>Per Month</option>
              <option  value='Perweek'>Per Week</option>
              <option value='Perday'>Per Day</option>

              <option value='Perhour'>Per Hour</option>

            </select>
            </div>
            </div>
<hr>
";
?>

<div  style='margin-top:5%'>
 <label for='textarea1' style='margin-left:10%;'>add description</label>
    <textarea id='textarea1' class='md-textarea' length='120' name='desc' style='width:33%;margin-left:20px;'onKeyPress='return taLimit(this)' onKeyUp='return taCount(this,"myCounter")' name='Description'  required></textarea>
    <B><SPAN id=myCounter>200</SPAN></B> characters remaining

</div>
 <?php
echo "

<hr>
<div style='margin-top:20px'>
  <label for='name' style='margin-left:10%;'>Name</label>
<input id='name'  type='text' name='name' value='$row[4]' style='width:40%;border-radius:2% ;margin-left:20px' required>
</div>

<div style='margin-top:20px'>
  <label for='tags' style='margin-left:10%;'>city </label>
<input id='tags'  type='text' name='city' value='$row[6]' style='width:40%;border-radius:2% ;margin-left:40px' required>

</div>


     <script src='js/place/jquery-1.12.4.js'></script>
     <script src='js/place/jquery-ui.js'></script>
     <script src='js/place/place.js'></script>




   <script language = 'Javascript'>
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
    if(bName == 'Netscape'){
      objCnt.textContent=maxL-objVal.length;}
    else{objCnt.innerText=maxL-objVal.length;}
  }
  return true;
}
function createObject(objId) {
  if (document.getElementById) return document.getElementById(objId);
  else if (document.layers) return eval('document.' + objId);
  else if (document.all) return eval('document.all.' + objId);
  else return eval('document.' + objId);
}
</script>


<hr>


<button type='submit'  class='btn btn-default waves-effect waves-light' style='margin-top:30px;margin-left:50%;'>submit</button>
</form>";
?>
</div>
    <script src="js/place/jquery-1.12.4.js"></script>
      <script src="js/place/jquery-ui.js"></script>
      <script src="js/place/place.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/materialize.min.js">
</script>
<script type="text/javascript">
$(document).ready(function() {
   $('.mdb-select').material_select();
 });</script>
 <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>

</body>
</html>








