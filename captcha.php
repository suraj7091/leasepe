<?php
session_start();
if(isset($_SESSION['my_captcha']))
{
unset($_SESSION['my_captcha']); // destroy the session if already there
}
$string1="abcdefghijklmnopqrstuvwxyz";
$string2="1234567890";
$string=$string1.$string2;
$string= str_shuffle($string);
$random_text= substr($string,0,6);
$_SESSION['my_captcha']=$random_text;
$im = @ImageCreate (80, 20)
or die ("Cannot Initialize new GD image stream");
$background_color = ImageColorAllocate ($im, 1, 255,255); // Assign background color
$text_color = ImageColorAllocate ($im, 51, 51, 255);      // text color is given 
ImageString($im,5,5,2,$_SESSION['my_captcha'],$text_color); // Random string  from session added 

ImagePng ($im); // image displayed
imagedestroy($im); // Memory allocation for the image is removed. 
?>