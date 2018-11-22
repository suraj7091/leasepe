<?php
session_start();
function mime_content_type1($filename) {//function for getting the MIME type
  $mime_types = array(
    'txt' => 'text/plain',
    'htm' => 'text/html',
    'html' => 'text/html',
    'php' => 'text/html',
    'css' => 'text/css',
    'js' => 'application/javascript',
    'json' => 'application/json',
    'xml' => 'application/xml',
    'swf' => 'application/x-shockwave-flash',
    'flv' => 'video/x-flv',

            // images
    'png' => 'image/png',
    'jpe' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'gif' => 'image/gif',
    'bmp' => 'image/bmp',
    'ico' => 'image/vnd.microsoft.icon',
    'tiff' => 'image/tiff',
    'tif' => 'image/tiff',
    'svg' => 'image/svg+xml',
    'svgz' => 'image/svg+xml',

            // archives
    'zip' => 'application/zip',
    'rar' => 'application/x-rar-compressed',
    'exe' => 'application/x-msdownload',
    'msi' => 'application/x-msdownload',
    'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
    'mp3' => 'audio/mpeg',
    'qt' => 'video/quicktime',
    'mov' => 'video/quicktime',

            // adobe
    'pdf' => 'application/pdf',
    'psd' => 'image/vnd.adobe.photoshop',
    'ai' => 'application/postscript',
    'eps' => 'application/postscript',
    'ps' => 'application/postscript',

            // ms office
    'doc' => 'application/msword',
    'rtf' => 'application/rtf',
    'xls' => 'application/vnd.ms-excel',
    'ppt' => 'application/vnd.ms-powerpoint',

            // open office
    'odt' => 'application/vnd.oasis.opendocument.text',
    'ods' => 'application/vnd.oasis.opendocument.spreadsheet',




  );
  $java=explode('.',$filename);
  $ext = strtolower(array_pop($java));
  if (array_key_exists($ext, $mime_types)) {


    return $mime_types[$ext];
  }
  elseif (function_exists('finfo_open')) {
    $finfo = finfo_open(FILEINFO_MIME);
    $mimetype = finfo_file($finfo, $filename);
    finfo_close($finfo);
    return $mimetype;
  }
  else {
    return 'application/octet-stream';
  }
}
include("connection.php");
$title=$_POST['title'];
$category=$_POST['category'];
$price=$_POST['price'];
$name=$_POST['name'];
$rate=$_POST['rate'];
$price=$price.$rate;
$phone=$_SESSION['SESS_FIRST_NAME'];
$city=$_POST['city'];
$desc=$_POST['desc'];
$_SESSION['title']=$title;
$_SESSION['desc']=$desc;
$_SESSION['category']=$category;
$_SESSION['price']=$price;
$_SESSION['name']=$name;
$_SESSION['phone']=$phone;
$_SESSION['city']=$city;



echo $price;
$file1;
$file2;
function compressImage($source_image, $compress_image) {
  $image_info = getimagesize($source_image);
  if ($image_info['mime'] == 'image/jpeg') {
    $source_image = imagecreatefromjpeg($source_image);
    imagejpeg($source_image, $compress_image,9);
  } elseif ($image_info['mime'] == 'image/gif') {
    $source_image = imagecreatefromgif($source_image);
    imagegif($source_image, $compress_image,9);
  }elseif ($image_info['mime'] == 'image/jpe') {
    $source_image = imagecreatefromjpe($source_image);
    imagejpe($source_image, $compress_image,9);
  }  
  elseif ($image_info['mime'] == 'image/png') {
    $source_image = imagecreatefrompng($source_image);
    imagepng($source_image, $compress_image, 9);
  }
  return $compress_image;
}
if($_FILES['userfile']['name'][0]!=NULL)
{


 $fileName = $_FILES['userfile']['name'][0];
 $mimeType=mime_content_type1($fileName);
 if($mimeType!='image/png' && $mimeType!='image/jpg' && $mimeType!='image/jpeg' && $mimeType!='image/gif' && $mimeType!='image/jpe')
 {
                     // echo "dfg"; 
   $imgerror="unsupported file type";
   $_SESSION['imgerror']=$imgerror;

   header('location:submit.php');
   exit();

 }

 $tmpName  = $_FILES['userfile']['tmp_name'][0];
 $fileSize = $_FILES['userfile']['size'][0];
 $fileType = $_FILES['userfile']['type'][0];
 $source_image = $tmpName;
 $image_destination =$fileName;
 $compress_images = compressImage($source_image, $image_destination);
 $title1=uniqid();
 $_SESSION['$title1']=$title1;
 $description='';

 $file=$tmpName;

 $filename=$compress_images;
  $file1="upload/".$title1;
move_uploaded_file($filename, $file1);
if (!move_uploaded_file($filename, $file1))
 {
   
        $imgerror="Sorry, there was an error uploading your file.";
        // header('location:submit.php');
        // exit();
        echo"yha";
    }



}

if($_FILES['userfile']['name'][1]!=NULL)
{


 $fileName = $_FILES['userfile']['name'][1];
 $mimeType=mime_content_type1($fileName);
 if($mimeType!='image/png' && $mimeType!='image/jpg' && $mimeType!='image/jpeg' && $mimeType!='image/gif' && $mimeType!='image/jpe')
 {


   $imgerror="unsupported file type";
   $_SESSION['imgerror']=$imgerror;
   header('location:submit.php');
   exit();

 }
 $tmpName  = $_FILES['userfile']['tmp_name'][1];
 $fileSize = $_FILES['userfile']['size'][1];
 $fileType = $_FILES['userfile']['type'][1];
 $source_image = $tmpName;
 $image_destination =$fileName;
 $compress_images = compressImage($source_image, $image_destination);
 $title2=uniqid();
 $_SESSION['$title2']=$title2;
 $description='';
 $file=$compress_images;

 $filename=$file;

  $file2="upload/".$title1;

if (!move_uploaded_file($filename, $file2))
 {
   
        $imgerror="Sorry, there was an error uploading your file.";
        header('location:submit.php');
        exit();
    }

}

$_SESSION['file1']=$file1;
$_SESSION['file2']=$file2;
header('location:adddata.php');
exit();
?>