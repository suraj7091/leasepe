<?php
session_start();
if (!isset($_SESSION['SESS_FIRST_NAME'])) {

  header('location:login.php');
  exit();
}
if(!isset($_POST['submitad']))
{
 header('location:submit.php');
  exit();
}

function resize($file_name, $dst2)
{
    $maxDim = 600;
    list($width, $height, $type, $attr) = getimagesize($file_name);
    if ($width > $maxDim || $height > $maxDim) {
        $target_filename = $file_name;
        $ratio = $width / $height;
        if ($ratio >= 1) {
            $new_width = $maxDim;
            $new_height = $maxDim / $ratio;
        } else {
            $new_width = $maxDim * $ratio;
            $new_height = $maxDim;
        }
        $src = imagecreatefromstring(file_get_contents($file_name));
        $dst = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        if($width<$height)
        {
            $degree=90;
            $dst = imagerotate($dst, $degree, 0);
        }
        imagepng($dst, $dst2);
        imagedestroy($src);
        imagedestroy($dst);
            
    }
   

}
function mime_content_type1($filename)
{ //function for getting the MIME type
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
        'png' => '.png',
        'jpe' => '.jpeg',
        'jpeg' => '.jpeg',
        'jpg' => '.jpeg',
        'gif' => '.gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml');
    $java = explode('.', $filename);
    $ext = strtolower(array_pop($java));
    if (array_key_exists($ext, $mime_types)) {

        return $mime_types[$ext];
    } elseif (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME);
        $mimetype = finfo_file($finfo, $filename);
        finfo_close($finfo);
        return $mimetype;
    } else {
        return 'application/octet-stream';
    }
}
include "connection.php";
$title = $_POST['title'];
$category = $_POST['category'];
$price = $_POST['price'];
$name = $_POST['name'];
$rate = $_POST['rate'];
$price = $price . $rate;
$phone = $_SESSION['SESS_FIRST_NAME'];
$city = $_POST['city'];
$desc = $_POST['desc'];
$_SESSION['title'] = $title;
$_SESSION['desc'] = $desc;
$_SESSION['category'] = $category;
$_SESSION['price'] = $price;
$_SESSION['name'] = $name;
$_SESSION['phone'] = $phone;
$_SESSION['city'] = $city;
$file1;
$file2;
function compressImage($source_image, $compress_image)
{
    $image_info = getimagesize($source_image);
    if ($image_info['mime'] == 'image/jpeg') {
        $source_image = imagecreatefromjpeg($source_image);

        imagejpeg($source_image, $compress_image, 9);
    } elseif ($image_info['mime'] == 'image/gif') {
        $source_image = imagecreatefromgif($source_image);

        imagegif($source_image, $compress_image, 9);
    } elseif ($image_info['mime'] == 'image/jpe') {
        $source_image = imagecreatefromjpe($source_image);

        imagejpe($source_image, $compress_image, 9);
    } elseif ($image_info['mime'] == 'image/png') {
        $source_image = imagecreatefrompng($source_image);

        imagepng($source_image, $compress_image, 9);
    }
    return $compress_image;
}
if( !isset($_FILES['userfile']['name'][1]))
{
    $_FILES['userfile']['name'][1]=null;
}
if ($_FILES['userfile']['name'][1] != null) {
    $tmpName = $_FILES['userfile']['tmp_name'][1];
    $fileSize = $_FILES['userfile']['size'][1];
    $fileType = $_FILES['userfile']['type'][1];
    $fileName = $_FILES['userfile']['name'][1];
    $mimeType = mime_content_type1($fileName);
    if ($mimeType != '.png' && $mimeType != '.jpg' && $mimeType != '.jpeg' && $mimeType != '.gif' && $mimeType != '.jpe') {
        $imgerror = "unsupported file type";
        $_SESSION['imgerror'] = $imgerror;
        echo "0";
        exit();
    }
    resize($tmpName, $tmpName);
    $title2 = uniqid();
    $_SESSION['title2'] = $title2;
    $filename2 = $tmpName;
    $file2 = "upload/" . $title2 . $mimeType;
    $compress_images = compressImage($filename2, $filename2);

    if (!move_uploaded_file($filename2, $file2)) {
        echo "1";
    }

}
if ($_FILES['userfile']['name'][0] != null) {
    $fileName = $_FILES['userfile']['name'][0];
    $mimeType = mime_content_type1($fileName);
    if ($mimeType != '.png' && $mimeType != '.jpg' && $mimeType != '.jpeg' && $mimeType != '.gif' && $mimeType != '.jpe') {
        
        $imgerror = "unsupported file type";
        $_SESSION['imgerror'] = $imgerror;
        echo "0";
        exit();

    }
    $tmpName = $_FILES['userfile']['tmp_name'][0];
    $fileSize = $_FILES['userfile']['size'][0];
    $fileType = $_FILES['userfile']['type'][0];
    $source_image = $tmpName;
    $image_destination = $fileName;
    $title1 = uniqid();
    $_SESSION['$title1'] = $title1;
    $description = '';

    $filename = $tmpName;
    $file1 = "upload/" . $title1 . $mimeType;

    $compress_images = compressImage($filename, $filename);
    resize($filename, $filename);
    move_uploaded_file($filename, $file1);

}

$_SESSION['file1'] = $file1;
$_SESSION['file2'] = $file2;
header('location:adddata.php');
exit();
